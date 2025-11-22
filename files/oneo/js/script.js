// must be loaded at the end of the body element
(function(){
	var addEvent = function(element, events, func){
			events = events.split(' ');
			for (var i = 0; i < events.length; i++) {
				if(element.addEventListener){
					element.addEventListener(events[i], func, false);
				}
				else{
					element.attachEvent('on'+events[i], func);
				}
			}
		},
		triggerEvent = function(element, eventName) {
			var evt = document.createEvent('HTMLEvents');
			evt.initEvent(eventName, true, true);
			element.dispatchEvent(evt);
		},
		eventPreventDefault = function(event){
			event = event || window.event;
			if (!event) {
				return;
			}
			if(event.preventDefault){
				event.preventDefault();
			}
			else{
				event.returnValue = false;
			}
		},
		eventStop = function(event) {
			event = event || window.event;
			if (!event) {
				return;
			}
			if(event.stopPropagation){
				event.stopPropagation();
			}
			else{
				event.cancelBubble = true;
			}
		},
		elementMatches = function(element, selector) {
			var methods = ['matches', 'matchesSelector', 'msMatchesSelector', 'mozMatchesSelector', 'webkitMatchesSelector'];
			for (var i = 0; i < methods.length; i++) {
				if (methods[i] in element) {
					return element[methods[i]](selector);
				}
			}
			return false;
		},
		addClass = function(element, className) {
			var elements = ('length' in element && !('className' in element))
				? element
				: [element];
			var classNames = (typeof className === 'string')
				? className.split(' ')
				: className;
			for (var i = 0; i < elements.length; i++) {
				for (var j = 0; j < classNames.length; j++) {
					if (!hasClass(elements[i], classNames[j])) {
						elements[i].className += ' ' + classNames[j];
					}
				}
			}
		},
		removeClass = function(element, className) {
			var elements = ('length' in element && !('className' in element))
				? element
				: [element];
			var classNames = (typeof className === 'string')
				? className.split(' ')
				: className;
			for (var i = 0; i < elements.length; i++) {
				for (var j = 0; j < classNames.length; j++) {
					if (hasClass(elements[i], classNames[j])) {
						elements[i].className = elements[i].className.replace(new RegExp('(?:^|\\s+)' + classNames[j] + '(?:$|\\s+)'), ' ');
					}
				}
			}
		},
		hasClass = function(element, className) {
			return !!element.className.match('(?:^|\\s)' + className + '(?:$|\\s)');
		},
		toggleClass = function(element, className) {
			return hasClass(element, className)
				? removeClass(element, className)
				: addClass(element, className);
		},
		getZoomLevel = function() {
			if (document.documentElement.clientWidth && window.innerWidth){
				return document.documentElement.clientWidth / window.innerWidth;
			}
			return 1;
		},
		each = function(array, callback) {
			if (!array || !array.length) {
				return;
			}
			for (var i = 0; i < array.length; i++) {
				callback(array[i], i);
			}
		},
		navMain = document.querySelector('.main-navigation'),
		navMainLis, i, element, navMainTouched, touchUsed;

	// Main navigation search
	(function(elements){
		for (var i = 0; i < elements.length; i++) {
			addEvent(elements[i].getElementsByTagName('input')[0], 'focus', function(){
				addClass(this.parentNode, 'focus');
			});
			addEvent(elements[i].getElementsByTagName('button')[0], 'focus', function(){
				addClass(this.parentNode, 'focus');
			});
			addEvent(elements[i].getElementsByTagName('input')[0], 'blur', function(){
				removeClass(this.parentNode, 'focus');
			});
			addEvent(elements[i].getElementsByTagName('button')[0], 'blur', function(){
				removeClass(this.parentNode, 'focus');
			});
		}
	})(document.querySelectorAll && document.querySelectorAll('.main-navigation-search'));

	// Edge dropdown touch fix
	if(navMain && navMain.getElementsByTagName('ul').length){
		navMainLis = navMain.getElementsByTagName('ul')[0].childNodes;
		for(i = 0; i < navMainLis.length; i++){
			if(navMainLis[i].nodeName && navMainLis[i].nodeName.toLowerCase() === 'li' && navMainLis[i].querySelector('ul,.mega-dropdown')){
				element = navMainLis[i].getElementsByTagName('a');
				if(element && (element = element[0])){
					element.setAttribute('aria-haspopup', 'true');
				}
			}
		}
	}

	// Dropdown fix for all touch devices
	if(window.Modernizr && Modernizr.touchevents){
		if(navMain && navMain.getElementsByTagName('ul').length){
			// devices supporting touch events may not mean touch input is used
			// e.g. touch enabled laptops running Windows 8
			addEvent(navMain, 'touchstart', function(event) {
				touchUsed = true;
			});
			navMainLis = navMain.getElementsByTagName('ul')[0].childNodes;
			for(i = 0; i < navMainLis.length; i++){
				if(navMainLis[i].nodeName && navMainLis[i].nodeName.toLowerCase() === 'li' && navMainLis[i].querySelector('ul,.mega-dropdown')){
					element = navMainLis[i].getElementsByTagName('a');
					if(element && (element = element[0])){
						addEvent(element, 'touchend', function(event){
							var link = this;
							setTimeout(function() {
								navMainTouched = link;
							}, 100);
						});
						addEvent(element, 'click', function(event){
							if(navMainTouched !== this && touchUsed){
								navMainTouched = this;
								eventPreventDefault(event);
							}
						});
					}
				}
			}
		}
	}

	// Fixed elements
	(function(header) {

		if (!header) {
			return;
		}

		var originalHeight;
		var originalPosition;

		var resetStyles = function() {
			removeClass(header, ['is-fixed', 'is-bottom']);
			header.parentNode.style.paddingBottom = '';
			document.documentElement.style.scrollPaddingTop = '';
		};

		var updateOriginalValues = function() {
			resetStyles();
			originalHeight = header.offsetHeight;
			originalPosition = header.offsetTop;
		};

		updateOriginalValues();

		var mediaQuery = window.matchMedia && window.matchMedia("(max-width: 900px)");
		var mediaQueryMatches = function() {
			if (mediaQuery) {
				return mediaQuery.matches;
			}
			return window.Modernizr && Modernizr.mq && Modernizr.mq("(max-width: 900px)");
		};

		var scroll = function() {

			if (getZoomLevel() > 1.01 || mediaQueryMatches()) {
				resetStyles();
				return;
			}

			var documentHeight = window.innerHeight || document.documentElement.clientHeight;
			var offset = window.pageYOffset || document.documentElement.scrollTop || 0;

			// Only allow scroll positions inside the possible range
			offset = Math.max(0, Math.min(
				document.documentElement.scrollHeight - documentHeight,
				offset
			));

			if (offset < originalPosition) {
				resetStyles();
			}

			if (document.documentElement.style.scrollPaddingTop !== originalHeight + 'px') {
				document.documentElement.style.scrollPaddingTop = originalHeight + 'px';
			}

			if (offset < originalPosition) {
				if (offset + documentHeight - 150 < originalPosition) {
					addClass(header, 'is-bottom');
				}
				return;
			}

			addClass(header, 'is-fixed');
			if (header.parentNode.style.paddingBottom !== originalHeight + 'px') {
				header.parentNode.style.paddingBottom = originalHeight + 'px';
			}

		};

		addEvent(window, 'resize load', updateOriginalValues);
		addEvent(window, 'scroll resize load', scroll);
		scroll();

	})(
		document.querySelector && document.querySelector('.header-navigation')
	);

	// Navigation search
	(function(search) {

		if (!search) {
			return;
		}
		var link = search.querySelector('a');
		var form = search.querySelector('form');
		var input = form.querySelector('input');
		if (!link || !form || !input) {
			return;
		}

		var close = document.createElement('a');
		close.href = '';
		close.className = 'main-navigation-search-close'
		close.innerHTML = 'close';
		addEvent(close, 'click', function(event) {
			eventPreventDefault(event);
			removeClass(form, 'is-active');
		});
		form.appendChild(close);

		addClass(form, 'main-navigation-search-form');
		document.body.insertBefore(form, document.body.firstChild);

		addEvent(link, 'click', function(event) {
			eventPreventDefault(event);
			addClass(form, 'is-pre-active');
			// Force layout
			var trash = form.offsetWidth;
			addClass(form, 'is-active');
			removeClass(form, 'is-pre-active');
			input.focus();
		});

	})(document.querySelector && document.querySelector('.main-navigation-search'));

	// Mobile navigation
	(function(nav, page) {
		if (!nav) {
			return;
		}
		document.body.insertBefore(nav, document.body.firstChild);
		var navLink;
		var isOpened;
		var open, close;
		var updateHeight = function() {
			if (!isOpened) {
				return;
			}
			if (!nav.offsetHeight) {
				// Close the nav if it is not visible anymore
				return close();
			}
			nav.style.minHeight = 0;
			page.style.height = Math.max((window.innerHeight || document.documentElement.clientHeight), nav.offsetHeight) + 'px';
			page.style.position = 'relative';
			page.style.overflow = 'hidden';
			nav.style.minHeight = '';
		};
		open = function() {
			isOpened = true;
			addClass(nav, 'is-active');
			updateHeight();
		};
		close = function() {
			isOpened = false;
			removeClass(nav, 'is-active');
			page.style.height = '';
			page.style.position = '';
			page.style.overflow = '';
		};
		addEvent(window, 'resize', updateHeight);
		addClass(nav, 'is-enabled');
		navLink = document.createElement('a');
		navLink.innerHTML = 'navigation';
		navLink.href = '';
		addClass(navLink, 'main-navigation-mobile-open');
		addEvent(navLink, 'click', function(event) {
			eventPreventDefault(event);
			if (hasClass(nav, 'is-active')) {
				close();
			}
			else {
				open();
			}
		});
		var logo = document.querySelector('.header-navigation .logo');
		if (logo) {
			logo.parentNode.insertBefore(navLink, logo);
		}
		else {
			nav.parentNode.insertBefore(navLink, nav);
		}
		closeButton = document.createElement('button');
		closeButton.innerHTML = 'close';
		addClass(closeButton, 'main-navigation-mobile-close');
		addEvent(closeButton, 'click', function(event) {
			if (isOpened) {
				close();
			}
			eventPreventDefault(event);
		});
		nav.appendChild(closeButton);
		var uls = nav.querySelectorAll('ul ul');
		var button;
		var buttonOnClick = function(event) {
			toggleClass(this.parentNode, 'is-expanded');
			toggleClass(this.parentNode, 'is-collapsed');
			updateHeight();
		};
		for (var i = 0; i < uls.length; i++) {
			button = document.createElement('button');
			button.innerHTML = 'expand';
			button.className = 'main-navigation-mobile-expand';
			addEvent(button, 'click', buttonOnClick);
			uls[i].parentNode.insertBefore(button, uls[i]);
			if (hasClass(uls[i].parentNode, 'active') || hasClass(uls[i].parentNode, 'trail')) {
				addClass(uls[i].parentNode, 'is-expanded');
			}
			else {
				addClass(uls[i].parentNode, 'is-collapsed');
			}
		}
		each(nav.querySelectorAll('a[href*="#"]'), function(link) {
			var href = link.href.split('#');
			var documentHref = document.location.href.split('#');
			if (
				href[0] &&
				documentHref[0].substr(- href[0].length) !== href[0]
			) {
				return;
			}
			addEvent(link, 'click', function() {
				close();
			});
		});
	})(
		document.querySelector && document.querySelector('.main-navigation-mobile'),
		document.querySelector && document.querySelector('.page')
	);

	// Animations
	(function() {

		if (!window.Modernizr || !Modernizr.csstransitions) {
			return;
		}

		var getCounterValue = function(data, multiplier) {
			var value = data.number * multiplier;
			return data.prefix
				+ value.toFixed(data.precision).split('.').join(data.separator)
				+ data.suffix;
		};

		var initCounterAnimation = function(element) {
			if (!element.counterAnimationData) {
				var value = element.innerHTML;
				var matches = /^(.*?)(-?[0-9,.]*\d)(.*)$/.exec(value);
				if (!matches || !matches.length) {
					return;
				}
				var separator = matches[2].indexOf(',') > 0 ? ',' : '.';
				matches[2] = matches[2].split(',').join('.');
				if (isNaN(matches[2] * 1)) {
					return;
				}
				element.counterAnimationData = {
					original: value,
					prefix: matches[1],
					suffix: matches[3],
					number: matches[2] * 1,
					precision: Math.max(
						0,
						matches[2].length - matches[2].split('.')[0].length - 1
					),
					separator: separator,
					duration: (element.getAttribute('data-animation-duration') || 1000) * 1
				};
			}
			element.innerHTML = getCounterValue(element.counterAnimationData, 0);
		};

		var counterAnimations = [];

		var runCounterAnimation = function() {
			var animations = [];
			var animation;
			var multiplier;
			for (var i = 0; i < counterAnimations.length; i++) {
				animation = counterAnimations[i];
				multiplier = Math.min(1, (
					new Date().getTime() - animation.start
				) / animation.data.duration);
				if (multiplier < 1) {
					animation.element.innerHTML = getCounterValue(
						animation.data,
						multiplier
					);
					animations.push(animation);
				}
				else {
					animation.element.innerHTML = animation.data.original;
				}
			}
			counterAnimations = animations;
			if (window.requestAnimationFrame && counterAnimations.length) {
				window.requestAnimationFrame(runCounterAnimation);
			}
		};

		var startCounterAnimation = function(element) {
			if (window.requestAnimationFrame && !counterAnimations.length) {
				window.requestAnimationFrame(runCounterAnimation);
			}
			counterAnimations.push({
				element: element,
				data: element.counterAnimationData,
				start: new Date().getTime()
			});
		};

		var initTypingAnimation = function (element) {
			if (!element.typingAnimationData) {
				var data = {
					interval: null,
					elements: [],
					texts: [],
					currentElement: 0,
					currentOffset: 0
				};
				each(element.querySelectorAll('.typing-headline-dummy'), function(dummy) {
					if (dummy && dummy.textContent) {
						var text = document.createElement('span');
						text.className = 'typing-headline-text';
						text.textContent = dummy.textContent;
						dummy.parentNode.insertBefore(text, dummy);
						data.elements.push(text);
						data.texts.push(text.textContent.split(' ').join('  '));
					}
				});
				if (!data.elements.length) {
					return;
				}
				var type = function() {
					data.currentOffset++;
					addClass(data.elements[data.currentElement], 'is-typing');
					data.elements[data.currentElement].textContent = data.texts[data.currentElement].substr(0, data.currentOffset);
					if (!data.texts[data.currentElement].substr(data.currentOffset)) {
						removeClass(data.elements[data.currentElement], 'is-typing');
						data.currentOffset = 0;
						data.currentElement++;
						if (!data.elements[data.currentElement]) {
							addClass(data.elements[data.currentElement - 1], 'is-done-typing');
							clearInterval(data.interval);
						}
					}
				};
				data.start = function() {
					data.currentElement = 0;
					data.currentOffset = 0;
					clearInterval(data.interval);
					data.interval = setInterval(type, 100);
				};
				element.typingAnimationData = data;
			}
			clearInterval(element.typingAnimationData.interval);
			each(element.typingAnimationData.elements, function(headline) {
				removeClass(headline, 'is-typing');
				removeClass(headline, 'is-done-typing');
				headline.innerHTML = '&nbsp;';
			});
		};

		var isHiddenInSlider = function (element) {
			if (!element.slider) {
				return false;
			}
			return !window.jQuery(element.element).closest('.rsts-slide').is(element.slider.getSlides()[element.slider.slideIndex].element);
		};

		var isInView = function(element) {
			return (
				(element.element.offsetWidth || element.element.offsetHeight)
				&& (
					element.element.getBoundingClientRect().top < (window.innerHeight || document.documentElement.clientHeight) * 0.8
					|| element.element.getBoundingClientRect().bottom <= (window.innerHeight || document.documentElement.clientHeight)
				)
				&& !isHiddenInSlider(element)
			);
		};

		var isNotInView = function(element) {
			return (
				(!element.element.offsetWidth && !element.element.offsetHeight)
				|| element.element.getBoundingClientRect().top > (window.innerHeight || document.documentElement.clientHeight) * 1.2
				|| isHiddenInSlider(element)
			);
		};

		var elements = [];

		var update = function() {
			var rect;
			each(elements, function(element) {
				if (isInView(element)) {
					if (element.element.counterAnimationData && !hasClass(element.element, 'in-view')) {
						if (!hasClass(element.element, 'has-shown') || element.doesRepeat) {
							startCounterAnimation(element.element);
						}
					}
					if (element.element.typingAnimationData && !hasClass(element.element, 'in-view')) {
						if (!hasClass(element.element, 'has-shown') || element.doesRepeat) {
							element.element.typingAnimationData.start();
						}
					}
					addClass(element.element, 'in-view');
					addClass(element.element, 'has-shown');
					removeClass(element.element, 'not-in-view');
				}
				else if(isNotInView(element)) {
					if (element.element.counterAnimationData && !hasClass(element.element, 'not-in-view') && element.doesRepeat) {
						initCounterAnimation(element.element);
					}
					if (element.element.typingAnimationData && !hasClass(element.element, 'not-in-view') && element.doesRepeat) {
						initTypingAnimation(element.element);
					}
					if (element.doesRepeat) {
						addClass(element.element, 'not-in-view');
						removeClass(element.element, 'in-view');
					}
				}
			});
		};

		var updateElements = function(wrapper) {
			wrapper = wrapper || document;
			var newElements = wrapper.querySelectorAll && wrapper.querySelectorAll('.is-animated');
			if (!newElements) {
				return;
			}
			each(newElements, function(element) {
				if (
					!elementMatches(element, '.not-animated *, .not-animated')
					&& elements.map(function(element) {
						return element.element;
					}).indexOf(element) === -1
				) {
					elements.push({
						element: element,
						doesRepeat: elementMatches(element, '.does-repeat *, .does-repeat'),
						slider: window.jQuery && window.jQuery(element).closest('.rsts-main').data('rstSlider')
					});
					if (hasClass(element, '-counter')) {
						initCounterAnimation(element);
					}
					if (hasClass(element, 'typing-headline')) {
						initTypingAnimation(element);
					}
					addClass(element, 'not-in-view');
				}
			});
		};

		updateElements();

		addEvent(window, 'scroll resize load', update);
		if (window.jQuery) {
			window.jQuery('.rsts-main, .mod_rocksolid_slider').on('rsts-slidestop rsts-slidestart', function(event) {
				updateElements(this);
				if (event.type === 'rsts-slidestop') {
					update();
				}
			});
		}
		setTimeout(update, 0);

		if (window.requestAnimationFrame) {
			window.requestAnimationFrame(runCounterAnimation);
		}
		else {
			setInterval(runCounterAnimation, 16);
		}

	})();

	// Background videos
	(function(elements) {
		if (
			!elements
			|| !elements.length
			|| !/^iPhone|^iPod/.test(navigator.platform)
			|| window.matchMedia('(-webkit-video-playable-inline)').matches
		) {
			return;
		}
		for (var i = 0; i < elements.length; i++) {
			if (elements[i].poster) {
				elements[i].parentNode.style.backgroundImage = 'url("' + elements[i].poster + '")';
			}
			elements[i].parentNode.removeChild(elements[i]);
		}
	})(document.querySelectorAll && document.querySelectorAll('.centered-wrapper-background > video'));

	// Vertical centered contents
	(function(elements) {

		var isIE = 'ActiveXObject' in window;

		if (!elements[0]) {
			return;
		}

		// Internet Explorer doesn't handle flexbox right if min-height is set
		if (!isIE && (
			'webkitBoxPack' in elements[0].style
			|| 'MozBoxPack' in elements[0].style
			|| 'webkitJustifyContent' in elements[0].style
			|| 'justifyContent' in elements[0].style
		)) {
			return;
		}

		function center(element) {
			element.style.marginTop = '';
			if (element.parentNode.offsetHeight > element.offsetHeight) {
				element.style.marginTop = Math.round((element.parentNode.offsetHeight - element.offsetHeight) / 2) + 'px';
			}
		}

		each(elements, function(element) {
			center(element);
			addEvent(window, 'resize load', function() {
				center(element);
			});
		});

	})(document.querySelectorAll && document.querySelectorAll('.centered-wrapper.-vertical-centered > .centered-wrapper-inner'));

	// Moving backgrounds
	(function(elements) {
		if (!elements || !elements.length) {
			return;
		}
		addEvent(window, 'mousemove', function(event) {
			var percentage;
			for (var i = 0; i < elements.length; i++) {
				percentage = event.clientX / (
					window.innerWidth ||
					document.documentElement.clientWidth
				);
				if (hasClass(elements[i].parentNode, '-background-mousemove')) {
					percentage = 1 - percentage;
				}
				percentage = Math.max(0, Math.min(1, percentage));
				elements[i].style.transform =
					elements[i].style.webkitTransform =
					'translate3d(' + (percentage * -10) + '%, 0, 0)';
			}
		});
	})(document.querySelectorAll && document.querySelectorAll('.-background-mousemove-inverted > .centered-wrapper-background, .-background-mousemove > .centered-wrapper-background'));

	// Parallax backgrounds
	(function(elements) {

		if (!elements || !elements.length) {
			return;
		}

		if (!('transform' in elements[0].style) && !('webkitTransform' in elements[0].style)) {
			return;
		}

		var imageCache = [];

		var update = function(event) {

			var windowHeight = window.innerHeight || document.documentElement.clientHeight;

			// Get all dimensions from the browser before applying styles for better performance
			var parentRects = [];
			for (var i = 0; i < elements.length; i++) {
				parentRects[i] = elements[i].parentNode.getBoundingClientRect();
				if (!('width' in parentRects[i]) || !('height' in parentRects[i])) {
					return;
				}
			}

			var position, height;
			for (i = 0; i < elements.length; i++) {
				// Skip invisible elements
				if (parentRects[i].bottom < 0 || parentRects[i].top > windowHeight) {
					continue;
				}
				height = 0;
				if (imageCache[i].width && imageCache[i].height) {
					height = imageCache[i].height / imageCache[i].width * parentRects[i].width;
				}
				height = Math.round(Math.max(
					height,
					Math.min(parentRects[i].height, windowHeight) * 1.1
				));
				elements[i].style.bottom = 'auto';
				elements[i].style.height = height + 'px';
				if (height < windowHeight || (windowHeight < parentRects[i].height && height < parentRects[i].height)) {
					position = parentRects[i].top / (windowHeight - parentRects[i].height)
						* -(height - parentRects[i].height);
				}
				else {
					position = (windowHeight - parentRects[i].top) / (windowHeight + parentRects[i].height)
						* -(height - parentRects[i].height);
				}
				elements[i].style.transform =
				elements[i].style.webkitTransform =
					'translate3d(0, ' + Math.round(position) + 'px, 0)';
			}

		};
		addEvent(window, 'scroll resize', update);

		for (var i = 0; i < elements.length; i++) {
			imageCache[i] = new Image();
			addEvent(imageCache[i], 'load', update);
			imageCache[i].src = elements[i].getAttribute
				&& elements[i].getAttribute('data-image-url');
		}

	})(document.querySelectorAll && document.querySelectorAll('.-background-parallax > .centered-wrapper-background'));

	// Rotating boxes touch support
	(function(elements) {
		if (!elements || !elements.length) {
			return;
		}
		for (var i = 0; i < elements.length; i++) {
			elements[i].setAttribute('aria-haspopup', 'true');
			addEvent(elements[i], 'touchend', function(event) {
				if (event.target && (
					hasClass(event.target.parentNode, 'fading-boxes-item-link')
					|| hasClass(event.target, 'portfolio-boxes-item-more')
				)) {
					return;
				}
				eventPreventDefault(event);
				// Remove the hover state from the element on iOS
				if (hasClass(this, 'is-hovered')) {
					var parent = this.parentNode;
					var next = this.nextSibling;
					parent.removeChild(this);
					if (next) {
						parent.insertBefore(this, next);
					}
					else {
						parent.appendChild(this);
					}
					this.offsetWidth;
				}
				toggleClass(this, 'is-hovered');
			});
		}
	})(document.querySelectorAll && document.querySelectorAll('.fading-boxes-item, .portfolio-boxes-item-text'));

	// Tabs
	(function(navigations) {

		if (!navigations || !navigations.length) {
			return;
		}

		var documentHref = document.location.href.split('#');

		each(navigations, function(navigation) {

			var links = navigation.querySelectorAll('a');
			var targets = [];
			var clickFirst;

			each(links, function(link, i) {

				var href = link.href.split('#');
				if (
					href[0] &&
					documentHref[0].substr(- href[0].length) !== href[0]
				) {
					return;
				}
				var target = document.querySelector('#' + href[1]);
				if (!target) {
					return;
				}

				targets.push(target);

				var onclick = function(event) {
					eventPreventDefault(event);
					eventStop(event);
					each(targets, function(target) {
						target.style.display = 'none';
					});
					removeClass(links, 'is-active');
					addClass(link, 'is-active');
					target.style.display = '';
					link.blur();
					triggerEvent(window, 'resize');
				};
				addEvent(link, 'click', onclick);

				// First element
				if (!clickFirst) {
					clickFirst = onclick;
				}

			});

			clickFirst();

		});

	})(document.querySelectorAll && document.querySelectorAll('.tab-navigation'));

	// Slider Navigations
	(function($) {

		if (!$) {
			return;
		}

		$('.slider-navigation[data-slider-id]').each(function() {

			var $this = $(this);

			var slider = $(document.getElementById($this.attr('data-slider-id'))).data('rstSlider');
			if (!slider) {
				return;
			}

			$this.find('.slider-navigation-prev').on('click', function(event) {
				event.preventDefault();
				slider.prev();
			});

			$this.find('.slider-navigation-next').on('click', function(event) {
				event.preventDefault();
				slider.next();
			});

		});

	})(window.jQuery);

	// Anchor navigation active status
	(function(navigations) {

		if (!navigations || !navigations.length) {
			return;
		}

		var documentHref = document.location.href.split('#');

		each(navigations, function(navigation) {

			var anchors = [];
			var currentAnchor;
			var prev = navigation.querySelector('a.prev');
			var next = navigation.querySelector('a.next');

			each(navigation.querySelectorAll('a[href*="#"]'), function(anchor) {
				var href = anchor.href.split('#');
				if (
					href[0] &&
					documentHref[0].substr(- href[0].length) !== href[0]
				) {
					return;
				}
				if (!href[1]) {
					return;
				}
				var target = document.getElementById(href[1]);
				if (!target) {
					return;
				}
				anchors.push({
					link: anchor,
					target: target,
					navigationClass: anchor.getAttribute && anchor.getAttribute('data-navigation-class')
				});
			});

			each([prev, next], function(link) {
				if (!link) {
					return;
				}
				addEvent(link, 'click', function(event) {
					eventPreventDefault(event);
					var index = anchors.indexOf(currentAnchor)
						+ (hasClass(link, 'next') ? 1 : -1);
					if (index < 0) {
						index = 0;
					}
					if (index >= anchors.length) {
						index = anchors.length - 1;
					}
					triggerEvent(anchors[index].link, 'click');
				});
			});

			var updateAnchors = function() {
				var windowHeight = window.innerHeight || document.documentElement.clientHeight;
				var activeAnchor;
				each(anchors, function(anchor) {
					if (
						anchor.target.getBoundingClientRect().top <
						Math.min(windowHeight / 3, 200)
					) {
						activeAnchor = anchor;
					}
				});
				each(anchors, function(anchor) {
					if (activeAnchor === anchor) {
						return;
					}
					removeClass([anchor.link, anchor.link.parentNode], 'active');
					if (anchor.navigationClass) {
						removeClass(navigation, anchor.navigationClass);
					}
				});
				if (prev && next) {
					removeClass([prev, next], 'is-disabled');
				}
				if (activeAnchor) {
					addClass([
						activeAnchor.link,
						activeAnchor.link.parentNode
					], 'active');
					if (activeAnchor.navigationClass) {
						addClass(navigation, activeAnchor.navigationClass);
					}
					var index = anchors.indexOf(activeAnchor);
					if (!index && prev) {
						addClass(prev, 'is-disabled');
					}
					if (index === anchors.length - 1 && next) {
						addClass(next, 'is-disabled');
					}
					if (
						navigation.getAttribute
						&& navigation.getAttribute('data-change-url') === 'true'
						&& activeAnchor.link.href.split('#')[1] !== document.location.href.split('#')[1]
						&& window.history
						&& window.history.replaceState
					) {
						window.history.replaceState(
							'',
							document.title,
							window.location.href.split('#')[0]
								+ '#' + activeAnchor.link.href.split('#')[1]
						);
					}
				}
				currentAnchor = activeAnchor;
			};

			addEvent(window, 'scroll resize load', updateAnchors);
			setTimeout(updateAnchors);

		});

	})(document.querySelectorAll && document.querySelectorAll('.ce_rsce_oneo_anchor_nav, .ce_rsce_oneo_area_nav'));

	// Smooth scrolling (only if jQuery is available)
	(function($) {

		if (!$) {
			return;
		}

		if (!$.easing.easeOutCubic) {
			$.easing.easeOutCubic = function(p) {
				return 1 - Math.pow(1 - p, 3);
			};
		}

		var $window = $(window);
		var scrollContainer = $('html,body');
		var mediaQuery = window.matchMedia && window.matchMedia("(max-width: 900px)");

		$(document.body).on('click', 'a[href*="#"]', function(event) {

			var href = $(this).prop('href').split('#');
			var documentHref = document.location.href.split('#');
			if (
				href[0] &&
				documentHref[0].substr(- href[0].length) !== href[0]
			) {
				return;
			}
			if (!href[1]) {
				return;
			}
			var target = $('#' + href[1]);
			if (!target.length || event.metaKey) {
				return;
			}
			event.preventDefault();
			this.blur();
			if (window.history && window.history.pushState) {
				window.history.pushState(
					'',
					document.title,
					window.location.href.split('#')[0]
						+ '#' + target.attr('id')
				);
			}
			else {
				var scroll = {
					x: $window.scrollLeft(),
					y: $window.scrollTop()
				};
				window.location.hash = '#' + target.attr('id');
				$window.scrollLeft(scroll.x);
				$window.scrollTop(scroll.y);
			}
			scrollContainer.stop(true).animate({
				scrollTop: Math.ceil(
					target.offset().top -
					(parseFloat(target.css('margin-top')) || 0) -
					(
						(!mediaQuery || mediaQuery.matches)
						? 0
						: $('.header-navigation').outerHeight() ||  0
					)
				)
			}, {
				duration: 300,
				easing: 'easeOutCubic'
			});

		});

	})(window.jQuery);

	// Anchor jumping on page load
	(function($) {

		if (!$ || !location.hash) {
			return;
		}

		// Skip if the page was reloaded or navigated back in history
		if (window.performance && performance.navigation && (
			performance.navigation.type === 1
			|| performance.navigation.type === 2
		)) {
			return;
		}

		var hash = location.hash;

		scroll();
		$(function() {
			setTimeout(scroll);
			setTimeout(scroll, 500);
			setTimeout(scroll, 1000);
		});

		function scroll() {
			$(hash).first().each(function() {
				$(window).scrollTop(Math.ceil(
					$(this).offset().top -
					(parseFloat($(this).css('margin-top')) || 0) -
					(
						(!window.matchMedia || window.matchMedia("(max-width: 900px)").matches)
						? 0
						: $('.header-navigation').outerHeight() ||  0
					)
				));
			});
		}

	})(window.jQuery);

})();
