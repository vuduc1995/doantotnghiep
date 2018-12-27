<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	if (is_pagetemplate_active("template-contact.php")) {
		$contactPages = ot_get_page("contact");
		if($contactPages[0]) {
			$contactUrl = get_page_link($contactPages[0]);
		}
	} else {
		$contactUrl = "#";
	}
?>
			<!-- BEGIN .content -->
			<div class="content">
				
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="main-content">

						<div class="full-width">
							<div class="big-error-sign">
								<h2><?php esc_html_e("404",'allegro-theme');?></h2>
								<strong><?php esc_html_e("We seem to have lost You in the clouds",'allegro-theme');?></strong>
								<span><?php esc_html_e("The page You're looking for is not here.",'allegro-theme');?><br />
									<?php printf(__('Maybe You should <a href="%1$s">go home</a> or try a search:','allegro-theme'), home_url());?>
								</span>
							</div>
						</div>

						<div class="error-search">
							<form method="get" action="<?php echo home_url(); ?>" name="searchform">
								<input type="text" placeholder="<?php esc_html_e("Search something..",'allegro-theme');?>" value="" class="search-input" name="s" id="s">
								<input type="submit" value="<?php esc_html_e("Search",'allegro-theme');?>" class="search-button">
							</form>
						</div>

						<div class="clear-float"></div>

					</div>
					
				<!-- END .wrapper -->
				</div>
				
			<!-- BEGIN .content -->
			</div>
<?php get_footer(); ?>