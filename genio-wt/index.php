<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package genio-wt
 */
global $Genio_Wt_Core;

get_header(); 
get_template_part('sections/section-nav');
?>
		
<section class="text-center hero-header bg-image sec__blog-bg">
	<div class="overlay"></div>
	<?php if( ($Genio_Wt_Core->getOption('blog_s_slog') != '') ){ ?>
	<h4 class="text-capitalize light"><?php echo $Genio_Wt_Core->getOption('blog_s_slog'); ?></h4>
	<?php } ?>
</section>

<section class="text-center breadcrumb-container">
	<div class="container">
		<ol class="breadcrumb inline-block text-capitalize">
			<?php if( !('posts' == get_option( 'show_on_front' )) ){ ?>
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'genio_wt_lang'); ?></a></li>
			<?php } ?>
			<li class="active"><?php _e('Blog', 'genio_wt_lang'); ?></li>
		</ol>
	</div>
</section>

<section class="container text-left main-block">
	<div class="row">
		<div id="main" class="col-md-8 primary-wrapper">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>
			<?php endwhile; ?>

			<?php genio_wt_the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>

<?php get_footer(); ?>