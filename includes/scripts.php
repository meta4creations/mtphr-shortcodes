<?php
/**
 * Load CSS & jQuery Scripts
 *
 * @package Metaphor Shortcodes
 */




add_action( 'admin_enqueue_scripts', 'mtphr_shortcodes_admin_scripts' );
/**
 * Load the admin scripts
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_admin_scripts( $hook ) {

	global $typenow;
	if ( $hook == 'plugins_page_mtphr_shortcodes_settings' ) {

		// Load the style sheet
		wp_register_style( 'mtphr-shortcodes-metaboxer', MTPHR_WIDGETS_URL.'/includes/metaboxer/metaboxer.css', false, MTPHR_WIDGETS_VERSION );
		wp_enqueue_style( 'mtphr-shortcodes-metaboxer' );
	}
}




add_action( 'wp_enqueue_scripts', 'mtphr_shortcodes_scripts' );
/**
 * Load scripts to the font end
 *
 * @since 1.0.0
 */
function mtphr_shortcodes_scripts() {

	wp_register_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/css/style.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes' );

	wp_register_script( 'respond', MTPHR_SHORTCODES_URL.'/assets/js/respond.min.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'respond' );
}



/**
 * Add post slider class
 *
 * @since 1.0.0
 */
function mtphr_post_slider_footer_scripts() {

	wp_register_script( 'mtphr-post-slider', MTPHR_SHORTCODES_URL.'/assets/js/mtphr-post-slider.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'mtphr-post-slider' );
}