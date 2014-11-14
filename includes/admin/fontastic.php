<?php

/* --------------------------------------------------------- */
/* !Store the included icon classes - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_icon_classes() {

	$latest_version = get_option( 'mtphr_shortcodes_version', '1.0.0' );
	$icon_groups = get_option( 'mtphr_shortcodes_icon_groups', array() );
	
	if( version_compare($latest_version, '2.2.0', '<') || empty($icon_groups) ) {
		
		// Update the icons
		mtphr_shortcodes_update_icons();
		
		// Update the latest version
		update_option( 'mtphr_shortcodes_version', '2.2.0' ); 
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
/* !Grab classes from Fontastic CSS file - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_parse_fontastic_css') ) {
function mtphr_shortcodes_parse_fontastic_css( $stylesheet ) {
	
	WP_Filesystem();
	
	global $wp_filesystem;
	
	$content = $wp_filesystem->get_contents( $stylesheet );

	// Get the icon font prefix
	$start = '[class^="';
	$end = '-"]:before';
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









/*
if( !function_exists('mtphr_shortcodes_update_custom_fonts') ) {
function mtphr_shortcodes_update_custom_fonts() {
	
	// Get the upload directory
	$upload_dir = wp_upload_dir();	
	$shortcodes_upload_dir = $upload_dir['basedir'].'/mtphr-shortcodes';
	$shortcodes_upload_url = $upload_dir['baseurl'].'/mtphr-shortcodes';
	$results = scandir($shortcodes_upload_dir);
	
	$stylesheets = array();
	
	if( is_array($results) && count($results) > 0 ) {
		foreach( $results as $i=>$result ) {
			if ($result === '.' or $result === '..') continue;
			if( is_dir($shortcodes_upload_dir.'/'.$result) && file_exists($shortcodes_upload_dir.'/'.$result.'/styles.css') ) {
				$stylesheets[] = $shortcodes_upload_url.'/'.$result.'/styles.css';
	    }	
		}
	}
	
	if( is_array($stylesheets) && count($stylesheets) > 0 ) {
		update_option( 'mtphr_shortcodes_custom_icon_stylesheets', $stylesheets );	
	} else {
		delete_option( 'mtphr_shortcodes_custom_icon_stylesheets' );
	}
	
	echo '<pre>';print_r($stylesheets);echo '</pre>';
	
	foreach ($results as $result) {
	    if ($result === '.' or $result === '..') continue;
	
	    if (is_dir($path . '/' . $result)) {
	        //code to use if directory
	    }
	}
}
}
add_action( 'admin_init', 'mtphr_shortcodes_update_custom_fonts' );
*/





/* --------------------------------------------------------- */
/* !Process a Fontastic import from a zip file - 2.2.0 */
/* --------------------------------------------------------- */

/*
function mtphr_shortcodes_process_fontastic_import() {
	
	if( empty($_POST['mtphr_shortcodes_action']) || !isset($_POST['mtphr-shortcodes-import-fontastic']) )
		return;

	if( ! wp_verify_nonce( $_POST['mtphr_shortcodes_import_nonce'], 'mtphr_shortcodes_import_nonce' ) )
		return;

	if( ! current_user_can( 'manage_options' ) )
		return;
		
	$filename = $_FILES['import_fontastic_file']['name'];
	$filename_parts = explode( '.', $filename );
	$extension = end( $filename_parts );

	if( $extension != 'zip' ) {
		wp_die( __( 'Please upload a valid .zip file', 'mtphr-shortcodes' ) );
	}
	
	$import_file = $_FILES['import_fontastic_file']['tmp_name'];

	if( empty( $import_file ) ) {
		wp_die( __( 'Please upload a file to import', 'mtphr-shortcodes' ) );
	}
	
	if( !function_exists('wp_handle_upload') ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
	
	// Get the upload directory
	$upload_dir = wp_upload_dir();
	
	$shortcodes_upload_dir = $upload_dir['basedir'].'/mtphr-shortcodes';
	$shortcodes_upload_url = $upload_dir['baseurl'].'/mtphr-shortcodes';
	
	// Create the galleries directory
	if( !file_exists($shortcodes_upload_dir) ) {
	  mkdir( $shortcodes_upload_dir );
	}
	
	// Move the zip file
	$zip = $shortcodes_upload_dir.'/'.$filename;
	if( move_uploaded_file($import_file, $zip) ) {
    WP_Filesystem();
    
    // Unzip the zip file
    $unzipfile = unzip_file( $zip, $shortcodes_upload_dir );

		// Delete the zip file
		unlink( $zip );
	}
	
	mtphr_shortcodes_update_custom_fonts();

	wp_safe_redirect( admin_url( 'plugins.php?page=mtphr_shortcodes_settings' ) ); exit;
}
add_action( 'admin_init', 'mtphr_shortcodes_process_fontastic_import' );
*/


