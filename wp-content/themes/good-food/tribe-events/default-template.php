<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * 
 * @cmsmasters_package 	Good Food
 * @cmsmasters_version 	1.0.0
 *
 */


if (!defined('ABSPATH')) {
	die('-1');
}


include(get_template_directory() . '/tribe-events/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/templates/default-template.php');