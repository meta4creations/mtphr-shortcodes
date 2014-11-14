<?php

/* --------------------------------------------------------- */
/* !Ajax tab shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_tab_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_tab">
		<input type="hidden" class="shortcode" value="mtphr_tab" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Content Tabs', 'mtphr-shortcodes'); ?></h2>
		
		<div class="mtphr-shortcode-gen-clone">
		
			<div class="row">
				
				<div class="col-md-3">
					<div class="mtphr-ui-form-group">
						<label class="mtphr-ui-label-top"><?php _e('Tab Title', 'mtphr-shortcodes'); ?></label>
						<input class="mtphr-ui-text" type="text" name="title" />
					</div>
				</div>
			
			</div><!-- .row -->
			
			<div class="row">
				
				<div class="col-md-7">
					<div class="mtphr-ui-form-group">
						<label class="mtphr-ui-label-top"><?php _e('Image Path', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
						<input class="mtphr-ui-text" type="text" name="image" />
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Image Width', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
						<input class="mtphr-ui-number" type="number" name="image_width" placeholder="100" />
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Image Alt Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
						<input class="mtphr-ui-text" type="text" name="image_alt" />
					</div>
				</div>
			
			</div><!-- .row -->
			
			<div class="mtphr-ui-form-group">
				<a class="mtphr-shortcode-gen-clone-add button" href="#"><?php _e('Add tab', 'mtphr-shortcodes'); ?></a>&nbsp;&nbsp;
				<a class="mtphr-shortcode-gen-clone-delete deletion button" href="#"><?php _e('Delete tab', 'mtphr-shortcodes'); ?></a>
			</div>
			
		</div>
		
	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_tab_gen', 'mtphr_shortcode_tab_gen' );