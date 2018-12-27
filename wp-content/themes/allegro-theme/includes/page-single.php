<?php
	wp_reset_query();

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) :  ?>
		<?php get_template_part(THEME_SINGLE."page","title"); ?>
		<div class="block-content">
			<?php get_template_part(THEME_SINGLE."image"); ?>
			<div class="shortcode-content">
				<?php the_content();?>

				<?php get_template_part(THEME_SINGLE."share"); ?>

			</div>
			<?php wp_reset_query(); ?>
			<?php if ( comments_open() ) : ?>
				<?php comments_template(); // Get comments.php template ?>
			<?php endif; ?>
		</div>

	<?php else: ?>
		<p><?php  esc_html_e('Sorry, no posts matched your criteria.','allegro-theme'); ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
				