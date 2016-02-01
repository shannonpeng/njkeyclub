<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package fortunato
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="sepHentry comments-title"><h2><i class="fa fa-comments spaceRight"></i>
			<?php comments_number(__('No comments', 'fortunato'), __('1 comment', 'fortunato'), __('% comments', 'fortunato')); ?>
		</h2></div>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => '60',
					'reply_text'        =>  '<span>' .__( 'Reply'  , 'fortunato' ) . '<i class="fa fa-reply spaceLeft"></i></span>',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php fortunato_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'fortunato' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' => '<div class="blockCommentLeft"><p class="comment-form-author"><label for="author"><span class="screen-reader-text">' . __( 'Name *'  , 'fortunato' ) . '</span></label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . __( 'Name *'  , 'fortunato' ) . '"/></p>',
		'email'  => '<p class="comment-form-email"><label for="email"><span class="screen-reader-text">' . __( 'Email *'  , 'fortunato' ) . '</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . __( 'Email *'  , 'fortunato' ) . '"/></p>',
		'url'    => '<p class="comment-form-url"><label for="url"><span class="screen-reader-text">' . __( 'Website *'  , 'fortunato' ) . '</span></label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website'  , 'fortunato' ) . '"/></p></div>',
	);
	$required_text = __(' Required fields are marked ', 'fortunato').' <span class="required">*</span>';
	?>
	<?php comment_form( array(
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' , 'fortunato' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as smallPart">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>'  , 'fortunato' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p><div class="blockComment">',
		'comment_notes_before' => '<p class="comment-notes smallPart">' . __( 'Your email address will not be published.'  , 'fortunato' ) . ( $req ? $required_text : '' ) . '</p><div class="blockComment double">',
		'title_reply' => __( 'Leave a Reply'  , 'fortunato' ),
		'title_reply_to' => __( 'Leave a Reply to %s'  , 'fortunato' ),
		'cancel_reply_link' => __( 'Cancel reply'  , 'fortunato' ) . '<i class="fa fa-times spaceLeft"></i>',
		'label_submit' => __( 'Post Comment'  , 'fortunato' ),
		'comment_field' => '<div class="blockCommentRight"><p class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . __( 'Comment *'  , 'fortunato' ) . '</span></label><textarea id="comment" name="comment" rows="8" aria-required="true" placeholder="' . __( 'Comment *'  , 'fortunato' ) . '"></textarea></p></div>',
		'comment_notes_after' => '</div><p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' , 'fortunato'),' <code>' . allowed_tags() . '</code>') . '</p>',
	));
	?>

</div><!-- #comments -->
