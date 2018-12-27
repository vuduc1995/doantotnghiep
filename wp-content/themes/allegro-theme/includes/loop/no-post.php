<?php 

		if (is_pagetemplate_active("template-contact.php") || is_pagetemplate_active("template-contact-2.php")) {
			$contactPages = ot_get_page("contact");
			if($contactPages[0]) {
				$contactUrl = get_page_link($contactPages[0]);
			} else {
				$contactPages = get_contact_page2();
				$contactUrl = get_page_link($contactPages[0]);
			}
		} else {
			$contactUrl = "#";
		}
 ?>
<div class="the-error-msg">
	<strong class="font-replace"><?php esc_html_e("No Articles Found",'allegro-theme');?></strong>
	<p><?php printf(__('Sorry, there are no articles here ! <br/>You can <a href="%1$s">contact us</a> to resolve this problem !','allegro-theme'), $contactUrl);?></p>
	<p><?php printf(__('Or You can still <a href="%1$s">go back to Homepage</a> !','allegro-theme'), home_url());?></p>
</div>