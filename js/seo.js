jQuery(document).ready(function($){
	$('.bxslider').bxSlider();
	$('.partners-slide').bxSlider({
		minSlides: 3,
		maxSlides: 10,
		slideWidth: 126,
		moveSlides: 1,
		pager: false,
		auto: true
	});

	var equalizeHeights = function(selector) {
		var currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array(),
			$el,
			topPosition = 0;

		$(selector).each(function() {

			$el = $(this);
			topPostion = $el.position().top;

			if (currentRowStart != topPostion) {

				// we just came to a new row.  Set all the heights on the completed row
				for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}

				// set the variables for the new row
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);

			} else {
				// another div on the current row.  Add it to the list and check if it's taller
				rowDivs.push($el);
				currentTallest = Math.max(currentTallest, $el.height());
			}

			// do the last row
			for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}

		});
	};

	$(".format-video .entry-content").fitVids();

	equalizeHeights( '.partner-single, .media-single-wrapper' );

});

