<?php

/* --------------------------------------------------------- */
/* !Add shortcodes to the generator - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcodes() {

	global $mtphr_shortcode_gen_assets;

	$shortcodes = array();
	$shortcodes['mtphr_shortcode_grid_gen'] = array(
		'label' => __('Grid', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_post_slider_gen'] = array(
		'label' => __('Post Slider', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_post_block_gen'] = array(
		'label' => __('Post Block', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_pricing_table_gen'] = array(
		'label' => __('Pricing Table', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_slide_graph_gen'] = array(
		'label' => __('Slide Graph', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_tab_gen'] = array(
		'label' => __('Content Tabs', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_toggle_gen'] = array(
		'label' => __('Content Toggle', 'mtphr-shortcodes')
	);
	$shortcodes['mtphr_shortcode_icon_gen'] = array(
		'label' => __('Icon', 'mtphr-shortcodes')
	);

	// Add the shortcodes to the list
	$mtphr_shortcode_gen_assets['mtphr_shortcodes'] = array(
		'label' => __('Metaphor Shortcodes', 'mtphr-shortcodes'),
		'shortcodes' => $shortcodes
	);
}
add_action( 'admin_init', 'mtphr_shortcodes_shortcodes' );



/* --------------------------------------------------------- */
/* !Ajax grid shortcode - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcode_grid_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_grid">
		<input type="hidden" class="shortcode" value="mtphr_grid" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Column Spans', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
			<span class="description"><?php _e('Total spans must equal 12', 'mtphr-shortcodes'); ?></span>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_grid_gen', 'mtphr_shortcode_grid_gen' );



/* --------------------------------------------------------- */
/* !Ajax post slider shortcode - 2.0.7 */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_slider_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	$args = array(
	  'public'   => true
	);
	$post_types = get_post_types( $args );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_post_slider">
		<input type="hidden" class="shortcode" value="mtphr_post_slider" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Post Type', 'mtphr-shortcodes'); ?></label>
			<select name="type">
				<?php foreach( $post_types as $pt ) { ?>
				<option><?php echo $pt; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Title', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="title" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Order By', 'mtphr-shortcodes'); ?></label>
			<select name="orderby">
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
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Order', 'mtphr-shortcodes'); ?></label>
			<select name="order">
				<option>ASC</option>
				<option selected="selected">DESC</option>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Limit', 'mtphr-shortcodes'); ?> <small>(<?php _e('Use -1 to display all', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="limit" value="-1" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Thumbnail Size', 'mtphr-shortcodes'); ?></label>
			<select name="thumb_size">
				<option value="none"><?php _e('None', 'mtphr-shortcodes'); ?></option>
				<option value="default" selected="selected"><?php _e('Use Default', 'mtphr-shortcodes'); ?></option>
				<option value="thumbnail"><?php _e('Thumbnail', 'mtphr-shortcodes'); ?></option>
				<option value="medium"><?php _e('Medium', 'mtphr-shortcodes'); ?></option>
				<option value="large"><?php _e('Large', 'mtphr-shortcodes'); ?></option>
				<option value="full"><?php _e('Full', 'mtphr-shortcodes'); ?></option>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Excerpt Length', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="excerpt_length" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Excerpt More', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="excerpt_more" />
			<label class="checkbox"><input type="checkbox" name="more_link" value="true" /> <?php _e('Link to post', 'mtphr-shortcodes'); ?></label>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Previous Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="prev" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Next Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="next" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="class" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Taxonomy', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<select name="taxonomy">
				<option value="">-----</option>
				<?php
				$args = array( 'public' => true );
				$taxonomies=get_taxonomies($args,'names');
				foreach ($taxonomies as $taxonomy ) {
				  echo '<option>'. $taxonomy. '</option>';
				}
				?>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-set-1">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Terms', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<span class="description"><?php _e('Use slugs separated by (,) commas.', 'mtphr-shortcodes'); ?></span>
				<input type="text" name="terms" />
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Operator', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<select name="operator">
					<option value="IN"><?php _e('IN', 'mtphr-shortcodes'); ?></option>
					<option value="NOT IN"><?php _e('NOT IN', 'mtphr-shortcodes'); ?></option>
					<option value="AND"><?php _e('AND', 'mtphr-shortcodes'); ?></option>
				</select>
			</div>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_slider_gen', 'mtphr_shortcode_post_slider_gen' );



