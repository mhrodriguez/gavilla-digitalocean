<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Header Bottom Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();


echo '<div class="header_bot" data-height="' . esc_attr($cmsmasters_option['good-food' . '_header_bot_height']) . '">' . 
	'<div class="header_bot_outer">' . 
		'<div class="header_bot_inner">';
			do_action('cmsmasters_before_header_bot', $cmsmasters_option);
			
			do_action('cmsmasters_before_logo', $cmsmasters_option);
			echo '<div class="logo_wrap">';
				
				good_food_logo();
				
			echo '</div>';
			do_action('cmsmasters_after_logo', $cmsmasters_option);
			
			do_action('cmsmasters_after_header_bot', $cmsmasters_option);
		echo '</div>' . 
	'</div>' . 
'</div>';

