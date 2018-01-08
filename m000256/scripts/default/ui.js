$(document).ready(function() {

	//if (!/MSIE|IEMobile/i.test(window.navigator.userAgent)) {
		$(".wow").each(function() {
      new WOW().init();
    });
  //}

  if (!/Android/i.test(window.navigator.userAgent)) {
		$(".scrollbarX").each(function() {
	        $(this).mCustomScrollbar({
				axis: "x",
				mouseWheel:{ enable: false }
			});
    });
	}

	$('.scrollbar').mCustomScrollbar({
    axis: "y"
  });

	$('.jqimgFill').imgLiquid();
	$('.jqimgFill, .main').css("opacity","1");

  /* ==========================================================================
    * 變數定義
  ==========================================================================*/
  resizeCss();

	/* ==========================================================================
		[header]
 	==========================================================================*/
	$('#header').each(function() {
		$(this).css("visibility","visible");
		$(".menu-toggle").click(function() {
			$(this).toggleClass('actived');
			$(this).next(".menu").toggleClass('actived');
		});
	});

	/* ==========================================================================
			文字特效
	==========================================================================*/
  $('.tlt').textillate({
    loop: false,
    in: {
      effect: 'flipInY',
      delay: 50,
    },
  });

  $('.tlt-loop').textillate({
    loop: true,
    in: {
      effect: 'flipInY',
      delay: 50,
    },
    out: {
      effect: 'fadeOut',
      delay: 50,
    },
  });

  /* ==========================================================================
    * 頁面區塊
  ==========================================================================*/
  /*== home  =========================== */
  $("#home").each(function() {
  	if( $("html").hasClass('min-lg-size') ) {
	    var skrollr_obj = skrollr.init();
	  }

    $(this).find('.banner .slider').slick({
      dots: false,
			arrows: true,
			autoplay: true,
			speed: 1500,
			fade: true,
			autoplaySpeed: 5000,
			appendArrows:$(".banner .arrows"),
    });

    $(this).find('.news .slider').slick({
      dots: true,
			arrows: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			speed: 1000,
			cssEase: 'ease',
			easing:'easeInOutCirc',
			autoplaySpeed: 5000,
			centerMode: true,
			centerPadding: '0',
			responsive: [
				{
					breakpoint: 991,
					settings: {
						//slidesToShow: 4,
					}
				}
			]
    });
  });

	/* ==========================================================================
			IE 9 不支援 placeholder
	==========================================================================*/
	(function ($) {
   $.support.placeholder = ('placeholder' in document.createElement('input'));
	})(jQuery);

	//fix for IE7 and IE8
	$(function () {
    if (!$.support.placeholder) {
	    $("[placeholder]").focus(function () {
	      if ($(this).val() == $(this).attr("placeholder")) $(this).val("");
	     }).blur(function () {
	  	  if ($(this).val() == "") $(this).val($(this).attr("placeholder"));
		}).blur();

		$("[placeholder]").parents("form").submit(function () {
	    $(this).find('[placeholder]').each(function() {
	      if ($(this).val() == $(this).attr("placeholder")) {
	        $(this).val("");
	        }
	     });
			});
	  }
	});

  /*document END*/
});
