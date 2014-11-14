<?php

/* --------------------------------------------------------- */
/* !Ajax slide graph shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_slide_graph_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_slide_graph">
		<input type="hidden" class="shortcode" value="mtphr_slide_graph" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Slide Graph', 'mtphr-shortcodes'); ?></h2>
		
		<div class="row">
		
			<div class="col-md-5">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title', 'mtphr-shortcodes'); ?> <small>(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="title" placeholder="<?php _e('Title', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title Width', 'mtphr-shortcodes'); ?> <small>(<?php _e('pixels', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-number" type="number" name="title_width" placeholder="80" />
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Percentage', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-number" type="number" name="percent" placeholder="50" />
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Percentage Label', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="percent_label" />
				</div>
			</div>
		
		</div><!-- .row -->
		
	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_slide_graph_gen', 'mtphr_shortcode_slide_graph_gen' );