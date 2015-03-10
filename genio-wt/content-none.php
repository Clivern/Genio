<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
<div class="no-results not-found">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<h6 class="regular"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'genio_wt_lang' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h6>
	<?php elseif ( is_search() ) : ?>
		<h6 class="regular"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'genio_wt_lang' ); ?></h6>
		<?php get_search_form(); ?>
	<?php else : ?>
		<h6 class="regular"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'genio_wt_lang' ); ?></h6>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>
