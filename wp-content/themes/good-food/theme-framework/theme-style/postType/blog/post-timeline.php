<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Post Timeline Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = !is_home() ? explode(',', $cmsmasters_metadata) : array();


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;
$views = (in_array('views', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_format = get_post_format();

?>
<!--_________________________ Start Post Timeline Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_timeline'); ?>>
	<?php 
	if ($date) {
		echo '<div class="cmsmasters_post_info entry-meta">';
		
			good_food_get_post_date('page', 'timeline');
			
		echo '</div>';
	}
	?>
	<div class="cmsmasters_timeline_margin">
		<div class="cmsmasters_post_cont">
		<?php
			if ($cmsmasters_post_format == 'audio') {
				$cmsmasters_post_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_post_audio_links', true);
				
				good_food_post_type_audio($cmsmasters_post_audio_links);
			} elseif ($cmsmasters_post_format == 'video') {
				$cmsmasters_post_video_type = get_post_meta(get_the_ID(), 'cmsmasters_post_video_type', true);
				$cmsmasters_post_video_link = get_post_meta(get_the_ID(), 'cmsmasters_post_video_link', true);
				$cmsmasters_post_video_links = get_post_meta(get_the_ID(), 'cmsmasters_post_video_links', true);
				
				good_food_post_type_video(get_the_ID(), $cmsmasters_post_video_type, $cmsmasters_post_video_link, $cmsmasters_post_video_links);
			} elseif ($cmsmasters_post_format == 'image') {
				$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);
				
				good_food_post_type_image(get_the_ID(), $cmsmasters_post_image_link);
			} elseif ($cmsmasters_post_format == 'gallery') {
				$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));
				
				$slider_data = ' data-auto-height="false"';
				
				good_food_post_type_slider(get_the_ID(), $cmsmasters_post_images, 'post-thumbnail', $slider_data);
			} elseif ($cmsmasters_post_format == '' && !post_password_required() && has_post_thumbnail()) {
				good_food_thumb(get_the_ID(), 'post-thumbnail', true, false, true, false, true, true, false);
			}
			
			
			good_food_post_heading(get_the_ID(), 'h3');
			
			
			if ($views || $likes || $comments || $author || $categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					if ($views || $likes || $comments) {
						echo '<div class="cmsmasters_post_cont_info_meta">';
							
							$views ? good_food_get_post_views('page') : '';
							
							$likes ? good_food_get_post_likes('page') : '';
							
							$comments ? good_food_get_post_comments('page') : '';
							
						echo '</div>';
					}
					
					$author ? good_food_get_post_author('page', 'other') : '';
					
					$categories ? good_food_get_post_category(get_the_ID(), 'category', 'page', 'other') : '';
					
				echo '</div>';
			}
			
			
			good_food_post_exc_cont();
			
			
			if ($more) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
					
					$more ? good_food_post_more(get_the_ID()) : '';
					
				echo '</footer>';
			}
		?>
		</div>
	</div>
</article>
<!--_________________________ Finish Post Timeline Article _________________________ -->

