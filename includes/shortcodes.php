<?php

/* --------------------------------------------------------- */
/* !Create a grid block - 2.1.2 */
/* --------------------------------------------------------- */

function mtphr_grid_display( $atts, $content = null ) {
	return mtphr_grid_render_display( $atts, $content );
}
add_shortcode( 'grid', 'mtphr_grid_display' );
add_shortcode( 'mtphr_grid', 'mtphr_grid_display' );

function mtphr_grid_display_2( $atts, $content = null ) {
	return mtphr_grid_render_display( $atts, $content );
}
add_shortcode( 'mtphr_grid_2', 'mtphr_grid_display_2' );

function mtphr_grid_display_3( $atts, $content = null ) {
	return mtphr_grid_render_display( $atts, $content );
}
add_shortcode( 'mtphr_grid_3', 'mtphr_grid_display_3' );

function mtphr_grid_display_4( $atts, $content = null ) {
	return mtphr_grid_render_display( $atts, $content );
}
add_shortcode( 'mtphr_grid_4', 'mtphr_grid_display_4' );

function mtphr_grid_display_5( $atts, $content = null ) {
	return mtphr_grid_render_display( $atts, $content );
}
add_shortcode( 'mtphr_grid_5', 'mtphr_grid_display_5' );

if( !function_exists('mtphr_grid_render_display') ) {
function mtphr_grid_render_display( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
		'span' => 12,
		'start' => false,
		'end' => false,
		'row_class' => '',
		'class' => '',
		'level' => 1
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_grid_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	// Set the responsiveness of the grid
	$settings = mtphr_shortcodes_settings();
	$row = apply_filters( 'mtphr_shortcodes_responsive_grid', $settings['responsive'] );

	// Check for nested shortcode
	$content = mtphr_shortcodes_parse_shortcode_content( $content );

	$html ='';
	if( $start ) {
	
		// Set the row class
		$row_classes = array();
		$row_classes[] = $row ? 'mtphr-shortcodes-row-responsive' : 'mtphr-shortcodes-row';
		
		if( !empty( $row_class ) ) {
			if( !is_array( $row_class ) ) {
				$row_class = preg_split( '#\s+#', $row_class );
			}
			$row_classes = array_merge( $row_classes, $row_class );
		} else {
			// Ensure that we always coerce class to being an array.
			$row_class = array();
		}
	
		$row_classes = array_map( 'esc_attr', $row_classes );
	
		$html .= apply_filters( 'mtphr_grid_row_open', '<div class="'.join( ' ', $row_classes ).'">', $row_classes, $args );
	}
	
	// Set the grid class
	$classes = array();
	$classes[] = 'mtphr-shortcodes-grid'.$span;
	
	if( !empty( $class ) ) {
		if( !is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}
		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	$classes = array_map( 'esc_attr', $classes );

	$html .= apply_filters( 'mtphr_grid_block', '<div class="'.join( ' ', $classes ).'">'.$content.'</div>', $content, $classes, $args );
	
	if( $end ) {
		$html .= apply_filters( 'mtphr_grid_row_close', '</div>', $args );
	}

	return $html;
}
}



/* --------------------------------------------------------- */
/* !Create a post slider - 2.2.5 */
/* --------------------------------------------------------- */

function mtphr_post_slider_display( $atts, $content = null ) {

	$settings = mtphr_shortcodes_settings();

	// Set the defaults
	$defaults = array(
		'type' => 'post',
		'title' => __('Blog Posts', 'mtphr-shortcodes'),
		'orderby' => 'rand',
		'order' => 'DESC',
		'limit' => -1,
		'post_parent' => false,
		'post_parent__in' => false,
		'post_parent__not_in' => false,
		'post__in' => false,
		'post__not_in' => false,
		'thumb_size' => 'thumbnail',
		'excerpt_length' => 80,
		'excerpt_more' => '&hellip;',
		'prev' => __('Previous', 'mtphr-shortcodes'),
		'next' => __('Next', 'mtphr-shortcodes'),
		'class' => '',
		'taxonomy' => false,
		'terms' => '',
		'operator' => 'IN',
		'tax_query' => false,
		'id' => md5(uniqid(rand(), true)),
		'slide_speed' => intval($settings['slide_speed']),
		'slide_ease' => sanitize_text_field($settings['slide_ease'])
	);

	// Filter the defaults
	$post_type = isset( $atts['type'] ) ? $atts['type'] : $defaults['type'];
	$defaults = apply_filters( 'mtphr_post_slider_default_args', $defaults, $post_type );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	if( $post_type == 'custom' ) {

		ob_start(); ?>
		<div id="mtphr-post-slider-<?php echo $id; ?>" class="mtphr-post-slider mtphr-post-slider-<?php echo $type; ?> mtphr-clearfix <?php echo esc_attr($class); ?>">

			<div class="mtphr-post-slider-header mtphr-clearfix">
				<?php if( $title != '' ) { ?>
					<?php echo apply_filters( 'mtphr_post_slider_title', '<h3 class="mtphr-post-slider-title">'.$title.'</h3>', $defaults ); ?>
				<?php } ?>
				<div class="mtphr-post-slider-navigation mtphr-clearfix">
					<?php echo apply_filters( 'mtphr_post_slider_prev', '<a class="mtphr-post-slider-prev disabled" href="#"><span>'.$prev.'</span></a>', $prev ); ?>
					<?php echo apply_filters( 'mtphr_post_slider_next', '<a class="mtphr-post-slider-next" href="#"><span>'.$next.'</span></a>', $next ); ?>
				</div>
			</div>
			<div class="mtphr-post-slider-content-wrapper">
				<div class="mtphr-post-slider-content mtphr-clearfix">
				<?php
				// Return the output
				$html = ob_get_clean();

				$html .= mtphr_shortcodes_parse_shortcode_content($content);

				ob_start(); ?>
			</div></div></div>
		<?php
		$html .= ob_get_clean();

	} else {
		
		if( $post_parent__in && !is_array($post_parent__in) ) {
			$post_parent__in = array_map('trim', explode(',', $post_parent__in));
		}
		if( $post_parent__not_in && !is_array($post_parent__not_in) ) {
			$post_parent__not_in = array_map('trim', explode(',', $post_parent__not_in));
		}
		if( $post__in && !is_array($post__in) ) {
			$post__in = array_map('trim', explode(',', $post__in));
		}
		if( $post__not_in && !is_array($post__not_in) ) {
			$post__not_in = array_map('trim', explode(',', $post__not_in));
			$post__not_in[] = get_the_ID();
		} else {
			$post__not_in = array( get_the_ID() );
		}

		$query_args = array(
			'post_type'=> $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => $limit,
			'post_parent' => intval($post_parent),
			'post_parent__in' => $post_parent__in,
			'post_parent__not_in' => $post_parent__not_in,
			'post__in' => $post__in,
			'post__not_in' => $post__not_in,
			'tax_query' => array()
		);
		
		// Setup taxonomy queries
		$taxonomy_query = array();
		if( $tax_query ) {

			$query_taxes = explode('%%', $tax_query);
			if( is_array($query_taxes) && count($query_taxes) > 0 ) {
				foreach( $query_taxes as $i=>$query_tax ) {
					if( $query_tax != '' ) {
						$query_data = explode('|', $query_tax);
						$tax = array(
							'taxonomy' => isset($query_data[0]) ? $query_data[0] : false,
							'field' => isset($query_data[3]) ? $query_data[3] : 'slug',
							'terms' => isset($query_data[1]) ? explode(',', $query_data[1]) : false,
							'operator' => isset($query_data[2]) ? $query_data[2] : false
						);
						$taxonomy_query[] = $tax;
					}
				}
			}
		} 
		
		if( $taxonomy && $terms ) {
			
			$tax = array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => explode(',', $terms),
				'operator' => $operator
			);
			$taxonomy_query[] = $tax;
		}
		
		// Add the taxonomy query, if there are some
		if( count($taxonomy_query) > 0 ) {
			$query_args['tax_query'] = $taxonomy_query;
		}
		
		// Check for query args
		$q_taxonomy = isset($_GET['taxonomy']) ? $_GET['taxonomy'] : false;
		$q_terms = isset($_GET['terms']) ? $_GET['terms'] : false;
		if( $q_taxonomy && $q_terms ) {
			$tax_query = array(
				'taxonomy' => $q_taxonomy,
				'field' => 'slug',
				'terms' => explode(',', $q_terms)
			);
			$query_args['tax_query'][] = $tax_query;
		}

		// Filter the args
		$query_args = apply_filters( 'mtphr_post_slider_query_args', $query_args );

		// Save the original query & create a new one
		global $wp_query;
		$original_query = $wp_query;
		$wp_query = null;
		$wp_query = new WP_Query();
		$wp_query->query( $query_args );

		$html = '';

		if ( $wp_query->have_posts() ) :

			ob_start(); ?>
			<div id="mtphr-post-slider-<?php echo $id; ?>" class="mtphr-post-slider mtphr-post-slider-<?php echo $type; ?> mtphr-clearfix <?php echo esc_attr($class); ?>">
			
				<div class="mtphr-post-slider-header mtphr-clearfix">
					<?php if( $title != '' ) { ?>
						<?php echo apply_filters( 'mtphr_post_slider_title', '<h3 class="mtphr-post-slider-title">'.$title.'</h3>', $args ); ?>
					<?php } ?>
					<div class="mtphr-post-slider-navigation mtphr-clearfix">
						<?php echo apply_filters( 'mtphr_post_slider_prev', '<a class="mtphr-post-slider-prev" href="#" class="disabled"><span>'.$prev.'</span></a>', $prev ); ?>
						<?php echo apply_filters( 'mtphr_post_slider_next', '<a class="mtphr-post-slider-next" href="#"><span>'.$next.'</span></a>', $next ); ?>
					</div>
				</div>
				<div class="mtphr-post-slider-content-wrapper">
					<div class="mtphr-post-slider-content mtphr-clearfix">
					<?php
					// Return the output
					$html = ob_get_clean();

					/* Start the Loop */
					while ( $wp_query->have_posts() ) : $wp_query->the_post();
						
						// Create the permalink w/query args
						$permalink = ( $q_taxonomy && $q_terms ) ? esc_url( add_query_arg(array('taxonomy' => $q_taxonomy, 'terms' => $q_terms), get_permalink()) ) : esc_url( remove_query_arg(array('taxonomy', 'terms'), get_permalink()) );
						$excerpt_more_text = $excerpt_more;
						
						$post = get_post( get_the_id() );
						$post_type = $type;

						// Get the excerpt
						$excerpt = '';
						if( $excerpt_length > 0 ) {

							$links = array();
							preg_match('/{(.*?)\}/s', $excerpt_more_text, $links);
							if( isset($links[0]) ) {
								$more_link = apply_filters( 'mtphr_post_slider_excerpt_more_link', '<a class="mtphr-post-slider-excerpt-more-link" href="'.$permalink.'">'.$links[1].'</a>', $permalink, $links[1] );
								$excerpt_more_text = preg_replace('/{(.*?)\}/s', $more_link, $excerpt_more_text);
							}
							$the_content = ( $post->post_excerpt != '' ) ? $post->post_excerpt : strip_shortcodes($post->post_content);
							$excerpt = wp_html_excerpt( $the_content, intval($excerpt_length) ).'<span class="mtphr-post-slider-excerpt-more">'.$excerpt_more_text.'</span>';
						}

						// Set the default content
						ob_start(); ?>
						<?php if( $thumb_size != 'none' ) {
							echo get_the_post_thumbnail( get_the_id(), $thumb_size );
						} ?>
						<h3 class="mtphr-post-slider-block-title"><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
						<p class="mtphr-post-slider-block-excerpt"><?php echo $excerpt; ?></p>
						<?php
						$block = ob_get_clean();

						ob_start();
						?>
						<div class="mtphr-post-slider-block mtphr-<?php echo $post_type; ?>-post-slider-block <?php echo $class; ?>">
							<?php echo apply_filters( "mtphr_{$post_type}_post_slider_block", $block, $excerpt, $args, $permalink ); ?>
						</div>
						<?php
						$html .= ob_get_clean();

					endwhile;

				ob_start(); ?>
				</div>
			</div>
		</div>
		<?php
		$html .= ob_get_clean();

		else :
		endif;

		$wp_query = null;
		$wp_query = $original_query;
		wp_reset_postdata();
	}

	// Add the global variable
	global $mtphr_post_slider;
	$mtphr_post_slider['mtphr-post-slider-'.$id] = array(
		'slide_speed' => $slide_speed,
		'slide_ease' => $slide_ease
	);

	return $html;
}
add_shortcode( 'post_slider', 'mtphr_post_slider_display' );
add_shortcode( 'mtphr_post_slider', 'mtphr_post_slider_display' );



