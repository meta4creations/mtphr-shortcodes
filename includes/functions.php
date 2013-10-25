<?php
/**
 * Put all the general code here
 *
 * @package Metaphor Shortcodes
 */



/**
 * Return a value from the options table if it exists,
 * or return a default value
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_settings() {

	// Get the options
	$settings = get_option( 'mtphr_shortcodes_settings', array() );

	$defaults = array(
		'responsive' => false,
		'slide_speed' => 500
	);
	$defaults = apply_filters( 'mtphr_shortcodes_default_settings', $defaults );

	return wp_parse_args( $settings, $defaults );
}




/**
 * Parse the shortcode content
 *
 * @since 1.0.0
 */
function mtphr_shortcodes_parse_shortcode_content( $content ) {

	/* Parse nested shortcodes and add formatting. */
	$content = trim( wpautop(do_shortcode($content)) );

	/* Remove '</p>' from the start of the string. */
	if ( substr( $content, 0, 4 ) == '</p>' )
	    $content = substr( $content, 4 );

	/* Remove '<p>' from the end of the string. */
	if ( substr( $content, -3, 3 ) == '<p>' )
	    $content = substr( $content, 0, -3 );

	/* Remove any instances of '<p></p>'. */
	$pattern = "/<p[^>]*><\\/p[^>]*>/";
	$content = preg_replace( $pattern, '', $content );

	return apply_filters( 'mtphr_shortcodes_parse_shortcode_content', $content );
}



add_action( 'plugins_loaded', 'mtphr_shortcodes_localization' );
/**
 * Setup localization
 *
 * @since 1.0.0
 */
function mtphr_shortcodes_localization() {
  load_plugin_textdomain( 'mtphr-shortcodes', false, 'mtphr-shortcodes/languages/' );
}



