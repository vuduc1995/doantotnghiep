<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package StudioPress\Genesis
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://my.studiopress.com/themes/genesis/
 */

// phpcs:disable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- These aren't global variables
$strings = array();

$search_text = apply_filters( 'genesis_search_text', __( 'Search this website', 'genesis' ) . ' &#x2026;' );

$strings['label'] = apply_filters( 'genesis_search_form_label', '' );
/** This filter is documented in wp-includes/general-template.php */
$input_value             = apply_filters( 'the_search_query', get_search_query() ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- Duplicated WordPress filter
$strings['input_value']  = ! empty( $input_value ) ? $input_value : $search_text;
$strings['submit_value'] = apply_filters( 'genesis_search_button_text', esc_attr__( 'Search', 'genesis' ) );
$strings['placeholder']  = $search_text;

if ( genesis_a11y( 'search-form' ) ) {
	$strings['label'] = ! empty( $strings['label'] ) ? $strings['label'] : $strings['placeholder'];
}

$form = new Genesis_Search_Form( $strings );

/**
 * Allow the form output to be filtered.
 *
 * @since 1.0.0
 *
 * @param string The form markup.
 * @param string Input value.
 * @param string Submit button value.
 * @param string Form label value.
 */
$searchform = apply_filters( 'genesis_search_form', $form->get_form(), $strings['input_value'], $strings['submit_value'], $strings['label'] );

echo $searchform; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Need this to output raw html.
// phpcs:enable WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound