/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Admin Settings Toggles Scripts
 * Created by CMSMasters
 * 
 */


(function ($) { 
	"use strict";
	
	/* General 'Header' Tab Fields Load */
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_styles"]').parents('tr').hide();
	$('input[name*="' + cmsmasters_theme_settings.shortname + '_header_add_cont"]').parents('tr').hide();
	$('#' + cmsmasters_theme_settings.shortname + '_header_add_cont_cust_html').parents('tr').hide();
	$('#' + cmsmasters_theme_settings.shortname + '_header_bot_height').parents('tr').show();
	$('#' + cmsmasters_theme_settings.shortname + '_header_search').parents('tr').show();
} )(jQuery);