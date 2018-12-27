<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_cat_posts_2");'));

class OT_cat_posts_2 extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' Latest Posts Style 2');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'cat' => '',
			'count' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$cat = esc_attr($instance['cat']);
		$count = esc_attr($instance['count']);
        ?>
         	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( esc_html__('Title:','allegro-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php printf ( esc_html__('Category:','allegro-theme'));?>
			<?php
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'taxonomy'                 => 'category');
				$args = get_categories( $args ); 
			?> 	
			<select name="<?php echo $this->get_field_name('cat'); ?>" style="width: 100%; clear: both; margin: 0;">
				<option value=""><?php esc_html_e("Latest News",'allegro-theme');?></option>
				<?php foreach($args as $ar) { ?>
					<option value="<?php echo $ar->term_id; ?>" <?php if($ar->term_id==$cat)  {echo 'selected="selected"';} ?>><?php echo $ar->cat_name; ?></option>
				<?php } ?>
			</select>
			
			</label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( esc_html__('Post count:','allegro-theme'));?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['count'] = strip_tags($new_instance['count']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$count = $instance['count'];
		$cat = $instance['cat'];

	$category_link = get_category_link( $cat );

	
	$args=array(
		'cat'=> $cat,
		'posts_per_page'=> $count,
		'ignore_sticky_posts' => true
	);
	
	$the_query = new WP_Query($args);
		$counter = 1;

	$blogID = get_option('page_for_posts');

	if($cat) {
		//custom colors
		$titleColor = ot_title_color($cat, "category", false);
	} else {
		//custom colors
		$titleColor = ot_title_color($blogID,"page", false);
	}

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
?>	
	<?php echo $before_widget; ?>
		<?php if($title) { ?>
			<h2 class="list-title" style="color: <?php echo $titleColor;?>;border-bottom: 2px solid <?php echo $titleColor;?>;"><?php echo $title;?></h2>
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
			<?php if($category_link) { ?>
				<a href="<?php echo $category_link;?>" class="more"><?php esc_html_e("Read More",'allegro-theme');?></a>
			<?php } else { ?>
				<a href="<?php echo get_page_link($blogID);?>" class="more"><?php esc_html_e("Read More",'allegro-theme');?></a>
			<?php } ?> 
	<?php echo $after_widget; ?>

      <?php
	}
}
?>