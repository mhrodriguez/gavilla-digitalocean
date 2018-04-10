;(function ($) {
    tinymce.PluginManager.add('qcwt_short_btn', function (editor, url) {
        var shortcodeValues = [];

        editor.addButton('qcwt_short_btn', {
            //type: 'listbox',
            title: 'Add Woo TAB Shortcode',
            text: 'Woo TAB',
            icon: false,
            //image : url + '/16_pixel.png',
            onclick: function (e) {
                $.post(
                    ajaxurl,
                    {
                        action: 'show_shortcodes'

                    },
                    function (data) {
                        $('#wpwrap').append(data);
                    }
                )
            },
            values: shortcodeValues
        });
    });

    var selector = '';

    $(document).on('click', '.modal-content .close', function () {
        $(this).parent().parent().remove();
    }).on('click', '#add_shortcode', function () {
        var category = $('#qcwt_category_select_shortcode').val();
        var num_product = $('#qcwt_number_of_product').val();

        var theme = $('#qcwt_theme_shortcode').val();
        var shortcodedata = '[wtcpl-product-cat ';


        if (category !== '' || category == 'none') {
            shortcodedata += ' category_id="' + category + '"';


            if (theme !== '') {
                shortcodedata += ' theme="' + theme + '"';
            }
            if (num_product !== '') {
                shortcodedata += ' num_product="' + num_product + '"';
            }

            shortcodedata += ']';
            tinyMCE.activeEditor.selection.setContent(shortcodedata);
            $('#sm-modal').remove();
        } else {
            alert('Please Select Post!');
            return;
        }

    });
}(jQuery));