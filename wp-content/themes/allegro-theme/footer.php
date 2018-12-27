<?php
	$logoFooter = get_option(THEME_NAME."_logo_footer");


	//copyright
	$copyRight = get_option(THEME_NAME."_copyright");

	// pop up banner
	$banner_type = get_option ( THEME_NAME."_banner_type" );
	
	$banner_fly_in = get_option ( THEME_NAME."_banner_fly_in" );
	$banner_fly_out = get_option ( THEME_NAME."_banner_fly_out" );
	$banner_start = get_option ( THEME_NAME."_banner_start" );
	$banner_close = get_option ( THEME_NAME."_banner_close" );
	$banner_overlay = get_option ( THEME_NAME."_banner_overlay" );
	$banner_views = get_option ( THEME_NAME."_banner_views" );
	$banner_timeout = get_option ( THEME_NAME."_banner_timeout" );
	
	$banner_text_image_img = get_option ( THEME_NAME."_banner_text_image_img" ) ;
	$banner_image = get_option ( THEME_NAME."_banner_image" );
	$banner_text = stripslashes ( get_option ( THEME_NAME."_banner_text" ) );
	
	if ( $banner_type == "image" ) {
	//Image Banner
		$cookie_name = substr ( md5 ( $banner_image ), 1,6 );
	} else if ( $banner_type == "text" ) { 
	//Text Banner
		$cookie_name = substr ( md5 ( $banner_text ), 1,6 );
	} else if ( $banner_type == "text_image" ) { 
	//Image And Text Banner
		$cookie_name = substr ( md5 ( $banner_text_image_img ), 1,6 );
	} else {
		$cookie_name = "popup";
	}

	if ( !$banner_start) {
		$banner_start = 0;
	}
	
	if ( !$banner_close) {
		$banner_close = 0;
	}
	
	if ( $banner_overlay == "on") {
		$banner_overlay = "true";
	} else {
		$banner_overlay = "false";
	}

	?>
					<!-- END .wrapper -->
				</div>

				<!-- BEGIN .content -->
			</div>

			<!-- BEGIN .footer -->
			<div class="footer">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<?php
						if ( function_exists( 'register_nav_menus' )) {
							$args = array(
								'container' => '',
								'theme_location' => 'footer-menu',
								'items_wrap' => '<ul class="right load-responsive" rel="'.esc_html__("Footer Menu",'allegro-theme').'">%3$s</ul>',
								'depth' => 1,
								"echo" => false,
							);
										
										
							if(has_nav_menu('footer-menu')) {
								echo wp_nav_menu($args);		
							}		

						}	

					?>

					<?php if($logoFooter) { ?>
						<a href="<?php echo home_url(); ?>" class="logo-footer"><img src="<?php echo $logoFooter;?>" alt="<?php bloginfo('name'); ?>" /></a>
					<?php } ?>

					
					<p><?php echo stripslashes($copyRight);?> <br/><?php esc_html_e("Designed by",'allegro-theme');?> <a href="http://orange-themes.com" target="_blank" class="orange-themes">Orange-Themes.com</a></p>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- END .footer -->
			</div>


			<div class="lightbox">
				<div class="lightcontent-loading">
					<h2 class="light-title"><?php esc_html_e("Loading..",'allegro-theme');?></h2>
					<a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span><?php esc_html_e("Close Window",'allegro-theme');?></a>
					<div class="loading-box">
						<h3><?php esc_html_e("Loading, Please Wait!",'allegro-theme');?></h3>
						<span><?php esc_html_e("This may take a second or two.",'allegro-theme');?></span>
						<span class="loading-image"><img src="<?php echo THEME_IMAGE_URL;?>loading.gif" title="" alt="" /></span>
					</div>
				</div>
				<div class="lightcontent"></div>
			</div>
			
		<!-- END .boxed -->
		</div>

