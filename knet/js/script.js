/*$('#submitForm').one('submit',function(){
			$(this).find('input[type="submit"]').attr('disabled','disabled')
		})*/
		
		function disable(event){
  document.getElementById('submitFormButton').setAttribute("disabled", "disabled");
  document.getElementById("submitForm").submit(); 
}
const btn = document.getElementById('submitFormButton')
btn.addEventListener('click',disable)
		
/**
 * Number.prototype.format(n, x)
 * 
 * @param integer n: length of decimal
 * @param integer x: length of sections
 */

Number.prototype.format = function (n, x) {
	var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
	return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
};

Number.prototype.pad = function (size) {
	var s = String(this);
	while (s.length < (size || 2)) { s = "0" + s; }
	return s;
}

/* Sample function that returns boolean in case the browser is Internet Explorer*/
function isIE() {
	let ua = navigator.userAgent;
	/* MSIE used to detect old browsers and Trident used to newer ones*/
	var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

	return is_ie;
}




function prayerTimeBlock() {

	let language = $('html').attr('lang');

	HijriDate.defaultLocale = language;
	let today = new HijriDate();
	today = { 'day': today.format('ddd'), 'd': today.format('dd'), 'm': today.format('mmmm'), 'y': today.format('yyyy') };
	$('#hijri-date').text(today.day + ', ' + today.d + ' ' + today.m + ' ' + today.y);

	prayTimes.setMethod('Kuwait');
	prayTimes.adjust({ 'highLatMethods': 'NightMiddle' });
	let times = prayTimes.getTimes(new Date(), [29.3759, 47.9774], 3, 'auto', 'Float');

	let list = ['Fajr', 'Sunrise', 'Dhuhr', 'Asr', 'Maghrib', 'Isha'];
	let arList = ['الفجر', 'الشروق', 'الظهر', 'العصر', 'المغرب', 'العشاء'];

	today = new Date();
	let nTime = parseInt(today.getHours()) + parseInt(today.getMinutes()) / 60.0;

	for (var i in list) {

		let time = times[list[i].toLowerCase()];
		let mTime = parseFloat(time);

		if (mTime >= nTime) {
			let label = language === 'en' ? list[i].toUpperCase() : arList[i].toUpperCase();
			let hours = Math.floor(mTime);
			let minutes = Math.floor((mTime - hours) * 60.0);
			let symbol = (language === 'en' ? 'AM' : 'ص');
			if (hours >= 12) { symbol = (language === 'en' ? 'PM' : 'م'); }
			if (hours > 12) { hours -= 12; }

			$('#prayer-time').text(label + ' ' + hours.pad() + ':' + minutes.pad() + ' ' + symbol);
			break;
		}
	}
}

