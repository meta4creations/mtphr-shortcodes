<?php

/* --------------------------------------------------------- */
/* !Load the admin scripts - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_admin_scripts( $hook ) {

	global $typenow;
	if ( $hook == 'plugins_page_mtphr_shortcodes_settings' ) {

		// Load the style sheet
		wp_register_style( 'mtphr-shortcodes-metaboxer', MTPHR_SHORTCODES_URL.'/includes/metaboxer/metaboxer.css', false, MTPHR_SHORTCODES_VERSION );
		wp_enqueue_style( 'mtphr-shortcodes-metaboxer' );
	}

	wp_register_style( 'mtphr-shortcodes-font', MTPHR_SHORTCODES_URL.'/assets/fontastic/styles.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes-font' );
	
	wp_register_style( 'bootstrap-grid', MTPHR_SHORTCODES_URL.'/assets/css/bootstrap-grid.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'bootstrap-grid' );
	
	wp_register_style( 'mtphr-ui', MTPHR_SHORTCODES_URL.'/assets/mtphr-ui/style.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-ui' );
	//wp_register_script( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/js/admin/script.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	//wp_enqueue_script( 'mtphr-shortcodes' );

	wp_register_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/css/admin/style.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes' );
	wp_register_script( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/js/admin/script.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'mtphr-shortcodes' );

	// Shortcode generator
	wp_register_script( 'mtphr-shortcodes-generator', MTPHR_SHORTCODES_URL.'/assets/js/admin/generator.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'mtphr-shortcodes-generator' );
	wp_localize_script( 'mtphr-shortcodes-generator', 'mtphr_shortcodes_generator_vars', array(
			'security' => wp_create_nonce( 'mtphr-shortcodes' ),
			'mtphr_grid_content' => __('<p>Add grid content here...</p>', 'mtphr-shortcodes'),
			'mtphr_toggle_content' => __('<p>Add toggled content here...</p>', 'mtphr-shortcodes'),
			'mtphr_pricing_table_content' => __('<p>Add each line item as a new paragraph...</p>', 'mtphr-shortcodes'),
			'mtphr_pricing_table_list_content' => __('<p>Add each line item as a new paragraph. <strong>Make the value bold ($9.99)</strong></p>', 'mtphr-shortcodes'),
			'mtphr_tab_content' => __('<p>Add tab content here...</p>', 'mtphr-shortcodes'),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'mtphr_shortcodes_admin_scripts' );