/* --------------------------------------------------------- */
/* !Create a post block - 2.2.4 */
/* --------------------------------------------------------- */

function mtphr_post_block_display( $atts, $content = null ) {

	global $mtphr_post_block_randomids;

	// Set the defaults
	$defaults = array(
		'id' => '',
		'class' => '',
		'type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC',
		'offset' => '0',
		'thumb_size' => 'thumbnail',
		'excerpt_length' => 80,
		'excerpt_more' => '&hellip;',
		'taxonomy' => false,
		'terms' => '',
		'operator' => 'IN'
	);

	// Filter the defaults
	if( isset($atts['id']) && $atts['id'] != '' ) {
		$post_type = get_post_type( $atts['id'] );
	} else {
		$post_type = isset( $atts['type'] ) ? $atts['type'] : $defaults['type'];
	}
	$defaults = apply_filters( 'mtphr_post_block_default_args', $defaults, $post_type );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	if( $id == '' ) {

		$query_args = array(
			'post_type' => $type,
			'orderby' => $orderby,
			'order' => $order,
			'posts_per_page' => 1,
			'offset' => $offset
		);
		if( $taxonomy && $terms ) {
			$tax_query = array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => explode(',', $terms),
				'operator' => $operator
			);
			$query_args['tax_query'] = array( $tax_query );
		}
		
		// Make sure no random post blocks are the same
		if( $orderby == 'rand' && is_array($mtphr_post_block_randomids) ) {
			$query_args['post__not_in'] = $mtphr_post_block_randomids;
		}

	} else {

		$type = get_post_type($id);
		$query_args = array(
			'post_type' => $type,
			'p' => $id
		);
	}

	// Filter the args
	$query_args = apply_filters( 'mtphr_post_block_query_args', $query_args, $type );

	// Save the original query & create a new one
	global $wp_query;
	$original_query = $wp_query;
	$wp_query = null;
	$wp_query = new WP_Query();
	$wp_query->query( $query_args );

	$html = '';

	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
	
		$post = get_post( get_the_id() );
	
		// Store the random ids
		if( $orderby == 'rand' ) {
			if( is_array($mtphr_post_block_randomids) ) {
				$mtphr_post_block_randomids[] = get_the_id();
			} else {
				$mtphr_post_block_randomids = array( get_the_id() );
			}
		}
		
		// Create the permalink w/query args
		$permalink = get_permalink();
		$excerpt_more_text = $excerpt_more;
	
		if( $class != '' ) {
			$class = ' '.$class;
		}
		if( $id != '' ) {
			$type = get_post_type();
		}
	
		ob_start(); ?>
	
		<?php if( $thumb_size != 'none' ) {
			echo get_the_post_thumbnail( get_the_id(), $thumb_size );
		} ?>
	
		<h3><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
	
		<?php
		// Get the excerpt
		$excerpt = '';
		if( $excerpt_length > 0 ) {
	
			$links = array();
			preg_match('/{(.*?)\}/s', $excerpt_more_text, $links);
			if( isset($links[0]) ) {
				$more_link = apply_filters( 'mtphr_post_block_excerpt_more_link', '<a class="mtphr-post-block-excerpt-more-link" href="'.$permalink.'">'.$links[1].'</a>', $permalink, $links[1] );
				$excerpt_more_text = preg_replace('/{(.*?)\}/s', $more_link, $excerpt_more_text);
			}
			$the_content = ( $post->post_excerpt != '' ) ? $post->post_excerpt : strip_shortcodes($post->post_content);
			$excerpt = wp_html_excerpt( $the_content, intval($excerpt_length) ).'<span class="mtphr-post-block-excerpt-more">'.$excerpt_more_text.'</span>';
		}
		?>
		<p><?php echo $excerpt; ?></p>
	
		<?php
		$block = ob_get_clean();
	
		$html .= '<div class="mtphr-post-block mtphr-post-block-'.$type.$class.'">';
		$html .= apply_filters( "mtphr_{$type}_post_block", $block, $excerpt, $args, $permalink );
		$html .= '</div>';

	endwhile;
	else :
	endif;

	$wp_query = null;
	$wp_query = $original_query;
	wp_reset_postdata();

	return $html;
}
add_shortcode( 'post_block', 'mtphr_post_block_display' );
add_shortcode( 'mtphr_post_block', 'mtphr_post_block_display' );