<script type="text/javascript">
			//form validation
			function validateName(fld) {
					
				var error = "";
						
				if (fld.value === '' || fld.value === 'Nickname' || fld.value === 'Enter Your Name..' || fld.value === 'Your Name..') {
					error = "<?php printf ( esc_html__('You didn\'t enter Your First Name.','allegro-theme'));?>\n";
				} else if ((fld.value.length < 2) || (fld.value.length > 50)) {
					error = "<?php printf ( esc_html__('First Name is the wrong length.','allegro-theme'));?>\n";
				}
				return error;
			}
					
			function validateEmail(fld) {

				var error="";
				var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
						
				if (fld.value === "") {
					error = "<?php printf ( esc_html__('You didn\'t enter an email address.','allegro-theme'));?>\n";
				} else if ( fld.value.match(illegalChars) === null) {
					error = "<?php printf ( esc_html__('The email address contains illegal characters.','allegro-theme'));?>\n";
				}

				return error;

			}
					
			function valName(text) {
					
				var error = "";
						
				if (text === '' || text === 'Nickname' || text === 'Enter Your Name..' || text === 'Your Name..') {
					error = "<?php printf ( esc_html__('You didn\'t enter Your First Name.','allegro-theme'));?>\n";
				} else if ((text.length < 2) || (text.length > 50)) {
					error = "<?php printf ( esc_html__('First Name is the wrong length.','allegro-theme'));?>\n";
				}
				return error;
			}
					
			function valEmail(text) {

				var error="";
				var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
						
				if (text === "") {
					error = "<?php printf ( esc_html__('You didn\'t enter an email address.','allegro-theme'));?>\n";
				} else if ( text.match(illegalChars) === null) {
					error = "<?php printf ( esc_html__('The email address contains illegal characters.','allegro-theme'));?>\n";
				}

				return error;

			}
					
			function validateMessage(fld) {

				var error = "";
						
				if (fld.value === '') {
					error = "<?php printf ( esc_html__('You didn\'t enter Your message.','allegro-theme'));?>\n";
				} else if (fld.value.length < 3) {
					error = "<?php printf ( esc_html__('The message is to short.','allegro-theme'));?>\n";
				}

				return error;
			}
		</script>
		
<?php
			//pop up banner
			if ( $banner_type != "off" ) {
		?>
		
		<script type="text/javascript">
		<!--
		
		jQuery(document).ready(function($){
			$('#popup_content').popup( {
				starttime 			 : <?php echo $banner_start; ?>,
				selfclose			 : <?php echo $banner_close; ?>,
				popup_div			 : 'popup',
				overlay_div	 		 : 'overlay',
				close_id			 : 'baner_close',
				overlay				 : <?php echo $banner_overlay; ?>,
				opacity_level		 : 0.7,
				overlay_cc			 : false,
				centered			 : true,
				top	 		   		 : 130,
				left	 			 : 130,
				setcookie 			 : true,
				cookie_name	 		 : '<?php echo $cookie_name;?>',
				cookie_timeout 	 	 : <?php echo $banner_timeout; ?>,
				cookie_views 		 : <?php echo $banner_views ; ?>,
				floating	 		 : true,
				floating_reaction	 : 700,
				floating_speed 		 : 12,
				<?php 
					if ( $banner_fly_in != "off") { 
						echo "fly_in : true,
						fly_from : '".$banner_fly_in."', "; 
					} else {
						echo "fly_in : false,";
					}
				?>
				<?php 
					if ( $banner_fly_out != "off") { 
						echo "fly_out : true,
						fly_to : '".$banner_fly_out."', "; 
					} else {
						echo "fly_out : false,";
					}
				?>
				popup_appear  		 : 'show',
				popup_appear_time 	 : 0,
				confirm_close	 	 : false,
				confirm_close_text 	 : 'Do you really want to close?'
			} );
		});
		-->
		</script>
		<?php } ?>

	<?php wp_footer(); ?>
	<!-- END body -->
	</body>
<!-- END html -->
</html>