function hasTouch() {
	var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
	var mq = function(query) {
	  return window.matchMedia(query).matches;
	}
  
	if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
	  return true;
	}
  
	// include the 'heartz' as a way to have a non matching MQ to help terminate the join
	// https://git.io/vznFH
	var query_ = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
	return mq(query_);
  }
  
  
  $(document).ready(function () {
  
	  if (!hasTouch()) {
		  document.body.className += ' hasHover';
	  }

	if (!Object.keys) {
		Object.keys = (function () {
			'use strict';
			var hasOwnProperty = Object.prototype.hasOwnProperty,
				hasDontEnumBug = !({ toString: null }).propertyIsEnumerable('toString'),
				dontEnums = [
					'toString',
					'toLocaleString',
					'valueOf',
					'hasOwnProperty',
					'isPrototypeOf',
					'propertyIsEnumerable',
					'constructor'
				],
				dontEnumsLength = dontEnums.length;

			return function (obj) {
				if (typeof obj !== 'object' && (typeof obj !== 'function' || obj === Null)) {
					throw new TypeError('Object.keys called on non-object');
				}

				var result = [], prop, ind;

				for (prop in obj) {
					if (hasOwnProperty.call(obj, prop)) {
						result.push(prop);
					}
				}

				if (hasDontEnumBug) {
					for (ind = 0; ind < dontEnumsLength; ind++) {
						if (hasOwnProperty.call(obj, dontEnums[ind])) {
							result.push(dontEnums[ind]);
						}
					}
				}
				return result;
			};
		}());
	}
	
	
	let $stickymenu = $('stickymenu');
	let $items = $('<items/>');
	$stickymenu.append($items);

	$stickymenu.mouseenter(function () {

	});

	$stickymenu.mouseleave(function () {
		$stickymenu.removeClass('active');
		$stickymenu.find('items > item').removeClass('active');
		$stickymenu.children('items').removeClass('active');
		$stickymenu.children('a').removeClass('active');
		//$stickymenu.children('items').css('--itemsheight', 0);
	});

	$stickymenu.children('a').each(function (i_stickymenu, e) {

		let $a_ = $(e);

		let $item = $a_.next('item');
		$items.append($item);

		$a_.on('mouseenter click', function (e_click) {


			let isActive = $(this).hasClass('active');

			if (isActive === true) {
				if (e.type === 'click') {
					$stickymenu.removeClass('active');
					$stickymenu.children('items').removeClass('active');
					$stickymenu.find('items > item').removeClass('active');
					$stickymenu.children('a').removeClass('active');
				}
			} else {
				$stickymenu.children('items').removeClass('active');
				$stickymenu.find('items > item').removeClass('active');
				$stickymenu.children('a').removeClass('active');

				$item.find('a').first().trigger('mouseenter');

				$(this).addClass('active');
				$items.addClass('active');
				$item.addClass('active');
				//$items.css('--itemsheight', $($item).height());
				$stickymenu.addClass('active');
			}
		});

		let $side = $('<side/>');
		let $contents = $('<contents/>');

		$item.prepend($contents);
		$item.prepend($side);


		$item.children('a').each(function (i_item, e_item) {

			let $a_2 = $(e_item);
			let $subitem = $a_2.next('subitem');

			if ($subitem.find('subitem').length > 0) {
				$subitem.addClass('nested');
			}

			if ($subitem.hasClass('nested')) {

				let $side_ = $('<side/>');
				let $contents_ = $('<contents/>');

				$subitem.prepend($contents_);
				$subitem.prepend($side_);

				$subitem.children('a').each(function (i_subitem, e_subitem) {
					let $a_3 = $(e_subitem);
					let $subitem_3 = $a_3.next('subitem');

					$side.append($a_3);
					$contents.append($subitem_3);

					$a_3.on('mouseenter', function (e_mouseenter) {
						$contents.children('subitem').removeClass('active');
						$side.children('a').removeClass('active');

						$a_3.addClass('active');
						$subitem_3.addClass('active');

						setTimeout(function () {
							let height_ = $($items).find('item.active').height();
							$($items).css('--itemsheight', height_);

							// let ua_ = window.navigator.userAgent;
							// let msie = ua_.indexOf('MSIE ');
							// let trident = ua_.indexOf('Trident/');
							
						}, 100);
					});
				});

				$subitem.find('a').first().trigger('mouseenter');
			}

			$a_2.on('mouseenter', function (e_mouseentere) {

				$contents.children('subitem').removeClass('active');
				$side.children('a').removeClass('active');

				//$items.css('--itemsheight', $item.height());
				$a_2.addClass('active');
				$subitem.addClass('active');

				setTimeout(function () {
					let heighti = $($items).find('item.active').height();
					$($items).css('--itemsheight', heighti);

					// let uai = window.navigator.userAgent;
					// let msie = uai.indexOf('MSIE ');
					// let trident = uai.indexOf('Trident/');
					
				}, 100);
			});

			$side.append($a);
			$contents.append($subitem);
		});

	});

	var arabicNumber = /[\u0660-\u0669]|[0-9]/;
	$('.number').each(function(index, e_number){
		$(e_number).keyup(function(val){
			val.preventDefault();
			var inputVal=val.target.value;
			if(!arabicNumber.test(inputVal[inputVal.length-1]))
				val.target.value=inputVal.substring(0,inputVal.length-1);
		});
	});

	$('rbx-selecter').each(function (i_selecter, e_selecter) {
		let $selector = $(e_selecter);
		let $select = $selector.children('select');
		let $placeholder_select = $selector.attr('placeholder-select');
		let $placeholder = $selector.attr('placeholder');
		let $isCurrency = $selector.attr('is-currency');
		$select.css({ 'width': '100%' });
		$select.select2({
			minimumResultsForSearch: 20,
			placeholder: {
				id: '-1', // the value of the option
				text: $placeholder
			},
			templateSelection: function (data) {
				if (data.id === '-1') {
					return $('<span class="select-placeholder">' + $placeholder_select + '</span>&nbsp;<span class="text-placeholder">' + data.text + '</span>');
				}

				if ($isCurrency) {
					let description = "";
					let iso = "";
					
					if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) )
					{
						iso = '<span style="font-size: 14px; line-height: 46px; height: 14px; color: #A9ABAC">' + data.text.substring(0, 3) + '</span>';
						description = '<span class="mt-1" style="display:none; font-size: 14px; line-height: 16px; height: 16px; color: #54585A">' + data.text.substring(4) + '</span>';
					}
					else
					{
						iso = '<span style="font-size: 14px; line-height: 20px; height: 14px; color: #A9ABAC">' + data.text.substring(0, 3) + '</span>';
						description =  '<span class="mt-1" style="font-size: 14px; line-height: 16px; height: 16px; color: #54585A">' + data.text.substring(4) + '</span>';
					}
					let image = '<div id="selectionCurrencyFlag" class="mt-1 mb-1 me-1 selectionCurrencyFlag" style="grid-row: 1/3;"><div class="flagContainer"><img src="/static/bbyn_currency_exchangerate/flags/'+data.text.substring(0,3).toLowerCase()+'.svg" /></div></div>';

					let label =
						'<span style="display:grid; height: 48px; font-weight: normal; grid-template-columns: auto 1fr;grid-template-rows: auto 1fr;">' +
						image + description + iso +
						'</span>';

					return $(label);
				}
				return data.text;
			},
			templateResult: function (data) {
				if ($isCurrency) {
					let iso ="";
					let description_ = "";
					if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
					{
						iso_ = '<span style="font-size: 10px; line-height: 14px; height: 14px;">' + data.text.substring(0, 3) + '</span>';
						description_ = '<span class="mt-1" style="display:none; font-size: 14px; line-height: 16px; height: 16px;">' + data.text.substring(4) + '</span>';
					}
					else
					{
						iso_ = '<span style="font-size: 10px; line-height: 14px; height: 14px;">' + data.text.substring(0, 3) + '</span>';
						description_ = '<span class="mt-1" style="font-size: 14px; line-height: 16px; height: 16px;">' + data.text.substring(4) + '</span>';
					}
					let image_ = '<div id="resultCurrencyFlag" class="mt-1 mb-1 me-1" style="grid-row: 1/3;" ><div class="flagContainer"><img src="/static/bbyn_currency_exchangerate/flags/'+data.text.substring(0,3).toLowerCase()+'.svg" /></div></div>';

					let label =
						'<span style="display:grid; height: 48px; padding: 0 10px; font-weight: normal; grid-template-columns: auto 1fr;grid-template-rows: auto 1fr;">' +
						image_ + description_ + iso_ +
						'</span>';

					return $(label);
				}
				return $('<span style="padding: 0 8px">' + data.text + '</span>');
			}
		});
	});

	$('rbx-textfield').each(function (i_textfield, e_textfield) {
		let $textfield = $(e_textfield);
		let $input = $textfield.children('input')[0];

		let $type = $textfield.attr('type');

		if ($type === 'currency') {
			new AutoNumeric($input, {
				alwaysAllowDecimalCharacter: true,
				decimalPlaces: 3,
				digitGroupSeparator: "",
				// emptyInputBehavior: "zero"
			});
		}
	})

	$('.mobileCalculator').change(function(e_mobileCalculator){
		if (e_mobileCalculator.target.tagName != 'SELECT') return;
		$('input[type=range]').each(function(ier, e_range){
			$(e_range).val(0);
		})
	});

	$('rbx-slider').each(function (i_slider, e_slider) {
		let $slider = $(e_slider);
		let $input = $slider.children('input[type=range]');
		let $output = $('<output></output>');
		let $thumb = $('<thumb></thumb>');
		let $minLabel = $('<label class="min"></label>');
		let $maxLabel = $('<label class="max"></label>');
		$slider.prepend($output);
		$slider.append($thumb);
		$slider.append($minLabel);
		$slider.append($maxLabel);

		let min = parseFloat($input.attr('min'));
		let max = parseFloat($input.attr('max'));
		let value = parseFloat($input.attr('value'));
		//let alpha = (( value - min) / (max - min) * 100);
		//$slider.css('--alpha', alpha+'%');

		//console.log(min, max, $input.attr('value'), alpha);
		

		$minLabel.text(min.format(0, 3));
		$maxLabel.text(max.format(0, 3));

		$input.on('input', function () {
			let minim = parseFloat(this.min);
			let maxim = parseFloat(this.max);
			let valueim = parseFloat(this.value);
			let alpha = ((valueim - minim) / (maxim - minim) * 100.0);
			if ($('html').attr('dir') === 'rtl') {
				// alpha = 100 - alpha;
			}

			$slider.css('--alpha', alpha.toFixed(3) + '%');

			$output.text(valueim.format(0, 3));

			let parentWidth = $slider.width();
			let half_width = $output.width() / 2.0;
			let fix = half_width / parentWidth * 100;
			let offsetim =""
			if (alpha <= 50) {
				offsetim = Math.max(alpha, fix);
				$output.css('margin-left', -half_width + 'px');
				$output.css('margin-right', 0);
				$output.css('left', offsetim + '%');
				$output.css('right', 'auto');

				offsetim = Math.max(alpha, 0);
				$thumb.css('margin-left', -10 + 'px');
				$thumb.css('margin-right', 'auto');
				$thumb.css('left', offsetim + '%');
				$thumb.css('right', 'auto');
			} else {
				offsetim = Math.min(alpha, 100 - fix);
				$output.css('margin-left', 0);
				$output.css('margin-right', -half_width + 'px');
				$output.css('left', 'auto');
				$output.css('right', (100 - offsetim) + '%');

				$thumb.css('margin-left', 'auto');
				$thumb.css('margin-right', -10 + 'px');
				$thumb.css('right', (100 - alpha) + '%');
				$thumb.css('left', 'auto');
			}

		});

		$input.trigger('input', value);

	});

	$('rbx-loader').append('<div></div><div></div><div></div><div></div>')

	let $stickytools = $('section.sticky-tools');
	$stickytools.on('click', function (e_click) {
		let height_c = $(window).height();
		let footer_c = $stickytools.height();
		if(isIE()){
			if(e_click.target.tagName === 'SECTION'){
				$stickytools.find('rbx-sticky-tabs a').removeClass('active');
				$stickytools.removeClass('sticky-tools-show');
				$('body').removeClass('no-scroll');
			}
		}else if (e_click.originalEvent.y < height_c - footer_c) {
			if (e.target.tagName !== 'A') {
				$stickytools.find('rbx-sticky-tabs a').removeClass('active');
				$stickytools.removeClass('sticky-tools-show');
				$('body').removeClass('no-scroll');
			}
		}

	});

	$stickytools.find('rbx-sticky-tabs a').on('click', function (e_tabs, i_tabs) {
		e_tabs.preventDefault();

		let panelId = $(this).attr('target-panel-id');
		let isActive = $(this).hasClass('active');

		$stickytools.find('rbx-sticky-tabs a').removeClass('active');
		$stickytools.find('rbx-sticky-tab-panel').removeClass('active');
		$stickytools.find('rbx-sticky-tab-panel[panel-id="' + panelId + '"]').addClass('active');

		if (isActive === false) {
			$(this).addClass('active');
			$stickytools.addClass('sticky-tools-show');
			$('body').addClass('no-scroll');
		} else {
			$stickytools.removeClass('sticky-tools-show');
			$('body').removeClass('no-scroll');
		}
	});

	let $window = $(window);

	$window.on('scroll', function () {

		if ($('html').hasClass('cms-toolbar-expanded') === true) return;

		if ($window.scrollTop() >= 1) {
			$('body').addClass("sticky");
		} else {
			$('body').removeClass("sticky");
		}


		let height_er = $(document).height();
		let footer_er = $('footer').height();
		let cHeight_er = height_er - $(window).height();

		if (offset >= cHeight_er - footer_er) {
			// $('.sticky-tools').css({ opacity: 0 }).hide();
		} else {
			$('.sticky-tools').show().css({ opacity: 1 });
		}
	});

	let offset = $window.scrollTop();
	let height_en = $(document).height();
	let footer_en = $('footer').height();
	let cHeight_en = height_en - $(window).height();

	if (offset >= cHeight_en - footer_en) {
		// $('.sticky-tools').css({ opacity: 0 }).hide();
	} else {
		$('.sticky-tools').show().css({ opacity: 1 });
	}

	// prayerTimeBlock();

	$('news-letter').click(function () {
		if ($('news-letter > form').is(":hidden") === true) {
			$('news-letter > form').show();
		}
	})




	$("[fade-up]").each(function (ivre, e_fade) {
		ScrollReveal().reveal(e_fade, {
			scale: 0.95,
			delay: 2000,
			useDelay: 'onload'
		});
	});

	$('rbx-card').not('.wizard-card').click(function (e_card) {
		e_card.preventDefault();
		window.location = $(this).find('a').attr('href');
	})

	$('.video-card div').mouseenter(function (e_video) {
		e_video.preventDefault();
		const greyBar = $(this).parent().find('rbx-block');
		greyBar.animate({bottom:-110},200);
	});

	$('.video-card div').mouseleave(function (e_videos) {
		e_videos.preventDefault();
		const greyBar = $(this).parent().find('rbx-block');
		greyBar.animate({ bottom: 0 }, 200);
	});


	if ($('rbx-front-carousel').length) {
		$('rbx-front-carousel').addClass('owl-carousel owl-theme').owlCarousel({
			loop: true,
			margin: 64,
			rtl: ($('html').attr('dir') === 'rtl') ? true : false,
			items: 1,
			autoplayHoverPause: false,
			autoplay: true,
			autoplayTimeout:8000,
			autoplaySpeed:3000,
			smartSpeed: 1500
		});
	}

	$('.murabahafincalc').on('click', function (e_murabahafincalc, i_murabahafincalc) {
		e_murabahafincalc.preventDefault();
		$stickytools.addClass('sticky-tools-show');
		$('body').addClass('no-scroll');
		if($('html').attr('dir') === 'rtl')
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { right: "0" }, ease: Quad.easeInOut });
		else
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { left: "0" }, ease: Quad.easeInOut });
	});


    /*
        By Menawer
        Adding the class 'next-tip' to the carousin rbx-front-carousel tag, we get a next-tip clickable element
    */
	$('rbx-front-carousel.next-tip rbx-front-carousel-item rbx-block').append('<span class="font-16 light-grey next-tip-button">Next tip</span>');

	//adding "next-tip" text to the login page 
	$('.next-tip-button').click(function () {
		$(this).closest('.owl-carousel').trigger('next.owl.carousel');
	});

	$('.login-dropdown').mouseenter(function () {
		$('.login-menu-container').fadeIn();
	});

	$('.login-dropdown').mouseleave(function () {
		$('.login-menu-container').fadeOut();
	});

	var movedLoginContainer=false;
	$('#login-dropdown-mobile').click(function(){
		if(!movedLoginContainer){
			movedLoginContainer=true;
			$(this).append($('.login-menu-container').parent().html());
			$(this).find('#login-button').remove();
			$(this).find('.login-menu-container').css({
				opacity: 1,
				right:35,
				top:52
			});
			$(this).find('.login-button').remove();
		}else{
			if($(this).find('.login-menu-container').is(':visible')){
				$(this).find('.login-menu-container').css({
					display: 'none'
				});
			}else{
				$(this).find('.login-menu-container').css({
					display: 'block'
				});
			}
		}
	})
