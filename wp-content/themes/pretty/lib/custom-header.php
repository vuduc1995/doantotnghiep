<?php
define( 'HEADER_TEXTCOLOR', '' );
define( 'HEADER_IMAGE_WIDTH', 960 );
define( 'HEADER_IMAGE_HEIGHT', genesis_get_option( 'header_height' ) );

/** Gets included in the site header **/
function header_style() {
    if ( get_header_image() ) {?>
		<style type="text/css">
			.custom-header #header {
				background: url(<?php header_image(); ?>) scroll no-repeat 0 0;
				height: <?php echo genesis_get_option( 'header_height' ) ?>px;
			}
			.custom-header .header-image #title-area,
			.custom-header .header-image #title-area #title,
			.custom-header .header-image #title-area #title a {
				height: <?php echo genesis_get_option( 'header_height' ) ?>px;
			}
		<?php if ( get_theme_mod( 'header_textcolor' ) && get_theme_mod( 'header_textcolor' ) != 'blank' ) { ?>
			.custom-header #title-area #title a,
			.custom-header #title-area #title a:hover {
				color: #<?php header_textcolor(); ?>
			}
			.custom-header #title-area #description {
				color: #<?php header_textcolor(); ?>
			}
		<?php
		}
		echo '</style>';
	}
}

/** Add custom body class when custom header is being used **/
add_filter('body_class', 'pretty_custom_header_class');
function pretty_custom_header_class($classes){
 
global $post;
 
if ( get_header_image() ) {
    $classes[] = 'custom-header';
    }
 
    return $classes;
}
/** Gets included in the admin header **/
add_custom_image_header( 'header_style', 'pretty_admin_header_style' );
function pretty_admin_header_style() { ?>
	<style type="text/css">
		#headimg {
			background-repeat:no-repeat;
			height: <?php echo genesis_get_option( 'header_height' ) ?>px;
			width: 960px;
		}
	</style>
	<?php
}

/** Add new box to the Genesis -> Theme Settings page **/
add_action( 'admin_menu', 'pretty_add_settings_boxes', 11 );
function pretty_add_settings_boxes() {
	global $_genesis_theme_settings_pagehook;

	add_meta_box( 'genesis-theme-settings-header', __( 'Header Image Settings', 'pretty' ), 'pretty_theme_settings_header_box', $_genesis_theme_settings_pagehook, 'column2' );
}

/** Used by pretty_add_settings_boxes() **/
function pretty_theme_settings_header_box() { ?>
	<p><label><?php _e( 'Header Image Height', 'pretty' ); ?>: <input style="margin:0 5px 0;text-align:center;" type="text" name="<?php echo GENESIS_SETTINGS_FIELD; ?>[header_height]" value="<?php genesis_option( 'header_height' ); ?>" size="2" />px</label></p>
<?php
}

/** Add new default values for the Custom Header **/
add_filter( 'genesis_theme_settings_defaults', 'pretty_header_defaults' );
function pretty_header_defaults( $defaults ) {

	$defaults['header_height'] = 240;
	$defaults['header_custom'] = 0;

	return $defaults;
}