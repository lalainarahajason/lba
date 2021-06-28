jQuery(function ($) {

    function CarouselInit() {
        var LeboCarousel = new Swiper('.LeboCarousel', {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 200,
            loop:true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });

        //var LeboCarousel = new Swiper(".LeboCarousel", CarouselObj);
    }

    if( document.querySelector('.LeboCarousel')){
        CarouselInit();
    }
})