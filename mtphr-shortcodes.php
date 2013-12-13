<?php
/*
Plugin Name: Metaphor Shortcodes
Description: Includes Column Grids, Pricing Tables, Post Sliders & Post Blocks.
Version: 2.0.9
Author: Metaphor Creations
Author URI: http://www.metaphorcreations.com
License: GPL2
*/

/*
Copyright 2012 Metaphor Creations  (email : joe@metaphorcreations.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/




// Check if the old plugin is installed
$active_plugins = get_option( 'active_plugins', array() );
if( in_array('mtphr-shortcodes-pack-1/mtphr-shortcodes-pack-1.php', $active_plugins) ) {

	add_action('admin_notices', 'mtphr_shortcodes_admin_notice');
	/**
	 * Display an admin notice
	 *
	 * @since 1.0.0
	 */
	function mtphr_shortcodes_admin_notice(){
    echo '<div class="updated"><p>'.__('In order to use the new <strong>Metaphor Shortcodes</strong> you must deactivate <strong>Metaphor Shortcodes Pack #1</strong>','mtphr-shortcodes').'</p></div>';
	}

} else {

	/**Define Widget Constants */
	if ( WP_DEBUG ) {
		define ( 'MTPHR_SHORTCODES_VERSION', '2.0.9-'.time() );
	} else {
		define ( 'MTPHR_SHORTCODES_VERSION', '2.0.9' );
	}
	define ( 'MTPHR_SHORTCODES_DIR', plugin_dir_path(__FILE__) );
	define ( 'MTPHR_SHORTCODES_URL', plugins_url().'/mtphr-shortcodes' );

	// Load the admin functions
	if ( is_admin() ) {
		require_once( MTPHR_SHORTCODES_DIR.'includes/metaboxer/metaboxer.php' );
		require_once( MTPHR_SHORTCODES_DIR.'includes/metaboxer/metaboxer-class.php' );
		require_once( MTPHR_SHORTCODES_DIR.'includes/settings.php' );
		require_once( MTPHR_SHORTCODES_DIR.'includes/shortcode-gen.php' );
	}

	// Load the general functions
	require_once( MTPHR_SHORTCODES_DIR.'includes/scripts.php' );
	require_once( MTPHR_SHORTCODES_DIR.'includes/functions.php' );
	require_once( MTPHR_SHORTCODES_DIR.'includes/shortcodes.php' );

}


