<?php
/**
 * genio Theme Customizer
 *
 * @package genio-wt
 */

include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class Genio_Wt_Textarea_Control extends WP_Customize_Control {
	
   	public $type = 'textarea';
    
    	public $statuses;
	
    	public function __construct( $manager, $id, $args = array() )
    	{
		$this->statuses = array( '' => __( 'Default', 'genio_wt_lang' ) );
	  	parent::__construct( $manager, $id, $args );
	}

	public function render_content()
	{
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>
			<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
				<?php echo esc_textarea( $this->value() ); ?>
			</textarea>
		</label>
		<?php
	}
}

class Genio_Wt_Google_Fonts_Control extends WP_Customize_Control {
	
	private $fonts = false;
	
	public function __construct($manager, $id, $args = array(), $options = array())
	{
		$this->fonts = $this->get_fonts();
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the content of the category dropdown
	 *
	 * @return HTML
	 */
	public function render_content()
	{
		if(!empty($this->fonts)){
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_attr( $this->label ); ?></span>
				<select <?php $this->link(); ?>>
					<?php
						     $this->fonts = json_decode($this->fonts);
						     foreach($this->fonts as $key => $value){
							    $key = str_replace(' ', '+', $value->family);
							    echo '<option value="' . esc_attr($key) . '" '. selected($this->value(), $key, true) .'>' . $value->family . '</option>';
						     }
				    ?>
				</select>
			</label>
			<?php
		}
	}

	/**
	 * Get the google fonts from the API or in the cache
	 *
	 * @param  integer $amount
	 *
	 * @return String
	 */
	public function get_fonts() 
	{
		$fonts = '[{"family":""},{"family":"ABeeZee"},{"family":"Abel"},{"family":"Abril Fatface"},{"family":"Aclonica"},{"family":"Acme"},{"family":"Actor"},{"family":"Adamina"},{"family":"Advent Pro"},{"family":"Aguafina Script"},{"family":"Akronim"},{"family":"Aladin"},{"family":"Aldrich"},{"family":"Alef"},{"family":"Alegreya"},{"family":"Alegreya SC"},{"family":"Alex Brush"},{"family":"Alfa Slab One"},{"family":"Alice"},{"family":"Alike"},{"family":"Alike Angular"},{"family":"Allan"},{"family":"Allerta"},{"family":"Allerta Stencil"},{"family":"Allura"},{"family":"Almendra"},{"family":"Almendra Display"},{"family":"Almendra SC"},{"family":"Amarante"},{"family":"Amaranth"},{"family":"Amatic SC"},{"family":"Amethysta"},{"family":"Anaheim"},{"family":"Andada"},{"family":"Andika"},{"family":"Angkor"},{"family":"Annie Use Your Telescope"},{"family":"Anonymous Pro"},{"family":"Antic"},{"family":"Antic Didone"},{"family":"Antic Slab"},{"family":"Anton"},{"family":"Arapey"},{"family":"Arbutus"},{"family":"Arbutus Slab"},{"family":"Architects Daughter"},{"family":"Archivo Black"},{"family":"Archivo Narrow"},{"family":"Arimo"},{"family":"Arizonia"},{"family":"Armata"},{"family":"Artifika"},{"family":"Arvo"},{"family":"Asap"},{"family":"Asset"},{"family":"Astloch"},{"family":"Asul"},{"family":"Atomic Age"},{"family":"Aubrey"},{"family":"Audiowide"},{"family":"Autour One"},{"family":"Average"},{"family":"Average Sans"},{"family":"Averia Gruesa Libre"},{"family":"Averia Libre"},{"family":"Averia Sans Libre"},{"family":"Averia Serif Libre"},{"family":"Bad Script"},{"family":"Balthazar"},{"family":"Bangers"},{"family":"Basic"},{"family":"Battambang"},{"family":"Baumans"},{"family":"Bayon"},{"family":"Belgrano"},{"family":"Belleza"},{"family":"BenchNine"},{"family":"Bentham"},{"family":"Berkshire Swash"},{"family":"Bevan"},{"family":"Bigelow Rules"},{"family":"Bigshot One"},{"family":"Bilbo"},{"family":"Bilbo Swash Caps"},{"family":"Bitter"},{"family":"Black Ops One"},{"family":"Bokor"},{"family":"Bonbon"},{"family":"Boogaloo"},{"family":"Bowlby One"},{"family":"Bowlby One SC"},{"family":"Brawler"},{"family":"Bree Serif"},{"family":"Bubblegum Sans"},{"family":"Bubbler One"},{"family":"Buda"},{"family":"Buenard"},{"family":"Butcherman"},{"family":"Butterfly Kids"},{"family":"Cabin"},{"family":"Cabin Condensed"},{"family":"Cabin Sketch"},{"family":"Caesar Dressing"},{"family":"Cagliostro"},{"family":"Calligraffitti"},{"family":"Cambo"},{"family":"Candal"},{"family":"Cantarell"},{"family":"Cantata One"},{"family":"Cantora One"},{"family":"Capriola"},{"family":"Cardo"},{"family":"Carme"},{"family":"Carrois Gothic"},{"family":"Carrois Gothic SC"},{"family":"Carter One"},{"family":"Caudex"},{"family":"Cedarville Cursive"},{"family":"Ceviche One"},{"family":"Changa One"},{"family":"Chango"},{"family":"Chau Philomene One"},{"family":"Chela One"},{"family":"Chelsea Market"},{"family":"Chenla"},{"family":"Cherry Cream Soda"},{"family":"Cherry Swash"},{"family":"Chewy"},{"family":"Chicle"},{"family":"Chivo"},{"family":"Cinzel"},{"family":"Cinzel Decorative"},{"family":"Clicker Script"},{"family":"Coda"},{"family":"Coda Caption"},{"family":"Codystar"},{"family":"Combo"},{"family":"Comfortaa"},{"family":"Coming Soon"},{"family":"Concert One"},{"family":"Condiment"},{"family":"Content"},{"family":"Contrail One"},{"family":"Convergence"},{"family":"Cookie"},{"family":"Copse"},{"family":"Corben"},{"family":"Courgette"},{"family":"Cousine"},{"family":"Coustard"},{"family":"Covered By Your Grace"},{"family":"Crafty Girls"},{"family":"Creepster"},{"family":"Crete Round"},{"family":"Crimson Text"},{"family":"Croissant One"},{"family":"Crushed"},{"family":"Cuprum"},{"family":"Cutive"},{"family":"Cutive Mono"},{"family":"Damion"},{"family":"Dancing Script"},{"family":"Dangrek"},{"family":"Dawning of a New Day"},{"family":"Days One"},{"family":"Delius"},{"family":"Delius Swash Caps"},{"family":"Delius Unicase"},{"family":"Della Respira"},{"family":"Denk One"},{"family":"Devonshire"},{"family":"Didact Gothic"},{"family":"Diplomata"},{"family":"Diplomata SC"},{"family":"Domine"},{"family":"Donegal One"},{"family":"Doppio One"},{"family":"Dorsa"},{"family":"Dosis"},{"family":"Dr Sugiyama"},{"family":"Droid Sans"},{"family":"Droid Sans Mono"},{"family":"Droid Serif"},{"family":"Duru Sans"},{"family":"Dynalight"},{"family":"EB Garamond"},{"family":"Eagle Lake"},{"family":"Eater"},{"family":"Economica"},{"family":"Electrolize"},{"family":"Elsie"},{"family":"Elsie Swash Caps"},{"family":"Emblema One"},{"family":"Emilys Candy"},{"family":"Engagement"},{"family":"Englebert"},{"family":"Enriqueta"},{"family":"Erica One"},{"family":"Esteban"},{"family":"Euphoria Script"},{"family":"Ewert"},{"family":"Exo"},{"family":"Expletus Sans"},{"family":"Fanwood Text"},{"family":"Fascinate"},{"family":"Fascinate Inline"},{"family":"Faster One"},{"family":"Fasthand"},{"family":"Fauna One"},{"family":"Federant"},{"family":"Federo"},{"family":"Felipa"},{"family":"Fenix"},{"family":"Finger Paint"},{"family":"Fjalla One"},{"family":"Fjord One"},{"family":"Flamenco"},{"family":"Flavors"},{"family":"Fondamento"},{"family":"Fontdiner Swanky"},{"family":"Forum"},{"family":"Francois One"},{"family":"Freckle Face"},{"family":"Fredericka the Great"},{"family":"Fredoka One"},{"family":"Freehand"},{"family":"Fresca"},{"family":"Frijole"},{"family":"Fruktur"},{"family":"Fugaz One"},{"family":"GFS Didot"},{"family":"GFS Neohellenic"},{"family":"Gabriela"},{"family":"Gafata"},{"family":"Galdeano"},{"family":"Galindo"},{"family":"Gentium Basic"},{"family":"Gentium Book Basic"},{"family":"Geo"},{"family":"Geostar"},{"family":"Geostar Fill"},{"family":"Germania One"},{"family":"Gilda Display"},{"family":"Give You Glory"},{"family":"Glass Antiqua"},{"family":"Glegoo"},{"family":"Gloria Hallelujah"},{"family":"Goblin One"},{"family":"Gochi Hand"},{"family":"Gorditas"},{"family":"Goudy Bookletter 1911"},{"family":"Graduate"},{"family":"Grand Hotel"},{"family":"Gravitas One"},{"family":"Great Vibes"},{"family":"Griffy"},{"family":"Gruppo"},{"family":"Gudea"},{"family":"Habibi"},{"family":"Hammersmith One"},{"family":"Hanalei"},{"family":"Hanalei Fill"},{"family":"Handlee"},{"family":"Hanuman"},{"family":"Happy Monkey"},{"family":"Headland One"},{"family":"Henny Penny"},{"family":"Herr Von Muellerhoff"},{"family":"Holtwood One SC"},{"family":"Homemade Apple"},{"family":"Homenaje"},{"family":"IM Fell DW Pica"},{"family":"IM Fell DW Pica SC"},{"family":"IM Fell Double Pica"},{"family":"IM Fell Double Pica SC"},{"family":"IM Fell English"},{"family":"IM Fell English SC"},{"family":"IM Fell French Canon"},{"family":"IM Fell French Canon SC"},{"family":"IM Fell Great Primer"},{"family":"IM Fell Great Primer SC"},{"family":"Iceberg"},{"family":"Iceland"},{"family":"Imprima"},{"family":"Inconsolata"},{"family":"Inder"},{"family":"Indie Flower"},{"family":"Inika"},{"family":"Irish Grover"},{"family":"Istok Web"},{"family":"Italiana"},{"family":"Italianno"},{"family":"Jacques Francois"},{"family":"Jacques Francois Shadow"},{"family":"Jim Nightshade"},{"family":"Jockey One"},{"family":"Jolly Lodger"},{"family":"Josefin Sans"},{"family":"Josefin Slab"},{"family":"Joti One"},{"family":"Judson"},{"family":"Julee"},{"family":"Julius Sans One"},{"family":"Junge"},{"family":"Jura"},{"family":"Just Another Hand"},{"family":"Just Me Again Down Here"},{"family":"Kameron"},{"family":"Karla"},{"family":"Kaushan Script"},{"family":"Kavoon"},{"family":"Keania One"},{"family":"Kelly Slab"},{"family":"Kenia"},{"family":"Khmer"},{"family":"Kite One"},{"family":"Knewave"},{"family":"Kotta One"},{"family":"Koulen"},{"family":"Kranky"},{"family":"Kreon"},{"family":"Kristi"},{"family":"Krona One"},{"family":"La Belle Aurore"},{"family":"Lancelot"},{"family":"Lato"},{"family":"League Script"},{"family":"Leckerli One"},{"family":"Ledger"},{"family":"Lekton"},{"family":"Lemon"},{"family":"Libre Baskerville"},{"family":"Life Savers"},{"family":"Lilita One"},{"family":"Lily Script One"},{"family":"Limelight"},{"family":"Linden Hill"},{"family":"Lobster"},{"family":"Lobster Two"},{"family":"Londrina Outline"},{"family":"Londrina Shadow"},{"family":"Londrina Sketch"},{"family":"Londrina Solid"},{"family":"Lora"},{"family":"Love Ya Like A Sister"},{"family":"Loved by the King"},{"family":"Lovers Quarrel"},{"family":"Luckiest Guy"},{"family":"Lusitana"},{"family":"Lustria"},{"family":"Macondo"},{"family":"Macondo Swash Caps"},{"family":"Magra"},{"family":"Maiden Orange"},{"family":"Mako"},{"family":"Marcellus"},{"family":"Marcellus SC"},{"family":"Marck Script"},{"family":"Margarine"},{"family":"Marko One"},{"family":"Marmelad"},{"family":"Marvel"},{"family":"Mate"},{"family":"Mate SC"},{"family":"Maven Pro"},{"family":"McLaren"},{"family":"Meddon"},{"family":"MedievalSharp"},{"family":"Medula One"},{"family":"Megrim"},{"family":"Meie Script"},{"family":"Merienda"},{"family":"Merienda One"},{"family":"Merriweather"},{"family":"Merriweather Sans"},{"family":"Metal"},{"family":"Metal Mania"},{"family":"Metamorphous"},{"family":"Metrophobic"},{"family":"Michroma"},{"family":"Milonga"},{"family":"Miltonian"},{"family":"Miltonian Tattoo"},{"family":"Miniver"},{"family":"Miss Fajardose"},{"family":"Modern Antiqua"},{"family":"Molengo"},{"family":"Molle"},{"family":"Monda"},{"family":"Monofett"},{"family":"Monoton"},{"family":"Monsieur La Doulaise"},{"family":"Montaga"},{"family":"Montez"},{"family":"Montserrat"},{"family":"Montserrat Alternates"},{"family":"Montserrat Subrayada"},{"family":"Moul"},{"family":"Moulpali"},{"family":"Mountains of Christmas"},{"family":"Mouse Memoirs"},{"family":"Mr Bedfort"},{"family":"Mr Dafoe"},{"family":"Mr De Haviland"},{"family":"Mrs Saint Delafield"},{"family":"Mrs Sheppards"},{"family":"Muli"},{"family":"Mystery Quest"},{"family":"Neucha"},{"family":"Neuton"},{"family":"New Rocker"},{"family":"News Cycle"},{"family":"Niconne"},{"family":"Nixie One"},{"family":"Nobile"},{"family":"Nokora"},{"family":"Norican"},{"family":"Nosifer"},{"family":"Nothing You Could Do"},{"family":"Noticia Text"},{"family":"Noto Sans"},{"family":"Noto Serif"},{"family":"Nova Cut"},{"family":"Nova Flat"},{"family":"Nova Mono"},{"family":"Nova Oval"},{"family":"Nova Round"},{"family":"Nova Script"},{"family":"Nova Slim"},{"family":"Nova Square"},{"family":"Numans"},{"family":"Nunito"},{"family":"Odor Mean Chey"},{"family":"Offside"},{"family":"Old Standard TT"},{"family":"Oldenburg"},{"family":"Oleo Script"},{"family":"Oleo Script Swash Caps"},{"family":"Open Sans"},{"family":"Open Sans Condensed"},{"family":"Oranienbaum"},{"family":"Orbitron"},{"family":"Oregano"},{"family":"Orienta"},{"family":"Original Surfer"},{"family":"Oswald"},{"family":"Over the Rainbow"},{"family":"Overlock"},{"family":"Overlock SC"},{"family":"Ovo"},{"family":"Oxygen"},{"family":"Oxygen Mono"},{"family":"PT Mono"},{"family":"PT Sans"},{"family":"PT Sans Caption"},{"family":"PT Sans Narrow"},{"family":"PT Serif"},{"family":"PT Serif Caption"},{"family":"Pacifico"},{"family":"Paprika"},{"family":"Parisienne"},{"family":"Passero One"},{"family":"Passion One"},{"family":"Pathway Gothic One"},{"family":"Patrick Hand"},{"family":"Patrick Hand SC"},{"family":"Patua One"},{"family":"Paytone One"},{"family":"Peralta"},{"family":"Permanent Marker"},{"family":"Petit Formal Script"},{"family":"Petrona"},{"family":"Philosopher"},{"family":"Piedra"},{"family":"Pinyon Script"},{"family":"Pirata One"},{"family":"Plaster"},{"family":"Play"},{"family":"Playball"},{"family":"Playfair Display"},{"family":"Playfair Display SC"},{"family":"Podkova"},{"family":"Poiret One"},{"family":"Poller One"},{"family":"Poly"},{"family":"Pompiere"},{"family":"Pontano Sans"},{"family":"Port Lligat Sans"},{"family":"Port Lligat Slab"},{"family":"Prata"},{"family":"Preahvihear"},{"family":"Press Start 2P"},{"family":"Princess Sofia"},{"family":"Prociono"},{"family":"Prosto One"},{"family":"Puritan"},{"family":"Purple Purse"},{"family":"Quando"},{"family":"Quantico"},{"family":"Quattrocento"},{"family":"Quattrocento Sans"},{"family":"Questrial"},{"family":"Quicksand"},{"family":"Quintessential"},{"family":"Qwigley"},{"family":"Racing Sans One"},{"family":"Radley"},{"family":"Raleway"},{"family":"Raleway Dots"},{"family":"Rambla"},{"family":"Rammetto One"},{"family":"Ranchers"},{"family":"Rancho"},{"family":"Rationale"},{"family":"Redressed"},{"family":"Reenie Beanie"},{"family":"Revalia"},{"family":"Ribeye"},{"family":"Ribeye Marrow"},{"family":"Righteous"},{"family":"Risque"},{"family":"Roboto"},{"family":"Roboto Condensed"},{"family":"Roboto Slab"},{"family":"Rochester"},{"family":"Rock Salt"},{"family":"Rokkitt"},{"family":"Romanesco"},{"family":"Ropa Sans"},{"family":"Rosario"},{"family":"Rosarivo"},{"family":"Rouge Script"},{"family":"Ruda"},{"family":"Rufina"},{"family":"Ruge Boogie"},{"family":"Ruluko"},{"family":"Rum Raisin"},{"family":"Ruslan Display"},{"family":"Russo One"},{"family":"Ruthie"},{"family":"Rye"},{"family":"Sacramento"},{"family":"Sail"},{"family":"Salsa"},{"family":"Sanchez"},{"family":"Sancreek"},{"family":"Sansita One"},{"family":"Sarina"},{"family":"Satisfy"},{"family":"Scada"},{"family":"Schoolbell"},{"family":"Seaweed Script"},{"family":"Sevillana"},{"family":"Seymour One"},{"family":"Shadows Into Light"},{"family":"Shadows Into Light Two"},{"family":"Shanti"},{"family":"Share"},{"family":"Share Tech"},{"family":"Share Tech Mono"},{"family":"Shojumaru"},{"family":"Short Stack"},{"family":"Siemreap"},{"family":"Sigmar One"},{"family":"Signika"},{"family":"Signika Negative"},{"family":"Simonetta"},{"family":"Sintony"},{"family":"Sirin Stencil"},{"family":"Six Caps"},{"family":"Skranji"},{"family":"Slackey"},{"family":"Smokum"},{"family":"Smythe"},{"family":"Sniglet"},{"family":"Snippet"},{"family":"Snowburst One"},{"family":"Sofadi One"},{"family":"Sofia"},{"family":"Sonsie One"},{"family":"Sorts Mill Goudy"},{"family":"Source Code Pro"},{"family":"Source Sans Pro"},{"family":"Special Elite"},{"family":"Spicy Rice"},{"family":"Spinnaker"},{"family":"Spirax"},{"family":"Squada One"},{"family":"Stalemate"},{"family":"Stalinist One"},{"family":"Stardos Stencil"},{"family":"Stint Ultra Condensed"},{"family":"Stint Ultra Expanded"},{"family":"Stoke"},{"family":"Strait"},{"family":"Sue Ellen Francisco"},{"family":"Sunshiney"},{"family":"Supermercado One"},{"family":"Suwannaphum"},{"family":"Swanky and Moo Moo"},{"family":"Syncopate"},{"family":"Tangerine"},{"family":"Taprom"},{"family":"Tauri"},{"family":"Telex"},{"family":"Tenor Sans"},{"family":"Text Me One"},{"family":"The Girl Next Door"},{"family":"Tienne"},{"family":"Tinos"},{"family":"Titan One"},{"family":"Titillium Web"},{"family":"Trade Winds"},{"family":"Trocchi"},{"family":"Trochut"},{"family":"Trykker"},{"family":"Tulpen One"},{"family":"Ubuntu"},{"family":"Ubuntu Condensed"},{"family":"Ubuntu Mono"},{"family":"Ultra"},{"family":"Uncial Antiqua"},{"family":"Underdog"},{"family":"Unica One"},{"family":"UnifrakturCook"},{"family":"UnifrakturMaguntia"},{"family":"Unkempt"},{"family":"Unlock"},{"family":"Unna"},{"family":"VT323"},{"family":"Vampiro One"},{"family":"Varela"},{"family":"Varela Round"},{"family":"Vast Shadow"},{"family":"Vibur"},{"family":"Vidaloka"},{"family":"Viga"},{"family":"Voces"},{"family":"Volkhov"},{"family":"Vollkorn"},{"family":"Voltaire"},{"family":"Waiting for the Sunrise"},{"family":"Wallpoet"},{"family":"Walter Turncoat"},{"family":"Warnes"},{"family":"Wellfleet"},{"family":"Wendy One"},{"family":"Wire One"},{"family":"Yanone Kaffeesatz"},{"family":"Yellowtail"},{"family":"Yeseva One"},{"family":"Yesteryear"},{"family":"Zeyada"}]';
		return $fonts;
	}
 }

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function genio_wt_customize_register( $wp_customize ) {
    	global $Genio_Wt_Core;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	//$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Logo
	// -------------------------------------
	$wp_customize->add_setting( 'genio_wt_customize[logo]', array(
	  	'default'    => $Genio_Wt_Core->getOption('logo'),
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_img_url',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label' => __( 'Site Logo', 'genio_wt_lang' ),
		'section' => 'title_tagline',
		'settings' => 'genio_wt_customize[logo]',
		'priority' => 10,
	)));

