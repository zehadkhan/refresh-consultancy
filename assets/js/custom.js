// eslint-disable-next-line no-undef

jQuery(document).ready(function ($) {
    $('#mobile-nav').on('click', function () {
        $('#main-menu').toggle().addClass('show-toggle-content-js');
        console.log('clicked');
        $('.close-the-nav-mob').toggleClass('show-toggle-content-js');
    });

    $('.close-the-nav-mob').on("click touchstart", function () {
        console.log('clickable!');
        $(this).removeClass('show-toggle-content-js');
        $('#main-menu').toggle('show-toggle-content-js');
    });
    console.log('Query loaded');
    // This is the Admin Ajax dynamic url from Custom function Hook
    // var url = "<?php echo admin_url('admin-ajax.php'); ?>";
    // var ajaxurl = 'http://localhost/refreshtextiles/wp-admin/admin-ajax.php';

    $('form.form-data-js').on('submit', function (e) {
        console.log("clicked");
        e.preventDefault();
        var obj = {};
        obj.name = $(this).find('input[name="name"]').val();
        obj.email = $(this).find('input[name="email"]').val();
        obj.country = $(this).find('input[name="country"]').val();
        obj.number = $(this).find('input[name="phone-number"]').val();
        obj.message = $(this).find('textarea[name="message"]').val();
        obj.submit = $(this).find('input[name="submit"]').val();
        var topics = [];
        $(this).find('input[name="topics"]:checked').each(function () {
            topics.push($(this).val());
        });
        obj.topics = topics;
        var ajaxScript = {ajax_url: my_ajax_object.ajax_url};
        if (obj.name !== "" && obj.email !== "" && obj.country !== "" && obj.number !== "") {
            $.ajax({
                type: "POST",
                url: ajaxScript.ajax_url,
                data: {
                    action: 'rpg_mail_data_hook',
                    data: obj,
                },
                dataType: "json",
                encode: true,
                statusCode:{
                    200: function (data) {
                        $('.success_msg').show();
                        $('.filed_checker').hide();
                    },
                    400:function (){
                        $('.error_msg_show').show();
                    }
                },
            })
            setTimeout(function () {
                $(".success_msg").hide();
                $('.filed_checker').hide();
            }, 8000);
            $(this)[0].reset();
        } else {

            if (obj.number === "") {
                $('.filed_checker').html("<b>Please Enter Your Number!</b>");
            }
            if (obj.country === "") {
                $('.filed_checker').html("<b>Select The Country!</b>");
            }
            if (obj.email === "") {
                $('.filed_checker').html("<b>Please Enter Your Email!</b>");
            }
            if (obj.name === "") {
                $('.filed_checker').html("<b>Please Enter Your Name!</b>");
            }

        }
    });

    $('form.form-video-data-js').on('submit', function (event) {
        console.log("clicked");
        event.preventDefault();
        var obj = {};
        obj.email = $(event.target).find('input[name="email"]').val();
        obj.submit = $(event.target).find('button[name="submit"]').val();
        var ajaxScript = {ajax_url: my_ajax_object.ajax_url};
        if (obj.email !== "") {
            $.ajax({
                type: "POST",
                url: ajaxScript.ajax_url,
                data: {
                    action: 'rpg_mail_video_data_hook',
                    data: obj,
                },
                dataType: "json",
                encode: true,
                statusCode:{
                    200: function (data) {
                        $('.success_msg').show();
                        $('.filed_checker').hide();
                        $(event.target)[0].reset();
                    },
                    400:function (){
                        $('.error_msg_show').show();
                    }
                },
            })
            setTimeout(function () {
                $(".success_msg").hide();
                $('.filed_checker').hide();
            }, 8000);
        } else {
            if (obj.email === "") {
                $('.filed_checker').html("<b>Please Enter Your Email!</b>");
            }
        }
    });


    $('.scroll-top-arrow').on('click', function () {
        scrollTo({top: 0, behavior: 'smooth'});
    })


    jQuery(window).on('resize', function () {
        let getThewindowSize = jQuery(window).width();
        // console.log(getThewindowSize);
        $('#main-header-menu').find('.show-toggle-content-js').removeClass('show-toggle-content-js');
        if (getThewindowSize >= 769) {
            // console.log("this is onload: " + getThewindowSize);
            jQuery('#main-menu').show();
        } else {
            // jQuery('#main-menu').hide();
        }
    })
    jQuery('.scroll-top-arrow').hide();
    jQuery(window).on("scroll", function () {
        let scrollHeight = jQuery('html').scrollTop();
        // console.log(scrollHeight);
        if (scrollHeight >= 1100) {
            // console.log("this is : " + scrollHeight);
            jQuery('.scroll-top-arrow').show();
            jQuery('.sustainable-product-main-left-child ').addClass('animate__animated animate__fadeInLeft');
            jQuery('.sustainable-product-main-right-child ').addClass('animate__animated animate__fadeInRight');
        } else {
            jQuery('#nav_site_header').removeClass('scrolled');
            jQuery('.scroll-top-arrow').hide();
        }
    });


    // $(".slider").owlCarousel();
    // console.log('d');
    jQuery('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        wide: 100,
        items: 1,
        navText: ["←", "→"],
        autoplay: true,
        autoplayTimeout: 7000,
        dots: true,
        pagination: false,
        navigation: false,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    (function () {
        // Add 'has_children' class to menus
        let hasChilMneu = $('.menu-item-has-children , .sub-menu');
        hasChilMneu.mouseover(function () {
            $(this).find('.sub-menu').addClass('show-menu');
        });
        hasChilMneu.mouseout(function () {
            $(this).find('.sub-menu').removeClass('show-menu');
        });
        $('.mobile-nav-menu-inner').on('click', function () {
            $('.mobile-menu-item-pr').show();
        })
        // jQuery(this).addClass('has_children');
        $('.mobile-menu-close-btn, .mobile-menu-close-btn a ').on('click', function () {
            $('.mobile-menu-item-pr').hide();
        })
    })($);
});
