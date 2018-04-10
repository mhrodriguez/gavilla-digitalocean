<?php
/*
Plugin Name: Woo Tabbed Category Product Listing - Pro
Plugin URI: https://www.quantumcloud.com/
Description: WooCommerce addon to display Category based Product Listing in tab, accordion or carousel format on any page with a short code.
Author: QuantumCloud
Author URI: https://www.quantumcloud.com/
Version: 2.4.0
License: GPL2
*/


if (!defined('WPINC')) {
    die;
}
define('WOO_PRODUCT_TAB_VERSION', '2.2.1');
define('QC_WOO_TAB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('QC_WOO_TAB_IMAGE_URL', QC_WOO_TAB_PLUGIN_URL . "/images");
define('QC_WOO_TEMPLATE_PATH', QC_WOO_TAB_PLUGIN_URL . "templates");
define('QC_WOO_TAB_DIR', dirname(__FILE__));
define('QC_WOO_TAB_TEMPLATE_DIR', QC_WOO_TAB_DIR . "/templates");


add_action('wp_head', 'qcld_woo_tab_ajaxurl');
function qcld_woo_tab_ajaxurl()
{


    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
           var success_message = "' . get_option('success_alert_message') . '";
           var cart_option = "' . get_option('qc_add_to_cart_type') . '";
           var cart_page_url = "' . site_url() . '";
           var title_text = "' . get_option('title_text') . '";
           var add_to_cart_text = "' . get_option('change_add_to_cart_button_text') . '";
           
           var product_not_found_text = "' . get_option('no_product_found_text') . '";
           var initial_product_number = "' . get_option('product_number') . '";
           
           var image_loader = "' . QC_WOO_TAB_IMAGE_URL . '/product-loader.gif";
           var currency_symbol = "' . get_woocommerce_currency_symbol() . '" ;
           
        </script>';
}


Class Woo_Tab_Product_Category_List
{


    private $id = 'woo-tab';
    private static $instance;

    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
            self::$instance->init();
        }

    }


    private function __construct()
    {

    }


    public function general_includes()
    {

        if (!class_exists('WooCommerce') || version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) {
            add_action('admin_notices', array($this, 'woocommerce_inactive_notice'));
            return;
        } else {
            include_once 'includes/widgets/class-wc-widget-product-categories2.php';
        }


    }


    public function register_widgets()
    {
        if (!class_exists('WooCommerce') || version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) {
            add_action('admin_notices', array($this, 'woocommerce_inactive_notice'));
            return;
        } else {
            register_widget('WC_Widget_Product_Categories2');
        }


    }


    public function init()
    {
        //error_reporting(E_ALL ^ E_NOTICE);
        $this->general_includes();
        add_action('widgets_init', array($this, 'register_widgets'));

        add_action('admin_menu', array($this, 'admin_menu'));

        // Check if WooCommerce is active, and is required WooCommerce version.
        if (!class_exists('WooCommerce') || version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) {
            add_action('admin_notices', array($this, 'woocommerce_inactive_notice'));
            return;
        }


        if ((!empty($_GET["page"])) && ($_GET["page"] == "woo-tab")) {

            add_action('admin_init', array($this, 'woo_tab_save_options'));
        }


    }


    public function admin_page()
    {
        $action = 'admin.php?page=woo-tab'; ?>

        <div class="wrap">
            <h1>Woo Tab Pro Settings</h1>
        </div>
        <form action="<?php echo esc_attr($action); ?>" method="POST" enctype="multipart/form-data">


            <div class="qc_togglebox">
                <input id="toggle6" type="radio" name="toggle"/>
                <label for="toggle6">USAGE</label>
                <section id="content6" class="wo_tabs_inner wo_tabs_inner_css">


                    <p>Use the shortcode <strong>[wtcpl-product-cat]</strong> inside any WordPress post or page to show
                        your products.</p>

                    <p>Optionally you can pass four parameters to it. They are:</p>

                    <ul>
                        <li>1. Template to use</li>
                        <li>2. Show only products that are on Sale</li>
                        <li>3. Show only products that are Featured</li>
                        <li>4. A list of category ids to display and order the filter buttons</li>
                    </ul>

                    Example:
                    <ul>
                        <li>[wtcpl-product-cat theme="two"]</li>
                        <li>[wtcpl-product-cat theme="two" sale-only=1]</li>
                        <li>[wtcpl-product-cat theme="two" featured-only=1]</li>
                        <li>[wtcpl-product-cat theme='five' category-ids='78,102,39,98']</li>
                    </ul>

                    <strong> When passing any optional parameter, you must specify theme name as the fist shortcode
                        parameter.</strong>

                    <p>There are 10 templates and you can pass them as theme="three", theme="four" etc.</p>

                    <br/>
                    <br/>
                </section>
                <input id="toggle1" type="radio" name="toggle"/>
                <label for="toggle1">General Settings</label>
                <section id="content1" class="wo_tabs_inner">

                    <!--                    <p>Upload Custom ribbon for sale products.</p>-->
                    <!---->
                    <!--                    --><?php
                    //                    if (get_option('woo_tab_custom_icon_path') != "") {
                    //                        $woo_tab_custom_icon_path = get_option('woo_tab_custom_icon_path');
                    //                    } else {
                    //                        $woo_tab_custom_icon_path = QC_WOO_TAB_IMAGE_URL . 'stock_out_icon.png';
                    //                    }
                    //
                    ?>
                    <!--                    <img id="woo_tab_custom_icon_src" src="-->
                    <?php //echo $woo_tab_custom_icon_path;
                    ?><!--" alt="">-->
                    <!---->
                    <!---->
                    <!--                    <tr>-->
                    <!--                        <td>-->
                    <!--                            <p class="qc-opt-title-font"> Upload custom sale ribbon </p>-->
                    <!--                            <div class="col-xs-12">-->
                    <!--                                <div class="cxsc-settings-blocks">-->
                    <!--                                    <input type="hidden" name="woo_tab_custom_icon_path"-->
                    <!--                                           id="woo_tab_custom_icon_path"-->
                    <!--                                           value="--><?php //echo $woo_tab_custom_icon_path;
                    ?><!--"/>-->
                    <!--                                    <button type="button" class="woo_tab_custom_icon_button button">Upload Ribbon-->
                    <!--                                    </button>-->
                    <!--                                </div>-->
                    <!--                            </div>-->
                    <!--                        </td>-->
                    <!--                    </tr>-->


                    <p>Select categories which you want to exclude</p>
                    <?php $product_categories = get_terms('product_cat'); ?>
                    <?php $selected_categories = unserialize(get_option('selected_categories')); ?>
                    <select name="selected_categories[]" id="categories" multiple="multiple">
                        <option value="">None</option>
                        <?php if ($selected_categories != ''): ?>
                            <?php foreach ($selected_categories as $category) {
                                if ($term = get_term_by('id', $category, 'product_cat')) { ?>
                                    <option value="<?php echo $category; ?>"
                                            selected="selected"><?php echo $term->name; ?></option>
                                <?php }
                            }
                            ?>
                        <?php endif; ?>
                        <?php foreach ($product_categories as $cats): ?>
                            <option value="<?php echo $cats->term_id; ?>"><?php echo $cats->name; ?></option>
                        <?php endforeach; ?>
                    </select>


                    <div class="admin_display_list admin_display_list_bg admin_display_list_full">

                        <p>Add to cart button behavior</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="qc_add_to_cart_type" <?php echo(get_option('qc_add_to_cart_type') == 'ajax' ? 'checked' : ''); ?>
                                       value="ajax">
                                AJAX
                            </li>
                            <li>
                                <input type="radio"
                                       name="qc_add_to_cart_type" <?php echo(get_option('qc_add_to_cart_type') == 'cart_page' ? 'checked' : ''); ?>
                                       value="cart_page">
                                Redirect to Cart Page
                            </li>
                        </ul>

                    </div>


                    <div class="admin_display_list admin_display_list_bg">

                        <p>Sort product by</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="qc_product_sort_type" <?php echo(get_option('qc_product_sort_type') == 'title' ? 'checked' : ''); ?>
                                       value="title">
                                Title
                            </li>
                            <li>
                                <input type="radio"
                                       name="qc_product_sort_type" <?php echo(get_option('qc_product_sort_type') == 'date' ? 'checked' : ''); ?>
                                       value="date">
                                Date
                            </li>
                            <li>
                                <input type="radio"
                                       name="qc_product_sort_type" <?php echo(get_option('qc_product_sort_type') == 'meta_value_num' ? 'checked' : ''); ?>
                                       value="meta_value_num">
                                Price
                            </li>
                        </ul>

                    </div>

                    <div class="admin_display_list admin_display_list_bg">


                        <p>Product sorting order</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="qc_product_sort_order" <?php echo(get_option('qc_product_sort_order') == 'asc' ? 'checked' : ''); ?>
                                       value="asc">
                                Ascending
                            </li>
                            <li>
                                <input type="radio"
                                       name="qc_product_sort_order" <?php echo(get_option('qc_product_sort_order') == 'desc' ? 'checked' : ''); ?>
                                       value="desc">
                                Descending
                            </li>
                        </ul>
                    </div>

                    <div class="admin_display_list">
                        <p>Number of products in each category</p>
                        <input type="text" name="product_number" id="product_number" style="margin-top: 9px;"
                               value="<?php echo get_option('product_number'); ?>"/>
                    </div>
                    <div class="admin_display_list">
                        <p>Number of letters allowed per category name::</p>
                        <input type="text" name="max_char_per_cat"
                               value="<?php echo get_option('max_char_per_cat'); ?>">
                    </div>

                    <div class="admin_display_list_1">
                        <input id="show_all" type="checkbox" name="show_all"
                               value="1" <?php echo(get_option('show_all') == '1' ? 'checked' : ''); ?>>
                        <p>Enable "All" tab</p>
                    </div>
                </section>
                <input id="toggle2" type="radio" name="toggle"/>
                <label for="toggle2">Display Settings</label>
                <section id="content2" class="wo_tabs_inner">
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Sort category by ascending or descending</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="category_order" <?php echo(get_option('category_order') == 'asc' ? 'checked' : ''); ?>
                                       value="asc">
                                Ascending
                            </li>
                            <li>
                                <input type="radio"
                                       name="category_order" <?php echo(get_option('category_order') == 'desc' ? 'checked' : ''); ?>
                                       value="desc">
                                Descending
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Display product price</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="display_price" <?php echo(get_option('display_price') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Yes
                            </li>
                            <li>
                                <input type="radio"
                                       name="display_price" <?php echo(get_option('display_price') == '0' ? 'checked' : ''); ?>
                                       value="0">
                                No
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Display rating</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="display_rating" <?php echo(get_option('display_rating') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Yes
                            </li>
                            <li>
                                <input type="radio"
                                       name="display_rating" <?php echo(get_option('display_rating') == '0' ? 'checked' : ''); ?>
                                       value="0">
                                No
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Display product title</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="product_title" <?php echo(get_option('product_title') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Yes
                            </li>
                            <li>
                                <input type="radio"
                                       name="product_title" <?php echo(get_option('product_title') == '0' ? 'checked' : ''); ?>
                                       value="0">
                                No
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Display add to cart link</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="add_cart_link" <?php echo(get_option('add_cart_link') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Yes
                            </li>
                            <li>
                                <input type="radio"
                                       name="add_cart_link" <?php echo(get_option('add_cart_link') == '0' ? 'checked' : ''); ?>
                                       value="0">
                                No
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list admin_display_list_bg">
                        <p>Display product quantity selection textbox</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="add_quantity_select" <?php echo(get_option('add_quantity_select') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Yes
                            </li>
                            <li>
                                <input type="radio"
                                       name="add_quantity_select" <?php echo(get_option('add_quantity_select') == '0' ? 'checked' : ''); ?>
                                       value="0">
                                No
                            </li>
                        </ul>
                    </div>
                    <div class="admin_display_list_3">
                        <p>Container background color:</p>
                        <input type="text" name="container_background_color"
                               value="<?php echo get_option('container_background_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Product title text color:</p>
                        <input type="text" name="product_title_text_color"
                               value="<?php echo get_option('product_title_text_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Product content text color:</p>
                        <input type="text" name="product_content_text_color"
                               value="<?php echo get_option('product_content_text_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Category Filters Font Color:</p>
                        <input type="text" name="product_category_text_font_color"
                               value="<?php echo get_option('product_category_text_font_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Category filters button color for active button:</p>
                        <input type="text" name="product_category_button_active_color"
                               value="<?php echo get_option('product_category_button_active_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Category filters button color:</p>
                        <input type="text" name="product_category_filter_button_color"
                               value="<?php echo get_option('product_category_filter_button_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Category filters button color on hover:</p>
                        <input type="text" name="product_category_filter_button_color_hover"
                               value="<?php echo get_option('product_category_filter_button_color_hover'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Product Rating color:</p>
                        <input type="text" name="product_ratting_color"
                               value="<?php echo get_option('product_ratting_color'); ?>"
                               class="container-bg-color">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Add to cart button color:</p>
                        <input type="text" name="product_add_to_cart_button_color"
                               value="<?php echo get_option('product_add_to_cart_button_color'); ?>"
                               class="container-bg-color">
                    </div>


                    <div class="admin_display_list_3">

                        <p>Category filters border color:</p>
                        <input type="text" name="category_filters_border_color"
                               value="<?php echo get_option('category_filters_border_color'); ?>"
                               class="container-bg-color">

                    </div>

                    <div class="admin_display_list_3 qc_cat">
                        <p>Category filters font size: ( px )</p>
                        <input type="text" name="product_category_text_font_size"
                               value="<?php echo get_option('product_category_text_font_size'); ?>">
                    </div>


                    <div class="admin_display_list_3">
                        <p>Category display type</p>
                        <ul class="radio-list">
                            <li>
                                <input type="radio"
                                       name="category_style" <?php echo(get_option('category_style') == '1' ? 'checked' : ''); ?>
                                       value="1">
                                Scroll
                            </li>
                            <li>
                                <input type="radio"
                                       name="category_style" <?php echo(get_option('category_style') == '2' ? 'checked' : ''); ?>
                                       value="2">
                                Stack
                            </li>
                        </ul>
                    </div>


                    <div class="admin_display_list_3">
                        <p>Product title text size ( px )</p>
                        <input type="text" name="change_title_text_size"
                               value="<?php echo get_option('change_title_text_size'); ?>">
                    </div>
                    <div class="admin_display_list_3">
                        <p>Product content text size ( px )</p>
                        <input type="text" name="product_content_text_size"
                               value="<?php echo get_option('product_content_text_size'); ?>">
                    </div>


                    <br/>
                    <br/>
                </section>
                <input id="toggle3" type="radio" name="toggle"/>
                <label for="toggle3">Select Style</label>
                <section id="content3" class="wo_tabs_inner">
                    <div class="qc_select_theme">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Tabs style</label>
                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2">Accordion style</label>
                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3">Carousel style</label>
                        <section id="content1">
                            <ul class="qcld-theme-list" style="width: 100%;">
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'one' ? 'checked' : ''); ?>
                                           value="one">
                                    Style one <code><strong>[wtcpl-product-cat theme="one"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/1.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'two' ? 'checked' : ''); ?>
                                           value="two">
                                    Style two <code><strong>[wtcpl-product-cat theme="two"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/2.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'three' ? 'checked' : ''); ?>
                                           value="three">
                                    Style three <code><strong>[wtcpl-product-cat theme="three"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/3.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'five' ? 'checked' : ''); ?>
                                           value="five">
                                    Style Five <code><strong>[wtcpl-product-cat theme="five"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/5.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'six' ? 'checked' : ''); ?>
                                           value="six">
                                    Style Six <code><strong>[wtcpl-product-cat theme="six"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/6.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'seven' ? 'checked' : ''); ?>
                                           value="seven">
                                    Style Seven <code><strong>[wtcpl-product-cat theme="seven"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/7.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'eight' ? 'checked' : ''); ?>
                                           value="eight">
                                    Style Eight <code><strong>[wtcpl-product-cat theme="eight"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/8.jpg" alt=""></li>
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'nine' ? 'checked' : ''); ?>
                                           value="nine">
                                    Style Nine <code><strong>[wtcpl-product-cat theme="nine"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/9.jpg" alt=""></li>
                            </ul>
                        </section>
                        <section id="content2">
                            <ul class="qcld-theme-list" style="width: 100%;">
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'four' ? 'checked' : ''); ?>
                                           value="four">
                                    Style Four <code><strong>[wtcpl-product-cat theme="four"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/4.jpg" alt=""></li>


                    <li>
                    <input type="radio" name="tabbed_theme"<?php echo(get_option('tabbed_theme') == 'eleven' ? 'checked' : ''); ?> value="eleven">
                    Style Eleven <code><strong>[wtcpl-product-cat theme="eleven"]</strong></code> <img
                                                     src="
                    <?php echo QC_WOO_TAB_IMAGE_URL;
                    ?>/11.jpg" alt=""></li>
                                
                                
                                
                                

                            </ul>
                        </section>
                        <section id="content3">
                            <ul class="qcld-theme-list" style="width: 100%;">
                                <!-- <li>Coming Soon</li>-->
                                <li>
                                    <input type="radio"
                                           name="tabbed_theme" <?php echo(get_option('tabbed_theme') == 'ten' ? 'checked' : ''); ?>
                                           value="ten">
                                    Style Ten <code><strong>[wtcpl-product-cat theme="ten"]</strong></code> <img
                                            src="<?php echo QC_WOO_TAB_IMAGE_URL; ?>/10.jpg" alt=""></li>
                            </ul>
                        </section>
                    </div>
                </section>
                <input id="toggle4" type="radio" name="toggle"/>
                <label for="toggle4">Language Center</label>
                <section id="content4" class="wo_tabs_inner">
                    <div class="admin_display_list">
                        <p>In Woo tab, products are added to cart via ajax. You can customize or override default
                            success message from here.</p>
                        <br>
                        <textarea name="success_alert_message"
                                  class="form-control custom-global-css"
                                  cols="105"
                                  rows="2"><?php echo get_option('success_alert_message'); ?></textarea>
                    </div>
                    <div class="admin_display_list">
                        <p class="qc-opt-dcs-font">Change the alert message title text when a product is added to cart.
                            Leave in blank if you do not wish to change.</p>
                        <br>
                        <textarea name="title_text"
                                  class="form-control custom-global-css"
                                  cols="105"
                                  rows="2"><?php echo get_option('title_text'); ?></textarea>
                    </div>
                    <div class="admin_display_list">
                        <p class="qc-opt-dcs-font">Here you can override the load more button text.</p>
                        <textarea name="change_load_more_text"
                                  class="form-control custom-global-css"
                                  cols="105"
                                  rows="2"><?php echo get_option('change_load_more_text'); ?></textarea>
                    </div>
                    <div class="admin_display_list">
                        <p class="qc-opt-dcs-font">Change add to cart button text from here leave it blank if you do not
                            wish to
                            change</p>
                        <textarea name="change_add_to_cart_button_text"
                                  class="form-control custom-global-css"
                                  cols="105"
                                  rows="2"><?php echo get_option('change_add_to_cart_button_text'); ?></textarea>
                    </div>

                    <div class="admin_display_list">
                        <p class="qc-opt-dcs-font">Change no product found text here. Leave it as it is if you do not
                            wish to change.</p>
                        <textarea name="no_product_found_text"
                                  class="form-control custom-global-css"
                                  cols="105"
                                  rows="2"><?php echo get_option('no_product_found_text'); ?></textarea>
                    </div>


                    <br>
                    <br>
                </section>
                <input id="toggle5" type="radio" name="toggle"/>
                <label for="toggle5">Others</label>
                <section id="content5" class="wo_tabs_inner wo_tabs_inner_css">
                    <p>You can paste or write your custom css here</p>
                    <textarea name="custom_global_css"
                              class="form-control custom-global-css"
                              cols="105"
                              rows="20"><?php echo get_option('custom_global_css'); ?></textarea>
                    <br/>
                    <br/>
                </section>
            </div>
            <?php wp_nonce_field('woo-tab'); ?>
            <div class="admin_cus_btn1">
                <input type="submit" class="btn btn-primary submit-button" name="submit"
                       id="submit" value="<?php _e('Save Settings', 'woo-tab'); ?>"/>
            </div>


            <div class="admin_cus_btn1">
                <input type="button" class="btn btn-warning submit-button"
                       id="woo-rest-all-options-default"
                       value="<?php _e('Reset all options to Default', 'woo-tab'); ?>"/>
            </div>


        </form>
    <?php }


    public function admin_menu()
    {

        add_submenu_page('woocommerce',
            __('Woo Tabbed Pro', 'woo-tab'),
            __('Woo Tabbed Pro', 'woo-tab'),
            'manage_woocommerce',
            $this->id,
            array($this, 'admin_page'));

    }


    function woo_tab_save_options()
    {


        global $woocommerce;
        if (isset($_POST['_wpnonce']) && $_POST['_wpnonce']) {


            wp_verify_nonce($_POST['_wpnonce'], 'woo-tab');


            // Check if the form is submitted or not

            if (isset($_POST['submit'])) {

                $custom_global_css = $_POST['custom_global_css'];
                $product_number = $_POST['product_number'];

                $display_price = $_POST['display_price'];
                $display_rating = $_POST['display_rating'];
                $product_title = $_POST['product_title'];
                $add_cart_link = $_POST['add_cart_link'];
                $add_quantity_select = $_POST['add_quantity_select'];
                $success_alert_message = $_POST['success_alert_message'];
                $title_text = $_POST['title_text'];
                $change_load_more_text = $_POST['change_load_more_text'];
                $container_background_color = $_POST['container_background_color'];
                $product_title_text_color = $_POST['product_title_text_color'];
                $max_char_per_cat = $_POST['max_char_per_cat'];
                $change_title_text_size = $_POST['change_title_text_size'];
                $product_content_text_size = $_POST['product_content_text_size'];


                if (isset($_POST['category_order'])) {
                    update_option('category_order', $_POST['category_order']);
                }

                if (isset($_POST['selected_categories'])) {
                    update_option('selected_categories', serialize($_POST['selected_categories']));
                }


                if (isset($_POST['product_box_hover_color'])) {
                    update_option('product_box_hover_color', $_POST['product_box_hover_color']);
                }


                if (isset($_POST['product_price_font_color'])) {
                    update_option('product_price_font_color', $_POST['product_price_font_color']);
                }

                if (isset($_POST['product_price_font_size'])) {
                    update_option('product_price_font_size', $_POST['product_price_font_size']);
                }

                if (isset($_POST['show_all']) == 1) {
                    update_option('show_all', $_POST['show_all']);
                } else {
                    update_option('show_all', 0);
                }


                // upload custom jarvis icon
                // $woo_tab_custom_icon_path = $_POST['woo_tab_custom_icon_path'];
                //  update_option('woo_tab_custom_icon_path', sanitize_text_field($woo_tab_custom_icon_path));


                $tabbed_theme = $_POST['tabbed_theme'];


                $qc_product_sort_type = $_POST['qc_product_sort_type'];
                $qc_product_sort_order = $_POST['qc_product_sort_order'];

                $no_product_found_text = sanitize_text_field($_POST['no_product_found_text']);


                $category_filters_border_color = $_POST['category_filters_border_color'];

                $category_style = $_POST['category_style'];
                update_option('category_style', $category_style);
                update_option('category_filters_border_color', $category_filters_border_color);
                update_option('no_product_found_text', $no_product_found_text);

                // New options starts from here

                $product_category_text_font_size = $_POST['product_category_text_font_size'];
                $product_category_text_font_color = $_POST['product_category_text_font_color'];
                $product_category_button_active_color = $_POST['product_category_button_active_color'];
                $product_ratting_color = $_POST['product_ratting_color'];


                $product_category_filter_button_color = $_POST['product_category_filter_button_color'];
                $product_category_filter_button_color_hover = $_POST['product_category_filter_button_color_hover'];
                $product_add_to_cart_button_color = $_POST['product_add_to_cart_button_color'];
                $product_content_text_color = $_POST['product_content_text_color'];
                $change_add_to_cart_button_text = sanitize_text_field($_POST['change_add_to_cart_button_text']);
                $qc_add_to_cart_type = $_POST['qc_add_to_cart_type'];

                // New options start from here

                update_option('qc_product_sort_type', $qc_product_sort_type);
                update_option('qc_product_sort_order', $qc_product_sort_order);

                update_option('product_content_text_color', $product_content_text_color);
                update_option('product_add_to_cart_button_color', $product_add_to_cart_button_color);
                update_option('product_category_filter_button_color_hover', $product_category_filter_button_color_hover);
                update_option('product_category_filter_button_color', $product_category_filter_button_color);


                update_option('product_ratting_color', $product_ratting_color);

                update_option('product_category_text_font_size', $product_category_text_font_size);
                update_option('product_category_text_font_color', $product_category_text_font_color);
                update_option('product_category_button_active_color', $product_category_button_active_color);
                update_option('change_add_to_cart_button_text', $change_add_to_cart_button_text);


                update_option('qc_add_to_cart_type', $qc_add_to_cart_type);


                update_option('custom_global_css', $custom_global_css);
                update_option('product_number', $product_number);

                update_option('display_price', $display_price);
                update_option('display_rating', $display_rating);
                update_option('product_title', $product_title);
                update_option('add_cart_link', $add_cart_link);
                update_option('add_quantity_select', $add_quantity_select);
                update_option('success_alert_message', $success_alert_message);
                update_option('title_text', $title_text);
                update_option('change_load_more_text', $change_load_more_text);
                update_option('container_background_color', $container_background_color);
                update_option('product_title_text_color', $product_title_text_color);
                update_option('max_char_per_cat', $max_char_per_cat);
                update_option('change_title_text_size', $change_title_text_size);
                update_option('product_content_text_size', $product_content_text_size);

                update_option('tabbed_theme', $tabbed_theme);


            }
        }
    }


    /**
     * Display Notifications on specific criteria.
     *
     * @since    2.14
     */
    public static function woocommerce_inactive_notice()
    {
        if (current_user_can('activate_plugins')) :
            if (!class_exists('WooCommerce')) :
                deactivate_plugins(plugin_basename(__FILE__));
                //wp_die('You need to activate WooCommerce first.');
                ?>
                <style>
                    .updated {
                        display: none !important;
                    }
                </style>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sWoo Tabbed Category Product Listing - Premium Edition REQUIRES WooCommerce%s %sWooCommerce%s must be active for Woo Tabbed Category Product Listing - Premium Edition to work. Please install & activate WooCommerce.', 'qcld_express_shop'),
                            '<strong>',
                            '</strong><br>',
                            '<a href="http://wordpress.org/extend/plugins/woocommerce/" target="_blank" >',
                            '</a>'
                        );
                        ?>
                    </p>
                </div>
                <?php
            elseif (version_compare(get_option('woocommerce_db_version'), WOO_PRODUCT_TAB_VERSION, '<')) :
                ?>
                <div id="message" class="error">
                    <p>
                        <?php
                        printf(
                            __('%sWoo Tabbed Category Product Listing - Premium Edition is inactive%s This version of Woo Tabbed Category Product Listing - Premium Edition requires WooCommerce %s or newer. For more information about our WooCommerce version support %sclick here%s.', 'qcld_express_shop'),
                            '<strong>',
                            '</strong><br>',
                            WOO_PRODUCT_TAB_VERSION
                        );
                        ?>
                    </p>
                    <div style="clear:both;"></div>
                </div>
                <?php
            endif;
        endif;
    }


}


if (!function_exists('init_woo_tab_cat_list')) {
    function init_woo_tab_cat_list()
    {

        global $woo_tab_cat_list;

        $woo_tab_cat_list = Woo_Tab_Product_Category_List::get_instance();
    }
}


add_action('plugins_loaded', 'init_woo_tab_cat_list');

/**
 * Register the shortcode
 */

add_shortcode('wtcpl-product-cat', 'wtcpl_load_products');


/**
 * Check first if WooCommerce is activated or not
 */

// Plugin Code Below

require_once(plugin_dir_path(__FILE__) . 'class-woo-tabbed-category-product-listing.php');


function woo_tabbed_category_start()
{
    $tabbed_category = new Woo_Tabbled_Categoty();
    $tabbed_category->initialize();
}

woo_tabbed_category_start();


/**
 * Loading the plugin specific javascript files.
 */


function wtcpl_plugin_scripts()
{
    wp_enqueue_script('slick-js', plugins_url('/js/slick.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('wtcpl-product-cat-js', plugins_url('/js/wtcpl-scripts.js', __FILE__), array('jquery'));
    wp_enqueue_script('sweetalert2-js', plugins_url('/js/sweetalert2.js', __FILE__), array('jquery'));
    wp_enqueue_script('modernizr', plugins_url('/js/modernizr.custom.js', __FILE__), array());

    wp_enqueue_script('catslider', plugins_url('/js/jquery.catslider.js', __FILE__), array('jquery'));

}

function wtcpl_scroll_to_scripts()
{

    wp_enqueue_script('wtcpl-scroll-to-js', plugins_url('/js/jquery.scrollTo-1.4.3.1-min.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery-id-tabs', plugins_url('/js/jquery.idTabs.min.js', __FILE__), array('jquery'));
}


/**
 * Loading the plugin specific stylesheet files.
 */

function wtcpl_plugin_styles()
{

    wp_register_style('sweetalert2', plugin_dir_url(__FILE__) . 'css/sweetalert2.css');
    wp_enqueue_style('sweetalert2');

    wp_register_style('flickity', plugin_dir_url(__FILE__) . 'css/flickity.css');
    wp_enqueue_style('flickity');

    wp_register_style('slick-css', plugin_dir_url(__FILE__) . 'css/slick.css');
    wp_enqueue_style('slick-css');

    wp_register_style('font-awesome', plugin_dir_url(__FILE__) . 'css/font-awesome.css');
    wp_enqueue_style('font-awesome');

    wp_register_style('frontend-style', plugin_dir_url(__FILE__) . 'css/frontend-style.css');
    wp_enqueue_style('frontend-style');

}


add_action('template_redirect', 'wtcpl_check_for_shorcode');
function wtcpl_check_for_shorcode()
{
    global $wp_query;
    if (is_singular()) {
        $post = $wp_query->get_queried_object();

        if ($post && strpos($post->post_content, 'wtcpl-product-cat') !== false) {
            wtcpl_scroll_to_scripts();
            wtcpl_plugin_scripts();
            wtcpl_plugin_styles();

        }
    }
}


function wtcpl_load_products($atts)
{

    ob_start();
    global $qc_shortcode_parameters;
    $qc_shortcode_parameters = $atts;


    // Prevent rendering plugin if user is

    if (!is_admin()) {
        if ($atts != '') {

            if ($atts['theme'] != '') {
                if (file_exists(QC_WOO_TAB_DIR . '/templates/template-' . $atts['theme'] . '/template.php')) {
                    $template = QC_WOO_TAB_DIR . '/templates/template-' . $atts['theme'] . '/template.php';
                    require($template);
                } else {

                }
            }

        } else {
            require(QC_WOO_TAB_DIR . '/templates/template-' . get_option('tabbed_theme') . '/template.php');
        }

    }


    return ob_get_clean();

}


// Ajax load products into tab for theme three

add_action('wp_ajax_get_products_by_cat_theme_three', 'get_products_by_cat_theme_three');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_three', 'get_products_by_cat_theme_three');


function get_products_by_cat_theme_three()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>';

        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;


        $html .= '<div class="wootabs_img">' . $product->get_image('shop_catalog') . '</div>';

        if ($product_stock_status != 'outofstock') {


            $html .= '<div class="qc_pro_details">';

            if (get_option('add_cart_link') == 1):
                $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;


            $html .= '<div class="qc_quantity qc_qat_style_three">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                                                <input class="qc_minus" type="button" value="-">
                                                <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                                       value="1">
                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):


                $html .= '<a data-p-id="' . $product->get_id() . '" class="woo_tab_s_p_add_to_cart" href="' . $product->add_to_cart_url() . '"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>';
            endif;


            $html .= '</ul>
             </div>';
        } else {
            $html .= '<div class="qc_pro_details">';

            if (get_option('add_cart_link') == 1):
                $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;


            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_three ">';


            if (get_option('add_cart_link') == 1):


                $html .= '<a data-p-id="' . $product->get_id() . '" class="product_out_of_stock" href="#"><i class="fa" aria-hidden="true"></i></a>';
            endif;


            $html .= '</ul>
             </div>';
        }
        if (get_option('product_title')):
            $html .= '<h2>
                                            <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';"
                                               href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                        </h2>';
        endif;

        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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

            $html .= '</div>';
        endif;
        $html .= '<div class="woo_price" style="font-size:' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">';


        if (get_option('display_price') == 1):
            $html .= $product->get_price_html();
        endif;
        $html .= '</div>';
        $html .= '</li>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}

// Ajax load products into tab for theme four

add_action('wp_ajax_get_products_by_cat_theme_four', 'get_products_by_cat_theme_four');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_four', 'get_products_by_cat_theme_four');


function get_products_by_cat_theme_four()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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

    $add_to_cart_text = get_option('change_add_to_cart_button_text');
    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li style="background-color:' . get_option('container_background_color') . '">
                                    <div class="qc-product-list">';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="qc-product-details-left">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-product-details-right">';

        if (get_option('product_title') == 1):
            $html .= '<h2><a style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
        endif;
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;

        if (get_option('display_price') == 1):
            $html .= '<h3 style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">' . $product->get_price_html() . '</h3>';
        endif;

        if (get_option('add_cart_link') == 1):
            if ($product_stock_status != 'outofstock') {
                if (!empty($add_to_cart_text)) {
                    $anchorText = $add_to_cart_text;
                } else {
                    $anchorText = "Add To Cart";
                }


                if (get_option('add_quantity_select') == 1):

                    $html .= ' <div class="qc_quantity">';
                    $html .= '<input class="qc_minus" type="button" value="-">           
                 <input id="qty_' . $product->get_id() . '" type="text" class="qc_product_quantity" name="qcld_quantity" value="1">
                 <input class="qc_plus" type="button" value="+">';
                endif;

                $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                                               class="qc-cart-btn woo_tab_s_p_add_to_cart">' . $anchorText . '</a>
                 </div>';


                $html .= '</div>
                                    </div>';


            } else {
                $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"
                                               class="qc-cart-btn">Out Of Stock</a>';
            }
        endif;
        $html .= '</li>';
    endwhile;
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


// Ajax load products into tab for theme four

add_action('wp_ajax_get_products_by_cat_theme_five', 'get_products_by_cat_theme_five');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_five', 'get_products_by_cat_theme_five');


function get_products_by_cat_theme_five()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                            <div class="qc_tabs_10_style_box">';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;


        if (get_option('product_title') == 1):
            $html .= '<h2><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
        endif;

        if (get_option('display_price') == 1):

            $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
        endif;
        $html .= '<div class="qc_ratting">';
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
        $html .= '</div>
                                        <div class="divider"></div>
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>

                                    </div>';


        if ($product_stock_status != 'outofstock') {


            $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
            if (get_option('product_title') == 1):
                $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


            $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;

            $html .= '<div class="qc_quantity qc_qat_style_five">';

            if (get_option('add_quantity_select') == 1):
                $html .= '<input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                        <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                    class="fa fa-cart-arrow-down"
                                                                    aria-hidden="true"></i></a>';

            endif;


            $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';


        } else {
            $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
            if (get_option('product_title') == 1):
                $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


            $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;

            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_five">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                        <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href=""><i
                                                                    class="fa"
                                                                    aria-hidden="true"></i></a>';

            endif;


            $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';
        }


        $html .= '</li>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}


// Ajax load products into tab for theme six

add_action('wp_ajax_get_products_by_cat_theme_six', 'get_products_by_cat_theme_six');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_six', 'get_products_by_cat_theme_six');


function get_products_by_cat_theme_six()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<div class="pro_list_04">
                                    <div class="slider">
                                        <div class="pro_item_list">' . $product->get_image('shop_catalog') . '</div>';
        $average = $product->get_average_rating();


        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;
        $html .= '</div>';


        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="meta">';


        if (get_option('product_title') == 1):
            $html .= '<h3 class="pro_title_04"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                            </h3>';
        endif;

        if (get_option('display_price') == 1):
            $html .= '<span style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_price_04">' . $product->get_price_html() . '</span>';
        endif;
        $html .= '</div>';
        if ($product_stock_status != 'outofstock') {
            $html .= '<ul class="pro_icon action action_button action_buy">';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

            endif;

            $html .= '<div class="qc_quantity qc_qat_style_six">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                             <input class="qc_minus" type="button" value="-">
                             <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                    value="1">
                             <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                <a class="woo_tab_s_p_add_to_cart" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                            class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                            ';


            endif;

            $html .= '</ul>';
        } else {
            $html .= '<ul class="pro_icon action action_button action_buy">';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

            endif;

            $html .= '<div class="qc_quantity qc_qat_style_six">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                <a class="product_out_of_stock" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"><i
                                                            class="fa" aria-hidden="true"></i></a>
                                            ';


            endif;

            $html .= '</ul>';
        }

        $html .= '</div></div>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}


// Ajax load products into tab for theme eight

add_action('wp_ajax_get_products_by_cat_theme_eight', 'get_products_by_cat_theme_eight');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_eight', 'get_products_by_cat_theme_eight');


function get_products_by_cat_theme_eight()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                                    <div class="qc_tabs_10_style_box">
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-tabs-style13-hover">
                                            <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;

        if (get_option('product_title') == 1):
            $html .= '<h2>
                                                    <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';
        endif;

        if (get_option('display_price') == 1):
            $html .= '<div style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ' !important;" class="qc_price">' . $product->get_price_html() . '</div>';

        endif;
        if (get_option('display_rating') == 1):

            $html .= '<div class="qc_ratting">';
            $average = $product->get_average_rating();
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


        $html .= '<div class="qc_quantity qc_qat_style_eight">';
        if ($product_stock_status != 'outofstock') {
            if (get_option('add_quantity_select') == 1):
                $html .= ' <input class="qc_minus" type="button" value="-">
                              <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                     value="1">
                              <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '<a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '">';
                if (!empty($add_to_cart_text)) {
                    $html .= $add_to_cart_text;
                } else {
                    $html .= 'Add To Cart';
                }
                $html .= '</a>';
            endif;
        } else {


            if (get_option('add_cart_link') == 1):

                $html .= '<a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="#">';

                $html .= 'Out Of Stock</a>';
            endif;
        }
        $html .= '</div>
                                    </div>
                                </li>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}

// Ajax load products into tab for theme eight

add_action('wp_ajax_get_products_by_cat_theme_seven', 'get_products_by_cat_theme_seven');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_seven', 'get_products_by_cat_theme_seven');


function get_products_by_cat_theme_seven()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                                        <div class="pro_list_12_box">
                                            <div class="pro_list_12_img">' . $product->get_image('shop_catalog') . '</div>';
        if ($product->is_on_sale()) {
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        }

        if (get_option('product_title') == 1):
            $html .= '<h2 class="pro_list_12_title"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '"
                                                            href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';

        endif;
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;

        if (get_option('display_price') == 1):
            $html .= '<div style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_list_12_price">' . $product->get_price_html() . '</div>';
        endif;
        if ($product_stock_status != 'outofstock') {

            $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
            endif;


            $html .= '<div class="qc_quantity qc_qat_style_seven">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                          <input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                            <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                        aria-hidden="true"
                                                                        class="fa fa-cart-arrow-down"></i></a>';

            endif;

            $html .= '</div></ul>

                                            </div>';

        } else {
            $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
            endif;


            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_seven">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                            <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="#"><i
                                                                        aria-hidden="true"
                                                                        class="fa"></i></a>';

            endif;

            $html .= '</div></ul>

                                            </div>';
        }
        $html .= '</div>
                                    </li>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}


// Ajax load products on tab for theme two

add_action('wp_ajax_get_products_by_cat_theme_two', 'get_products_by_cat_theme_two');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_two', 'get_products_by_cat_theme_two');


function get_products_by_cat_theme_two()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

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


        $html .= '<div class="qc_quantity qc_qat_style_two">';
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
        $html .= '<div class="clear"></div>
                                        </div>
                                    </div>
                                ';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();

}


add_action('wp_ajax_get_products_by_cat_theme_one', 'get_products_by_cat_theme_one');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_one', 'get_products_by_cat_theme_one');


function get_products_by_cat_theme_one()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

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
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();

}


//Single Product Add To Cart
add_action('wp_ajax_woo_sp_add_to_cart', 'qcld_wootab_sp_add_to_cart');
add_action('wp_ajax_nopriv_woo_sp_add_to_cart', 'qcld_wootab_sp_add_to_cart');


function qcld_wootab_sp_add_to_cart()
{
    $product_id = $_POST['p_id'];


    if ($_POST['quantity'] != '') {
        $product_quantity = $_POST['quantity'];
    } else {
        $product_quantity = 1;
    }

    global $woocommerce;
    $result = $woocommerce->cart->add_to_cart($product_id, $product_quantity);
    if ($result != false) {
        echo wp_send_json('simple');
    } else {
        echo wp_send_json('error');
    }
    wp_die();
}


//Load more product for theme three
add_action('wp_ajax_woo_load_more_theme_three', 'qcld_wootab_woo_load_more_theme_three');
add_action('wp_ajax_nopriv_woo_load_more_theme_three', 'qcld_wootab_woo_load_more_theme_three');


function qcld_wootab_woo_load_more_theme_three()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];

    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>';

        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;


        $html .= '<div class="wootabs_img">' . $product->get_image('shop_catalog') . '</div>';

        if ($product_stock_status != 'outofstock') {


            $html .= '<div class="qc_pro_details">';

            if (get_option('add_cart_link') == 1):
                $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;


            $html .= '<div class="qc_quantity qc_qat_style_three">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                                                <input class="qc_minus" type="button" value="-">
                                                <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                                       value="1">
                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):


                $html .= '<a data-p-id="' . $product->get_id() . '" class="woo_tab_s_p_add_to_cart" href="' . $product->add_to_cart_url() . '"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>';
            endif;


            $html .= '</ul>
             </div>';
        } else {
            $html .= '<div class="qc_pro_details">';

            if (get_option('add_cart_link') == 1):
                $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;


            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_three">';


            if (get_option('add_cart_link') == 1):


                $html .= '<a data-p-id="' . $product->get_id() . '" class="product_out_of_stock" href="#"><i class="fa" aria-hidden="true"></i></a>';
            endif;


            $html .= '</ul>
             </div>';
        }
        if (get_option('product_title')):
            $html .= '<h2>
                                            <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';"
                                               href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                        </h2>';
        endif;

        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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

            $html .= '</div>';
        endif;
        $html .= '<div class="woo_price" style="font-size:' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">';


        if (get_option('display_price') == 1):
            $html .= $product->get_price_html();
        endif;
        $html .= '</div>';
        $html .= '</li>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


