<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php printf ( esc_html__('This post is password protected. Enter the password to view comments.','allegro-theme'));?></p>
	<?php
		return;
	}

	

?>
<?php //You can start editing here. ?>
						<div class="block-title">
							<a href="#respond" class="right"><?php esc_html_e("Write a comment",'allegro-theme');?></a>
							<h2><?php comments_number(esc_html__('No Comments','allegro-theme'), esc_html__('1 Comment','allegro-theme'), esc_html__('% Comments','allegro-theme')); ?></h2>
						</div>
						<div class="block-content">

							<div class="comment-block">
								<?php if ( have_comments() && comments_open()) : ?>
									<ol class="comments" id="comments">
										<?php wp_list_comments('type=comment&callback=orangethemes_comment'); ?>
									</ol>
									<div class="comments-pager"><?php paginate_comments_links(); ?></div>
									
								 <?php else : // this is displayed if there are no comments so far ?>

									<?php if ( comments_open() ) : ?>
										<div class="no-comment-block">
											<span class="icon-text big-icon">&#59168;</span>
											<b><?php esc_html_e("No Comments Yet!",'allegro-theme');?></b>
											<p><?php esc_html_e("Let me tell You a sad story ! There are no comments yet, but You can be first one to comment this article.",'allegro-theme');?></p>
											<a href="#respond" class="icon-link"><span class="icon-text">&#59154;</span><?php esc_html_e("Write a comment",'allegro-theme');?></a>
										</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>

						</div>

						<?php if ( comments_open() ) : ?>
							<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
								<p class="registered-user-restriction"><?php printf ( esc_html__('Only <a href="%1$s"> registered </a> users can comment.','allegro-theme'), wp_login_url( get_permalink() ));?> </p>
							<?php else : ?>
								<div class="block-title">
									<a href="#comments" class="right"><?php esc_html_e("View comments",'allegro-theme');?></a>
									<h2><?php esc_html_e("Write a comment",'allegro-theme');?></h2>
								</div>


								<div class="block-content">
									<div id="writecomment">
										<a href="#" name="respond"></a>
										<?php 
											$defaults = array(
												'comment_field'       	=> '<p class="contact-form-message"><label for="c_message">'.esc_html__("Comment",'allegro-theme').'<span class="required">*</span></label><textarea name="comment" id="comment" placeholder="'.esc_html__("Your message..",'allegro-theme').'"></textarea></p>',
												'comment_notes_before' 	=> '',
												'comment_notes_after'  	=> '',
												'id_form'              	=> 'writecomment',
												'id_submit'            	=> 'submit',
												'title_reply'          => '',
												'title_reply_to'       => '',
												'cancel_reply_link'    	=> '',
												'label_submit'         	=> ''.esc_html__('Post a Comment','allegro-theme').'',
											);
											comment_form($defaults);			
										?>
									</div>
								</div>

							<?php endif; // if you delete this the sky will fall on your head ?>

						<?php endif; ?>
						
