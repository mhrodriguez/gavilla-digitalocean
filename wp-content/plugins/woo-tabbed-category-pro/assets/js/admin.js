(function ($) {
    'use strict';
    $(function () {
        $('#categories').select2({width: '20%'});
        $('.container-bg-color').wpColorPicker();


        jQuery('.qc_togglebox > label').click(function () {
            jQuery(this).toggleClass('active');
            var myFor = jQuery(this).attr('for');
            var myTarget = myFor.replace('toggle', 'content');


            //jQuery('.qc_togglebox > label').removeClass('active');
            jQuery('.qc_togglebox .wo_tabs_inner').slideUp(500);
            jQuery('.qc_togglebox .wo_tabs_inner').removeClass('active');

            if (jQuery(this).hasClass('active')) {
                //jQuery(this).addClass('active');
                jQuery('#' + myTarget).slideDown(500);
                jQuery('#' + myTarget).addClass('active');

            } else {

            }

        })


        //Reset to defualt all options
        jQuery('#woo-rest-all-options-default').on('click', function () {
            var returnDefualt = confirm("Are you sure you want to reset all options to Default? Resetting Will Delete All Saved Settings,languages etc.");
            if (returnDefualt == true) {
                var data = {
                    'action': 'wootab_delete_all_options_for_uninstall'
                };
                jQuery.post(ajax_object.ajax_url, data, function (response) {
                    alert(response);
                    window.location.reload();
                });
            }
        });


        $('.woo_tab_custom_icon_button').click(function (e) {
            e.preventDefault();
            var image = wp.media({
                title: 'Custom Icon',
                // mutiple: true if you want to upload multiple files at once
                multiple: false
            })
                .open()
                .on('select', function (e) {
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the hidden field value and img src.
                    $('#woo_tab_custom_icon_src').attr('src', image_url);
                    $('#woo_tab_custom_icon_path').val(image_url);
                });
        });


    });

})(jQuery);






