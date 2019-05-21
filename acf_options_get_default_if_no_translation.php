<?php

/**
 * Retrive default value for ACF Option Page field if field is not translated
*/
$field = get_field( 'field-name', 'options-page-slug' ); // replace field-name and options-page-slug

if ( ! $field || $field === '' ) {
	$current_language = apply_filters( 'wpml_current_language', null );
	$default_language = apply_filters( 'wpml_default_language', null );
	do_action( 'wpml_switch_language', $default_language );
	$field = get_field( 'field-name', 'options-page-slug' );
	do_action( 'wpml_switch_language', $current_language );
}

echo $field;