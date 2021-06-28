jQuery(function ($) {

	$(document).ready(function() {
		
		"use strict";
		jQuery(window).on('mousemove', MoveCircle);
		
		PageLoad();
		ScrollEffects();
		FirstLoad();
		Showcase();
		ShowcaseCarousel();
		Portfolio();
		Blog();		
		Shortcodes();	
		if( (typeof ClapatlebothemeThemeOptions != 'undefined') && (ClapatlebothemeThemeOptions.enable_ajax == "1") ){
			AjaxLoad();
			FitThumbScreen();
		} else {
			PageLoadNoAjax();
		}
		JustifiedGrid();
		Lightbox();
		Sliders();
		PlayVideo();
		SplittingTitles();
		InitContactMap();
		ArrowPosition();
		video_cursor();
		listEvents();
		servicesVideo();
		MenuPicture();
		filterCategories();
		if(document.querySelector('.LeboCarousel')){
			var slideshow = new Slideshow(document.querySelector('.LeboCarousel'));
		}
		
	});

/**
 * FILTRER LES CATEGORIES
 */
function filterCategories(){
	if(document.querySelectorAll('.filtre-item')) {
		var w = jQuery(window).width();
		var openCloseFilter = jQuery('.toggle-filter');
		var filterWrapper = jQuery('.filtre-wrapper');
		var r = jQuery('.filtre-item');
		var filterOpened = false;
		var totalHeight = 0;
		var h = 0;
		r.each(function (i, el) {  totalHeight += jQuery(el).outerHeight(); })
		
		var h = w < 980 ? jQuery(r[0]).outerHeight() : totalHeight;
		if( w < 980 ){
			console.log('1')
			h = totalHeight
			
		} else {
			
			h = jQuery(r[0]).outerHeight();
		}
		openCloseFilter.on("click", function(){ animateIt(); });

		console.log(totalHeight)
		var t = new TimelineMax();
			t.to(".filtre-wrapper", .75, {opacity:1, height:h + 30});
			t.staggerTo(".filtre-item", .75, {paddingTop:"30", opacity:1}, 0.2);
			t.reversed(true);
		function animateIt() {
			t.reversed(!t.reversed());
		}
		r.on('click', function(e){

			e.preventDefault();

			var t 	= jQuery(this).attr('data-filter');
			var aid = jQuery(this).attr("href");
			console.log(aid)


			jQuery(this).addClass('actif').siblings().removeClass('actif')
			jQuery('.post-realisation').each(function(){
				if(!jQuery(this).hasClass(t)){
					$(this).fadeOut('normal').addClass('hidden');
				}else {
					$(this).fadeIn('slow').removeClass('hidden');
				}
			})
			
			$('html,body').animate({scrollTop: jQuery(aid).offset().top},'slow');
		})
	}
}

/**
 * Menu picture
 * 
 */
function MenuPicture(){
	
	var items = jQuery('.menu-item');
	//document.addEventListener('mousemove', onMouseUpdate, false);
	var bgInnerContainer = jQuery('.swiper-background-container');
	var bgInnerWrapper = bgInnerContainer.find('.swiper-wrapper');
	var swiperMenu = new Swiper('.swiper-background-container', {
		effect: 'fade',
		fadeEffect: {
			crossFade: true
		},
		slidesPerView:1,
		touchRatio:0
	});
	console.log('test')
	swiperMenu.on('slideNextTransitionStart', () => animateSlideMenu('next')); 
    swiperMenu.on('slidePrevTransitionStart', () => animateSlideMenu('prev'));

	items.each(function(index){
		var item = jQuery(this);
		var itemID = item.attr('id');
		var itemLink = item.find('a');
		var itemLinkAttr = itemLink.attr('data-background');
		if(itemLinkAttr){
			swiperMenu.prependSlide([
				'<div class="swiper-slide" slide-id="' +index+ '" > <img src="' +itemLinkAttr+ '" /> </div>',
			]);
		}
		item.on('mouseenter', function(){
			swiperMenu.slideTo(index-1, 1000, false)
		})
	})

	var animateSlideMenu = function(direction){
		console.log(direction)
	}
}

function getXY(evt, element) {
	var rect = element.getBoundingClientRect();
	var scrollTop = document.documentElement.scrollTop?
					document.documentElement.scrollTop:document.body.scrollTop;
	var scrollLeft = document.documentElement.scrollLeft?                   
					document.documentElement.scrollLeft:document.body.scrollLeft;
	var elementLeft = rect.left+scrollLeft;  
	var elementTop = rect.top+scrollTop;

	x = evt.pageX-elementLeft;
	y = evt.pageY-elementTop;

	return {x:x, y:y};
}

function onMouseUpdate(e){
	console.log(e.x, e.y);
	console.log('----');
}

/**
 * UL LI
 */
function listEvents(){
	var list = jQuery('#main-content ul li');
	list.each(function(){
		var li = jQuery(this);
		if(li.children('a').length > 0) {
			li.addClass('has-link')
		}
	})
}

var circle = document.getElementById('circle');
function CarouselInit() {
    /* var LeboCarousel = new Swiper('.LeboCarousel', {
        slidesPerView: 1, //auto
        centeredSlides: true,
		//spaceBetween: 200,
		loop:true,
		on:{
			click:function(swiper, event){
				this.slideNext();
				//	this.slideNext();
				// if(this.classList.contains('swiper-slide-prev')){
				// 	this.slidePrev();
				// }
			}
		}
    });
    
	$('.LeboCarousel').on('mousedown touchstart', function(event) {
		TweenMax.to('.swiper-slide', 0.7,{scale: 0.9});
		if(jQuery('.video-container').length) {
			TweenMax.to('.swiper-slide .video-container', 0.7,{scale: 0.9});
		}
		
		$("body").addClass("drag-cursor");
	}); */
	
	$('body').on('mouseup touchend', function(event) {
		TweenMax.to('.swiper-slide', 0.7,{scale:1});
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
	
	$('.swiper-slide').on('mouseenter', function(event) {	
		var s = jQuery(this);
		var l = s.attr('data-label');
		if(jQuery(event.target).is('span')){
			circle_remove_label()
		}
		if(!s.hasClass('slide-last')){
			circle_add_label(l);
		} else {
			circle_remove_label()
		}
		
	});
		
	$('.swiper-slide').on('mouseleave', function() {
		circle_remove_label()
		//stop_all_videos();		
	});

	$('.swiper-slide').find('a').on('mouseenter', function(){
		circle_remove_label()
		console.log('test')
	})

	TweenMax.to('.swiper-slide-active h3', 0.7, { opacity: 1 })
}

if( document.querySelector('.LeboCarousel')){
	/**
     * Add label to circle
     */	
    function circle_add_label(l){
		circle.innerHTML 	= '';
		circle.style.width 	= "80px";
		circle.style.height = "80px";
		circle.innerHTML 	= "<small class='text-white'>" + l + "</small>";
        
    }
    
    /**
     * Remove label
     */
    function circle_remove_label() {
        circle.innerHTML 	= '';
        circle.style.width 	= "20px";
		circle.style.height = "20px";
    }
    CarouselInit();
}

/** --------------------------------
 * SERVICES VIDEO
 -------------------------------- */
function servicesVideo(){
	if(document.querySelector('.bloc-services-content')) {
		var vs = document.querySelectorAll('.bloc-services-content');
		for (let index = 0; index < vs.length; index++) {
			var element = vs[index];
			if(element.querySelector('video')) {
				var v = element.querySelector('video');
				element.addEventListener('mouseenter', function(e){
					v.play()
				})
				element.addEventListener('mouseleave', function(e){
					v.pause()
				})
			}
		}
	}
	
}

/** --------------------------------
 * MASK REGULAR VIDEO
 -------------------------------- */

function video_cursor() {	 
	if(document.querySelectorAll('.wp-block-video')) {
		var vs = document.querySelectorAll('.wp-block-video');
		var circle = document.getElementById('circle');
		for (let index = 0; index < vs.length; index++) {
			var element = vs[index];
			var v = element.querySelector('video');
			var isPlaying = false;
			if (v.hasAttribute("controls")) {
				v.removeAttribute("controls")   
			 }
			v.addEventListener('mouseenter', function(e){
				console.log(isPlaying)
				if(isPlaying){
					circle.classList.add('playing');
					circle.classList.remove('video');
				} else {
					circle.classList.add('video');
					circle.classList.remove('playing');
				}
				
				circle.style.transform = "scale(3,3)";
			})

			v.addEventListener('click', function(){
				if(isPlaying){
					v.pause();
				} else {
					v.play();
				}
				

			})
			
			v.addEventListener('mouseleave', function(){
				circle.classList.remove('video');
				circle.classList.remove('playing');
				circle.style.transform = "scale(1)";
				
			})
			v.onplaying = function() {
				circle.classList.add('playing');
				circle.classList.remove('video');
				isPlaying = true;
			};
			v.onpause = function() {
				circle.classList.add('video');
				circle.classList.remove('playing');
				isPlaying = false;
			};
			
		}

	}
}

function video_cursor__b(){
        
	if(document.querySelector('.mask-video')){

		var video_wrapper = document.querySelectorAll('.mask-video');
		for (let index = 0; index < video_wrapper.length; index++) {

			const element = video_wrapper[index];
			var video_pause = document.querySelector('.video-pause');
			var v_id    = element.getAttribute('data-video');
			var video   = element.querySelector('video');
			var vplay    = element.querySelector('.video-play');
			var vpause   = element.querySelector('.video-pause');

			element.addEventListener('mouseenter', function(e){
				
				circle.style.backgroundColor = "black"
				playVideo(circle, vplay, vpause, video);
			})

			element.addEventListener('mouseleave', function(e){
				circle.style.transform = 'scale(1)';
				circle.classList.remove('playing')
				circle.classList.remove('video');
				video.pause();

			})

			vplay.addEventListener('click', function(){
				playVideo(circle, vplay, vpause, video)
			})

			vpause.addEventListener('click', function(){
				pauseVideo(circle, vplay, video, vpause) 
			})
		}
		
	}
	
}

function playVideo(circle, vplay, vpause, video){
	circle.style.transform = 'scale(3)'
	circle.classList.remove('video');
	circle.classList.add('playing');
	vplay.classList.add('d-none')
	vpause.classList.remove('d-none');
	video.play();
	video.loop = true;
}

function pauseVideo(circle, vplay, video, vpause) {
	video.pause();
	circle.classList.add('video');
	circle.classList.remove('playing');
	vplay.classList.remove('d-none')
	vpause.classList.add('d-none')
}

/*--------------------------------------------------
Function Move circle
---------------------------------------------------*/
function MoveCircle(e) {
    
    TweenLite.to(circle, 0.5, {
        css: {
            left: e.pageX + 30,
            top: e.pageY + 30,
        }
    });
}

/*--------------------------------------------------
Arrow navigation position
---------------------------------------------------*/
function ArrowPosition(){
    // the arrow wrapper
    if(document.querySelector('.lebostudio-navigation-wrapper')){
		console.log("home")
		var Adjust = {
			top:39,
			right:40 // half of header right padding
		};
        var NavigationWrapper = document.querySelector('.lebostudio-navigation-wrapper');
		var MainPageContent = document.querySelector('#main-page-content');
		var MainTitle = MainPageContent.querySelector('h1');
		var MainTitlePosition = MainTitle.getBoundingClientRect();
		var MainTitleHeight = MainTitle.offsetHeight;
		var NavigationWrapperPosition = MainTitlePosition.y + MainTitleHeight;
		NavigationWrapper.style.top = NavigationWrapperPosition - Adjust.top + 'px';
		NavigationWrapper.style.right = Adjust.right + 'px'
	}
    
}


/*--------------------------------------------------
Function Page Load
---------------------------------------------------*/

	function PageLoad() {	
		
		if ($('#page-content').hasClass("light-content")) {
			$('.preloader-wrap').addClass('light-content');			
		}
		
		TweenMax.set($(".fullscreen-menu .menu-timeline .before-span"), {y: 120, opacity:0});
		
		// Page Navigation Events
		$(".preloader-wrap").on('mouseenter', function() {	
			var $this = $(this);			
			TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1.2, borderColor:'#fff', backgroundColor:'#fff'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).append( '<p class="first">' + $this.data("firstline") + '</p>' + '<p>' + $this.data("secondline") + '</p>' );				
		});
							
		$(".preloader-wrap").on('mouseleave', function() {					
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$('#ball p').remove();				
		});		
		
		$('body').removeClass('hidden').removeClass('hidden-ball');
		TweenMax.to($(".preloader-marquee-wrapper"), 1, {force3D:true, opacity:1, y: 0, delay:0.2, ease:Power3.easeOut});
		TweenMax.to($("#header-container"), 0.5, {force3D:true, opacity:1, delay:0.2, ease:Power2.easeOut}); //modified time
		var width = 100,
			perfData = window.performance.timing, 
			EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
			time = ((EstimatedTime/10)%550) * 10
			
		// Loadbar Animation
		$(".loadbar").animate({
			width: width + "%"
		}, time  );	
		
		
		// Percentage Increment Animation
		var PercentageID = $("#precent"),
				start = 0,
				end = 100,
				durataion = time + 0;
				animateValue(PercentageID, start, end, durataion);
				
		function animateValue(id, start, end, duration) {
		  
			var range = end - start,
			  current = start,
			  increment = end > start? 1 : -1,
			  stepTime = Math.abs(Math.floor(duration / range)),
			  obj = $(id);
			
			var timer = setInterval(function() {
				current += increment;
				$(obj).text(current);
			  //obj.innerHTML = current;
				if (current == end) {
					clearInterval(timer);
				}
			}, stepTime);
		}
		
		// Fading Out Loadbar on Finised
		setTimeout(function(){
			$('.loadbar').append('<span class="hold-progress-bar"></span>');
			
			TweenMax.to($('.hold-progress-bar'), 0.3, {force3D:true,width:'100%', delay:0, ease:Power2.easeOut, onComplete:function(){  //modified time 2019 nov
				
				$('body').waitForImages({
						finished: function() {
							TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
							TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
							$('#ball p').remove();
							TweenMax.to($(" .trackbar, .percentage"),0.3, {force3D:true, opacity:0, y:-10, delay:0, ease:Power2.easeIn});
							TweenMax.to($(" .preloader-marquee"),0.5, {force3D:true, opacity:0, y:-40, delay:0.1, ease:Power2.easeIn});							
							TweenMax.to($(".preloader-wrap"),1, {force3D:true, yPercent: -101, delay:0.6, ease:Power2.easeInOut});
							TweenMax.set($(".preloader-wrap"), {visibility:'hidden', delay:1.7, opacity:0});
							TweenMax.to($("#header-container"), 0.5, {force3D:true, opacity:1, delay:1.4, ease:Power2.easeOut}); //modified time
							setTimeout(function(){
							
								$('body').waitForImages({
									finished: function() {
										TweenMax.to($(".header-middle, #footer-container, .showcase-counter, .swiper-pagination-bullet-active .counter"), 1, {force3D:true, opacity:1, delay:0, ease:Power2.easeOut}); 
												
									},
									waitForAll: true
								});
								
								if( $('.hero-video-wrapper').length > 0 ){
									$('#hero-image-wrapper').find('video').each(function() {
										$(this).get(0).play();
									}); 
								}
								
								TweenMax.to($("#main"), 0, {force3D:true, opacity:1, delay:0, ease:Power2.easeOut});//modified time
								if( $('#hero').hasClass("has-image")) {	
									TweenMax.to($("#hero-bg-image, #hero-fg-image"), 1, {force3D:true, scale:1.02 , opacity:1, delay:0.2, ease:Power2.easeOut});
									TweenMax.to($(".hero-title span"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.6, ease:Power2.easeOut});
									TweenMax.to($(".hero-subtitle"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
									TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.1, ease:Power2.easeOut});
									TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});
									TweenMax.to($(".scroll-down-wrap"), 1, {force3D:true, scale:1, opacity:1, delay:1.2, ease: Elastic.easeOut});														
									TweenMax.to($("#main-page-content"), 0.4, {force3D:true, opacity:1, y:0, delay:1.15, ease:Power2.easeOut});
								} else {
									TweenMax.to($(".hero-title span"), 0.4, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
									// Fading In Small Carousel elements on Finised
									var tlHerospan = new TimelineLite();
									tlHerospan.set($("#hero .hero-move-title span"), {y: 120, opacity:0});
									$("#hero .hero-move-title span").each(function(index, element) {
										tlHerospan.to(element, 0.7, {y:0, opacity:1, delay:0.6, ease:Power3.easeOut}, index * 0.1)
									});
									TweenMax.to($(".landing-caption"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
									TweenMax.to($(".hero-subtitle"), 0.4, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.95, ease:Power2.easeOut});
									TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1, ease:Power2.easeOut});
									TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1.1, ease:Power2.easeOut});
									TweenMax.to($(".error-button"), 0.4, {force3D:true, y: 0, opacity:1, rotation:0, delay:1, ease:Power2.easeOut});									
									TweenMax.to($("#main-page-content"), 0.7, {force3D:true, opacity:1, y:0, delay:1.3, ease:Power2.easeOut});				
								}	
								
								
								// Fading In Showcase elements on Finised
								TweenMax.set($("#showcase-slider-holder"), {opacity:0, scale:1.1});
								TweenMax.set($("#showcase-carousel-holder, #showcase-vertical-carousel-holder"), {opacity:0, scale:1.05});
								TweenMax.set($(".swiper-prev, .swiper-next, .swiper-pagination-bullet, .arrows-wrap, .carousel-allprojects-wrapper"), {opacity:0});								
								TweenMax.to($("#showcase-slider-holder, #showcase-carousel-holder, #showcase-vertical-carousel-holder"), 0.7, {force3D:true, opacity:1, scale:1, delay:0.6, ease:Power2.easeOut});
								TweenMax.to($(".swiper-slide-active .move-caption .move-title span"), 1, {force3D:true, y: 0, opacity:1, delay:0.8, ease:Power2.easeOut});
								TweenMax.to($(".swiper-slide-active .move-caption .subtitle span"), 0.7, {force3D:true, y: 0, opacity:1, delay:1.1, ease:Power2.easeOut});
								TweenMax.to($(".move-caption .move-title span"), 0.1, {force3D:true, y: 0, opacity:1, delay:2, ease:Power2.easeOut});
								TweenMax.to($(".move-caption .subtitle span"), 0.1, {force3D:true, y: 0, opacity:1, delay:2, ease:Power2.easeOut});
								TweenMax.to($(".swiper-prev"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});
								TweenMax.to($(".swiper-pagination-bullet, .arrows-wrap, .carousel-allprojects-wrapper"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1, ease:Power2.easeOut});
								TweenMax.to($(".swiper-next"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});
								
								
								var slideWidth = $("#showcase-carousel-holder #showcase-slider .swiper-slide").width();
								TweenMax.set($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").prev(), {x:slideWidth, scale:0.8, opacity:0});
								TweenMax.set($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").next(), {x:-slideWidth, scale:0.8, opacity:0});								
								TweenMax.to($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").prev(), 2, {force3D:true, x:0, scale:1, delay:0.2, opacity:1, ease:Power3.easeInOut  });
								TweenMax.to($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").next(), 2, {force3D:true, x:0, scale:1, delay:0.2, opacity:1, ease:Power3.easeInOut  });
								
								//Blog Appear
								TweenMax.to($("#blog-content"), 0.4, {force3D:true, opacity:1, y:0, delay:1.05, ease:Power2.easeOut});
								TweenMax.to($(".post-article-wrap"), 0.4, {force3D:true, y: 0, opacity:1, delay:0.7, ease:Power2.easeOut});
								TweenMax.to($("#post-content, #post .post-image, .post-meta-data, .post-navigation, .post-comments, .post-form"), 0.4, {force3D:true, opacity:1, y:0, delay:0.75, ease:Power2.easeOut});
								TweenMax.to($("#blog-navigation, #sidebar"), 1, {force3D:true, opacity:1, ease:Power2.easeOut});
											
									
								setTimeout( function(){	
									$('body').removeClass("load-project-page").removeClass("load-project-page-carousel");
								} , 600 );
								
								setTimeout( function(){	
									$('body').removeClass("load-next-project");
									$('body').addClass("header-visible");
									$('#showcase-holder').removeClass("disabled");
								} , 1600 );
								
								setTimeout( function(){	
									$('body').removeClass("show-loader")
								} , 800 );	
								
							} , 600 );
						},
					waitForAll: true
				});
				
			}});
	  
		}, 0); // time
		
		
		
	}// End Page Load


/*--------------------------------------------------
Function First Load
---------------------------------------------------*/	

	function FirstLoad() {	
		
		if ($("#page-content").hasClass("light-content")) {
			$("nav").css('background-color', '#141414');
			$("main, #main, #main-content").css('background-color', '#141414');
			$('#magic-cursor').addClass('light-content');
			if( $('#hero').length > 0 ){						
				if( $('#hero').hasClass("has-image")) {	
					$("header").css('background-color', 'transparent');
				} else {
					if( $('#post').length > 0 ){
						$("header").css('background-color', '#141414');
					} else {
						$("header").css('background-color', 'transparent');
					}
				}
			} else {
				$("header").css('background-color', 'transparent');
			}
		} else {			
			$("nav").css('background-color', '#141414');
			$("main, #main, #main-content").css('background-color', '#fff');
			$('#magic-cursor').removeClass('light-content');
			if( $('#hero').length > 0 ){	
				if( $('#hero').hasClass("has-image")) {	
					$("header").css('background-color', 'transparent');
				} else {
					if( $('#post').length > 0 ){
						$("header").css('background-color', '#fff');
					} else {
						$("header").css('background-color', 'transparent');
					}
				}
			} else {
				$("header").css('background-color', 'transparent');
			}
		}
		
		
		
		$('.video-cover').each(function() {
			var image = $(this).data('src');	
			$(this).css({'background-image': 'url(' + image + ')'});
		});
		
		//Load Default Page
		$('a.ajax-link').on('click', function() {
			$("body").addClass("show-loader");	
			$(".flexnav").removeClass("flexnav-show");
			$('#menu-burger').removeClass("open");
			$('header').removeClass('white-header');
			$("#app").remove();
			$(".big-title-caption").remove();	
			var tlMenu = new TimelineLite();
			$(".fullscreen-menu .menu-timeline").each(function(index, element) {
				tlMenu.to(element, 0.25, {y:-30, opacity:0, ease:Power2.easeIn}, index * 0.03)
			});	
			TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(0, 0, 0, 0)",opacity:1});			
			TweenMax.to($("#main, #hero-image-wrapper, #project-nav, .next-project-image, #app, #blog, #hero"), 0.3, {opacity:0, delay:0.1, ease:Power0.ease});					
			TweenMax.to($("#footer-container, .header-middle"), 0.3, {opacity:0, ease:Power0.ease});			
			TweenMax.to('#show-filters, #counter-wrap', 0.2,{opacity:0});
		});
		
		//Load Project from Showcase
		$('#showcase-slider-holder #showcase-slider-captions-stroked a.move-title').on('click', function() {	
			$('header').removeClass('white-header');
			TweenMax.to($(".swiper-prev"), 0.3, {force3D:true, opacity:0, delay:0, ease:Power2.easeOut});
			TweenMax.to($(".swiper-pagination .swiper-pagination-bullet"), 0.3, {force3D:true, opacity:0, delay:0.1, ease:Power2.easeOut});
			TweenMax.to($(".swiper-next"), 0.3, {force3D:true, opacity:0, delay:0.15, ease:Power2.easeOut});
			TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(0, 0, 0, 0)",opacity:1});
			$("body").addClass("load-project-page").addClass("show-loader");
		});
		
		
		//Load Page From Menu
		$('nav .ajax-link').on('click', function() {
			$(this).parents('.flexnav').addClass('hover');
			$(this).parents('.item-with-ul').addClass('hover');
			TweenMax.set($(this).find('span'),{yPercent:0});
			var tl = new TimelineLite();
			$(".fullscreen-menu .menu-timeline .before-span").each(function(index, element) {
				tl.to(element, 0.5, {force3D:true, y:-120, opacity:0, delay:0, ease:Power2.easeIn}, index * 0.05)
			});
			$('header').removeClass('white-header');
			$("#app").remove();
			$(".big-title-caption").remove();	
		});
		
		
		
		$('#burger-wrapper, .menu .button-text').on('click', function() {
			$('#menu-burger, nav').toggleClass('open');			
			setTimeout( function(){			
				if ($('#menu-burger').hasClass("open")) {
					$('header').addClass('over-sidebar').addClass('over-white-section');
					if (!$('#page-content').hasClass("light-content")) {	
						$('#magic-cursor').addClass('light-content');
						$('#header-container').addClass('light-content');
					}
					TweenMax.set($("nav ul ul li"), {y: 0, opacity:1});
					//Fade In Navigation Lists
					var tlMenu = new TimelineLite();
					tlMenu.set($(".fullscreen-menu .menu-timeline .before-span"), {y: 120, opacity:0});
					//TweenMax.staggerTo($(".menu-timeline"), 0,{cycle:{x: ["50", "-50"]}, opacity:0});
					$(".fullscreen-menu .menu-timeline .before-span").each(function(index, element) {
						tlMenu.to(element, 0.7, {force3D:true, y:0, opacity:1, delay:0.4, ease:Power2.easeOut}, index * 0.1)
					});
					
						
				} else {	
					//Fade Out Navigation Lists	
					var tlMenu = new TimelineLite();					
					$(".fullscreen-menu .menu-timeline .before-span").each(function(index, element) {
						tlMenu.to(element, 0.5, {force3D:true, y:-120, opacity:0, delay:0, ease:Power2.easeIn}, index * 0.05)
					});
					
					var tlSubMenu = new TimelineLite();					
					$("ul.flexnav-show ul li").each(function(index, element) {
						tlSubMenu.to(element, 0.5, {force3D:true, y:-120, opacity:0, delay:0, ease:Power2.easeIn}, index * 0.03)
					});
					
					if (!$('#page-content').hasClass("light-content")) {	
						setTimeout( function(){
							$('#magic-cursor').removeClass('light-content');
							$('#header-container').removeClass('light-content');
						} , 500 );
					}
					setTimeout( function(){
						$(".touch-button.active").trigger("click");
						$('header').removeClass('over-sidebar')
						setTimeout( function(){
							$('header').removeClass('over-white-section');
						} , 350 );
					} , 500 );
				}							
			} , 20 );
		});
		
		
		// Page Navigation Events
		$(".next-ajax-link-page").on('mouseenter', function() {	
			var $this = $(this);			
			TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1.2, borderColor:'#fff', backgroundColor:'#fff'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).append( '<p class="first">' + $this.data("firstline") + '</p>' + '<p>' + $this.data("secondline") + '</p>' );				
		});
							
		$(".next-ajax-link-page").on('mouseleave', function() {					
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$('#ball p').remove();				
		});				
		
		
		$('.next-ajax-link-page').on('click', function() {					
			$("body").addClass("load-next-page");
			$("body").addClass("show-loader");
			$('header').removeClass('white-header');
			$("#app").remove();
			$(".big-title-caption").remove();	
				
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$("#ball").removeClass("with-icon");
			$('#ball p').remove();
			$('#ball i').remove();	
			
			if ($('#project-nav').hasClass("light-content")) {				
				setTimeout(function(){
					$('body').addClass('light-content');								
				} , 300 );
			}
			if ($("body").hasClass("smooth-scroll")) {
				var navmove = $("#content-scroll").height() - $("#page-nav").height() - $("footer").height() 			
			} else {
				var navmove = window.innerHeight - $("#hero").height() - $("footer").height() 		   
			}
			
			TweenMax.to($(".subtitle-info"), 0.3, {force3D:true, opacity:0, delay:0, y: -20, ease:Power2.easeOut});
			TweenMax.to($(".subtitle-name"), 0.3, {force3D:true, opacity:1, y: 0, delay:0.15, ease:Power2.easeOut});
			
			TweenMax.to($("#main-page-content, #hero"), 0.3, {opacity:0});		
			TweenMax.to($("#page-nav"), 0.7, {y: - navmove, delay:0, ease:Power2.easeInOut});
			TweenMax.to($("footer"), 0.3, {opacity:0, delay:0, ease:Power2.easeInOut});
		});
		
		
		// Project Navigation Events
		$("#project-nav .item-image").mouseenter(function(e) {	
			var $this = $(this);		
			TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1.2, borderColor:'#fff', backgroundColor:'#fff'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).append( '<p class="first">' + $this.data("firstline") + '</p>' + '<p>' + $this.data("secondline") + '</p>' );
		});
						
		$("#project-nav .item-image").mouseleave(function(e) {
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$('#ball p').remove();
		});	
		
		$('.next-ajax-link-project').on('click', function() {					
			$("body").addClass("load-next-project").addClass("show-loader");
			$('header').removeClass('white-header');
			$("#app").remove();
			$(".big-title-caption").remove();	
					
			TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(0, 0, 0, 0)",opacity:1});
			if ($('#project-nav').hasClass("light-content")) {				
				setTimeout(function(){
					$('body').addClass('light-content');								
				} , 300 );
			}
			
			TweenMax.to($(".next-title"), 0.4, {force3D:true, opacity:0, delay:0, y: -20, rotation:3, ease:Power2.easeOut});						
			TweenMax.to($(".next-subtitle-name"), 0.4, {force3D:true, opacity:1, y: 0, rotation:0, delay:0.2, ease:Power2.easeOut});
			
			TweenMax.to($("#main-page-content"), 0.3, {opacity:0});			
			TweenMax.to($(".next-project-image"), 0.9, {scale:1.02, opacity: 1, ease:Power4.easeOut});
			TweenMax.to($(".next-project-image-bg"), 0.9, {scale:1, opacity: 1, ease:Power4.easeOut});
			TweenMax.to($(".next-project-image-fg"), 0.9, {scale:1, opacity: 1, ease:Power4.easeOut});
			TweenMax.to($("footer"), 0.3, {opacity:0, ease:Power2.easeInOut});
				
		});
		
		
		if( $('#project-nav').length > 0 ){
			$('#main-page-content').addClass('project-page');					
		}
		
		if( $('#main-page-content').length > 0 ){
			if ($('p').is(":first-child")) {
				$('#main-page-content').addClass('comments-page');
			}
		}
		
		if( $('.portfolio').length > 0 ){
			$('#main-page-content').addClass('portfolio-page');			
		}
			
		
		
		
		var viewportWidth = $(window).width();
		if (viewportWidth < 1024) {				
			$('.hero-video-wrapper').remove();							 
		}
		
		// add a label element to CF7 input elements for the underline highlight effect
		$( '.wpcf7-form-control-wrap' ).each( function() {
			
			if( $( this ).has('label').length <= 0 ){
				$( this ).append( '<label class="input_label"></label>' );
			}
		});
		
		$( '.page-numbers li a' ).each( function() {			
			$(this).addClass("link")	
		});
		
		
	}// End First Load
	
	
/*--------------------------------------------------
Function Lazy Load
---------------------------------------------------*/

	function LazyLoad() {	
		
		TweenMax.set($("#show-filters, #counter-wrap"), {opacity:0, delay:0});
		
		$('body').waitForImages({
			finished: function() {
				$('body').removeClass('loading')
				setTimeout( function(){	
					$('body').removeClass('hidden').removeClass('scale-up').removeClass('scale-none');
				} , 200 );
			},
			waitForAll: true
		});	
		
		$('body').waitForImages({
			finished: function() {
				TweenMax.to($("#header-container, .header-middle"), 1, {force3D:true, opacity:1, ease:Power2.easeOut});				
			},
			waitForAll: true
		});
		
		TweenMax.to($("#main"), 0.3, {force3D:true, opacity:1, delay:0.1, ease:Power2.easeOut});
			
		
		if( $('#hero').hasClass("has-image")) {	
			if( $('body').hasClass("load-project-thumb-with-title")) {
				TweenMax.to($("#hero-fg-image, #hero-bg-image"), 0, {force3D:true, scale:1.02 , opacity:1, delay:0, ease:Power2.easeOut});				
				TweenMax.to($(".hero-title span"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.6, ease:Power2.easeOut});
				TweenMax.to($(".hero-subtitle"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:0.8, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1, ease:Power2.easeOut});		
			} else if( $('body').hasClass("load-project-thumb")) {
				TweenMax.to($("#hero-fg-image, #hero-bg-image"), 0, {force3D:true, scale:1.02 , opacity:1, delay:0, ease:Power2.easeOut});				
				TweenMax.to($(".hero-title span"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.6, ease:Power2.easeOut});
				TweenMax.to($(".hero-subtitle"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.1, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});			
			}else {
				TweenMax.to($("#hero-fg-image, #hero-bg-image"), 0, {force3D:true, scale:1.02 , opacity:1, delay:0, ease:Power2.easeOut});
				TweenMax.to($(".hero-title span"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.7, ease:Power2.easeOut});
				TweenMax.to($(".hero-subtitle"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:0.6, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.9, ease:Power2.easeOut});
				TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1, ease:Power2.easeOut});	
			}
			TweenMax.to($("#main-page-content"), 0.4, {force3D:true, opacity:1, y:0, delay:0.95, ease:Power2.easeOut});
		} else {
			TweenMax.to($(".hero-title"), 0.4, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.1, ease:Power2.easeOut});
			var tlHerospan = new TimelineLite();
			tlHerospan.set($("#hero .hero-move-title span"), {y: 120, opacity:0});
			$("#hero .hero-move-title span").each(function(index, element) {
				tlHerospan.to(element, 0.7, {y:0, opacity:1, delay:0, ease:Power3.easeOut}, index * 0.1)
			});
			TweenMax.to($(".hero-title span"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0, ease:Power2.easeOut});
			TweenMax.to($(".landing-caption"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.4, ease:Power2.easeOut});
			TweenMax.to($(".hero-subtitle"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.15, ease:Power2.easeOut});
			TweenMax.to($(".hero-footer-left"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.5, ease:Power2.easeOut});
			TweenMax.to($(".hero-footer-right"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:0.6, ease:Power2.easeOut});
			TweenMax.to($(".error-button"), 0.4, {force3D:true, y: 0, opacity:1, rotation:0, delay:0.2, ease:Power2.easeOut});
			TweenMax.to($("#main-page-content"), 0.2, {force3D:true, opacity:1, delay:0.15, ease:Power2.easeOut});
			TweenMax.to($(".post-article-wrap"), 0.4, {force3D:true, y: 0, opacity:1, ease:Power2.easeOut});
		}	
		
		// Fading In Showcase elements on Finised
		TweenMax.set($("#showcase-slider-holder"), {opacity:0, scale:1.1});
		TweenMax.set($("#showcase-carousel-holder, #showcase-vertical-carousel-holder"), {opacity:0, scale:1.1});
		TweenMax.set($(".swiper-prev, .swiper-next, .swiper-pagination-bullet, .arrows-wrap, .carousel-allprojects-wrapper"), {opacity:0});								
		TweenMax.to($("#showcase-slider-holder, #showcase-carousel-holder, #showcase-vertical-carousel-holder"), 0.4, {force3D:true, opacity:1, scale:1, delay:0.6, ease:Power2.easeOut});
		TweenMax.to($(".swiper-slide-active .move-caption .move-title span"), 1, {force3D:true, y: 0, opacity:1, delay:0.9, ease:Power2.easeOut});
		TweenMax.to($(".swiper-slide-active .move-caption .subtitle span"), 0.7, {force3D:true, y: 0, opacity:1, delay:1.3, ease:Power2.easeOut});
		TweenMax.to($(".move-caption .move-title span"), 0.1, {force3D:true, y: 0, opacity:1, delay:2, ease:Power2.easeOut});
		TweenMax.to($(".move-caption .subtitle span"), 0.1, {force3D:true, y: 0, opacity:1, delay:2, ease:Power2.easeOut});
		TweenMax.to($(".swiper-prev"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});
		TweenMax.to($(".swiper-pagination-bullet, .arrows-wrap, .carousel-allprojects-wrapper"), 0.7, {force3D:true, y:0, opacity:1, rotation:0, delay:1.1, ease:Power2.easeOut});
		TweenMax.to($(".swiper-next"), 0.7, {force3D:true, y: 0, opacity:1, rotation:0, delay:1.2, ease:Power2.easeOut});
		
		var slideWidth = $("#showcase-carousel-holder #showcase-slider .swiper-slide").width();
		TweenMax.set($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").prev(), {x:slideWidth, scale:0.8, opacity:0});
		TweenMax.set($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").next(), {x:-slideWidth, scale:0.8, opacity:0});								
		TweenMax.to($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").prev(), 2.5, {force3D:true, x:0, scale:1, delay:0, opacity:1, ease:Power3.easeInOut  });
		TweenMax.to($("#showcase-carousel-holder #showcase-slider .swiper-slide-active").next(), 2.5, {force3D:true, x:0, scale:1, delay:0, opacity:1, ease:Power3.easeInOut  });
		
		// Blog Load
		TweenMax.to($("#post-content, #post .post-image, .post-meta-data, .post-navigation, .post-comments, .post-form"), 0.4, {force3D:true, opacity:1, y:0, delay:0.1, ease:Power2.easeOut});
		TweenMax.to($("#blog-navigation, #sidebar"), 1, {force3D:true, opacity:1, ease:Power2.easeOut});
		TweenMax.to($("#blog-content"), 0.4, {force3D:true, opacity:1, y:0, delay:0.15, ease:Power2.easeOut});
		
		TweenMax.to($("#footer-container"), 1, {force3D:true, opacity:1, delay:0.4, ease:Power2.easeOut});		
		
		if( $('.load-project-thumb').length > 0 ){
			setTimeout( function(){
				$('#hero-image-wrapper').find('video').each(function() {
					$(this).get(0).play();
				});
				$("#app.active").remove();
				$(".big-title-caption").remove();	
			} , 250 );
		} else if( $('.load-project-thumb-with-title').length > 0 ){
			setTimeout( function(){
				$('#hero-image-wrapper').find('video').each(function() {
					$(this).get(0).play();
				});
				$("#app.active").remove();
				$(".big-title-caption").remove();	
			} , 250 );
		} else {
			$('#hero-image-wrapper').find('video').each(function() {
				$(this).get(0).play();
			});
		}
		
		setTimeout( function(){	
			$('header').removeClass('white-header');
			$('body').removeClass("load-project-page").removeClass("load-project-thumb").removeClass("load-next-project").removeClass("load-next-page");
			setTimeout( function(){	
				$('body').removeClass("load-project-thumb-with-title").removeClass("show-loader");
			} , 300 );
			
		} , 500 );
		
	
	}// End Lazy Load		



/*--------------------------------------------------
Function Showcase Slider
---------------------------------------------------*/
	
	function Showcase() {
		
	
		if( $('#showcase-slider-holder').length > 0 ){
			
			$("footer").addClass("showcase-footer")
								
			var interleaveOffset = 0.5;
			
			var swiperOptions = {
				direction: "horizontal",
				loop: true,
				grabCursor: false,
				resistance : true,
				resistanceRatio:0.5,
				slidesPerView: 1,
				allowTouchMove:true,  
				speed:1000,
				autoplay: false,
				mousewheel: true,
				parallax:true,
				navigation: {
					nextEl: '.swiper-next',
					prevEl: '.swiper-prev',
				},
				pagination: {
				  el: '.swiper-pagination',
						clickable: true,
						renderBullet: function (index, className) {
					  return '<span class="' + className + '">'+'<div class="parallax-wrap">' + '<div class="parallax-element">' + '<svg class="fp-arc-loader" width="20" height="20" viewBox="0 0 20 20">'+
									'<circle class="path" cx="10" cy="10" r="5.5" fill="none" transform="rotate(-90 10 10)" stroke="#FFF"'+
									'stroke-opacity="1" stroke-width="2px"></circle>'+
							'<circle cx="10" cy="10" r="3" fill="#FFF"></circle>'+
									'</svg></div></div></span>';
					},
			
				},						
				on: {
					progress: function() {
						var swiper = this;
						for (var i = 0; i < swiper.slides.length; i++) {
							var slideProgress = swiper.slides[i].progress;
							var innerOffset = swiper.width * interleaveOffset;
							var innerTranslate = slideProgress * innerOffset;
							swiper.slides[i].querySelector(".img-mask").style.transform = "translate3d(" + innerTranslate + "px,0, 0)";
						}
					  
					},
					touchStart: function() {
						var swiper = this;
						for (var i = 0; i < swiper.slides.length; i++) {
							swiper.slides[i].style.transition = "";
						}
					},
					setTransition: function(speed) {
						var swiper = this;
						for (var i = 0; i < swiper.slides.length; i++) {
							swiper.slides[i].style.transition = speed + "ms";
							swiper.slides[i].querySelector(".img-mask").style.transition = speed + "ms";
						}   
				 	},
					init: function () {						
						$('.swiper-slide-active').find('video').each(function() {
							$(this).get(0).play();
						});
						
					},
					slideChangeTransitionStart: function () {
						
						$('.swiper-slide-active').find('video').each(function() {
							$(this).get(0).play();
						}); 				
						
					},				
					slideChangeTransitionEnd: function () {	
						
						$('.swiper-slide-prev').find('video').each(function() {
							$(this).get(0).pause();
						});
						
						$('.swiper-slide-next').find('video').each(function() {
							$(this).get(0).pause();
						});
						
					},
  				},
			};
							
			var showcaseSwiper = new Swiper("#showcase-slider", swiperOptions);			
			
			
			
			if ($(window).width() >= 1024) {
			
				$('#showcase-slider-holder .stroked .move-title').on('mousedown', function(event) {
					return false;
				});
				
				$('#showcase-slider-holder.thumb-no-ajax a').on('mousedown', function(event) {
					return false;
				});					
				
				$('#showcase-slider-holder').on('mousedown touchstart', function() {	
					TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					$("body" ).addClass("scale-drag");
				});
					
				$('#showcase-slider-holder').on('mouseup touchend', function() {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
				
				$('body').on('mouseup touchend', function() {				
					$('body').removeClass('scale-drag');					
				});
				
				$("#showcase-slider-holder .stroked .move-title").mouseenter(function(e) {	
					var $this = $(this);		
					TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1.2, borderColor:'#fff', backgroundColor:'#fff'});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
					$( "#ball" ).append( '<p class="first">' + $this.data("firstline") + '</p>' + '<p>' + $this.data("secondline") + '</p>' );
				});
								
				$("#showcase-slider-holder .stroked .move-title").mouseleave(function(e) {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
					$('#ball p').remove();
				});	
			
			}
		}	
		
			
	}//End Showcase Slider
	
	
	
/*--------------------------------------------------
Function Showcase Carousel
---------------------------------------------------*/
	
	function ShowcaseCarousel() {
		
	
		if( $('#showcase-carousel-holder').length > 0 ){	
								
			$("footer").addClass("showcase-footer")
			
			var showcaseSwiper = new Swiper('#showcase-slider', {
				direction: "horizontal",
				loop: true,
				grabCursor: false,
				resistance : true,
				resistanceRatio:0.5,
				slidesPerView: 'auto',
				allowTouchMove:true,  
				speed:1000,
				autoplay: false,
				mousewheel: true,
				centeredSlides: true,
				spaceBetween: 0,
				navigation: {
					nextEl: '.swiper-next',
					prevEl: '.swiper-prev',
				},
				pagination: {
				  el: '.swiper-pagination',
						clickable: true,
						renderBullet: function (index, className) {
					  return '<span class="' + className + '">'+'<div class="parallax-wrap">' + '<div class="parallax-element">' + '<svg class="fp-arc-loader" width="20" height="20" viewBox="0 0 20 20">'+
									'<circle class="path" cx="10" cy="10" r="5.5" fill="none" transform="rotate(-90 10 10)" stroke="#FFF"'+
									'stroke-opacity="1" stroke-width="2px"></circle>'+
							'<circle cx="10" cy="10" r="3" fill="#FFF"></circle>'+
									'</svg></div></div></span>';
					},
			
				},						
				on: {
					
					init: function () {						
						$('.swiper-slide-active').find('video').each(function() {
							$(this).get(0).play();
						});
					},				
					slideNextTransitionStart: function () {	
						
						var tl = new TimelineLite();
						
						$('.swiper-pagination-bullet-active').prev().find('.counter').each(function(index, element) {
							tl.to(element, 0.3, {scale:1, y:-20, opacity:0, ease:Power2.easeIn}, index * 0.01)
						});
						
						$('.swiper-pagination-bullet-active').find('.counter').each(function(index, element) {
							tl.to(element, 0.4, {scale:1, y:0, opacity:1, scale:1, delay:0.3, ease:Power2.easeOut}, index * 0.01)
						});
						
						$('.swiper-pagination-bullet-active').next().find('.counter').each(function(index, element) {
							tl.to(element, 0.3, {scale:1, y:20, opacity:0, ease:Power2.easeIn}, index * 0.01)
						});						
						
					},
					slidePrevTransitionStart: function () {	
						
						var tl = new TimelineLite();
						
						$('.swiper-pagination-bullet-active').prev().find('.counter').each(function(index, element) {
							tl.to(element, 0.3, {scale:1, y:-20, opacity:0, delay:0.1,  ease:Power2.easeIn}, index * 0.01)
						});
						
						$('.swiper-pagination-bullet-active').find('.counter').each(function(index, element) {
							tl.to(element, 0.4, {scale:1, y:0, opacity:1, scale:1, delay:0.45, ease:Power2.easeOut}, index * 0.01)
						});
						
						$('.swiper-pagination-bullet-active').next().find('.counter').each(function(index, element) {
							tl.to(element, 0.3, {scale:1, y:20, opacity:0, delay:0.1,  ease:Power2.easeIn}, index * 0.01)
						});					
						
					},
					slideChangeTransitionStart: function () {
						
						$('.swiper-button-white').addClass('disable-click');
						
						$('.swiper-slide-active').find('video').each(function() {
							$(this).get(0).play();
						}); 					
						
					},				
					slideChangeTransitionEnd: function () {	
						
						$('.swiper-button-white').removeClass('disable-click');
						
						$('.swiper-slide-prev').find('video').each(function() {
							$(this).get(0).pause();
						});
						
						$('.swiper-slide-next').find('video').each(function() {
							$(this).get(0).pause();
						});
						
					}
  				},
			});
			
			
			
			if ($(window).width() >= 1024) {
			
				$('#showcase-carousel-holder .stroked .move-title').on('mousedown', function(event) {
					return false;
				});
				
				$('#showcase-carousel-holder.thumb-no-ajax a .move-title').on('mousedown', function(event) {
					return false;
				});		
				
				$('#showcase-carousel-holder').on('mousedown touchstart', function() {	
					TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					$("body" ).addClass("scale-drag");
				});
					
				$('#showcase-carousel-holder').on('mouseup touchend', function() {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
				
				$('body').on('mouseup touchend', function() {				
					$('body').removeClass('scale-drag');					
				});
				
				$("#showcase-carousel-holder .stroked .move-title").mouseenter(function(e) {	
					var $this = $(this);		
					TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1.2, borderColor:'#fff', backgroundColor:'#fff'});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
					$( "#ball" ).append( '<p class="first">' + $this.data("firstline") + '</p>' + '<p>' + $this.data("secondline") + '</p>' );
				});
								
				$("#showcase-carousel-holder .stroked .move-title").mouseleave(function(e) {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999', backgroundColor:'transparent'});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
					$('#ball p').remove();
				});	
				
			
			}
			
			
		}	
		
			
	}//End Showcase Carousel
	
	


/*--------------------------------------------------
Function Portfolio
---------------------------------------------------*/	
		
	function Portfolio() {	
	
			
		if( $('.portfolio-wrap').length > 0 ){			
			
			
			if ($("body").hasClass("smooth-scroll")) {
				var elem = document.querySelector("#content-scroll");
				var scrollbar = Scrollbar.init(elem,
				{
					renderByPixels: true,
					damping:0.05
				});
			}
			
			var $container = $('.portfolio');
		
			$container.isotope({
			  layoutMode: 'packery',
			  itemSelector: '.item',
			  gutter:0,
			  transitionDuration: "0.5s"
			});
			
			$('#filters a').on('click', function() {
				$('#filters a').removeClass('active');
				$(this).addClass('active');
				$('.item').addClass('item-margins');
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, function( $changedItems, instance ) {
				  instance.$allAtoms.filter('.isotope-hidden').removeClass('is-filtered');
				  instance.$filteredAtoms.addClass('is-filtered');
				});		
				return false;
			});
			
			$("#all").trigger('click');
				
			$('.item').each(function() {
				var image = $(this).find('.item-image').data('src');	
				$(this).find('.item-image').css({'background-image': 'url(' + image + ')'});
			});
			
			
			$(".item-image").mouseenter(function(e) {	
				TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1, borderColor:'#fff'});
				TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
				$( "#ball" ).addClass("with-icon").append( '<i class="fa fa-plus"></i>' );
				$(this).parent().find('video').each(function() {
					$(this).get(0).play();
				});
			});
							
			$(".item-image").mouseleave(function(e) {
				TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999'});
				TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
				$("#ball").removeClass("with-icon");
				$('#ball i').remove();
				$(this).parent().find('video').each(function() {
					$(this).get(0).pause();
				});
			});			
			
			
			//Show Filters On overlay
			$('#show-filters, #close-filters').on('click', function() {			
				$('#filters-overlay').toggleClass('active');
				var navtitleheight = $(".hero-title").height()
				var navsubtitleheight = $(".hero-subtitle").height()
				
				setTimeout( function(){			
					if ($('#filters-overlay').hasClass("active")) {
						
						TweenMax.to($(".item-parallax"), 0.6, {force3D:true, scale:0.9, opacity:0.3, delay:1.1, ease:Power2.easeInOut});					
						TweenMax.to($(".active .item-caption"), 0.3, {opacity:0, ease:Power2.easeOut});
						TweenMax.to($("#show-filters, #counter-wrap"), 0.3, {opacity:0, delay:0, ease:Power2.easeOut});
						TweenMax.to($("#show-filters, #counter-wrap"), 0, {visibility:'hidden', delay:0.35, ease:Power2.easeOut}); 
						
						//Fade In Navigation Lists
						TweenMax.set($(".filters-info"), {y:30, opacity:0});
						TweenMax.to($(".filters-info"), 0.4, {force3D:true, y:0, opacity:1, delay:0.7, ease:Power2.easeOut});
						var tlMenu = new TimelineLite();
						tlMenu.set($(".filters-timeline"), {y:60, opacity:0});
						$(".filters-timeline").each(function(index, element) {
							tlMenu.to(element, 0.5, {y:0, opacity:1, delay:1.2, ease:Power3.easeOut}, index * 0.1)
						});
						
						var heroheight = $("#hero").height();			
						if ($("body").hasClass("smooth-scroll")) {
							TweenLite.to(scrollbar, 1.5, {scrollTop:heroheight, ease:Power4.easeInOut});
						} else {
							$("html,body").animate({scrollTop: heroheight}, 800);
						}
							
					} else {					
						
						
						TweenMax.to($(".item-parallax"), 0.6, {force3D:true, scale: 1, opacity:1, delay:0.3, ease:Power2.easeInOut});					
						TweenMax.to($(".active .item-caption"), 0.5, {opacity:1, delay:0.5, ease:Power2.easeOut});
						TweenMax.set($("#show-filters, #counter-wrap"), {visibility:'visible', opacity:0});
						TweenMax.to($("#show-filters, #counter-wrap"), 0.3, {opacity:1, delay:0.7, ease:Power2.easeOut});
						
						//Fade Out Navigation Lists
						TweenMax.to($(".filters-info"), 0.2, {force3D:true, y:-30, opacity:0, delay:0, ease:Power1.easeIn});					
						var tlMenu = new TimelineLite();
						$(".filters-timeline, .jssocials-share").each(function(index, element) {
							tlMenu.to(element, 0.25, {opacity:0, y:-60, delay:0.1, ease:Power1.easeIn }, index * 0.1)
						});	
						TweenMax.to('#ball', 0.1,{borderWidth: '4px', scale:0.5,});
						$("#ball").removeClass("close-icon");
						$('#ball i').remove();
						
					}							
				} , 20 );
			});
			
			
			$("#close-filters").mouseenter(function(e) {	
				TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
				TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
				$( "#ball" ).addClass("close-icon").append( '<i class="fa fa-times"></i>' );
			});
				
			$("#close-filters").mouseleave(function(e) {
				TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
				TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
				$("#ball").removeClass("close-icon");
				$('#ball i').remove();
			});
			
			
			
			
			setTimeout( function(){
				var controller = new ScrollMagic.Controller();
				$('.portfolio').each(function(){
					var $this = $(this);
					var $elheight = window.innerHeight*0.7;
					var $thisHeight = $(this).outerHeight() - $elheight;
					
					var scene = new ScrollMagic.Scene({triggerElement:$this[0],duration: $thisHeight})
						.addTo(controller)
						
					
					scene.triggerHook(0.3)
					
					scene.on('enter', function(){				
						TweenMax.to($("#show-filters"), 0.3, {opacity:1, delay:0, ease:Power2.easeOut});
						$("#show-filters").addClass('enabled')
					});
					
					scene.on('leave', function(){				
						TweenMax.to($("#show-filters"), 0.15, {opacity:0, delay:0, ease:Power2.easeOut});
						$("#show-filters").removeClass('enabled')
					});
					
					if ($("body").hasClass("smooth-scroll")) {
						scrollbar.addListener(() => {
							scene.refresh()
						});
					}
				})
			} , 2000 );
			
			TweenMax.to($("#show-filters"), 0, {opacity:0, delay:0.05, ease:Power2.easeOut});
			
		}
	
	}//End Portfolio
	
	
	
