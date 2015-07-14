<?php

/* --------------------------------------------------------- */
/* !Return a post types taxonomies for select fields - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_select_taxonomies') ) {
function mtphr_shortcodes_select_taxonomies( $post_type ) {

	$html = '';
	
	// Get the taxonomy objects
	$taxonomies = get_object_taxonomies( $post_type, 'objects' );
	if( is_array($taxonomies) && count($taxonomies) > 0 ) {
		foreach( $taxonomies as $slug=>$tax ) {
		  $html .= '<option value="'.$slug.'">'.$tax->labels->singular_name.'</option>';
		}
	}
  
  return $html;
}
}


/* --------------------------------------------------------- */
/* !Return a term check list - 2.2.1 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_select_terms') ) {
function mtphr_shortcodes_select_terms( $taxonomy ) {

	$html = '';
	
	// Get the taxonomy objects
	$terms = get_terms( $taxonomy );
	if( is_array($terms) && count($terms) > 0 ) {
		foreach( $terms as $slug=>$term ) {
		  $html .= '<label class="mtphr-ui-multi-check"><input class="mtphr-shortcode-gen-term-select" type="checkbox" value="'.$term->slug.'" />'.$term->name.'</label>';
		}
	}
  
  return $html;
}
}


/* --------------------------------------------------------- */
/* !Setup the author select row - 2.2.7 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_gen_author_row') ) {
function mtphr_shortcodes_gen_author_row( $row_class='' ) {
	?>
	<div class="row <?php echo $row_class; ?>">
					
		<div class="col-md-12">
			<div class="mtphr-ui-form-group mtphr-shortcode-gen-author">
				<label class="mtphr-ui-label-top"><?php _e('Authors', 'mtphr-shortcodes'); ?></label>
				<div class="mtphr-shortcode-gen-authors">
					<?php echo mtphr_shortcodes_select_authors(); ?>
				</div>
			</div>
		</div>
		
	</div><!-- .row -->
	<?php
}
}


/* --------------------------------------------------------- */
/* !Return an author check list - 2.2.7 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_select_authors') ) {
function mtphr_shortcodes_select_authors() {

	$html = '';
	
	$authors = get_users( array(
    'fields'  => array( 'display_name', 'id' ),
    'orderby' => 'post_count',
    'order'   => 'DESC',
    'who'     => 'authors',
  ));
	
	// Get the taxonomy objects
	if( is_array($authors) && count($authors) > 0 ) {
		foreach( $authors as $slug=>$author ) {
		  $html .= '<label class="mtphr-ui-multi-check"><input class="mtphr-shortcode-gen-author-select" type="checkbox" value="'.$author->id.'" />'.$author->display_name.'</label>';
		}
	}
  
  return $html;
}
}



/* --------------------------------------------------------- */
/* !Find a string between 2 strings - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_get_between') ) {
function mtphr_shortcodes_get_between( $content, $start, $end ){

  $r = explode( $start, $content );
  if( isset($r[1]) ) {
	  $r = explode( $end, $r[1] );
	  return $r[0];
  }
  return '';
}
}