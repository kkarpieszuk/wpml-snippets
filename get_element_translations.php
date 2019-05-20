<?php

/*
Method 1, with filters usage
*/

function my_element_translations( $post_id = null ) {
	$translations = array();
	$post_type = get_post_type( $post_id );
	if ( is_string( $post_type ) ) {
		$trid = apply_filters( 'wpml_element_trid', null, $post_id, 'post_' . $post_type );
		$translations = apply_filters( 'wpml_get_element_translations', $translations, $trid, 'post_' . $post_type );
	}
	return $translations;
}

my_element_translations( 10 ); // translations of post with id 10

/*
Method 2, for WPML plugins internal usage
*/

global $wpdb;
$settings = array();
$post_translations = new WPML_Admin_Post_Actions( $settings, $wpdb );
$post_translations->get_element_translations( 10, false, true ); // gets only translations of post with id 10
$post_translations->get_element_translations( $product_id, false, false); // gets translations of post with id 10 and post itself