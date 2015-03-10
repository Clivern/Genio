<?php
/**
 * Genio back compat functionality
 *
 * Prevents Genio from running on WordPress versions prior to 3.9,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 3.9.
 *
 * @package genio-wt
 */

/**
 * Prevent switching to Genio on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 1.0
 */
function genio_wt_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'genio_wt_upgrade_notice' );
}
add_action( 'after_switch_theme', 'genio_wt_switch_theme' );


/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Genio on WordPress versions prior to 3.9.
 *
 * @since 1.0
 */
function genio_wt_upgrade_notice() {
	$message = sprintf( __( 'Genio requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'genio_wt_lang' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}


/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 3.9.
 *
 * @since 1.0
 */
function genio_wt_customize() {
	wp_die( sprintf( __( 'Genio requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'genio_wt_lang' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'genio_wt_customize' );


/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 3.9.
 *
 * @since 1.0
 */
function genio_wt_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Genio requires at least WordPress version 3.9. You are running version %s. Please upgrade and try again.', 'genio_wt_lang' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'genio_wt_preview' );