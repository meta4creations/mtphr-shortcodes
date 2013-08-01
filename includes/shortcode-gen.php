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
/* !Ajax post slider shortcode - 2.0.5 */
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
				<option>ID</option>
				<option>author</option>
				<option>title</option>
				<option>name</option>
				<option>date</option>
				<option>modified</option>
				<option>parent</option>
				<option selected="selected">rand</option>
				<option>comment_count</option>
				<option>menu_order</option>
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
					<option>IN</option>
					<option>NOT IN</option>
					<option>AND</option>
				</select>
			</div>
		</div>
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_post_slider_gen', 'mtphr_shortcode_post_slider_gen' );



/* --------------------------------------------------------- */
/* !Ajax post block shortcode - 2.0.5 */
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
				<option>ID</option>
				<option>author</option>
				<option>title</option>
				<option>name</option>
				<option selected="selected">date</option>
				<option>modified</option>
				<option>parent</option>
				<option>rand</option>
				<option>comment_count</option>
				<option>menu_order</option>
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
						<option>IN</option>
						<option>NOT IN</option>
						<option>AND</option>
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
/* !Ajax pricing table shortcode - 2.0.5 */
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
				<input type="text" name="dollar" placeholder="$9" />
			</div>
			<div class="mtphr-shortcode-gen-attribute mtphr-shortcode-gen-set-1">
				<label><?php _e('Cent Amount', 'mtphr-shortcodes'); ?></label>
				<input type="text" name="cents" placeholder="99" />
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
/* !Ajax icon shortcode - 2.0.5 */
/* --------------------------------------------------------- */

