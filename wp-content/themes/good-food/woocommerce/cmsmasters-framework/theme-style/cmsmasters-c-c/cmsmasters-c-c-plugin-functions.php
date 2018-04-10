<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version 	1.0.0
 * 
 * WooCommerce Content Composer Functions
 * Created by CMSMasters
 * 
 */


/* Register JS Scripts */
function good_food_woocommerce_register_c_c_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('good-food-woocommerce-extend', get_template_directory_uri() . '/woocommerce/cmsmasters-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/cmsmasters-c-c/js/cmsmasters-c-c-plugin-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('good-food-woocommerce-extend', 'cmsmasters_woocommerce_shortcodes', array( 
			'product_ids' => 								good_food_woocommerce_product_ids(), 
			'products_title' =>								esc_html__('Products', 'good-food'), 
			'products_shortcode_title' =>					esc_html__('WooCommerce Shortcode', 'good-food'), 
			'products_shortcode_descr' =>					esc_html__('Choose a WooCommerce shortcode to use', 'good-food'), 
			'choice_recent_products' =>						esc_html__('Recent Products', 'good-food'), 
			'choice_featured_products' =>					esc_html__('Featured Products', 'good-food'), 
			'choice_product_categories' =>					esc_html__('Product Categories', 'good-food'), 
			'choice_sale_products' =>						esc_html__('Sale Products', 'good-food'), 
			'choice_best_selling_products' =>				esc_html__('Best Selling Products', 'good-food'), 
			'choice_top_rated_products' =>					esc_html__('Top Rated Products', 'good-food'), 
			'products_field_orderby_descr' =>				esc_html__("Choose your products 'order by' parameter", 'good-food'), 
			'products_field_orderby_descr_note' =>			esc_html__("Sorting will not be applied for", 'good-food'), 
			'products_field_prod_number_title' =>			esc_html__('Number of Products', 'good-food'), 
			'products_field_prod_number_descr' =>			esc_html__('Enter the number of products for showing per page', 'good-food'), 
			'products_field_col_count_descr' =>				esc_html__('Choose number of products per row', 'good-food'), 
			'selected_products_title' =>					esc_html__('Selected Products', 'good-food'), 
			'selected_products_field_ids' => 				esc_html__('Products', 'good-food'), 
			'selected_products_field_ids_descr' => 			esc_html__('Choose products to be shown', 'good-food'), 
			'selected_products_field_ids_descr_note' => 	esc_html__('All products will be shown if empty', 'good-food') 
		));
	}
}

add_action('admin_enqueue_scripts', 'good_food_woocommerce_register_c_c_scripts');



/* Product IDs */
function good_food_woocommerce_product_ids() {
	$product_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'product'
	));
	
	
	$out = array();
	
	
	if (!empty($product_ids)) {
		foreach ($product_ids as $product_id) {
			$out[$product_id->ID] = esc_html($product_id->post_title);
		}
	}
	
	
	return $out;
}

