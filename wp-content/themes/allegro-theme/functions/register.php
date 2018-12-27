<?php

$homepage = get_option( 'show_on_front');
if( $homepage == "page" ) {
	$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
	if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}
}
	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'top-menu' => esc_html__('Top Menu','allegro-theme'),
				'main-menu' => esc_html__('Main Menu','allegro-theme'),
				'secondary-menu' => esc_html__('Secondary Menu','allegro-theme'),
				'footer-menu' => esc_html__('Footer Menu','allegro-theme'),
			)
		);
	}	
}





function orange_register_sidebar($name, $id){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
	));
}


/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/

$orange_sidebars=array(
	array('name'=>'Default Sidebar', 'id'=>'default'), 
	//array('name'=>'Footer', 'id'=>'default_footer')
);	
	
$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar));
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id']);
	}
	
}

add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( "title-tag" );
?>