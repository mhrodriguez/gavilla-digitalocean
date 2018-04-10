<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.5
 * 
 * Content Composer Portfolio Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = $shortcode_id;


if ($layout == 'puzzle') {
	$metadata = $metadata_puzzle;
} else {
	$metadata = $metadata_grid;
}


$this->portfolio_atts = array(
	'cmsmasters_pj_metadata' => 	$metadata, 
	'cmsmasters_pj_layout_mode' => 	$layout_mode 
);


$more_text = ($more_text != '') ? $more_text : esc_html__('Load More Recipes', 'good-food');

$filter_text = ($filter_text != '') ? $filter_text : esc_html__('Filter', 'good-food');

$filter_cats_text = ($filter_cats_text != '') ? $filter_cats_text : esc_html__('All Categories', 'good-food');

$sorting_name_text = ($sorting_name_text != '') ? $sorting_name_text : esc_html__('Name', 'good-food');

$sorting_date_text = ($sorting_date_text != '') ? $sorting_date_text : esc_html__('Date', 'good-food');


$out = '<div' . 
	' id="portfolio_' . esc_attr($unique_id) . '"' . 
	' class="cmsmasters_wrap_portfolio entry-summary' . (($classes != '') ? ' ' . esc_attr($classes) : '') . '"' . 
	' data-layout="' . esc_attr($layout) . '"' . 
	' data-layout-mode="' . esc_attr($layout_mode) . '"' . 
	' data-url="' . CMSMASTERS_CONTENT_COMPOSER_URL . '"' . 
	' data-orderby="' . esc_attr($orderby) . '"' . 
	' data-order="' . esc_attr($order) . '"' . 
	' data-count="' . esc_attr($count) . '"' . 
	' data-categories="' . esc_attr($categories) . '"' . 
	' data-metadata="' . esc_attr($metadata) . '"' . 
'>';


if ($filter != '' || $sorting != '') {
	$out .= "<div class=\"cmsmasters_project_filter_wrap cmsmasters_items_filter_wrap\">
		<div class=\"cmsmasters_project_filter cmsmasters_items_filter\">
			<span class=\"cmsmasters_project_filter_loader cmsmasters_items_filter_loader\"></span>";
			
			if ($sorting != '') {
				$out .= "<div class=\"cmsmasters_project_sort_block cmsmasters_items_sort_block\">
					<a href=\"#\" name=\"project_name\" title=\"" . esc_attr($sorting_name_text) . "\" class=\"button cmsmasters_project_sort_but cmsmasters_items_sort_but cmsmasters_theme_icon_slide_bottom" . 
					(($orderby == 'name') ? " current" . 
					(($order == 'DESC') ? " reversed" : "") : "") . 
					"\">
						<span>" . esc_html($sorting_name_text) . "</span>
					</a>
					<a href=\"#\" name=\"project_date\" title=\"" . esc_attr($sorting_date_text) . "\" class=\"button cmsmasters_project_sort_but cmsmasters_items_sort_but cmsmasters_theme_icon_slide_bottom" . 
					(($orderby == 'date') ? " current" . 
					(($order == 'DESC') ? " reversed" : "") : "") . 
					"\">
						<span>" . esc_html($sorting_date_text) . "</span>
					</a>
				</div>";
			}
			
			
			if ($filter != '') {
				$out .= "<div class=\"cmsmasters_project_filter_block cmsmasters_items_filter_block\">
					<a class=\"cmsmasters_project_filter_but cmsmasters_items_filter_but cmsmasters_theme_icon_resp_nav button\">
						<span>" . esc_html($filter_text) . "</span>
					</a>
					<ul class=\"cmsmasters_project_filter_list cmsmasters_items_filter_list\">
						<li class=\"current\">
							<a class=\"button\" data-filter=\"article.project\"  title=\"" . esc_attr($filter_cats_text) . "\" href=\"" . esc_js("javascript:void(0)") . "\">
								<span>" . esc_html($filter_cats_text) . "</span>
							</a>
						</li>";
						
						
						if ($categories != '') {
							$cat_array = explode(',', $categories);
							
							
							for ($i = 0; $i < count($cat_array); $i++) {
								$idObj = get_term_by('slug', $cat_array[$i], 'pj-categs');
								
								$cat_array[$i] = $idObj->term_id;
							}
						} else {
							$cat_array = $categories;
						}
						
						
						$cat_args = array( 
							'orderby' => 	'name', 
							'include' => 	$cat_array 
						);
						
						
						$project_categs = get_terms('pj-categs', $cat_args);
						
						
						if (is_array($project_categs) && !empty($project_categs)) {
							foreach ($project_categs as $project_categ) {
								$out .= "<li>
									<a class=\"button\" href=\"#\" data-filter=\"article.project[data-category~='" . esc_attr($project_categ->slug) . "']\" title=\"" . esc_attr($project_categ->name) . "\">
										<span>" . esc_html($project_categ->name) . "</span>
									</a>
								</li>";
							}
						}
					
					$out .= "</ul>
				</div>";
			}
			
		$out .= "</div>
	</div>";
}

$out .= '<div class="portfolio ' . esc_attr($layout) . ' ' . esc_attr($gap) . '_gap ' . esc_attr($layout_mode) . 
	(($layout != 'puzzle') ? ' cmsmasters_' . esc_attr($columns) : '') . 
'">';


$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;


$args = array( 
	'post_type' => 				'project', 
	'orderby' => 				$orderby, 
	'order' => 					$order, 
	'posts_per_page' => 		$count 
);

if ($layout == 'puzzle') {
	$args['ignore_sticky_posts'] = true;
}

if ($categories != '') {
	$cat_array = explode(",", $categories);
	
	$args['tax_query'] = array( 
		array( 
			'taxonomy' => 'pj-categs', 
			'field' => 'slug', 
			'terms' => $cat_array 
		)
	);
}


if ($pagination == 'pagination') {
	if (get_query_var('paged')) { 
		$paged = get_query_var('paged'); 
	} elseif (get_query_var('page')) { 
		$paged = get_query_var('page'); 
	} else { 
		$paged = 1; 
	}
	
	
	$args['paged'] = $paged;
}


if ($orderby == 'meta_value_num') {
	$args['meta_key'] = 'cmsmasters_likes';
}


$query = new WP_Query($args);


if ($query->have_posts()) : 
	while ($query->have_posts()) : $query->the_post();
		if ($layout == 'puzzle') {
			$out .= cmsmasters_composer_ob_load_template('theme-framework/theme-style' . CMSMASTERS_CONTENT_COMPOSER_THEME_STYLE . '/postType/portfolio/project-puzzle.php', $this->portfolio_atts);
		} else {
			$out .= cmsmasters_composer_ob_load_template('theme-framework/theme-style' . CMSMASTERS_CONTENT_COMPOSER_THEME_STYLE . '/postType/portfolio/project-grid.php', $this->portfolio_atts);
		}
	endwhile;
	
	
	if ($pagination == 'more') {
		wp_enqueue_style('mediaelement');
		
		wp_enqueue_style('wp-mediaelement');
		
		
		wp_enqueue_script('mediaelement');
		
		wp_enqueue_script('wp-mediaelement');
	}
endif;


$out .= '</div>';


if ($pagination !== 'disabled') {
	$out .= '<div class="cmsmasters_wrap_more_projects cmsmasters_wrap_more_items">';
	
		if ($pagination == 'pagination' && $query->max_num_pages > 1) {
			$out .= cmsmasters_pagination($query->max_num_pages);
		} elseif ($pagination == 'more' && $query->found_posts > $count) {
			$out .= "<div class=\"cmsmasters_wrap_project_loader cmsmasters_wrap_items_loader\">
				<a href=\"" . esc_js("javascript:void(0)") . "\" class=\"cmsmasters_button cmsmasters_project_loader cmsmasters_items_loader\">
					<span>" . esc_html($more_text) . "</span>
				</a>
			</div>";
		}
	
	$out .= '</div>';
}

$out .= '</div>';


wp_reset_postdata();


echo $out;