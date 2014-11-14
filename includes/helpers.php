<?php

/* --------------------------------------------------------- */
/* !Custom class filter - 2.1.1 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_sanitize_class') ) {
function mtphr_shortcodes_sanitize_class( $class='' ) {

	$classes = array();
	
	if ( !empty( $class ) ) {
		if ( !is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );
	
	return 'class="'.join( ' ', $classes ).'"';	
}
}