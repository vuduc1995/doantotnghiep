<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//single page titile
	$titleShow = get_post_meta ( OT_page_id(), THEME_NAME."_title_show", true ); 
	if(is_category()) {
		//custom colors
		$catId = get_cat_id( single_cat_title("",false) );
		$titleColor = ot_title_color($catId, "category", false);
	} else {
		//custom colors
		$titleColor = ot_title_color(OT_page_id(),"page", false);
	}


?>					

<?php if($titleShow!="no") { ?> 
	<div class="block-title" style="background:<?php echo $titleColor;?>">
		<a href="<?php echo home_url();?>" class="right"><?php esc_html_e("Back to homepage",'allegro-theme');?></a>
		<h2><?php echo ot_page_title(); ?></h2>
	</div>
<?php } ?>