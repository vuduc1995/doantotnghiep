<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Set Localization (do not remove) */
load_child_theme_textdomain( 'minimum', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'minimum' ) );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', __( 'Minimum Theme', 'minimum' ) );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/themes/minimum' );

/** Load Google fonts */
add_action( 'wp_enqueue_scripts', 'minimum_load_google_fonts' );
function minimum_load_google_fonts() {
    wp_enqueue_style( 
    	'google-fonts', 
    	'http://fonts.googleapis.com/css?family=Open+Sans', 
    	array(), 
    	PARENT_THEME_VERSION 
    );
}

/** Sets Content Width */
$content_width = apply_filters( 'content_width', 740, 740, 1140 );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'minimum_add_viewport_meta_tag' );
function minimum_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add new image sizes */
add_image_size( 'header', 1600, 9999, TRUE );
add_image_size( 'portfolio', 330, 230, TRUE );

/** Add support for custom background */
add_theme_support( 'custom-background' );

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array(
	'width' => 1140,
	'height' => 100
) );

/** Remove Site Tag Line **/
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

/** Unregister layout settings */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

/** Unregister secondary sidebar */
unregister_sidebar( 'sidebar-alt' );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'inner',
	'footer-widgets',
	'footer'
) );

/** Add the featured image section */
add_action( 'genesis_after_header', 'minimum_featured_image' );
function minimum_featured_image() {
	if ( is_home() ) {
		echo '<div id="featured-image"><img src="'. get_stylesheet_directory_uri() . '/images/sample.jpg" /></div>';
	}
	elseif ( is_singular( array( 'post', 'page' ) ) && has_post_thumbnail() ){
		echo '<div id="featured-image">';
		echo get_the_post_thumbnail($thumbnail->ID, 'header');
		echo '</div>';
	}
}

/** Add the page title section */
add_action( 'genesis_after_header', 'minimum_page_title' );
function minimum_page_title() {
	require_once( get_stylesheet_directory() . '/page-title.php' );
}

/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter( $post_info ) {
if ( !is_page() ) {
    $post_info = __( 'Posted on', 'minimum' ) . ' [post_date] // [post_comments] [post_edit]';
    return $post_info;
}}

/** Customize the post meta function */
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter( $post_meta ) {
if ( !is_page() ) {
    $post_meta = '[post_categories before="' . __( 'Filed Under: ', 'minimum' ) . '"] // [post_tags before="' . __( 'Tagged: ', 'minimum' ) . '"]';
    return $post_meta;
}}

/** Modify the size of the Gravatar in the author box */
add_filter( 'genesis_author_box_gravatar_size', 'minimum_author_box_gravatar_size' );
function minimum_author_box_gravatar_size( $size ) {
    return '96';
}

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Add custom footer if widget area is used */
add_action( 'genesis_footer', 'minimum_custom_footer', 6 );
function minimum_custom_footer() {

	if ( is_active_sidebar( 'custom-footer' ) ) {

		remove_action( 'genesis_footer', 'genesis_do_footer' );
		echo '<div class="custom-footer">';	
		dynamic_sidebar( 'custom-footer' );
		echo '</div><!-- end .custom-footer -->';

	}
}

/** Create portfolio custom post type */
add_action( 'init', 'minimum_portfolio_post_type' );
function minimum_portfolio_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio', 'minimum' ),
				'singular_name' => __( 'Portfolio', 'minimum' ),
			),
			'exclude_from_search' => true,
			'has_archive' => true,
			'hierarchical' => true,
			'menu_icon' => get_stylesheet_directory_uri() . '/images/icons/portfolio.png',
			'public' => true,
			'rewrite' => array( 'slug' => 'portfolio' ),
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes', 'genesis-seo' ),
		)
	);
}

/** Change the number of portfolio items to be displayed (props Bill Erickson) */
add_action( 'pre_get_posts', 'minimum_portfolio_items' );
function minimum_portfolio_items( $query ) {

	if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'portfolio' ) ) {
		$query->set( 'posts_per_page', '12' );
	}

}

/** Register widget areas */
genesis_register_sidebar( array(
	'id'				=> 'home-featured-1',
	'name'			=> __( 'Home Featured #1', 'minimum' ),
	'description'	=> __( 'This is the home featured #1 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'home-featured-2',
	'name'			=> __( 'Home Featured #2', 'minimum' ),
	'description'	=> __( 'This is the home featured #2 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'home-featured-3',
	'name'			=> __( 'Home Featured #3', 'minimum' ),
	'description'	=> __( 'This is the home featured #3 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'home-featured-4',
	'name'			=> __( 'Home Featured #4', 'minimum' ),
	'description'	=> __( 'This is the home featured #4 section.', 'minimum' ),
) );
genesis_register_sidebar( array(
	'id'				=> 'custom-footer',
	'name'			=> __( 'Custom Footer', 'minimum' ),
	'description'	=> __( 'This is the custom footer section.', 'minimum' ),
) );