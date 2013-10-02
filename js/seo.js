(function($, _) {
	// selectors is an array of selectors
	var equalizeRowHeights = function(selectors) {
		if (!_.isArray(selectors)) {
			selectors = [selectors];
		}
		_.each(selectors, function( el ) {
			var currentTallest = 0,
				currentRowStart = 0,
				rowDivs = [],
				$el,
				currentDiv,
				topPosition = 0;

			$(el).each(function() {

				$el = $(this);
				topPosition = $el.position().top;

				if (currentRowStart !== topPosition) {

					// we just came to a new row.  Set all the heights on the completed row
					for (currentDiv = 0; currentDiv < rowDivs.length ; currentDiv++) {
						rowDivs[currentDiv].height(currentTallest);
					}

					// set the variables for the new row
					rowDivs.length = 0; // empty the array
					currentRowStart = topPosition;
					currentTallest = $el.height();
					rowDivs.push($el);

				} else {
					// another div on the current row.  Add it to the list and check if it's taller
					rowDivs.push($el);
					currentTallest = Math.max(currentTallest, $el.height());
				}

				// do the last row
				for (currentDiv = 0; currentDiv < rowDivs.length ; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}

			});
		});
	};

	var equalizeHeights = function( selectors ) {
		if (!_.isArray(selectors)) {
			selectors = [selectors];
		}
		_.each(selectors, function( el ) {
			var currentTallest = 0;
			$(el).each(function(){
				var $el = $(this);
				currentTallest = Math.max(currentTallest, $el.height());
			});
			$(el).height(currentTallest);
		});
	};

	jQuery(document).ready(function($){

		equalizeRowHeights([
			'.partner-single',
			'.media-single-wrapper'
		]);

		equalizeHeights('.testimonials .testimonial-content');

		$('.bxslider').bxSlider({
			pager: false
		});
		$('.partners-slide').bxSlider({
			minSlides: 3,
			maxSlides: 10,
			slideWidth: 126,
			moveSlides: 1,
			pager: false,
			auto: true
		});

		$(".format-video .entry-content").fitVids();


	});
})( jQuery, _ );

