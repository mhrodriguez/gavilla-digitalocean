jQuery(document).ready(function ($) {



//$( '#mi-slider' ).catslider();

    $(document).on('click', '.qc_plus', function (e) {
        $input = $(this).prev('input.qc_product_quantity');
        var val = parseInt($input.val());
        $input.val(val + 1).change();
    });

    $(document).on('click', '.qc_minus', function (e) {
        $input = $(this).next('input.qc_product_quantity');
        var val = parseInt($input.val());
        if (val > 0) {
            $input.val(val - 1).change();
        }
    });


    var device_width = ($(window).width());

    //$('.qc-tabs-container .qc-tabs-contant:first').addClass('open');


    $('.qc-tabs-container .qc-tabs-contant:first').on('click', function () {
        $(this).addClass('open').siblings().removeClass('active');
    });

    $('.qc-tabs-contant:first').addClass('open-container');
    $('.wotabs_style2 li:first').addClass('current');
    $('ul.tab-links li:first').addClass('active');
    $('ul.qctabs_10 li:first').addClass('current');
    $('.tabs-widget-light li:first').addClass('current');
    //$('.container .qc_tab_css_bg .tab-content:eq(0)').addClass('current');
    $('.qc_tab_css_bg .tab-content:first').addClass('current');
    $('.tab-content .tab:first').addClass('active');

    /**
     * Default Template
     */


    if (device_width <= 480) {
        $('.slick-class').slick({
            slide: 'li',
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1
        });
    } else {
        $('.slick-class').slick({
            slide: 'li',
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1
        });
    }


    jQuery("#wtcpl_tabs a").click(function (event) {

        event.preventDefault();
        var my_id = jQuery(this).attr("id");
        jQuery("#wtcpl_tabs a").removeClass("active");
        jQuery(this).addClass("active");


        jQuery("#wtcpl_tabs_container .each_cat").fadeOut(0);
        jQuery("#wtcpl_tabs_container .each_cat").removeClass("active");

        jQuery("#product-" + my_id).fadeIn();
        jQuery("#product-" + my_id).addClass("active");

    });


    /**
     * Template One
     */

    $(document).on('click', 'ul.tabs-one li', function () {

        $("#qcld-wootab-more-one-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-one").attr('data-offset', initial_product_number);

        $('.theme-one').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: inline-block;">');
        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');
        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_two',


        };

        jQuery.post(ajaxurl, data, function (response) {


            if (response.html == '') {
                $('.theme-one').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');
            } else {
                $('.theme-one').html(response.html);
            }


            $("#qcld-wootab-scroll, #qcld-wootab-more-two").attr('data-offset', response.offset);

        });


        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    /**
     * Template Two
     */

    $(document).on('click', 'ul.tabs-two li', function () {
        $("#qcld-wootab-more-two-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-two").attr('data-offset', initial_product_number);


        $('.theme-two').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: inline-block;">');
        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');
        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,

            'action': 'get_products_by_cat_theme_two',


        };

        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-two').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-two').html(response.html);
            }


            $("#qcld-wootab-scroll, #qcld-wootab-more-two").attr('data-offset', response.offset);

        });


        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    /**
     * Template Three
     */

    $(document).on('click', 'ul.wotabs_style2 li', function () {


        $("#qcld-wootab-more-three-all").css({
            'display': 'block',
            'margin': '0 auto'
        });


        // reset the data attribute

        $("#qcld-wootab-more-three-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-three").attr('data-offset', initial_product_number);


        //$('.wootabs').html('<img style="padding:200px;margin: 0 auto; display: block;" src="' + image_loader + '">');
        //$('.wootabs').html('<div class="loader" style="padding:200px;margin: 0 auto; display: block;">');
        $('.wootabs').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');

        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var feature_only = $(this).attr('data-feature-only');
        var show_sale = $(this).attr('data-show-sale');


        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_three',


        };

        jQuery.post(ajaxurl, data, function (response) {

            //console.log(JSON.stringify(response));

            if (response.html == '') {
                $('.wootabs').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.wootabs').html(response.html);
            }


            $("#qcld-wootab-scroll, #qcld-wootab-more-two").attr('data-offset', response.offset);

        });


        var tab_id = $(this).attr('data-tab');


        $('ul.wotabs_style2 li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    /**
     * Template Four
     *
     */

    var animTime = 300,
        clickPolice = false;

    $(document).on('click', '.qc-tabs-btn', function () {

        $("#qcld-wootab-more-four-all").css({
            'display': 'block',
            'margin': '0 auto'
        });


        $("#qcld-wootab-more-four-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-four").attr('data-offset', initial_product_number);


        $(".qc-tabs-btn").removeClass("qcld_theme_four_active");
        $(this).addClass('qcld_theme_four_active');


        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');
        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_four',


        };


        var currIndex = $(this).index('.qc-tabs-style8 .qc-tabs-btn');
        // var targetHeight = $('.qc-tabs-style8 .qc-tabs-contant-inner .qc-product-box').eq(currIndex).outerHeight();


        setTimeout(function () {
            $('.theme-four').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');
            $('.qc-tabs-style8 .qc-tabs-btn h1').removeClass('selected');
            $(this).find('h1').addClass('selected');

            var product_number;

            jQuery.post(ajaxurl, data, function (response) {
                //console.log(JSON.stringify(response));

                if (response.html == '') {
                    $('.theme-four').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                        '</p>');

                } else {
                    $('.theme-four').html(response.html);
                }


                $("#qcld-wootab-more-four").attr('data-offset', response.offset);
                //var targetHeight = $(this).next('qc-tabs-contant').find('.qc-tabs-contant-inner').height();
                product_number = response.product_number;

            }).done(function () {
                var producthight = $(".qc-product-box ul li").outerHeight();

                var testHight;

                if (product_number % 2 == 0) {
                    testHight = producthight * (product_number / 2);
                } else {
                    testHight = producthight * (product_number / 2);
                }


                //console.log(testHight);
                $('.qc-tabs-contant').eq(currIndex).css({'height': testHight + 'px'});
                $('.qc-tabs-contant').eq(currIndex).css({'height': '3%'});


                $('html, body').animate({
                    scrollTop: $(".qcld_theme_four_active").offset().top - 110
                }, 50);

            });
            $('.qc-tabs-style8 .qc-tabs-contant').stop().animate({height: 0}, animTime);
            clickPolice = false;
            var targetHeight = $('.qc-tabs-style8 .qc-tabs-contant-inner .qc-product-box').eq(currIndex).outerHeight();
            $('.qc-tabs-style8 .qc-tabs-contant').eq(currIndex).stop().animate({height: targetHeight}, animTime);

        }, animTime);


    });


    /**
     * Template Five
     */


    $(document).on('click', '.qc-tabs-style10 ul.tabs-five li', function () {


        $("#qcld-wootab-more-five-all").css({
            'display': 'block',
            'margin': '0 auto'
        });


        $("#qcld-wootab-more-five-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-five").attr('data-offset', initial_product_number);


        //$('.theme-five').html('<img style="padding:200px;margin: 0 auto; display: block;" src="' + image_loader + '">');
        // $('.theme-five').html('<div class="loader" style="padding:200px;margin: 0 auto; display: block;">');
        $('.theme-five').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');
        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');

        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'action': 'get_products_by_cat_theme_five',


        };

        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-five').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-five').html(response.html);
            }


            $("#qcld-wootab-more-five").attr('data-offset', response.offset);

        });

        var tab_id = $(this).attr('data-tab');

        $('.qc-tabs-style10 ul.tabs-five li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');


    });


    /**
     * Template Six
     */
    $(document).on('click', '.qc-tabs-style9  .tab-links a', function (e) {

        $("#qcld-wootab-more-six-all").css({
            'display': 'block',
            'margin': '0 auto'
        });

        $("#qcld-wootab-more-six-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-six").attr('data-offset', initial_product_number);

        e.preventDefault();
        $('.theme-six').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');

        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');
        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_six',


        };

        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-six').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-six').html(response.html);
            }


            $("#qcld-wootab-more-six").attr('data-offset', response.offset);

        });
        var currentAttrValue = $(this).attr('href');

        // Show/Hide Tabs
        $('.qc-tabs-style9 .tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);

        // Change/remove current tab to active


        $(this).parent('li').addClass('active').siblings().removeClass('active');
        var div_id = $(this).parent('li').attr('href').substr(1);
        $("#" + div_id).addClass('active').siblings().removeClass('active');
        //console.log(div_id);

        e.preventDefault();
    });

    /**
     * Template Eight
     */


    $(document).on('click', 'ul.theme-eight-ul li', function () {


        $("#qcld-wootab-more-eight-all").css({
            'display': 'inline',
            'margin': '0 auto'
        });


        $("#qcld-wootab-more-eight-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-eight").attr('data-offset', initial_product_number);

        var currentAttrValue = $(this).attr('href');
        var tab_id = $(this).attr('data-tab');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');

        $('ul.theme-eight-ul li').removeClass('current');
        $('.tab-content').removeClass('current');

        //$('.theme-eight').html('<img style="padding:200px;margin: 0 auto; display: block;" src="' + image_loader + '">');
        //$('.theme-eight').html('<div class="loader" style="padding:200px;margin: 0 auto; display: block;">');
        $('.theme-eight').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');

        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');

        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_eight',


        };

        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-eight').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-eight').html(response.html);
            }


            $("#qcld-wootab-more-eight").attr('data-offset', response.offset);

        });


        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    /**
     * Template Seven
     */


    $('.qc_tabs_12 ul.tabs12 li').click(function () {

        $("#qcld-wootab-more-seven-all").css({
            'display': 'block',
            'margin': '0 auto'
        });

        $("#qcld-wootab-more-seven-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-seven").attr('data-offset', initial_product_number);

        //$('.theme-seven').html('<img style="padding:200px;margin: 0 auto; display: block;" src="' + image_loader + '">');
        // $('.theme-seven').html('<div class="loader" style="padding:200px;margin: 0 auto; display: block;">');

        $('.theme-seven').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');
        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');

        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_seven',


        };


        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-seven').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-seven').html(response.html);
            }


            $("#qcld-wootab-more-eight").attr('data-offset', response.offset);

        });

        var tab_id = $(this).attr('data-tab');

        $('.qc_tabs_12 ul.tabs12 li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    /**
     * Template Three
     */


    $(document).on("click", "#qcld-wootab-more", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more(currentDom, actionType);
    });


    /*************************************************
     *Ajax load more & infinite scroll products start for theme two*
     ************************************************/
    //Load More
    $(document).on("click", "#qcld-wootab-more-two", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');

        var actionType = "more";
        qcld_wootab_load_more_template_two(currentDom, actionType);
    });


    $(document).on("click", "#qcld-wootab-more-one", function () {


        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_one(currentDom, actionType);
    });
    $(document).on("click", "#qcld-wootab-more-eleven", function () {


        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_eleven(currentDom, actionType);
    });


    $(document).on("click", "#qcld-wootab-more-two-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-one-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-eleven-all", function () {

        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-nine-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-three-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });

    $(document).on("click", "#qcld-wootab-more-five-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-six-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-seven-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-eight-all", function () {
        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });
    $(document).on("click", "#qcld-wootab-more-four-all", function () {
        $("#qcld-wootab-more-four-all").css({
            'display': 'block',
            'margin': '0 auto'
        });


        var currentDom = $(this);
        var actionType = "more";
        currentDom.html('<img src="' + image_loader + '"/>');
        qcld_wootab_load_more_for_all(currentDom, actionType);

    });


    function qcld_wootab_load_more_for_all(currentDom, actionType) {
        var existingConH = $('.theme-four').outerHeight();
        var theme_id = currentDom.attr('data-theme-name');
        var offset = currentDom.attr('data-offset');
        var show_sale = currentDom.attr('data-show-sale');
        var feature_only = currentDom.attr('data-feature-only');

        var data = {
            'action': 'woo_load_more_all_tab',
            'offset': offset,
            'theme_id': theme_id,
            'show_sale': show_sale,
            'feature_only': feature_only
        };
        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {

                currentDom.html('Load More');
                if (theme_id == 'theme-nine') {
                    $('.theme-nine').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-one') {
                    $('.theme-one').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-eleven') {
                    $('.qc_theme_eleven').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-two') {
                    $('.theme-one').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-three') {
                    $('.wootabs').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-four') {
                    var producthight = $(".qc-product-box ul li").outerHeight();
                    //alert(existingConH)
                    var testHight = parseInt(producthight * (response.product_num / 2) + existingConH);


                    $(".qc-tabs-contant .open-container .open").css({
                        'height': 'auto'
                    });


                    console.log('Final : ' + testHight);
                    //console.log($('.qc-tabs-contant').height());
                    //$('.qc-tabs-container .open').css({'height': testHight + 'px'});
                    //$('.qc-tabs-contant').eq(currIndex).css({'height': testHight + 'px'});

                    $('.theme-four').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-five') {
                    $('.theme-five').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-six') {
                    $('.theme-six').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-seven') {
                    $('.theme-seven').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-eight') {
                    $('.theme-eight').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                } else if (theme_id == 'theme-nine') {
                    $('.theme-nine').append(response.html);
                    if (response.offset == -1) {
                        if (actionType == 'more') {
                            currentDom.css({'display': 'none'});
                        } else {
                            currentDom.css({'display': 'none'});
                            $(window).unbind('scroll');
                        }
                        // $(window).unbind('scroll');
                    } else {
                        if (actionType == 'more') {
                            currentDom.attr('data-offset', response.offset);
                        } else {
                            currentDom.attr('data-offset', response.offset);
                            // currentDom.css({'display': 'none'});
                        }
                    }
                }


                //alert(response.offset);
            });
        }, 1000);

    }


    function qcld_wootab_load_more_template_two(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_two',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-two').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-two").html("Load More");
            });
        }, 1000);
    }

    function qcld_wootab_load_more_template_one(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_one',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-one').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-one").html("Load More");
            });
        }, 1000);
    }


    function qcld_wootab_load_more_template_eleven(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_one',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.qc_theme_eleven').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-eleven").html("Load More");
            });
        }, 1000);
    }


    /*************************************************
     *Ajax load more & infinite scroll products start for theme four*
     ************************************************/
    //Load More
    $(document).on("click", "#qcld-wootab-more-four", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_four(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_four(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        //$('#qcld-wootab-more-four').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_four',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-four').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-four").html('Load More');
            });
        }, 1000);
    }


    /*************************************************
     *Ajax load more & infinite scroll products start for theme five*
     ************************************************/
    //Load More
    $(document).on("click", "#qcld-wootab-more-five", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_five(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_five(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_five',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-five').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-five").html('Load More');
            });
        }, 1000);
    }


    function qcld_wootab_load_more(currentDom, actionType) {

        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');
        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_three',
            'offset': offset,
            'product_cat_id': product_category_id
        };
        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {


                $('#wootabs').html('');
                //Showing more product by appending to the list.

                $('.wootabs').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                currentDom.html('Load More');
            });
        }, 1000);
    }


    /*************************************************
     *Ajax load more & infinite scroll products start for theme six*
     ************************************************/
    //Load More
    $(document).on("click", "#qcld-wootab-more-six", function () {

        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_six(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_six(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_six',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-six').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-six").html('Load More');
            });
        }, 1000);
    }


    /*************************************************
     *Ajax load more & infinite scroll products start for theme six*
     ************************************************/
    //Load More
    $(document).on("click", "#qcld-wootab-more-eight", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_eight(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_eight(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_eight',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-eight').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-eight").html('Load More');
            });
        }, 1000);
    }


    //Load More
    $(document).on("click", "#qcld-wootab-more-seven", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_seven(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_seven(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_seven',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-seven').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-seven").html('Load More');
            });
        }, 1000);
    }


    /*************************************************
     * Ajax load more & infinite scroll products end *
     ************************************************/
























    // Ajax Product Add To Cart


    $(document).delegate(".woo_tab_s_p_add_to_cart", "click", function (event) {

        event.preventDefault();
        // var myId = $(this).attr('id');

        //Change button text
        var currentDom = $(this);
        //currentDom.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        var pId = $(this).attr('data-p-id');
        var quantity = $(this).parent().find('input.qc_product_quantity').val();

        //alert(quantity);
        //return false;


        var pPrice = $(this).attr('data-p-price');
        var cart_page_link = cart_page_url + '/cart';

        var data = {
            'action': 'woo_sp_add_to_cart',
            'p_id': pId,
            'p_price': pPrice,
            'quantity': quantity
        };

        jQuery.post(ajaxurl, data, function (response) {
            //Change button text
            //currentDom.html('<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>');
            if (response == "simple") {


                swal({
                    title: title_text,
                    type: 'success',
                    text: success_message,
                    timer: 2000
                }).then(
                    function () {
                    },
                    // handling the promise rejection
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            //console.log('Promise rejected')
                        }
                    }
                );

                if (cart_option != 'ajax') {
                    window.location.href = cart_page_link;
                }


            } else {
                swal(
                    'Something went wrong!',
                    'Please contact the webmaster.',
                    'error'
                )
            }
        });
    });


    $(document).on("click", "#qcld-wootab-more-nine", function () {
        var currentDom = $(this);
        currentDom.html('<i class="fa fa-cog fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>');
        var actionType = "more";
        qcld_wootab_load_more_template_nine(currentDom, actionType);
    });


    function qcld_wootab_load_more_template_nine(currentDom, actionType) {


        //currentDom.html('<h3>Loading..</h3>');
        $('#load-more-pre-loader').html('<img src="' + image_loader + '"/>');

        var offset = currentDom.attr('data-offset');
        var product_category_id = currentDom.attr('data-cat-id');
        var data = {
            'action': 'woo_load_more_theme_nine',
            'offset': offset,
            'product_cat_id': product_category_id
        };

        setTimeout(function () {
            jQuery.post(ajaxurl, data, function (response) {



                //Showing more product by appending to the list.

                $('.theme-nine').append(response.html);
                if (response.offset == -1) {
                    if (actionType == 'more') {
                        currentDom.css({'display': 'none'});
                    } else {
                        currentDom.css({'display': 'none'});
                        $(window).unbind('scroll');
                    }
                    // $(window).unbind('scroll');
                } else {
                    if (actionType == 'more') {
                        currentDom.attr('data-offset', response.offset);
                    } else {
                        currentDom.attr('data-offset', response.offset);
                        // currentDom.css({'display': 'none'});
                    }
                }
                $("#qcld-wootab-more-nine").html("Load More");
            });
        }, 1000);
    }


    $('ul.qctabs_10 li').click(function () {


        $("#qcld-wootab-more-nine-all").css({
            'display': 'block',
            'margin': '0 auto'
        });


        $("#qcld-wootab-more-nine-all").attr('data-offset', initial_product_number);
        $("#qcld-wootab-more-nine").attr('data-offset', initial_product_number);

        //$('.theme-nine').html('<img style="padding:200px;margin: 0 auto; display: block;" src="' + image_loader + '">');
        //$('.theme-nine').html('<div class="loader" style="padding:200px;margin: 0 auto; display: block;">');
        $('.theme-nine').html('<div class="loader" style="width:50px; padding: 0 50px 0 0; margin: 0 auto; display: block;">');
        var cat_id = $(this).attr('data-cat-id');
        var offset = $(this).attr('data-offset');
        var show_sale = $(this).attr('data-show-sale');
        var feature_only = $(this).attr('data-feature-only');
        var data = {
            'cat_id': cat_id,
            'offset': offset,
            'show_sale': show_sale,
            'feature_only': feature_only,
            'action': 'get_products_by_cat_theme_nine',


        };


        jQuery.post(ajaxurl, data, function (response) {

            if (response.html == '') {
                $('.theme-nine').html('<p style=" text-align:center; color: #F57E80; font-weight: bold; padding: 0 0 0 0; margin: 0 auto;">' + product_not_found_text +
                    '</p>');

            } else {
                $('.theme-nine').html(response.html);
            }


            $("#qcld-wootab-more-nine").attr('data-offset', response.offset);

        });

        var tab_id = $(this).attr('data-tab');

        $('ul.qctabs_10 li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
    });


    // jQuery(document).ready(function(){
    //jQuery('p.scroll-content').scrollbar();
    //});


});



