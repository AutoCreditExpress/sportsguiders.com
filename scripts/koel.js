"use strict";

$(function() {

	var $logo = $("#logo");
	var $logo_dark = $("#logo-dark");
	var $navbar = $(".navbar");
	var $navbar_collapse = $(".navbar-collapse");
	var $navbar_collapsed = $(".navbar-collapse.in");
	var $navbar_fixed = $(".navbar-fixed");
	var $brand = $("#brand");
	var $brandScroll = $("#brandScroll");

	$(".logo-carousel").owlCarousel({
		items:5,
		loop:true,
	    margin:30,
	    autoplay:true,
	    autoplayTimeout:3000,
	    autoplayHoverPause:true,
	    dots:false
	});
    $("html").niceScroll();

	var $sync1 = $(".product-carousel"),
		$sync2 = $(".product-carousel-thumbs"),
		flag = false,
		duration = 300;

	$sync1
		.owlCarousel({
			items: 1,
			margin: 10,
			nav: false,
			dots: false
		})
		.on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;
				$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});

	$sync2
		.owlCarousel({
			margin: 5,
			items: 4,
			nav: false,
			center: false,
			dots: false
		})
		.on('click', '.owl-item', function () {
			$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

		})
		.on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;		
				$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});

	$(".navbar-toggle").bind("click", collapse);

	var collapsed=false;
	function collapse() {
		if(!collapsed) {
			$navbar_collapse.addClass('in').fadeIn();
			$navbar_collapsed.css('height',$(window).height());
			$('html, body').css({
				'overflow': 'hidden',
				'height': '100%'
			});
			collapsed=true;
		} else {
			$navbar_collapsed.removeClass('in');
			$('html, body').css({
				'overflow': 'auto',
				'height': 'auto'
			});
			collapsed=false;
		}
		return false;
	}

	$(window).resize(function () {
		$navbar_collapsed.css('height',$(window).height());
	});

	$(window).on("scroll", function() {
		var scrolltop = $(window).scrollTop();
		if(scrolltop > 20) {
			$navbar_fixed.addClass('navbar-fixed-top');
		} else {
			$navbar_fixed.removeClass('navbar-fixed-top');
		}
	});
});