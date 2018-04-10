<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function good_food_options_general_tabs() {
	$cmsmasters_option = good_food_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'good-food');
	
	if ($cmsmasters_option['good-food' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'good-food');
	}
	
	if (CMSMASTERS_THEME_STYLE_COMPATIBILITY) {
		$tabs['theme_style'] = esc_attr__('Theme Style', 'good-food');
	}
	
	$tabs['header'] = esc_attr__('Header', 'good-food');
	$tabs['content'] = esc_attr__('Content', 'good-food');
	$tabs['footer'] = esc_attr__('Footer', 'good-food');
	
	return apply_filters('cmsmasters_options_general_tabs_filter', $tabs);
}


function good_food_options_general_sections() {
	$tab = good_food_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'good-food');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'good-food');
		
		break;
	case 'theme_style':
		$sections = array();
		
		$sections['theme_style_section'] = esc_attr__('Theme Design Style', 'good-food');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'good-food');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'good-food');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'good-food');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_sections_filter', $sections, $tab);
} 


function good_food_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = good_food_get_the_tab();
	}
	
	$options = array();
	
	
	$defaults = good_food_settings_general_defaults();
	
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_theme_layout'], 
			'choices' => array( 
				esc_html__('Liquid', 'good-food') . '|liquid', 
				esc_html__('Boxed', 'good-food') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_logo_type'], 
			'choices' => array( 
				esc_html__('Image', 'good-food') . '|image', 
				esc_html__('Text', 'good-food') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'good-food'), 
			'desc' => esc_html__('Choose your website logo image.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'good-food'), 
			'desc' => esc_html__('Choose logo image for retina displays. Logo for Retina displays should be twice the size of the default one.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_logo_title'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_logo_subtitle'], 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'good-food'), 
			'desc' => esc_html__('enable', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_logo_custom_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'good-food'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['good-food' . '_logo_title_color'] 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'good-food' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'good-food'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['good-food' . '_logo_subtitle_color'] 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_col', 
			'title' => esc_html__('Background Color', 'good-food'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => $defaults[$tab]['good-food' . '_bg_col'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_img', 
			'title' => esc_html__('Background Image', 'good-food'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_bg_img'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'good-food') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'good-food') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'good-food') . '|repeat-y', 
				esc_html__('Repeat', 'good-food') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_bg_pos'], 
			'choices' => array( 
				esc_html__('Top Left', 'good-food') . '|top left', 
				esc_html__('Top Center', 'good-food') . '|top center', 
				esc_html__('Top Right', 'good-food') . '|top right', 
				esc_html__('Center Left', 'good-food') . '|center left', 
				esc_html__('Center Center', 'good-food') . '|center center', 
				esc_html__('Center Right', 'good-food') . '|center right', 
				esc_html__('Bottom Left', 'good-food') . '|bottom left', 
				esc_html__('Bottom Center', 'good-food') . '|bottom center', 
				esc_html__('Bottom Right', 'good-food') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'good-food') . '|scroll', 
				esc_html__('Fixed', 'good-food') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'good-food' . '_bg_size', 
			'title' => esc_html__('Background Size', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'good-food') . '|auto', 
				esc_html__('Cover', 'good-food') . '|cover', 
				esc_html__('Contain', 'good-food') . '|contain' 
			) 
		);
		
		break;
	case 'theme_style':
		$options[] = array( 
			'section' => 'theme_style_section', 
			'id' => 'good-food' . '_theme_style', 
			'title' => esc_html__('Choose Theme Style', 'good-food'), 
			'desc' => '', 
			'type' => 'select_theme_style', 
			'std' => '', 
			'choices' => good_food_all_theme_styles() 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'good-food'), 
			'desc' => esc_html__('enable', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_fixed_header'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'good-food'), 
			'desc' => esc_html__('enable', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_header_overlaps'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_header_top_line'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'good-food'), 
			'desc' => esc_html__('pixels', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_header_top_height'], 
			'min' => '10' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'good-food'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'good-food') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['good-food' . '_header_top_line_short_info'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_header_top_line_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'good-food') . '|none', 
				esc_html__('Top Line Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'good-food') . '|social', 
				esc_html__('Top Line Navigation', 'good-food') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_header_styles'], 
			'choices' => array( 
				esc_html__('Default Style', 'good-food') . '|default', 
				esc_html__('Compact Style Left Navigation', 'good-food') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'good-food') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'good-food') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'good-food'), 
			'desc' => esc_html__('pixels', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_header_mid_height'], 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'good-food'), 
			'desc' => esc_html__('pixels', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_header_bot_height'], 
			'min' => '20' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_search', 
			'title' => esc_html__('Header Search', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_header_search'] 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_header_add_cont'], 
			'choices' => array( 
				esc_html__('None', 'good-food') . '|none', 
				esc_html__('Header Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'good-food') . '|social', 
				esc_html__('Header Custom HTML', 'good-food') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'good-food' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'good-food'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'good-food') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['good-food' . '_header_add_cont_cust_html'], 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['good-food' . '_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'good-food'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['good-food' . '_archives_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'good-food'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['good-food' . '_search_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'good-food'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['good-food' . '_other_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_heading_alignment'], 
			'choices' => array( 
				esc_html__('Left', 'good-food') . '|left', 
				esc_html__('Right', 'good-food') . '|right', 
				esc_html__('Center', 'good-food') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['good-food' . '_heading_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_image_enable'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'good-food'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_repeat'], 
			'choices' => array( 
				esc_html__('No Repeat', 'good-food') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'good-food') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'good-food') . '|repeat-y', 
				esc_html__('Repeat', 'good-food') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_attachment'], 
			'choices' => array( 
				esc_html__('Scroll', 'good-food') . '|scroll', 
				esc_html__('Fixed', 'good-food') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'good-food') . '|auto', 
				esc_html__('Cover', 'good-food') . '|cover', 
				esc_html__('Contain', 'good-food') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'good-food'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => $defaults[$tab]['good-food' . '_heading_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'good-food'), 
			'desc' => esc_html__('pixels', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_heading_height'], 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_breadcrumbs'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'good-food'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['good-food' . '_bottom_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_bottom_sidebar'] 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'good-food' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_bottom_sidebar_layout'], 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'good-food'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => $defaults[$tab]['good-food' . '_footer_scheme'], 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_footer_type'], 
			'choices' => array( 
				esc_html__('Default', 'good-food') . '|default', 
				esc_html__('Small', 'good-food') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_footer_additional_content'], 
			'choices' => array( 
				esc_html__('None', 'good-food') . '|none', 
				esc_html__('Footer Navigation', 'good-food') . '|nav', 
				esc_html__('Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'good-food') . '|social', 
				esc_html__('Custom HTML', 'good-food') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_footer_logo'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'good-food'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_footer_logo_url'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'good-food'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_footer_logo_url_retina'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_footer_nav'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons (will be shown if Cmsmasters Content Composer plugin is active)', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_footer_social'] 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'good-food'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'good-food') . '</strong>', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['good-food' . '_footer_html'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'good-food' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_footer_copyright'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_general_fields_filter', $options, $tab);	
}

