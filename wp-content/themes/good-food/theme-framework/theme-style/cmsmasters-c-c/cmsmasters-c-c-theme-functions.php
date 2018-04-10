<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function good_food_theme_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('good-food-composer-shortcodes-extend', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-theme-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('good-food-composer-shortcodes-extend', 'cmsmasters_theme_shortcodes', array( 
			'choice_view' => 										esc_attr__('Views', 'good-food'), 
			'heading_field_shaped_check' => 						esc_attr__('Diamond-shaped style', 'good-food'), 
			
			'portfolio_title' => 									esc_attr__('Recipes', 'good-food'), 
			'portfolio_field_orderby_descr' => 						esc_attr__('Choose your recipes order by parameter', 'good-food'), 			
			'portfolio_field_pj_number_title' =>					esc_attr__('Recipes Number', 'good-food'),
			'portfolio_field_pj_number_descr' =>					esc_attr__('Enter the number of recipes for showing per page', 'good-food'),
			'portfolio_field_pj_number_descr_note' =>				esc_attr__('number, if empty - show all recipes', 'good-food'), 
			'portfolio_field_categories_descr' =>					esc_attr__('Show recipes associated with certain categories.', 'good-food'),
			'portfolio_field_categories_descr_note' =>				esc_attr__("If you don't choose any recipe categories, all your recipes will be shown", 'good-food'),			
			'portfolio_field_layout_descr' =>						esc_attr__('Choose layout type for your recipes', 'good-food'),
			'portfolio_field_layout_choice_grid' =>					esc_attr__('Recipes Grid', 'good-food'),
			'portfolio_field_layout_mode_descr' =>					esc_attr__('Choose grid layout mode for your recipes', 'good-food'),			
			'portfolio_field_col_count_descr' =>					esc_attr__('Choose number of recipes per row', 'good-food'),
			'portfolio_field_metadata_descr' =>						esc_attr__('Choose recipes metadata that you want to show', 'good-food'),
			'portfolio_field_gap_descr' =>							esc_attr__('Choose the gap between recipes', 'good-food'),
			'portfolio_field_filter_descr' =>						esc_attr__('If checked, enable recipes category filter', 'good-food'),
			'portfolio_field_sorting_descr' =>						esc_attr__('If checked, enable recipes date & name sorting', 'good-food'), 
			
			'posts_slider_field_poststype_choice_project' =>		esc_attr__('Recipes', 'good-food'),
			'posts_slider_field_pjcateg_title' =>					esc_attr__('Recipes Categories', 'good-food'),
			'posts_slider_field_pjcateg_descr' =>					esc_attr__('Show recipes associated with certain categories.', 'good-food'),
			'posts_slider_field_pjcateg_descr_note' =>				esc_attr__("If you don't choose any recipes categories, all your recipes will be shown", 'good-food'),			
			'posts_slider_field_col_count_descr' =>					esc_attr__('Choose number of recipes per row', 'good-food'),			
			'posts_slider_field_pjmeta_title' =>					esc_attr__('Recipes Metadata', 'good-food'),
			'posts_slider_field_pjmeta_descr' =>					esc_attr__('Choose recipes metadata you want to be shown', 'good-food')
		));
	}
}

add_action('admin_enqueue_scripts', 'good_food_theme_register_c_c_scripts');


/* Special Heading Shortcode Attributes Filter */
function cmsmasters_custom_heading_atts() {
	return array( 
		'shortcode_id' => 			'', 
		'type' => 					'h2', 
		'shaped' => 				'', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'font_weight' => 			'default', 
		'font_style' => 			'default', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'link_color_h' => 			'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'underline' => 				'', 
		'underline_height' => 		'1', 
		'underline_style' => 		'solid', 
		'underline_color' => 		'', 
		'custom_check' =>  			'', 
		'width_monitor' =>  		'767', 
		'custom_font_size' => 		'', 
		'custom_line_height' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
	);
}

add_filter('cmsmasters_custom_heading_atts_filter', 'cmsmasters_custom_heading_atts');


