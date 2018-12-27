<?php
	$favicon = get_option(THEME_NAME."_favicon");

	$bg_texture = get_option(THEME_NAME."_bg_texture");
	$page_layout = get_option(THEME_NAME."_page_layout");
	if($page_layout!="wide") {
		$bodyClass ='style="background-image: url('.THEME_IMAGE_URL.'background-'.$bg_texture.'.jpg); background-position: top center; background-repeat: repeat;"';	
	} else {
		$bodyClass = false;
	}


?>
<!DOCTYPE html>

<!-- BEGIN html -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<!-- BEGIN head -->
	<head>

		<!-- Meta Tags -->
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- Favicon -->
		<?php 
			if($favicon) {
		?>
			<link rel="shortcut icon" href="<?php echo $favicon;?>" type="image/x-icon" />
		<?php } else { ?>
			<link rel="shortcut icon" href="<?php echo THEME_IMAGE_URL; ?>favicon.ico" type="image/x-icon" />
		<?php } ?>
		
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( esc_html__('%s latest posts','allegro-theme'), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
		<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( esc_html__('%s latest comments','allegro-theme'), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<?php wp_head(); ?>	

		<style>
		<?php			
			$banner_type = get_option ( THEME_NAME."_banner_type" ); //banner settings
			$color_1 = get_option(THEME_NAME."_color_1"); //colors
			
			//fonts
			$google_font_1 = get_option(THEME_NAME."_google_font_1");
			$google_font_2 = get_option(THEME_NAME."_google_font_2");
			$google_font_3 = get_option(THEME_NAME."_google_font_3");
		?>

			/* Color Scheme */
			.header,.breaking-news .the-title,.widget > h3,.button,a.small-button,.marker,.hover-effect,.block-title,#wp-calendar td#today, .small-button, #writecomment p input[type=submit] {
				background-color: #<?php echo $color_1;?>;
			}

			.list-title, a:hover, a.mobile-menu, .widget .meta a { color: #<?php echo $color_1;?>; }
			.list-title { border-bottom: 2px solid #<?php echo $color_1;?>;	}

			<?php
				if ( $banner_type == "image" ) {
				//Image Banner
			?>
					#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
					#popup { display: none; position:absolute; width:auto; height:auto; z-index:1002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
					#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
			<?php
				} else if ( $banner_type == "text" ) {
				//Text Banner
			?>
					#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
					#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:1002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
					#popup center { display: block; padding: 20px 20px 20px 20px; }
					#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
			<?php 
				} else if ( $banner_type == "text_image" ) {
				//Image And Text Banner
			?>
					#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
					#popup { display: none; position:absolute; width:auto; z-index:1002; color: #000; font-size: 11px; font-weight: bold; }
					#popup center { padding: 15px 0 0 0; }
					#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
			<?php } ?>


			/* Menu Font */
			.main-menu .the-menu li a, .secondary-menu ul li a { font-family:"<?php echo $google_font_1;?>", sans-serif; }
			/* Block Titles */
			.list-title { font-family:"<?php echo $google_font_2;?>", sans-serif; }
			/* Article Titles */
			h1, h2, h3,	h4, h5, h6 { font-family: '<?php echo $google_font_3;?>', sans-serif; }
		</style>

	<!-- END head -->
	</head>
	
	<!-- BEGIN body -->
	<body <?php body_class();?> <?php echo $bodyClass; ?>>
		<?php get_template_part(THEME_INCLUDES."banners");?>
			<?php get_template_part(THEME_INCLUDES."top"); ?>