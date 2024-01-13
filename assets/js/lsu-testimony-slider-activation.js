// jQuery(document).ready(function($) {
//     $(".feelVibe-slider").slick({
//         autoplay: true,
//         autoplaySpeed: 2000,
//         arrow: true,
//         dots: true,

//         slidesToShow: 2,
//         slidesToScroll: 1,
        
//     });
// });






document.addEventListener('DOMContentLoaded', function () {
    let splideElements = document.querySelectorAll('#lsu_testimony');

    splideElements.forEach(function (element) {
        let splide = new Splide(element, {
            type   : 'loop',
            perPage: 3,
            perMove: 1,
            arrows: true,
            pagination: false,
            gap: "2.5rem",
            autoplay: true,
            autoHeight: true,
            focus: 'center',
        });

        splide.mount();
    });
});




// new Splide( '.splide' ).mount();

