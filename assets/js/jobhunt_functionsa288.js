/*
 *  jquery document.ready functions 
 */

var $ = jQuery;
var ajaxRequest;
jQuery(document).ready(function ($) {
    /*
     *  media file upload for candidate
     */
    jQuery("body").on('click', '.cs-uploadMedia-candidate', function () {
        var $ = jQuery;
        var id = $(this).attr("name");
        var custom_uploader = wp.media({
            title: jobhunt_functions_vars.select_file,
            library: {
                type: ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/rtf', 'text/plain']
            },
            button: {
                text: jobhunt_functions_vars.add_file
            },
            multiple: false
        }).on('select', function () {

            var attachment = custom_uploader.state().get('selection').first().toJSON();
            jQuery('#' + id).val(attachment.url);
            var filename = attachment.url.replace(/^.*[\\\/]/, '');
            jQuery('#show_candidate_cv').html(filename);
            jQuery('#' + id + '_box').show();
        }).open();
    });

    /*
     *  media file upload 
     */
    jQuery("body").on('click', '.cs-uploadMedia', function () {

        var $ = jQuery;
        var id = $(this).attr("name");
        var custom_uploader = wp.media({
            title: jobhunt_functions_vars.select_file,
            button: {
                text: jobhunt_functions_vars.add_file
            },
            multiple: false
        })
                .on('select', function () {
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    jQuery('#' + id).val(attachment.url);
                    jQuery('#' + id).next().hide();
                    jQuery('#' + id + '_img').attr('src', attachment.url);
                    jQuery('#' + id + '_box').show();
                }).open();
    });
    /*
     * 
     * payment gateway
     */
    "use strict";
    $('[id^=cs_extra_feat_], [name=cs_payment_part], [name=cs_payment_gateway]').click(function () {
    });
    // Checkbox
    $(document).on('click', 'label.cs-chekbox', function () {
        var checkbox = $(this).find('input[type=checkbox]');

        if (checkbox.is(":checked")) {
            $('#' + checkbox.attr('name')).val(checkbox.val());
            $('#' + checkbox.attr('name')).attr('value', 'on');
        } else {
            $('#' + checkbox.attr('name')).val('');
            $('#' + checkbox.attr('name')).attr('value', '');
        }
    });
    /*
     * 
     * Media Upload
     */

    "use strict";
    var ww = jQuery('#post_id_reference').text();
    window.original_send_to_editor = window.send_to_editor;
    window.send_to_editor_clone = function (html) {
        imgurl = jQuery('a', '<p>' + html + '</p>').attr('href');
        jQuery('#' + formfield).val(imgurl);
        tb_remove();
    }
    jQuery('input.uploadfile').click(function () {
        window.send_to_editor = window.send_to_editor_clone;
        formfield = jQuery(this).attr('name');
        tb_show('', 'media-upload.php?post_id=' + ww + '&type=image&TB_iframe=true');
        return false;
    });
    /*
     * 
     * currency type
     */
    "use strict";
    jQuery("#cs_currency_type").change(function (e) {
        cs_get_currencies(this.value);
    });

    /*
     * 
     * candidate contact us
     */
    //"use strict";
    $('#candidate_contactus').click(function (event) {
        event.preventDefault();
        cs_data_loader_load('.cs-profile-contact-detail #main-cs-loader');
        var ajaxurl = jQuery(".cs-profile-contact-detail").data('adminurl');
        var candidateid = jQuery(".profile-contact-btn").data('candidateid');
        var captcha_id = jQuery(".cs-profile-contact-detail").data('cap');
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            dataType: "html",
            //  data: $('#ajaxcontactform'+form_id).serialize() + "&candidateid=" + candidateid + "&captcha_id=" + captcha_id + "&action=ajaxcontact_send_mail",
            data: $("#ajaxcontactform").serialize() + "&candidateid=" + candidateid + "&captcha_id=" + captcha_id + "&action=ajaxcontact_send_mail",
            success: function (response) {
                var response_data = response.split("|");
                jQuery("#ajaxcontactemail").removeClass('has_error');
                jQuery("#ajaxcontactname").removeClass('has_error');
                jQuery("#ajaxcontactcontents").removeClass("has_error");

                var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                if (jQuery("#ajaxcontactname").val() == '') {
                    jQuery("#ajaxcontactname").addClass('has_error');
                } else
                if (!pattern.test(jQuery("#ajaxcontactemail").val())) {
                    jQuery("#ajaxcontactemail").addClass('has_error');
                } else
                if (jQuery("#ajaxcontactcontents").val().length < 35) {
                    jQuery("#ajaxcontactcontents").addClass('has_error');
                }
                var error_container = '';
                if (response_data[1] == 1) {
                    error_container = '<div class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                    jQuery("#ajaxcontact-response").html(error_container);
                } else {
                    error_container = '<div class="alert success"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                    jQuery("#ajaxcontact-response").html(error_container);
                    captcha_reload(ajaxurl, captcha_id);
                }

                jQuery('.cs-profile-contact-detail #main-cs-loader').html('');

            }
        });
        return false;
    });
    /*
     * 
     * employer contact us
     */
    "use strict";
    $('#employerid_contactus').click(function (event) {

        cs_data_loader_load('#cs_employer_contactus #loader-data');
        var default_message = jQuery("#cs_employer_contactus").data('validationmsg');
        event.preventDefault();
        var ajaxurl = jQuery(".cs-profile-contact-detail").data('adminurl');
        var employerid = jQuery(".profile-contact-btn").data('employerid');

        var captcha_id = jQuery(".cs-profile-contact-detail").data('cap');

        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            dataType: "html",
            data: $('#ajaxcontactemployer').serialize() + "&employerid=" + employerid + "&action=ajaxcontact_employer_send_mail",
            success: function (response) {
                jQuery("#ajaxcontactemail").removeClass('has_error');
                jQuery("#ajaxcontactname").removeClass('has_error');
                jQuery("#ajaxcontactcontents").removeClass("has_error");

                var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                var response_data = response.split("|");
                if (jQuery("#ajaxcontactname").val() == '') {
                    jQuery("#ajaxcontactname").addClass('has_error');
                } else
                if (!pattern.test(jQuery("#ajaxcontactemail").val())) {
                    jQuery("#ajaxcontactemail").addClass('has_error');
                } else
                if (jQuery("#ajaxcontactcontents").val().length < 35) {
                    jQuery("#ajaxcontactcontents").addClass('has_error');
                }
                var error_container = '';
                if (response_data[1] == 1) {
                    error_container = '<div class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                    jQuery("#ajaxcontact-response").html(error_container);
                } else {
                    error_container = '<div class="alert success"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                    jQuery("#ajaxcontact-response").html(error_container);
                    jQuery("#ajaxcontactcontents").val('');
                    captcha_reload(ajaxurl, captcha_id);
                }

                jQuery('#cs_employer_contactus #loader-data').html('');
            }
        });
        return false;
    });

    /*
     * 
     * Skillbar
     */

    "use strict";
    if (jQuery('.skillbar').length != '') {
        jQuery('.skillbar').each(function () {
            $(this).waypoint(function (direction) {
                jQuery(this).find('.skillbar-bar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 2000);
            }, {
                offset: "100%",
                triggerOnce: true
            });
        });
    }
    /*
     * 
     * Candidate contact us
     */
    "use strict";
    $('#location_redius_popup').click(function (event) {
        event.preventDefault();
        jQuery("#popup").removeClass('hide');
        return false;
    });

    /*
     * 
     * sticky element
     */

    jQuery(function () {
        "use strict";
        if (jQuery('#sidemenu').length != '') {
            $('#sidemenu').visualNav({
                scrollOnInit: false, // disable auto scroll when come first time
                useHash: false, // if true, the location hash will be updated
                initialized: function () {
                    var XposNav = $("#sidemenu").offset().top;
                    $(window).scroll(function () {

                        var scrollPos = $(window).scrollTop();
                        if (scrollPos >= XposNav) {
                            $("#sidemenu").addClass('fixed');
                        } else if (scrollPos < XposNav) {
                            $("#sidemenu").removeClass('fixed');
                        }
                    });
                }
            });
        }
    });

    /*
     * 
     * frontend user hide/show
     */


    "use strict";
    jQuery('.login-box').show();
    jQuery('.login-link').on('click', function (e) {
        e.preventDefault();
        jQuery('.nav-tabs, .nav-tabs~.tab-content, .forgot-box').fadeOut(function () {
            jQuery('.login-box').fadeIn();
        });
    });
    /*
     * 
     * frontend login tabs function
     */
    jQuery('.login-link-page').on('click', function (e) {
        e.preventDefault();
        jQuery('#candidate78492, .nav-tabs-page, .nav-tabs-page~.tab-content-page, .forgot-box').fadeOut(function () {
            jQuery('.login-box').fadeIn();
        });
    });
    /*
     * 
     * frontend register tabs function
     */

    jQuery('.register-link').on('click', function (e) {
        e.preventDefault();
        jQuery('.login-box, .forgot-box').fadeOut(function () {
            jQuery('.nav-tabs, .nav-tabs~.tab-content').fadeIn();
        });
    });
    /*
     * 
     * frontend register tabs function
     */

    jQuery('.register-link-page').on('click', function (e) {
        e.preventDefault();
        jQuery('.login-box, .forgot-box').fadeOut(function () {
            jQuery('.tab-content-page').fadeIn();
            jQuery('.nav-tabs-page').fadeIn();
            jQuery('#candidate78492').fadeIn();
        });
    });
    /*
     * 
     * frontend page element forgotpassword function
     */

    jQuery('.user-forgot-password-page').on('click', function (e) {
        e.preventDefault();
        jQuery('.login-box, .nav-tabs-page, .nav-tabs-page~.tab-content-page').fadeOut(function () {
            jQuery('.forgot-box').fadeIn();
        });
    });
    /*
     * 
     * frontend forgotpassword function
     */

    jQuery('.user-forgot-password').on('click', function (e) {
        e.preventDefault();
        jQuery('.login-box, .nav-tabs, .nav-tabs~.tab-content').fadeOut(function () {
            jQuery('.forgot-box').fadeIn();
        });
    });
    /*
     * 
     * Popup function
     */

    "use strict";
    $('#location_redius_popup_close').click(function (event) {
        event.preventDefault();
        jQuery("#popup").addClass('hide');
        return false;
    });
    /**
     * @scrool sticky menu
     *
     */
    jQuery(function ($) {
        "use strict";
        $(document).ready(function () {
            if (jQuery('.navbar-wrapper').length != '') {
                $('.navbar-wrapper').stickUp({
                    parts: {
                        0: 'home',
                        1: 'features',
                        2: 'updates',
                        3: 'installation',
                        4: 'one-pager',
                        5: 'extras',
                        6: 'wordpress',
                        7: 'contact'
                    },
                    itemClass: 'menuItem',
                    itemHover: 'active',
                    topMargin: 'auto'
                });
            }
        });
    });


    jQuery('[data-toggle="popover"]').popover();
});
function submit_contact_form_ajax(form_id, admin_url, candidateidd) {
    cs_data_loader_load('.cs-profile-contact-detail #loader-data');

    var ajaxurl = admin_url;
    var candidateid = candidateidd;

    var captcha_id = jQuery(".cs-profile-contact-detail").data('cap');

    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: "html",
        data: jQuery(form_id).serialize() + "&candidateid=" + candidateid + "&captcha_id=" + captcha_id + "&action=ajaxcontact_send_mail_cand",
        success: function (response) {
            var response_data = response.split("|");

            jQuery("#ajaxcontactemail").removeClass('has_error');
            jQuery("#ajaxcontactname").removeClass('has_error');
            jQuery("#ajaxcontactcontents").removeClass("has_error");

            var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
            if (jQuery("#ajaxcontactname").val() == '') {
                jQuery("#ajaxcontactname").addClass('has_error');
            } else
            if (!pattern.test(jQuery("#ajaxcontactemail").val())) {
                jQuery("#ajaxcontactemail").addClass('has_error');
            } else
            if (jQuery("#ajaxcontactcontents").val().length < 35) {
                jQuery("#ajaxcontactcontents").addClass('has_error');
            }
            var error_container = '';
            if (response_data[1] == 1) {
                error_container = '<div class="alert alert-danger"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                jQuery("#ajaxcontact-response-" + candidateidd).html(error_container);
            } else {
                error_container = '<div class="alert success"><button aria-hidden="true" data-dismiss="alert" type="button" class="close">×</button><p><i class="icon-warning4"></i>' + response_data[0] + '</p></div>';
                jQuery("#ajaxcontact-response-" + candidateidd).html(error_container);
                captcha_reload(ajaxurl, captcha_id);
            }

            jQuery('.cs-profile-contact-detail #loader-data').html('');

        }
    });
    return false;
}
function cv_removejobs(admin_url, post_id, obj) {

    document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line
    document.getElementById('id_truebtn').onclick = function () {
        var dataString = 'post_id=' + post_id + '&action=cs_remove_applied_job_to_usermeta';
        jQuery('.holder-' + post_id).find('remove_resume_link' + post_id).html('<i class="icon-spinner8 icon-spin"></i>');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            dataType: "JSON",
            success: function (response) {
                if (response.status == 0) {
                    show_alert_msg(response.msg);
                } else {
                    jQuery('.holder-' + post_id).remove();
                    jQuery('.feature-jobs').find('.holder-' + post_id).remove();
                }
            }
        });
        document.getElementById('id_confrmdiv').style.display = "none";
    };

    document.getElementById('id_falsebtn').onclick = function () {
        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };
}


setTimeout(function () {
    jQuery('.cs-booking-create .messagebox').slideUp(800);
}, 3000);

