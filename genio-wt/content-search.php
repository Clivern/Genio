<?php
/**
 * The template part for displaying results in search pages.
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
		// But we don't need in search post
		// 
		//do_action( 'genio_featured_content', array( 'post', get_the_ID(), get_the_content()) );
	?>

	<?php the_title( sprintf( '<h5 class="text-capitalize xlg-padder"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>

	<?php if ( 'post' == get_post_type() ) : ?>
	<div class="post__meta sm-padder">
		<?php genio_wt_posted_on(false); ?>
	</div>
	<?php endif; ?>

	<div class="lg-padder">
		<div class="typeset">
		<?php the_excerpt(); ?>
		</div>
	</div>
</div>