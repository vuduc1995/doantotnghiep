<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	add_action( 'wp_enqueue_scripts', 'orange_themes_scripts');
	
	function orange_themes_scripts() { 
		global $wp_styles;
		$slider_enable = get_option(THEME_NAME."_slider_enable");
		$responsive = get_option(THEME_NAME."_responsive");
		$banner_type = get_option ( THEME_NAME."_banner_type" );


		//include google fonts
		$google_fonts = array();
		for($i=1; $i<=5; $i++) {
			if(get_option(THEME_NAME."_google_font_".$i)) {
				$google_fonts[] = get_option(THEME_NAME."_google_font_".$i);	
			}
			
		}
		$google_fonts = array_unique($google_fonts);
		$i=1;
		foreach($google_fonts as $google_font) {
			$protocol = is_ssl() ? 'https' : 'http';
			if($google_font && $google_font!="Arial") {
				wp_enqueue_style( 'google-fonts-'.$i, $protocol."://fonts.googleapis.com/css?family=".str_replace(" ", "+", $google_font));
			}
			$i++;
		}
		
		wp_enqueue_style("reset", THEME_CSS_URL."reset.css", Array());
		wp_enqueue_style("main-stylesheet", THEME_CSS_URL."main-stylesheet.css", Array());
		wp_enqueue_style("shortcodes", THEME_CSS_URL."shortcode.css", Array());
		wp_enqueue_style("lightbox", THEME_CSS_URL."lightbox.css", Array());
		wp_enqueue_style("dragscroll", THEME_CSS_URL."jquery.dragscroll.css", Array());
		if($responsive=="on") {
			wp_enqueue_style("responsive", THEME_CSS_URL."responsive.css", Array());
		}
		wp_enqueue_style('ie-only-styles', THEME_CSS_URL.'ie-ancient.css');
		
		$wp_styles->add_data('ie-only-styles', 'conditional', 'lt IE 8');

		//wp_enqueue_style("fonts", THEME_CSS_URL."fonts.php", Array());
		//wp_enqueue_style("dynamic-css", THEME_CSS_URL."dynamic-css.php", Array());
 		wp_enqueue_style("style", get_stylesheet_uri(), Array());

 		// js files
		wp_enqueue_script("jquery");
		wp_enqueue_script("cookies" , THEME_JS_URL."admin/jquery.cookie.js", Array('jquery'), "1.0", true);
		
		if($banner_type) {
			wp_enqueue_script("banner" , THEME_JS_URL."jquery.floating_popup.1.3.min.js", Array('jquery'), "1.0", true);
		}
		//wp_enqueue_script("ot-dynamic-scripts" , THEME_JS_URL."scripts.php", Array('jquery'), "1.0", true);	
		
		

		wp_enqueue_script("lightbox" , THEME_JS_URL."lightbox.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("jquery-ui-custom" , THEME_JS_URL."jquery-ui-1.10.3.custom.min.js", Array('jquery'), "1.0", true);


		
		
		wp_enqueue_script("infinitescroll" , THEME_JS_URL."jquery.infinitescroll.min.js", Array('jquery'), '', true);
		wp_enqueue_script("move" , THEME_JS_URL."jquery.event.move.js", Array('jquery'), '1.3.1', true);
		wp_enqueue_script("isotope" , THEME_JS_URL."jquery.isotope.min.js", Array('jquery'), '', true);
		wp_enqueue_script("swipe" , THEME_JS_URL."jquery.event.swipe.js", Array('jquery'), '', true);
		wp_enqueue_script("kinetic" , THEME_JS_URL."jquery.kinetic.min.js", Array('jquery'), '', true);
		wp_enqueue_script("mousewheel" , THEME_JS_URL."jquery.mousewheel.min.js", Array('jquery'), '', true);
		wp_enqueue_script("smoothdivscroll" , THEME_JS_URL."jquery.smoothdivscroll-1.3-min.js", Array('jquery'), '', true);
		wp_enqueue_script("dragscroll" , THEME_JS_URL."jquery.dragscroll.min.js", Array('jquery'), '', true);
		wp_enqueue_script("scripts-wp" , THEME_JS_URL.THEME_NAME.".js", Array('jquery'), "1.0.0", true);

		wp_enqueue_script("scripts" , THEME_JS_URL."theme-scripts.js", Array('jquery'), "1.5.19", true);
		
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		
		wp_enqueue_script("ot-gallery" , THEME_JS_URL."ot_gallery.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("ot-scripts" , THEME_JS_URL."scripts.js", Array('jquery'), "1.0", true);


		// DatMenu
		wp_enqueue_style("datmenu-css", THEME_CSS_URL."dat-menu.css", Array());
		wp_enqueue_script("datmenu-iscroll" , THEME_JS_URL."iscroll.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("datmenu-modernizr" , THEME_JS_URL."modernizr.custom.50878.js", Array('jquery'), "1.0", true);
		wp_enqueue_script("datmenu-js" , THEME_JS_URL."dat-menu.js", Array('jquery', 'datmenu-iscroll', 'datmenu-modernizr'), "1.0", true);

		// Demo settings
		//wp_enqueue_style("demo-settings" , THEME_CSS_URL."demo-settings.css", Array());
		//wp_enqueue_script("demo-settings" , THEME_JS_URL."demo-settings.js", Array('jquery'), "1.0", true);

		$post_type = get_post_type();
		if($post_type=="gallery") {
			$gallery_id =get_the_ID();
		} else { 
			$gallery_id = false;
		}
		
		wp_localize_script('jquery','ot',
			array(
				'adminUrl' => admin_url("admin-ajax.php"),
				'gallery_id' => $gallery_id,
				'galleryCat' => get_query_var('gallery-cat'),
				'imageUrl' => THEME_IMAGE_URL,
				'cssUrl' => THEME_CSS_URL,
				'themeUrl' => THEME_URL
			)
		);
		
	}
	
?>