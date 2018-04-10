<?php
/**
 * @cmsmasters_package 	Good Food
 * @cmsmasters_version 	1.0.0
 */


global $product;


list($cmsmasters_layout) = good_food_theme_page_layout_scheme();

function good_food_related_products_args($args) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	
	return $args;
}


/**
 * woocommerce_before_single_product hook
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );


if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div itemscope id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_single_product">
		<div class="cmsmasters_product_left_column">
		<?php
			$availability = $product->get_availability();

			if (esc_attr($availability['class']) == 'out-of-stock') {
				echo apply_filters('woocommerce_get_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '"><span>' . esc_html( $availability['availability'] ) . '</span></span>', $availability['availability']);
			}
			
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		</div>
		<div class="summary entry-summary cmsmasters_product_right_column">
			<div class="cmsmasters_product_title_info_wrap">
				<div class="cmsmasters_product_title_wrap">
					<?php
					woocommerce_template_single_title();
					
					good_food_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
					
					woocommerce_template_single_price();
					?>
				</div>
			</div>
			<div class="cmsmasters_product_content">
				<?php woocommerce_template_single_excerpt(); ?>
			</div>
			<?php
			woocommerce_template_single_meta();
			
			woocommerce_template_single_add_to_cart();
			
			woocommerce_template_single_sharing();
			
			
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
			remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
			
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
	<?php
		if ($cmsmasters_layout != 'fullwidth') {
			add_filter('woocommerce_output_related_products_args', 'good_food_related_products_args');
		}
		
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
