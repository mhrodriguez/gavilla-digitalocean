<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();


?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="cmsmasters_html">
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="format-detection" content="telephone=no" />
<meta name="google-site-verification" content="5nRsLmsLCWVL0Hro4IVo1Y72Tx6BaoEmzjXXUizHxpA" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116280651-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116280651-1');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P32HJS4');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P32HJS4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php do_action('cmsmasters_before_body', $cmsmasters_option); ?>

<?php good_food_get_header_search_form($cmsmasters_option); ?>

<!-- _________________________ Start Page _________________________ -->
<div id="page" class="<?php good_food_get_page_classes($cmsmasters_option); ?>hfeed site">
<?php do_action('cmsmasters_before_page', $cmsmasters_option); ?>

<!-- _________________________ Start Main _________________________ -->
<div id="main">

<!-- _________________________ Start Header _________________________ -->
<header id="header">
	<?php 
	do_action('cmsmasters_before_header', $cmsmasters_option);
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-top');
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-mid');
	
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/header-bot');
	
	do_action('cmsmasters_after_header', $cmsmasters_option);
	?>
</header>
<!-- _________________________ Finish Header _________________________ -->


<!-- _________________________ Start Middle _________________________ -->
<div id="middle">
<?php 
good_food_page_heading();


list($cmsmasters_layout, $cmsmasters_page_scheme) = good_food_theme_page_layout_scheme();


echo '<div class="middle_inner' . (($cmsmasters_page_scheme != 'default') ? ' cmsmasters_color_scheme_' . $cmsmasters_page_scheme : '') . '">' . "\n" . 
	'<div class="content_wrap ' . $cmsmasters_layout . '">' . "\n\n";

