var $ = jQuery;

function cs_search_view_change(id) {
    "use strict";
    if (jQuery('#' + id).attr('value') == 'on') {
        jQuery('#cs_search_view_area').show();
    } else {
        jQuery('#cs_search_view_area').hide();
    }
}

/**
 * candidate switch map
 */
function cs_candidate_map_switch(value) {
    "use strict";
    if (value == 'yes') {
        jQuery("#cs_cand_map_area").show();
    } else {
        jQuery("#cs_cand_map_area").hide();
    }
}

function cs_single_city_change(value) {
    "use strict";
    if (value == 'single_city') {
        jQuery('#cs_single_city_area').show();
    } else {
        jQuery('#cs_single_city_area').hide();
    }
}

jQuery("[id^=map_canvas]").css("pointer-events", "none");
jQuery("[id^=cs-map-location]").css("pointer-events", "none");

var onMapMouseleaveHandler = function (event) {
    var that = jQuery(this);
    that.on('click', onMapClickHandler);
    that.off('mouseleave', onMapMouseleaveHandler);
    jQuery("[id^=map_canvas]").css("pointer-events", "none");
    jQuery("[id^=cs-map-location]").css("pointer-events", "none");
}

var onMapClickHandler = function (event) {
    var that = jQuery(this);
    // Disable the click handler until the user leaves the map area
    that.off('click', onMapClickHandler);

    // Enable scrolling zoom
    that.find('[id^=map_canvas]').css("pointer-events", "auto");
    that.find('[id^=cs-map-location]').css("pointer-events", "auto");

    // Handle the mouse leave event
    that.on('mouseleave', onMapMouseleaveHandler);
}

jQuery(document).on('change', '.geo-search-location', function () {
    jQuery(this).parents('form.side-loc-srch-form').submit();
});

jQuery(document).on('keyup', '.side-location-field', function (event) {
    if (event.which == 13 || event.keyCode == 13) {
        jQuery(this).parents('form.side-loc-srch-form').submit();
    }
});

/*
 * Enable map zooming with mouse scroll when the user clicks the map
 */
jQuery('.cs-map-section').on('click', onMapClickHandler);

jQuery('body').on('change', '.cs-uploadimg', function (e) {
    jQuery('#cs_employer_img_box').show();
    var img_path = URL.createObjectURL(e.target.files[0]);
    var file_type = e.target.files[0]["type"];
    var validimage = 0;
    if (file_type == "image/jpeg" || file_type == "image/jpg" || file_type == "image/png") {
        validimage = 1;
    } else {
        validimage = 0;
        jQuery('#cs_employer_profile_img_msg').addClass("error-msg");
        jQuery('#cs_employer_img_img').attr('src', "");
        jQuery('#cs_employer_img').attr('value', "");
    }

    // get width and height
    var _URL = window.URL || window.webkitURL;
    var files = e.target.files[0];


    var img = new Image(),
            fileSize = Math.round(files.size / 1024);
    if (fileSize >= 1024) {

        validimage = 0;
        jQuery('#cs_employer_profile_img_msg').addClass("error-msg");
        jQuery('#cs_employer_img_img').attr('src', "");
        jQuery('#cs_employer_img').attr('value', "");

    } else {
        validimage = 1;
    }
    img.onload = function () {
        var width = this.width,
                height = this.height,
                imgsrc = this.src;
        if (width >= 270 && height >= 210) {
            validimage = 1;
        } else {
            validimage = 0;
            jQuery('#cs_employer_profile_img_msg').addClass("error-msg");

            jQuery('#cs_employer_img_img').attr('src', "");
            jQuery('#cs_employer_img').attr('value', "");
        }

    };
    img.src = _URL.createObjectURL(files);
    // end get width and height

    if (validimage == 1) {
        jQuery('#cs_employer_profile_img_msg').removeClass("error-msg");
        jQuery('#cs_employer_img_img').attr('src', img_path);
        jQuery('#cs_employer_img').attr('value', img_path);

    }

});

jQuery('body').on('change', '.cs-cover-uploadimg', function (e) {
    jQuery('#cs_cover_employer_img_box').show();
    var img_path = URL.createObjectURL(e.target.files[0]);
    var file_type = e.target.files[0]["type"];
    var validimage = 0;
    if (file_type == "image/jpeg" || file_type == "image/jpg" || file_type == "image/png") {
        validimage = 1;
    } else {
        validimage = 0;
        jQuery('#cs_employer_profile_cover_msg').addClass("error-msg");

        jQuery('#cs_cover_employer_img_img').attr('src', "");
        jQuery('#cs_cover_employer_img').attr('value', "");
    }

    var _URL = window.URL || window.webkitURL;
    var files = e.target.files[0];
    var img = new Image(),
            fileSize = Math.round(files.size / 1024);
    if (fileSize >= 1024) {
        validimage = 0;
        jQuery('#cs_employer_profile_cover_msg').addClass("error-msg");
        jQuery('#cs_cover_employer_img_img').attr('src', "");
        jQuery('#cs_cover_employer_img').attr('value', "");
    } else {
        validimage = 1;
    }
    img.onload = function () {
        var width = this.width,
                height = this.height,
                imgsrc = this.src;
        if (width >= 1600 && height >= 400) {
            validimage = 1;
        } else {
            validimage = 0;
            jQuery('#cs_employer_profile_cover_msg').addClass("error-msg");
            jQuery('#cs_cover_employer_img_img').attr('src', "");
            jQuery('#cs_cover_employer_img').attr('value', "");
        }

    };
    img.src = _URL.createObjectURL(files);
    // end get width and height

    if (validimage == 1) {
        jQuery('#cs_employer_profile_cover_msg').removeClass("error-msg");
        jQuery('#cs_cover_employer_img_img').attr('src', img_path);
        jQuery('#cs_cover_employer_img').attr('value', img_path);
    }

});