function mtphr_shortcode_icon_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen-container mtphr-shortcode-gen-mtphr_icon">
		<input type="hidden" class="shortcode" value="mtphr_icon" />
		<input type="hidden" class="shortcode-insert" />
		<div class="mtphr-shortcode-gen-attribute">
			<label><?php _e('ID', 'mtphr-shortcodes'); ?> <small class="required">(<?php _e('Required', 'mtphr-shortcodes'); ?>)</small></label>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-one"></i><span class="mtphr-shortcode-gen-icon-id">one</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-two"></i><span class="mtphr-shortcode-gen-icon-id">two</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-three"></i><span class="mtphr-shortcode-gen-icon-id">three</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-four"></i><span class="mtphr-shortcode-gen-icon-id">four</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-five"></i><span class="mtphr-shortcode-gen-icon-id">five</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-six"></i><span class="mtphr-shortcode-gen-icon-id">six</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-seven"></i><span class="mtphr-shortcode-gen-icon-id">seven</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-eight"></i><span class="mtphr-shortcode-gen-icon-id">eight</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-nine"></i><span class="mtphr-shortcode-gen-icon-id">nine</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zero"></i><span class="mtphr-shortcode-gen-icon-id">zero</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-one-filled"></i><span class="mtphr-shortcode-gen-icon-id">one-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-two-filled"></i><span class="mtphr-shortcode-gen-icon-id">two-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-three-filled"></i><span class="mtphr-shortcode-gen-icon-id">three-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-four-filled"></i><span class="mtphr-shortcode-gen-icon-id">four-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-five-filled"></i><span class="mtphr-shortcode-gen-icon-id">five-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-six-filled"></i><span class="mtphr-shortcode-gen-icon-id">six-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-seven-filled"></i><span class="mtphr-shortcode-gen-icon-id">seven-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-eight-filled"></i><span class="mtphr-shortcode-gen-icon-id">eight-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-nine-filled"></i><span class="mtphr-shortcode-gen-icon-id">nine-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zero-filled"></i><span class="mtphr-shortcode-gen-icon-id">zero-filled</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-quote-right"></i><span class="mtphr-shortcode-gen-icon-id">quote-right</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-quote-left"></i><span class="mtphr-shortcode-gen-icon-id">quote-left</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tag"></i><span class="mtphr-shortcode-gen-icon-id">tag</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tag-2"></i><span class="mtphr-shortcode-gen-icon-id">tag-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-link"></i><span class="mtphr-shortcode-gen-icon-id">link</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-link-2"></i><span class="mtphr-shortcode-gen-icon-id">link-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-file-cabinet"></i><span class="mtphr-shortcode-gen-icon-id">file-cabinet</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-file-cabinet-2"></i><span class="mtphr-shortcode-gen-icon-id">file-cabinet-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-calendar"></i><span class="mtphr-shortcode-gen-icon-id">calendar</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-calendar-2"></i><span class="mtphr-shortcode-gen-icon-id">calendar-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-calendar-3"></i><span class="mtphr-shortcode-gen-icon-id">calendar-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-file-plus"></i><span class="mtphr-shortcode-gen-icon-id">file-plus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-file-minus"></i><span class="mtphr-shortcode-gen-icon-id">file-minus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-file"></i><span class="mtphr-shortcode-gen-icon-id">file</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-files"></i><span class="mtphr-shortcode-gen-icon-id">files</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-iphone"></i><span class="mtphr-shortcode-gen-icon-id">iphone</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ipad"></i><span class="mtphr-shortcode-gen-icon-id">ipad</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-browser"></i><span class="mtphr-shortcode-gen-icon-id">browser</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-mac"></i><span class="mtphr-shortcode-gen-icon-id">mac</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ipad-2"></i><span class="mtphr-shortcode-gen-icon-id">ipad-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tv"></i><span class="mtphr-shortcode-gen-icon-id">tv</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-camera"></i><span class="mtphr-shortcode-gen-icon-id">camera</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-camera-2"></i><span class="mtphr-shortcode-gen-icon-id">camera-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-camera-3"></i><span class="mtphr-shortcode-gen-icon-id">camera-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-movie-tape"></i><span class="mtphr-shortcode-gen-icon-id">movie-tape</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-film"></i><span class="mtphr-shortcode-gen-icon-id">film</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-film-2"></i><span class="mtphr-shortcode-gen-icon-id">film-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-microphone"></i><span class="mtphr-shortcode-gen-icon-id">microphone</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-microphone-2"></i><span class="mtphr-shortcode-gen-icon-id">microphone-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-microphone-3"></i><span class="mtphr-shortcode-gen-icon-id">microphone-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-juice"></i><span class="mtphr-shortcode-gen-icon-id">juice</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-takeaway-cup"></i><span class="mtphr-shortcode-gen-icon-id">takeaway-cup</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-takeaway-cup-2"></i><span class="mtphr-shortcode-gen-icon-id">takeaway-cup-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-martini"></i><span class="mtphr-shortcode-gen-icon-id">martini</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tea"></i><span class="mtphr-shortcode-gen-icon-id">tea</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-beer"></i><span class="mtphr-shortcode-gen-icon-id">beer</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ice-cream"></i><span class="mtphr-shortcode-gen-icon-id">ice-cream</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-muffin"></i><span class="mtphr-shortcode-gen-icon-id">muffin</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-inbox"></i><span class="mtphr-shortcode-gen-icon-id">inbox</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-inbox-incoming"></i><span class="mtphr-shortcode-gen-icon-id">inbox-incoming</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-inbox-outgoing"></i><span class="mtphr-shortcode-gen-icon-id">inbox-outgoing</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-inbox-full"></i><span class="mtphr-shortcode-gen-icon-id">full</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-check"></i><span class="mtphr-shortcode-gen-icon-id">check</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-check-transparent"></i><span class="mtphr-shortcode-gen-icon-id">check-transparent</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-error"></i><span class="mtphr-shortcode-gen-icon-id">error</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-error-transparent"></i><span class="mtphr-shortcode-gen-icon-id">error-transparent</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-plus"></i><span class="mtphr-shortcode-gen-icon-id">plus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-plus-transparent"></i><span class="mtphr-shortcode-gen-icon-id">plus-transparent</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-minus"></i><span class="mtphr-shortcode-gen-icon-id">minus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-minus-transparent"></i><span class="mtphr-shortcode-gen-icon-id">minus-transparent</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alert"></i><span class="mtphr-shortcode-gen-icon-id">alert</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alert-transparent"></i><span class="mtphr-shortcode-gen-icon-id">alert-transparent</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alert-2"></i><span class="mtphr-shortcode-gen-icon-id">alert-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-settings"></i><span class="mtphr-shortcode-gen-icon-id">settings</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-settings-2"></i><span class="mtphr-shortcode-gen-icon-id">settings-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-settings-3"></i><span class="mtphr-shortcode-gen-icon-id">settings-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-medical-case"></i><span class="mtphr-shortcode-gen-icon-id">medical-case</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-brief-case"></i><span class="mtphr-shortcode-gen-icon-id">brief-case</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-brief-case-2"></i><span class="mtphr-shortcode-gen-icon-id">brief-case-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-brief-case-3"></i><span class="mtphr-shortcode-gen-icon-id">brief-case-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-polaroid"></i><span class="mtphr-shortcode-gen-icon-id">polaroid</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-polaroid-2"></i><span class="mtphr-shortcode-gen-icon-id">polaroid-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-polaroid-3"></i><span class="mtphr-shortcode-gen-icon-id">polaroid-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-android"></i><span class="mtphr-shortcode-gen-icon-id">android</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-marvin"></i><span class="mtphr-shortcode-gen-icon-id">marvin</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pacman"></i><span class="mtphr-shortcode-gen-icon-id">pacman</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-cassette"></i><span class="mtphr-shortcode-gen-icon-id">cassette</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-digital-watch"></i><span class="mtphr-shortcode-gen-icon-id">digital-watch</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-digital-watch-2"></i><span class="mtphr-shortcode-gen-icon-id">digital-watch-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-stop-watch"></i><span class="mtphr-shortcode-gen-icon-id">stop-watch</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alarm-clock"></i><span class="mtphr-shortcode-gen-icon-id">alarm-clock</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alarm-clock-2"></i><span class="mtphr-shortcode-gen-icon-id">alarm-clock-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-clock"></i><span class="mtphr-shortcode-gen-icon-id">clock</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-handset"></i><span class="mtphr-shortcode-gen-icon-id">handset</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-wallet"></i><span class="mtphr-shortcode-gen-icon-id">wallet</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-check-2"></i><span class="mtphr-shortcode-gen-icon-id">check-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-error-2"></i><span class="mtphr-shortcode-gen-icon-id">error-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-preview"></i><span class="mtphr-shortcode-gen-icon-id">preview</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-map-pin"></i><span class="mtphr-shortcode-gen-icon-id">map-pin</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-map-pin-2"></i><span class="mtphr-shortcode-gen-icon-id">map-pin-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sitemap"></i><span class="mtphr-shortcode-gen-icon-id">sitemap</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sitemap-2"></i><span class="mtphr-shortcode-gen-icon-id">sitemap-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-icloud"></i><span class="mtphr-shortcode-gen-icon-id">icloud</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-icloud-up"></i><span class="mtphr-shortcode-gen-icon-id">icloud-up</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-icloud-down"></i><span class="mtphr-shortcode-gen-icon-id">icloud-down</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pie-chart"></i><span class="mtphr-shortcode-gen-icon-id">pie-chart</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pie-chart-2"></i><span class="mtphr-shortcode-gen-icon-id">pie-chart-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart-2"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart-3"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart-4"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart-4</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-shopping-basket"></i><span class="mtphr-shortcode-gen-icon-id">shopping-basket</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-folder"></i><span class="mtphr-shortcode-gen-icon-id">folder</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-playstation"></i><span class="mtphr-shortcode-gen-icon-id">playstation</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bell"></i><span class="mtphr-shortcode-gen-icon-id">bell</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bell-mute"></i><span class="mtphr-shortcode-gen-icon-id">bell-mute</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-telephone"></i><span class="mtphr-shortcode-gen-icon-id">telephone</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-telephone-2"></i><span class="mtphr-shortcode-gen-icon-id">telephone-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-picture-frame"></i><span class="mtphr-shortcode-gen-icon-id">picture-frame</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-open-sign"></i><span class="mtphr-shortcode-gen-icon-id">open-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sale-sign"></i><span class="mtphr-shortcode-gen-icon-id">sale-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-road-sign"></i><span class="mtphr-shortcode-gen-icon-id">road-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-map"></i><span class="mtphr-shortcode-gen-icon-id">map</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-trash"></i><span class="mtphr-shortcode-gen-icon-id">trash</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-vote"></i><span class="mtphr-shortcode-gen-icon-id">vote</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graduate"></i><span class="mtphr-shortcode-gen-icon-id">graduate</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-lab"></i><span class="mtphr-shortcode-gen-icon-id">lab</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tie"></i><span class="mtphr-shortcode-gen-icon-id">tie</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-rugby-ball"></i><span class="mtphr-shortcode-gen-icon-id">rugby-ball</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-billiard-ball"></i><span class="mtphr-shortcode-gen-icon-id">billiard-ball</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bowling-ball"></i><span class="mtphr-shortcode-gen-icon-id">bowling-ball</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bowling-pin"></i><span class="mtphr-shortcode-gen-icon-id">bowling-pin</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tennis-ball"></i><span class="mtphr-shortcode-gen-icon-id">tennis-ball</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-soccer-ball"></i><span class="mtphr-shortcode-gen-icon-id">soccer-ball</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-3d-glasses"></i><span class="mtphr-shortcode-gen-icon-id">3d-glasses</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-microwave"></i><span class="mtphr-shortcode-gen-icon-id">microwave</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-refrigerator"></i><span class="mtphr-shortcode-gen-icon-id">refrigerator</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-oven"></i><span class="mtphr-shortcode-gen-icon-id">oven</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-washing-machine"></i><span class="mtphr-shortcode-gen-icon-id">washing-machine</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-mouse"></i><span class="mtphr-shortcode-gen-icon-id">mouse</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-smile"></i><span class="mtphr-shortcode-gen-icon-id">smile</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-smile-2"></i><span class="mtphr-shortcode-gen-icon-id">smile-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-smile-3"></i><span class="mtphr-shortcode-gen-icon-id">smile-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-hand"></i><span class="mtphr-shortcode-gen-icon-id">hand</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-satellite"></i><span class="mtphr-shortcode-gen-icon-id">satellite</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-satellite-2"></i><span class="mtphr-shortcode-gen-icon-id">satellite-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-award-ribbon"></i><span class="mtphr-shortcode-gen-icon-id">ribbon</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-award-ribbon-2"></i><span class="mtphr-shortcode-gen-icon-id">ribbon-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-switcher"></i><span class="mtphr-shortcode-gen-icon-id">switcher</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-key"></i><span class="mtphr-shortcode-gen-icon-id">key</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-connect"></i><span class="mtphr-shortcode-gen-icon-id">connect</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-locked"></i><span class="mtphr-shortcode-gen-icon-id">locked</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-unlocked"></i><span class="mtphr-shortcode-gen-icon-id">unlocked</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-locked-2"></i><span class="mtphr-shortcode-gen-icon-id">locked-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-unlocked-2"></i><span class="mtphr-shortcode-gen-icon-id">unlocked-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zoom"></i><span class="mtphr-shortcode-gen-icon-id">zoom</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zoom-in"></i><span class="mtphr-shortcode-gen-icon-id">zoom-in</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zoom-out"></i><span class="mtphr-shortcode-gen-icon-id">zoom-out</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-copy-paste"></i><span class="mtphr-shortcode-gen-icon-id">copy-paste</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-copy-paste-2"></i><span class="mtphr-shortcode-gen-icon-id">copy-paste-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-copy-paste-3"></i><span class="mtphr-shortcode-gen-icon-id">copy-paste-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-david-star"></i><span class="mtphr-shortcode-gen-icon-id">david-star</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-cross"></i><span class="mtphr-shortcode-gen-icon-id">cross</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-moon-star"></i><span class="mtphr-shortcode-gen-icon-id">moon-star</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-transformer"></i><span class="mtphr-shortcode-gen-icon-id">transformer</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-batman"></i><span class="mtphr-shortcode-gen-icon-id">batman</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-space-invaders"></i><span class="mtphr-shortcode-gen-icon-id">space-invaders</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-skeletor"></i><span class="mtphr-shortcode-gen-icon-id">skeletor</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-lamp"></i><span class="mtphr-shortcode-gen-icon-id">lamp</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-lamp-2"></i><span class="mtphr-shortcode-gen-icon-id">lamp-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-umbrella"></i><span class="mtphr-shortcode-gen-icon-id">umbrella</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-street-light"></i><span class="mtphr-shortcode-gen-icon-id">street-light</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bomb"></i><span class="mtphr-shortcode-gen-icon-id">bomb</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-archive"></i><span class="mtphr-shortcode-gen-icon-id">archive</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-battery"></i><span class="mtphr-shortcode-gen-icon-id">battery</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-battery-2"></i><span class="mtphr-shortcode-gen-icon-id">battery-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-battery-3"></i><span class="mtphr-shortcode-gen-icon-id">battery-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-battery-4"></i><span class="mtphr-shortcode-gen-icon-id">battery-4</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-battery-5"></i><span class="mtphr-shortcode-gen-icon-id">battery-5</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-megaphone"></i><span class="mtphr-shortcode-gen-icon-id">megaphone</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-megaphone-2"></i><span class="mtphr-shortcode-gen-icon-id">megaphone-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bandaid"></i><span class="mtphr-shortcode-gen-icon-id">bandaid</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pil"></i><span class="mtphr-shortcode-gen-icon-id">pil</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-injection"></i><span class="mtphr-shortcode-gen-icon-id">injection</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-thermometer"></i><span class="mtphr-shortcode-gen-icon-id">thermometer</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-light-bulb"></i><span class="mtphr-shortcode-gen-icon-id">bulb</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-light-bulb-2"></i><span class="mtphr-shortcode-gen-icon-id">bulb-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-light-bulb-3"></i><span class="mtphr-shortcode-gen-icon-id">bulb-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-box-closed"></i><span class="mtphr-shortcode-gen-icon-id">closed</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-box-open"></i><span class="mtphr-shortcode-gen-icon-id">open</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-box-closed-2"></i><span class="mtphr-shortcode-gen-icon-id">closed-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-diamond"></i><span class="mtphr-shortcode-gen-icon-id">diamond</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bag"></i><span class="mtphr-shortcode-gen-icon-id">bag</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-dollar-bag"></i><span class="mtphr-shortcode-gen-icon-id">dollar-bag</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-view-thumbnail"></i><span class="mtphr-shortcode-gen-icon-id">thumbnail</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-view-thumbnail-2"></i><span class="mtphr-shortcode-gen-icon-id">thumbnail-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-view-list"></i><span class="mtphr-shortcode-gen-icon-id">list</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-view-list-2"></i><span class="mtphr-shortcode-gen-icon-id">list-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ruler"></i><span class="mtphr-shortcode-gen-icon-id">ruler</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ruler-2"></i><span class="mtphr-shortcode-gen-icon-id">ruler-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout"></i><span class="mtphr-shortcode-gen-icon-id">layout</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-2"></i><span class="mtphr-shortcode-gen-icon-id">layout-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-3"></i><span class="mtphr-shortcode-gen-icon-id">layout-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-4"></i><span class="mtphr-shortcode-gen-icon-id">layout-4</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-5"></i><span class="mtphr-shortcode-gen-icon-id">layout-5</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-6"></i><span class="mtphr-shortcode-gen-icon-id">layout-6</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-7"></i><span class="mtphr-shortcode-gen-icon-id">layout-7</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-8"></i><span class="mtphr-shortcode-gen-icon-id">layout-8</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-9"></i><span class="mtphr-shortcode-gen-icon-id">layout-9</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-10"></i><span class="mtphr-shortcode-gen-icon-id">layout-10</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-11"></i><span class="mtphr-shortcode-gen-icon-id">layout-11</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-12"></i><span class="mtphr-shortcode-gen-icon-id">layout-12</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-13"></i><span class="mtphr-shortcode-gen-icon-id">layout-13</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-layout-14"></i><span class="mtphr-shortcode-gen-icon-id">layout-14</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tools"></i><span class="mtphr-shortcode-gen-icon-id">tools</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tools-2"></i><span class="mtphr-shortcode-gen-icon-id">tools-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tools-3"></i><span class="mtphr-shortcode-gen-icon-id">tools-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-hammer"></i><span class="mtphr-shortcode-gen-icon-id">hammer</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-paint-brush"></i><span class="mtphr-shortcode-gen-icon-id">paint-brush</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-fountain-pen"></i><span class="mtphr-shortcode-gen-icon-id">fountain-pen</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-speech-bubble"></i><span class="mtphr-shortcode-gen-icon-id">speech-bubble</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-speech-bubble-2"></i><span class="mtphr-shortcode-gen-icon-id">speech-bubble-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-speech-bubble-3"></i><span class="mtphr-shortcode-gen-icon-id">speech-bubble-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-speech-bubble-4"></i><span class="mtphr-shortcode-gen-icon-id">speech-bubble-4</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sound"></i><span class="mtphr-shortcode-gen-icon-id">sound</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sound-2"></i><span class="mtphr-shortcode-gen-icon-id">sound-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sound-mute"></i><span class="mtphr-shortcode-gen-icon-id">sound-mute</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-equilizer"></i><span class="mtphr-shortcode-gen-icon-id">equilizer</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-expand"></i><span class="mtphr-shortcode-gen-icon-id">expand</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-collapse"></i><span class="mtphr-shortcode-gen-icon-id">collapse</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-stretch"></i><span class="mtphr-shortcode-gen-icon-id">stretch</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-narrow"></i><span class="mtphr-shortcode-gen-icon-id">narrow</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-fullscreen"></i><span class="mtphr-shortcode-gen-icon-id">fullscreen</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-download"></i><span class="mtphr-shortcode-gen-icon-id">download</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-calculator"></i><span class="mtphr-shortcode-gen-icon-id">calculator</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-university"></i><span class="mtphr-shortcode-gen-icon-id">university</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-auction"></i><span class="mtphr-shortcode-gen-icon-id">auction</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-justice"></i><span class="mtphr-shortcode-gen-icon-id">justice</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart-increasing"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart-increasing</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-graph-chart-decreasing"></i><span class="mtphr-shortcode-gen-icon-id">graph-chart-decreasing</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-paper-clip"></i><span class="mtphr-shortcode-gen-icon-id">paper-clip</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-hourglass"></i><span class="mtphr-shortcode-gen-icon-id">hourglass</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-abacus"></i><span class="mtphr-shortcode-gen-icon-id">abacus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pencil"></i><span class="mtphr-shortcode-gen-icon-id">pencil</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pencil-2"></i><span class="mtphr-shortcode-gen-icon-id">pencil-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pin"></i><span class="mtphr-shortcode-gen-icon-id">pin</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-pin-2"></i><span class="mtphr-shortcode-gen-icon-id">pin-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-price-tag"></i><span class="mtphr-shortcode-gen-icon-id">price-tag</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-create-new"></i><span class="mtphr-shortcode-gen-icon-id">create-new</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-scissors"></i><span class="mtphr-shortcode-gen-icon-id">scissors</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-v-card"></i><span class="mtphr-shortcode-gen-icon-id">v-card</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-v-card-2"></i><span class="mtphr-shortcode-gen-icon-id">v-card-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-v-card-3"></i><span class="mtphr-shortcode-gen-icon-id">v-card-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-undo"></i><span class="mtphr-shortcode-gen-icon-id">undo</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-refresh"></i><span class="mtphr-shortcode-gen-icon-id">refresh</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-undo-2"></i><span class="mtphr-shortcode-gen-icon-id">undo-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-reply"></i><span class="mtphr-shortcode-gen-icon-id">reply</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-share"></i><span class="mtphr-shortcode-gen-icon-id">share</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-shuffle"></i><span class="mtphr-shortcode-gen-icon-id">shuffle</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-repeat"></i><span class="mtphr-shortcode-gen-icon-id">repeat</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-crop"></i><span class="mtphr-shortcode-gen-icon-id">crop</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-anchor-points"></i><span class="mtphr-shortcode-gen-icon-id">anchor-points</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-anchor-points-2"></i><span class="mtphr-shortcode-gen-icon-id">anchor-points-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-anchor-points-3"></i><span class="mtphr-shortcode-gen-icon-id">anchor-points-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-dollar"></i><span class="mtphr-shortcode-gen-icon-id">dollar</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-dollars"></i><span class="mtphr-shortcode-gen-icon-id">dollars</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-dollar-coins"></i><span class="mtphr-shortcode-gen-icon-id">dollar-coins</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-piggy"></i><span class="mtphr-shortcode-gen-icon-id">piggy</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ribbon"></i><span class="mtphr-shortcode-gen-icon-id">ribbon</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-book"></i><span class="mtphr-shortcode-gen-icon-id">book</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-address-book"></i><span class="mtphr-shortcode-gen-icon-id">address-book</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-address-book-2"></i><span class="mtphr-shortcode-gen-icon-id">address-book-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-safe"></i><span class="mtphr-shortcode-gen-icon-id">safe</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-email"></i><span class="mtphr-shortcode-gen-icon-id">email</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-email-open"></i><span class="mtphr-shortcode-gen-icon-id">email-open</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-radioactive"></i><span class="mtphr-shortcode-gen-icon-id">radioactive</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-music-note"></i><span class="mtphr-shortcode-gen-icon-id">music-note</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-presentation"></i><span class="mtphr-shortcode-gen-icon-id">presentation</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-female-sign"></i><span class="mtphr-shortcode-gen-icon-id">female-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-male-sign"></i><span class="mtphr-shortcode-gen-icon-id">male-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-aids-sign"></i><span class="mtphr-shortcode-gen-icon-id">aids-sign</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-like"></i><span class="mtphr-shortcode-gen-icon-id">like</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-info"></i><span class="mtphr-shortcode-gen-icon-id">info</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-info-2"></i><span class="mtphr-shortcode-gen-icon-id">info-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-piano-keyboard"></i><span class="mtphr-shortcode-gen-icon-id">piano-keyboard</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-weather-rain"></i><span class="mtphr-shortcode-gen-icon-id">rain</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-weather-snow"></i><span class="mtphr-shortcode-gen-icon-id">snow</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-weather-storm"></i><span class="mtphr-shortcode-gen-icon-id">storm</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sun"></i><span class="mtphr-shortcode-gen-icon-id">sun</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-moon"></i><span class="mtphr-shortcode-gen-icon-id">moon</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-weather-partly-cloudy"></i><span class="mtphr-shortcode-gen-icon-id">weather-partly-cloudy</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-weather-cloudy"></i><span class="mtphr-shortcode-gen-icon-id">weather-cloudy</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-car"></i><span class="mtphr-shortcode-gen-icon-id">car</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-bycicle"></i><span class="mtphr-shortcode-gen-icon-id">bycicle</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-truck"></i><span class="mtphr-shortcode-gen-icon-id">truck</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-school-bus"></i><span class="mtphr-shortcode-gen-icon-id">school-bus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-vespa"></i><span class="mtphr-shortcode-gen-icon-id">vespa</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-plane"></i><span class="mtphr-shortcode-gen-icon-id">plane</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-plane-2"></i><span class="mtphr-shortcode-gen-icon-id">plane-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-rocket"></i><span class="mtphr-shortcode-gen-icon-id">rocket</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-open-book"></i><span class="mtphr-shortcode-gen-icon-id">open-book</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-open-book-2"></i><span class="mtphr-shortcode-gen-icon-id">open-book-2-</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-scan-label"></i><span class="mtphr-shortcode-gen-icon-id">scan-label</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-scan-label-2"></i><span class="mtphr-shortcode-gen-icon-id">scan-label-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-expand-2"></i><span class="mtphr-shortcode-gen-icon-id">expand-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-collapse-2"></i><span class="mtphr-shortcode-gen-icon-id">collapse-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-expand-3"></i><span class="mtphr-shortcode-gen-icon-id">expand-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-collapse-3"></i><span class="mtphr-shortcode-gen-icon-id">collapse-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-target"></i><span class="mtphr-shortcode-gen-icon-id">target</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sheriff-badge"></i><span class="mtphr-shortcode-gen-icon-id">sheriff-badge</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-sheriff-badge-2"></i><span class="mtphr-shortcode-gen-icon-id">sheriff-badge-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ticket"></i><span class="mtphr-shortcode-gen-icon-id">ticket</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ticket-2"></i><span class="mtphr-shortcode-gen-icon-id">ticket-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-ticket-3"></i><span class="mtphr-shortcode-gen-icon-id">ticket-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-microphone-4"></i><span class="mtphr-shortcode-gen-icon-id">microphone-4</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-traffic-cone"></i><span class="mtphr-shortcode-gen-icon-id">traffic-cone</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-traffic-sign-forbidden"></i><span class="mtphr-shortcode-gen-icon-id">traffic-sign-forbidden</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-stop"></i><span class="mtphr-shortcode-gen-icon-id">stop</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-keyboard"></i><span class="mtphr-shortcode-gen-icon-id">keyboard</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-keyboard-2"></i><span class="mtphr-shortcode-gen-icon-id">keyboard-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-radio"></i><span class="mtphr-shortcode-gen-icon-id">radio</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-print"></i><span class="mtphr-shortcode-gen-icon-id">print</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-check-3"></i><span class="mtphr-shortcode-gen-icon-id">check-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-error-3"></i><span class="mtphr-shortcode-gen-icon-id">error-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-plus-2"></i><span class="mtphr-shortcode-gen-icon-id">plus-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-minus-2"></i><span class="mtphr-shortcode-gen-icon-id">minus-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-alert-3"></i><span class="mtphr-shortcode-gen-icon-id">alert-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-slideshow"></i><span class="mtphr-shortcode-gen-icon-id">slideshow</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-atom"></i><span class="mtphr-shortcode-gen-icon-id">atom</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-dropper"></i><span class="mtphr-shortcode-gen-icon-id">dropper</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-globe"></i><span class="mtphr-shortcode-gen-icon-id">globe</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-globe-2"></i><span class="mtphr-shortcode-gen-icon-id">globe-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-shipping"></i><span class="mtphr-shortcode-gen-icon-id">shipping</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-yin-yang"></i><span class="mtphr-shortcode-gen-icon-id">yin-yang</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-compass"></i><span class="mtphr-shortcode-gen-icon-id">compass</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zip"></i><span class="mtphr-shortcode-gen-icon-id">zip</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-zip-2"></i><span class="mtphr-shortcode-gen-icon-id">zip-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-anchor"></i><span class="mtphr-shortcode-gen-icon-id">anchor</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-locked-heart"></i><span class="mtphr-shortcode-gen-icon-id">locked-heart</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-magnet"></i><span class="mtphr-shortcode-gen-icon-id">magnet</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-nautical-vessel"></i><span class="mtphr-shortcode-gen-icon-id">nautical-vessel</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tag-3"></i><span class="mtphr-shortcode-gen-icon-id">tag-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-like-plus"></i><span class="mtphr-shortcode-gen-icon-id">like-plus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-like-minus"></i><span class="mtphr-shortcode-gen-icon-id">like-minus</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-usb"></i><span class="mtphr-shortcode-gen-icon-id">usb</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-clipboard"></i><span class="mtphr-shortcode-gen-icon-id">clipboard</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-clipboard-2"></i><span class="mtphr-shortcode-gen-icon-id">clipboard-2</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-clipboard-3"></i><span class="mtphr-shortcode-gen-icon-id">clipboard-3</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-power"></i><span class="mtphr-shortcode-gen-icon-id">power</span></a>
			<a class="mtphr-shortcode-gen-icon-group" href="#"><i class="mtphr-icon-tools-4"></i><span class="mtphr-shortcode-gen-icon-id">tools-4</span></a>
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


