<?php
/**
 * The template used for displaying profile section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
		<section id="profile" class="main-block">
			<div class="container text-center">
			
				<!-- #PROFILE TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('profile_s_tit') != '') || ($Genio_Wt_Core->getOption('profile_s_slog') != '') || ($Genio_Wt_Core->getOption('profile_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('profile_s_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('profile_s_tit') != '')  ){ ?>
								<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('profile_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('profile_s_slog') != '')  ){ ?>
								<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('profile_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('profile_s_desc') != '')  ){ ?>
								<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('profile_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>

				<!-- #PROFILE CONTENT -->
				<div class="row main-block__padder text-left">
					
					<!-- #PROFILE PHOTO -->
					<div class="col-lg-4 col-md-6 col-lg-push-4 text-center wow fadeInUp">
						<div class="inline-block photo-column-inner">
							<?php if( ($Genio_Wt_Core->getOption('profile_s_phot') != '') || ($Genio_Wt_Core->getOption('profile_s_cv') != '') ){ ?>
								<?php if( ($Genio_Wt_Core->getOption('profile_s_phot') != '')  ){ ?>
								<div class="xlg-rounded-box profile-image-holder center-block">
									<img src="<?php echo esc_url($Genio_Wt_Core->getOption('profile_s_phot')); ?>" class="img-responsive <?php if( 'gradient' == $Genio_Wt_Core->getOption('home_s_hs') ){ ?>sec__grad-img-home<?php } ?>" alt="#">
								</div>
								<?php } ?>
								<?php if( ($Genio_Wt_Core->getOption('profile_s_cv') != '')  ){ ?>
								<div class="md-padder">
									<a href="<?php echo esc_url($Genio_Wt_Core->getOption('profile_s_cv')); ?>" target="_blank" class="btn btn-block btn--main-color"><?php _e('Download Resume','genio_wt_lang'); ?></a>
								</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>

					<!-- #PROFILE PERSONAL INFO -->
					<div class="col-lg-4 col-md-6 col-lg-push-4 info-column wow fadeInUp">
						<div>
							<?php if( ($Genio_Wt_Core->getOption('profile_s_inf_tit') != '')  ){ ?>
								<h5 class="text-capitalize"><?php echo $Genio_Wt_Core->getOption('profile_s_inf_tit'); ?></h5>
							<?php } ?>
							<ul class="padder list-unstyled info-list">
								<?php if( ($Genio_Wt_Core->getOption('profile_s_yo_nam') != '')  ){ ?>
								<li><?php _e('Name','genio_wt_lang'); ?> : <?php echo $Genio_Wt_Core->getOption('profile_s_yo_nam'); ?></li>
								<?php } ?>

								<?php if( ($Genio_Wt_Core->getOption('profile_s_yo_age') != '')  ){ ?>
								<li><?php _e('Age','genio_wt_lang'); ?> : <?php echo $Genio_Wt_Core->getOption('profile_s_yo_age'); ?></li>
								<?php } ?>

								<?php if( ($Genio_Wt_Core->getOption('profile_s_yo_phon') != '')  ){ ?>
								<li><?php _e('Phone','genio_wt_lang'); ?> : <?php echo $Genio_Wt_Core->getOption('profile_s_yo_phon'); ?></li>
								<?php } ?>

								<?php if( ($Genio_Wt_Core->getOption('profile_s_yo_emai') != '')  ){ ?>
								<li><?php _e('Email','genio_wt_lang'); ?> : <a href="mailto:<?php echo esc_attr($Genio_Wt_Core->getOption('profile_s_yo_emai')); ?>"><?php echo $Genio_Wt_Core->getOption('profile_s_yo_emai'); ?></a></li>
								<?php } ?>

								<?php if( ($Genio_Wt_Core->getOption('profile_s_yo_addrs') != '')  ){ ?>
								<li><?php _e('Adress','genio_wt_lang'); ?> : <?php echo $Genio_Wt_Core->getOption('profile_s_yo_addrs'); ?></li>
								<?php } ?>
							</ul>
							<ul class="list-inline list-gutter-xs padder h5 bare-social-menu">
								<?php foreach ($Genio_Wt_Core->getOption('footer_icons') as $key => $social) { ?>
								<li>
									<a href="<?php echo esc_url($social['url']); ?>" class="<?php echo esc_attr($social['bg']); ?>-color">
										<i class="fa fa-<?php echo esc_attr($social['icon']); ?>"></i>
									</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>	

					<!-- #PROFILE STORY -->
					<div class="col-lg-4 col-lg-pull-8 col-xs-12 text-left story-column wow fadeInUp">
						<div>
							<?php if( ($Genio_Wt_Core->getOption('profile_s_sto_tit') != '') || ($Genio_Wt_Core->getOption('profile_s_sto_mai') != '') || ($Genio_Wt_Core->getOption('profile_s_sign') != '') ){ ?>
								<?php if( ($Genio_Wt_Core->getOption('profile_s_sto_tit') != '')  ){ ?>
									<h5 class="text-capitalize"><?php echo $Genio_Wt_Core->getOption('profile_s_sto_tit'); ?></h5>
								<?php } ?>
								<?php if( ($Genio_Wt_Core->getOption('profile_s_sto_mai') != '')  ){ ?>
									<p class="padder"><?php echo $Genio_Wt_Core->getOption('profile_s_sto_mai'); ?></p>
								<?php } ?>
								<?php if( ($Genio_Wt_Core->getOption('profile_s_sign') != '')  ){ ?>
									<div class="lg-padder">
										<img src="<?php echo esc_url($Genio_Wt_Core->getOption('profile_s_sign')); ?>" alt="#">
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>

				</div>

			</div>
		</section>