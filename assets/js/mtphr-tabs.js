/**
 * Metaphor Tabs
 * Date: 7/17/2013
 *
 * @author Metaphor Creations
 * @version 1.0.1
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

				var $tab_table = $(this),
						$container = $tab_table.find('.mtphr-tab-content-container'),
						tabs = $tab_table.find('.mtphr-tab-link'),
						content = Array(),
						current = -1;

				// Move the content
				tabs.each( function(index) {

					$(this).children('a').attr('href', index);
					$container.append( $(this).find('.mtphr-tab-content') );
				});

				// Save the content and update the colspan
				content = $container.find('.mtphr-tab-content');
				$container.attr( 'colspan', content.length );


				/**
				 * Display the content
				 *
				 * @since 1.0.1
				 */
				function mtphr_tabs_display_content( i ) {

					if( i != current ) {

						// Set the container height and fade out the old content
						if( current != -1 ) {
							var h = $(content[current]).outerHeight();
							$container.css('height', h+'px');
							$(tabs[current]).removeClass('active');
							$(content[current]).css('position', 'absolute');
							$(content[current]).stop().fadeOut( settings.anim_speed );
						}

						$(tabs[i]).addClass('active');
						$(content[i]).stop().fadeIn( settings.anim_speed );

						// Save the current
						current = i;

						// Set the container height
						var h = $(content[i]).outerHeight();
						$container.stop().animate( {
							height: h+'px'
						}, settings.anim_speed, settings.anim_ease, function() {

							// Set the position of the content
							$(this).removeAttr('style');
							$(content[current]).css('position', 'relative');
						});
					}
				}


				/**
				 * Add a click listener
				 *
				 * @since 1.0.0
				 */
				tabs.find('a').click( function(e) {
					e.preventDefault();
					mtphr_tabs_display_content( parseInt($(this).attr('href')) );
				});

		    // Trigger the afterLoad callback
        settings.after_load.call(this, $tab_table);

        // Load the first tab
        mtphr_tabs_display_content( 0 );
			});
		}
	};





	/**
	 * Setup the class
	 *
	 * @since 1.0.0
	 */
	$.fn.mtphr_tabs = function( method ) {

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call(arguments, 1) );
		} else if ( typeof method === 'object' || !method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist in mtphr_tabs' );
		}
	};

})( jQuery );