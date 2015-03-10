<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package genio-wt
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
<?php 
if('page' == get_post_type()){
	echo '<div class="container">';
}
?>
<div id="comments" class="secondary-block__sub-padder striped-separated comments-wrapper">
	<?php if ( have_comments() ) : ?>
		<h5><?php _e('Comments','genio_wt_lang'); ?></h5>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav class="xlg-padder">
				<ul class="pager">
					<li><?php previous_comments_link( sprintf( __( '%1$s Older Comments', 'genio_wt_lang' ), '<span>&#8592;</span>' ) ); ?></li>
					<li><?php next_comments_link( sprintf( __( 'Newer Comments %1$s', 'genio_wt_lang' ), '<span>&#8594;</span>' ) ); ?></li>
				</ul>
			</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="list-unstyled comments-list">
			<?php
				wp_list_comments( array(
					'callback' => 'genio_wt_comment',
					'style'      => 'ol',
					'reply_text'  => sprintf(__('%1$sReply','genio_wt_lang'), '<i class="fa fa-repeat"></i>'),
					'short_ping' => true,
				) );
			?>
		</ol>

	<?php endif; // have_comments() ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'genio_wt_lang' ); ?></p>
	<?php endif; ?>

	<?php if(comments_open()){ ?>
			<?php
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );
				comment_form(array(
					'format' => 'html5',
					'comment_notes_before' => '',
					'comment_notes_after' => '',
					'fields' => array(
						'author' =>'<div class="form-group"><input type="text" name="author" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . __( 'Your Name', 'genio_wt_lang' ) . '" ' . $aria_req . '></div>',
						'email' =>'<div class="form-group"><input type="email" name="email" class="form-control" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" placeholder="' . __( 'Your Email', 'genio_wt_lang' ) . '" ' . $aria_req . '></div>',
						'url' => '<div class="form-group"><input type="text" name="url" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Your Website', 'genio_wt_lang' ) . '"></div>',
					),
					'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" class="form-control" cols="45" rows="8" placeholder="' . __( 'Your Comment', 'genio_wt_lang' ) . '" aria-required="true"></textarea></div>',
					'label_submit' => 'Submit Comment',
					'cancel_reply_link' => 'Cancel',
				));
			?>
	<?php } ?>
</div>
<?php 
if('page' == get_post_type()){
	echo '</div>';
}
?>