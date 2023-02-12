<?php
/**
 * vinosgoza functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vinosgoza
 */




/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vinoszona_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on vinosgoza, use a find and replace
		* to change 'vinoszona' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vinoszona', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'vinoszona' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'vinoszona_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'vinoszona_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vinoszona_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vinoszona_content_width', 640 );
}
add_action( 'after_setup_theme', 'vinoszona_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vinoszona_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vinoszona' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vinoszona' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'vinoszona' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Añadir widgets aquí.', 'vinoszona' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vinoszona_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vinoszona_scripts() {
	wp_enqueue_style( 'bootstrap_css',  get_stylesheet_directory_uri() . '/bootstrap.css' );
	wp_enqueue_style( 'vinoszona-style', get_stylesheet_uri(), array() );
	// wp_style_add_data( 'vinoszona-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vinoszona-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vinoszona_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_filter( 'template_include', 'include_navwalker', 1 );

function include_navwalker( $template ) {
    require_once get_template_directory() . '/assets/recurses/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
    return $template;
}

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

  function register_my_menu() {
    register_nav_menu('menu-1',__( 'menu-1' ));
  }
  add_action( 'init', 'register_my_menu' );

  // Añadir una clase CSS a los elementos li
  function add_classes_to_wp_nav_menu($classes) {
    $classes[] = 'nav-item';
    return $classes;
  }
  add_filter('nav_menu_css_class', 'add_classes_to_wp_nav_menu');


// Registra los archivos CSS de Bootstrap
// function bootstrap_css() {
// //     wp_register_style('bootstrap', '/bootstrap.css');
// wp_enqueue_style( 'bootstrap_css',  get_stylesheet_directory_uri() . '/bootstrap.css' );
// }

// add_action('wp_enqueue_scripts', 'bootstrap_css');

// Enlaza los archivos CSS de Bootstrap
// function enqueue_bootstrap() {
//     wp_enqueue_style('bootstrap');
// }

// Registra los archivos JS de Bootstrap
function register_scripts() {
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', array('jquery'), '2.11.6', true, 10);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js', array('jquery', 'popper'), '5.3.0', true, 10);
}

// Enlaza los archivos JS de Bootstrap
function enqueue_scripts() {
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap');
}


add_action('wp_enqueue_scripts', 'register_scripts');
add_action('wp_enqueue_scripts', 'enqueue_scripts');