jQuery('body').on('change', '.cs-candi-cover-uploadimg', function (e) {
    jQuery('#cs_cover_candidate_img_box').show();
    var img_path = URL.createObjectURL(e.target.files[0]);
    var file_type = e.target.files[0]["type"];
    var validimage = 0;
    if (file_type == "image/jpeg" || file_type == "image/jpg" || file_type == "image/png") {
        validimage = 1;
    } else {
        validimage = 0;
        jQuery('#cs_candidate_profile_cover_msg').addClass("error-msg");

        jQuery('#cs_cover_candidate_img_img').attr('src', "");
        jQuery('#cs_cover_candidate_img').attr('value', "");
    }

    // get width and height
    var _URL = window.URL || window.webkitURL;
    var files = e.target.files[0];


    var img = new Image(),
            fileSize = Math.round(files.size / 1024);
    if (fileSize >= 1024) {

        validimage = 0;
        jQuery('#cs_candidate_profile_cover_msg').addClass("error-msg");
        jQuery('#cs_cover_candidate_img_img').attr('src', "");
        jQuery('#cs_cover_candidate_img').attr('value', "");

    } else {
        validimage = 1;
    }
    img.onload = function () {
        var width = this.width,
                height = this.height,
                imgsrc = this.src;
        if (width >= 1600 && height >= 400) {
            validimage = 1;
        } else {
            validimage = 0;
            jQuery('#cs_candidate_profile_cover_msg').addClass("error-msg");

            jQuery('#cs_cover_candidate_img_img').attr('src', "");
            jQuery('#cs_cover_candidate_img').attr('value', "");
        }

    };
    img.src = _URL.createObjectURL(files);
    // end get width and height

    if (validimage == 1) {
        jQuery('#cs_candidate_profile_cover_msg').removeClass("error-msg");


        jQuery('#cs_cover_candidate_img_img').attr('src', img_path);
        jQuery('#cs_cover_candidate_img').attr('value', img_path);

    }

});

jQuery('body').on('change', '.cs-uploadimgjobseek', function (e) {
    jQuery('#cs_user_img_box').show();
    var img_path = URL.createObjectURL(e.target.files[0]);
    var file_type = e.target.files[0]["type"];
    var validimage = 0;
    if (file_type == "image/jpeg" || file_type == "image/jpg" || file_type == "image/png") {
        validimage = 1;
    } else {
        validimage = 0;
        jQuery('#cs_candidate_profile_img_msg').addClass("error-msg");
        jQuery('#cs_user_img_img').attr('src', "");
        jQuery('#cs_user_img').attr('value', "");
    }
    // get width and height
    var _URL = window.URL || window.webkitURL;
    var files = e.target.files[0];


    var img = new Image(),
            fileSize = Math.round(files.size / 1024);
    if (fileSize >= 1024) {

        validimage = 0;
        jQuery('#cs_candidate_profile_img_msg').addClass("error-msg");
        jQuery('#cs_user_img_img').attr('src', "");
        jQuery('#cs_user_img').attr('value', "");
    } else {
        validimage = 1;
    }
    img.onload = function () {
        var width = this.width,
                height = this.height,
                imgsrc = this.src;

        if (width >= 270 && height >= 210) {
            validimage = 1;
        } else {
            validimage = 0;
            jQuery('#cs_candidate_profile_img_msg').addClass("error-msg");
            jQuery('#cs_user_img_img').attr('src', "");
            jQuery('#cs_user_img').attr('value', "");
        }

    };
    img.src = _URL.createObjectURL(files);
    // end get width and height
    if (validimage == 1) {
        jQuery('#cs_candidate_profile_img_msg').removeClass("error-msg");

        jQuery('#cs_user_img_img').attr('src', img_path);
        jQuery('#cs_user_img').attr('value', img_path);

    }

});

jQuery('body').on('change', '.cs-uploadimgjob', function (e) {

    var img_path = URL.createObjectURL(e.target.files[0]);
    var file_type = e.target.files[0]["type"];
    var validimage = 0;
    if (file_type == "image/jpeg" || file_type == "image/jpg" || file_type == "image/png") {
        validimage = 1;
    } else {
        validimage = 0;
        jQuery('#cs_employer_postjob_img_msg').addClass("error-msg");
        jQuery('#job_img_img').attr('src', "");
        jQuery('#job_img').attr('value', "");
    }

    // get width and height
    var _URL = window.URL || window.webkitURL;
    var files = e.target.files[0];


    var img = new Image(),
            fileSize = Math.round(files.size / 1024);
    if (fileSize >= 1024) {

        validimage = 0;
        jQuery('#cs_employer_postjob_img_msg').addClass("error-msg");
        jQuery('#job_img_img').attr('src', "");
        jQuery('#job_img').attr('value', "");
    } else {
        validimage = 1;
    }
    img.onload = function () {
        var width = this.width,
                height = this.height,
                imgsrc = this.src;
        if (width >= 270 && height >= 210) {
            validimage = 1;
        } else {
            validimage = 0;
            jQuery('#cs_employer_postjob_img_msg').addClass("error-msg");
            jQuery('#job_img_img').attr('src', "");
            jQuery('#job_img').attr('value', "");
        }

    };
    img.src = _URL.createObjectURL(files);
    // end get width and height

    if (validimage == 1) {
        jQuery('#cs_employer_postjob_img_msg').removeClass("error-msg");

        jQuery('#job_img_img').attr('src', img_path);
        jQuery('#job_img').attr('value', img_path);

    }
});


$("#postjobs, #editjob").on('change', 'input, select, textarea', function () {
    var $ = jQuery;
    if ($(this).val() != '') {
        $(this).css({"border": "1px solid #e4e4e4"});
    }
});

$(".cs-post-pkg").on('change', 'input, select, textarea', function () {
    var $ = jQuery;
    if ($(this).val() != '') {
        $(this).css({"border": "1px solid #e4e4e4"});
    }
});

$(document).on('click', '.cs-all-gates li', function () {
    var $ = jQuery;
    jQuery('.cs-all-gates').find('li > input:radio').prop("checked", false);
    jQuery('.cs-all-gates').find('li').removeClass('active');

    $(this).find('input:radio').prop("checked", true);
    $(this).addClass('active');
});

