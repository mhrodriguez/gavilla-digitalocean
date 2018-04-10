<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Admin Settings
 * Created by CMSMasters
 * 
 */


/* General Settings */
function good_food_theme_options_general_fields($options, $tab) {	
	$options_new = array();
	
	if ($tab == 'header') {
		foreach ($options as $option) {
			if ($option['id'] == 'good-food' . '_header_add_cont') {
				$options_new[] = array( 
					'section' => 'header_section', 
					'id' => 'good-food' . '_header_social', 
					'title' => esc_html__('Header Social Icons', 'good-food'), 
					'desc' => esc_html__('show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 0 
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

add_filter('cmsmasters_options_general_fields_filter', 'good_food_theme_options_general_fields', 10, 2);



/* Single Settings */
function good_food_theme_options_single_fields($options, $tab) {
	$options_new = array();
	
	
	if ($tab == 'post') {
		foreach ($options as $option) {
			if ($option['id'] == 'good-food' . '_blog_post_nav_box') {
				$options_new[] = array( 
					'section' => 'post_section', 
					'id' => 'good-food' . '_blog_post_view', 
					'title' => esc_html__('Post Views', 'good-food'), 
					'desc' => esc_html__('show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
				
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_blog_post_layout') {
				// remove post layout field
			} else {
				$options_new[] = $option;
			}
		}
	} else if ($tab == 'project') {
		foreach ($options as $option) {
			if ($option['id'] == 'good-food' . '_portfolio_project_link') {
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_view', 
					'title' => esc_html__('Recipe Views', 'good-food'), 
					'desc' => esc_html__('show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
				
				$option['title'] = esc_html__('Recipe Link', 'good-food');
				
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_details_title') {
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_ingredients_title', 
					'title' => esc_html__('Recipe Ingredients Title', 'good-food'), 
					'desc' => esc_html__('Enter a recipe ingredients block title', 'good-food'), 
					'type' => 'text', 
					'std' => esc_html__('Ingredients', 'good-food')
				);
				
				$option['title'] = esc_html__('Recipe Nutrition Title', 'good-food');
				$option['desc'] = esc_html__('Enter a recipe nutrition block title', 'good-food');
				
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_date') {				
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_instructions_title', 
					'title' => esc_html__('Recipe Instructions Title', 'good-food'), 
					'desc' => esc_html__('Enter a recipe instructions block title', 'good-food'), 
					'type' => 'text', 
					'std' => esc_html__('Instructions', 'good-food')
				);
				
				$option['title'] = esc_html__('Recipe Date', 'good-food');
				
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_share_box') {				
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_excerpt', 
					'title' => esc_html__('Recipe Excerpt', 'good-food'), 
					'desc' => esc_html__('show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 1 
				);
				
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_title') {
				$option['title'] = esc_html__('Recipe Title', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_cat') {
				$option['title'] = esc_html__('Recipe Categories', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_author') {
				$option['title'] = esc_html__('Recipe Author', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_comment') {
				$option['title'] = esc_html__('Recipe Comments', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_tag') {
				$option['title'] = esc_html__('Recipe Tags', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_nav_box') {
				$options_new[] = array( 
					'section' => 'project_section', 
					'id' => 'good-food' . '_portfolio_project_print_btn', 
					'title' => esc_html__('Recipe Print Button', 'good-food'), 
					'desc' => esc_html__('show', 'good-food'), 
					'type' => 'checkbox', 
					'std' => 1
				);
				
				
				$option['title'] = esc_html__('Recipes Navigation Box', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_more_projects_box') {
				$option['title'] = esc_html__('More Recipes Box', 'good-food');
				$option['choices'] = array( 
					esc_html__('Show Related Recipes', 'good-food') . '|related', 
					esc_html__('Show Popular Recipes', 'good-food') . '|popular', 
					esc_html__('Show Recent Recipes', 'good-food') . '|recent', 
					esc_html__('Hide More Recipes Box', 'good-food') . '|hide' 
				);
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_more_projects_count') {
				$option['title'] = esc_html__('More Recipes Box Items Number', 'good-food');
				$option['desc'] = esc_html__('recipes', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_more_projects_pause') {
				$option['title'] = esc_html__('More Recipes Slider Pause Time', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_project_slug') {
				$option['title'] = esc_html__('Recipe Slug', 'good-food');
				$option['desc'] = esc_html__('Enter a page slug that should be used for your recipes single item', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_pj_categs_slug') {
				$option['title'] = esc_html__('Recipe Categories Slug', 'good-food');
				$option['desc'] = esc_html__('Enter page slug that should be used on recipes categories archive page', 'good-food');
				
				$options_new[] = $option;
			} elseif ($option['id'] == 'good-food' . '_portfolio_pj_tags_slug') {
				$option['title'] = esc_html__('Recipe Categories Slug', 'good-food');
				$option['desc'] = esc_html__('Enter page slug that should be used on recipes tags archive page', 'good-food');
				
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

add_filter('cmsmasters_options_single_fields_filter', 'good_food_theme_options_single_fields', 10, 2);



/* Single Tabs */
function good_food_theme_options_single_tabs($tabs) {
	$tabs['project'] = esc_attr__('Recipe', 'good-food');
	
	return $tabs;
}

add_filter('cmsmasters_options_single_tabs_filter', 'good_food_theme_options_single_tabs', 10, 2);



/* Single Sections */
function good_food_theme_options_single_sections($sections, $tab) {
	if ($tab == 'project') {
		$sections['project_section'] = esc_attr__('Recipe Options', 'good-food');
	}
	
	return $sections;
}

add_filter('cmsmasters_options_single_sections_filter', 'good_food_theme_options_single_sections', 10, 2);


