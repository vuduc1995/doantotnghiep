<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query();
	$mail_to = get_post_meta ( $post->ID, THEME_NAME."_contact_mail", true ); 
	$map = get_post_meta ( $post->ID, THEME_NAME."_map", true ); 

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if($mail_to) { ?>
		<?php if (have_posts()) : ?>
			<?php get_template_part(THEME_SINGLE."page","title"); ?>
			<div class="block-content">

				<?php if($map) { ?>
					<div class="contact-map">
						<div class="map-border">
							<div class="google-maps">
								<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed"></iframe>
							</div>
						</div>
					</div>
				<?php } ?>


				<div class="paragraph-row">
					<div class="column6">
						<?php the_content(); ?>	
					</div>
					<div class="column6">

						<div class="writecomment">

							<div class="coloralert contact-success-block" style="display:none;" style="background: #68a117;">
								<p><?php esc_html_e("Success!",'allegro-theme');?></p>
								<a href="#close-alert" class="icon-text">&#10006;</a>
							</div>

							<form id="writecomment" name="writecomment" class="contact-form" action="">
								<input type="hidden"  name="form_type" value="contact" />
								<input type="hidden"  name="post_id" value="<?php echo $post->ID;?>" />

								<p class="contact-form-user">
									<label for="c_name"><?php esc_html_e("Nickname",'allegro-theme');?><span class="required">*</span></label>
									<input type="text" name="u_name" id="contact-name-input" placeholder="<?php esc_html_e("Nickname",'allegro-theme');?>" title="<?php esc_html_e("Nickname",'allegro-theme');?>" />
									<span class="error-msg" id="contact-name-error" style="display:none;"><span class="icon-text">&#9888;</span><font class="ot-error-text"></font></span>
								</p>
								<p class="contact-form-email">
									<label for="c_name"><?php esc_html_e("E-mail",'allegro-theme');?><span class="required">*</span></label>
									<input type="text" name="email" id="contact-mail-input" placeholder="<?php esc_html_e("E-mail address",'allegro-theme');?>" title="<?php esc_html_e("E-mail",'allegro-theme');?>" />
									<span class="error-msg" id="contact-mail-error" style="display:none;"><span class="icon-text">&#9888;</span><font class="ot-error-text"></font></span>
								</p>
								<p class="contact-form-message">
									<label for="c_name"><?php esc_html_e("Your message",'allegro-theme');?><span class="required">*</span></label>
									<textarea name="message" placeholder="<?php esc_html_e("Your message",'allegro-theme');?>" id="contact-message-input"></textarea>
									<span class="error-msg" id="contact-message-error" style="display:none;"><span class="icon-text">&#9888;</span><font class="ot-error-text"></font></span>
								</p>
								<p class="form-submit">
									<input onClick="Validate(); return false;" name="submit" type="submit" class="styled-button" id="contact-submit" value="<?php printf ( esc_html__('Send a Message','allegro-theme'));?>" />
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<p><?php printf ( esc_html__('Sorry, no posts matched your criteria.','allegro-theme')); ?></p>
		<?php endif; ?>
	<?php } else { echo "<span style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</span>"; } ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>