$('.cs-post-pkg').on('click', '.cs-all-gates li', function () {
    var $ = jQuery;
    jQuery('.cs-all-gates').find('li > input:radio').prop("checked", false);
    jQuery('.cs-all-gates').find('li').removeClass('active');

    $(this).find('input:radio').prop("checked", true);
    $(this).addClass('active');
});

$('.slct-cv-pkg').click(function () {

    $(this).next('input[type="radio"]').prop("checked", true);
});

$("#postjobs, #editjob").on('click', '[id^="job_pckge_"], #cs_job_featured', function (e) {
    var $ = jQuery;
    cs_job_pricing();
});

$("#postjobs, #editjob").on('click', '.cs-check-tabs', function (e) {
    var $ = jQuery;
    var cs_ad_form = $('form#cs-emp-form');
    var cs_form_validity = 'valid';
    var employer_status = $('form#cs-emp-form').attr('employer-status');
    var validation_message = jQuery("#employer-dashboard").data('validationmsg');
    $(":input[required]").each(function () {
        if (!cs_ad_form[0].checkValidity()) {
            cs_form_validity = 'invalid';
            if ($(this).val() == '' || $(this).val() === null) {
                if( $(this).attr('type') === 'text' || $(this).attr('type') === 'textarea' ){
                    $(this).css({"border": "1px solid #ff0000"});
                }else{
                    $(this).parent().css({"border": "1px solid #ff0000"});
                }
            }else{
                if( $(this).attr('type') === 'text' || $(this).attr('type') === 'textarea' ){
                    $(this).css({"border": "1px solid #e4e4e4"});
                }else{
                    $(this).parent().css({"border": "1px solid #e4e4e4"});
                }
            }
        } else {
            if ($(this).val() != '') {
                if( $(this).attr('type') === 'text' || $(this).attr('type') === 'textarea' ){
                    $(this).css({"border": "1px solid #e4e4e4"});
                }else{
                    $(this).parent().css({"border": "1px solid #e4e4e4"});
                }
            }
            cs_form_validity = 'valid';
        }
    });
    if (cs_form_validity == 'valid') {
        if( employer_status != '' ){
            jQuery('#cs_alerts').html('<div class="cs-remove-msg error"><i class="icon-warning2"></i>' + employer_status + '</div>');
            classes = jQuery('#cs_alerts').attr('class');
            classes = classes + " active";
            jQuery('#cs_alerts').addClass(classes);
            setTimeout(function () {
                jQuery('#cs_alerts').removeClass("active");
            }, 4000);
            var cs_detail_tab = $('#cs-detail-tab');
            $('.cs-post-job .tabs-nav').find('li').removeClass('active');
            cs_detail_tab.parent().parent('li').addClass('active');
            var active = $('.cs-post-job').find('.tabs-nav .active a').attr('href');
            $('.cs-post-job .tabs-content').find('.tabs').hide();
            $('.cs-post-job .tabs-content').find('div#' + active).show();
            return false;
        }else{
            if (!jQuery(this).hasClass('cs-confrmation-tab') && !jQuery('.cs-post-job').hasClass('cs-prevent')) {
                $('.cs-post-job .tabs-nav').find('li').removeClass('active');
                if ($(this).hasClass('acc-submit')) {
                    $('#cs_pakg_step').addClass('active');
                } else {
                    $(this).parent().parent('li').addClass('active');
                }
                var active = $('.cs-post-job').find('.tabs-nav .active a').attr('href');
                $('.cs-post-job .tabs-content').find('.tabs').hide();
                $('.cs-post-job .tabs-content').find('div#' + active).show();
                if ($('.cs-post-job').hasClass('cs-post-free-job')) {
                    cs_ad_form.submit();
                }
                return false;
            } else {
                if (jQuery('#cs_emp_email').hasClass('has-error'))
                    jQuery("#cs_emp_email").css({"border": "1px solid #ff0000"});
                if (jQuery('#cs_user').hasClass('has-error'))
                    jQuery("#cs_user").css({"border": "1px solid #ff0000"});

                jQuery('#cs_alerts').html('<div class="cs-remove-msg error"><i class="icon-warning2"></i>' + validation_message + '</div>');
                classes = jQuery('#cs_alerts').attr('class');
                classes = classes + " active";
                jQuery('#cs_alerts').addClass(classes);
                setTimeout(function () {
                    jQuery('#cs_alerts').removeClass("active");
                }, 4000);
            }
        }
    } else {
        jQuery('#cs_alerts').html('<div class="cs-remove-msg error"><i class="icon-warning2"></i>' + validation_message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);
        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
        var cs_detail_tab = $('#cs-detail-tab');
        $('.cs-post-job .tabs-nav').find('li').removeClass('active');
        cs_detail_tab.parent().parent('li').addClass('active');
        var active = $('.cs-post-job').find('.tabs-nav .active a').attr('href');
        $('.cs-post-job .tabs-content').find('.tabs').hide();
        $('.cs-post-job .tabs-content').find('div#' + active).show();
        return false;
    }
});

$("#resumes").on('click', '[id^="jb-cont-send-"]', function (event) {

    var $ = jQuery;
    event.preventDefault();
    var candidate_id = jQuery(this).data('id');
    var default_message = jQuery("#cs_employer_id_" + candidate_id).data('validationmsg');
    jQuery('#cs_employer_id_' + candidate_id + ' #main-cs-loader_' + candidate_id).html('<i class="icon-spinner8 icon-spin"></i>');
    var ajaxurl = jQuery(".cs-resumes").data('adminurl');
    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: "html",
        data: $('#ajaxcontactform-' + candidate_id).serialize() + "&candidateid=" + candidate_id + "&action=ajaxcontact_send_mail",
        success: function (response) {
            if (response != "" && response == 'result2') {
                jQuery('#cs_employer_id_' + candidate_id + ' #main-cs-loader_' + candidate_id).html('');
                show_alert_msg(response);
            } else {
                if (response != "" && response == 'result1') {

                    jQuery('#cs_employer_id_' + candidate_id + ' #main-cs-loader_' + candidate_id).html('');
                    show_alert_msg(default_message);
                } else {
                    jQuery('#cs_employer_id_' + candidate_id + ' #main-cs-loader_' + candidate_id).html('');
                    show_alert_msg(response);
                }
            }
        }
    });
    return false;
});

