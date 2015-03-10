<?php
/**
 * The template used for displaying blog section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => $Genio_Wt_Core->getOption('blog_s_sh_on'),
);
$genio_recent_posts = new WP_Query( $args );
?>

		<section id="news" class="main-block">
			<div class="container text-center">

				<!-- #NEWS SECTION TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('blog_s_tit') != '') || ($Genio_Wt_Core->getOption('blog_s_slog') != '') ){ ?>
				<div class="text-center widget-title wow fadeIn">
					<?php if( ($Genio_Wt_Core->getOption('blog_s_tit') != '') ){ ?>
						<h5 class="text-uppercase semi-bold lh md-padder"><?php echo $Genio_Wt_Core->getOption('blog_s_tit'); ?></h5>
					<?php } ?>
					<?php if( ($Genio_Wt_Core->getOption('blog_s_slog') != '') ){ ?>
						<em class="xs-padder inline-block"><?php echo $Genio_Wt_Core->getOption('blog_s_slog'); ?></em>
					<?php } ?>
				</div>
				<?php } ?>

				<!-- #NEWS SECTION CONTENT -->
				<?php if($genio_recent_posts->have_posts()): ?>
				<div class="main-block__padder wow fadeIn">
			
					<!-- @POST -->
					<?php while ($genio_recent_posts->have_posts()): $genio_recent_posts->the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
						
						<!-- POST TITLE -->
						<div class="post__title">
							<?php the_title( sprintf( '<h5 class="text-capitalize"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
						</div>

						<!-- POST META -->
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="post__meta">
							<?php genio_wt_posted_on(true); ?>
						</div>
						<?php endif; ?>

						<!-- POST DESCRIPTION -->
						<div class="post__description">
							<?php the_content( 'Read More' ); ?>
						</div>

					</div>
					<?php endwhile; ?>

					<!-- @LOAD MORE POSTS BUTTON -->
					<?php if( ($Genio_Wt_Core->getOption('blog_s_lin_tex') != '') ){ ?>
					<div>
						<a href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>" class="btn view-news-btn"><?php echo $Genio_Wt_Core->getOption('blog_s_lin_tex'); ?></a>
					</div>
					<?php } ?>

				</div>
			<?php endif; ?>

			</div>
		</section>
<?php
wp_reset_postdata();