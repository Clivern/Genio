<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package genio-wt
 */

if ( ! function_exists( 'genio_wt_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0
	 * @param bool $front
	 * @return string
	 */
	function genio_wt_posted_on($front = false) {
			global $post;
	
			if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
				$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
			} else {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
			}
	
			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() ),
				esc_attr( get_the_modified_date( 'c' ) ),
				esc_html( get_the_modified_date() )
			);
	
			$categories_list = get_the_category_list( __( ', ', 'dailyplus' ) );
			if(!$front){
				echo '<span><a href="'. esc_url( get_author_posts_url($post->post_author) ) . '"><i class="fa fa-user"></i>' . get_the_author() . '</a></span>';
			}
			echo '<span><a href="' . esc_url(get_permalink()) . '"><i class="fa fa-clock-o"></i>' . wp_kses_post( $time_string ) . '</a></span>';
			if(!$front){
				echo '<span><i class="fa fa-tag"></i>' . $categories_list . '</span>';
			}
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
				echo '<span><i class="fa fa-comments"></i>';
				comments_popup_link( __( '0 Comment', 'genio_wt_lang' ), __( '1 Comment', 'genio_wt_lang' ), __( '% Comments', 'genio_wt_lang' ) );
				echo '</span>';
			}
	}
endif;


if ( ! function_exists( 'genio_wt_the_posts_navigation' ) ) :

	/**
	 * Display navigation to next/previous set of posts when applicable.
	 *
	 * @since 1.0
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function genio_wt_the_posts_navigation() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav id="navigation" class="secondary-block__padder">
			<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'genio_wt_lang' ); ?></h2>
			<ul class="pager">
				<?php if ( get_next_posts_link() ) : ?>
				<li><?php next_posts_link( sprintf( __( '%1$s Older posts', 'genio_wt_lang' ), '<span>&#8592;</span>' ) ); ?></li>
				<?php endif; ?>
				<?php if ( get_previous_posts_link() ) : ?>
				<li><?php previous_posts_link( sprintf( __( 'Newer posts %1$s', 'genio_wt_lang' ), '<span>&#8594;</span>' ) ); ?></li>
				<?php endif; ?>
			</ul>
		</nav>
		<?php
	}
endif;


if ( ! function_exists( 'the_post_navigation' ) ) :
	
	/**
	 * Display navigation to next/previous post when applicable.
	 *
	 * @since 1.0
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function the_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'genio_wt_lang' ); ?></h2>
			<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
			</div>
		</nav>
		<?php
	}
endif;


if ( ! function_exists( 'genio_wt_the_archive_title' ) ) :

	/**
	 * Shim for `the_archive_title()`.
	 *
	 * Display the archive title based on the queried object.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @since 1.0
	 * @param string $before Optional. Content to prepend to the title. Default empty.
	 * @param string $after  Optional. Content to append to the title. Default empty.
	 */
	function genio_wt_the_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Category: %s', 'genio_wt_lang' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Tag: %s', 'genio_wt_lang' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Author: %s', 'genio_wt_lang' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Year: %s', 'genio_wt_lang' ), get_the_date( _x( 'Y', 'yearly archives date format', 'genio_wt_lang' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Month: %s', 'genio_wt_lang' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'genio_wt_lang' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Day: %s', 'genio_wt_lang' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'genio_wt_lang' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = _x( 'Links', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'genio_wt_lang' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'genio_wt_lang' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Archives: %s', 'genio_wt_lang' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'genio_wt_lang' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = __( 'Archives', 'genio_wt_lang' );
		}
	
		/**
		 * Filter the archive title.
		 *
		 * @param string $title Archive title to be displayed.
		 */
		$title = apply_filters( 'get_the_archive_title', $title );
	
		if ( ! empty( $title ) ) {
			echo $before . $title . $after;
		}
	}
endif;


if ( ! function_exists( 'genio_wt_the_archive_description' ) ) :

	/**
	 * Shim for `the_archive_description()`.
	 *
	 * Display category, tag, or term description.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 *
	 * @since 1.0
	 * @param string $before Optional. Content to prepend to the description. Default empty.
	 * @param string $after  Optional. Content to append to the description. Default empty.
	 */
	function genio_wt_the_archive_description( $before = '', $after = '' ) {
		$description = apply_filters( 'get_the_archive_description', term_description() );
	
		if ( ! empty( $description ) ) {
			/**
			 * Filter the archive description.
			 *
			 * @see term_description()
			 *
			 * @param string $description Archive description to be displayed.
			 */
			echo $before . $description . $after;
		}
	}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @since 1.0
 * @return bool
 */
function genio_wt_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'genio_wt_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'genio_wt_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so genio_wt_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so genio_wt_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in genio_wt_categorized_blog.
 *
 * @since 1.0
 */
function genio_wt_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'genio_wt_categories' );
}
add_action( 'edit_category', 'genio_wt_category_transient_flusher' );
add_action( 'save_post',     'genio_wt_category_transient_flusher' );