$(document).on('click', '#employer-change-pass-trigger', function () {
    var $ = jQuery,
            old_pass = $('input[name="old_password"]').val(),
            new_pass = $('input[name="new_password"]').val(),
            confirm_pass = $('input[name="confirm_password"]').val();
    cs_data_loader_load('#employer-dashboard .main-cs-loader');
    var ajaxurl = $(".cs-jax-area").data('ajaxurl');
    $.ajax({
        type: "POST",
        url: ajaxurl,
        data: "old_pass=" + old_pass + "&new_pass=" + new_pass + "&confirm_pass=" + confirm_pass + "&action=cs_front_change_password",
        success: function (response) {
            $('#employer-dashboard .main-cs-loader').html('');
            show_alert_msg(response);
        },
        error: function (error) {
            $('#employer-dashboard .main-cs-loader').html('');
            show_alert_msg(cs_vars.there_is_prob);
        }
    });
    return false;
});

$(document).on('click', '#candidate-change-pass-trigger', function () {
    var $ = jQuery,
            old_pass = $('input[name="old_password"]').val(),
            new_pass = $('input[name="new_password"]').val(),
            confirm_pass = $('input[name="confirm_password"]').val();
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var ajaxurl = $(".cs-jax-area").data('ajaxurl');
    $.ajax({
        type: "POST",
        url: ajaxurl,
        data: "old_pass=" + old_pass + "&new_pass=" + new_pass + "&confirm_pass=" + confirm_pass + "&action=cs_front_change_password",
        success: function (response) {
            $('#candidate-dashboard .main-cs-loader').html('');
            show_alert_msg(response);
        },
        error: function (error) {
            $('#candidate-dashboard .main-cs-loader').html('');
            show_alert_msg(cs_vars.there_is_prob);
        }
    });
    return false;
});

/**
 * job post
 */
function cs_job_post_tabs() {
    var preActive = jQuery('.cs-post-job').find('.tabs-nav .active a').attr('href');
    jQuery('.cs-post-job .tabs-content').find('.tabs').hide();
    jQuery('.cs-post-job .tabs-content').find('div#' + preActive).show();
    jQuery('.cs-post-job .tabs-nav a').click(function (event) {
        event.preventDefault();
        var activeCheck = jQuery(this).parents('li').hasClass('active');
        if (!activeCheck) {
            if (!jQuery(this).hasClass('cs-confrmation-tab') && !jQuery('.cs-post-job').hasClass('cs-prevent')) {
                jQuery('.cs-post-job .tabs-nav').find('li').removeClass('active');
                jQuery(this).parents('li').addClass('active');
                var active = jQuery('.cs-post-job').find('.tabs-nav .active a').attr('href');
                jQuery('.cs-post-job .tabs-content').find('.tabs').hide();
                jQuery('.cs-post-job .tabs-content').find('div#' + active).show();
            }
        }
    });
}
/**
 * number format
 */
function cs_number_format(num) {
    return parseFloat(Math.round(num * 100) / 100).toFixed(2);
}

/**
 * Change Package
 */
function cs_job_pricing() {
    "use strict";
    var $ = jQuery;
    var cs_currency = $('.cs-sumry-clacs').data('currency');
    // Localize Text
    var cs_subs_text = $('[name="job_pckge"]:checked').data('title') + ' ' + $('.cs-sumry-clacs').data('subs');
    var cs_feat_text = $('.cs-sumry-clacs').data('feat');
    var cs_totl_text = $('.cs-sumry-clacs').data('total');
    var cs_vat_text = $('.cs-sumry-clacs').data('vat');
    var cs_gtotl_text = $('.cs-sumry-clacs').data('gtotal');
    //

    var cs_total_amount = 0;
    var cs_job_fee = 0;
    var cs_job_vat = 0;
    var cs_app_html = '';
    var cs_app_con = $('.cs-sumry-clacs');
    var packg_price = $('[name="job_pckge"]:checked').data('price');
    if (typeof (packg_price) !== 'undefined') {
        cs_total_amount = parseFloat(cs_total_amount) + parseFloat(packg_price);
        cs_app_html += '<li><span>' + cs_subs_text + '</span><em>' + get_currency(packg_price) + '</em></li>';
    }

    if (!$('[name="cs_job_featured"]').hasClass('cs-paid')) {
        var feature_price = $('[name="cs_job_featured"]:checked').data('price');
        if (typeof (feature_price) !== 'undefined' && feature_price > 0) {
            cs_total_amount = parseFloat(cs_total_amount) + parseFloat(feature_price);
            cs_app_html += '<li><span>' + cs_feat_text + '</span><em>' + get_currency(feature_price) + '</em></li>';
        }
    }

    cs_app_html += '<li><span>' + cs_totl_text + '</span><em>' + get_currency(cs_total_amount) + '</em></li>';
    // VAT Percentage
    var cs_vat_percent = $('.cs-package-detail').attr('data-vatp');
    if (typeof (cs_vat_percent) !== 'undefined') {

        if (cs_vat_percent < 0) {
            cs_vat_percent = 1;
        }

        cs_job_vat = (cs_total_amount * cs_vat_percent) / 100;
        $('.cs-package-detail').attr('data-vat', cs_number_format(cs_job_vat));
    }

    cs_job_vat = $('.cs-package-detail').attr('data-vat');
    if (typeof (cs_job_vat) !== 'undefined' && cs_job_vat > 0) {
        cs_total_amount = parseFloat(cs_total_amount) + parseFloat(cs_job_vat);
        cs_app_html += '<li><span>' + cs_vat_text + '</span><em>' + get_currency(cs_job_vat) + '</em></li>';
    }

    cs_app_html += '<li><span>' + cs_gtotl_text + '</span><em>' + get_currency(cs_total_amount) + '</em></li>';
    cs_app_con.html(cs_app_html);
    if (cs_total_amount > 0) {
        $('.cs-pay-box').show("slow");
        $('.cs-add-up-box').hide("slow");
    } else {
        $('.cs-pay-box').hide("slow");
        $('.cs-add-up-box').show("slow");
    }
}

