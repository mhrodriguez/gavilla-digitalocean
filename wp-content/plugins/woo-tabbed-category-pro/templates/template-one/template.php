<?php defined('ABSPATH') or die("No direct script access!"); ?>
<link rel="stylesheet" type="text/css"
      href="<?php echo QC_WOO_TAB_PLUGIN_URL . 'templates/template-' . $qc_shortcode_parameters['theme'] . "/template.css"; ?>"/>


<style>
    .qc_theme_one {
        color: <?php echo get_option('product_category_text_font_color');?> !important;
        font-size: <?php echo get_option('product_category_text_font_size');?>px !important;
        background-color: <?php echo get_option('product_category_filter_button_color');?> !important;
    }

    .qc_theme_one:hover {
        background: <?php echo get_option('product_category_filter_button_color_hover');?>;

    }

    .qc-tabs-style1 ul.tabs li span {
        background-color: <?php echo get_option('product_category_filter_button_color');?> !important;
    }

    .qc-tabs-style1 ul.tabs li:hover span {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;
    }

    .qc-tabs-style1 ul.tabs li.current span {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;
    }

    .qc-tabs-style1 ul.qc_nav_style_1 li {
        border: 1px solid <?php echo get_option('category_filters_border_color');?> !important;
        background-color: <?php echo get_option('product_category_filter_button_color');?> !important;
    }

    .qc-tabs-style1 ul.qc_nav_style_1 li:hover {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;
    }

    .qc-tabs-style1 ul.qc_nav_style_1 li.current {
        background: <?php echo get_option('product_category_button_active_color');?> !important;
    }

    .qc-tabs-style1 ul.qc_nav_style_1 li::after {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;
    }

</style>

<div class="qc-tabs-style1 qc-tabs-style1_new">
    <div class="container">
        <?php


        $category_ids = '';
        $show_sale = '';
        $shortcode_params = ($qc_shortcode_parameters);


        if (array_key_exists('featured-only', $shortcode_params)) {
            $featured_only = $shortcode_params['featured-only'];
        } else {
            $featured_only = '';
        }

        if (array_key_exists('category-ids', $shortcode_params)) {
            $category_ids = $shortcode_params['category-ids'];

            // convert the string into php array
            $category_ids = explode(',', $category_ids);

        } else {
            $category_ids = '';
        }

        if (array_key_exists('sale-only', $shortcode_params)) {
            $show_sale = $shortcode_params['sale-only'];
        } else {
            $show_sale = '';
        }

        $product_categories = unserialize(get_option('selected_categories'));
        $product_number = get_option('product_number');


        $args = array(
            'hide_empty' => 1,
            'order' => get_option('category_order'),
            'exclude' => $product_categories,
            'include' => $category_ids,
        );
        $product_categories = get_terms('product_cat', $args);


        ?>


        <ul class="tabs tabs-one tabs-widget-light qc_nav_style_1 <?php if (get_option('category_style') == 1) echo " slick-class"; ?>">
            <?php if (get_option('show_all')): ?>
                <li class="qc_theme_one" data-show-sale="<?php echo $show_sale; ?>"
                    data-offset="<?php echo get_option('product_number'); ?>" class="tab-link"
                    data-cat-id="all"
                    data-feature-only="<?php echo $featured_only; ?>"
                    data-tab="tab-<?php echo get_option('show_all'); ?>"> All<span class=""></span></li>
            <?php endif; ?>
            <?php foreach ($product_categories as $cat): ?>
                <li class="qc_theme_one" data-show-sale="<?php echo $show_sale; ?>"
                    data-offset="<?php echo get_option('product_number'); ?>"
                    data-cat-id="<?php echo $cat->term_id; ?>"
                    data-feature-only="<?php echo $featured_only; ?>"
                    class="tab-link"
                    data-tab="tab-<?php echo $cat->term_id; ?>"><?php echo substr($cat->name, 0, get_option('max_char_per_cat')); ?>
                    <span class=""></span></li>
            <?php endforeach; ?>
        </ul>
        <div class="qc_tab_css_bg" style="background-color:<?php echo get_option('container_background_color') ?>">
            <?php if (get_option('show_all')): ?>
                <div id="tab-<?php echo get_option('show_all'); ?>" class="tab-content">
                    <div class="qc-wootabs-section">
                        <div class="qc-wootabs-content-section">
                            <?php


                            $tax_query_all = array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field' => 'name',
                                    'terms' => 'featured',
                                    'operator' => 'IN'
                                ),);


                            $show_sale_products_only_all = array('relation' => 'OR', array( // Simple products type
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


                            $args_all = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
                            );

                            if ($show_sale == 1) {
                                $args_all = array_merge($args_all, array('meta_query' => $show_sale_products_only_all));
                            }


                            if ($featured_only == 1) {
                                $args_all = array_merge($args_all, array('tax_query' => $tax_query_all));
                            }


                            $tax_query = array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field' => 'name',
                                    'terms' => 'featured',
                                    'operator' => 'IN'
                                ),);


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




                            // Sort by price

