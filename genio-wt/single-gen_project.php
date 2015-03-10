<?php
/**
 * The template for displaying all portfolio items.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */

global $Genio_Wt_Core;

get_header(); 

		get_template_part('sections/section-nav');
	 	while ( have_posts() ) : the_post();
			$genio_project = $Genio_Wt_Core->getProject();
		?>
		<section id="single-work-item" class="bg-image" <?php if( !empty($genio_project['header_img']) ){ ?>style="background-image: url(<?php echo esc_url($genio_project['header_img']); ?>)"<?php } ?> data-stellar-background-ratio="0.5">

			<!-- OVERLAY -->
			<div class="overlay"></div>

			<div class="container text-center">
				
				<!-- #PROJECT TTILE -->
				<?php the_title( '<h2 class="heavy text-uppercase wow fadeInUp" data-wow-delay="0.35s">', '</h2>' ); ?>
			</div>
		</section>

		<section id="item-details" class="main-block">
			<div class="container">

				<!-- #PREVIEW / DETAILS -->
				<div class="project-preview">

					<!-- @WORK ITEMS NAVIGATION -->
					<div class="text-center">
						<ul class="list-inline list-gutter text-capitalize work-item-navigation wow fadeInUp">
							<?php if($genio_project['previous_item']){ ?>
							<li>
								<?php
									previous_post_link( '%link', '<i class="fa fa-angle-left fa-fw"></i><em>' . __('Previous','genio_wt_lang') . '</em>' );
								?>
							</li>
							<?php } ?>
							<?php if( !empty($genio_project['portfolio_url']) ){ ?>
							<li>
								<a href="<?php echo esc_url($genio_project['portfolio_url']); ?>" class="sm-rounded-box">
									<i class="fa fa-bars fa-fw"></i>
								</a>
							</li>
							<?php } ?>
							<?php if($genio_project['next_item']){ ?>
							<li>
								<?php
									next_post_link( '%link', '<em>' . __('Next','genio_wt_lang') . '</em><i class="fa fa-angle-right fa-fw"></i>' );
								?>
							</li>
							<?php } ?>
						</ul>
					</div>
					
					<?php get_template_part( 'project' ); ?>

				</div>
				
				<!-- #CLIENT TESTIMONIALS -->
				<?php if( !empty($genio_project['tes']) ){ ?>
				<div class="work-inner-section wow fadeInUp">
						
					<h5 class="bold text-uppercase text-center work-inner-title"><?php _e('Client Testimonial','genio_wt_lang'); ?></h5>

					<blockquote>
						<p><?php echo $genio_project['tes']; ?></p><br>
						<?php if( !empty($genio_project['tes_by']) ){ ?>
						<cite>- <?php echo $genio_project['tes_by']; ?></cite>
						<?php } ?>
					</blockquote>

				</div>
				<?php } ?>
				
				<!-- #RELATED PROJECTS -->
				<?php if( count($genio_project['related_projects']) >= 1 ){ ?>
				<div class="related-work-items">
					
					<h5 class="bold text-uppercase text-center work-inner-title wow fadeInUp"><?php _e('Related Projects', 'genio_wt_lang'); ?></h5>

					<div class="row text-align-center">

						<!-- PORTFOLIO ITEM -->
						<?php foreach ($genio_project['related_projects'] as $genio_related_project ) { ?>
						<div class="col-md-3">
							<div class="portfolio-item wow fadeInUp" style="background-image: url(<?php echo esc_url($genio_related_project['thumbnail']); ?>);" data-groups='["<?php echo esc_attr(implode('", "', $genio_related_project['terms_slugs'])); ?>"]'>
								<div class="item-caption">
									<div class="table">
										<div class="table-cell">
											<a href="<?php echo esc_url($genio_related_project['full_img']); ?>" class="icon-btn plus-icon zoom-btn plus-icon-big btn--main-inverted"></a>
											<a href="<?php echo esc_url($genio_related_project['link']); ?>" class="btn-icon portfolio-icon-btn btn--main-inverted">
												<i class="fa fa-link"></i>
											</a>
											<h6 class="text-uppercase normal md-padder"><?php echo $genio_related_project['title']; ?></h6>
											<em class="serif"><?php echo implode(', ', $genio_related_project['terms']); ?></em>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

					</div>

				</div>
				<?php } ?>

			</div>

		</section>

		<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>