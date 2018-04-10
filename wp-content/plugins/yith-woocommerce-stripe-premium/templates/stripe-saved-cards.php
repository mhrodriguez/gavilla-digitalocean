<?php
/**
 * The Template for list saved cards on checkout
 *
 * Override this template by copying it to yourtheme/woocommerce/checkout/stripe-checkout-cards.php
 *
 * @var $cards array
 * @var $customer array
 *
 * @author 		YIThemes
 * @package 	YITH WooCommerce Stripe/Templates
 * @version     1.0.0
 */

do_action( 'woocommerce_before_saved_cards' );
?>

<?php if ( ! empty( $cards ) ) : ?>

	<table class="shop_table shop_table_responsive my_account_orders my_account_cards">

		<thead>
			<tr>
				<th class="card-type"><span class="nobr"><?php _e( 'Card', 'yith-stripe' ) ?></span></th>
				<th class="card-expire"><span class="nobr"><?php _e( 'Expire', 'yith-stripe' ) ?></span></th>
				<th class="card-actions">&nbsp;</th>
			</tr>
		</thead>

		<tbody>

		<?php foreach ( $cards as $card ) : ?>
			<tr class="order">
				<td class="card-type" data-title="<?php _e( 'Card Number', 'yith-stripe' ) ?>">
					<img src="<?php echo $card->icon ?>" alt="<?php echo $card->brand ?>'" style="width:40px;"/>
					<?php printf(
						'<span class="card-type"><strong>%s</strong></span> <span class="card-number"><small><em>&bull;&bull;&bull;&bull;</em>%s</small></span>',
						$card->brand,
						$card->last4
					); ?>
					<?php if ( $card->id == $customer['default_source'] ) : ?>
						<span class="tag-label default"><?php _e( 'default', 'yith-stripe' ) ?></span>
					<?php else : ?>
						<a class="tag-label default show-on-hover" href="<?php echo esc_url( wp_nonce_url( add_query_arg( array( 'stripe-action' => 'set-default-card', 'id' => $card->id, 'customer' => $customer['id'], 'user' => get_current_user_id() ) ), 'stripe-set-default-card' ) ) ?>" data-table-action="default"><?php _e( 'set default', 'yith-stripe' ) ?></a>
					<?php endif; ?>
				</td>
				<td class="card-expire" data-title="<?php _e( 'Expire', 'yith-stripe' ) ?>">
					<?php printf( '%s/%s', $card->exp_month, $card->exp_year ) ?>
				</td>
				<td class="card-actions">
					<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( array( 'stripe-action' => 'delete-card', 'id' => $card->id, 'customer' => $customer['id'], 'user' => get_current_user_id() ) ), 'stripe-delete-card' ) ) ?>" class="button delete" data-table-action="delete"><?php _e( 'Delete', 'yith-stripe' ) ?></a>
				</td>
			</tr>
		<?php endforeach; ?>

		</tbody>

	</table>

<?php else : ?>

	<p><?php _e( 'No cards saved', 'yith-stripe' ) ?></p>

<?php endif; ?>