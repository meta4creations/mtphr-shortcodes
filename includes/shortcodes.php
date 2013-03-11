<?php
/**
 * Put all the shortcodes here
 *
 * @package Metaphor Shortcodes
 */




add_shortcode( 'grid', 'mtphr_grid' );
/**
 * Create a grid block
 *
 * @since 1.0.0
 */
function mtphr_grid( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'span' => 12,
		'start' => false,
		'end' => false,
		'class' => ''
	), $atts ) );

	// Check for nested shortcode
	$content = mtphr_shortcodes_parse_shortcode_content( $content );
	
	$html ='';
	if( $start ) {
		$html .= '<div class="mtphr-shortcodes-row">'; 
	}
	if( $class != '' ) {
		$class = ' '.$class;
	}
	$html .= '<div class="mtphr-shortcodes-span'.$span.$class.'">'.$content.'</div>';
	if( $end ) {
		$html .= '</div>'; 
	}
	
	return $html;
}




add_shortcode( 'post_slider', 'mtphr_post_slider' );
/**
 * Create a post slider
 *
 * @since 1.0.0
 */
function mtphr_post_slider( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
		'type' => 'post',
		'title' => __('Blog Posts', 'mtphr-shortcodes'),
		'orderby' => 'rand',
		'order' => 'DESC',
		'limit' => -1,
		'image_size' => 'thumbnail',
		'excerpt_length' => 80,
		'excerpt_more' => '&hellip;',
		'prev' => __('Previous', 'mtphr-shortcodes'),
		'next' => __('Next', 'mtphr-shortcodes'),
		'class' => ''
	);
	
	// Filter the defaults
	$post_type = isset( $atts['type'] ) ? $atts['type'] : $defaults['type'];
	$defaults = apply_filters( 'mtphr_post_slider_default_args', $defaults, $post_type );
	
	// Extrac the atts
	extract( shortcode_atts( $defaults, $atts ) );
	
	$args = array(
		'post_type'=> $type,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $limit,
		'post__not_in' => array( get_the_ID() )	
	);
	
	// Filter the args
	$args = apply_filters( 'mtphr_post_slider_query_args', $args );

	// Save the original query & create a new one
	global $wp_query;
	$original_query = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query( $args );
	
	$html = '';

	if ( $wp_query->have_posts() ) :
		
		ob_start(); ?>
		<div class="mtphr-post-slider mtphr-post-slider-<?php echo $type; ?> clearfix <?php echo esc_attr($class); ?>">
			
			<div class="mtphr-post-slider-header clearfix">
				<?php if( $title != '' ) { ?>
					<h3 class="mtphr-post-slider-title"><?php echo $title; ?></h3>
				<?php } ?>
				<div class="mtphr-post-slider-navigation clearfix">
					<?php echo apply_filters( 'mtphr_post_slider_prev', '<a class="mtphr-post-slider-prev" href="#" class="disabled"><span>'.$prev.'</span></a>', $prev ); ?>
					<?php echo apply_filters( 'mtphr_post_slider_next', '<a class="mtphr-post-slider-next" href="#"><span>'.$next.'</span></a>', $next ); ?>
				</div>
			</div>
			<div class="mtphr-post-slider-content clearfix">
		<?php
		// Return the output
		$html = ob_get_clean();
	
	/* Start the Loop */
	while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
		//$post = get_post( get_the_ID() );
		$post = get_post( get_the_ID() );
		$post_type = $type;
		
		// Get the excerpt
		$excerpt = '';
		if( $excerpt_length > 0 ) {
		
			$links = array();
			preg_match('/{(.*?)\}/s', $excerpt_more, $links);
			if( isset($links[0]) ) {
				$more_link = '<a href="'.get_permalink().'">'.$links[1].'</a>';
				$excerpt_more = preg_replace('/{(.*?)\}/s', $more_link, $excerpt_more);
			}
			$excerpt = get_mtphr_shortcodes_excerpt( $excerpt_length, $excerpt_more );
		}

		// Set the default content
		ob_start(); ?>
		<h3 class="mtphr-post-slider-block-title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php the_title(); ?></a></h3>
		<p class="mtphr-post-slider-block-excerpt"><?php echo $excerpt; ?></p>
		<?php
		$block = ob_get_clean();
		
		ob_start();
		?>
		<div class="mtphr-post-slider-block mtphr-<?php echo $post_type; ?>-post-slider-block <?php echo $class; ?>">
			<?php echo apply_filters( "mtphr_{$post_type}_post_slider_block", $block, $excerpt ); ?>
		</div>
		<?php
		$html .= ob_get_clean();

	endwhile;
	
	ob_start(); ?>
	</div></div>
	<?php
	$html .= ob_get_clean();

	else :
	endif;

	$wp_query = null;
	$wp_query = $original_query;
	wp_reset_postdata();
	
	// Add footer scripts
	add_action( 'wp_footer', 'mtphr_post_slider_footer_scripts' );
	
	ob_start(); ?>
	<script>
	jQuery( document ).ready( function($) {
		$('.mtphr-post-slider').mtphr_post_slider();
	});
	</script>
	<?php
	$html .= ob_get_clean();

	return $html;
}