function cs_get_location(elem) {
    "use strict";

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

            var elem_obj = jQuery(elem);

            showPosition(position, elem_obj)
        });

    } else {
        alert(jobhunt_functions_vars.geolocation_error_msg);
    }
}

function showPosition(position, elem) {
    "use strict";
    var parent_form = jQuery(elem.parents('form'));
    jQuery.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + ',' + position.coords.longitude + '&sensor=true',
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            parent_form.find('.geo-search-location').attr('name', 'location');
            parent_form.find('.geo-search-location').attr('value', data.results[0].formatted_address);
            parent_form.find('.geo-search-location').show();
            parent_form.find('.cs-undo-select').show();
            parent_form.find('.cs-select-holder').hide();
            parent_form.find('.search_keyword').removeAttr('name');
            cs_set_geo_loc(data.results[0].formatted_address);
        }
    });
}

function cs_set_geo_loc(geo_loc) {
    "use strict";
    var admin_url = jQuery('#top-view-srch-form').data('ajaxurl');
    var dataString = 'geo_loc=' + geo_loc + '&action=cs_set_geo_loc';
    jQuery.ajax({
        url: admin_url,
        type: 'POST',
        data: dataString,
        success: function (data) {

        }
    });
}

function cs_unset_geo_loc() {
    "use strict";
    var admin_url = jQuery('#top-view-srch-form').data('ajaxurl');
    var dataString = 'geo_loc=&action=cs_unset_geo_loc';
    jQuery.ajax({
        url: admin_url,
        type: 'POST',
        data: dataString,
        success: function (data) {

        }
    });
}

jQuery(document).on('click', '.cs-undo-select', function () {
    "use strict";
    jQuery(this).hide();
    var parent_form = jQuery(jQuery(this).parents('form'));
    parent_form.find('.geo-search-location').hide();
    parent_form.find('.geo-search-location').removeAttr('name');
    parent_form.find('.cs-select-holder').show();
    parent_form.find('.search_keyword').attr('name', 'location');

    cs_unset_geo_loc();
});


/**
 * Settings Tabs Responsive Function
 */

var windowWidth = jQuery(window).width();
if (windowWidth < 768) {
    jQuery('.col1').find('.admin-navigtion').addClass('navigation-small');
} else {
    jQuery('.col1').find('.admin-navigtion').removeClass('navigation-small');
}
jQuery('.nav-button').on('click', function (e) {
    "use strict";
    e.preventDefault();
    var windowWidth = jQuery(window).width();
    if (windowWidth < 768) {
        jQuery('.nav-button').closest('.admin-navigtion').addClass('navigation-small');
    }
});
jQuery(window).resize(function () {
    "use strict";
    var windowWidth = jQuery(window).width();
    if (windowWidth < 768) {
        jQuery('.col1').find('.admin-navigtion').addClass('navigation-small');
        jQuery('.nav-button').on('click', function (e) {
            e.preventDefault();
            jQuery(this).parents('.admin-navigtion').addClass('navigation-small');
        });
    } else {
        jQuery('.col1').find('.admin-navigtion').removeClass('navigation-small');
    }
});
/**
 * Update Title
 */
function update_title(id) {
    "use strict";
    var val;
    val = jQuery('#address_name' + id).val();
    jQuery('#address_name' + id).html(val);
}

/**
 * Create Popup
 */
function cs_createpop(data, type) {
    "use strict";
    var _structure = "<div id='cs-pbwp-outerlay'><div id='cs-widgets-list'></div></div>",
            $elem = jQuery('#cs-widgets-list');
    jQuery('body').addClass("cs-overflow");
    if (type == "csmedia") {
        $elem.append(data);
    }
    if (type == "filter") {
        jQuery('#' + data).wrap(_structure).delay(100).fadeIn(150);
        jQuery('#' + data).parent().addClass("wide-width");
    }
    if (type == "filterdrag") {
        jQuery('#' + data).wrap(_structure).delay(100).fadeIn(150);
    }
}
/**
 * Remove Popup
 */
function cs_remove_overlay(id, text) {
    "use strict";
    jQuery("#cs-widgets-list .loader").remove();
    var _elem1 = "<div id='cs-pbwp-outerlay'></div>",
            _elem2 = "<div id='cs-widgets-list'></div>";
    var $elem = jQuery("#" + id);
    jQuery("#cs-widgets-list").unwrap(_elem1);
    if (text == "append" || text == "filterdrag") {
        $elem.hide().unwrap(_elem2);
    }
    if (text == "widgetitem") {
        $elem.hide().unwrap(_elem2);
        jQuery("body").append("<div id='cs-pbwp-outerlay'><div id='cs-widgets-list'></div></div>");
        return false;
    }
    if (text == "ajax-drag") {
        jQuery("#cs-widgets-list").remove();
    }
    jQuery("body").removeClass("cs-overflow");

}


/**
 * Number Format
 */
function cs_number_format(num) {
    "use strict";
    return parseFloat(Math.round(num * 100) / 100).toFixed(2);
}

/**
 * Load Candidate Profile Data
 */
function cs_ajax_candidate_profile(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_candidate_profile';
    cs_data_loader_load('#profile');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#profile').html(response);
            jQuery("#profile .cs-loader").fadeTo(2000, 500).slideUp(1000);
        }
    });
    return false;
}

/**
 * Load Candidate Favorite Jobs
 */

function cs_ajax_candidate_favjobs(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_candidate_favjobs';
    cs_data_loader_load('#shortlisted-job');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#shortlisted-job').html(response);
            jQuery("#shortlisted-job .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/**
 * Load Candidate Applied Jobs
 */

function cs_ajax_candidate_appliedjobs(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_candidate_appliedjobs';
    cs_data_loader_load('#applied-jobs');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#applied-jobs').html(response);
            jQuery("#applied-jobs .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/**
 * Load Candidate Cv & Cover
 */

function cs_ajax_candidate_cvcover(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_candidate_cvcover';
    //alert('aaaa');
    cs_data_loader_load('#cv');
    jQuery.ajax({
        async: false,
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#cv').html(response);
            jQuery("#cv .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}

function cs_candidate_change_password(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_candidate_change_password';
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
    return false;
}

/**
 * Load Candidate Resume
 */
function cs_ajax_candidate_resume(admin_url, cs_uid) {
    "use strict";
    var dataString = 'cs_uid=' + cs_uid + '&action=cs_ajax_candidate_resume';
    cs_data_loader_load('#resume');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('#resume').html(response);
            jQuery("#resume .cs-loader").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}
/**
 * feature list
 */

var counter_extra_feature = 0;
function add_extra_feature_to_list(admin_url, plugin_url) {
    "use strict";
    counter_extra_feature++;
    var dataString = 'counter_extra_feature=' + counter_extra_feature +
            '&cs_extra_feature_title=' + jQuery("#cs_extra_feature_title").val() +
            '&cs_extra_feature_price=' + jQuery("#cs_extra_feature_price").val() +
            '&cs_extra_feature_type=' + jQuery("#cs_extra_feature_type").val() +
            '&cs_extra_feature_guests=' + jQuery("#cs_extra_feature_guests").val() +
            '&cs_extra_feature_fchange=' + jQuery("#cs_extra_feature_fchange").val() +
            '&cs_extra_feature_desc=' + jQuery("#cs_extra_feature_desc").val() +
            '&action=cs_add_extra_feature_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_extra_features").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_extra_feature_title', 'append');
            jQuery("#cs_extra_feature_title").val("Title");
            jQuery("#cs_extra_feature_price").val("");
            jQuery("#cs_extra_feature_type").val("");
            jQuery("#cs_extra_feature_guests").val("");
            jQuery("#cs_extra_feature_desc").val("");
        }
    });
    return false;
}
/**
 * award list
 */

var counter_award = 0;
function add_award_to_list(admin_url, plugin_url) {
    "use strict";
    counter_award++;
    var dataString = 'counter_award=' + counter_award +
            '&cs_award_name=' + jQuery("#cs_award_name_pop").val() +
            '&cs_award_year=' + jQuery("#cs_award_year_pop").val() +
            '&cs_award_description=' + jQuery("#cs_award_desc_pop").val() +
            '&action=cs_add_award_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_award_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_awards', 'append');
            jQuery("#cs_award_name_pop").val("Title");
            jQuery("#cs_award_year_pop").val("");
            jQuery("#cs_award_desc_pop").val("");
        }
    });
    return false;
}
/**
 * award list fee
 */
var counter_award = 0;
function add_award_to_list_fe(admin_url, plugin_url, form_id) {
    "use strict";
    counter_award++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var dataString = 'counter_award=' + counter_award +
            '&cs_award_name=' + jQuery("#cs_award_name_pop").val() +
            '&cs_award_year=' + jQuery("#cs_award_year_pop").val() +
            '&cs_award_description=' + jQuery("#cs_award_desc_pop").val() +
            '&action=cs_add_award_to_list_fe';
    if (jQuery("#cs_award_name_pop").val() == "") {
        error = 1;
        classes = jQuery("#cs_award_name_pop").attr("class");
        jQuery("#cs_award_name_pop").addClass(classes + " has-error");

    } else {
        jQuery("#cs_award_name_pop").removeClass("has-error");
    }
    if (jQuery("#cs_award_year_pop").val() == "") {
        error = 1;
        classes = jQuery("#cs_award_year_pop").attr("class");
        jQuery("#cs_award_year_pop").addClass(classes + " has-error");

    } else {
        jQuery("#cs_award_year_pop").removeClass("has-error");
    }
    if (error == 0) {

        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery("#total_award_list").append(response);
                ajax_form_save(admin_url, plugin_url, form_id);
            }
        });

    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);

    }
    return false;
}


/**
 * edit award list fee
 */

function edit_award_to_list_fe(admin_url, plugin_url, form_id, id) {
    "use strict";
    counter_education++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';

    var cs_award_name_pop = jQuery("#cs_award_name" + id).val();
    var cs_award_year_pop = jQuery("#cs_award_year" + id).val();

    if (cs_award_name_pop == "") {
        error = 1;
        classes = jQuery("#cs_award_name" + id).attr("class");
        jQuery("#cs_award_name" + id).addClass(classes + " has-error");

    } else {
        jQuery("#cs_award_name" + id).removeClass("has-error");
    }
    if (cs_award_year_pop == "") {
        error = 1;
        classes = jQuery("#cs_award_year" + id).attr("class");
        jQuery("#cs_award_year" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_award_year" + id).removeClass("has-error");
    }

    if (error == 0) {
        ajax_form_save(admin_url, plugin_url, form_id, id);
    } else {

        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);
        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);

    }
    return false;
}
/**
 * add portfolio list
 */

var counter_portfolio = 0;
function add_portfolio_to_list(admin_url, plugin_url) {
    "use strict";
    counter_portfolio++;
    var dataString = 'counter_portfolio=' + counter_portfolio +
            '&cs_image_title=' + jQuery("#cs_image_title").val() +
            '&cs_image_upload=' + jQuery("#cs_image_upload").val() +
            '&action=cs_add_portfolio_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_portfolio_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_portfolio', 'append');
            jQuery("#cs_image_title").val("Title");
            jQuery("#cs_image_upload").val("");
        }
    });
    return false;
}


function send_test_mail(admin_url, plugin_url) {
    "use strict";
    counter_portfolio++;
    var dataString = 'cs_to=' + jQuery("#cs_to").val() +
            '&action=cs_send_test_mail';
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#cs_to").append(response);
            jQuery(".feature-loader").html("");
        }
    });
}


/**
 * add portfolio candidate list
 */

function add_portfolio_to_candidate_list(admin_url, form_id) {
    "use strict";
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var error = 0;

    var fd = new FormData();
    var file_data = fd.append('cs_portfolio_image_upload', jQuery('#cs_portfolio_image_upload')[0].files[0]);
    var serializedValues = jQuery("#" + form_id).serializeArray();
    jQuery.each(serializedValues, function (key, input) {
        fd.append(input.name, input.value);
    });
    if (jQuery("#cs_image_title").val() == "") {
        error = 1;
        classes = jQuery("#cs_image_title").attr("class");
        jQuery("#cs_image_title").addClass(classes + " has-error");
    } else {
        jQuery("#cs_image_title").removeClass("has-error");
    }
    if (error == 0) {
        jQuery.ajax({
            url: admin_url,
            data: fd,
            contentType: false,
            processData: false,
            dataType: "JSON",
            type: "POST",
            success: function (response) {
                jQuery('.portfolio-feature-loader').html('');

                if (response.error == 1) {

                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + response.message + '</div>');
                    classes = jQuery('#cs_alerts').attr('class');
                    classes = classes + " active";
                    jQuery('#cs_alerts').addClass(classes);

                    setTimeout(function () {
                        jQuery('#cs_alerts').removeClass("active");
                    }, 4000);

                } else {
                    setTimeout(function () {
                        trigger_func('#candidate_resume_click_link_id');
                    }, 200);
                }
            }
        });
    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
}

/**
 * edit portfolio candidate list
 */

