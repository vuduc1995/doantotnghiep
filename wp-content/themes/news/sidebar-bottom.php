<?php if ( is_active_sidebar('sidebar-bottom-left') || is_active_sidebar('sidebar-bottom-right') ) : ?>
<div id="sidebar-bottom">
	<div id="sidebar-bottom-left">
		<?php dynamic_sidebar('Sidebar Bottom Left'); ?>
	</div><!-- end #sidebar-bottom-left -->
	<div id="sidebar-bottom-right">
		<?php dynamic_sidebar('Sidebar Bottom Right'); ?>
	</div><!-- end #sidebar-bottom-right -->
</div><!-- end #sidebar-bottom -->
<?php endif; ?>