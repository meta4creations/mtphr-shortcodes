<?php

/* --------------------------------------------------------- */
/* !Ajax pricing table shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_pricing_table_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_pricing_table">
		<input type="hidden" class="shortcode" value="mtphr_pricing_table" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Pricing Table(s)', 'mtphr-shortcodes'); ?></h2>
		
		<div class="mtphr-shortcode-gen-clone">
			
			<div class="row">
			
				<div class="col-md-2">
					<div class="mtphr-ui-form-group">
						<label class="mtphr-ui-label-top"><?php _e('Grid Span', 'mtphr-shortcodes'); ?></label>
						<select class="mtphr-ui-select" name="span">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option selected="selected">12</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="mtphr-ui-form-group">
						<label class="mtphr-ui-label-top"><?php _e('Style', 'mtphr-shortcodes'); ?></label>
						<select class="mtphr-ui-select" name="style">
							<option value="normal"><?php _e('Normal', 'mtphr-shortcodes'); ?></option>
							<option value="condensed"><?php _e('Condensed', 'mtphr-shortcodes'); ?></option>
							<option value="list"><?php _e('List', 'mtphr-shortcodes'); ?></option>
						</select>
					</div>
				</div>
			
			</div><!-- .row -->
			
			<div class="row">
				
				<div class="col-md-6">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Title', 'mtphr-shortcodes'); ?></label>
						<input class="mtphr-ui-text" type="text" name="title" placeholder="<?php _e('Title', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Dollar Amount', 'mtphr-shortcodes'); ?></label>
						<input class="mtphr-ui-text" type="text" name="dollar" placeholder="<?php _e('$9', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Cent Amount', 'mtphr-shortcodes'); ?></label>
						<input class="mtphr-ui-text" type="text" name="cents" placeholder="<?php _e('99', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Per', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
						<input class="mtphr-ui-text" type="text" name="per" placeholder="<?php _e('per month', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
			
			</div><!-- .row -->
			
			<div class="row">
				
				<div class="col-md-4">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Button Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
						<input class="mtphr-ui-text" type="text" name="button" placeholder="<?php _e('Sign Up', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
				
				<div class="col-md-8">
					<div class="mtphr-ui-form-group mtphr-shortcode-gen-set-1">
						<label class="mtphr-ui-label-top"><?php _e('Button Link', 'mtphr-shortcodes'); ?></label>
						<input class="mtphr-ui-text" type="text" name="link" placeholder="<?php _e('http://www.paypal.com', 'mtphr-shortcodes'); ?>" />
					</div>
				</div>
			
			</div><!-- .row -->
			
			<div class="mtphr-ui-form-group">
				<label class="mtphr-ui-label-top"><?php _e('CSS Class', 'mtphr-shortcodes'); ?></label>
				<input class="mtphr-ui-text" type="text" name="class" />
			</div>
		
		</div><!-- .mtphr-shortcode-gen-clone -->

	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_pricing_table_gen', 'mtphr_shortcode_pricing_table_gen' );