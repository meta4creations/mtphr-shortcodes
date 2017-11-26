<?php

/* --------------------------------------------------------- */
/* !Ajax icon shortcode - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_shortcode_icon_gen() {
	check_ajax_referer( 'mtphr_shortcode_gen_nonce', 'security' );
	?>
	<div class="mtphr-shortcode-gen mtphr-shortcode-gen-mtphr_icon">
		<input type="hidden" class="shortcode" value="mtphr_icon" />
		<input type="hidden" class="shortcode-insert" />
		
		<?php
		$title = __('Icons', 'mtphr-shortcodes');
		echo mtphr_shortcodes_icon_admin_display( $title );
		?>

		<div class="row">
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="title" placeholder="<?php _e('Add a title next to the icon', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-4 mtphr-shortcode-gen-set-1">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="title_class" placeholder="<?php _e('Add a class to the title', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-4 mtphr-shortcode-gen-set-1">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Title Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="title_style" placeholder="<?php _e('Add additional styles to the title', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>

		</div><!-- .row -->
		
		<div class="row">
			
			<div class="col-md-4">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="link" placeholder="<?php _e('Add a link to the icon', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-2 mtphr-shortcode-gen-set-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link Target', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<select class="mtphr-ui-select" name="target">
						<option selected="selected">_self</option>
						<option>_blank</option>
					</select>
				</div>
			</div>
		
			<div class="col-md-3 mtphr-shortcode-gen-set-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="link_class" placeholder="<?php _e('Add a class to the link', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-3 mtphr-shortcode-gen-set-2">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('Link Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="link_style" placeholder="<?php _e('Add additional styles to the link', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>

		</div><!-- .row -->
		
		<div class="row">
		
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('CSS Class', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="class" placeholder="<?php _e('Add a class to the icon', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="mtphr-ui-form-group">
					<label class="mtphr-ui-label-top"><?php _e('CSS Style', 'mtphr-shortcodes'); ?> <small class="optional">(<?php _e('Optional', 'mtphr-shortcodes'); ?>)</small></label>
					<input class="mtphr-ui-text" type="text" name="style" placeholder="<?php _e('Add additional styles to the icon', 'mtphr-shortcodes'); ?>" />
				</div>
			</div>
		
		</div><!-- .row -->
		
	</div>
	<?php
	die();
}
add_action( 'wp_ajax_mtphr_shortcode_icon_gen', 'mtphr_shortcode_icon_gen' );




if( !function_exists('mtphr_shortcodes_icon_admin_display') ) {
function mtphr_shortcodes_icon_admin_display( $title=' ' ) {

	$html = '<div class="row">';
		$html .= '<div class="col-md-6">';
			$html .= '<h2>'.$title.'</h2>';
		$html .= '</div>';
		$html .= '<div class="col-md-6">';
			$html .= '<div id="mtphr-shortcodes-icon-filter" class="clearfix">';
				$html .= '<input id="mtphr-shortcodes-icon-filter-input" class="mtphr-ui-text" type="text" placeholder="'.__('Search icons...', 'mtphr-shortcodes').'" />';
				$html .= '<a id="mtphr-shortcodes-icon-filter-reset" href="#" class="mtphr-shortcodes-ico-error-2"></a>';
			$html .= '</div>';
		$html .= '</div>';
	$html .= '</div>';
	
	$icon_groups = mtphr_shortcodes_fontastic_icons();
	if( is_array($icon_groups) && count($icon_groups) > 0 ) {
		$html .= '<div id="mtphr-shortcodes-icon-selects">';
		foreach( $icon_groups as $prefix=>$group ) {	
			if( is_array($group['classes']) && count($group['classes']) > 0 ) {
				$html .= '<h4 class="mtphr-shortcodes-icon-group-title">'.$group['title'].' ('.count($group['classes']).' '.__('icons', 'mtphr-shortcodes').')</h4>';
				foreach( $group['classes'] as $i=>$class ) {
					$html .= '<a class="mtphr-shortcodes-icon-select" href="#" data-prefix="'.$prefix.'" data-id="'.$class.'">';
						$html .= '<i class="'.$prefix.' '.$prefix.'-'.$class.'"></i>';
					$html .= '</a>';
				}
			}
		}
		$html .= '</div>';
	}
	
	return $html;
}
}