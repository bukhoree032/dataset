"use strict";

$(window).on('load', function () {
    $('.flexslider').flexslider({
        animation: "fade",
        animationLoop: true,
        nextText: "",
        prevText: "",
        controlNav: true,
        directionNav: false,
        slideshowSpeed: 4000,
    });
});

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 8,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});