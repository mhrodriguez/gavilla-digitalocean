<?php defined('ABSPATH') or die("No direct script access!"); ?>
<link rel="stylesheet" type="text/css"
      href="<?php echo QC_WOO_TAB_PLUGIN_URL . 'templates/template-' . $qc_shortcode_parameters['theme'] . "/template.css"; ?>"/>


<style>

    .qc-wootabs-style11 .qc-wootabs-nav a {
        color: <?php echo get_option('product_category_text_font_color');?> !important;
        font-size: <?php echo get_option('product_category_text_font_size');?>px !important;
        background-color: <?php echo get_option('product_category_filter_button_color');?> !important;
    }

    .qc-wootabs-style11 .qc-wootabs-nav a:hover {
        background: <?php echo get_option('product_category_filter_button_color_hover');?> !important;

    }

    .qc-wootabs-style11 .qc-wootabs-nav li.current a {
        background: <?php echo get_option('product_category_button_active_color');?> !important;
    }


</style>


<div class="qc-wootabs-style11">


    <div class="qc-wootabs-main">


        <div class="qc_wootabs_left_section">

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
            <ul class="qc-wootabs-nav">


                <?php if (get_option('show_all') == 1): ?>

                    <li data-tab="all"><a
                                data-show-sale="<?php echo $show_sale; ?>"
                                data-offset="<?php echo get_option('product_number'); ?>"
                                data-feature-only="<?php echo $featured_only; ?>"
                                class="tab-link" data-cat-id="all"
                                href="#">All</a>
                    </li>

                <?php endif; ?>
                <?php foreach ($product_categories as $cat): ?>
                    <li class="tab-link"
                        data-tab="tab-<?php echo $cat->term_id; ?>"><a
                                data-offset="<?php echo get_option('product_number'); ?>"
                                data-show-sale="<?php echo $show_sale; ?>"
                                data-feature-only="<?php echo $featured_only; ?>"
                                data-cat-id="<?php echo $cat->term_id; ?>"
                                href="#"><?php echo substr($cat->name, 0, get_option('max_char_per_cat')); ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
            <!-- / tabs -->

        </div>

        <div class="qc_wootabs_right_section">


            <div class="tab_content">

                <?php if (get_option('show_all') == 1): ?>
                    <div id="all" class="qcwootabs_tabs_item">

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

                        <ul class="qc_theme_eleven">
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


                        <?php if ($product_num > get_option('product_number')): ?>
                            <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                                <div class="loader_container"></div>
                                <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                        id="qcld-wootab-more-eleven-all"
                                        data-theme-name="theme-eleven" data-show-sale="<?php echo $show_sale; ?>"
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
                <?php endif; ?>


                <?php foreach ($product_categories as $cat): ?>

                    <div id="tab-<?php echo $cat->term_id; ?>" class="qcwootabs_tabs_item">

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
                        <ul class="qc_theme_eleven">
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
                        <?php if ($product_num > get_option('product_number')): ?>
                            <div class="qcld-wootab-more-scroll-container" style="text-align:center">
                                <div class="loader_container"></div>
                                <button style="background-color: #3D9CD2 !important; color: white;" type="button"
                                        id="qcld-wootab-more-eleven"
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

                <?php endforeach; ?>


            </div>


        </div>


    </div>
    <!-- / tab -->
</div>
<script>


    // JavaScript Document

    jQuery(document).ready(function ($) {

        (function ($) {
            $('.qc-wootabs-main ul.qc-wootabs-nav').addClass('active').find('> li:eq(0)').addClass('current');

            $('.qc-wootabs-main ul.qc-wootabs-nav li a').click(function (g) {

                var tab = $(this).closest('.qc-wootabs-main'),
                    index = $(this).closest('li').index();

                tab.find('ul.qc-wootabs-nav > li').removeClass('current');
                $(this).closest('li').addClass('current');

                //tab.find('.tab_content').find('div.qcwootabs_tabs_item').not('div.qcwootabs_tabs_item:eq(' + index + ')').slideUp();
                //tab.find('.tab_content').find('div.qcwootabs_tabs_item:eq(' + index + ')').slideDown();

                $("#qcld-wootab-more-eleven-all").attr('data-offset', initial_product_number);
                $("#qcld-wootab-more-eleven").attr('data-offset', initial_product_number);


                $('.qc_theme_eleven').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: inline-block;">');
                var cat_id = $(this).attr('data-cat-id');
                var offset = $(this).attr('data-offset');
                var show_sale = $(this).attr('data-show-sale');
                var feature_only = $(this).attr('data-feature-only');
                var data = {
                    'cat_id': cat_id,
                    'offset': offset,
                    'show_sale': show_sale,
                    'feature_only': feature_only,
                    'action': 'get_products_by_cat_theme_eleven',


                };


                jQuery.post(ajaxurl, data, function (response) {


                    if (response.html == '') {
                        $('.qc_theme_eleven').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                            '</p>');
                    } else {
                        $('.qc_theme_eleven').html(response.html);
                    }


                    $("#qcld-wootab-scroll, #qcld-wootab-more-two").attr('data-offset', response.offset);

                });

                g.preventDefault();
            });


        })(jQuery);

    });

</script>