<?php
/**
 * The template used for displaying milestones section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>

<section id="milestones" class="secondary-block-spacer">
				
			<!-- #MILESTONES LIST -->
			<ul class="list-unstyled text-center text-uppercase milestones-list">
				<li><?php if( ($Genio_Wt_Core->getOption('milesto_fi_tit') != '') && ($Genio_Wt_Core->getOption('milesto_fi_cou') != '') ){ ?>
					<div class="mega">
						<i class="fa fa-fw <?php echo esc_attr($Genio_Wt_Core->getOption('milesto_fi_ic')); ?>"></i>
					</div>
					<h1 class="heavy lh md-padder<?php if( strpos($Genio_Wt_Core->getOption('milesto_fi_cou'), 'M') > 0 ){ echo " in-millions"; } ?>" data-from="0" data-to="<?php echo esc_attr((int) $Genio_Wt_Core->getOption('milesto_fi_cou')); ?>"><?php echo (int) $Genio_Wt_Core->getOption('milesto_fi_cou'); ?></h1>
					<span class="lh inline-block semi-bold padder"><?php echo $Genio_Wt_Core->getOption('milesto_fi_tit'); ?></span>
					<?php } ?>
				</li><!--
				--><li><?php if( ($Genio_Wt_Core->getOption('milesto_se_tit') != '') && ($Genio_Wt_Core->getOption('milesto_se_cou') != '') ){ ?>
					<div class="mega">
						<i class="fa fa-fw <?php echo esc_attr($Genio_Wt_Core->getOption('milesto_se_ic')); ?>"></i>
					</div>
					<h1 class="heavy lh md-padder<?php if( strpos($Genio_Wt_Core->getOption('milesto_se_cou'), 'M') > 0 ){ echo " in-millions"; } ?>" data-from="0" data-to="<?php echo esc_attr((int) $Genio_Wt_Core->getOption('milesto_se_cou')); ?>"><?php echo (int) $Genio_Wt_Core->getOption('milesto_se_cou'); ?></h1>
					<span class="lh inline-block semi-bold padder"><?php echo $Genio_Wt_Core->getOption('milesto_se_tit'); ?></span>
					<?php } ?>
				</li><!--
				--><li><?php if( ($Genio_Wt_Core->getOption('milesto_th_tit') != '') && ($Genio_Wt_Core->getOption('milesto_th_cou') != '') ){ ?>
					<div class="mega">
						<i class="fa fa-fw <?php echo esc_attr($Genio_Wt_Core->getOption('milesto_th_ic')); ?>"></i>
					</div>
					<h1 class="heavy lh md-padder<?php if( strpos($Genio_Wt_Core->getOption('milesto_th_cou'), 'M') > 0 ){ echo " in-millions"; } ?>" data-from="0" data-to="<?php echo esc_attr((int) $Genio_Wt_Core->getOption('milesto_th_cou')); ?>"><?php echo (int) $Genio_Wt_Core->getOption('milesto_th_cou'); ?></h1>
					<span class="lh inline-block semi-bold padder"><?php echo $Genio_Wt_Core->getOption('milesto_th_tit'); ?></span>
					<?php } ?>
				</li><!--
				--><li><?php if( ($Genio_Wt_Core->getOption('milesto_fo_tit') != '') && ($Genio_Wt_Core->getOption('milesto_fo_cou') != '') ){ ?>
					<div class="mega">
						<i class="fa fa-fw <?php echo esc_attr($Genio_Wt_Core->getOption('milesto_fo_ic')); ?>"></i>
					</div>
					<h1 class="heavy lh md-padder<?php if( strpos($Genio_Wt_Core->getOption('milesto_fo_cou'), 'M') > 0 ){ echo " in-millions"; } ?>" data-from="0" data-to="<?php echo esc_attr((int) $Genio_Wt_Core->getOption('milesto_fo_cou')); ?>"><?php echo (int) $Genio_Wt_Core->getOption('milesto_fo_cou'); ?></h1>
					<span class="lh inline-block semi-bold padder"><?php echo $Genio_Wt_Core->getOption('milesto_fo_tit'); ?></span>
					<?php } ?>
				</li>
			</ul>

</section>