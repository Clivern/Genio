<?php
/**
 * The template for displaying search results pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */
global $Genio_Wt_Core;

get_header(); 
get_template_part('sections/section-nav');
?>
		
<section class="text-center hero-header bg-image sec__search-bg">
	<div class="overlay"></div>
	<?php if( ($Genio_Wt_Core->getOption('blog_s_slog') != '') ){ ?>
		<h4 class="text-capitalize light"><?php echo $Genio_Wt_Core->getOption('blog_s_slog'); ?></h4>
	<?php } ?>
</section>
			
<section class="container text-left main-block">
	
	<div class="row">
				
		<div class="col-md-8 primary-wrapper">
		
		<?php if ( have_posts() ) : ?>

			<div>
				<h6 class="regular">
					<?php printf( __( 'Search Results for: %1$s', 'genio_wt_lang' ), '<em>' . get_search_query() . '</em>' ); ?>
				</h6>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</div>
		
		<?php get_sidebar(); ?>
	</div>

</section>

<?php get_footer(); ?>