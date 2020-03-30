;(function($){
	$(function() {

	// aspects.js
	(function() {
		$('.section-brands__brand').keepAspect({
			ratio: 1/1
		});
		// $('.card-gallery__item').keepAspect({
		// 	ratio: 376/500
		// });

	})();

		// cart.js
		(function() {
			var $cart = $('.cart');
			var $positions = $('.product-position', $cart);
			var $totalFullPlace = $('.cart__total-full-sum', $cart);
			var totalFull = 0;

			init();
			amountHandler();

			function init() {
				preventEnter();
				calc();
			}

			function preventEnter() {
				$('input[name=amount]').keydown(function(event){
					if(event.keyCode == 13) {
						event.preventDefault();
						return false;
					}
				});
			}

			function calc() {
				// $positions.each(function() {
				// 	var $me = $(this);
				// 	var price = $('.position__price', $me).val();
				// 	var amount = $('input[name=amount]', $me).val();
				// 	var total = price * amount;
				// 	var $totalPlace = $('.product-position__sum', $me);
				// 	totalFull += total;
				// 	$totalPlace.html(total);
				// });
				// $totalFullPlace.html(totalFull);
			}

			function amountHandler() {
				$positions.each(function() {
					var $me = $(this);
					var $amount = $('input[name=amount]', $me);

					$amount.change(function() {
						var count = $(this).val();
						count = parseInt(count) || 1;
						count = count < 1 ? 1 : count;
						$(this).val(count);
						calc();
					});
				});
			}
		})();

		// categorySwitchView.js
		(function() {
			var $products = $('.product', '.section-category__products');
			var $switch = $('.switch__state', '.section-category__switch');
			var tilesClass = 'product_view_tile';

			$switch.click(function() {
				switch ($(this).index()) {
					case 0: {
						$products.removeClass(tilesClass);
						break;
					}
					case 1: {
						$products.addClass(tilesClass);
						break;
					}
				}
			});
		})();

		// delivery-data.js
		(function() {
			var $inputs = $('input.radio[name=type]', '.delivery-data');
			var $content = $('.delivery-data__address', '.delivery-data');

			$inputs.click(function() {
				var index = $inputs.index(this);
				$content.css('display', 'none')
					.eq(index)
					.css('display', 'flex');
			});
		})();

		// maskedinput.js
		(function() {
			$('input[type=tel]').mask('+38 (099) 999-99-99', {autoclear: false});
		})();

		// menu.js
		(function() {
			var $menu = $("#menu");
			var $items = $(".menu__item", $menu).has('.menu-l2');
			var timer = null;

			$items
				.addClass('menu__item_has-l2')
				.each(function() {


					$(this).hover(function() {
						var $me = $(this);
						clearTimeout(timer);
						$items
							.not($(this))
							.children('.menu-l2')
							.slideUp(300);
						$me
							.addClass('menu__item_hovered')
							.children('.menu-l2')
							.slideDown(300, function() {
								$(this).css('display', 'flex');
							});
					}, function() {
						var $me = $(this);
						timer = setTimeout(function() {
							$me
								.removeClass('menu__item_hovered')
								.children('.menu-l2')
								.slideUp(300);
						}, 600);
					});
				});
		})();

		// modal.js
		(function() {
			var $modal_callback						= $('#modal-callback-modal');
			var $openers_callback					= $('.modal-callback-opener');
			var $closers_callback					= $('.modal-callback-closer')
																		.add('#overlay');
			var $modal_buy						= $('#modal-buy-modal');
			var $openers_buy					= $('.modal-buy-opener');
			var $closers_buy					= $('.modal-buy-closer')
																		.add('#overlay');

			var $overlay 								= $('#overlay');
			var $page 									= $('#page');
			var pageFixedClass 					= 'page_fixed';
			var showedModalClass 				= 'modal_showed';
			var showedOverlayClass 			= 'overlay_showed';
			var closingDelay 						= 300;

			open($modal_callback, $openers_callback, $closers_callback, $overlay);
			open($modal_buy, $openers_buy, $closers_buy, $overlay);

			function open($modal, $openers, $closers, $overlay) {

				$openers.on('click', function(e) {
					e.preventDefault();
					additionalActions(this);
					$modal.addClass(showedModalClass);
					$overlay.addClass(showedOverlayClass);
					$page.addClass(pageFixedClass);
				});

				$closers.on('click', function() {
					$modal.removeClass(showedModalClass);
					setTimeout(function() {
						$overlay.removeClass(showedOverlayClass);
						$page.removeClass(pageFixedClass);
					}, closingDelay);
				});

				function additionalActions(thisObject) {
					// put your code here
				}
			}
		})();

		// nav.js
		(function() {
			var padding = $('.nav__list', '.nav').height() + 40;
			var $categories = $('.nav__category', '.nav');
			var $items = $('.nav__item', '.nav');
			var closeTimer = null;
			var openTimer = null;
			var $current = null;
			var index;
			var openDelay = 400;
			var closeDelay = 500;

			init();

			function init() {
				$categories.each(function() {
					$(this).css('padding-top', padding);
				});
			}

			$items.hover(function() {
				clearTimeout(closeTimer);
				index = $(this).index();
				$categories.not($categories.eq(index)).slideUp();
				$('a', $items).removeClass('hovered');
				$('a', this).addClass('hovered');

				clearTimeout(openTimer);

				openTimer = setTimeout(function() {
					if (!$categories.eq(index).is(':visible')) {
						$categories.eq(index).slideDown();
					}
				}, openDelay);


			}, function() {

				clearTimeout(openTimer);

				closeTimer = setTimeout(function() {
					$categories.slideUp();
					$current = null;
					$('a', $items).removeClass('hovered');
				}, closeDelay);
			});

			$categories.hover(function() {
				clearTimeout(closeTimer);
			}, function() {
				closeTimer = setTimeout(function() {
					$categories.slideUp();
					$current = null;
					$('a', $items).removeClass('hovered');
				}, closeDelay);
			});
		})();

	// onload.js
	(function() {
		// $(window).on('load', function() {
		// 	setTimeout(function() {
		// 		fadePreloader();
		// 	}, 1000);
		// });
		//
		//
		// function fadePreloader() {
		// 	$('#preloader').fadeOut(2000);
		// 	$('#preloader-overlay').fadeOut(1500);
		// }
	})();

		// onTouch.js
		(function() {

			if (isTouch()) {

			}

			function isTouch() {
				return !!('ontouchstart' in window);
			}
		})();

		// slidebox.js
		(function() {
			var $boxes = $('.section-category__filters .slide-box');

			$boxes.each(function() {
				var $toggle = $('.toggle', this).eq(0);
				var $content = $('.woocommerce-widget-layered-nav-list', this).eq(0);
				var toggleActiveClass = 'toggle_active';

				$toggle.click(function() {
					console.log(this);
					$content.slideToggle(200);
					$(this).toggleClass(toggleActiveClass);
				});
			});
		})();

	// sliders.js
	(function() {
		$(".owl-carousel_featured").owlCarousel({
			items: 1,
			dots: false,
			nav: true,
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 700,
			touchDrag: true,
			mouseDrag: true,
			navText: ['',''],
			autoHeight: false,
			margin: 0,
			responsive : {
					0: {
						touchDrag: true,
						mouseDrag: false,
					},
					1201: {
						touchDrag: true,
						mouseDrag: true,
					}
				}
		});
		$(".owl-carousel_gallery").owlCarousel({
			items: 1,
			dots: false,
			nav: true,
			loop: false,
			autoplay: false,
			touchDrag: true,
			mouseDrag: true,
			navText: ['',''],
			autoHeight: false,
			margin: 0,
			responsive : {
					0: {
						touchDrag: true,
						mouseDrag: false,
					},
					1201: {
						touchDrag: true,
						mouseDrag: true,
					}
				}
		});

		$(".owl-carousel_recent").owlCarousel({
			items: 4,
			dots: false,
			nav: true,
			loop: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplaySpeed: 700,
			touchDrag: true,
			mouseDrag: true,
			navText: ['',''],
			autoHeight: false,
			autoplayHoverPause: true,
			responsive : {
				0: {
					touchDrag: true,
					mouseDrag: false,
					items: 1,
					center: true,
					margin: 0,
					// autoWidth: true
				},

				551: {
					items: 2,
					margin: 30,
				},

				769: {
					items: 3,
					center: true,
					margin: 30
				},
				991: {
					items: 3,
					center: true
				},
				1201: {
					touchDrag: true,
					mouseDrag: true,
					items: 4,
					margin: 20
				}
			}
		});


		$(".owl-carousel_brands").owlCarousel({
			items: 5,
			dots: false,
			nav: true,
			loop: true,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplaySpeed: 700,
			touchDrag: true,
			mouseDrag: true,
			navText: ['',''],
			autoHeight: false,
			autoplayHoverPause: true,
			center: true,
			responsive : {
				0: {
					touchDrag: true,
					mouseDrag: false,
					items: 1,
					center: true,
					margin: 0,
					// autoWidth: true
				},

				551: {
					items: 3,
					margin: 30,
				},

				769: {
					items: 3,
					center: true,
					margin: 30
				},
				991: {
					items: 5,
					center: true
				},
				1201: {
					touchDrag: true,
					mouseDrag: true,
					items: 5,
					margin: 0,
					center: true
				}
			}
		});

		$(".owl-carousel_aside").owlCarousel({
			items: 1,
			dots: true,
			nav: false,
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			autoplaySpeed: 700,
			touchDrag: true,
			mouseDrag: true,
			navText: ['',''],
			autoHeight: false,
			margin: 0,
			responsive : {
					0: {
						touchDrag: true,
						mouseDrag: false,
					},
					1201: {
						touchDrag: true,
						mouseDrag: true,
					}
				}
		});

	})();

		// switch.js
		(function() {
			$('.switch').each(function() {
				var $states = $('.switch__state', this);
				var activeClass = 'switch__state_active';

				$states.click(function(e) {
					e.preventDefault();
					$states.removeClass(activeClass);
					$(this).addClass(activeClass);
				});
			});
		})();

		// totop
		(function() {
			var $totop = $('#totop');
			var isScrolling = false;
			var scrollThreshold = 100;
			var scrollDuration = 600;
			var showedClass = 'totop_showed';

			$(window).on('scroll', function() {
				if ($(window).scrollTop() > scrollThreshold) {
					$totop.addClass(showedClass);
				} else {
					$totop.removeClass(showedClass);
				}
			});

			$totop.on('click', function(e) {
				e.preventDefault();
				if (!isScrolling) {
					isScrolling = true;
					$("html, body").animate({scrollTop: 0}, scrollDuration, function() {
						isScrolling = false;
					});
				}
			});
		})();

		// touch-panel.js
		(function() {
			var $panel 							=	$('#touch-panel');
			var $openers 						=	$('.touch-panel-opener');
			var $closers 						=	$('.touch-panel-closer')
																	.add('#overlay');
			var $overlay 						=	$('#overlay');
			var $page 							=	$('#page');
			var pageFixedClass 			=	'page_fixed';
			var showedPanelClass 		=	'touch-panel_showed';
			var showedOverlayClass 	=	'overlay_showed';
			var closingDelay 				= 300;

			$openers.on('click', function(e) {
				e.preventDefault();
				$panel.addClass(showedPanelClass);
				$overlay.addClass(showedOverlayClass);
				$page.addClass(pageFixedClass);
			});

			$closers.on('click', function() {
				$panel.removeClass(showedPanelClass);
				setTimeout(function() {
					$overlay.removeClass(showedOverlayClass);
					$page.removeClass(pageFixedClass);
				}, closingDelay);
			});
		})();

		// xzoom.js
		(function() {
			// $(".xzoom").xzoom({tint: '#333', Xoffset: 15});
			$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: false, tint: '#333', Xoffset: 15});
		})();


	});
})(jQuery);

