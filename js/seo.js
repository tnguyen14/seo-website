(function ($, _) {
	// selectors is an array of selectors
	var equalizeRowHeights = function (selectors) {
		if (!_.isArray(selectors)) {
			selectors = [selectors];
		}
		_.each(selectors, function( el ) {
			var currentTallest = 0,
				currentRowStart = 0,
				rowNum = 0,
				rowDivs = [],
				$el,
				currentDiv,
				topPosition = 0;

			$(el).each(function () {

				$el = $(this);
				topPosition = $el.offset().top;

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

	var equalizeHeights = function (selectors) {
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

	$(document).ready(function ($){

		// throttle resize function
		// $(window).resize(_.throttle(function(){
		// 	console.log('resizing');

		// }, 500)).trigger('resize');

		equalizeRowHeights([
			'.partner-single',
			'.media-single-wrapper',
			'.people .person'
		]);

		equalizeHeights('.testimonials .testimonial-content');

		$('.testimonials').bxSlider({
			auto: true,
			pause: 5000
		})
		$('.homepage-slider').bxSlider({
			pager: false,
			auto: true,
			pause: 6000
		});
		// Program slides
		$('.slides').bxSlider({
			pager: false
		});
		$('.speakers').bxSlider({
			auto: true,
			pause: 4000
		});
		$('.partners-slider').bxSlider({
			minSlides: 3,
			maxSlides: 10,
			slideWidth: 126,
			moveSlides: 1,
			pager: false,
			auto: true
		});

		$(".format-video .entry-content").fitVids();

		// Progress bar
		$('.progress').each(function (){
			var totalWidth = $(this).width(),
				$bar = $('.progress-bar', this),
				progress = $bar.data('progress'),
				goal = $bar.data('goal'),
				barWidth = totalWidth * progress / goal;

			$bar.stop().animate({
				width: barWidth
			}, 2000);
		});

		// People
		$('.expandible').click(function () {
			$(this).toggleClass('collapsed');
			$(this).siblings('.description').toggle();
			equalizeRowHeights(['.people .person']);
		});
	});
})( jQuery, _ );

