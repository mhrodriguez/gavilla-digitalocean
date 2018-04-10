<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Posts Slider Post Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);


$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && good_food_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;


$cmsmasters_post_format = get_post_format();

?>
<!--_________________________ Start Posts Slider Post Article _________________________ -->
<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
	<div class="cmsmasters_slider_post_outer">
	<?php
		echo '<div class="cmsmasters_slider_post_img_wrap">';
		
			good_food_thumb_rollover(get_the_ID(), 'cmsmasters-square-thumb', false, false, false, false, false, false, false, false, true, false, false);
		
		echo '</div>';
		
		
		if ($date || $likes || $comments || $title || $author || $categories || $excerpt || $more) {
			echo '<div class="cmsmasters_slider_post_inner">';
				
				if ($likes || $comments) {
					echo '<div class="cmsmasters_slider_post_inner_meta entry-meta">';
						
						$date ? good_food_get_slider_post_date('post') : '';
						
						$comments ? good_food_get_slider_post_comments('post') : '';
						
						$likes ? good_food_slider_post_like('post') : '';
						
					echo '</div>';
				}
				
				$title ? good_food_slider_post_heading(get_the_ID(), 'post', 'h3') : '';
				
				
				if ($author || $categories) {
					echo '<div class="cmsmasters_slider_post_cont_info entry-meta">';
						
						$author ? good_food_get_slider_post_author('post') : '';
						
						$categories ? good_food_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
						
					echo '</div>';
				}
				
				
				$excerpt ? good_food_slider_post_exc_cont('post') : '';
				
				
				if ($more) {
					echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
						
						$more ? good_food_slider_post_more(get_the_ID()) : '';
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Posts Slider Post Article _________________________ -->