/*--------------------------------------------------
Function Blog
---------------------------------------------------*/
	
	function Blog() {
		
		if ($("body").hasClass("smooth-scroll")) {
			var elem = document.querySelector("#content-scroll");
			var scrollbar = Scrollbar.init(elem,
			{
				renderByPixels: true,
				damping:0.05
			});
		}
		var controller = new ScrollMagic.Controller();
		
		$('.article-wrap').each(function(){
			var $this = $(this);
			var $thisHeight = $(this).height();
			
			var scene = new ScrollMagic.Scene({triggerElement:$this[0],duration: $thisHeight})
				.addTo(controller);
			
			scene.triggerHook(1)
			
			scene.on('enter', function(){				
				$this.addClass('active');
			});
			
			if ($("body").hasClass("smooth-scroll")) {
				scrollbar.addListener(() => {
					scene.refresh()
				});
			}
		})

		// var scene = new ScrollMagic.Scene({
		// 	triggerElement:'.post-thumbnail',
		// 	0.7,

		// })
		
		
		$(".article-img").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.3,{borderWidth: '2px', scale: 1, borderColor:'#fff'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).addClass("with-icon").append( '<i class="fa fa-plus"></i>' );
			$(this).parent().find('video').each(function() {
				$(this).get(0).play();
			});
		});
						
		$(".article-img").mouseleave(function(e) {
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999'});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$("#ball").removeClass("with-icon");
			$('#ball i').remove();
			$(this).parent().find('video').each(function() {
				$(this).get(0).pause();
			});
		});	
		
		
		$('#open-sidebar, #open-sidebar-nav, #black-fade').on('click', function() {
			$('#open-sidebar').toggleClass('open');
			$('#sidebar').toggleClass('open');
			$('#black-fade').toggleClass('fade-in');
		});
		
		$("#black-fade").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).addClass("close-icon").append( '<i class="fa fa-times"></i>' );
		});
					
		$("#black-fade").mouseleave(function(e) {
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$("#ball").removeClass("close-icon");
			$('#ball i').remove();
		});
		
		$("#black-fade").on('click', function() {	
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$("#ball").removeClass("close-icon");
			$('#ball i').remove();
		});
		
		$( "select" ).wrap( "<div class='select hide-ball'></div>" );
		
		
		
	
	}//End Blog		

	

