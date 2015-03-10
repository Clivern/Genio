<?php
/**
 * The template used for displaying page content in page.php
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
<section class="text-center hero-header bg-image sec__page-bg">
	<div class="overlay"></div>
	<?php the_title( '<h4 class="text-capitalize light">', '</h4>' ); ?>
</section>

<section id="post-<?php the_ID(); ?>" <?php post_class('container text-left main-block'); ?>>
	<?php
		// this action used to get
		// featured content out of the main post
		// and show like a video , gallery
		do_action( 'genio_featured_content', array( 'page', get_the_ID(), get_the_content()) );
	?>
	<div class="lg-padder">
		<div class="typeset">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'genio_wt_lang' ),
				'after'  => '</div>',
			) );
		?>
		</div>
	</div>
</section>