$(document).ready(function ($) {
    'use strict';
// Job Post Tab function call
    cs_job_post_tabs();
    var url_hash = window.location.hash;
    if (url_hash != '') {

        $('ul.nav-tabs').find('li').removeClass('active');
        $('ul.nav-tabs').find('a[href="' + url_hash + '"]').parent('li').addClass('active');
        $('.cs-tabs').find('.tab-pane').removeClass('active');
        $('.cs-tabs').find('div' + url_hash).addClass('active');
    }

    $("[id^='cs_emp_check_']").click(function () {

        $("#cs-not-emp").slideDown('slow', '', function () {
            setTimeout(function () {
                $("#cs-not-emp").slideUp('slow');
            }, 5000);
        });
    });
    $("[id^='cs_empl_check_']").click(function () {
        var candidate_id = $(this).data('id');
        $("#cs_empl_check_" + candidate_id).parent('span').append('<div class="cs-remove-msg">' + $("#cs-not-emp").html() + '</div>');
        setTimeout(function () {
            $("#cs_empl_check_" + candidate_id).parent('span').find(".cs-remove-msg").slideUp('slow');
        }, 2000);
    });
    //tooltip
    $('[data-toggle="tooltip"]').tooltip();


    /*
     * for selct boxes design and jquery implementation
     */

    if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
        var config = {
            '.chosen-select': {width: "100%"},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
            '.chosen-select-no-results': {no_results_text: cs_vars.oops_nothing_found},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    }

});

/*
 * Enable map zooming with mouse scroll when the user clicks the map
 */
function cs_user_avail(field) {

    var $ = jQuery;
    var ajaxurl = $('#cs-emp-form').data('ajaxurl');
    //var msg_con = $('#cs-email-chk');
    var email_pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    var user_email = $('input[name="cs_emp_email"]').val();
    var username = $('input[name="cs_user"]').val();
    if (user_email !== '' || username !== '') {
        if (field == 'email') {
            $('#cs_user_email_validation').html('<i class="icon-spinner8 icon-spin"></i>');
        } else if (field == 'username') {
            $('#cs_user_name_validation').html('<i class="icon-spinner8 icon-spin"></i>');
        }
        if (email_pattern.test(user_email)) {

            //msg_con.html('<i class="icon-spinner8 icon-spin"></i>');
            var dataString = 'emp_email=' + user_email
                    + '&emp_username=' + username
                    + '&action=cs_check_user_avail';
            jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: dataString,
                dataType: "json",
                success: function (response) {
                    if (response.type == 'error') {
                        $('.cs-post-job, .cs-post-pkg').addClass('cs-prevent');
                        if (field == 'email') {
                            $("#cs_emp_email").addClass("has-error");
                            $('#cs_user_email_validation').html('<i class="icon-cross3"></i>');
                        } else if (field == 'username') {
                            $("#cs_user").addClass("has-error");
                            $('#cs_user_name_validation').html('<i class="icon-cross3"></i>');
                        }

                        show_alert_msg(response.msg);
                    } else if (response.type == 'success') {
                        $('.cs-post-job, .cs-post-pkg').removeClass('cs-prevent');
                        if (field == 'email') {
                            $("#cs_emp_email").removeClass("has-error");
                            $('#cs_user_email_validation').html('<i class="icon-checkmark6"></i>');
                        } else if (field == 'username') {
                            $("#cs_user").removeClass("has-error");
                            $('#cs_user_name_validation').html('<i class="icon-checkmark6"></i>');
                        }
                    }
                    //msg_con.html(response.msg);
                }
            });
            return false;
        }
    }

    return false;
}
/*
 * Add to list Function
 */
function cs_add_to_list(admin_url, id) {
    "use strict";
    var dataString = 'id=' + id + '&action=cs_add_to_list';
    jQuery('#add-to-btn-' + id).addClass('no-border');
    jQuery('#add-to-btn-' + id).html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "json",
        success: function (response) {
            jQuery('#add-to-btn-' + id).removeAttr('onclick');
            jQuery('#add-to-btn-' + id).html(response.btn_txt);
            jQuery('#add-to-btn-' + id).removeClass('no-border');
            show_alert_msg(response.msg);
        }
    });
    return false;
}

/*
 * Add to Favourite Function
 */
function cs_add_favr(admin_url, id, type) {
    type = type || '';
    "use strict";
    var classes = '';
    var dataString = 'id=' + id + '&action=cs_add_favr&type=' + type;
    jQuery('#add-to-btn-' + id).addClass('no-border');
    jQuery('#add-to-btn-' + id).html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "json",
        success: function (response) {
            //jQuery('#add-to-btn-' + id).parent('span').append('<div class="cs-remove-msg">' + response.msg + '</div>');
            jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + response.msg + '</div>');
            classes = jQuery('#cs_alerts').attr('class');
            classes = classes + " active";
            jQuery('#cs_alerts').addClass(classes);
            jQuery('#add-to-btn-' + id).html(response.btn_txt);
            jQuery('#add-to-btn-' + id).removeClass('no-border');
            classes = jQuery('#add-to-btn-' + id).attr('class');
            if (response.class == 'add') {
                classes = classes + " cs_resume_added";
                jQuery('#add-to-btn-' + id).addClass(classes);
                jQuery('#add-to-btn-' + id).attr("onclick", "cs_add_favr('" + admin_url + "','" + id + "','remove')");
            } else {
                jQuery('#add-to-btn-' + id).attr("onclick", "cs_add_favr('" + admin_url + "','" + id + "','add')");
                jQuery('#add-to-btn-' + id).removeClass("cs_resume_added");
            }

            setTimeout(function () {
                //jQuery('#add-to-btn-' + id).parent('span').find(".cs-remove-msg").slideUp('slow');
                jQuery('#cs_alerts').removeClass("active");
            }, 2000);
        }
    });
    return false;
}
/*
 * Employer Profile Ajax Function
 */