/*--------------------------------------------------
Function Shortcodes
---------------------------------------------------*/
	
	function Shortcodes() {

		// Accordion	  
		
		$('dd.accordion-content').slideUp(1).addClass('hide');		
		$('dl.accordion').on('click', 'dt', function() {
			$(this).addClass('accordion-active').next().slideDown(200).siblings('dd.accordion-content').slideUp(200).prev().removeClass('accordion-active');						
		});	
		$('dl.accordion').on('click', 'dt.accordion-active', function() {
			$(this).removeClass('accordion-active').siblings('dd.accordion-content').slideUp(200);
		});
		
		$(".flexnav").flexNav({ 'animationSpeed' : 250 });
		
		// Project Share	
		if( (typeof ClapatlebothemeThemeOptions != 'undefined') && (ClapatlebothemeThemeOptions.share_social_network_list !== "") ){
			
			let arrShares = ClapatlebothemeThemeOptions.share_social_network_list.split(",").map((item)=>item.trim());
			
			$("#share").jsSocials({
				showLabel: false,
				showCount: false,
				shares: arrShares
			});
		
			$('.jssocials-share').wrap( "<div class='parallax-wrap'><div class='parallax-element'></div></div>" );
		}
	
	}//End Shortcodes
	

	
	
/*--------------------------------------------------
Function Sliders
---------------------------------------------------*/
	
	function Sliders() {
		
		setTimeout( function(){
			
			if( $('.content-slider').length > 0 ){
			
				var interleaveOffset = 0.4;
				
				var ContentSliderOptions = {				
					direction: 'horizontal',
					loop: true,
					slidesPerView: 1,
					paginationClickable: true,
					spaceBetween: 0,
					mousewheelControl: false,
					simulateTouch: false,
					speed: 1000,
					navigation: {
						nextEl: '.slider-button-next',
						prevEl: '.slider-button-prev',
					},
					on: {
						progress: function() {
							var swiper = this;
							for (var i = 0; i < swiper.slides.length; i++) {
								var slideProgress = swiper.slides[i].progress;
								var innerOffset = swiper.height * interleaveOffset;
								var innerTranslate = slideProgress * innerOffset;
								swiper.slides[i].querySelector("img").style.transform = "translate3d(" + innerTranslate + "px,0, 0)";
							}
						  
						},
						touchStart: function() {
							var swiper = this;
							for (var i = 0; i < swiper.slides.length; i++) {
								swiper.slides[i].style.transition = "";
							}
							console.log('qmldkfqs')
						},
						setTransition: function(speed) {
							var swiper = this;
							for (var i = 0; i < swiper.slides.length; i++) {
								swiper.slides[i].style.transition = speed + "ms";
								swiper.slides[i].querySelector("img").style.transition = speed + "ms";
							}   
						}
					}
			
				}
				
				var swiper = new Swiper(".content-slider", ContentSliderOptions);
				
				$(".slider-button-prev").mouseenter(function(e) {	
					TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
					$( "#ball" ).addClass("with-icon").append( '<i class="fa fa-chevron-left"></i>' );
				});
					
				$(".slider-button-prev").mouseleave(function(e) {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
					$("#ball").removeClass("with-icon");
					$('#ball i').remove();
				});
				
				$(".slider-button-next").mouseenter(function(e) {	
					TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
					$( "#ball" ).addClass("with-icon").append( '<i class="fa fa-chevron-right"></i>' );
				});
					
				$(".slider-button-next").mouseleave(function(e) {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
					$("#ball").removeClass("with-icon");
					$('#ball i').remove();
				});
				
			}
			
			
			if( $('.content-carousel').length > 0 ){
			
				var ContentCarouselOptions = {			
					direction: 'horizontal',
					simulateTouch: true,
					slidesPerView: 'auto',
					spaceBetween: 0,
					mousewheelControl: false,
					speed: 700,			
				}
				
				var swiper = new Swiper(".content-carousel", ContentCarouselOptions);
				
				$('.content-carousel').on('mousedown touchstart', function(event) {
					TweenMax.to('.swiper-slide', 0.7,{scale: 0.9});
					$("body").addClass("drag-cursor");
				});
				
				$('body').on('mouseup touchend', function(event) {
					TweenMax.to('.swiper-slide', 0.7,{scale:1});
					$("body").removeClass("drag-cursor");
				});
				
				$('.content-carousel').on('mouseenter mousemove', function() {	
					//TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					$("body" ).addClass("scale-drag");
				});
					
				$('.content-carousel').on('mouseleave', function() {
					//TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
				
				$("body").mouseleave(function(e) {
					TweenMax.to('.swiper-slide', 0.7,{scale:1});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
			
			}
			
			
			if( $('.content-looped-carousel').length > 0 ){
			
				var ContentLoopedCarouselOptions = {			
					direction: 'horizontal',
					simulateTouch: true,
					slidesPerView: 'auto',
					spaceBetween: 150,
					centeredSlides: true,
					loop:true,
					mousewheelControl: false,
					speed: 700,			
				}
				
				var swiper = new Swiper(".content-looped-carousel", ContentLoopedCarouselOptions);
				
				$('.content-looped-carousel').on('mousedown touchstart', function(event) {
					TweenMax.to('.swiper-slide img', 0.7,{scale: 0.9});
					$("body").addClass("drag-cursor");
				});
				
				$('body').on('mouseup touchend', function(event) {
					TweenMax.to('.swiper-slide img', 0.7,{scale:1});
					$("body").removeClass("drag-cursor");
				});
				
				$('.content-looped-carousel').on('mouseenter mousemove', function() {	
					TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
					$("body" ).addClass("scale-drag");
				});
					
				$('.content-looped-carousel').on('mouseleave', function() {
					TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
				
				$("body").mouseleave(function(e) {
					TweenMax.to('.swiper-slide img', 0.7,{scale:1});
					$("body").removeClass("scale-drag").removeClass("drag-cursor");
				});
			
			}
		
		} , 400 );
		
	}//End Sliders	
	
	
/*--------------------------------------------------
Function Justified Grid
---------------------------------------------------*/	
	
	function JustifiedGrid() {
		
		if( $('#justified-grid').length > 0 ){
		
			$('#justified-grid').justifiedGallery({
				rowHeight : 300,
				lastRow : 'nojustify',
				margins : 10
			});
		
		}
		
	}//End Justified Grid	
	
	
/*--------------------------------------------------
Function Lightbox
---------------------------------------------------*/
	
	function Lightbox() {
		
		$('.image-link').magnificPopup({
		  	type: 'image',
			mainClass: 'mfp-with-zoom',	
			gallery: {
			  enabled:true
			},		
			zoom: {
				enabled: true, 			
				duration: 300, 
				easing: 'ease-in-out', 
				opener: function(openerElement) {
					return openerElement.is('img') ? openerElement : openerElement.find('img');
				}
			}			
		});
		
		$(".image-link").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 2, left: 2});
			$( "#ball" ).addClass("with-icon").append( '<i class="fa fa-plus"></i>' );
		});
			
		$(".image-link").mouseleave(function(e) {
			TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
			$("#ball").removeClass("with-icon");
			$('#ball i').remove();
		});
			
	}//End Lightbox	
	
	
/*--------------------------------------------------
Function Page PlayVideo
---------------------------------------------------*/	


	function PlayVideo() {
	
		if( $('.video-wrapper').length > 0 ){
			
			
			$(".video-wrapper").mouseenter(function(e) {
				if ($(this).hasClass("play")) {
					$( "#ball" ).addClass("pause-movie")		
				}
				TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
				$( "#ball" ).addClass("over-movie").append( '<i class="fa fa-play"></i><i class="fa fa-pause"></i>' );
			});
			
			$(".video-wrapper").mouseleave(function(e) {
				TweenMax.to('#ball', 0.2,{borderWidth: '4px', scale:0.5, borderColor:'#999999',});
				$("#ball").removeClass("over-movie").removeClass("pause-movie");
				$('#ball i').remove();
			});
			
			$(".video-wrapper .control").mouseenter(function(e) {	
				TweenMax.to('#ball', 0.2,{borderWidth: '20px', scale: 0});
			});
			
			$(".video-wrapper .control").mouseleave(function(e) {
				TweenMax.to('#ball', 0.2,{borderWidth: '2px', scale: 1, borderColor:'#fff',});
			});
			
			var videocenter = ($(window).height() - $('.video-cover').height()) / 2
					
			////////////////////////////////////////////////////// REFACTOR //////////////////////////////////////////////////////
			// plays or pause the video function of its current state
			var playpause = function( videoObj ) {
				
				if( videoObj[0] != null ){
					if(videoObj[0].paused || videoObj[0].ended) {
						
						videoObj.parent().addClass('play');
						videoObj[0].play();
					}
					else {
						
						videoObj.parent().removeClass('play');
						videoObj[0].pause();
					}
				}
			};
			
			//Time format converter - 00:00
			var timeFormat = function(seconds){
				var m = Math.floor(seconds/60)<10 ? "0"+Math.floor(seconds/60) : Math.floor(seconds/60);
				var s = Math.floor(seconds-(m*60))<10 ? "0"+Math.floor(seconds-(m*60)) : Math.floor(seconds-(m*60));
				return m+":"+s;
			};
			
			// Events
			// click to video cover - will start the video
			$('.video-wrapper').on('click', function() {
				
				$('html,body').animate({scrollTop: $(this).offset().top - videocenter},390);		
				// hide the video cover in order to start playing
				$(this).find('.video-cover').addClass('hidden');
				
				$( "#ball" ).toggleClass("pause-movie");
				
				// pause first the other videos
				var current_wrapper = $(this);
				$('#main-page-content').find('.video-wrapper').each(function() {
					
					if( !current_wrapper.is( $(this) ) ){
						
						$(this).removeClass('play');
						$(this).find('video').each(function() {
							
							if( !$(this).get(0).paused && !$(this).get(0).ended ) {
								
								$(this).get(0).pause();
							}
						});
					}
					
				});
				
				// trigger the click for the inner video
				$(this).find('video').each(function() {

					playpause( $(this) );
				});

			});
			
			//fullscreen button clicked
			$('.btnFS').on('click', function( e ) {
					
				var parent_wrapper	= $(this).closest('.video-wrapper');
				var video_object 		= parent_wrapper.find('video');
					
				if($.isFunction(video_object[0].webkitEnterFullscreen)) {
					video_object[0].webkitEnterFullscreen();
				}	
				else if ($.isFunction(video_object[0].mozRequestFullScreen)) {
					video_object[0].mozRequestFullScreen();
				}
				else {
					alert('Your browsers doesn\'t support fullscreen');
				}
				
				// prevent video wrapper div responding the event
				e.stopPropagation();
				
			});
				
			//sound button clicked
			$('.sound').on('click', function( e ) {
					
				var parent_wrapper	= $(this).closest('.video-wrapper');
				var video_object 		= parent_wrapper.find('video');
					
				video_object[0].muted = !video_object[0].muted;
				$(this).toggleClass('muted');
				if(video_object[0].muted) {
					parent_wrapper.find('.volumeBar').css('width',0);
				}
				else{
					parent_wrapper.find('.volumeBar').css('width', video_object[0].volume*100+'%');
				}
				
				// prevent video wrapper div responding the event
				e.stopPropagation();
			});
			
			//progress bar (video timebar) clicked
			$('.progress').on('click', function( e ) {
				
				var parent_wrapper	= $(this).closest('.video-wrapper');
				var video_object 		= parent_wrapper.find('video');
									
				// calculate click position
				// and update video current time
				// as well as progress bar
				var maxduration 	= video_object[0].duration;
				var position 			= e.pageX - $(this).offset().left;
				var percentage 	= 100 * position / $(this).width();
				if(percentage > 100) {
					
					percentage = 100;
				}
				if(percentage < 0) {
					
					percentage = 0;
				}
				$('.timeBar').css('width', percentage+'%');	
				video_object[0].currentTime = maxduration * percentage / 100;
				
				// prevent video wrapper div responding the event
				e.stopPropagation();
			});
			
			$('#main-page-content').find('video').each(function() {
			
				var video = $(this);
				var video_wrapper = $(this).parent();
				
				//remove default control when JS loaded
				video[0].removeAttribute("controls");
				video_wrapper.find('.control').fadeIn(500);
				video_wrapper.find('.caption').fadeIn(500);
			 
				//before everything get started and we have the info about the video such as duration
				video.on('loadedmetadata', function() {
					
					var video_object = $(this);
					var parent_wrapper = $(this).parent();
					//set video properties
					parent_wrapper.find('.current').text(timeFormat(0));
					parent_wrapper.find('.duration').text(timeFormat(video[0].duration));
					
				});
				
				//display current video buffered progress
				video.on('progress', function() {
					
					var video_object 		= $(this);
					var parent_wrapper 	= $(this).parent();
					var maxduration 		= video_object [0].duration;
					
					if (maxduration > 0) {
					  for (var i = 0; i < video_object [0].buffered.length; i++) {
							if (video_object [0].buffered.start(video_object [0].buffered.length - 1 - i) <video_object [0].currentTime) {
								var perc = (video_object [0].buffered.end(video_object [0].buffered.length - 1 - i) / maxduration) * 100 + "%";
								parent_wrapper.find('.bufferBar').css('width',perc+'%');
								break;
							}
						}
					}
					
				});
				
				//display current video play time
				video.on('timeupdate', function() {
					
					var parent_wrapper 	= $(this).parent();
					var currentPos 			= $(this).get(0).currentTime;
					var maxduration 		= $(this).get(0).duration;
					var perc 					= 100 * currentPos / maxduration;
					parent_wrapper.find('.timeBar').css('width',perc+'%');	
					parent_wrapper.find('.current').text(timeFormat(currentPos));	
				});
				
				//video screen and play button clicked
				video.on('click', function() { 
					
					playpause( $(this) ); 
				});
				
				//video canplay event
				video.on('canplay', function() {
					
					var parent_wrapper = $(this).parent();
					parent_wrapper.find('.loading').fadeOut(100); //?
				});
				
				//video canplaythrough event
				//solve Chrome cache issue
				var completeloaded = false;
				video.on('canplaythrough', function() {
					
					completeloaded = true;
				});
				
				//video ended event
				video.on('ended', function() {		
					
					$(this).get(0).pause();
					$(this).parent().removeClass("play");
					$( "#ball" ).toggleClass("pause-movie");
				});
			
				//video seeking event
				video.on('seeking', function() {
					
					//if video fully loaded, ignore loading screen
					if(!completeloaded) { 
						var parent_wrapper = $(this).parent();
						parent_wrapper.find('.loading').fadeIn(200); //?
					}	
				});
				
				//video seeked event
				video.on('seeked', function() { });
				
				//video waiting for more data event
				video.on('waiting', function() {
					
					var parent_wrapper = $(this).parent();
					parent_wrapper.find('.loading').fadeIn(200); //?
				});
				
			});
			
		}
		
	}// End PlayVideo					

/*--------------------------------------------------
Function Split titles
---------------------------------------------------*/	
	function SplittingTitles(){
		var lines = jQuery('h1:not(.hero-move-title), h3, h4, h5');
		var figures = jQuery('figure');

		lines.each(function(){
			var item = jQuery(this);
			var h = item.html().split('<br>');
			var w = h.map(function(item){
				return '<span class="scroll-horizontally d-block">' + item + '</span>';
			})

			item.html(w);
		})

		figures.each(function(){
			var item = jQuery(this);
			item.append('<span class="figure-mask"></span>')
		})


		
		var controller = new ScrollMagic.Controller();
		var timeline = new TimelineMax();
		var timelineFigure = new TimelineMax(); 

		// Animate titles
		var spanTop = 'h1:not(.hero-move-title) span:nth-child(odd), h2 span:nth-child(even)';
		var spanBottom = 'h1:not(.hero-move-title) span:nth-child(even), h2 span:nth-child(odd)';
		var spanFigure = '.figure-mask';

		var tweenFirst = TweenMax.to(spanTop, 0.7, {
			x: 30,
		}); 
		
			var tweenSecond = TweenMax.to(spanBottom, 0.5, {
				x: 40,
			});
		


		var figureImg = '.wp-block-image:not(.no-zoom) figure img';
		var tweenFigure = TweenMax.to(figureImg, 0.1, {
			scale:1.2,
			ease:Linear.easeNone
		})

		

		var scene = new ScrollMagic.Scene({
			triggerElement: "#scene",
			duration: 1000,
			
		});

		var figureScene = new ScrollMagic.Scene({
			triggerElement: ".figure-mask",
			duration: 300,
    		duration: '100%' 
		});

		
		

		timelineFigure.add(tweenFigure)
		figureScene.setClassToggle('.display')
		figureScene.setTween(timelineFigure)
		//figureScene.addIndicators({name: "pin scene", colorEnd: "#FF0000"});
		figureScene.addTo(controller)

		timeline.add(tweenFirst).add(tweenSecond);
		scene.setTween(timeline)
		scene.addTo(controller)

		// Scroll direction
		scene.on('enter',function(event){
			//var direction = event.scrollDirection;
			
	    });
		//.addIndicators({name: "titre (duration: 300)"}) // add indicators (requires plugin)

		// Animate post titles
		var postTitleTween = TweenMax.from('.post-thumbnail', 0.7, {transform: "translateY(-80px)"})
		var scene = new ScrollMagic.Scene({triggerElement: ".post-image", offset:-200, duration: 600})
		// animate color and top border in relation to scroll position
		.setTween(postTitleTween) // the tween durtion can be omitted and defaults to 1
		.addTo(controller);
	
	}
	
	
/*--------------------------------------------------
Function Load Via Ajax
---------------------------------------------------*/	
		
	function LoadViaAjax() {		
		
		FirstLoad();
		ScrollEffects();		
		Showcase();
		ShowcaseCarousel();
		LazyLoad();				
		Portfolio();
		Blog();
		FitThumbScreen();	
		Shortcodes();
		Sliders();
		JustifiedGrid();
		Lightbox();
		PlayVideo();
		InitContactMap();		
	
	}//End Load Via Ajax
	
/*--------------------------------------------------
Function AjaxLoad
---------------------------------------------------*/	
		function AjaxLoad() {		
		
		var mouse = { x: 0, y: 0 };
		var pos = { x: 0, y: 0 };
		var ratio = 0.65;			
		var active = false;			
		var ball = document.getElementById("ball");
		var ballloader = document.getElementById("ball-loader");
		var offsetX = 40;
		
		
		TweenLite.set(ball, { xPercent: -50, yPercent: -50, scale:0.5, borderWidth: '4px' });
		
		document.addEventListener("mousemove", mouseMove);
		
		function mouseMove(e) {
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			mouse.x = e.pageX;
			mouse.y = e.pageY - scrollTop;
		}
		
		TweenLite.ticker.addEventListener("tick", updatePosition);
		
		function updatePosition() {
			if (!active) {
				pos.x += (mouse.x - pos.x) * ratio;
				pos.y += (mouse.y - pos.y) * ratio;
		
				TweenLite.to(ball, 0.4, { x: pos.x, y: pos.y });
			}
		}
		
		$(".sticky.left").mouseenter(function(e) {
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.left - offsetX;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$(".sticky.right").mouseenter(function(e) {
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.right + offsetX;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$("#main .sticky.left").mouseenter(function(e) {		  
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.left - offsetX + 10;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$("#main .sticky.right").mouseenter(function(e) {		  
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.right + offsetX - 10;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$(".sticky").mouseleave(function(e) {			
			TweenLite.to(ball, 0.2, { scale:0.5, borderWidth: '4px', borderColor:'#999999', opacity:1 });
			TweenMax.ticker.addEventListener("tick", updatePosition);		  
		})		
		
		$(".parallax-wrap").mouseenter(function(e) {
			TweenMax.to(this, 0.3, { scale: 2 });
			TweenMax.to(ball, 0.3, { scale: 0.9, borderWidth: '2px',opacity:1 });
			TweenMax.to($( this ).children(), 0.3,{scale:0.5});
			active = true;
		});
		
		$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
			TweenMax.to(ball, 0.3, { scale: 0.7, borderWidth: '6px', opacity:0.6, borderColor:'#999' });
		});
		
		$(".parallax-wrap.bigger").mouseenter(function(e) {
			TweenMax.to(ball, 0.3, { scale: 1.35, borderWidth: '2px', opacity:1 });
		});
		
		$(".parallax-wrap").mouseleave(function(e) {
			TweenMax.to(this, 0.3, { scale: 1 });
			TweenMax.to(ball, 0.3, { scale: 0.5, borderWidth: '4px', opacity:1, borderColor:'#999999'  });
			TweenMax.to($( this ).children(), 0.3,{scale:1, x: 0, y:0});
			active = false;
		});		
		
		if ($('#magic-cursor').hasClass("light-content")) {
			$(".sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$("#main .sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$(".parallax-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'  });
			});
			$(".parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#fff'  });
			});
			$(".white-section .parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#000'  });
			});
			$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'});
			});
		} else {
			$(".sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$("#main .sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$(".parallax-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999' });
			});
			$(".parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#000'  });
			});

			//d
			$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'});
			});
		}
		
		$(".parallax-wrap").mousemove(function(e) {
			parallaxCursor(e, this, 2);
			callParallax(e, this);
		});
		
		function callParallax(e, parent) {
			parallaxIt(e, parent, parent.querySelector(".parallax-element"), 20);
		}
		
		function parallaxIt(e, parent, target, movement) {
			var boundingRect = parent.getBoundingClientRect();
			var relX = e.pageX - boundingRect.left;
			var relY = e.pageY - boundingRect.top;
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			
			TweenMax.to(target, 0.3, {
				x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
				y: (relY - boundingRect.height / 2 - scrollTop) / boundingRect.height * movement,
				ease: Power2.easeOut
			});
		}
		
		function parallaxCursor(e, parent, movement) {
			var rect = parent.getBoundingClientRect();
			var relX = e.pageX - rect.left;
			var relY = e.pageY - rect.top;
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			pos.x = rect.left + rect.width / 2 + (relX - rect.width / 2) / movement;
			pos.y = rect.top + rect.height / 2  + (relY - rect.height / 2 - scrollTop)  / movement ;
			TweenMax.to(ball, 0.3, { x: pos.x, y: pos.y });
		}
		
		$(".hide-ball").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth: '1px', scale: 1, opacity:0});
		});			
		$(".hide-ball").mouseleave(function(e) {
			TweenMax.to('#ball', 0.3,{borderWidth: '4px', scale:0.5, opacity:1});
		});
		
		$(".link").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth:"0px",scale:1.5,backgroundColor:"rgba(153, 153, 153, 1)",opacity:0.15});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 4, left: 4});
		});			
		$(".link").mouseleave(function(e) {
			TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(153, 153, 153, 0)",opacity:1});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
		});
		
		
		
		
		
		jQuery(document).ready(function(){
			  var isAnimating = false,
				newLocation = '';
				firstLoad = false;
			  
			  //trigger smooth transition from the actual page to the new one 
			  $('main').on('click', '[data-type="page-transition"]', function(event){
				event.preventDefault();
				//detect which page has been selected
				var newPage = $(this).attr('href');
				//if the page is not already being animated - trigger animation
				if( !isAnimating ) changePage(newPage, true);
				firstLoad = true;
			  });
			
			  //detect the 'popstate' event - e.g. user clicking the back button
			  $(window).on('popstate', function() {
				if( firstLoad ) {
				  /*
				  Safari emits a popstate event on page load - check if firstLoad is true before animating
				  if it's false - the page has just been loaded
				  */
				  var newPage = location.href;

				  if( !isAnimating  &&  newLocation != newPage ) changePage(newPage, false);
				}
				firstLoad = true;
				});
			
				function changePage(url, bool) {
				isAnimating = true;
				// trigger page animation
				$('body').addClass('page-is-changing');
				$('.cd-cover-layer').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					loadNewContent(url, bool);
				  newLocation = url;
				  $('.cd-cover-layer').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
				});
				//if browser doesn't support CSS transitions
				if( !transitionsSupported() ) {
				  loadNewContent(url, bool);
				  newLocation = url;
				}
				}
			
				function loadNewContent(url, bool) {
					url = ('' == url) ? 'index.html' : url;
				
				var section = $('<div class="cd-main-content "></div>');
						
					
				section.load(url+' .cd-main-content > *', function(event){
				  // load new content and replace <main> content with the new one
				  
				  	$('main').html(section);
				  
				 	var clapat_title = event.match(/<title[^>]*>([^<]+)<\/title>/)[1];
					$('head title').html( clapat_title );
				  
					
					$('html, body').scrollTop(0);
				  
				  //if browser doesn't support CSS transitions - dont wait for the end of transitions
				  var delay = ( transitionsSupported() ) ? 30 : 0;
				  setTimeout(function(){
					//wait for the end of the transition on the loading bar before revealing the new content				
					$('body').removeClass('page-is-changing');
					$('.cd-cover-layer').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					  isAnimating = false;
					  $('.cd-cover-layer').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
					})
				
				LoadViaAjax();
				
				
				
				$(".sticky.left").mouseenter(function(e) {
					var rcBounds = $(this)[0].getBoundingClientRect();		  
					var positionX = rcBounds.left - offsetX;
					var positionY = rcBounds.top + rcBounds.height/2;		  
					TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
					TweenMax.ticker.removeEventListener("tick", updatePosition);
				})
				
				$(".sticky.right").mouseenter(function(e) {
					var rcBounds = $(this)[0].getBoundingClientRect();		  
					var positionX = rcBounds.right + offsetX;
					var positionY = rcBounds.top + rcBounds.height/2;		  
					TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
					TweenMax.ticker.removeEventListener("tick", updatePosition);
				})
				
				$("#main .sticky.left").mouseenter(function(e) {		  
					var rcBounds = $(this)[0].getBoundingClientRect();		  
					var positionX = rcBounds.left - offsetX + 10;
					var positionY = rcBounds.top + rcBounds.height/2;		  
					TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
					TweenMax.ticker.removeEventListener("tick", updatePosition);
				})
				
				$("#main .sticky.right").mouseenter(function(e) {		  
					var rcBounds = $(this)[0].getBoundingClientRect();		  
					var positionX = rcBounds.right + offsetX - 10;
					var positionY = rcBounds.top + rcBounds.height/2;		  
					TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
					TweenMax.ticker.removeEventListener("tick", updatePosition);
				})
				
				$(".sticky").mouseleave(function(e) {			
					TweenLite.to(ball, 0.2, { scale:0.5, borderWidth: '4px', borderColor:'#999999', opacity:1 });
					TweenMax.ticker.addEventListener("tick", updatePosition);		  
				})		
				
				$(".parallax-wrap").mouseenter(function(e) {
					TweenMax.to(this, 0.3, { scale: 2 });
					TweenMax.to(ball, 0.3, { scale: 0.9, borderWidth: '2px',opacity:1 });
					TweenMax.to($( this ).children(), 0.3,{scale:0.5});
					active = true;
				});
				
				$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
					TweenMax.to(ball, 0.3, { scale: 0.7, borderWidth: '6px', opacity:0.6, borderColor:'#999' });
				});
				
				$(".parallax-wrap.bigger").mouseenter(function(e) {
					TweenMax.to(ball, 0.3, { scale: 1.35, borderWidth: '2px', opacity:1 });
				});
				
				$(".parallax-wrap").mouseleave(function(e) {
					TweenMax.to(this, 0.3, { scale: 1 });
					TweenMax.to(ball, 0.3, { scale: 0.5, borderWidth: '4px', opacity:1, borderColor:'#999999'  });
					TweenMax.to($( this ).children(), 0.3,{scale:1, x: 0, y:0});
					active = false;
				});		
				
				if ($('#magic-cursor').hasClass("light-content")) {
					$(".sticky").mouseenter(function(e) {
					  TweenLite.to(ball, 0.5, { borderColor:'#999' });
					})
					$("#main .sticky").mouseenter(function(e) {
					  TweenLite.to(ball, 0.5, { borderColor:'#999' });
					})
					$(".parallax-wrap").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#999'  });
					});
					$(".parallax-wrap.bigger").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#fff'  });
					});
					$(".white-section .parallax-wrap.bigger").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#000'  });
					});
					$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#999'});
					});
				} else {
					$(".sticky").mouseenter(function(e) {
					  TweenLite.to(ball, 0.5, { borderColor:'#999' });
					})
					$("#main .sticky").mouseenter(function(e) {
					  TweenLite.to(ball, 0.5, { borderColor:'#999' });
					})
					$(".parallax-wrap").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#999' });
					});
					$(".parallax-wrap.bigger").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#000'  });
					});
					$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
						TweenMax.to(ball, 0.3, { borderColor:'#999'});
					});
				}
				
				$(".parallax-wrap").mousemove(function(e) {
					parallaxCursor(e, this, 2);
					callParallax(e, this);
				});
				
				function callParallax(e, parent) {
					parallaxIt(e, parent, parent.querySelector(".parallax-element"), 20);
				}
				
				function parallaxIt(e, parent, target, movement) {
					var boundingRect = parent.getBoundingClientRect();
					var relX = e.pageX - boundingRect.left;
					var relY = e.pageY - boundingRect.top;
					var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
					
					TweenMax.to(target, 0.3, {
						x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
						y: (relY - boundingRect.height / 2 - scrollTop) / boundingRect.height * movement,
						ease: Power2.easeOut
					});
				}
				
				function parallaxCursor(e, parent, movement) {
					var rect = parent.getBoundingClientRect();
					var relX = e.pageX - rect.left;
					var relY = e.pageY - rect.top;
					var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
					pos.x = rect.left + rect.width / 2 + (relX - rect.width / 2) / movement;
					pos.y = rect.top + rect.height / 2  + (relY - rect.height / 2 - scrollTop)  / movement ;
					TweenMax.to(ball, 0.3, { x: pos.x, y: pos.y });
				}
				
				$(".hide-ball").mouseenter(function(e) {	
					TweenMax.to('#ball', 0.2,{borderWidth: '1px', scale: 1, opacity:0});
				});			
				$(".hide-ball").mouseleave(function(e) {
					TweenMax.to('#ball', 0.3,{borderWidth: '4px', scale:0.5, opacity:1});
				});
				
				$(".link").mouseenter(function(e) {	
					TweenMax.to('#ball', 0.2,{borderWidth:"0px",scale:1.5,backgroundColor:"rgba(153, 153, 153, 1)",opacity:0.15});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 4, left: 4});
				});			
				$(".link").mouseleave(function(e) {
					TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(153, 153, 153, 0)",opacity:1});
					TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
				});
				
				
				
				
				if( !transitionsSupported() ) isAnimating = false;
				  }, delay);			  
				  if(url!=window.location && bool){
					window.history.pushState({path: url},'',url);
				  }
					});
			  }
			
			  function transitionsSupported() {
				return $('html').hasClass('csstransitions');
			  }
			});
			
		
	}// End Ajax Load	
	
