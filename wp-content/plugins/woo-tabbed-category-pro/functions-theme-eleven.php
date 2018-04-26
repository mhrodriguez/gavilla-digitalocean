<?php


add_action('wp_ajax_get_products_by_cat_theme_eleven', 'get_products_by_cat_theme_eleven');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_eleven', 'get_products_by_cat_theme_eleven');


function get_products_by_cat_theme_eleven()
{
    $post_per_page = get_option('product_number');
    $cat_id = $_POST['cat_id'];
    $offset = $_POST['offset'];
    $show_sale = $_POST['show_sale'];
    $show_feature = $_POST['feature_only'];

    if ($cat_id == 'all') {

        $show_featured_only = array('relation' => 'OR', array(
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN'
            )
        ));


        $show_sale_products_only = array('relation' => 'OR', array( // Simple products type
            'key' => '_sale_price',
            'value' => 0,
            'compare' => '>',
            'type' => 'numeric'
        ),
            array( // Variable products type
                'key' => '_min_variation_sale_price',
                'value' => 0,
                'compare' => '>',
                'type' => 'numeric'
            ));


        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $post_per_page,
            'orderby' => get_option('qc_product_sort_type'),
            'order' => get_option('qc_product_sort_order'),
        );

        if ($show_sale == 1) {
            $args = array_merge($args, array('meta_query' => $show_sale_products_only));
        }

        if ($show_feature == 1) {
            $args = array_merge($args, array('tax_query' => $show_featured_only));
        }


    } else {


        $show_featured_only = array('relation' => 'OR', array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $cat_id,
                'operator' => 'IN'
            ),
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN'
            )
        ));


        $show_sale_products_only = array('relation' => 'OR', array( // Simple products type
            'key' => '_sale_price',
            'value' => 0,
            'compare' => '>',
            'type' => 'numeric'
        ),
            array( // Variable products type
                'key' => '_min_variation_sale_price',
                'value' => 0,
                'compare' => '>',
                'type' => 'numeric'
            ));

        $args = array(
            'post_type' => array('product', 'product_variation'),
            'post_status' => 'publish',
            'posts_per_page' => $post_per_page,
            'orderby' => get_option('qc_product_sort_type'),
            'order' => get_option('qc_product_sort_order'),
//            'offset' => $offset,
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

        if ($show_sale == 1) {
            $args = array_merge($args, array('meta_query' => $show_sale_products_only));
        }


        if ($show_feature == 1) {
            $args = array_merge($args, array('tax_query' => $show_featured_only));
        }

    }


    $product_query = new WP_Query($args);
    $number_of_product = $product_query->post_count;
    $wc_pf = new WC_Product_Factory();
    $html = '';
    $html .= '<li data-content="100" class="selected">';


    $add_to_cart_text = get_option('change_add_to_cart_button_text');
    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                                    <div class="product-box">
                                        <div class="product-img">' . $product->get_image('shop_catalog') . '</div>';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;

        if (get_option('product_title') == 1):
            $html .= '<h2><a style="font-size: ' . get_option('change_title_text_size') . 'px; color: ' . get_option('product_title_text_color') . ';" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
        endif;
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            if ($average == 1) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/1_star.png" alt="">';
            } else if ($average == 0) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/no_star.png" alt="">';
            } else if ($average <= 2) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/2_star.png" alt="">';
            } else if ($average <= 3) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/3_star.png" alt="">';
            } else if ($average <= 4) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/4_star.png" alt="">';
            } else if ($average <= 5) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/5_star.png" alt="">';
            }
        endif;

        $html .= '<div class="product-bottom">';
        if (get_option('display_price') == 1):

            $html .= '<div style="font-size:' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . '" class="qc-woprice">' . $product->get_price_html() . '</div>';
        endif;


        $html .= '<div class="qc_quantity qc_qat_style_one">';

        if (get_option('add_quantity_select') == 1):
            if ($product_stock_status != 'outofstock'):
                $html .= '<input class="qc_minus" type="button" value="-">
                <input type="text" class="qc_product_quantity"
                       name="qcld_quantity" value="1">
                <input class="qc_plus" type="button" value="+">';
            endif;
        endif;
        if (get_option('add_cart_link') == 1):
            if ($product_stock_status != 'outofstock') {
                $html .= '<a class="woo_tab_s_p_add_to_cart"
                   data-p-price="' . $product->get_price() . '"
                   data-p-id="' . $product->get_id() . '"
                   href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                            class="fa fa-cart-plus"
                            aria-hidden="true"></i></a>';
            } else {
                $html .= '<a class="product_out_of_stock" href="#"><i
                            class="fa"
                            aria-hidden="true"></i></a>';
            }
        endif;


        $html .= '</div >';

        $html .= '</div><div class="clear"></div>
                                        </div>
                                    </div>
                                </li>';
    endwhile;
    $html .= '</li>';
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset,
        'product_number' => $number_of_product
    );
    echo wp_send_json($response);
    wp_die();
}