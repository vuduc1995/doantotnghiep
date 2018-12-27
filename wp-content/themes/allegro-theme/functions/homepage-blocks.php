<?php

/* -------------------------------------------------------------------------*
 * 							HOMEPAGE LATEST NEWS							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_news($blockType, $blockId,$blockInputType) {
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$postDate = get_option(THEME_NAME."_".$blockType."_date_".$blockId);
		$postComments = get_option(THEME_NAME."_".$blockType."_comment_".$blockId);

		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => $count,
			'cat' => $cat,
			'ignore_sticky_posts' => 1
		);
		$my_query = new WP_Query($args);
		$blogID = get_option('page_for_posts');
		$category_link = get_category_link( $cat );

		if($cat) {
			//custom colors
			$titleColor = ot_title_color($cat, "category", false);
		} else {
			//custom colors
			$titleColor = ot_title_color($blogID,"page", false);
		}
?>
	<div class="block">
		<div class="block-title" style="background: <?php echo $titleColor;?>;">
			<?php if(!$cat) { ?>
				<a href="<?php echo get_page_link($blogID);?>" class="right"><?php esc_html_e("View Blog",'allegro-theme');?></a>
			<?php } else { ?>
				<a href="<?php echo $category_link;?>" class="right"><?php esc_html_e("View All",'allegro-theme');?></a>
			<?php } ?>
			<?php if($title) { ?>
				<h2><?php echo $title;?></h2>
			<?php } ?>
		</div>
		<div class="block-content">
			<ul class="article-block-big">
				<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<li>
						<div class="article-photo">
							<a href="<?php the_permalink();?>" class="hover-effect">
								<?php echo ot_image_html($my_query->post->ID,200,134); ?>
							</a>
						</div>
						<div class="article-content">
							<h4>
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
								<?php if ( comments_open() && $postComments=="on") { ?>
									<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
								<?php } ?>
								<span class="meta">
									<?php ot_updated_tag_html();?>
								</span>
							</h4>
							<span class="meta">
								<?php if($postDate=="on") { ?>
									<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
										<span class="icon-text">&#128340;</span>
										<?php the_time("H:i, j.M Y");?>
									</a>
								<?php } ?>
							</span>
						</div>
					</li>
				<?php endwhile; else: ?>
					<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
				<?php endif; ?>
			</ul>
		</div>
	</div>

<?php
	}
?>

<?php

/* -------------------------------------------------------------------------*
 * 							HOMEPAGE LATEST NEWS 2 							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_news_2($blockType, $blockId,$blockInputType) {
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$postDate = get_option(THEME_NAME."_".$blockType."_date_".$blockId);
		$postComments = get_option(THEME_NAME."_".$blockType."_comment_".$blockId);

		if ($count<=2) { $count = 3; }

		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => $count,
			'cat' => $cat,
			'ignore_sticky_posts' => 1
		);
		$my_query = new WP_Query($args);
		$blogID = get_option('page_for_posts');
		$category_link = get_category_link( $cat );

		if($cat) {
			//custom colors
			$titleColor = ot_title_color($cat, "category", false);
		} else {
			//custom colors
			$titleColor = ot_title_color($blogID,"page", false);
		}

		$countColumn = ceil(($count-1)/2);
?>
	<div class="block">
		<div class="block-title" style="background: <?php echo $titleColor;?>;">
			<?php if(!$cat) { ?>
				<a href="<?php echo get_page_link($blogID);?>" class="right"><?php esc_html_e("View Blog",'allegro-theme');?></a>
			<?php } else { ?>
				<a href="<?php echo $category_link;?>" class="right"><?php esc_html_e("Latest News From ",'allegro-theme').get_cat_name($cat);?></a>
			<?php } ?>
			<?php if($title) { ?>
				<h2><?php echo $title;?></h2>
			<?php } ?>
		</div>


		<div class="block-content">
			<?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="wide-article">
				<div class="article-photo">
					<a href="<?php the_permalink();?>" class="hover-effect">
						<?php echo ot_image_html($my_query->post->ID,160,117); ?>
					</a>
				</div>
				<div class="article-content">
					<h2>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
						<?php if ( comments_open() && $postComments=="on") { ?>
							<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
						<?php } ?>
						<span class="meta">
							<?php ot_updated_tag_html();?>
						</span>
					</h2>
					<span class="meta">
						<?php if($postDate=="on") { ?>
							<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
								<span class="icon-text">&#128340;</span>
								<?php the_time("H:i, j.M Y");?>
							</a>
						<?php } ?>
					</span>
					<?php the_excerpt();?>
				</div>
			</div>
			<?php else: ?>
				<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
			<?php endif; ?>
			<div class="paragraph-row">
				<?php for($i=1;$i<=2;$i++) { ?>
				<?php $counter=1; ?>
					<!-- BEGIN .column6 -->
					<div class="column6">
						<ul class="article-block">
							<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<li>
									<div class="article-photo">
										<a href="<?php the_permalink();?>" class="hover-effect">
											<?php echo ot_image_html($my_query->post->ID,59,42); ?>
										</a>
									</div>
									<div class="article-content">
										<h4>
											<a href="<?php the_permalink();?>"><?php the_title();?></a>
											<?php if ( comments_open() && $postComments=="on") { ?>
												<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
											<?php } ?>
											<span class="meta">
												<?php ot_updated_tag_html();?>
											</span>
										</h4>
										<span class="meta">
											<?php if($postDate=="on") { ?>
												<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
													<span class="icon-text">&#128340;</span>
													<?php the_time("H:i, j.M Y");?>
												</a>
											<?php } ?>
										</span>
									</div>
								</li>
							<?php if($counter==$countColumn) break; ?>
							<?php $counter++; ?>
							<?php endwhile; else: ?>
								<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
							<?php endif; ?>
						</ul>
					<!-- END .column6 -->
					</div>
				<?php } ?>
			</div>
		</div>
	</div>


<?php
	}
?>
<?php

/* -------------------------------------------------------------------------*
 * 							HOMEPAGE LATEST NEWS 3							*
 * -------------------------------------------------------------------------*/
 
	function homepage_latest_news_3($blockType, $blockId,$blockInputType) {
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$postDate = get_option(THEME_NAME."_".$blockType."_date_".$blockId);
		$postComments = get_option(THEME_NAME."_".$blockType."_comment_".$blockId);


		$args = array(
			'post_type' => 'post', 
			'posts_per_page' => 1,
			'cat' => $cat,
			'ignore_sticky_posts' => 1
		);
		$my_query = new WP_Query($args);
		$blogID = get_option('page_for_posts');
		$category_link = get_category_link( $cat );

		$smallSidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select_small", true ); 

?>
	<div class="block">
		<div class="featured-block">
			<?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="article-photo">
					<a href="<?php the_permalink();?>" class="hover-effect">
						<?php 
							if(!$smallSidebar || $smallSidebar=="off" ) {
								echo ot_image_html($my_query->post->ID,890,250);
							} else {
								echo ot_image_html($my_query->post->ID,630,250);
							}
						?>
					</a>
				</div>
				<div class="article-content">
					<h2>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
						<?php if ( comments_open() && $postComments=="on") { ?>
							<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
						<?php } ?>
					</h2>
					<?php if($postDate=="on") { ?>
						<span class="meta">
							<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
								<span class="icon-text">&#128340;</span>
								<?php the_time("H:i, j.M Y");?>
							</a>
						</span>
					<?php } ?>
				</div>

			<?php else: ?>
				<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
			<?php endif; ?>
		</div>
	</div>
<?php
	}
