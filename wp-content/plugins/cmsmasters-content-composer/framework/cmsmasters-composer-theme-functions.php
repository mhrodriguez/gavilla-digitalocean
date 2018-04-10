<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		2.0.9
 * 
 * Composer Theme Functions
 * Created by CMSMasters
 * 
 */


/* Get Sharing Box Function */
function cmsmasters_sharing_box($title_box = false, $tag = 'h3') {
	$page_link = urlencode(get_permalink());
	
	$social_title = cmsmasters_title(get_the_ID(), false);
	
	$website_name = get_bloginfo('name');
	
	
	if (has_post_thumbnail() && get_post_format() != '' || get_post_type() != 'post' ) {
		$post_img_id = get_post_thumbnail_id();
		
		$post_img_url = wp_get_attachment_url($post_img_id);
		
		$pinterest_img = urlencode($post_img_url);
	} else {
		preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode(get_the_content()), $img_matches);
		
		
		if (!empty($img_matches[1][0])) {
			$first_img = $img_matches[1][0];
		} else {
			$first_img = get_template_directory_uri() . '/theme-framework/theme-style' . CMSMASTERS_CONTENT_COMPOSER_THEME_STYLE . '/img/logo.png';
		}
		
		
		$pinterest_img = urlencode($first_img);
	}
	
	
	return "<aside class=\"share_posts\">
		" . ($title_box ? "<{$tag} class=\"share_posts_title\">{$title_box}</{$tag}>" : "") . "
		<div class=\"share_posts_inner\">
			<a href=\"https://www.facebook.com/sharer/sharer.php?display=popup&u={$page_link}\">" . esc_html__('Facebook', 'cmsmasters-content-composer') . "</a>
			<a href=\"https://plus.google.com/share?url={$page_link}\">" . esc_html__('Google+', 'cmsmasters-content-composer') . "</a>
			<a href=\"https://twitter.com/intent/tweet?text=" . urlencode(html_entity_decode(sprintf(esc_attr__("Check out '%s' on %s website", 'cmsmasters-content-composer'), $social_title, $website_name), ENT_QUOTES, 'UTF-8')) . "&url={$page_link}\">" . esc_html__('Twitter', 'cmsmasters-content-composer') . "</a>
			<a href=\"https://pinterest.com/pin/create/button/?url={$page_link}&media={$pinterest_img}&description={$social_title}\">" . esc_html__('Pinterest', 'cmsmasters-content-composer') . "</a>
		</div>
	</aside>
";
}

