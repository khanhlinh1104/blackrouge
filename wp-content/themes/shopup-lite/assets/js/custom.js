jQuery(function($) {
    $('.shopup-double-image-slider').slick({
        autoplay: true,
        infinite: false,
        fade: true,
        cssEase: 'ease-in-out',
        arrows: false,
        slidesToShow: 1,
        dots: true,
        customPaging: function(slider, i) {
            return '<button type="button" class="shopup-double-image-nav"><span class="double-image-title">' + slider.$slides.eq(i).find('.shopup-double-image-single').data('title') + '</span><span class="double-image-subtitle">' + slider.$slides.eq(i).find('.shopup-double-image-single').data('subtitle') + '</span></button>';
        },
        appendDots: '.shopup-double-image-section-detail',
        dotsClass: 'shopup-double-image-section-navigation',
    });
});