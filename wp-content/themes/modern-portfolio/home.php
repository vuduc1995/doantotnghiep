<?php
/**
 * Controls the homepage output.
 */

add_action( 'wp_enqueue_scripts', 'mp_enqueue_scripts' );
/**
 * Enqueue Scripts
 */
function mp_enqueue_scripts() {

	if ( is_active_sidebar( 'about' ) || is_active_sidebar( 'portfolio' ) || is_active_sidebar( 'blog' ) ) {
		wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );
		wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
		wp_enqueue_script( 'scroll', get_stylesheet_directory_uri() . '/js/scroll.js', array( 'localScroll' ), '', true );
	}
}

add_action( 'genesis_meta', 'mp_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function mp_home_genesis_meta() {

	if ( is_active_sidebar( 'about' ) || is_active_sidebar( 'portfolio' ) || is_active_sidebar( 'services' ) || is_active_sidebar( 'blog' ) ) {

		// Force content-sidebar layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

		// Add mp-home body class
		add_filter( 'body_class', 'mp_body_class' );
		function mp_body_class( $classes ) {
			$classes[] = 'mp-home';
			return $classes;
		}

		// Remove the navigation menus
		remove_action( 'genesis_after_header', 'genesis_do_nav' );
		remove_action( 'genesis_after_header', 'genesis_do_subnav' );

		// Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		// Add homepage widgets
		add_action( 'genesis_loop', 'mp_homepage_widgets' );

	}

}

function mp_homepage_widgets() {

	genesis_widget_area( 'about', array(
		'before' => '<div id="about"><div class="wrap">',
		'after' => '</div></div>',
	) );

	genesis_widget_area( 'portfolio', array(
		'before' => '<div id="portfolio"><div class="wrap">',
		'after' => '</div></div>',
	) );

	genesis_widget_area( 'services', array(
		'before' => '<div id="services"><div class="wrap">',
		'after' => '</div></div>',
	) );

	genesis_widget_area( 'blog', array(
		'before' => '<div id="blog"><div class="wrap">',
		'after' => '</div></div>',
	) );

}

genesis();