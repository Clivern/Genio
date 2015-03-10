<?php
/**
 * The template used for displaying navigation section in front page and other pages
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_wt_menu_items = ( (is_front_page()) && !('posts' == get_option( 'show_on_front' )) ) ? array_merge($Genio_Wt_Core->sectionsAnchors(), $Genio_Wt_Core->menuItems('front')) : $Genio_Wt_Core->menuItems('nfront');
?>
		<section id="navigation">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-table">

						<!-- NAVIGATION CONTROLS -->
						<div class="navbar-cell tight">
							<div class="navbar-header">
								<div>
									<!-- #NAVIGATION HIRE BUTTON -->
									<?php if($Genio_Wt_Core->getOption('header_display') == 'site_title'){ ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="btn btn-hire btn--main-inverted"><span id="genio_site_title"><?php bloginfo( 'name' ); ?></span></a>
									<?php }elseif($Genio_Wt_Core->getOption('header_display') == 'site_logo'){ ?>
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class=""><img src="<?php echo esc_url($Genio_Wt_Core->getOption('logo')); ?>"></a>
									<?php }elseif($Genio_Wt_Core->getOption('header_display') == 'hire_me'){ ?>
										<a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>" rel="home" class="btn btn-hire btn--main-inverted"><i class="fa fa-briefcase"></i><span><?php _e('Hire Me','genio_wt_lang'); ?></span></a>
									<?php } ?>
									<!-- #NAVIGATION TOGGLE BUTTON -->
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
										<span class="sr-only"><?php _e('Toggle navigation','genio_wt_lang'); ?></span>
										<span class="fa fa-bars normal"></span>
									</button>

								</div>
							</div>
						</div>

						<!-- #NAVIGATION MENU -->
						<?php if( count($genio_wt_menu_items) >= 1 ){ ?>
						<div class="navbar-cell stretch">
							<div class="collapse navbar-collapse" id="navbar-collapse-1">
								<div class="navbar-cell">
								<ul class="nav navbar-nav navbar-right text-uppercase bold small">
									<?php foreach ($genio_wt_menu_items as $genio_menu_item) { ?>
										<li>
											<a href="<?php echo esc_url($genio_menu_item['url']); ?>">
												<i class="fa <?php echo esc_attr($genio_menu_item['icon']); ?> fa-fw"></i>
												<span><?php echo $genio_menu_item['title']; ?></span>
											</a>
										</li>
									<?php } ?>
								</ul>
								</div>
							</div><!-- /.navbar-collapse -->        
						</div>
						<?php } ?>
					</div>
				</div>
			</nav>
		</section>