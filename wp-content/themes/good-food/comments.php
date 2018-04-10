<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Comments Template
 * Created by CMSMasters
 * 
 */


if (post_password_required()) { 
	echo '<p class="nocomments">' . esc_html__('This post is password protected. Enter the password to view comments.', 'good-food') . '</p>';
	
	
    return;
}


if (have_comments()) {
	echo '<aside id="comments" class="post_comments">' . "\n" . 
		'<h3 class="post_comments_title">';
	
	
	comments_number(esc_attr__('No Comments', 'good-food'), esc_attr__('Comment', 'good-food') . ' (1)', esc_attr__('Comments', 'good-food') . ' (%)');
	
	
	echo '</h3>' . "\n";
	
	
	if (get_previous_comments_link() || get_next_comments_link()) {
		echo '<aside class="comments_nav">';
			
			if (get_previous_comments_link()) {
				echo '<span class="comments_nav_prev cmsmasters_theme_icon_comments_nav_prev">';
					
					previous_comments_link(esc_attr__('Older Comments', 'good-food'));
					
				echo '</span>';
			}
			
			
			if (get_next_comments_link()) {
				echo '<span class="comments_nav_next cmsmasters_theme_icon_comments_nav_next">';
					
					next_comments_link(esc_attr__('Newer Comments', 'good-food'));
					
				echo '</span>';
			}
			
		echo '</aside>';
	}
	
	
	echo '<ol class="commentlist">' . "\n";
	
	
	wp_list_comments(array( 
		'type' => 'comment', 
		'callback' => 'good_food_mytheme_comment' 
	));
	
	
	echo '</ol>' . "\n";
	
	
	if (get_previous_comments_link() || get_next_comments_link()) {
		echo '<aside class="comments_nav">';
			
			if (get_previous_comments_link()) {
				echo '<span class="comments_nav_prev cmsmasters_theme_icon_comments_nav_prev">';
					
					previous_comments_link(esc_attr__('Older Comments', 'good-food'));
					
				echo '</span>';
			}
			
			
			if (get_next_comments_link()) {
				echo '<span class="comments_nav_next cmsmasters_theme_icon_comments_nav_next">';
					
					next_comments_link(esc_attr__('Newer Comments', 'good-food'));
					
				echo '</span>';
			}
			
		echo '</aside>';
	}
	
	
	echo '</aside>';
}


if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) {
	echo '<h5 class="no-comments cmsmasters_comments_closed">' . esc_html__('Comments are closed.', 'good-food') . '</h5>';
}


$form_fields =  array( 
	'author' => '<p class="comment-form-author">' . "\n" . 
		'<label for="author">' . esc_html__('Nombre', 'good-food') . (($req) ? '<span class="cmsmasters_req">*</span>' : '') . '</label>' . "\n" . 
		'<input type="text" id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . '/>' . "\n" . 
	'</p>' . "\n", 
	'email' => '<p class="comment-form-email">' . "\n" . 
		'<label for="email">' . esc_html__('Email', 'good-food') . (($req) ? '<span class="cmsmasters_req">*</span>' : '') . '</label>' . "\n" . 
		'<input type="text" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="35"' . ((isset($aria_req)) ? $aria_req : '') . '/>' . "\n" . 
	'</p>' . "\n" 
);


comment_form(array( 
	'fields' => 			apply_filters('comment_form_default_fields', $form_fields), 
	'comment_field' => 		'<p class="comment-form-comment">' . 
								'<label for="comment">' . esc_html__('Comentarios', 'good-food') . '</label>' . 
								'<textarea name="comment" id="comment" cols="67" rows="2"></textarea>' . 
							'</p>', 
	'must_log_in' => 		'<p class="must-log-in">' . 
								esc_html__('You must be', 'good-food') . 
								' <a href="' . esc_url(wp_login_url(apply_filters('the_permalink', get_permalink()))) . '">' 
									. esc_html__('logged in', 'good-food') . 
								'</a> ' 
								. esc_html__('to post a comment', 'good-food') . 
							'.</p>' . "\n", 
	'logged_in_as' => 		'<p class="logged-in-as">' . 
								esc_html__('Y la Chef Patricia Quintana te responder&aacute; a la brevedad. - Logueado como', 'good-food') . 
								' <a href="' . esc_url(admin_url('profile.php')) . '">' . 
									$user_identity . 
								'</a>. ' . 
								'<a class="all" href="' . esc_url(wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '" title="' . esc_attr__('Log out of this account', 'good-food') . '">' . 
									esc_html__('Log out?', 'good-food') . 
								'</a>' . 
							'</p>' . "\n", 
	'comment_notes_before' => 	'<p class="comment-notes">' . 
									esc_html__('Y la Chef Patricia Quintana te responder&aacute; a la brevedad.', 'good-food') . 
								'</p>' . "\n", 
	'comment_notes_after' => 	'', 
	'id_form' => 				'commentform', 
	'id_submit' => 				'submit', 
	'title_reply' => 			esc_attr__('Deja tus comentarios', 'good-food'), 
	'title_reply_to' => 		esc_attr__('Leave your comment to', 'good-food'), 
	'cancel_reply_link' => 		esc_attr__('Cancel Reply', 'good-food'), 
	'label_submit' => 			esc_attr__('Enviar', 'good-food') 
));

