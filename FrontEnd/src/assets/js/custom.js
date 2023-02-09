jQuery(function ($) {
    'use strict';

    // Menu
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 150) {
            $('.main-nav').addClass('menu-shrink');
        } else {
            $('.main-nav').removeClass('menu-shrink');
        }
    });	

    // Mean Menu
	jQuery('.mean-menu').meanmenu({
		meanScreenWidth: '991'
	});

	// Modal JS
	$('.modal a').not ('.dropdown-toggle').on('click', function() {
		$('.modal').modal ('hide');
	});

    // Nice Select
    $('select').niceSelect();

	// Revolution Slider 
	jQuery('#rev_slider_1').show().revolution({
		sliderLayout: 'auto',
		responsiveLevels: [1240, 1024, 778, 480],
		gridwidth: [1240, 1024, 778, 480],
		gridheight: [700, 700, 1000, 1300],
		visibilityLevels:[1240, 1024, 1024, 480],

		navigation: {
			arrows: {
                enable: true,
                style: 'gyges',
				hide_onleave: false,
                
                left: {
                    container: 'layergrid',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: -30,
                    v_offset: 155,
                },
         
                right: {
                    container: 'layergrid',
                    h_align: 'center',
                    v_align: 'bottom',
                    h_offset: 30,
                    v_offset: 155,
                }
			}
		}
	});

	// Banner Slider
	$('.banner-slider').owlCarousel({
		items: 1,
		loop: true,
		margin: 15,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [
			"<i class='bx bx-left-arrow-alt'></i>",
			"<i class='bx bx-right-arrow-alt'></i>"
		],
	});

    // Sorting Portfolio
    $('#Container').mixItUp();

	// Testimonials Slider
	$('.testimonials-slider').owlCarousel({
        loop: true,
        center: true,
		margin: 15,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [
			"<i class='bx bx-left-arrow-alt'></i>",
			"<i class='bx bx-right-arrow-alt'></i>"
		],
		responsive:{
			0:{
				items: 1,
			},
			768:{
				items: 2,
			},
			992:{
				items: 3,
			}
		}
	});

	// Testimonials Slider Two
	$('.testimonials-slider-two').owlCarousel({
		items: 1,
        loop: true,
		margin: 15,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [
			"<i class='bx bx-left-arrow-alt'></i>",
			"<i class='bx bx-right-arrow-alt'></i>"
		],
	});
	
	// Number 
	$('.minus').on('click', function() {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.plus').on('click', function() {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});

	// Preloader 
	jQuery(window).on('load', function(){
		jQuery('.loader').fadeOut(500);
	});
	
	// Go Top 
	$(window).on('scroll', function(){
		var scrolled = $(window).scrollTop();
		if (scrolled > 100) $('.go-top').addClass('active');
		if (scrolled < 100) $('.go-top').removeClass('active');
	});  
	$('.go-top').on('click', function() {
		$('html, body').animate({ scrollTop: '0' },  500);
	});

	// Sorting Slider
	$('.sorting-slider').owlCarousel({
		loop: true,
		margin: 15,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [
			"<i class='bx bx-left-arrow-alt'></i>",
			"<i class='bx bx-right-arrow-alt'></i>"
		],
		responsive:{
			0:{
				items: 2,
			},
			768:{
				items: 4,
			},
			992:{
				items: 6,
			}
		}
	});

	// Timer 
	let getDaysId = document.getElementById('days');
	if(getDaysId !== null){
		
		const second = 1000;
		const minute = second * 60;
		const hour = minute * 60;
		const day = hour * 24;

		let countDown = new Date('February 25, 2021 00:00:00').getTime();
		setInterval(function() {
			let now = new Date().getTime();
			let distance = countDown - now;

			document.getElementById('days').innerText = Math.floor(distance / (day)),
			document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
			document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
			document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
		}, second);
	};

	// Modal Video
	$('.js-modal-btn').modalVideo();

	// Video Slider
	$('.video-slider').owlCarousel({
		loop: true,
		margin: 15,
		nav: true,
		dots: false,
		smartSpeed: 1000,
		autoplay: true,
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		navText: [
			"<i class='bx bx-left-arrow-alt'></i>",
			"<i class='bx bx-right-arrow-alt'></i>"
		],
		responsive:{
			0:{
				items: 1,
			},
			768:{
				items: 2,
			},
			992:{
				items: 2,
			}
		}
	});

	// Accordion 
	$('.accordion > li:eq(0) .faq-head').addClass('active').next().slideDown();
	$('.accordion .faq-head').on('click', function(j) {
		var dropDown = $(this).closest('li').find('.faq-content');
		$(this).closest('.accordion').find('.faq-content').not(dropDown).slideUp(300);
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
		} else {
			$(this).closest('.accordion').find('.faq-head.active').removeClass('active');
			$(this).addClass('active');
		}
		dropDown.stop(false, true).slideToggle(300);
		j.preventDefault();
	});

	// Subscribe Modal
	setTimeout (function () {
		$('#modal-subscribe').modal ('show')
	}, 1500)

	// Subscribe Form 
	$('.newsletter-form').validator().on('submit', function (event) {
		if (event.isDefaultPrevented()) {
			// Hande the invalid form...
			formErrorSub();
			submitMSGSub(false, 'Please enter your email correctly.');
		} else {
			// Everything looks good!
			event.preventDefault();
		}
	});
	function callbackFunction (resp) {
		if (resp.result === 'success') {
			formSuccessSub();
		}
		else {
			formErrorSub();
		}
	}
	function formSuccessSub(){
		$('.newsletter-form')[0].reset();
		submitMSGSub(true, 'Thank you for subscribing!');
		setTimeout(function() {
			$('#validator-newsletter').addClass('hide');
		}, 4000)
	}
	function formErrorSub(){
		$('.newsletter-form').addClass('animated shake');
		setTimeout(function() {
			$('.newsletter-form').removeClass('animated shake');
		}, 1000)
	}
	function submitMSGSub(valid, msg){
		if(valid){
			var msgClasses = 'validation-success';
		} else {
			var msgClasses = 'validation-danger';
		}
		$('#validator-newsletter').removeClass().addClass(msgClasses).text(msg);
	}

	$('.image-slides').owlCarousel({
        loop: true,
        nav: false,
        thumbs: true,
        dots: false,
        thumbsPrerendered: true,
        autoplayHoverPause: true,
        autoplay: true,
        items: 1,
        navText: [
			'<i class="bx bx-chevron-left" aria-hidden="true"></i>',
			'<i class="bx bx-chevron-right" aria-hidden="true"></i>'
        ]
    });

	// AJAX Mail Chimp 
	$('.newsletter-form').ajaxChimp({
		url: 'https://envytheme.us20.list-manage.com/subscribe/post?u=60e1ffe2e8a68ce1204cd39a5&amp;id=42d6d188d9', // Your url MailChimp
		callback: callbackFunction
	});
}(jQuery));