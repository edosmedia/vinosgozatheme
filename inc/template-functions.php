<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package vinosgoza
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vinoszona_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'vinoszona_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function vinoszona_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'vinoszona_pingback_header' );

// Registra los archivos CSS de Bootstrap
function register_bootstrap() {
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/lux/bootstrap.min.css', array(), '5.3.0', 'all');
}

// Enlaza los archivos CSS de Bootstrap
function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap');
}

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

add_action('wp_enqueue_scripts', 'register_bootstrap');
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');
add_action('wp_enqueue_scripts', 'register_scripts');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

add_filter( 'template_include', 'include_navwalker', 1 );

function include_navwalker( $template ) {
    require_once get_template_directory() . '/assets/recurses/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
    return $template;
}