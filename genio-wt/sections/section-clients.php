<?php
/**
 * The template used for displaying clients section in front page
 *
 * @package genio-wt
 */
global $Genio_Wt_Core;

$genio_clients = $Genio_Wt_Core->getClients();
?>
		<section id="clients" class="secondary-block secondary-block-spacer">
			<div class="container">
			
				<!-- #CLIENTS TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('clients_s_tit') != '') || ($Genio_Wt_Core->getOption('clients_s_slog') != '') ){ ?>
				<div class="text-center widget-title wow fadeIn">
					
					<?php if( ($Genio_Wt_Core->getOption('clients_s_tit') != '') ){ ?>
					<h5 class="text-uppercase semi-bold lh md-padder"><?php echo $Genio_Wt_Core->getOption('clients_s_tit'); ?></h5>
					<?php } ?>

					<?php if( ($Genio_Wt_Core->getOption('clients_s_slog') != '') ){ ?>
					<em class="xs-padder inline-block"><?php echo $Genio_Wt_Core->getOption('clients_s_slog'); ?></em>
					<?php } ?>
				</div>
				<?php } ?>

				<!-- #CLIENTS CONTENT -->
				<?php if( count($genio_clients) >= 1 ){ ?>
				<div class="secondary-block__padder">
					<div class="row text-center clients-list">
						<?php foreach ($genio_clients as $genio_client) { ?>
						<div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($genio_client['animation']); ?>s">
							<a <?php if( !empty($genio_client['url']) ){ ?>href="<?php echo esc_url($genio_client['url']); ?>" rel="nofollow"<?php } ?> <?php if(!empty($genio_client['logo'])){ ?>style="background-image: url(<?php echo esc_url($genio_client['logo']); ?>)"<?php } ?>></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>