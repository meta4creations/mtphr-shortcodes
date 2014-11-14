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
/* !Return a term check list - 2.2.0 */
/* --------------------------------------------------------- */

if( !function_exists('mtphr_shortcodes_select_terms') ) {
function mtphr_shortcodes_select_terms( $name, $taxonomy ) {

	$html = '';
	
	// Get the taxonomy objects
	$terms = get_terms( $taxonomy );
	if( is_array($terms) && count($terms) > 0 ) {
		foreach( $terms as $slug=>$term ) {
		  $html .= '<label class="mtphr-ui-multi-check"><input class="'.$name.'" type="checkbox" value="'.$term->slug.'" />'.$term->name.'</label>';
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