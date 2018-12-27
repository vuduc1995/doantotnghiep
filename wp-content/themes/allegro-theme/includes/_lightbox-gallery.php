<?php require_once( '../../../../wp-load.php' );?>

<a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span><?php esc_html_e("Close Window",'allegro-theme');?></a>
<div class="main-block">
	
	<!-- BEGIN .panel-content -->
	<div class="panel-content">
		
		<div class="photo-gallery-full ot-slide-item">
			<span class="next-image" data-next="0"></span>
			<span class="gal-current-image gallery-full-photo">
				<div class="the-image loading waiter">
					<a href="javascript:void(0);" class="prev photo-controls left icon-text">&#59233;</a>
					<a href="javascript:void(0);" class="next photo-controls right icon-text">&#59234;</a>
					<img class="image-big-gallery ot-gallery-image" data-id="0" style="display:none;" src="#" alt="" />
				</div>
			</span>

			<div class="photo-gallery-thumbs" id="makeMeScrollable">
				<div class="inner-thumb the-thumbs" id="ot-lightbox-thumbs">
				</div>
			</div>


			<div class="lightbox-content">
				<h2 class="ot-light-title"></h2>
				<p id="ot-lightbox-content"></p>
			</div>
		</div>
		<div class="clear-float"></div>
	</div>
	
</div>
<script>
	jQuery('.photo-gallery-thumbs').dragscroll({
		scrollBars : true,
		autoFadeBars : true,
		smoothness : 15,
		mouseWheelVelocity : 2
	}); 
</script>