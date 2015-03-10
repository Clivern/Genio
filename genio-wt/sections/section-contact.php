<?php
/**
 * The template used for displaying contact section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
		<section id="contact" class="main-block">
			<div class="container text-center">
				
				<!-- #CONTACT TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('contact_s_tit') != '') || ($Genio_Wt_Core->getOption('contact_s_slog') != '') || ($Genio_Wt_Core->getOption('contact_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('contact_s_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('contact_s_tit') != '')  ){ ?>
								<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('contact_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('contact_s_slog') != '')  ){ ?>
								<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('contact_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('contact_s_desc') != '')  ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('contact_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>
		
				<!-- #CONTACT CONTENT -->
				<?php if( ($Genio_Wt_Core->getOption('contact_s_scf') == 'yes') || ($Genio_Wt_Core->getOption('contact_s_shf') == 'yes') ){ ?>
				<div class="main-block__padder text-left wow fadeIn">
					
					<!-- #CONTACT TABS -->
					<div class="text-center contact-tabs-holder">
						<ul class="nav nav-tabs text-uppercase small bold inline-block v-middle tabs-list contact-tabs-list" role="tablist">
							<?php if($Genio_Wt_Core->getOption('contact_s_shf') == 'yes'){ ?>
								<li role="presentation" class="active"><a class="square" href="#contact-panel-1" role="tab" data-toggle="tab"><?php _e('Hire Me', 'genio_wt_lang'); ?></a></li>
							<?php } ?>
							<?php if($Genio_Wt_Core->getOption('contact_s_scf') == 'yes'){ ?>
								<li role="presentation"><a class="square" href="#contact-panel-2" role="tab" data-toggle="tab"><?php _e('Message', 'genio_wt_lang'); ?></a></li>
							<?php } ?>
						</ul>
					</div>

					<!-- #CONTACT PANELS -->
					<div class="main-block__sub-padder tab-content text-left">

						<!-- HIRE FORM -->
						<?php if($Genio_Wt_Core->getOption('contact_s_shf') == 'yes'){ ?>
						<div id="contact-panel-1" class="tab-pane active">

							<!-- RESULTS MESSAGES -->
							<div class="alert hidden sec__contact" role="alert">
							   <button type="button" class="close pull-right" data-hide="alert"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only"><?php _e('Close', 'genio_wt_lang'); ?></span></button>
							   <p></p>
							</div>

							<!-- #HIRE FORM -->
							<form action="" id="hire-form" role="form" class="contact-form" method="post">
								<div class="row form-list">

									<!-- Security Elements -->
									<input type="text" class="is_legit" name="is_legit">
									<input type="text" class="is_legit" name="action" value="genio_wt_hire_action">
									<!-- Security Elements -->

									<!-- FORM NAME -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your Name','genio_wt_lang'); ?> *</label>
										<input type="text" name="hireme_name" class="form-control" required>
									</div>

									<!-- FORM EMAIL -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your Email', 'genio_wt_lang'); ?> *</label>
										<input type="email" name="hireme_email" class="form-control" required>
									</div>

									<!-- TIMEFRAME OPTION -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Timeframe', 'genio_wt_lang'); ?> *</label>
										<select name="hireme_timeframe" class="form-control">
											<option value=""><?php _e('Select Option', 'genio_wt_lang'); ?></option>
											<option value="1"><?php _e('As soon as possible (rush job)', 'genio_wt_lang'); ?></option>
											<option value="2"><?php _e('Within 1 week (rush job)', 'genio_wt_lang'); ?></option>
											<option value="3"><?php _e('Within 2 weeks', 'genio_wt_lang'); ?></option>
											<option value="4"><?php _e('Within a month', 'genio_wt_lang'); ?></option>
											<option value="5"><?php _e('Sometime in the next few months', 'genio_wt_lang'); ?></option>
											<option value="6"><?php _e('I am not really sure', 'genio_wt_lang'); ?></option>
										 </select>
									</div>

									<!-- EXPERIENCE OPTION -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your Web Experience Level', 'genio_wt_lang'); ?> *</label>
										<select name="hireme_experience" class="form-control">
											<option value=""><?php _e('select option', 'genio_wt_lang'); ?></option>
											<option value="1"><?php _e('Not much, I will need your help', 'genio_wt_lang'); ?></option>
											<option value="2"><?php _e('Average - I surf the web', 'genio_wt_lang'); ?></option>
											<option value="3"><?php _e('I can design websites', 'genio_wt_lang'); ?></option>
											<option value="4"><?php _e('I can hand code HTML', 'genio_wt_lang'); ?></option>
											<option value="5"><?php _e('I am not really sure', 'genio_wt_lang'); ?></option>
										</select>
									</div>

									<!-- DECISION OPTION -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Certainty About Makig Process', 'genio_wt_lang'); ?> *</label>
										<select name="hireme_process" class="form-control">
											<option value=""><?php _e('select option', 'genio_wt_lang'); ?></option>
											<option value="1"><?php _e('I am just starting to explore options', 'genio_wt_lang'); ?></option>
											<option value="2"><?php _e('I am sending out requests to a few vendors', 'genio_wt_lang'); ?></option>
											<option value="3"><?php _e('I want to use you, I just need some more details', 'genio_wt_lang'); ?></option>
											<option value="4"><?php _e('I am ready to get started, where do I send payment?', 'genio_wt_lang'); ?></option>
										</select>
									</div>

									<!-- PACKAGE OPTION -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your Prefered Package', 'genio_wt_lang'); ?> *</label>
										<select name="hireme_package" class="form-control">
											<option value=""><?php _e('Select Option', 'genio_wt_lang'); ?></option>
											<option value="1"><?php _e('Designer', 'genio_wt_lang'); ?></option>
											<option value="2"><?php _e('Developer', 'genio_wt_lang'); ?></option>
											<option value="3"><?php _e('Speaker', 'genio_wt_lang'); ?></option>
										</select>
									</div>

									<!-- REQUIREMENTS -->
									<div class="col-xs-12">
										<label class="bold text-capitalize"><?php _e('Describe Your Project And Requirements', 'genio_wt_lang'); ?> *</label>
										<textarea name="hireme_requirements" class="form-control" rows="15" required></textarea>
									</div>

									<!-- CAPTCHA & SUBMIT -->
									<div class="col-xs-12">
										
										<div class="inline-block captcha-holder">
											<input type="text" name="#" class="captcha-number" value="1" readonly> +
											<input type="text" name="#" class="captcha-number" value="1" readonly> =
											<input class="captcha form-control" type="text" name="captcha" maxlength="2" required>
										</div><!--
										--><input type="submit" class="btn btn--main-inverted" value="<?php _e('Submit Quote', 'genio_wt_lang'); ?>">
									</div>
								</div>
							</form>

						</div>
						<?php } ?>

						<!-- CONTACT FORM -->
						<?php if($Genio_Wt_Core->getOption('contact_s_scf') == 'yes'){ ?>
						<div id="contact-panel-2" class="tab-pane">

							<!-- RESULTS MESSAGES -->
							<div class="alert hidden sec__contact" role="alert">
							   <button type="button" class="close pull-right" data-hide="alert"><span aria-hidden="true"><i class="fa fa-times"></i></span><span class="sr-only"><?php _e('Close','genio_wt_lang'); ?></span></button>
							   <p></p>
							</div>

							<!-- #CONTACT FORM -->
							<form action="" id="message-form" role="form" class="contact-form" method="post">
								<div class="row form-list">

									<!-- Security Elements -->
									<input type="text" class="is_legit" name="is_legit">
									<input type="text" class="is_legit" name="action" value="genio_wt_contact_action">
									<!-- Security Elements -->

									<!-- NAME -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your name', 'genio_wt_lang'); ?> *</label>
										<input type="text" name="contact_name" class="form-control" required>
									</div>

									<!-- EMAIL -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Your Email', 'genio_wt_lang'); ?> *</label>
										<input type="email" name="contact_email" class="form-control" required>
									</div>

									<!-- SUBJECT -->
									<div class="col-xs-12 col-md-6 col-lg-4">
										<label class="bold text-capitalize"><?php _e('Message Subject', 'genio_wt_lang'); ?></label>
										<input type="text" name="contact_subject" class="form-control">
									</div>

									<div class="col-xs-12">
										<label class="bold text-capitalize"><?php _e('Your Message', 'genio_wt_lang'); ?> *</label>
										<textarea name="contact_message" class="form-control" rows="15" required></textarea>
									</div>

									<!-- CAPTCHA & SUBMIT -->
									<div class="col-xs-12">
										
										<div class="inline-block captcha-holder">
											<input type="text" name="#" class="captcha-number" value="1" readonly> +
											<input type="text" name="#" class="captcha-number" value="1" readonly> =
											<input id="captcha" class="captcha form-control" type="text" name="captcha" maxlength="2" required>
										</div><!--
										--><input type="submit" class="btn btn--main-inverted" value="<?php _e('Submit message', 'genio_wt_lang'); ?>">
									</div>
								</div>
							</form>

						</div>
						<?php } ?>

					</div>

				</div>
				<?php } ?>

			</div>
		</section>