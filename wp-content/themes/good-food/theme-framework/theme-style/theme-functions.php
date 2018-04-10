<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Functions
 * Created by CMSMasters
 * 
 */


/* Load Framework Parts */
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/theme-settings.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/theme-options.php');

require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/class/theme-widgets.php');

require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/single-comment.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/theme-colors-primary.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/theme-colors-secondary.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/theme-fonts.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions-post.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions-project.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions-profile.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions-single.php');
require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/function/template-functions-shortcodes.php');


if (CMSMASTERS_CONTENT_COMPOSER && class_exists('Cmsmasters_Content_Composer')) {
	require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/cmsmasters-c-c-theme-functions.php');
	
	require_once(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/cmsmasters-c-c-theme-shortcodes.php');
}



/* Scripts for Admin */
function good_food_theme_admin_scripts() {
	wp_enqueue_script('cmsmasters-theme-settings-toggle-custom', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/js/theme-settings-toggle.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cmsmasters-theme-settings-toggle-custom', 'cmsmasters_theme_settings', array( 
		'shortname' => 	'good-food' 
	));
	
	
	wp_enqueue_script('cmsmasters-theme-options-toggle-custom', get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/admin/js/theme-options-toggle.js', array('jquery'), '1.0.0', true);
	
	wp_localize_script('cmsmasters-theme-options-toggle-custom', 'cmsmasters_theme_options', array( 
		'shortname' => 	'good-food' 
	));
}

add_action('admin_enqueue_scripts', 'good_food_theme_admin_scripts');


 
 
 
/* Register theme JS Scripts */
function good_food_register_theme_js_scripts() {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$cmsmasters_localize_array = array(
		'primary_color' => 	$cmsmasters_option['good-food' . '_default_link'] 
	);
	
	wp_localize_script('good-food-theme-script', 'cmsmasters_theme_script', $cmsmasters_localize_array);
}

add_action('wp_enqueue_scripts', 'good_food_register_theme_js_scripts');



/* Register Theme Navigations */
register_nav_menus(array( 
    'primary' => 	esc_html__('Primary Navigation', 'good-food'), 
    'footer' => 	esc_html__('Footer Navigation', 'good-food'), 
	'top_line' => 	esc_html__('Top Line Navigation', 'good-food') 
));



/* Register Showing Home Page on Default WordPress Pages Menu */
function cmsmasters_custom_mega_menu_item_output($args) {
	$shcd_args = $args['args'];
	
	$shcd_attrs = $args['attrs'];
	
	$shcd_depth = $args['depth'];
	
	$shcd_item = $args['item'];
	
	$shcd_cols_count = $args['cols_count'];
	
	
	$item_output = '';
	
	
	if (!empty($shcd_item->color)) {
		$shcd_attrs .= ' style="color:' . $shcd_item->color . ';"';
	}
	
	
	$item_output .= $shcd_args->before . 
		'<a' . $shcd_attrs . '>';
	
	
	$item_output .= $shcd_args->link_before;
	
	
	if ( 
		($shcd_depth <= 1 && empty($shcd_item->hide_text)) || 
		($shcd_depth == 0 && !empty($shcd_item->hide_text) && !empty($shcd_item->icon)) || 
		($shcd_depth == 1 && $shcd_cols_count == NULL && !empty($shcd_item->hide_text)) || 
		($shcd_depth == 1 && $shcd_cols_count != NULL && !empty($shcd_item->hide_text) && !empty($shcd_item->icon)) || 
		($shcd_depth > 1) 
	) {
		$item_output .= '<span class="nav_title' . (!empty($shcd_item->icon) ? ' ' . $shcd_item->icon : '') . '">';
		
			if (empty($shcd_item->hide_text)) {
				$item_output .= apply_filters('the_title', $shcd_item->title, $shcd_item->ID);
			}
			
		$item_output .= '</span>';
		
		
		if (!empty($shcd_item->tag)) {
			$item_output .= '<span class="nav_tag">' . esc_attr($shcd_item->tag) . '</span>';
		}
		
		
		if ( 
			($shcd_depth == 0 && !empty($shcd_item->subtitle)) || 
			($shcd_depth == 1 && $shcd_cols_count != NULL && !empty($shcd_item->subtitle)) 
		) {
			$item_output .= '<span class="nav_subtitle">' . 
				$shcd_item->subtitle . 
			'</span>';
		}
	}
	
	
	$item_output .= $shcd_args->link_after . 
		'</a>' . 
	$shcd_args->after;
	
	
	return $item_output;
}

add_filter('cmsmasters_mega_item_output', 'cmsmasters_custom_mega_menu_item_output');



/* Register wp_nav_menu() Fallback Function */
function good_food_fallback_menu($args) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	echo '<div class="navigation_wrap">' . "\n" . 
		'<ul id="navigation" class="' . 
			'navigation ' . 
			($cmsmasters_option['good-food' . '_header_styles'] == 'default' ? 'mid_nav' : 'bot_nav') . 
		'">' . "\n";
	
	
	wp_list_pages(array( 
		'title_li' => '', 
		'link_before' => '<span class="nav_item_wrap">', 
		'link_after' => '</span>' 
	));
	
	
	echo '</ul>' . "\r" . 
	'</div>' . "\n";
}



