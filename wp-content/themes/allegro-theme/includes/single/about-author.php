<?php
	/**	
	// about authors
	$aboutAuthor = get_option(THEME_NAME."_about_author");
	$aboutAuthorSingle = get_post_meta( $post->ID, THEME_NAME."_about_author", true ); 
	**/
	
	// author id
	$user_ID = get_the_author_meta('ID');

	/**
	//social
	$flickr = get_user_meta($user_ID, 'flickr', true);
	$vimeo = get_user_meta($user_ID, 'vimeo', true);
	$twitter = get_user_meta($user_ID, 'twitter', true);
	$facebook = get_user_meta($user_ID, 'facebook', true);
	$google = get_user_meta($user_ID, 'googlepluss', true);
	$pinterest = get_user_meta($user_ID, 'pinterest', true);
	$linkedin = get_user_meta($user_ID, 'linkedin', true);
	**/
?>

<?php //if($aboutAuthor == "show" || ($aboutAuthor=="custom" && $aboutAuthorSingle=="show")) {  ?>
	<div class="author">
		<span class="hover-effect left">
			<img src="<?php echo get_avatar_url(get_the_author_meta('user_email',$user_ID), '50', THEME_IMAGE_URL.'_avatar-50x50.jpg', 'G', false, $atts = array() );?>" alt="<?php echo get_the_author_meta('display_name',$user_ID); ?>" />
		</span>
		<div class="a-content">
			<span><?php esc_html_e("By",'allegro-theme');?> <b><?php the_author(); ?></b></span>
			<span class="meta">
				<?php the_time("F j, Y H:i");?>
				<?php ot_updated_tag_html();?>
			</span>
		</div>
	</div>
<?php //} ?>