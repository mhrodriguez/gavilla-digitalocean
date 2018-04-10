
(function($) { "use strict";


	//Menu

 	$(function() {
		$( '#dl-menu' ).dlmenu();
	});	 
	
	
	//Parallax
	
	$(document).ready(function(){
			$('.parallax-about').parallax("50%", 0.5);
			$('.parallax2-about').parallax("50%", 0.5);
	});	


	//Counter 
	
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 100,
            time: 2000
        });
    });	

	
	//Team Carousel

	$(document).ready(function() {
	 
	  var sync1 = $("#sync3");
	  var sync2 = $("#sync4");
	 
	  sync1.owlCarousel({
		singleItem : true,
		slideSpeed : 1000,
		navigation: false,
		pagination:false,
		afterAction : syncPosition,
		responsiveRefreshRate : 200
	  });

	  
	  sync2.owlCarousel({
		items : 3,
		itemsDesktop      : [1199,3],
		itemsDesktopSmall     : [979,3],
		itemsTablet       : [768,3],
		itemsMobile       : [479,2],
		pagination:false,
		responsiveRefreshRate : 100,
		afterInit : function(el){
		  el.find(".owl-item").eq(0).addClass("synced");
		}
	  });
	 
	  function syncPosition(el){
		var current = this.currentItem;
		$("#sync4")
		  .find(".owl-item")
		  .removeClass("synced")
		  .eq(current)
		  .addClass("synced")
		if($("#sync4").data("owlCarousel") !== undefined){
		  center(current)
		}
	  }
	 
	  $("#sync4").on("click", ".owl-item", function(e){
		e.preventDefault();
		var number = $(this).data("owlItem");
		sync1.trigger("owl.goTo",number);
	  });
	 
	  function center(number){
		var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
		var num = number;
		var found = false;
		for(var i in sync2visible){
		  if(num === sync2visible[i]){
			var found = true;
		  }
		}
	 
		if(found===false){
		  if(num>sync2visible[sync2visible.length-1]){
			sync2.trigger("owl.goTo", num - sync2visible.length+2)
		  }else{
			if(num - 1 === -1){
			  num = 0;
			}
			sync2.trigger("owl.goTo", num);
		  }
		} else if(num === sync2visible[sync2visible.length-1]){
		  sync2.trigger("owl.goTo", sync2visible[1])
		} else if(num === sync2visible[0]){
		  sync2.trigger("owl.goTo", num-1)
		}
		
	  }
	 
	});	


	//Parallax Awards Slider
	
	$(document).ready(function(){
		$('.slider-awwwards').bxSlider({
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
	
	
	
	
	
})(jQuery);