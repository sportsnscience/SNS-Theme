<?php
/**
 * University of Utah functions and definitions
 *
 * @package University of Utah
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'umc2014_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function umc2014_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on University of Utah, use a find and replace
	 * to change 'umc2014' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'umc2014', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'umc2014' ),
		'footer' => __( 'Footer Menu', 'umc2014' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'umc2014_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // umc2014_setup
add_action( 'after_setup_theme', 'umc2014_setup' );




/**
 * Register widgetized area and update sidebar with default widgets.
 */
function umc2014_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'umc2014' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Front Page Widgets', 'umc2014' ),
		'id'            => 'front-page',
		'description'	=> 'Add all home page widgets to this location.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

/*
	register_sidebar( array(
		'name'          => __( 'Footer Address', 'umc2014' ),
		'id'            => 'footer-address',
		'description'	=> 'Address and copyright information.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );



	register_sidebar( array(
		'name'          => __( 'Footer Logo', 'umc2014' ),
		'id'            => 'footer-logo',
		'description'	=> 'Add your college logo here.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
*/

	register_sidebar( array(
		'name'          => __( 'Above Post Widgets', 'umc2014' ),
		'id'            => 'sidebar-top',
		'description'	=> 'Add widgets above the post',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Below Post Widgets', 'umc2014' ),
		'id'            => 'sidebar-bottom',
		'description'	=> 'Add widgets below the post',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Above Columns Widgets', 'umc2014' ),
		'id'            => 'sidebar-above-columns',
		'description'	=> 'Add widgets above columns in a two-column layout.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	

}
add_action( 'widgets_init', 'umc2014_widgets_init' );


/**
* Add custom post types.
*/

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'news',
		array(
			'labels' => array(
				'name' => __( 'News' ),
				'singular_name' => __( 'News' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array(
		'title',
		'editor',
		'custom-fields',
		'revisions',
		'thumbnail',
		'author',
		'page-attributes',)
		)
	);
}

function customprefix_init() {
	add_post_type_support( 'news', 'simple-page-sidebars' );
}
add_action( 'init', 'customprefix_init' );

/**
 * Enqueue scripts and styles.
 */
function umc2014_scripts() {
	
	wp_enqueue_style( 'umc2014-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '20140512', 'all' );

	wp_enqueue_style( 'umc2014-style', get_stylesheet_uri() );

	wp_enqueue_style( 'umc2014-flexslider-style', '/wp-content/plugins/utah-banner-widget/flexslider.css', array(), '20140506', 'all' ); 

	wp_enqueue_script( 'umc2014-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'umc2014-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/* wp_enqueue_script( 'umc2014-jquery',  get_template_directory_uri() . '/js/jquery-1.11.min.js', array(), '20140506', true ); */

	wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js', false, '20140512', true);

	wp_enqueue_script( 'umc2014-flexslider',  '/wp-content/plugins/utah-banner-widget/jquery.flexslider.js', array('jquery'), '20140506', true );

	wp_enqueue_script( 'umc2014-global',  get_template_directory_uri() . '/js/global.js', array('jquery'), '20140506', true );

	wp_enqueue_script( 'umc2014-global',  get_template_directory_uri() . '/js/retina.min.js', array('jquery'), '20140602', true );
 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'umc2014_scripts' );

add_action('admin_head', 'admin_form_styles');

function admin_form_styles() {
  echo '<style>
textarea.utah-txt-area{
	height: 100px;
}
  </style>';
}

/**
 * Load CSS for IE 8 and lower
 */
function ie_style_sheets () {
	wp_register_style( 'ie8', get_template_directory_uri() . '/css/ie8.css', array('utah-grid-css'), '20140710', 'all' );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 8' );
	wp_enqueue_style( 'ie8');
}
add_action ('wp_enqueue_scripts','ie_style_sheets');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load theme customization file.
 */
require get_template_directory() . '/inc/theme-options.php';
