<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


require_once(get_template_directory() . '/framework/class/class-tgm-plugin-activation.php');


if (!function_exists('good_food_register_theme_plugins')) {

function good_food_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Contact Form Builder', 'good-food'), 
			'slug'					=> 'cmsmasters-contact-form-builder', 
			'source'				=> get_template_directory() . '/theme-framework/plugins/cmsmasters-contact-form-builder.zip', 
			'required'				=> false, 
			'version'				=> '1.3.9', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'good-food'), 
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory() . '/theme-framework/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '2.1.3', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'good-food'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory() . '/theme-framework/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'good-food'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory() . '/theme-framework/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '6.5.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'good-food'), 
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory() . '/theme-framework/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '5.4.5.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('WooCommerce', 'good-food'), 
			'slug' 					=> 'woocommerce', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('The Events Calendar', 'good-food'), 
			'slug' 					=> 'the-events-calendar', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'good-food'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WordPress SEO by Yoast', 'good-food'), 
			'slug' 					=> 'wordpress-seo', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('MailPoet Newsletters', 'good-food'), 
			'slug'					=> 'wysija-newsletters', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('WP-PostRatings', 'good-food'), 
			'slug'					=> 'wp-postratings', 
			'required'				=> false 
		)
	);
	
	
	$config = array( 
		'id' => 			'good-food', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'good-food'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'good-food'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'good-food') 
		) 
	);
	
	
	tgmpa($plugins, $config);
}

}

add_action('tgmpa_register', 'good_food_register_theme_plugins');

