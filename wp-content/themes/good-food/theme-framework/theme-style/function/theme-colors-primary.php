<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function good_food_theme_colors_primary() {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_content {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_color']) . "
	}
	
	{$rule}#wp-calendar th, 
	{$rule}#wp-calendar td, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner, 
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner {
		background-color:transparent;
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}a,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.color_2,
	{$rule}.cmsmasters_featured_post, 
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}.cmsmasters_wrap_more_items.cmsmasters_loading:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.bypostauthor > .comment-body .alignleft:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a, 
	{$rule}article .cmsmasters_likes a:hover, 
	{$rule}article .cmsmasters_likes a.active, 
	{$rule}article .cmsmasters_comments a:hover, 
	{$rule}article .cmsmasters_views .active, 
	{$rule}.cmsmasters_post_read_more:hover, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info a:hover, 
	{$rule}.cmsmasters_post_timeline:hover .cmsmasters_post_date .cmsmasters_day, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_cont_info a:hover, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont_info a:hover, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_info_top_meta a:hover, 
	{$rule}.cmsmasters_open_post .cmsmasters_open_post_top_meta a:hover, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover, 
	{$rule}.comment-respond label span, 
	{$rule}.cmsmasters_open_project .cmsmasters_open_project_top_meta a:hover, 
	{$rule}.cmsmasters_open_profile .profile_details_item_desc a:hover, 
	{$rule}.cmsmasters_open_profile .profile_features_item_desc a:hover, 
	{$rule}.profile_contact_info_item *[class^='cmsmasters-icon-']:before, 
	{$rule}.profile_contact_info_item *[class^='cmsmasters_theme_icon_']:before, 
	{$rule}.cmsmasters_open_profile .profile_contact_info_item a:hover, 
	{$rule}.cmsmasters_open_profile .profile_contact_info_item a:hover, 
	{$rule}.cmsmasters_open_profile .cmsmasters_likes a:hover span, 
	{$rule}.cmsmasters_open_profile .cmsmasters_likes a.active span, 
	{$rule}.cmsmasters_open_profile .cmsmasters_comments a:hover span, 
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title a, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a:hover, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a:hover, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title.stat_has_titleicon:before, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_read_more:hover, 
	{$rule}.widget a:hover, 
	{$rule}.widget_custom_contact_info_entries > span:before, 
	{$rule}.widget_custom_contact_info_entries .adress_wrap:before, 
	{$rule}.widget.widget_custom_contact_info_entries a:hover, 
	{$rule}.widget_recent_comments ul li a:hover, 
	{$rule}.widget_recent_entries ul li a:hover, 
	{$rule}#wp-calendar #today, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a:hover, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info_top a .cmsmasters_post_date {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover, " : '') . "
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	{$rule}.footer_inner .social_wrap a, 
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:after, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a, 
	{$rule}.post_nav a:hover + span, 
	{$rule}.cmsmasters_single_slider .cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_single_slider .cmsmasters_next_arrow:hover, 
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover, " : '') . "
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):focus,
	{$rule}select:focus, 
	{$rule}textarea:focus, 
	{$rule}.post_nav a:hover + span, 
	{$rule}.cmsmasters_single_slider .cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_single_slider .cmsmasters_next_arrow:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	" . (($scheme == 'default') ? ".headline_outer a:hover," : '') . "
	" . (($scheme == 'default') ? ".headline_inner.align_center .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a:hover," : '') . "
	{$rule}a:hover,
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a:hover, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a:hover, 
	{$rule}.cmsmasters_header_search_form button:hover, 
	{$rule}.cmsmasters_header_search_form .cmsmasters_header_search_form_close:hover, 
	{$rule}code, 
	{$rule}table tbody th, 
	{$rule}table tbody td, 
	{$rule}.cmsmasters_likes a, 
	{$rule}.cmsmasters_comments a, 
	{$rule}.cmsmasters_views, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info a, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_mon_year, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_date, 
	{$rule}.share_posts a:hover, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info	a:hover, 
	{$rule}.post_nav a:hover, 
	{$rule}.comment-edit-link:hover, 
	{$rule}.comment-reply-link:hover, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_cont_info, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_cont_info a:hover, 
	{$rule}.cmsmasters_open_profile .profile_details_item, 
	{$rule}.cmsmasters_open_profile .profile_features_item, 
	{$rule}.cmsmasters_open_profile .profile_details_item_desc a, 
	{$rule}.cmsmasters_open_profile .profile_features_item_desc a, 
	{$rule}.cmsmasters_open_profile .cmsmasters_likes a, 
	{$rule}.cmsmasters_open_profile .cmsmasters_comments a, 
	{$rule}.cmsmasters_open_profile .profile_contact_info_item a, 
	{$rule}.cmsmasters_open_profile .profile_contact_info_item a, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_footer a:hover, 
	{$rule}.cmsmasters_stats .cmsmasters_stat_counter_wrap, 
	{$rule}.cmsmasters_stats .cmsmasters_stat_subtitle, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_counter_wrap, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_date, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a:hover, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_period, 
	{$rule}.cmsmasters_pricing_table .pricing_best .feature_list a:hover, 
	{$rule}.search_button button:hover, 
	{$rule}.widget.widget_custom_contact_info_entries a, 
	{$rule}.widget_recent_comments ul li a, 
	{$rule}.widget_recent_entries ul li a, 
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner a:hover, 
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner a:hover, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li small, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_info a:hover, 
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_subtitle, 
	{$rule}.cmsmasters_profile_header .cmsmasters_profile_subtitle, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info_top a:hover .cmsmasters_post_date {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_button:hover, 
	{$rule}.footer_inner .social_wrap a:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}input::-webkit-input-placeholder {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . ", 0.7);
	}
	
	{$rule}input:-moz-placeholder {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . ", 0.7);
	}
	
	{$rule}.cmsmasters_open_profile .profile_social_icons_list a, 
	{$rule}.cmsmasters_profile_horizontal .profile_social_icons_list a, 
	{$rule}.cmsmasters_profile_vertical .profile_social_icons_list a {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . ", 0.4);
	}
	
	{$rule}.search_button button {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . ", 0.5);
	} 
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	" . (($scheme == 'default') ? ".headline_outer a," : '') . "
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}fieldset legend,
	{$rule}blockquote footer,
	{$rule}table caption,
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before, 
	{$rule}table tfoot th, 
	{$rule}table tfoot td, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_info > span a, 
	{$rule}.cmsmasters_post_read_more, 
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.post_nav > span > span, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date .cmsmasters_day, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_cont_info > span a, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont_info a, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	{$rule}.share_posts a, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info	a, 
	{$rule}.post_nav a, 
	{$rule}.comment-edit-link, 
	{$rule}.comment-reply-link, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_cont_info a, 
	{$rule}.cmsmasters_project_ingredients label:after, 
	{$rule}.cmsmasters_project_ingredients td, 
	{$rule}.cmsmasters_project_instructions td, 
	{$rule}.cmsmasters_project_info .cmsmasters_project_info_item, 
	{$rule}.cmsmasters_open_profile .profile_details_item_desc, 
	{$rule}.cmsmasters_open_profile .profile_features_item_desc, 
	{$rule}.cmsmasters_open_profile .cmsmasters_likes a span, 
	{$rule}.cmsmasters_open_profile .cmsmasters_comments a span, 
	{$rule}.cmsmasters_open_profile .profile_social_icons_list a:hover, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_footer a, 
	{$rule}.cmsmasters_profile_horizontal .profile_social_icons_list a:hover, 
	{$rule}.cmsmasters_profile_vertical .profile_social_icons_list a:hover, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:after, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_title,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_units, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_read_more, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info > span:before, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_pricing_table .pricing_best .pricing_title_wrap .pricing_title, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_button, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_button:hover, 
	{$rule}.widget a, 
	{$rule}#wp-calendar thead th, 
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner, 
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_slider_project_category, 
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner, 
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner .cmsmasters_slider_project_category, 
	{$rule}.widget_custom_popular_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner a, 
	{$rule}.widget_custom_latest_projects_entries .cmsmasters_slider_project .cmsmasters_slider_project_inner a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li a, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_info, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_info a, 
	{$rule}.cmsmasters_print_button	{
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	" . (($scheme == 'default') ? ".headline_inner.align_center .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner," : '') . "
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover, 
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}form .formError .formErrorContent, 
	{$rule}table thead th, 
	{$rule}table thead td, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but:hover, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_sort_but.current, 
	{$rule}.cmsmasters_post_subtitle .entry-subtitle, 
	{$rule}.cmsmasters_project_subtitle .entry-subtitle, 
	{$rule}.cmsmasters_profile_subtitle .entry-subtitle, 
	{$rule}.cmsmasters_notice .notice_close:hover, 
	{$rule}.cmsmasters_pricing_table .pricing_title_wrap .pricing_title, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_item_inner, 
	{$rule}.cmsmasters_heading_wrap.cmsmasters_heading_shaped .cmsmasters_heading {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}table thead tr, 
	{$rule}.cmsmasters_notice .notice_close:hover, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_header, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_header {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
		
	{$rule}.cmsmasters_single_slider_title, 
	{$rule}.about_author_title, 
	{$rule}.cmsmasters_pings_list > h3, 
	{$rule}.post_comments_title, 
	{$rule}.comment-reply-title, 
	{$rule}.cmsmasters_project_ingredients_title, 
	{$rule}.cmsmasters_project_instructions_title, 
	{$rule}.cmsmasters_project_info .cmsmasters_project_info_item, 
	{$rule}.profile_details_title, 
	{$rule}.profile_features_title, 
	{$rule}.profile_contact_info_title {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover, 
	{$rule}.post_nav > span > a:hover + span, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers:hover, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.current {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . ", 0.5);
	}
	
	{$rule}.cmsmasters_content_slider .owl-buttons > div > span, 
	{$rule}.cmsmasters_alt_navigation .owl-buttons > div > span {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . ", 0.4);
	}
	
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_inner, 
	{$rule}.cmsmasters_project_puzzle .project_inner {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . ", 0.65);
	}
	
	{$rule}.cmsmasters_profile_vertical .cmsmasters_img_rollover .cmsmasters_open_link, 
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_rollover .cmsmasters_open_link, 
	{$rule}.cmsmasters_project_grid .project_outer_image_wrap_cont {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . ", 0.7);
	}
	
	{$rule}.cmsmasters_header_search_form, 
	{$rule}.cmsmasters_content_slider .owl-buttons > div:hover > span, 
	{$rule}.cmsmasters_alt_navigation .owl-buttons > div:hover > span {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . ", 0.8);
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	" . (($scheme == 'default') ? "#slide_top:hover, " : '') . "
	{$rule}mark,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.footer_inner .social_wrap a, 
	{$rule}.footer_inner .social_wrap a:hover, 
	{$rule}.cmsmasters_content_slider .owl-buttons > div > span, 
	{$rule}.cmsmasters_alt_navigation .owl-buttons > div > span, 
	{$rule}.cmsmasters_pricing_table .pricing_title_wrap .pricing_title, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_item_inner, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_item_inner .cmsmasters_period, 
	{$rule}.cmsmasters_pricing_table .pricing_best .feature_list a, 
	{$rule}.cmsmasters_heading_wrap.cmsmasters_heading_shaped .cmsmasters_heading {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme == 'default') ? "#page," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	" . (($scheme == 'default') ? ".middle_inner," : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}table tbody th, 
	{$rule}table tbody td, 
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.post_nav > span > span, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date, 
	{$rule}.cmsmasters_project_ingredients label:before, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:after, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_pricing_table .pricing_best .pricing_title_wrap .pricing_title, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_button, 
	{$rule}.cmsmasters_print_button	{
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour.tabs_pos_right .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour.tabs_pos_left .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	@media only screen and (min-width: 950px) {
		{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item.current_tab {
			" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		}
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	" . (($scheme == 'default') ? ".headline_inner.align_center .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner," : '') . "
	" . (($scheme == 'default') ? ".headline_inner.align_center .cmsmasters_breadcrumbs .cmsmasters_breadcrumbs_inner a," : '') . "
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]), 
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}.cmsmasters_button:hover, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover, 
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap, 
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}table thead th, 
	{$rule}table thead td, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a, 
	{$rule}.cmsmasters_post_subtitle .entry-subtitle, 
	{$rule}.post_nav a:hover + span, 
	{$rule}.cmsmasters_single_slider .cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_single_slider .cmsmasters_next_arrow:hover, 
	{$rule}.cmsmasters_project_subtitle .entry-subtitle, 
	{$rule}.cmsmasters_profile_subtitle .entry-subtitle, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_likes a, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_comments a, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_views, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_info_item, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_likes a, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_comments a, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_views, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_title a, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_category, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_category a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_likes a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_comments a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_views, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_title a, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_category, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_category a, 
	{$rule}.cmsmasters_profile_vertical .cmsmasters_img_rollover .cmsmasters_open_link, 
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_img_rollover .cmsmasters_open_link, 
	{$rule}.cmsmasters_notice .notice_close:hover, 
	{$rule}.cmsmasters_header_search_form button, 
	{$rule}.cmsmasters_header_search_form .cmsmasters_header_search_form_close {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_featured_block,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon,
	{$rule}.gallery-item .gallery-icon,
	{$rule}.gallery-item .gallery-caption,
	{$rule}.cmsmasters_img.with_caption, 
	{$rule}.owl-pagination .owl-page {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top " : '') . " {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . ", 0.8);
	}
	
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_likes a:hover, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_likes a.active, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_comments a:hover, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info .cmsmasters_views .active {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . ", 0.6);
	}
	
	{$rule}.cmsmasters_project_puzzle .cmsmasters_likes a:hover, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_likes a.active, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_comments a:hover, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_views .active, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_category a:hover, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_title a:hover, 	
	{$rule}.cmsmasters_slider_project .cmsmasters_likes a:hover, 
	{$rule}.cmsmasters_slider_project .cmsmasters_likes a.active, 
	{$rule}.cmsmasters_slider_project .cmsmasters_comments a:hover, 
	{$rule}.cmsmasters_slider_project .cmsmasters_views .active, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_category a:hover, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_title a:hover {
		color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . ", 0.7);
	}
	
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range])::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.cmsmasters_header_search_form input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]):-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	" . (($scheme == 'default') ? ".headline_outer .headline_inner.align_center .cmsmasters_breadcrumbs:before, " : '') . "
	{$rule}.content_wrap.r_sidebar .content:before, 
	{$rule}.content_wrap.l_sidebar .content:before, 
	{$rule}.content_wrap.r_sidebar .sidebar:before, 
	{$rule}.content_wrap.l_sidebar .sidebar:before, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before, 
	{$rule}.blog.timeline:before, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_subtitle:before, 
	{$rule}.cmsmasters_open_post .cmsmasters_open_post_left_wrap:before, 
	{$rule}.cmsmasters_open_post .cmsmasters_open_post_right_wrap:before, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_subtitle:before, 
	{$rule}.cmsmasters_open_project .cmsmasters_open_project_left_wrap:before, 
	{$rule}.cmsmasters_open_project .cmsmasters_open_project_right_wrap:before, 
	{$rule}.cmsmasters_open_profile .cmsmasters_profile_subtitle:before, 
	{$rule}.owl-pagination .owl-page:hover, 
	{$rule}.owl-pagination .owl-page.active, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert:before,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert:after,
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert span, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap:before, 
	{$rule}.cmsmasters_pricing_table .pricing_title_wrap:before, 
	{$rule}.cmsmasters_heading_wrap.cmsmasters_heading_shaped:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? ".headline_inner .headline_inner_content, " : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "	
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}textarea,
	{$rule}select, 
	{$rule}option,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_info, 
	{$rule}hr,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_img.with_caption,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before, 
	{$rule}table tr, 
	{$rule}.cmsmasters_prev_arrow, 
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.post_nav > span > span, 
	{$rule}.post_nav > span > a:hover + span, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_open_post .cmsmasters_open_post_top_meta, 
	{$rule}.share_posts .share_posts_inner, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_comment_item_cont, 
	{$rule}.cmsmasters_open_project .cmsmasters_open_project_top_meta, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_cont_info, 
	{$rule}.cmsmasters_project_ingredients tr, 
	{$rule}.cmsmasters_project_ingredients td, 
	{$rule}.cmsmasters_project_ingredients label:before, 
	{$rule}.cmsmasters_project_instructions tr, 
	{$rule}.cmsmasters_project_instructions td, 
	{$rule}.cmsmasters_open_project .project_features_item, 
	{$rule}.cmsmasters_project_info_item_inner, 
	{$rule}.cmsmasters_open_profile .profile_details_item, 
	{$rule}.cmsmasters_open_profile .profile_features_item, 
	{$rule}.cmsmasters_open_profile .profile_contact_info_item, 
	{$rule}.cmsmasters_project_grid .project_inner, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_footer, 
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_profile_header, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title, 
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list, 
	{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list_item.current_tab, 
	{$rule}.cmsmasters_tabs.tabs_mode_tour .cmsmasters_tabs_list_item.current_tab, 
	{$rule}.owl-pagination .owl-page, 
	{$rule}.cmsmasters_quotes .cmsmasters_quote_content, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:after, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner, 
	{$rule}.error .error_inner, 
	{$rule}.cmsmasters_print_button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour.tabs_pos_right .cmsmasters_tabs_list .cmsmasters_tabs_list_item:not(.current_tab) {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tabs.tabs_mode_tour.tabs_pos_left .cmsmasters_tabs_list .cmsmasters_tabs_list_item:not(.current_tab) {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_single_slider_title, 
	{$rule}.about_author_title, 
	{$rule}.cmsmasters_pings_list > h3, 
	{$rule}.post_comments_title, 
	{$rule}.comment-reply-title, 
	{$rule}.profile_details_title, 
	{$rule}.profile_features_title, 
	{$rule}.profile_contact_info_title {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}fieldset,
	{$rule}fieldset legend, 
	{$rule}input:not([type=button]):not([type=checkbox]):not([type=file]):not([type=hidden]):not([type=image]):not([type=radio]):not([type=reset]):not([type=submit]):not([type=color]):not([type=range]),
	{$rule}textarea,
	{$rule}option, 
	{$rule}select, 
	{$rule}table tfoot th, 
	{$rule}table tfoot td, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a:hover, 
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_inner {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.1);
	}
	
	{$rule}.cmsmasters_prev_arrow:hover, 
	{$rule}.cmsmasters_next_arrow:hover, 
	{$rule}.post_nav > span > a:hover + span, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers:hover, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.current, 
	{$rule}.wp-caption, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.2);
	}
	
	{$rule}.cmsmasters_open_project .project_features {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.5);
	}
	
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		-webkit-box-shadow:inset 0 0 0 1px " . $cmsmasters_option['good-food' . '_' . $scheme . '_border'] . ";
		box-shadow:inset 0 0 0 1px " . $cmsmasters_option['good-food' . '_' . $scheme . '_border'] . ";
	}
	
	@media only screen and (min-width: 950px) {
		{$rule}.cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item {
			" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
		}
	}
	
	@media only screen and (max-width: 1440px) {
		{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs.tabs_mode_tab .cmsmasters_tabs_list .cmsmasters_tabs_list_item {
			" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
		}
	}
	/* Finish Borders Color */
	
	
	/* Start Custom Rules */
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['good-food' . '_' . $scheme . '_color']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . ";
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['good-food' . '_' . $scheme . '_color']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	";
	
	
	if ($scheme != 'default') {
		$custom_css .= "
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_top_zigzag:before, 
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_bot_zigzag:after {
			background-image: -webkit-linear-gradient(135deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-webkit-linear-gradient(45deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -moz-linear-gradient(135deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-moz-linear-gradient(45deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -ms-linear-gradient(135deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-ms-linear-gradient(45deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -o-linear-gradient(135deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-o-linear-gradient(45deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: linear-gradient(315deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					linear-gradient(45deg, " . $cmsmasters_option['good-food' . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
		}
		";
	}
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bd_underline {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bd_underline:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return apply_filters('good_food_theme_colors_primary_filter', $custom_css);
}

