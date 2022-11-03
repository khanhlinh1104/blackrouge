jQuery(function($) {

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    /* -----------------------------------------
    Main Slider
    ----------------------------------------- */
    $('.main-slider').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: true,
        arrows: false,
        adaptiveHeight: true,
    });

    /* -----------------------------------------
    Brands Slider
    ----------------------------------------- */
    $('.brand-slider').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: false,
        adaptiveHeight: true,
        slidesToShow: 5,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /* -----------------------------------------
    Product Carousel
    ----------------------------------------- */
    $('.product-three-two-carousel').slick({
        autoplay: false,
        infinite: true,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        nextArrow: '.latest-product_slide_three_arrow-left',
        prevArrow: '.latest-product_slide_three_arrow-right',
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /* -----------------------------------------
    Category Dropdown
    ----------------------------------------- */
    $('.ascen__category-menu-title').on('click', function() {
        if($('.ascen__category-menu-toggle').hasClass('ascend__category-opened')) {
            $('.ascen__category-menu-toggle').removeClass('ascend__category-opened').slideUp(500);
        } else {
            $('.ascen__category-menu-toggle').addClass('ascend__category-opened').slideDown(500);
        }
        return false;
    });

    // Remove .ascend__category-opened class and hide dropdown when user clicks outside.
    $('body').on('click', function(e){
        if ($('.ascen__category-menu-toggle').hasClass('ascend__category-opened') && !$(e.target).is('.ascen__category-menu-toggle')){
            $('.ascen__category-menu-toggle').removeClass('ascend__category-opened').slideUp(500);
        }
    });

    /* -----------------------------------------
    Sale Counter
    ----------------------------------------- */
    if ($('.shopup-sale-end-time').length) {
        function shopup_calculate_sale_end_time() {
            $('.shopup-sale-end-time').each(function() {
                var dateValue = $(this).data('date');
                var date = Math.abs((new Date().getTime() / 1000).toFixed(0));
                var date2 = Math.abs((new Date(dateValue).getTime() / 1000).toFixed(0));

                var diff = date2 - date;

                var days = Math.floor(diff / 86400);
                var hours = Math.floor(diff / 3600) % 24;
                var minutes = Math.floor(diff / 60) % 60;
                var seconds = diff % 60;

                var daysStr = days;
                if (days < 10) {
                    daysStr = "0" + days;
                }

                var hoursStr = hours;
                if (hours < 10) {
                    hoursStr = "0" + hours;
                }

                var minutesStr = minutes;
                if (minutes < 10) {
                    minutesStr = "0" + minutes;
                }

                var secondsStr = seconds;
                if (seconds < 10) {
                    secondsStr = "0" + seconds;
                }

                if (days < 0 && hours < 0 && minutes < 0 && seconds < 0) {
                    daysStr = "00";
                    hoursStr = "00";
                    minutesStr = "00";
                    secondsStr = "00";

                    if (typeof shopupInterval !== "undefined") {
                        clearInterval(shopupInterval);
                    }
                }

                $(this).find('span.day').html(daysStr + '<p> Days</p>');
                $(this).find('span.hour').html(hoursStr + '<p> Hours</p>');
                $(this).find('span.minutes').html(minutesStr + '<p> Mins</p>');
                $(this).find('span.second').html(secondsStr + '<p> Sec</p>');
            });
        }
        var shopupInterval = setInterval(shopup_calculate_sale_end_time, 1000);
    }

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.shopup-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
});