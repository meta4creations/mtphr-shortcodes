<?php

/* --------------------------------------------------------- */
/* !Add shortcodes to the generator */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcodes() {

	global $mtphr_shortcode_gen_assets;

	$mtphr_shortcode_gen_assets['mtphr_shortcode_grid_gen'] = array(
		'label' => __('Grid', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_post_slider_gen'] = array(
		'label' => __('Post Slider', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_post_block_gen'] = array(
		'label' => __('Post Block', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_pricing_table_gen'] = array(
		'label' => __('Pricing Table', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_slide_graph_gen'] = array(
		'label' => __('Slide Graph', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_tab_gen'] = array(
		'label' => __('Content Tabs', 'mtphr-shortcodes')
	);
	$mtphr_shortcode_gen_assets['mtphr_shortcode_toggle_gen'] = array(
		'label' => __('Content Toggle', 'mtphr-shortcodes')
	);
}
add_action( 'admin_init', 'mtphr_shortcodes_shortcodes' );



/* --------------------------------------------------------- */
/* !Ajax grid shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_grid_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_grid_gen', 'mtphr_shortcode_grid_gen' );



/* --------------------------------------------------------- */
/* !Ajax post slider shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_slider_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_slider_gen', 'mtphr_shortcode_post_slider_gen' );



/* --------------------------------------------------------- */
/* !Ajax post block shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_block_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_block_gen', 'mtphr_shortcode_post_block_gen' );



/* --------------------------------------------------------- */
/* !Ajax pricing table shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_pricing_table_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_pricing_table_gen', 'mtphr_shortcode_pricing_table_gen' );



/* --------------------------------------------------------- */
/* !Ajax slide graph shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_slide_graph_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_slide_graph_gen', 'mtphr_shortcode_slide_graph_gen' );



/* --------------------------------------------------------- */
/* !Ajax tab shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_tab_gen() {

	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	echo 'Need to work on this one';
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_tab_gen', 'mtphr_shortcode_tab_gen' );



/* --------------------------------------------------------- */
/* !Ajax toggle shortcode */
/* --------------------------------------------------------- */

function mtphr_shortcode_toggle_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen-container">
		<input type="hidden" class="shortcode" value="mtphr_toggle" />
		<div class="mtphr-shortcode-gen-attribute">
			<input type="hidden" class="type" value="text" />
			<input type="hidden" class="label" value="heading" />
			<label><?php _e('Heading', 'mtphr-shortcodes'); ?></label>
			<input type="text" class="value" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<input type="hidden" class="type" value="checkbox" />
			<input type="hidden" class="label" value="condensed" />
			<label><?php _e('Expanded', 'mtphr-shortcodes'); ?></label>
			<input type="checkbox" class="value" value="false" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<input type="hidden" class="type" value="text" />
			<input type="hidden" class="label" value="class" />
			<label><?php _e('CSS Class', 'mtphr-shortcodes'); ?></label>
			<input type="text" class="value" placeholder="optional" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<input type="hidden" class="type" value="text" />
			<input type="hidden" class="label" value="id" />
			<label><?php _e('Filter ID', 'mtphr-shortcodes'); ?></label>
			<input type="text" class="value" placeholder="optional" />
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_toggle_gen', 'mtphr_shortcode_toggle_gen' );



/* --------------------------------------------------------- */
/* !Add the media button - 2.0.4 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcode_media_button(){
	echo '<a href="#TB_inline?width=720&amp;height=780&amp;inlineId=mtphr_shortcode_generator" class="thickbox button" id="add_mtphr_shortcode" title="'.__('Generate Metaphor Shortcode', 'mtphr-shortcodes').'"><span class="wp-media-buttons-icon"></span>'.__('Shortcodes', 'mtphr-shortcodes').'</a>';
}
add_action( 'media_buttons', 'mtphr_shortcodes_shortcode_media_button', 11 );



/* --------------------------------------------------------- */
/* !Create the lightbox display */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcode_gen_display() {
	global $mtphr_shortcode_gen_assets;
	?>
	<script>
		jQuery( window ).load( function() {
			jQuery( '.mtphr-shortcode-gen-select' ).change( function() {
				var $content = jQuery('.mtphr-shortcode-gen-content');
				if( jQuery(this).val() != 'none' ) {
					var data = {
						action: jQuery(this).val(),
						security: '<?php echo wp_create_nonce( 'mtphr_shortcode_gen_nonce' ); ?>'
					};
					jQuery.post( ajaxurl, data, function( response ) {
						$content.empty();
						$content.append( response );
					});
				}
			});
		});
		function mtphr_shortcode_gen_insert() {

			var $container = jQuery('.mtphr-shortcode-gen-container');
			var shortcode = $container.children('.shortcode').val();
			var attributes = $container.find('.mtphr-shortcode-gen-attribute');
			var attribute_string = '';

			for( var i=0; i<attributes.length; i++ ) {
				var type = jQuery(attributes[i]).children('input.type').val();
				var label = jQuery(attributes[i]).children('input.label').val();
				var value = jQuery(attributes[i]).children('input.value').val();
				attribute_string += ' '+label+'="'+value+'"';
			}

			window.send_to_editor('['+shortcode+attribute_string+']');
		}
	</script>
	<div id="mtphr_shortcode_generator" style="display:none;">
		<div class="wrap">
	    <div>
        <div style="padding:15px 15px 0 15px;">
            <h3><?php _e('Shortcode generator', 'mtphr-shortcodes'); ?></h3>
            <span><?php _e('Select a shortcode to add to your post.', 'mtphr-shortcodes'); ?></span>
        </div>
        <div style="padding:15px 15px 0 15px;">
	        <select class="mtphr-shortcode-gen-select">
	        	<option value="none"><?php _e('Select a Shortcode', 'mtphr-shortcodes'); ?></option>
	        	<?php
	        	if( is_array($mtphr_shortcode_gen_assets) ) {
	        		foreach( $mtphr_shortcode_gen_assets as $i => $shortcode ) {
		        		echo '<option value="'.$i.'">'.$shortcode['label'].'</option>';
	        		}
	        	}
	        	?>
	        </select>
        </div>
        <div class="mtphr-shortcode-gen-content" style="padding:15px;"></div>
        <div style="padding:15px;">
          <input type="button" class="button-primary" value="<?php _e('Insert Shortcode', 'mtphr-shortcodes'); ?>" onclick="mtphr_shortcode_gen_insert();"/>&nbsp;
          <a class="button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e('Cancel', 'mtphr-shortcodes'); ?></a>
        </div>
	    </div>
		</div>
	</div>
	<?php
}
add_action( 'admin_footer', 'mtphr_shortcodes_shortcode_gen_display', 99 );


