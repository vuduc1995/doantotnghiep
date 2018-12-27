<?php

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'goinggreen_grid_loop_helper' );
/** Add support for Genesis Grid Loop */
function goinggreen_grid_loop_helper() {

	if ( function_exists( 'genesis_grid_loop' ) ) {
		genesis_grid_loop( array(
			'features' 				=> 2,
			'feature_image_size' 	=> 'featured',
			'feature_image_class' 	=> 'post-image',
			'feature_content_limit' => 0,
			'grid_image_size'		=> 0,
			'grid_image_class'		=> 'alignnone',
			'grid_content_limit' 	=> 250,
			'more'					=> __( '[Continue reading]', 'goinggreen' ),
			'posts_per_page' 		=> 6
		) );
	} else {
		genesis_standard_loop();
	}

}

genesis();