<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

//Add Localization Support
load_child_theme_textdomain( 'mp', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'mp' ) );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Modern Portfolio Theme', 'mp' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/modern-portfolio/' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'mp_viewport_meta_tag' );
function mp_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// Add new image sizes
add_image_size( 'blog', 320, 120, TRUE );
add_image_size( 'portfolio', 320, 210, TRUE );

// Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

// Remove the site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

// Add support for custom background
add_theme_support( 'custom-background' );

// Add support for custom header
add_theme_support( 'genesis-custom-header', array(
	'width' => 1152,
	'height' => 120
) );

// Modify the size of the Gravatar in author box
add_filter( 'genesis_author_box_gravatar_size', 'mp_author_box_gravatar_size' );
function mp_author_box_gravatar_size( $size ) {
	return 80;
}

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

/** Register widget areas */
genesis_register_sidebar( array(
	'id'				=> 'about',
	'name'			=> __( 'About', 'mp' ),
	'description'	=> __( 'This is the about section.', 'mp' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'portfolio',
	'name'			=> __( 'Portfolio', 'mp' ),
	'description'	=> __( 'This is the portfolio section.', 'mp' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'services',
	'name'			=> __( 'Services', 'mp' ),
	'description'	=> __( 'This is the Services section.', 'mp' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'blog',
	'name'			=> __( 'Blog', 'mp' ),
	'description'	=> __( 'This is the Blog section.', 'mp' ),
) );