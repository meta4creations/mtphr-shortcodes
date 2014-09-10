/* Table of Contents

* jQuery triggers
* mtphr_grid
* mtphr_post_slider
* mtphr_post_block
* mtphr_toggle

*/

jQuery( document ).ready( function($) {

	$(window).resize( function() {
		mtphr_shortcode_generate_resize();
	});
	function mtphr_shortcode_generate_resize() {
		var $window = $('#TB_window'),
				$content = $('.mtphr-shortcode-gen-content'),
				w = $window.width(),
				h = $window.height();


		if( $content.length > 0 ) {
			$window.css('overflow', 'hidden');
			$window.find('#TB_ajaxContent').outerWidth(w);
			$window.find('#TB_ajaxContent').outerHeight(h);
		}
	}


	/* --------------------------------------------------------- */
	/* !Shortcode generator initialize - 2.0.5 */
	/* --------------------------------------------------------- */

	$('body').on('mtphr_shortcode_generator_init', function() {

		var $container = jQuery('.mtphr-shortcode-gen-container'),
				shortcode = $container.children('input.shortcode').val();

		switch( shortcode ) {
			case 'mtphr_grid':
				mtphr_shortcode_generate_mtphr_grid_init( $container );
				break;
			case 'mtphr_post_slider':
				mtphr_shortcode_generate_mtphr_post_slider_init( $container );
				break;
			case 'mtphr_post_block':
				mtphr_shortcode_generate_mtphr_post_block_init( $container );
				break;
			case 'mtphr_pricing_table':
				mtphr_shortcode_generate_mtphr_pricing_table_init( $container );
				break;
			case 'mtphr_slide_graph':
				mtphr_shortcode_generate_mtphr_slide_graph_init( $container );
				break;
			case 'mtphr_tab':
				mtphr_shortcode_generate_mtphr_tab_init( $container );
				break;
			case 'mtphr_toggle':
				mtphr_shortcode_generate_mtphr_toggle_init( $container );
				break;
			case 'mtphr_icon':
				mtphr_shortcode_generate_mtphr_icon_init( $container );
				break;
		}

		mtphr_shortcode_generate_resize();
	});

	/* --------------------------------------------------------- */
	/* !Shortcode generator trigger - 2.0.5 */
	/* --------------------------------------------------------- */

	$('body').on('mtphr_shortcode_generator_value', function() {

		var $container = jQuery('.mtphr-shortcode-gen-container'),
				shortcode = $container.children('input.shortcode').val();

		switch( shortcode ) {
			case 'mtphr_grid':
				mtphr_shortcode_generate_mtphr_grid_value( $container );
				break;
			case 'mtphr_post_slider':
				mtphr_shortcode_generate_mtphr_post_slider_value( $container );
				break;
			case 'mtphr_post_block':
				mtphr_shortcode_generate_mtphr_post_block_value( $container );
				break;
			case 'mtphr_pricing_table':
				mtphr_shortcode_generate_mtphr_pricing_table_value( $container );
				break;
			case 'mtphr_slide_graph':
				mtphr_shortcode_generate_mtphr_slide_graph_value( $container );
				break;
			case 'mtphr_tab':
				mtphr_shortcode_generate_mtphr_tab_value( $container );
				break;
			case 'mtphr_toggle':
				mtphr_shortcode_generate_mtphr_toggle_value( $container );
				break;
			case 'mtphr_icon':
				mtphr_shortcode_generate_mtphr_icon_value( $container );
				break;
		}
	});



	/* --------------------------------------------------------- */
	/* !mtphr_grid init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_grid_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				select = '<select><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option selected="selected">12</option></select>';

		// Add the first select
		$container.append( $(select).val('6').css('width','49%') );
		$container.append( $(select).val('6').css('width','49%') );
		$button.show();

		$container.find('select').live( 'change', function() {

			var val = $(this).val();
			$(this).css('width',(parseInt((val/12)*100)-1)+'%')

			var total = 0;
			$container.find('select').each( function(index) {
				if( total >= 12 ) {
					$(this).remove();
				} else {
					var new_total = total + parseInt($(this).val());
					if( new_total > 12 ) {
						var val = 12-total;
						$(this).val(val).css('width',(parseInt((val/12)*100)-1)+'%');
						total = 12;
					} else {
						total = new_total;
					}
				}
			});

			if( total < 12 ) {
				var val = 12-total;
				$container.append( $(select).val(val).css('width',(parseInt((val/12)*100)-1)+'%') );
				total = 12;
			}

			if( total == 12 ) {
				$button.show();
			} else {
				$button.hide();
			}
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_grid value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_grid_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				spans = $container.find('select'),
				count = spans.length,
				value = '';

		for( var i=0; i<count; i++ ) {
			value += '[mtphr_grid span="'+$(spans[i]).val()+'"';
			if( i == 0 ) { value += ' start="true"'; }
			if( i == count-1 ) { value += ' end="true"'; }
			value += ']'+mtphr_shortcodes_generator_vars.mtphr_grid_content+'[/mtphr_grid]';
		}

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_post_slider init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_post_slider_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button')
				$taxonomy = $container.find('select[name="taxonomy"]'),
				$set_1 = $container.find('.mtphr-shortcode-gen-set-1').hide();

		$taxonomy.live('change', function() {
			if( $(this).val() == '' ) {
				$set_1.hide();
			} else {
				$set_1.show();
			}
		});

		$button.show();
	}

	/* --------------------------------------------------------- */
	/* !mtphr_post_slider value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_post_slider_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				att_type = $container.find('select[name="type"]').val(),
				att_title = $container.find('input[name="title"]').val(),
				att_orderby = $container.find('select[name="orderby"]').val(),
				att_order = $container.find('select[name="order"]').val(),
				att_limit = $container.find('input[name="limit"]').val(),
				att_thumb_size = $container.find('select[name="thumb_size"]').val(),
				att_excerpt_length = $container.find('input[name="excerpt_length"]').val(),
				att_excerpt_more = $container.find('input[name="excerpt_more"]').val(),
				att_more_link = $container.find('input[name="more_link"]').is(':checked'),
				att_prev = $container.find('input[name="prev"]').val(),
				att_next = $container.find('input[name="next"]').val(),
				att_class = $container.find('input[name="class"]').val(),
				att_taxonomy = $container.find('select[name="taxonomy"]').val(),
				att_terms = $container.find('input[name="terms"]').val(),
				att_operator = $container.find('select[name="operator"]').val(),
				value = '[mtphr_post_slider';

		if( att_more_link && att_excerpt_more != '' ) {
			att_excerpt_more = '{'+att_excerpt_more+'}';
		}

		if( att_type != 'post' ) { value += ' type="'+att_type+'"'; }
		value += ' title="'+att_title+'"';
		if( att_orderby != 'rand' ) { value += ' orderby="'+att_orderby+'"'; }
		if( att_order != 'DESC' ) { value += ' order="'+att_order+'"'; }
		if( att_limit != '' && att_limit != -1 ) { value += ' limit="'+parseInt(att_limit)+'"'; }
		if( att_thumb_size != 'default' ) { value += ' thumb_size="'+att_thumb_size+'"'; }
		if( att_excerpt_length != '' ) { value += ' excerpt_length="'+att_excerpt_length+'"'; }
		if( att_excerpt_more != '' ) { value += ' excerpt_more="'+att_excerpt_more+'"'; }
		if( att_prev != '' ) { value += ' prev="'+att_prev+'"'; }
		if( att_next != '' ) { value += ' next="'+att_next+'"'; }
		if( att_class != '' ) { value += ' class="'+att_class+'"'; }
		if( att_taxonomy != '' && att_terms != '' ) {
			value += ' taxonomy="'+att_taxonomy+'"';
			value += ' terms="'+att_terms+'"';
			if( att_operator != 'IN' ) { value += ' operator="'+att_operator+'"'; }
		}
		value += ']';

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_post_block init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_post_block_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$type = $container.find('select[name="type"]'),
				$id = $container.find('input[name="id"]'),
				$taxonomy = $container.find('select[name="taxonomy"]'),
				$set_1 = $container.find('.mtphr-shortcode-gen-set-1'),
				$set_2 = $container.find('.mtphr-shortcode-gen-set-2').hide();
				$set_3 = $container.find('.mtphr-shortcode-gen-set-3').hide();

		$type.live( 'change', function() {
			if( $(this).val() == 'default' ) {
				$set_1.show();
				$set_2.hide();
				if( $id.val() == '' ) {
					$button.hide();
				} else {
					$button.show();
				}
			} else {
				$set_1.hide();
				$set_2.show();
				$button.show();
			}
		});

		$taxonomy.live('change', function() {
			if( $(this).val() == '' ) {
				$set_3.hide();
			} else {
				$set_3.show();
			}
		});

		$id.keyup( function() {
			if( $(this).val() == '' ) {
				$button.hide();
			} else {
				$button.show();
			}
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_post_block value - 2.0.9 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_post_block_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				att_type = $container.find('select[name="type"]').val(),
				att_id = $container.find('input[name="id"]').val(),
				att_orderby = $container.find('select[name="orderby"]').val(),
				att_order = $container.find('select[name="order"]').val(),
				att_offset = $container.find('input[name="offset"]').val(),
				att_thumb_size = $container.find('select[name="thumb_size"]').val(),
				att_excerpt_length = $container.find('input[name="excerpt_length"]').val(),
				att_excerpt_more = $container.find('input[name="excerpt_more"]').val(),
				att_more_link = $container.find('input[name="more_link"]').is(':checked'),
				att_class = $container.find('input[name="class"]').val(),
				att_taxonomy = $container.find('select[name="taxonomy"]').val(),
				att_terms = $container.find('input[name="terms"]').val(),
				att_operator = $container.find('select[name="operator"]').val(),
				value = '[mtphr_post_block';

		if( att_more_link && att_excerpt_more != '' ) {
			att_excerpt_more = '{'+att_excerpt_more+'}';
		}

		if( att_type == 'default' ) { value += ' id="'+att_id+'"'; }
		if( att_type != 'default' ) {
			if( att_type != 'post' ) { value += ' type="'+att_type+'"'; }
			if( att_orderby != 'date' ) { value += ' orderby="'+att_orderby+'"'; }
			if( att_order != 'DESC' ) { value += ' order="'+att_order+'"'; }
			if( att_offset != '0' ) { value += ' offset="'+parseInt(att_offset)+'"'; }
			if( att_taxonomy != '' && att_terms != '' ) {
				value += ' taxonomy="'+att_taxonomy+'"';
				value += ' terms="'+att_terms+'"';
				if( att_operator != 'IN' ) { value += ' operator="'+att_operator+'"'; }
			}
		}
		if( att_thumb_size != 'default' ) { value += ' thumb_size="'+att_thumb_size+'"'; }
		if( att_excerpt_length != '' ) { value += ' excerpt_length="'+att_excerpt_length+'"'; }
		if( att_excerpt_more != '' ) { value += ' excerpt_more="'+att_excerpt_more+'"'; }
		if( att_class != '' ) { value += ' class="'+att_class+'"'; }
		value += ']';

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_pricing_table init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_pricing_table_init( $container ) {

		$container.parent().addClass('minimal');

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$clone = $container.find('.mtphr-shortcode-gen-clone');

		$container.find('select[name="span"]').live( 'change', function() {

			var val = $(this).val();
			var total = 0;
			$container.find('select[name="span"]').each( function(index) {
				if( total >= 12 ) {
					$(this).parents('.mtphr-shortcode-gen-clone').remove();
				} else {
					var new_total = total + parseInt($(this).val());
					if( new_total > 12 ) {
						var val = 12-total;
						$(this).val(val);
						total = 12;
					} else {
						total = new_total;
					}
				}
			});

			if( total < 12 ) {
				var val = 12-total;
				var $parent = $(this).parents('.mtphr-shortcode-gen-clone'),
						$new = $clone.clone(true).hide();

				$new.find('input,select').val('');
				$new.find('select[name="span"]').val(val);
				$parent.after( $new );
				$new.fadeIn();
				total = 12;
			}

			if( total == 12 ) {
				$button.show();
			} else {
				$button.hide();
			}
		});

		$container.find('select[name="style"]').live( 'change', function() {
			var $set_1 = $(this).parents('.mtphr-shortcode-gen-clone').find('.mtphr-shortcode-gen-set-1');
			if( $(this).val() == 'list' ) {
				$set_1.hide();
			} else {
				$set_1.show();
			}
		});

		$button.show();
	}

	/* --------------------------------------------------------- */
	/* !mtphr_pricing_table value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_pricing_table_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				$clone = $container.find('.mtphr-shortcode-gen-clone'),
				total = $clone.size(),
				value = '';

		$clone.each( function(index) {

			var att_span = $(this).find('select[name="span"]').val(),
					att_grid_start = $(this).find('input[name="grid_start"]').is(':checked'),
					att_grid_end = $(this).find('input[name="grid_end"]').is(':checked'),
					att_style = $(this).find('select[name="style"]').val(),
					att_title = $(this).find('input[name="title"]').val(),
					att_dollar = $(this).find('input[name="dollar"]').val(),
					att_cents = $(this).find('input[name="cents"]').val(),
					att_per = $(this).find('input[name="per"]').val(),
					att_button = $(this).find('input[name="button"]').val(),
					att_link = $(this).find('input[name="link"]').val(),
					att_class = $(this).find('input[name="class"]').val();

			value += '[mtphr_pricing_table';
			if( index == 0 ) { value += ' start="true"'; }
			if( index == total-1 ) { value += ' end="true"'; }
			value += ' style="'+att_style+'"';
			value += ' span="'+att_span+'"';
			if( att_title != '' ) { value += ' title="'+att_title+'"'; }
			if( att_dollar != '' ) { value += ' dollar="'+att_dollar+'"'; }
			if( att_cents != '' ) { value += ' cents="'+att_cents+'"'; }
			if( att_per != '' ) { value += ' per="'+att_per+'"'; }
			if( att_button != '' ) { value += ' button="'+att_button+'"'; }
			if( att_link != '' ) { value += ' link="'+att_link+'"'; }
			if( att_class != '' ) { value += ' class="'+att_class+'"'; }
			value += ']';
			value += ( att_style == 'list' ) ? mtphr_shortcodes_generator_vars.mtphr_pricing_table_list_content : mtphr_shortcodes_generator_vars.mtphr_pricing_table_content;
			value += '[/mtphr_pricing_table]';
		});

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_slide_graph init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_slide_graph_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$percentage = $container.find('input[name="percent"]');

		$percentage.keyup( function() {
			if( $(this).val() > 0 ) {
				$button.show();
			} else {
				$button.hide();
			}
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_slide_graph value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_slide_graph_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				att_title = $container.find('input[name="title"]').val(),
				att_title_width = $container.find('input[name="title_width"]').val(),
				att_percent = $container.find('input[name="percent"]').val(),
				att_percent_label = $container.find('input[name="percent_label"]').val(),
				value = '[mtphr_slide_graph';

		if( att_title != '' ) { value += ' title="'+att_title+'"'; }
		if( att_title_width > 0 ) { value += ' title_width="'+att_title_width+'"'; }
		value += ' percent="'+att_percent+'"';
		if( att_percent_label != '' ) { value += ' percent_label="'+att_percent_label+'"'; }
		value += ']';

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_tab init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_tab_init( $container ) {

		$container.parent().addClass('minimal');
		mtphr_shortcode_generate_mtphr_tab_check_delete($container);

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$clone = $container.find('.mtphr-shortcode-gen-clone');

		$clone.find('.mtphr-shortcode-gen-set-1').hide();

		$container.find('input[name="image"]').keyup( function() {
			var $set_1 = $(this).parents('.mtphr-shortcode-gen-clone').find('.mtphr-shortcode-gen-set-1');
			if( $(this).val() == '' ) {
				$set_1.hide();
			} else {
				$set_1.show();
			}
		});

		$container.find('.mtphr-shortcode-gen-clone-add').live('click', function(e) {
			e.preventDefault();

			var $parent = $(this).parents('.mtphr-shortcode-gen-clone'),
					$new = $clone.clone(true).hide();

			$new.find('input').val('');
			$parent.after( $new );
			$new.find('.mtphr-shortcode-gen-set-1').hide();
			$new.fadeIn();
			mtphr_shortcode_generate_mtphr_tab_check_delete($container);
			mtphr_shortcode_generate_mtphr_tab_check_insert($container);
		});

		$container.find('.mtphr-shortcode-gen-clone-delete').live('click', function(e) {
			e.preventDefault();

			$(this).parents('.mtphr-shortcode-gen-clone').remove();
			mtphr_shortcode_generate_mtphr_tab_check_insert($container);
		});

		$container.find('input[name="title"]').keyup( function() {
			mtphr_shortcode_generate_mtphr_tab_check_insert($container);
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_tab check the deletes - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_tab_check_delete( $container ) {
		if( $container.find('.mtphr-shortcode-gen-clone-delete').size() == 1 ) {
			$container.find('.mtphr-shortcode-gen-clone-delete').hide();
		} else {
			$container.find('.mtphr-shortcode-gen-clone-delete').show();
		}
	}

	/* --------------------------------------------------------- */
	/* !mtphr_tab check for insert button - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_tab_check_insert( $container ) {
		var $button = $('.mtphr-shortcode-gen-insert-button'),
				show_button = true;

		$container.find('.mtphr-shortcode-gen-clone').each( function(index) {
			if( $(this).find('input[name="title"]').val() == '' ) {
				show_button = false;
			}
		});

		if( show_button ) {
			$button.show();
		} else {
			$button.hide();
		}
	}

	/* --------------------------------------------------------- */
	/* !mtphr_tab value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_tab_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				$clone = $container.find('.mtphr-shortcode-gen-clone'),
				total = $clone.size(),
				value = '';

		$clone.each( function(index) {
			var att_title = $(this).find('input[name="title"]').val(),
					att_start = $(this).find('input[name="start"]').is(':checked'),
					att_end = $(this).find('input[name="end"]').is(':checked'),
					att_image = $(this).find('input[name="image"]').val(),
					att_image_width = $(this).find('input[name="image_width"]').val(),
					att_image_alt = $(this).find('input[name="image_alt"]').val();

			value += '[mtphr_tab';
			if( index == 0 ) { value += ' start="true"'; }
			if( index == total-1 ) { value += ' end="true"'; }
			value += ' title="'+att_title+'"';
			if( att_image != '' ) {
				value += ' image="'+att_image+'"';
				if( att_image_width > 0 ) { value += ' image_width="'+att_image_width+'"'; }
				if( att_image_alt != '' ) { value += ' image_alt="'+att_image_alt+'"'; }
			}
			value += ']'+mtphr_shortcodes_generator_vars.mtphr_tab_content+'[/mtphr_tab]';
		});

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_toggle init - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_toggle_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$heading = $container.find('input[name="heading"]');

		$heading.keyup( function() {
			if( $(this).val() == '' ) {
				$button.hide();
			} else {
				$button.show();
			}
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_toggle value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_toggle_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				att_heading = $container.find('input[name="heading"]').val(),
				att_condensed = $container.find('input[name="condensed"]').is(':checked'),
				att_class = $container.find('input[name="class"]').val(),
				att_id = $container.find('input[name="id"]').val(),
				value = '[mtphr_toggle';

		value += ' heading="'+att_heading+'"';
		if( att_condensed ) { value += ' condensed="0"'; }
		if( att_class != '' ) { value += ' class="'+att_class+'"'; }
		if( att_id != '' ) { value += ' id="'+att_class+'"'; }
		value += ']'+mtphr_shortcodes_generator_vars.mtphr_toggle_content+'[/mtphr_toggle]';

		$insert.val( value );
	}



	/* --------------------------------------------------------- */
	/* !mtphr_icon init - 2.0.6 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_icon_init( $container ) {

		var $button = $('.mtphr-shortcode-gen-insert-button'),
				$title = $container.find('input[name="title"]'),
				$link = $container.find('input[name="link"]'),
				$set_1 = $container.find('.mtphr-shortcode-gen-set-1').hide(),
				$set_2 = $container.find('.mtphr-shortcode-gen-set-2').hide();

		$('.mtphr-shortcode-gen-icon-group').live('click', function(e) {
			e.preventDefault();

			if( !e.shiftKey ) {
				$('.mtphr-shortcode-gen-icon-group').removeClass('active');
			}
			if( $(this).hasClass('active') ) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
			}
			$button.show();
		});

		$title.keyup( function() {
			if( $(this).val() == '' ) {
				$set_1.hide();
			} else {
				$set_1.show();
			}
		});

		$link.keyup( function() {
			if( $(this).val() == '' ) {
				$set_2.hide();
			} else {
				$set_2.show();
			}
		});
	}

	/* --------------------------------------------------------- */
	/* !mtphr_icon value - 2.0.5 */
	/* --------------------------------------------------------- */

	function mtphr_shortcode_generate_mtphr_icon_value( $container ) {

		var $insert = $container.children('input.shortcode-insert'),
				att_class = $container.find('input[name="class"]').val(),
				att_style = $container.find('input[name="style"]').val(),
				att_title = $container.find('input[name="title"]').val(),
				att_title_class = $container.find('input[name="title_class"]').val(),
				att_title_style = $container.find('input[name="title_style"]').val(),
				att_link = $container.find('input[name="link"]').val(),
				att_link_class = $container.find('input[name="link_class"]').val(),
				att_link_style = $container.find('input[name="link_style"]').val(),
				att_target = $container.find('select[name="target"]').val(),
				value = '';

		$container.find('.mtphr-shortcode-gen-icon-group.active').each( function(index) {

			var att_id = $(this).find('.mtphr-shortcode-gen-icon-id').text();

			value += '[mtphr_icon id="'+att_id+'"';
			if( att_class != '' ) { value += ' class="'+att_class+'"'; }
			if( att_style != '' ) { value += ' style="'+att_style+'"'; }
			if( att_title != '' ) {
				value += ' title="'+att_title+'"';
				if( att_title_class != '' ) { value += ' title_class="'+att_title_class+'"'; }
				if( att_title_style != '' ) { value += ' title_style="'+att_title_style+'"'; }
			}
			if( att_link != '' ) {
				value += ' link="'+att_link+'"';
				if( att_link_class != '' ) { value += ' link_class="'+att_link_class+'"'; }
				if( att_link_style != '' ) { value += ' link_style="'+att_link_style+'"'; }
				if( att_target != '_self' ) { value += ' target="'+att_target+'"'; }
			}
			value += ']';
		});

		$insert.val( value );
	}


});