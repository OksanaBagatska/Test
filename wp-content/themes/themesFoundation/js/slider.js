jQuery(document).ready(function ($) {

    $('.slider-for').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        focusOnSelect: true,
        verticalSwiping: true,
        vertical: true,
        asNavFor: '.slider-nav',
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }]
    });
    $('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        focusOnSelect: true,
        prevArrow: $('.prev-btn'),
        nextArrow: $('.next-btn'),
    });

    $('.slick_home').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: false,
        // centerMode: true,
        focusOnSelect: false,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
    });

});
jQuery(document).ready(function ($) {

    $(document).foundation();
});