function edit_portfolio_to_candidate_list(admin_url, form_id, id) {
    "use strict";
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var error = 0;
    var fd = new FormData();
    var file_data = fd.append('cs_portfolio_image_upload', jQuery('#cs_portfolio_image_upload' + id)[0].files[0]);
    var serializedValues = jQuery("#" + form_id).serializeArray();
    jQuery.each(serializedValues, function (key, input) {
        fd.append(input.name, input.value);
    });
    // adding one more flag value

    if (jQuery("#cs_image_title" + id).val() == "") {
        error = 1;
        classes = jQuery("#cs_image_title" + id).attr("class");
        jQuery("#cs_image_title" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_image_title" + id).removeClass("has-error");
    }
    if (error == 0) {
        fd.append('flag_id', id);
        jQuery.ajax({
            url: admin_url,
            data: fd,
            contentType: false,
            processData: false,
            dataType: "JSON",
            type: "POST",
            success: function (response) {
                jQuery('.portfolio-feature-loader').html('');
                if (response.error == 1) {
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + response.message + '</div>');
                    classes = jQuery('#cs_alerts').attr('class');
                    classes = classes + " active";
                    jQuery('#cs_alerts').addClass(classes);

                    setTimeout(function () {
                        jQuery('#cs_alerts').removeClass("active");
                    }, 4000);
                } else {
                    setTimeout(function () {
                        trigger_func('#candidate_resume_click_link_id');
                    }, 2100);
                }

            }
        });
    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);
        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
}

/**
 * add portfolio list fe
 */

var counter_portfolio = 0;
function add_portfolio_to_list_fe(admin_url, plugin_url, form_id) {
    "use strict";
    counter_portfolio++;
    var dataString = 'counter_portfolio=' + counter_portfolio +
            '&cs_image_title=' + jQuery("#cs_image_title").val() +
            '&cs_image_upload=' + jQuery("#cs_image_upload").val() +
            '&action=cs_add_portfolio_to_list_fe';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_portfolio_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_portfolio', 'append');
            jQuery("#cs_image_title").val("Title");
            jQuery("#cs_image_upload").val("");
            ajax_form_save(admin_url, plugin_url, form_id);
        }
    });
    return false;
}

/**
 * add skills list
 */
var counter_skill = 0;
function add_skills_to_list(admin_url, plugin_url) {
    "use strict";
    counter_skill++;
    var dataString = 'counter_skill=' + counter_skill +
            '&cs_skill_title=' + jQuery("#cs_skill_title").val() +
            '&cs_skill_percentage=' + jQuery("#cs_skill_percentage").val() +
            '&action=cs_add_skills_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_skills_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_skills', 'append');
            jQuery("#cs_skill_title").val(jobhunt_functions_vars.title);
            jQuery("#cs_skill_percentage").val("");
        }
    });
    return false;
}
/**
 * add skills list fee
 */

var counter_skill = 0;
function add_skills_to_list_fe(admin_url, plugin_url, form_id) {

    //return false;
    "use strict";
    counter_skill++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var cs_skill_title = jQuery("#cs_skill_title").val();
    var cs_skill_percentage = jQuery("#cs_skill_percentage").val();

    var dataString = 'counter_skill=' + counter_skill +
            '&cs_skill_title=' + cs_skill_title +
            '&cs_skill_percentage=' + cs_skill_percentage +
            '&action=cs_add_skills_to_list_fe';

    if (cs_skill_title == "") {
        error = 1;
        classes = jQuery("#cs_skill_title").attr("class");
        jQuery("#cs_skill_title").addClass(classes + " has-error");

    } else {
        jQuery("#cs_skill_title").removeClass("has-error");
    }
    if (cs_skill_percentage == "") {
        error = 1;
        classes = jQuery("#cs_skill_percentage").attr("class");
        jQuery("#cs_skill_percentage").addClass(classes + " has-error");
    } else if ((cs_skill_percentage < 0 || cs_skill_percentage > 100)) {

        error = 1;
        classes = jQuery("#cs_skill_percentage").attr("class");
        jQuery("#cs_skill_percentage").addClass(classes + " has-error");
    } else {
        jQuery("#cs_skill_percentage").removeClass("has-error");
    }

    if (error == 0) {

        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery("#total_skills_list").append(response);
                ajax_form_save(admin_url, plugin_url, form_id);
            }
        });
    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);


    }
    return false;
}


/**
 * edit skills list fee
 */

function edit_skills_to_list_fe(admin_url, plugin_url, form_id, id) {
    "use strict";
    counter_education++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';

    var cs_skill_title = jQuery("#cs_skill_title" + id).val();
    var cs_skill_percentage = jQuery("#cs_skill_percentage" + id).val();


    if (cs_skill_title == "") {
        error = 1;
        classes = jQuery("#cs_skill_title" + id).attr("class");
        jQuery("#cs_skill_title" + id).addClass(classes + " has-error");

    } else {
        jQuery("#cs_skill_title" + id).removeClass("has-error");
    }
    if (cs_skill_percentage == "") {
        error = 1;
        classes = jQuery("#cs_skill_percentage" + id).attr("class");
        jQuery("#cs_skill_percentage" + id).addClass(classes + " has-error");
    } else if ((cs_skill_percentage < 0 || cs_skill_percentage > 100)) {

        error = 1;
        classes = jQuery("#cs_skill_percentage" + id).attr("class");
        jQuery("#cs_skill_percentage" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_skill_percentage" + id).removeClass("has-error");
    }
    if (error == 0) {
        ajax_form_save(admin_url, plugin_url, form_id, id);
    } else {

        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);

    }
    return false;
}

/**
 * add education list
 */

var counter_education = 0;
function add_education_to_list(admin_url, plugin_url) {
    "use strict";
    counter_education++;
    var dataString = 'counter_education=' + counter_education +
            '&cs_edu_title=' + jQuery("#cs_edu_title").val() +
            '&cs_edu_from_date=' + jQuery("#cs_edu_from_date").val() +
            '&cs_edu_to_date=' + jQuery("#cs_edu_to_date").val() +
            '&cs_edu_institute=' + jQuery("#cs_edu_institute").val() +
            '&cs_edu_desc=' + jQuery("#cs_edu_desc").val() +
            '&action=cs_add_education_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_education_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_education', 'append');
            jQuery("#cs_edu_title").val("Title");
            jQuery("#cs_edu_from_date").val("");
            jQuery("#cs_edu_to_date").val("");
            jQuery("#cs_edu_institute").val("");
            jQuery("#cs_edu_desc").val("");
        }
    });
    return false;
}

/**
 * add education list fee
 */


var counter_education = 0;
function add_education_to_list_fe(admin_url, plugin_url, form_id) {
    "use strict";
    // alert("here from skills");
    //return false;
    counter_education++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');

    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var dataString = 'counter_education=' + counter_education +
            '&cs_edu_title=' + jQuery("#cs_edu_title").val() +
            '&cs_edu_from_date=' + jQuery("#cs_edu_from_date").val() +
            '&cs_edu_to_date=' + jQuery("#cs_edu_to_date").val() +
            '&cs_edu_institute=' + jQuery("#cs_edu_institute").val() +
            '&cs_edu_desc=' + jQuery("#cs_edu_desc").val() +
            '&action=cs_add_education_to_list_fe';

    if (jQuery("#cs_edu_title").val() == "") {
        error = 1;
        classes = jQuery("#cs_edu_title").attr("class");
        jQuery("#cs_edu_title").addClass(classes + " has-error");

    } else {
        jQuery("#cs_edu_title").removeClass("has-error");
    }
    if (jQuery("#cs_edu_from_date").val() == "") {
        error = 1;

        classes = jQuery("#cs_edu_from_date").attr("class");
        jQuery("#cs_edu_from_date").addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_from_date").removeClass("has-error");
    }
    if (jQuery("#cs_edu_to_date").val() == "") {
        error = 1;
        classes = jQuery("#cs_edu_to_date").attr("class");
        jQuery("#cs_edu_to_date").addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_to_date").removeClass("has-error");
    }
    if (jQuery("#cs_edu_institute").val() == "") {
        error = 1;
        classes = jQuery("#cs_edu_institute").attr("class");
        jQuery("#cs_edu_institute").addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_institute").removeClass("has-error");
    }
    if (error == 0) {
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery("#total_education_list").append(response);
                ajax_form_save(admin_url, plugin_url, form_id);
            }
        });
    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
    return false;
}

/**
 * edit education list fee
 */

function edit_education_to_list_fe(admin_url, plugin_url, form_id, id) {
    "use strict";
    counter_education++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var cs_edu_title = jQuery("#cs_edu_title" + id).val();
    var cs_edu_from_date = jQuery("#cs_edu_from_date" + id).val();
    var cs_edu_to_date = jQuery("#cs_edu_to_date" + id).val();
    var cs_edu_institute = jQuery("#cs_edu_institute" + id).val();

    if (cs_edu_title == "") {
        error = 1;
        classes = jQuery("#cs_edu_title" + id).attr("class");
        jQuery("#cs_edu_title" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_title" + id).removeClass("has-error");
    }
    if (cs_edu_from_date == "") {
        error = 1;
        classes = jQuery("#cs_edu_from_date" + id).attr("class");
        jQuery("#cs_edu_from_date" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_from_date" + id).removeClass("has-error");
    }
    if (cs_edu_to_date == "") {
        error = 1;
        classes = jQuery("#cs_edu_to_date" + id).attr("class");
        jQuery("#cs_edu_to_date" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_to_date" + id).removeClass("has-error");
    }
    if (cs_edu_institute == "") {
        error = 1;
        classes = jQuery("#cs_edu_institute" + id).attr("class");
        jQuery("#cs_edu_institute" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_edu_institute" + id).removeClass("has-error");
    }
    if (error == 0) {
        ajax_form_save(admin_url, plugin_url, form_id, id);
    } else {

        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
    return false;
}
/**
 * add experience list
 */

var counter_experience = 0;
function add_experience_to_list(admin_url, plugin_url) {
    "use strict";
    counter_experience++;
    var dataString = 'counter_experience=' + counter_experience +
            '&cs_exp_title=' + jQuery("#cs_exp_title").val() +
            '&cs_exp_from_date=' + jQuery("#cs_exp_from_date").val() +
            '&cs_exp_to_date=' + jQuery("#cs_exp_to_date").val() +
            '&cs_exp_company=' + jQuery("#cs_exp_company").val() +
            '&cs_exp_desc=' + jQuery("#cs_exp_desc").val() +
            '&action=cs_add_experience_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_experience_list").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_experience', 'append');
            jQuery("#cs_exp_title").val("Title");
            jQuery("#cs_exp_from_date").val("");
            jQuery("#cs_exp_to_date").val("");
            jQuery("#cs_exp_company").val("");
            jQuery("#cs_exp_desc").val("");
        }
    });
    return false;
}

/**
 * add experience list fee
 */

var counter_experience = 0;
function add_experience_to_list_fe(admin_url, plugin_url, form_id) {
    "use strict";
    counter_experience++;
    var cs_exp_to_present_till;
    if (jQuery("#cs_exp_to_present_till").is(":checked")) {
        cs_exp_to_present_till = 'on';
    } else {
        cs_exp_to_present_till = '';
    }
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var dataString = 'counter_experience=' + counter_experience +
            '&cs_exp_title=' + jQuery("#cs_exp_title").val() +
            '&cs_exp_from_date=' + jQuery("#cs_exp_from_date").val() +
            '&cs_exp_to_date=' + jQuery("#cs_exp_to_date").val() +
            '&cs_exp_to_present_till=' + cs_exp_to_present_till +
            '&cs_exp_company=' + jQuery("#cs_exp_company").val() +
            '&cs_exp_desc=' + jQuery("#cs_exp_desc").val() +
            '&action=cs_add_experience_to_list_fe';

    if (jQuery("#cs_exp_title").val() == "") {
        error = 1;
        classes = jQuery("#cs_exp_title").attr("class");
        jQuery("#cs_exp_title").addClass(classes + " has-error");
    } else {
        jQuery("#cs_exp_title").removeClass("has-error");
    }
    if (jQuery("#cs_exp_from_date").val() == "") {
        error = 1;
        classes = jQuery("#cs_exp_from_date").attr("class");
        jQuery("#cs_exp_from_date").addClass(classes + " has-error");
    } else {
        jQuery("#cs_exp_from_date").removeClass("has-error");
    }
    if (jQuery("#cs_exp_to_date").val() == "") {
        if (jQuery("#cs_exp_to_present_till").is(":checked")) {
            jQuery("#cs_exp_to_date").removeClass("has-error");
        } else {
            error = 1;
            classes = jQuery("#cs_exp_to_date").attr("class");
            jQuery("#cs_exp_to_date").addClass(classes + " has-error");
        }
    } else {
        jQuery("#cs_exp_to_date").removeClass("has-error");
    }
    if (jQuery("#cs_exp_company").val() == "") {
        error = 1;
        classes = jQuery("#cs_exp_company").attr("class");
        jQuery("#cs_exp_company").addClass(classes + " has-error");
    } else {
        jQuery("#cs_exp_company").removeClass("has-error");
    }
    if (error == 0) {
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery("#total_experience_list").append(response);
                ajax_form_save(admin_url, plugin_url, form_id);
            }
        });
    } else {

        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
    return false;
}

/**
 * edit experience list fee
 */

