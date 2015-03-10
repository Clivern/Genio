<?php
/**
 * The header for our theme.
 *
 * @package genio-wt
 */
global $Genio_Wt_Core;
$Genio_Wt_Core->safeRun();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="icon" type="image/png" href="<?php echo esc_url($Genio_Wt_Core->getOption('favicon')); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> style="overflow-y: hidden">
		<section id="preloader"></section>