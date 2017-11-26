<?php

/* --------------------------------------------------------- */
/* !Store the included icon classes - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_icon_classes() {

	$latest_version = get_option( 'mtphr_shortcodes_version', '1.0.0' );
	$icon_groups = get_option( 'mtphr_shortcodes_icon_groups', array() );
	
	if( version_compare($latest_version, '2.3', '<') || empty($icon_groups) ) {
		
		// Update the icons
		mtphr_shortcodes_update_icons();
		
		// Update the latest version
		update_option( 'mtphr_shortcodes_version', '2.3' ); 
	}
}
add_action('admin_init', 'mtphr_shortcodes_icon_classes');


/* --------------------------------------------------------- */
/* !Update the icon classes - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_update_icons') ) {
function mtphr_shortcodes_update_icons() {
	
	// Get all icon groups
	$icon_groups = get_option( 'mtphr_shortcodes_icon_groups', array() );
	
	$stylesheet = MTPHR_SHORTCODES_DIR.'assets/fontastic/styles.css';
	$data = mtphr_shortcodes_parse_fontastic_css( $stylesheet );
	
	// Add or update the default group
	$icon_groups[$data['prefix']] = array(
		'title' => __('Default', 'mtphr-shortcodes'),
		'classes' => $data['classes']
	);
	
	// Add font-awesome!
	$stylesheet = MTPHR_SHORTCODES_DIR.'assets/font-awesome/css/font-awesome.css';
	$data = mtphr_shortcodes_parse_fontawesome_css( $stylesheet );

	// Add or update the default group
	$icon_groups[$data['prefix']] = array(
		'title' => __('Font Awesome', 'mtphr-shortcodes'),
		'classes' => $data['classes'],
	);
	
	// Update the icons
	update_option( 'mtphr_shortcodes_icon_groups', $icon_groups );
}
}


/* --------------------------------------------------------- */
/* !Return the Fontastic class groups - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_fontastic_icons') ) {
function mtphr_shortcodes_fontastic_icons() {

	$icon_groups = get_option( 'mtphr_shortcodes_icon_groups', array() );
	return apply_filters( 'mtphr_shortcodes_fontastic_icons', $icon_groups );
}
}


/* --------------------------------------------------------- */
/* !Grab classes from Fontastic CSS file - 2.3 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_parse_fontastic_css') ) {
function mtphr_shortcodes_parse_fontastic_css( $stylesheet, $start='[class^="', $end='-"]:before' ) {
	
	WP_Filesystem();
	
	global $wp_filesystem;
	
	$content = $wp_filesystem->get_contents( $stylesheet );
	if( !$content ) {
		$content = file_get_contents( $stylesheet );
	}

	// Get the icon font prefix
	$prefix = mtphr_shortcodes_get_between( $content, $start, $end );
	
	// Get all the classes
	preg_match_all('/\.'.$prefix.'-(.*?)\:before {/s', $content, $classes);
	
	$data = array(
		'prefix' => $prefix,
		'classes' => $classes[1]
	);
	
	return $data;
}
}


/* --------------------------------------------------------- */
/* !Grab classes from Font Awesome CSS file - 2.3 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_parse_fontawesome_css') ) {
function mtphr_shortcodes_parse_fontawesome_css( $stylesheet, $start='characters that represent icons */', $end='.sr-only {' ) {
	
	WP_Filesystem();
	
	global $wp_filesystem;
	
	$content = $wp_filesystem->get_contents( $stylesheet );
	if( !$content ) {
		$content = file_get_contents( $stylesheet );
	}

	// Get the icon font prefix
	$content = mtphr_shortcodes_get_between( $content, 'characters that represent icons */', '.sr-only {' );
	
	// Get all the classes
	preg_match_all('/\.fa-(.*?)\:before {/s', $content, $classes);
	
	$filtered_classes = array();
	if( is_array($classes[1]) && count($classes[1]) > 0 ) {
		foreach( $classes[1] as $i=>$class ) {
			$multiple = explode( ':before', $class );
			$filtered_classes[] = $multiple[0];
		}
	}
	
	$data = array(
		'prefix' => 'fa',
		'classes' => $filtered_classes
	);
	
	return $data;
}
}