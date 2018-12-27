<?php
/*
Template Name: Landing
*/

// Force full-width page layout setting
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove header, navigation, breadcrumbs, footer, footer widgets
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_before_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_after', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_after', 'genesis_do_footer' );
remove_action( 'genesis_after', 'genesis_footer_markup_close', 15 );
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

genesis();