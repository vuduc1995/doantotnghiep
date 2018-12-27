<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();

	//small sidebar
	$smallSidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select_small", true ); 
	if(is_category()) {
		$smallSidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select_small', false );
	}
?>


				</div>
			<!-- END .content-block -->
			</div>
			<?php 
				if($smallSidebar && $smallSidebar!="off" ) {
					get_template_part(THEME_INCLUDES."sidebar","small"); 
				}
			?>
			<?php if(!is_page_template("template-contact.php") && !is_page_template("template-gallery.php") && !is_page_template("template-full-width.php") && !is_page_template("template-archive.php") && $post_type!="gallery") { ?>
					<!-- END .single-block -->
					</div>

				<!-- END .main-page -->
				</div>

				<?php ot_get_sidebar(OT_page_ID(), 'right'); ?>	
				
				<div class="clear-float"></div>

			</div>
			<?php } else { ?>
				</div>
			<?php } ?>

				