function edit_experience_to_list_fe(admin_url, plugin_url, form_id, id) {
    "use strict";
    counter_education++;
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var error = 0;
    var message = jQuery("#candidate-dashboard").data('validationmsg');
    var classes = '';
    var cs_exp_title = jQuery("#cs_exp_title" + id).val();
    var cs_exp_from_date = jQuery("#cs_exp_from_date" + id).val();
    var cs_exp_to_date = jQuery("#cs_exp_to_date" + id).val();
    var cs_exp_company = jQuery("#cs_exp_company" + id).val();
    if (cs_exp_title == "") {
        error = 1;
        classes = jQuery("#cs_exp_title" + id).attr("class");
        jQuery("#cs_exp_title" + id).addClass(classes + " has-error");

    } else {
        jQuery("#cs_exp_title" + id).removeClass("has-error");
    }
    if (cs_exp_from_date == "") {
        error = 1;
        classes = jQuery("#cs_exp_from_date" + id).attr("class");
        jQuery("#cs_exp_from_date" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_exp_from_date" + id).removeClass("has-error");
    }
    if (cs_exp_to_date == "") {
        if (jQuery("#cs_exp_to_present_till" + id).is(":checked")) {
            jQuery("#cs_exp_to_date" + id).removeClass("has-error");
        } else {
            error = 1;
            classes = jQuery("#cs_exp_to_date" + id).attr("class");
            jQuery("#cs_exp_to_date" + id).addClass(classes + " has-error");
        }
    } else {
        jQuery("#cs_exp_to_date" + id).removeClass("has-error");
    }
    if (cs_exp_company == "") {
        error = 1;
        classes = jQuery("#cs_exp_company" + id).attr("class");
        jQuery("#cs_exp_company" + id).addClass(classes + " has-error");
    } else {
        jQuery("#cs_exp_company" + id).removeClass("has-error");
    }
    if (error == 0) {
        ajax_form_save(admin_url, plugin_url, form_id, id);
    } else {

        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
    return false;
}


/**
 * add feats list
 */
var counter_feats = 0;
function add_feats_to_list(admin_url, plugin_url) {
    "use strict";
    counter_feats++;
    var dataString = 'counter_feats=' + counter_feats +
            '&cs_feats_title=' + jQuery("#cs_feats_title").val() +
            '&cs_feats_image=' + jQuery("#cs_feats_image").val() +
            '&cs_feats_desc=' + jQuery("#cs_feats_desc").val() +
            '&action=cs_add_feats_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_feats").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_feats_title', 'append');
            jQuery("#cs_feats_title").val("Title");
            jQuery("#cs_feats_image").val("");
            jQuery("#cs_feats_desc").val("");
        }
    });
    return false;
}
/**
 * add safety list
 */

var counter_safety = 0;
function add_safety_to_list(admin_url, plugin_url) {
    "use strict";
    counter_safety++;
    var dataString = 'counter_safety=' + counter_safety +
            '&cs_safety_title=' + jQuery("#cs_safety_title").val() +
            '&cs_safety_desc=' + jQuery("#cs_safety_desc").val() +
            '&action=cs_add_safetytext_to_list';
    cs_data_loader_load(".feature-loader");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_safety").append(response);
            jQuery(".feature-loader").html("");
            cs_remove_overlay('add_safety_title', 'append');
            jQuery("#cs_safety_title").val("Title");
            jQuery("#cs_safety_desc").val("");
        }
    });
    jQuery(".cs-list-table").show("");
    return false;

}
/**
 * Plugin Option Saving
 *
 */
function plugin_option_save(admin_url) {
    "use strict";
    jQuery(".outerwrapp-layer,.loading_div").fadeIn(100);
    var candidate_skills_calc = 0;
    jQuery('#cadidate-skills-set-calc-sec input.candidate_skill_field').each(function () {
        if (jQuery(this).val() != '' && parseInt(jQuery(this).val()) > 0) {
            candidate_skills_calc += parseInt(jQuery(this).val());
        } else {
            jQuery(this).val(0);
        }
    });
    function newValues() {
        var serializedValues = jQuery("#plugin-options input,#plugin-options select,#plugin-options textarea").serialize() + '&candidate_skills_calc=' + candidate_skills_calc + '&action=plugin_option_save';
        return serializedValues;
    }
    var serializedReturn = newValues();
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: serializedReturn,
        success: function (response) {

            jQuery(".loading_div").hide();
            jQuery(".form-msg .innermsg").html(response);
            jQuery(".form-msg").show();
            jQuery(".outerwrapp-layer").fadeTo(3000, 1000).slideUp(3000);
            slideout();
        }
    });
}


/**
 * Plugin Reset Option
 *
 */
function cs_rest_plugin_options(admin_url) {
    "use strict";

    var var_confirm = confirm(jobhunt_functions_vars.plugin_options_replace);
    if (var_confirm == true) {
        var dataString = 'action=plugin_option_rest_all';
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {

                jQuery(".form-msg").show();
                jQuery(".form-msg").html(response);
                jQuery(".loading_div").hide();
                window.location.reload(true);
                slideout();
            }
        });
    }
}

function cs_set_p_filename(file_value, file_path) {
    "use strict";
    jQuery(".backup_action_btns").find('input[type="button"]').attr('data-file', file_value);
    jQuery(".backup_action_btns").find('> a').attr('href', file_path + file_value);
    jQuery(".backup_action_btns").find('> a').attr('download', file_value);
}

function cs_pl_backup_generate(admin_url) {
    "use strict";
    jQuery(".outerwrapp-layer,.loading_div").fadeIn(100);

    var dataString = 'action=cs_pl_opt_backup_generate';
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {

            jQuery(".loading_div").hide();
            jQuery(".form-msg .innermsg").html(response);
            jQuery(".form-msg").show();
            jQuery(".outerwrapp-layer").delay(100).fadeOut(100);
            window.location.reload(true);
            slideout();
        }
    });
    //return false;
}

jQuery('.backup_generates_area').on('click', '#cs-p-backup-delte', function () {
    "use strict";
    var var_confirm = confirm(jobhunt_functions_vars.delete_backup_file);
    if (var_confirm == true) {
        jQuery(".outerwrapp-layer,.loading_div").fadeIn(100);

        var admin_url = jQuery('.backup_generates_area').data('ajaxurl');
        var file_name = jQuery(this).data('file');

        var dataString = 'file_name=' + file_name + '&action=cs_pl_backup_file_delete';
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {

                jQuery(".loading_div").hide();
                jQuery(".form-msg .innermsg").html(response);
                jQuery(".form-msg").show();
                jQuery(".outerwrapp-layer").delay(2000).fadeOut(100);
                window.location.reload(true);
                slideout();
            }
        });
        //return false;
    }
});

jQuery('.backup_generates_area').on('click', '#cs-p-backup-restore, #cs-p-backup-url-restore', function () {

    "use strict";
    jQuery(".outerwrapp-layer,.loading_div").fadeIn(100);

    var admin_url = jQuery('.backup_generates_area').data('ajaxurl');
    var file_name = jQuery(this).data('file');

    var dataString = 'file_name=' + file_name + '&action=cs_pl_backup_file_restore';

    if (typeof (file_name) === 'undefined') {

        var file_name = jQuery('#bkup_import_url').val();

        var dataString = 'file_name=' + file_name + '&file_path=yes&action=cs_pl_backup_file_restore';
    }

    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {

            jQuery(".loading_div").hide();
            jQuery(".form-msg .innermsg").html(response);
            jQuery(".form-msg").show();
            jQuery(".outerwrapp-layer").delay(2000).fadeOut(100);
            window.location.reload(true);
            slideout();
        }
    });

});
/**
 * Plugin Reset Option
 *
 */
function cs_rest_plugin_options(admin_url, plugin_url) {
    "use strict";
    var var_confirm = confirm(jobhunt_functions_vars.plugin_options_replace);
    if (var_confirm == true) {
        var dataString = 'action=plugin_option_rest_all';
        jQuery.ajax({
            type: "POST",
            url: admin_url + "/admin-ajax.php",
            data: dataString,
            success: function (response) {
                jQuery(".form-msg").show();
                jQuery(".form-msg").html(response);
                jQuery(".loading_div").hide();
                window.location.reload(true);
                slideout();
            }
        });
    }
    //return false;
}
/**
 * Plugin Reset Option
 *
 */

function cs_get_currencies(code) {
    "use strict";
    if (code != '') {
        var dataString = 'code=' + code +
                '&action=cs_get_currency_symbol';
        var plugin_url = jQuery("#cs_plugin_url").val();
        jQuery("#currency_sign").parent('.to-field').append("<span><i class='icon-spinner8 icon-spin'></i></span>");
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: dataString,
            success: function (response) {
                jQuery("#currency_sign").val(response);
                jQuery("#currency_sign").parent('.to-field').find('span').remove();
            }
        });
    }

    return false;
}
/**
 * Accomodation Toggle Function
 *
 */
jQuery(".plain-info").find('.cslist-info').hide();
jQuery('.info-toggle').on('click', function (e) {
    e.preventDefault();
    var datalink = jQuery(this).attr('id');
    var active = jQuery(this).hasClass('active');
    if (active) {
        jQuery(this).removeClass('active');
        jQuery(this).parents(".plain-info").find('.cslist-info').toggle("slow");
        jQuery(this).find('i').removeClass().addClass('icon-plus8');
    } else {
        jQuery(this).addClass('active');
        jQuery(this).parents(".plain-info").find('.cslist-info').toggle("slow");
        jQuery(this).find('i').removeClass().addClass('icon-minus8');
    }
});
/**
 * Check Availabilty
 */
function cs_check_fields_avail() {
    "use strict";
    jQuery('input[id^="check_field_name"]').change(function (e) {
        var doneTypingInterval = 1000; //time in ms, 5 second for example
        var name = jQuery(this).val();
        var serializedValues = jQuery("form").serialize();
        var $this = jQuery(this);
        var dataString = 'name=' + name +
                '&form_field_names=' + serializedValues +
                '&action=cs_check_fields_avail'

        setTimeout(function () {
            $this.next('span').html('<i class="icon-spinner8 icon-spin"></i>');
            jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: dataString,
                dataType: 'json',
                success: function (response) {
                    if (response.type == 'success') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').removeAttr('disabled');
                    } else if (response.type == 'error') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').attr('disabled', 'disabled');
                    }
                }
            });
        }, doneTypingInterval)

    });
}


/**
 * Check candidate custom fields Availabilty
 */
function cs_check_candidate_fields_avail() {
    //alert("test");
    "use strict";
    jQuery('input[id^="check_field_name"]').change(function (e) {
        var doneTypingInterval = 1000; //time in ms, 5 second for example
        var name = jQuery(this).val();
        var serializedValues = jQuery("form").serialize();
        var $this = jQuery(this);
        var dataString = 'name=' + name +
                '&form_field_names=' + serializedValues +
                '&action=cs_check_candidate_fields_avail'

        setTimeout(function () {

            $this.next('span').html('<i class="icon-spinner8 icon-spin"></i>');
            jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: dataString,
                dataType: 'json',
                success: function (response) {
                    if (response.type == 'success') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').removeAttr('disabled');
                    } else if (response.type == 'error') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').attr('disabled', 'disabled');
                    }
                }
            });
        }, doneTypingInterval)

    });
}

/**
 * Check employer custom fields Availabilty
 */
function cs_check_employer_fields_avail() {
    "use strict";
    jQuery('input[id^="check_field_name"]').change(function (e) {
        var doneTypingInterval = 1000; //time in ms, 5 second for example
        var name = jQuery(this).val();
        var serializedValues = jQuery("form").serialize();
        var $this = jQuery(this);
        var dataString = 'name=' + name +
                '&form_field_names=' + serializedValues +
                '&action=cs_check_employer_fields_avail'

        setTimeout(function () {

            $this.next('span').html('<i class="icon-spinner8 icon-spin"></i>');
            jQuery.ajax({
                type: "POST",
                url: ajaxurl,
                data: dataString,
                dataType: 'json',
                success: function (response) {
                    if (response.type == 'success') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').removeAttr('disabled');
                    } else if (response.type == 'error') {
                        //$this.parents('.pbwp-form-rows').children('.name-checking').html(response.message);
                        $this.parent().find('span.name-checking').html(response.message);
                        jQuery('input[type="button"]').attr('disabled', 'disabled');
                    }
                }
            });
        }, doneTypingInterval)

    });
}
/**
 * Add reviews
 */
function cs_reviews_submission(admin_url) {
    'use strict';
    var email = jQuery("#reviewer_email").val();
    var subject = jQuery("#reviews_title").val();
    var name = jQuery("#reviewer_name").val();
    var description = jQuery("#reviews_description").val();
    if (email == '' || subject == '' || name == '' || description == '') {
        alert('Please fill all fields.');
        return false;
    }

    if (!validateEmail(email)) {
        alert(jobhunt_functions_vars.valid_email_error);
        return false;
    }
    jQuery(".review-message-type").html('');
    jQuery("#loading").html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        dataType: "json",
        data: jQuery('#cs-reviews-form').serialize() + '&action=cs_add_reviews',
        success: function (response) {
            jQuery("#loading").html('');
            jQuery(".review-message-type").html(response.message);
            jQuery(".review-message-type").show();
        }
    });
    return false;
}
/**
 * validate email
 */
function validateEmail($email) {
    "use strict";
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}
/**
 * Render Custom Fields
 */

function cs_custom_fields_script(id) {
    "use strict";
    var parentItem = jQuery("#" + id);
    parentItem.sortable({
        cancel: 'div div.poped-up,.pb-toggle',
        handle: ".pbwp-legend",
        placeholder: "ui-state-highlighter"
    });
    var c = 0;
    parentItem.on("click", "img.pbwp-clone-field", function (e) {
        e.preventDefault();
        var _this = jQuery(this),
                b = _this.closest('div.pbwp-clone-field');
        b.clone().insertAfter(b);
        var a = _this.parents('.pbwp-form-sub-fields').find('input:radio');
        a.each(function (index, el) {
            jQuery(this).val(index + 1);
        });
    });
    parentItem.on("click", "img.pbwp-remove-field", function (e) {
        e.preventDefault();
        var _this = jQuery(this),
                b = _this.closest('.pbwp-form-sub-fields');
        c = b.find('div.pbwp-clone-field').length;
        if (c > 1) {
            _this.closest("div.pbwp-clone-field").remove()
        }
        _this.parents('div.pbwp-clone-field').remove();
    });
    parentItem.on("click", ".pbwp-remove", function (e) {
        e.preventDefault();
        var a = confirm("This will delete Item");
        if (a) {
            jQuery(this).parents(".pb-item-container").remove()
            alertbox();
        }
    })

    parentItem.on("click", "a.pbwp-toggle", function (e) {
        e.preventDefault();
        jQuery(this).parents(".pbwp-legend").next().slideToggle(300);
    });
}

