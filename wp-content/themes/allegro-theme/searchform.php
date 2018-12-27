<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

	<form method="get" action="<?php echo home_url(); ?>" name="searchform" >
		<div>
			<label class="screen-reader-text" for="s"><?php esc_html_e("Search for:",'allegro-theme');?></label>
			<input type="text" placeholder="<?php printf ( esc_html__('search here','allegro-theme'));?>" class="search" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="<?php esc_html_e("Search",'allegro-theme');?>" />
		</div>
	<!-- END .searchform -->
	</form>