function cs_ajax_emp_profile(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_employer_ajax_profile';
    cs_data_loader_load('#profile');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#profile').html(response);
            jQuery("#profile .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/*
 * Employer Favourite Resumes Ajax Function
 */
function cs_ajax_fav_resumes(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_fav_resumes';
    cs_data_loader_load('#resumes');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#resumes').html(response);
            jQuery("#resumes .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/*
 * Employer Manage Jobs Ajax Function
 */
function cs_ajax_manage_job(admin_url, cs_uid, uri) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&cs_uri=' + uri + '&action=cs_ajax_manage_job';
    cs_data_loader_load('#jobs');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#jobs').html(response);
            jQuery("#jobs .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/*
 * Employer Transactions Ajax Function
 */
function cs_ajax_trans_history(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_trans_history';
    cs_data_loader_load('#transactions');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#transactions").html(response);
            jQuery("#transactions .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/*
 * Employer job packages Ajax Function
 */
function cs_ajax_job_packages(pkg_array) {
    "use strict";
    if (typeof (pkg_array) !== 'undefined') {
        var perc_obj = JSON.parse(pkg_array);
        var admin_url = perc_obj.ajax_url;
        var wooC_current_page = jQuery("#wooC_current_page").val();
        var cs_uid = perc_obj.user_id;
        var dataString = 'cs_uid=' + cs_uid +
                '&pkg_array=' + pkg_array +
                '&wooC_current_page=' + wooC_current_page +
                '&action=cs_ajax_job_packages';
		console.log(dataString);
        cs_data_loader_load('#packages');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery('#packages').html(response);
                jQuery("#packages .cs-loader").fadeTo(2000, 500).slideUp(500);
            }
        });
    }

    return false;
}

/*
 * Employer Change Password Function
 */
function cs_employer_change_password(pkg_array) {
    "use strict";
    if (typeof (pkg_array) !== 'undefined') {
        var perc_obj = JSON.parse(pkg_array);
        var admin_url = perc_obj.ajax_url;
        var cs_uid = perc_obj.user_id;
        var dataString = 'cs_uid=' + cs_uid +
                '&pkg_array=' + pkg_array +
                '&action=cs_employer_change_password';
        cs_data_loader_load('#change_password');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery('#change_password').html(response);
                jQuery("#change_password .cs-loader").fadeTo(2000, 500).slideUp(500);
            }
        });
    }

    return false;
}

/*
 * Employer Post Job Ajax Function
 */
function cs_ajax_emp_job(admin_url, cs_uid, pkg_array) {
    "use strict";
    if (typeof (pkg_array) !== 'undefined' && pkg_array !== '') {

        var dataString = 'cs_uid=' + cs_uid +
                '&cs_posting=new&pkg_array=' + escape(pkg_array) +
                '&action=cs_employer_post_job';
        cs_data_loader_load('#postjobs');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery('#postjobs').html(response);
                jQuery("#postjobs .cs-loader").fadeTo(2000, 500).slideUp(500);
                // Job Post Tab function call
                cs_job_post_tabs();
            }
        });
    }
    return false;
}
/*
 * Job Delete Function
 */
function cs_job_delete(admin_url, u_id) {
    "use strict";
    document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line
    document.getElementById('id_truebtn').onclick = function () {
        var dataString;
        dataString = 'u_id=' + u_id + '&action=cs_job_delete';
        jQuery('#cs-job-' + u_id).html('<i class="icon-spinner8 icon-spin"></i>');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery('#cs-job-' + u_id).html(response);
                jQuery('#cs-job-' + u_id).parent().parent().parent('li').hide("slow");
            }
        });
        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };

    document.getElementById('id_falsebtn').onclick = function () {
        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };
}
/*
 * Resume Delete Function
 */
function cs_fav_resume_del(admin_url, cs_id) {
    document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line
    document.getElementById('id_truebtn').onclick = function () {
        "use strict";
        var dataString = 'cs_id=' + cs_id + '&action=cs_fav_resume_del';
        jQuery('#cs-resume-' + cs_id).html('<i class="icon-spinner8 icon-spin"></i>');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery('#cs-resume-' + cs_id).html(response);
                jQuery('#cs-resume-' + cs_id).parent('li').hide("slow");
            }
        });

        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };

    document.getElementById('id_falsebtn').onclick = function () {
        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };
}
/*
 * Update Trans Function
 */
function cs_update_transaction_status(admin_url, cs_id, cs_val) {
    "use strict";
    var dataString = 'cs_id=' + cs_id + '&cs_val=' + cs_val + '&action=update_trans';
    jQuery('#cs-status-' + cs_id + ' .cs-holder').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#cs-status-' + cs_id + ' .cs-holder').html('<i style="left:-48px;">' + response + '</i>');
            setTimeout(function () {
                jQuery('#cs-status-' + cs_id + ' .cs-holder').find("i").slideUp('slow');
            }, 2000);
        }
    });
    return false;
}
/*
 * Favorite Delete Function
 */
function cs_unset_user_fav(admin_url, cs_id) {
    "use strict";
    var dataString = 'cs_id=' + cs_id + '&action=cs_unset_user_fav';
    jQuery('#cs-rem-' + cs_id).html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        dataType: "json",
        data: dataString,
        success: function (response) {
            jQuery('#cs-rem-' + cs_id).html('');
            jQuery('#cs-fav-counts').html(response.count);
            jQuery('#cs-rem-' + cs_id).parent('li').hide("slow");
        }
    });
    return false;
}
/*
 * unset user job av
 */

function cs_unset_user_job_fav(admin_url, post_id) {

    "use strict";
    //var post_id = jQuery(_this).data("postid");
    var dataString = 'post_id=' + post_id + '&action=cs_delete_wishlist';
    jQuery('#cs-rem-' + post_id).html('<i class="icon-spinner8 icon-spin"></i>');
    var count = jQuery('#cs-fav-counts').html();
    count = count - 1;
    if (count < 0) {
        count = 0;
    }
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#cs-rem-' + post_id).html('');
            jQuery('#cs-fav-counts').html(count);
            jQuery('#cs-heading-counts').html(count);
            jQuery('#cs-rem-' + post_id).parent('li').hide('slow');
        }
    });
    return false;
}
/*
 * add cv package to  list
 */
