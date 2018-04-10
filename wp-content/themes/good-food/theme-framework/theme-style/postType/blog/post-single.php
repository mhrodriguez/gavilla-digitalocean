<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Post Single Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();

$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_post_subtitle', true);


$cmsmasters_image_thumb_size = 'cmsmasters-masonry-thumb';


$cmsmasters_post_format = get_post_format();


if ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
	$cmsmasters_post_image_show = get_post_meta(get_the_ID(), 'cmsmasters_post_image_show', true);
}


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);

?>
<!--_________________________ Start Post Single Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if (
		$cmsmasters_post_title == 'true' || 
		$cmsmasters_option['good-food' . '_blog_post_date'] || 
		$cmsmasters_option['good-food' . '_blog_post_comment'] || 
		$cmsmasters_option['good-food' . '_blog_post_like'] || 
		$cmsmasters_option['good-food' . '_blog_post_view']
	) {
		echo '<div class="cmsmasters_open_post_top_wrap entry-meta">';
			if ($cmsmasters_post_title == 'true') {
				good_food_post_title_nolink(get_the_ID(), 'h1');
			}
			
			
			if (
				$cmsmasters_option['good-food' . '_blog_post_date'] || 
				$cmsmasters_option['good-food' . '_blog_post_comment'] || 
				$cmsmasters_option['good-food' . '_blog_post_like'] || 
				$cmsmasters_option['good-food' . '_blog_post_view']
			) {
				echo '<div class="cmsmasters_open_post_top_meta' . (($cmsmasters_post_subtitle && $cmsmasters_post_subtitle != '') ? ' with_subtitle' : '') . '">';
					good_food_get_post_date('post');
					
					good_food_get_post_comments('post');
					
					good_food_get_post_likes('post');
					
					good_food_get_post_views('post');
				echo '</div>';
			}
			
			
			good_food_post_subtitle($cmsmasters_post_subtitle);
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_post_format == 'image' || 
		$cmsmasters_post_format == 'gallery' || 
		$cmsmasters_post_format == 'video' || 
		$cmsmasters_post_format == 'audio' || 
		($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail() && $cmsmasters_post_image_show != 'true') || 
		$cmsmasters_option['good-food' . '_blog_post_author'] || 
		$cmsmasters_option['good-food' . '_blog_post_cat'] || 
		$cmsmasters_option['good-food' . '_blog_post_tag'] || 
		get_the_content() != '' || 
		$cmsmasters_post_sharing_box == 'true' || 
		$cmsmasters_option['good-food' . '_blog_post_nav_box']		
	) {
		echo '<div class="cmsmasters_open_post_left_wrap">';
			
			if ($cmsmasters_post_format == 'image') {
				$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
				
				good_food_post_type_image(get_the_ID(), $cmsmasters_post_image_link, $cmsmasters_image_thumb_size);
			} elseif ($cmsmasters_post_format == 'gallery') {
				$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
				
				good_food_post_type_slider(get_the_ID(), $cmsmasters_post_images, $cmsmasters_image_thumb_size);
			} elseif ($cmsmasters_post_format == 'video') {
				$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
				$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
				$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
				
				good_food_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links, $cmsmasters_image_thumb_size);
			} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail() && $cmsmasters_post_image_show != 'true') {
				good_food_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'cmsmasters_open_post_img', false, false, false, true, false);
			} elseif ($cmsmasters_post_format == 'audio') {
				$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
				
				good_food_post_type_audio($cmsmasters_post_audio_links);
			}
			
			
			if (
				$cmsmasters_option['good-food' . '_blog_post_author'] || 
				$cmsmasters_option['good-food' . '_blog_post_cat'] || 
				$cmsmasters_option['good-food' . '_blog_post_tag']
			) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					good_food_get_post_author('post');
					
					good_food_get_post_category(get_the_ID(), 'category', 'post');
					
					good_food_get_post_tags();
					
				echo '</div>';
			}
			
			
			if (get_the_content() != '') {
				echo '<div class="cmsmasters_post_content entry-content">';
					
					the_content();
					
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav">' . '<strong>' . esc_html__('Pages', 'good-food') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => ' [ ', 
						'link_after' => ' ] ' 
					));
					
				echo '</div>';
			}
			
			
			if ($cmsmasters_post_sharing_box == 'true') {
				good_food_sharing_box(esc_html__('Share:', 'good-food'), 'h2');
			}
			
			
			if ($cmsmasters_option['good-food' . '_blog_post_nav_box']) {
				good_food_prev_next_posts();
			}
			
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_post_more_posts != 'hide' || 
		$cmsmasters_post_author_box == 'true' || 
		comments_open() || 
		pings_open()
	) {
		echo '<div class="cmsmasters_open_post_right_wrap">';
			
			if (get_the_tags()) {
				$tgsarray = array();
				
				foreach (get_the_tags() as $tagone) {
					$tgsarray[] = $tagone->term_id;
				}
			} else {
				$tgsarray = '';
			}
			
			
			if ($cmsmasters_post_more_posts != 'hide') {
				good_food_related( 
					'h3', 
					esc_html__('M&aacute;s temas', 'good-food'), 
					esc_html__('No posts found', 'good-food'), 
					$cmsmasters_post_more_posts, 
					$tgsarray, 
					$cmsmasters_option['good-food' . '_blog_more_posts_count'], 
					$cmsmasters_option['good-food' . '_blog_more_posts_pause'], 
					'post' 
				);
			}
			
			
			if ($cmsmasters_post_author_box == 'true') {
				good_food_author_box(esc_html__('About author', 'good-food'), 'h3', 'h4');
			}
			
			
			echo good_food_get_pings(get_the_ID(), 'h3');
			
			
			comments_template();
			
		echo '</div>';
	}
	?>
</article>
<!--_________________________ Finish Post Single Article _________________________ -->

