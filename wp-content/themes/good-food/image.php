<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Images Page Template
 * Created by CMSMasters
 * 
 */


get_header();


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry">';


if (have_posts()) : the_post();
	echo '<div class="cmsmasters_attach_img image-attachment">';
		
		$metadata = wp_get_attachment_metadata();
		
		echo '<div class="cmsmasters_attach_img_info entry-meta">'; 
			edit_post_link(esc_html__('Edit Media', 'good-food'), '<h5 class="cmsmasters_attach_img_edit">', '</h5>');
			
			echo '<h5 class="cmsmasters_attach_img_meta">' . esc_html__('Published', 'good-food') . ' <abbr class="published" title="' . esc_attr(get_the_date()) . '">' . get_the_date() . '</abbr> ' . esc_html__('at', 'good-food') . ' ' . esc_html($metadata['width']) . '&times;' . esc_html($metadata['height']) . ' ' . esc_html__('in', 'good-food') . ' ' . '<a href="' . esc_url(get_permalink($post->post_parent)) . '" title="' . cmsmasters_title($post->post_parent, false) . '">' . cmsmasters_title($post->post_parent, false) . '</a>.</h5>' . 
		'</div>' . 
		good_food_thumb(get_the_ID(), 'full', false, 'img_' . get_the_ID(), true, true, true, false, get_the_ID());
		
		
		comments_template();
		
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