jQuery('#cs_city_select_country').on('change', function () {

    "use strict";
    var plugin_url = jQuery(this).parents("#locations_wrap").data('plugin_url');
    var dataString = 'country=' + this.value + '&action=cs_load_states';
    jQuery(".loader-states").html("<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />");
    jQuery(".loader-states").show();
    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        data: dataString,
        success: function (response) {
            jQuery("#cs_select_states").html(response);
            jQuery(".loader-states").html('').hide();

        }
    });
});
jQuery('[name=cs_update_select_country]').change(function () {
    "use strict";
    var id = jQuery(this).data('id');
    var plugin_url = jQuery(this).parents("#locations_wrap").data('plugin_url');
    var dataString = 'country=' + this.value + '&action=cs_load_states';
    jQuery(".update-loader-states-" + id).html("<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />");
    jQuery(".update-loader-states-" + id).show();
    jQuery.ajax({
        type: "POST",
        url: ajaxurl,
        data: dataString,
        success: function (response) {
            jQuery("#cs_update_select_states_" + id).html(response);
            jQuery(".update-loader-states-" + id).html('').hide();
        }
    });
});

/**
 * add package to list
 */
var counter_package = 0;
function add_package_to_list(admin_url, plugin_url) {
    "use strict";
    counter_package++;
    var dataString = 'counter_package=' + counter_package +
            '&package_title=' + jQuery("#package_title").val() +
            '&package_type=' + jQuery("#package_type").val() +
            '&package_price=' + jQuery("#package_price").val() +
            '&package_duration=' + jQuery("#package_duration").val() +
            '&package_duration_period=' + jQuery("#package_duration_period").val() +
            '&package_no_ads=' + jQuery("#package_no_ads").val() +
            '&package_description=' + jQuery("#package_description").val() +
            '&cs_package_type=' + jQuery("#cs_package_type").val() +
            '&package_listings=' + jQuery("#package_listings").val() +
            '&package_cvs=' + jQuery("#package_cvs").val() +
            '&package_submission_limit=' + jQuery("#package_submission_limit").val() +
            '&cs_list_dur=' + jQuery("#cs_list_dur").val() +
            '&package_featured_ads=' + jQuery("#package_featured_ads").val() +
            '&package_feature=' + jQuery("#package_feature").val() +
            '&action=cs_add_package_to_list';
    jQuery(".package-loader").html("<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />");
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery("#total_packages").append(response);
            jQuery(".package-loader").html("");
            cs_remove_overlay('add_package_title', 'append');
            jQuery("#package_title").val("Title");
        }
    });
    return false;
}
/**
 * package type toogle
 */
function cs_package_type_toogle(value, id) {
    "use strict";
    var $ = jQuery;
    if (value == "single") {
        jQuery("#package_listings_con" + id).hide();
    } else {
        jQuery("#package_listings_con" + id).show();
    }
}


/**
 * search map
 */
function cs_gl_search_map() {

    "use strict";
    var vals;
    vals = jQuery('#loc_address').val();
    jQuery('.gllpSearchField').val(vals);
}
/**
 * sugg change
 */
function cs_job_loc_sugg_change(value) {
    "use strict";
    var $ = jQuery;
    if (value == 'website') {
        $("#cs_search_by_location_select").show();
    } else {
        $("#cs_search_by_location_select").hide();
    }
}

/**
 * Value toggle
 */
function cs_search_by_location_change(value) {

    "use strict";
    var $ = jQuery;
    if (value == 'single_city') {
        $("#cs_search_by_location_city_select").show();
    } else {
        $("#cs_search_by_location_city_select").hide();
    }
}

/**
 * Add to Wishlist Function
 */
function cs_addto_wishlist(admin_url, post_id) {
    "use strict";

    var dataString = 'post_id=' + post_id + '&action=cs_addto_usermeta';
    jQuery(".cs-add-wishlist").html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(".cs-add-wishlist").html(response);
            jQuery("a.cs-add-wishlist").attr("onclick", "cs_delete_from_favourite('" + admin_url + "','" + post_id + "','post')");
            jQuery("a.cs-add-wishlist").attr("data-original-title", jobhunt_functions_vars.shortlist);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;
}
/**
 * Do Confirme
 */
function doConfirmed(msg, yesFn, noFn) {
    "use strict";
    var confirmBox = jQuery("#confirmBox");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function () {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);
    confirmBox.show();

}

/**
 * Remove Shortlist Function
 */
function cs_delete_wishlist(admin_url, _this) {
    "use strict";
    document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line
    document.getElementById('id_truebtn').onclick = function () {
        var post_id = jQuery(_this).data("postid");
        var dataString = 'post_id=' + post_id + '&action=cs_delete_wishlist';
        jQuery(".close-" + post_id).html('<i class="icon-spinner8 icon-spin"></i>');
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                jQuery(".close-" + post_id).parents('.holder-' + post_id).remove();
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





/**
 * Remove Wishlist Function
 */
function cs_delete_from_favourite(admin_url, post_id) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_delete_from_favourite';
    jQuery(".cs-add-wishlist").html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(".cs-add-wishlist").html(response);
            jQuery("a.cs-add-wishlist").attr("onclick", "cs_addto_wishlist('" + admin_url + "','" + post_id + "','post')");
            jQuery("a.cs-add-wishlist").attr("data-original-title", jobhunt_functions_vars.shortlisted);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;


}


function ajax_form_save(admin_url, theme_url, form_id, id) {

    "use strict";
    id = id || 0;
    var classes = '';

    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    function newValues() {
        var serializedValues = jQuery("#" + form_id).serialize();
        return serializedValues;
    }
    var serializedReturn = newValues();
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: serializedReturn,
        success: function (response) {
            setTimeout(function () {
                trigger_func('#candidate_resume_click_link_id');
            }, 200);
            cs_data_loader_load('.skill-percent-main');
            jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: 'action=ajax_candidate_sidebar_percentage_data',
                dataType: "html",
                success: function (skills_response) {
                    jQuery('.skill-percent-main').html('');
                    jQuery('.skill-percent-main').html(skills_response);
                }
            });
        }
    });
    //return false;
}
function ajax_profile_form_save(admin_url, theme_url, form_id) {
    "use strict";
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var validation_message = jQuery("#candidate-dashboard").data('validationmsg');
    var error = 0;
    var classes = '';
    jQuery('#cs_candidate input, #cs_candidate radio, #cs_candidate checkbox, #cs_candidate file').each(
            function () {
                var input = jQuery(this);
                if (input.attr('required') == 'required') {
                    if (input.val() == '') {
                        classes = input.attr("class");
                        input.addClass(classes + " has-error");
                        error = 1;
                    } else {
                        input.removeClass("has-error");
                    }
                }
            }
    );
    jQuery('#cs_candidate select').each(
            function () {
                var input = jQuery(this);
                if (input.attr('required') == 'required') {
                    if (input.val() == '' || input.val() == null) {
                        classes = input.parent().attr("class");
                        input.parent().addClass(classes + " has-error");
                        error = 1;
                    } else {
                        input.parent().removeClass("has-error");
                    }
                }
            }
    );

    if (error == 0) {
        var fd = new FormData();
        var file_data = fd.append('media_upload', jQuery('input[type=file]')[0].files[0]);
        fd.append('cand_cover_media_upload', jQuery('input[type=file]')[1].files[0]);

        var serializedValues = jQuery("#" + form_id).serializeArray();
        jQuery.each(serializedValues, function (key, input) {
            fd.append(input.name, input.value);
        });
        jQuery.ajax({
            url: admin_url,
            data: fd,
            contentType: false,
            processData: false,
            dataType: "html",
            type: "POST",
            success: function (response) {
                jQuery('#candidate-dashboard .main-cs-loader').html('');
                jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + response + '</div>');
                classes = jQuery('#cs_alerts').attr('class');
                classes = classes + " active";
                jQuery('#cs_alerts').addClass(classes);

                jQuery.ajax({
                    type: "POST",
                    url: admin_url,
                    data: 'action=ajax_candidate_sidebar_percentage_data',
                    dataType: "html",
                    success: function (skills_response) {
                        jQuery('.skill-percent-main').html('');
                        jQuery('.skill-percent-main').html(skills_response);
                    }
                });

                setTimeout(function () {
                    jQuery('#cs_alerts').removeClass("active");
                }, 4000);
            }
        });
    } else {
        jQuery('#candidate-dashboard .main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg error"><i class="icon-warning2"></i>' + validation_message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);

        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);
    }
    //return false;
}



function ajax_employer_profile_form_save(admin_url, theme_url, form_id) {
    "use strict";

    cs_data_loader_load('#employer-dashboard .main-cs-loader');
    var validation_message = jQuery("#employer-dashboard").data('validationmsg');
    var error = 0;
    var classes = '';
    jQuery('#cs_employer_form input, #cs_employer_form radio, #cs_employer_form checkbox, #cs_employer_form file').each(
            function () {
                var input = jQuery(this);
                if (input.attr('required') == 'required') {
                    if (input.val() == '') {
                        classes = input.attr("class");
                        input.addClass(classes + " has-error");
                        error = 1;
                    } else {
                        input.removeClass("has-error");
                    }
                }
            }
    );
    jQuery('#cs_employer_form select').each(
            function () {
                var input = jQuery(this);
                if (input.attr('required') == 'required') {
                    if (input.val() == '' || input.val() == null) {
                        classes = input.parent().attr("class");
                        input.parent().addClass(classes + " has-error");
                        error = 1;
                    } else {
                        input.parent().removeClass("has-error");
                    }
                }
            }
    );
    if (error == 0) {
        var fd = new FormData();
        var file_data = fd.append('media_upload', jQuery('input[type=file]')[0].files[0]);

        fd.append('cover_media_upload', jQuery('input[type=file]')[1].files[0]);

        var serializedValues = jQuery("#" + form_id).serializeArray();
        jQuery.each(serializedValues, function (key, input) {
            fd.append(input.name, input.value);
        });

        jQuery.ajax({
            url: admin_url,
            data: fd,
            contentType: false,
            processData: false,
            dataType: "html",
            type: "POST",
            success: function (response) {
                jQuery('#employer-dashboard .main-cs-loader').html('');
                show_alert_msg(response);
            }
        });
    } else {
        jQuery('#employer-dashboard .main-cs-loader').html('');
        show_alert_msg(validation_message);
    }
    //return false;
}

function ajax_candidate_cv_form_save(admin_url, theme_url, form_id, uid) {
    "use strict";
    var error = 0;
    var save_msg = '';
    var classes = '';
    cs_data_loader_load('#candidate-dashboard .main-cs-loader');
    var fd = new FormData();
    var file_data = fd.append('media_upload', jQuery('#cv input[type=file]')[0].files[0]);
    var serializedValues = jQuery("#" + form_id).serializeArray();
    jQuery.each(serializedValues, function (key, input) {
        fd.append(input.name, input.value);
    });

    jQuery.ajax({
        url: admin_url,
        data: fd,
        contentType: false,
        processData: false,
        dataType: "html",
        type: "POST",
        success: function (response) {
            save_msg = response;
            // get again data
            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_cvcover';
            jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#cv').html(response);
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    show_alert_msg(save_msg);
                }
            });
        }
    });
    //return false;
}

function checkName(el, to, sbm) {
    "use strict";
    var ar_ext = ['pdf', 'doc', 'rtf', 'docx'];
// - coursesweb.net
    // get the file name and split it to separe the extension
    var name = el.value;
    var ar_name = name.split('.');
    // for IE - separe dir paths (\) from name
    var ar_nm = ar_name[0].split('\\');
    for (var i = 0; i < ar_nm.length; i++)
        var nm = ar_nm[i];
    // check the file extension
    var re = 0;
    for (var i = 0; i < ar_ext.length; i++) {
        if (ar_ext[i] == ar_name[1]) {
            re = 1;
            break;
        }
    }

    if (re != 1) {
        jQuery('.cs-status-msg-cv-upload').addClass("error-msg");
        el.value = '';
    } else {
        jQuery('.cs-status-msg-cv-upload').removeClass("error-msg");
        // add the name in 'to'
        var html_txt = "<div id='selecteduser-cv'><div class='alert alert-dismissible user-resume' id='cs_candidate_cv_box'><div>" + nm + "<div class='gal-edit-opts close'><a href='javascript:cs_del_media(\"cs_candidate_cv\")' class='delete'><span aria-hidden='true'>×</span></a></div></div></div></div>";
        jQuery("#selecteduser-cv").html(html_txt);

    }

}

function ajax_form_remove(admin_url, theme_url, form_id, id) {
    "use strict";
    /**
     * Delete Confirm Html popup
     */
    var html_popup = "<div id='confirmOverlay' style='display:block'> \
    <div id='confirmBox'><div id='confirmText'>"+jobhunt_functions_vars.are_you_sure+"</div> \
    <div id='confirmButtons'><div class='button confirm-yes'>"+jobhunt_functions_vars.delete+"</div>\
    <div class='button confirm-no'>"+jobhunt_functions_vars.cancel+"</div><br class='clear'></div></div></div>"
    jQuery(".delete-" + id).live("click", function () {

        jQuery(".delete-" + id).parents(".parentdelete").remove();
        ajax_form_save(admin_url, theme_url, form_id);
    });
    return false;
}

/****
 *  remove candidate resume options
 * @param {type} admin_url
 * @param {type} post_id
 * @param {type} obj
 * @returns {Boolean}
 * 
 * 
 */
