<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Template Functions for Profiles & Profile
 * Created by CMSMasters
 * 
 */


/* Get Profiles Heading Function */
function good_food_profile_heading($cmsmasters_id, $tag = 'h1', $sub_title = false, $tag_sub = 'h3', $sub_after = true, $show = true) { 
	$out = '';
	
	
	if ($sub_title && $sub_title != '') {
		$sub_title = '<' . esc_html($tag_sub) . ' class="cmsmasters_profile_subtitle">' . 
			esc_html($sub_title) . 
		'</' . esc_html($tag_sub) . '>';
	}
	
	
	$out .= '<header class="cmsmasters_profile_header entry-header">';
		
		if (!$sub_after) {
			$out .= $sub_title;
		}
		
		$out .= '<' . esc_html($tag) . ' class="cmsmasters_profile_title entry-title">' . 
			'<a href="' . esc_url(get_permalink()) . '">' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>';		
		
		if ($sub_after) {
			$out .= $sub_title;
		}
		
	$out .= '</header>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Profiles Heading Without Link Function */
function good_food_profile_title_nolink($cmsmasters_id, $tag = 'h1', $sub_title = false, $tag_sub = 'h5', $show = true) { 
	$out = '<' . esc_html($tag) . ' class="cmsmasters_profile_title entry-title">' . 
		cmsmasters_title($cmsmasters_id, false) . 
	'</' . esc_html($tag) . '>';
	
	
	if ($sub_title && $sub_title != '') {
		$out .= '<div class="cmsmasters_profile_subtitle">' . 
			'<' . esc_html($tag_sub) . ' class="entry-subtitle">' . 
				esc_html($sub_title) . 
			'</' . esc_html($tag_sub) . '>' . 
		'</div>';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Get Profiles Content/Excerpt Function */
function good_food_profile_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_profile_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(20, false)) . 
	'</div>' . "\n");
	
	
	if (theme_excerpt(20, false) != '') {
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Profiles Category Function */
function good_food_get_profile_category($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out .= '<span class="cmsmasters_profile_category">' . 
				good_food_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = good_food_get_global_options();
			
			
			if ($cmsmasters_option['good-food' . '_profile_post_cat']) {
				$out .= '<div class="profile_details_item">' . 
					'<div class="profile_details_item_title">' . esc_html__('Categories', 'good-food') . ':' . '</div>' . 
					'<div class="profile_details_item_desc">' . 
						'<span class="cmsmasters_profile_category">' . 
							good_food_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
						'</span>' . 
					'</div>' . 
				'</div>';
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Like Function */
function good_food_get_profile_likes($template_type = 'page', $show = true) {
	$out = '';
	
	
	if ($template_type == 'page') {
		$out = cmsmasters_like('cmsmasters_profile_likes');
	} elseif ($template_type == 'post') {
		$cmsmasters_option = good_food_get_global_options();
		
		if ($cmsmasters_option['good-food' . '_profile_post_like']) {
			$out = '<div class="profile_details_item">' . 
				'<div class="profile_details_item_title">' . esc_html__('Likes', 'good-food') . ':' . '</div>' . 
				'<div class="profile_details_item_desc details_item_desc_like">' . 
					cmsmasters_like('cmsmasters_profile_likes') . 
				'</div>' . 
			'</div>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Profiles Comments Function */
function good_food_get_profile_comments($template_type = 'page', $show = true) {
	$out = '';
	
	
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = good_food_get_comments('cmsmasters_profile_comments');
		} elseif ($template_type == 'post') {
			$cmsmasters_option = good_food_get_global_options();
			
			if ($cmsmasters_option['good-food' . '_profile_post_comment']) {
				$out .= '<div class="profile_details_item">' . 
					'<div class="profile_details_item_title">' . esc_html__('Comments', 'good-food') . ':' . '</div>' . 
					'<div class="profile_details_item_desc details_item_desc_comments">' . 
						good_food_get_comments('cmsmasters_profile_comments') . 
					'</div>' . 
				'</div>';
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Profiles Features Function */
function good_food_get_profile_features($features_position = 'features', $features = '', $features_title = false, $tag = 'h2', $show = true) {
	if (
		(
			!empty($features[0][0]) || 
			!empty($features[0][1])
		) || (
			!empty($features[1][0]) || 
			!empty($features[1][1])
		)
	) {
		$out = '';
		
		if ($features_position == 'features') {
			$out .= '<div class="profile_features entry-meta">' . 
				($features_title ? '<' . esc_html($tag) . ' class="profile_features_title">' . esc_html($features_title) . '</' . esc_html($tag) . '>' : '');
		}
		
		
		foreach ($features as $feature) {
			$out .= '<div class="profile_' . esc_attr($features_position) . '_item' . ($feature[0] == '' || $feature[1] == '' ? ' profile_' . esc_attr($features_position) . '_one_item' : '') . '">';
				
				if ($feature[0] != '') {
					$out .= '<div class="profile_' . esc_attr($features_position) . '_item_title">' . esc_html($feature[0]) . '</div>';
				}
				
				
				if ($feature[1] != '') {
					$feature_lists = explode("\n", $feature[1]);
					
					
					$out .= '<div class="profile_' . esc_attr($features_position) . '_item_desc">';
						
						foreach ($feature_lists as $feature_list) {
							$out .= trim($feature_list);
						}
						
					$out .= '</div>';
				}
				
			$out .= '</div>';
		}
		
		
		if ($features_position == 'features') {
			$out .= '</div>';
		}
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Profiles Contact Info Function */
function good_food_get_profile_contact_info($contact_info, $title_box = false, $tag = 'h2', $show = true) {
	if ($contact_info != '') {
		$out = '<div class="profile_contact_info entry-meta">' . 
			
			($title_box ? '<' . esc_html($tag) . ' class="profile_contact_info_title">' . esc_html($title_box) . '</' . esc_html($tag) . '>' : '');
			
			foreach($contact_info as $social_icon) {
				$contact_info_item = explode('|', str_replace(' ', ' ', $social_icon));
				
				$contact_info_icon = $contact_info_item[0];
				$contact_info_link = $contact_info_item[1];
				$contact_info_title = $contact_info_item[2];
				$contact_info_target = $contact_info_item[3];
				
				
				$out .= '<div class="profile_contact_info_item">';
					
					if($contact_info_link != '') {
						$out .= '<a href="' . esc_url($contact_info_link) . '" class="' . esc_attr($contact_info_icon) . '" title="' . esc_attr($contact_info_title) . '"' . (($contact_info_target == 'true') ? ' target="_blank"' : '') . '><span>' . esc_html($contact_info_title) . '</span></a>';
					} else {
						$out .= '<span class="' . esc_attr($contact_info_icon) . '"><span>' . esc_html($contact_info_title) . '</span></span>';
					} 
					
				$out .= '</div>';
			}		
			
		$out .= '</div>';
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Profiles Social Icons Function */
function good_food_profile_social_icons($social_icons, $shortcode_id = false, $title_box = false, $tag = 'h2', $show = true) {
	if ($social_icons != '') {
		$out = '<div class="profile_social_icons">';
			if ($title_box) {
				$out .= '<' . esc_html($tag) . ' class="profile_social_icons_title">' . esc_html($title_box) . '</' . esc_html($tag) . '>';
			}
			
			$out .= '<ul class="profile_social_icons_list">';
				
				$social_icon_styles = '';
				
				$icons_counter = 0;
			
				foreach($social_icons as $social_icon) {
					$social_icon_item = explode('|', $social_icon);
					
					$icons_counter++;
					
					$uniqid = "{$shortcode_id}_{$icons_counter}";
					
					$social_icon_icon = trim($social_icon_item[0]);
					$social_icon_link = trim($social_icon_item[1]);
					$social_icon_title = trim($social_icon_item[2]);
					$social_icon_target = trim($social_icon_item[3]);
					$social_icon_color = (isset($social_icon_item[4]) ? trim($social_icon_item[4]) : '');
					$social_icon_hover = (isset($social_icon_item[5]) ? trim($social_icon_item[5]) : '');
					
					if (
						($social_icon_color != '') || 
						($social_icon_hover != '')
					) {
						$social_icon_color_class = ' cmsmasters_social_icon_color';
					} else {
						$social_icon_color_class = '';
					}
					
					$out .= '<li>' . 
						'<a href="' . esc_url($social_icon_link) . '" class="cmsmasters_social_icon cmsmasters_social_icon_' . $uniqid . ' ' . esc_attr($social_icon_icon) . $social_icon_color_class . '" title="' . esc_attr($social_icon_title) . '"' . (($social_icon_target == 'true') ? ' target="_blank"' : '') . '></a>' . 
					'</li>';
					
					
					if ($social_icon_color != '') {
						$social_icon_styles .= "
						
						#page .cmsmasters_profile .cmsmasters_social_icon_color.cmsmasters_social_icon_{$uniqid} {
							color:{$social_icon_color};
						}
						";
					}
					
					
					if ($social_icon_hover != '') {
						$social_icon_styles .= "
						
						#page .cmsmasters_profile .cmsmasters_social_icon_color.cmsmasters_social_icon_{$uniqid}:hover {
							color:{$social_icon_hover};
						}";
					}
				}
			
			$out .= '</ul>';
			
			
			if ($social_icon_styles != '') {
				echo cmsmasters_theme_generate_front_css($social_icon_styles);
			}
			
			
		$out .= '</div>';
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Opened Profile Social Icons Function */
function good_food_profile_open_social_icons($social_icons, $profile_id = false, $title_box = false, $tag = 'h2', $show = true) {
	if ($social_icons != '') {
		$out = '<div class="profile_social_icons">';
		
		
		if ($title_box) {
			$out .= '<' . esc_html($tag) . ' class="profile_social_icons_title">' . esc_html($title_box) . '</' . esc_html($tag) . '>';
		}
		
		
		$out .= '<ul class="profile_social_icons_list">';
		
		$icons_counter = 0;
		
		foreach($social_icons as $social_icon) {
			$social_icon_item = explode('|', $social_icon);
			
			$icons_counter++;
			
			$uniqid = "{$profile_id}_{$icons_counter}";
			
			$social_icon_icon = trim($social_icon_item[0]);
			$social_icon_link = trim($social_icon_item[1]);
			$social_icon_title = trim($social_icon_item[2]);
			$social_icon_target = trim($social_icon_item[3]);
			$social_icon_color = (isset($social_icon_item[4]) ? trim($social_icon_item[4]) : '');
			$social_icon_hover = (isset($social_icon_item[5]) ? trim($social_icon_item[5]) : '');
			
			
			if (
				($social_icon_color != '') || 
				($social_icon_hover != '')
			) {
				$social_icon_color_class = ' cmsmasters_social_icon_color';
			} else {
				$social_icon_color_class = '';
			}
			
			
			$out .= '<li>' . 
				'<a href="' . esc_url($social_icon_link) . '" class="cmsmasters_social_icon cmsmasters_social_icon_' . $uniqid . ' ' . esc_attr($social_icon_icon) . $social_icon_color_class . '" title="' . esc_attr($social_icon_title) . '"' . (($social_icon_target == 'true') ? ' target="_blank"' : '') . '></a>' . 
			'</li>';
		}
		
		
		$out .= '</ul>' . 
		'</div>';
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Opened Profile Social Icons Styles Function */
function good_food_profile_open_style_social_icons() {
	$profile_id = get_the_ID();
	
	$social_icons = get_post_meta($profile_id, 'cmsmasters_profile_social', true);
	
	
	if ($social_icons != '') {
		$social_icon_styles = '';
		
		$icons_counter = 0;
		
		
		foreach ($social_icons as $social_icon) {
			$social_icon_item = explode('|', $social_icon);
			
			$icons_counter++;
			
			$uniqid = "{$profile_id}_{$icons_counter}";
			
			$social_icon_color = (isset($social_icon_item[4]) ? trim($social_icon_item[4]) : '');
			$social_icon_hover = (isset($social_icon_item[5]) ? trim($social_icon_item[5]) : '');
			
			
			if ($social_icon_color != '') {
				$social_icon_styles .= "
				
				#page .cmsmasters_open_profile .cmsmasters_social_icon_color.cmsmasters_social_icon_{$uniqid} {
					color:{$social_icon_color};
				}
				";
			}
			
			
			if ($social_icon_hover != '') {
				$social_icon_styles .= "
				
				#page .cmsmasters_open_profile .cmsmasters_social_icon_color.cmsmasters_social_icon_{$uniqid}:hover {
					color:{$social_icon_hover};
				}";
			}
		}
		
		
		if ($social_icon_styles != '') {
			wp_add_inline_style('good-food-style', $social_icon_styles);
		}
	}
}

add_action('wp_enqueue_scripts', 'good_food_profile_open_style_social_icons');

