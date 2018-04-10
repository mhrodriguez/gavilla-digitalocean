<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.5
 * 
 * Content Composer Single Progress Bar Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = $shortcode_id;


if ($this->stats_atts['stats_mode'] == 'bars') {
	$this->stats_atts['style_stats'] .= "\n" . '.cmsmasters_stats.shortcode_animated ' . '#cmsmasters_stat_' . esc_attr($unique_id) . ' .cmsmasters_stat { ' . 
		"\n\t" . (($this->stats_atts['stats_type'] == 'horizontal') ? 'width' : 'height') . ':' . esc_attr($progress) . '%; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsmasters_stat_' . esc_attr($unique_id) . ' .cmsmasters_stat_inner { ' . 
		(($color != '') ? "\n\t" . cmsmasters_color_css('background-color', $color) : '') . 
	"\n" . '} ' . "\n";
	
	if ($this->stats_atts['stats_type'] == 'vertical' && $color != '') {
		$this->stats_atts['style_stats'] .= '#cmsmasters_stat_' . esc_attr($unique_id) . ' .cmsmasters_stat_title.stat_has_titleicon:before { ' . 
			"\n\t" . cmsmasters_color_css('color', $color) . 
		"\n" . '} ' . "\n\n";
	}
}


$out = '<div id="cmsmasters_stat_' . esc_attr($unique_id) . '" class="cmsmasters_stat_wrap' . (($this->stats_atts['stats_mode'] == 'circles' || ($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical')) ? esc_attr($this->stats_atts['stats_count']) : '') . '">' . "\n" . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<div class="cmsmasters_stat_container">' . "\n" : '') . 
		'<div class="cmsmasters_stat' . 
		(($classes != '') ? ' ' . esc_attr($classes) : '') . 
		(($content == '' && $icon == '') ? ' stat_only_number' : '') . 
		(($content != '' && $icon != '') ? ' stat_has_titleicon' : '') . '"' . 
		' data-percent="' . esc_attr($progress) . '"' . 
		(($this->stats_atts['stats_mode'] == 'circles' && $color != '') ? ' data-bar-color="' . esc_attr($color) . '"' : '') . 
		'>' . "\n" . 
			'<div class="cmsmasters_stat_inner' . 
			(($icon != '' && !($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical')) ? ' ' . esc_attr($icon) : '') . 
			'">' . "\n" . 
				(($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_title">' . esc_html($content) . '</span>' . "\n" : '') . 
				($this->stats_atts['stats_mode'] == 'circles' ? '<span class="cmsmasters_stat_counter_wrap">' . "\n" : '') . 
					($this->stats_atts['stats_mode'] == 'circles' ? '<span class="cmsmasters_stat_counter">0</span>' : '') . 
					($this->stats_atts['stats_mode'] == 'circles' ? '<span class="cmsmasters_stat_units">%</span>' . "\n" : '') . 
				($this->stats_atts['stats_mode'] == 'circles' ? '</span>' . "\n" : '') . 
				(($content != '' && $this->stats_atts['stats_mode'] == 'circles') ? '<span class="cmsmasters_stat_title">' . esc_html($content) . '</span>' . "\n" : '') . 
			'</div>' . "\n" . 
		'</div>' . "\n" . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '</div>' . "\n" : '') . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_counter_wrap">' . "\n" : '') . 
		(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_counter">' . esc_html($progress) . '</span>' : '') . 
		(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '<span class="cmsmasters_stat_units">%</span>' . "\n" : '') . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'horizontal') ? '</span>' . "\n" : '') . 
	(($content != '' && $this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<span class="cmsmasters_stat_title' . 
	($icon != '' ? ' ' . esc_attr($icon) . ' stat_has_titleicon' : '') . 
	'">' . esc_html($content) . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<span class="cmsmasters_stat_counter_wrap">' . "\n" : '') . 
		(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<span class="cmsmasters_stat_counter">' . esc_html($progress) . '</span>' : '') . 
		(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '<span class="cmsmasters_stat_units">%</span>' . "\n" : '') . 
	(($this->stats_atts['stats_mode'] == 'bars' && $this->stats_atts['stats_type'] == 'vertical') ? '</span>' . "\n" : '') . 
	'</span>' . "\n" : '') . 
	(($subtitle != '') ? '<span class="cmsmasters_stat_subtitle">' . esc_html($subtitle) . '</span>' . "\n" : '') . 
'</div>';


echo $out;