<?php
/**
 * The template used for displaying services section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_services = $Genio_Wt_Core->getServices();
?>
		<section id="services" class="main-block">
			<div class="container text-center">
				
				<!-- #SERVICES TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('services_s_tit') != '') || ($Genio_Wt_Core->getOption('services_s_slog') != '') || ($Genio_Wt_Core->getOption('services_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('services_s_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('services_s_tit') != '')  ){ ?>
							<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('services_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('services_s_slog') != '')  ){ ?>
							<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('services_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('services_s_desc') != '')  ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('services_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>

				<!-- #SERVICES CONTENT -->
				<?php if( count($genio_services) >= 1 ){ ?>
				<div class="main-block__padder text-left">
					<div class="row services-list">
						<?php foreach ($genio_services as $genio_service) { 
							if($genio_service['location'] == 'left'){
						?>
						<div class="col-lg-5 col-md-6 col-lg-push-1 text-right clearfix wow fadeInLeft">
							<div class="pull-right service-icon h4 rounded-box text-center">
								<i class="fa <?php echo esc_attr($genio_service['icon']); ?>"></i>
							</div>
							<div class="no-overflow">
								<?php if( !empty($genio_service['title']) ){ ?>
								<h6 class="text-capitalize"><?php echo $genio_service['title']; ?></h6>
								<?php } ?>
								<?php if( !empty($genio_service['summary']) ){ ?>
								<p class="xs-padder">
									<?php echo $genio_service['summary']; ?>
								</p>
								<?php } ?>
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-lg-5 col-md-6 col-lg-push-1 clearfix wow fadeInRight">
							<div class="pull-left service-icon h4 rounded-box text-center">
								<i class="fa <?php echo esc_attr($genio_service['icon']); ?>"></i>
							</div>
							<div class="no-overflow">
								<?php if( !empty($genio_service['title']) ){ ?>
								<h6 class="text-capitalize"><?php echo $genio_service['title']; ?></h6>
								<?php } ?>
								<?php if( !empty($genio_service['summary']) ){ ?>
								<p class="xs-padder">
									<?php echo $genio_service['summary']; ?>
								</p>
								<?php } ?>
							</div>
						</div>
						<?php } } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>