//Load more product for theme three
add_action('wp_ajax_woo_load_more_theme_four', 'qcld_wootab_woo_load_more_theme_four');
add_action('wp_ajax_nopriv_woo_load_more_theme_four', 'qcld_wootab_woo_load_more_theme_four');


function qcld_wootab_woo_load_more_theme_four()
{

    $add_to_cart_text = get_option('change_add_to_cart_button_text');
    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    $add_to_cart_text = get_option('change_add_to_cart_button_text');
    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li style="background-color:' . get_option('container_background_color') . '">
                                    <div class="qc-product-list">';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="qc-product-details-left">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-product-details-right">';

        if (get_option('product_title') == 1):
            $html .= '<h2><a style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
        endif;
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;

        if (get_option('display_price') == 1):
            $html .= '<h3 style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">' . $product->get_price_html() . '</h3>';
        endif;

        if (get_option('add_cart_link') == 1):
            if ($product_stock_status != 'outofstock') {
                if (!empty($add_to_cart_text)) {
                    $anchorText = $add_to_cart_text;
                } else {
                    $anchorText = "Add To Cart";
                }


                if (get_option('add_quantity_select') == 1):

                    $html .= ' <div class="qc_quantity">';
                    $html .= '<input class="qc_minus" type="button" value="-">           
                 <input id="qty_' . $product->get_id() . '" type="text" class="qc_product_quantity" name="qcld_quantity" value="1">
                 <input class="qc_plus" type="button" value="+">';
                endif;

                $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                                               class="qc-cart-btn woo_tab_s_p_add_to_cart">' . $anchorText . '</a>
                 </div>';


                $html .= '</div>
                                    </div>';


            } else {
                $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"
                                               class="qc-cart-btn">Out Of Stock</a>';
            }
        endif;
        $html .= '</li>';
    endwhile;

    wp_reset_query();

    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}

