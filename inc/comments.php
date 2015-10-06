<?php
/**
 * Comment Output
 *
 * @package yuuta
 */

function custom_theme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
	?>

	<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>

	<div class="comment-avatar"><?php echo get_avatar($comment,$size='60'); ?></div>
	<div class="comment-author"><?php comment_author(); ?></div>
	<div class="comment-time"><?php comment_date('M d, Y'); ?></div>
	<div class="clear"></div>

	<div class="comment-container">
		<div class="comment-entry">

		<?php if ($comment->comment_approved == '0') : ?>
			<strong><?php _e('(Your comment is awaiting moderation.)', 'yuuta') ?></strong>
		<?php endif; ?>
		
		<?php echo comment_text(); ?>
		<?php edit_comment_link( __('Edit', 'yuuta'),' [',']') ?>

		</div>
		
		<div class="clear"></div>
		
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'reply_text' => __( 'Reply', 'yuuta' ), 'max_depth' => $args['max_depth']))) ?>
	
	</div>

	<?php
}