var counter_cv_pkg = 0;
function add_cv_pkg_to_list(admin_url, plugin_url) {
    counter_cv_pkg++;
    var dataString = 'counter_cv_pkg=' + counter_cv_pkg +
            '&cv_pkg_title=' + jQuery("#cv_pkg_title").val() +
            '&cv_pkg_type=' + jQuery("#cv_pkg_type").val() +
            '&cv_pkg_price=' + jQuery("#cv_pkg_price").val() +
            '&cv_pkg_dur=' + jQuery("#cv_pkg_dur").val() +
            '&cv_pkg_dur_period=' + jQuery("#cv_pkg_dur_period").val() +
            '&cv_pkg_desc=' + jQuery("#cv_pkg_desc").val() +
            '&cv_pkg_cvs=' + jQuery("#cv_pkg_cvs").val() +
            '&action=cs_add_cv_pkg_to_list';
    jQuery(".cv_pkg-loader").html("<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_cv_pkgs").append(response);
            jQuery(".cv_pkg-loader").html("");
            cs_remove_overlay('add_cv_pkg_title', 'append');
            jQuery("#cv_pkg_title").val(cs_vars.title);
        }
    });
    return false;
}

function cs_googlecluster_map(id, Latitude, Longitude, cluster_icon, marker_icon, dataobj, map_zoom, map_color, autozoom, cs_map_lock, style) {
    var markerClusterer = null;
    var map = null;
    var open_info_window = null;
    var imageUrl;

    var lock = 'unlock';
    var cs_scrollwheel = true;
    var cs_draggable = true;

    if (cs_map_lock == 'on') {
        var lock = 'lock';
    }

    if (lock == 'lock') {
        var cs_scrollwheel = false;
        var cs_draggable = false;
    }

    if (!jQuery.isNumeric(map_zoom)) {
        var map_zoom = 6;
    }
    if (Latitude != '' && Longitude != '') {
        var map_type_id = google.maps.MapTypeId.ROADMAP;

        map = new google.maps.Map(document.getElementById('cs_map_' + id), {
            zoom: map_zoom,
            icon: marker_icon,
            scrollwheel: cs_scrollwheel,
            draggable: cs_draggable,
            streetViewControl: true,
            center: new google.maps.LatLng(Latitude, Longitude),
            position: new google.maps.LatLng(Latitude, Longitude),
            mapTypeId: map_type_id,
        });

        if (style != '') {
            var styles = cs_map_select_style(style);
            if (styles != '') {
                var styledMap = new google.maps.StyledMapType(styles,
                        {name: 'Styled Map'});
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');
            }
        }

        var myLatlng = new google.maps.LatLng(Latitude, Longitude);

        var markers = [];
        var LatLngList = [];
        var mc;

        jQuery.each(dataobj.posts, function (index, element) {
            var i = element.post_id;

            var latLng = new google.maps.LatLng(element.latitude, element.longitude);
            LatLngList.push(new google.maps.LatLng(element.latitude, element.longitude));
            var marker = new google.maps.Marker({
                position: latLng,
                center: latLng,
                draggable: false,
                icon: marker_icon,
                content: element.post_title,
            });

            var cs_location = '';
            var cs_position = '';
            if (element.city != '' && element.country != '') {
                cs_location = '<span class="cs-location">' + element.city + ', ' + element.country + '</span>';
            }
            if (element.position != '' && element.company != '') {
                cs_position = '<div class="post-option"><span class="cs-postion"><em>' + element.position + ' </em> @ ' + element.company + '</span></div>';
            }

            var contentString = '<div class="map-tooltip">\
				<div class="cs-media">\
				  <figure><img alt="" src="' + element.image_url + '"></figure>\
				</div>\
				<div class="cs-text">\
				  <div class="cs-post-title">\
					<h6><a href="' + element.permalink + '">' + element.post_title + '</a></h6>\
					' + cs_location + '\
				  </div>\
				  ' + cs_position + '\
				</div>\
			  </div>';

            var infobox = new InfoBox({
                boxClass: 'cs_map_info',
                content: contentString,
                disableAutoPan: true,
                maxWidth: 0,
                alignBottom: true,
                pixelOffset: new google.maps.Size(147, -182),
                zIndex: null,
                closeBoxMargin: "2px",
                closeBoxURL: "close",
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: "floatPane",
                enableEventPropagation: false
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    map.panTo(marker.getPosition());
                    map.panBy(40, -70);
                    if (open_info_window)
                        open_info_window.close();
                    infobox.open(map, marker);
                    open_info_window = infobox;
                }
            })(marker, i));
            markers.push(marker);
        });

        var mcOptions;
        var clusterStyles = [
            {
                textColor: map_color,
                opt_textColor: map_color,
                url: cluster_icon,
                height: 80,
                width: 80,
                textSize: 12
            }
        ];
        mcOptions = {
            gridSize: 45,
            ignoreHidden: true,
            maxZoom: 12,
            styles: clusterStyles
        };
        var mc = new MarkerClusterer(map, markers, mcOptions);
        if (document.getElementById('gmaplock' + id)) {
            google.maps.event.addDomListener(document.getElementById('gmaplock' + id), 'click', function () {
                if (lock == 'lock') {
                    map.setOptions({scrollwheel: true});
                    map.setOptions({draggable: true});
                    document.getElementById('gmaplock' + id).innerHTML = '<i class="icon-unlock"></i>';
                    lock = 'unlock';
                } else if (lock == 'unlock') {
                    map.setOptions({scrollwheel: false});
                    map.setOptions({draggable: false});
                    document.getElementById('gmaplock' + id).innerHTML = '<i class="icon-lock3"></i>';
                    lock = 'lock';
                }
            });
        }

        if (document.getElementById('gmapcurrentloc' + id)) {
            google.maps.event.addDomListener(document.getElementById('gmapcurrentloc' + id), 'click', function () {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(show_position);
                }

                function show_position(position) {
                    var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    var marker = new google.maps.Marker({
                        position: center,
                        map: map,
                        title: '',
                        icon: marker_icon,
                        shadow: ''
                    });
                    map.setCenter(center);
                }
            });
        }

        if (LatLngList.length > 0 && autozoom == 'on') {
            var latlngbounds = new google.maps.LatLngBounds();
            for (var i = 0; i < LatLngList.length; i++) {
                latlngbounds.extend(LatLngList[i]);
            }
            map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
        }
    }
}