	$wp_customize->add_setting( 'genio_wt_customize[favicon]', array(
	  	'default'    => $Genio_Wt_Core->getOption('favicon'),
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_img_url',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'favicon', array(
		'label' => __( 'Site Favicon', 'genio_wt_lang' ),
		'section' => 'title_tagline',
		'settings' => 'genio_wt_customize[favicon]',
		'priority' => 11,
	)));

	$wp_customize->add_setting( 'genio_wt_customize[header_display]', array(
		'default'        => $Genio_Wt_Core->getOption('header_display'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_header_display',
	));
	$wp_customize->add_control( 'header_display', array(
		'settings' => 'genio_wt_customize[header_display]',
		'label'   => __( 'Display Logo as', 'genio_wt_lang' ),
		'section' => 'title_tagline',
		'type'    => 'select',
		'choices'    => array(
			'site_title' => __( 'Site Title', 'genio_wt_lang' ),
			'site_logo' => __( 'Site Logo', 'genio_wt_lang' ),
			'hire_me' => __( 'Hire Me', 'genio_wt_lang' ),
		),
		'priority'   => 12,
	));

	// Styles
	// -------------------------------------
	$wp_customize->add_section( 'genio_styles', array(
		'title'    => __( 'Styles', 'genio_wt_lang' ),
		'priority' => 298,
	));

    	$wp_customize->add_setting( 'genio_wt_customize[template]', array(
		'default'        => $Genio_Wt_Core->getOption('template'),
	  	'capability'     => 'edit_theme_options',
	  	'type'           => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_template',
    	));
    	$wp_customize->add_control( 'template', array(
	  	'settings' => 'genio_wt_customize[template]',
	  	'label'   => __( 'Home Template', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'type'    => 'select',
	  	'description' => __( 'Select one of the templates that you previously created in home builder page.', 'genio_wt_lang' ),
	  	'choices'    => genio_wt_get_templates(),
    	));

	$wp_customize->add_setting( 'genio_wt_customize[skin]', array(
		'default'        => $Genio_Wt_Core->getOption('skin'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_site_skin',
	));
	$wp_customize->add_control( 'skin', array(
		'settings' => 'genio_wt_customize[skin]',
		'label'   => __( 'Skin', 'genio_wt_lang' ),
		'section' => 'genio_styles',
		'type'    => 'select',
		'choices'    => array(
			'yellow' => __( 'Yellow', 'genio_wt_lang' ),
		'green' => __( 'Green', 'genio_wt_lang' ),
		'purple' => __( 'Purple', 'genio_wt_lang' ),
		'mint' => __( 'Mint', 'genio_wt_lang' ),
			'blue' => __( 'Blue', 'genio_wt_lang' ),
			'orange' => __( 'Orange', 'genio_wt_lang' ),
		),
	));

	$wp_customize->add_setting( 'genio_wt_customize[blog_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('blog_header'),
		'capability' => 'edit_theme_options',
		'type' => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_img_url',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_header', array(
		'label' => __( 'Blog Page Custom Header', 'genio_wt_lang' ),
		'section' => 'genio_styles',
	  	'description' => __( 'Select blog header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
		'settings' => 'genio_wt_customize[blog_header]',
	)));

    	$wp_customize->add_setting( 'genio_wt_customize[404_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('404_header'),
	  	'capability' => 'edit_theme_options',
	  	'type' => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_img_url',
    	));
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, '404_header', array(
	  	'label' => __( '404 Page Custom Header', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'description' => __( 'Select 404 header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
	  	'settings' => 'genio_wt_customize[404_header]',
    	)));

    	$wp_customize->add_setting( 'genio_wt_customize[archive_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('archive_header'),
	  	'capability' => 'edit_theme_options',
	  	'type' => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_img_url',
    	));
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'archive_header', array(
	  	'label' => __( 'Archive Page Custom Header', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'description' => __( 'Select archive header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
	  	'settings' => 'genio_wt_customize[archive_header]',
    	)));

    	$wp_customize->add_setting( 'genio_wt_customize[search_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('search_header'),
	  	'capability' => 'edit_theme_options',
	  	'type' => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_img_url',
    	));
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'search_header', array(
	  	'label' => __( 'Search Page Custom Header', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'description' => __( 'Select search header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
	  	'settings' => 'genio_wt_customize[search_header]',
    	)));

    	$wp_customize->add_setting( 'genio_wt_customize[post_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('post_header'),
	  	'capability' => 'edit_theme_options',
	  	'type' => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_img_url',
    	));
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'post_header', array(
	  	'label' => __( 'Post Page Custom Header', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'description' => __( 'Select post header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
	  	'settings' => 'genio_wt_customize[post_header]',
    	)));


    	$wp_customize->add_setting( 'genio_wt_customize[page_header]', array(
	  	'default'    => $Genio_Wt_Core->getOption('page_header'),
	  	'capability' => 'edit_theme_options',
	  	'type' => 'option',
	  	'sanitize_callback' => 'genio_wt_sanitize_img_url',
    	));
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'page_header', array(
	  	'label' => __( 'Page Custom Header', 'genio_wt_lang' ),
	  	'section' => 'genio_styles',
	  	'description' => __( 'Select page header background image. recommended size (1920 x 1080).', 'genio_wt_lang' ),
	  	'settings' => 'genio_wt_customize[page_header]',
    	)));

	// Fonts
	// -------------------------------------
	$wp_customize->add_section( 'genio_fonts', array(
		'title'    => __( 'Fonts', 'genio_wt_lang' ),
		'priority' => 299,
	));

	$wp_customize->add_setting( 'genio_wt_customize[headings_font]', array(
		'default'        => $Genio_Wt_Core->getOption('headings_font'),
		'capability'     => 'edit_theme_options',
	  'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_google_fonts',
	));
	$wp_customize->add_control( new Genio_Wt_Google_Fonts_Control( $wp_customize, 'headings_font', array(
		'label'      => __( 'Headings Font', 'genio_wt_lang' ),
		'section'    => 'genio_fonts',
		'settings'   => 'genio_wt_customize[headings_font]',
	)));

	$wp_customize->add_setting( 'genio_wt_customize[main_font]', array(
		'default'        => $Genio_Wt_Core->getOption('main_font'),
		'capability'     => 'edit_theme_options',
	  	'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_google_fonts',
	));
	$wp_customize->add_control( new Genio_Wt_Google_Fonts_Control( $wp_customize, 'main_font', array(
		'label'      => __( 'Main Font', 'genio_wt_lang' ),
		'section'    => 'genio_fonts',
		'settings'   => 'genio_wt_customize[main_font]',
	)));

	$wp_customize->add_setting( 'genio_wt_customize[serif_font]', array(
		'default'        => $Genio_Wt_Core->getOption('serif_font'),
		'capability'     => 'edit_theme_options',
	  	'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_google_fonts',
	));
	$wp_customize->add_control( new Genio_Wt_Google_Fonts_Control( $wp_customize, 'serif_font', array(
		'label'      => __( 'Serif Font', 'genio_wt_lang' ),
		'section'    => 'genio_fonts',
		'settings'   => 'genio_wt_customize[serif_font]',
	)));

	// Header
	// -------------------------------------
	$wp_customize->add_section( 'genio_header', array(
		'title'    => __( 'Header', 'genio_wt_lang' ),
		'priority' => 300,
	));

	$wp_customize->add_setting( 'genio_wt_customize[custom_styles]', array(
		'default'        => $Genio_Wt_Core->getOption('custom_styles'),
		'capability'     => 'edit_theme_options',
	  	'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_styles',
	));
	$wp_customize->add_control( new Genio_Wt_Textarea_Control( $wp_customize, 'custom_styles', array(
		'label'      => __( 'Custom Styles', 'genio_wt_lang' ),
		'section'    => 'genio_header',
		'settings'   => 'genio_wt_customize[custom_styles]',
	)));

	// Footer
	// -------------------------------------
	$wp_customize->add_section( 'genio_footer', array(
		'title'    => __( 'Footer', 'genio_wt_lang' ),
		'priority' => 301,
	));
	
	$wp_customize->add_setting( 'genio_wt_customize[custom_scripts]', array(
		'default'        => $Genio_Wt_Core->getOption('custom_scripts'),
		'capability'     => 'edit_theme_options',
	  	'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_scripts',
	));
	$wp_customize->add_control( new Genio_Wt_Textarea_Control( $wp_customize, 'custom_scripts', array(
		'label'      => __( 'Custom Scripts', 'genio_wt_lang' ),
		'section'    => 'genio_footer',
		'settings'   => 'genio_wt_customize[custom_scripts]',
	)));

	$wp_customize->add_setting( 'genio_wt_customize[copyright]', array(
		'default'        => $Genio_Wt_Core->getOption('copyright'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_copyright',
	));
	$wp_customize->add_control( 'copyright', array(
		'label'      => __( 'Copyright Info', 'genio_wt_lang' ),
		'section'    => 'genio_footer',
		'settings'   => 'genio_wt_customize[copyright]',
	));

	// Socials
	// -------------------------------------
	$wp_customize->add_section( 'genio_social_links', array(
		'title'    => __( 'Social Links', 'genio_wt_lang' ),
		'priority' => 302,
	));

	$wp_customize->add_setting( 'genio_wt_customize[facebook]', array(
		'default'        => $Genio_Wt_Core->getOption('facebook'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'facebook', array(
		'label'      => __( 'Facebook', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[facebook]',
		'priority'   => 1,
	));

	$wp_customize->add_setting( 'genio_wt_customize[twitter]', array(
		'default'        => $Genio_Wt_Core->getOption('twitter'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'twitter', array(
		'label'      => __( 'Twitter', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[twitter]',
		'priority'   => 2,
	));
		
	$wp_customize->add_setting( 'genio_wt_customize[google_plus]', array(
	    	'default'        => $Genio_Wt_Core->getOption('google_plus'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'google_plus', array(
		'label'      => __( 'Google+', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[google_plus]',
		'priority'   => 3,
	));

	$wp_customize->add_setting( 'genio_wt_customize[behance]', array(
	    	'default'        => $Genio_Wt_Core->getOption('behance'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'behance', array(
		'label'      => __( 'Behance', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[behance]',
		'priority'   => 4,
	));

	$wp_customize->add_setting( 'genio_wt_customize[dribbble]', array(
		'default'        => $Genio_Wt_Core->getOption('dribbble'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'dribbble', array(
		'label'      => __( 'Dribbble', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[dribbble]',
		'priority'   => 5,
	));

	$wp_customize->add_setting( 'genio_wt_customize[youtube]', array(
		'default'        => $Genio_Wt_Core->getOption('youtube'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'youtube', array(
		'label'      => __( 'YouTube', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[youtube]',
		'priority'   => 6,
	));

	$wp_customize->add_setting( 'genio_wt_customize[flickr]', array(
		'default'        => $Genio_Wt_Core->getOption('flickr'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'flickr', array(
		'label'      => __( 'Flickr', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[flickr]',
		'priority'   => 7,
	));

	$wp_customize->add_setting( 'genio_wt_customize[instagram]', array(
		'default'        => $Genio_Wt_Core->getOption('instagram'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'instagram', array(
		'label'      => __( 'Instagram', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[instagram]',
		'priority'   => 8,
	));

	$wp_customize->add_setting( 'genio_wt_customize[github]', array(
		'default'        => $Genio_Wt_Core->getOption('github'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'github', array(
		'label'      => __( 'Github', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[github]',
		'priority'   => 9,
	));

	$wp_customize->add_setting( 'genio_wt_customize[linkedin]', array(
		'default'        => $Genio_Wt_Core->getOption('linkedin'),
		'capability'     => 'edit_theme_options',
		'type'           => 'option',
		'sanitize_callback' => 'genio_wt_sanitize_social_link',
	));
	$wp_customize->add_control( 'linkedin', array(
		'label'      => __( 'LinkedIn', 'genio_wt_lang' ),
		'section'    => 'genio_social_links',
		'settings'   => 'genio_wt_customize[linkedin]',
		'priority'   => 10,
	));
}
add_action( 'customize_register', 'genio_wt_customize_register' );


if ( ! function_exists( 'genio_wt_sanitize_header_display' ) ) :
    
    	/**
    	 * Sanitize header display
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_header_display($header_display) {
		if ( !(in_array( $header_display, array( 'site_title', 'site_logo', 'hire_me' ))) ) {
			$header_display = 'site_title';
		}
		return $header_display;
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_social_link' ) ) :
    
    	/**
    	 * Sanitize social url
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_social_link($social_url) {
		return ((filter_var($social_url, FILTER_VALIDATE_URL)) ? filter_var(trim($social_url), FILTER_SANITIZE_URL) : '' );
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_google_fonts' ) ) :

    	/**
    	 * Sanitize google font
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_google_fonts($google_font) {
	  	$fonts = '["","ABeeZee","Abel","Abril+Fatface","Aclonica","Acme","Actor","Adamina","Advent+Pro","Aguafina+Script","Akronim","Aladin","Aldrich","Alef","Alegreya","Alegreya+SC","Alex+Brush","Alfa+Slab+One","Alice","Alike","Alike+Angular","Allan","Allerta","Allerta+Stencil","Allura","Almendra","Almendra+Display","Almendra+SC","Amarante","Amaranth","Amatic+SC","Amethysta","Anaheim","Andada","Andika","Angkor","Annie+Use+Your+Telescope","Anonymous+Pro","Antic","Antic+Didone","Antic+Slab","Anton","Arapey","Arbutus","Arbutus+Slab","Architects+Daughter","Archivo+Black","Archivo+Narrow","Arimo","Arizonia","Armata","Artifika","Arvo","Asap","Asset","Astloch","Asul","Atomic+Age","Aubrey","Audiowide","Autour+One","Average","Average+Sans","Averia+Gruesa+Libre","Averia+Libre","Averia+Sans+Libre","Averia+Serif+Libre","Bad+Script","Balthazar","Bangers","Basic","Battambang","Baumans","Bayon","Belgrano","Belleza","BenchNine","Bentham","Berkshire+Swash","Bevan","Bigelow+Rules","Bigshot+One","Bilbo","Bilbo+Swash+Caps","Bitter","Black+Ops+One","Bokor","Bonbon","Boogaloo","Bowlby+One","Bowlby+One+SC","Brawler","Bree+Serif","Bubblegum+Sans","Bubbler+One","Buda","Buenard","Butcherman","Butterfly+Kids","Cabin","Cabin+Condensed","Cabin+Sketch","Caesar+Dressing","Cagliostro","Calligraffitti","Cambo","Candal","Cantarell","Cantata+One","Cantora+One","Capriola","Cardo","Carme","Carrois+Gothic","Carrois+Gothic+SC","Carter+One","Caudex","Cedarville+Cursive","Ceviche+One","Changa+One","Chango","Chau+Philomene+One","Chela+One","Chelsea+Market","Chenla","Cherry+Cream+Soda","Cherry+Swash","Chewy","Chicle","Chivo","Cinzel","Cinzel+Decorative","Clicker+Script","Coda","Coda+Caption","Codystar","Combo","Comfortaa","Coming+Soon","Concert+One","Condiment","Content","Contrail+One","Convergence","Cookie","Copse","Corben","Courgette","Cousine","Coustard","Covered+By+Your+Grace","Crafty+Girls","Creepster","Crete+Round","Crimson+Text","Croissant+One","Crushed","Cuprum","Cutive","Cutive+Mono","Damion","Dancing+Script","Dangrek","Dawning+of+a+New+Day","Days+One","Delius","Delius+Swash+Caps","Delius+Unicase","Della+Respira","Denk+One","Devonshire","Didact+Gothic","Diplomata","Diplomata+SC","Domine","Donegal+One","Doppio+One","Dorsa","Dosis","Dr+Sugiyama","Droid+Sans","Droid+Sans+Mono","Droid+Serif","Duru+Sans","Dynalight","EB+Garamond","Eagle+Lake","Eater","Economica","Electrolize","Elsie","Elsie+Swash+Caps","Emblema+One","Emilys+Candy","Engagement","Englebert","Enriqueta","Erica+One","Esteban","Euphoria+Script","Ewert","Exo","Expletus+Sans","Fanwood+Text","Fascinate","Fascinate+Inline","Faster+One","Fasthand","Fauna+One","Federant","Federo","Felipa","Fenix","Finger+Paint","Fjalla+One","Fjord+One","Flamenco","Flavors","Fondamento","Fontdiner+Swanky","Forum","Francois+One","Freckle+Face","Fredericka+the+Great","Fredoka+One","Freehand","Fresca","Frijole","Fruktur","Fugaz+One","GFS+Didot","GFS+Neohellenic","Gabriela","Gafata","Galdeano","Galindo","Gentium+Basic","Gentium+Book+Basic","Geo","Geostar","Geostar+Fill","Germania+One","Gilda+Display","Give+You+Glory","Glass+Antiqua","Glegoo","Gloria+Hallelujah","Goblin+One","Gochi+Hand","Gorditas","Goudy+Bookletter+1911","Graduate","Grand+Hotel","Gravitas+One","Great+Vibes","Griffy","Gruppo","Gudea","Habibi","Hammersmith+One","Hanalei","Hanalei+Fill","Handlee","Hanuman","Happy+Monkey","Headland+One","Henny+Penny","Herr+Von+Muellerhoff","Holtwood+One+SC","Homemade+Apple","Homenaje","IM+Fell+DW+Pica","IM+Fell+DW+Pica+SC","IM+Fell+Double+Pica","IM+Fell+Double+Pica+SC","IM+Fell+English","IM+Fell+English+SC","IM+Fell+French+Canon","IM+Fell+French+Canon+SC","IM+Fell+Great+Primer","IM+Fell+Great+Primer+SC","Iceberg","Iceland","Imprima","Inconsolata","Inder","Indie+Flower","Inika","Irish+Grover","Istok+Web","Italiana","Italianno","Jacques+Francois","Jacques+Francois+Shadow","Jim+Nightshade","Jockey+One","Jolly+Lodger","Josefin+Sans","Josefin+Slab","Joti+One","Judson","Julee","Julius+Sans+One","Junge","Jura","Just+Another+Hand","Just+Me+Again+Down+Here","Kameron","Karla","Kaushan+Script","Kavoon","Keania+One","Kelly+Slab","Kenia","Khmer","Kite+One","Knewave","Kotta+One","Koulen","Kranky","Kreon","Kristi","Krona+One","La+Belle+Aurore","Lancelot","Lato","League+Script","Leckerli+One","Ledger","Lekton","Lemon","Libre+Baskerville","Life+Savers","Lilita+One","Lily+Script+One","Limelight","Linden+Hill","Lobster","Lobster+Two","Londrina+Outline","Londrina+Shadow","Londrina+Sketch","Londrina+Solid","Lora","Love+Ya+Like+A+Sister","Loved+by+the+King","Lovers+Quarrel","Luckiest+Guy","Lusitana","Lustria","Macondo","Macondo+Swash+Caps","Magra","Maiden+Orange","Mako","Marcellus","Marcellus+SC","Marck+Script","Margarine","Marko+One","Marmelad","Marvel","Mate","Mate+SC","Maven+Pro","McLaren","Meddon","MedievalSharp","Medula+One","Megrim","Meie+Script","Merienda","Merienda+One","Merriweather","Merriweather+Sans","Metal","Metal+Mania","Metamorphous","Metrophobic","Michroma","Milonga","Miltonian","Miltonian+Tattoo","Miniver","Miss+Fajardose","Modern+Antiqua","Molengo","Molle","Monda","Monofett","Monoton","Monsieur+La+Doulaise","Montaga","Montez","Montserrat","Montserrat+Alternates","Montserrat+Subrayada","Moul","Moulpali","Mountains+of+Christmas","Mouse+Memoirs","Mr+Bedfort","Mr+Dafoe","Mr+De+Haviland","Mrs+Saint+Delafield","Mrs+Sheppards","Muli","Mystery+Quest","Neucha","Neuton","New+Rocker","News+Cycle","Niconne","Nixie+One","Nobile","Nokora","Norican","Nosifer","Nothing+You+Could+Do","Noticia+Text","Noto+Sans","Noto+Serif","Nova+Cut","Nova+Flat","Nova+Mono","Nova+Oval","Nova+Round","Nova+Script","Nova+Slim","Nova+Square","Numans","Nunito","Odor+Mean+Chey","Offside","Old+Standard+TT","Oldenburg","Oleo+Script","Oleo+Script+Swash+Caps","Open+Sans","Open+Sans+Condensed","Oranienbaum","Orbitron","Oregano","Orienta","Original+Surfer","Oswald","Over+the+Rainbow","Overlock","Overlock+SC","Ovo","Oxygen","Oxygen+Mono","PT+Mono","PT+Sans","PT+Sans+Caption","PT+Sans+Narrow","PT+Serif","PT+Serif+Caption","Pacifico","Paprika","Parisienne","Passero+One","Passion+One","Pathway+Gothic+One","Patrick+Hand","Patrick+Hand+SC","Patua+One","Paytone+One","Peralta","Permanent+Marker","Petit+Formal+Script","Petrona","Philosopher","Piedra","Pinyon+Script","Pirata+One","Plaster","Play","Playball","Playfair+Display","Playfair+Display+SC","Podkova","Poiret+One","Poller+One","Poly","Pompiere","Pontano+Sans","Port+Lligat+Sans","Port+Lligat+Slab","Prata","Preahvihear","Press+Start+2P","Princess+Sofia","Prociono","Prosto+One","Puritan","Purple+Purse","Quando","Quantico","Quattrocento","Quattrocento+Sans","Questrial","Quicksand","Quintessential","Qwigley","Racing+Sans+One","Radley","Raleway","Raleway+Dots","Rambla","Rammetto+One","Ranchers","Rancho","Rationale","Redressed","Reenie+Beanie","Revalia","Ribeye","Ribeye+Marrow","Righteous","Risque","Roboto","Roboto+Condensed","Roboto+Slab","Rochester","Rock+Salt","Rokkitt","Romanesco","Ropa+Sans","Rosario","Rosarivo","Rouge+Script","Ruda","Rufina","Ruge+Boogie","Ruluko","Rum+Raisin","Ruslan+Display","Russo+One","Ruthie","Rye","Sacramento","Sail","Salsa","Sanchez","Sancreek","Sansita+One","Sarina","Satisfy","Scada","Schoolbell","Seaweed+Script","Sevillana","Seymour+One","Shadows+Into+Light","Shadows+Into+Light+Two","Shanti","Share","Share+Tech","Share+Tech+Mono","Shojumaru","Short+Stack","Siemreap","Sigmar+One","Signika","Signika+Negative","Simonetta","Sintony","Sirin+Stencil","Six+Caps","Skranji","Slackey","Smokum","Smythe","Sniglet","Snippet","Snowburst+One","Sofadi+One","Sofia","Sonsie+One","Sorts+Mill+Goudy","Source+Code+Pro","Source+Sans+Pro","Special+Elite","Spicy+Rice","Spinnaker","Spirax","Squada+One","Stalemate","Stalinist+One","Stardos+Stencil","Stint+Ultra+Condensed","Stint+Ultra+Expanded","Stoke","Strait","Sue+Ellen+Francisco","Sunshiney","Supermercado+One","Suwannaphum","Swanky+and+Moo+Moo","Syncopate","Tangerine","Taprom","Tauri","Telex","Tenor+Sans","Text+Me+One","The+Girl+Next+Door","Tienne","Tinos","Titan+One","Titillium+Web","Trade+Winds","Trocchi","Trochut","Trykker","Tulpen+One","Ubuntu","Ubuntu+Condensed","Ubuntu+Mono","Ultra","Uncial+Antiqua","Underdog","Unica+One","UnifrakturCook","UnifrakturMaguntia","Unkempt","Unlock","Unna","VT323","Vampiro+One","Varela","Varela+Round","Vast+Shadow","Vibur","Vidaloka","Viga","Voces","Volkhov","Vollkorn","Voltaire","Waiting+for+the+Sunrise","Wallpoet","Walter+Turncoat","Warnes","Wellfleet","Wendy+One","Wire+One","Yanone+Kaffeesatz","Yellowtail","Yeseva+One","Yesteryear","Zeyada"]';
		$fonts = json_decode($fonts);
	  	return (in_array($google_font, $fonts)) ? $google_font : "";
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_site_skin' ) ) :

    	/**
    	 * Sanitize skin
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_site_skin($skin) {
		return ((in_array($skin, array('yellow', 'green', 'purple', 'mint', 'blue', 'orange'))) ? $skin : 'yellow' );
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_img_url' ) ) :
    
    	/**
    	 * Sanitize img url
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_img_url($img_url) {
		return ((filter_var($img_url, FILTER_VALIDATE_URL)) ? filter_var(trim($img_url), FILTER_SANITIZE_URL) : '' );
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_copyright' ) ) :
    
    	/**
    	 * Sanitize copyright info
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_copyright($copyright) {
		return filter_var(trim($copyright), FILTER_SANITIZE_STRING);
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_styles' ) ) :

    	/**
    	 * Sanitize copyright info
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_styles($styles) {
		return $styles;
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_scripts' ) ) :
    
    	/**
    	 * Sanitize copyright info
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_scripts($scripts) {
		return $scripts;
    	}
endif;


if ( ! function_exists( 'genio_wt_sanitize_template' ) ) :

    	/**
    	 * Sanitize template
    	 *
    	 * @since 1.0
    	 * @return string
    	 */
    	function genio_wt_sanitize_template($template) {
	  	global $Genio_Wt_Core;
	  	return (array_key_exists($template, $Genio_Wt_Core->getOption('templates'))) ? $template : 'default'; 
    	}
endif;


if ( ! function_exists( 'genio_wt_get_templates' ) ) :

    	/**
     	 * Get templates
     	 *
     	 * @since 1.0
     	 * @return array
     	 */
    	function genio_wt_get_templates() {
	  	global $Genio_Wt_Core;
	  	return $Genio_Wt_Core->getOption('templates'); 
    	}
endif;


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function genio_wt_customize_preview_js() {
	wp_enqueue_script( 'genio_wt_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'genio_wt_customize_preview_js' );