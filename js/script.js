$(function(){
    $(".search-modal").modaal();
    $(".tag-modal").modaal();

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