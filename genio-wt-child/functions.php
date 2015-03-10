<?php
/**
 * genio child theme functions and definitions
 *
 * @package genio-child
 */
function genio_wt_child_enqueue() {
    wp_enqueue_style( 'genio-parent-style', get_template_directory_uri() . '/style.css', array(
    	'genio-wt-bootstrap',
    	'genio-wt-font-awesome',
    	'genio-wt-animate',
    	'genio-wt-magnific-popup',
    	'genio-wt-rslides',
    	'genio-wt-base-styles',
    	'genio-wt-work',
    	'genio-wt-styles',
    	'genio-wt-blog-styles',
    	'genio-wt-skin',
    ));
}
add_action( 'wp_enqueue_scripts', 'genio_wt_child_enqueue' );