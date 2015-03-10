<?php
/**
 * The template used for displaying skills section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_skills_data = $Genio_Wt_Core->getSkills();
?>
		<section id="skills" class="main-block">
			<div class="container text-center">
				
				<!-- #SKILLS TITLE -->
				<?php if( ($Genio_Wt_Core->getOption('skills_s_tit') != '') || ($Genio_Wt_Core->getOption('skills_s_slog') != '') || ($Genio_Wt_Core->getOption('skills_s_desc') != '') ){ ?>
				<div class="main-title text-left wow fadeIn">
					<div class="main-title__inner">
						<div class="text-right main-title__left">
							<i class="fa <?php echo esc_attr($Genio_Wt_Core->getOption('skills_s_ic')); ?> mega"></i>
							
							<?php if( ($Genio_Wt_Core->getOption('skills_s_tit') != '')  ){ ?>
							<h1 class="text-uppercase heavy lh padder"><?php echo $Genio_Wt_Core->getOption('skills_s_tit'); ?></h1>
							<?php } ?>
							
							<?php if( ($Genio_Wt_Core->getOption('skills_s_slog') != '')  ){ ?>
							<em class="h5 serif em text-capitalize regular"><?php echo $Genio_Wt_Core->getOption('skills_s_slog'); ?></em>
							<?php } ?>
						</div>
						<div class="main-title__right">
							<?php if( ($Genio_Wt_Core->getOption('skills_s_desc') != '')  ){ ?>
							<p class="serif em regular h6"><?php echo $Genio_Wt_Core->getOption('skills_s_desc'); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php } ?>

                        <!-- #SKILLS CONTENT -->
                        <?php if( count($genio_skills_data['panels']) >= 1 ){ ?>
				<div class="main-block__padder">
					
					<!-- #SKILLS TABS -->
                              <ul class="nav nav-tabs text-uppercase small bold inline-block tabs-list wow fadeInUp" role="tablist">
                                    <?php foreach ($genio_skills_data['terms'] as $genio_term_slug => $genio_term_name ) { ?>
                                    <li role="presentation"<?php if($genio_term_slug == $genio_skills_data['active']){ echo ' class="active"'; } ?>><a href="#<?php echo esc_attr($genio_term_slug); ?>" role="tab" data-toggle="tab"><?php echo $genio_term_name; ?></a></li>
                                    <?php } ?>
                              </ul>

					<!-- #SKILLS PANELS -->
					<div class="main-block__sub-padder tab-content text-left wow fadeInUp">

						<?php foreach ($genio_skills_data['panels'] as $genio_panel) { ?>
						<?php if($genio_panel['type'] == 'bar'){ ?>
						<div class="row tab-pane<?php if($genio_panel['active']){ echo' active '; } ?> skills-list" id="<?php echo esc_attr($genio_panel['id']); ?>">
							<?php foreach ($genio_panel['items'] as $genio_panel_item) { 
								if($genio_panel_item['order'] == 'first'){
							?>
							<div class="col-lg-4 col-md-5 col-sm-6 col-lg-offset-2 col-md-offset-1 text-uppercase">
                                                
                                                <h6 class="normal"><?php echo $genio_panel_item['title']; ?></h6>

                                                <!-- SKILL METER -->
                                                <div class="skill-meter xs-padder">
								<?php if($genio_panel_item['level'] == '20'){ ?>
									<div class="on"></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '40'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '60'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '80'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '100'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
								<?php } ?>
                                                </div>

							</div>
							<?php }else{ ?>
							<div class="col-lg-4 col-md-5 col-sm-6 text-uppercase">

                                                <h6 class="normal"><?php echo $genio_panel_item['title']; ?></h6>

                                                <!-- SKILL METER -->
                                                <div class="skill-meter xs-padder">
								<?php if($genio_panel_item['level'] == '20'){ ?>
									<div class="on"></div>
									<div></div>
									<div></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '40'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '60'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '80'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div></div>
								<?php }elseif($genio_panel_item['level'] == '100'){ ?>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
									<div class="on"></div>
								<?php } ?>
                                                </div>

							</div>
							<?php }
							} ?>
						</div>
						<?php }else{ ?>
						<!-- @KNOWLAGE PANEL -->
						<div class="row tab-pane skills-list <?php if($genio_panel['active']){ echo' active '; } ?>text-capitalize" id="<?php echo esc_attr($genio_panel['id']); ?>">
							<div class="col-md-4 col-sm-6 text-center">
								<ul class="colored-bullets checked-list list-gutter-sm list-unstyled inline-block text-left">
									<?php foreach ($genio_panel['items'] as $genio_panel_item) {
										if($genio_panel_item['order'] == 'first'){
									?>
									<li><?php echo $genio_panel_item['title']; ?></li>
									<?php }
									} ?>
								</ul>
							</div>
							<div class="col-md-4 col-sm-6 text-center">
								<ul class="colored-bullets checked-list list-gutter-sm list-unstyled inline-block text-left">
									<?php foreach ($genio_panel['items'] as $genio_panel_item) {
										if($genio_panel_item['order'] == 'second'){
									?>
									<li><?php echo $genio_panel_item['title']; ?></li>
									<?php }
									} ?>
								</ul>
							</div>
							<div class="col-md-4 col-sm-6 text-center">
								<ul class="colored-bullets checked-list list-gutter-sm list-unstyled inline-block text-left">
									<?php foreach ($genio_panel['items'] as $genio_panel_item) {
										if($genio_panel_item['order'] == 'third'){
									?>
									<li><?php echo $genio_panel_item['title']; ?></li>
									<?php }
									} ?>
								</ul>
							</div>
						</div>
						<?php }
						} ?>
					</div>
				</div>
                        <?php } ?>
			</div>
		</section>