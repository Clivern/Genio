<?php
/**
 * The template used for displaying resume section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_projects = $Genio_Wt_Core->getPortfolio();
?>
		<section id="portfolio" class="main-block">

			<?php if( ($Genio_Wt_Core->getOption('portfolio_s_tit') != '') || ($Genio_Wt_Core->getOption('portfolio_s_slog') != '') || ($Genio_Wt_Core->getOption('portfolio_s_desc') != '') ){ ?>
			<div class="container text-center">
				
				<!-- #PORTFOLIO TITLE -->
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('portfolio_s_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('portfolio_s_tit') != '')  ){ ?>
							<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('portfolio_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('portfolio_s_slog') != '')  ){ ?>
							<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('portfolio_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('portfolio_s_desc') != '')  ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('portfolio_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>
			<?php } ?>

			<!-- #PORTFOLIO CONTENT -->
			<?php if( (count($genio_projects['terms']) >= 1) && (count($genio_projects['posts']) >= 1) ){ ?>
			<div class="main-block__padder text-center">
				
				<!-- #PORTFOLIO FILTER -->
				<ul class="list-inline inline-block list-gutter-sm text-capitalize bold shuffle-filter wow fadeInUp">
					<li class="active"><a href="#" data-group="all"><?php _e('All','genio_wt_lang'); ?></a></li>

					<?php foreach ($genio_projects['terms'] as $genio_term_slug => $genio_term_name) { ?>
					<li>&#8226;</li>
					<li><a href="#" data-group="<?php echo esc_attr($genio_term_slug); ?>"><?php echo $genio_term_name; ?></a></li>
					<?php } ?>
				</ul>

				<!-- #PORTFOIO ITEMS -->
				<div class="main-block__sub-padder">
					<div class="portfolio-items clearfix wow fadeInUp">
						<!-- PORTFOLIO ITEM -->
						<?php foreach ($genio_projects['posts'] as $genio_project_key => $genio_project ) {  
							if($genio_project['class'] != 'hidden'){
							?>
							<div class="portfolio-item" style="background-image: url(<?php echo esc_url($genio_project['thumbnail']); ?>);" data-groups='["<?php echo esc_attr(implode('", "', $genio_project['terms_slugs'])); ?>"]'>
							<?php }else{ ?>
							<div class="hidden" data-bg-src='<?php echo esc_url($genio_project['thumbnail']); ?>' data-groups='["<?php echo esc_attr(implode('", "', $genio_project['terms_slugs'])); ?>"]'>
							<?php } ?>
							<div class="item-caption">
								<div class="table">
									<div class="table-cell">
										<a href="<?php echo esc_url($genio_project['full_img']); ?>" class="zoom-btn plus-icon plus-icon-big btn--main-inverted"></a>
										<a href="<?php echo esc_url($genio_project['link']); ?>" class="btn-icon portfolio-icon-btn btn--main-inverted">
											<i class="fa fa-link"></i>
										</a>
										<h6 class="text-uppercase normal md-padder"><?php echo $genio_project['title']; ?></h6>
										<em class="serif"><?php echo implode(', ', $genio_project['terms']); ?></em>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>

				<!-- #PORTFOLIO LOAD MORE -->
				<?php if($genio_projects['lazyload']){ ?>
				<div class="main-block__sub-padder wow fadeInUp" id="load-more-btn-holder">
					<a href="#" class="btn btn--main-color" id="load-more-btn"><?php echo $Genio_Wt_Core->getOption('portfolio_s_lin_tex'); ?></a>
				</div>
				<?php } ?>
			</div>
			<?php } ?>

		</section>