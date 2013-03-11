<?php
/**
 * Load CSS & jQuery Scripts
 *
 * @package Metaphor Shortcodes Pack #1
 */




add_action( 'wp_enqueue_scripts', 'mtphr_shortcodes_scripts' );
/**
 * Load scripts to the font end
 *
 * @since 1.0.0
 */
function mtphr_shortcodes_scripts() {
	
	wp_register_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/css/style.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes' );
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