add_shortcode( 'post_block', 'mtphr_post_block' );
/**
 * Create a post block
 *
 * @since 1.0.0
 */
function mtphr_post_block( $atts, $content = null ) {
	
	// Set the defaults
	$defaults = array(
		'id' => '',
		'class' => '',
		'type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC',
		'offset' => '0',
		'excerpt_length' => 80,
		'excerpt_more' => '&hellip;'
	);
	
	// Filter the defaults
	$post_type = isset( $atts['type'] ) ? $atts['type'] : $defaults['type'];
	$defaults = apply_filters( 'mtphr_post_block_default_args', $defaults, $post_type );
	
	// Extrac the atts
	extract( shortcode_atts( $defaults, $atts ) );
	
	if( $id == '' ) {
			
		$args = array(
			'post_type' => $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => 1,
			'offset' => $offset
		);
	} else {
		
		$type = get_post_type($id);
		$args = array(
			'post_type' => $type,
			'p' => $id
		);
	}
	
	// Filter the args
	$args = apply_filters( 'mtphr_post_block_query_args', $args, $type );

	// Save the original query & create a new one
	global $wp_query;
	$original_query = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query( $args );
	
	$html = '';

	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();

	if( $class != '' ) {
		$class = ' '.$class;
	}
	if( $id != '' ) {
		$type = get_post_type();
	}
	
	ob_start(); ?>
	
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
	<?php
	// Get the excerpt
	$excerpt = '';
	if( $excerpt_length > 0 ) {
	
		$links = array();
		preg_match('/{(.*?)\}/s', $excerpt_more, $links);
		if( isset($links[0]) ) {
			$more_link = '<a href="'.get_permalink().'">'.$links[1].'</a>';
			$excerpt_more = preg_replace('/{(.*?)\}/s', $more_link, $excerpt_more);
		}
		$excerpt = get_mtphr_shortcodes_excerpt( $excerpt_length, $excerpt_more );
	}
	?>
	<p><?php echo $excerpt; ?></p>
	
	<?php
	$block = ob_get_clean();

	$html .= '<div class="mtphr-post-block-'.$type.$class.'">';
	$html .= apply_filters( "mtphr_{$type}_post_block", $block, $excerpt );
	$html .= '</div>';
	
	endwhile;	
	else :
	endif;

	$wp_query = null;
	$wp_query = $original_query;
	wp_reset_postdata();
		
	return $html;
}




add_shortcode( 'pricing_table', 'mtphr_pricing_table' );
/**
 * Create a pricing table
 *
 * @since 1.0.0
 */
function mtphr_pricing_table( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'span' => 12,
		'start' => false,
		'end' => false,
		'class' => '',
		'style' => 'normal',
		'title' => '',
		'title_tag' => 'h3',
		'dollar' => '',
		'cents' => '',
		'per' => __('per month', 'mtphr-shortcodes'),
		'button' => __('Sign Up', 'mtphr-shortcodes'),
		'link' => '#'
	), $atts ) );
	
	$html ='';
	if( $start ) {
		$html .= '<div class="mtphr-shortcodes-row">'; 
	}
	if( $class != '' ) {
		$class = ' '.$class;
	}
	
	$html .= '<div class="mtphr-shortcodes-span'.$span.$class.'">';
	
	$html .= '<div class="mtphr-pricing-table mtphr-pricing-table-'.$style.'">';
	
	if( $style != 'list' ) {
		if( $title != '' ) {
			$title = apply_filters( 'mtphr_pricing_table_title', $title );
			$title_tag = apply_filters( 'mtphr_pricing_table_title_tag', $title_tag );
			$html .= '<'.$title_tag.' class="mtphr-pricing-table-title">'.$title.'</'.$title_tag.'>';
		}
		if( $dollar != '' || $cents != '' ) {
			$html .= '<p class="mtphr-pricing-table-price clearfix">';
			if( $dollar != '' ) {
				$dollar = apply_filters( 'mtphr_pricing_table_dollar', $dollar );
				$html .= '<span class="mtphr-pricing-table-dollar">'.$dollar.'</span>';
			}
			if( $cents != '' ) {
				$cents = apply_filters( 'mtphr_pricing_table_cents', $cents );
				$html .= '<span class="mtphr-pricing-table-cents">'.$cents.'</span>';
			}
			if( $per != '' ) {
				$per = apply_filters( 'mtphr_pricing_table_per', $per );
				$html .= '<span class="mtphr-pricing-table-per">'.$per.'</span>';
			}
			$html .= '</p>';
		}
	}
	
	$html .= '<div class="mtphr-pricing-table-values">'.mtphr_shortcodes_parse_shortcode_content( $content ).'</div>';
	
	if( $style != 'list' ) {
		if( $button != '' ) {
			$button = apply_filters( 'mtphr_pricing_table_button', $button );
			$html .= '<p class="mtphr-pricing-table-button"><a href="'.$link.'">'.$button.'</a></p>';
		}
	}
	
	$html .= '</div></div>';
	
	if( $end ) {
		$html .= '</div>'; 
	}

	return $html;
}