?>


<?php

/* -------------------------------------------------------------------------*
 * 								HTML BANNERS								*
 * -------------------------------------------------------------------------*/

	function homepage_banner($blockType, $blockId,$blockInputType) {
		$code = stripslashes(get_option(THEME_NAME."_".$blockType."_".$blockId));
		$contactID = ot_get_page("contact");
	?>
		<!-- BEGIN .main-block -->
		<div class="block">
			<div class="banner">
				<?php echo do_shortcode($code);?>
				<?php
					if($contactID && get_option(THEME_NAME."_banner_adv") == "on" ) {
						echo '<a href="'.get_page_link($contactID[0]).'" class="ad-link"><span class="icon-text">&#9652;</span>'.esc_html__("Advertisement",'allegro-theme').'<span class="icon-text">&#9652;</span></a>';
					}
				?>
			</div>

		<!-- END .main-block -->
		</div>
	<?php
	}
?>
<?php

/* -------------------------------------------------------------------------*
 * 									HTML CODE								*
 * -------------------------------------------------------------------------*/

	function homepage_html($blockType, $blockId,$blockInputType) {
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);
		$text = stripslashes(get_option(THEME_NAME."_".$blockType."_".$blockId));
	?>
		<!-- BEGIN .main-block -->
		<div class="block">
			<?php if($title) { ?>
				<div class="block-title">
					<h2><?php echo $title;?></h2>
				</div>
			<?php } ?>
			<div class="block-content">
				<?php echo do_shortcode($text);?>
			</div>

		<!-- END .main-block -->
		</div>
	<?php
	}
?>

