<?php
/**
 * The template for displaying posts
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package genio-wt
 */
global $Genio_Wt_Core;
?>

<section class="text-center hero-header bg-image sec__post-bg">
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
			<?php if( !('posts' == get_option( 'show_on_front' )) ){ ?>
			<li><a href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>"><?php _e('Blog', 'genio_wt_lang'); ?></a></li>
			<?php }else{ ?>
			<li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Blog', 'genio_wt_lang'); ?></a></li>
			<?php } ?>
			<li class="active"><?php the_title(); ?></li>
		</ol>
	</div>
</section>		

<section class="container text-left main-block">

	<div class="row">

		<div class="col-md-8 primary-wrapper">

			<div id="post-<?php the_ID(); ?>" <?php post_class('post striped-separated'); ?>>
						
				<?php
					// this action used to get
					// featured content out of the main post
					// and show like a video , gallery
					do_action( 'genio_featured_content', array( 'post', get_the_ID(), get_the_content()) );
				?>

				<?php the_title('<h5 class="text-capitalize xlg-padder">', '</h5>'); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="post__meta sm-padder">
					<?php genio_wt_posted_on(false); ?>
				</div>
				<?php endif; ?>

				<div class="lg-padder post-body">
					<div class="typeset">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'genio_wt_lang' ),
							'after'  => '</div>',
						));
					?>
					</div>
				</div>

				<?php $tags_list = get_the_tag_list( '', __( ' ', 'genio_wt_lang' ) ); ?>
				<?php if ( $tags_list ) : ?>
					<div class="xlg-padder">
						<span class="post-tags-wrapper regular h6"><?php printf( __( 'Tags: %1$s', 'genio_wt_lang' ), $tags_list ); ?></span>
					</div>
				<?php endif; ?>
			</div>