jQuery(function ($) {
    function Slider(){
        var circle = jQuery('#circle');
        if( document.querySelector('.content-carousel')){            
            var ContentCarouselOptions = {			
                direction: 'horizontal',
                simulateTouch: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 200,
                mousewheelControl: false,
                speed: 700,
                loop:false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                on: {
                    init:function(){
                        var container = this.$el;
                        var reference = 0;
                        var simages = this.$el[0].querySelectorAll('.swiper-slide[data-type="image"]');

                        for (let index = 0; index < simages.length; index++) {
                            const element = simages[index];
                            if(element.querySelector('img').width > element.querySelector('img').height ){
                                element.classList.add('horizontal');
                                reference = element;
                            } else {
                                element.classList.add('vertical');
                            }
                        }

                        var w = reference.clientWidth;
                        var h = reference.clientHeight;
                    
                        container.find('.swiper-slide[data-type="video"]').find('.video-container').css({ width: w + 'px' })
                        container.find('.swiper-slide[data-type="video"]').find('.video-container').css({ height: h + 'px' })
                    },
                    click:function(swiper, event){

                        console.log('----------- TEST')
                        console.log(swiper);
                        
                        if(jQuery(swiper.srcElement).length){

                            /* var isLast = this.clickedSlide.getAttribute('data-number');
                            if(isLast === '0'){
                                
                            } else {
                                this.slidePrev();
                            }*/

                            this.slideNext();
                            
                            
                            
                            /* 
                            var index = this.activeIndex
                            var src = jQuery(swiper.srcElement);
                            var video   = src.parent().find('video');
                            var action  = src.attr('data-action');
                            
                            if(action === 'play'){
                                var pause   = src.parent().find('.video-pause');
                                src.addClass('d-none');
                                pause.removeClass('d-none');
                                // Trigger play
                                video.trigger('play');
                                circle.removeClass('video').addClass('playing');
                            }
                            if(action === 'pause'){
                                var play = src.parent().find('.video-play');
                                src.addClass('d-none');
                                play.removeClass('d-none');
                                // Trigger play
                                video.trigger('pause');
                                circle.addClass('video').removeClass('playing');
                            }*/

                        }
                        
                    }
                    
                    // , slideChangeTransitionEnd:function(swiper, event){
                    //     TweenMax.to('.swiper-slide-active .title-item', .7, {
                    //         opacity:1,
                    //         duration: 1,
                    //         stagger: 1.5
                    //     })
                    // }
                }
            }
            
            var leboSwiper = new Swiper(".content-carousel", ContentCarouselOptions);
            

            
            $('.content-carousel').on('mousedown touchstart', function(event) {
                TweenMax.to('.swiper-slide .image-container', 0.7,{scale: 0.9});
                if(jQuery('.video-container').length) {
                    TweenMax.to('.swiper-slide .video-container', 0.7,{scale: 0.9});
                }
                
                $("body").addClass("drag-cursor");
            });
            
            $('body').on('mouseup touchend', function(event) {
                TweenMax.to('.swiper-slide .image-container', 0.7,{scale:1});
                if(jQuery('.video-container').length) {
                    TweenMax.to('.swiper-slide .video-container', 0.7,{scale: 1});
                }
                $("body").removeClass("drag-cursor");
                var slides = document.querySelectorAll('.swiper-slide');
                for (let index = 0; index < slides.length; index++) {
                    const s = slides[index];
                    //console.log(s.querySelector('video'))
                }

            });
            
            $('.swiper-slide').on('mouseenter mousemove', function() {	
                $("body" ).addClass("scale-drag");
                var s = jQuery(this);
                var t = s.attr('data-type');
                var n = s.attr('data-number');
                if(n === '1' || n === '0'){
                    var l = s.attr('data-label');
                    circle_add_label(l);
                    //TweenMax.from('#circle small', 1,{opacity:1});
                } else {
                    //circle_add_label('Projet précédent')
                    circle_remove_label()
                    //leboSwiper.slidePrev()
                }
            });
                
            $('.swiper-slide').on('mouseleave', function() {
                circle_remove_label()
                stop_all_videos();
                $("body").removeClass("scale-drag").removeClass("drag-cursor");
                
            });
            
            $("body").mouseleave(function(e) {
                TweenMax.to('.swiper-slide .image-container', 0.7,{scale:1});
                if(jQuery('.video-container').length) {
                    TweenMax.to('.swiper-slide .video-container', 0.7,{scale: 1});
                }
                $("body").removeClass("scale-drag").removeClass("drag-cursor");
            });

            TweenMax.to('.swiper-slide-active h3', 0.7, { opacity: 1 })
    
        }

        /**
         * Pause all videos when mouseleave video container
         */
        function stop_all_videos(){
            jQuery('.video-play').removeClass('d-none');
            jQuery('.video-pause').addClass('d-none')
            jQuery('video').each(function(){
                jQuery(this).trigger('pause')
            })
        }

        /**
         * Add label to circle
         */
        function circle_add_label(l){
            circle.html('')
            circle.css({ width: "80px", height: "80px"})
            circle.html("<small class='text-white'>" + l + "</small>")
            
        }
        
        /**
         * Remove label
         */
        function circle_remove_label() {
            circle.html('')
            circle.css({ width: "20px", height: "20px"})
        }

        
    }
    
    Slider();
})