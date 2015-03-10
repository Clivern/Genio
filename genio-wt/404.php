<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */
global $Genio_Wt_Core;

get_header(); 
get_template_part('sections/section-nav');
?>

<section class="text-center hero-header bg-image sec__404-bg">
	<div class="overlay"></div>
	<h2 class="text-capitalize light"><?php _e('Oops! This page is lost!', 'genio_wt_lang'); ?></h2>
</section>

<section class="container text-center main-block">
	<div class="container">
		<h6 class="h6 regular"><?php _e('It looks like nothing was found at this location. Maybe try a search?','genio_wt_lang'); ?></h6>
		<div class="md-padder col-md-6 col-md-push-3">
			<?php get_search_form(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>