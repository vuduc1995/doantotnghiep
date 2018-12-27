<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page","title"); ?>
	<?php $counter = 1;?>
	<div class="block-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part(THEME_LOOP."post"); ?>
		<?php $counter++; ?>
		<?php endwhile; else: ?>
			<?php get_template_part(THEME_LOOP."no","post"); ?>
		<?php endif; ?>
		<?php customized_nav_btns($paged, $wp_query->max_num_pages); ?>
	</div>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>			
