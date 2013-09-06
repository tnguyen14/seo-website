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
});