//Load more product for theme ten
add_action('wp_ajax_woo_load_more_theme_ten', 'qcld_wootab_woo_load_more_theme_ten');
add_action('wp_ajax_nopriv_woo_load_more_theme_ten', 'qcld_wootab_woo_load_more_theme_ten');


function qcld_wootab_woo_load_more_theme_ten()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

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


        $html .= '<div class="qc_quantity">';


        if (get_option('add_quantity_select') == 1):
            $html .= '<input class="qc_minus" type="button" value="-">
            <input type="text" class="qc_product_quantity"
                   name="qcld_quantity" value="1">
            <input class="qc_plus" type="button" value="+">';

        endif;


        if (get_option('add_cart_link') == 1):

            $html .= '<a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                                ';

        endif;
        $html .= '<div class="clear"></div>
                                        </div>
                                    </div>
                                ';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}

//Load more product for theme two
add_action('wp_ajax_woo_load_more_theme_two', 'qcld_wootab_woo_load_more_theme_two');
add_action('wp_ajax_nopriv_woo_load_more_theme_two', 'qcld_wootab_woo_load_more_theme_two');


function qcld_wootab_woo_load_more_theme_two()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

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


        $html .= '<div class="qc_quantity qc_qat_style_two">';
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
        $html .= '<div class="clear"></div>
                                        </div>
                                    </div>
                                ';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


