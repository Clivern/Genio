<?php
/**
 * The template used for displaying hobbies section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_hobbies = $Genio_Wt_Core->getHobbies();
?>
		<section id="hobbies" class="secondary-block secondary-block-spacer bg-image sec__hobbies-bg" data-stellar-background-ratio="0.5">

			<!-- #OVERLAY -->
			<div class="overlay pattern-overlay"></div>

			<div class="container">
			
				<!-- #HOBBIES TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('hobbies_s_tit') != '') || ($Genio_Wt_Core->getOption('hobbies_s_slog') != '') ){ ?>
				<div class="text-center widget-title widget-title--inverted wow fadeIn">
					
					<?php if( ($Genio_Wt_Core->getOption('hobbies_s_tit') != '') ){ ?>
					<h5 class="text-uppercase semi-bold lh md-padder"><?php echo $Genio_Wt_Core->getOption('hobbies_s_tit'); ?></h5>
					<?php } ?>

					<?php if( ($Genio_Wt_Core->getOption('hobbies_s_slog') != '') ){ ?>
					<em class="xs-padder inline-block"><?php echo $Genio_Wt_Core->getOption('hobbies_s_slog'); ?></em>
					<?php } ?>
				</div>
				<?php } ?>

				<!-- #HOBBIES CONTENT -->
				<?php if( count($genio_hobbies) >= 1 ){ ?>
				<div class="secondary-block__padder text-center">
					<ul class="list-inline inline-block text-uppercase list-gutter-md text-center text-uppercase hobbies-list">

						<?php foreach ($genio_hobbies as $genio_hobby) { ?>
						<li class="lg-rounded-box wow fadeInUp" data-wow-delay="<?php echo esc_attr($genio_hobby['animation']); ?>s">

							<!-- HOBBY -->
							<div class="inline-block">
								<span class="h3 lh">
									<i class="fa <?php echo esc_attr($genio_hobby['icon']); ?>"></i>
								</span>
								<?php if( !empty($genio_hobby['title']) ){ ?>
									<h6 class="padder normal lh"><?php echo $genio_hobby['title']; ?></h6>
								<?php } ?>
							</div>
							
							<!-- HOOBY DESCRIPTION -->
							<?php if(!empty($genio_hobby['summary'])){ ?>
								<div class="hobby-description">
									<p><?php echo $genio_hobby['summary']; ?></p>
								</div>
							<?php } ?>

						</li>
						<?php } ?>
					</ul>
				</div>
				<?php } ?>

			</div>
		</section>