
(function($) { "use strict";


	//Menu

 	$(function() {
		$( '#dl-menu' ).dlmenu();
	});	 
	
	
	//Parallax
	
	$(document).ready(function(){
			$('.parallax-services').parallax("50%", 0.5);
			$('.parallax2-services').parallax("50%", -0.07);
	});	

	
	//Fixed Footer
	
	$(function() {
		$(".footer").footerReveal();
	});	

	
	//Services Slider
	
	$(document).ready(function(){
		$('.slider-options').bxSlider({
			adaptiveHeight: true,
			touchEnabled: true,
			pager: false,
			controls: true,
			auto: false,
			slideMargin: 1
		});
	});		

	
	//Twit Slider
	
	$(document).ready(function(){
		$('.slider-twit').bxSlider({
			adaptiveHeight: true,
			touchEnabled: true,
			pager: false,
			controls: true,
			auto: false,
			slideMargin: 1
		});
	});		
	
	
})(jQuery);