/*--------------------------------------------------
Function Page Load No Ajax
---------------------------------------------------*/
	function PageLoadNoAjax() {
		
		var mouse = { x: 0, y: 0 };
		var pos = { x: 0, y: 0 };
		var ratio = 0.65;			
		var active = false;			
		var ball = document.getElementById("ball");
		var ballloader = document.getElementById("ball-loader");
		var offsetX = 40;
		
		
		TweenLite.set(ball, { xPercent: -50, yPercent: -50, scale:0.5, borderWidth: '4px' });
		
		document.addEventListener("mousemove", mouseMove);
		
		function mouseMove(e) {
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			mouse.x = e.pageX;
			mouse.y = e.pageY - scrollTop;
		}
		
		TweenLite.ticker.addEventListener("tick", updatePosition);
		
		function updatePosition() {
			if (!active) {
				pos.x += (mouse.x - pos.x) * ratio;
				pos.y += (mouse.y - pos.y) * ratio;
		
				TweenLite.to(ball, 0.4, { x: pos.x, y: pos.y });
			}
		}
		
		$(".sticky.left").mouseenter(function(e) {
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.left - offsetX;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$(".sticky.right").mouseenter(function(e) {
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.right + offsetX;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale: 0.9, borderWidth: '2px'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$("#main .sticky.left").mouseenter(function(e) {		  
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.left - offsetX + 10;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$("#main .sticky.right").mouseenter(function(e) {		  
			var rcBounds = $(this)[0].getBoundingClientRect();		  
			var positionX = rcBounds.right + offsetX - 10;
			var positionY = rcBounds.top + rcBounds.height/2;		  
			TweenLite.to(ball, 0.5, { x: positionX, y: positionY, scale:0.7, opacity:0.6, borderWidth: '6px', borderColor:'#999999'});
			TweenMax.ticker.removeEventListener("tick", updatePosition);
		})
		
		$(".sticky").mouseleave(function(e) {			
			TweenLite.to(ball, 0.2, { scale:0.5, borderWidth: '4px', borderColor:'#999999', opacity:1 });
			TweenMax.ticker.addEventListener("tick", updatePosition);		  
		})		
		
		$(".parallax-wrap").mouseenter(function(e) {
			TweenMax.to(this, 0.3, { scale: 2 });
			TweenMax.to(ball, 0.3, { scale: 0.9, borderWidth: '2px',opacity:1 });
			TweenMax.to($( this ).children(), 0.3,{scale:0.5});
			active = true;
		});
		
		$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
			TweenMax.to(ball, 0.3, { scale: 0.7, borderWidth: '6px', opacity:0.6, borderColor:'#999' });
		});
		
		$(".parallax-wrap.bigger").mouseenter(function(e) {
			TweenMax.to(ball, 0.3, { scale: 1.35, borderWidth: '2px', opacity:1 });
		});
		
		$(".parallax-wrap").mouseleave(function(e) {
			TweenMax.to(this, 0.3, { scale: 1 });
			TweenMax.to(ball, 0.3, { scale: 0.5, borderWidth: '4px', opacity:1, borderColor:'#999999'  });
			TweenMax.to($( this ).children(), 0.3,{scale:1, x: 0, y:0});
			active = false;
		});		
		
		if ($('#magic-cursor').hasClass("light-content")) {
			$(".sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$("#main .sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$(".parallax-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'  });
			});
			$(".parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#fff'  });
			});
			$(".white-section .parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#000'  });
			});
			$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'});
			});
		} else {
			$(".sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$("#main .sticky").mouseenter(function(e) {
			  TweenLite.to(ball, 0.5, { borderColor:'#999' });
			})
			$(".parallax-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999' });
			});
			$(".parallax-wrap.bigger").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#000'  });
			});
			$("#main .parallax-wrap.icon-wrap").mouseenter(function(e) {
				TweenMax.to(ball, 0.3, { borderColor:'#999'});
			});
		}
		
		$(".parallax-wrap").mousemove(function(e) {
			parallaxCursor(e, this, 2);
			callParallax(e, this);
		});
		
		function callParallax(e, parent) {
			parallaxIt(e, parent, parent.querySelector(".parallax-element"), 20);
		}
		
		function parallaxIt(e, parent, target, movement) {
			var boundingRect = parent.getBoundingClientRect();
			var relX = e.pageX - boundingRect.left;
			var relY = e.pageY - boundingRect.top;
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			
			TweenMax.to(target, 0.3, {
				x: (relX - boundingRect.width / 2) / boundingRect.width * movement,
				y: (relY - boundingRect.height / 2 - scrollTop) / boundingRect.height * movement,
				ease: Power2.easeOut
			});
		}
		
		function parallaxCursor(e, parent, movement) {
			var rect = parent.getBoundingClientRect();
			var relX = e.pageX - rect.left;
			var relY = e.pageY - rect.top;
			var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			pos.x = rect.left + rect.width / 2 + (relX - rect.width / 2) / movement;
			pos.y = rect.top + rect.height / 2  + (relY - rect.height / 2 - scrollTop)  / movement ;
			TweenMax.to(ball, 0.3, { x: pos.x, y: pos.y });
		}
		
		$(".hide-ball").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth: '1px', scale: 1, opacity:0});
		});			
		$(".hide-ball").mouseleave(function(e) {
			TweenMax.to('#ball', 0.3,{borderWidth: '4px', scale:0.5, opacity:1});
		});
		
		$(".link").mouseenter(function(e) {	
			TweenMax.to('#ball', 0.2,{borderWidth:"0px",scale:1.5,backgroundColor:"rgba(153, 153, 153, 1)",opacity:0.15});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '2px', top: 4, left: 4});
		});			
		$(".link").mouseleave(function(e) {
			TweenMax.to('#ball', 0.3,{borderWidth:"4px",scale:0.5,backgroundColor:"rgba(153, 153, 153, 0)",opacity:1});
			TweenMax.to('#ball-loader', 0.2,{borderWidth: '4px', top: 0, left: 0});
		});
		
	}// End Page Load No Ajax
	
});
	
