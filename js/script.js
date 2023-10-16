$(function(){
    $(".search-modal").modaal();
    $(".tag-modal").modaal();

    $(window).on('scroll', function () {
        if ($('.top-image').height() < $(this).scrollTop()) {
            $('.js-header').addClass('change-colour');
        } else {
            $('.js-header').removeClass('change-colour');
        }
    });

    let $searchArea = $('.search-area');
    $('.js-home-search').on('click', function() {
        $searchArea.addClass('search-flash');
        setTimeout(function () {
            $searchArea.removeClass('search-flash');
        }, 3500);
    });
});

/* Swiper */
const swiper = new Swiper('.js-swiper', {
    effect: "fade",
    allowTouchMove: false,
    crossFade: true,
    loop: true,
    speed: 5000,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false
    },
});