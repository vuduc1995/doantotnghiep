<?php

if ( is_home() ) {
	echo '<div id="page-title"><div class="wrap"><p>' . esc_html( get_bloginfo( 'description' ) ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}
elseif ( is_404() ) {
	echo '<div id="page-title"><div class="wrap"><p>' . __( 'Ooops!', 'minimum' ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}
elseif ( is_post_type_archive( 'portfolio' ) || is_singular( 'portfolio') ) {
	echo '<div id="page-title"><div class="wrap"><p>' . __( 'From the Portfolio', 'minimum' ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}
elseif ( is_singular( 'page' ) ) {
	echo '<div id="page-title"><div class="wrap"><p>' . esc_html( get_bloginfo( 'description' ) ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}
elseif ( is_author() || is_category() || is_date() || is_search() || is_singular() || is_tag() ) {
	echo '<div id="page-title"><div class="wrap"><p>' . __( 'From the Blog', 'minimum' ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}
else {
	echo '<div id="page-title"><div class="wrap"><p>' . esc_html( get_bloginfo( 'description' ) ) . '<a class="page-title-button" href="#">' . __( 'Subscribe Now', 'minimum' ) . '</a></p></div></div>';
}