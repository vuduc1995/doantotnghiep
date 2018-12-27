<?php
/**
 * This widget displays featured posts in Tabs.
 *
 * By choosing up to 8 categories to pull posts from, you can
 * display up to 8 tabs, each showing the latest post from the
 * category you chose. You can also select which elements of the
 * post you would like to display, like image, title, byline, and content.
 *
 * @package Genesis
 * @subpackage Genesis Tabs Widget
 */

add_action('widgets_init', create_function('', "register_widget('Genesis_Tabs');"));
class Genesis_Tabs extends WP_Widget {

	function Genesis_Tabs() {
		$widget_ops = array( 'classname' => 'ui-tabs', 'description' => __('Displays featured posts in Tabs', 'genesis') );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'tabs' );
		$this->WP_Widget( 'tabs', __('Genesis - Featured Tabs', 'genesis'), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract($args);
		
		echo $before_widget;
		
			// Pull the chosen categories into an array
			$cats = array( $instance['posts_cat_1'], $instance['posts_cat_2'], $instance['posts_cat_3'], $instance['posts_cat_4'], $instance['posts_cat_5'], $instance['posts_cat_6'], $instance['posts_cat_7'], $instance['posts_cat_8'] );
		
			// Display the tab links
			echo '<ul class="ui-tabs-nav">';
				foreach( (array)$cats as $cat ) {
					if($cat) echo '<li><a href="#cat-'.$cat.'">'.get_cat_name($cat).'</a></li>';
				}
			echo '</ul>';
			
			// Loop through all chosen categories
			foreach( (array)$cats as $cat ) :
			
				if( !$cat ) continue; // skip iteration if $cat is empty
				
				// Custom loop
				$tabbed_posts = new WP_Query(array('cat' => $cat, 'showposts' => 1, 'orderby' => 'date', 'order' => 'DESC'));
				if($tabbed_posts->have_posts()) : while($tabbed_posts->have_posts()) : $tabbed_posts->the_post();
				
					echo '<div id="cat-'.$cat.'"'; post_class('ui-tabs-hide'); echo '>';

					if(!empty($instance['show_image'])) :
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="'.esc_attr($instance['image_alignment']).'">';
						genesis_image(array('format'=>'html', 'size'=>$instance['image_size']));
						echo '</a>';
					endif;

					if(!empty($instance['show_title'])) :
						echo '<h2><a href="'.get_permalink().'" title="'.esc_attr(get_the_title()).'">'.get_the_title().'</a></h2>';
					endif;

					if(!empty($instance['show_byline'])) :
						echo '<p class="byline">';
						the_time('F j, Y');
						echo ' '.__('by', 'genesis').' ';
						the_author_posts_link();
						echo ' &middot; ';
						comments_popup_link(__('Leave a Comment', 'genesis'), __('1 Comment', 'genesis'), __('% Comments', 'genesis'));
						echo ' ';
						edit_post_link(__('(Edit)', 'genesis'), '', '');
						echo '</p>';
					endif;

					if(!empty($instance['show_content'])) :

						if($instance['show_content'] == 'excerpt') :
							the_excerpt();
						elseif($instance['show_content'] == 'content-limit') :
							the_content_limit( (int)$instance['content_limit'], esc_html( $instance['more_text'] ) );
						else :
							the_content( esc_html( $instance['more_text'] ) );
						endif;

					endif;

					echo '</div><!--end post_class()-->'."\n\n";

				endwhile; endif;
				
			endforeach;
		
		echo $after_widget;
		wp_reset_query();
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) { ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:95%;" /></p>
		
		<p><span class="description">Choose up to 8 categories to pull posts from. Each category you choose will represent a single tab.</span></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_1'), 'selected' => $instance['posts_cat_1'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_2'), 'selected' => $instance['posts_cat_2'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_3'), 'selected' => $instance['posts_cat_3'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_4'), 'selected' => $instance['posts_cat_4'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_5'), 'selected' => $instance['posts_cat_5'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_6'), 'selected' => $instance['posts_cat_6'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_7'), 'selected' => $instance['posts_cat_7'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<p><?php wp_dropdown_categories(array('name' => $this->get_field_name('posts_cat_8'), 'selected' => $instance['posts_cat_8'], 'orderby' => 'Name' , 'hierarchical' => 1, 'show_option_all' => __("- None Selected -", 'genesis'), 'hide_empty' => '0')); ?></p>
		
		<hr class="div" />
		
		<p><input id="<?php echo $this->get_field_id('show_image'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_image'); ?>" value="1" <?php checked(1, $instance['show_image']); ?>/> <label for="<?php echo $this->get_field_id('show_image'); ?>"><?php _e('Show Post Image', 'genesis'); ?></label></p>

		<p><label for="<?php echo $this->get_field_id('image_size'); ?>"><?php _e('Image Size', 'genesis'); ?>:</label>
		<?php $sizes = genesis_get_additional_image_sizes(); ?>
		<select id="<?php echo $this->get_field_id('image_size'); ?>" name="<?php echo $this->get_field_name('image_size'); ?>">
			<option style="padding-right:10px;" value="thumbnail">thumbnail (<?php echo get_option('thumbnail_size_w'); ?>x<?php echo get_option('thumbnail_size_h'); ?>)</option>
			<?php
			foreach((array)$sizes as $name => $size) :
			echo '<option style="padding-right: 10px;" value="'.esc_attr($name).'" '.selected($name, $instance['image_size'], FALSE).'>'.esc_html($name).' ('.$size['width'].'x'.$size['height'].')</option>';
			endforeach;
			?>
		</select></p>	
		
		<p><label for="<?php echo $this->get_field_id('image_alignment'); ?>"><?php _e('Image Alignment', 'genesis'); ?>:</label>
		<select id="<?php echo $this->get_field_id('image_alignment'); ?>" name="<?php echo $this->get_field_name('image_alignment'); ?>">
			<option style="padding-right:10px;" value="">- <?php _e('None', 'genesis'); ?> -</option>
			<option style="padding-right:10px;" value="alignleft" <?php selected('alignleft', $instance['image_alignment']); ?>><?php _e('Left', 'genesis'); ?></option>
			<option style="padding-right:10px;" value="alignright" <?php selected('alignright', $instance['image_alignment']); ?>><?php _e('Right', 'genesis'); ?></option>
		</select></p>
		
		<hr class="div" />
		
		<p><input id="<?php echo $this->get_field_id('show_title'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_title'); ?>" value="1" <?php checked(1, $instance['show_title']); ?>/> <label for="<?php echo $this->get_field_id('show_title'); ?>"><?php _e('Show Post Title', 'genesis'); ?></label></p>
		
		<p><input id="<?php echo $this->get_field_id('show_byline'); ?>" type="checkbox" name="<?php echo $this->get_field_name('show_byline'); ?>" value="1" <?php checked(1, $instance['show_byline']); ?>/> <label for="<?php echo $this->get_field_id('show_byline'); ?>"><?php _e('Show Post Byline', 'genesis'); ?></label></p>
		
		<p>
		<label><input type="radio" name="<?php echo $this->get_field_name('show_content'); ?>" value="" <?php checked('', $instance['show_content']); ?> /> <?php _e('Hide the Content', 'genesis'); ?></label><br />
		<label><input type="radio" name="<?php echo $this->get_field_name('show_content'); ?>" value="excerpt" <?php checked('excerpt', $instance['show_content']); ?> /> <?php _e('Show the Excerpt', 'genesis')?></label><br />
		<label><input type="radio" name="<?php echo $this->get_field_name('show_content'); ?>" value="content" <?php checked('content', $instance['show_content']); ?> /> <?php _e('Show the Content', 'genesis')?></label><br />
		<label><input type="radio" name="<?php echo $this->get_field_name('show_content'); ?>" value="content-limit" <?php checked('content-limit', $instance['show_content']); ?> /> <?php _e('Content Limit', 'genesis')?></label> 
		<input type="text" name="<?php echo $this->get_field_name('content_limit'); ?>" value="<?php echo esc_attr(intval($instance['content_limit'])); ?>" size="3" /> <?php _e('characters', 'genesis'); ?>
		</p>
		
		<p><label for="<?php echo $this->get_field_id('more_text'); ?>"><?php _e('More Text (if applicable)', 'genesis'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('more_text'); ?>" name="<?php echo $this->get_field_name('more_text'); ?>" value="<?php echo esc_attr($instance['more_text']); ?>" /></p>
			
	<?php 
	}
}
?>