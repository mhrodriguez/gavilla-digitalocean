<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Template Functions for Portfolio & Project
 * Created by CMSMasters
 * 
 */


/* Get Projects Heading Function */
function good_food_project_heading($cmsmasters_id, $tag = 'h1', $link_redirect = false, $link_url = false, $link_target = false, $show = true) { 
	$out = '<header class="cmsmasters_project_header entry-header">' . 
		'<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
			'<a href="' . (($link_redirect == 'true' && $link_url != '') ? esc_url($link_url) : esc_url(get_permalink())) . '"' . ($link_target == 'true' ? ' target="_blank"' : '') . '>' . cmsmasters_title($cmsmasters_id, false) . '</a>' . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Heading Without Link Function */
function good_food_project_title_nolink($cmsmasters_id, $tag = 'h1', $show = true) { 
	$out = '<header class="cmsmasters_project_header entry-header">' . 
		'<' . esc_html($tag) . ' class="cmsmasters_project_title entry-title">' . 
			cmsmasters_title($cmsmasters_id, false) . 
		'</' . esc_html($tag) . '>' . 
	'</header>';
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Subtitle Function */
function good_food_project_subtitle($sub_title = '', $tag = 'h6', $show = true) { 
	if ($sub_title && $sub_title != '') {
		$out = '<div class="cmsmasters_project_subtitle">' . 
			'<' . esc_html($tag) . ' class="entry-subtitle">' . 
				esc_html($sub_title) . 
			'</' . esc_html($tag) . '>' . 
		'</div>';
	} else {
		$out = '';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Content/Excerpt Function */
function good_food_project_exc_cont($show = true) {
	$out = cmsmasters_divpdel('<div class="cmsmasters_project_content entry-content">' . "\n" . 
		wpautop(theme_excerpt(20, false)) . 
	'</div>' . "\n");
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Check Projects Content/Excerpt Not Empty Function */
function good_food_project_check_exc_cont() {
	$exc = good_food_project_exc_cont(false);
	
	$no_tags_exc = strip_tags($exc);
	
	$trim_exc = trim($no_tags_exc);
	
	
	if ($trim_exc != '') {
		return true;
	} else {
		return false;
	}
}



/* Get Projects Category Function */
function good_food_get_project_category($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	$out = '';
	
	
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_project_category">' . 
				good_food_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = good_food_get_global_options();
			
			
			if ($cmsmasters_option['good-food' . '_portfolio_project_cat']) {
				$out .= '<span class="cmsmasters_project_category">' . 
					esc_html__('in', 'good-food') . ' ' . 
					good_food_get_the_category_list($cmsmasters_id, $taxonomy, ', ') . 
				'</span>';
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Footer Info Function */
function good_food_get_project_footer_info($info, $icon = false, $show = true) {
	$out = '';
	
	
	if ($info && $info != '') {
		$out = '<span class="cmsmasters_project_footer_info' . ' ' . ($icon ? esc_html($icon) : '') . '">' . 
			esc_html($info) . 
		'</span>';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Like Function */
function good_food_get_project_likes($template_type = 'page', $show = true) {
	$out = '';
	
	
	if ($template_type == 'page') {
		$out = cmsmasters_like('cmsmasters_project_likes');
	} elseif ($template_type == 'post') {
		$cmsmasters_option = good_food_get_global_options();
		
		if ($cmsmasters_option['good-food' . '_portfolio_project_like']) {
			$out = cmsmasters_like('cmsmasters_project_likes');
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects View Function */
function good_food_get_project_views($template_type = 'page', $show = true) {
	$out = '';
	
	
	if ($template_type == 'page') {
		$out = cmsmastersView('cmsmasters_project_views');
	} elseif ($template_type == 'post') {
		$cmsmasters_option = good_food_get_global_options();
		
		if ($cmsmasters_option['good-food' . '_portfolio_project_view']) {
			$out = cmsmastersView('cmsmasters_project_views');
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Comments Function */
function good_food_get_project_comments($template_type = 'page', $show = true) {
	$out = '';
	
	
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = good_food_get_comments('cmsmasters_project_comments');
		} elseif ($template_type == 'post') {
			$cmsmasters_option = good_food_get_global_options();
			
			if ($cmsmasters_option['good-food' . '_portfolio_project_comment']) {
				$out = good_food_get_comments('cmsmasters_project_comments');
			}
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Date Function */
function good_food_get_project_date($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<abbr class="published cmsmasters_project_date" title="' . esc_attr(get_the_date()) . '">' . 
			esc_html(get_the_date()) . 
		'</abbr>' . 
		'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
			esc_html(get_the_modified_date()) . 
		'</abbr>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = good_food_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['good-food' . '_portfolio_project_date']) {
			$out .= '<span class="cmsmasters_project_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					esc_html(get_the_date('M d, Y')) . 
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					esc_html(get_the_modified_date()) . 
				'</abbr>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Author Function */
function good_food_get_project_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_project_author">' . 
			esc_html__('by', 'good-food') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Recipes by', 'good-food') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author"><span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span></a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = good_food_get_global_options();
		
		$out = '';
		
		if ($cmsmasters_option['good-food' . '_portfolio_project_author']) {
			$out .= '<span class="cmsmasters_project_author">' . 
				esc_html__('by', 'good-food') . ' ' . 
				'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'good-food') . ' ' . esc_attr(get_the_author_meta('display_name')) . '" class="vcard author">' . 
					'<span class="fn" rel="author">' . esc_html(get_the_author_meta('display_name')) . '</span>' . 
				'</a>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Tags Function */
function good_food_get_project_tags($cmsmasters_id, $taxonomy, $show = true) {
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		$cmsmasters_option = good_food_get_global_options();
		$out = '';
		
		if ($cmsmasters_option['good-food' . '_portfolio_project_tag']) {
			$out = '<span class="cmsmasters_project_tags">' . 
						esc_html__('tags', 'good-food') . ': ' . 
						get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
					'</span>';
		}
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Projects Features Function */
function good_food_get_project_features($features_position = 'features', $features = '', $features_title = false, $tag = 'h2', $show = true) {
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
			$out .= '<div class="project_features entry-meta">' . 
				($features_title ? '<' . esc_html($tag) . ' class="project_features_title">' . esc_html($features_title) . '</' . esc_html($tag) . '>' : '');
		}
		
		
		foreach ($features as $feature) {
			$out .= '<div class="project_' . esc_attr($features_position) . '_item' . ($feature[0] == '' || $feature[1] == '' ? ' project_' . esc_attr($features_position) . '_one_item' : '') . '">';
				
				if ($feature[0] != '') {
					$out .= '<div class="project_' . esc_attr($features_position) . '_item_title">' . esc_html($feature[0]) . '</div>';
				}
				
				
				if ($feature[1] != '') {
					$feature_lists = explode("\n", $feature[1]);
					
					
					$out .= '<div class="project_' . esc_attr($features_position) . '_item_desc">';
						
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



/* Get Projects Link Function */
function good_food_project_link($link_text, $link_url, $link_target, $show = true) {
	$cmsmasters_option = good_food_get_global_options();
	$out = '';
	
	if ( 
		$cmsmasters_option['good-food' . '_portfolio_project_link'] && 
		$link_text != '' && 
		$link_url != '' 
	) {
		$out = '<span class="cmsmasters_project_link">' . 
			esc_html__('link', 'good-food') . ': ' . 
			'<a href="' . esc_url($link_url) . '" title="' . esc_attr($link_text) . '"' . (($link_target == 'true') ? ' target="_blank"' : '') . '>' . esc_html($link_text) . '</a>' . 
		'</span>';
	}
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Info Function */
function good_food_get_project_info($info_title = false, $info, $tag = 'h4', $template_type = 'post', $show = true) {
	$out = '';
	
	if ($template_type == 'post') {
		if ($info != '') {
			$out .= '<div class="cmsmasters_project_info_item">' . 
				'<div class="cmsmasters_project_info_item_inner">' . 
					($info_title ? '<' . esc_html($tag) . ' class="entry-title">' . esc_html($info_title) . '</' . esc_html($tag) . '>' : '') . 
					'<span>' . esc_html($info) . '</span>' . 
				'</div>' . 
			'</div>';
		}
	} else {
		$out .= '<div class="cmsmasters_project_info_item">' . 
			'<div class="cmsmasters_project_info_item_inner">' . 
				($info_title ? esc_html($info_title) . ': ' : '') . 
				esc_html($info) . 
			'</div>' . 
		'</div>';
	}
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}



/* Get Projects Ingredients Function */
function good_food_get_project_ingredients($ingredients, $ingredients_title = false, $tag = 'h2', $show = true) {
	if ( 
		!empty($ingredients) && 
		sizeof($ingredients) > 0
	) {
		$out = '';
		
		
		$out = '<table class="cmsmasters_project_ingredients">' . 
			($ingredients_title ? '<' . esc_html($tag) . ' class="cmsmasters_project_ingredients_title">' . esc_html($ingredients_title) . '</' . esc_html($tag) . '>' : '');
			
			foreach ($ingredients as $ingredient) {
				$out .= '<tr>' . 
					'<td><input type="checkbox"><label></label></td>' . 
					'<td>' . esc_html($ingredient) . '</td>' . 
				'</tr>';
			}
		
		$out .= '</table>';
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}



/* Get Projects Instructions Function */
function good_food_get_project_instructions($instructions, $instructions_title = false, $tag = 'h2', $show = true) {
	if ( 
		!empty($instructions) && 
		sizeof($instructions) > 0
	) {
		$out = '';
		
		$counter = 1;
		
		
		$out = '<table class="cmsmasters_project_instructions">' . 
			($instructions_title ? '<' . esc_html($tag) . ' class="cmsmasters_project_instructions_title">' . esc_html($instructions_title) . '</' . esc_html($tag) . '>' : '');
			
			foreach ($instructions as $instruction) {
				$out .= '<tr>' . 
					'<td>' . esc_html($counter) . '.</td>' . 
					'<td>' . esc_html($instruction) . '</td>' . 
				'</tr>';
				
				$counter++;
			}
		
		$out .= '</table>';
		
		
		if ($show) {
			echo $out;
		} else {
			return $out;
		}
	}
}

