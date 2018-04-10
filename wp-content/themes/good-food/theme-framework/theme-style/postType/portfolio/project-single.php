<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Project Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();


$cmsmasters_project_title = get_post_meta(get_the_ID(), 'cmsmasters_project_title', true);

$cmsmasters_project_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_project_subtitle', true);


$cmsmasters_project_link_text = get_post_meta(get_the_ID(), 'cmsmasters_project_link_text', true);
$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);
$cmsmasters_project_link_target = get_post_meta(get_the_ID(), 'cmsmasters_project_link_target', true);


$cmsmasters_project_info_title = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title', true);
$cmsmasters_project_info_text = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text', true);
$cmsmasters_project_info_title2 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title2', true);
$cmsmasters_project_info_text2 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text2', true);
$cmsmasters_project_info_title3 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title3', true);
$cmsmasters_project_info_text3 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text3', true);
$cmsmasters_project_info_title4 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_title4', true);
$cmsmasters_project_info_text4 = get_post_meta(get_the_ID(), 'cmsmasters_project_info_text4', true);


$cmsmasters_project_rating = get_post_meta(get_the_ID(), 'cmsmasters_project_rating', true);


$cmsmasters_project_ingredients_title = get_post_meta(get_the_ID(), 'cmsmasters_project_ingredients_title', true);
$cmsmasters_project_ingredients = get_post_meta(get_the_ID(), 'cmsmasters_project_ingredients', true);


$cmsmasters_project_details_title = get_post_meta(get_the_ID(), 'cmsmasters_project_details_title', true);
$cmsmasters_project_features = get_post_meta(get_the_ID(), 'cmsmasters_project_features', true);


$cmsmasters_project_features_one_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_one_title', true);
$cmsmasters_project_features_one = get_post_meta(get_the_ID(), 'cmsmasters_project_features_one', true);

$cmsmasters_project_features_two_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_two_title', true);
$cmsmasters_project_features_two = get_post_meta(get_the_ID(), 'cmsmasters_project_features_two', true);

$cmsmasters_project_features_three_title = get_post_meta(get_the_ID(), 'cmsmasters_project_features_three_title', true);
$cmsmasters_project_features_three = get_post_meta(get_the_ID(), 'cmsmasters_project_features_three', true);


$cmsmasters_project_excerpt = get_post_meta(get_the_ID(), 'cmsmasters_project_excerpt', true);


$cmsmasters_project_instructions_title = get_post_meta(get_the_ID(), 'cmsmasters_project_instructions_title', true);
$cmsmasters_project_instructions = get_post_meta(get_the_ID(), 'cmsmasters_project_instructions', true);


$cmsmasters_project_image_show = get_post_meta(get_the_ID(), 'cmsmasters_project_image_show', true);


$cmsmasters_post_format = get_post_format();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsmasters_project_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_project_sharing_box', true);

$cmsmasters_project_print_btn = get_post_meta(get_the_ID(), 'cmsmasters_project_print_btn', true);

$cmsmasters_project_author_box = get_post_meta(get_the_ID(), 'cmsmasters_project_author_box', true);

$cmsmasters_project_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_project_more_posts', true);

