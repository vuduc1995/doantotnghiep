<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$image = get_post_thumb($post->ID,0,0); 
	if(!is_page_template ( 'template-homepage.php' )) { 
		$tag = "h2";
	} else {
		$tag = "h3";
	}
	
	if(get_option(THEME_NAME."_show_first_thumb") != "on" || $image['show']!=true) {
		$class = " no-image";
	} else {
		$class = null;
	}

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
	$postAuthor = get_option(THEME_NAME."_post_author");

?>

<div <?php post_class("article-big".$class); ?>>
	<?php get_template_part(THEME_LOOP."image"); ?>
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
			<?php 
				if($postAuthor=="on") { 
					echo the_author_posts_link();
				} 
			?>
			<?php if($postDate=="on") { ?>
				<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
					<span class="icon-text">&#128340;</span><?php the_time("H:i, j.M Y");?>
				</a>
			<?php } ?>
		</span>
			<?php 
				add_filter('excerpt_length', 'new_excerpt_length_40');
				the_excerpt();
				remove_filter('excerpt_length', 'new_excerpt_length_40');
			?>
		<span class="meta">
			<a href="<?php the_permalink();?>" class="more"><?php esc_html_e("Read Full Article",'allegro-theme');?><span class="icon-text">&#9656;</span></a>
		</span>
	</div>
</div>