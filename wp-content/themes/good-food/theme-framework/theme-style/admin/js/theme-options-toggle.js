/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Admin Options Toggles Scripts
 * Created by CMSMasters
 * 
 */


(function ($) { 
	"use strict";
		
	$(document).ready(function () { 
		/* Post Format Fields Load */
		if ($('#post-formats-select input.post-format:checked').val() === '0') {
			$('#cmsmasters_project_standard').show();
		}
		
		/* Post Format Change */
		$('#post-formats-select input.post-format').on('change', function () { 
			if ($(this).val() === '0') {
				$('#cmsmasters_project_standard').show();
			} else {
				$('#cmsmasters_project_standard').hide();
			}
		} );
	} );
} )(jQuery);