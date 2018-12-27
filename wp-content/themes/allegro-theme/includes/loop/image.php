<?php

	$width = 210;
	$height = 140;


	$image = get_post_thumb($post->ID,$width,$height); 
	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true) {
?>
	<div class="article-photo">
		<a href="<?php the_permalink();?>" class="hover-effect">
			<?php echo ot_image_html($post->ID,$width,$height); ?>
		</a>
	</div>

<?php } ?>