let oldModal

	//when a modal has a button with action="close-modal" it will automatically search for closest parent with .modal class and close it
	$('[action="close-modal"], .modalTemp').click(function (e_close) {
		// commented by samer
		if (e_close.target != this) return;
		$(this).closest('.modalTemp').addClass('hidden');
		$('[modal-component]').addClass('hidden');
		let $stickytools_m = $('section.sticky-tools');
		$stickytools_m.css('display', 'block');
		// $('body').removeClass('mobileModal');
		$("#toAmount").val('');
		$("#frmAmount").val('');
	});

	//any tag with [modal='example'] will be a toggle button for the modal named 'example'
	$('[modal]').click(function () {
		let $stickytools_s = $('section.sticky-tools');
		$stickytools_s.css('display', 'none');
		let relatedModal = $('#' + $(this).attr('modal'));
		console.log(oldModal)
		if(oldModal==undefined){
oldModal=relatedModal
		}else{
		//	oldModal=$(this)
		//	alert('hh')
// oldModal.closest('.modalTemp').addClass('hidden');
oldModal.addClass('hidden');

oldModal=relatedModal
		}
	//	console.log(relatedModal)
		relatedModal.closest('.modalTemp').removeClass('hidden');
		relatedModal.removeClass('hidden');
		$("#toAmount").val('');
		$("#frmAmount").val('');
		// $('body').addClass('mobileModal');
	});

	//any ul list with convertable-dropdown class will trigger a generate dropdown menu
	if ($('ul.convertable-dropdown').length) {
		let s = $('<select class="mobile-filter" />');

		$('ul.convertable-dropdown li').each(function (index) {
			let element = $.trim($(this).text());
			let elementValue = $(this).attr('value');
			$('<option />', { value: elementValue, text: element}).appendTo(s);

		});
		s.appendTo('.filter-position');
	}

	//Accordion
	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
		acc[i].addEventListener("click", function () {
			this.classList.toggle("active");
			$(this).next().toggleClass('active');

			var panel = this.nextElementSibling;
			if (panel.style.maxHeight) {
				panel.style.maxHeight = null;
			} else {
				panel.style.maxHeight = panel.scrollHeight + "px";
				if($(this).parents('.panel').length)
					$(this).parent().css('maxHeight','1000px');
			}
		});
	}

	if($('div.mobiles-carousel').length){
		$('div.mobiles-carousel').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			speed:300,
			autoplay:true,
			infiniti:false,
			rtl: ($('html').attr('dir') === 'rtl') ? true : false,
			arrows:false,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					dots:true
					}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots:true
					}
				}
			]
		});
	}
	
	if ($('rbx-carousel > rbx-block').length) {
		$('rbx-carousel > rbx-block').each(function (i_block, l) {
			let centered = false;
			let noDots = false;
			let noNavs = false;
			let loop = false;
			let autoPlay =  false;
			let autoWidth = true;

			if ($(this).closest('rbx-carousel').hasClass('carousel-centered'))
				centered = true;

			if ($(this).closest('rbx-carousel').hasClass('no-dots'))
				noDots = true;

			if ($(this).closest('rbx-carousel').hasClass('no-navs'))
				noNavs = true;

			// if ($(this).closest('rbx-carousel').hasClass('no-loop'))
			// 	loop = false;

			if ($(this).closest('rbx-carousel').hasClass('autoplay'))
				autoPlay = true;

			if ($(this).closest('rbx-carousel').hasClass('noAutoWidth'))
				autoWidth = false;

			$(this).addClass('owl-carousel owl-theme').owlCarousel({
				loop: loop,
				autoplay: autoPlay,
				margin: 64,
				rtl: ($('html').attr('dir') === 'rtl') ? true : false,
				//autoplay: true,
				items:1,
				autoWidth: autoWidth,
				dotsEach: false,
				responsiveClass: false,
				responsive: {
					0: {
						margin: 16,
						nav: true,
						center: centered
					},
					480: {
						
						margin: 34,
						nav: false,
						center: centered
					},
					640: {
						
						margin: 36,
						nav: false,
						center: centered
					},
					960: {
						
						margin: 38,
						nav: true
					},
					1280: {
						items:1,
						margin: 56,
						nav: true
					}
				},
				dots: !noDots,
				nav: !noNavs,
			});
		});
	}

	$('div.survey span:not(.clicked-rate)').hover(function () {
		if ($(this).hasClass('clicked-rate')) return;
		$(this).next().addClass('next-hovered');
		$(this).addClass('hovered');
	}, function () {
		$(this).next().removeClass('next-hovered');
		$(this).removeClass('hovered');
	});
	$('div.survey span').click(function () {
		let cuttentid = $(this).parent().attr('id');
		$('#'+cuttentid+' span').removeClass('clicked-rate');
		$('#survey_rate_question'+cuttentid).val(this.innerHTML);
		$(this).removeClass('hovered');
		$(this).toggleClass('clicked-rate');
	});

	if ($('ul[tab_txt] li').length) {
		let first = $('.tabcontent').first();
		if($('html').attr('dir') === 'rtl'){
			var list = $('ul[tab_txt]');
			var listItems = list.children('li');
			list.append(listItems.get().reverse());
			
			const current_margin = parseInt($('ul[tab_txt] li').last().css("margin-left"));
			var leftPos = $('ul[tab_txt] li').last().position().left + current_margin;

			$('ul[tab_txt] hr').css({ width: $('ul[tab_txt] li').last().outerWidth(),left: leftPos});
		}else{
			$('ul[tab_txt] hr').css({ width:"100%" });
		}
		first.css('display', 'block');
	}

	$('.subpagecontenttab[tab_txt] li').click(function () {
		$('ul[tab_txt] li').attr('selected', false);
		$(this).attr('selected', true);
		// const current_margin = parseInt($(this).css('margin-left'));
		
		// let newPosition = $(this).index() == 0 ? 0 : $(this).position().left + current_margin;
		let target = $('#' + $(this).attr('target-id'));
		let newWidth = "100%";

		$('.tabs-controls-container').animate({ scrollLeft: $(this).position().left - 70 }, 1000);
		$('ul[tab_txt] hr').css({ width: newWidth, left: 0 });
		
		TweenMax.to($('.tabcontent'), 0.162, { css: { opacity: 0 }, ease: Quad.easeInOut,
		onComplete: function(){
			$('.tabcontent').css('display', 'none');
			target.css('display', 'block');
			$('.tabs-nav1 li:first-child').attr('selected','');
			let activeTab = '#' + $('.tabs-nav1 li:first-child').attr('target-id');
			TweenMax.to(target, 0.162, { css: { opacity: 1 },delay:0.162, ease: Quad.easeInOut });
			//change by abdullah
			//activeTab always undefined so it was changed to be $('.tabs-nav1 li:first-child')
			$('.tabs-nav1 li:first-child').css('display', 'block');
			$('.tabs-nav1 li:first-child').css('opacity', 1);
		}});
	});

	//search call api call here and assign it to search_result instead of this fake data

	// let search_result = JSON.stringify({
	// 	"results": [
	// 		{ "id": 1, "details": "Replacing ‘loan’ with ‘finance’ as Islamic banking does not work with a loan concept." },
	// 		{ "id": 2, "details": "Finance calculator" },
	// 		{ "id": 3, "details": "Construction materials finance" },
	// 		{ "id": 4, "details": "Boat and marine equipment finance" },
	// 	]
	// });


	$(".global-search-button").click(function() {
		$(".global-search-background").fadeIn();
		$("#global-search").focus();
	});

	if (!Object.keys) {
		Object.keys = function (obj) {
			var keys = [];

			for (var ind_obj in obj) {
				if (obj.hasOwnProperty(ind_obj)) {
					keys.push(ind_obj);
				}
			}

			return keys;
		};
	}

	// $("#global-search").keyup(function () {
	// 	if ($(this).val().length > 2) {
	// 		let results = JSON.parse(search_result).results;
	// 		if (results.length > 0) {
	// 			$('.global-search-results').show();
	// 			var newResults = Object.keys(results).map(function (element) { return ("<p>" + results[element].details + "</p>")}).join('');
	// 			$('.global-search-results').html(newResults);
	// 		} else {
	// 			$('.global-search-results').fadeOut();
	// 		}
	// 	} else {
	// 		$('.global-search-results').fadeOut();
	// 	}
	// });

	$('#global-close-search,.global-search-background,.search-item-empty').click(function (e_empty) {
		if (e_empty.target != this) return;
		$('#global-search').val('');
		$('.global-search-background').fadeOut();
		$('.global-search-results').fadeOut();
	})
	$('#global-search').keypress(function () {
		if (event.which == 13) {
			window.location.href = "/search?q=" + $('#global-search').val();
		}
	});

	$(".search-icon").click(function () {
		window.location.href = "/search?q=" + $('#global-search').val();
	});


	var coll = document.getElementsByClassName("collapsible");
	var ind_c;

	for (ind_c = 0; ind_c < coll.length; ind_c++) {
		coll[ind_c].addEventListener("click", function () {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			$(content).toggleClass('collapsible-opened');
		});
	}

	$('.tabcontent').each(function () {
		$(this).find('button:lt(3)').trigger('click');
	});

	const newsletterInput = document.getElementById("emailInput");
	const newsletterStatus = document.getElementById("emailStatus");

	$("#newsletterInput").click(function(){
		TweenMax.to(newsletterInput, 0.5, {
			css: { top: "0%", opacity: 1 },
			ease: Quad.easeInOut
		});
	});

	$("#newsLetterEmail").on("keyup", function(e_keyup) {
		
		
		$('.newsletterError').text("Please Press Enter")
		$('.newsletterError').css('color', 'gray');

		$('.newsletterError').show()

		if (e_keyup.keyCode == 13) {
			var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			
			if(!regex.test(e_keyup.target.value)) {
				$('.newsletterError').text("Provide a valid email")
				$('.newsletterError').css('color', 'red');
				return false;
			}
			else
			{
				newsLetterLoading();
				setTimeout(function() {
					callAPI(e_keyup.target.value);
				}, 3000);
			}
		}
	});

	function newsLetterLoading(){
		newsletterStatus.innerHTML = "<div class='rbx-loader'><div></div></div>";

		TweenMax.to(newsletterStatus, 0.5, {
			css: { top: 0, opacity: 1 },
			ease: Quad.easeInOut
		});
	}

	function callAPI(email){
		$.ajax({
			url: bbyn_rest_url+"subscribemailchimp/",
			data: { 
				customerEmail : email,
				customerFName : 'Boubyan',
				customerLName : 'Customer',
				status : 'pending'
			},
			async:true,
			dataType: "json",
			type: "POST",
			success: function( data ) {
				let status = data["responseData"];
				if(status.indexOf('"status":400') !== -1)
				{
					newsLetterFail();
				}
				else
				{
					newsLetterSuccess();
					
				}
			}
		});
	}

	function newsLetterSuccess(){
		var loader=$(newsletterStatus).find('.rbx-loader');
		TweenMax.to(loader,0.5, {css : {opacity: 0} });

		setTimeout(function() {
			newsletterStatus.innerHTML="<p class='text-success' style='opacity:0'>Thank you for subscribing</p>";
			TweenMax.to($(newsletterStatus).find('p'),0.5, { opacity: 1});
			$('#newsLetterEmail')[0].value = ""
		}, 1000);

		TweenMax.to(
			$('.emailWidget'), 0.5, {
				css: { top: '100%', opacity: 0 },
				delay: 4,
				ease: Quad.easeInOut
			});
	}

	function newsLetterFail() {
		$(".newsletterError").removeClass("hidden");
		TweenMax.to(newsletterStatus, 0.5, { css: { top:'100%', opacity: 0 } });
	}

	$(".newsLetterX").click(function(){
		$("#newsLetterEmail").val('');
	});
	  
	$(".mobileCalculator .cancel").click(function () {
		if($('html').attr('dir') === 'rtl')
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { right: "-100%" }, ease: Quad.easeInOut });
		else
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { left: "-100%" }, ease: Quad.easeInOut });
	});

	$("#murabahaMobile").click(function(){
		if($('html').attr('dir') === 'rtl')
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { right: "0" }, ease: Quad.easeInOut });
		else
			TweenMax.to($(".mobileCalculator"), 0.5, { css: { left: "0" }, ease: Quad.easeInOut });
	});

	$(window).scroll(function () {
		if(screen.width <= 768){
			if($('footer').position().top - $(window).scrollTop() < 700 )
				$('.fastMenu').hide();
			else
				$(".fastMenu").show();
		}else{
			if($("footer").position().top - $(window).scrollTop() < 1315)
				$(".sticky-tools").hide();
			else
				$(".sticky-tools").show();
		}
	});

	if ($('.download-from-store').length > 0){
		$('.chat').css({ 'bottom': 100, 'right':30});
	}

	if ( $('.sticky-bar').length > 0) {
		$('.chat').css({ 'bottom': 70, 'right': 10 });
	}

	$('.discounts > div').click(function(e_discounts){
		e.preventDefault();
		let title=$(this).find('.discountTitle').html();
		let percentage=$(this).find('.discountPercentage').html();
		let description=$(this).find('.discountDescription').html();
		let extra=$(this).find('.discountExtra').html();
		let discountIcon = $(this).find('.discountIcon').attr('src');
		$('.discountDescription .discountTitle').html(title);
		$('.discountDescription .discountPercentage').html(percentage);
		$('.discountDescription .discountDesc').html(description);
		$('.discountDescription .discountextraCondition').html(extra);
		$('.discountDescription img').attr("src",discountIcon);
	});

});
let gName = "defaultV"
function Fpopup(popup_value){
	gName = "#" + popup_value;
	 let $stickytools = $('section.sticky-tools'),
		relatedModal = $('#' + popup_value),
		isWidgetModal = $('#widgetmodal').hasClass( "hidden" );

		if(!isWidgetModal)
		{
			$('#widgetmodal').closest('.modalTemp').addClass('hidden');
			$('#widgetmodal').addClass('hidden');
		}

		$stickytools.css('display', 'none');

		relatedModal.closest('.modalTemp').removeClass('hidden');
		relatedModal.removeClass('hidden');
		$("#toAmount").val('');
		$("#frmAmount").val('');

}

