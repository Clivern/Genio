<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package genio-wt
 */
?>

<aside class="col-md-4">
	<?php 
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			dynamic_sidebar( 'sidebar-1' );
		}
	?>
</aside>