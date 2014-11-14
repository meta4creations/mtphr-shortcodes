<?php


/* --------------------------------------------------------- */
/* !Return a re-formatted id - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_id') ) {
function mtphr_shortcodes_settings_id( $id ) {
	
	$id = preg_replace( '%\[%', '_', $id );
	$id = preg_replace( '%\]\[%', '_', $id );
	$id = preg_replace( '%\]%', '', $id );
	
	return $id;
}
}


/* --------------------------------------------------------- */
/* !Checkbox - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_checkbox') ) {
function mtphr_shortcodes_settings_checkbox( $args=array() ) {

	if( isset($args['name']) ) {
		
		$name = $args['name'];
		$id = isset($args['id']) ? $args['id'] : mtphr_shortcodes_settings_id($name);
		$value = isset($args['value']) ? $args['value'] : '';
		$label = isset($args['label']) ? $args['label'] : '';
		
		echo '<div id="'.$id.'">';
			echo '<label><input type="checkbox" name="'.$name.'" value="on" '.checked('on', $value, false).' /> '.$label.'</label>';
		echo '</div>';

	} else {
		echo __('Missing required data', 'mtphr-shortcodes');
	}
}
}


/* --------------------------------------------------------- */
/* !Number - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_number') ) {
function mtphr_shortcodes_settings_number( $args=array() ) {

	if( isset($args['name']) ) {
		
		$name = $args['name'];
		$id = isset($args['id']) ? $args['id'] : mtphr_shortcodes_settings_id($name);
		$value = isset($args['value']) ? $args['value'] : '';
		$width = isset($args['width']) ? intval($args['width']) : '80';
		$before = isset($args['before']) ? $args['before'].' ' : '';
		$after = isset($args['after']) ? ' '.$args['after'] : '';
		
		echo '<div id="'.$id.'">';
			echo '<label>'.$before.'<input type="number" name="'.$name.'" value="'.$value.'" style="width:'.$width.'px" />'.$after.'</label>';
		echo '</div>';

	} else {
		echo __('Missing required data', 'mtphr-shortcodes');
	}
}
}


/* --------------------------------------------------------- */
/* !Select - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_select') ) {
function mtphr_shortcodes_settings_select( $args=array() ) {

	if( isset($args['name']) ) {
		
		$name = $args['name'];
		$id = isset($args['id']) ? $args['id'] : mtphr_shortcodes_settings_id($name);
		$value = isset($args['value']) ? $args['value'] : '';
		$options = isset($args['options']) ? $args['options'] : '';
		$option_values = isset($args['option_values']) ? $args['option_values'] : false;
		
		echo '<div id="'.$id.'">';
			echo '<select name="'.$name.'">';
				if( is_array($options) && count($options) > 0 ) {
					foreach( $options as $i=>$option ) {
						if( $option_values ) {
							echo '<option value="'.$option.'" '.selected($option, $value, false).'>'.$option.'</option>';
						} else {
							echo '<option value="'.$i.'" '.selected($i, $value, false).'>'.$option.'</option>';
						}
					}
				}
			echo '</select>';
		echo '</div>';

	} else {
		echo __('Missing required data', 'mtphr-shortcodes');
	}
}
}


/* --------------------------------------------------------- */
/* !Speed & Ease - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_speed_ease') ) {
function mtphr_shortcodes_settings_speed_ease( $args=array() ) {

	if( isset($args['name']) &&  isset($args['name_ease']) ) {
		
		$name = $args['name'];
		$id = isset($args['id']) ? $args['id'] : mtphr_shortcodes_settings_id($name);
		$value = isset($args['value']) ? $args['value'] : '';
		
		$name_ease = $args['name_ease'];
		$value_ease = isset($args['value_ease']) ? $args['value_ease'] : '';
		
		$ease_options = array('linear','swing','jswing','easeInQuad','easeInCubic','easeInQuart','easeInQuint','easeInSine','easeInExpo','easeInCirc','easeInElastic','easeInBack','easeInBounce','easeOutQuad','easeOutCubic','easeOutQuart','easeOutQuint','easeOutSine','easeOutExpo','easeOutCirc','easeOutElastic','easeOutBack','easeOutBounce','easeInOutQuad','easeInOutCubic','easeInOutQuart','easeInOutQuint','easeInOutSine','easeInOutExpo','easeInOutCirc','easeInOutElastic','easeInOutBack','easeInOutBounce');
		
		echo '<div id="'.$id.'">';
			echo '<label style="margin-right:10px;"><input type="number" name="'.$name.'" value="'.$value.'" style="width:80px;" /> '.__('Hundredths of a second', 'mtphr-shortcodes').'</label>';
			echo '<label><select name="'.$name_ease.'">';
			foreach( $ease_options as $i=>$option ) {
				echo '<option value="'.$option.'" '.selected($option, $value_ease, false).'>'.$option.'</option>';
			}
			echo '</select></label>';
		echo '</div>';

	} else {
		echo __('Missing required data', 'mtphr-shortcodes');
	}
}
}


/* --------------------------------------------------------- */
/* !Custom Icons - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_settings_custom_icons') ) {
function mtphr_shortcodes_settings_custom_icons( $args=array() ) {

	if( isset($args['name']) ) {
		
		$name = $args['name'];
		$id = isset($args['id']) ? $args['id'] : mtphr_shortcodes_settings_id($name);
		$value = isset($args['value']) ? $args['value'] : '';
		
		echo '<div id="'.$id.'">';
		?>
		<div class="postbox">
			<h3><?php _e( 'Import Fonts', 'mtphr-shortcodes' ); ?></h3>
			<div class="inside">
				<p><?php _e( 'Import a .zip file from Fontastic.', 'mtphr-shortcodes' ); ?></p>
				<p>
					<input type="file" name="import_fontastic_file"/>
				</p>
				<input type="hidden" name="mtphr_shortcodes_action" value="import_fontastic" />
				<?php wp_nonce_field( 'mtphr_shortcodes_import_nonce', 'mtphr_shortcodes_import_nonce' ); ?>
				<?php submit_button( __( 'Import ZIP File', 'mtphr-shortcodes' ), 'primary', 'mtphr-shortcodes-import-fontastic', false ); ?>
			</div>
		</div>
		<?php
		echo '</div>';

	} else {
		echo __('Missing required data', 'mtphr-shortcodes');
	}
}
}