add_action('wp_ajax_woo_load_more_theme_one', 'qcld_wootab_woo_load_more_theme_one');
add_action('wp_ajax_nopriv_woo_load_more_theme_one', 'qcld_wootab_woo_load_more_theme_one');


function qcld_wootab_woo_load_more_theme_one()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

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
        $html .= '<div class="qc_quantity qc_qat_style_two">';
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
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


//Load more product for theme five
add_action('wp_ajax_woo_load_more_theme_five', 'qcld_wootab_woo_load_more_theme_five');
add_action('wp_ajax_nopriv_woo_load_more_theme_five', 'qcld_wootab_woo_load_more_theme_five');


function qcld_wootab_woo_load_more_theme_five()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                            <div class="qc_tabs_10_style_box">';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;


        if (get_option('product_title') == 1):
            $html .= '<h2><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
        endif;

        if (get_option('display_price') == 1):

            $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
        endif;
        $html .= '<div class="qc_ratting">';
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
        $html .= '</div>
                                        <div class="divider"></div>
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>

                                    </div>';


        if ($product_stock_status != 'outofstock') {


            $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
            if (get_option('product_title') == 1):
                $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


            $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;

            $html .= '<div class="qc_quantity qc_qat_style_five">';

            if (get_option('add_quantity_select') == 1):
                $html .= '<input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                        <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                    class="fa fa-cart-arrow-down"
                                                                    aria-hidden="true"></i></a>';

            endif;


            $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';


        } else {
            $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
            if (get_option('product_title') == 1):
                $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


            $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
            endif;

            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_five">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                        <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href=""><i
                                                                    class="fa"
                                                                    aria-hidden="true"></i></a>';

            endif;


            $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';
        }


        $html .= '</li>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}