$(function(){

	

	var popup = window.location.search.indexOf('popup')
	if ( popup> -1) {
		let str = window.location.search;

		var popup_ = str.substring(str.indexOf('=')+1, str.length)

		// $('[modal]').trigger("click");


		if(popup_ != 'murabaha')
        {
           Fpopup(popup_);
        }
        else
		{
            let $stickytools = $('section.sticky-tools');
            $stickytools.addClass('sticky-tools-show');
            $('body').addClass('no-scroll');
            if($('html').attr('dir') === 'rtl')
                TweenMax.to($(".mobileCalculator"), 0.5, { css: { right: "0" }, ease: Quad.easeInOut });
            else
                TweenMax.to($(".mobileCalculator"), 0.5, { css: { left: "0" }, ease: Quad.easeInOut });
		}
		
	}

	$('.mobile-filter').change(function (e) {
		filteredList(e,$(this).val());
	});

	$('.global-tools-button').click(function(e){
		e.preventDefault();
		if($( ".toolsbar" ).hasClass( "sticky-tools-show" ))
		{
			$(".toolsbar").removeClass('sticky-tools-show');
			$('.toolsbar').hide();
		}
		else
		{
			$(".toolsbar").addClass('sticky-tools-show');
			$('.toolsbar').show();
		}
		TweenMax.to($(".toolsbar"), 0.5, { css: { left: "0" }, ease: Quad.easeInOut });
	});

	$('.cancelwhite').click(function(e){
		e.preventDefault();
		$(".toolsbar").removeClass('sticky-tools-show');
		$('.toolsbar').hide();
	});

	$('.currency_calc').click(function(e){
		e.preventDefault();
		$('#currency-exchange').parent().removeClass('hidden');
		$('#currency-exchange').removeClass('hidden');
	});
	$('.murabaha_calc').click(function(e){
		e.preventDefault();
		$('#pf_calculator').parent().removeClass('hidden');
		$('#pf_calculator').removeClass('hidden');
	});
	$('.iban').click(function(e){
		e.preventDefault();
		$('#iban_generator').parent().removeClass('hidden');
		$('#iban_generator').removeClass('hidden');
	});
});


function isValidEmailAddress(emailAddress) {
	var pattern =  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return pattern.test(emailAddress);
}