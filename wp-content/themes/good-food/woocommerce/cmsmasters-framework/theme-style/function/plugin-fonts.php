<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * WooCommerce Fonts Rules
 * Created by CMSMasters
 * 
 */


function good_food_woocommerce_fonts($custom_css) {
	$cmsmasters_option = good_food_get_global_options();
	
	
	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl, 
	.cmsmasters_single_product .product_meta, 
	.shop_attributes th, 
	.woocommerce address {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_content_font_google_font']) . $cmsmasters_option['good-food' . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_content_font_font_style'] . ";
	}
	
	.cmsmasters_single_product .product_meta {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_content_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_content_font_line_height'] - 2) . "px;
	}
	
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.cmsmasters_single_product .product_title, 
	section.products > h2 {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h3_font_google_font']) . $cmsmasters_option['good-food' . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h3_font_text_decoration'] . ";
	}
	
	.cmsmasters_single_product .product_title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] + 2) . "px;
	}
	
	section.products > h2 {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h3_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h3_font_line_height'] - 8) . "px;
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.woocommerce-customer-details > h2, 
	.woocommerce-order-details > h2, 
	.order_details.shop_table td, 
	.cart_totals > h2, 
	.order_review_heading, 
	.shop_table thead th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.order_details tfoot tr:last-child th, 
	.shop_table.order_details tfoot tr:last-child td, 
	.shop_table td > .amount, 
	.shop_table td strong > .amount, 
	.cart_totals table th, 
	.cart_totals table .cart-subtotal .amount, 
	.cart_totals table .order-total .amount, 
	ul.order_details, 
	.cmsmasters_product .price, 
	.cmsmasters_single_product .price, 
	.shop_table .product-name a, 
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	.shop_table.woocommerce-checkout-review-order-table tbody td, 
	.shop_table.woocommerce-checkout-review-order-table tbody th, 
	.shop_table.order_details tfoot tr th, 
	.cmsmasters_added_product_info .cmsmasters_added_product_info_text, 
	.widget_shopping_cart .widget_shopping_cart_content .cart_list a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	ul.order_details li, 
	ul.order_details strong, 
	.shop_table.order_details tfoot tr td, 
	.shop_table.customer_details td, 
	.shop_table.customer_details th, 
	.woocommerce-MyAccount-content .shop_table td, 
	.woocommerce-MyAccount-content .shop_table th, 
	.widget > .product_list_widget a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h4_font_google_font']) . $cmsmasters_option['good-food' . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h4_font_text_decoration'] . ";
	}
	
	.shop_table .product-name a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 4) . "px;
	}
	
	.woocommerce-MyAccount-content .shop_table td, 
	.woocommerce-MyAccount-content .shop_table th, 
	.shop_table.customer_details td, 
	.shop_table.customer_details th, 
	ul.order_details li, 
	ul.order_details strong, 
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	.shop_table thead th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.order_details tfoot tr:last-child th, 
	.shop_table.order_details tfoot tr:last-child td, 
	.shop_table td > .amount, 
	.shop_table td strong > .amount, 
	.cart_totals table th, 
	.cart_totals table .cart-subtotal .amount, 
	.cart_totals table .order-total .amount, 
	ul.order_details {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 6) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 6) . "px;
	}
	
	.widget > .product_list_widget a, 
	.shop_table.order_details tfoot tr td, 
	.shop_table.order_details tfoot tr th, 
	#page .order_details.shop_table td, 
	#page .order_details.shop_table td a, 
	.shop_table.woocommerce-checkout-review-order-table tbody td, 
	.shop_table.woocommerce-checkout-review-order-table tbody th {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 8) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 8) . "px;
	}
	
	.cmsmasters_product .cmsmasters_product_title {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] + 2) . "px;
	}
	
	.cmsmasters_single_product .price {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 2) . "px;
	}
	
	.cmsmasters_product .price {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 6) . "px;
	}
	
	.widget_shopping_cart .widget_shopping_cart_content .cart_list a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	.cmsmasters_added_product_info .cmsmasters_added_product_info_text {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h4_font_font_size'] - 10) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h4_font_line_height'] - 10) . "px;
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	.shipping-calculator-button, 
	.shop_table.woocommerce-checkout-review-order-table .shipping th, 
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a, 
	.widget > .product_list_widget .amount, 
	.widget_price_filter .price_slider_amount .price_label, 
	.widget_shopping_cart .widget_shopping_cart_content .cart_list .quantity, 
	.widget_shopping_cart .widget_shopping_cart_content .total, 
	.widget_shopping_cart .widget_shopping_cart_content .total strong, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong, 
	.cmsmasters_product .cmsmasters_product_cat, 
	.cmsmasters_product .cmsmasters_product_cat a, 
	.cmsmasters_single_product .product_meta a, 
	.shop_attributes td, 
	.woocommerce-MyAccount-content strong, 
	.woocommerce-info, 
	.woocommerce-message, 
	.woocommerce-error, 
	.form-row label, 
	.woocommerce-order .woocommerce-notice, 
	.widget_product_tag_cloud a	{
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_h5_font_google_font']) . $cmsmasters_option['good-food' . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option['good-food' . '_h5_font_text_decoration'] . ";
	}
	
	.widget_price_filter .price_slider_amount .price_label {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 1) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] - 1) . "px;
	}
	
	.woocommerce-order .woocommerce-notice, 
	.woocommerce-MyAccount-content strong, 
	.shop_attributes td, 
	.shipping-calculator-button, 
	.shop_table.woocommerce-checkout-review-order-table .shipping th {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 2) . "px;
	}
	
	.widget > .product_list_widget .amount, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong, 
	.widget_shopping_cart .widget_shopping_cart_content .total, 
	.widget_shopping_cart .widget_shopping_cart_content .total strong {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] - 2) . "px;
	}
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity, 
	.widget_shopping_cart .widget_shopping_cart_content .cart_list .quantity {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_h5_font_font_size'] - 4) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] - 4) . "px;
	}
	
	.widget_product_tag_cloud a {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_h5_font_line_height'] + 6) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	.onsale, 
	.out-of-stock, 
	.stock, 
	.cmsmasters_product .cmsmasters_product_add_inner a, 
	.woocommerce-MyAccount-navigation li > a {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_button_font_google_font']) . $cmsmasters_option['good-food' . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option['good-food' . '_button_font_text_transform'] . ";
	}
	
	.onsale, 
	.out-of-stock, 
	.stock, 
	.widget_price_filter .price_slider_amount .button {
		line-height:" . ((int) $cmsmasters_option['good-food' . '_button_font_line_height'] - 15) . "px;
		text-transform:capitalize;
	}
	
	.cmsmasters_product .cmsmasters_product_add_inner a {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_button_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_button_font_line_height'] - 6) . "px;
		text-transform:capitalize;
	}
	
	.widget_shopping_cart .widget_shopping_cart_content .button, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .button {
		font-size:" . ((int) $cmsmasters_option['good-food' . '_button_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option['good-food' . '_button_font_line_height'] - 15) . "px;
	}
	/* Finish Button Font */
	
	
	/* Start Text Fields Font */	
	.select2-container .select2-selection--single, 
	.select2-dropdown {
		font-family:" . good_food_get_google_font($cmsmasters_option['good-food' . '_input_font_google_font']) . $cmsmasters_option['good-food' . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option['good-food' . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option['good-food' . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option['good-food' . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option['good-food' . '_input_font_font_style'] . ";
	}
	/* Finish Text Fields Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/

";
	
	
	return $custom_css;
}

add_filter('good_food_theme_fonts_filter', 'good_food_woocommerce_fonts');