//                            $args = array(
//                                'posts_per_page' => $product_number,
//                                'post_type' => 'product',
//                                'orderby' => 'meta_value_num',
//                                'meta_key' => '_price',
//                                'order' => 'desc'
//                            );


                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $product_number,
                                'meta_key' => '_price',
                                'orderby' => get_option('qc_product_sort_type'),
                                'order' => get_option('qc_product_sort_order'),
                            );

                            if ($show_sale == 1) {
                                $args = array_merge($args, array('meta_query' => $show_sale_products_only));
                            }


                            if ($featured_only == 1) {
                                $args = array_merge($args, array('tax_query' => $tax_query));
                            }
                            $product_query = new WP_Query($args);
                            $product_count = new WP_Query($args_all);

                            $product_num = $product_count->post_count;

                            $product_query = new WP_Query($args);
                            $wc_pf = new WC_Product_Factory(); ?>
                            <ul class="theme-one">
                                <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                                    <?php $product = $wc_pf->get_product(get_the_ID());
                                    $product_stock_status = $product->get_stock_status();
                                    ?>
                                    <li class="">
                                        <div class="product-box">
                                            <div class="product-img"><?php echo $product->get_image('shop_catalog'); ?></div>
                                            <?php if ($product->is_on_sale()): ?>
                                                <label for="qc_on_sale"><img
                                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/sale.png"></label>
                                            <?php endif; ?>
                                            <?php if (get_option('product_title') == 1): ?>
                                                <h2 class="">
                                                    <a style="color: <?php if (get_option('product_title_text_color') != '') echo get_option('product_title_text_color') . ';'; ?>; font-size: <?php if (get_option('change_title_text_size') != '') echo get_option('change_title_text_size') . 'px;'; ?>"
                                                       href="<?php echo $product->get_permalink() ?>"><?php echo $product->get_title(); ?></a>
                                                </h2>
                                            <?php endif; ?>
                                            <?php $average = $product->get_average_rating(); ?>
                                            <?php if (get_option('display_rating') == 1): ?>
                                                <?php if ($average == 1) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/1_star.png" alt="">
                                                <?php } else if ($average == 0) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/no_star.png" alt="">
                                                <?php } else if ($average <= 2) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/2_star.png" alt="">
                                                <?php } else if ($average <= 3) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/3_star.png" alt="">
                                                <?php } else if ($average <= 4) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/4_star.png" alt="">
                                                <?php } else if ($average <= 5) { ?>
                                                    <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/5_star.png" alt="">
                                                <?php } ?>
                                            <?php endif; ?>
                                            <div class="product-bottom">
                                                <?php if (get_option('display_price') == 1): ?>
                                                    <div class="qc-woprice"
                                                         style="font-size: <?php echo get_option('product_content_text_size'); ?>px; color: <?php echo get_option('product_content_text_color'); ?>;"><?php echo $product->get_price_html(); ?></div>
                                                <?php endif; ?>


                                                <div class="qc_quantity qc_qat_style_two">
                                                    <?php if (get_option('add_quantity_select') == 1): ?>
                                                        <?php if ($product_stock_status != 'outofstock'): ?>
                                                            <input class="qc_minus" type="button" value="-">
                                                            <input type="text" class="qc_product_quantity"
                                                                   name="qcld_quantity" value="1">
                                                            <input class="qc_plus" type="button" value="+">
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (get_option('add_cart_link') == 1): ?>
                                                        <?php if ($product_stock_status != 'outofstock') { ?>
                                                            <a class="woo_tab_s_p_add_to_cart"
                                                               data-p-price="<?php echo $product->get_price(); ?>"
                                                               data-p-id="<?php echo $product->get_id(); ?>"
                                                               href="<?php echo $wc_pf->get_product(get_the_ID())->add_to_cart_url(); ?>"><i
                                                                        class="fa fa-cart-plus"
                                                                        aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                            <a class="product_out_of_stock"
                                                               data-p-price="<?php echo $product->get_price(); ?>"
                                                               data-p-id="<?php echo $product->get_id(); ?>"
                                                               href="#"><i
                                                                        class="fa"
                                                                        aria-hidden="true"></i></a>
                                                        <?php } ?>
                                                    <?php endif; ?>


                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <!-- Load more -->

                        <?php if ($product_num > get_option('product_number')): ?>
                            <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                                <div class="loader_container"></div>
                                <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                        id="qcld-wootab-more-one-all"
                                        data-theme-name="theme-one" data-show-sale="<?php echo $show_sale; ?>"
                                        data-feature-only="<?php echo $featured_only; ?>"
                                        data-offset="<?php echo get_option('product_number'); ?>">
                                    <?php $load_more = get_option('change_load_more_text');
                                    if (!empty($load_more)) {
                                        echo $load_more;
                                    } else {
                                        _e('Load More');
                                    } ?>
                                </button>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="qc_tab_css_bg" style="background-color:<?php echo get_option('container_background_color') ?>">
            <?php foreach ($product_categories as $cat): ?>
                <div id="tab-<?php echo $cat->term_id; ?>" class="tab-content">
                    <div class="qc-wootabs-section">
                        <div class="qc-wootabs-content-section">
                            <?php


                            $show_featured_only = array('relation' => 'OR', array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $cat->term_id,
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
                                'post_type' => 'product',
                                'posts_per_page' => $product_number,
                                'meta_key' => '_price',
                                'orderby' => get_option('qc_product_sort_type'),
                                'order' => get_option('qc_product_sort_order'),
                                'tax_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $cat->term_id,
                                        'operator' => 'IN'
                                    ),
                                )
                            );

                            if ($show_sale == 1) {
                                $args = array_merge($args, array('meta_query' => $show_sale_products_only));
                            }


                            if ($featured_only == 1) {
                                $args = array_merge($args, array('tax_query' => $show_featured_only));
                            }


                            $args_two = array(
                                'post_type' => array('product', 'product_variation'),
                                'post_status' => 'publish',
                                'posts_per_page' => -1,

                            );


                            $args_two = array(
                                'post_type' => array('product', 'product_variation'),
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'term_id',
                                        'terms' => $cat->term_id,
                                        'operator' => 'IN'
                                    ),
                                )
                            );


                            $products_num = new WP_Query($args_two);
                            $product_num = $products_num->post_count;


                            $product_query = new WP_Query($args);
                            $wc_pf = new WC_Product_Factory(); ?>
                            <ul class="theme-one">
                                <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                                    <?php $product = $wc_pf->get_product(get_the_ID());
                                    $product_stock_status = $product->get_stock_status();
                                    ?>
                                    <li class="">
                                        <div class="product-box">
                                            <div class="product-img"><?php echo $product->get_image('shop_catalog'); ?></div>
                                            <?php if ($product->is_on_sale()): ?>
                                                <label for="qc_on_sale"><img
                                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/sale.png"></label>
                                            <?php endif; ?>
                                            <?php if (get_option('product_title') == 1): ?>
                                                <h2>
                                                    <a style="color: <?php if (get_option('product_title_text_color') != '') echo get_option('product_title_text_color') . ';'; ?>; font-size: <?php if (get_option('change_title_text_size') != '') echo get_option('change_title_text_size') . 'px;'; ?>"
                                                       href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title(); ?></a>
                                                </h2>
                                            <?php endif; ?>
                                            <?php $average = $product->get_average_rating();
                                            ?>
                                            <?php if (get_option('display_rating') == 1): ?>
                                                <div class="qcld_woo_product_rating">
                                                    <?php if ($average == 1) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/1_star.png"
                                                             alt="">
                                                    <?php } else if ($average == 0) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/no_star.png"
                                                             alt="">
                                                    <?php } else if ($average <= 2) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/2_star.png"
                                                             alt="">
                                                    <?php } else if ($average <= 3) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/3_star.png"
                                                             alt="">
                                                    <?php } else if ($average <= 4) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/4_star.png"
                                                             alt="">
                                                    <?php } else if ($average <= 5) { ?>
                                                        <img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/5_star.png"
                                                             alt="">
                                                    <?php } ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="product-bottom">
                                                <?php if (get_option('display_price') == 1): ?>
                                                    <div class="qc-woprice"
                                                         style="font-size: <?php echo get_option('product_content_text_size'); ?>px; color: <?php echo get_option('product_content_text_color'); ?>;"><?php echo $product->get_price_html(); ?></div>
                                                <?php endif; ?>


                                                <div class="qc_quantity qc_qat_style_two">
                                                    <?php if (get_option('add_quantity_select') == 1): ?>
                                                        <?php if ($product_stock_status != 'outofstock'): ?>
                                                            <input class="qc_minus" type="button" value="-">
                                                            <input type="text" class="qc_product_quantity"
                                                                   name="qcld_quantity" value="1">
                                                            <input class="qc_plus" type="button" value="+">
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (get_option('add_cart_link') == 1): ?>
                                                        <?php if ($product_stock_status != 'outofstock') { ?>
                                                            <a class="woo_tab_s_p_add_to_cart"
                                                               data-p-price="<?php echo $product->get_price(); ?>"
                                                               data-p-id="<?php echo $product->get_id(); ?>"
                                                               href="<?php echo $wc_pf->get_product(get_the_ID())->add_to_cart_url(); ?>"><i
                                                                        class="fa fa-cart-plus"
                                                                        aria-hidden="true"></i></a>
                                                        <?php } else { ?>
                                                            <a class="product_out_of_stock"
                                                               data-p-price="<?php echo $product->get_price(); ?>"
                                                               data-p-id="<?php echo $product->get_id(); ?>"
                                                               href="#"><i
                                                                        class="fa"
                                                                        aria-hidden="true"></i></a>
                                                        <?php } ?>
                                                    <?php endif; ?>


                                                </div>

                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>

                        <!-- Load more -->

                        <?php if ($product_num > get_option('product_number')): ?>
                            <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                                <div class="loader_container"></div>
                                <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                        id="qcld-wootab-more-one"
                                        data-cat-id="<?php echo $cat->term_id; ?>"
                                        data-show-sale="<?php echo $show_sale; ?>"
                                        data-feature-only="<?php echo $featured_only; ?>"
                                        data-offset="<?php echo get_option('product_number'); ?>">
                                    <?php $load_more = get_option('change_load_more_text');
                                    if (!empty($load_more)) {
                                        echo $load_more;
                                    } else {
                                        _e('Load More');
                                    } ?>
                                </button>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- container -->
</div>