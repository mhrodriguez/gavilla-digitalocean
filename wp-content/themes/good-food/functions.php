<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('good_food_system_fonts_list')) {
	function good_food_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('good_food_get_google_fonts_list')) {
	function good_food_get_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'good-food'), 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
		);
		
		
		return apply_filters('good_food_google_fonts_list_filter', $fonts);
	}
}



// Theme Settings Text Decorations List
if (!function_exists('good_food_text_decoration_list')) {
	function good_food_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'good-food'), 
			'underline' => esc_html__('underline', 'good-food'), 
			'overline' => esc_html__('overline', 'good-food'), 
			'line-through' => esc_html__('line-through', 'good-food'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('good_food_custom_color_schemes_list')) {
	function good_food_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'good-food'), 
			'second' => esc_html__('Custom 2', 'good-food'), 
			'third' => esc_html__('Custom 3', 'good-food') 
		);
		
		
		return apply_filters('good_food_custom_color_schemes_list_filter', $list);
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('good_food_locate_template')) {
	function good_food_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}



// CMSMasters Content Composer Plugin Compatibility
define('CMSMASTERS_CONTENT_COMPOSER', true);

// CMSMasters Donations Plugin Compatibility
define('CMSMASTERS_DONATIONS', false);

// CMSMasters Events Schedule Plugin Compatibility
define('CMSMASTERS_EVENTS_SCHEDULE', false);

// CMSMasters Contact Form Builder Plugin Compatibility
define('CMSMASTERS_CONTACT_FORM_BUILDER', true);

// CMSMasters Mega Menu Plugin Compatibility
define('CMSMASTERS_MEGA_MENU', true);

// CMSMasters Sermons Plugin Compatibility
define('CMSMASTERS_SERMONS', false);

// Woocommerce Plugin Compatibility
define('CMSMASTERS_WOOCOMMERCE', class_exists('woocommerce') ? true : false);

// Yith Woocommerce Ajax Search Plugin Compatibility
define('CMSMASTERS_WCAS', class_exists('YITH_WCAS') && CMSMASTERS_WOOCOMMERCE ? false : false);

// The Events Calendar Plugin Compatibility
define('CMSMASTERS_TRIBE_EVENTS', class_exists('Tribe__Events__Main') ? true : false);

// Timetable Responsive Schedule For WordPress Plugin Compatibility
define('CMSMASTERS_TIMETABLE', function_exists('timetable_events_init') ? false : false);

// LearnPress Plugin Compatibility
define('CMSMASTERS_LEARNPRESS', class_exists('LearnPress') ? false : false);

// WordPress Event Ticketing Plugin Compatibility
define('CMSMASTERS_TC_EVENTS', class_exists('TC') ? false : false);

// Instagram Feed Plugin Compatibility
define('CMSMASTERS_INSTAGRAM_FEED', function_exists('sb_instagram_activate') ? false : false);

// MailPoet Plugin Compatibility
define('CMSMASTERS_MAILPOET', class_exists('WYSIJA') ? true : false);

// WP-Post Ratings Plugin Compatibility
define('CMSMASTERS_RATING', function_exists('the_ratings') ? true : false);

// Theme Style Compatibility
define('CMSMASTERS_THEME_STYLE_COMPATIBILITY', false);

// Theme Style
define('CMSMASTERS_THEME_STYLE', (CMSMASTERS_THEME_STYLE_COMPATIBILITY && get_option('cmsmasters_good-food_theme_style') ? get_option('cmsmasters_good-food_theme_style') : ''));

// Theme Colored Categories Compatibility
define('CMSMASTERS_COLORED_CATEGORIES', true);

// Theme Categories Icon Compatibility
define('CMSMASTERS_CATEGORIES_ICON', true);

// Theme Projects Compatibility
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatibility
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Theme Developer Mode
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}