function doConfirm(msg, yesFn, noFn) {
    "use strict";
    var confirmBox = jQuery("#confirmBox");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function () {
        confirmBox.hide();
    });
    confirmBox.find(".yes").click(yesFn);
    confirmBox.find(".no").click(noFn);
    confirmBox.show();
}

function cs_remove_resume_options_fromlist(admin_url, list_type, list_id) {
    "use strict";
    document.getElementById('id_confrmdiv').style.display = "block"; //this is the replace of this line
    document.getElementById('id_truebtn').onclick = function () {
        var dataString = 'list_type=' + list_type + '&list_id=' + list_id + '&action=cs_remove_resume_options_fromlist';
        cs_data_loader_load('.delete-' + list_id);
        jQuery.ajax({
            type: "POST",
            url: admin_url,
            data: dataString,
            success: function (response) {
                if (response != 'error') {
                    jQuery(".parentdeleterow-" + list_id).fadeTo(1000, 500).slideUp(500);
                    jQuery(".parentdeleterow-" + list_id).remove();
                    document.getElementById('id_confrmdiv').style.display = "none";

                    cs_data_loader_load('.skill-percent-main');
                    jQuery.ajax({
                        type: "POST",
                        url: admin_url,
                        data: 'action=ajax_candidate_sidebar_percentage_data',
                        dataType: "html",
                        success: function (skills_response) {
                            jQuery('.skill-percent-main').html('');
                            jQuery('.skill-percent-main').html(skills_response);
                        }
                    });


                } else {
                    jQuery('.delete-' + list_id).html('<i class="icon-trash"></i>');
                }
            }
        });
        return false;
    };
    document.getElementById('id_falsebtn').onclick = function () {
        document.getElementById('id_confrmdiv').style.display = "none";
        return false;
    };
}

/**
 * Add jobs to Wishlist Function
 */
function cs_addjobs_to_wishlist(admin_url, post_id, obj, style) {
    "use strict";
    if (typeof style === 'undefined') {
        style = 'default';
    }
    var dataString = 'post_id=' + post_id + '&action=cs_addjob_to_usermeta&view=' + style + '';
    jQuery(obj).parents('li').find('.whishlist_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('li').find('.whishlist_icon').html(response);
            jQuery(obj).parents('li').find('.whishlist_icon').attr("onclick", "cs_removejobs_to_wishlist('" + admin_url + "','" + post_id + "',this,'" + style + "')");
            jQuery(obj).parents('li').find('.whishlist_icon').attr("data-original-title", jobhunt_functions_vars.shortlist);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;
}
function cs_addjobs_to_wish(admin_url, post_id, obj) {
    "use strict";
    
    var dataString = 'post_id=' + post_id + '&action=cs_addjob_to_user';
    jQuery(obj).parents('li').find('.whishlist_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('li').find('.whishlist_icon').html(response);
            jQuery(obj).parents('li').find('.whishlist_icon').attr("onclick", "cs_removejobs_to('" + admin_url + "','" + post_id + "',this)");
            jQuery(obj).parents('li').find('.whishlist_icon').attr("data-original-title", jobhunt_functions_vars.shortlist);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;
}

/**
 * Remove Wishlist Function
 */
function cs_removejobs_to_wishlist(admin_url, post_id, obj, style) {
    "use strict";
    if (typeof style === 'undefined') {
        style = 'default';
    }
    var dataString = 'post_id=' + post_id + '&action=cs_removejob_to_usermeta&view=' + style + '';
    jQuery(obj).parents('li').find('.whishlist_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('li').find('.whishlist_icon').html(response);
            jQuery(obj).parents('li').find('.whishlist_icon').attr("onclick", "cs_addjobs_to_wishlist('" + admin_url + "','" + post_id + "',this,'" + style + "')");
            jQuery(obj).parents('li').find('.whishlist_icon').attr("data-original-title", jobhunt_functions_vars.shortlisted);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;
}


/**
 * Remove Wishlist Function
 */
function cs_removejobs_to(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_removejob_to_user';
    jQuery(obj).parents('li').find('.whishlist_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('li').find('.whishlist_icon').html(response);
            jQuery(obj).parents('li').find('.whishlist_icon').attr("onclick", "cs_addjobs_to_wish('" + admin_url + "','" + post_id + "',this)");
            jQuery(obj).parents('li').find('.whishlist_icon').attr("data-original-title", jobhunt_functions_vars.shortlisted);
            cs_job_shortlist_load(admin_url);
        }
    });
    return false;
}

/**
 * Add jobs to applied list Function
 */
function cs_addjobs_to_applied(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_add_applied_job_to_usermeta';
    jQuery(obj).parents('li').find('.applied_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('li').find('.applied_icon').html(response);
        }
    });
    return false;
}
/**
 * removed job to applied
 */

/*
 * 
 * add applied list for left box
 */
function cs_addjobs_left_to_applied(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_add_applied_job_to_usermeta';
    var old_html = jQuery(obj).parents('div').find('.applied_icon').html();
    jQuery(obj).parents('div').find('.applied_icon').html('<span><i class="icon-spinner8 icon-spin"></i></span>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "json",
        success: function (response) {
            if (response.status == 0) {
                jQuery(obj).parents('div').find('.applied_icon').html(old_html);
                show_error_alert_msg(response.msg);
            } else {
                var application_count = jQuery("#applications_count").html();
                application_count = (parseInt(application_count) + parseInt(1));
                jQuery(obj).parents('div').find('.applied_icon').html(response.msg);
                jQuery("#applications_count").html(application_count);
                jQuery(".outerwrapp-layer" + post_id).fadeTo(2000, 500).slideUp(500);
            }
        }
    });
    return false;
}


/**
 * Remove job from applied list Function
 */
function cs_removejobs_left_to_applied(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_remove_applied_job_to_usermeta';
    var old_html = jQuery(obj).parents('div').find('.applied_icon').html();
    jQuery(obj).parents('div').find('.applied_icon').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "json",
        success: function (response) {
            if (response.status == 0) {
                jQuery(obj).parents('div').find('.applied_icon').html(old_html);
                show_alert_msg(response.msg);
            } else {
                var application_count = jQuery("#applications_count").html();
                application_count = (parseInt(application_count) - parseInt(1));
                jQuery(obj).parents('div').find('.applied_icon').html(response);
                jQuery(obj).parents('div').find('.applied_icon').attr("onclick", "cs_addjobs_left_to_applied('" + admin_url + "','" + post_id + "',this)");
                jQuery(obj).parents('div').find('.applied_icon').attr("data-original-title", jobhunt_functions_vars.shortlisted);
                jQuery("#applications_count").html(application_count);
                jQuery(".outerwrapp-layer" + post_id).fadeTo(2000, 500).slideUp(500);
            }
        }
    });
    return false;
}
/**
 * load location ajax
 */
function cs_load_location_ajax() {
    //alert('map loading');
    "use strict";
    jQuery('.form-select-country').change(function () {

        var plugin_url = jQuery(this).parents("#locations_wrap").data('plugin_url');
        var ajaxurl = jQuery(this).parents("#locations_wrap").data('ajaxurl');
        var dataString = 'country=' + this.value + '&action=cs_load_country_states';
        var html = "<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />";
        jQuery(".loader-cities").html(html);
        jQuery(".loader-cities").show();
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: dataString,
            dataType: "json",
            success: function (response) {
                jQuery(".form-select-city").html(response.cities);
                jQuery(".loader-cities").html('').hide();
                // only for style implementation
                jQuery(".chosen-select").data("placeholder", "Select").trigger('chosen:updated');
            }
        });
    });

    /**
     * Get cities only
     */
    jQuery('.form-select-state').change(function () {

        var plugin_url = jQuery(this).parents("#locations_wrap").data('plugin_url');
        var ajaxurl = jQuery(this).parents("#locations_wrap").data('ajaxurl');
        var country = jQuery(".form-select-country").val();
        var dataString = 'country=' + country + '&state=' + this.value + '&action=cs_load_country_cities';
        var html = "<img src='" + plugin_url + "/assets/images/ajax-loader.gif' />";
        jQuery(".loader-cities").html(html);
        jQuery(".loader-cities").show();
        jQuery.ajax({
            type: "POST",
            url: ajaxurl,
            data: dataString,
            dataType: "json",
            success: function (response) {
                jQuery(".form-select-city").html(response.cities);
                jQuery(".chosen-select").data("placeholder", "Select").trigger('chosen:updated');
                jQuery(".loader-cities").html('').hide();
            }
        });
    });
    jQuery(document).ready(function (e) {

        //changeMap();
        jQuery('input#directory-search-location').keypress(function (e) {
            if (e.which == '13') {
                e.preventDefault();
                cs_search_map(this.value);
                return false;
            }
        });
        jQuery('#loc_country').change(function (e) {

            setAutocompleteCountry();
        });
    });
    function setAutocompleteCountry() {
        "use strict";
        var country = jQuery('select#loc_country option:selected').attr('data-name'); /*document.getElementById('country').value;*/
        if (country != '') {
            autocomplete.setComponentRestrictions({'country': country});
        } else {
            autocomplete.setComponentRestrictions([]);
        }
    }

}
/**
 * Map
 */

function cs_map_location_load(field_postfix) {

    field_postfix = field_postfix || '';
    "use strict";
    jQuery.noConflict();
    (function (jQuery) {

        // for ie9 doesn't support debug console
        if (!window.console)
            window.console = {};
        if (!window.console.log)
            window.console.log = function () {
            };
        var GMapsLatLonPicker = (function () {

            var _self = this;

            _self.params = {
                defLat: 0,
                defLng: 0,
                defZoom: 1,
                queryLocationNameWhenLatLngChanges: true,
                queryElevationWhenLatLngChanges: true,
                mapOptions: {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: false,
                    disableDoubleClickZoom: true,
                    zoomControlOptions: true,
                    streetViewControl: false,
                    scrollwheel: true,
                },
                strings: {
                    markerText: jobhunt_functions_vars.drag_marker,
                    error_empty_field: jobhunt_functions_vars.couldnt_find_coords,
                    error_no_results: jobhunt_functions_vars.couldnt_find_coords
                }
            };

            // VARIABLES USED BY THE FUNCTION (DON'T MODIFY THIS PART)
            _self.vars = {
                ID: null,
                LATLNG: null,
                map: null,
                marker: null,
                geocoder: null
            };

            // PRIVATE FUNCTIONS FOR MANIPULATING DATA
            var setPosition = function (position) {
                _self.vars.marker.setPosition(position);
                _self.vars.map.panTo(position);
                jQuery(_self.vars.cssID + ".gllpZoom").val(_self.vars.map.getZoom());
                jQuery(_self.vars.cssID + ".gllpLongitude").val(position.lng());
                jQuery(_self.vars.cssID + ".gllpLatitude").val(position.lat());
                jQuery(_self.vars.cssID).trigger("location_changed", jQuery(_self.vars.cssID));
                if (_self.params.queryLocationNameWhenLatLngChanges) {
                    getLocationName(position);
                }
                if (_self.params.queryElevationWhenLatLngChanges) {
                    getElevation(position);
                }
            };
            // for reverse geocoding
            var getLocationName = function (position) {
                var latlng = new google.maps.LatLng(position.lat(), position.lng());
                _self.vars.geocoder.geocode({'latLng': latlng}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK && results[1]) {
                        jQuery(_self.vars.cssID + ".gllpLocationName").val(results[1].formatted_address);
                    } else {
                        jQuery(_self.vars.cssID + ".gllpLocationName").val("");
                    }
                    jQuery(_self.vars.cssID).trigger("location_name_changed", jQuery(_self.vars.cssID));

                });
            };

            // for getting the elevation value for a position
            var getElevation = function (position) {
                var latlng = new google.maps.LatLng(position.lat(), position.lng());
                var locations = [latlng];
                var positionalRequest = {'locations': locations};
                _self.vars.elevator.getElevationForLocations(positionalRequest, function (results, status) {
                    if (status == google.maps.ElevationStatus.OK) {
                        if (results[0]) {
                            jQuery(_self.vars.cssID + ".gllpElevation").val(results[0].elevation.toFixed(3));
                        } else {
                            jQuery(_self.vars.cssID + ".gllpElevation").val("");
                        }
                    } else {
                        jQuery(_self.vars.cssID + ".gllpElevation").val("");
                    }
                    jQuery(_self.vars.cssID).trigger("elevation_changed", jQuery(_self.vars.cssID));

                });
            };
            // search function
            var performSearch = function (string, silent) {
                if (string == "") {
                    if (!silent) {
                        displayError(_self.params.strings.error_empty_field);
                    }
                    return;
                }
                _self.vars.geocoder.geocode(
                        {"address": string},
                        function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                jQuery(_self.vars.cssID + ".gllpZoom").val(11);
                                _self.vars.map.setZoom(parseInt(jQuery(_self.vars.cssID + ".gllpZoom").val()));
                                setPosition(results[0].geometry.location);
                            } else {
                                if (!silent) {
                                    displayError(_self.params.strings.error_no_results);
                                }
                            }
                        }
                );
            };
            // error function
            var displayError = function (message) {
                alert("Error: " + message);
            };

            // PUBLIC FUNCTIONS
            var publicfunc = {
                // INITIALIZE MAP ON DIV
                init: function (object) {

                    if (!jQuery(object).attr("id")) {
                        if (jQuery(object).attr("name")) {
                            jQuery(object).attr("id", jQuery(object).attr("name"));
                        } else {
                            jQuery(object).attr("id", "_MAP_" + Math.ceil(Math.random() * 10000));
                        }
                    }

                    _self.vars.ID = jQuery(object).attr("id");
                    _self.vars.cssID = "#" + _self.vars.ID + " ";
                    _self.params.defLat = jQuery(_self.vars.cssID + ".gllpLatitude").val() ? jQuery(_self.vars.cssID + ".gllpLatitude").val() : _self.params.defLat;
                    _self.params.defLng = jQuery(_self.vars.cssID + ".gllpLongitude").val() ? jQuery(_self.vars.cssID + ".gllpLongitude").val() : _self.params.defLng;
                    // alert("longit ----" + jQuery(_self.vars.cssID + ".gllpLongitude").val());
                    _self.params.defZoom = jQuery(_self.vars.cssID + ".gllpZoom").val() ? parseInt(jQuery(_self.vars.cssID + ".gllpZoom").val()) : _self.params.defZoom;
                    _self.vars.LATLNG = new google.maps.LatLng(_self.params.defLat, _self.params.defLng);
                    _self.vars.MAPOPTIONS = _self.params.mapOptions;
                    _self.vars.MAPOPTIONS.zoom = _self.params.defZoom;
                    _self.vars.MAPOPTIONS.center = _self.vars.LATLNG;
                    _self.vars.map = new google.maps.Map(jQuery(_self.vars.cssID + ".gllpMap").get(0), _self.vars.MAPOPTIONS);

                    _self.vars.geocoder = new google.maps.Geocoder();
                    _self.vars.elevator = new google.maps.ElevationService();
                    _self.vars.marker = new google.maps.Marker({
                        position: _self.vars.LATLNG,
                        map: _self.vars.map,
                        title: _self.params.strings.markerText,
                        draggable: true
                    });
                    // Set position on doubleclick
                    google.maps.event.addListener(_self.vars.map, 'dblclick', function (event) {
                        setPosition(event.latLng);
                    });
                    // Set position on marker move
                    google.maps.event.addListener(_self.vars.marker, 'dragend', function (event) {
                        setPosition(_self.vars.marker.position);
                    });
                    // Set zoom feld's value when user changes zoom on the map
                    google.maps.event.addListener(_self.vars.map, 'zoom_changed', function (event) {
                        jQuery(_self.vars.cssID + ".gllpZoom").val(_self.vars.map.getZoom());
                        jQuery(_self.vars.cssID).trigger("location_changed", jQuery(_self.vars.cssID));
                    });
                    // Update location and zoom values based on input field's value 
                    jQuery(_self.vars.cssID + ".gllpUpdateButton").bind("click", function () {
                        var lat = jQuery(_self.vars.cssID + ".gllpLatitude").val();
                        var lng = jQuery(_self.vars.cssID + ".gllpLongitude").val();
                        var latlng = new google.maps.LatLng(lat, lng);
                        _self.vars.map.setZoom(parseInt(jQuery(_self.vars.cssID + ".gllpZoom").val()));
                        setPosition(latlng);
                    });
                    // Search function by search button
                    jQuery(_self.vars.cssID + ".gllpSearchButton").bind("click", function () {
                        cs_fe_search_map(jQuery('#post_loc_address').val());
                        performSearch(jQuery(_self.vars.cssID + ".gllpSearchField_fe").val(), false);
                    });
                    // Search function by gllp_perform_search listener
                    jQuery(document).bind("gllp_perform_search", function (event, object) {
                        performSearch(jQuery(object).attr('string'), true);
                    });
                    // Zoom function triggered by gllp_perform_zoom listener
                    jQuery(document).bind("gllp_update_fields", function (event) {
                        var lat = jQuery(_self.vars.cssID + ".gllpLatitude").val();
                        var lng = jQuery(_self.vars.cssID + ".gllpLongitude").val();
                        var latlng = new google.maps.LatLng(lat, lng);
                        _self.vars.map.setZoom(parseInt(jQuery(_self.vars.cssID + ".gllpZoom").val()));
                        setPosition(latlng);
                    });

                    // resize map after load
                    google.maps.event.addListenerOnce(_self.vars.map, 'idle', function () {
                        var center = _self.vars.map.getCenter();
                        google.maps.event.trigger(_self.vars.map, 'resize');
                        _self.vars.map.setCenter(center);
                    });

                }

            }
            return publicfunc;
        });
        jQuery(document).ready(function () {
            jQuery("#fe_map" + field_postfix).each(function () {
                (new GMapsLatLonPicker()).init(jQuery(this));
            });
        });
        jQuery(document).bind("location_changed", function (event, object) {
        });
    }(jQuery));
}





