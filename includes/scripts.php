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
 * @since 2.0.5
 */
function mtphr_shortcodes_admin_scripts( $hook ) {

	global $typenow;
	if ( $hook == 'plugins_page_mtphr_shortcodes_settings' ) {

		// Load the style sheet
		wp_register_style( 'mtphr-shortcodes-metaboxer', MTPHR_SHORTCODES_URL.'/includes/metaboxer/metaboxer.css', false, MTPHR_SHORTCODES_VERSION );
		wp_enqueue_style( 'mtphr-shortcodes-metaboxer' );
	}

	wp_register_style( 'mtphr-shortcodes-font', MTPHR_SHORTCODES_URL.'/assets/fontastic/styles.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes-font' );

	wp_register_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/css/style-admin.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes' );
	

	// Shortcode generator
	wp_register_script( 'mtphr-shortcodes-generator', MTPHR_SHORTCODES_URL.'/assets/js/shortcode-generator.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'mtphr-shortcodes-generator' );
	wp_localize_script( 'mtphr-shortcodes-generator', 'mtphr_shortcodes_generator_vars', array(
			'mtphr_grid_content' => __('<p>Add grid content here...</p>', 'mtphr-shortcodes'),
			'mtphr_toggle_content' => __('<p>Add toggled content here...</p>', 'mtphr-shortcodes'),
			'mtphr_pricing_table_content' => __('<p>Add each line item as a new paragraph...</p>', 'mtphr-shortcodes'),
			'mtphr_pricing_table_list_content' => __('<p>Add each line item as a new paragraph. <strong>Make the value bold ($9.99)</strong></p>', 'mtphr-shortcodes'),
			'mtphr_tab_content' => __('<p>Add tab content here...</p>', 'mtphr-shortcodes'),
		)
	);
}




add_action( 'wp_enqueue_scripts', 'mtphr_shortcodes_scripts' );
/**
 * Load scripts to the font end
 *
 * @since 2.0.5
 */
function mtphr_shortcodes_scripts() {

	wp_register_style( 'mtphr-shortcodes-font', MTPHR_SHORTCODES_URL.'/assets/fontastic/styles.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes-font' );

	wp_register_style( 'mtphr-shortcodes', MTPHR_SHORTCODES_URL.'/assets/css/style.css', false, MTPHR_SHORTCODES_VERSION );
	wp_enqueue_style( 'mtphr-shortcodes' );

	wp_register_script( 'respond', MTPHR_SHORTCODES_URL.'/assets/js/respond.min.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'respond' );

	wp_register_script( 'touchSwipe', MTPHR_SHORTCODES_URL.'/assets/js/jquery.touchSwipe.min.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_enqueue_script( 'touchSwipe' );

	wp_register_script( 'jquery-easing', MTPHR_SHORTCODES_URL.'/assets/js/jquery.easing.1.3.js', array('jquery'), MTPHR_SHORTCODES_VERSION, true );
	wp_register_script( 'mtphr-post-slider', MTPHR_SHORTCODES_URL.'/assets/js/mtphr-post-slider.js', array('jquery', 'jquery-easing'), MTPHR_SHORTCODES_VERSION, true );
	wp_register_script( 'mtphr-slide-graph', MTPHR_SHORTCODES_URL.'/assets/js/mtphr-slide-graph.js', array('jquery', 'jquery-easing'), MTPHR_SHORTCODES_VERSION, true );
	//wp_register_script( 'mtphr-tabs', MTPHR_SHORTCODES_URL.'/assets/js/mtphr-tabs.js', array('jquery', 'jquery-easing'), MTPHR_SHORTCODES_VERSION, true );
	wp_register_script( 'mtphr-toggles', MTPHR_SHORTCODES_URL.'/assets/js/mtphr-toggles.js', array('jquery', 'jquery-easing'), MTPHR_SHORTCODES_VERSION, true );
}




add_action( 'wp_footer', 'mtphr_shortcodes_footer_scripts' );
/**
 * Add post slider class
 *
 * @since 2.0.5
 */
function mtphr_shortcodes_footer_scripts() {

	global $mtphr_post_slider, $mtphr_post_gallery, $mtphr_slide_graphs, $mtphr_tabs, $mtphr_toggles;
	$settings = mtphr_shortcodes_settings();

	if( $mtphr_post_slider ) {
		wp_print_scripts( 'mtphr-post-slider' );
		?>
		<script>
			jQuery( window ).load( function() {
				jQuery('.mtphr-post-slider').mtphr_post_slider({
					slide_speed : <?php echo intval($settings['slide_speed']); ?>
				});
			});
		</script>
		<?php
	}	
	if( $mtphr_slide_graphs ) {
		wp_print_scripts( 'mtphr-slide-graph' );
		?>
		<script>
			jQuery( window ).load( function() {
				jQuery( '.mtphr-slide-graph' ).mtphr_slide_graph();
			});
		</script>
		<?php
	}
	if( $mtphr_tabs ) {
		wp_print_scripts( 'mtphr-tabs' );
		?>
		<script>
			jQuery( window ).load( function() {
				jQuery( '.mtphr-tabs-container' ).mtphr_tabs();
			});
		</script>
		<?php
	}
	if( $mtphr_toggles ) {
		wp_print_scripts( 'mtphr-toggles' );
		?>
		<script>
			jQuery( window ).load( function() {
				jQuery( '.mtphr-toggle' ).mtphr_toggles();
			});
		</script>
		<?php
	}
}