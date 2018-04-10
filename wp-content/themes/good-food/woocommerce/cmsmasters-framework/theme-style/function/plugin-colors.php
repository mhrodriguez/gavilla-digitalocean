<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * WooCommerce Colors Rules
 * Created by CMSMasters
 * 
 */


function good_food_woocommerce_colors($custom_css) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active, 
	{$rule}.cmsmasters_single_product .price, 
	{$rule}.cmsmasters_product .price {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.required, 
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap, 
	{$rule}.comment-form-rating .stars > span a:hover, 
	{$rule}.comment-form-rating .stars > span a.active, 
	{$rule}#page .remove:hover, 
	{$rule}.shop_table a:not(.button):hover, 
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a, 
	{$rule}.widget > .product_list_widget a:hover, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .cart_list a:hover, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a:hover, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat a:hover, 
	{$rule}.cmsmasters_single_product .product_meta a:hover, 
	{$rule}.woocommerce-checkout-payment .place-order .terms label span:after, 
	{$rule}.shop_table .product-subtotal .woocommerce-Price-amount {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.widget_price_filter .ui-slider-range, 
	{$rule}.onsale, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .button, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button, 
	{$rule}.woocommerce-MyAccount-navigation li > a:hover, 
	{$rule}.woocommerce-MyAccount-navigation li.is-active > a, 
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}.select2-container.select2-container--open .select2-selection--single,
	{$rule}.select2-container.select2-container--focus .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.widget > .product_list_widget .amount, 
	{$rule}.select2-container .select2-selection--single, 
	{$rule}.select2-container .select2-selection--single .select2-selection__rendered, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .total strong, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong, 
	{$rule}.shop_attributes th, 
	{$rule}.cmsmasters_single_product .price del, 
	{$rule}.cmsmasters_product .price del {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.link_hover_color {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}#page .remove, 
	{$rule}.widget > .product_list_widget ins .amount, 
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat a, 
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button, 
	{$rule}.cmsmasters_single_product .product_meta, 
	{$rule}.shop_table, 
	{$rule}.shop_table a:not(.button), 
	{$rule}.cart_totals table, 
	{$rule}ul.order_details strong, 
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li, 
	{$rule}.widget_product_categories ul li a, 
	{$rule}.widget > .product_list_widget a, 
	{$rule}.widget_price_filter .price_slider_amount .price_label, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .total, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	{$rule}.cmsmasters_product .price ins, 
	{$rule}.cmsmasters_single_product .price ins, 
	{$rule}.cmsmasters_single_product .product_meta a, 
	{$rule}.shop_attributes td, 
	{$rule}.woocommerce-MyAccount-navigation li > a, 
	{$rule}.shop_table td, 
	{$rule}.shop_table.customer_details td, 
	{$rule}.shop_table.customer_details th	{
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.widget_price_filter .ui-slider-handle, 
	{$rule}ul.order_details li, 
	{$rule}.input-checkbox + label:after, 
	{$rule}.input-radio + label:after, 
	{$rule}input.shipping_method + label:after, 
	{$rule}.shop_table thead th, 
	{$rule}.onsale, 
	{$rule}.out-of-stock, 
	{$rule}.stock, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .button:hover, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}section.products > h2 {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['good-food' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */	
	{$rule}.woocommerce-checkout-payment, 
	{$rule}.cmsmasters_added_product_info, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content, 
	{$rule}.cmsmasters_product, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active, 
	{$rule}.select2-dropdown,
	{$rule}.select2-container .select2-selection--single, 
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button, 
	{$rule}.woocommerce-EditAccountForm	fieldset, 
	{$rule}.woocommerce-EditAccountForm	fieldset legend {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button:hover, 
	{$rule}.shop_table thead th, 
	{$rule}.onsale, 
	{$rule}.out-of-stock, 
	{$rule}.stock, 
	{$rule}ul.order_details, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content .button, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .button, 
	{$rule}.woocommerce-MyAccount-navigation li > a:hover, 
	{$rule}.woocommerce-MyAccount-navigation li.is-active > a {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}ul.order_details strong {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget_price_filter .price_slider, 
	{$rule}div.products:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.woocommerce-checkout-payment .payment_methods .payment_box, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.select2-container .select2-selection--single, 
	{$rule}.shop_table .actions, 
	{$rule}.cart_totals table .order-total td, 
	{$rule}.cart_totals table .order-total th {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.1);
	}
	
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.2);
	}
	
	{$rule}.woocommerce-MyAccount-navigation li > a {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['good-food' . '_' . $scheme . '_border']) . ", 0.5);
	}
	
	{$rule}.woocommerce-checkout-payment, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}.shop_table th, 
	{$rule}.shop_table td, 
	{$rule}.cart_totals table th, 
	{$rule}.cart_totals table td, 
	{$rule}.widget_price_filter .price_slider, 
	{$rule}.shop_table .cart_item,
	{$rule}.select2-dropdown,
	{$rule}.select2-container .select2-selection--single, 
	{$rule}.cmsmasters_added_product_info, 
	{$rule}.widget_shopping_cart .widget_shopping_cart_content, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content, 
	{$rule}.cmsmasters_product .cmsmasters_product_info {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}section.products > h2 {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['good-food' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/

";
	}
	
	
	return $custom_css;
}

add_filter('good_food_theme_colors_secondary_filter', 'good_food_woocommerce_colors');