// Search Map
function cs_search_map(location) {
    "use strict";
    jQuery('.gllpSearchField').val(location);
    setTimeout(function () {
        jQuery(".gllpSearchButton").trigger("click");
    }, 10);
}

/**
 * User Register Validation
 */
function cs_registration_validation(admin_url, id) {
    jQuery('div#result_' + id).html('<i class="icon-spinner8 icon-spin"></i>');
    function newValues(id) {
        jQuery('#user_profile').val();
        var serializedValues = jQuery("#wp_signup_form_" + id).serialize() + "&id=" + id;
        return serializedValues;
    }
    var serializedReturn = newValues(id);
    jQuery('div#result_' + id).removeClass('success error');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        dataType: 'json',
        data: serializedReturn,
        success: function (response) {
            if (response.type == 'error') {
                jQuery("div#result_" + id).removeClass('success').addClass("error");
                jQuery('div#result_' + id).html(response.message);
                jQuery("div#result_" + id).show();
            } else if (response.type == 'success') {
                jQuery('div#result_' + id).html(response.message);
                jQuery("div#result_" + id).show();
            }
        }
    });
}


function cs_contact_validation(admin_url, id) {


    jQuery('div.employer-contact-form_' + id).html('<i class="icon-spinner8 icon-spin"></i>').fadeIn();
    function newValues(id) {
        jQuery('.employer-contact-form').val();
        var serializedValues = jQuery("#employerid_contactus_" + id).serialize() + "&id=" + id;
        return serializedValues;
    }
    var serializedReturn = newValues(id);
    jQuery('div#result_' + id).removeClass('success error');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        dataType: 'json',
        data: serializedReturn,
        success: function (response) {
            if (response.type == 'error') {
                jQuery("div.employer-contact-form" + id).removeClass('success').addClass("error");
                jQuery('div.employer-contact-form' + id).html(response.message);
                jQuery("div.employer-contact-form" + id).show();
            } else if (response.type == 'success') {
                jQuery('div.employer-contact-form' + id).html(response.message);
                jQuery("div.employer-contact-form" + id).show();
            }
        }
    });
}
function captcha_reload(admin_url, captcha_id) {
    "use strict";
    var dataString = '&action=captcha_reload&captcha_id=' + captcha_id;
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: 'html',
        success: function (data) {
            jQuery("#" + captcha_id + "_div").html(data);

        }
    });
}

/**
 * User Login Authentication
 */
function cs_user_authentication(admin_url, id) {
    "use strict";
    jQuery('.login-form-id-' + id + ' .status-message').addClass('cs-spinner');
    jQuery('.login-form-id-' + id + ' .status-message').html('<i class="icon-spinner8 icon-spin"></i>');
    function newValues(id) {
        var serializedValues = jQuery("#ControlForm_" + id).serialize();
        return serializedValues;
    }
    var serializedReturn = newValues(id);
    jQuery('.login-form-id-' + id + ' .status-message').removeClass('success error');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        dataType: 'json',
        data: serializedReturn,
        success: function (data) {
            jQuery('.login-form-id-' + id + ' .status-message').html(data.message);
            jQuery('.fa-spin').remove();
            if (data.loggedin == false) {
                jQuery('.login-form-id-' + id + ' .status-message').removeClass('success').addClass("error");
                jQuery('.login-form-id-' + id + ' .status-message').removeClass('cs-spinner');
                jQuery('.login-form-id-' + id + ' .status-message').html(data.message);
                jQuery('.login-form-id-' + id + ' .status-message').show();
            } else if (data.loggedin == true) {
                jQuery('.login-form-id-' + id + ' .status-message').removeClass('error').addClass("success");
                jQuery('.login-form-id-' + id + ' .status-message').removeClass('cs-spinner');
                jQuery('.login-form-id-' + id + ' .status-message').html(data.message);
                jQuery('.login-form-id-' + id + ' .status-message').show();
                document.location.href = data.redirecturl;
            }
        }
    });
}
/**
 * removed applied jobs
 */
function cs_ajax_remove_appliedjobs(admin_url, plugin_url, user_id) {
    "use strict";
    var dataString = 'cs_uid=' + user_id + '&action=cs_ajax_remove_appliedjobs';
    jQuery('#cs-applied-jobs .cs-loader').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery('.cs-favorite-jobs .scetion-title span').html(response);
            jQuery(".feature-jobs li.cs-expired").fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}


/**
 * set session
 */
function cs_set_session(admin_url, post_type) {
    "use strict";
    var dataString = 'post_type=' + post_type + '&action=cs_ajax_set_session';
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
        }
    });
    return false;
}
/**
 * sort filter
 */
function cs_set_sort_filter(admin_url, field_name) {
    "use strict";
    var field_name_value = jQuery("#" + field_name).val();
    jQuery("#" + field_name + '_div').html('<i class="icon-spinner8 icon-spin"></i>');
    var dataString = 'field_name=' + field_name + '&field_name_value=' + field_name_value + '&action=cs_set_sort_filter';
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "json",
        success: function (response) {
            if (response.type == 'success') {
                window.location = window.location.href;
            }
        }
    });
    return false;
}
/**
 * avatar upload
 */
function cs_user_avatar_upload(ajaxurl) {
    "use strict";
    var fd = new FormData();
    var file_data = fd.append('user_avatar', jQuery('input[type=file]')[0].files[0]);
    var other_data = jQuery('#candidate').serializeArray();
    jQuery.each(other_data, function (key, input) {
        fd.append(input.name, input.value);
    });
    jQuery.ajax({
        url: ajaxurl,
        data: fd,
        contentType: false,
        processData: false,
        dataType: "json",
        type: 'POST',
        success: function (response) {
            jQuery('#cs-user-avatar-ajax-display').html(response.list_icon);
            jQuery(".page-sidebar .info-thumb").html(response.menu_icon);
        }
    });
}
/**
 * check comma string before submit
 */





function comma_string_before_submit_form(frm, get_field, str_field) {
    "use strict";

    var ids = '';

    var counter = 0, // counter for checked checkboxes
            i = 0, // loop variable
            url = jQuery('#' + str_field).val();    // final url string
    alert(url);
    input_obj = document.getElementsByName(get_field);

    for (i = 0; i < input_obj.length; i++) {

        if (input_obj[i].checked === true) {

            counter++;
            url = url + ',' + input_obj[i].value;
        }
    }

    if (counter > 0) {
        alert(url);
    }

    jQuery('#' + str_field).val(url);
    jQuery("#" + frm).submit();
}

/**
 * submit specialism form
 */


function submit_specialism_form(frm, str_field) {
    "use strict";
    var $checkboxes = '';
    var ids = '';
    if (typeof $(".specialism_list input[type=checkbox]") != "undefined") {
        $checkboxes = $(".specialism_list input[type=checkbox]");
        var ids = $checkboxes.filter(':checked').map(function () {
            return this.value;
        }).get().join(',');
    }

    jQuery('#' + str_field).val(ids);
    jQuery("#" + frm).submit();
}
/**
 * fixed header inner
 */
function cs_mk_sticky() {
    "use strict";
    if (jQuery('#sticker').length != '') {
        jQuery("#sticker").sticky({topSpacing: 0, center: true, className: "candidate-list"});
    }
}
/**
 * scroll sticky menu
 */
function cs_scroll_menu() {
    "use strict";
    jQuery(function () {
        if (jQuery('#sidemenu').length != '') {
            jQuery('#sidemenu').visualNav({
                scrollOnInit: false, // disable auto scroll when come first time
                useHash: false, // if true, the location hash will be updated
                initialized: function () {
                    var XposNav = jQuery("#sidemenu").offset().top;
                    jQuery(window).scroll(function () {
                        var scrollPos = jQuery(window).scrollTop();
                        if (scrollPos >= XposNav) {
                            jQuery("#sidemenu").addClass('fixed');
                        } else if (scrollPos < XposNav) {
                            jQuery("#sidemenu").removeClass('fixed');
                        }
                    });
                }
            });
        }
    });
}





/**
 * Add candidate CV to selected list Function
 */
function cs_add_cv_selected_list(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_add_cv_selected_list_usermeta';
    jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').html(response);
            jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').attr("onclick", "cs_remove_cv_selected_list('" + admin_url + "','" + post_id + "',this)");
            jQuery(".outerwrapp-layer" + post_id).fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}


/**
 * Remove Wishlist Function
 */
function cs_remove_cv_selected_list(admin_url, post_id, obj) {
    "use strict";
    var dataString = 'post_id=' + post_id + '&action=cs_remove_cv_selected_list_usermeta';
    jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').html('<i class="icon-spinner8 icon-spin"></i>');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        success: function (response) {
            jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').html(response);
            jQuery(obj).parents('.candidate-detail').find('.cv-ad-to-list').attr("onclick", "cs_add_cv_selected_list('" + admin_url + "','" + post_id + "',this)");
            jQuery(".outerwrapp-layer" + post_id).fadeTo(2000, 500).slideUp(500);
        }
    });
    return false;
}/*
 * Delete Media Functions
 */
function del_media(id) {
    "use strict";
    var $ = jQuery;
    jQuery('#' + id + '_box').hide();
    jQuery('#' + id).val('');
    jQuery('#' + id).next().show();
}
/*
 * End Delete Media Functions
 */
/**
 * del media
 */
function cs_del_media(id) {
    "use strict";
    jQuery('#' + id + '_box').hide();
    jQuery('#' + id).val('');
    jQuery('#' + id).next().show();
}
/**
 * del cover letter
 */
