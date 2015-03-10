<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package genio-wt
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function genio_wt_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'footer',
	) );
}
add_action( 'after_setup_theme', 'genio_wt_jetpack_setup' );