<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Project Puzzle Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_project_metadata = explode(',', $cmsmasters_pj_metadata);


$title = (in_array('title', $cmsmasters_project_metadata)) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && (in_array('categories', $cmsmasters_project_metadata))) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_project_metadata))) ? true : false;
$likes = (in_array('likes', $cmsmasters_project_metadata)) ? true : false;
$views = (in_array('views', $cmsmasters_project_metadata)) ? true : false;
$rollover = in_array('rollover', $cmsmasters_project_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);

$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_project_size = get_post_meta(get_the_ID(), 'cmsmasters_project_size', true);

if (!$cmsmasters_project_size) {
    $cmsmasters_project_size = 'one_x_one';
}


$cmsmasters_project_puzzle_image = get_post_meta(get_the_ID(), 'cmsmasters_project_puzzle_image', true);


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
<!--_________________________ Start Project Puzzle Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_project_puzzle ' . $cmsmasters_project_size); echo (($project_categs != '') ? ' data-category="' . esc_attr($project_categs) . '"' : '') ?>>
	<div class="project_outer">
	<?php 
		good_food_thumb_rollover(get_the_ID(), 'full', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target, 'cmsmasters_theme_icon_image', $cmsmasters_project_puzzle_image);
		
		if (
			$rollover &&
			($title || $categories || $views || $likes || $comments)
		) {
			echo '<div class="project_inner">';
				
				if ($title || $categories) {
					echo '<div class="project_inner_cont">';
					
						$title ? good_food_project_heading(get_the_ID(), 'h4', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url, $cmsmasters_project_link_target) : '';
						
						
						if ($categories) {
							echo '<div class="cmsmasters_project_cont_info entry-meta">';
								
								good_food_get_project_category(get_the_ID(), 'pj-categs', 'page');
								
							echo '</div>';
						}
						
					echo '</div>';
				}
				
				
				if ($views || $likes || $comments) {
					echo '<footer class="cmsmasters_project_footer entry-meta">';
						
						$views ? good_food_get_project_views('page') : '';
						
						$likes ? good_food_get_project_likes('page') : '';
						
						$comments ? good_food_get_project_comments('page') : '';
						
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
<!--_________________________ Finish Project Puzzle Article _________________________ -->

