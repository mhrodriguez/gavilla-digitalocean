<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Tribe Events Colors Rules
 * Created by CMSMasters
 * 
 */


function good_food_tribe_events_colors($custom_css) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Tribe Events Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.tribe-mini-calendar tbody, 
	{$rule}.tribe-mini-calendar tbody a {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}.tribe-events-list-widget .tribe-event-featured, 
	{$rule}.tribe-events-adv-list-widget .tribe-event-featured .tribe-mini-calendar-event, 
	{$rule}.tribe-events-adv-list-widget .tribe-event-featured, 
	{$rule}.tribe-events-venue-widget .tribe-event-featured, 
	{$rule}.tribe-mini-calendar-list-wrapper .tribe-event-featured, 
	{$rule}#tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured, 
	{$rule}.tribe-events-list .tribe-events-loop .tribe-event-featured, 
	{$rule}.tribe-events-list #tribe-events-day.tribe-events-loop .tribe-event-featured, 
	{$rule}.type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap, 
	{$rule}.type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap:hover {
		background-color:transparent !important;
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.tribe-events-adv-list-widget .vcalendar .tribe-event-featured .entry-title a, 
	{$rule}.tribe-events-venue-widget .vcalendar .tribe-event-featured .entry-title a, 
	{$rule}.tribe-events-organizer .tribe-events-event-meta .organizer-address span:before, 
	{$rule}.tribe-events-venue .tribe-events-event-meta .venue-address span:before, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a, 
	{$rule}.cmsmasters_single_event .tribe-events-schedule a:hover, 
	{$rule}.cmsmasters_post_puzzle .cmsmasters_post_read_more:hover, 
	{$rule}.one_first .sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title a:hover, 
	{$rule}.one_first .sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .entry-title a:hover, 
	{$rule}.tribe-events-widget-link a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-events-viewmore a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .entry-title a:hover, 
	{$rule}.widget .vcalendar .entry-title a:hover, 
	{$rule}.tribe-mini-calendar-list-wrapper .entry-title a:hover, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a:hover, 
	{$rule}.tribe-events-single-event-title, 
	{$rule}#tribe-events-content > .tribe-events-button:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active a, 
	{$rule}.tribe-events-sub-nav li a:hover, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a:hover, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:hover, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:hover,  
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:hover, 
	{$rule}.tribe-mini-calendar tbody a:hover, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present a, 
	{$rule}.widget .vcalendar [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-mini-calendar-list-wrapper [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .duration:before, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue:before, 
	{$rule}.tribe-events-list .tribe-events-list-event-title a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_events_more a, 
	{$rule}.datepicker thead tr:first-child th:hover, 
	{$rule}.datepicker tfoot tr th:hover, 
	{$rule}.tribe-events-notices:before, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title:hover a,
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a,
	{$rule}table.tribe-events-calendar tbody td .type-tribe_events:hover .tribe-events-month-event-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a:hover, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button,
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav, 
	{$rule}.tribe-mini-calendar tbody a:before, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events:before, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date, 
	{$rule}.tribe-events-adv-list-widget .tribe-venue-widget-venue, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue, 
	{$rule}.cmsmasters_tribe_featured_tag, 
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav th, 
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav td {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-past a:before, 
	{$rule}#tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured .tribe-events-month-event-title a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav tr, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue,
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a:hover,
	{$rule}.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	{$rule}.tribe-events-adv-list-widget .vcalendar .tribe-event-featured .entry-title a:hover, 
	{$rule}.widget .vcalendar .cmsmasters_widget_event_info a:hover, 
	{$rule}.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info a:hover, 
	{$rule}.widget .vcalendar .cmsmasters_widget_event_info, 
	{$rule}.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info, 
	{$rule}.tribe-events-adv-list-widget .vcalendar .tribe-event-featured .entry-title a:hover, 
	{$rule}.tribe-events-venue-widget .vcalendar .tribe-event-featured .entry-title a:hover, 
	{$rule}.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under,
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a:hover, 
	{$rule}.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a:hover, 
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	{$rule}.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	{$rule}.tribe-events-organizer .tribe-events-event-meta .organizer-address a:hover, 
	{$rule}.tribe-events-organizer .tribe-events-event-meta .organizer-address, 
	{$rule}.tribe-events-venue .tribe-events-event-meta .venue-address a:hover, 
	{$rule}.tribe-events-venue .tribe-events-event-meta .venue-address, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a:hover, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_title, 
	{$rule}.cmsmasters_single_event .tribe-events-schedule, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-othermonth div[id*=tribe-events-daynum-], 
	{$rule}.tribe-events-tooltip .duration .published, 
	{$rule}.cmsmasters-tribe-events-event-cat a, 
	{$rule}.tribe-events-list .cmsmasters_event_time, 
	{$rule}.cmsmasters_event_big_week, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth a,
	{$rule}.cmsmasters_event_day, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:before,
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:before, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:before, 
	{$rule}.event_hover, 
	{$rule}.tribe-events-list .tribe-events-event-meta, 
	{$rule}.tribe-events-list .tribe-events-event-meta a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a,
	{$rule}.widget .vcalendar .cmsmasters_widget_event_info a, 
	{$rule}.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info a, 
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	{$rule}.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	{$rule}.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_day, 
	{$rule}.tribe-events-organizer .tribe-events-event-meta .organizer-address a, 
	{$rule}.tribe-events-organizer .entry-title, 
	{$rule}.tribe-events-venue .tribe-events-event-meta .venue-address a, 
	{$rule}.tribe-events-venue .entry-title, 
	{$rule}.cmsmasters_single_event .tribe-events-schedule a, 
	{$rule}.cmsmasters_single_event .tribe-events-single-event-title, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-past .tribe-events-month-event-title a,
	{$rule}.cmsmasters-tribe-events-event-cat a:hover, 
	{$rule}.tribe-events-list .cmsmasters_event_day, 
	{$rule}.tribe-events-list .tribe-events-event-meta a, 
	{$rule}.tribe-events-widget-link a, 
	{$rule}.tribe-this-week-events-widget .tribe-events-viewmore a, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .entry-title a, 
	{$rule}.widget .vcalendar .entry-title a, 
	{$rule}.tribe-mini-calendar-list-wrapper .entry-title a, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	{$rule}.tribe-bar-filters-inner > div label, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a, 
	{$rule}.tribe-events-sub-nav li a, 
	{$rule}.tribe-events-notices, 
	{$rule}#tribe-events-content > .tribe-events-button, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a, 
	{$rule}.cmsmasters_single_event_meta dt, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	{$rule}.tribe-mini-calendar thead a:hover,  
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a, 
	{$rule}.tribe-mobile-day .tribe-events-event-schedule-details, 
	{$rule}.tribe-mobile-day .tribe-event-schedule-details, 
	{$rule}.tribe-this-week-events-widget .tribe-events-page-title, 
	{$rule}.tribe-events-list .tribe-events-list-event-title a, 
	{$rule}.cmsmasters_event_big_month, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_events_more a:hover, 
	{$rule}#tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured .tribe-events-month-event-title a:hover, 
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}.tribe-events-grid .tribe-grid-header, 
	{$rule}.tribe-events-grid .tribe-grid-header .tribe-week-today, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-mini-calendar tbody .tribe-mini-calendar-today a:before, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events.mobile-active:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}table.tribe-events-calendar thead tr {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_single_event_meta .tribe-events-single-section-title, 
	{$rule}.tribe-events-related-events-title {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}#tribe-events-content table.tribe-events-calendar .type-tribe_events.tribe-event-featured .tribe-events-month-event-title a, 
	{$rule}.tribe-events-adv-list-widget .tribe-venue-widget-venue-name a:hover, 
	{$rule}.tribe-events-adv-list-widget .tribe-venue-widget-venue-name:before, 
	{$rule}.tribe-events-adv-list-widget .tribe-venue-widget-venue-name a, 	
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a:hover, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name:before, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title:hover a,
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a,
	{$rule}table.tribe-events-calendar tbody td .type-tribe_events:hover .tribe-events-month-event-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a:hover, 
	{$rule}.cmsmasters_event_month, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button,
	{$rule}.event_bg {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.recurringinfo .recurring-info-tooltip:after {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-events-day-column-0 .tribe-events-tooltip:after, 
	{$rule}.tribe-events-grid .tribe-events-day-column-6 .tribe-events-tooltip:after, 
	{$rule}.tribe-events-grid .tribe-events-day-column-5 .tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a,
	{$rule}.tribe-mini-calendar, 
	{$rule}.cmsmasters_event_day, 
	{$rule}table.tribe-events-calendar, 
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours, 
	{$rule}.tribe-events-sub-nav li span:not([class]) {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.cmsmasters_events_more a, 
	{$rule}.cmsmasters_events_more a:hover, 
	{$rule}.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_month, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-] a, 
	{$rule}.cmsmasters_tribe_featured_tag, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover span, 
	{$rule}.tribe-events-grid .tribe-grid-header span, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-mini-calendar thead a, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.tribe-events-photo .tribe-events-event-meta, 
	{$rule}.tribe-events-notices,
	{$rule}.tribe-mini-calendar tbody td,
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title,
	{$rule}.cmsmasters_event_day, 
	{$rule}.tribe-events-photo .tribe-events-list-photo-description, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item, 
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-sub-nav li span:not([class]), 
	{$rule}table.tribe-events-calendar tbody td .tribe_events, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-list .type-tribe_events, 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-block div, 
	{$rule}.tribe-events-grid .tribe-grid-allday, 
	{$rule}.tribe-events-grid .tribe-grid-content-wrap .column, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours div, 
	{$rule}.widget .vcalendar .type-tribe_events, 
	{$rule}.tribe-mini-calendar-list-wrapper .type-tribe_events, 
	{$rule}.tribe-mobile-day .tribe-events-mobile, 
	{$rule}table.tribe-events-calendar tbody tr, 
	{$rule}#page table.tribe-events-calendar tbody td {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.1);
	}
	
	{$rule}.tribe-mini-calendar .tribe-events-othermonth, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-day-time-slot > h5,
	{$rule}.tribe-events-notices {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.2);
	}
	
	{$rule}.tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-events-day-column-0 .tribe-events-tooltip:before, 
	{$rule}.tribe-events-grid .tribe-events-day-column-6 .tribe-events-tooltip:before, 
	{$rule}.tribe-events-grid .tribe-events-day-column-5 .tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.single-tribe_events .sidebar .widget_custom_posts_tabs_entries .cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item, 
	{$rule}.cmsmasters_single_event_meta .tribe-events-single-section-title, 
	{$rule}.tribe-events-related-events-title, 
	{$rule}.recurringinfo .recurring-info-tooltip:before {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} Tribe Events Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('good_food_theme_colors_secondary_filter', 'good_food_tribe_events_colors');