// Theme Settings All Theme Styles
if (!function_exists('good_food_all_theme_styles')) {
	function good_food_all_theme_styles() {
		$out = array( 
			'Default|', 
			'Theme Style 1|1', 
			'Theme Style 2|2' 
		);
		
		
		return $out;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('good_food_all_color_schemes_list')) {
	function good_food_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'good-food'), 
			'header' => 		esc_html__('Header', 'good-food'), 
			'navigation' => 	esc_html__('Navigation', 'good-food'), 
			'header_top' => 	esc_html__('Header Top', 'good-food'), 
			'footer' => 		esc_html__('Footer', 'good-food') 
		);
		
		
		$out = array_merge($list, good_food_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', get_template_directory() . '/framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');



// Load Framework Parts
require_once(CMSMASTERS_CLASS . '/browser.php');

require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/theme-settings-defaults.php');

require_once(CMSMASTERS_ADMIN_INC . '/config-functions.php');

require_once(CMSMASTERS_FUNCTION . '/general-functions.php');

require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/theme-functions.php');

require_once(get_template_directory() . '/theme-framework/plugin-activator.php');

require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php');

require_once(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php');

require_once(CMSMASTERS_ADMIN_INC . '/admin-scripts.php');

require_once(CMSMASTERS_FUNCTION . '/breadcrumbs.php');

require_once(CMSMASTERS_FUNCTION . '/likes.php');

require_once(CMSMASTERS_FUNCTION . '/views.php');

require_once(CMSMASTERS_FUNCTION . '/pagination.php');


// Theme Colored Categories functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	require_once(CMSMASTERS_FUNCTION . '/theme-colored-categories.php');
}

// Theme Categories Icon functions
if (CMSMASTERS_CATEGORIES_ICON) {
	require_once(CMSMASTERS_FUNCTION . '/theme-categories-icon.php');
}

// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS && class_exists('Cmsmasters_Donations')) {
	require_once(get_template_directory() . '/cmsmasters-donations/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE && class_exists('Cmsmasters_Events_Schedule')) {
	require_once(get_template_directory() . '/cmsmasters-events-schedule/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// CMSMasters Sermons functions
if (CMSMASTERS_SERMONS && class_exists('Cmsmasters_Sermons')) {
	require_once(get_template_directory() . '/cmsmasters-sermons/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Woocommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Yith Woocommerce Ajax Search functions
if (CMSMASTERS_WCAS) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/yith-woocommerce-ajax-search/cmsmasters-plugin-functions.php');
}

// Tribe Events functions
if (CMSMASTERS_TRIBE_EVENTS) {
	require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Timetable functions
if (CMSMASTERS_TIMETABLE) {
	require_once(get_template_directory() . '/timetable/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// LearnPress functions
if (CMSMASTERS_LEARNPRESS) {
	require_once(get_template_directory() . '/learnpress/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
	
	add_filter('learn_press_template_path', function() {return 'learnpress/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/templates';});
}

// TC Events functions
if (CMSMASTERS_TC_EVENTS) {
	require_once(get_template_directory() . '/tc-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// Instagram Feed functions
if (CMSMASTERS_INSTAGRAM_FEED) {
	require_once(get_template_directory() . '/instagram-feed/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}

// WP-PostRating functions
if (CMSMASTERS_RATING) {
	require_once(get_template_directory() . '/cmsmasters-wp-postratings/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-plugin-functions.php');
}



// Load Theme Local File
if (!function_exists('good_food_load_theme_textdomain')) {
	function good_food_load_theme_textdomain() {
		load_theme_textdomain('good-food', get_template_directory() . '/theme-framework/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'good_food_load_theme_textdomain')) {
	add_action('after_setup_theme', 'good_food_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('good_food_theme_activation')) {
	function good_food_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'good-food') {
			add_option('cmsmasters_active_theme', 'good-food', '', 'yes');
			
			
			good_food_add_global_options();
			
			
			good_food_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'good_food_theme_activation');



// Framework Deactivation
if (!function_exists('good_food_theme_deactivation')) {
	function good_food_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

add_action('switch_theme', 'good_food_theme_deactivation');



// Plugin Activation Regenerate Styles
if (!function_exists('good_food_plugin_activation')) {
	function good_food_plugin_activation() {
		update_option('cmsmasters_plugin_activation', 'true');
	}
}

add_action('activated_plugin', 'good_food_plugin_activation');


if (!function_exists('good_food_plugin_activation_regenerate')) {
	function good_food_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			good_food_regenerate_styles();
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'good_food_plugin_activation_regenerate');

/**
 * @snippet       Continue Shopping button @ Single Product Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=72772
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.1.1
 */
 
add_action( 'woocommerce_single_product_summary', 'bbloomer_continue_shopping_button', 31 );
 
function bbloomer_continue_shopping_button() {
  if ( wp_get_referer() ) echo '<a class="button continue" href="' . wp_get_referer() . '">Continue Shopping</a>';
}

