<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Full Width Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query(); 
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) : ?>
		<?php get_template_part(THEME_SINGLE."page","title"); ?>
		<div class="block-content">
			<?php the_content(); ?>
		</div>
		<?php else: ?>
				<p><?php printf ( esc_html__('Sorry, no posts matched your criteria.','allegro-theme')); ?></p>
		<?php endif; ?>	
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>