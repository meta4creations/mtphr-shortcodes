<?php

/* --------------------------------------------------------- */
/* !Add shortcodes to the generator - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcodes() {

	global $mtphr_shortcode_gen_assets;

	$shortcodes = array();
	$shortcodes['mtphr_shortcode_grid_gen'] = array(
		'label' => __('Grid', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-layout-4'
	);
	$shortcodes['mtphr_shortcode_post_slider_gen'] = array(
		'label' => __('Post Slider', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-create-new'
	);
	$shortcodes['mtphr_shortcode_post_block_gen'] = array(
		'label' => __('Post Block', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-create-new'
	);
	$shortcodes['mtphr_shortcode_pricing_table_gen'] = array(
		'label' => __('Pricing Table', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-dollar-bag'
	);
	$shortcodes['mtphr_shortcode_slide_graph_gen'] = array(
		'label' => __('Slide Graph', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-graph-chart-4'
	);
	$shortcodes['mtphr_shortcode_tab_gen'] = array(
		'label' => __('Content Tabs', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-folder'
	);
	$shortcodes['mtphr_shortcode_toggle_gen'] = array(
		'label' => __('Content Toggle', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-plus'
	);
	$shortcodes['mtphr_shortcode_icon_gen'] = array(
		'label' => __('Icon', 'mtphr-shortcodes'),
		'icon' => 'mtphr-shortcodes-ico-yin-yang'
	);

	// Add the shortcodes to the list
	$mtphr_shortcode_gen_assets['mtphr_shortcodes'] = array(
		'label' => __('Metaphor Shortcodes', 'mtphr-shortcodes'),
		'shortcodes' => $shortcodes
	);
}
add_action( 'admin_init', 'mtphr_shortcodes_shortcodes' );




/* --------------------------------------------------------- */
/* !Add the media button - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcode_media_button(){
	
	echo '<a class="mtphr-shortcodes-modal-link button" href="#mtphr-shortcodes-generator"><strong>[m]</strong> '.__('Shortcodes', 'mtphr-shortcodes').'</a>';
}
add_action( 'media_buttons', 'mtphr_shortcodes_shortcode_media_button', 11 );





/* --------------------------------------------------------- */
/* !Taxonomy change - 2.2.1 */
/* --------------------------------------------------------- */

function mtphr_shortcode_gen_tax_change() {
	
	// Get access to the database
	global $wpdb;

	// Check the nonce
	check_ajax_referer( 'mtphr-shortcodes', 'security' );

	// Get variables
	$taxonomy = $_POST['taxonomy'];
	
	$html = mtphr_shortcodes_select_terms( $taxonomy );
  
  echo $html;

	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_mtphr_shortcode_gen_tax_change', 'mtphr_shortcode_gen_tax_change' );

