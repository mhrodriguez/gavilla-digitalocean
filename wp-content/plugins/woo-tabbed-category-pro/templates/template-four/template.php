<?php defined('ABSPATH') or die("No direct script access!"); ?>
<link rel="stylesheet" type="text/css"
      href="<?php echo QC_WOO_TAB_PLUGIN_URL . 'templates/template-' . $qc_shortcode_parameters['theme'] . "/template.css"; ?>"/>


<style>
    .qc_theme_four {
        color: <?php echo get_option('product_category_text_font_color');?> !important;
        font-size: <?php echo get_option('product_category_text_font_size');?>px !important;
        background-color: <?php echo get_option('product_category_filter_button_color');?> !important;
    }

    .qc_theme_four:hover {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;

    }

    .qc_theme_four h1 {
        color: <?php echo get_option('product_category_text_font_color');?> !important;
        font-size: <?php echo get_option('product_category_text_font_size');?>px !important;
    }

    .qc_theme_four.qcld_theme_four_active {
        background: <?php echo get_option('product_category_button_active_color');?> !important;
    }


</style>


<div class="qc-tabs-style8">
    <?php if (get_option('show_all') == 1): ?>


        <div class="qc-tabs-container">
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


            <div class="qc-tabs-btn qc_theme_four" data-cat-id="all" data-show-sale="<?php echo $show_sale; ?>"
                 data-offset="<?php echo get_option('product_number'); ?>"
                 data-feature-only="<?php echo $featured_only; ?>">

                <h1 class="selected">All</h1>
            </div>
            <div class="qc-tabs-contant">
                <div class="qc-tabs-contant-inner">
                    <div class="qc-product-box">
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


                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => $product_number,
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
                        <ul class="theme-four">
                            <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                                <?php $product = $wc_pf->get_product(get_the_ID()); ?>
                                <li class=""
                                    style="background-color:<?php echo get_option('container_background_color') ?>">
                                    <div class="qc-product-list">
                                        <?php if ($product->is_on_sale()): ?>
                                            <label for="qc_on_sale"><img
                                                        src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/sale.png"></label>
                                        <?php endif; ?>
                                        <div class="qc-product-details-left"><?php echo get_the_post_thumbnail($product->get_id(), 'shop_catalog') ?></div>
                                        <div class="qc-product-details-right">

                                            <?php if (get_option('product_title') == 1): ?>
                                                <h2>
                                                    <a style="color: <?php echo get_option('product_title_text_color'); ?>;font-size: <?php echo get_option('change_title_text_size'); ?>px;"
                                                       href="<?php echo $product->get_permalink(); ?>"><?php echo $product->get_title(); ?></a>
                                                </h2>
                                            <?php endif; ?>
                                            <?php $average = $product->get_average_rating(); ?>

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

                                            <?php if (get_option('display_price') == 1): ?>
                                                <h3 style="font-size: <?php echo get_option('product_content_text_size'); ?>px; color: <?php echo get_option('product_content_text_color'); ?>;"><?php echo $product->get_price_html(); ?></h3>


                                            <?php endif; ?>


                                            <?php if (get_option('add_cart_link') == 1): ?>

                                            <a data-p-price="<?php echo $product->get_price(); ?>"
                                               data-p-id="<?php echo $product->get_id(); ?>"
                                               href="<?php echo $wc_pf->get_product(get_the_ID())->add_to_cart_url(); ?>"
                                               class="qc-cart-btn woo_tab_s_p_add_to_cart"><?php $add_to_cart_text = get_option('change_add_to_cart_button_text');
                                                if (!empty($add_to_cart_text)) {
                                                    echo $add_to_cart_text;
                                                } else {
                                                    _e("Add To Cart");
                                                } ?>

                                                <div class="qc_quantity">
                                                    <input type="text" class="qc_quantity" name="qcld_quantity"
                                                           min="1" max="600" value="1">
                                                </div>

                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>


                    <?php if ($product_num > get_option('product_number')): ?>
                        <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                            <div class="loader_container"></div>
                            <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                    id="qcld-wootab-more-four-all"
                                    data-theme-name="theme-four"
                                    data-show-sale="<?php echo $show_sale; ?>"
                                    data-feature-only="<?php echo $featured_only; ?>"
                                    data-offset="<?php echo get_option('product_number'); ?>"><?php $load_more = get_option('change_load_more_text');
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

        </div>
    <?php endif; ?>
    <div class="qc-tabs-container">
        <?php

        $product_categories = unserialize(get_option('selected_categories'));


        $args = array(
            'hide_empty' => 1,
            'order' => get_option('category_order'),
            'exclude' => $product_categories
        );




        $products_num = new WP_Query($args);
        $product_num = $products_num->post_count;


        $product_categories = get_terms('product_cat', $args);
        ?>

        <?php foreach ($product_categories as $cat): ?>

            <div class="qc-tabs-btn qc_theme_four" data-offset="<?php echo get_option('product_number'); ?>"
                 data-feature-only="<?php echo $featured_only; ?>"
                 data-show-sale="<?php echo $show_sale; ?>"
                 data-cat-id="<?php echo $cat->term_id; ?>">
                <?php

                global $wp_query;

                $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_image($thumbnail_id, array(30, 30), "", array("class" => "qc_category_image"));
                if ($image) { ?>

                    <?php echo $image;
                }

                ?>
                <h1 class="selected "><?php echo substr($cat->name, 0, get_option('max_char_per_cat')); ?></h1>
            </div>

            <div class="qc-tabs-contant">
                <div class="qc-tabs-contant-inner">
                    <div class="qc-product-box">
                        <?php

                        $args = array(
                            'post_type' => array('product', 'product_variation'),
                            'post_status' => 'publish',
                            'posts_per_page' => $product_number,
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
                        <ul class="theme-four ">
                            <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                                <?php $product = $wc_pf->get_product(get_the_ID()); ?>
                                <li class=""
                                    style="background-color:<?php echo get_option('container_background_color') ?>">
                                    <div class="qc-product-list">
                                        <?php if ($product->is_on_sale()): ?>
                                            <label for="qc_on_sale"><img
                                                        src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/sale.png"></label>
                                        <?php endif; ?>
                                        <div class="qc-product-details-left"><?php echo get_the_post_thumbnail($product->get_id(), 'shop_catalog') ?></div>
                                        <div class="qc-product-details-right">

                                            <?php if (get_option('product_title') == 1): ?>
                                                <h2>
                                                    <a style="color: <?php echo get_option('product_title_text_color'); ?>;font-size: <?php echo get_option('change_title_text_size'); ?>px;"
                                                       href="<?php echo the_permalink() ?>"><?php echo $product->get_title(); ?></a>
                                                </h2>
                                            <?php endif; ?>
                                            <?php $average = $product->get_average_rating(); ?>

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



                                            <?php if (get_option('display_price') == 1): ?>
                                                <h3 style="font-size: <?php echo get_option('product_content_text_size'); ?>px; color: <?php echo get_option('product_content_text_color'); ?>;"><?php echo $product->get_price_html(); ?></h3>
                                            <?php endif; ?>

                                            <?php if (get_option('add_cart_link') == 1): ?>

                                            <a data-p-price="<?php echo $product->get_price(); ?>"
                                               data-p-id="<?php echo $product->get_id(); ?>"
                                               href="<?php echo $wc_pf->get_product(get_the_ID())->add_to_cart_url(); ?>"
                                               class="qc-cart-btn woo_tab_s_p_add_to_cart"><?php $add_to_cart_text = get_option('change_add_to_cart_button_text');
                                                if (!empty($add_to_cart_text)) {
                                                    echo $add_to_cart_text;
                                                } else {
                                                    _e("Add To Cart");
                                                } ?>


                                                <div class="qc_quantity">
                                                    <input type="text" class="qc_quantity" name="qcld_quantity"
                                                           min="1" max="600" value="1">
                                                </div>


                                            </a></div>
                                    <?php endif; ?>


                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>


                        <!-- Load more -->
                        <?php if ($product_num > get_option('product_number')): ?>
                            <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                                <div class="loader_container"></div>
                                <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                        id="qcld-wootab-more-four"
                                        data-show-sale="<?php echo $show_sale; ?>"
                                        data-cat-id="<?php echo $cat->term_id; ?>"
                                        data-feature-only="<?php echo $featured_only; ?>"
                                        data-offset="<?php echo get_option('product_number'); ?>"><?php $load_more = get_option('change_load_more_text');
                                    if (!empty($load_more)) {
                                        echo $load_more;
                                    } else {
                                        _e('Load More');
                                    } ?>
                                </button>

                            </div>

                        <?php endif; ?>

                        <br>
                    </div>

                </div>


            </div>
        <?php endforeach; ?>
    </div>
</div>


