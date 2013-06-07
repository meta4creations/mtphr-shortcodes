/**
 * Metaphor Toggles
 * Date: 5/24/2013
 *
 * @author Metaphor Creations
 * @version 1.0.0
 *
 **/

( function($) {

	var methods = {

		init : function( options ) {

			return this.each( function(){

				// Create default options
				var settings = {
					anim_speed						: 1000,
					anim_ease							: 'easeOutExpo',
					after_load						: function(){}
				};

				// Add any set options
				if (options) {
					$.extend(settings, options);
				}

				var $toggle = $(this),
						$heading = $toggle.find('.mtphr-toggle-heading'),
						$content = $toggle.find('.mtphr-toggle-content');

				// Heading click
				$heading.click( function(e){
					e.preventDefault();
					if( $(this).hasClass('active') ) {
						$(this).removeClass('active');
						mtphr_toggle_hide();
					} else {
						$(this).addClass('active');
						mtphr_toggle_show();
					}
				});

				// Show the content
				function mtphr_toggle_show() {
					$content.stop(true,true).slideDown( settings.anim_speed, settings.anim_ease );
				}

				// Hide the content
				function mtphr_toggle_hide() {
					$content.stop(true,true).slideUp( settings.anim_speed, settings.anim_ease );
				}

				// Display active toggle
				if( $heading.hasClass('active') ) {
					mtphr_toggle_show();
				}

		    // Trigger the afterLoad callback
        settings.after_load.call(this, $toggle);
			});
		}
	};





	/**
	 * Setup the class
	 *
	 * @since 1.0.0
	 */
	$.fn.mtphr_toggles = function( method ) {

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call(arguments, 1) );
		} else if ( typeof method === 'object' || !method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist in mtphr_toggles' );
		}
	};

})( jQuery );