function cs_googlecluster_map1(id, Latitude, Longitude, cluster_icon, marker_icon, dataobj, map_zoom, map_color, autozoom, cs_map_lock, style) {
    var markerClusterer = null;
    var map = null;
    var open_info_window = null;
    var imageUrl;

    var lock = 'unlock';
    var cs_scrollwheel = true;
    var cs_draggable = true;

    if (cs_map_lock == 'on') {
        var lock = 'lock';
    }

    if (lock == 'lock') {
        var cs_scrollwheel = false;
        var cs_draggable = false;
    }

    if (!jQuery.isNumeric(map_zoom)) {
        var map_zoom = 6;
    }
    if (Latitude != '' && Longitude != '') {
        var map_type_id = google.maps.MapTypeId.ROADMAP;

        map = new google.maps.Map(document.getElementById('cs_map_' + id), {
            zoom: map_zoom,
            icon: marker_icon,
            scrollwheel: cs_scrollwheel,
            draggable: cs_draggable,
            streetViewControl: true,
            center: new google.maps.LatLng(Latitude, Longitude),
            position: new google.maps.LatLng(Latitude, Longitude),
            mapTypeId: map_type_id,
        });

        if (style != '') {
            var styles = cs_map_select_style(style);
            if (styles != '') {
                var styledMap = new google.maps.StyledMapType(styles,
                        {name: 'Styled Map'});
                map.mapTypes.set('map_style', styledMap);
                map.setMapTypeId('map_style');
            }
        }

        var myLatlng = new google.maps.LatLng(Latitude, Longitude);

        var markers = [];
        var LatLngList = [];
        var mc;

        jQuery.each(dataobj.posts, function (index, element) {
            var i = element.post_id;

            var latLng = new google.maps.LatLng(element.latitude, element.longitude);
            LatLngList.push(new google.maps.LatLng(element.latitude, element.longitude));
            var marker = new google.maps.Marker({
                position: latLng,
                center: latLng,
                draggable: false,
                icon: marker_icon,
                content: element.post_title,
            });

            var cs_location = '';
            var cs_position = '';
            if (element.city != '' && element.country != '') {
                cs_location = '<span class="cs-location">' + element.city + ', ' + element.country + '</span>';
            }
            if (element.position != '' && element.company != '') {
                cs_position = '<div class="post-option"><span class="cs-postion"><em>' + element.position + ' </em> @ ' + element.company + '</span></div>';
            }

            var contentString = '<div class="map-tooltip map-tooltip1">\
				<div class="cs-media cs-media1">\
				  <figure><img alt="" src="' + element.image_url + '"></figure>\
				</div>\
				<div class="cs-text cs-text1">\
				  <div class="cs-post-title">\
					<h6><a href="' + element.permalink + '">' + element.post_title + '</a></h6>\
					' + cs_location + '\
				  </div>\
				  ' + cs_position + '\
				</div>\
			  </div>';

            var infobox = new InfoBox({
                boxClass: 'cs_map_info',
                content: contentString,
                disableAutoPan: true,
                maxWidth: 0,
                alignBottom: true,
                pixelOffset: new google.maps.Size(147, -230),
                zIndex: null,
                closeBoxMargin: "2px",
                closeBoxURL: "close",
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                pane: "floatPane",
                enableEventPropagation: false
            });
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    map.panTo(marker.getPosition());
                    map.panBy(40, -70);
                    if (open_info_window)
                        open_info_window.close();
                    infobox.open(map, marker);
                    open_info_window = infobox;
                }
            })(marker, i));
            markers.push(marker);
        });

        var mcOptions;
        var clusterStyles = [
            {
                textColor: map_color,
                opt_textColor: map_color,
                url: cluster_icon,
                height: 80,
                width: 80,
                textSize: 12
            }
        ];
        mcOptions = {
            gridSize: 45,
            ignoreHidden: true,
            maxZoom: 12,
            styles: clusterStyles
        };
        var mc = new MarkerClusterer(map, markers, mcOptions);
        if (document.getElementById('gmaplock' + id)) {
            google.maps.event.addDomListener(document.getElementById('gmaplock' + id), 'click', function () {
                if (lock == 'lock') {
                    map.setOptions({scrollwheel: true});
                    map.setOptions({draggable: true});
                    document.getElementById('gmaplock' + id).innerHTML = '<i class="icon-unlock"></i>';
                    lock = 'unlock';
                } else if (lock == 'unlock') {
                    map.setOptions({scrollwheel: false});
                    map.setOptions({draggable: false});
                    document.getElementById('gmaplock' + id).innerHTML = '<i class="icon-lock3"></i>';
                    lock = 'lock';
                }
            });
        }

        if (document.getElementById('gmapcurrentloc' + id)) {
            google.maps.event.addDomListener(document.getElementById('gmapcurrentloc' + id), 'click', function () {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(show_position);
                }

                function show_position(position) {
                    var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    var marker = new google.maps.Marker({
                        position: center,
                        map: map,
                        title: '',
                        icon: marker_icon,
                        shadow: ''
                    });
                    map.setCenter(center);
                }
            });
        }

        if (LatLngList.length > 0 && autozoom == 'on') {
            var latlngbounds = new google.maps.LatLngBounds();
            for (var i = 0; i < LatLngList.length; i++) {
                latlngbounds.extend(LatLngList[i]);
            }
            map.setCenter(latlngbounds.getCenter(), map.fitBounds(latlngbounds));
        }
    }
}


function get_currency( price ){
    var currency_sign   = cs_vars.currency_sign;
    var currency_position   = cs_vars.currency_position;
    var price_str   = '';
    switch ( currency_position ) {
        case 'left' :
            price_str = currency_sign + price;
        break;
        case 'right' :
            price_str = price + currency_sign;
        break;
        case 'left_space' :
            price_str = currency_sign + ' ' + price;
        break;
        case 'right_space' :
            price_str = price + ' ' + currency_sign;
        break;
    }
    return price_str;
}