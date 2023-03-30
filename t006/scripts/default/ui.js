'use strict';
var windowW,windowH,mobileMode,headerH;
$(function (){
    $(window).resize(function(){
        resize();
    }).trigger('resize');
    /* ==========================================================================
		[layout]
    ==========================================================================*/
    $(".menu-toggle").click(() => {
        $("header").toggleClass("openMenu");
    })
    if(windowW>=768){
        $(window).scroll(function(){
            $(window).scrollTop()===0?$("header").removeClass("scrollMode"):$("header").addClass("scrollMode");
        }); 
    }
    /* ==========================================================================
		contact
    ==========================================================================*/
    let failureModal = new bootstrap.Modal(document.getElementById('failureModal'), {});
    let successModal = new bootstrap.Modal(document.getElementById('successModal'), {});
    $(".contact-section .submit").click(() => {
        let name=$(".contact-section #name").val();
        let tel=$(".contact-section #tel").val();
        let email=$(".contact-section #email").val();

        if(name === '' || !!tel === '' || !isEmail(email)){
            //failureModal.show();
        }
        else{
            // $("#contactForm").submit();
            successModal.show();  
        }
        
    });


     /* ==========================================================================
		[page]
    ==========================================================================*/
    //brand
    if($("#brand").length!==0){
		let section1Block1Swiper=new Swiper('.section-1 .block-1 .swiper-1', {
			loop:true,
			speed:800,
			navigation: {
				nextEl: '.section-1 .block-1 .swiper-button-next',
				prevEl: '.section-1 .block-1 .swiper-button-prev',
			},
		})
		let section1Block2Swiper = new Swiper('.section-1 .block-2 .swiper-2', {
			loop:true,
			speed:800,
			allowTouchMove:false
		})

		let section1Block3Swiper = new Swiper('.section-1 .block-3 .swiper-3', {
			loop:true,
			speed:800,
			allowTouchMove:false
		})
		section1Block1Swiper.on('slideChange', function (swiper) {
			let imgCurrentText='0'+(swiper.realIndex + 1);
			$(".section-1 .tools .current").text(imgCurrentText);
		});
		section1Block1Swiper.on('slideNextTransitionStart', function () {
			section1Block2Swiper.slideNext(800);
			section1Block3Swiper.slideNext(800);
		});
		section1Block1Swiper.on('slidePrevTransitionStart', function () {
			section1Block2Swiper.slidePrev(800);
			section1Block3Swiper.slidePrev(800);
		});

		let section3TextSwiper1 = new Swiper('.section-3 .text-swiper-1', {
			loop:true,
			speed:800,
			allowTouchMove:false
		})
		let section3TextSwiper2 = new Swiper('.section-3 .text-swiper-2', {
			loop:true,
			speed:800,
			allowTouchMove:false
		})
		let section3ImgSwiper = new Swiper('.section-3 .img-swiper', {
			loop:true,
			speed:800,
			slidesPerGroup:3,
			slidesPerView:3,
			pagination: {
				el: '.section-3 .swiper-pagination',
				type: 'bullets',
			},
			navigation: {
				nextEl: '.section-3 .swiper-button-next',
				prevEl: '.section-3 .swiper-button-prev',
			},

		})
		section3ImgSwiper.on('slideNextTransitionStart', function () {
			section3TextSwiper1.slideNext(800);
			section3TextSwiper2.slideNext(800);
		});
		section3ImgSwiper.on('slidePrevTransitionStart', function () {
			section3TextSwiper1.slidePrev(800);
			section3TextSwiper2.slidePrev(800);
		});
    }

    //vision
	if($("#vision").length!==0){
		new Swiper('.section-3 .swiper', {
			loop:true,
			speed:800,
			effect:"fade",
			autoplay: {
				delay: 3000,
			},
			pagination: {
				el: '.section-3 .swiper-pagination',
				type: 'bullets',
			},
		})
		new Swiper('.section-4 .swiper', {
			loop:true,
			speed:800,
			effect:"fade",
			autoplay: {
				delay: 3000,
			},
			pagination: {
				el: '.section-4 .swiper-pagination',
				type: 'bullets',
			},
		})
	}

    //location
    if($("#location").length!==0){
		var controller = new ScrollMagic.Controller();
		let targetWidth=$(".section-1 .text-block .text").width();
		let targetLeft=Math.floor($(".section-1 .text-block").css("left").replace("px",""));

		let value= targetWidth - windowW + targetLeft * 2;
		var tween = TweenMax.to(".section-1 .text-block", 1, {x: -value, ease: Linear.easeNone});

		new ScrollMagic.Scene({triggerElement: "#trigger", duration: 300})
				.setTween(tween)
				.setPin("#target", {pushFollowers: false})
				.addTo(controller);


    gsap.registerPlugin(ScrollTrigger);
    gsap.fromTo(".section-1 .img-2",{y:0}, {
      y: -200,
      scrollTrigger: {
        scrub: 1,
        trigger: ".section-1 .img-2",
        start: "top bottom", // (物件開始位置, 卷軸開始位置) 
      }
    });
    gsap.fromTo(".section-1 .img-3",{y:-200}, {
      y: 0,
      scrollTrigger: {
        scrub: 1,
        trigger: ".section-1 .img-3", 
        start: "top bottom", // (物件開始位置, 卷軸開始位置)
      }
    });




		let imgLength=$(".section-2 .img-swiper .swiper-slide").length;
		let imgLengthText=imgLength<10?'0'+imgLength:imgLength;
		$(".section-2 .tools .total").text(imgLengthText)

		let section2TextSwiper = new Swiper('.section-2 .text-swiper', {
			loop:true,
			speed:800,
			allowTouchMove:false,
		})	


		let section2ImgSwiper = new Swiper('.section-2 .img-swiper', {
			slidesPerView: 1.2,
			spaceBetween: 30,
			speed:800,
			loop:true,
			centeredSlides: true,
			navigation: {
				nextEl: '.section-2 .img-swiper .swiper-button-next',
				prevEl: '.section-2 .img-swiper .swiper-button-prev',
			},
			pagination: {
				el: '.swiper-pagination',
				type: 'progressbar',
				progressbarOpposite:true,
				verticalClass: "swiper-pagination-vertical",
			},
			breakpoints: {
				767: {
					spaceBetween: 40,
				},
				991: {
					spaceBetween: 120,
					slidesPerView: 2,
				},
				1199: {
					spaceBetween: 180,
					slidesPerView: 2,
				},
				1399: {
					spaceBetween: "14%",
					slidesPerView: 1.88,
				}
			}
		})

		section2ImgSwiper.on('slideNextTransitionStart', function () {
			section2TextSwiper.slideNext(800);
		});
		section2ImgSwiper.on('slidePrevTransitionStart', function () {
			section2TextSwiper.slidePrev(800);
		});

		
		section2ImgSwiper.on('slideChange', function (swiper) {
			let imgCurrentText=swiper.realIndex + 1<10?'0'+(swiper.realIndex + 1):(swiper.realIndex + 1);
			$(".section-2 .tools .current").text(imgCurrentText)
		});

		let section4Img2=new Swiper('.section-4 .swiper-2', {
			loop:true,
			speed:800,
		})
		let section4Img = new Swiper('.section-4 .swiper-1', {
			loop:true,
			speed:800,
			pagination: {
				el: '.section-4 .swiper-1 .swiper-pagination',
				type: 'bullets',
			},
			thumbs: {
				swiper: section4Img2
			},
		})
		section4Img.on('slideNextTransitionStart', function () {
			section4Img2.slideNext(800);
		});
		section4Img.on('slidePrevTransitionStart', function () {
			section4Img2.slidePrev(800);
		});
    }
    /* ==========================================================================
		[common]
    ==========================================================================*/

    $(".reserve-btn").click(() => {
        $("html,body").animate({
            scrollTop:$(".contact-section").offset().top - $("header").height()
        },800);
    })
    $(".goTop").click(() => {
        $("html,body").animate({
            scrollTop:0
        },800);
    });
  
    aosInit();
    /* ==========================================================================
		[resize]
    ==========================================================================*/

    function resize(){
        windowW=$(window).innerWidth();
        windowH=$(window).height();
        headerH=$("header").height();
    }

})
function aosInit(){
    AOS.init({
        duration: 500,
        offset: 10,
        mirror: true,
    });
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}

