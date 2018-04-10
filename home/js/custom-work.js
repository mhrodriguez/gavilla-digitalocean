
(function($) { "use strict";


	//Menu

 	$(function() {
		$( '#dl-menu' ).dlmenu();
	});	 
	
	
	//Parallax
	
	$(document).ready(function(){
			$('.parallax-work').parallax("50%", 0.5);
			$('.parallax2-work').parallax("50%", 0.08);
	});	


	//Portfolio
	

		var $container = $('#projects-grid');
		// initialize Masonry after all images have loaded  
		$container.imagesLoaded( function() {
		  $container.masonry({
				itemSelector: '.project-box'
			});
		});
		  
	  

	
	
	
	//Testimonials Slider
	
	$(document).ready(function(){
		$('.slider-testi').bxSlider({
			adaptiveHeight: true,
			touchEnabled: true,
			pager: false,
			controls: true,
			auto: false,
			slideMargin: 1
		});
	});	
	
	
	//Fixed Footer
	
	$(function() {
		$(".footer").footerReveal();
	});	
	
	
	//Ajax Projects
	
	$(window).load(function() {
       	'use strict';		  
		  var loader = $('.expander-wrap');
		if(typeof loader.html() == 'undefined'){
			$('<div class="expander-wrap"><div id="expander-wrap" class="container clearfix relative"><p class="cls-btn"><a class="close">X</a></p><div/></div></div>').css({opacity:0}).hide().insertAfter('.portfolio');
			loader = $('.expander-wrap');
		}
		$('.expander').on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			var url = $(this).attr('href');



			loader.slideUp(function(){
				$.get(url, function(data){
					var portfolioContainer = $('.portfolio');
					var topPosition = portfolioContainer.offset().top;
					var bottomPosition = topPosition + portfolioContainer.height();
					$('html,body').delay(600).animate({ scrollTop: bottomPosition - -10}, 800);
					var container = $('#expander-wrap>div', loader);
					
					container.html(data);
					
					$(".video").fitVids();
					
					$('.project-wrap-slider').flexslider({
				        animation: "fade",
						selector: ".slider-project-ajax .slide",
						controlNav: false,
						directionNav: true ,
						slideshowSpeed: 5000,  
				    });

				
					loader.slideDown(function(){
						if(typeof keepVideoRatio == 'function'){
							keepVideoRatio('.video > iframe');
						}
					}).delay(1000).animate({opacity:1}, 200);
				});
			});
		});
		
		$('.close', loader).on('click', function(){
			loader.delay(300).slideUp(function(){
				var container = $('#expander-wrap>div', loader);
				container.html('');
				$(this).css({opacity:0});
				
			});
			var portfolioContainer = $('.portfolio');
				var topPosition = portfolioContainer.offset().top;
				$('html,body').delay(0).animate({ scrollTop: topPosition - 70}, 500);
		});

	});	
	
	
})(jQuery);

















