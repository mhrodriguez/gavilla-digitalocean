
(function($) { "use strict";


	//Menu

 	$(function() {
		$( '#dl-menu' ).dlmenu();
	});	 
	
	
	//Parallax
	
	$(document).ready(function(){
			$('.parallax-contact').parallax("50%", 0.5);
	});	

	
	//Fixed Footer
	
	$(function() {
		$(".footer").footerReveal();
	});	

	
	//Google map	
		
	/*global $:false */
		var map;
		$(document).ready(function(){"use strict";
		  map = new GMaps({
		disableDefaultUI: true,
		scrollwheel: false,
			el: '#map',
			lat: 44.789511,
			lng: 20.43633
		  });
		  map.drawOverlay({
			lat: map.getCenter().lat(),
			lng: map.getCenter().lng(),
			layer: 'overlayLayer',
			content: '<div class="overlay"></div>',
			verticalAlign: 'center',
			horizontalAlign: 'center'
		  });
			var styles = [
	  {
		"featureType": "poi",
		"stylers": [
		  { "visibility": "on" },
		  { "weight": 0.9 },
		  { "lightness": 37 },
		  { "gamma": 0.62 },
		  { "hue": "#ff0000" },
		  { "saturation": -93 }
		]
	  },{
		"featureType": "poi",
		"stylers": [
		  { "hue": "#ff0000" },
		  { "saturation": -1 },
		  { "color": "#ffffff" },
		  { "weight": 0.2 }
		]
	  },{
		"featureType": "road",
		"stylers": [
		  { "hue": "#ff0000" },
		  { "saturation": -98 }
		]
	  },{
		"featureType": "landscape",
		"stylers": [
		  { "hue": "#ff0000" },
		  { "saturation": -89 }
		]
	  },{
		"featureType": "water",
		"stylers": [
		  { "hue": "#cfa144" },
		  { "weight": 0.4 },
		  { "saturation": -38 }
		]
	  }
	];
			
			map.addStyle({
				styledMapName:"Styled Map",
				styles: styles,
				mapTypeId: "map_style"  
			});
			
			map.setStyle("map_style");	  
		});		
	
	
})(jQuery);




