<?php
// Ajax load products on tab for theme ten

add_action('wp_ajax_get_products_by_cat_theme_ten', 'get_products_by_cat_theme_ten');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_ten', 'get_products_by_cat_theme_ten');


function get_products_by_cat_theme_ten()
{
    $post_per_page = get_option('product_number');
    $cat_id = $_POST['cat_id'];
    $offset = $_POST['offset'];


    $product_args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'posts_per_page' => $post_per_page,
        'offset' => $offset,
        'tax_query' => array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $cat_id,
                'operator' => 'IN'
            ),
        )
    );
    $products_num = new WP_Query($product_args);
    $product_num = $products_num->post_count;

    $product_query = new WP_Query($product_args);
    $wc_pf = new WC_Product_Factory();
    $prodGroup = round($product_num / $product_per_group);
    $extraLinkCount = $prodGroup - 1;


    $i = 0;
    $c = 2;

    $html .= '<ul class="qc_carousel_list qcld_wooTabCarousel" id="qcld_wooTabCarousel_' . $cat_id . '_' . $c . '">';

    if ($extraLinkCount >= 1) {
        $html .= '<li href="#" class="wooTabCatMore wooTabCatMoreNext" data-offset="4" cat_id="' . $cat_id . '"></li>';
    }

    while ($product_query->have_posts()) {

        $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();


        if ($i >= ($product_per_group)) {
            $c++;
            $html .= '</ul><ul class="qc_carousel_list qcld_wooTabCarousel hasMoreGroups" id="qcld_wooTabCarousel_' . $cat_id . '_' . $c . '">';
            $html .= '<li href="#" class="wooTabCatMore wooTabCatMorePrev"></li>';
            if ($c > $extraLinkCount) {
                $html .= '<li href="#" class="wooTabCatMore wooTabCatMoreNext"></li>';
            }

            $i = 0;
        }
        $i++;

        $html .= '
      	<li>
        <div class="qc_pro_details">
          <ul>';
        if (get_option('product_title') == 1) {

            $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                class="fa fa-link"
                                                                aria-hidden="true"></i></a> </li>';

        }
        $html .= '<div class="qc_quantity qc_qat_style_three">';
        if (get_option('add_quantity_select') == 1) {
            $html .= '<input class="qc_minus" type="button" value="-">
              <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                                       value="1">
              <input class="qc_plus" type="button" value="+">';
        }

        if (get_option('add_cart_link') == 1) {
            if ($product_stock_status != 'outofstock'):
                $html .= '<a data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                       class="woo_tab_s_p_add_to_cart"
                                                       href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                class="fa fa-cart-arrow-down"
                                                                aria-hidden="true"></i></a>';
            endif;
        }
        $html .= '</div>
          </ul>
        </div>
        
        ' . $product->get_image('shop_catalog') . '
        <h4style="color: ' . get_option('product_title_text_color') . ' font-size: ' . get_option('change_title_text_size') . ' px;" >' . $product->get_title() . $i . '</h4>
        <h5>' . $product->get_price_html() . '</h5>';


        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;

        $html .= '</li>';


    }
    $html .= '</ul>';

    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();

}

?>