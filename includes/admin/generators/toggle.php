<?php

/* --------------------------------------------------------- */
/* !Ajax toggle shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_toggle_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_toggle">
		<input type="hidden" class="shortcode" value="mtphr_toggle" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Content Toggle', 'mtphr-shortcodes'); ?></h2>
		
		<div class="row">
			
			<div class="col-md-9">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Heading', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="heading" />
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Expand initial state', 'mtphr-shortcodes'); ?></label>
					<label class="mtphr-ui-checkbox-label"><input class="mtphr-ui-checkbox" type="checkbox" name="condensed" value="false" /> <?php _e('Expanded', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="mtphr-ui-form-group">
			<label class="mtphr-ui-label-top"><?php _e('CSS Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input class="mtphr-ui-text" type="text" name="class" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
		</div>
		
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_toggle_gen', 'mtphr_shortcode_toggle_gen' );