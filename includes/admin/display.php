<?php

/* --------------------------------------------------------- */
/* !Create a settings label - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_label') ) {
function mtphr_shortcodes_settings_label( $title, $description = '' ) {

	$label = '<div class="mtphr-shortcodes-label-alt">';
		$label .= '<label>'.$title.'</label>';
		if( $description != '' ) {
			$label .= '<small>'.$description.'</small>';
		}
	$label .= '</div>';

	return $label;
}
}


/* --------------------------------------------------------- */
/* !Create the modal - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_modal') ) {
function mtphr_shortcodes_modal( $content='', $args=array() ) {

	$defaults = array(
		'id' => 'mtphr-shortcodes-modal-container',
		'title' => '',
		'button' => __('Submit', 'mtphr_shortcodes')
	);
	$defaults = wp_parse_args( $args, $defaults );
	extract( $defaults );
	
	echo '<div id="'.$id.'">';
		echo '<div class="media-modal-backdrop mtphr-shortcodes-modal-backdrop"></div>';
			echo '<div class="media-modal mtphr-shortcodes-modal wp-core-ui">';
				echo '<a class="media-modal-close mtphr-shortcodes-modal-close" href="#" title="Close"><span class="media-modal-icon"></span></a>';		
				echo '<div class="media-modal-content mtphr-shortcodes-modal-content">';
					
					if( $title != '' ) {
						echo '<div class="media-frame-title mtphr-shortcodes-frame-title"><h1>'.$title.'</h1></div>';
					}
					
					echo '<div class="media-frame-content mtphr-shortcodes-frame-content">'.$content.'</div>';
					
					echo '<div class="media-frame-toolbar mtphr-shortcodes-frame-toolbar">';
						echo '<div class="media-toolbar mtphr-shortcodes-toolbar">';
							echo '<div class="media-toolbar-primary mtphr-shortcodes-toolbar-primary">';
								echo '<a href="#" class="button media-button button-primary button-large media-button-insert mtphr-shortcodes-modal-submit" disabled="disabled">'.$button.'</a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
	
				echo '</div>';
			echo '</div>';	
		echo '</div>';
	echo '</div>';
}
}



/* --------------------------------------------------------- */
/* !Add the shortcodes modal - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_gen_display() {
	
	global $pagenow, $mtphr_shortcode_gen_assets;

	if( ($pagenow == 'post.php' || $pagenow == 'post-new.php') ) {

		$content = '<div class="mtphr-shortcode-gen-container">';
      
      $content .= '<div style="padding:15px 15px 0 15px;">';
        //$content .= '<select class="mtphr-shortcode-gen-select">';
        	//$content .= '<option value="none">'.__('Select a Shortcode', 'mtphr-shortcodes').'</option>';
        	
        	$group_toggles = '';
        	$shortcode_selects = '';

        	if( is_array($mtphr_shortcode_gen_assets) ) {
        		foreach( $mtphr_shortcode_gen_assets as $i => $shortcode_group ) {

        			$group_label = $shortcode_group['label'];
        			$group_toggles .= '<a class="mtphr-shortcode-gen-group-select mtphr-ui-button mtphr-ui-icon-left" href="#" data-group="'.sanitize_html_class($group_label).'"><i class="mtphr-shortcodes-ico-check"></i> '.$group_label.'</a>&nbsp;&nbsp;';
        			
        			foreach( $shortcode_group['shortcodes'] as $i => $shortcode ) {

	        			$icon = isset($shortcode['icon']) ? $shortcode['icon'] : 'mtphr-shortcodes-ico-settings';
	        			$shortcode_selects .= '<a class="mtphr-shortcode-gen-select" data-group="'.sanitize_html_class($group_label).'" data-id="'.$i.'" href="#"><i class="'.$icon.'"></i><span>'.$shortcode['label'].'</span></a>';
	        		}
        		}
        	}
        	
        	$content .= '<div class="mtphr-shortcode-gen-group-select-container">'.$group_toggles.'</div>';
        	$content .= '<div class="mtphr-shortcode-gen-select-container clearfix">'.$shortcode_selects.'</div>';
        	
        //$content .= '</select>';
      $content .= '</div>';
      
      $content .= '<div class="mtphr-shortcode-gen-content" style=""></div>';

		$content .= '</div>';
		
		// Create the modal
		$args = array(
			'id' => 'mtphr-shortcodes-generator',
			'title' => __('Shortcode Generator', 'mtphr-shortcodes'),
			'button' => __('Insert Shortcode', 'mtphr-shortcodes')
		);			
		mtphr_shortcodes_modal( $content, $args );
	}
}
add_action( 'admin_footer', 'mtphr_shortcodes_gen_display' );



/* --------------------------------------------------------- */
/* !Add generator scripts - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_gen_scripts() {
	
	global $pagenow;

	if( ($pagenow == 'post.php' || $pagenow == 'post-new.php') ) {	
	?>
		<script>
			jQuery( window ).load( function() {
	
				jQuery( '.mtphr-shortcode-gen-select' ).click( function(e) {
				
					e.preventDefault();
					
					jQuery('.mtphr-shortcode-gen-select').removeClass('active');
					jQuery(this).addClass('active');
	
					var $content = jQuery('.mtphr-shortcode-gen-content');
					var data = {
						action: jQuery(this).data('id'),
						security: '<?php echo wp_create_nonce( 'mtphr_shortcode_gen_nonce' ); ?>'
					};
					jQuery.post( ajaxurl, data, function( response ) {
						$content.empty();
						$content.append( response );
						jQuery('body').trigger('mtphr_shortcode_generator_init');
					});
				});
			});
	
			/* --------------------------------------------------------- */
			/* ! Trigger the shortcode generation and insert into editor */
			/* --------------------------------------------------------- */
			
			jQuery('.mtphr-shortcodes-modal-submit').click( function() {
				
				if( jQuery(this).attr('disabled') ) {
				} else {
				
					jQuery('body').trigger('mtphr_shortcode_generator_value');
					var $container = jQuery('.mtphr-shortcode-gen'),
							shortcode = $container.children('input.shortcode-insert').val();
	
					window.send_to_editor( shortcode );
				}
			});

		</script>
	<?php
	}
}
add_action( 'admin_footer', 'mtphr_shortcodes_gen_scripts' );


