<?php

/* --------------------------------------------------------- */
/* !Return the shortcode settings w/defaults - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings') ) {
function mtphr_shortcodes_settings() {

	// Get the options
	$settings = get_option( 'mtphr_shortcodes_settings', array() );

	$defaults = array(
		'responsive' => false,
		'slide_speed' => 1000,
		'slide_ease' => 'easeOutExpo',
		'tab_speed' => 1000,
		'tab_ease' => 'easeOutExpo',
		'icons' => ''
	);
	$defaults = apply_filters( 'mtphr_shortcodes_default_settings', $defaults );

	return wp_parse_args( $settings, $defaults );
}
}