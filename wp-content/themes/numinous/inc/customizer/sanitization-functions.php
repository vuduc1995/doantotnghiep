<?php
/**
 * Sanitization Funcions
 * 
 * @package Numinous
*/

function numinous_sanitize_checkbox( $checked ){
    // Boolean check.
   return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function numinous_sanitize_css( $css ){
    return wp_strip_all_tags( $css );
}

function numinous_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function numinous_sanitize_number_absint( $number, $setting ) {
    // Ensure $number is an absolute integer (whole number, zero or greater).
    $number = absint( $number );
    
    // If the input is an absolute integer, return it; otherwise, return the default
    return ( $number ? $number : $setting->default );
}