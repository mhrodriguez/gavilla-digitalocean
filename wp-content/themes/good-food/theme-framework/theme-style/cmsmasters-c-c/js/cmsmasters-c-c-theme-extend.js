/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Theme Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */



/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	
	if (id === 'metadata') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises'] = {
			'date' : 		cmsmasters_shortcodes.choice_date, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'author' : 		cmsmasters_shortcodes.choice_author, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'views' : 		cmsmasters_theme_shortcodes.choice_view, 
			'more' : 		cmsmasters_shortcodes.choice_more 
		};
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;



/**
 * Portfolio Extend
 */

cmsmastersShortcodes.cmsmasters_portfolio.title = cmsmasters_theme_shortcodes.portfolio_title;
cmsmastersShortcodes.cmsmasters_portfolio.fields.orderby.descr = cmsmasters_theme_shortcodes.portfolio_field_orderby_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.count.title = cmsmasters_theme_shortcodes.portfolio_field_pj_number_title;
cmsmastersShortcodes.cmsmasters_portfolio.fields.count.descr = cmsmasters_theme_shortcodes.portfolio_field_pj_number_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.portfolio_field_pj_number_descr_note + "</span>";
cmsmastersShortcodes.cmsmasters_portfolio.fields.categories.descr = cmsmasters_theme_shortcodes.portfolio_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.portfolio_field_categories_descr_note + "</span>";
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout.descr = cmsmasters_theme_shortcodes.portfolio_field_layout_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout['choises']['grid'] = cmsmasters_theme_shortcodes.portfolio_field_layout_choice_grid;
cmsmastersShortcodes.cmsmasters_portfolio.fields.layout_mode.descr = cmsmasters_theme_shortcodes.portfolio_field_layout_mode_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.columns.descr = cmsmasters_theme_shortcodes.portfolio_field_col_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.portfolio_field_col_count_descr_note + "<br />" + cmsmasters_theme_shortcodes.portfolio_field_col_count_descr_note_custom + "</span>"; 
cmsmastersShortcodes.cmsmasters_portfolio.fields.metadata_grid.descr = cmsmasters_theme_shortcodes.portfolio_field_metadata_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.gap.descr = cmsmasters_theme_shortcodes.portfolio_field_gap_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.filter.descr = cmsmasters_theme_shortcodes.portfolio_field_filter_descr;
cmsmastersShortcodes.cmsmasters_portfolio.fields.sorting.descr = cmsmasters_theme_shortcodes.portfolio_field_sorting_descr;


var portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	
	if (id === 'metadata_grid') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'views' : 		cmsmasters_theme_shortcodes.choice_view, 
			'rollover' : 	cmsmasters_shortcodes.choice_rollover 
		};
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'likes' : 		cmsmasters_shortcodes.choice_likes, 
			'views' : 		cmsmasters_theme_shortcodes.choice_view, 
			'rollover' : 	cmsmasters_shortcodes.choice_rollover 
		}
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = portfolio_new_fields;



/**
 * Posts Slider Extend
 */

cmsmastersShortcodes.cmsmasters_posts_slider.fields.post_type['choises']['project'] = cmsmasters_theme_shortcodes.posts_slider_field_poststype_choice_project;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_categories.title = cmsmasters_theme_shortcodes.posts_slider_field_poststype_choice_project;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_categories.descr = cmsmasters_theme_shortcodes.posts_slider_field_pjcateg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_theme_shortcodes.posts_slider_field_pjcateg_descr_note + "</span>", 
cmsmastersShortcodes.cmsmasters_posts_slider.fields.columns.descr = cmsmasters_theme_shortcodes.posts_slider_field_col_count_descr;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_metadata.title = cmsmasters_theme_shortcodes.posts_slider_field_pjmeta_title;
cmsmastersShortcodes.cmsmasters_posts_slider.fields.portfolio_metadata.descr = cmsmasters_theme_shortcodes.posts_slider_field_pjmeta_descr;


var posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	
	if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises'] = {
			'title' : 		cmsmasters_shortcodes.choice_title, 
			'categories' : 	cmsmasters_shortcodes.choice_categories, 
			'comments' : 	cmsmasters_shortcodes.choice_comments, 
			'views' : 		cmsmasters_theme_shortcodes.choice_view, 
			'likes' : 		cmsmasters_shortcodes.choice_likes 
		}
		
		
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = posts_slider_new_fields;



/**
 * Heading Extend
 */

var cmsmasters_heading_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_heading.fields) {
	if (id === 'font_family') {
		cmsmasters_heading_new_fields['shaped'] = { 
			type : 		'checkbox', 
			title : 	cmsmasters_theme_shortcodes.heading_field_shaped_check, 
			descr : 	'', 
			def : 		'', 
			required : 	false, 
			width : 	'half',  
			choises : { 
				'true' : cmsmasters_shortcodes.choice_enable 
			}
		};
		
		
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	} else {
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_heading.fields = cmsmasters_heading_new_fields;