?>
<!--_________________________ Start Project Single Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_project'); ?>>
	<?php
	if (
		$cmsmasters_project_title == 'true' || 
		$cmsmasters_option['good-food' . '_portfolio_project_date'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_comment'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_like'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_view']
	) {
		echo '<div class="cmsmasters_open_project_top_wrap entry-meta">';
			if ($cmsmasters_project_title == 'true') {
				good_food_project_title_nolink(get_the_ID(), 'h1');
			}
			
			
			if (
				$cmsmasters_option['good-food' . '_portfolio_project_date'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_comment'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_like'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_view']
			) {
				echo '<div class="cmsmasters_open_project_top_meta' . (($cmsmasters_project_subtitle && $cmsmasters_project_subtitle != '') ? ' with_subtitle' : '') . '">';
					good_food_get_project_date('post');
					
					good_food_get_project_comments('post');
					
					good_food_get_project_likes('post');
					
					good_food_get_project_views('post');
				echo '</div>';
			}
			
			good_food_project_subtitle($cmsmasters_project_subtitle);
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_post_format == 'gallery' || 
		$cmsmasters_post_format == 'video' || 
		($cmsmasters_post_format == '' && $cmsmasters_project_image_show != 'true') || 
		$cmsmasters_option['good-food' . '_portfolio_project_author'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_cat'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_tag'] || 
		$cmsmasters_option['good-food' . '_portfolio_project_link'] || 
		$cmsmasters_project_info_text || 
		$cmsmasters_project_info_text2 || 
		$cmsmasters_project_info_text3 || 
		$cmsmasters_project_info_text4 || 
		($cmsmasters_project_rating == 'true' && CMSMASTERS_RATING) || 
		(
			!empty($cmsmasters_project_ingredients[0]) || 
			!empty($cmsmasters_project_ingredients[1])
		) || 
		(
			!empty($cmsmasters_project_features[0][0]) || 
			!empty($cmsmasters_project_features[0][1])
		) || (
			!empty($cmsmasters_project_features[1][0]) || 
			!empty($cmsmasters_project_features[1][1])
		) || (
			!empty($cmsmasters_project_features_one[0][0]) || 
			!empty($cmsmasters_project_features_one[0][1])
		) || (
			!empty($cmsmasters_project_features_one[1][0]) || 
			!empty($cmsmasters_project_features_one[1][1])
		) || (
			!empty($cmsmasters_project_features_two[0][0]) || 
			!empty($cmsmasters_project_features_two[0][1])
		) || (
			!empty($cmsmasters_project_features_two[1][0]) || 
			!empty($cmsmasters_project_features_two[1][1])
		) || (
			!empty($cmsmasters_project_features_three[0][0]) || 
			!empty($cmsmasters_project_features_three[0][1])
		) || (
			!empty($cmsmasters_project_features_three[1][0]) || 
			!empty($cmsmasters_project_features_three[1][1])
		)
	) {
		echo '<div class="cmsmasters_open_project_left_wrap">';
			
			if ($cmsmasters_post_format == 'gallery') {
				$cmsmasters_project_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_project_images', true))));
				$cmsmasters_project_columns = get_post_meta(get_the_ID(), 'cmsmasters_project_columns', true);
				
				good_food_post_type_gallery(get_the_ID(), $cmsmasters_project_images, $cmsmasters_project_columns, 'cmsmasters-project-thumb', 'cmsmasters-project-full-thumb');
			} elseif ($cmsmasters_post_format == 'video') {
				$cmsmasters_project_video_type = get_post_meta(get_the_ID(), 'cmsmasters_project_video_type', true);
				$cmsmasters_project_video_link = get_post_meta(get_the_ID(), 'cmsmasters_project_video_link', true);
				$cmsmasters_project_video_links = get_post_meta(get_the_ID(), 'cmsmasters_project_video_links', true);
				
				good_food_post_type_video(get_the_ID(), $cmsmasters_project_video_type, $cmsmasters_project_video_link, $cmsmasters_project_video_links, 'cmsmasters-project-full-thumb');
			} elseif ($cmsmasters_post_format == '') {
				$cmsmasters_project_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_project_images', true))));
				
				if ($cmsmasters_project_image_show == 'true' && $cmsmasters_project_images[0] == '') {
					echo '';
				} else {
					good_food_post_type_slider(get_the_ID(), $cmsmasters_project_images, 'cmsmasters-full-masonry-thumb');
				}
			}
			
			
			if (	
				$cmsmasters_option['good-food' . '_portfolio_project_author'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_cat'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_tag'] || 
				$cmsmasters_option['good-food' . '_portfolio_project_link']
			) {
				echo '<div class="cmsmasters_project_cont_info entry-meta">';
					
					good_food_get_project_author('post');
					
					good_food_get_project_category(get_the_ID(), 'pj-categs', 'post');
					
					good_food_get_project_tags(get_the_ID(), 'pj-tags');
					
					good_food_project_link($cmsmasters_project_link_text, $cmsmasters_project_link_url, $cmsmasters_project_link_target);
					
				echo '</div>';
			}
			
			
			if (
				$cmsmasters_project_info_text ||
				$cmsmasters_project_info_text2 ||
				$cmsmasters_project_info_text3 ||
				$cmsmasters_project_info_text4 ||
				($cmsmasters_project_rating == 'true' && CMSMASTERS_RATING)
			) {
				echo '<div class="cmsmasters_project_info entry-meta">';
					
					good_food_get_project_info($cmsmasters_project_info_title, $cmsmasters_project_info_text, 'h4');
					
					good_food_get_project_info($cmsmasters_project_info_title2, $cmsmasters_project_info_text2, 'h4');
					
					good_food_get_project_info($cmsmasters_project_info_title3, $cmsmasters_project_info_text3, 'h4');
					
					good_food_get_project_info($cmsmasters_project_info_title4, $cmsmasters_project_info_text4, 'h4');
					
					
					if ($cmsmasters_project_rating == 'true' && CMSMASTERS_RATING) {
						good_food_cmsmasters_rating(get_the_ID(), 'h4', true);
					}
					
				echo '</div>';
			}
			
			
			if (
				!empty($cmsmasters_project_ingredients[0]) || 
				!empty($cmsmasters_project_ingredients[1])
			) {
				good_food_get_project_ingredients($cmsmasters_project_ingredients, $cmsmasters_project_ingredients_title, 'h3', true);
			}
			
			
			if (
				(
					!empty($cmsmasters_project_features[0][0]) || 
					!empty($cmsmasters_project_features[0][1])
				) || (
					!empty($cmsmasters_project_features[1][0]) || 
					!empty($cmsmasters_project_features[1][1])
				) || (
					!empty($cmsmasters_project_features_one[0][0]) || 
					!empty($cmsmasters_project_features_one[0][1])
				) || (
					!empty($cmsmasters_project_features_one[1][0]) || 
					!empty($cmsmasters_project_features_one[1][1])
				) || (
					!empty($cmsmasters_project_features_two[0][0]) || 
					!empty($cmsmasters_project_features_two[0][1])
				) || (
					!empty($cmsmasters_project_features_two[1][0]) || 
					!empty($cmsmasters_project_features_two[1][1])
				) || (
					!empty($cmsmasters_project_features_three[0][0]) || 
					!empty($cmsmasters_project_features_three[0][1])
				) || (
					!empty($cmsmasters_project_features_three[1][0]) || 
					!empty($cmsmasters_project_features_three[1][1])
				)
			) {
				good_food_get_project_features('features', $cmsmasters_project_features, $cmsmasters_project_details_title, 'h3', true);
				
				good_food_get_project_features('features', $cmsmasters_project_features_one, $cmsmasters_project_features_one_title, 'h3', true);
				
				good_food_get_project_features('features', $cmsmasters_project_features_two, $cmsmasters_project_features_two_title, 'h3', true);
				
				good_food_get_project_features('features', $cmsmasters_project_features_three, $cmsmasters_project_features_three_title, 'h3', true);
			}
			
		echo '</div>';
	}
	
	
	if (
		(get_the_excerpt() != '' && $cmsmasters_project_excerpt) || 
		(
			!empty($cmsmasters_project_instructions[0]) || 
			!empty($cmsmasters_project_instructions[1])
		) || 
		get_the_content() != '' || 
		$cmsmasters_project_sharing_box == 'true' || 
		$cmsmasters_option['good-food' . '_portfolio_project_nav_box'] || 
		$cmsmasters_project_more_posts != 'hide' || 
		$cmsmasters_project_author_box == 'true' || 
		comments_open()
	) {
		echo '<div class="cmsmasters_open_project_right_wrap">';
			
			if (get_the_excerpt() != '' && $cmsmasters_project_excerpt) {
				echo '<h5 class="cmsmasters_project_excerpt">' . 
					get_the_excerpt() . 
				'</h5>';
			}
			
			if (
				!empty($cmsmasters_project_instructions[0]) || 
				!empty($cmsmasters_project_instructions[1])
			) {
				good_food_get_project_instructions($cmsmasters_project_instructions, $cmsmasters_project_instructions_title, 'h3', true);
			}
			
			
			if (get_the_content() != '') {
				echo '<div class="cmsmasters_project_content entry-content">' . "\n";
					
					the_content();
					
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'good-food') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => ' [ ', 
						'link_after' => ' ] ' 
					));
					
				echo '</div>';
			}
			
			
			if ($cmsmasters_project_print_btn != 'false') {
				echo '<div class="cmsmasters_print_button_wrap">' . 
					'<a href="#" class="cmsmasters_print_button cmsmasters-icon-print-3" onclick="window.print();return false;">' . esc_html__('Print', 'good-food') . '</a>' . 
				'</div>';
			}
			
			
			if ($cmsmasters_project_sharing_box == 'true') {
				good_food_sharing_box(esc_html__('Share:', 'good-food'), 'h2', $cmsmasters_project_print_btn);
			}
			
			
			if ($cmsmasters_option['good-food' . '_portfolio_project_nav_box']) {
				good_food_prev_next_posts();
			}
			
			
			if ($project_tags) {
				$tgsarray = array();
				
				
				foreach ($project_tags as $tagone) {
					$tgsarray[] = $tagone->term_id;
				}  
			} else {
				$tgsarray = '';
			}
			
			
			if ($cmsmasters_project_more_posts != 'hide') {
				good_food_related( 
					'h3', 
					esc_html__('Similar recipes', 'good-food'), 
					esc_html__('No recipes found', 'good-food'), 
					$cmsmasters_project_more_posts, 
					$tgsarray, 
					$cmsmasters_option['good-food' . '_portfolio_more_projects_count'], 
					$cmsmasters_option['good-food' . '_portfolio_more_projects_pause'], 
					'project', 
					'pj-tags' 
				);
			}
			
			
			if ($cmsmasters_project_author_box == 'true') {
				good_food_author_box(esc_html__('About author', 'good-food'), 'h3', 'h4');
			}
			
			
			comments_template();
			
		echo '</div>';
	}
	?>
</article>
<!--_________________________ Finish Project Single Article _________________________ -->

