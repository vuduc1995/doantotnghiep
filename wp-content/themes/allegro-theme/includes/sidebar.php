<?php
	wp_reset_query();

	$sidebar = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_select', true );

	if(is_category()) {
		$sidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select', false );
	}


	if ( $sidebar=='' ) {
		$sidebar='default';
	}	

?>

					<!-- BEGIN .sidebar-content -->
					<div class="main-sidebar <?php OT_sidebarClass(OT_page_ID());?>">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
						<?php endif; ?>
					</div>
<?php wp_reset_query();  ?>