<?php


/* --------------------------------------------------------- */
/* !Initializes the settings page - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_initialize_settings() {

	$settings = mtphr_shortcodes_settings();
	
	
	/* --------------------------------------------------------- */
	/* !Add the setting sections - 2.2.0 */
	/* --------------------------------------------------------- */

	add_settings_section( 'mtphr_shortcodes_settings_section', __( 'General settings', 'mtphr-shortcodes' ).'<input type="submit" class="button button-small" value="'.__('Save Changes', 'mtphr-shortcodes').'">', false, 'mtphr_shortcodes_settings' );
	
	
	/* --------------------------------------------------------- */
	/* !Add the general settings - 2.2.0 */
	/* --------------------------------------------------------- */

	/* Toggle responsiveness */
	add_settings_field(
		'mtphr_shortcodes_settings_responsive',
		mtphr_shortcodes_settings_label( __( 'Responsive Grid', 'mtphr-shortcodes' ), __('Enable responsiveness of the grid', 'mtphr-shortcodes') ),
		'mtphr_shortcodes_settings_checkbox',
		'mtphr_shortcodes_settings',
		'mtphr_shortcodes_settings_section',
		array(
			'name' => 'mtphr_shortcodes_settings[responsive]',
			'value' => $settings['responsive'],
			'label' => __('Make grids responsive', 'mtphr-shortcodes')
		)
	);
	
	/* Post slider settings */
	add_settings_field(
		'mtphr_shortcodes_settings_post_sliders',
		mtphr_shortcodes_settings_label( __( 'Post Slider Settings', 'mtphr-shortcodes' ), __('Set the default speed and easing of the post sliders', 'mtphr-shortcodes') ),
		'mtphr_shortcodes_settings_speed_ease',
		'mtphr_shortcodes_settings',
		'mtphr_shortcodes_settings_section',
		array(
			'name' => 'mtphr_shortcodes_settings[slide_speed]',
			'value' => $settings['slide_speed'],
			'name_ease' => 'mtphr_shortcodes_settings[slide_ease]',
			'value_ease' => $settings['slide_ease'],
		)
	);
	
	/* Tabs settings */
	add_settings_field(
		'mtphr_shortcodes_settings_tabs',
		mtphr_shortcodes_settings_label( __( 'Tab Settings', 'mtphr-shortcodes' ), __('Set the default speed and easing of tabs', 'mtphr-shortcodes') ),
		'mtphr_shortcodes_settings_speed_ease',
		'mtphr_shortcodes_settings',
		'mtphr_shortcodes_settings_section',
		array(
			'name' => 'mtphr_shortcodes_settings[tab_speed]',
			'value' => $settings['tab_speed'],
			'name_ease' => 'mtphr_shortcodes_settings[tab_ease]',
			'value_ease' => $settings['tab_ease'],
		)
	);
	
	/* Icons settings */
	/*
add_settings_field(
		'mtphr_shortcodes_settings_icons',
		mtphr_shortcodes_settings_label( __( 'Custom Icons', 'mtphr-shortcodes' ), __('Add custom icons', 'mtphr-shortcodes') ),
		'mtphr_shortcodes_settings_custom_icons',
		'mtphr_shortcodes_settings',
		'mtphr_shortcodes_settings_section',
		array(
			'name' => 'mtphr_shortcodes_settings[icons]',
			'value' => $settings['icons']
		)
	);
*/
	
	
	/* --------------------------------------------------------- */
	/* !Register the settings - 2.2.0 */
	/* --------------------------------------------------------- */

	if( false == get_option('mtphr_shortcodes_settings') ) {
		add_option( 'mtphr_shortcodes_settings' );
	}
	register_setting( 'mtphr_shortcodes_settings', 'mtphr_shortcodes_settings', 'mtphr_shortcodes_settings_sanitize' );
}
add_action( 'admin_init', 'mtphr_shortcodes_initialize_settings' );



/* --------------------------------------------------------- */
/* !Sanitize the setting fields - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_sanitize') ) {
function mtphr_shortcodes_settings_sanitize( $fields ) {

	// Create an array for WPML to translate
	//$wpml = array();

	// General settings
	if( isset($fields['slide_speed']) ) {
		$fields['slide_speed'] = isset( $fields['slide_speed'] ) ? intval($fields['slide_speed']) : '';
	}
	
	// Register translatable fields
	//mtphr_galleries_register_translate_settings( $wpml );

	return wp_parse_args( $fields, get_option('mtphr_shortcodes_settings', array()) );
}
}



/* --------------------------------------------------------- */
/* !Create the settings page - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_settings_menu() {

	add_plugins_page(
		__( 'Metaphor Shortcodes', 'mtphr-shortcodes' ),			// The value used to populate the browser's title bar when the menu page is active
		__( 'Metaphor Shortcodes', 'mtphr-shortcodes' ),			// The label of this submenu item displayed in the menu
		'administrator',																			// What roles are able to access this submenu item
		'mtphr_shortcodes_settings',													// The ID used to represent this submenu item
		'mtphr_shortcodes_settings_display'										// The callback function used to render the options for this submenu item
	);
}
add_action( 'admin_menu', 'mtphr_shortcodes_settings_menu', 9 );



/* --------------------------------------------------------- */
/* !Render the settings page - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_settings_display( $active_tab = null ) {
	?>

	<div class="wrap">

		<div id="icon-mtphr-shortcodes" class="icon32"></div>
		<h2><?php _e( 'Shortcodes Settings', 'mtphr-shortcodes' ); ?></h2>
		<?php settings_errors(); ?>

		<form enctype="multipart/form-data" method="post" action="options.php">
			<?php
			settings_fields( 'mtphr_shortcodes_settings' );
			do_settings_sections( 'mtphr_shortcodes_settings' );
			submit_button();
			?>
		</form>

	</div><!-- /.wrap -->
	<?php
}
