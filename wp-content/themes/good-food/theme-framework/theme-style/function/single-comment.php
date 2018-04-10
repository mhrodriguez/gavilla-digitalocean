<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Custom Single Comment Template
 * Created by CMSMasters
 * 
 */


function good_food_mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body cmsmasters_comment_item">
			<div class="cmsmasters_comment_item_avatar_wrap">
				<figure class="cmsmasters_comment_item_avatar">
					<?php echo get_avatar($comment->comment_author_email, 50, get_option('avatar_default')) . "\n"; ?>
				</figure>
				
				<?php edit_comment_link(esc_attr__('Edit', 'good-food'), '', ''); ?>
			</div>
			<div class="comment-content cmsmasters_comment_item_cont">
				<div class="cmsmasters_comment_item_cont_info">
					<h4 class="fn cmsmasters_comment_item_title"><?php echo get_comment_author_link(); ?></h4>
					<div class="cmsmasters_comment_item_cont_reply_date">
					<?php 
					echo '<abbr class="published cmsmasters_comment_item_date" title="' . get_comment_date() . '">' . 
						get_comment_date() . 
					'</abbr>';
					
					comment_reply_link(array_merge($args, array( 
						'depth' => $depth, 
						'max_depth' => $args['max_depth'], 
						'reply_text' => esc_attr__('Reply', 'good-food') 
					)));
					?>
					</div>
				</div>
				<div class="cmsmasters_comment_item_content">
					<?php 
					comment_text();
					
					if ($comment->comment_approved == '0') {
						echo '<p>' . 
							'<em>' . esc_html__('Your comment is awaiting moderation.', 'good-food') . '</em>' . 
						'</p>';
					}
					?>
				</div>
			</div>
        </div>
    <?php 
}

