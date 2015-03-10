<?php
/**
 * The template for displaying all single posts.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */

global $Genio_Wt_Core;

get_header(); 
get_template_part('sections/section-nav'); 
?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>
		</div>

		<?php get_sidebar(); ?>
		</div>
	</section>
<?php get_footer(); ?>