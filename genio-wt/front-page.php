<?php
/**
 * The template for displaying front page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */

global $Genio_Wt_Core;

/**
 *  Check if user need latest blog posts to be rendered in
 *  Home otherwise render front page with its awesome sections
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
	//include home template
	include( get_home_template() );
}else{
	//render front page
	get_header();
	//get sections order
	$sections = $Genio_Wt_Core->getOption('sections_order');
	$sections_map = array(
		'home' => 'home',
		'nav' => 'nav',
		'profile' => 'profile',
		'hobbies' => 'hobbies',
		'resume' => 'resume',
		'milestones' => 'milesto',
		'skills' => 'skills',
		'services' => 'services',
		'workprocess' => 'process',
		'blog' => 'blog',
		'portfolio' => 'portfolio',
		'pricing' => 'pricing',
		'clients' => 'clients',
		'testimonials' => 'testimonial',
		'contact' => 'contact',
	);
	//loop through section and get sections to render
	foreach ($sections as $section) {
		if($Genio_Wt_Core->getOption($sections_map[$section] . '_s_s') == 'yes'):
			/**
			 * Include section template according to its order
			 * called section-$section.php.
			 *
			 * Sections may be 
			 * - home
			 * - nav
			 * - profile
			 * - hobbies
			 * - resume
			 * - milestones
			 * - skills
			 * - services
			 * - workprocess
			 * - blog
			 * - portfolio
			 * - pricing
			 * - clients
			 * - testimonials
			 * - contact
			 */
			get_template_part( 'sections/section-' . $section );
		endif;
	}
	//get footer
	get_footer();
}