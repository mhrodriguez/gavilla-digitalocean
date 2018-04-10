<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function good_food_theme_fonts() {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body, 
	table tbody th, 
	table tbody td, 
	.cmsmasters_post_content, 
	.cmsmasters_project_content, 
	.cmsmasters_comment_item_content, 
	.cmsmasters_project_instructions td, 
	.cmsmasters_stats .cmsmasters_stat_subtitle, 
	.cmsmasters_notice .notice_content, 
	.cmsmasters_pricing_table .feature_list li, 
	.cmsmasters_pricing_table .feature_list li a, 
	.error .error_subtitle, 
	#wp-calendar tr, 
	#wp-calendar tr a, 
	.widget_rss ul li .rssSummary, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a, 
	.cmsmasters_print_button {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_content_font_google_font']) . $cmsmasters_option['good-food' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_content_font_font_style'] . ";
	}
	
	.widget, 
	.cmsmasters_print_button, 
	.about_author_cont p, 
	.cmsmasters_post_content, 
	.cmsmasters_project_content, 
	.cmsmasters_project_instructions td, 
	.cmsmasters_pricing_table .feature_list li, 
	.cmsmasters_pricing_table .feature_list li a, 
	.widget_rss ul li .rssSummary {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 2) . "px;
	}
	
	#wp-calendar caption, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a, 
	.widget.widget_custom_contact_info_entries, 
	.widget.widget_custom_contact_info_entries a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 4) . "px;
	}
	
	.error .error_subtitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_stats .cmsmasters_stat_subtitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 4) . "px;
	}
	
	table tbody th, 
	table tbody td {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 8) . "px;
	}
	
	.cmsmasters_counters.counters_type_vertical .cmsmasters_counter_wrap .cmsmasters_counter_subtitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 8) . "px;
	}
	
	.cmsmasters_notice .notice_content, 
	.cmsmasters_comment_item_content {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 4) . "px;
	}
	
	#wp-calendar tr, 
	#wp-calendar tr a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 5) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 6) . "px;
	}
	
	address {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 4) . "px;
	}
	
	.cmsmasters_twitter_wrap .cmsmasters_twitter_item_content {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] + 2) . "px;
	}
	/* Finish Content Font */


	/* Start Link Font */
	a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_link_font_google_font']) . $cmsmasters_option['good-food' . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_link_font_text_decoration'] . ";
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option['good-food' . '_link_hover_decoration'] . ";
	}
	
	.about_author_cont a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_link_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_link_font_line_height'] - 2) . "px;
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.navigation > li > a, 
	.top_line_nav > li > a, 
	.footer_nav > li > a, 
	.header_top .meta_wrap, 
	.header_top .meta_wrap a, 
	.cmsmasters_dynamic_cart .count	{
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_nav_title_font_google_font']) . $cmsmasters_option['good-food' . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_nav_title_font_text_transform'] . ";
	}
	
	.footer_nav > li > a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_dynamic_cart .count {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_font_size'] - 1) . "px;
	}
	
	.top_line_nav > li > a, 
	.header_top .meta_wrap, 
	.header_top .meta_wrap a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_line_height'] - 6) . "px;
	}
	
	@media only screen and (max-width: 1024px) {
		.top_line_nav > li > a {
			font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_title_font_font_size'] - 1) . "px;
		}
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation ul li a,
	.top_line_nav ul li a, 
	.navigation li a .nav_tag, 
	.navigation li a .nav_subtitle {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_nav_dropdown_font_google_font']) . $cmsmasters_option['good-food' . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.top_line_nav ul li a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_line_height'] + 4) . "px;
	}
	
	.navigation li a .nav_tag {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_line_height'] + 4) . "px;
	}
	
	.navigation li a .nav_subtitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_line_height'] - 2) . "px;
	}
	
	.navigation li a .nav_tag {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_nav_dropdown_font_line_height'] - 4) . "px;
	}
	
	.top_line_nav > li > a, 
	.header_top .meta_wrap, 
	.header_top .meta_wrap a {
		text-transform:" . $cmsmasters_option['good-food' . '_nav_dropdown_font_text_transform'] . ";
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.logo .title, 
	.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]), 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day, 
	.cmsmasters_pricing_table .cmsmasters_price_wrap {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h1_font_google_font']) . $cmsmasters_option['good-food' . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_dropcap {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h1_font_google_font']) . $cmsmasters_option['good-food' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['good-food' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h1_font_google_font']) . $cmsmasters_option['good-food' . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['good-food' . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] + 11) . "px;
	}
	
	.cmsmasters_pricing_table .cmsmasters_price_wrap {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] + 13) . "px;
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:48px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:22px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] - 9) . "px;
	}
	
	.headline_outer .headline_inner .headline_icon {
		padding-top:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] - 9) . "px;
	}
	
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] + 5) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h1_font_line_height'] + 2) . "px;
	}
	
	@media only screen and (max-width: 1440px) {
		body .cmsmasters_header_search_form .cmsmasters_header_search_form_field input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]) {
			font-size:" . ((int) $cmsmasters_option['good-food' . '_h1_font_font_size'] - 15) . "px;
		}
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	h2,
	h2 a, 
	.one_first .sidebar_layout_11 .widget .widgettitle, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h2_font_google_font']) . $cmsmasters_option['good-food' . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h2_font_text_decoration'] . ";
	}
	
	.one_first .sidebar_layout_11 .widget .widgettitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h2_font_font_size'] + 14) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h2_font_line_height'] + 14) . "px;
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a, 
	.post_nav a, 
	.widget .widgettitle, 
	.cmsmasters_archive_type .cmsmasters_archive_item_title, 
	.cmsmasters_archive_type .cmsmasters_archive_item_title a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h3_font_google_font']) . $cmsmasters_option['good-food' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_archive_type .cmsmasters_archive_item_title, 
	.cmsmasters_archive_type .cmsmasters_archive_item_title a, 
	.cmsmasters_post_default .cmsmasters_post_title, 
	.cmsmasters_post_default .cmsmasters_post_title a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] + 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_post_timeline .cmsmasters_post_title, 
	.cmsmasters_post_timeline .cmsmasters_post_title a, 
	.cmsmasters_post_masonry .cmsmasters_post_title, 
	.cmsmasters_post_masonry .cmsmasters_post_title a, 
	.cmsmasters_profile_horizontal .cmsmasters_profile_title, 
	.cmsmasters_profile_horizontal .cmsmasters_profile_title a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] - 4) . "px;
	}
	
	.post_nav a, 
	.cmsmasters_single_slider_title, 
	.about_author_title, 
	.cmsmasters_pings_list > h3, 
	.post_comments_title, 
	.comment-reply-title, 
	.comment-reply-title small a, 
	.cmsmasters_project_ingredients_title, 
	.cmsmasters_project_instructions_title, 
	.cmsmasters_open_project .project_features_title, 
	.cmsmasters_open_profile .profile_details_title, 
	.cmsmasters_open_profile .profile_features_title, 
	.cmsmasters_open_profile .profile_contact_info_title {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h3_font_google_font']) . $cmsmasters_option['good-food' . '_h3_font_system_font'] . ";
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] - 8) . "px;
	}
	
	.widget .widgettitle {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] - 6) . "px;
	}
	
	@media only screen and (max-width: 540px) {
		.cmsmasters_open_post .cmsmasters_post_header .cmsmasters_post_title, 
		.headline_outer .headline_inner .headline_text .entry-title {
			font-size:" . $cmsmasters_option['good-food' . '_h3_font_font_size'] . "px;
			line-height:" . $cmsmasters_option['good-food' . '_h3_font_line_height'] . "px;
		}
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a, 
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a, 
	table thead tr, 
	.cmsmasters_project_info_item .entry-title, 
	.cmsmasters_slider_project .cmsmasters_slider_project_title a, 
	.cmsmasters_project_puzzle .cmsmasters_project_title a, 
	.cmsmasters_toggles .cmsmasters_toggle_title a, 
	.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_units, 
	.widget_rss ul li .rsswidget, 
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title, 
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a, 
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title, 
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h4_font_google_font']) . $cmsmasters_option['good-food' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h4_font_text_decoration'] . ";
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title.stat_has_titleicon:before, 
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before {
		line-height:" . $cmsmasters_option['good-food' . '_h4_font_line_height'] . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat {
		padding-top:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] * 2 + 13) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_container {
		height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] * 2 + 220 + 13) . "px;
	}
	
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title, 
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a, 
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title, 
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner .cmsmasters_slider_project_title a, 
	.cmsmasters_quotes_grid .cmsmasters_quote_title, 
	.cmsmasters_toggles .cmsmasters_toggle_title a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 2) . "px;
	}
	
	.widget_rss ul li .rsswidget, 
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	.about_author_cont_title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 4) . "px;
	}
	
	.cmsmasters_project_puzzle .cmsmasters_project_title,  
	.cmsmasters_project_puzzle .cmsmasters_project_title a,
	.cmsmasters_slider_project .cmsmasters_slider_project_title,  
	.cmsmasters_slider_project .cmsmasters_slider_project_title a {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] + 4) . "px;
	}
	
	.cmsmasters_project_info_item .entry-title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 10) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_units, 
	.cmsmasters_comment_item_title, 
	.cmsmasters_comment_item_title a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 8) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 6) . "px;
	}
	
	table thead tr {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 10) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_units {
		font-weight:600; /* static */
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a, 
	ul li, 
	ol li, 
	table tfoot th, 
	table tfoot td, 
	.footer .footer_custom_html, 
	.cmsmasters_contact_form label, 
	.cmsmasters_post_default .cmsmasters_post_date, 
	.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon_year, 
	.cmsmasters_post_masonry .cmsmasters_post_date, 
	.cmsmasters_open_post_top_wrap .cmsmasters_post_date, 
	.cmsmasters_open_post_top_wrap .cmsmasters_open_post_top_meta a, 
	.cmsmasters_open_post_top_wrap .cmsmasters_open_post_top_meta span, 
	.cmsmasters_open_project_top_wrap .cmsmasters_project_date, 
	.cmsmasters_open_project_top_wrap .cmsmasters_open_project_top_meta a, 
	.cmsmasters_open_project_top_wrap .cmsmasters_open_project_top_meta span, 
	.share_posts a, 
	.share_posts .share_posts_title, 
	.cmsmasters_project_excerpt, 
	.cmsmasters_project_ingredients td, 
	.cmsmasters_project_info_item span, 
	.cmsmasters_open_profile .profile_details_item, 
	.cmsmasters_open_profile .profile_features_item, 
	.cmsmasters_open_profile .profile_details_item a, 
	.cmsmasters_open_profile .profile_features_item a, 
	.cmsmasters_open_profile .profile_contact_info_item, 
	.cmsmasters_open_profile .profile_contact_info_item, 
	.cmsmasters_open_profile .profile_contact_info_item a, 
	.cmsmasters_open_profile .profile_contact_info_item	a, 
	.cmsmasters_project_grid .cmsmasters_project_footer, 
	.cmsmasters_project_grid .cmsmasters_project_footer a, 
	.cmsmasters_project_grid .cmsmasters_project_info_item, 
	.cmsmasters_slider_project .cmsmasters_slider_project_category a, 
	.cmsmasters_project_puzzle .cmsmasters_project_category	a, 
	.cmsmasters_quotes .cmsmasters_quote_content, 
	.cmsmasters_quotes .cmsmasters_quote_subtitle_wrap, 
	.cmsmasters_quotes .cmsmasters_quote_subtitle_wrap a, 
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap, 
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap, 
	.cmsmasters_twitter_wrap .published, 
	.cmsmasters_pricing_table .cmsmasters_period, 
	.widget_pages ul li a, 
	.widget_categories ul li a, 
	.widget_archive ul li a, 
	.widget_meta ul li a, 
	.widget_recent_comments ul li a, 
	.widget_recent_entries ul li a, 
	.widget_rss ul li .rss-date, 
	.widget_tag_cloud a, 
	.widget_custom_popular_projects_entries .cmsmasters_slider_project_inner a, 
	.widget_custom_latest_projects_entries .cmsmasters_slider_project_inner a, 
	.cmsmasters_archive_type .cmsmasters_archive_item_type, 
	.cmsmasters_archive_type .cmsmasters_archive_item_info, 
	.cmsmasters_archive_type .cmsmasters_archive_item_info a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h5_font_google_font']) . $cmsmasters_option['good-food' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h5_font_text_decoration'] . ";
	}
	
		
	.cmsmasters_icon_list_items li:before {
		line-height:" . $cmsmasters_option['good-food' . '_h5_font_line_height'] . "px;
	}
	
	ul li, 
	ol li, 
	.widget_pages ul li a, 
	.widget_categories ul li a, 
	.widget_archive ul li a, 
	.widget_meta ul li a, 
	.widget_recent_comments ul li a, 
	.widget_recent_entries ul li a, 
	.cmsmasters_post_masonry .cmsmasters_post_date, 
	.widget_rss ul li .rss-date	{
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 1) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published, 
	.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap, 
	.cmsmasters_quotes.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap *, 
	.cmsmasters_quotes.cmsmasters_quotes_grid .cmsmasters_quote_subtitle_wrap a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_project_excerpt {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] + 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 12) . "px;
	}
	
	.cmsmasters_footer_default .footer_custom_html {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 6) . "px;
	}
	
	.cmsmasters_twitter_wrap .published, 
	.cmsmasters_quotes .cmsmasters_quote_content, 
	.cmsmasters_project_ingredients td {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] + 2) . "px;
	}
	
	table tfoot th, 
	table tfoot td {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_quotes .cmsmasters_quote_content {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 4) . "px;
	}
	
	.widget_tag_cloud a, 
	.headline_outer .entry-subtitle {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 6) . "px;
	}
	
	@media only screen and (max-width: 768px) {
		.cmsmasters_project_puzzle .cmsmasters_project_header .cmsmasters_project_title, 
		.cmsmasters_project_puzzle .cmsmasters_project_header .cmsmasters_project_title a {
			font-size:" . $cmsmasters_option['good-food' . '_h5_font_font_size'] . "px;
			line-height:" . $cmsmasters_option['good-food' . '_h5_font_line_height'] . "px;
		}
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a, 
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner, 
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a, 
	.cmsmasters_post_read_more, 
	.footer_inner .footer_copyright, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	.cmsmasters_slider_post .cmsmasters_slider_post_read_more, 
	.cmsmasters_heading_wrap.cmsmasters_heading_shaped .cmsmasters_heading, 
	.widget_nav_menu ul li a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a	{
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h6_font_google_font']) . $cmsmasters_option['good-food' . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h6_font_text_decoration'] . ";
	}
	
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner, 
	.cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a, 
	.cmsmasters_open_post .cmsmasters_post_subtitle .entry-subtitle, 
	.cmsmasters_open_project .cmsmasters_project_subtitle .entry-subtitle, 
	.cmsmasters_open_profile .cmsmasters_profile_subtitle .entry-subtitle, 
	.cmsmasters_pricing_table .pricing_title_wrap .pricing_title, 
	.headline_outer .headline_inner.align_center .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner {
		font-size:15px; /* static */
		line-height:30px; /* static */
	}
	
	.cmsmasters_heading_wrap.cmsmasters_heading_shaped .cmsmasters_heading {
		font-size:15px !important; /* static */
		line-height:30px !important; /* static */
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	.footer_inner .footer_copyright	{
		text-transform:none;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h6_font_font_size'] + 5) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h6_font_line_height'] + 7) . "px;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_button_font_google_font']) . $cmsmasters_option['good-food' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_button_font_text_transform'] . ";
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option['good-food' . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_button_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option['good-food' . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option['good-food' . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small, 
	.wp-caption .wp-caption-text, 
	.wp-caption .wp-caption-text a, 
	.cmsmasters_post_default .cmsmasters_post_info > span, 
	.cmsmasters_post_default .cmsmasters_post_info > span a, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info  > span, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info  > span a, 
	.cmsmasters_post_masonry .cmsmasters_post_cont_info a, 
	.cmsmasters_open_post .cmsmasters_post_cont_info, 
	.cmsmasters_open_post .cmsmasters_post_cont_info a,		
	.cmsmasters_open_project .cmsmasters_project_cont_info, 
	.cmsmasters_open_project .cmsmasters_project_cont_info a,	
	.comment-edit-link, 
	.cmsmasters_comment_item_cont_reply_date,
	.cmsmasters_comment_item_cont_reply_date a, 
	.comment-respond label, 
	.comment-respond .comment-notes, 
	.comment-respond .comment-notes a, 
	.comment-respond .logged-in-as, 
	.comment-respond .logged-in-as a, 
	.cmsmasters_pings_list .comment-body, 
	.cmsmasters_pings_list .comment-body a, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_slider_post .cmsmasters_slider_post_date, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_small_font_google_font']) . $cmsmasters_option['good-food' . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_small_font_google_font']) . $cmsmasters_option['good-food' . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option['good-food' . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option['good-food' . '_small_font_line_height'] . "px !important;
	}
	
	.wp-caption .wp-caption-text {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_small_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_small_font_line_height'] - 4) . "px;
	}
	
	.cmsmasters_comment_item_cont_reply_date,
	.cmsmasters_comment_item_cont_reply_date a, 
	.comment-edit-link {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_small_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_post_default .cmsmasters_post_info > span, 
	.cmsmasters_post_default .cmsmasters_post_info > span a, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info  > span, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info  > span a, 
	.cmsmasters_post_masonry .cmsmasters_post_cont_info a, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a, 
	.cmsmasters_slider_post .cmsmasters_slider_post_date {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_small_font_font_size'] + 2) . "px;
	}
	
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_small_font_font_size'] + 4) . "px;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */	input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	textarea,
	select,
	option {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_input_font_google_font']) . $cmsmasters_option['good-food' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_input_font_font_style'] . ";
	}
	
	.gform_wrapper input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option['good-food' . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_quote_font_google_font']) . $cmsmasters_option['good-food' . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_quote_font_font_style'] . ";
	}
	
	q {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_quote_font_google_font']) . $cmsmasters_option['good-food' . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option['good-food' . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";
	
	
	return apply_filters('good_food_theme_fonts_filter', $custom_css);
}

