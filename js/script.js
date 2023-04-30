$(function(){
    $(".search-modal").modaal();
    $(".tag-modal").modaal();

    $('.top-image__slider').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        fade: true,
        speed: 1500
    });

    $(window).on('scroll', function () {
        if ($('.top-image').height() < $(this).scrollTop()) {
            $('.js-header').addClass('change-colour');
        } else {
            $('.js-header').removeClass('change-colour');
        }
    });

});