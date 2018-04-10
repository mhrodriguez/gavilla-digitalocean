<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Tribe Events Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts */
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/plugin-settings.php');
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-colors.php');
require_once(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/plugin-fonts.php');


/* Register CSS Styles and Scripts */
function good_food_tribe_events_register_styles_scripts() {
	// Styles
	wp_enqueue_style('good-food-tribe-events-style', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-style.css', array(), '1.0.0', 'screen');
	
	wp_enqueue_style('good-food-tribe-events-adaptive', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-adaptive.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('good-food-tribe-events-rtl', get_template_directory_uri() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/css/plugin-rtl.css', array(), '1.0.0', 'screen');
	}
}

add_action('wp_enqueue_scripts', 'good_food_tribe_events_register_styles_scripts');


/* Replace Styles */
function good_food_tribe_events_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_stylesheet_url', 'good_food_tribe_events_stylesheet_url');


/* Replace Pro Styles */
function good_food_tribe_events_pro_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_stylesheet_url', 'good_food_tribe_events_pro_stylesheet_url');


/* Replace Widget Styles */
function good_food_tribe_events_pro_widget_calendar_stylesheet_url() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_widget_calendar_stylesheet_url', 'good_food_tribe_events_pro_widget_calendar_stylesheet_url');


/* Replace Responsive Styles */
function good_food_tribe_events_mobile_breakpoint() {
    return 768;
}

add_filter('tribe_events_mobile_breakpoint', 'good_food_tribe_events_mobile_breakpoint');


/* Add class to next button in single event navigation */
function good_food_tribe_link_next_class($format){
	$format = str_replace('href=', 'class="cmsmasters_next_post" href=', $format);
	
	return $format;
}

add_filter('tribe_the_next_event_link', 'good_food_tribe_link_next_class');


/* Add class to previous button in single event navigation */
function good_food_tribe_link_prev_class($format) {
	$format = str_replace("href=", 'class="cmsmasters_prev_post" href=', $format);
	
	return $format;
}

add_filter('tribe_the_prev_event_link', 'good_food_tribe_link_prev_class');

