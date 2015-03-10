<?php
/**
 * The template used for displaying home section in front page
 * Home section template has three styles parallax, bottom image, right image and gradient
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
<?php if( 'parallax' == $Genio_Wt_Core->getOption('home_s_hs') ){ ?>

		<section id="home" class="text-center bg-image no-overflow sec__home-bg" data-stellar-background-ratio="0.5">

			<!-- #OVERLAY -->
			<div class="overlay pattern-overlay"></div>

			<div class="container text-center">

				<!-- FULLSCREEN HOLDER -->
				<div id="parallax-home" class="fullscreen inline-block">
					
					<!-- TABLE LAYOUT -->
					<div class="table sec__parallax-home">
						
						<!-- TABLE CELL -->
						<div class="table-cell v-middle wow fadeIn">

							<!-- #HOME NAME -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_n') != '') ){ ?>
								<h1 class="huge text-uppercase title-box"><?php echo $Genio_Wt_Core->getOption('home_s_n'); ?></h1>
							<?php } ?>

							<!-- #HOME PROFESSION NAME -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_jt') != '') ){ ?>
								<div class="table xs-padder profession-box">
									<div class="table-cell">
										<h5 class="text-capitalize semi-bold lh"><?php echo $Genio_Wt_Core->getOption('home_s_jt'); ?></h5>
									</div>
								</div>
							<?php } ?>

						</div>

					</div>

				</div>

			</div>
		</section>

<?php }elseif( 'bottom_image' == $Genio_Wt_Core->getOption('home_s_hs') ){ ?>
		<section id="home" class="text-center bg-image no-overflow sec__home-bg" data-stellar-background-ratio="0.5">
			<div class="container">
			
				<!-- #INTRO BLOCK -->
				<div class="main-block sec__bottom-home">

					<!-- #HOME NAME -->
					<?php if( ($Genio_Wt_Core->getOption('home_s_n') != '') ){ ?>
						<h1 class="text-uppercase huge wow fadeInDown"><?php echo $Genio_Wt_Core->getOption('home_s_n'); ?></h1>
					<?php } ?>

					<!-- #HOME SPECIALIZATIONS LIST -->
					<?php if( ($Genio_Wt_Core->getOption('home_s_jt') != '') ){ ?>
						<ul class="specializations-list list-inline text-capitalize list-gutter-sm h5 regular padder lh wow fadeInUp">
						<?php if( strpos($Genio_Wt_Core->getOption('home_s_jt'), '--') > 0 ){
							$job_list = explode('--', $Genio_Wt_Core->getOption('home_s_jt'));
							$loop = 1;
							foreach ($job_list as $job) {
								if($loop != 1){
									?>
									<li>&#8226;</li>
									<?php
								}
								?>
								<li><?php echo $job;?></li>
								<?php
								$loop += 1;
							}
						}else{
							?>
							<li><?php echo $Genio_Wt_Core->getOption('home_s_jt');?></li>
							<?php
						}
						?> 
						</ul>
					<?php } ?>

					<!-- #HOME SOCIAL LIST -->
					<?php if( count($Genio_Wt_Core->getOption('home_icons')) >= 1 ){ ?>
						<ul class="list-inline hollow-social-menu h5 list-gutter-xs lg-padder">
							<?php foreach ($Genio_Wt_Core->getOption('home_icons') as $key => $social) { ?>
							<li class="wow rollIn" data-wow-delay="<?php echo esc_attr($social['delay']); ?>s">
								<a href="<?php echo esc_url($social['url']); ?>" class="sm-rounded-box <?php echo esc_attr($social['bg']); ?>-bg">
									<i class="fa fa-<?php echo esc_attr($social['icon']); ?>"></i>
								</a>
							</li>
							<?php } ?>
						</ul>
					<?php } ?>

				</div>
				
				<!-- #HOME PHOTO BLOCK -->
				<?php if( ($Genio_Wt_Core->getOption('home_s_img') != '') ){ ?>
					<div class="inline-block main-block__sub-padder v-middle wow fadeInUpBig">
						<img src="<?php echo esc_url($Genio_Wt_Core->getOption('home_s_img')); ?>" alt="#" class="img-responsive">
					</div>
				<?php } ?>

			</div>
		</section>
<?php }elseif( 'right_image' == $Genio_Wt_Core->getOption('home_s_hs') ){ ?>
		<section id="home" class="text-center bg-image no-overflow sec__home-bg" data-stellar-background-ratio="0.5">
			<div class="container text-center">

				<!-- HOLDER -->
				<div id="splitted-home" class="inline-block text-left">
					
					<!-- TABLE LAYOUT -->
					<div class="table main-block__padder sec__right-home">
						
						<!-- LEFT CONTENT -->
						<div class="table-cell v-middle text-holder">
							
							<h4 class="bold wow fadeInUp" data-wow-delay="0.35s"><?php _e('Welcome,','genio_wt_lang'); ?></h4>

							<!-- #HOME NAME -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_n') != '') ){ ?>
								<h2 class="bold text-uppercase wow fadeInUp" data-wow-delay="0.35s"><?php echo $Genio_Wt_Core->getOption('home_s_n'); ?></h2>
							<?php } ?>

							<!-- #HOME SPECIALIZATIONS LIST -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_jt') != '') ){ ?>
								<ul class="specializations-list list-inline text-capitalize list-gutter-sm h6 regular padder lh wow fadeInUp" data-wow-delay="0.35s">
								<?php if( strpos($Genio_Wt_Core->getOption('home_s_jt'), '--') > 0 ){ 
									$job_list = explode('--', $Genio_Wt_Core->getOption('home_s_jt'));
									$loop = 1;
									foreach ($job_list as $job) {
										if($loop != 1){
											?>
											<li>&#8226;</li>
											<?php
										}
										?>
										<li><?php echo $job;?></li>
										<?php
										$loop += 1;
									}
								}else{
									?>
									<li><?php echo $Genio_Wt_Core->getOption('home_s_jt');?></li>
									<?php
								}
								?> 
								</ul>
							<?php } ?>

							<!-- #HOME BUTTON -->
							<?php if( $Genio_Wt_Core->getOption('portfolio_s_sim') == 'yes' ){ ?>
								<div class="xlg-padder wow fadeInUp" data-wow-delay="0.35s">
									<a href="#portfolio" id="splitted-home-btn" class="btn hollow"><?php _e('See my work','genio_wt_lang'); ?></a>
								</div>
							<?php } ?>

						</div>

						<!-- #HOME PHOTO BLOCK -->
						<?php if( ($Genio_Wt_Core->getOption('home_s_img') != '') ){ ?>
							<div class="table-cell v-bottom">
								<img src="<?php echo esc_url($Genio_Wt_Core->getOption('home_s_img')); ?>" class="img-responsive wow fadeIn sec__right-img-home" data-wow-delay="0.35s" alt="#">
							</div>
						<?php } ?>
					</div>

				</div>

			</div>
		</section>
<?php }elseif( 'gradient' == $Genio_Wt_Core->getOption('home_s_hs') ){ ?>
		<section id="home" class="text-center no-overflow gradient">

			<div class="container text-center">

				<!-- FULLSCREEN HOLDER -->
				<div class="fullscreen inline-block">
					
					<!-- TABLE LAYOUT -->
					<div class="table sec__gradient-home">
						
						<!-- TABLE CELL -->
						<div class="table-cell v-middle">

							<!-- #HOME PERSONAL PHOTO -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_img') != '') ){ ?>
								<div class="lg-rounded-box home__image-box">
									<img src="<?php echo esc_url($Genio_Wt_Core->getOption('home_s_img')); ?>" class="img-responsive" alt="#">
								</div>
							<?php } ?>

							<!-- #HOME NAME -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_n') != '') ){ ?>
							<h1 class="heavy text-uppercase home__name"><?php echo $Genio_Wt_Core->getOption('home_s_n'); ?></h1>
							<?php } ?>

							<!-- #HOME PROFESSION NAME -->
							<?php if( ($Genio_Wt_Core->getOption('home_s_jt') != '') ){ ?>
							<span class="text-uppercase small home__profession"><?php echo $Genio_Wt_Core->getOption('home_s_jt'); ?></span>
							<?php } ?>

						</div>

					</div>

					<!-- #SCROLL ANIMATION COMPONENT -->
					<div class="rings">
						<span><?php _e('Scroll','genio_wt_lang'); ?></span>
						<div class="ring ring-1"></div>
						<div class="ring ring-2"></div>
						<div class="ring ring-3"></div>
					</div>

				</div>

			</div>
		</section>
<?php } ?>