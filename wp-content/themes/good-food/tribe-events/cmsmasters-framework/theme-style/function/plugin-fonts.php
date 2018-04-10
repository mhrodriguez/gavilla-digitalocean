<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Tribe Events Fonts Rules
 * Created by CMSMasters
 * 
 */


function good_food_tribe_events_fonts($custom_css) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$custom_css .= "
/***************** Start Tribe Events Font Styles ******************/

	/* Start Content Font */
	.tribe-events-tooltip,
	.tribe-events-tooltip a,
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	.tribe-events-venue .cmsmasters_events_venue_header_right, 
	.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	.tribe-events-organizer .cmsmasters_events_organizer_header_right, 
	.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	.tribe-mini-calendar thead th {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_content_font_google_font']) . $cmsmasters_option['good-food' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_content_font_font_style'] . ";
	}
	
	.tribe-events-organizer .cmsmasters_events_organizer_header_right, 
	.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	.tribe-events-venue .cmsmasters_events_venue_header_right, 
	.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 2) . "px;
	}
	
	.tribe-events-grid .tribe-week-grid-hours div,
	.tribe-events-widget-link a, 
	.tribe-this-week-events-widget .tribe-events-viewmore a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 6) . "px;
	}
	
	.tribe-events-tooltip .description, 
	.tribe-events-grid .column.first > span {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 6) . "px;
	}
	
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 8) . "px;
	}
	
	.tribe-mini-calendar thead th {
		font-size:11px; /* static */
		line-height:26px; /* static */
	}
	
	.tribe-events-photo .tribe-events-event-meta .tribe-events-event-body {
		text-transform:capitalize;
	}
	
	.tribe-mini-calendar thead th, 
	.tribe-events-grid .tribe-week-grid-hours div {
		text-transform:uppercase;
	}
	/* Finish Content Font */
	
	
	/* Start H1 Font */
	.cmsmasters_event_big_day, 
	.tribe-events-countdown-widget .tribe-countdown-time {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h1_font_google_font']) . $cmsmasters_option['good-food' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_event_big_day {
		font-size:78px;
		line-height:84px;
	}
	
	.tribe-events-countdown-widget .tribe-countdown-time {
		font-size:36px;
		line-height:40px;
	}
	
	.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time {
		font-size:40px;
		line-height:40px;
	}
	
	@media only screen and (min-width: 1440px) {
		.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time {
			font-size:60px;
			line-height:60px;
		}
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_event_day,
	.tribe-mobile-day .tribe-mobile-day-date {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h2_font_google_font']) . $cmsmasters_option['good-food' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.one_first .sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title a,
	.one_first .sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .entry-title a, 
	.tribe-events-adv-list-widget .vcalendar .entry-title, 
	.tribe-events-adv-list-widget .vcalendar .entry-title a, 
	.tribe-events-venue-widget .vcalendar .entry-title, 
	.tribe-events-venue-widget .vcalendar .entry-title a, 
	.tribe-events-related-events-title, 
	.cmsmasters_single_event .tribe-events-single-event-title, 
	.tribe-events-photo .tribe-events-list-event-title,
	.tribe-events-photo .tribe-events-list-event-title a, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-page-title, 
	.tribe-events-page-title a, 
	.cmsmasters_event_big_month, 
	.tribe-events-list-event-title, 
	.tribe-events-list-event-title a, 
	.tribe-events-list .cmsmasters_event_day, 
	.tribe-events-list .tribe-events-list-separator-month,
	.tribe-events-list .tribe-events-day-time-slot > h5, 
	.tribe-events-grid .tribe-grid-header, 
	.tribe-events-grid .tribe-grid-header a, 
	.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	.tribe-events-tooltip .entry-title, 
	table.tribe-events-calendar thead th, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	.cmsmasters_single_event_meta .tribe-events-single-section-title, 
	.tribe-mini-calendar [id*=tribe-mini-calendar-month], 
	.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title a,
	.tribe-mini-calendar-list-wrapper .entry-title,
	.tribe-mini-calendar-list-wrapper .entry-title a, 
	.tribe-events-countdown-widget .tribe-countdown-text, 
	.tribe-events-countdown-widget .tribe-countdown-text a, 
	.tribe-this-week-events-widget .tribe-events-page-title, 
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title,
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h4_font_google_font']) . $cmsmasters_option['good-food' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h4_font_text_decoration'] . ";
	}
	
		
	.tribe-events-list .tribe-events-list-event-title, 
	.tribe-events-list .tribe-events-list-event-title a, 
	.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_day, 
	.tribe-events-venue .entry-title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_single_event .tribe-events-single-event-title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] + 4) . "px;
	}
	
	.tribe-events-countdown-widget .tribe-countdown-text, 
	.tribe-events-countdown-widget .tribe-countdown-text a, 
	.cmsmasters_single_event_meta .tribe-events-single-section-title, 
	.tribe-events-related-events-title, 
	.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	.tribe-events-grid .tribe-grid-header, 
	.tribe-events-grid .tribe-grid-header a, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-list-event-title, 
	.tribe-events-list-event-title a, 
	.tribe-events-list .cmsmasters_event_day, 
	.cmsmasters_event_big_month, 
	.tribe-events-list .tribe-events-day-time-slot > h5, 
	.tribe-events-list .tribe-events-list-separator-month {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 4) . "px;
	}
	
	.tribe-this-week-events-widget .tribe-events-page-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	table.tribe-events-calendar thead th, 
	.tribe-events-tooltip .entry-title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 6) . "px;
	}
	
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title,
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title a, 
	.widget .vcalendar .entry-title, 
	.widget .vcalendar .entry-title a, 
	.tribe-events-adv-list-widget .vcalendar .entry-title, 
	.tribe-events-adv-list-widget .vcalendar .entry-title a, 	
	.tribe-events-venue-widget .vcalendar .entry-title, 
	.tribe-events-venue-widget .vcalendar .entry-title a, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title a,
	.tribe-mini-calendar-list-wrapper .entry-title,
	.tribe-mini-calendar-list-wrapper .entry-title a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 8) . "px;
	}
	
	.tribe-mini-calendar [id*=tribe-mini-calendar-month] {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 10) . "px;
	}
	
	.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-text a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] + 10) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] + 10) . "px;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.tribe-events-adv-list-widget .tribe-venue-widget-venue-name a, 
	.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_month, 
	.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_month, 
	.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_month, 
	.tribe-events-venue .tribe-events-event-meta, 
	.tribe-events-venue .tribe-events-event-meta a, 
	.tribe-events-organizer .tribe-events-event-meta, 
	.tribe-events-organizer .tribe-events-event-meta a, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a, 
	.tribe-events-photo .tribe-events-event-meta, 
	.cmsmasters-tribe-events-event-cat a, 
	.tribe-events-list .cmsmasters_event_time, 
	.tribe-events-list .tribe-events-event-meta .published, 
	.tribe-events-list .tribe-events-event-meta .published a, 
	.tribe-events-list .tribe-events-event-meta .tribe-events-address,
	.tribe-events-list .tribe-events-event-meta,  
	.tribe-events-list .tribe-events-event-meta a, 
	.cmsmasters_event_big_week, 
	.cmsmasters_event_month,
	.tribe-bar-filters-inner > div label, 
	.tribe-mobile-day .tribe-events-read-more, 
	#tribe-events-content > .tribe-events-button, 
	.tribe-events-tooltip .duration .published, 
	.cmsmasters_single_event .tribe-events-schedule, 
	.cmsmasters_single_event .tribe-events-schedule a, 
	ul.tribe-related-events .tribe-related-event-info .published, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info a, 
	.one_first .sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_info,
	.one_first .sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_info a,
	.one_first .sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_info,
	.one_first .sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .cmsmasters_widget_event_info a, 
	.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue,
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h5_font_google_font']) . $cmsmasters_option['good-food' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h5_font_text_decoration'] . ";
	}
	
	.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue,
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a,
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-adv-list-widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-events-tooltip .duration .published {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.tribe-events-adv-list-widget .cmsmasters_event_date .cmsmasters_event_month, 
	.tribe-events-venue-widget .cmsmasters_event_date .cmsmasters_event_month, 
	.tribe_mini_calendar_widget .cmsmasters_event_date .cmsmasters_event_month {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 2) . "px;
	}
	
	#tribe-events-content > .tribe-events-button {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 4) . "px;
	}
	
	.cmsmasters_event_month {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 2) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under,
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under, 
	.cmsmasters_tribe_featured_tag, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	table.tribe-events-calendar tbody td .tribe-events-viewmore a, 
	.cmsmasters_single_event .tribe-events-cost, 
	.tribe-mobile-day .tribe-events-event-schedule-details, 
	.tribe-mobile-day .tribe-event-schedule-details {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h6_font_google_font']) . $cmsmasters_option['good-food' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h6_font_text_decoration'] . ";
	}
	
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h6_font_line_height'] + 2) . "px;
		text-transform:capitalize;
	}
	
	table.tribe-events-calendar tbody td .tribe-events-viewmore a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h6_font_line_height'] - 6) . "px;
	}
	
	.cmsmasters_tribe_featured_tag {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h6_font_line_height'] + 2) . "px;
	}
	
	.one_first .sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] + 5) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h6_font_line_height'] + 4) . "px;
		text-transform:capitalize;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.tribe-events-grid .tribe-grid-header span,
	#tribe-bar-views .tribe-bar-views-list li, 
	#tribe-bar-views .tribe-bar-views-list li a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_button_font_google_font']) . $cmsmasters_option['good-food' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_button_font_text_transform'] . ";
	}
	
	.tribe-events-grid .tribe-grid-header span {
		line-height:20px;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish Tribe Events Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('good_food_theme_fonts_filter', 'good_food_tribe_events_fonts');

