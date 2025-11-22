/**
 * Animated filter jQuery plugin
 *
 * @copyright Copyright (c) 2015 rocksolidthemes.com
 * @license   https://rocksolidthemes.com/agb
 */

;(function($) {

var resetItem = {
	top: '',
	left: '',
	transform: '',
	width: '',
	height: '',
	position: '',
	opacity: '',
	transition: '',
	'will-change': '',
};

var resetWrapper = {
	width: '',
	height: '',
	transition: '',
	'will-change': '',
};

function suffixArray(arr, suffix) {
	$.each(arr, function(i, el) {
		arr[i] += suffix;
	});
	return arr;
}

function getPositions(elements) {
	var pos = [];
	var parentOffset = elements.first().parent().offset();
	var offset;
	elements.each(function(i) {
		if ($(this).css('display') === 'none') {
			pos[i] = {display: 'none'};
		}
		else {
			pos[i] = {};
			pos[i].width = $(this).width();
			pos[i].height = $(this).height();
			offset = $(this).offset();
			offset.top -= parentOffset.top;
			offset.left -= parentOffset.left;
			var scale = /matrix\((.+?),.+\)/.exec($(this).css('transform'));
			scale = (scale && scale[1]) || 1;
			offset.top -= pos[i].height * (1 - scale) / 2;
			offset.left -= pos[i].width * (1 - scale) / 2;
			pos[i].transform = 'translate('
				+ suffixArray([offset.left, offset.top], 'px').join(', ')
				+ ') scale(' + scale + ')';
			pos[i].opacity = $(this).css('opacity');
			pos[i].display = '';
		}
	});
	return pos;
}

$.fn.animatedFilter = function(filter, options) {

	options = $.extend({}, {
		duration: 250,
		timingFunction: 'ease-out',
	}, options);

	this.each(function() {

		var wrapper = $(this);
		var items = wrapper.children();

		// Phase 1: readling styles

		// Get current positions
		var before = getPositions(items);
		var wrapperBefore = {
			width: wrapper.width(),
			height: wrapper.height(),
		};

		// Phase 2: writing styles

		items.each(function() {
			$(this).css(resetItem).css({
				display: filter.apply(this) ? '' : 'none',
			});
		});
		wrapper.css(resetWrapper).css({
			position: 'relative',
		});

		// Phase 3: readling styles

		// Get positions after filtering
		var after = getPositions(items);
		var wrapperAfter = {
			width: wrapper.width(),
			height: wrapper.height(),
		};

		// Phase 4: writing styles

		wrapper.css(wrapperBefore).css({
			'will-change': 'width, height',
		});

		items.each(function(i) {
			var $this = $(this);
			$(this).css(before[i]);
			if (before[i].display === 'none') {
				if (after[i].display === 'none') {
					return;
				}
				else {
					$(this).css(after[i]).css({
						opacity: 0,
						transform: after[i].transform.replace(/scale\(.+?\)/, 'scale(0)'),
					});
				}
			}
			$this.css({
				position: 'absolute',
				top: 0,
				left: 0,
				'will-change': 'transform, opacity, width, height',
			});
		});

		// Trigger reflow to get transitions working
		wrapper.width();

		items.each(function(i) {
			var $this = $(this);
			$(this).css(after[i]);
			if (after[i].display === 'none') {
				if (before[i].display === 'none') {
					return;
				}
				else {
					$(this).css(before[i]).css({
						opacity: 0,
						transform: before[i].transform.replace(/scale\(.+?\)/, 'scale(0)'),
					});
				}
			}
			$this.css({
				transition: 'all ' + options.duration + 'ms ' + options.timingFunction,
			});
		});

		wrapper.css(wrapperAfter).css({
			transition: suffixArray(
				['width', 'height'],
				' ' + options.duration + 'ms ' + options.timingFunction
			).join(', '),
		});

		var cleanup = function(event) {

			items.each(function(i) {
				$(this).css(resetItem).css({
					display: after[i].display,
					transition: 'none',
				});
			});
			wrapper.css(resetWrapper).css({
				position: '',
				transition: 'none',
			});

			// Trigger reflow to fix IE11 bug with transitions
			wrapper.width();

			items.css({
				transition: '',
			});
			wrapper.css({
				transition: '',
			});

		};

		clearTimeout(wrapper.data('animatedFilterCleanupTimeout'));
		wrapper.data('animatedFilterCleanupTimeout', setTimeout(cleanup, options.duration + 100));

	});

	return this;

};

})(jQuery);
