<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	//banner settings
	$banner_type = get_option ( THEME_NAME."_banner_type" );


	//colors
	$color_1 = get_option(THEME_NAME."_color_1");



?>

/* Color Scheme */
.header,
.breaking-news .the-title,
.widget > h3,
.button,
a.small-button,
.marker,
.hover-effect,
.block-title,
#wp-calendar td#today,
.small-button,
#writecomment p input[type=submit] {
	background-color: #<?php echo $color_1;?>;
}
.list-title,
a:hover,
a.mobile-menu,
.widget .meta a {
	color: #<?php echo $color_1;?>;
}
.list-title {
	border-bottom: 2px solid #<?php echo $color_1;?>;
}


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
