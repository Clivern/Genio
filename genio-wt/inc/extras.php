<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package genio-wt
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0
 * @param array $classes Classes for the body element.
 * @return array
 */
function genio_wt_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'genio_wt_body_classes' );


/**
 * Customize read more link in posts
 *
 * @since 1.0
 * @return string
 */
function genio_wt_custom_read_more() {
	return '<div class="lg-padder"><a href="' . esc_url(get_permalink()) . '" class="btn read-more-btn">' . __('Read More', 'genio_wt_lang') . '</a></div>';
}
add_filter( 'the_content_more_link', 'genio_wt_custom_read_more' );


if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @since 1.0
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function genio_wt_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'genio_wt_lang' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'genio_wt_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function genio_wt_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'genio_wt_render_title' );
endif;


if ( ! function_exists( 'genio_wt_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own genio_wt_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since 1.0
	 *
	 * @param object $comment The comment object.
	 * @param array  $args    An array of arguments. @see get_comment_reply_link()
	 * @param int    $depth   The depth of the comment.
	 */
	function genio_wt_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class('comment clearfix'); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="user rounded-box">
					<?php echo get_avatar( $comment, 60 ); ?>
				</div>
				
				<div class="message">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	
					<!-- USER MESSAGE BODY -->
					<div class="info">
						<?php printf( '<span class="h6 text-capitalize comment-username">%s</span>', get_comment_author_link() ); ?>
						<span class="em comment-date">
							<small><?php printf( __( '%1$s at %2$s', 'genio_wt_lang' ), get_comment_date(),  get_comment_time() ); ?></small>
						</span>
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<span class="comment-awaiting-moderation">
							<?php _e( 'Your comment is awaiting moderation.', 'genio_wt_lang' ); ?>
						</span>
						<?php endif; ?>
						<?php edit_comment_link( __( 'Edit', 'genio_wt_lang' ), '<span class="comment-edit-link">', '</span>'); ?>
					</div>
					<!-- COMMENT TEXT -->
					<div class="typeset">
					<?php comment_text(); ?>
					</div>
				</div>
			</div>
	
		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="pingback">
			<p><?php _e( 'Pingback:', 'genio_wt_lang' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'genio_wt_lang' ), ' ' ); ?></p>
		
		<?php
				break;
		endswitch;
	}
endif;