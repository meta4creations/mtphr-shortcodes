<?php
/**
 * Put all the general code here
 *
 * @package Metaphor Shortcodes
 */
 
 
 

/**
 * Set a maximum excerpt length
 *
 * @since 1.0.0
 */
function mtphr_shortcodes_excerpt( $length = 200, $more = '&hellip;' ) {
	echo get_mtphr_shortcodes_excerpt( $length, $more );
}

function get_mtphr_shortcodes_excerpt( $length = 200, $more = '&hellip;' ) {
	$excerpt = get_the_excerpt();
	$length++;
	
	$output = '';
	if ( mb_strlen( $excerpt ) > $length ) {
		$subex = mb_substr( $excerpt, 0, $length - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			$output .= mb_substr( $subex, 0, $excut );
		} else {
			$output .= $subex;
		}
		$output .= $more;
	} else {
		$output .= $excerpt;
	}
	return $output;
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
  load_plugin_textdomain( 'mtphr-shortcodes', false, MTPHR_SHORTCODES_DIR.'languages/' );
}



