/* Metaphor Post Slider */

( function($) {

	var methods = {

		init : function( options ) {

			return this.each( function(){

				// Create default options
				var settings = {
					slide_speed						: 500,
					slide_ease						: 'easeOutExpo',
					before_change					: function(){},
					after_change					: function(){},
					after_load						: function(){}
				};

				// Add any set options
				if (options) {
					$.extend(settings, options);
				}

				var $slider = $(this),
						$content_wrapper = $slider.find('.mtphr-post-slider-content-wrapper'),
						$content = $slider.find('.mtphr-post-slider-content'),
						$navigation = $slider.find('.mtphr-post-slider-navigation'),
						$prev = $navigation.children('.mtphr-post-slider-prev'),
						$next = $navigation.children('.mtphr-post-slider-next'),
						posts = $slider.find( '.mtphr-post-slider-block' ),
						nav_visible = true;

				// Useful variables.
        var vars = {
        	slider_width					: 0,
        	slider_position				: 0,
        	slider_current				: 0,
        	slide_count						: 0,
	        post_width						: 0,
	        post_margin						: 0,
	        total_posts						: posts.length,
	        content_width					: 0,
	        min_position					: 0
        };

				// Add the vars
				$slider.data('slider:vars', vars);

				
				/* --------------------------------------------------------- */
				/* !Set the content width and min position */
				/* --------------------------------------------------------- */
				
				function mtphr_post_slider_content_width() {

					// Save vars
					vars.slider_width = $slider.outerWidth();
					vars.post_width = $(posts[0]).outerWidth();
					vars.post_margin = parseInt($(posts[0]).css('marginRight').substr(0, $(posts[0]).css('marginRight').length-2));
					vars.content_width = (vars.total_posts*(vars.post_width+vars.post_margin));
					vars.min_position = vars.slider_width-(vars.content_width-vars.post_margin);
					if( vars.min_position > 0 ) {
						vars.min_position = 0;
					}
					
					$content.css('width', vars.content_width+'px');
				}
				
				
				/* --------------------------------------------------------- */
				/* !Set the navigation positions */
				/* --------------------------------------------------------- */
				function mtphr_post_slider_navigation() {
					
					if( nav_visible ) {						
						if( vars.slider_width >= (vars.content_width-vars.post_margin) ) {
							$navigation.fadeOut();
						}
						nav_visible = false;
					} else {
						if( vars.slider_width < (vars.content_width-vars.post_margin) ) {
							$navigation.fadeIn();
						}
						nav_visible = true;
					}
				}
				

				/**
				 * Find the closest post to the left
				 *
				 * @since 2.0.9
				 */
				function mtphr_post_slider_position( button ) {

					var position = vars.slider_position;
					if (button == 'prev') {
						vars.slider_current = vars.slider_current-vars.slide_count;
						if( vars.slider_current < 0 ) vars.slider_current = 0;
						position = -(vars.slider_current*(vars.post_width+vars.post_margin));
					}
					if (button == 'next') {
						vars.slider_current = vars.slider_current+vars.slide_count;
						if( vars.slider_current > posts.length-1 ) vars.slider_current = posts.length-1;
						position = -(vars.slider_current*(vars.post_width+vars.post_margin));
					}

					// Enable the buttons
					$prev.removeClass('disabled');
					$next.removeClass('disabled');

					if( position >= 0 ) {
						position = 0;
						$prev.addClass('disabled');
					}
					if( position < vars.min_position ) {
						position = vars.min_position;
						$next.addClass('disabled');
					}
					if( vars.content_width < vars.slider_width ) {
						position = 0;
						$prev.addClass('disabled');
						$next.addClass('disabled');
					}

					// Resave the var
					vars.slider_position = position;

					$content.stop().animate( {
						marginLeft: position+'px'
					}, settings.slide_speed, settings.slide_ease, function() {
						// Animation complete.
					});

					// Return the position
					return position;
				}
				
				/**
				 * Set the slide count
				 *
				 * @since 2.0.9
				 */
				function mtphr_post_slider_slide_count() {
					vars.slide_count = Math.floor( (vars.slider_width+vars.post_margin)/(vars.post_width+vars.post_margin) );
					if( vars.slide_count < 1 ) {
						vars.slide_count = 1;
					}
				}

				/**
				 * Previous button click
				 *
				 * @since 1.0.0
				 */
				$prev.click( function(e) {
					e.preventDefault();
					mtphr_post_slider_position( 'prev' );
				});

				/**
				 * Next button click
				 *
				 * @since 1.0.0
				 */
				$next.click( function(e) {
					e.preventDefault();
					mtphr_post_slider_position( 'next' );
				});

				/**
				 * Mobile swipe
				 *
				 * @since 2.0.6
				 */
				$content_wrapper.swipe( {
					triggerOnTouchEnd : true,
					allowPageScroll: 'vertical',
					swipeStatus : function(event, phase, direction, distance, duration, fingers) {
						if ( phase =="end" ) {
							if (direction == "right") {
								mtphr_post_slider_position( 'prev' );
							} else if (direction == "left") {
								mtphr_post_slider_position( 'next' );
							}
						}
					}
				});



		    /**
		     * Resize listener
		     * Reset the ticker width
		     *
		     * @since 1.0.0
		     */
		    $(window).resize( function() {

					mtphr_post_slider_content_width();
			    mtphr_post_slider_navigation();
			    mtphr_post_slider_slide_count();
			    mtphr_post_slider_position();
		    });
		     
		    // Set the content width and min position
				mtphr_post_slider_content_width();
				
				$slider.find( '.mtphr-post-slider-block' ).each( function(index) {
					$(this).delay(index*200).fadeIn();
				});

				// Set the navigation visibility
				mtphr_post_slider_navigation();
				
				// Set the slide count
				mtphr_post_slider_slide_count();

				// Position the slider
				mtphr_post_slider_position();

		    // Trigger the afterLoad callback
        settings.after_load.call(this, $slider);

			});
		}
	};





	/**
	 * Setup the class
	 *
	 * @since 1.0.0
	 */
	$.fn.mtphr_post_slider = function( method ) {

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call(arguments, 1) );
		} else if ( typeof method === 'object' || !method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist in mtphr_post_slider' );
		}
	};

})( jQuery );