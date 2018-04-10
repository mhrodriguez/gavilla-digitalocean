<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Quote Slider Template
 * Created by CMSMasters
 * 
 */


?>
<!--_________________________ Start Quote Slider Article _________________________ -->
<article class="cmsmasters_quote_inner">
<?php 
	if ($quote_image != '') {
		echo '<figure class="cmsmasters_quote_image">' . 
			wp_get_attachment_image(strstr($quote_image, '|', true), 'cmsmasters-project-masonry-thumb') . 
		'</figure>';
	}
	
	
	if ($quote_name != '' || $quote_subtitle != '' || $quote_website != '' || $quote_link != '' || $quote_content != '') {
		echo '<div class="cmsmasters_quote_inner_content_wrap">' . 
			'<div class="cmsmasters_quote_inner_content">';
		
			
			if ($quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
				echo '<div class="cmsmasters_quote_subtitle_wrap">' . 
					
					($quote_subtitle != '' ? '<h5 class="cmsmasters_quote_subtitle">' . esc_html($quote_subtitle) . '</h5>' : '');
					
					
					if ($quote_website != '' || $quote_link != '') {
						echo '<span class="cmsmasters_quote_site">' . 
							($quote_link != '' ? '<a href="' . esc_url($quote_link) . '" target="_blank">' : '') . 
							
							($quote_website != '' ? esc_html($quote_website) : esc_html($quote_link)) . 
							
							($quote_link != '' ? '</a>' : '') . 
						'</span>';
					}
					
				echo '</div>';
			}
			
			
			if ($quote_name != '') {
				echo '<header class="cmsmasters_quote_header">' . 
					'<h3 class="cmsmasters_quote_title">' . esc_html($quote_name) . '</h3>' . 
				'</header>';
			}
			
			
			$quote_content = '"' . $quote_content . '"';
			
			echo cmsmasters_divpdel('<div class="cmsmasters_quote_content">' . 
				do_shortcode(wpautop(wp_kses(stripslashes($quote_content), 'post'))) . 
			'</div>');
			
		echo '</div>' . 
		'</div>';
	}
?>
</article>
<!--_________________________ Finish Quote Slider Article _________________________ -->