//Load more product for theme six
add_action('wp_ajax_woo_load_more_theme_six', 'qcld_wootab_woo_load_more_theme_six');
add_action('wp_ajax_nopriv_woo_load_more_theme_six', 'qcld_wootab_woo_load_more_theme_six');


function qcld_wootab_woo_load_more_theme_six()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<div class="pro_list_04">
                                    <div class="slider">
                                        <div class="pro_item_list">' . $product->get_image('shop_catalog') . '</div>';
        $average = $product->get_average_rating();


        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;
        $html .= '</div>';


        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="meta">';


        if (get_option('product_title') == 1):
            $html .= '<h3 class="pro_title_04"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                            </h3>';
        endif;

        if (get_option('display_price') == 1):
            $html .= '<span style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_price_04">' . $product->get_price_html() . '</span>';
        endif;
        $html .= '</div>';
        if ($product_stock_status != 'outofstock') {
            $html .= '<ul class="pro_icon action action_button action_buy">';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

            endif;

            $html .= '<div class="qc_quantity qc_qat_style_six">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                             <input class="qc_minus" type="button" value="-">
                             <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                    value="1">
                             <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                <a class="woo_tab_s_p_add_to_cart" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                            class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                            ';


            endif;

            $html .= '</ul>';
        } else {
            $html .= '<ul class="pro_icon action action_button action_buy">';

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

            endif;

            $html .= '<div class="qc_quantity qc_qat_style_six">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                <a class="product_out_of_stock" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"><i
                                                            class="fa" aria-hidden="true"></i></a>
                                            ';


            endif;

            $html .= '</ul>';
        }

        $html .= '</div></div>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


//Load more product for theme eight
add_action('wp_ajax_woo_load_more_theme_eight', 'qcld_wootab_woo_load_more_theme_eight');
add_action('wp_ajax_nopriv_woo_load_more_theme_eight', 'qcld_wootab_woo_load_more_theme_eight');


function qcld_wootab_woo_load_more_theme_eight()
{

    $add_to_cart_text = get_option('change_add_to_cart_button_text');
    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                                    <div class="qc_tabs_10_style_box">
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-tabs-style13-hover">
                                            <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>';
        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;

        if (get_option('product_title') == 1):
            $html .= '<h2>
                                                    <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';
        endif;

        if (get_option('display_price') == 1):
            $html .= '<div style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ' !important;" class="qc_price">' . $product->get_price_html() . '</div>';

        endif;
        if (get_option('display_rating') == 1):

            $html .= '<div class="qc_ratting">';
            $average = $product->get_average_rating();
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


        $html .= '<div class="qc_quantity qc_qat_style_eight">';
        if ($product_stock_status != 'outofstock') {
            if (get_option('add_quantity_select') == 1):
                $html .= ' <input class="qc_minus" type="button" value="-">
                              <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                     value="1">
                              <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '<a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '">';
                if (!empty($add_to_cart_text)) {
                    $html .= $add_to_cart_text;
                } else {
                    $html .= 'Add To Cart';
                }
                $html .= '</a>';
            endif;
        } else {


            if (get_option('add_cart_link') == 1):

                $html .= '<a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="#">';

                $html .= 'Out Of Stock</a>';
            endif;
        }
        $html .= '</div>
                                    </div>
                                </li>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}

