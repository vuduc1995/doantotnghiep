<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	//similar news
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 

	if($similarPosts == "show" || ($similarPosts=="custom" && $similarPostsSingle=="show")) {
		$similarPostsShow = true;
	} else {
		$similarPostsShow = false;	
	}

	if($similarPostsShow==true) {
	
		wp_reset_query();
		$categories = get_the_category($post->ID);
		
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>3,
				'ignore_sticky_posts'=>1,
				'orderby' => 'rand'
			);

			$my_query = new wp_query($args);
			$postCount = $my_query->post_count;
			$counter = 1;
?>

	<h3 class="highlight-title"><?php esc_html_e("Related Articles",'allegro-theme');?></h3>
	<ul>
		<?php									
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) {
					$my_query->the_post();
		?>
			<li>
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
				<?php if ( comments_open() ) { ?>
					<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number('0','1','%'); ?></a>
					<span class="meta-date"><?php the_time("d.M");?></span>
				<?php } ?>
			</li>
			<?php } ?>
		<?php } ?>
	</ul>

	<?php } ?>
<?php } ?>
<?php wp_reset_query();  ?>