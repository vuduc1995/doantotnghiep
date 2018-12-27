<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();

	//small sidebar
	$smallSidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select_small", true ); 
	$position = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_position_small', true );
	
	if(is_category()) {
		$catID = get_cat_id( single_cat_title("",false) );
		$smallSidebar = ot_get_option( $catID, 'sidebar_select_small', false );
		$position = ot_get_option( $catID, 'sidebar_position_small', false );
	}

	
	switch ($position) {
		case 'right':
			$positionContent = " left";
			break;
		case 'left':
			$positionContent = " right";
			break;
		default:
			$positionContent = " left";
			break;
	}
?>

<div class="main-content">
	<?php 
		if(is_single() && $post_type=="post") {
			get_template_part(THEME_SINGLE."post-header");
		}
	?>
	<?php if(!is_page_template("template-contact.php") && !is_page_template("template-gallery.php") && !is_page_template("template-full-width.php") && !is_page_template("template-archive.php") && $post_type!="gallery") { ?>
		<?php ot_get_sidebar(OT_page_ID(), 'left');  ?>	
		<!-- BEGIN .main-page -->
		<div class="main-page <?php OT_content_class(OT_page_ID());?>">

			<?php if(!$smallSidebar || $smallSidebar=="off") { ?>
				<!-- BEGIN .single-block -->
				<div class="single-block">
			<?php } else { ?>
				<!-- BEGIN .single-block -->
				<div class="double-block">
			<?php } ?>
				<!-- BEGIN .content-block -->
				<div class="content-block main<?php echo $positionContent;?>">
	<?php } else { ?>
		<div class="full-width">
	<?php } ?>
			<div class="block">
<?php wp_reset_query();  ?>