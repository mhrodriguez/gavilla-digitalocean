<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function good_food_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'good-food');
	
	if (class_exists('Cmsmasters_Content_Composer')) {
		$tabs['icon'] = esc_attr__('Social Icons', 'good-food');
	}
	
	$tabs['lightbox'] = esc_attr__('Lightbox', 'good-food');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'good-food');
	$tabs['error'] = esc_attr__('404', 'good-food');
	$tabs['code'] = esc_attr__('Custom Codes', 'good-food');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'good-food');
	}
	
	return apply_filters('cmsmasters_options_element_tabs_filter', $tabs);
}


function good_food_options_element_sections() {
	$tab = good_food_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'good-food');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'good-food');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'good-food');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'good-food');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'good-food');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'good-food');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'good-food');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_sections_filter', $sections, $tab);	
} 


function good_food_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = good_food_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = good_food_settings_element_defaults();
	
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'good-food' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'good-food'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => $defaults[$tab]['good-food' . '_sidebar'] 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'good-food' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'good-food'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => $defaults[$tab]['good-food' . '_social_icons'] 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_skin'], 
			'choices' => array( 
				esc_html__('Dark', 'good-food') . '|dark', 
				esc_html__('Light', 'good-food') . '|light', 
				esc_html__('Mac', 'good-food') . '|mac', 
				esc_html__('Metro Black', 'good-food') . '|metro-black', 
				esc_html__('Metro White', 'good-food') . '|metro-white', 
				esc_html__('Parade', 'good-food') . '|parade', 
				esc_html__('Smooth', 'good-food') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'good-food'), 
			'desc' => esc_html__('Sets path for switching windows', 'good-food'), 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_path'], 
			'choices' => array( 
				esc_html__('Vertical', 'good-food') . '|vertical', 
				esc_html__('Horizontal', 'good-food') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'good-food'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_infinite'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'good-food'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_aspect_ratio'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'good-food'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_mobile_optimizer'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'good-food'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_max_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'good-food'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_min_scale'], 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'good-food'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_inner_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'good-food'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_smart_recognition'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'good-food'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_fullscreen_one_slide'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'good-food'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'good-food'), 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_fullscreen_viewport'], 
			'choices' => array( 
				esc_html__('Center', 'good-food') . '|center', 
				esc_html__('Fit', 'good-food') . '|fit', 
				esc_html__('Fill', 'good-food') . '|fill', 
				esc_html__('Stretch', 'good-food') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'good-food'), 
			'desc' => esc_html__('Sets buttons be available or not', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_toolbar'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'good-food'), 
			'desc' => esc_html__('Enable the arrow buttons', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_arrows'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'good-food'), 
			'desc' => esc_html__('Sets the fullscreen button', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_fullscreen'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'good-food'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_thumbnail'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'good-food'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_keyboard'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'good-food'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_mousewheel'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'good-food'), 
			'desc' => esc_html__('Sets the swipe navigation', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_swipe'] 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'good-food' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'good-food'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_ilightbox_controls_slideshow'] 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_nav'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_tags'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_month'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_pj_categs'] 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'good-food' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_sitemap_pj_tags'] 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_color', 
			'title' => esc_html__('Text Color', 'good-food'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['good-food' . '_error_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'good-food'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_color'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_img_enable'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'good-food'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'good-food'), 
			'type' => 'upload', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_image'], 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_rep'], 
			'choices' => array( 
				esc_html__('No Repeat', 'good-food') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'good-food') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'good-food') . '|repeat-y', 
				esc_html__('Repeat', 'good-food') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_pos'], 
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
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_att'], 
			'choices' => array( 
				esc_html__('Scroll', 'good-food') . '|scroll', 
				esc_html__('Fixed', 'good-food') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'good-food'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => $defaults[$tab]['good-food' . '_error_bg_size'], 
			'choices' => array( 
				esc_html__('Auto', 'good-food') . '|auto', 
				esc_html__('Cover', 'good-food') . '|cover', 
				esc_html__('Contain', 'good-food') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_search', 
			'title' => esc_html__('Search Line', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_error_search'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_error_sitemap_button'] 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'good-food' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_error_sitemap_link'], 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'good-food'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['good-food' . '_custom_css'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'good-food'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => $defaults[$tab]['good-food' . '_custom_js'], 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_gmap_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_api_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_api_secret'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_access_token'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'good-food' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_access_token_secret'], 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'good-food' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_recaptcha_public_key'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'good-food' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'good-food'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_recaptcha_private_key'], 
			'class' => '' 
		);
		
		break;
	}
	
	return apply_filters('cmsmasters_options_element_fields_filter', $options, $tab);	
}

