jQuery( document ).ready( function($) {

	
	/* --------------------------------------------------------- */
	/* !Modals - 2.2.0 */
	/* --------------------------------------------------------- */
	
	function mtphr_shortcodes_add_modal( $modal ) {
		
		$modal.children('.mtphr-shortcodes-modal-backdrop').show();
		$modal.children('.mtphr-shortcodes-modal').show();
	}
	
	function mtphr_shortcodes_remove_modal() {
		
		$('.mtphr-shortcodes-modal-backdrop').hide();
		$('.mtphr-shortcodes-modal').hide();
	}

	$('.mtphr-shortcodes-modal-link').live( 'click', function(e) {
		e.preventDefault();
		
		var $modal = $($(this).attr('href'));	
		mtphr_shortcodes_add_modal( $modal );
	});
	
	$('.mtphr-shortcodes-modal-backdrop').live( 'click', function(e) {
		e.preventDefault();
		mtphr_shortcodes_remove_modal();
	});
	
	$('.mtphr-shortcodes-modal-close').live( 'click', function(e) {
		e.preventDefault();	
		mtphr_shortcodes_remove_modal();
	});
	
	$('.mtphr-shortcodes-modal-submit').live( 'click', function(e) {
		e.preventDefault();
		mtphr_shortcodes_remove_modal();
	});
	
	
	/* --------------------------------------------------------- */
	/* !Shortcode group select - 2.2.0 */
	/* --------------------------------------------------------- */
	
	var shortcode_selects = $('.mtphr-shortcode-gen-select');
	
	$('.mtphr-shortcode-gen-group-select').click( function(e) {
		e.preventDefault();
		
		var group = $(this).data('group');
		
		if( $(this).hasClass('disabled') ) {
			$(this).removeClass('disabled');
			$(this).children('i').attr('class', 'mtphr-shortcodes-ico-check');
			$('.mtphr-shortcode-gen-select[data-group="'+group+'"]').show();
		} else {
			$(this).addClass('disabled');
			$(this).children('i').attr('class', 'mtphr-shortcodes-ico-error');
			console.log($('.mtphr-shortcode-gen-select')[0]);
			$('.mtphr-shortcode-gen-select[data-group="'+group+'"]').hide();
		}	
	});
	
	
	
	/* --------------------------------------------------------- */
	/* !Icon actions - 2.2.0 */
	/* --------------------------------------------------------- */
	
	function mtphr_shortcode_icon_actions_init() {
	
		var $icon_filter = $('#mtphr-shortcodes-icon-filter-input'),
				$icon_filter_reset = $('#mtphr-shortcodes-icon-filter-reset'),
				icons = $('.mtphr-shortcodes-icon-select');
				
		$('.mtphr-shortcodes-icon-select').live('click', function(e) {
			e.preventDefault();
	
			if( !e.shiftKey ) {
				$('.mtphr-shortcodes-icon-select').removeClass('active');
			}
			if( $(this).hasClass('active') ) {
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
			}
		});
		
		$icon_filter.keyup( function() {
			
			var filter_val = $(this).val();
			icons.each(function(){
				var text = $(this).data('id').toLowerCase();
				(text.indexOf(filter_val) == 0) ? $(this).show() : $(this).hide();         
			});
			
			if( filter_val == '' ) {
				$icon_filter_reset.hide();
			} else {
				$icon_filter_reset.show();
			}
		});
		
		$icon_filter_reset.live( 'click', function(e) {
			e.preventDefault();
			$icon_filter.val('');
			icons.show();
		});
	}
	
	$('body').on('mtphr_shortcode_icon_actions_init', function() {
		mtphr_shortcode_icon_actions_init();
	});
	mtphr_shortcode_icon_actions_init();
	
	
});