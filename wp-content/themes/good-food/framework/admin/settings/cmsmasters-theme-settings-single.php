<?php 
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile Settings
 * Created by CMSMasters
 * 
 */


function good_food_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'good-food');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'good-food');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'good-food');
	}
	
	
	return apply_filters('cmsmasters_options_single_tabs_filter', $tabs);
}


function good_food_options_single_sections() {
	$tab = good_food_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'good-food');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'good-food');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'good-food');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_sections_filter', $sections, $tab);
} 


function good_food_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = good_food_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = good_food_settings_single_defaults();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'good-food'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'good-food') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_date'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_author'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_tag'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_nav_box'] 
		);
		
		if (class_exists('Cmsmasters_Content_Composer')) {
			$options[] = array( 
				'section' => 'post_section', 
				'id' => 'good-food' . '_blog_post_share_box', 
				'title' => esc_html__('Sharing Box', 'good-food'), 
				'desc' => esc_html__('show', 'good-food'), 
				'type' => 'checkbox', 
				'std' => $defaults[$tab]['good-food' . '_blog_post_share_box'] 
			);
		}
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_blog_post_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_blog_more_posts_box'], 
			'choices' => array( 
				esc_html__('Show Related Posts', 'good-food') . '|related', 
				esc_html__('Show Popular Posts', 'good-food') . '|popular', 
				esc_html__('Show Recent Posts', 'good-food') . '|recent', 
				esc_html__('Hide More Posts Box', 'good-food') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'good-food'), 
			'desc' => esc_html__('posts', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_blog_more_posts_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'good-food' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'good-food'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_blog_more_posts_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_title'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'good-food'), 
			'desc' => esc_html__('Enter a project details block title', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_date'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_cat'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_author'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_comment'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_tag'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_like'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_link'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'good-food'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_more_projects_box'], 
			'choices' => array( 
				esc_html__('Show Related Projects', 'good-food') . '|related', 
				esc_html__('Show Popular Projects', 'good-food') . '|popular', 
				esc_html__('Show Recent Projects', 'good-food') . '|recent', 
				esc_html__('Hide More Projects Box', 'good-food') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'good-food'), 
			'desc' => esc_html__('projects', 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_more_projects_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'good-food'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'good-food'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_more_projects_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'good-food'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_project_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'good-food'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_pj_categs_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'good-food' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'good-food'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_portfolio_pj_tags_slug'], 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'good-food'), 
			'desc' => esc_html__('Enter a profile details block title', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'good-food'), 
			'desc' => esc_html__('show', 'good-food'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'good-food'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_profile_post_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'good-food' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'good-food'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'good-food'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['good-food' . '_profile_pl_categs_slug'], 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_fields_filter', $options, $tab);
}