/*--------MAIN-----------*/
jQuery(document).ready(function() {
   let $ = jQuery;
   let seoLinks = $('.term-description a');

   [...seoLinks].forEach(e=>{
   	function removeSplash(text){
   	  let l = text[text.length -1];
   	  if(l === '/') removeSplash(text.substring(0,text.length -1))
   	  	else href = text;
   }
   	let href = e.href.replace(/['"«»%22]/g,'').replace(/[\\]/g,'').replace('file:','');
   	removeSplash(href);

   	if(href.includes('https://kelt.com.ua/')){
   		href = href.replace('https://kelt.com.ua', '');
   	}
   	if(href.includes('https://kelt.com.u')){
   		href = href.replace('https://kelt.com.u', '');
   		href = 'https://kelt.com.ua' + href;
   	}
   	if(href.includes('/a/')){
   		href = href.replace('/a/','/');
   	}
   	e.href = href;;
   })


    jQuery('#first_bl #billing_address_1_field').remove();
	jQuery('#first_bl #billing_city_field').remove();
	jQuery('#first_bl #billing_postcode_field').remove();
	//
	jQuery('#next_bl #billing_first_name_field').remove();
	jQuery('#next_bl #billing_last_name_field').remove();
	jQuery('#next_bl #billing_email_field').remove();
	jQuery('#next_bl #billing_phone_field').remove();
	//jQuery('body #next_bl:nth-child(6)').remove();
	//jQuery('body #next_bl:nth-child(7)').remove();
});
jQuery(document).ready(function() {
});
jQuery(document).ready(function() {
	jQuery( ".swatchinput" ).click(function() {
		setTimeout(function(){
	  		var pr_vr = jQuery('.woocommerce-variation-price .woocommerce-Price-amount').html();
			jQuery('.card__price').html(pr_vr);
		}, 200);
	});
});
// REMOVE ID
jQuery('[id]').each(function() {
    var idAttr = jQuery(this).attr('id'),
        selector = '[id=' + idAttr + ']';
    if (jQuery(selector).length > 1) {
        if (jQuery(selector).not(':first').hasClass('form-subscribe__input')) {
        	// do nothing
        } else {
            jQuery(selector).not(':first').remove();
        }
    }
});

jQuery(document).ready(function() {
	//jQuery('.storefront-sorting').remove();
    $(document).ajaxComplete(function (event, xhr, settings) {
        if (jQuery('#billing_city').length > 0) {
            if (jQuery('#billing_city')[0].tagName == 'SELECT') {
                jQuery('#billing_city').select2();
            }
        }

        if (jQuery('form.checkout.woocommerce-checkout').length) {
        	var form  = jQuery('form.checkout.woocommerce-checkout');
            form.find('input[name="billing_phone"]:eq(1)').remove();
            form.find('input[name="billing_first_name"]:eq(1)').remove();
            form.find('input[name="billing_last_name"]:eq(1)').remove();
            form.find('input[name="billing_email"]:eq(1)').remove();
            form.find('input[name="billing_phone"]:eq(1)').remove();
        }
    });

    $('.touch-panel__container .slide-box__toggle.toggle').click(function () {
		jQuery(this).toggleClass("toggle_active");
        jQuery(this).parent().parent().find(">.slide-box__content").slideToggle(200);
    });

    // jQuery(".slide-box").each(function () {
    // 	var _box  = $(this);
    // 	console.log('11');
    //     jQuery(".toggle", this).click(function () {
    //         console.log('click');
    //         jQuery(".slide-box__content", _box).slideToggle(200);
    //         jQuery(this).toggleClass("toggle_active");
    //     });
    // });

});

//SELECTED
//var col = jQuery('.section-category__products .product').length;
//var val = text = '27';
//jQuery(".wppp-select option[value=" + col + "]").attr('selected', 'true').text(col);
if (jQuery('.section-category__products .product').length > 0 ) {
	var dev = '9';
    jQuery(".wppp-select option[value=" + dev + "]").attr('selected', 'true');
}
if (jQuery('.section-category__products .product').length > 9) {
	var vs = '18';
    jQuery(".wppp-select option[value=" + vs + "]").attr('selected', 'true');
}
if (jQuery('.section-category__products .product').length > 18) {
	var dv = '27';
    jQuery(".wppp-select option[value=" + dv + "]").attr('selected', 'true');
}
if (jQuery('.section-category__products .product').length > 27) {
	var tr = '36';
    jQuery(".wppp-select option[value=" + tr + "]").attr('selected', 'true');
}