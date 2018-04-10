<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Settings Defaults
 * Created by CMSMasters
 * 
 */


/* Theme Settings General Default Values */
if (!function_exists('good_food_settings_general_defaults')) {

function good_food_settings_general_defaults($id = false) {
	$settings = array( 
		'general' => array( 
			'good-food' . '_theme_layout' => 		'liquid', 
			'good-food' . '_logo_type' => 			'image', 
			'good-food' . '_logo_url' => 			'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png', 
			'good-food' . '_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_retina.png', 
			'good-food' . '_logo_title' => 			get_bloginfo('name') ? get_bloginfo('name') : 'Good Food', 
			'good-food' . '_logo_subtitle' => 		'', 
			'good-food' . '_logo_custom_color' => 	0, 
			'good-food' . '_logo_title_color' => 	'', 
			'good-food' . '_logo_subtitle_color' => 	'' 
		), 
		'bg' => array( 
			'good-food' . '_bg_col' => 			'#ffffff', 
			'good-food' . '_bg_img_enable' => 	0, 
			'good-food' . '_bg_img' => 			'', 
			'good-food' . '_bg_rep' => 			'repeat', 
			'good-food' . '_bg_pos' => 			'top center', 
			'good-food' . '_bg_att' => 			'scroll', 
			'good-food' . '_bg_size' => 			'auto' 
		), 
		'header' => array( 
			'good-food' . '_fixed_header' => 				1, 
			'good-food' . '_header_overlaps' => 				0, 
			'good-food' . '_header_top_line' => 				0, 
			'good-food' . '_header_top_height' => 			'38', 
			'good-food' . '_header_top_line_short_info' => 	'', 
			'good-food' . '_header_top_line_add_cont' => 	'social', 
			'good-food' . '_header_styles' => 				'default', 
			'good-food' . '_header_mid_height' => 			'65', 
			'good-food' . '_header_bot_height' => 			'210', 
			'good-food' . '_header_search' => 				1, 
			'good-food' . '_header_add_cont' => 				'social', 
			'good-food' . '_header_add_cont_cust_html' => 	'' 
		), 
		'content' => array( 
			'good-food' . '_layout' => 					'r_sidebar', 
			'good-food' . '_archives_layout' => 			'r_sidebar', 
			'good-food' . '_search_layout' => 			'r_sidebar', 
			'good-food' . '_other_layout' => 			'r_sidebar', 
			'good-food' . '_heading_alignment' => 		'left', 
			'good-food' . '_heading_scheme' => 			'default', 
			'good-food' . '_heading_bg_image_enable' => 	0, 
			'good-food' . '_heading_bg_image' => 		'', 
			'good-food' . '_heading_bg_repeat' => 		'no-repeat', 
			'good-food' . '_heading_bg_attachment' => 	'scroll', 
			'good-food' . '_heading_bg_size' => 			'cover', 
			'good-food' . '_heading_bg_color' => 		'', 
			'good-food' . '_heading_height' => 			'170', 
			'good-food' . '_breadcrumbs' => 				1, 
			'good-food' . '_bottom_scheme' => 			'first', 
			'good-food' . '_bottom_sidebar' => 			1, 
			'good-food' . '_bottom_sidebar_layout' => 	'14141414' 
		), 
		'footer' => array( 
			'good-food' . '_footer_scheme' => 				'footer', 
			'good-food' . '_footer_type' => 					'default', 
			'good-food' . '_footer_additional_content' => 	'nav', 
			'good-food' . '_footer_logo' => 					1, 
			'good-food' . '_footer_logo_url' => 				'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer.png', 
			'good-food' . '_footer_logo_url_retina' => 		'|' . get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo_footer_retina.png', 
			'good-food' . '_footer_nav' => 					1, 
			'good-food' . '_footer_social' => 				1, 
			'good-food' . '_footer_html' => 					'', 
			'good-food' . '_footer_copyright' => 			'Good Food' . ' &copy; 2017 / ' . esc_html__('All Rights Reserved', 'good-food') 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Add Google Font */
if (!function_exists('good_food_add_foogle_font')) {

function good_food_add_foogle_font($fonts) {
	$fonts['Lora:400,400i,700,700i'] = 'Lora';	
	$fonts['Karla:400,400i,700,700i'] = 'Karla';
	
	return $fonts;
}

}

add_filter('good_food_google_fonts_list_filter', 'good_food_add_foogle_font');



/* Theme Settings Fonts Default Values */
if (!function_exists('good_food_settings_font_defaults')) {

function good_food_settings_font_defaults($id = false) {
	$settings = array( 
		'content' => array( 
			'good-food' . '_content_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'18', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			) 
		), 
		'link' => array( 
			'good-food' . '_link_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'18', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_link_hover_decoration' => 	'none' 
		), 
		'nav' => array( 
			'good-food' . '_nav_title_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Karla:400,400i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'good-food' . '_nav_dropdown_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Karla:400,400i,700,700i', 
				'font_size' => 			'14', 
				'line_height' => 		'26', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			) 
		), 
		'heading' => array( 
			'good-food' . '_h1_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Oswald:300,400,700', 
				'font_size' => 			'45', 
				'line_height' => 		'58', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_h2_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'32', 
				'line_height' => 		'42', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_h3_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Oswald:300,400,700', 
				'font_size' => 			'28', 
				'line_height' => 		'36', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_h4_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Oswald:300,400,700', 
				'font_size' => 			'24', 
				'line_height' => 		'30', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_h5_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'good-food' . '_h6_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Karla:400,400i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'18', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			) 
		), 
		'other' => array( 
			'good-food' . '_button_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Karla:400,400i,700,700i', 
				'font_size' => 			'16', 
				'line_height' => 		'50', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'good-food' . '_small_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'14', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic', 
				'text_transform' => 	'none' 
			), 
			'good-food' . '_input_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'15', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'good-food' . '_quote_font' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Lora:400,400i,700,700i', 
				'font_size' => 			'18', 
				'line_height' => 		'28', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			) 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {

function cmsmasters_color_picker_palettes() {
	$palettes = array( 
		'#000000', 
		'#ffffff', 
		'#2c3b4b', 
		'#ff7055', 
		'#8e9092', 
		'#fffef7', 
		'#ffffff', 
		'#dcd9c9' 
	);
	
	
	return $palettes;
}

}



// Theme Settings Color Schemes Default Colors
if (!function_exists('good_food_color_schemes_defaults')) {

function good_food_color_schemes_defaults($id = false) {
	$settings = array( 
		'default' => array( // content default color scheme
			'color' => 		'#2c3b4b', 
			'link' => 		'#ff7055', 
			'hover' => 		'#8e9092', 
			'heading' => 	'#2c3b4b', 
			'bg' => 		'#fffef7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#dcd9c9' 
		), 
		'header' => array( // Header color scheme
			'mid_color' => 		'#2c3b4b', 
			'mid_link' => 		'#2c3b4b', 
			'mid_hover' => 		'#8e9092', 
			'mid_bg' => 		'#fffef7', 
			'mid_bg_scroll' => 	'#fffef7', 
			'mid_border' => 	'#dcd9c9', 
			'bot_color' => 		'#2c3b4b', 
			'bot_link' => 		'#2c3b4b', 
			'bot_hover' => 		'#8e9092', 
			'bot_bg' => 		'#fffef7', 
			'bot_bg_scroll' => 	'#fffef7', 
			'bot_border' => 	'#dcd9c9' 
		), 
		'navigation' => array( // Navigation color scheme
			'title_link' => 			'#2c3b4b', 
			'title_link_hover' => 		'#8e9092', 
			'title_link_current' => 	'#2c3b4b', 
			'title_link_subtitle' => 	'rgba(44,59,75,0.3)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_bg_current' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_text' => 			'#2c3b4b', 
			'dropdown_bg' => 			'#fffef7', 
			'dropdown_border' => 		'#dcd9c9', 
			'dropdown_link' => 			'#2c3b4b', 
			'dropdown_link_hover' => 	'#8e9092', 
			'dropdown_link_subtitle' => 'rgba(44,59,75,0.3)', 
			'dropdown_link_highlight' => '#8e9092', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 					'rgba(255,255,255,0.8)', 
			'link' => 					'rgba(255,255,255,0.8)', 
			'hover' => 					'rgba(255,255,255,0.5)', 
			'bg' => 					'#2c3b4b', 
			'border' => 				'rgba(255,255,255,0)', 
			'title_link' => 			'rgba(255,255,255,0.8)', 
			'title_link_hover' => 		'rgba(255,255,255,0.5)', 
			'title_link_bg' => 			'rgba(255,255,255,0)', 
			'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
			'title_link_border' => 		'rgba(255,255,255,0)', 
			'dropdown_bg' => 			'#364759', 
			'dropdown_border' => 		'rgba(255,255,255,0)', 
			'dropdown_link' => 			'#ffffff', 
			'dropdown_link_hover' => 	'rgba(255,255,255,0.5)', 
			'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
			'dropdown_link_border' => 	'rgba(255,255,255,0)' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'rgba(255,255,255,0.7)', 
			'link' => 		'#ffffff', 
			'hover' => 		'rgba(255,255,255,0.7)', 
			'heading' => 	'#ffffff', 
			'bg' => 		'#1e2732', 
			'alternate' => 	'#1e2732', 
			'border' => 	'rgba(255,255,255,0)' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#2c3b4b', 
			'link' => 		'#ff7055', 
			'hover' => 		'#8e9092', 
			'heading' => 	'#2c3b4b', 
			'bg' => 		'#fffef7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#dcd9c9' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#2c3b4b', 
			'link' => 		'#ff7055', 
			'hover' => 		'#8e9092', 
			'heading' => 	'#2c3b4b', 
			'bg' => 		'#fffef7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#dcd9c9' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#2c3b4b', 
			'link' => 		'#ff7055', 
			'hover' => 		'#8e9092', 
			'heading' => 	'#2c3b4b', 
			'bg' => 		'#fffef7', 
			'alternate' => 	'#ffffff', 
			'border' => 	'#dcd9c9' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Elements Default Values
if (!function_exists('good_food_settings_element_defaults')) {

function good_food_settings_element_defaults($id = false) {
	$settings = array( 
		'sidebar' => array( 
			'good-food' . '_sidebar' => 	'' 
		), 
		'icon' => array( 
			'good-food' . '_social_icons' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'good-food') . '|true|#2c3b4b|#8e9092', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'good-food') . '|true|#2c3b4b|#8e9092', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'good-food') . '|true|#2c3b4b|#8e9092', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'good-food') . '|true|#2c3b4b|#8e9092', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'good-food') . '|true|#2c3b4b|#8e9092' 
			) 
		), 
		'lightbox' => array( 
			'good-food' . '_ilightbox_skin' => 					'dark', 
			'good-food' . '_ilightbox_path' => 					'vertical', 
			'good-food' . '_ilightbox_infinite' => 				0, 
			'good-food' . '_ilightbox_aspect_ratio' => 			1, 
			'good-food' . '_ilightbox_mobile_optimizer' => 		1, 
			'good-food' . '_ilightbox_max_scale' => 				1, 
			'good-food' . '_ilightbox_min_scale' => 				0.2, 
			'good-food' . '_ilightbox_inner_toolbar' => 			0, 
			'good-food' . '_ilightbox_smart_recognition' => 		0, 
			'good-food' . '_ilightbox_fullscreen_one_slide' => 	0, 
			'good-food' . '_ilightbox_fullscreen_viewport' => 	'center', 
			'good-food' . '_ilightbox_controls_toolbar' => 		1, 
			'good-food' . '_ilightbox_controls_arrows' => 		0, 
			'good-food' . '_ilightbox_controls_fullscreen' => 	1, 
			'good-food' . '_ilightbox_controls_thumbnail' => 	1, 
			'good-food' . '_ilightbox_controls_keyboard' => 		1, 
			'good-food' . '_ilightbox_controls_mousewheel' => 	1, 
			'good-food' . '_ilightbox_controls_swipe' => 		1, 
			'good-food' . '_ilightbox_controls_slideshow' => 	0 
		), 
		'sitemap' => array( 
			'good-food' . '_sitemap_nav' => 			1, 
			'good-food' . '_sitemap_categs' => 		1, 
			'good-food' . '_sitemap_tags' => 		1, 
			'good-food' . '_sitemap_month' => 		1, 
			'good-food' . '_sitemap_pj_categs' => 	1, 
			'good-food' . '_sitemap_pj_tags' => 		1 
		), 
		'error' => array( 
			'good-food' . '_error_color' => 				'#2c3b4b', 
			'good-food' . '_error_bg_color' => 			'#fffef7', 
			'good-food' . '_error_bg_img_enable' => 		0, 
			'good-food' . '_error_bg_image' => 			'', 
			'good-food' . '_error_bg_rep' => 			'no-repeat', 
			'good-food' . '_error_bg_pos' => 			'top center', 
			'good-food' . '_error_bg_att' => 			'scroll', 
			'good-food' . '_error_bg_size' => 			'cover', 
			'good-food' . '_error_search' => 			1, 
			'good-food' . '_error_sitemap_button' => 	1, 
			'good-food' . '_error_sitemap_link' => 		'' 
		), 
		'code' => array( 
			'good-food' . '_custom_css' => 			'', 
			'good-food' . '_custom_js' => 			'', 
			'good-food' . '_gmap_api_key' => 		'', 
			'good-food' . '_api_key' => 				'', 
			'good-food' . '_api_secret' => 			'', 
			'good-food' . '_access_token' => 		'', 
			'good-food' . '_access_token_secret' => 	'' 
		), 
		'recaptcha' => array( 
			'good-food' . '_recaptcha_public_key' => 	'', 
			'good-food' . '_recaptcha_private_key' => 	'' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



// Theme Settings Single Posts Default Values
if (!function_exists('good_food_settings_single_defaults')) {

function good_food_settings_single_defaults($id = false) {
	$settings = array( 
		'post' => array( 
			'good-food' . '_blog_post_layout' => 		'fullwidth', 
			'good-food' . '_blog_post_title' => 			0, 
			'good-food' . '_blog_post_date' => 			1, 
			'good-food' . '_blog_post_cat' => 			1, 
			'good-food' . '_blog_post_author' => 		1, 
			'good-food' . '_blog_post_comment' => 		1, 
			'good-food' . '_blog_post_tag' => 			1, 
			'good-food' . '_blog_post_like' => 			1, 
			'good-food' . '_blog_post_nav_box' => 		1, 
			'good-food' . '_blog_post_share_box' => 		1, 
			'good-food' . '_blog_post_author_box' => 	1, 
			'good-food' . '_blog_more_posts_box' => 		'popular', 
			'good-food' . '_blog_more_posts_count' => 	'3', 
			'good-food' . '_blog_more_posts_pause' => 	'5' 
		), 
		'project' => array( 
			'good-food' . '_portfolio_project_title' => 			1, 
			'good-food' . '_portfolio_project_details_title' => 	esc_html__('Recipe details', 'good-food'), 
			'good-food' . '_portfolio_project_date' => 			1, 
			'good-food' . '_portfolio_project_cat' => 			1, 
			'good-food' . '_portfolio_project_author' => 		1, 
			'good-food' . '_portfolio_project_comment' => 		0, 
			'good-food' . '_portfolio_project_tag' => 			0, 
			'good-food' . '_portfolio_project_like' => 			1, 
			'good-food' . '_portfolio_project_link' => 			0, 
			'good-food' . '_portfolio_project_share_box' => 		1, 
			'good-food' . '_portfolio_project_nav_box' => 		1, 
			'good-food' . '_portfolio_project_author_box' => 	1, 
			'good-food' . '_portfolio_more_projects_box' => 		'popular', 
			'good-food' . '_portfolio_more_projects_count' => 	'4', 
			'good-food' . '_portfolio_more_projects_pause' => 	'5', 
			'good-food' . '_portfolio_project_slug' => 			'recipe', 
			'good-food' . '_portfolio_pj_categs_slug' => 		'pj-categs', 
			'good-food' . '_portfolio_pj_tags_slug' => 			'pj-tags' 
		), 
		'profile' => array( 
			'good-food' . '_profile_post_title' => 			1, 
			'good-food' . '_profile_post_details_title' => 	esc_html__('Profile details', 'good-food'), 
			'good-food' . '_profile_post_cat' => 			1, 
			'good-food' . '_profile_post_comment' => 		1, 
			'good-food' . '_profile_post_like' => 			1, 
			'good-food' . '_profile_post_nav_box' => 		1, 
			'good-food' . '_profile_post_share_box' => 		1, 
			'good-food' . '_profile_post_slug' => 			'profile', 
			'good-food' . '_profile_pl_categs_slug' => 		'pl-categs' 
		) 
	);
	
	
	if ($id) {
		return $settings[$id];
	} else {
		return $settings;
	}
}

}



/* Project Puzzle Proportion */
if (!function_exists('good_food_project_puzzle_proportion')) {

function good_food_project_puzzle_proportion() {
	return 1;
}

}



/* Theme Image Thumbnails Size */
if (!function_exists('good_food_get_image_thumbnail_list')) {

function good_food_get_image_thumbnail_list() {
	$list = array( 
		'cmsmasters-small-thumb' => array( 
			'width' => 		60, 
			'height' => 	60, 
			'crop' => 		true 
		), 
		'cmsmasters-square-thumb' => array( 
			'width' => 		500, 
			'height' => 	500, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Square', 'good-food') 
		), 
		'cmsmasters-blog-masonry-thumb' => array( 
			'width' => 		810, 
			'height' => 	535, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Masonry Blog', 'good-food') 
		), 
		'cmsmasters-project-thumb' => array( 
			'width' => 		810, 
			'height' => 	630, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Recipe', 'good-food') 
		), 
		'cmsmasters-project-masonry-thumb' => array( 
			'width' => 		810, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Recipe', 'good-food') 
		), 
		'post-thumbnail' => array( 
			'width' => 		810, 
			'height' => 	535, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Featured', 'good-food') 
		), 
		'cmsmasters-masonry-thumb' => array( 
			'width' => 		810, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry', 'good-food') 
		), 
		'cmsmasters-full-thumb' => array( 
			'width' => 		1620, 
			'height' => 	750, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Full', 'good-food') 
		), 
		'cmsmasters-project-full-thumb' => array( 
			'width' => 		1620, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		esc_attr__('Recipe Full', 'good-food') 
		), 
		'cmsmasters-full-masonry-thumb' => array( 
			'width' => 		1620, 
			'height' => 	9999, 
			'title' => 		esc_attr__('Masonry Full', 'good-food') 
		) 
	);
	
	
	return $list;
}

}



/* Project Post Type Registration Rename */
if (!function_exists('good_food_project_labels')) {

function good_food_project_labels() {
	return array( 
		'name' => 					esc_html__('Recipes', 'good-food'), 
		'singular_name' => 			esc_html__('Recipe', 'good-food'), 
		'menu_name' => 				esc_html__('Recipes', 'good-food'), 
		'all_items' => 				esc_html__('All Recipes', 'good-food'), 
		'add_new' => 				esc_html__('Add New', 'good-food'), 
		'add_new_item' => 			esc_html__('Add New Recipe', 'good-food'), 
		'edit_item' => 				esc_html__('Edit Recipe', 'good-food'), 
		'new_item' => 				esc_html__('New Recipe', 'good-food'), 
		'view_item' => 				esc_html__('View Recipe', 'good-food'), 
		'search_items' => 			esc_html__('Search Recipes', 'good-food'), 
		'not_found' => 				esc_html__('No recipes found', 'good-food'), 
		'not_found_in_trash' => 	esc_html__('No recipes found in Trash', 'good-food') 
	);
}

}

add_filter('cmsmasters_project_labels_filter', 'good_food_project_labels');


if (!function_exists('good_food_pj_categs_labels')) {

function good_food_pj_categs_labels() {
	return array( 
		'name' => 					esc_html__('Recipe Categories', 'good-food'), 
		'singular_name' => 			esc_html__('Recipe Category', 'good-food') 
	);
}

}

add_filter('cmsmasters_pj_categs_labels_filter', 'good_food_pj_categs_labels');


if (!function_exists('good_food_pj_tags_labels')) {

function good_food_pj_tags_labels() {
	return array( 
		'name' => 					esc_html__('Recipe Tags', 'good-food'), 
		'singular_name' => 			esc_html__('Recipe Tag', 'good-food') 
	);
}

}

add_filter('cmsmasters_pj_tags_labels_filter', 'good_food_pj_tags_labels');



/* Profile Post Type Registration Rename */
if (!function_exists('good_food_profile_labels')) {

function good_food_profile_labels() {
	return array( 
		'name' => 					esc_html__('Profiles', 'good-food'), 
		'singular_name' => 			esc_html__('Profiles', 'good-food'), 
		'menu_name' => 				esc_html__('Profiles', 'good-food'), 
		'all_items' => 				esc_html__('All Profiles', 'good-food'), 
		'add_new' => 				esc_html__('Add New', 'good-food'), 
		'add_new_item' => 			esc_html__('Add New Profile', 'good-food'), 
		'edit_item' => 				esc_html__('Edit Profile', 'good-food'), 
		'new_item' => 				esc_html__('New Profile', 'good-food'), 
		'view_item' => 				esc_html__('View Profile', 'good-food'), 
		'search_items' => 			esc_html__('Search Profiles', 'good-food'), 
		'not_found' => 				esc_html__('No Profiles found', 'good-food'), 
		'not_found_in_trash' => 	esc_html__('No Profiles found in Trash', 'good-food') 
	);
}

}

// add_filter('cmsmasters_profile_labels_filter', 'good_food_profile_labels');


if (!function_exists('good_food_pl_categs_labels')) {

function good_food_pl_categs_labels() {
	return array( 
		'name' => 					esc_html__('Profile Categories', 'good-food'), 
		'singular_name' => 			esc_html__('Profile Category', 'good-food') 
	);
}

}

// add_filter('cmsmasters_pl_categs_labels_filter', 'good_food_pl_categs_labels');

