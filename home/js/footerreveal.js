(function($) {
	$.fn.footerReveal = function(options) {
		var $this = $(this),
	    $prev = $this.prev(),
	    $win = $(window),

		defaults = $.extend ({
            shadow : true,
            zIndex : -100,
            //something : false
        }, options );
	 	
	 	$this.css({
		   position : 'fixed',
		   bottom : 0,
		});

		if (defaults.zIndex) {
			$this.css({
				'z-index' : defaults.zIndex
			});
		} else {
			$this.css({
				'z-index' : options.zIndex
			});
		}

		if ($prev.outerWidth() !== $win.width()) {
			$this.css({
				'max-width' : $prev.outerWidth()
			});
		}

		$prev.css({
			'margin-bottom' : $this.outerHeight()
		});

		if (defaults.shadow) {
			$prev.css({
				'box-shadow' : '0 20px 30px -20px rgba(0,0,0,0.8)',
				'-moz-box-shadow' : '0 20px 30px -20px rgba(0,0,0,0.8)',
				'-webkit-box-shadow' : '0 20px 30px -20px rgba(0,0,0,0.8)'
			});
		}
		/*
		$.fn.isVisible = function() {		    
		    var viewport = {
		        top : $win.scrollTop(),
		    };
		    viewport.bottom = viewport.top + $win.height();
		    
		    var bounds = this.offset();
		    bounds.bottom = bounds.top + this.outerHeight();
		    
		    return (!(viewport.bottom < bounds.top || viewport.top > bounds.bottom));
		    
		};

		if (defaults.something == true) {
			var fired = false;
			window.addEventListener("scroll", function(){
			  if ($prev.isVisible() && fired === false) {
			    $this.show();
			    fired = true;
			  }
			}, true)
		}
		*/
		
	}
}) (jQuery);


