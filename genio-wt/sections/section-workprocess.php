<?php
/**
 * The template used for displaying work process section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_processes = $Genio_Wt_Core->getProcesses();
?>
		<section id="process" class="secondary-block secondary-block-spacer bg-image sec__process-bg" data-stellar-background-ratio="0.5">

			<!-- #OVERLAY -->
			<div class="overlay pattern-overlay"></div>

			<div class="container">
			
				<!-- #PROCESS TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('process_s_tit') != '') || ($Genio_Wt_Core->getOption('process_s_slog') != '') ){ ?>
				<div class="text-center widget-title widget-title--inverted wow fadeIn">
					
					<?php if( ($Genio_Wt_Core->getOption('process_s_tit') != '') ){ ?>
					<h5 class="text-uppercase semi-bold lh md-padder"><?php echo $Genio_Wt_Core->getOption('process_s_tit'); ?></h5>
					<?php } ?>

					<?php if( ($Genio_Wt_Core->getOption('process_s_slog') != '') ){ ?>
					<em class="xs-padder inline-block"><?php echo $Genio_Wt_Core->getOption('process_s_slog'); ?></em>
					<?php } ?>
				</div>
				<?php } ?>

				<!-- #PROCESS CONTENT -->
				<?php if( count($genio_processes) >= 1 ){ ?>
				<div class="secondary-block__padder text-center text-uppercase">

					<!-- @HORIZONTAL RAIL -->
					<div class="horizontal-rail hidden-xs"></div>

					<!-- @ITEMS -->
					<div class="row process-list">
						<?php foreach ($genio_processes as $genio_process ) { ?>
						<div class="col-xs-4 col-sm-2 wow flipInX" data-wow-delay="<?php echo esc_attr($genio_process['animation']); ?>s">
							<div class="inline-block">
								<div class="md-rounded-box h3">
									<i class="fa <?php echo esc_attr($genio_process['icon']); ?>"></i>
								</div>
								<?php if(!empty($genio_process['order'])){ ?>
									<span><?php echo $genio_process['order']; ?></span>
								<?php } ?>
								<?php if(!empty($genio_process['title'])){ ?>
									<h6 class="normal lh"><?php echo $genio_process['title']; ?></h6>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>