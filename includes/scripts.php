<?php
/**
 * Load CSS & jQuery Scripts
 *
 * @package Metaphor Shortcodes
 */


add_action( 'wp_enqueue_scripts', 'mtphr_shortcodes_scripts' );
/**
 * Load scripts to the font end
 *
 * @since 2.3
 */
function mtphr_shortcodes_scripts() {
	
	// Load mtphr tabs scripts
	wp_enqueue_style( 'mtphr-tabs', MTPHR_SHORTCODES_URL.'assets/mtphr-tabs/mtphr-tabs.css', false, filemtime(MTPHR_SHORTCODES_DIR.'assets/mtphr-tabs/mtphr-tabs.css') );
  wp_register_script( 'mtphr-tabs', MTPHR_SHORTCODES_URL.'assets/mtphr-tabs/mtphr-tabs.js', false, filemtime(MTPHR_SHORTCODES_DIR.'assets/mtphr-tabs/mtphr-tabs.js'), true );

	wp_enqueue_style( 'mtphr-shortcodes-font', MTPHR_SHORTCODES_URL.'assets/fontastic/styles.css', false, filemtime(MTPHR_SHORTCODES_DIR.'assets/fontastic/styles.css') );	
	wp_enqueue_style( 'mtphr-shortcodes-fontawesome', MTPHR_SHORTCODES_URL.'assets/font-awesome/css/font-awesome.min.css', false, '4.7.0' );

	wp_enqueue_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'assets/css/style.css', false, filemtime(MTPHR_SHORTCODES_DIR.'assets/css/style.css') );
	if( is_rtl() ) {
		wp_enqueue_style( 'mtphr-shortcodes-rtl', MTPHR_SHORTCODES_URL.'assets/css/rtl.css', false, filemtime(MTPHR_SHORTCODES_DIR.'assets/css/rtl.css') );
	}

	wp_enqueue_script( 'respond', MTPHR_SHORTCODES_URL.'assets/js/respond.min.js', array('jquery'), '1.1.0', true );

	wp_enqueue_script( 'touchSwipe', MTPHR_SHORTCODES_URL.'assets/js/jquery.touchSwipe.min.js', array('jquery'), filemtime(MTPHR_SHORTCODES_DIR.'assets/js/jquery.touchSwipe.min.js'), true );

	wp_register_script( 'jquery-easing', MTPHR_SHORTCODES_URL.'assets/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_register_script( 'mtphr-post-slider', MTPHR_SHORTCODES_URL.'assets/js/mtphr-post-slider.js', array('jquery', 'jquery-easing'), filemtime(MTPHR_SHORTCODES_DIR.'assets/js/mtphr-post-slider.js'), true );
	wp_register_script( 'mtphr-slide-graph', MTPHR_SHORTCODES_URL.'assets/js/mtphr-slide-graph.js', array('jquery', 'jquery-easing'), filemtime(MTPHR_SHORTCODES_DIR.'assets/js/mtphr-slide-graph.js'), true );
	wp_register_script( 'mtphr-toggles', MTPHR_SHORTCODES_URL.'assets/js/mtphr-toggles.js', array('jquery', 'jquery-easing'), filemtime(MTPHR_SHORTCODES_DIR.'assets/js/mtphr-toggles.js'), true );
	
	wp_localize_script( 'mtphr-post-slider', 'mtphr_post_slider_vars', array(
			'is_rtl' => is_rtl()
		)
	);
	wp_localize_script( 'mtphr-slide-graph', 'mtphr_slide_graph_vars', array(
			'is_rtl' => is_rtl()
		)
	);
}




add_action( 'wp_footer', 'mtphr_shortcodes_footer_scripts' );
/**
 * Add post slider class
 *
 * @since 2.2.0
 */
function mtphr_shortcodes_footer_scripts() {

	global $mtphr_post_slider, $mtphr_post_gallery, $mtphr_slide_graphs, $mtphr_tabs, $mtphr_toggles;
	$settings = mtphr_shortcodes_settings();
	
	// Start the html string
	$html = '';

	if( is_array($mtphr_post_slider) && !empty($mtphr_post_slider) ) {
		wp_print_scripts( 'jquery-easing' );
		wp_print_scripts( 'mtphr-post-slider' );
		
		foreach( $mtphr_post_slider as $id => $options ) {
			$html .= 'jQuery(\'#'.$id.'\').mtphr_post_slider({';
				$html .= 'slide_speed : '.$options['slide_speed'].',';
				$html .= 'slide_ease : \''.$options['slide_ease'].'\'';
			$html .= '});';
		}
	}	
	if( $mtphr_slide_graphs ) {
		wp_print_scripts( 'jquery-easing' );
		wp_print_scripts( 'mtphr-slide-graph' );

		$html .= 'jQuery( \'.mtphr-slide-graph\' ).mtphr_slide_graph();';
	}
	if( $mtphr_tabs ) {
		wp_print_scripts( 'jquery-easing' );
		wp_print_scripts( 'mtphr-tabs' );

		foreach( $mtphr_tabs as $id => $options ) {
			$html .= 'jQuery(\'#'.$id.'\').mtphr_tabs({';
				$html .= 'anim_speed : '.$options['tab_speed'].',';
				$html .= 'anim_ease : \''.$options['tab_ease'].'\'';
			$html .= '});';
		}
	}
	if( $mtphr_toggles ) {
		wp_print_scripts( 'jquery-easing' );
		wp_print_scripts( 'mtphr-toggles' );

		$html .= 'jQuery( \'.mtphr-toggle\' ).mtphr_toggles();';
	}
	
	if( $html != '' ) {
		$html = '<script>jQuery( window ).load( function() {'.$html.'});</script>';
		echo $html;
	}
}