<?php
	/* -------------------------------------------------------------------------*
	 * 						SET DEFAULT VALUES BY THEME INSTALL					*
	 * -------------------------------------------------------------------------*/
	global $pagenow;
	get_template_part(THEME_INCLUDES."/lib/class-tgm-plugin-activation");

	// with activate istall option
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' && !get_option('allegro_search') ) {
		$theme_logo = get_template_directory_uri()."/images/logo-header.png";
		$theme_logo_f = get_template_directory_uri()."/images/logo-footer.png";
		$favicon = get_template_directory_uri()."/images/favicon.ico";
		$banner = '	<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'no-banner-728x90.jpg" alt="" title="" /></a>';
		$banner1 = '<a href="http://www.orange-themes.com" target="_blank"><img src="'.get_template_directory_uri().'/images/no-banner-468x60.jpg" alt="" title=""/></a>';
		$copyright = '&copy; '.date("Y").' Copyright <b>'.THEME_FULL_NAME.' theme</b>. All Rights reserved.';
		
		update_option(THEME_NAME."_logo", $theme_logo);
		update_option(THEME_NAME."_favicon", $favicon);
		update_option(THEME_NAME."_logo_footer", $theme_logo_f);
		update_option(THEME_NAME."_rss_url", get_bloginfo("rss_url"));
		update_option(THEME_NAME.'_copyright', $copyright);
		update_option(THEME_NAME.'_show_first_thumb', "on");
		update_option(THEME_NAME.'_default_cat_color', '5a9e25');
		update_option(THEME_NAME.'_search', 'on');
		update_option(THEME_NAME.'_weather_location_type', 'customer');
		update_option(THEME_NAME.'_header_text', 'Pro solet percipit no, id euismod tractatos qui. Ius id oratio viderer eleifend, homero pertinacia eam everti cu');
		update_option(THEME_NAME.'_menu_effect', 'on');
		update_option(THEME_NAME.'_top_banner', 'on');
		update_option(THEME_NAME.'_banner_adv', 'on');
		update_option(THEME_NAME.'_top_banner_code', $banner);
		update_option(THEME_NAME.'_updated_tag', 'on');
		update_option(THEME_NAME.'_sidebar_position', "custom");
		update_option(THEME_NAME.'_similar_posts', "custom");
		update_option(THEME_NAME.'_page_layout', 'wide');
		update_option(THEME_NAME.'_show_single_thumb', "on");
		update_option(THEME_NAME.'_color_1', '5a9e25');
		update_option(THEME_NAME.'_share_all', "custom");
		update_option(THEME_NAME.'_bg_texture', 'texture-1');
		update_option(THEME_NAME.'_responsive', 'on');
		update_option(THEME_NAME.'_similar_posts_gallery', "custom");
		update_option(THEME_NAME.'_post_date', "on");
		update_option(THEME_NAME.'_post_comments', "on");
		update_option(THEME_NAME.'_post_author', "on");
		
		update_option(THEME_NAME.'_google_font_1', 'Titillium Web');
		update_option(THEME_NAME.'_google_font_2', 'Titillium Web');
		update_option(THEME_NAME.'_google_font_3', 'Source Sans Pro');
		
}

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),		

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Allegro Extended', // The plugin name
			'slug'     				=> 'allegro-extended', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/allegro-extended.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),		



	);


	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> THEME_NAME,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__('Install Required Plugins','allegro-theme'),
			'menu_title'                       			=> esc_html__('Install Plugins','allegro-theme'),
			'installing'                       			=> esc_html__('Installing Plugin: %s','allegro-theme'), // %1$s = plugin name
			'oops'                             			=> esc_html__('Something went wrong with the plugin API.','allegro-theme'),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','allegro-theme' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','allegro-theme' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','allegro-theme' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','allegro-theme' ),
			'return'                           			=> esc_html__('Return to Required Plugins Installer','allegro-theme'),
			'plugin_activated'                 			=> esc_html__('Plugin activated successfully.','allegro-theme'),
			'complete' 									=> esc_html__('All plugins installed and activated successfully. %s','allegro-theme'), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

	


?>