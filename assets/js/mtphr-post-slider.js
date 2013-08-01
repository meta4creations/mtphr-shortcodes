/**
 * Metaphor Post Slider
 * Date: 7/30/2013
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
						posts = $slider.find( '.mtphr-post-slider-block' );

				// Useful variables.
        var vars = {
        	slider_width					: $slider.outerWidth(),
        	slider_position				: 0,
	        post_width						: $(posts[0]).outerWidth(),
	        post_margin						: parseInt($(posts[0]).css('marginRight').substr(0, $(posts[0]).css('marginRight').length-2)),
	        total_posts						: posts.length,
	        content_width					: 0,
	        min_position					: 0
        };

				// Add the vars
				$slider.data('slider:vars', vars);

				// Save vars
				vars.content_width = (vars.total_posts*(vars.post_width+vars.post_margin));
				vars.min_position = vars.slider_width-(vars.content_width-vars.post_margin);
				if( vars.min_position > 0 ) {
					vars.min_position = 0;
				}

				// Set the content width
				$content.css('width', vars.content_width+'px');

				$slider.find( '.mtphr-post-slider-block' ).each( function(index) {
					$(this).delay(index*200).fadeIn();
				});

				// Remove the nav if less than 2 posts
				if( vars.num_posts < 2 ) {
					$navigation.remove();
				}

				// Position the slider
				mtphr_post_slider_position();

				/**
				 * Find the closest post to the left
				 *
				 * @since 1.0.0
				 */
				function mtphr_post_slider_position( button ) {

					var position = vars.slider_position;
					if (button == 'prev') {
						position = position+vars.slider_width;
					}
					if (button == 'next') {
						position = position-vars.slider_width;
					}

					var closest = parseInt(position/(vars.post_width+vars.post_margin));
					if( button == 'next' ) closest--;
					position = closest*(vars.post_width+vars.post_margin);

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
					}, settings.slide_speed, 'easeOutExpo', function() {
						// Animation complete.
					});

					// Return the position
					return position;
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
				 * @since 1.0.1
				 */
				$content_wrapper.swipe( {
					triggerOnTouchEnd : true,
					swipeStatus : mtphr_post_slider_swipe,
					allowPageScroll: 'vertical'
				});
				function mtphr_post_slider_swipe( event, phase, direction, distance, fingers ) {

					/*
if( phase=="move" && (direction=="left" || direction=="right") ) {
						var duration=0;

						if (direction == "left") {
							scrollImages((vars.slider_position) + distance, duration);
						} else if (direction == "right") {
							scrollImages((vars.slider_position) - distance, duration);
						}

					} else
*/				if ( phase =="end" ) {
						if (direction == "right") {
							mtphr_post_slider_position( 'prev' );
						} else if (direction == "left") {
							mtphr_post_slider_position( 'next' );
						}
					}
				}
				/*
function scrollImages(distance, duration) {
					$content.css("-webkit-transition-duration", (duration/1000).toFixed(1) + "s");
					var value = (distance<0 ? "" : "-") + Math.abs(distance).toString();
					$content.css("-webkit-transform", "translate3d(-"+distance +"px,0px,0px)");
				}
*/



		    /**
		     * Resize listener
		     * Reset the ticker width
		     *
		     * @since 1.0.0
		     */
		    $(window).resize( function() {

			    vars.slider_width = $slider.outerWidth();
			    vars.min_position = vars.slider_width-(vars.content_width-vars.post_margin);
			    if( vars.min_position > 0 ) {
						vars.min_position = 0;
					}

			    // Reset the position
			    mtphr_post_slider_position();
		    });




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