<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_cat_posts_3");'));

class OT_cat_posts_3 extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' Latest Post With Large Image');	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'cat' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$cat = esc_attr($instance['cat']);
        ?>
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

			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['cat'] = strip_tags($new_instance['cat']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		$cat = $instance['cat'];


	$category_link = get_category_link( $cat );

	
	$args=array(
		'cat'=> $cat,
		'posts_per_page'=> 1,
		'ignore_sticky_posts' => true
	);
	
	$the_query = new WP_Query($args);
		$counter = 1;

	$blogID = get_option('page_for_posts');

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
?>	
	<?php echo $before_widget; ?>
		<?php if ($the_query->have_posts()) : $the_query->the_post(); ?>
			<div class="featured-block">
				<div class="article-content">
					<h3>
						<a href="<?php the_permalink();?>"><?php the_title();?></a>
						<?php if ( comments_open() && $postComments=="on") { ?>
							<a href="<?php the_permalink();?>#comments" class="h-comment"><?php comments_number("0","1","%"); ?></a>
						<?php } ?>
					</h3>
					<?php if($postDate=="on") { ?>
						<span class="meta">
							<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
								<span class="icon-text">&#128340; </span><?php the_time("H:i, j.M Y");?>
							</a>
						</span>
					<?php } ?>
				</div>
				<div class="article-photo">
					<a href="<?php the_permalink();?>" class="hover-effect">
						<?php echo ot_image_html($the_query->post->ID,300,250); ?>
					</a>
				</div>
			</div>

		<?php else: ?>
			<p><?php  esc_html_e('No posts where found','allegro-theme');?></p>
		<?php endif; ?>
	<?php echo $after_widget; ?>

      <?php
	}
}
?>