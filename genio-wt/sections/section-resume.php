<?php
/**
 * The template used for displaying resume section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_resume_items = $Genio_Wt_Core->getResume();
?>
		<section id="resume" class="main-block">
			<div class="container text-center">
				
				<!-- #RESUME TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('resume_s_tit') != '') || ($Genio_Wt_Core->getOption('resume_s_slog') != '') || ($Genio_Wt_Core->getOption('resume_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('resume_s_res_ic')); ?> mega"></i>
							<?php if( ($Genio_Wt_Core->getOption('resume_s_tit') != '')  ){ ?>
							<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('resume_s_tit'); ?></h1>
							<?php } ?>
							<?php if( ($Genio_Wt_Core->getOption('resume_s_slog') != '')  ){ ?>
							<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('resume_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('resume_s_desc') != '')  ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('resume_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>

				<!-- #EDUCATION -->
				<?php if( count($genio_resume_items['education']) >= 1 ) { ?>
				<div class="main-block__padder text-left">

					<!-- @EDUCATION TITLE -->
					<?php if( ($Genio_Wt_Core->getOption('resume_s_ed_tit') != '')  ){ ?>
					<div class="table wow fadeIn">
						<div class="table-cell h5 secondary-title__icon">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('resume_s_ed_ic')); ?>"></i>
						</div>
						<div class="table-cell secondary-title__text">
							<h5 class="text-capitalize"><?php echo $Genio_Wt_Core->getOption('resume_s_ed_tit'); ?></h5>
						</div>
						<div class="table-cell secondary-title__line"></div>
					</div>
					<?php } ?>

					<!-- @EDUCATION TIMELINE -->
					<div class="main-block__sub-padder">
						<div class="timeline education-timeline">
							
							<!-- DASHED LINE -->
							<div class="timeline-rail">
								<span class="timeline-loader-btn plus-icon plus-icon-small btn--main-color"></span>
							</div>
							
							<!-- TIMELINE ITEMS -->
							<div class="timeline-items list-gutter-lg">

								<!-- ITEM -->
								<?php
								foreach ( $genio_resume_items['education'] as $genio_resume_ed_item ) {
									if($genio_resume_ed_item['visibility'] != 'hidden'){ ?>
								<div class="clearfix timeline-item">
									
									<!-- TOOLTIP - BULLET - BOX -->
									<div class="pull-left clearfix text-center">
										
										<!-- TOOLTIP - BULLET -->
										<div class="inline-block v-middle">
													
											<!-- TOOLTIP -->
											<div class="custom-tooltip bold text-uppercase small inline-block v-middle hidden-xs wow fadeInLeft">
												<span>
													<i class="fa fa-clock-o normal"></i>
												</span>
												<?php echo $genio_resume_ed_item['ed_from'] . ' - ' . $genio_resume_ed_item['ed_to']; ?>
											</div>
											<div class="timeline-item-bullet inline-block v-middle"></div>

										</div>
										<div class="timeline-box inline-block v-middle hidden-xs text-uppercase wow fadeInRight">
											<span class="h3 light"><?php echo $genio_resume_ed_item['ed_grade'] ?></span>
											<small class="bold"><?php _e('Grade', 'genio_wt_lang'); ?></small>
										</div>

									</div>

									<!-- TIMELINE ITEM CONTENT -->
									<div class="no-overflow timeline-item-info wow fadeInRight">
										<?php if(!empty($genio_resume_ed_item['ed_degree'])){ ?>
										<h6 class="text-capitalize lh"><?php echo $genio_resume_ed_item['ed_degree'] ?></h6>
										<?php } ?>
										<?php if( !(empty($genio_resume_ed_item['ed_univ'])) || !(empty($genio_resume_ed_item['ed_coun'])) ){ ?>
										<ul class="list-inline list-gutter-xs em serif text-capitalize sm-padder timeline-info-list">
											<?php if(!empty($genio_resume_ed_item['ed_univ'])){ ?>
											<li><?php echo $genio_resume_ed_item['ed_univ'] ?></li>
											<?php } ?>
											<?php if(!empty($genio_resume_ed_item['ed_coun'])){ ?>
											<li>&#8226;</li>
											<li><?php echo $genio_resume_ed_item['ed_coun'] ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
										<?php if(!empty($genio_resume_ed_item['ed_summ'])){ ?>
										<p class="padder"><?php echo $genio_resume_ed_item['ed_summ'] ?></p>
										<?php } ?>
									</div>

								</div>
								<?php }else{ ?>
								<!-- ITEM -->
								<div class="clearfix timeline-item hidden">
									
									<!-- TOOLTIP - BULLET - BOX -->
									<div class="pull-left clearfix text-center">
										
										<!-- TOOLTIP - BULLET -->
										<div class="inline-block v-middle">
													
											<!-- TOOLTIP -->
											<div class="custom-tooltip bold text-uppercase small inline-block v-middle hidden-xs">
												<span>
													<i class="fa fa-clock-o normal"></i>
												</span>
												<?php echo $genio_resume_ed_item['ed_from'] . ' - ' . $genio_resume_ed_item['ed_to']; ?>
											</div>
											<div class="timeline-item-bullet inline-block v-middle"></div>

										</div>
										<div class="timeline-box inline-block v-middle hidden-xs text-uppercase">
											<span class="h3 light"><?php echo $genio_resume_ed_item['ed_grade'] ?></span>
											<small class="bold"><?php _e('Grade', 'genio_wt_lang'); ?></small>
										</div>

									</div>

									<!-- TIMELINE ITEM CONTENT -->
									<div class="no-overflow timeline-item-info">
										<?php if(!empty($genio_resume_ed_item['ed_degree'])){ ?>
										<h6 class="text-capitalize lh"><?php echo $genio_resume_ed_item['ed_degree'] ?></h6>
										<?php } ?>
										<?php if( !(empty($genio_resume_ed_item['ed_univ'])) || !(empty($genio_resume_ed_item['ed_coun'])) ){ ?>
										<ul class="list-inline list-gutter-xs em serif text-capitalize sm-padder timeline-info-list">
											<?php if(!empty($genio_resume_ed_item['ed_univ'])){ ?>
											<li><?php echo $genio_resume_ed_item['ed_univ'] ?></li>
											<?php } ?>
											<?php if(!empty($genio_resume_ed_item['ed_coun'])){ ?>
											<li>&#8226;</li>
											<li><?php echo $genio_resume_ed_item['ed_coun'] ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
										<?php if(!empty($genio_resume_ed_item['ed_summ'])){ ?>
										<p class="padder"><?php echo $genio_resume_ed_item['ed_summ'] ?></p>
										<?php } ?>
									</div>

								</div>
								<?php } 
								}?>
							</div>

						</div>
					</div>

				</div>
				<?php } ?>

				<!-- #EXPERIENCE -->
				<?php if( count($genio_resume_items['experience']) >= 1 ) { ?>
				<div class="main-block__padder text-left">

					<!-- @EXPERIENCE TITLE -->
					<?php if( ($Genio_Wt_Core->getOption('resume_s_ex_tit') != '')  ){ ?>
					<div class="table wow fadeIn">
						<div class="table-cell h5 secondary-title__icon">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('resume_s_ex_ic')); ?>"></i>
						</div>
						<div class="table-cell secondary-title__text">
							<h5 class="text-capitalize"><?php echo $Genio_Wt_Core->getOption('resume_s_ex_tit'); ?></h5>
						</div>
						<div class="table-cell secondary-title__line"></div>
					</div>
					<?php } ?>

					<!-- @EXPERIENCE TIMELINE -->
					<div class="main-block__sub-padder">
						<div class="timeline">
							
							<!-- DASHED LINE -->
							<div class="timeline-rail">
								<span class="timeline-loader-btn plus-icon plus-icon-small btn--main-color"></span>
							</div>
							
							<!-- TIMELINE ITEMS -->
							<div class="timeline-items list-gutter-lg">

								<!-- ITEM -->
								<?php foreach ( $genio_resume_items['experience'] as $genio_resume_ex_item ) {
									if($genio_resume_ex_item['visibility'] != 'hidden'){ ?>
								<div class="clearfix timeline-item">
									
									<!-- TOOLTIP - BULLET - BOX -->
									<div class="pull-left clearfix text-center">
										
										<!-- TOOLTIP - BULLET -->
										<div class="inline-block v-middle">
													
											<!-- TOOLTIP -->
											<div class="custom-tooltip bold text-uppercase small inline-block v-middle hidden-xs wow fadeInLeft">
												<span>
													<i class="fa fa-clock-o normal"></i>
												</span>
												<?php
												if($genio_resume_ex_item['ex_to'] > date('Y')){
													echo $genio_resume_ex_item['ex_from'] . ' - ' . __('NOW','genio_wt_lang');
												}else{
													echo $genio_resume_ex_item['ex_from'] . ' - ' . $genio_resume_ex_item['ex_to'];
												}
												?>
											</div>
											<div class="timeline-item-bullet inline-block v-middle"></div>

										</div>
										<div class="timeline-box inline-block v-middle hidden-xs text-uppercase wow fadeInRight" <?php if(!empty($genio_resume_ex_item['ex_logo'])){ ?>style="background-image: url(<?php echo esc_url($genio_resume_ex_item['ex_logo']); ?>)"<?php } ?>></div>

									</div>

									<!-- TIMELINE ITEM CONTENT -->
									<div class="no-overflow timeline-item-info wow fadeInRight">
										<?php if(!empty($genio_resume_ex_item['ex_job'])){ ?>
										<h6 class="text-capitalize lh"><?php echo $genio_resume_ex_item['ex_job'] ?></h6>
										<?php } ?>
										<?php if( !(empty($genio_resume_ex_item['ex_comp'])) || !(empty($genio_resume_ex_item['ex_coun'])) ){ ?>
										<ul class="list-inline list-gutter-xs em serif text-capitalize sm-padder timeline-info-list">
											<?php if(!empty($genio_resume_ex_item['ex_comp'])){ ?>
											<li><?php echo $genio_resume_ex_item['ex_comp'] ?></li>
											<?php } ?>
											<?php if(!empty($genio_resume_ex_item['ex_coun'])){ ?>
											<li>&#8226;</li>
											<li><?php echo $genio_resume_ex_item['ex_coun'] ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
										<?php if(!empty($genio_resume_ex_item['ex_summ'])){ ?>
										<p class="padder"><?php echo $genio_resume_ex_item['ex_summ'] ?></p>
										<?php } ?>
									</div>

								</div>
								<?php }else{ ?>
								<!-- ITEM -->
								<div class="clearfix timeline-item hidden">
									
									<!-- TOOLTIP - BULLET - BOX -->
									<div class="pull-left clearfix text-center">
										
										<!-- TOOLTIP - BULLET -->
										<div class="inline-block v-middle">
													
											<!-- TOOLTIP -->
											<div class="custom-tooltip bold text-uppercase small inline-block v-middle hidden-xs">
												<span>
													<i class="fa fa-clock-o normal"></i>
												</span>
												<?php
												if($genio_resume_ex_item['ex_to'] > date('Y')){
													echo $genio_resume_ex_item['ex_from'] . ' - ' . __('NOW','genio_wt_lang');
												}else{
													echo $genio_resume_ex_item['ex_from'] . ' - ' . $genio_resume_ex_item['ex_to'];
												}
												?>
											</div>
											<div class="timeline-item-bullet inline-block v-middle"></div>

										</div>
										<div class="timeline-box inline-block v-middle hidden-xs text-uppercase" <?php if(!empty($genio_resume_ex_item['ex_logo'])){ ?>style="background-image: url(<?php echo esc_url($genio_resume_ex_item['ex_logo']); ?>)"<?php } ?>></div>

									</div>

									<!-- TIMELINE ITEM CONTENT -->
									<div class="no-overflow timeline-item-info">
										<?php if(!empty($genio_resume_ex_item['ex_job'])){ ?>
										<h6 class="text-capitalize lh"><?php echo $genio_resume_ex_item['ex_job'] ?></h6>
										<?php } ?>
										<?php if( !(empty($genio_resume_ex_item['ex_comp'])) || !(empty($genio_resume_ex_item['ex_coun'])) ){ ?>
										<ul class="list-inline list-gutter-xs em serif text-capitalize sm-padder timeline-info-list">
											<?php if(!empty($genio_resume_ex_item['ex_comp'])){ ?>
											<li><?php echo $genio_resume_ex_item['ex_comp'] ?></li>
											<?php } ?>
											<?php if(!empty($genio_resume_ex_item['ex_coun'])){ ?>
											<li>&#8226;</li>
											<li><?php echo $genio_resume_ex_item['ex_coun'] ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
										<?php if(!empty($genio_resume_ex_item['ex_summ'])){ ?>
										<p class="padder"><?php echo $genio_resume_ex_item['ex_summ'] ?></p>
										<?php } ?>
									</div>

								</div>
								<?php }
								} ?>
							</div>

						</div>
					</div>

				</div>
				<?php } ?>

				<!-- #RECOGNITION -->
				<?php if( count($genio_resume_items['recognition']) >= 1 ) { ?>
				<div class="main-block__padder text-left">

					<!-- @RECOGNITION TITLE -->
					<?php if( ($Genio_Wt_Core->getOption('resume_s_rec_tit') != '')  ){ ?>
					<div class="table wow fadeIn">
						<div class="table-cell h5 secondary-title__icon">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('resume_s_rec_ic')); ?>"></i>
						</div>
						<div class="table-cell secondary-title__text">
							<h5 class="text-capitalize"><?php echo $Genio_Wt_Core->getOption('resume_s_rec_tit'); ?></h5>
						</div>
						<div class="table-cell secondary-title__line"></div>
					</div>
					<?php } ?>

					<!-- @RECOGNITION TIMELINE -->
					<div class="main-block__sub-padder">
						<div class="timeline">
							
							<!-- DASHED LINE -->
							<div class="timeline-rail">
								<span class="timeline-loader-btn plus-icon plus-icon-small btn--main-color"></span>
							</div>
							
							<!-- TIMELINE ITEMS -->
							<div class="timeline-items list-gutter-lg">
					
								<!-- ITEM -->
								<?php foreach ( $genio_resume_items['recognition'] as $genio_resume_re_item ) { ?>
								<div class="clearfix timeline-item <?php echo esc_attr($genio_resume_re_item['visibility']); ?>">
									
									<!-- TOOLTIP - BULLET - BOX -->
									<div class="pull-left clearfix text-center">
										
										<!-- TOOLTIP - BULLET -->
										<div class="inline-block v-middle">
													
											<!-- TOOLTIP -->
											<div class="custom-tooltip bold text-uppercase small inline-block v-middle hidden-xs wow fadeInLeft">
												<span>
													<i class="fa fa-clock-o normal"></i>
												</span>
												<?php echo $genio_resume_re_item['re_date'] ?>
											</div>
											<div class="timeline-item-bullet inline-block v-middle"></div>

										</div>
										<div class="timeline-box inline-block v-middle hidden-xs text-uppercase wow fadeInRight">
												<i class="fa <?php echo esc_attr($genio_resume_re_item['re_icon']) ?> huge"></i>
										</div>

									</div>

									<!-- TIMELINE ITEM CONTENT -->
									<div class="no-overflow timeline-item-info wow fadeInRight">
										<h6 class="text-capitalize lh"><?php echo $genio_resume_re_item['re_conf'] ?></h6>
										<?php if( !(empty($genio_resume_re_item['re_part'])) || !(empty($genio_resume_re_item['re_coun'])) ){ ?>
										<ul class="list-inline list-gutter-xs em serif text-capitalize sm-padder timeline-info-list">
											<?php if(!empty($genio_resume_re_item['re_part'])){ ?>
											<li><?php echo $genio_resume_re_item['re_part'] ?></li>
											<?php } ?>
											<?php if(!empty($genio_resume_re_item['re_coun'])){ ?>
											<li>&#8226;</li>
											<li><?php echo $genio_resume_re_item['re_coun'] ?></li>
											<?php } ?>
										</ul>
										<?php } ?>
										<?php if(!empty($genio_resume_re_item['re_summ'])){ ?>
										<p class="padder"><?php echo $genio_resume_re_item['re_summ'] ?></p>
										<?php } ?>
									</div>

								</div>
								<?php } ?>
							</div>

						</div>
					</div>

				</div>
				<?php } ?>
			</div>
		</section>