/* --------------------------------------------------------- */
/* !Ajax post block shortcode - 2.0.7 */
/* --------------------------------------------------------- */

function mtphr_shortcode_post_block_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	$args = array(
	  'public'   => true
	);
	$post_types = get_post_types( $args );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_post_block">
		<input type="hidden" class="shortcode" value="mtphr_post_block" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Post Type', 'mtphr-shortcodes'); ?></label>
			<select name="type">
				<option value="default"><?php _e('Use Post ID', 'mtphr-shortcodes'); ?></option>
				<?php foreach( $post_types as $pt ) { ?>
				<option><?php echo $pt; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
			<label><?php _e('Post ID', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="id" />
		</div>
		<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-2">
			<label><?php _e('Order By', 'mtphr-shortcodes'); ?></label>
			<select name="orderby">
				<option value="ID"><?php _e('ID', 'mtphr-shortcodes'); ?></option>
				<option value="author"><?php _e('Author', 'mtphr-shortcodes'); ?></option>
				<option value="title"><?php _e('Title', 'mtphr-shortcodes'); ?></option>
				<option value="name"><?php _e('Name', 'mtphr-shortcodes'); ?></option>
				<option value="date" selected="selected"><?php _e('Date', 'mtphr-shortcodes'); ?></option>
				<option value="modified"><?php _e('Modified', 'mtphr-shortcodes'); ?></option>
				<option value="parent"><?php _e('Parent', 'mtphr-shortcodes'); ?></option>
				<option value="rand"><?php _e('Random', 'mtphr-shortcodes'); ?></option>
				<option value="comment_count"><?php _e('Comment Count', 'mtphr-shortcodes'); ?></option>
				<option value="menu_order"><?php _e('Menu Order', 'mtphr-shortcodes'); ?></option>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-2">
			<label><?php _e('Order', 'mtphr-shortcodes'); ?></label>
			<select name="order">
				<option>ASC</option>
				<option selected="selected">DESC</option>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-2">
			<label><?php _e('Query Offset', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="offset" value="0" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Thumbnail Size', 'mtphr-shortcodes'); ?></label>
			<select name="thumb_size">
				<option value="none"><?php _e('None', 'mtphr-shortcodes'); ?></option>
				<option value="default" selected="selected"><?php _e('Use Default', 'mtphr-shortcodes'); ?></option>
				<option value="thumbnail"><?php _e('Thumbnail', 'mtphr-shortcodes'); ?></option>
				<option value="medium"><?php _e('Medium', 'mtphr-shortcodes'); ?></option>
				<option value="large"><?php _e('Large', 'mtphr-shortcodes'); ?></option>
				<option value="full"><?php _e('Full', 'mtphr-shortcodes'); ?></option>
			</select>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Excerpt Length', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="excerpt_length" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Excerpt More', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="excerpt_more" />
			<label class="checkbox"><input type="checkbox" name="more_link" value="true" /> <?php _e('Link to post', 'mtphr-shortcodes'); ?></label>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="class" />
		</div>
		<div class="mtphr-shortcode-gen-set-2">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Taxonomy', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<select name="taxonomy">
					<option value="">-----</option>
					<?php
					$args = array( 'public' => true );
					$taxonomies=get_taxonomies($args,'names');
					foreach ($taxonomies as $taxonomy ) {
					  echo '<option>'. $taxonomy. '</option>';
					}
					?>
				</select>
			</div>
			<div class="mtphr-shortcode-gen-set-3">
				<div class="mtphr-shortcode-gen-attribute">
					<label><?php _e('Terms', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<span class="description"><?php _e('Use slugs separated by (,) commas.', 'mtphr-shortcodes'); ?></span>
					<input type="text" name="terms" />
				</div>
				<div class="mtphr-shortcode-gen-attribute">
					<label><?php _e('Operator', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<select name="operator">
						<option value="IN"><?php _e('IN', 'mtphr-shortcodes'); ?></option>
						<option value="NOT IN"><?php _e('NOT IN', 'mtphr-shortcodes'); ?></option>
						<option value="AND"><?php _e('AND', 'mtphr-shortcodes'); ?></option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_block_gen', 'mtphr_shortcode_post_block_gen' );



/* --------------------------------------------------------- */
/* !Ajax pricing table shortcode - 2.0.7 */
/* --------------------------------------------------------- */

function mtphr_shortcode_pricing_table_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_pricing_table">
		<input type="hidden" class="shortcode" value="mtphr_pricing_table" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-clone">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Grid Span', 'mtphr-shortcodes'); ?></label>
				<select name="span">
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
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Style', 'mtphr-shortcodes'); ?></label>
				<select name="style">
					<option value="normal"><?php _e('Normal', 'mtphr-shortcodes'); ?></option>
					<option value="condensed"><?php _e('Condensed', 'mtphr-shortcodes'); ?></option>
					<option value="list"><?php _e('List', 'mtphr-shortcodes'); ?></option>
				</select>
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Title', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="title" placeholder="<?php _e('Title', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Dollar Amount', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="dollar" placeholder="<?php _e('$9', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Cent Amount', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="cents" placeholder="<?php _e('99', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Per', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="per" placeholder="<?php _e('per month', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Button Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="button" placeholder="<?php _e('Sign Up', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Button Link', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="link" placeholder="<?php _e('http://www.paypal.com', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('CSS Class', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="class" />
			</div>
		</div>
	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_pricing_table_gen', 'mtphr_shortcode_pricing_table_gen' );



/* --------------------------------------------------------- */
/* !Ajax slide graph shortcode - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcode_slide_graph_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_slide_graph">
		<input type="hidden" class="shortcode" value="mtphr_slide_graph" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Title', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="title" placeholder="<?php _e('Title', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Title Width', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="number" name="title_width" placeholder="80" /> <?php _e('pixels', 'mtphr-shortcodes'); ?>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Percentage', 'mtphr-shortcodes'); ?></label>
			<input type="number" name="percent" placeholder="50" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Percentage Label', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="percent_label" />
		</div>
	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_slide_graph_gen', 'mtphr_shortcode_slide_graph_gen' );



/* --------------------------------------------------------- */
/* !Ajax tab shortcode - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcode_tab_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' ); ?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_tab">
		<input type="hidden" class="shortcode" value="mtphr_tab" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-clone">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Tab Title', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="title" /></label>
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Image Path', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="image" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Image Width', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="number" name="image_width" placeholder="100" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Image Alt Text', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="image_alt" />
			</div>
			<a class="mtphr-shortcode-gen-clone-add" href="#"><?php _e('Add tab', 'mtphr-shortcodes'); ?></a>&nbsp;&nbsp;
			<a class="mtphr-shortcode-gen-clone-delete deletion" href="#"><?php _e('Delete tab', 'mtphr-shortcodes'); ?></a>
		</div>
	</div>
	<?php die();
}
add_action( 'wp_ajax_mtphr_shortcode_tab_gen', 'mtphr_shortcode_tab_gen' );



/* --------------------------------------------------------- */
/* !Ajax toggle shortcode - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcode_toggle_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_toggle">
		<input type="hidden" class="shortcode" value="mtphr_toggle" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Heading', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="heading" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('CSS Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="class" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Filter ID', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="id" placeholder="<?php _e('Optional', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label class="checkbox"><input type="checkbox" name="condensed" value="false" /> <?php _e('Initial state expanded', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_toggle_gen', 'mtphr_shortcode_toggle_gen' );



/* --------------------------------------------------------- */
/* !Ajax icon shortcode - 2.0.6 */
/* --------------------------------------------------------- */

function mtphr_shortcode_icon_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_icon">
		<input type="hidden" class="shortcode" value="mtphr_icon" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('ID', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
			<?php
			$icons = mtphr_shortcodes_icon_list();
			if( is_array($icons) && count($icons) > 0 ) {
				foreach( $icons as $i=>$icon ) {
					$id = substr($icon, 21);
					echo '<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="'.$icon.'"></i><span class="mtphr-shortcode-gen-icon-id">'.$id.'</span></a>';
				}
			}
			?>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('CSS Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="class" placeholder="<?php _e('Add a class to the icon', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('CSS Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="style" placeholder="<?php _e('Add additional styles to the icon', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Title', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="title" placeholder="<?php _e('Add a title next to the icon', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-set-1">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Title Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="title_class" placeholder="<?php _e('Add a class to the title', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Title Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="title_style" placeholder="<?php _e('Add additional styles to the title', 'mtphr-shortcodes'); ?>" />
			</div>
		</div>
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('Link', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
			<input type="text" name="link" placeholder="<?php _e('Add a link to the icon', 'mtphr-shortcodes'); ?>" />
		</div>
		<div class="mtphr-shortcode-gen-set-2">
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Link Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="link_class" placeholder="<?php _e('Add a class to the link', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Link Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<input type="text" name="link_style" placeholder="<?php _e('Add additional styles to the link', 'mtphr-shortcodes'); ?>" />
			</div>
			<div class="mtphr-shortcode-gen-attribute">
				<label><?php _e('Link Target', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
				<select name="target">
					<option selected="selected">_self</option>
					<option>_blank</option>
				</select>
			</div>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_icon_gen', 'mtphr_shortcode_icon_gen' );



/* --------------------------------------------------------- */
/* !Add the media button - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcode_media_button(){
	echo '<a href="#TB_inline?width=600&amp;height=100%&amp;inlineId=mtphr_shortcode_generator" class="thickbox button" id="add_mtphr_shortcode" title="'.__('Generate Metaphor Shortcode', 'mtphr-shortcodes').'"><span class="wp-media-buttons-icon"></span>'.__('Shortcodes', 'mtphr-shortcodes').'</a>';
}
add_action( 'media_buttons', 'mtphr_shortcodes_shortcode_media_button', 11 );



/* --------------------------------------------------------- */
/* !Create the lightbox display - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcodes_shortcode_gen_display() {
	global $mtphr_shortcode_gen_assets;
	?>
	<script>
		jQuery( window ).load( function() {

			jQuery( '.mtphr-shortcode-gen-select' ).change( function() {

				// Hide the insert button
				jQuery('.mtphr-shortcode-gen-insert-button').hide();

				var $content = jQuery('.mtphr-shortcode-gen-content');
				if( jQuery(this).val() == 'none' ) {
					$content.empty();
				} else {
					var data = {
						action: jQuery(this).val(),
						security: '<?php echo wp_create_nonce( 'mtphr_shortcode_gen_nonce' ); ?>'
					};
					jQuery.post( ajaxurl, data, function( response ) {
						$content.empty();
						$content.append( response );
						jQuery('body').trigger('mtphr_shortcode_generator_init');
					});
				}
			});
		});

		/* --------------------------------------------------------- */
		/* ! Trigger the shortcode generation and insert into editor */
		/* --------------------------------------------------------- */

		function mtphr_shortcode_gen_insert() {
			jQuery('body').trigger('mtphr_shortcode_generator_value');
			var $container = jQuery('.mtphr-shortcode-gen-container'),
					shortcode = $container.children('input.shortcode-insert').val();

			window.send_to_editor( shortcode );
		}
	</script>
	<div id="mtphr_shortcode_generator" style="display:none;">
    <div style="padding-bottom:30px;">
      <div style="padding:15px 15px 0 15px;">
          <h3><?php _e('Shortcode generator', 'mtphr-shortcodes'); ?></h3>
          <span><?php _e('Select a shortcode to add to your post.', 'mtphr-shortcodes'); ?></span>
      </div>
      <div style="padding:15px 15px 0 15px;">
        <select class="mtphr-shortcode-gen-select">
        	<option value="none"><?php _e('Select a Shortcode', 'mtphr-shortcodes'); ?></option>

        	<?php
        	if( is_array($mtphr_shortcode_gen_assets) ) {
        		foreach( $mtphr_shortcode_gen_assets as $i => $shortcode_group ) {
        			echo '<optgroup label="'.$shortcode_group['label'].'">';
        			foreach( $shortcode_group['shortcodes'] as $i => $shortcode ) {
	        			echo '<option value="'.$i.'">'.$shortcode['label'].'</option>';
	        		}
	        		echo '</optgroup>';
        		}
        	}
        	?>

        </select>
      </div>
      <div class="mtphr-shortcode-gen-content" style=""></div>
      <div style="padding:15px;">
        <input style="display:none;margin-right:5px;" type="button" class="button-primary mtphr-shortcode-gen-insert-button" value="<?php _e('Insert Shortcode', 'mtphr-shortcodes'); ?>" onclick="mtphr_shortcode_gen_insert();"/><a class="button mtphr-shortcode-gen-cancel-button" style="color:#bbb;" href="#" onclick="tb_remove(); return false;"><?php _e('Cancel', 'mtphr-shortcodes'); ?></a>
      </div>
    </div>
	</div>
	<?php
}
add_action( 'admin_footer', 'mtphr_shortcodes_shortcode_gen_display', 99 );


