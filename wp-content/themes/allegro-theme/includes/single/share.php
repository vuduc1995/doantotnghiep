<?php
	
	//social share icons
	$pagePrint = get_post_meta( $post->ID, THEME_NAME."_page_print", true);
	$pageEmail = get_post_meta( $post->ID, THEME_NAME."_page_email", true);

	//social share icons
	$shareAll = get_option(THEME_NAME."_share_all");
	$shareSingle = get_post_meta( $post->ID, THEME_NAME."_share_single", true ); 
	$image = get_post_thumb($post->ID,0,0); 
?>

		<?php if(($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show") ) || $pagePrint=="show" || $pageEmail=="show") { ?>
			<?php if(is_page()) { ?>
				<div class="article-title">
			<?php } ?>
			<div class="share-block <?php if (is_page()) { echo "single"; } else { echo "right"; } ?>">
				<?php if($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show")) { ?>
					<div>
						<div class="share-article left">
							<span><?php esc_html_e("Social media",'allegro-theme');?></span>
							<strong><?php esc_html_e("Share this article",'allegro-theme');?></strong>
						</div>
						<div class="left">
							<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" data-url="<?php the_permalink();?>" data-url="<?php the_permalink();?>" class="custom-soc icon-text ot-share">&#62220;</a>
							<a href="#" data-hashtags="" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>" class="ot-tweet custom-soc icon-text">&#62217;</a>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="custom-soc icon-text ot-pluss">&#62223;</a>
							<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $image['src']; ?>&description=<?php the_title(); ?>" data-url="<?php the_permalink();?>" class="ot-pin custom-soc icon-text">&#62226;</a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>" data-url="<?php the_permalink();?>" class="ot-link custom-soc icon-text">&#62232;</a>
						</div>
						<div class="clear-float"></div>
					</div>
				<?php } ?>
			<?php if(is_page()) { ?>
				</div>
			<?php } ?>
				<div>
					<?php if($pagePrint=="show") { ?>
						<a href="javascript:printArticle();" class="small-button"><span class="icon-text">&#59158;</span>&nbsp;&nbsp;<?php esc_html_e("Print this article",'allegro-theme');?></a>
					<?php } ?>
					<?php if($pageEmail=="show") { 
							$title = htmlspecialchars($post->post_title);
						 	$subject = htmlspecialchars(get_bloginfo('name')).' : '.$title;
						 	$body = esc_html__("Check out this article: ",'allegro-theme').$title.' - '.get_permalink($post->ID);
					?>
						<a href="mailto:?subject=<?php echo rawurlencode($subject);?>&body=<?php echo rawurlencode($body);?>" target="_blank" title="<?php echo $title;?>" class="small-button"><span class="icon-text">&#9993;</span>&nbsp;&nbsp;<?php esc_html_e("Send e-mail",'allegro-theme');?></a>
					<?php } ?>
				</div>
				
			</div>
		<?php } ?>