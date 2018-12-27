<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'streamline', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'streamline' ) );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Streamline Pro Theme', 'streamline' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/streamline/' );
define( 'CHILD_THEME_VERSION', '3.0.1' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Enqueue PT Sans Google font
add_action( 'wp_enqueue_scripts', 'streamline_google_fonts' );
function streamline_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=PT+Sans:400,700', array(), CHILD_THEME_VERSION );
	
}

//* Enqueue Responsive Menu Script
add_action( 'wp_enqueue_scripts', 'streamline_enqueue_responsive_script' );
function streamline_enqueue_responsive_script() {

	wp_enqueue_script( 'streamline-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );

}

//* Add support for additional color style options
add_theme_support( 'genesis-style-selector', array( 
	'streamline-pro-blue'  => __( 'Streamline Pro Blue', 'streamline' ), 
	'streamline-pro-green' => __( 'Streamline Pro Green', 'streamline' ),
) );

//* Add new image sizes
add_image_size( 'post-image', 760, 360, TRUE );
add_image_size( 'widget-image', 295, 100, TRUE );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'header_image'    => '',
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'height'          => 60,
	'width'           => 300,
) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Reposition the breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );

//* Customize breadcrumbs display
add_filter( 'genesis_breadcrumb_args', 'streamline_breadcrumb_args' );
function streamline_breadcrumb_args( $args ) {
	$args['home'] = __( 'Home', 'streamline' );
	$args['sep'] = ' ';
	$args['list_sep'] = ', '; // Genesis 1.5 and later
	$args['prefix'] = '<div class="breadcrumb">';
	$args['suffix'] = '</div>';
	$args['labels']['prefix'] = '<span class="icon-home"></span>';
	return $args;
}

//* Remove default post image
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

//* Add post image above post title
add_action( 'genesis_entry_header', 'streamline_post_image', 1 );
function streamline_post_image() {

	if ( is_page() || ! genesis_get_option( 'content_archive_thumbnail' ) )
		return;
	
	if ( $image = genesis_get_image( array( 'format' => 'url', 'size' => genesis_get_option( 'image_size' ) ) ) ) {
		printf( '<a href="%s" rel="bookmark"><img class="post-photo" src="%s" alt="%s" /></a>', get_permalink(), $image, the_title_attribute( 'echo=0' ) );
	}
	
}

//* Reposition the post info function
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 2 );

//* Customize the post info function
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter( $post_info ) {

	if ( !is_page() ) {
    	$post_info = '[post_author_posts_link] [post_date] [post_comments] [post_edit]';
    	return $post_info;
	}
	
}

//* Add the after entry section
add_action( 'genesis_entry_footer', 'streamline_after_entry', 10 );
function streamline_after_entry() {
	
	if ( ! is_singular( 'post' ) ) return;
	
	genesis_widget_area( 'after-entry', array(
		'before' => '<div class="after-entry widget-area">',
		'after'  => '</div>',
   ) );
   
}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'streamline_author_box_gravatar_size' );
function streamline_author_box_gravatar_size( $size ) {

    return '80';
    
}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'streamline_remove_comment_form_allowed_tags' );
function streamline_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_notes_after'] = '';
	return $defaults;
	
}

// Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-featured-1',
	'name'        => __( 'Home - Featured 1', 'streamline' ),
	'description' => __( 'This is the first featured column on the homepage.', 'streamline' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-2',
	'name'        => __( 'Home - Featured 2', 'streamline' ),
	'description' => __( 'This is the second featured column on the homepage.', 'streamline' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-featured-3',
	'name'        => __( 'Home - Featured 3', 'streamline' ),
	'description' => __( 'This is the third featured column on the homepage.', 'streamline' ),
) );
genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'streamline' ),
	'description' => __( 'This is the after entry section.', 'streamline' ),
) );
