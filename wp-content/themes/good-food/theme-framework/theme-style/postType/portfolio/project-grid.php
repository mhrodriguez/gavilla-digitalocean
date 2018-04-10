<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Project Grid Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_project_metadata = explode(',', $cmsmasters_pj_metadata);


$title = (in_array('title', $cmsmasters_project_metadata)) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_project_metadata) && good_food_project_check_exc_cont()) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && (in_array('categories', $cmsmasters_project_metadata))) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_project_metadata))) ? true : false;
$likes = (in_array('likes', $cmsmasters_project_metadata)) ? true : false;
$views = (in_array('views', $cmsmasters_project_metadata)) ? true : false;
$rollover = in_array('rollover', $cmsmasters_project_metadata) ? true : false;


$cmsmasters_project_info_title = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title', true);
$cmsmasters_project_info_text = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text', true);
$cmsmasters_project_info_title2 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title2', true);
$cmsmasters_project_info_text2 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text2', true);
$cmsmasters_project_info_title3 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title3', true);
$cmsmasters_project_info_text3 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text3', true);
$cmsmasters_project_info_title4 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title4', true);
$cmsmasters_project_info_text4 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text4', true);

$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);

$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$project_thumb_size = (($cmsmasters_pj_layout_mode == 'masonry') ? 'cmsmasters-project-masonry-thumb' : 'cmsmasters-project-thumb');

$project_thumb_high = (($cmsmasters_pj_layout_mode == 'masonry') ? true : false);


$project_sort_categs = get_the_terms(0, 'pj-categs');

$project_categs = '';

if ($project_sort_categs != '') {
	foreach ($project_sort_categs as $project_sort_categ) {
		$project_categs .= ' ' . $project_sort_categ->slug;
	}
	
	$project_categs = ltrim($project_categs, ' ');
}


$cmsmasters_post_format = get_post_format();

?>
<!--_________________________ Start Project Grid Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_project_grid'); echo (($project_categs != '') ? ' data-category="' . esc_attr($project_categs) . '"' : '') ?>>
	<div class="project_outer">
		<?php 				
		
		echo '<div class="project_outer_image_wrap">';
			if (
				$rollover && 
				(
					$views || 
					$likes || 
					$comments || 
					$cmsmasters_project_info_text || 
					$cmsmasters_project_info_text2 || 
					$cmsmasters_project_info_text3 || 
					$cmsmasters_project_info_text4
				)
			) {
				echo '<div class="project_outer_image_wrap_cont">';
					
					good_food_get_project_info($cmsmasters_project_info_title, $cmsmasters_project_info_text, false, 'page');
					
					good_food_get_project_info($cmsmasters_project_info_title2, $cmsmasters_project_info_text2, false, 'page');
					
					good_food_get_project_info($cmsmasters_project_info_title3, $cmsmasters_project_info_text3, false, 'page');
					
					good_food_get_project_info($cmsmasters_project_info_title4, $cmsmasters_project_info_text4, false, 'page');
					
					
					if ($views || $likes || $comments) {
						echo '<div class="cmsmasters_project_cont_info entry-meta">';
							
							$views ? good_food_get_project_views('page') : '';
							
							$likes ? good_food_get_project_likes('page') : '';
							
							$comments ? good_food_get_project_comments('page') : '';
							
						echo '</div>';
					}
					
				echo '</div>';
			}
			
			good_food_thumb_rollover(get_the_ID(), $project_thumb_size, false, false, false, false, false, false, false, $project_thumb_high, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target);
			
		echo '</div>';
		
		
		if ($title || $excerpt || $cmsmasters_project_info_text3 || $categories) {
			echo '<div class="project_inner">';
				
				$title ? good_food_project_heading(get_the_ID(), 'h4', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target) : '';
				
				
				$excerpt ? good_food_project_exc_cont() : '';
				
				
				if ($cmsmasters_project_info_text3 || $categories) {
					echo '<footer class="cmsmasters_project_footer entry-meta">';
						
						good_food_get_project_footer_info($cmsmasters_project_info_text3, 'cmsmasters-icon-time');
						
						
						if ($categories) {
							good_food_get_project_category(get_the_ID(), 'pj-categs', 'page');
						}
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
		
		
		if (!$title) {
			echo '<div class="dn">';
				good_food_project_heading(get_the_ID(), 'h6');
			echo '</div>';
		}
		
		echo '<span class="dn meta-date">' . get_the_time('YmdHis') . '</span>';
	?>
	</div>
</article>
<!--_________________________ Finish Project Grid Article _________________________ -->

