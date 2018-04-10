<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Header Middle Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();


echo '<div class="header_mid" data-height="' . esc_attr($cmsmasters_option['good-food' . '_header_mid_height']) . '">' . 
	'<div class="header_mid_outer">' . 
		'<div class="header_mid_inner">' . 
			'<div class="header_mid_inner_cont">';
				do_action('cmsmasters_before_header_mid', $cmsmasters_option);
				
				if (
					$cmsmasters_option['good-food' . '_header_social'] && 
					isset($cmsmasters_option['good-food' . '_social_icons'])
				) {
					good_food_social_icons();
				}
				
				
				if (
					$cmsmasters_option['good-food' . '_header_search']
				) {
					echo '<div class="mid_search_but_wrap">' . 
						'<a href="' . esc_js("javascript:void(0)") . '" class="mid_search_but cmsmasters_header_search_but cmsmasters_theme_icon_search"></a>' . 
					'</div>';
				}
				
				
				do_action('cmsmasters_after_header_search', $cmsmasters_option);
				
				
				do_action('cmsmasters_before_logo', $cmsmasters_option);
				echo '<div class="logo_wrap">';
					
					good_food_logo();
					
				echo '</div>';
				do_action('cmsmasters_after_logo', $cmsmasters_option);
				
				
				echo '<div class="resp_mid_nav_wrap">' . 
					'<div class="resp_mid_nav_outer">' . 
						'<a class="responsive_nav resp_mid_nav cmsmasters_theme_icon_resp_nav" href="' . esc_js("javascript:void(0)") . '"></a>' . 
					'</div>' . 
				'</div>';
				
				
				echo '<!-- _________________________ Start Navigation _________________________ -->' . 
				'<div class="mid_nav_wrap">' . 
					'<nav>';
						
						$nav_args = array( 
							'theme_location' => 	'primary', 
							'menu_id' => 			'navigation', 
							'menu_class' => 		'mid_nav navigation', 
							'link_before' => 		'<span class="nav_item_wrap">', 
							'link_after' => 		'</span>', 
							'fallback_cb' => 		'good_food_fallback_menu' 
						);
						
						
						if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
							$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
						}
						
						
						wp_nav_menu($nav_args);
						
					echo '</nav>' . 
				'</div>' . 
				'<!-- _________________________ Finish Navigation _________________________ -->';
				
				
				do_action('cmsmasters_after_header_mid', $cmsmasters_option);
			echo '</div>' . 
		'</div>' . 
	'</div>' . 
'</div>';