/*--------------------------------------------------
	Function Contact Map & Init Contact Map
---------------------------------------------------*/

	function ContactMap() {

		if( jQuery('#map_canvas').length > 0 ){

			var map_marker_image 	= 'images/marker.png';
			var map_address 			= 'New York City'
			var map_zoom				= 16;
			var marker_title 				= 'Hello Friend!';
			var marker_text				= 'Here we are. Come to drink a coffee!';
			var map_type					= google.maps.MapTypeId.SATELLITE;

			if( typeof ClapatMapOptions != 'undefined' ){

				map_marker_image 	= ClapatMapOptions.map_marker_image;
				map_address 			= ClapatMapOptions.map_address;
				map_zoom				= Number(ClapatMapOptions.map_zoom);
				marker_title 				= ClapatMapOptions.marker_title;
				marker_text				= ClapatMapOptions.marker_text;
				if( ClapatMapOptions.map_type == 0 ){

					map_type = google.maps.MapTypeId.SATELLITE;
				}
				else{

					map_type = google.maps.MapTypeId.ROADMAP;
				}

			}

			var newstyle = [
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#e9e9e9"
						},
						{
							"lightness": 17
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f5f5f5"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 17
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 29
						},
						{
							"weight": 0.2
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 18
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f5f5f5"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#dedede"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"visibility": "on"
						},
						{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"saturation": 36
						},
						{
							"color": "#333333"
						},
						{
							"lightness": 40
						}
					]
				},
				{
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f2f2f2"
						},
						{
							"lightness": 19
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#fefefe"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#fefefe"
						},
						{
							"lightness": 17
						},
						{
							"weight": 1.2
						}
					]
				}
			];
						
			var settings = {
				zoom: map_zoom,
				center: new google.maps.LatLng(43.270441,6.640888),
				mapTypeControl: false,
				scrollwheel: false,
				draggable: true,
				panControl:false,
				scaleControl: false,
				zoomControl: false,
				streetViewControl:false,
				navigationControl: false,
				mapTypeId: map_type,
				styles: newstyle
			};


			var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
			google.maps.event.addDomListener(window, "resize", function() {
				var center = map.getCenter();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center);
			});
			var contentString = '<div id="content-map-marker" style="text-align:center; padding-top:10px; padding-left:10px">'+
				'<div id="siteNotice">'+
				'</div>'+
				'<h4 id="firstHeading" class="firstHeading" style="color:#000!important; font-weight:600; margin-bottom:0px;"><strong style="color:#000!important;">' + marker_title + '</strong></h4>'+
				'<div id="bodyContent">'+
				'<p color:#999; font-size:14px; margin-bottom:10px">' + marker_text + '</p>'+
				'</div>'+
				'</div>';
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			var companyImage = new google.maps.MarkerImage(map_marker_image,
				new google.maps.Size(58,63),
				new google.maps.Point(0,0),
				new google.maps.Point(35,20)
			);

			var latitude = 43.270441;
			var longitude = 6.640888;
			var geocoder = new google.maps.Geocoder();
			geocoder.geocode({'address':map_address}, function(results, status) {
				if(status == google.maps.GeocoderStatus.OK) {

					map.setCenter(results[0].geometry.location);

					latitude = results[0].geometry.location.lat();
					longitude = results[0].geometry.location.lng();

					var companyPos = new google.maps.LatLng(latitude, longitude);
					var companyMarker = new google.maps.Marker({
										position: companyPos,
										map: map,
										icon: companyImage,
										title:"Our Office",
										zIndex: 3});
									google.maps.event.addListener(companyMarker, 'click', function() {
										infowindow.open(map,companyMarker);
									});
				}
			});

		}

		return false

	} // End ContactMap

	function InitContactMap() {

		if( jQuery('#map_canvas').length > 0 ){

			if (typeof google != 'undefined' && typeof google.maps != 'undefined'){

				// google maps already loaded, call the function which draws the map
				ContactMap();

			} else {

				var map_api_key = '';
				if( typeof ClapatMapOptions != 'undefined' ){
					map_api_key = 'key=' + ClapatMapOptions.map_api_key;
				}
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = 'https://maps.googleapis.com/maps/api/js?' + map_api_key +
							'&callback=ContactMap';
				document.body.appendChild(script);
			}

		}
	} // End InitContactMap


