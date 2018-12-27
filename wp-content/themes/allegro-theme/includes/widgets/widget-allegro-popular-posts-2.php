<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_popular_posts_2");'));

class OT_popular_posts_2 extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' Popular Posts Style 2');	
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
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( esc_html__('Title:','allegro-theme')); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

			
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( esc_html__('Post count:','allegro-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

		
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$count = $instance['count'];

		$args=array(
			'posts_per_page' => $count,
			'order' => 'DESC',
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		$the_query = new WP_Query($args);
		$counter = 1;
		
		$totalCount = $the_query->found_posts;
		
		$blogID = get_option('page_for_posts');
	
		$postDate = get_option(THEME_NAME."_post_date");
		$postComments = get_option(THEME_NAME."_post_comment");	

?>		
	<?php echo $before_widget; ?>
		<?php if($title) { ?>
			<h2 class="list-title"><?php echo $title;?></h2>
		<?php } ?>
			<ul class="article-list">
				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
						<?php if ( comments_open() && $postComments=="on") { ?>
							<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
						<?php } ?>
						<?php if($postDate=="on") { ?>
							<span class="meta-date"><?php the_time("j.M");?></span>
						<?php } ?>
					</li>
				<?php endwhile; else: ?>
					<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
				<?php endif; ?>
			</ul>
	<?php echo $after_widget; ?>
		
	
      <?php
	}
}
?>