function cs_del_cover_letter(id) {
    "use strict";
    jQuery('#' + id + '_box').hide();
    jQuery('#' + id).val('');
}

/**
 * del CV
 */
function del_cv_media(field_name, id) {
    "use strict";
    jQuery('#' + field_name + '_box').hide();
    jQuery('#' + id).val('');
}


jQuery('#cs_candidate_cv_img').click(function (e) {
    if (e.target.className != 'delete') {
        jQuery('<a/>', {
            id: 'downloadFile',
            href: jQuery("#candidate_cv").val(),
            style: 'display:hidden;',
            download: ''
        }).appendTo('body');

        jQuery("#downloadFile")[0].click();
    }
});

/**
 * trigger function
 */
function trigger_func(btnid) {
    "use strict";
    jQuery(btnid).trigger('click');
}
/**
 * Numeric only control handler
 */
function isNumberKey(evt)
{
    "use strict";
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
/**
 * content hide at listing pages loading 
 */
function cs_listing_content_load() {
    cs_data_loader_load('.main-cs-loader');
}
/**
 * dashboard tab load
 */
function cs_dashboard_tab_load(tabid, type, admin_url, uid, pkg_array, page_id_all) {
    "use strict";
    pkg_array = pkg_array || '';
    page_id_all = page_id_all || '';
    jQuery("#orderdata").hide();
    "use strict";
    var current_url = location.protocol + "//" + location.host + location.pathname;//window.location.href;

    if (type == 'candidate') {
        cs_data_loader_load('#candidate-dashboard .main-cs-loader');
        if (tabid == 'profile') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_profile';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#profile').html(response);
                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_profile_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#resume').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#cv').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    cs_load_location_ajax();
                    if (jQuery("#fe_map0 #cs-map-location-fe-id").hasClass("gllpMap")) {
                        var vals;
                        cs_map_location_load('0');
                        if (vals)
                            cs_search_map(vals);
                    }

                    jQuery(window).load(function () {
                        jQuery(".gllpSearchField_fe").show(500);
                    });
                    jQuery('#profile').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=profile");

                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });
        } else if (tabid == 'resume') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_resume';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#resume').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_resume_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#cv').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#resume').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=resume");

                    jQuery('#candidate_left_resume_link #inner-links').slideDown();
                }
            });

        } else if (tabid == 'shortlisted-jobs') {
            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_favjobs' + '&page_id_all=' + page_id_all;
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {

                    jQuery('#shortlisted-job').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_shortlisted_jobs_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#resume').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#cv').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#shortlisted-job').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=shortlisted-jobs");

                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });

        } else if (tabid == 'applied-jobs') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_appliedjobs' + '&page_id_all=' + page_id_all;
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#applied-jobs').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_applied_jobs_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#resume').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#cv').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#applied-jobs').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=applied-jobs");

                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });
        } else if (tabid == 'job-alerts') {

            var dataString = 'cs_uid=' + uid + '&action=jobhunt_candidate_jobalerts' + '&page_id_all=' + page_id_all;
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#job-alerts').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').addClass('active'); // TODO: change this so that it moved to addon job alert


                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#resume').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#cv').hide();
                    jQuery('#change_password').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#job-alerts').show(); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=job-alerts");


                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });
        } else if (tabid == 'cv') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_candidate_cvcover';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#cv').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_change_password_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_cv_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#resume').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#cv').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=cv");

                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });
        } else if (tabid == 'change_password') {

            var dataString = 'cs_uid=' + uid + '&action=cs_candidate_change_password';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#change_password').html(response);

                    jQuery('#candidate_left_dashboard_link').removeClass('active');
                    jQuery('#candidate_left_profile_link').removeClass('active');
                    jQuery('#candidate_left_resume_link').removeClass('active');
                    jQuery('#candidate_left_applied_jobs_link').removeClass('active');
                    jQuery('#candidate_left_shortlisted_jobs_link').removeClass('active');
                    jQuery('#candidate_left_cv_link').removeClass('active');
                    jQuery('#candidate_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#candidate_left_change_password_link').addClass('active');

                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#resume').hide();
                    jQuery('#applied-jobs').hide();
                    jQuery('#shortlisted-job').hide();
                    jQuery('#cv').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#change_password').show();
                    jQuery('#candidate-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=change_password");

                    jQuery('#candidate_left_resume_link #inner-links').slideUp();
                }
            });
        }

    }

    if (type == 'employer') {
        cs_data_loader_load('#employer-dashboard .main-cs-loader');
        if (tabid == 'profile') {
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            var dataString = 'cs_uid=' + uid + '&action=cs_employer_ajax_profile';
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#profile').html(response);

                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_profile_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#packages').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#profile').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=profile");
                }
            });
        } else if (tabid == 'jobs') {
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_manage_job' + '&page_id_all=' + page_id_all;
            ;
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#jobs').html(response);

                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_jobs_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#packages').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#jobs').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=jobs");
                }
            });
        } else if (tabid == 'transactions') {
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_trans_history' + '&page_id_all=' + page_id_all;
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {

                    jQuery("#transactions").html(response);
                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_transactions_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#resumes').hide();
                    jQuery('#packages').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#transactions').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=transactions");
                }
            });

        } else if (tabid == 'resumes') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_fav_resumes' + '&page_id_all=' + page_id_all;
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#resumes').html(response);

                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_resumes_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#packages').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#resumes').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=resumes");
                }
            });

        } else if (tabid == 'packages') {

            var dataString = 'cs_uid=' + uid + '&action=cs_ajax_job_packages' + '&page_id_all=' + page_id_all;
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#packages').html(response);
                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_packages_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#change_password').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#packages').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=packages");
                }
            });

        } else if (tabid == 'postjobs') {

            var dataString = 'cs_uid=' + uid + '&action=cs_employer_post_job';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_postjobs_link').addClass('active');

                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#packages').hide();
                    jQuery('#change_password').hide();
                    // empty all div's
                    jQuery('#cs-act-tab').html('');
                    jQuery('#dashboard').html('');
                    jQuery('#profile').html('');
                    jQuery('#jobs').html('');
                    jQuery('#transactions').html('');
                    jQuery('#resumes').html('');
                    jQuery('#packages').html('');
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#postjobs').html(response);
                    cs_job_post_tabs();
                    jQuery('#postjobs').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=postjobs");


                }
            });

        } else if (tabid == 'job-alerts') {

            var dataString = 'cs_uid=' + uid + '&action=jobhunt_employer_jobalerts';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {

                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_change_password_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_job_alerts_link').addClass('active');

                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#packages').hide();
                    jQuery('#change_password').hide();
                    // empty all div's
                    jQuery('#cs-act-tab').html('');
                    jQuery('#dashboard').html('');
                    jQuery('#profile').html('');
                    jQuery('#jobs').html('');
                    jQuery('#transactions').html('');
                    jQuery('#resumes').html('');
                    jQuery('#packages').html('');
                    jQuery('#job-alerts').html(response);
                    cs_job_post_tabs();
                    jQuery('#postjobs').hide();
                    jQuery('#job-alerts').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=job-alerts");
                }
            });

        } else if (tabid == 'change_password') {

            var dataString = 'cs_uid=' + uid + '&action=cs_employer_change_password';
            if (typeof (ajaxRequest) != 'undefined') {
                ajaxRequest.abort();
            }
            ajaxRequest = jQuery.ajax({
                type: "POST",
                url: admin_url,
                data: dataString,
                success: function (response) {
                    jQuery('#change_password').html(response);
                    jQuery('#employer_left_dashboard_link').removeClass('active');
                    jQuery('#employer_left_profile_link').removeClass('active');
                    jQuery('#employer_left_jobs_link').removeClass('active');
                    jQuery('#employer_left_transactions_link').removeClass('active');
                    jQuery('#employer_left_resumes_link').removeClass('active');
                    jQuery('#employer_left_postjobs_link').removeClass('active');
                    jQuery('#employer_left_packages_link').removeClass('active');
                    jQuery('#employer_left_job_alerts_link').removeClass('active'); // TODO: change this so that it moved to addon job alert
                    jQuery('#employer_left_change_password_link').addClass('active');
                    jQuery('#cs-act-tab').hide();
                    jQuery('#dashboard').hide();
                    jQuery('#profile').hide();
                    jQuery('#jobs').hide();
                    jQuery('#transactions').hide();
                    jQuery('#resumes').hide();
                    jQuery('#postjobs').hide();
                    jQuery('#packages').hide();
                    jQuery('#job-alerts').hide(); // TODO: change this so that it moved to addon job alert
                    jQuery('#change_password').show();
                    jQuery('#employer-dashboard .main-cs-loader').html('');
                    window.history.pushState(null, null, current_url + "?profile_tab=change_password");
                }
            });

        }
    }
}

/**
 * job status update
 */
function cs_job_status_update(admin_url, cs_jobid, cs_status) {
    "use strict";
    var dataString = 'cs_jobid=' + cs_jobid + '&cs_status=' + cs_status + '&action=cs_job_status_update';
    cs_data_loader_load('#employer-dashboard .main-cs-loader');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "HTML",
        success: function (response) {
            var total_count_active_job = jQuery('#cs_user_total_active_job').html();
            if (total_count_active_job == '') {
                total_count_active_job = 0;
            }
            var data = JSON.parse(response);
            if (data.error == 0) {
                if (cs_status == 'active') {
                    jQuery("#cs_job_status_html" + cs_jobid).html(jobhunt_functions_vars.active);
                    jQuery("#cs_job_link" + cs_jobid).attr("onclick", "cs_job_status_update('" + admin_url + "','" + cs_jobid + "','inactive')");
                    jQuery("#cs_job_link" + cs_jobid).attr("data-original-title", jobhunt_functions_vars.inactive);
                    total_count_active_job = (parseInt(total_count_active_job) + parseInt(1));
                } else if (cs_status == 'inactive') {
                    jQuery("#cs_job_status_html" + cs_jobid).html(jobhunt_functions_vars.inactive);
                    jQuery("#cs_job_link" + cs_jobid).attr("onclick", "cs_job_status_update('" + admin_url + "','" + cs_jobid + "','active')");
                    jQuery("#cs_job_link" + cs_jobid).attr("data-original-title", jobhunt_functions_vars.active);
                    total_count_active_job = (parseInt(total_count_active_job) - parseInt(1));
                }
                jQuery('#cs_user_total_active_job').html(total_count_active_job);
                jQuery("#cs_job_link" + cs_jobid).html(data.icon);
            }
            jQuery('#employer-dashboard .main-cs-loader').html('');
            show_alert_msg(data.message);
        }
    });
    return false;
}
/**
 * job shortlist
 */
function cs_job_shortlist_load(admin_url) {
    "use strict";
    jQuery('#top-wishlist-content').html('<i class="icon-spinner8 icon-spin"></i>');
    var dataString = 'action=cs_job_shortlist_load';
    cs_data_loader_load('#employer-dashboard .main-cs-loader');
    jQuery.ajax({
        type: "POST",
        url: admin_url,
        data: dataString,
        dataType: "HTML",
        success: function (response) {
            jQuery('#top-wishlist-content').html('');
            jQuery('#top-wishlist-content').html(response);
        }
    });
    return false;
}
/**
 * show alert message
 */
function show_alert_msg(msg) {
    "use strict";
    jQuery('#employer-dashboard .main-cs-loader').html('');
    jQuery('.cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + msg + '</div>');
    var classes = jQuery('.cs_alerts').attr('class');
    classes = classes + " active";
    jQuery('.cs_alerts').addClass(classes);
    setTimeout(function () {
        jQuery('.cs_alerts').removeClass("active");
    }, 4000);
}
function show_error_alert_msg(msg) {
    "use strict";
    jQuery('#employer-dashboard .main-cs-loader').html('');
    jQuery('.cs_alerts').html('<div class="cs-remove-msg error"><i class="icon-warning2"></i>' + msg + '</div>');
    var classes = jQuery('.cs_alerts').attr('class');
    classes = classes + " active";
    jQuery('.cs_alerts').addClass(classes);
    setTimeout(function () {
        jQuery('.cs_alerts').removeClass("active");
    }, 4000);
}
/*
 * chosen selection box
 */
/**
 * show loader before load data
 */
function cs_data_loader_load(loader_element) {
    jQuery(loader_element).html('<div class="main-thecube"><div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div></div>');
}
/**
 * end show loader before load data
 */
function cs_data_loader_remove(loader_element) {
    jQuery(loader_element).html('');
}


function chosen_selectionbox() {
    "use strict";
    if (jQuery('.chosen-select, .chosen-select-deselect, .chosen-select-no-single, .chosen-select-no-results, .chosen-select-width').length != '') {
        var config = {
            '.chosen-select': {width: "100%"},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10, width: "100%"},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    }
}


/*chosen for mobile*/
if ($('.chosen-container').length > 0) {
    $('.chosen-container').on('touchstart', function (e) {
        e.stopPropagation();
        e.preventDefault();
        // Trigger the mousedown event.
        $(this).trigger('mousedown');
    });
}



/*
 * End chosen selection box
 */
/**
 * load resize map
 */

function resizeMap() {
    google.maps.event.trigger(map, 'resize');
    map.setZoom(map.getZoom());
}
function cs_show_form_row(field_val) {
    alert(field_val);
    if (field_val == 'box') {
        jQuery('cs_box_row').show();
    } else {
        jQuery('cs_box_row').hide();
    }
}


jQuery(document).on('click', '.woocommerce-checkout-payment #place_order', function () {
    jQuery(this).closest('.place-order').append('<span class="checkout-loader"><i class="icon-spinner8 icon-spin"></i></span>');
});