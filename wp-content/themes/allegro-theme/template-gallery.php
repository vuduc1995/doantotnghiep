<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/* Template Name: Photo Gallery */
?>
<?php get_header(); ?>
<?php
	wp_reset_query();
	$paged = get_query_string_paged();
	$posts_per_page = get_option(THEME_NAME.'_gallery_items');

	if($posts_per_page == "") {
		$posts_per_page = get_option('posts_per_page');
	}
	
	$my_query = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => $posts_per_page, 'paged'=>$paged));  
	$categories = get_terms( 'gallery-cat', 'orderby=name&hide_empty=0' );

	//page title
	$titleShow = get_post_meta ( $post->ID, THEME_NAME."_title_show", true );
	$subTitle = get_post_meta ( OT_page_id(), THEME_NAME."_subtitle", true ); 
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page","title"); ?>
	<div class="block-content">

		<div class="filter-block" id="gallery-categories">
			<strong><?php esc_html_e('Filter:','allegro-theme'); ?></strong>
			<a href="#filter" data-option="*" class="active"><?php esc_html_e('All','allegro-theme'); ?></a>
			<?php foreach ($categories as $category) { ?>
				<a href="#filter" data-option=".<?php echo $category->slug;?>"><?php echo $category->name;?></a>
			<?php } ?>
		</div>

		<div class="overflow-fix">
			<div class="photo-gallery-grid js-masonry" id="gallery-full">
				<?php 
																
					$args = array(
						'post_type'     	=> 'gallery',
						'post_status'  	 	=> 'publish',
						'showposts' 		=> -1
					);

					$myposts = get_posts( $args );	
					$count_total = count($myposts);

					$counter=1;	
				?>

				<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<?php 
						$src = get_post_thumb($post->ID,232,170); 
					?>
					<?php $term_list = wp_get_post_terms($post->ID, 'gallery-cat'); ?>
					<?php $gallery_style = get_post_meta ( $post->ID, THEME_NAME."_gallery_style", true ); ?>

						<div class="photo-gallery-block gallery-image<?php foreach ($term_list as $term) { echo " ".$term->slug; } ?>" data-id="gallery-<?php the_ID(); ?>">
							<div class="gallery-photo">
								<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>hover-effect" data-id="gallery-<?php the_ID(); ?>">
									<img src="<?php echo $src["src"]; ?>" alt="<?php the_title();?>" />
								</a>
							</div>
							<div class="gallery-content">
								<h3><a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>"><?php the_title();?></a></h3>
								<?php 
									add_filter('excerpt_length', 'new_excerpt_length_20');
									the_excerpt();
									remove_filter('excerpt_length', 'new_excerpt_length_20');
								?>
								<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>more" data-id="gallery-<?php the_ID(); ?>"><?php esc_html_e("View all photos",'allegro-theme');?>&nbsp;&nbsp;<span class="icon-text">&#9656;</span></a>
							</div>
						</div>
				<?php 
					if ( $paged != 0 ) {
						$a = ($paged-1)*$posts_per_page;
					} else {		
						$a = 1;
					}
				?>
							
				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php else : ?>
					<h2 class="title"><?php esc_html_e('No galleries were found','allegro-theme');?></h2>
				<?php endif; ?>
			</div>
		</div>
		<?php gallery_nav_btns($paged, $my_query->max_num_pages); ?>
	</div>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>