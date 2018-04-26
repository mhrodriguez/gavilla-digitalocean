<?php defined('ABSPATH') or die("No direct script access!"); ?>
<link rel="stylesheet" type="text/css"
      href="<?php echo QC_WOO_TAB_PLUGIN_URL . 'templates/template-' . $qc_shortcode_parameters['theme'] . "/template.css"; ?>"/>


<?php
$product_per_group = 4;
$product_categories = unserialize(get_option('selected_categories'));
$product_number = get_option('product_number');


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

<div class="qcld_wootab_style10 qc_carousel_demo1" id="currentTheme" data-theme="theme10">
    <div id="mi-slider" class="mi-slider">
        <?php

        foreach ($product_categories as $cat) {
            $cat_id = $cat->term_id;
            $post_per_page = 30;
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


            $product_args = array(
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
                $product_args = array_merge($product_args, array('meta_query' => $show_sale_products_only));
            }


            if ($featured_only == 1) {
                $product_args = array_merge($product_args, array('tax_query' => $show_featured_only));
            }

            $products_num = new WP_Query($product_args);
            $product_num = $products_num->post_count;

            $product_query = new WP_Query($product_args);
            $wc_pf = new WC_Product_Factory();
            $prodGroup = ceil($product_num / $product_per_group);
            $extraLinkCount = $prodGroup - 1;

            $i = 0;
            $c = 1;

            ?>
            <ul class="qc_carousel_list qcld_wooTabCarousel" id="qcld_wooTabCarousel_<?php echo $cat_id . '_' . $c; ?>">
                <?php
                if ($extraLinkCount >= 1) {
                    echo '<li href="#" class="wooTabCatMore wooTabCatMoreNext callAjax" data-offset="4" cat_id="' . $cat_id . '"></li>';
                }

                if ($product_num < 1) {
                    echo '<li class="noProd">' . get_option('no_product_found_text') . '</li>';
                }

                while ($product_query->have_posts()) {

                    $product_query->the_post();
                    $product = $wc_pf->get_product(get_the_ID());
                    $product_stock_status = $product->get_stock_status();

                    if ($i >= ($product_per_group)) {
                        $c++;
                        echo '</ul><ul class="qc_carousel_list qcld_wooTabCarousel hasMoreGroups" id="qcld_wooTabCarousel_' . $cat_id . '_' . $c . '">';
                        echo '<li href="#" class="wooTabCatMore wooTabCatMorePrev" cat_id="' . $cat_id . '"></li>';
                        if ($c <= $extraLinkCount) {
                            echo '<li href="#" class="wooTabCatMore wooTabCatMoreNext" cat_id="' . $cat_id . '"></li>';
                        }

                        $i = 0;
                    }
                    $i++;
                    ?>
                    <li>
                        <?php if ($product_stock_status != 'outofstock'){ ?>
                            <div class="qc_pro_details">
                                <ul>
                                    <?php if (get_option('product_title') == 1): ?>

                                        <li><a href="<?php echo $product->get_permalink() ?>"><i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </li>


                                    <?php endif; ?>
                                    <div class="qc_quantity qc_qat_style_three">
                                        <?php if (get_option('add_quantity_select') == 1): ?>

                                            <input class="qc_minus" type="button" value="-">
                                            <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                                   value="1">
                                            <input class="qc_plus" type="button" value="+">
                                        <?php endif; ?>

                                        <?php if (get_option('add_cart_link') == 1): ?>
                                            <a data-p-price="<?php echo $product->get_price(); ?>"
                                               data-p-id="<?php echo $product->get_id(); ?>"
                                               class="woo_tab_s_p_add_to_cart"
                                               href="<?php echo $wc_pf->get_product(get_the_ID())->add_to_cart_url(); ?>"><i
                                                        class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                        <?php endif; ?>


                                    </div>
                                </ul>
                            </div>
                        <?php }else {?>
                            <div class="qc_strock_out_ex_box qc_pro_details">
                                <ul>
                                    <?php if (get_option('product_title') == 1): ?>

                                        <li><a href="<?php echo $product->get_permalink() ?>"><i class="fa fa-link"
                                                                                                 aria-hidden="true"></i></a>
                                        </li>


                                    <?php endif; ?>
                                    <div class="qc_out_of_stock_container qc_quantity qc_qat_style_three">


                                        <?php if (get_option('add_cart_link') == 1): ?>
                                            <a class="product_out_of_stock"
                                               data-p-price="<?php echo $product->get_price(); ?>"
                                               data-p-id="<?php echo $product->get_id(); ?>"
                                               href="#"><i
                                                        class="fa"
                                                        aria-hidden="true"></i></a>
                                        <?php endif; ?>


                                    </div>
                                </ul>
                            </div>
                        <?php } ?>
                        <?php echo $product->get_image('shop_catalog'); ?>
                        <?php if (get_option('product_title') == 1): ?>
                            <h4 style="color: <?php if (get_option('product_title_text_color') != '') echo get_option('product_title_text_color') . ';'; ?> font-size: <?php if (get_option('change_title_text_size') != '') echo get_option('change_title_text_size') . 'px;'; ?>"><?php echo $product->get_title(); ?></h4>
                        <?php endif; ?>
                        <?php if (get_option('display_price') == 1): ?>
                            <h5 style="color: <?php if (get_option('product_title_text_color') != '') echo get_option('product_title_text_color') . ';'; ?> font-size: <?php if (get_option('change_title_text_size') != '') echo get_option('change_title_text_size') . 'px;'; ?>"><?php echo $product->get_price_html(); ?></h5>
                        <?php endif; ?>
                        <?php if ($product->is_on_sale()): ?>
                            <label for="qc_on_sale"><img src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/sale.png"></label>
                        <?php endif; ?>
                    </li>
                <?php } ?>
            </ul>
        <?php } //end each category ?>
        <nav class="wooTabCarasolLinks">
            <?php
            $i = 0;
            $c = 1;
            foreach ($product_categories as $cat) {
                $cat_id = $cat->term_id;
                ?>
                <a href="#" class="wooTabCatLinks wooTabRealCat"
                   id="qcld_wooTabCarouselCat_<?php echo $cat_id . '_' . $c; ?>"
                   cat_id="<?php echo $cat_id; ?>"><?php echo substr($cat->name, 0, get_option('max_char_per_cat')); ?> </a>
                <?php
                $post_per_page = 30;
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

                $product_args = array(
                    'post_type' => 'product',
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

                if ($show_sale == 1) {
                    $product_args = array_merge($product_args, array('meta_query' => $show_sale_products_only));
                }


                if ($featured_only == 1) {
                    $product_args = array_merge($product_args, array('tax_query' => $show_featured_only));
                }

                $products_num = new WP_Query($product_args);
                $product_num = $products_num->post_count;
                $prodGroup = ceil($product_num / $product_per_group);
                $extraLinkCount = $prodGroup - 1;
                $l = 1;
                while ($l <= $extraLinkCount) {
                    $l++;
                    echo '<a href="#" class="wooTabCatLinks wooTabFakeCat" id="qcld_wooTabCarouselCat_' . $cat_id . '_' . $l . '" cat_id="' . $cat_id . '">' . substr($cat->name, 0, get_option('max_char_per_cat')) . ' ' . ($l) . '</a>';

                }
            } ?>
        </nav>
    </div>
    <div class="loader" style="display:none"></div>
</div>
<script>
    jQuery(document).ready(function ($) {
        var device_width = jQuery(window).width();
        jQuery('#mi-slider').catslider();

        if (device_width <= 680) {
            jQuery('.wooTabCarasolLinks').slick({
                slide: 'a.wooTabCatLinks',
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2
            });
        } else {
            jQuery('.wooTabCarasolLinks').slick({
                slide: 'a.wooTabCatLinks',
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4
            });
        }

        setTimeout(function () {
            jQuery('.wooTabFakeCat').removeClass('wooTabCatLinks slick-slide slick-active');
            jQuery('.wooTabFakeCat').removeAttr('data-slick-index aria-hidden role aria-describedby');

            var fakeNumItems = jQuery('.wooTabFakeCat').length;
            var eachFakeItemWidth = jQuery('.slick-slide').css('width');
            eachFakeItemWidth = eachFakeItemWidth.replace('px', '');
            var allFakeItemWidth = parseInt(eachFakeItemWidth * fakeNumItems);
            var slickTrackWidth = jQuery('.slick-track').width();
            var slickTrackWidthNew = parseInt(slickTrackWidth - allFakeItemWidth);
            jQuery('.slick-track').width(slickTrackWidthNew);
            //jQuery('.wooTabFakeCat').remove();
            //var slickTrackTransform = jQuery('.slick-track').attr('style');
            //console.log(eachFakeItemWidth);
        }, 1000);


        jQuery('.qcld_wootab_style10 .slick-arrow').click(function () {

            var fullSlideWidth = jQuery('.qcld_wootab_style10 .slick-track').width();
            var realItemsNum = jQuery('.wooTabRealCat').length;
            if (device_width <= 680) {
                var groupNum = parseInt(realItemsNum / 4);
            } else {
                var groupNum = parseInt(realItemsNum / 4);
            }
            var perGroupWidth = parseInt(fullSlideWidth / groupNum);

            var targetMove = perGroupWidth * (groupNum - 1);
            var slideMoved = jQuery('.qcld_wootab_style10 .slick-track').css('transform');
            slideMoved = slideMoved.split(',');
            slideMoved = slideMoved[4];
            slideMoved = parseInt(slideMoved.replace('-', ''));

            if (jQuery(this).hasClass('slick-prev')) {
                slideMoved = parseInt(slideMoved - perGroupWidth);
            } else {
                slideMoved = parseInt(slideMoved + perGroupWidth);
            }

            if (slideMoved == targetMove) {
                jQuery('.qcld_wootab_style10 .slick-next').addClass('slick-disabled');
            } else {
                jQuery('.qcld_wootab_style10 .slick-next').removeClass('slick-disabled');
            }

            //console.log('slickTrackTransform='+slideMoved+'targetMove'+targetMove);
        })


        jQuery('.wooTabCatMorePrev').click(function () {
            var iAm = jQuery(this);
            var offset = jQuery(this).attr('data-offset');
            var theme_id = jQuery("#currentTheme").attr('data-theme');
            var cat_id = jQuery(this).attr('cat_id');
            jQuery('.loader').addClass('active');
            jQuery("#qcld_wooTabCarouselCat_" + cat_id + "_1").addClass("mi-selected-main");

            if (iAm.hasClass('callAjax')) {
                var data = {
                    'action': 'get_products_by_cat_theme_ten',
                    'cat_id': cat_id,
                    'offset': offset,
                    'theme_id': theme_id
                };
                jQuery.post(ajaxurl, data, function (response) {
                    //iAm.parent().after(response.html)
                    setTimeout(function () {
                        jQuery('.mi-selected').prev('a').trigger('click');
                        jQuery('.loader').removeClass('active');
                    }, 2000);
                    iAm.removeClass('callAjax');
                })
            } else {
                jQuery('.loader').removeClass('active');
                jQuery('.mi-selected').prev('a').trigger('click');

            }
        })


        jQuery('.wooTabCatMoreNext').click(function () {
            var iAm = jQuery(this);
            var offset = jQuery(this).attr('data-offset');
            var theme_id = jQuery("#currentTheme").attr('data-theme');
            var cat_id = jQuery(this).attr('cat_id');
            jQuery('.loader').addClass('active');

            jQuery("#qcld_wooTabCarouselCat_" + cat_id + "_1").addClass("mi-selected-main");

            if (iAm.hasClass('callAjax')) {
                var data = {
                    'action': 'get_products_by_cat_theme_ten',
                    'cat_id': cat_id,
                    'offset': offset,
                    'theme_id': theme_id
                };
                jQuery.post(ajaxurl, data, function (response) {
                    //iAm.parent().after(response.html)
                    setTimeout(function () {
                        jQuery('.mi-selected').next('a').trigger('click');
                        jQuery('.loader').removeClass('active');
                    }, 2000);
                    iAm.removeClass('callAjax');
                })
            } else {
                jQuery('.loader').removeClass('active');
                jQuery('.mi-selected').next('a').trigger('click');
            }

            return false;
        })


        jQuery('.wooTabCatLinks').click(function () {
            if (jQuery(this).hasClass('wooTabRealCat')) {
                jQuery(".wooTabCatLinks").removeClass("mi-selected-main");
            }
            var myId = jQuery(this).attr('id');
            var myTarget = myId.replace('Cat_', '_');
            jQuery('#' + myTarget).addClass('mi-current');
            return false;
        })


    })
</script>