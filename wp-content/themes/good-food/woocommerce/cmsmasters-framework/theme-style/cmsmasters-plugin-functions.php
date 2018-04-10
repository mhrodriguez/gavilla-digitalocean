<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * WooCommerce Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts */
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/plugin-options.php');
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-colors.php');
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-fonts.php');
require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-template-functions.php');


if (CMSMASTERS_CONTENT_COMPOSER && class_exists('Cmsmasters_Content_Composer')) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/cmsmasters-c-c-plugin-functions.php');
	
	require_once(get_template_directory() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/cmsmasters-c-c-plugin-shortcodes.php');
}


/* Register CSS Styles and Scripts */
function good_food_woocommerce_register_styles_scripts() {
	// Styles
	wp_enqueue_style('good-food-woocommerce-style', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('good-food-woocommerce-adaptive', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('good-food-woocommerce-rtl', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	// Scripts
	wp_enqueue_script('good-food-woocommerce-script', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/js/jquery.plugin-script.js', array('jquery'), '1.0.0', true);
	
	
	$cart_currency_symbol = get_woocommerce_currency_symbol();
	
	$cart_currency_symbol_pos = get_option('woocommerce_currency_pos');
	
	$currency_symbol = $cart_currency_symbol;
	
	
	if ($cart_currency_symbol_pos == 'left_space') {
		$currency_symbol = $cart_currency_symbol . ' ';
	} elseif ($cart_currency_symbol_pos == 'right_space') {
		$currency_symbol = ' ' . $cart_currency_symbol;
	}
	
	
	$shop_thumbnail_image_size = get_option('shop_thumbnail_image_size');
	
	
	wp_localize_script('good-food-woocommerce-script', 'cmsmasters_woo_script', array( 
		'currency_symbol' => 			$currency_symbol, 
		'thumbnail_image_width' => 		$shop_thumbnail_image_size['width'], 
		'thumbnail_image_height' => 	$shop_thumbnail_image_size['height'] 
	));
}

add_action('wp_enqueue_scripts', 'good_food_woocommerce_register_styles_scripts');


/* Register Default Woocommerce Theme Sidebar */
function good_food_woocommerce_the_widgets_init() {
    if (!function_exists('register_sidebars')) {
        return;
    }
    
	register_sidebar(
		array(
			'name' => esc_html__('Shop Sidebar', 'good-food'), 
			'id' => 'sidebar_shop', 
			'description' => esc_html__('Widgets in this area will be shown in left or right sidebar on shop page.', 'good-food'), 
			'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
			'after_widget' => '</aside>', 
			'before_title' => '<h3 class="widgettitle">', 
			'after_title' => '</h3>'
		)
	);
}

add_action('widgets_init', 'good_food_woocommerce_the_widgets_init');


add_theme_support('woocommerce');

add_filter('woocommerce_enqueue_styles', '__return_false');

