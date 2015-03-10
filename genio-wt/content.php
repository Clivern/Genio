<?php
/**
 * The template for displaying posts in blog
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package genio-wt
 */
global $Genio_Wt_Core;
?>

<div id="post-<?php the_ID(); ?>"  <?php post_class('post'); ?>>
	
	<?php
		// this action used to get
		// featured content out of the main post
		// and show like a video , gallery
		do_action( 'genio_featured_content', array( 'post', get_the_ID(), get_the_content()) );
	?>

	<?php the_title( sprintf( '<h5 class="text-capitalize xlg-padder"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="post__meta sm-padder">
		<?php genio_wt_posted_on(false); ?>
	</div>
	<?php endif; ?>

	<div class="lg-padder">
		<div class="typeset">
		<?php the_content( 'Read More' ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'genio_wt_lang' ),
				'after'  => '</div>',
			) );
		?>
		</div>
	</div>

</div>