<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	//similar news
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 

	if($similarPosts == "show" || ($similarPosts=="custom" && $similarPostsSingle=="show")) {
		$similarPostsShow = true;
	} else {
		$similarPostsShow = false;	
	}

	//post highlight
	$highlights = get_post_meta ( $post->ID, THEME_NAME."_highlights", true );

?>

				<?php get_template_part(THEME_LOOP."loop","start"); ?>
					<?php if (have_posts()) : ?>
						<div <?php post_class("block-content"); ?>>
							<?php get_template_part(THEME_SINGLE."image"); ?>
							<div class="shortcode-content">
								<div class="paragraph-row">
									<?php if($highlights || $similarPostsShow==true) { ?>
										<div class="column3">
											<?php get_template_part(THEME_SINGLE."post-highlights"); ?>
											<?php get_template_part(THEME_SINGLE."post-related"); ?>
										</div>
										<div class="column9">
									<?php } else { ?>
										<div class="column12">
									<?php } ?>

										<?php the_content();?>		
										<?php 
											$args = array(
												'before'           => '<div class="post-pages"><p>' . esc_html__('Pages:','allegro-theme'),
												'after'            => '</p></div>',
												'link_before'      => '',
												'link_after'       => '',
												'next_or_number'   => 'number',
												'nextpagelink'     => esc_html__('Next page','allegro-theme'),
												'previouspagelink' => esc_html__('Previous page','allegro-theme'),
												'pagelink'         => '%',
												'echo'             => 1
											);

											wp_link_pages($args); 
										?>							
									</div>
								</div>

								<div class="article-title">
									<?php get_template_part(THEME_SINGLE."share"); ?>
									<?php get_template_part(THEME_SINGLE."about-author"); ?>
									<?php get_template_part(THEME_SINGLE."post-tags"); ?>
								</div>

							</div>

						</div>

						<?php wp_reset_query(); ?>
						<?php if ( comments_open() ) : ?>
							<?php comments_template(); // Get comments.php template ?>
						<?php endif; ?>

					<?php else: ?>
						<p><?php  esc_html_e('Sorry, no posts matched your criteria.','allegro-theme'); ?></p>
					<?php endif; ?>
				<?php get_template_part(THEME_LOOP."loop","end"); ?>