<?php
/**
 * genio functions and definitions
 *
 * @package genio-wt
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}


/**
 * Genio needed wordpress version.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.9', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}


if ( ! function_exists( 'genio_wt_setup' ) ) :
	
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function genio_wt_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on genio, use a find and replace
		 * to change 'genio_wt_lang' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'genio_wt_lang', get_template_directory() . '/languages' );
	
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		
	
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'genio_front_page_menu' => __( 'Front Page Menu (No Dropdown)',      'genio_wt_lang' ),
			'genio_other_pages_menu'  => __( 'Other Pages Menu (No Dropdown)', 'genio_wt_lang' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'gallery', 'image', 'video', 'quote',
		) );

		/*
		 * Enable support for Editor Styles.
		 * See http://codex.wordpress.org/Editor_Style
		 */
		add_editor_style();
	}
endif;
add_action( 'after_setup_theme', 'genio_wt_setup' );


/**
 * Register widget area.
 *
 * @since 1.0
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function genio_wt_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'genio_wt_lang' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'This sidebar will apear in your blog page.', 'genio_wt_lang' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="text-capitalize">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'genio_wt_widgets_init' );


/**
 * Enqueue scripts and styles.
 *
 * @since 1.0
 */
function genio_wt_scripts() {

	global $Genio_Wt_Core;

	$custom_styles_data = genio_wt_custom_styles();
	$protocol = is_ssl() ? 'https' : 'http';
	if(count($custom_styles_data['fonts']) > 0){
		foreach ($custom_styles_data['fonts'] as $font_slug => $font_value) {
			wp_enqueue_style( 'genio-font-' . $font_slug, $protocol . "://fonts.googleapis.com/css?family=" . $font_value );
		}
	}

	wp_enqueue_style('genio-wt-style', get_stylesheet_uri() );
	wp_enqueue_style('genio-wt-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0');
	wp_enqueue_style('genio-wt-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0');
	wp_enqueue_style('genio-wt-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '1.0');
	wp_enqueue_style('genio-wt-magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0');

	if ( (is_front_page()) && !('posts' == get_option( 'show_on_front' )) ){
		wp_enqueue_style('genio-wt-base-styles', get_template_directory_uri() . '/css/base.css', array(), '1.0');
		wp_enqueue_style('genio-wt-styles', get_template_directory_uri() . '/css/style.css', array(), '1.0');
	}else{
		wp_enqueue_style('genio-wt-rslides', get_template_directory_uri() . '/css/rslides.css', array(), '1.0');
		wp_enqueue_style('genio-wt-base-styles', get_template_directory_uri() . '/css/base.css', array(), '1.0');
		wp_enqueue_style('genio-wt-work', get_template_directory_uri() . '/css/work.css', array(), '1.0');
		wp_enqueue_style('genio-wt-blog-styles', get_template_directory_uri() . '/css/blog.css', array(), '1.0');
	}

	//load skin
	wp_enqueue_style('genio-wt-skin', get_template_directory_uri() . '/css/skins/' . $Genio_Wt_Core->getOption('skin') . '.css', array(), '1.0');
	//add inline styles to skin
	if( !empty($custom_styles_data['styles']) ){
		wp_add_inline_style( 'genio-wt-skin', $custom_styles_data['styles'] );
	}
	if( !empty($custom_styles_data['custom_styles']) ){
		wp_add_inline_style( 'genio-wt-skin', $custom_styles_data['custom_styles'] );
	}

	//load js files
	wp_enqueue_script('jquery');
	wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/libs/modernizr-latest.min.js', array('jquery'), true);
	wp_enqueue_script( 'genio-wt-bootstrap-js', get_template_directory_uri() . '/js/libs/bootstrap.min.js', array('jquery'), '1.0', true );
	
	if ( (is_front_page()) && !('posts' == get_option( 'show_on_front' )) ){
            wp_enqueue_script( 'genio-wt-pagescroll2id-js', get_template_directory_uri() . '/js/plugins/jquery.malihu.PageScroll2id.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-shuffle-js', get_template_directory_uri() . '/js/plugins/jquery.shuffle.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-sticky-js', get_template_directory_uri() . '/js/plugins/jquery.sticky-kit.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-magnific-js', get_template_directory_uri() . '/js/plugins/jquery.magnific-popup.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-quovolver-js', get_template_directory_uri() . '/js/plugins/jquery.quovolver.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'genio-wt-inview-js', get_template_directory_uri() . '/js/plugins/jquery.inview.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'genio-wt-countto-js', get_template_directory_uri() . '/js/plugins/jquery.countTo.min.js', array('jquery'), '1.0', true );
	}else{
            wp_enqueue_script( 'genio-wt-pagescroll2id-js', get_template_directory_uri() . '/js/plugins/jquery.malihu.PageScroll2id.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-sticky-js', get_template_directory_uri() . '/js/plugins/jquery.sticky-kit.min.js', array('jquery'), '1.0', true );
            wp_enqueue_script( 'genio-wt-magnific-js', get_template_directory_uri() . '/js/plugins/jquery.magnific-popup.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'genio-wt-fitvids-js', get_template_directory_uri() . '/js/plugins/jquery.fitvids.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'genio-wt-resp-slider', get_template_directory_uri() . '/js/plugins/responsiveslides.min.js', array('jquery'), '1.0', true );
	}
	wp_enqueue_script( 'genio-wt-script-js', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true );
	
	wp_enqueue_script( 'genio-wt-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'genio_wt_scripts' );


/**
 * Get google fonts and custom styles based on loaded fonts
 *
 * @since 1.0
 */
function genio_wt_custom_styles(){
	global $Genio_Wt_Core;

	$custom_styles_data = array();

	//add user custom styles
	$custom_styles_data['custom_styles'] = $Genio_Wt_Core->getOption('custom_styles');

	//add custom fonts
	$headings_font = $Genio_Wt_Core->getOption('headings_font');
	$main_font = $Genio_Wt_Core->getOption('main_font');
	$serif_font = $Genio_Wt_Core->getOption('serif_font');

	//get a list of unique fonts
	$required_fonts = array_unique( array($headings_font, $main_font, $serif_font) );

	$custom_styles_data['styles'] = '';

	//custom backgrounds
	if ( (is_front_page()) && !('posts' == get_option( 'show_on_front' )) ){
		$custom_styles_data['styles'] .= ".sec__hobbies-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('hobbies_s_bg')) . ");}";
		$custom_styles_data['styles'] .= ".sec__testimonials-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('testimonial_s_bg')) . ");}";
		$custom_styles_data['styles'] .= ".sec__process-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('process_s_bg')) . ");}";
		$custom_styles_data['styles'] .= ".sec__home-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('home_s_bg')) . ");}";
		$custom_styles_data['styles'] .= ".sec__contact{margin-bottom: 30px !important;}";
		$custom_styles_data['styles'] .= ".sec__parallax-home{height: 100% !important;}";
		$custom_styles_data['styles'] .= ".sec__right-home{height: 100% !important;}";
		$custom_styles_data['styles'] .= ".sec__gradient-home{height: 100% !important;margin-top: -70px !important;}";
		$custom_styles_data['styles'] .= ".sec__bottom-home{padding-bottom: 0 !important;}";
		$custom_styles_data['styles'] .= ".sec__right-img-home{margin-bottom:-3px !important;width: 80% !important;}";
		$custom_styles_data['styles'] .= ".sec__grad-img-home{margin-top: 0 !important;}";
	}else{
		$custom_styles_data['styles'] .= ".sec__404-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('404_header')) . ");}";
		$custom_styles_data['styles'] .= ".sec__archive-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('archive_header')) . ");}";
		$custom_styles_data['styles'] .= ".sec__page-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('page_header')) . ");}";
		$custom_styles_data['styles'] .= ".sec__post-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('post_header')) . ");}";
		$custom_styles_data['styles'] .= ".sec__blog-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('blog_header')) . ");}";
		$custom_styles_data['styles'] .= ".sec__search-bg{background-image: url(" . esc_url($Genio_Wt_Core->getOption('search_header')) . ");}";
	}

	//fonts affected element
	if( !empty($headings_font) ){
		$custom_styles_data['styles'] .= "h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {font-family: '" . str_replace('+', ' ', $headings_font) . "', 'Open Sans', sans-serif !important;}";
	}
	if( !empty($main_font) ){
		$custom_styles_data['styles'] .= "body{font-family: '" . str_replace('+', ' ', $main_font) . "', 'Open Sans', sans-serif !important;}";
	}
	if( !empty($serif_font) ){
		$custom_styles_data['styles'] .= ".serif {font-family: '" . str_replace('+', ' ', $serif_font) . "', Georgia, serif !important;}";
	}

	if( (empty($headings_font)) || (empty($main_font)) ){
		$custom_styles_data['fonts']['default_font'] = 'Open+Sans:400,300,600,700,800';
	}

	foreach ($required_fonts as $font) {
		if( !empty($font) ){
			$custom_styles_data['fonts'][str_replace(array('+',' '), array('_', '-'), strtolower($font) )] = $font;
		}
	}

	return $custom_styles_data;
}


/**
 * Print genio root url in header
 *
 * @since 1.0
 */
function genio_wt_custom_header_scripts(){
	?>
	<script type="text/javascript">var genio_deferred_scripts = "<?php echo esc_js(get_template_directory_uri()); ?>";</script>
	<?php
}
add_action('wp_print_scripts', 'genio_wt_custom_header_scripts' );


/**
 * Print user defined scripts in footer
 *  
 * These scripts mustn't be escaped
 * as it user defined and must execute properly in
 * website pages (eg.google analytics code or js redirects)
 * 
 * @since 1.0
 */
function genio_wt_custom_scripts(){
	global $Genio_Wt_Core;
	if( ($Genio_Wt_Core->getOption('custom_scripts') != '') ){ ?>
		<script type="text/javascript"><?php echo $Genio_Wt_Core->getOption('custom_scripts');  ?></script>
	<?php
	}
}
add_action( 'wp_print_footer_scripts', 'genio_wt_custom_scripts' );


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/core/class-tgm-plugin-activation.php';

/**
 * Bundle genio core plugin
 */
require get_template_directory() . '/inc/bundle-plugin.php';

/**
 * Load genio core class
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Load contact and hire form
 */
require get_template_directory() . '/inc/contact.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';