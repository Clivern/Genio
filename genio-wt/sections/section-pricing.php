<?php
/**
 * The template used for displaying pricing section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_pricing_plans = $Genio_Wt_Core->getPricingPlans();
?>
		<section id="pricing" class="main-block">
			<div class="container text-center">
				
				<!-- #PRICING TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('pricing_s_tit') != '') || ($Genio_Wt_Core->getOption('pricing_s_slog') != '') || ($Genio_Wt_Core->getOption('pricing_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('pricing_s_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('pricing_s_tit') != '') ){ ?>
							<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('pricing_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('pricing_s_slog') != '') ){ ?>
							<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('pricing_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('pricing_s_desc') != '') ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('pricing_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>

				<!-- #PRICING CONTENT -->
				<?php if( count($genio_pricing_plans) >= 1 ){ ?>
				<div class="main-block__padder pricing-tables-list text-capitalize">

					<?php if(array_key_exists('left', $genio_pricing_plans)){ ?>
					<div class="pricing-table wow fadeInLeft">

						<!-- TITLE -->
						<?php if( !empty($genio_pricing_plans['left']['title']) ){ ?>
							<div class="package-title-box">
								<h3 class="light lh"><?php echo $genio_pricing_plans['left']['title']; ?></h3>
							</div>
						<?php } ?>

						<!-- PRICE -->
						<?php 
						if( !empty($genio_pricing_plans['left']['price']) ){ 
							$price_parts = explode('.', $genio_pricing_plans['left']['price']);
							$price_parts[1] = (isset($price_parts[1])) ? $price_parts[1] : '';
						?>
							<div class="price-box">
								<span class="huge inline-block price" data-currency="<?php echo esc_attr($genio_pricing_plans['left']['currency']); ?>" data-cents="<?php echo esc_attr($price_parts[1]); ?>"><?php echo $price_parts[0]; ?></span>
								<?php if(!empty($genio_pricing_plans['left']['price_per'])){ ?>
									<span><?php _e('Per','genio_wt_lang'); ?> <?php echo $genio_pricing_plans['left']['price_per']; ?></span>
								<?php } ?>
							</div>
						<?php } ?>

						<!-- FEATURES LIST -->
						<?php if( (is_array($genio_pricing_plans['left']['plan_features'])) && (count($genio_pricing_plans['left']['plan_features']) >= 1) ){ ?>
							<div class="text-left">
								<ul class="list-unstyled checked-list features-list colored-bullets">
									<?php foreach ($genio_pricing_plans['left']['plan_features'] as $genio_plan_feature) { ?>
										<li><?php echo $genio_plan_feature; ?></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>

						<!-- FOOTER -->
						<?php if( !(empty($genio_pricing_plans['left']['button_text'])) && !(empty($genio_pricing_plans['left']['button_link'])) ){  ?>
							<div class="well no-border">
								<a href="<?php echo esc_url($genio_pricing_plans['left']['button_link']); ?>" class="btn btn--main-color"><?php echo $genio_pricing_plans['left']['button_text']; ?></a>
							</div>
						<?php } ?>
					</div><?php }
					if(array_key_exists('center', $genio_pricing_plans)){ ?><div class="pricing-table best-pricing-table wow fadeInUp">

						<!-- TITLE -->
						<?php if( !empty($genio_pricing_plans['center']['title']) ){ ?>
							<div class="package-title-box">
								<h3 class="light lh"><?php echo $genio_pricing_plans['center']['title']; ?></h3>
							</div>
						<?php } ?>

						<!-- PRICE -->
						<?php 
						if( !empty($genio_pricing_plans['center']['price']) ){ 
							$price_parts = explode('.', $genio_pricing_plans['center']['price']);
							$price_parts[1] = (isset($price_parts[1])) ? $price_parts[1] : '';
						?>
							<div class="price-box">
								<span class="huge inline-block price" data-currency="<?php echo esc_attr($genio_pricing_plans['center']['currency']); ?>" data-cents="<?php echo esc_attr($price_parts[1]); ?>"><?php echo $price_parts[0]; ?></span>
								<?php if(!empty($genio_pricing_plans['center']['price_per'])){ ?>
									<span><?php _e('Per','genio_wt_lang'); ?> <?php echo $genio_pricing_plans['center']['price_per']; ?></span>
								<?php } ?>
							</div>
						<?php } ?>

						<!-- FEATURES LIST -->
						<?php if( (is_array($genio_pricing_plans['center']['plan_features'])) && (count($genio_pricing_plans['center']['plan_features']) >= 1) ){ ?>
							<div class="text-left">
								<ul class="list-unstyled checked-list features-list colored-bullets">
									<?php foreach ($genio_pricing_plans['center']['plan_features'] as $genio_plan_feature) { ?>
										<li><?php echo $genio_plan_feature; ?></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>

						<!-- FOOTER -->
						<?php if( !(empty($genio_pricing_plans['center']['button_text'])) && !(empty($genio_pricing_plans['center']['button_link'])) ){  ?>
							<div class="well no-border">
								<a href="<?php echo esc_url($genio_pricing_plans['center']['button_link']); ?>" class="btn btn--main-color"><?php echo $genio_pricing_plans['center']['button_text']; ?></a>
							</div>
						<?php } ?>
					</div><?php }
					if(array_key_exists('right', $genio_pricing_plans)){ ?><div class="pricing-table wow fadeInRight">

						<!-- TITLE -->
						<?php if( !empty($genio_pricing_plans['right']['title']) ){ ?>
							<div class="package-title-box">
								<h3 class="light lh"><?php echo $genio_pricing_plans['right']['title']; ?></h3>
							</div>
						<?php } ?>

						<!-- PRICE -->
						<?php 
						if( !empty($genio_pricing_plans['right']['price']) ){ 
							$price_parts = explode('.', $genio_pricing_plans['right']['price']);
							$price_parts[1] = (isset($price_parts[1])) ? $price_parts[1] : '';
						?>
							<div class="price-box">
								<span class="huge inline-block price" data-currency="<?php echo esc_attr($genio_pricing_plans['right']['currency']); ?>" data-cents="<?php echo esc_attr($price_parts[1]); ?>"><?php echo $price_parts[0]; ?></span>
								<?php if(!empty($genio_pricing_plans['right']['price_per'])){ ?>
									<span><?php _e('Per','genio_wt_lang'); ?> <?php echo $genio_pricing_plans['right']['price_per']; ?></span>
								<?php } ?>
							</div>
						<?php } ?>

						<!-- FEATURES LIST -->
						<?php if( (is_array($genio_pricing_plans['right']['plan_features'])) && (count($genio_pricing_plans['right']['plan_features']) >= 1) ){ ?>
							<div class="text-left">
								<ul class="list-unstyled checked-list features-list colored-bullets">
									<?php foreach ($genio_pricing_plans['right']['plan_features'] as $genio_plan_feature) { ?>
										<li><?php echo $genio_plan_feature; ?></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>

						<!-- FOOTER -->
						<?php if( !(empty($genio_pricing_plans['right']['button_text'])) && !(empty($genio_pricing_plans['right']['button_link'])) ){  ?>
							<div class="well no-border">
								<a href="<?php echo esc_url($genio_pricing_plans['right']['button_link']); ?>" class="btn btn--main-color"><?php echo $genio_pricing_plans['right']['button_text']; ?></a>
							</div>
						<?php } ?>
					</div>
					<?php } ?>
				</div>
				<?php } ?>

			</div>
		</section>
