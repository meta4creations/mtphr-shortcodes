<?php
/**
 * The global settings
 *
 * @package Metaphor Shortcodes
 */




add_action( 'admin_menu', 'mtphr_shortcodes_settings_menu', 9 );
/**
 * Create the settings page
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_settings_menu() {

	add_plugins_page(
		__( 'Metaphor Shortcodes', 'mtphr-shortcodes' ),			// The value used to populate the browser's title bar when the menu page is active
		__( 'Metaphor Shortcodes', 'mtphr-shortcodes' ),			// The label of this submenu item displayed in the menu
		'administrator',																			// What roles are able to access this submenu item
		'mtphr_shortcodes_settings',													// The ID used to represent this submenu item
		'mtphr_shortcodes_settings_display'										// The callback function used to render the options for this submenu item
	);
}




add_action( 'admin_init', 'mtphr_shortcodes_initialize_settings' );
/**
 * Setup the custom options for the settings page
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_initialize_settings() {


	$fields = array();

	$fields['responsive'] = array(
		'title' => __( 'Responsive Grid', 'mtphr-shortcodes' ),
		'type' => 'checkbox',
		'label' => __( 'Make grids responsive', 'mtphr-shortcodes' ),
		'description' => __( '*Note: This may be overriden by theme settings, if your theme hooks into the shortcodes.', 'mtphr-shortcodes' )
	);

	if( false == get_option('mtphr_shortcodes_settings') ) {
		add_option( 'mtphr_shortcodes_settings' );
	}

	/* Register the general options */
	add_settings_section(
		'mtphr_shortcodes_settings_section',				// ID used to identify this section and with which to register options
		'',																									// Title to be displayed on the administration page
		'mtphr_shortcodes_settings_description',				// Callback used to render the description of the section
		'mtphr_shortcodes_settings'									// Page on which to add this section of options
	);

	if( is_array($fields) ) {
		foreach( $fields as $id => $setting ) {
			$setting['option'] = 'mtphr_shortcodes_settings';
			$setting['option_id'] = $id;
			$setting['id'] = 'mtphr_shortcodes_settings['.$id.']';
			add_settings_field( $setting['id'], $setting['title'], 'mtphr_shortcodes_settings_callback', 'mtphr_shortcodes_settings', 'mtphr_shortcodes_settings_section', $setting);
		}
	}

	// Register the fields with WordPress
	register_setting( 'mtphr_shortcodes_settings', 'mtphr_shortcodes_settings' );
}




/**
 * Render the theme options page
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_settings_display( $active_tab = null ) {
	?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<div id="icon-themes" class="icon32"></div>
		<h2><?php _e( 'Metaphor Shortcodes Settings', 'mtphr-shortcodes' ); ?></h2>
		<?php settings_errors(); ?>

		<ul style="margin-bottom:20px;" class="subsubsub">
		</ul>

		<br class="clear" />

		<form method="post" action="options.php">
			<?php
			settings_fields( 'mtphr_shortcodes_settings' );
			do_settings_sections( 'mtphr_shortcodes_settings' );
			submit_button();
			?>
		</form>

	</div><!-- /.wrap -->
	<?php
}




/**
 * General options section callback
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_settings_description() {
}




/**
 * The custom field callback.
 *
 * @since 2.0.3
 */
function mtphr_shortcodes_settings_callback( $args ) {

	// First, we read the options collection
	if( isset($args['option']) ) {
		$options = get_option( $args['option'] );
		$value = isset( $options[$args['option_id']] ) ? $options[$args['option_id']] : '';
	} else {
		$value = get_option( $args['id'] );
	}
	if( $value == '' && isset($args['default']) ) {
		$value = $args['default'];
	}
	if( isset($args['type']) ) {

		echo '<div class="mtphr-shortcodes-metaboxer-field mtphr-shortcodes-metaboxer-'.$args['type'].'">';

		// Call the function to display the field
		if ( function_exists('mtphr_shortcodes_metaboxer_'.$args['type']) ) {
			call_user_func( 'mtphr_shortcodes_metaboxer_'.$args['type'], $args, $value );
		}

		echo '<div>';
	}

	// Add a descriptions
	if( isset($args['description']) ) {
		echo '<span class="description"><small>'.$args['description'].'</small></span>';
	}
}


