<?php
	// author id
	$user_ID = get_the_author_meta('ID');
?>
<div class="full-width">
	
	<div class="article-title">
		<?php get_template_part(THEME_SINGLE."share"); ?>
		<h1><?php the_title();?></h1>
		<?php get_template_part(THEME_SINGLE."about-author"); ?>
	</div>

</div>