//Load more product for theme eight
add_action('wp_ajax_woo_load_more_theme_seven', 'qcld_wootab_woo_load_more_theme_seven');
add_action('wp_ajax_nopriv_woo_load_more_theme_seven', 'qcld_wootab_woo_load_more_theme_seven');


function qcld_wootab_woo_load_more_theme_seven()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();
        $html .= '<li>
                                        <div class="pro_list_12_box">
                                            <div class="pro_list_12_img">' . $product->get_image('shop_catalog') . '</div>';
        if ($product->is_on_sale()) {
            $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        }

        if (get_option('product_title') == 1):
            $html .= '<h2 class="pro_list_12_title"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '"
                                                            href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';

        endif;
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):
            $html .= '<div class="qcld_woo_product_rating">';
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
            $html .= '</div>';

        endif;

        if (get_option('display_price') == 1):
            $html .= '<div style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_list_12_price">' . $product->get_price_html() . '</div>';
        endif;
        if ($product_stock_status != 'outofstock') {

            $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
            endif;


            $html .= '<div class="qc_quantity qc_qat_style_seven">';

            if (get_option('add_quantity_select') == 1):
                $html .= '                          <input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
            endif;

            if (get_option('add_cart_link') == 1):

                $html .= '
                                                            <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                        aria-hidden="true"
                                                                        class="fa fa-cart-arrow-down"></i></a>';

            endif;

            $html .= '</div></ul>

                                            </div>';

        } else {
            $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;

            if (get_option('product_title') == 1):
                $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
            endif;


            $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_seven">';


            if (get_option('add_cart_link') == 1):

                $html .= '
                                                            <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="#"><i
                                                                        aria-hidden="true"
                                                                        class="fa"></i></a>';

            endif;

            $html .= '</div></ul>

                                            </div>';
        }
        $html .= '</div>
                                    </li>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


//Load more product for theme nine
add_action('wp_ajax_woo_load_more_theme_nine', 'qcld_wootab_woo_load_more_theme_nine');
add_action('wp_ajax_nopriv_woo_load_more_theme_nine', 'qcld_wootab_woo_load_more_theme_nine');


function qcld_wootab_woo_load_more_theme_nine()
{


    $show_per_page = get_option('product_number');
    $cat_id = $_POST['product_cat_id'];
    $offset = $_POST['offset'];


    $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
        'posts_per_page' => $show_per_page,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),
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
    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();


        $html .= '<li class="ilist-25">
                                    <div class="qc-wootabs-col-4">
                                        <div class="ilist-item-main">';

        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img
            src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="feature-img-box valign-center">
    <a href="' . $product->get_permalink() . '">' . $product->get_image('shop_catalog') . '</a>
</div>';

        $html .= '<div class="item-desc-text">';
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):

            if ($average == 1) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/1_star.png" alt="">';
            } else if ($average == 0) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/no_star.png"alt="">';
            } else if ($average <= 2) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/2_star.png"alt="">';
            } else if ($average <= 3) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/3_star.png"alt="">';
            } else if ($average <= 4) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/4_star.png"alt="">';
            } else if ($average <= 5) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/5_star.png"alt="">';
            }

        endif;
        if (get_option('product_title') == 1):
            $html .= '<h3 class="item-list-title"><a
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
        </h3>';

        endif;

        $html .= '<div class="tpl_nine_short_desc"
         style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ' !important;">' . $product->get_short_description() . '</div>
</div>
<div class="item-title-text">';

        if (get_option('display_price') == 1):
            $html .= '<div class="price_tabs"
             style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
        endif;

        $html .= '<div class="qc_quantity qc_qat_style_nine">';

        if (get_option('add_quantity_select') == 1):
            if ($product_stock_status != 'outofstock'):
                $html .= '<input class="qc_minus" type="button" value="-">
        <input type="text" class="qc_product_quantity"
               name="qcld_quantity"
               value="1">
        <input class="qc_plus" type="button" value="+">';

            endif;
            if (get_option('add_cart_link') == 1):
                if ($product_stock_status != 'outofstock') {
                    $html .= '<a
                    data-p-price="' . $product->get_price() . '"
                    data-p-id="<?php echo $product->get_id(); ?>"
                    href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                    class="qc-cart-btn woo_tab_s_p_add_to_cart"><i
                        class="fa fa-cart-arrow-down"
                        aria-hidden="true"></i></a>';
                } else {
                    $html .= '<a class="product_out_of_stock"
               data-p-price="' . $product->get_price() . '"
               data-p-id="' . $product->get_id() . '"
               href="#"><i
                        class="fa"
                        aria-hidden="true"></i></a>';
                }
            endif;
        endif;


        $html .= '</div>
</div>
</div>
</div>
</li>';
    endwhile;
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset
    );
    echo wp_send_json($response);
    wp_die();

}


// Ajax load products into tab for theme eight

add_action('wp_ajax_get_products_by_cat_theme_nine', 'get_products_by_cat_theme_nine');
add_action('wp_ajax_nopriv_get_products_by_cat_theme_nine', 'get_products_by_cat_theme_nine');


function get_products_by_cat_theme_nine()
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
            'meta_key' => '_price',
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
            'meta_key' => '_price',
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
    $wc_pf = new WC_Product_Factory();
    $html = '';

    while ($product_query->have_posts()) : $product_query->the_post();
        $product = $wc_pf->get_product(get_the_ID());
        $product_stock_status = $product->get_stock_status();


        $html .= '<li class="ilist-25">
                                    <div class="qc-wootabs-col-4">
                                        <div class="ilist-item-main">';

        if ($product->is_on_sale()):
            $html .= '<label for="qc_on_sale"><img
            src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
        endif;
        $html .= '<div class="feature-img-box valign-center">
    <a href="' . $product->get_permalink() . '">' . $product->get_image('shop_catalog') . '</a>
</div>';

        $html .= '<div class="item-desc-text">';
        $average = $product->get_average_rating();

        if (get_option('display_rating') == 1):

            if ($average == 1) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/1_star.png" alt="">';
            } else if ($average == 0) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/no_star.png"alt="">';
            } else if ($average <= 2) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/2_star.png"alt="">';
            } else if ($average <= 3) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/3_star.png"alt="">';
            } else if ($average <= 4) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/4_star.png"alt="">';
            } else if ($average <= 5) {
                $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/5_star.png"alt="">';
            }

        endif;
        if (get_option('product_title') == 1):
            $html .= '<h3 class="item-list-title"><a
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
        </h3>';

        endif;

        $html .= '<div class="tpl_nine_short_desc"
         style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ' !important;">' . $product->get_short_description() . '</div>
</div>
<div class="item-title-text">';

        if (get_option('display_price') == 1):
            $html .= '<div class="price_tabs"
             style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
        endif;

        $html .= '<div class="qc_quantity qc_qat_style_nine">';

        if (get_option('add_quantity_select') == 1):
            if ($product_stock_status != 'outofstock'):
                $html .= '<input class="qc_minus" type="button" value="-">
        <input type="text" class="qc_product_quantity"
               name="qcld_quantity"
               value="1">
        <input class="qc_plus" type="button" value="+">';

            endif;
            if (get_option('add_cart_link') == 1):
                if ($product_stock_status != 'outofstock') {
                    $html .= '<a
                    data-p-price="' . $product->get_price() . '"
                    data-p-id="' . $product->get_id() . '"
                    href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                    class="qc-cart-btn woo_tab_s_p_add_to_cart"><i
                        class="fa fa-cart-arrow-down"
                        aria-hidden="true"></i></a>';
                } else {
                    $html .= '<a class="product_out_of_stock"
               data-p-price="' . $product->get_price() . '"
               data-p-id="' . $product->get_id() . '"
               href="#"><i
                        class="fa"
                        aria-hidden="true"></i></a>';
                }
            endif;
        endif;


        $html .= '</div>
</div>
</div>
</div>
</li>';
    endwhile;
    wp_reset_query();
    $response = array(
        'cat_id' => $cat_id,
        'html' => $html,
        'offset' => $offset
    );
    echo wp_send_json($response);
    wp_die();
}


//Load more product for theme two
add_action('wp_ajax_woo_load_more_all_tab', 'qcld_wootab_woo_load_more_all_tab');
add_action('wp_ajax_nopriv_woo_load_more_all_tab', 'qcld_wootab_woo_load_more_all_tab');


function qcld_wootab_woo_load_more_all_tab()
{


    $show_per_page = get_option('product_number');
    $theme_id = $_POST['theme_id'];
    $offset = $_POST['offset'];
    $show_sale = $_POST['show_sale'];
    $feature_only = $_POST['feature_only'];


    $tax_query = array(
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'name',
            'terms' => 'featured',
            'operator' => 'IN'
        ),);

    $show_sale_products_only = array('relation' => 'OR', array(
        // Simple products type
        'key' => '_sale_price',
        'value' => 0,
        'compare' => '>',
        'type' => 'numeric'
    ),
        array(
            // Variable products type
            'key' => '_min_variation_sale_price',
            'value' => 0,
            'compare' => '>',
            'type' => 'numeric'
        ));


    /* $args = array(
        'post_type' => array('product', 'product_variation'),
        'post_status' => 'publish',
        'offset' => $offset,
		'product_cat' => '',
        'posts_per_page' => $show_per_page,
    ); */
    $args = array('post_type' => 'product',
        'posts_per_page' => $show_per_page,
        'product_cat' => '',
        'offset' => $offset,
        'meta_key' => '_price',
        'orderby' => get_option('qc_product_sort_type'),
        'order' => get_option('qc_product_sort_order'),);

    if ($show_sale == 1) {
        $args = array_merge($args, array('meta_query' => $show_sale_products_only));
    }


    if ($feature_only == 1) {
        $args = array_merge($args, array('tax_query' => $tax_query));
    }


    $product_query = new WP_Query($args);
    $wc_pf = new WC_Product_Factory();

    $products_num = $product_query->post_count;
    if ($products_num == $show_per_page) {
        $nextOffset = intval($offset + $show_per_page);
    } else {
        $nextOffset = -1;
    }
    $html = '';


    if ($theme_id == 'theme-one') {
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
            $html .= '<div class="qc_quantity qc_qat_style_two">';
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
    } else if ($theme_id == 'theme-two') {
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


            $html .= '<div class="qc_quantity qc_qat_style_two">';
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
            $html .= '<div class="clear"></div>
                                        </div>
                                    </div>
                                ';
        endwhile;

    } else if ($theme_id == 'theme-eleven') {
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
            $html .= '<div class="qc_quantity qc_qat_style_two">';
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

    } else if ($theme_id == 'theme-nine') {
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();


            $html .= '<li class="ilist-25">
                                    <div class="qc-wootabs-col-4">
                                        <div class="ilist-item-main">';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img
            src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;
            $html .= '<div class="feature-img-box valign-center">
    <a href="' . $product->get_permalink() . '">' . $product->get_image('shop_catalog') . '</a>
</div>';

            $html .= '<div class="item-desc-text">';
            $average = $product->get_average_rating();

            if (get_option('display_rating') == 1):

                if ($average == 1) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/1_star.png" alt="">';
                } else if ($average == 0) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/no_star.png"alt="">';
                } else if ($average <= 2) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/2_star.png"alt="">';
                } else if ($average <= 3) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/3_star.png"alt="">';
                } else if ($average <= 4) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/4_star.png"alt="">';
                } else if ($average <= 5) {
                    $html .= '<img src="' . QC_WOO_TAB_IMAGE_URL . '/5_star.png"alt="">';
                }

            endif;
            if (get_option('product_title') == 1):
                $html .= '<h3 class="item-list-title"><a
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;"
                href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
        </h3>';

            endif;

            $html .= '<div class="tpl_nine_short_desc"
         style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ' !important;">' . $product->get_short_description() . '</div>
