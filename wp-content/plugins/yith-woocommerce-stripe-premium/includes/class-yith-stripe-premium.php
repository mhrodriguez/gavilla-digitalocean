<?php
/**
 * Main class
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Stripe
 * @version 1.0.0
 */

if ( ! defined( 'YITH_WCSTRIPE' ) ) {
	exit;
} // Exit if accessed directly

use \Stripe\Error;

if ( ! class_exists( 'YITH_WCStripe_Premium' ) ){
	/**
	 * WooCommerce Stripe main class
	 *
	 * @since 1.0.0
	 */
	class YITH_WCStripe_Premium extends YITH_WCStripe {
		/**
		 * Single instance of the class
		 *
		 * @var \YITH_WCStripe_Premium
		 * @since 1.0.0
		 */
		protected static $instance;

		/**
		 * @var YITH_WCStripe_Customer Customers instance
		 * @since 1.0
		 */
		public $customer = null;

		/**
		 * Returns single instance of the class
		 *
		 * @return \YITH_WCStripe_Premium
		 * @since 1.0.0
		 */
		public static function get_instance(){
			if( is_null( self::$instance ) ){
				self::$instance = new self;
			}

			return self::$instance;
		}

		/* === PLUGIN FW LOADER === */

		/**
		 * Loads plugin fw, if not yet created
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function plugin_fw_loader() {
			if ( ! defined( 'YIT_CORE_PLUGIN' ) ) {
				require_once( YITH_WCSTRIPE_DIR . '/plugin-fw/yit-plugin.php' );
			}
		}

		/**
		 * Constructor.
		 *
		 * @return \YITH_WCStripe_Premium
		 * @since 1.0.0
		 */
		public function __construct() {
			parent::__construct();

			add_action( 'init', array( __CLASS__, 'create_blacklist_table' ) );
			register_activation_hook( __FILE__, array( __CLASS__, 'create_blacklist_table' ) );

			// includes
			include_once( 'class-yith-stripe-customer.php' );

			// admin includes
			if ( is_admin() ) {
				include_once( 'class-yith-stripe-admin-premium.php' );
				$this->admin = new YITH_WCStripe_Admin_Premium();
			}

			// add template for table cards
			$this->add_endpoint();
			add_action( 'woocommerce_after_my_account', array( $this, 'saved_cards_box' ) );
			add_action( 'template_redirect', array( $this, 'load_saved_cards_page' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
			add_action( 'woocommerce_api_stripe_webhook', array( $this, 'handle_webhooks' ) );

			// actions
			add_action( 'wp', array( $this, 'add_card_handler' ) );
			add_action( 'wp', array( $this, 'delete_card_handler' ) );
			add_action( 'wp', array( $this, 'set_default_card_handler' ) );

			// subscriptions
			add_filter( 'ywsbs_suspend_recurring_payment', array( $this, 'suspend_subscription' ), 10, 2 );
			add_filter( 'ywsbs_resume_recurring_payment',  array( $this, 'resume_subscription' ), 10, 2 );
			add_filter( 'ywsbs_cancel_recurring_payment',  array( $this, 'cancel_subscription' ), 10, 2 );

			// blacklist table
			add_action( 'init', array( $this, 'blacklist_table_wpdbfix' ), 0 );
			add_action( 'switch_blog', array( $this, 'blacklist_table_wpdbfix' ), 0 );
		}

		/**
		 * Set blacklist table name on £wpdb instance
		 *
		 * @since 1.1.3
		 */
		public function blacklist_table_wpdbfix() {
			global $wpdb;
			$blacklist_table = 'yith_wc_stripe_blacklist';

			$wpdb->{$blacklist_table} = $wpdb->prefix . $blacklist_table;
			$wpdb->tables[] = $blacklist_table;
		}

		/**
		 * Create the {$wpdb->prefix}_yith_vendor_commissions table
		 *
		 * @author Andrea Grillo <andrea.grillo@yithemes.com>
		 * @since  1.0
		 * @return void
		 * @see    dbDelta()
		 */
		public static function create_blacklist_table() {
			global $wpdb;

			if ( true === get_option( 'yith_wc_stripe_blacklist_table_created' ) ) {
				return;
			}

			/**
			 * Check if dbDelta() exists
			 */
			if ( ! function_exists( 'dbDelta' ) ) {
				require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			}

			$charset_collate = $wpdb->get_charset_collate();

			$create = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}yith_wc_stripe_blacklist (
                        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
						`ip` VARCHAR(15) NOT NULL DEFAULT '',
						`user_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
						`order_id` BIGINT(20) UNSIGNED NOT NULL DEFAULT '0',
						`ban_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
						`ban_date_gmt` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
						`ua` VARCHAR(255) NULL DEFAULT '',
						`unbanned` TINYINT(1) NOT NULL DEFAULT '0',
						PRIMARY KEY (`ID`),
						INDEX `user_id` (`user_id`),
						INDEX `order_id` (`order_id`),
						INDEX `ip` (`ip`)
                        ) $charset_collate;";
			dbDelta( $create );

			update_option( 'yith_wc_stripe_blacklist_table_created', true );
		}

		/**
		 * Detect if installed some external addons for ecommerce, to give them compatibility with stripe
		 *
		 * @param string $addon
		 *
		 * @return bool If defined $addon, returns if the addon is installed or not. If not defined it, return if any of addon compatible is installed
		 */
		public static function addons_installed( $addon = '' ) {
			$checks = array(
				'yith-subscription' => function_exists( 'YITH_WC_Subscription' )
			);

			if ( ! empty( $addon ) ) {
				return isset( $checks[ $addon ] ) ? $checks[ $addon ] : false;
			}

			foreach ( $checks as $check ) {
				if ( $check ) {
					return true;
				}
			}

			return false;
		}

		/**
		 * Adds Stripe Gateway to payment gateways available for woocommerce checkout
		 *
		 * @param $methods array Previously available gataways, to filter with the function
		 *
		 * @return array New list of available gateways
		 * @since 1.0.0
		 */
		public function add_to_gateways( $methods ) {
			include_once( 'class-yith-stripe-gateway.php' );
			include_once( 'class-yith-stripe-gateway-advanced.php' );

			if ( self::addons_installed() ) {
				include_once( 'class-yith-stripe-gateway-addons.php' );
				$methods[] = 'YITH_WCStripe_Gateway_Addons';
			} else {
				$methods[] = 'YITH_WCStripe_Gateway_Advanced';
			}

			return $methods;
		}

		/**
		 * Cancel the order if there is missing capture within 7 days
		 *
		 * @since 1.0.0
		 */
		public function check_missing_capture() {
			$orders = get_posts( array(
				'posts_per_page' => 1,
				'post_type'      => 'shop_order',
				'orderby'        => 'date',
				'order'          => 'desc',
				'post_status'    => 'wc-processing',
				'meta_query' => array(
					array(
						'key'     => '_customer_date',
						'value'   => '',
						'compare' => '>'
					)
				),
				'fields' => 'ids'
			) );
		}

		/**
		 * Add the endpoint for the page in my account to manage the saved cards
		 *
		 * @since 1.0.0
		 */
		public function add_endpoint() {
			WC()->query->query_vars['saved-cards'] = get_option( 'woocommerce_myaccount_saved-cards_endpoint', 'saved-cards' );
		}

		/**
		 * Template for the table of saved cards
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function saved_cards_box() {
			if ( ! $gateway = $this->get_gateway() ) {
				return;
			}

			if ( ! $gateway->save_cards ) {
				return;
			}
			?>

			<h2>
				<?php _e( 'Saved cards', 'yith-stripe' ) ?>
				<a href="<?php echo wc_get_endpoint_url( 'saved-cards' ) ?>" class="edit" style="font-size:60%;font-weight:normal;float:right;"><?php _e( 'Manage cards', 'yith-stripe' ) ?></a>
			</h2>

			<?php
			$this->saved_cards();
		}

		/**
		 * Template for the table of saved cards
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function saved_cards() {
			if ( ! $stripe = $this->get_gateway() ) {
				return;
			}

			// load SDK
			$stripe->init_stripe_sdk();

			// Init
			$customer = $this->get_customer()->get_usermeta_info( get_current_user_id() );

			// add new template
			if ( $this->is_add_new_card_endpoint() ) {
				wp_enqueue_script( 'wc-country-select' );
				wp_enqueue_script( 'wc-address-i18n' );

				wc_get_template( 'stripe-add-card.php', array(
					'gateway' => $stripe,
					'customer' => $customer,
					'user' => wp_get_current_user()
				), WC()->template_path() . 'myaccount/', YITH_WCSTRIPE_DIR . 'templates/' );
				return;
			}

			$cards = array();
			if ( ! empty( $customer['cards'] ) ) {

				foreach ( $customer['cards'] as $the ) {
					$card = new stdClass();
					$card->id = $the->id;
					$card->brand = $the->brand;
					$card->slug = array_values( array_keys( $stripe->cards, $card->brand ) );
					$card->slug = array_shift( $card->slug );
					$card->icon = WC_HTTPS::force_https_url( WC()->plugin_url() . '/assets/images/icons/credit-cards/' . $card->slug . '.png' );
					$card->last4 = $the->last4;
					$card->exp_month = str_pad( $the->exp_month, 2, '0', STR_PAD_LEFT );
					$card->exp_year = $the->exp_year;

					$cards[] = $card;
				}

			}

			// all cards
			wc_get_template( 'stripe-saved-cards.php', array(
				'cards' => $cards,
				'customer' => $customer
			), WC()->template_path() . 'myaccount/', YITH_WCSTRIPE_DIR . 'templates/' );

		}

		/**
		 * Load the page of saved cards
		 *
		 * @since 1.0.0
		 */
		public function load_saved_cards_page() {
			global $wp, $post;

			if ( ! $gateway = $this->get_gateway() ) {
				return;
			}

			if ( ! $gateway->save_cards || ! is_page( wc_get_page_id( 'myaccount' ) ) || ! $this->is_savedcards_endpoint() ) {
				return;
			}

			if ( $this->is_add_new_card_endpoint() ) {
				$post->post_title = __( 'Add new credit card', 'yith-stripe' );
			} else {
				$post->post_title = __( 'Saved cards', 'yith-stripe' ) . ' <div class="woocommerce" style="float:right;font-size:medium;"><a href="' . wc_get_endpoint_url( 'saved-cards', 'add-new' ) . '" class="edit button">' . __( 'Add new', 'yith-stripe' ) .  '</a></div>';
			}
			$post->post_content = WC_Shortcodes::shortcode_wrapper( array( $this, 'saved_cards' ) );

			// hooks
			remove_filter( 'the_content', 'wpautop' );
			add_action( 'woocommerce_before_saved_cards', 'wc_print_notices', 10 );
		}

		/**
		 * Check if myaccount endpoint is saved cards
		 *
		 * @since 1.2.4
		 */
		public function is_savedcards_endpoint() {
			global $wp;
			return apply_filters( 'yith_savedcards_page', isset( $wp->query_vars['saved-cards'] ) );
		}

		/**
		 * Check if myaccount endpoint is saved cards
		 *
		 * @since 1.2.5
		 */
		public function is_add_new_card_endpoint() {
			global $wp;
			return apply_filters( 'yith_add_new_card_page', isset( $wp->query_vars['saved-cards'] ) && 'add-new' == $wp->query_vars['saved-cards'] );
		}

		/**
		 * Check if myaccount endpoint is saved cards
		 *
		 * If $card parameter isn't specified, the method returns the ID of card where the user is
		 *
		 * @since 1.2.5
		 */
		public function is_edit_card_endpoint( $card_id = false ) {
			global $wp;

			if ( ! isset( $wp->query_vars['saved-cards'] ) || false === strpos( $wp->query_vars['saved-cards'], 'edit' ) ) {
				$return = false;
			}

			elseif ( false !== $card_id ) {
				$return = 'edit/' . $card_id == $wp->query_vars['saved-cards'];
			}

			else {
				list( $action, $card_id ) = explode( '/', $wp->query_vars['saved-cards'] );
				$return = 'edit' === $action ? $card_id : false;
			}

			return apply_filters( 'yith_add_new_card_page', $return );
		}

		/**
		 * Load assets for the my account page
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {
			if ( ! is_page( wc_get_page_id( 'myaccount' ) ) ) {
				return;
			}

			wp_register_style( 'stripe-css', YITH_WCSTRIPE_URL . 'assets/css/stripe.css' );
			wp_enqueue_style( 'stripe-css' );

			wp_register_script( 'yith-stripe-js-myaccount', YITH_WCSTRIPE_URL . 'assets/js/stripe-myaccount.js', array('jquery'), false, true );
			wp_enqueue_script( 'yith-stripe-js-myaccount' );

			// enqueue the checkout script on the page for add new card
			if ( $this->is_add_new_card_endpoint() ) {
				wp_enqueue_script( 'jquery-payment' );
				wp_enqueue_script( 'wc-credit-card-form' );
				$this->get_gateway()->payment_scripts();
			}
		}

		/**
		 * Add card
		 *
		 * @return mixed
		 * @throws Error\Api
		 * @since 1.2.5
		 */
		public function add_card_handler() {
			if (
				! isset( $_REQUEST['stripe-action'] ) ||
				$_REQUEST['stripe-action'] != 'add-card' ||
				! isset( $_REQUEST['stripe_token'] ) ||
				! wp_verify_nonce( $_REQUEST['_wpnonce'], 'stripe-add-card' )
			) {
				return;
			}

			$gateway = $this->get_gateway();
			$set_as_default = isset( $_REQUEST['set_as_default'] ) && $_REQUEST['set_as_default'];

			try {

				// Initializate SDK and set private key
				$gateway->init_stripe_sdk();

				// Card selected during payment
				$gateway->token = isset( $_POST['stripe_token'] ) ? wc_clean( $_POST['stripe_token'] ) : '';

				if ( empty( $gateway->token ) ) {
					$error_msg = __( 'Please make sure that your card details have been entered correctly and that your browser supports JavaScript.', 'yith-stripe' );

					if ( 'test' == $gateway->env ) {
						$error_msg .= ' ' . __( 'Developers: Please make sure that you\'re including jQuery and that there are no JavaScript errors in the page.', 'yith-stripe' );
					}

					$gateway->log( 'Wrong token ' . $gateway->token . ': ' . print_r( $_POST, true ) );

					throw new Error\Api( $error_msg );
				}

				// add card
				$user = wp_get_current_user();
				$customer = YITH_WCStripe()->get_customer()->get_usermeta_info( $user->ID );

				// get existing
				if ( $customer ) {
					$card = $gateway->api->create_card( $customer['id'], $gateway->token );
					$customer['cards'][] = $card;

					// set as default
					if ( $set_as_default ) {
						$gateway->api->set_default_card( $customer['id'], $card->id );
						$customer['default_source'] = $card->id;
					}

					// update user meta
					YITH_WCStripe()->get_customer()->update_usermeta_info( $user->ID, $customer );
				}

				// create new one
				else {
					$params = array(
						'source' => $gateway->token,
						'email' => $user->billing_email,
						'description' => $user->user_login . ' (#' . $user->ID . ' - ' . $user->user_email . ') ' . $user->billing_first_name . ' ' . $user->billing_last_name,
						'metadata' => array(
							'user_id' => $user->ID,
							'instance' => $gateway->instance
						)
					);

					$customer = $gateway->api->create_customer( $params );

					// update user meta
					YITH_WCStripe()->get_customer()->update_usermeta_info( $user->ID, array(
						'id'             => $customer->id,
						'cards'          => $customer->sources->data,
						'default_source' => $customer->default_source
					) );
				}

				// success
				wc_add_notice( __( 'Credit card added correctly' ) );
				wp_redirect( wc_get_endpoint_url( 'saved-cards' ) );
				exit();

			} catch ( Error\Card $e ) {
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$message = isset( $gateway->errors[ $err['code'] ] ) ? $gateway->errors[ $err['code'] ] : $err['message'];

				wc_add_notice( $message, 'error' );
				$gateway->log( 'Stripe Error: ' . $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
			}
		}

		/**
		 * Delete card
		 *
		 * @return mixed
		 * @since 1.0.0
		 */
		public function delete_card_handler() {
			if (
				! isset( $_REQUEST['stripe-action'] ) ||
				$_REQUEST['stripe-action'] != 'delete-card' ||
				! isset( $_REQUEST['id'] ) ||
				! isset( $_REQUEST['customer'] ) ||
				! isset( $_REQUEST['user'] ) ||
				! wp_verify_nonce( $_REQUEST['_wpnonce'], 'stripe-delete-card' )
			) {
				return;
			}

			$gateways = WC()->payment_gateways()->get_available_payment_gateways();

			/**
			 * @var $stripe YITH_WCStripe_Gateway
			 */
			$stripe = $gateways['yith-stripe'];

			// load SDK
			$stripe->init_stripe_sdk();

			$card_id = $_REQUEST['id'];
			$customer_id = $_REQUEST['customer'];
			$user_id = intval( $_REQUEST['user'] );

			try {

				// delete card
				$customer = $stripe->api->delete_card( $customer_id, $card_id );

				$this->get_customer()->update_usermeta_info( $user_id, array(
					'id' => $customer->id,
					'cards' => $customer->sources->data,
					'default_source' => $customer->default_source
				) );

				wc_add_notice( __( 'Card deleted successfully.', 'yith-stripe' ), 'success' );

				wp_redirect( get_permalink( wc_get_page_id( 'myaccount' ) ) );
				exit();

			} catch ( Error\Card $e ) {

				wc_add_notice( $e->getMessage(), 'error' );

				wp_redirect( get_permalink( wc_get_page_id( 'myaccount' ) ) );
				exit();

			}
		}

		/**
		 * Set default card
		 *
		 * @return mixed
		 * @since 1.0.0
		 */
		public function set_default_card_handler() {
			if (
				! isset( $_REQUEST['stripe-action'] ) ||
				$_REQUEST['stripe-action'] != 'set-default-card' ||
				! isset( $_REQUEST['id'] ) ||
				! isset( $_REQUEST['customer'] ) ||
				! isset( $_REQUEST['user'] ) ||
				! wp_verify_nonce( $_REQUEST['_wpnonce'], 'stripe-set-default-card' )
			) {
				return;
			}

			$gateways = WC()->payment_gateways()->get_available_payment_gateways();

			/**
			 * @var $stripe YITH_WCStripe_Gateway
			 */
			$stripe = $gateways['yith-stripe'];

			// load SDK
			$stripe->init_stripe_sdk();

			$card_id = $_REQUEST['id'];
			$customer_id = $_REQUEST['customer'];
			$user_id = intval( $_REQUEST['user'] );

			try {

				// delete card
				$customer = $stripe->api->set_default_card( $customer_id, $card_id );

				$this->get_customer()->update_usermeta_info( $user_id, array(
					'id' => $customer->id,
					'cards' => $customer->sources->data,
					'default_source' => $customer->default_source
				) );

				wc_add_notice( __( 'Card updated successfully.', 'yith-stripe' ), 'success' );

				wp_redirect( get_permalink( wc_get_page_id( 'myaccount' ) ) );
				exit();

			} catch ( Error\Card $e ) {

				wc_add_notice( $e->getMessage(), 'error' );

				wp_redirect( get_permalink( wc_get_page_id( 'myaccount' ) ) );
				exit();

			}
		}

		/**
		 * Get customer object
		 *
		 * @return YITH_WCStripe_Customer
		 */
		public function get_customer() {
			return YITH_WCStripe_Customer();
		}

		/**
		 * Cancel recurring payment if the subscription has a stripe subscription
		 *
		 * @param bool               $result
		 * @param YWSBS_Subscription $subscription
		 *
		 * @return bool
		 */
		public function cancel_subscription( $result, $subscription ) {
			if ( ! isset( $subscription->stripe_subscription_id ) || $subscription->stripe_subscription_id == '' ) {
				return true;
			}

			$gateways = WC()->payment_gateways()->get_available_payment_gateways();

			/** @var $gateway YITH_WCStripe_Gateway|YITH_WCStripe_Gateway_Advanced|YITH_WCStripe_Gateway_Addons */
			$gateway = $gateways['yith-stripe'];

			try {

				// load SDK
				$gateway->init_stripe_sdk();

				$gateway->api->cancel_subscription( $subscription->stripe_customer_id, $subscription->stripe_subscription_id );

				$gateway->log( 'YSBS - Stripe Subscription Cancel Request ' . $subscription->id . ' with success.' );
				YITH_WC_Activity()->add_activity( $subscription->id, 'cancelled', "success" );

				return $result;

			} catch ( Error\Base $e ) {
				$gateway->log( 'Stripe Subscription Error: ' . $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				YITH_WC_Activity()->add_activity( $subscription->id, 'cancelled', 'error', '', $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				return false;
			}
		}

		/**
		 * Suspend a subscription, by update the subscription on stripe and setting "trial_end" to undefined date
		 *
		 * @param $result
		 * @param $subscription
		 *
		 * @return bool
		 */
		public function suspend_subscription( $result, $subscription ) {
			if ( ! isset( $subscription->stripe_subscription_id ) || $subscription->stripe_subscription_id == '' ) {
				return true;
			}

			$gateways = WC()->payment_gateways()->get_available_payment_gateways();

			/** @var $gateway YITH_WCStripe_Gateway|YITH_WCStripe_Gateway_Advanced|YITH_WCStripe_Gateway_Addons */
			$gateway = $gateways['yith-stripe'];

			try {

				// load SDK
				$gateway->init_stripe_sdk();

				// set trial to undefined date, so any payment is triggered from stripe, without cancel subscription
				$gateway->api->update_subscription( $subscription->stripe_customer_id, $subscription->stripe_subscription_id, array(
					'trial_end' => strtotime( '+5 years' )  // max supported by stripe
				) );

				$gateway->log( 'YSBS - Stripe Subscription ' . $subscription->id . ' Pause Request with success.' );
				YITH_WC_Activity()->add_activity( $subscription->id, 'paused', "success" );

				return true;

			} catch ( Error\Base $e ) {
				$gateway->log( 'Stripe Subscription Error: ' . $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				YITH_WC_Activity()->add_activity( $subscription->id, 'paused', 'error', '', $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				return false;
			}
		}

		/**
		 * Resume the subscription, updated it and set "trial_end" to now value
		 *
		 * @param $result
		 * @param $subscription YWSBS_Subscription
		 *
		 * @return bool
		 */
		public function resume_subscription( $result, $subscription ) {
			if ( ! isset( $subscription->stripe_subscription_id ) || $subscription->stripe_subscription_id == '' ) {
				return true;
			}

			$gateways = WC()->payment_gateways()->get_available_payment_gateways();

			/** @var $gateway YITH_WCStripe_Gateway|YITH_WCStripe_Gateway_Advanced|YITH_WCStripe_Gateway_Addons */
			$gateway = $gateways['yith-stripe'];

			try {

				// load SDK
				$gateway->init_stripe_sdk();

				// set trial to undefined date, so any payment is triggered from stripe, without cancel subscription
				$gateway->api->update_subscription( $subscription->stripe_customer_id, $subscription->stripe_subscription_id, array(
					'trial_end' => $subscription->payment_due_date + $subscription->get_payment_due_date_paused_offset()
				) );

				$gateway->log( 'YSBS - Stripe Subscription ' . $subscription->id . ' Resumed with success.' );
				YITH_WC_Activity()->add_activity( $subscription->id, 'resumed', "success" );

				return true;

			} catch ( Error\Base $e ) {
				$gateway->log( 'Stripe Subscription Error: ' . $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				YITH_WC_Activity()->add_activity( $subscription->id, 'resumed', 'error', '', $e->getHttpStatus() . ' - ' . print_r( $e->getJsonBody(), true ) );
				return false;
			}
		}

		/**
		 * Handle the webhooks from stripe account
		 *
		 * @since 1.0.0
		 */
		public function handle_webhooks() {
			include_once( 'class-yith-stripe-webhook.php' );

			YITH_WCStripe_Webhook::route();
		}
	}
}