<?php
/**
* Comments.php
*
* Comments file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'nuovo'); ?></p>
	<?php
		return;
	}
?>
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses', 'nuovo'), __('One Response', 'nuovo'), __('% Responses', 'nuovo') );?> <?php _e('to', 'nuovo'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=nuovo_advanced_comment');
                ?>
	</ol>
	<div class="clear"></div>
	<div class="comment-navigation">
		<div class="older"><?php previous_comments_link() ?></div>
		<div class="newer"><?php next_comments_link() ?></div>
	</div>
 <?php else : ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else :?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php __('Comments are closed.', 'nuovo'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond" class="clearfix">
<?php
$comments_args = array(
        // Change the title of send button
        'label_submit' => __( 'Submit', 'textdomain' ),
        // Change the title of the reply section
        'title_reply' => __( '', 'textdomain' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
);
comment_form( $comments_args ); ?>
</div>
<?php endif; ?>