</div>
<div class="item-title-text">';

            if (get_option('display_price') == 1):
                $html .= '<div class="price_tabs"
             style="font-size: ' . get_option('product_content_text_size') . 'px; color: ' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
            endif;

            $html .= '<div class="qc_quantity qc_qat_style_nine">';

            if (get_option('add_quantity_select') == 1):
                if ($product_stock_status != 'outofstock'):
                    $html .= '<input class="qc_minus" type="button" value="-">
        <input type="text" class="qc_product_quantity"
               name="qcld_quantity"
               value="1">
        <input class="qc_plus" type="button" value="+">';

                endif;
                if (get_option('add_cart_link') == 1):
                    if ($product_stock_status != 'outofstock') {
                        $html .= '<a
                    data-p-price="<?php echo $product->get_price(); ?>"
                    data-p-id="' . $product->get_id() . '"
                    href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                    class="qc-cart-btn woo_tab_s_p_add_to_cart"><i
                        class="fa fa-cart-arrow-down"
                        aria-hidden="true"></i></a>';
                    } else {
                        $html .= '<a class="product_out_of_stock"
               data-p-price="' . $product->get_price() . '"
               data-p-id="' . $product->get_id() . '"
               href="#"><i
                        class="fa"
                        aria-hidden="true"></i></a>';
                    }
                endif;
            endif;


            $html .= '</div>
</div>
</div>
</div>
</li>';
        endwhile;

    } else if ($theme_id == 'theme-four') {
        $add_to_cart_text = get_option('change_add_to_cart_button_text');
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<li style="background-color:' . get_option('container_background_color') . '">
                                    <div class="qc-product-list">';
            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;
            $html .= '<div class="qc-product-details-left">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-product-details-right">';

            if (get_option('product_title') == 1):
                $html .= '<h2><a style="color: ' . get_option('product_title_text_color') . ';font-size: ' . get_option('change_title_text_size') . 'px;" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;
            $average = $product->get_average_rating();

            if (get_option('display_rating') == 1):
                $html .= '<div class="qcld_woo_product_rating">';
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
                $html .= '</div>';

            endif;

            if (get_option('display_price') == 1):
                $html .= '<h3 style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">' . $product->get_price_html() . '</h3>';
            endif;

            if (get_option('add_cart_link') == 1):
                if ($product_stock_status != 'outofstock') {
                    if (!empty($add_to_cart_text)) {
                        $anchorText = $add_to_cart_text;
                    } else {
                        $anchorText = "Add To Cart";
                    }


                    if (get_option('add_quantity_select') == 1):

                        $html .= ' <div class="qc_quantity">';
                        $html .= '<input class="qc_minus" type="button" value="-">           
                 <input id="qty_' . $product->get_id() . '" type="text" class="qc_product_quantity" name="qcld_quantity" value="1">
                 <input class="qc_plus" type="button" value="+">';
                    endif;

                    $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"
                                               class="qc-cart-btn woo_tab_s_p_add_to_cart">' . $anchorText . '</a>
                 </div>';


                    $html .= '</div>
                                    </div>';


                } else {
                    $html .= '<a id="' . $product->get_id() . '" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"
                                               class="qc-cart-btn">Out Of Stock</a>';
                }
            endif;
            $html .= '</li>';
        endwhile;
        wp_reset_query();

    } else if ($theme_id == 'theme-five') {
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<li>
                            <div class="qc_tabs_10_style_box">';
            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;


            if (get_option('product_title') == 1):
                $html .= '<h2><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
            endif;

            if (get_option('display_price') == 1):

                $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
            endif;
            $html .= '<div class="qc_ratting">';
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
            $html .= '</div>
                                        <div class="divider"></div>
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>

                                    </div>';


            if ($product_stock_status != 'outofstock') {


                $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
                if (get_option('product_title') == 1):
                    $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
                endif;

                if (get_option('display_price') == 1):
                    $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


                $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
                endif;

                $html .= '<div class="qc_quantity qc_qat_style_five">';

                if (get_option('add_quantity_select') == 1):
                    $html .= '<input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
                endif;

                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                        <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                    class="fa fa-cart-arrow-down"
                                                                    aria-hidden="true"></i></a>';

                endif;


                $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';


            } else {
                $html .= '<div class="qc_tabs_10_style_box_hover">
                                        <div class="qc_tabs_10_style_box_details">';
                if (get_option('product_title') == 1):
                    $html .= '<h2><a style="font-size: ' . get_option('product_title_text-size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a></h2>';
                endif;

                if (get_option('display_price') == 1):
                    $html .= '<div class="qc_price" style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ';">' . $product->get_price_html() . '</div>';
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


                $html .= '</div>
                                            <div class="qc_tabs_10_style_box_icon">
                                                <ul>';

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i
                                                                    class="fa fa-link" aria-hidden="true"></i></a></li>';
                endif;

                $html .= '<div class="qc_quantity qc_qat_style_five qc_out_of_stock_container">';


                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                        <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href=""><i
                                                                    class="fa"
                                                                    aria-hidden="true"></i></a>';

                endif;


                $html .= '</ul>
                                            </div>
                                        </div>
                                    </div></div>';
            }


            $html .= '</li>';
        endwhile;
    } else if ($theme_id == 'theme-six') {
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<div class="pro_list_04">
                                    <div class="slider">
                                        <div class="pro_item_list">' . $product->get_image('shop_catalog') . '</div>';
            $average = $product->get_average_rating();


            if (get_option('display_rating') == 1):
                $html .= '<div class="qcld_woo_product_rating">';
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
                $html .= '</div>';

            endif;
            $html .= '</div>';


            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;
            $html .= '<div class="meta">';


            if (get_option('product_title') == 1):
                $html .= '<h3 class="pro_title_04"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                            </h3>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<span style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_price_04">' . $product->get_price_html() . '</span>';
            endif;
            $html .= '</div>';
            if ($product_stock_status != 'outofstock') {
                $html .= '<ul class="pro_icon action action_button action_buy">';

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

                endif;

                $html .= '<div class="qc_quantity qc_qat_style_six">';

                if (get_option('add_quantity_select') == 1):
                    $html .= '                             <input class="qc_minus" type="button" value="-">
                             <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                    value="1">
                             <input class="qc_plus" type="button" value="+">';
                endif;

                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                <a class="woo_tab_s_p_add_to_cart" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                            class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
                                            ';


                endif;

                $html .= '</ul>';
            } else {
                $html .= '<ul class="pro_icon action action_button action_buy">';

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i class="fa fa-link"
                                                                                                aria-hidden="true"></i></a>
                                            </li>';

                endif;

                $html .= '<div class="qc_quantity qc_qat_style_six">';


                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                <a class="product_out_of_stock" data-p-id="' . $product->get_id() . '" data-p-price="' . $product->get_price() . '" href="#"><i
                                                            class="fa" aria-hidden="true"></i></a>
                                            ';


                endif;

                $html .= '</ul>';
            }

            $html .= '</div></div>';
        endwhile;
    } else if ($theme_id == 'theme-seven') {
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<li>
                                        <div class="pro_list_12_box">
                                            <div class="pro_list_12_img">' . $product->get_image('shop_catalog') . '</div>';
            if ($product->is_on_sale()) {
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            }

            if (get_option('product_title') == 1):
                $html .= '<h2 class="pro_list_12_title"><a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . '"
                                                            href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';

            endif;
            $average = $product->get_average_rating();

            if (get_option('display_rating') == 1):
                $html .= '<div class="qcld_woo_product_rating">';
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
                $html .= '</div>';

            endif;

            if (get_option('display_price') == 1):
                $html .= '<div style="color: ' . get_option('product_content_text_color') . ';font-size:' . get_option('product_content_text_size') . 'px;" class="pro_list_12_price">' . $product->get_price_html() . '</div>';
            endif;
            if ($product_stock_status != 'outofstock') {

                $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

                if ($product->is_on_sale()):
                    $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
                endif;

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
                endif;


                $html .= '<div class="qc_quantity qc_qat_style_seven">';

                if (get_option('add_quantity_select') == 1):
                    $html .= '                          <input class="qc_minus" type="button" value="-">
                                                                <input type="text" class="qc_product_quantity"
                                                                       name="qcld_quantity"
                                                                       value="1">
                                                                <input class="qc_plus" type="button" value="+">';
                endif;

                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                            <a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '"><i
                                                                        aria-hidden="true"
                                                                        class="fa fa-cart-arrow-down"></i></a>';

                endif;

                $html .= '</div></ul>

                                            </div>';

            } else {
                $html .= '<div class="pro_list_12_box_icon">
                                                <ul>';

                if ($product->is_on_sale()):
                    $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
                endif;

                if (get_option('product_title') == 1):
                    $html .= '<li><a href="' . $product->get_permalink() . '"><i aria-hidden="true"
                                                                                                   class="fa fa-link"></i></a>
                                                        </li>';
                endif;


                $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_seven">';


                if (get_option('add_cart_link') == 1):

                    $html .= '
                                                            <a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '" href="#"><i
                                                                        aria-hidden="true"
                                                                        class="fa"></i></a>';

                endif;

                $html .= '</div></ul>

                                            </div>';
            }
            $html .= '</div>
                                    </li>';
        endwhile;
    } else if ($theme_id == 'theme-eight') {
        $add_to_cart_text = get_option('change_add_to_cart_button_text');
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<li>
                                    <div class="qc_tabs_10_style_box">
                                        <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>
                                        <div class="qc-tabs-style13-hover">
                                            <div class="pro_img">' . $product->get_image('shop_catalog') . '</div>';
            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;

            if (get_option('product_title') == 1):
                $html .= '<h2>
                                                    <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';" href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                                </h2>';
            endif;

            if (get_option('display_price') == 1):
                $html .= '<div style="font-size: ' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . ' !important;" class="qc_price">' . $product->get_price_html() . '</div>';

            endif;
            if (get_option('display_rating') == 1):

                $html .= '<div class="qc_ratting">';
                $average = $product->get_average_rating();
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


            $html .= '<div class="qc_quantity qc_qat_style_eight">';
            if ($product_stock_status != 'outofstock') {
                if (get_option('add_quantity_select') == 1):
                    $html .= ' <input class="qc_minus" type="button" value="-">
                              <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                     value="1">
                              <input class="qc_plus" type="button" value="+">';
                endif;

                if (get_option('add_cart_link') == 1):

                    $html .= '<a class="woo_tab_s_p_add_to_cart" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="' . $wc_pf->get_product(get_the_ID())->add_to_cart_url() . '">';
                    if (!empty($add_to_cart_text)) {
                        $html .= $add_to_cart_text;
                    } else {
                        $html .= 'Add To Cart';
                    }
                    $html .= '</a>';
                endif;
            } else {


                if (get_option('add_cart_link') == 1):

                    $html .= '<a class="product_out_of_stock" data-p-price="' . $product->get_price() . '" data-p-id="' . $product->get_id() . '"
                                                            href="#">';

                    $html .= 'Out Of Stock</a>';
                endif;
            }
            $html .= '</div>
                                    </div>
                                </li>';
        endwhile;
    } else if ($theme_id == 'theme-three') {
        while ($product_query->have_posts()) : $product_query->the_post();
            $product = $wc_pf->get_product(get_the_ID());
            $product_stock_status = $product->get_stock_status();
            $html .= '<li>';

            if ($product->is_on_sale()):
                $html .= '<label for="qc_on_sale"><img src="' . QC_WOO_TAB_IMAGE_URL . '/sale.png"></label>';
            endif;


            $html .= '<div class="wootabs_img">' . $product->get_image('shop_catalog') . '</div>';

            if ($product_stock_status != 'outofstock') {


                $html .= '<div class="qc_pro_details">';

                if (get_option('add_cart_link') == 1):
                    $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
                endif;


                $html .= '<div class="qc_quantity qc_qat_style_three">';

                if (get_option('add_quantity_select') == 1):
                    $html .= '                                                <input class="qc_minus" type="button" value="-">
                                                <input type="text" class="qc_product_quantity" name="qcld_quantity"
                                                       value="1">
                                                <input class="qc_plus" type="button" value="+">';
                endif;

                if (get_option('add_cart_link') == 1):


                    $html .= '<a data-p-id="' . $product->get_id() . '" class="woo_tab_s_p_add_to_cart" href="' . $product->add_to_cart_url() . '"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>';
                endif;


                $html .= '</ul>
             </div>';
            } else {
                $html .= '<div class="qc_pro_details">';

                if (get_option('add_cart_link') == 1):
                    $html .= '<ul><li><a href="' . $product->get_permalink() . '"><i class="fa fa-link" aria-hidden="true"></i></a></li>';
                endif;


                $html .= '<div class="qc_out_of_stock_container qc_quantity qc_qat_style_three">';


                if (get_option('add_cart_link') == 1):


                    $html .= '<a data-p-id="' . $product->get_id() . '" class="product_out_of_stock" href="#"><i class="fa" aria-hidden="true"></i></a>';
                endif;


                $html .= '</ul>
             </div>';
            }
            if (get_option('product_title')):
                $html .= '<h2>
                                            <a style="font-size: ' . get_option('change_title_text_size') . 'px;color:' . get_option('product_title_text_color') . ';"
                                               href="' . $product->get_permalink() . '">' . $product->get_title() . '</a>
                                        </h2>';
            endif;

            $average = $product->get_average_rating();

            if (get_option('display_rating') == 1):
                $html .= '<div class="qcld_woo_product_rating">';
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

                $html .= '</div>';
            endif;
            $html .= '<div class="woo_price" style="font-size:' . get_option('product_content_text_size') . 'px;color:' . get_option('product_content_text_color') . '">';


            if (get_option('display_price') == 1):
                $html .= $product->get_price_html();
            endif;
            $html .= '</div>';
            $html .= '</li>';
        endwhile;
    }
    wp_reset_query();
    $response = array(


        'show_per_page' => $show_per_page,
        'product_num' => $products_num,
        'html' => $html,
        'offset' => $nextOffset,
        'show_sale' => $show_sale
    );
    echo wp_send_json($response);
    wp_die();

}


