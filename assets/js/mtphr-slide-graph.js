/**
 * Metaphor Slide Graph
 * Date: 4/8/2013
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
					slide_speed						: 3000,
					slide_ease						: 'easeOutExpo',
					after_load						: function(){}
				};

				// Add any set options
				if (options) {
					$.extend(settings, options);
				}

				var $graph = $(this),
						$fill = $graph.find('.mtphr-slide-graph-fill'),
						$percent = $graph.find('.mtphr-slide-graph-percent'),
						p = $graph.children('input').val();

				// Animate the objects
				$fill.stop().animate( {
					width: p+'%'
				}, settings.slide_speed*(p/100), settings.slide_ease );

				// Animate the objects
				$percent.stop().animate( {
					left: p+'%'
				}, settings.slide_speed*(p/100), settings.slide_ease );

		    // Trigger the afterLoad callback
        settings.after_load.call(this, $graph);

			});
		}
	};





	/**
	 * Setup the class
	 *
	 * @since 1.0.0
	 */
	$.fn.mtphr_slide_graph = function( method ) {

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call(arguments, 1) );
		} else if ( typeof method === 'object' || !method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist in mtphr_slide_graph' );
		}
	};

})( jQuery );