<?php
/**
 * The template for displaying the footer.
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;
?>
<footer id="footer" class="text-center secondary-block-spacer">
	<?php if( count($Genio_Wt_Core->getOption('footer_icons')) >= 1 ){ ?>
	<!-- social icons bar -->
	<div class="xlg-padder">
		<!-- social list -->
		<ul class="list-inline hollow-social-menu h5 list-gutter-xs">
			<?php foreach ($Genio_Wt_Core->getOption('footer_icons') as $key => $social) { ?>
			<li class="wow rollIn" data-wow-delay="<?php echo esc_attr($social['delay']); ?>s">
				<a href="<?php echo esc_url($social['url']); ?>" class="sm-rounded-box <?php echo esc_attr($social['bg']); ?>-bg">
					<i class="fa fa-<?php echo esc_attr($social['icon']); ?>"></i>
				</a>
			</li>
			<?php } ?>
		</ul>

	</div>
	<?php } ?>
	<!-- copyright -->
	<div class="xlg-padder text-capitalize">
		<div class="well-sm copyright-holder">
			<small><?php printf( __( 'Copyright %1$s %2$s %3$s. All Rights Reserved', 'genio_wt_lang' ), '&#169;', date('Y'), ( ($Genio_Wt_Core->getOption('copyright') == '') ? 'Genio'  : $Genio_Wt_Core->getOption('copyright')) ); ?></small>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>