/*--------------------------------------------------
	SLIDESHOW MANAGER
---------------------------------------------------*/
class Slideshow {
    constructor(el) {
        
        this.DOM = {el: el};
        
        this.config = {
            slideshow: {
                delay: 3000,
                pagination: {
                    duration: 3,
                }
            }
        };
        
        // Set the slideshow
        this.init();
        
    }
    init() {
        
        var self = this;
        
        // Charmed title
        this.DOM.slideTitle = this.DOM.el.querySelectorAll('.scroll-horizontally ');
        this.DOM.slideTitle.forEach((slideTitle) => {
            //charming(slideTitle); // this part needs premium plugin of gsap
        });
        
        // Set the slider
        this.slideshow = new Swiper (this.DOM.el, {
            
            loop: true,
            /* autoplay: {
                delay: this.config.slideshow.delay,
                disableOnInteraction: false,
            },*/
            speed: 500,
            preloadImages: true,
            updateOnImagesReady: true,
            
            on: {
                init: function() {
                    self.animate('next');
				},
				click:function(swiper, event){
					this.slideNext();
				}
				
			}
            
        });
        
        // Init/Bind events.
        this.initEvents();
        
    }
    initEvents() {
        
        //this.slideshow.on('paginationUpdate', (swiper, paginationEl) => this.animatePagination(swiper, paginationEl));
        //this.slideshow.on('paginationRender', (swiper, paginationEl) => this.animatePagination());
        
        this.slideshow.on('slideNextTransitionStart', () => this.animate('next'));
        
        this.slideshow.on('slidePrevTransitionStart', () => this.animate('prev'));
        
    }
    animate(direction = 'next') {
        
        // Get the active slide
        this.DOM.activeSlide = this.DOM.el.querySelector('.swiper-slide-active'),
        this.DOM.activeSlideImg = this.DOM.activeSlide.querySelector('img'),
        this.DOM.activeSlideTitle = this.DOM.activeSlide.querySelector('.scroll-horizontally '),
        this.DOM.activeSlideTitleLetters = this.DOM.activeSlideTitle.querySelectorAll('span');
        
        // Reverse if prev  
        this.DOM.activeSlideTitleLetters = direction === "next" ? this.DOM.activeSlideTitleLetters : [].slice.call(this.DOM.activeSlideTitleLetters).reverse();
        
        // Get old slide
        this.DOM.oldSlide = direction === "next" ? this.DOM.el.querySelector('.swiper-slide-prev') : this.DOM.el.querySelector('.swiper-slide-next');
        if (this.DOM.oldSlide) {
            // Get parts
            this.DOM.oldSlideTitle = this.DOM.oldSlide.querySelector('.scroll-horizontally '),
            this.DOM.oldSlideTitleLetters = this.DOM.oldSlideTitle.querySelectorAll('span'); 
            // Animate
            this.DOM.oldSlideTitleLetters.forEach((letter,pos) => {
                TweenMax.to(letter, .3, {
                    ease: Quart.easeIn,
                    delay: (this.DOM.oldSlideTitleLetters.length-pos-1)*.04,
                    y: '50%',
                    opacity: 0
                });
            });
        }
        
        // Animate title
        this.DOM.activeSlideTitleLetters.forEach((letter,pos) => {
            TweenMax.to(letter, .6, {
                ease: Back.easeOut,
                delay: pos*.05,
                startAt: {y: '50%', opacity: 0},
                y: '0%',
                opacity: 1
            });
        });
        
		// Animate background
		if(this.DOM.activeSlideImg) {
			TweenMax.to(this.DOM.activeSlideImg, 1.5, {
				ease: Expo.easeOut,
				startAt: {x: direction === 'next' ? 200 : -200},
				x: 0,
			});
		}
		
		// Animate title
		if(this.DOM.activeSlideTitle){
			TweenMax.to(this.DOM.activeSlideTitle, 1.5, {
				ease: Expo.easeOut,
				startAt: {x: direction === 'next' ? 200 : -200},
				x: 0,
			});
		}
		
        
        //this.animatePagination()
        
    }
    animatePagination(swiper, paginationEl) {
        
        // Animate pagination
        this.DOM.paginationItemsLoader = paginationEl.querySelectorAll('.pagination-separator-loader');
        this.DOM.activePaginationItem = paginationEl.querySelector('.slideshow-pagination-item.active');
        this.DOM.activePaginationItemLoader = this.DOM.activePaginationItem.querySelector('.pagination-separator-loader');
        
        console.log(swiper.pagination);
        // console.log(swiper.activeIndex);
        
        // Reset and animate
        TweenMax.set(this.DOM.paginationItemsLoader, {scaleX: 0});
        TweenMax.to(this.DOM.activePaginationItemLoader, this.config.slideshow.pagination.duration, {
            startAt: {scaleX: 0},
            scaleX: 1,
        });  
    }
}