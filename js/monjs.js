jQuery(document).ready(function() { 
	jQuery('[data-toggle="tooltip"]').tooltip();
	//jQuery('body').css('background-color','red');
	//jQuery('#slider').css('border','1px red solid');
	jQuery('#slider .carousel ol.carousel-indicators li:first-child').addClass('active');
	jQuery('#slider .carousel-inner .item:first-child').addClass('active');
	//jQuery('.carousel .carousel-inner .item:first-child').addClass('active');
	//jQuery('.carousel .carousel-indicators li:first-child').addClass('active');
	//jQuery('.carousel-inner').css('display','none');
	jQuery('.carousel').carousel({
		interval:3000
	});
});