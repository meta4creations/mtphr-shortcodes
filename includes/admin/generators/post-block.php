<?php

/* --------------------------------------------------------- */
/* !Ajax post block shortcode - 2.2.7 */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_block_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	$args = array(
	  'public'   => true
	);
	$post_types = get_post_types( $args, 'objects' );
	?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_post_block">
		<input type="hidden" class="shortcode" value="mtphr_post_block" />
		<input type="hidden" class="shortcode-insert" />
		
		<h2><?php _e('Post Block', 'mtphr-shortcodes'); ?></h2>
		
		<div class="row">
		
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Post Type', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="type">
						<option value="default"><?php _e('Use Post ID', 'mtphr-shortcodes'); ?></option>
						<?php foreach( $post_types as $slug=>$pt ) { ?>
						<option value="<?php echo $slug; ?>"><?php echo $pt->labels->singular_name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

		</div><!-- .row -->
		
		<div class="row mtphr-shortcode-gen-post-id-fields">
		
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Post ID', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-number" type="number" name="id" />
				</div>
			</div>
			
		</div>
		
		<div class="row mtphr-shortcode-gen-post-type-fields">
			
			<div class="col-md-4">
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
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Order', 'mtphr-shortcodes'); ?></label>
					<select class="mtphr-ui-select" name="order">
						<option>ASC</option>
						<option selected="selected">DESC</option>
					</select>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Query Offset', 'mtphr-shortcodes'); ?> <small>(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-number" type="number" name="offset" value="0" />
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="row">
			
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
					<input class="mtphr-ui-number" type="number" name="excerpt_length" />
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Excerpt More', 'mtphr-shortcodes'); ?></label>
					<input class="mtphr-ui-text" type="text" name="excerpt_more" />
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link "Excerpt More" to post', 'mtphr-shortcodes'); ?></label>
					<label class="mtphr-ui-checkbox-label"><input class="mtphr-ui-checkbox" type="checkbox" name="more_link" value="true" /> <?php _e('Link to post', 'mtphr-shortcodes'); ?></label>
				</div>
			</div>
		
		</div><!-- .row -->
		
		<div class="row mtphr-shortcode-gen-post-type-fields">
		
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
		
		<?php mtphr_shortcodes_gen_author_row( 'mtphr-shortcode-gen-post-type-fields' ); ?>

		<div class="mtphr-ui-form-group">
			<label class="mtphr-ui-label-top"><?php _e('Class', 'mtphr-shortcodes'); ?></label>
			<input class="mtphr-ui-text" type="text" name="class" />
		</div>

	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_block_gen', 'mtphr_shortcode_post_block_gen' );
