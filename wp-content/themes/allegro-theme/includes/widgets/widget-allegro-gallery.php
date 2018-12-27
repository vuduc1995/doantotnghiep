<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_gallery");'));

class OT_gallery extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' Latest Galleries');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'count' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$count = esc_attr($instance['count']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php  printf ( esc_html__('Title:','allegro-theme')); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php  printf ( esc_html__('Item shown:','allegro-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['color'] = strip_tags($new_instance['color']);
		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];
		$counter=1;
		if(!$count) $count=3;

		$my_query = new WP_Query(array('post_type' => 'gallery', 'showposts' => $count));  

		
		$totalCount = $my_query->found_posts;
        ?>
        <?php echo $before_widget; ?>
			<?php if($title) echo $before_title.$title.$after_title; ?>
			<div class="latest-galleries">
				<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<?php
						global $post;
						$g = $my_query->post->ID;
						$gallery_style = get_post_meta ( $g, THEME_NAME."_gallery_style", true );
						$galleryImages = get_post_meta ( $g, THEME_NAME."_gallery_images", true ); 
						$imageIDs = explode(",",$galleryImages);
					?>
					<div class="gallery-widget" rel="gallery-<?php echo $g;?>">
						<div class="gallery-photo" rel="hover-parent">
							<a href="#" class="slide-left icon-text">&#59229;</a>
							<a href="#" class="slide-right icon-text">&#59230;</a>
							<ul>
								<?php
									$c=1;
				            		foreach($imageIDs as $imgID) { 
				            		
				            			if($imgID) {
					            			$file = wp_get_attachment_url($imgID);
					            			$image = get_post_thumb(false, 300, 190, false, $file);
										?>
											<li<?php if($c==1) { ?> class="active"<?php } ?>>
												<a href="<?php the_permalink();?>?page=<?php echo $c;?>" class="hover-effect<?php if($gallery_style=="lightbox") { echo ' light-show '; } ?>" data-id="gallery-<?php echo $g;?>">
													<img src="<?php echo $image['src'];?>" data-id="<?php echo $c;?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
												</a>
											</li>
										<?php 	
										$c++;
										} 
									} 
								?>
							</ul>
						</div>
						<div class="gallery-content">
							<h4><a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo ' light-show '; } ?>" data-id="gallery-<?php echo $g;?>"><?php the_title(); ?></a></h4>
							<span class="meta">
								<span class="right"><?php echo OT_image_count($g);?> <?php esc_html_e("photos",'allegro-theme');?></span>
								<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo ' light-show '; } ?>" data-id="gallery-<?php echo $g;?>"><span class="icon-text">&#59212;</span><?php esc_html_e("View all photos",'allegro-theme');?></a>
							</span>
						</div>
					</div>
				<?php $counter++; ?>
				<?php endwhile; ?>
				<?php endif; ?>	
			</div>
		<?php echo $after_widget; ?>	
        <?php
	}
}
?>
