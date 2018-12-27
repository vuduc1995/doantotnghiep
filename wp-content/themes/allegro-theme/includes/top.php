<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$page_layout = get_option(THEME_NAME."_page_layout");

	//logo settings
	$logo = get_option(THEME_NAME.'_logo');	

	//top banner	
	$topBanner = get_option(THEME_NAME."_top_banner");
	$topBannerCode = get_option(THEME_NAME."_top_banner_code");

	//braking slider	
	$breakingSlider = get_post_meta( ot_page_id(), THEME_NAME.'_breaking_slider', true );

	if(is_category()) {
		$breakingSliderCat = ot_get_option( get_cat_id( single_cat_title("",false) ), 'breaking_slider', false );
	}

	//search
	$search = get_option(THEME_NAME."_search");
	
	//header text
	$headerText = get_option(THEME_NAME."_header_text");

	//weather
	$weatherSet = get_option(THEME_NAME."_weather");
	$locationType = get_option(THEME_NAME."_weather_location_type");
	if($locationType == "custom") {
		$weather = OT_weather_forecast(str_replace(' ', '+', get_option(THEME_NAME."_weather_city")));
	} else {
		$weather = OT_weather_forecast($_SERVER['REMOTE_ADDR']);
	}

	//sticky menu
	$stickyMenu = get_option(THEME_NAME."_sticky_menu");


?>
		<!-- BEGIN .boxed -->
		<div class="boxed<?php echo $page_layout=="boxed" ? " active" : false; ?>">
			
			<!-- BEGIN .header -->
			<div class="header">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="header-logo">
						<?php if($logo) { ?>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>" /></a>
						<?php } else { ?>
							<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
						<?php } ?>
					</div>

					<div class="header-menu">
						<?php
							if ( function_exists( 'register_nav_menus' )) {
								$args = array(
									'container' => '',
									'theme_location' => 'top-menu',
									'items_wrap' => '<ul class="load-responsive" rel="'.esc_html__("Top Menu",'allegro-theme').'">%3$s</ul>',
									'depth' => 1,
									"echo" => false,
								);
											
											
								if(has_nav_menu('top-menu')) {
									echo wp_nav_menu($args);		
								}		

							}	

						?>
						<?php if($headerText) { ?>
							<p><?php echo $headerText; ?></p>
						<?php } ?>
					</div>

					<div class="header-addons">
						<?php if($weatherSet=="on" && !isset($weather['error'])) { ?>
							<div class="header-weather">
								<span class="report"><?php echo $weather['temp_'.get_option(THEME_NAME."_temperature")];?></span>
								<img src="<?php echo THEME_IMAGE_URL.$weather['image'];?>.png" alt="<?php echo $weather['weatherDesc'];?>" />
								<span class="city"><small><?php echo $weather['weatherDesc'];?></small><b><?php echo $weather['city'].', '.$weather['country'];?></b></span>
							</div>
						<?php 
							} else if($weatherSet=="on") {
								echo $weather['error'];
							} 
						?>
						<?php if($search=="on") { ?>
						<div class="header-search">
							<form method="get" action="<?php echo home_url(); ?>" name="searchform">
								<input type="text" placeholder="<?php esc_html_e("Search something..",'allegro-theme');?>" value="" class="search-input" name="s" id="s" />
								<input type="submit" value="<?php esc_html_e("Search",'allegro-theme');?>" class="search-button" />
							</form>
						</div>
						<?php } ?>
					</div>
					
				<!-- END .wrapper -->
				</div>

				<div class="main-menu<?php if($stickyMenu=="on") { ?> sticky<?php } ?>">
					
					<!-- BEGIN .wrapper -->
					<div class="wrapper">

						<?php	
			
							wp_reset_query();
							if ( function_exists( 'register_nav_menus' )) {
								$walker = new OT_Walker;
								if(get_option(THEME_NAME."_menu_effect")=="on") {
									$class = " transition-active";
								} else {
									$class = false;
								}
								$args = array(
									'container' => '',
									'theme_location' => 'main-menu',
									'items_wrap' => '<ul class="the-menu'.$class.' %2$s load-responsive" rel="'.esc_html__("Main Menu",'allegro-theme').'">%3$s</ul>',
									'depth' => 3,
									"echo" => false,
									'walker' => $walker
								);
											
											
								if(has_nav_menu('main-menu')) {
									echo wp_nav_menu($args);		
								} else {
									echo "<ul class=\"the-menu load-responsive\" rel=\"".esc_html__("Main Menu",'allegro-theme')."\"><li class=\"navi-none\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
								}		

							}
						?>

					<!-- END .wrapper -->
					</div>

				</div>

				<?php
					if ( function_exists( 'register_nav_menus' )) {
						$args = array(
							'container' => '',
							'theme_location' => 'secondary-menu',
							'items_wrap' => '<ul class="load-responsive" rel="'.esc_html__("Secondary Menu",'allegro-theme').'">%3$s</ul>',
							'depth' => 1,
							"echo" => false,
						);
									
									
						if(has_nav_menu('secondary-menu')) {
				?>
					<div class="secondary-menu">
						
						<!-- BEGIN .wrapper -->
						<div class="wrapper">
							<?php
								echo wp_nav_menu($args);	
							?>
						<!-- END .wrapper -->
						</div>

					</div>
				<?php
						}		

					}	

				?>

			<!-- END .header -->
			</div>
			
			<!-- BEGIN .content -->
			<div class="content">
				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<?php if($topBanner=="on") { ?>
						<div class="ad-banner">
							<?php if (is_pagetemplate_active("template-contact.php") && get_option(THEME_NAME."_banner_adv") == "on" ) { ?>
								<?php $contactID = ot_get_page("contact"); ?>
								<a href="<?php echo get_page_link($contactID[0]);?>" class="ad-link top"><span class="icon-text">&#9662;</span><?php esc_html_e("Advertisement",'allegro-theme');?><span class="icon-text">&#9662;</span></a>
							<?php } ?>
							<?php echo stripslashes(do_shortcode($topBannerCode));?>
						</div>
					<?php } ?>
					<?php if((is_array($breakingSlider) && !empty($breakingSlider) && !in_array("slider_off",$breakingSlider)) || (is_category() && $breakingSliderCat=="on")) { ?>
						<?php
							if(is_category()) {
								$catId = get_cat_id( single_cat_title("",false) );
								$category_in = $catId;

								//custom colors
								$titleColor = ot_title_color($catId, "category", false);
							} else {
								$category_in = $breakingSlider;
							}

							$args=array(
								'category__in' => $category_in,
								'posts_per_page' => 6,
								'order'	=> 'DESC',
								'orderby'	=> 'date',
								'meta_key'	=> THEME_NAME.'_breaking_post',
								'meta_value'	=> 'show',
								'post_type'	=> 'post',
								'ignore_sticky_posts '	=> 1,
								'post_status '	=> 'publish'
							);
							$the_query = new WP_Query($args);

						?>
						<div class="breaking-news">
							<span class="the-title"<?php echo (is_category()) ? ' style="background:'.$titleColor.'"' : null;?>><?php esc_html_e("Breaking News",'allegro-theme');?></span>
							<ul>
								<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
								<?php endwhile; else: ?>
									<li><?php  esc_html_e('No posts were found','allegro-theme');?></li>
								<?php endif; ?>
							</ul>
						</div>
					<?php } ?>
					<?php wp_reset_query();  ?>