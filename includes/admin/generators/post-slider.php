<?php

/* --------------------------------------------------------- */
/* !Ajax post slider shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_slider_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	$args = array(
	  'public'   => true
	);
	$post_types = get_post_types( $args, 'objects' );
	?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_post_slider">
		<input type="hidden" class="shortcode" value="mtphr_post_slider" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Post Slider', 'mtphr-shortcodes'); ?></h2>
		
		<div class="row">
		
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Post Type', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="type">
						<?php foreach( $post_types as $slug=>$pt ) { ?>
						<option value="<?php echo $slug; ?>"><?php echo $pt->labels->singular_name; ?></option>
						<?php } ?>
					</select>
				</div>	
			</div>
			
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Order By', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="orderby">
						<option value="ID"><?php _e('ID', 'mtphr-shortcodes'); ?></option>
						<option value="author"><?php _e('Author', 'mtphr-shortcodes'); ?></option>
						<option value="title"><?php _e('Title', 'mtphr-shortcodes'); ?></option>
						<option value="name"><?php _e('Name', 'mtphr-shortcodes'); ?></option>
						<option value="date"><?php _e('Date', 'mtphr-shortcodes'); ?></option>
						<option value="modified"><?php _e('Modified', 'mtphr-shortcodes'); ?></option>
						<option value="parent"><?php _e('Parent', 'mtphr-shortcodes'); ?></option>
						<option value="rand" selected="selected"><?php _e('Random', 'mtphr-shortcodes'); ?></option>
						<option value="comment_count"><?php _e('Comment Count', 'mtphr-shortcodes'); ?></option>
						<option value="menu_order"><?php _e('Menu Order', 'mtphr-shortcodes'); ?></option>
					</select>
				</div>		
			</div>
			
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Order', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="order">
						<option>ASC</option>
						<option selected="selected">DESC</option>
					</select>
				</div>
			</div>
			
			<div class="col-md-3">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Limit', 'mtphr-shortcodes'); ?> <small>(<?php _e('Use -1 to display all', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-number" type="number" name="limit" value="-1" />
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="row">
		
			<div class="col-md-8">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="title" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Thumbnail Size', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="thumb_size">
						<option value="none"><?php _e('None', 'mtphr-shortcodes'); ?></option>
						<option value="default" selected="selected"><?php _e('Use Default', 'mtphr-shortcodes'); ?></option>
						<option value="thumbnail"><?php _e('Thumbnail', 'mtphr-shortcodes'); ?></option>
						<option value="medium"><?php _e('Medium', 'mtphr-shortcodes'); ?></option>
						<option value="large"><?php _e('Large', 'mtphr-shortcodes'); ?></option>
						<option value="full"><?php _e('Full', 'mtphr-shortcodes'); ?></option>
					</select>
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="row">
			
			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Excerpt Length', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-number" type="number" name="excerpt_length" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Excerpt More', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="excerpt_more" placeholder="<?php _e('Wrap text {in curly brackets} to create link to post', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link "Excerpt More" to post', 'mtphr-shortcodes'); ?></label>
					<label class="mtphr-ui-checkbox-label"><input class="mtphr-ui-checkbox" type="checkbox" name="more_link" value="true" /> <?php _e('Link whole excerpt to post', 'mtphr-shortcodes'); ?></label>
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="row">
			
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Previous Text', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="prev" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Next Text', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="next" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
		
		</div><!-- .row -->

		<div class="row">
		
			<div class="col-md-3">
				<div class="mtphr-ui-form-group mtphr-shortcode-gen-taxonomy">
					<label class="mtphr-ui-label-top"><?php _e('Taxonomy', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="taxonomy">
						<option value="">-----</option>
						<?php	echo mtphr_shortcodes_select_taxonomies( 'post' ); ?>
					</select>
				</div>
			</div>
			
			<div class="col-md-6 mtphr-shortcode-gen-taxonomy-fields">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Terms', 'mtphr-shortcodes'); ?></label>
					<div class="mtphr-shortcode-gen-terms"></div>	
				</div>
			</div>
			
			<div class="col-md-3 mtphr-shortcode-gen-taxonomy-fields">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Operator', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="operator">
						<option value="IN"><?php _e('IN', 'mtphr-shortcodes'); ?></option>
						<option value="NOT IN"><?php _e('NOT IN', 'mtphr-shortcodes'); ?></option>
						<option value="AND"><?php _e('AND', 'mtphr-shortcodes'); ?></option>
					</select>
				</div>
			</div>
			
		</div><!-- .row -->
		
		<div class="row">
		
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('CSS Class(es)', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="class" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>

			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('ID', 'mtphr-shortcodes'); ?></label>
					<input type="text" class="mtphr-ui-text" name="id" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Slide speed (hundredths)', 'mtphr-shortcodes'); ?></label>
					<input type="text" class="mtphr-ui-number" name="slide_speed" value="1000" />
				</div>
			</div>
			
			<div class="col-md-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Slide ease', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="slide_ease">
						<?php $options = array('linear','swing','jswing','easeInQuad','easeInCubic','easeInQuart','easeInQuint','easeInSine','easeInExpo','easeInCirc','easeInElastic','easeInBack','easeInBounce','easeOutQuad','easeOutCubic','easeOutQuart','easeOutQuint','easeOutSine','easeOutExpo','easeOutCirc','easeOutElastic','easeOutBack','easeOutBounce','easeInOutQuad','easeInOutCubic','easeInOutQuart','easeInOutQuint','easeInOutSine','easeInOutExpo','easeInOutCirc','easeInOutElastic','easeInOutBack','easeInOutBounce');
						if( is_array($options) && count($options) > 0 ) {
							foreach( $options as $i=>$option ) {
								if( $option == 'easeOutExpo') {
									echo '<option value="'.$option.'" selected>'.$option.'</option>';
								} else {
									echo '<option value="'.$option.'">'.$option.'</option>';
								}
							}
						} ?>
					</select>
				</div>
			</div>
			
		</div><!-- .row -->

	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_slider_gen', 'mtphr_shortcode_post_slider_gen' );



/* --------------------------------------------------------- */
/* !Post type change - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_slider_gen_type_change() {
	
	// Get access to the database
	global $wpdb;

	// Check the nonce
	check_ajax_referer( 'mtphr-shortcodes', 'security' );

	// Get variables
	$post_type = $_POST['post_type'];
	
	$html .= mtphr_shortcodes_select_taxonomies( $post_type );
  
  echo $html;

	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_mtphr_shortcode_post_slider_gen_type_change', 'mtphr_shortcode_post_slider_gen_type_change' );

