<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Going Green Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/themes/goinggreen' );

/** Load textdomain for translation */
load_child_theme_textdomain( 'goinggreen', get_stylesheet_directory() . '/languages' );

/** Add new image sizes */
add_image_size( 'featured', 700, 300, true );

/** Load Google fonts */
add_action( 'wp_enqueue_scripts', 'goinggreen_load_google_fonts' );
function goinggreen_load_google_fonts() {
    wp_enqueue_style( 
    	'google-fonts', 
    	'http://fonts.googleapis.com/css?family=Lato|Merriweather', 
    	array(), 
    	PARENT_THEME_VERSION 
    );
}

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'goinggreen_add_viewport_meta_tag' );
function goinggreen_add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array(
	'width' 	=> 1100,
	'height' 	=> 100
) );

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

/** Reposition the primary navigation */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

add_action( 'genesis_post_content', 'goinggreen_post_image_single', 5 );
/**
 * Add featured image to single posts
 */
function goinggreen_post_image_single() {
	
	if ( ! is_singular( 'post' ) )
		return;
	
	$img = genesis_get_image( array( 'format' => 'html', 'size' => genesis_get_option( 'image_size' ), 'attr' => array( 'class' => 'post-image' ) ) );
	printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
	
}

/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if ( ! is_page() ) {
    $post_info = '[post_date] ' . __( 'by', 'goinggreen' ) . ' [post_author_posts_link] / [post_comments] [post_edit]';
    return $post_info;
}}

/** Customize the post meta function */
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter($post_meta) {
if ( ! is_page() ) {
    $post_meta = '[post_categories before="' . __( 'Filed Under', 'goinggreen' ) . ': "] [post_tags before="&nbsp;/&nbsp;' . __( 'Tagged', 'goinggreen' ) . ': "]';
    return $post_meta;
}}

/** Modify the size of the Gravatar in the author box */
add_filter( 'genesis_author_box_gravatar_size', 'goinggreen_author_box_gravatar_size' );
function goinggreen_author_box_gravatar_size($size) {
    return '86';
}

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );