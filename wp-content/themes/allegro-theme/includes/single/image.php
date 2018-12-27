<?php 
	$width = 890;
	$height = 395;
	$image = get_post_thumb($post->ID,$width,$height); 

	//post details
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );
	if((get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" && $image['show']==true) || (!$singleImage && $image['show']==true)) { 

?>
	<p>
		<span class="hover-effect">
			<?php echo ot_image_html($post->ID,$width,$height); ?>
		</span>
	</p>
<?php } ?>