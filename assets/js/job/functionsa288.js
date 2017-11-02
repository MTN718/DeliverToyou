// Responsive Menu

jQuery(document).ready(function () {
    // Add smooth scrolling to all links
    jQuery(".cs-candidate-detail .profile-nav li a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            jQuery('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                window.location.hash = hash;
            });
        }
    });

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

    // Chosen touch support.
    if (jQuery('.chosen-container').length > 0) {
        jQuery('.chosen-container').on('touchstart', function (e) {
            e.stopPropagation();
            e.preventDefault();
            // Trigger the mousedown event.
            jQuery(this).trigger('mousedown');
        });
    }

});

/*
 * Document ready functions starts
 */
var $ = jQuery;
jQuery(document).ready(function ($) {
 

    jQuery("#lang_sel > ul > li > a").append('<i class="icon-arrow-down10"></i>');
    jQuery("#lang_sel > ul > li > a").attr('class', 'dropdown-toggle');
    jQuery("#lang_sel > ul > li > a").attr('data-toggle', 'dropdown');
    jQuery("#lang_sel > ul > li > a").attr('aria-expanded', 'false');
    jQuery("#lang_sel > ul ul").addClass('dropdown-menu');

    /*
     * mas isotope start
     */
    if (jQuery(".mas-isotope").length != '') {
        var container = jQuery(".mas-isotope").imagesLoaded(function () {
            container.isotope()
        });
        jQuery(window).resize(function () {
            setTimeout(function () {
                jQuery(".mas-isotope").isotope()
            }, 600)
        });
    }

    /*
     * End isotope start
     */

    /*
     * Button top click
     */
    jQuery('.btn-top').on('click', function (e) {
        e.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, 800);
    });
    /*
     * End Button top click
     */

    /*
     * Custom Counter
     */
    if (jQuery('.custom-counter').length != '') {
        jQuery('.custom-counter').counterUp({
            delay: 10,
            time: 1000
        });
    }
    /*
     * End  Custom Counter
     */

    /*
     * Slide menu
     */
    jQuery(function () {

        if (jQuery('#sidemenu').length != '') {
            jQuery('#sidemenu').visualNav({
                initialized: function () {
                    console.log('init');
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

    /*
     * End Slide menu
     */

    /*
     * Skill Bar
     */

    if (jQuery('.skillbar').length != '') {
        jQuery('.skillbar').each(function () {
            jQuery(this).waypoint(function (direction) {
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
     * End Skill Bar
     */
    /*
     show hide alignment field
     */

    /*
     * navbar wrapper
     */
    if (jQuery('.navbar-wrapper').length != '') {
        jQuery('.navbar-wrapper').stickUp({
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
    /*
     * End navbar wrapper
     */

    /*
     * sticker 
     */
    jQuery(window).load(function () {
        if (jQuery('#sticker').length != '') {
            jQuery("#sticker").sticky({topSpacing: 0, center: true, className: "candidate-list"});
        }
    });
    /*
     *	End sticker
     */

    /*
     * Vertical Tab 
     */
    if (jQuery('#parentVerticalTab').length != '') {

        jQuery('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched

                var jQuerytab = jQuery(this);
                var jQueryinfo = jQuery('#nested-tabInfo2');
                var jQueryname = jQuery('span', jQueryinfo);
                jQueryname.text(jQuerytab.text());
                jQueryinfo.show();
            }
        });
    }
    /*
     * End Vertical Tab 
     */


    /*
     * slider-3  
     */
    jQuery(function () {

        if (jQuery('#slider-3').length != '') {
            jQuery("#slider-3").slider({
                range: true,
                min: 0,
                max: 500,
                values: [35, 200],
                slide: function (event, ui) {
                    jQuery("#price").val("jQuery" + ui.values[ 0 ] + " - jQuery" + ui.values[ 1 ]);

                }
            });

            jQuery("#price").val("jQuery" + jQuery("#slider-3").slider("values", 0) +
                    " - jQuery" + jQuery("#slider-3").slider("values", 1));



            jQuery("#slider-4").slider({
                range: true,
                min: 0,
                max: 500,
                values: [35, 200],
                slide: function (event, ui) {
                    jQuery("#price1").val("jQuery" + ui.values[ 0 ] + " - jQuery" + ui.values[ 1 ]);
                }
            });



            jQuery("#price1").val("jQuery" + jQuery("#slider-4").slider("values", 0) +
                    " - jQuery" + jQuery("#slider-3").slider("values", 1));
        }

    });


    /*
     * End slider-3  
     */



    /*
     * Data toggle popup hover function  
     */
    jQuery('[data-toggle="popover"]').popover({trigger: "hover", placement: "top"});
    /*
     * End data toggle popup hover function 
     */


    /*
     * Popup hover function  
     */
    var notH = 1,
            $pop = $('#popup').hover(function () {
        notH ^= 1;
    });

    $(document).on('mousedown keydown', function (e) {
        if (notH || e.which == 27)
            $pop.stop().fadeOut();
    });

    $('.pop').click(function () {
        $pop.stop().fadeIn();
    });

    /*
     * End Popup hover function  
     */

    /*
     * collapse function
     */
    jQuery(document).ready(".collapse").collapse()
    /* 
     * remove all empty <P> tag
     */
    jQuery('p').each(function () {
        var $this = jQuery(this);
        if ($this.html().replace(/\s|&nbsp;/g, '').length == 0) {
            $this.remove();
        }
    });
});


/*
 * Document ready functions end
 */







/*
 * Scroll functions
 */

//(function () {
//    "use strict";
//    var docElem = window.document.documentElement, didScroll, scrollPosition;
//    function noScrollFn() {
//        window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
//    }
//    function noScroll() {
//        window.removeEventListener('scroll', scrollHandler);
//        window.addEventListener('scroll', noScrollFn);
//    }
//
//    function scrollFn() {
//        window.addEventListener('scroll', scrollHandler);
//    }
//    function canScroll() {
//        window.removeEventListener('scroll', noScrollFn);
//        scrollFn();
//    }
//    function scrollHandler() {
//        if (!didScroll) {
//            didScroll = true;
//            setTimeout(function () {
//                scrollPage();
//            }, 60);
//        }
//    }
//    ;
//
//    function scrollPage() {
//        scrollPosition = {x: window.pageXOffset || docElem.scrollLeft, y: window.pageYOffset || docElem.scrollTop};
//        didScroll = false;
//    }
//    ;
//    scrollFn();
//
//    [].slice.call(document.querySelectorAll('form button')).forEach(function (bttn) {
//        bttn.addEventListener('click', function (ev) {
//            ev.preventDefault();
//        });
//    });
//})();

/*
 * End Scroll functions
 */

/*
 * Send mail chimp function
 */
function jobcareer_mailchimp_submit(theme_url, counter, admin_url) {
    "use strict";
    $ = jQuery;
    $('#btn_newsletter_' + counter).hide();
    $('#process_' + counter).html('<div id="process_newsletter_' + counter + '"><i class="icon-refresh icon-spin"></i></div>');
    $.ajax({
        type: 'POST',
        url: admin_url,
        data: $('#mcform_' + counter).serialize() + '&action=jobcareer_mailchimp',
        success: function (response) {
            $('#mcform_' + counter).get(0).reset();
            $('#newsletter_mess_' + counter).fadeIn(600);
            $('#newsletter_mess_' + counter).html(response);
            $('#btn_newsletter_' + counter).fadeIn(600);
            $('#process_' + counter).html('');
        }
    });
}
/*
 * End Send mail chimp function
 */

/*
 * form validation
 */
function cs_form_validation(form_id) {

    'use strict';
    var name_field = jQuery('#frm' + form_id + ' input[name="contact_name"]');

    var email_field = jQuery('#frm' + form_id + ' input[name="contact_email"]');

    var subject_field = jQuery('#frm' + form_id + ' input[name="subject"]');

    var message_field = jQuery('#frm' + form_id + ' textarea[name="contact_msg"]');

    jQuery('#cs-profile-contact-detail #main-cs-loader').html('<i class="icon-spinner8 icon-spin"></i>');

    var default_message = jQuery("#cs-profile-contact-detail").data('validationmsg');

    var name = name_field.val();

    var email = email_field.val();

    var subject = subject_field.val();

    var message = message_field.val();


    var classes;

    var email_pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

    var cs_error_form = true;

    if (jQuery("#contact_name").val() == "") {
        cs_error_form = false;
        classes = jQuery("#contact_name" + id).attr("class");
        jQuery("#contact_name").addClass(classes + " has-error");

    } else {
        jQuery("#contact_name").removeClass("has-error");
    }

    if (jQuery("#contact_email").val() == "") {
        cs_error_form = false;
        classes = jQuery("#contact_email").attr("class");
        jQuery("#contact_email").addClass(classes + " has-error");

    } else if (!email_pattern.test(email)) {

        classes = jQuery("#contact_email").attr("class");
        jQuery("#contact_email").addClass(classes + " has-error");

        cs_error_form = false;

    } else {
        jQuery("#contact_email").removeClass("has-error");
    }


    if (cs_error_form == true) {

        cs_contact_frm_submit(form_id);

    } else {

        jQuery('#cs-profile-contact-detail #main-cs-loader').html('');
        jQuery('#cs_alerts').html('<div class="cs-remove-msg"><i class="icon-check-circle"></i>' + default_message + '</div>');
        classes = jQuery('#cs_alerts').attr('class');
        classes = classes + " active";
        jQuery('#cs_alerts').addClass(classes);
        setTimeout(function () {
            jQuery('#cs_alerts').removeClass("active");
        }, 4000);

    }

}
/*
 * End form validation
 */

/*
 * parallax function
 */
function cs_parallax_func() {

    "use strict";

    // Cache the Window object     

    jQuery('section.parallex-bg[data-type="background"]').each(function () {

        var $bgobj = jQuery(this); // assigning the object

        jQuery(window).scroll(function () {

            // Scroll the background at var speed

            // the yPos is a negative value because we're scrolling it UP!								

            var yPos = -(jQuery(window).scrollTop() / $bgobj.data('speed'));

            // Put together our final background position

            var coords = '50% ' + yPos + 'px';

            // Move the background

            $bgobj.css({backgroundPosition: coords});

        }); // window scroll Ends

    });

}
/*
 * End parallax function
 */
/*
 * handle browse click function
 */
function HandleBrowseClick() {
    'use strict';
    var fileinput = document.getElementById("browse");
    fileinput.click();
}
/*
 * End handle browse click function
 */

/*
 * Handle function
 */
function Handlechange() {

    'use strict';
    var fileinput = document.getElementById("browse");
    var textinput = document.getElementById("filename");
    textinput.value = fileinput.value;
}
/*
 * End Handle function
 */


jQuery('.cs-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});


/*
 * scoll handling
 */


//(function () {
//    "use strict";
//    var docElem = window.document.documentElement, didScroll, scrollPosition;
//
//    function noScrollFn() {
//        window.scrollTo(scrollPosition ? scrollPosition.x : 0, scrollPosition ? scrollPosition.y : 0);
//    }
//
//    function noScroll() {
//        window.removeEventListener('scroll', scrollHandler);
//        window.addEventListener('scroll', noScrollFn);
//    }
//
//    function scrollFn() {
//        window.addEventListener('scroll', scrollHandler);
//    }
//
//    function canScroll() {
//        window.removeEventListener('scroll', noScrollFn);
//        scrollFn();
//    }
//
//    function scrollHandler() {
//        if (!didScroll) {
//            didScroll = true;
//            setTimeout(function () {
//                scrollPage();
//            }, 60);
//        }
//    }
//    ;
//
//    function scrollPage() {
//        scrollPosition = {x: window.pageXOffset || docElem.scrollLeft, y: window.pageYOffset || docElem.scrollTop};
//        didScroll = false;
//    }
//    ;
//    scrollFn();
//    [].slice.call(document.querySelectorAll('.morph-button')).forEach(function (bttn) {
//        new UIMorphingButton(bttn, {
//            closeEl: '.icon-close',
//            onBeforeOpen: function () {
//                noScroll();
//            },
//            onAfterOpen: function () {
//                canScroll();
//            },
//            onBeforeClose: function () {
//                noScroll();
//            },
//            onAfterClose: function () {
//                canScroll();
//            }
//        });
//    });
//
//    [].slice.call(document.querySelectorAll('form button')).forEach(function (bttn) {
//        bttn.addEventListener('click', function (ev) {
//            ev.preventDefault();
//        });
//    });
//})();


/*
 * End scoll handling
 */

/*
 * Banner ads Click Counter
 */
function jobcareer_banner_count_plus(ajax_url, id) {
    'use strict';
    var dataString = 'code_id=' + id + '&action=jobcareer_banner_count_plus';
    jQuery.ajax({
        type: "POST",
        url: ajax_url,
        data: dataString,
        success: function (response) {
            if (response != 'error') {
                jQuery("#cs_banner_clicks" + id).removeAttr("onclick");
            }
        }
    });
    return false;
}

jQuery(document).on('click', '#search, #search button.close', function (event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        jQuery(".search-bar form").fadeOut();
        jQuery(this).removeClass('open');
    }
});

jQuery(document).on('click', '#header_default_search_close', function (event) {
    jQuery(".search-bar form").fadeOut();
    jQuery("#search").removeClass('open');

});

jQuery(document).on('click', 'a[href="#search"]', function () {
    jQuery('#search').addClass('open');
    jQuery('#search form > input[type="search"]').focus();
});

jQuery(document).on('click', '#search form > button', function () {
    jQuery('#search form').submit();
});

jQuery('#search form > input[type="search"]').keypress(function (e) {
    if (e.which == 13) {
        jQuery('#search form').submit();
    }
});

jQuery('.search-toggle form').hide();
jQuery("a.cs-searchbtn").click(function () {
    jQuery('.search-toggle form').hide();
    jQuery(".search-toggle form").fadeToggle();
});
jQuery('html').click(function () {
    jQuery(".search-toggle form").fadeOut();
});
jQuery('.search-toggle').click(function (event) {
    event.stopPropagation();
});
// Scroll to Top
jQuery(document).ready(function () {
    'use strict';
    jQuery('.back-to-top').on('click', function (e) {
        e.preventDefault();
        var section = jQuery('#header');
        var Xpos = jQuery(section).offset().top;
        jQuery('html, body').animate({scrollTop: Xpos}, 400);
    });
    'use strict';
    jQuery('.pricetable-holder.modren .price-holder a.cs-bgcolor').on('click', function (e) {
        e.preventDefault();
        var section = jQuery('.main-section');
        var Xpos = jQuery(section).offset().top;
        jQuery('html, body').animate({scrollTop: Xpos}, 600);
    });


});

jQuery(document).ready(function ($) {
    jQuery(".wrapper").fitVids();
});
//Video Fit to 100%
!function (t) {
    "use strict";
    t.fn.fitVids = function (e) {
        var i = {customSelector: null, ignore: null};
        if (!document.getElementById("fit-vids-style")) {
            var r = document.head || document.getElementsByTagName("head")[0], a = ".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}", d = document.createElement("div");
            d.innerHTML = '<p>x</p><style id="fit-vids-style">' + a + "</style>", r.appendChild(d.childNodes[1])
        }
        return e && t.extend(i, e), this.each(function () {
            var e = ['iframe[src*="player.vimeo.com"]', 'iframe[src*="youtube.com"]', 'iframe[src*="youtube-nocookie.com"]', 'iframe[src*="kickstarter.com"][src*="video.html"]', "object", "embed"];
            i.customSelector && e.push(i.customSelector);
            var r = ".fitvidsignore";
            i.ignore && (r = r + ", " + i.ignore);
            var a = t(this).find(e.join(","));
            a = a.not("object object"), a = a.not(r), a.each(function (e) {
                var i = t(this);
                if (!(i.parents(r).length > 0 || "embed" === this.tagName.toLowerCase() && i.parent("object").length || i.parent(".fluid-width-video-wrapper").length)) {
                    i.css("height") || i.css("width") || !isNaN(i.attr("height")) && !isNaN(i.attr("width")) || (i.attr("height", 9), i.attr("width", 16));
                    var a = "object" === this.tagName.toLowerCase() || i.attr("height") && !isNaN(parseInt(i.attr("height"), 10)) ? parseInt(i.attr("height"), 10) : i.height(), d = isNaN(parseInt(i.attr("width"), 10)) ? i.width() : parseInt(i.attr("width"), 10), o = a / d;
                    if (!i.attr("id")) {
                        var h = "fitvid" + e;
                        i.attr("id", h)
                    }
                    i.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top", 100 * o + "%"), i.removeAttr("height").removeAttr("width")
                }
            })
        })
    }
}(window.jQuery || window.Zepto);


