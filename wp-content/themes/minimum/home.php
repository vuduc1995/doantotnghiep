<?php

remove_action( 'genesis_after_post_content', 'genesis_post_meta' );
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_meta', 'minimum_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function minimum_home_genesis_meta() {

	if ( is_active_sidebar( 'home-featured-1' ) || is_active_sidebar( 'home-featured-2' ) || is_active_sidebar( 'home-featured-' ) || is_active_sidebar( 'home-featured-4' ) ) {

		add_action( 'genesis_after_header', 'minimum_home_featured', 15 );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'body_class', 'minimum_add_body_class' );

		function minimum_add_body_class( $classes ) {
   			$classes[] = 'minimum';
  			return $classes;
		}
		
	}
}

function minimum_home_featured() {

	echo '<div id="home-featured"><div class="wrap">';

		genesis_widget_area( 'home-featured-1', array(
			'before' => '<div class="home-featured-1 widget-area">',
		) );

		genesis_widget_area( 'home-featured-2', array(
			'before' => '<div class="home-featured-2 widget-area">',
		) );

		genesis_widget_area( 'home-featured-3', array(
			'before' => '<div class="home-featured-3 widget-area">',
		) );

		genesis_widget_area( 'home-featured-4', array(
			'before' => '<div class="home-featured-4 widget-area">',
		) );

	echo '</div><!-- end .wrap --></div><!-- end #home-featured -->';

}

add_action( 'genesis_loop', 'minimum_grid_loop_helper' );
function minimum_grid_loop_helper() {

	if ( function_exists( 'genesis_grid_loop' ) ) {
		genesis_grid_loop( array(
			'features' 				=> 0,
			'feature_image_size' 	=> 'featured',
			'feature_image_class' 	=> 'post-image',
			'feature_content_limit' => 0,
			'grid_image_size'		=> 0,
			'grid_image_class'		=> 'alignnone',
			'grid_content_limit' 	=> 250,
			'more'					=> __( '[Read more]', 'minimum' ),
		) );
	} else {
		genesis_standard_loop();
	}

}

genesis();