/* Logo Theme Styles */
function good_food_theme_logo_styles_custom() {
	$cmsmasters_option = good_food_get_global_options();
	
	$out = "";
	
	
	if ($cmsmasters_option['good-food' . '_logo_type'] == 'text') {
		if ($cmsmasters_option['good-food' . '_logo_custom_color']) {
			$out .= "
				#header a.logo span.title {
					" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_logo_title_color']) . "
				}
				
				#header a.logo span.title_text {
					" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_logo_subtitle_color']) . "
				}
			";
		}
	} else {
		$defaults = good_food_settings_general_defaults();
		
		$header_bot_height = (($cmsmasters_option['good-food' . '_header_bot_height'] !== '') ? $cmsmasters_option['good-food' . '_header_bot_height'] : $defaults[$tab]['good-food' . '_header_bot_height']);
		
		list($logo_width, $logo_height) = getimagesize(get_template_directory() . '/theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/img/logo.png');
		
		
		if ($cmsmasters_option['good-food' . '_logo_url'] == '') {
			if ($logo_height >= $header_bot_height) {
				$logo_def_style_width = (int) ($header_bot_height * ($logo_width / $logo_height));
			} else {
				$logo_def_style_width = $logo_width;
			}
			
			
			$out .= "
	.header_mid .header_mid_inner .logo_wrap, 
	.header_bot .header_bot_inner .logo_wrap {
		width : {$logo_def_style_width}px;
	}
	
	.header_mid_inner .logo .logo_retina, 
	.header_bot_inner .logo .logo_retina {
		width : {$logo_width}px;
		max-width: {$logo_width}px;
	}
";
		} else {
			$logo_img = explode('|', $cmsmasters_option['good-food' . '_logo_url']);
			
			
			if (is_numeric($logo_img[0])) {
				$logo_img_url = wp_get_attachment_image_src((int) $logo_img[0], 'full');
			}
			
			
			$logo_img_width = ((is_numeric($logo_img[0])) ? (int) $logo_img_url[1] : $logo_width);
			
			$logo_img_height = ((is_numeric($logo_img[0])) ? (int) $logo_img_url[2] : $logo_height);
			
			
			if ($logo_img_height >= $header_bot_height) {
				$logo_style_width = (int) ($header_bot_height * ($logo_img_width / $logo_img_height));
			} else {
				$logo_style_width = $logo_img_width;
			}
			
			
			$out .= "
	.header_mid .header_mid_inner .logo_wrap, 
	.header_bot .header_bot_inner .logo_wrap {
		width : {$logo_style_width}px;
	}
";
			
			
			if ($cmsmasters_option['good-food' . '_logo_url_retina'] != '') {
				$logo_img_retina = explode('|', $cmsmasters_option['good-food' . '_logo_url_retina']);
				
				
				if (is_numeric($logo_img_retina[0])) {
					$logo_img_retina_url = wp_get_attachment_image_src((int) $logo_img_retina[0], 'full');
				}
				
				
				$logo_img_retina_width = ((is_numeric($logo_img_retina[0])) ? ((int) $logo_img_retina_url[1] / 2) : $logo_width);
				
				
				$out .= "
	.header_mid_inner .logo .logo_retina, 
	.header_bot_inner .logo .logo_retina {
		width : {$logo_img_retina_width}px;
		max-width : {$logo_img_retina_width}px;
	}
";
			}
		}
	}
	
	
	wp_add_inline_style('good-food-style', $out);
}

add_action('wp_enqueue_scripts', 'good_food_theme_logo_styles_custom');
remove_action('wp_enqueue_scripts', 'good_food_theme_logo_styles');



/* Comment Fields to bottom */
function good_food_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter('comment_form_fields', 'good_food_comment_field_to_bottom');



/* Single Posts, Project and Profiles Layout */
function good_food_custom_single_layout($cmsmasters_layout) {
	if (
		is_singular('post') || 
		is_singular('project') || 
		is_singular('profile') 
	) {
		$cmsmasters_layout = 'fullwidth';
	}
	
	
	return $cmsmasters_layout;
}

add_filter('cmsmasters_theme_page_layout_filter', 'good_food_custom_single_layout');



/* Search Form */
function good_food_search_form($form) {
	$form = "<div class=\"search_bar_wrap\">
		<form method=\"get\" action=\"" . esc_url(home_url('/')) . "\">
			<p class=\"search_field\">
				<input name=\"s\" placeholder=\"" . esc_attr__('Search...', 'good-food') . "\" value=\"\" type=\"search\" />
			</p>
			<p class=\"search_button\">
				<button type=\"submit\" class=\"cmsmasters_theme_icon_search\"></button>
			</p>
		</form>
	</div>";
	
	
	return $form;
}

add_filter('get_search_form', 'good_food_search_form');
