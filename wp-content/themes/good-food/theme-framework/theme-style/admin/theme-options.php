<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Admin Options
 * Created by CMSMasters
 * 
 */


/* Filter for Options */
function good_food_theme_meta_fields($custom_all_meta_fields) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$custom_all_meta_fields_new = array();
	
	
	if (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'post') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'post') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'post') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if (
				$custom_all_meta_field['id'] == 'cmsmasters_layout' && 
				$custom_all_meta_field['type'] != 'tab_start' && 
				$custom_all_meta_field['type'] != 'tab_finish'
			) {
				// remove layout field
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_sidebar_id') {
				// remove right/left sidebar field
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_post_sharing_box') {				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Post Subtitle', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_post_subtitle', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} elseif (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'project') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'project') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'project') 
	) {
		$cmsmasters_global_portfolio_project_details_title = (isset($cmsmasters_option['good-food' . '_portfolio_project_ingredients_title']) && $cmsmasters_option['good-food' . '_portfolio_project_ingredients_title'] !== '') ? $cmsmasters_option['good-food' . '_portfolio_project_ingredients_title'] : '';
		
		$cmsmasters_global_portfolio_project_instructions_title = (isset($cmsmasters_option['good-food' . '_portfolio_project_instructions_title']) && $cmsmasters_option['good-food' . '_portfolio_project_instructions_title'] !== '') ? $cmsmasters_option['good-food' . '_portfolio_project_instructions_title'] : '';
		
		$cmsmasters_global_portfolio_project_excerpt = (isset($cmsmasters_option['good-food' . '_portfolio_project_excerpt']) && $cmsmasters_option['good-food' . '_portfolio_project_excerpt'] !== '') ? $cmsmasters_option['good-food' . '_portfolio_project_excerpt'] : '';
		
		$cmsmasters_global_portfolio_project_print_btn = (isset($cmsmasters_option['good-food' . '_portfolio_project_print_btn']) && $cmsmasters_option['good-food' . '_portfolio_project_print_btn'] !== '') ? $cmsmasters_option['good-food' . '_portfolio_project_print_btn'] : '';
		
		
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if ($custom_all_meta_field['id'] == 'cmsmasters_project_image_show') {
				$custom_all_meta_field['label'] = esc_html__('Don\'t Show Featured Image in Open Recipe', 'good-food');
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_project_details_title') {	
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Subtitle', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_subtitle', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Title', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_title', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Text', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_text', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Title 2', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_title2', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Text 2', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_text2', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Title 3', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_title3', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Text 3', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_text3', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Title 4', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_title4', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Info Text 4', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_info_text4', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> ''
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__("Recipe Excerpt", 'good-food'), 
					'desc' => esc_html__('Show', 'good-food'), 
					'id'	=> 'cmsmasters_project_excerpt', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_portfolio_project_excerpt
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Ingredients Title', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_ingredients_title', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_portfolio_project_details_title
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Ingredients', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_ingredients', 
					'type'	=> 'repeatable', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_field['label'] = esc_html__('Recipe Nutrition Title', 'good-food');
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_project_features') {
				$custom_all_meta_field['label'] = esc_html__('Recipe Nutrition', 'good-food');
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_project_sharing_box') {
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Instructions Title', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_instructions_title', 
					'type'	=> 'text', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_portfolio_project_instructions_title
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Recipe Instructions', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_project_instructions', 
					'type'	=> 'repeatable', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif ($custom_all_meta_field['id'] == 'cmsmasters_project_author_box') {				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__("Recipe Print Button", 'good-food'), 
					'desc' => esc_html__('Show', 'good-food'), 
					'id'	=> 'cmsmasters_project_print_btn', 
					'type'	=> 'checkbox', 
					'hide'	=> '', 
					'std'	=> $cmsmasters_global_portfolio_project_print_btn
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else if (
				$custom_all_meta_field['id'] == 'cmsmasters_project_images'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Images', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_title'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Title', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_size'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Size', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_details_title'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Details Title', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Info', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_link_text'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Link Text', 'good-food');
				$custom_all_meta_field['std'] = esc_html__('View Recipe', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_link_url'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Link URL', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_link_redirect'
			) {	
				$custom_all_meta_field['desc'] = esc_html__('Redirect to recipe link URL instead of opening recipe page', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_link_target'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Link Target', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_one_title'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 1 Title', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_one'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 1', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_two_title'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 2 Title', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_two'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 2', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_three_title'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 3 Title', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_features_three'
			) {	
				$custom_all_meta_field['label'] = esc_html__('Recipe Features 3', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} elseif (
				$custom_all_meta_field['id'] == 'cmsmasters_project_tabs'
			) {
				$custom_all_meta_field['options']['cmsmasters_project']['label'] = esc_html__('Recipe', 'good-food');
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} elseif (
		(isset($_GET['post_type']) && $_GET['post_type'] == 'profile') || 
		(isset($_POST['post_type']) && $_POST['post_type'] == 'profile') || 
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'profile') 
	) {
		foreach ($custom_all_meta_fields as $custom_all_meta_field) {
			if (
				$custom_all_meta_field['id'] == 'cmsmasters_profile_social'
			) {	
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Profile Contact Info Title', 'good-food'), 
					'desc'	=> '', 
					'id'	=> 'cmsmasters_profile_contact_info_title', 
					'type'	=> 'text_long', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				$custom_all_meta_fields_new[] = array( 
					'label'	=> esc_html__('Profile Contact Info', 'good-food'), 
					'desc'	=> esc_html__('Add contact info for this profile', 'good-food'), 
					'id'	=> 'cmsmasters_profile_contact_info', 
					'type'	=> 'contact', 
					'hide'	=> '', 
					'std'	=> '' 
				);
				
				
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			} else {
				$custom_all_meta_fields_new[] = $custom_all_meta_field;
			}
		}
	} else {
		$custom_all_meta_fields_new = $custom_all_meta_fields;
	}
	
	
	return $custom_all_meta_fields_new;
}

add_filter('get_custom_all_meta_fields_filter', 'good_food_theme_meta_fields');