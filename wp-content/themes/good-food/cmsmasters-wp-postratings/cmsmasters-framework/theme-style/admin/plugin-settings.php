<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * WP-PostRating Admin Settings
 * Created by CMSMasters
 * 
 */


/* Single Settings */
function good_food_cmsmasters_rating_options_single_fields($options, $tab) {
	$options_new = array();
	
	
	if ($tab == 'project') {
		foreach($options as $option) {
			if ($option['id'] == 'good-food_portfolio_project_share_box') {
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_rating', 
					'title' => esc_html__('Recipe Rating', 'good-food'), 
					'desc' => esc_html__('Show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 1
				);
				
				$options_new[] = $option;
			} else {
				$options_new[] = $option;
			}
		}
	} else {
		$options_new = $options;
	}
	
	
	return $options_new;
}

add_filter('cmsmasters_options_single_fields_filter', 'good_food_cmsmasters_rating_options_single_fields', 10, 2);