add_action('wp_footer', 'woo_tab_load_footer_html');

function woo_tab_load_footer_html()
{
    ?>
    <style>
        <?php if(get_option('custom_global_css')!=''){echo get_option('custom_global_css');}?>
    </style>
<?php }


add_action('wp_ajax_wootab_delete_all_options_for_uninstall', 'wootab_delete_all_options_for_uninstall');
add_action('wp_ajax_nopriv_wootab_delete_all_options_for_uninstall', 'wootab_delete_all_options_for_uninstall');

function wootab_delete_all_options_for_uninstall()
{


    delete_option('product_add_to_cart_button_color');
    delete_option('product_category_filter_button_color_hover');
    delete_option('product_category_filter_button_color');
    delete_option('product_price_font_color');
    delete_option('product_box_hover_color');
    delete_option('product_price_font_size');
    delete_option('product_ratting_color');
    delete_option('display_category_image');
    delete_option('product_category_text_font_size');
    delete_option('product_category_text_font_color');
    delete_option('product_category_button_active_color');


    delete_option('custom_global_css');
    delete_option('product_number');
    delete_option('category_order');
    delete_option('display_price');
    delete_option('display_rating');
    delete_option('product_title');
    delete_option('add_cart_link');
    delete_option('add_quantity_select');
    delete_option('success_alert_message');
    delete_option('title_text');
    delete_option('change_load_more_text');
    delete_option('container_background_color');
    delete_option('product_title_text_color');
    delete_option('max_char_per_cat');
    delete_option('change_title_text_size');
    delete_option('product_content_text_size');
    delete_option('show_all');
    delete_option('tabbed_theme');
    delete_option('selected_categories');
    delete_option('category_filters_border_color');
    delete_option('product_content_text_color');
    delete_option('qc_add_to_cart_type');


    // Set the default value

    update_option('qc_add_to_cart_type', 'ajax');
    update_option('product_number', 20);
    update_option('add_quantity_select', 1);
    update_option('display_price', 1);
    update_option('add_quantity_select', 1);
    update_option('display_price', 1);
    update_option('display_rating', 1);
    update_option('product_title', 1);
    update_option('add_cart_link', 1);
    update_option('max_char_per_cat', 25);
    update_option('tabbed_theme', 'two');
    update_option('show_all', 1);
    update_option('category_style', 2);
    update_option('category_order', 'asc');
    update_option('success_alert_message', 'Product Has Successfully Been Added To Your Cart !');
    update_option('change_add_to_cart_button_text', 'Add To Cart');
    update_option('change_load_more_text', 'Load More');
    update_option('title_text', 'Good Job');
    update_option('qc_product_sort_type', 'title');
    update_option('qc_product_sort_order', 'asc');


    $html = 'Reset all options to default successfully.';
    wp_send_json($html);
    wp_die();
}

register_activation_hook(__FILE__, 'woo_tab_demo_content');

function woo_tab_demo_content()
{

    if (get_option('product_number') == '') {
        update_option('product_number', 15);
    }
    if (get_option('add_quantity_select') == '') {
        update_option('add_quantity_select', 1);
    }
    if (get_option('display_price') == 1) {
        update_option('display_price', 1);
    }
    if (get_option('add_quantity_select') == 1) {
        update_option('add_quantity_select', 1);
    }
    if (get_option('display_price') == 1) {
        update_option('display_price', 1);
    }
    if (get_option('display_rating') != 1) {
        update_option('display_rating', 1);
    }
    if (get_option('product_title') != 1) {
        update_option('product_title', 1);
    }
    if (get_option('add_cart_link') != 1) {
        update_option('add_cart_link', 1);
    }
    if (get_option('max_char_per_cat') == '') {
        update_option('max_char_per_cat', 25);
    }
    if (get_option('tabbed_theme') == '') {
        update_option('tabbed_theme', 'five');
    }
    if (get_option('show_all') != 1) {
        update_option('show_all', 1);
    }
    if (get_option('category_style') == '') {
        update_option('category_style', 2);
    }
    if (get_option('category_order') != '') {
        update_option('category_order', 'asc');
    }
    if (get_option('success_alert_message') == '') {
        update_option('success_alert_message', 'Product Has Successfully Been Added To Your Cart !');
    }
    if (get_option('change_add_to_cart_button_text') == '') {
        update_option('change_add_to_cart_button_text', 'Add To Cart');
    }
    if (get_option('change_load_more_text') == '') {
        update_option('change_load_more_text', 'Load More');
    }
    if (get_option('title_text') == '') {
        update_option('title_text', 'Good Job');
    }
    if (get_option('qc_product_sort_order') == '') {
        update_option('qc_product_sort_order', 'asc');
    }
    if (get_option('qc_product_sort_type') == '') {
        update_option('qc_product_sort_type', 'title');
    }
    if (get_option('qc_add_to_cart_type') == '') {
        update_option('qc_add_to_cart_type', 'ajax');
    }

}


include_once('functions-theme-ten.php');
include_once('functions-theme-eleven.php');
