<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	global $query_string;
	$query_vars = explode('&',$query_string);
									
	foreach($query_vars as $key) {
		if(strpos($key,'page=') !== false) {
			$i = substr($key,8,12);
			break;
		}
	}
	
	if(!isset($i)) {
		$i = 1;
	}

	$galleryImages = get_post_meta ( $post->ID, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);
	$count = count($imageIDs);

	//main image
	$file = wp_get_attachment_url($imageIDs[$i-1]);
	$image = get_post_thumb(false, 1200, 0, false, $file);	

	// similar posts
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 		
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page","title"); ?>
	<div class="block-content">
		<?php if (have_posts()): ?>
			<div class="photo-gallery-full ot-slide-item" id="<?php echo $post->ID;?>">
				<span class="next-image" data-next="<?php echo $i+1;?>"></span>
				<span class="gal-current-image">
					<div class="the-image loading waiter">
						<a href="javascript:void(0);" class="prev photo-controls left icon-text" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>">&#58541;</a>
						<a href="javascript:void(0);" class="next photo-controls right icon-text" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>">&#58542;</a>
						<img class="image-big-gallery ot-gallery-image" data-id="<?php echo $i;?>" style="display:none;" src="<?php echo $image['src'];?>" alt="<?php the_title();?>" />
					</div>
				</span>

				<div class="photo-gallery-thumbs" id="makeMeScrollable">
					<div class="inner-thumb the-thumbs">
	            		<?php 
		            		$c=1;
		            		foreach($imageIDs as $id) { 
		            			if($id) {
			            			$file = wp_get_attachment_url($id);
			            			$image = get_post_thumb(false, 80, 80, false, $file);
		            	?>
							<a href="javascript:;" rel="<?php echo $c;?>" class="hover-effect gal-thumbs<?php if($c==$i) { ?> active<?php } ?>" data-nr="<?php echo $c;?>">
								<img src="<?php echo $image['src'];?>" alt="<?php the_title();?>"/>
							</a>
			                <?php $c++; ?>
		               	 	<?php } ?>
		                <?php } ?>
					</div>
				</div>
			</div>

			<div class="shortcode-content">

				<h2><?php the_title();?></h2>

				<?php 
					if (get_the_content() != "") { 				
						add_filter('the_content','remove_images');
						add_filter('the_content','remove_objects');
						the_content();
					} 
				?>
			</div>

		<?php if($similarPosts == "show" || ($similarPosts=="custom" && $similarPostsSingle=="show")) { ?>
			<hr />
			<div class="block-title">
				<a href="<?php echo home_url();?>" class="right"><?php esc_html_e("Back to homepage",'allegro-theme');?></a>
				<h2><?php esc_html_e("Similar Photo Galleries",'allegro-theme');?></h2>
			</div>


			<div class="block-content">
				<div class="overflow-fix">
					<div class="photo-gallery-grid">
						<?php
							$categories = get_terms( 'gallery-cat', 'orderby=count&hide_empty=0' );
							$counter=1;
							$my_query = new WP_Query( 
								array( 
									'post_type' => 'gallery', 
									'showposts' => 3, 
									'tax_query' => array(
										array(
											'taxonomy' => 'gallery-cat',
											'field' => 'id',
											'terms' => $categories[0]->term_id,
										)
									),
								)
							);
							
							if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); 
								$src = get_post_thumb($post->ID,232,170); 
								$gallery_style = get_post_meta ( $post->ID, THEME_NAME."_gallery_style", true );
						?>
							<div class="photo-gallery-block">
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
							<?php $counter++; ?>
						<?php endwhile;?>
						<?php else: ?>
							<p><?php  esc_html_e('Sorry, no posts matched your criteria.','allegro-theme'); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php else: ?>
			<p><?php  esc_html_e('Sorry, no posts matched your criteria.','allegro-theme'); ?></p>
		<?php endif; ?>
	</div>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>