/* --------------------------------------------------------- */
/* !Create a pricing table - 2.1.0 */
/* --------------------------------------------------------- */

function mtphr_pricing_table_display( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
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
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_pricing_table_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	// Set the responsiveness of the grid
	$settings = mtphr_shortcodes_settings();
	$row = apply_filters( 'mtphr_shortcodes_responsive_grid', $settings['responsive'] );
	$row_class = $row ? 'mtphr-shortcodes-row-responsive' : 'mtphr-shortcodes-row';

	$html ='';
	if( $start ) {
		$html .= '<div class="'.$row_class.'">';
	}
	if( $class != '' ) {
		$class = ' '.$class;
	}

	$html .= '<div class="mtphr-shortcodes-grid'.$span.$class.'">';

	$html .= '<div class="mtphr-pricing-table mtphr-pricing-table-'.$style.'">';

	if( $style != 'list' ) {
		if( $title != '' ) {
			$title = apply_filters( 'mtphr_pricing_table_title', $title );
			$title_tag = apply_filters( 'mtphr_pricing_table_title_tag', $title_tag );
			$html .= '<'.$title_tag.' class="mtphr-pricing-table-title">'.$title.'</'.$title_tag.'>';
		}
		if( $dollar != '' || $cents != '' ) {
			$html .= '<p class="mtphr-pricing-table-price mtphr-clearfix">';
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
		if( $button != '' && $button != 'null' ) {
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
add_shortcode( 'pricing_table', 'mtphr_pricing_table_display' );
add_shortcode( 'mtphr_pricing_table', 'mtphr_pricing_table_display' );



/* --------------------------------------------------------- */
/* !Create a slide graph - 2.0.4 */
/* --------------------------------------------------------- */

function mtphr_slide_graph_display( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
		'title' => false,
		'title_width' => 80,
		'percent' => 50,
		'percent_label' => false
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_slide_graph_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	$html = '<div class="mtphr-slide-graph">';
	$html .= '<input type="hidden" value="'.floatval($percent).'" />';
	if( $title ) {
		$html .= '<div class="mtphr-slide-graph-title" style="width:'.intval($title_width).'px">'.apply_filters( 'mtphr_slide_graph_title', sanitize_text_field($title), $args ).'</div>';
	} else {
		$title_width = 0;
	}
	if( is_rtl() ) {
		$html .= '<div class="mtphr-slide-graph-container" style="margin-right:'.intval($title_width).'px">';
	} else {
		$html .= '<div class="mtphr-slide-graph-container" style="margin-left:'.intval($title_width).'px">';
	}
	if( !$percent_label ) {
		$percent_label = floatval($percent).'%';
	}
	$html .= '<div class="mtphr-slide-graph-fill-bg">';
	$html .= '<span class="mtphr-slide-graph-percent">'.apply_filters( 'mtphr_slide_graph_percent_label', $percent_label, $args ).'</span>';
	$html .= '<div class="mtphr-slide-graph-fill"></div>';
	$html .= '</div>';
	$html .= '</div>';
	$html .= '</div>';

	// Add the global variable
	global $mtphr_slide_graphs;
	$mtphr_slide_graphs = true;

	return $html;
}
add_shortcode( 'mtphr_slide_graph', 'mtphr_slide_graph_display' );



/* --------------------------------------------------------- */
/* !Create a tabbed area - 2.2.0 */
/* --------------------------------------------------------- */

function mtphr_tab_display( $atts, $content = null ) {

	$settings = mtphr_shortcodes_settings();

	// Set the defaults
	$defaults = array(
		'title' => false,
		'image' => false,
		'image_width' => 100,
		'image_alt' => '',
		'start' => false,
		'end' => false,
		'id' => md5(uniqid(rand(), true)),
		'tab_speed' => intval($settings['tab_speed']),
		'tab_ease' => sanitize_text_field($settings['tab_ease'])
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_tab_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	$html = '';
	if( $start ) {
		$html .= '<table id="mtphr-tabs-'.$id.'" class="mtphr-tabs mtphr-tabs-container"><tr class="mtphr-tabs-links">';
	}
	$tab_content = '<div class="mtphr-tab-content mtphr-tabs-content"><table><tr>';
	if( $image ) {
		$tab_content .= '<td class="mtphr-tab-content-image" style="width:'.intval($image_width).'px"><img src="'.sanitize_text_field($image).'" width="'.intval($image_width).'" alt="'.sanitize_text_field($title).'" /></td>';
		$tab_content .= '<td class="mtphr-tab-content-text">'.mtphr_shortcodes_parse_shortcode_content( $content ).'</td>';
	} else {
		$tab_content .= '<td>'.mtphr_shortcodes_parse_shortcode_content( $content ).'</td>';
	}
	$tab_content .= '</tr></table></div>';
	$html .= '<td class="mtphr-tab-link"><a href="#" rel="nofollow">'.sanitize_text_field($title).'</a>'.$tab_content.'</td>';
	if( $end ) {
		$html .= '</tr><tr><td class="mtphr-tab-content-container mtphr-tabs-content-container" colspan="1"><div class="mtphr-tabs-content-container-inner"></div></td></tr></table>';
	}

	
	// Add the global variable
	if( $start ) {
		global $mtphr_tabs;
		$mtphr_tabs['mtphr-tabs-'.$id] = array(
			'tab_speed' => $tab_speed,
			'tab_ease' => $tab_ease
		);
	}

	return $html;
}
add_shortcode( 'mtphr_tab', 'mtphr_tab_display' );



/* --------------------------------------------------------- */
/* !Create a toggle - 2.0.9 */
/* --------------------------------------------------------- */

function mtphr_toggle_display( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
		'id' => '',
		'heading' => '',
		'condensed' => '',
		'class' => ''
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_toggle_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );
	?>

	<?php ob_start(); ?>

	<?php do_action( 'mtphr_toggle_before', $id ); ?>
	<div class="mtphr-toggle <?php echo sanitize_html_class($class); ?>">
		<?php do_action( 'mtphr_toggle_top', $id ); ?>

		<?php
		$heading = sanitize_text_field($heading);
		$heading = apply_filters( 'mtphr_toggle_heading', '<a href="#"><span class="mtphr-toggle-button mtphr-toggle-button-condensed">+</span><span class="mtphr-toggle-button mtphr-toggle-button-expanded">&ndash;</span>'.$heading.'</a>', $heading, $id );
		$content = apply_filters( 'mtphr_toggle_content', wpautop(convert_chars(wptexturize(mtphr_shortcodes_parse_shortcode_content($content)))), $id );
		?>

		<?php $active = ( $condensed == 'false' || $condensed == '0' ) ? ' active' : ''; ?>
		<p class="mtphr-toggle-heading<?php echo $active; ?>"><?php echo $heading; ?></p>
		<div class="mtphr-toggle-content"><?php echo $content; ?></div>

		<?php do_action( 'mtphr_toggle_bottom', $id ); ?>
	</div>
	<?php do_action( 'mtphr_toggle_after', $id ); ?>

	<?php
	// Add the global variable
	global $mtphr_toggles;
	$mtphr_toggles = true;
	?>

	<?php
	// Return the output
	return ob_get_clean();
}
add_shortcode( 'mtphr_toggle', 'mtphr_toggle_display' );



/* --------------------------------------------------------- */
/* !Create icons - 2.1.1 */
/* --------------------------------------------------------- */

function mtphr_icon_display( $atts, $content = null ) {

	// Set the defaults
	$defaults = array(
		'id' => '',
		'prefix' => 'mtphr-shortcodes-ico',
		'class' => '',
		'style' => '',
		'title' => '',
		'title_class' => '',
		'title_style' => '',
		'link' => '',
		'link_class' => '',
		'link_style' => '',
		'target' => '_self'
	);

	// Filter the defaults
	$defaults = apply_filters( 'mtphr_icon_default_args', $defaults );

	// Extract the atts
	$args = shortcode_atts( $defaults, $atts );
	extract( $args );

	$html = '';
	if( $id != '' ) {
		$class = ( $class != '' ) ? sanitize_html_class( $class ) : '';
		$class .= ( $link != '' ) ? ' metaphor-icon-linked' : '';
		$html .= '<span class="metaphor-icon '.$class.'">';
		if( $link != '' ) {
			$link_class = ( $link_class != '' ) ? ' '.sanitize_html_class( $link_class ) : '';
			$link_style = ( $link_style != '' ) ? ' style="'.sanitize_text_field($link_style).'"' : '';
			$html .= '<a class="metaphor-icon-link mtphr-clearfix'.$link_class.'"'.$link_style.' href="'.esc_url($link).'" target="'.sanitize_text_field($target).'">';
		}
		$icon_class = sanitize_html_class( $prefix.'-'.$id );
		//$class = ( $class == '' ) ? sanitize_html_class( $icon_class ) : sanitize_html_class( $icon_class ).' '.sanitize_html_class( $class );
		$style = ( $style != '' ) ? ' style="'.sanitize_text_field($style).'"' : '';
		$html .= '<i class="'.$icon_class.'"'.$style.'></i>';
		if( $title != '' ) {
			$title_class = ( $title_class != '' ) ? ' '.sanitize_html_class( $title_class ) : '';
			$title_style = ( $title_style != '' ) ? ' style="'.sanitize_text_field($title_style).'"' : '';
			$html .= '<span class="metaphor-icon-title'.$title_class.'"'.$title_style.'>'.$title.'</span>';
		}
		if( $link != '' ) {
			$html .= '</a>';
		}
		$html .= '</span>';
	}
	
	$html = apply_filters( 'mtphr_icon_display', $html, $args );

	return $html;
}
add_shortcode( 'mtphr_icon', 'mtphr_icon_display' );




