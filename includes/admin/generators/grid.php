<?php

/* --------------------------------------------------------- */
/* !Ajax grid shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_grid_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_grid">
		<input type="hidden" class="shortcode" value="mtphr_grid" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Grid', 'mtphr-shortcodes'); ?></h2>
		
		
		<p style="margin-top:0;">
			<label class="mtphr-ui-label-top"><?php _e('Column Spans', 'mtphr-shortcodes'); ?></label>
			<small><?php _e('Total spans must equal 12', 'mtphr-shortcodes'); ?></small>
		</p>
		
		<div class="mtphr-ui-form-group">
			<div class="row mtphr-shortcode-gen-grid-container"></div>
		</div>
		
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_grid_gen', 'mtphr_shortcode_grid_gen' );