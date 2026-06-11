/*-----------------------------------------------------------------

Template Name: Techify - Technology Tt Solutions HTML Template<
Author:  namespace-it
Author URI: https://themeforest.net/user/namespace-it
Version: 1.0.0
Description: Techify - Technology Tt Solutions HTML Template<

-------------------------------------------------------------------
CSS TABLE OF CONTENTS
-------------------------------------------------------------------

01. header
02. animated text with swiper slider
03. magnificPopup
04. counter up
05. wow animation
06. nice select
07. swiper slider
08. search popup
09. preloader 


------------------------------------------------------------------*/

(function ($) {
	("use strict");

	$(document).ready(function () {
		//>> Mobile Menu Js Start <<//
		$("#mobile-menu").meanmenu({
			meanMenuContainer: ".mobile-menu",
			meanScreenWidth: "1199",
			meanExpand: ['<i class="far fa-plus"></i>'],
		});

		//>> Sidebar Toggle Js Start <<//
		$(".offcanvas__close,.offcanvas__overlay").on("click", function () {
			$(".offcanvas__info").removeClass("info-open");
			$(".offcanvas__overlay").removeClass("overlay-open");
		});
		$(".sidebar__toggle").on("click", function () {
			$(".offcanvas__info").addClass("info-open");
			$(".offcanvas__overlay").addClass("overlay-open");
		});

		//>> Body Overlay Js Start <<//
		$(".body-overlay").on("click", function () {
			$(".offcanvas__area").removeClass("offcanvas-opened");
			$(".df-search-area").removeClass("opened");
			$(".body-overlay").removeClass("opened");
		});

		//>> Sticky Header Js Start <<//

		$(window).scroll(function () {
			if ($(this).scrollTop() > 250) {
				$("#header-sticky").addClass("sticky");
			} else {
				$("#header-sticky").removeClass("sticky");
			}
		});

		//Accordion Items active class
		const accordionButtons = document.querySelectorAll(".accordion-button");

		accordionButtons.forEach((button) => {
			button.addEventListener("click", function () {
				// Remove 'active' class from all accordion items
				document
					.querySelectorAll(".accordion-item.active")
					.forEach((item) => item.classList.remove("active"));

				// Add 'active' class to the parent of the clicked button
				const parentItem = button.closest(".accordion-item");
				parentItem.classList.add("active");
			});
		});

		//>> Hero-3 Slider Start <<//
		const sliderActive1 = ".hero-slider";
		const sliderInit1 = new Swiper(sliderActive1, {
			loop: true,
			slidesPerView: 1,
			effect: "fade",
			speed: 2000,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".dot",
				clickable: true,
			},
		});
		// content animation when active start here
		function animated_swiper(selector, init) {
			let animated = function animated() {
				$(selector + " [data-animation]").each(function () {
					let anim = $(this).data("animation");
					let delay = $(this).data("delay");
					let duration = $(this).data("duration");
					$(this)
						.removeClass("anim" + anim)
						.addClass(anim + " animated")
						.css({
							webkitAnimationDelay: delay,
							animationDelay: delay,
							webkitAnimationDuration: duration,
							animationDuration: duration,
						})
						.one("animationend", function () {
							$(this).removeClass(anim + " animated");
						});
				});
			};
			animated();
			init.on("slideChange", function () {
				$(sliderActive1 + " [data-animation]").removeClass("animated");
			});
			init.on("slideChange", animated);
		}
		animated_swiper(sliderActive1, sliderInit1);

		//>> Video Popup Start <<//
		$(".img-popup").magnificPopup({
			type: "image",
			gallery: {
				enabled: true,
			},
		});

		$(".video-popup").magnificPopup({
			type: "iframe",
			callbacks: {},
		});

		//>> Counterup Start <<//
		$(".count").counterUp({
			delay: 15,
			time: 4000,
		});

		//>> Wow Animation Start <<//
		new WOW().init();

		//>> Nice Select Start <<//
		$("select").niceSelect();

		//>> Testimonial Slider Start <<//
		const testimonial__slider1 = new Swiper(".testimonial-slider1", {
			spaceBetween: 30,
			speed: 500,
			loop: true,
			// autoplay: {
			// 	delay: 1000,
			// 	disableOnInteraction: false,
			// },
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 1,
				},
				767: {
					slidesPerView: 1,
				},
				575: {
					slidesPerView: 1,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Sponsor One
		const sponsorWrapper = new Swiper(".sponsor-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 4,
				},
				991: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				520: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
			},
		});

		//--Sponsor Two
		const sponsorWrapper2 = new Swiper(".sponsor-wrapper2", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 5,
				},
				991: {
					slidesPerView: 4,
					spaceBetween: 14,
				},
				520: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
			},
		});

		//--Fronter Slide
		const fronterWrapper = new Swiper(".fronter-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			breakpoints: {
				1199: {
					slidesPerView: 4.3,
				},
				991: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				575: {
					slidesPerView: 2.5,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 1.2,
					spaceBetween: 14,
				},
			},
		});

		//--team Slide
		const teamWrapper = new Swiper(".team-wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial 06 Slide
		const testimonialWrapper6 = new Swiper(".testimonial-wrapper6", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			centeredSlides: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 2.8,
				},
				991: {
					slidesPerView: 2.8,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Project Gallery Slide
		const projectGalleryWrap = new Swiper(".project-gallery-wrap", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const teamWrapper2 = new Swiper(".team-wrapper2", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 4,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const teamWrapper4 = new Swiper(".team-wrapper4", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
				},
				575: {
					slidesPerView: 2,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});

		//--Testimonial Slide
		const providingTestimonialSlide = new Swiper(
			".providing-testimonial-slide",
			{
				spaceBetween: 44,
				speed: 500,
				loop: true,
				pagination: {
					el: ".dot",
					clickable: true,
				},
				navigation: {
					nextEl: ".array-prev",
					prevEl: ".array-next",
				},
				breakpoints: {
					1199: {
						slidesPerView: 1,
					},
					767: {
						slidesPerView: 1,
					},
					575: {
						slidesPerView: 1,
					},
					0: {
						slidesPerView: 1,
					},
				},
			}
		);

		//Not Use this code bottom ----------------+++++==
		//--Text Custom Slide
		const sponsor__text__slide = new Swiper(".sponsor-text-slide", {
			speed: 6000,
			loop: true,
			slidesPerView: "auto",
			centeredSlides: true,
			autoplay: {
				delay: 1,
				disableOnInteraction: false,
			},
			breakpoints: {
				991: {
					spaceBetween: 30,
				},
				600: {
					spaceBetween: 20,
				},
				400: {
					spaceBetween: 16,
				},
				0: {
					spaceBetween: 14,
				},
			},
		});

		//--Testimonial Slide
		const testimonialSlider = new Swiper(".testimonial-slider", {
			spaceBetween: 30,
			speed: 500,
			loop: true,
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 1,
				},
				767: {
					slidesPerView: 1,
				},
				575: {
					slidesPerView: 1,
				},
				0: {
					slidesPerView: 1,
				},
			},
		});
		//--Testimonial Slide
		const lastes__project__wrapper = new Swiper(".lastes-project__wrapper", {
			spaceBetween: 24,
			speed: 500,
			loop: true,
			// autoplay: {
			// 	delay: 1000,
			// 	disableOnInteraction: false,
			// },
			pagination: {
				el: ".dot",
				clickable: true,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
			breakpoints: {
				1199: {
					slidesPerView: 3,
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 14,
				},
				500: {
					slidesPerView: 2,
					spaceBetween: 14,
				},
				0: {
					slidesPerView: 1,
					spaceBetween: 14,
				},
			},
		});

		//------------------------Not Use thsi code in this porjects

		const testimonialSlider3 = new Swiper(".testimonial-slider-3", {
			spaceBetween: 30,
			speed: 1500,
			loop: true,
			autoplay: {
				delay: 1000,
				disableOnInteraction: false,
			},
			navigation: {
				nextEl: ".array-prev",
				prevEl: ".array-next",
			},
		});

		//>> Search Popup Start <<//
		const $searchWrap = $(".search-wrap");
		const $navSearch = $(".nav-search");
		const $searchClose = $("#search-close");

		$(".search-trigger").on("click", function (e) {
			e.preventDefault();
			$searchWrap.animate({ opacity: "toggle" }, 500);
			$navSearch.add($searchClose).addClass("open");
		});

		$(".search-close").on("click", function (e) {
			e.preventDefault();
			$searchWrap.animate({ opacity: "toggle" }, 500);
			$navSearch.add($searchClose).removeClass("open");
		});

		function closeSearch() {
			$searchWrap.fadeOut(200);
			$navSearch.add($searchClose).removeClass("open");
		}

		$(document.body).on("click", function (e) {
			closeSearch();
		});

		$(".search-trigger, .main-search-input").on("click", function (e) {
			e.stopPropagation();
		});

		//---------Use In Gsap--------
		// lenis Scroll Init
		// gsap.registerPlugin(ScrollSmoother);
		// const lenis = new Lenis();
		// gsap.ticker.add(function (time) {
		//   lenis.raf(time * 400);
		// });
		// gsap.ticker.lagSmoothing(0);
		// ScrollTrigger.update();

		//--- Custom Tilt Js Start ---//
		const tilt = document.querySelectorAll(".tilt");
		VanillaTilt.init(tilt, {
			reverse: true,
			max: 15,
			speed: 400,
			scale: 1.01,
			glare: true,
			reset: true,
			perspective: 800,
			transition: true,
			"max-glare": 0.45,
			"glare-prerender": false,
			gyroscope: true,
			gyroscopeMinAngleX: -45,
			gyroscopeMaxAngleX: 45,
			gyroscopeMinAngleY: -45,
			gyroscopeMaxAngleY: 45,
		});
		//--- Custom Tilt Js End ---//

		// Mouse Follower
		const follower = document.querySelector(
			".mouse-follower .cursor-outline"
		);
		const dot = document.querySelector(".mouse-follower .cursor-dot");
		window.addEventListener("mousemove", (e) => {
			follower.animate(
				[
					{
						opacity: 1,
						left: `${e.clientX}px`,
						top: `${e.clientY}px`,
						easing: "ease-in-out",
					},
				],
				{
					duration: 3000,
					fill: "forwards",
				}
			);
			dot.animate(
				[
					{
						opacity: 1,
						left: `${e.clientX}px`,
						top: `${e.clientY}px`,
						easing: "ease-in-out",
					},
				],
				{
					duration: 1500,
					fill: "forwards",
				}
			);
		});

		// Mouse Follower Hide Function
		$("a, button").on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("hide-cursor");
		});

		var terElement = $(
			"h1, h2, h3, h4, .display-one, .display-two, .display-three, .display-four, .display-five, .display-six"
		);
		$(terElement).on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("highlight-cursor-head");
			$(this).toggleClass("highlight-cursor-head");
		});

		var terElement = $("p");
		$(terElement).on("mouseenter mouseleave", function () {
			$(".mouse-follower").toggleClass("highlight-cursor-para");
			$(this).toggleClass("highlight-cursor-para");
		});

		//-- Use Gsap Animation --//
		// Visible From Right Animation
		const observer = new IntersectionObserver(
			(entries, observer) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						let visibleFromRight = entry.target;
						let split_item = new SplitText(visibleFromRight, {
							type: "chars, words",
						});
						gsap.from(split_item.chars, {
							duration: 0.4,
							x: 45,
							autoAlpha: 0,
							stagger: 0.15,
						});
						observer.unobserve(visibleFromRight);
					}
				});
			},
			{ threshold: 0.1 }
		);
		document.querySelectorAll(".visible-from-right").forEach((element) => {
			observer.observe(element);
		});

		// Visible From Right Slowly Animation
		let visibleSlowlyRight = document.querySelectorAll(
			".visible-slowly-right"
		);
		if ($(visibleSlowlyRight).length > 0) {
			let char_come = gsap.utils.toArray(visibleSlowlyRight);
			char_come.forEach((char_come) => {
				let split_char = new SplitText(char_come, {
					type: "chars, words",
					lineThreshold: 0.5,
				});
				const tl2 = gsap.timeline({
					scrollTrigger: {
						trigger: char_come,
						start: "top 90%",
						end: "bottom 60%",
						scrub: false,
						markers: false,
						toggleActions: "play play play play",
					},
				});
				tl2.from(split_char.chars, {
					duration: 0.8,
					x: 70,
					autoAlpha: 0,
					stagger: 0.03,
				});
			});
		}

		// Visible From Bottom Animation
		let visibleFromBottom = gsap.utils.toArray(".visible-from-bottom");
		visibleFromBottom.forEach((splitArea) => {
			const trigger = gsap.timeline({
				scrollTrigger: {
					trigger: splitArea,
					start: "top 90%",
					end: "bottom 60%",
					scrub: false,
					markers: false,
				},
			});
			const contentSplitted = new SplitText(splitArea, {
				type: "words, lines",
			});
			gsap.set(splitArea, { perspective: 400 });
			contentSplitted.split({ type: "lines" });
			trigger.from(contentSplitted.lines, {
				duration: 1,
				delay: 0.3,
				opacity: 0,
				rotationX: -75,
				force3D: true,
				transformOrigin: "top center -50",
				stagger: 0.1,
			});
		});

		// Visible Slowly From Bottom Animation
		const visibleSlowlyBottom = document.querySelectorAll(
			".visible-slowly-bottom"
		);
		function visibleSlowly() {
			visibleSlowlyBottom.forEach((splitArea) => {
				if (splitArea.anim) {
					splitArea.anim.progress(1).kill();
					splitArea.split.revert();
				}
				splitArea.split = new SplitText(splitArea, {
					type: "lines,words,chars",
					linesClass: "split-line",
				});
				splitArea.anim = gsap.from(splitArea.split.chars, {
					scrollTrigger: {
						trigger: splitArea,
						toggleActions: "restart pause resume reverse",
						start: "top 90%",
					},
					duration: 0.8,
					ease: "circ.out",
					y: 70,
					stagger: 0.02,
				});
			});
		}
		ScrollTrigger.addEventListener("refresh", visibleSlowly);
		visibleSlowly();

		// Btn Custom Animation
		// button Vivacity
		let btnVivacity = document.querySelectorAll(".btn-vivacity");
		if (btnVivacity) {
			VanillaTilt.init(btnVivacity, {
				max: 14,
				speed: 2800,
				perspective: 500,
			});
		}

		// Box Style
		const targetBtn = document.querySelectorAll(".box-style");
		if (targetBtn) {
			targetBtn.forEach((element) => {
				element.addEventListener("mousemove", (e) => {
					const x = e.offsetX + "px";
					const y = e.offsetY + "px";
					element.style.setProperty("--x", x);
					element.style.setProperty("--y", y);
				});
			});
		}

		// image right to left
		gsap.registerPlugin(ScrollTrigger);
		let revealContainers = document.querySelectorAll(".reveal-one");
		revealContainers.forEach((container) => {
			let image = container.querySelector(".reveal-image-one");
			let rts = gsap.timeline({
				scrollTrigger: {
					trigger: container,
					toggleActions: "restart none none reset",
					start: "top 90%",
					end: "top 0%",
				},
			});
			rts.set(container, {
				autoAlpha: 1,
			});
			rts.from(container, 1.5, {
				xPercent: 100,
				ease: Power2.out,
			});
			rts.from(image, 1.5, {
				xPercent: -100,
				scale: 1.3,
				delay: -1.5,
				ease: Power2.out,
			});
		});

		//Reveal SlideTop
		function revealSlideTop() {
			const reveals = document.querySelectorAll(".revealSlideTop");
			const windowHeight = window.innerHeight;
			const elementVisible = 150;

			reveals.forEach((reveal) => {
				const elementTop = reveal.getBoundingClientRect().top;

				if (elementTop < windowHeight - elementVisible) {
					reveal.classList.add("active");
				} else {
					reveal.classList.remove("active");
				}
			});
		}
		window.addEventListener("scroll", revealSlideTop);

		// reveal-fourth
		let revealContainersFourth = document.querySelectorAll(".reveal-fourth");
		revealContainersFourth.forEach((container) => {
			let image = container.querySelector("img");
			let tl = gsap.timeline({
				scrollTrigger: {
					trigger: container,
					toggleActions: "restart none none reset",
				},
			});
			tl.set(container, { autoAlpha: 1 });
			tl.from(container, 1.5, {
				xPercent: 100,
				ease: Power2.out,
			});
			tl.from(image, 1.5, {
				xPercent: -100,
				scale: 1.3,
				delay: -1.5,
				ease: Power2.out,
			});
		});

		// Blur animation
		// gsap.utils.toArray(".section-blur").forEach(function (section) {
		// 	gsap.set(section, { filter: "blur(20px)" });
		// 	gsap.to(section, {
		// 		filter: "blur(0px)",
		// 		scrollTrigger: {
		// 			trigger: section,
		// 			start: "top bottom",
		// 			end: "top center",
		// 			scrub: true,
		// 		},
		// 	});
		// });

		// Image reveal animation

		function revealAnimation(selector, axis, percent, scale) {
			gsap.utils.toArray(selector).forEach(function (revealItem) {
				// Check if the revealItem contains an image
				var image = revealItem.querySelector("img");
				if (!image) {
					console.warn("No image found in", revealItem);
					return;
				}

				var tl = gsap.timeline({
					scrollTrigger: {
						trigger: revealItem,
						toggleActions: "play play play reverse",
					},
				});

				// Set initial state
				tl.set(revealItem, { autoAlpha: 1 })
					.from(revealItem, {
						duration: 1.5, // Specify duration directly
						[axis + "Percent"]: -percent, // Use axis + "Percent" for dynamic property names
						ease: "power2.out", // Use string for ease function
					})
					.from(image, {
						duration: 1.5, // Specify duration directly
						[axis + "Percent"]: percent, // Use axis + "Percent" for dynamic property names
						scale: scale,
						delay: -1.5, // Delay for image animation
						ease: "power2.out", // Use string for ease function
					});
			});
		}

		// Call the function with your selectors
		revealAnimation(".reveal-left", "x", 100, 1.3);
		revealAnimation(".reveal-bottom", "y", 100, 1.3);

		// End Document Ready Function
	});
	//--== Progress Bar ==--//
	$(document).ready(function () {
		progress_bar();
	});

	function progress_bar() {
		var speed = 30;
		var items = $(".progress_bar").find(".progress_bar_item");

		items.each(function () {
			var item = $(this).find(".progress");
			var itemValue = item.data("progress");
			var i = 0;
			var value = $(this);

			var count = setInterval(function () {
				if (i <= itemValue) {
					var iStr = i.toString();
					item.css({
						width: iStr + "%",
					});
					value.find(".item_value").html(iStr + "%");
				} else {
					clearInterval(count);
				}
				i++;
			}, speed);
		});
	}
	//--== Progress Bar ==--//

	//---- Range Slide -----//
	const minInput = document.querySelector(".min");
	const maxInput = document.querySelector(".max");
	const minLabel = document.querySelector(".min-label");
	const maxLabel = document.querySelector(".max-label");
	const sliderRange = document.querySelector(".slider-range");

	function updateSlider() {
		let minVal = parseInt(minInput.value);
		let maxVal = parseInt(maxInput.value);

		if (minVal > maxVal) {
			if (this === minInput) {
				maxVal = minVal;
				maxInput.value = maxVal;
			} else {
				minVal = maxVal;
				minInput.value = minVal;
			}
		}

		minLabel.textContent = minVal;
		maxLabel.textContent = maxVal;

		const minPercent =
			((minVal - minInput.min) / (minInput.max - minInput.min)) * 100;
		const maxPercent =
			((maxVal - minInput.min) / (minInput.max - minInput.min)) * 100;

		sliderRange.style.left = `${minPercent}%`;
		sliderRange.style.width = `${maxPercent - minPercent}%`;
	}
	if (minInput && maxInput) {
		minInput.addEventListener("input", updateSlider);
		maxInput.addEventListener("input", updateSlider);

		updateSlider(); // Initial call to set up the slider
	}
	//---- Range Slide -----//

	//---- Quantity -----//
	(function () {
		const quantityContainer = document.querySelector(".quantity");
		if (!quantityContainer) return; // Exit if .quantity doesn't exist on the page

		const minusBtn = quantityContainer.querySelector(".minus");
		const plusBtn = quantityContainer.querySelector(".plus");
		const inputBox = quantityContainer.querySelector(".input-box");

		updateButtonStates();

		quantityContainer.addEventListener("click", handleButtonClick);
		inputBox.addEventListener("input", handleQuantityChange);

		function updateButtonStates() {
			const value = parseInt(inputBox.value);
			minusBtn.disabled = value <= 1;
			plusBtn.disabled = value >= parseInt(inputBox.max);
		}

		function handleButtonClick(event) {
			if (event.target.classList.contains("minus")) {
				decreaseValue();
			} else if (event.target.classList.contains("plus")) {
				increaseValue();
			}
		}

		function decreaseValue() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : Math.max(value - 1, 1);
			inputBox.value = value;
			updateButtonStates();
			handleQuantityChange();
		}

		function increaseValue() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
			inputBox.value = value;
			updateButtonStates();
			handleQuantityChange();
		}

		function handleQuantityChange() {
			let value = parseInt(inputBox.value);
			value = isNaN(value) ? 1 : value;

			// Execute your code here based on the updated quantity value
			console.log("Quantity changed:", value);
		}
	})();
	//---- Quantity -----//

	//Mixitup Filter
	(function () {
		// Check if the container element exists
		var containerEl = document.querySelector(".mixitup-filter");

		if (containerEl) {
			// Initialize MixItUp if the container exists
			var mixer = mixitup(containerEl);
		}
	})();

	// progress-area
	let progressBars = $(".progress-area");
	let observer = new IntersectionObserver(function (progressBars) {
		progressBars.forEach(function (entry, index) {
			if (entry.isIntersecting) {
				let width = $(entry.target)
					.find(".progress-bar")
					.attr("aria-valuenow");
				let count = 0;
				let time = 1000 / width;
				let progressValue = $(entry.target).find(".progress-value");
				setInterval(() => {
					if (count == width) {
						clearInterval();
					} else {
						count += 1;
						$(progressValue).text(count + "%");
					}
				}, time);
				$(entry.target)
					.find(".progress-bar")
					.css({ width: width + "%", transition: "width 1s linear" });
			} else {
				$(entry.target)
					.find(".progress-bar")
					.css({ width: "0%", transition: "width 1s linear" });
			}
		});
	});
	progressBars.each(function () {
		observer.observe(this);
	});
	$(window).on("unload", function () {
		observer.disconnect();
	});
	//end

	function loader() {
		$(window).on("load", function () {
			// Animate loader off screen
			$(".preloader").addClass("loaded");
			$(".preloader").delay(600).fadeOut();
		});
	}

	loader();
})(jQuery); // End jQuery
