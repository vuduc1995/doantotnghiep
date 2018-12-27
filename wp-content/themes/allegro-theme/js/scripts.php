<?php
	header("Content-type: text/javascript");
	require_once('../../../../wp-load.php');

?>

	//form validation
	function validateName(fld) {
			
		var error = "";
				
		if (fld.value === '' || fld.value === 'Nickname' || fld.value === 'Enter Your Name..' || fld.value === 'Your Name..') {
			error = "<?php printf ( esc_html__('You didn\'t enter Your First Name.','allegro-theme'));?>\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 50)) {
			error = "<?php printf ( esc_html__('First Name is the wrong length.','allegro-theme'));?>\n";
		}
		return error;
	}
			
	function validateEmail(fld) {

		var error="";
		var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
				
		if (fld.value === "") {
			error = "<?php printf ( esc_html__('You didn\'t enter an email address.','allegro-theme'));?>\n";
		} else if ( fld.value.match(illegalChars) === null) {
			error = "<?php printf ( esc_html__('The email address contains illegal characters.','allegro-theme'));?>\n";
		}

		return error;

	}
			
	function valName(text) {
			
		var error = "";
				
		if (text === '' || text === 'Nickname' || text === 'Enter Your Name..' || text === 'Your Name..') {
			error = "<?php printf ( esc_html__('You didn\'t enter Your First Name.','allegro-theme'));?>\n";
		} else if ((text.length < 2) || (text.length > 50)) {
			error = "<?php printf ( esc_html__('First Name is the wrong length.','allegro-theme'));?>\n";
		}
		return error;
	}
			
	function valEmail(text) {

		var error="";
		var illegalChars = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
				
		if (text === "") {
			error = "<?php printf ( esc_html__('You didn\'t enter an email address.','allegro-theme'));?>\n";
		} else if ( text.match(illegalChars) === null) {
			error = "<?php printf ( esc_html__('The email address contains illegal characters.','allegro-theme'));?>\n";
		}

		return error;

	}
			
	function validateMessage(fld) {

		var error = "";
				
		if (fld.value === '') {
			error = "<?php printf ( esc_html__('You didn\'t enter Your message.','allegro-theme'));?>\n";
		} else if (fld.value.length < 3) {
			error = "<?php printf ( esc_html__('The message is to short.','allegro-theme'));?>\n";
		}

		return error;
	}



