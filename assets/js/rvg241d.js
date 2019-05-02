// HELPERS
var ignoreScroll = false;

function getScrollDirection(evt) {
	if (evt.originalEvent.wheelDelta && evt.originalEvent.wheelDelta >= 0) {
		return 'up';
	} else if (evt.originalEvent.detail && evt.originalEvent.detail <= 0) {
		return 'up';
	} else {
		return 'down';
	}
}

function scrollToMid() {
	if (ignoreScroll) return;
	ignoreScroll = true;
	$('.midSection').velocity('scroll', {
		duration: 1000,
		easing: [.67,.01,0,1],
		complete: function() {
			$.Velocity.RunSequence(sequenceSection1IN);
			ignoreScroll = false;
		}
	});
}

// TOP SECTION AUTO SCROLL
if (window.innerWidth >= 1144) {
	$(document).on('mousewheel DOMMouseScroll onmousewheel touchmove scroll', '.topSection', function(evt) {
		var direction = getScrollDirection(evt);
		if (direction == 'up') {
			$('.topSection').velocity('scroll', {
				duration: 1000,
				easing: [.67,.01,0,1],
			});
		} else {
			scrollToMid();
		}
		return false;
	});
}

// SETUP MID SECTION AUTO SCROLLS
$(document).ready(function() {
	if (window.innerWidth >= 1144) {
		var $sections = $('.midSection section');
		var zIndex = $sections.length;
		var index = 0;
		$sections.each(function() {
			$(this).css('zIndex', zIndex);
			$(this).attr('data-order', index);
			$(this).on('mousewheel DOMMouseScroll onmousewheel touchmove scroll', handleMidSectionScroll);
			index++;
			zIndex--;
		});

		$(document).on('click', '[data-section-travel]', function() {
			if (ignoreScroll) return false;
			ignoreScroll = true;
			
			var id = $(this).data('section-travel');
			var $target = $(id);
			animateSections($activeSection, $target);
			return false;
		});

	    // scrollDown animation
	    $('.scrollDown .scrollDown_dots').each(function() {
	    	var $dots = $(this).find('span');
	    	animateScrollDown($dots);
	    });
	} else {
		$(document).on('click', '[data-section-travel]', function() {
			var id = $(this).data('section-travel');
			var $target = $(id);

			$target.velocity('scroll', {
				duration: 1000,
				easing: [.67,.01,0,1]
			});

			return false;
		});
	}
});

function handleMidSectionScroll(evt) {
	if (ignoreScroll) return false;
	ignoreScroll = true;

	var order = $(this).data('order');
	var direction = getScrollDirection(evt);

	// make sure midSection is taking all screen
	if (direction == 'up' && $(this).offset().top != (document.documentElement.scrollTop || document.body.scrollTop)) {
		$('.midSection').velocity('scroll', {
			duration: 1000,
			easing: [.67,.01,0,1],
			complete: function() {
				ignoreScroll = false;
			}
		});
		return false;
	}

	if (order == 0 && direction == 'up') {
		$.Velocity.RunSequence(sequenceSection1OUT_Half);
		$('.topSection').velocity('scroll', {
			duration: 1000,
			easing: [.67,.01,0,1],
			complete: function() {
				ignoreScroll = false;
			}
		});
	} else if ($(this).prev('section').length && direction == 'up') {
		animateSections($(this), $(this).prev('section'));
	} else if ($(this).next('section').length && direction == 'down') {
		animateSections($(this), $(this).next('section'));
	} else {
		ignoreScroll = false;
		return true;
	}
	return false;
}

var $activeSection = $('.midSection section:first');
var sequenceOutToPlay, sequenceInToPlay;
function animateSections($out, $in) {
	var indexOut = $out.data('order');
	var indexIn = $in.data('order');

	var $sections = $('.midSection section');

	var length = $sections.length;

	$sections.each(function() {
		if ($(this).data('order') == $out.data('order')) {
			$(this).css('zIndex', length);
		} else if ($(this).data('order') == $in.data('order')) {
			$(this).css('zIndex', length - 1);
		} else {
			$(this).css('zIndex', 1);
		}
		$in.css('display', 'block');
		$in.css('opacity', '1');
		$activeSection = $in;
	});

	sequenceOutToPlay = sequencesOUT[indexOut];
	sequenceInToPlay = sequencesIN[indexIn];

	$.Velocity.RunSequence(sequenceOutToPlay);
}


/** TIMELINE **/
var actualNumber = 1915,
nextNumber = 0,
$numberPlaceholder = $('.timeline_number')
speed = 50;

function animateNumber() {
	if (nextNumber < actualNumber) actualNumber--;
	else actualNumber++;

	$numberPlaceholder.html(actualNumber);

	if (nextNumber == actualNumber) return;

	setTimeout(function() {
		animateNumber();
	}, speed);
}

function getTimelineSequence($out, $in, $widget) {
	return [
	{ e: $out.find('.timeline_leftSide'), p: 'transition.slideUpOut', o: { duration: 500/2 } },
	{ e: $out.find('.timeline_rightSide'), p: 'transition.slideUpOut', o: { delay: 200/2, duration: 300/2, sequenceQueue: false } },
	{ e: $out.find('.timeline_rightSide .timeline_imageCadre-1'), p: { left: '100%' }, o: { easing: [0.470, 0.000, 0.745, 0.715], duration: 0 } },
	{ e: $out.find('.timeline_rightSide .timeline_imageCadre-2'), p: { bottom: '100%' }, o: { easing: [0.470, 0.000, 0.745, 0.715], duration: 0, sequenceQueue: false } },
	{ e: $out.find('.timeline_rightSide .timeline_imageCadre-3'), p: { left: '100%' }, o: { easing: [0.390, 0.575, 0.565, 1.000], duration: 0, sequenceQueue: false } },
	{ e: $out.find('.timeline_rightSide .timeline_imageCadre-4'), p: { bottom: '100%' }, o: { easing: [0.390, 0.575, 0.565, 1.000], duration: 0, sequenceQueue: false, complete: function() {
		animateNumber();
	} } },
	{ e: $in, p: 'transition.slideUpIn', o: { delay: 200/2, duration: 500/2 } },
	{ e: $in.find('.timeline_leftSide'), p: 'transition.slideUpIn', o: { duration: 1000/2 } },
	{ e: $in.find('.timeline_rightSide'), p: 'transition.slideUpIn', o: { delay: 200/2, duration: 800/2, sequenceQueue: false } },
	{ e: $in.find('.timeline_rightSide .timeline_imageCadre-1'), p: { left: 0 }, o: { easing: [0.470, 0.000, 0.745, 0.715], duration: 800/2, sequenceQueue: false } },
	{ e: $in.find('.timeline_rightSide .timeline_imageCadre-2'), p: { bottom: 0 }, o: { easing: [0.470, 0.000, 0.745, 0.715], duration: 800/2, sequenceQueue: false } },
	{ e: $in.find('.timeline_rightSide .timeline_imageCadre-3'), p: { left: 0 }, o: { easing: [0.390, 0.575, 0.565, 1.000], duration: 1500/2 } },
	{ e: $in.find('.timeline_rightSide .timeline_imageCadre-4'), p: { bottom: 0 }, o: { easing: [0.390, 0.575, 0.565, 1.000], duration: 1500/2, sequenceQueue: false, complete: function () {
		$in.addClass('active');
		$out.removeClass('active');

		$widget.slider('working', false);
	} } }
	];
}


function animateScrollDown($dots) {
	$dots.velocity('transition.fadeOut', { duration: 500, display: null, complete: function() {
		$dots.velocity('transition.fadeIn', { duration: 1000/2, display: null, stagger: 250, complete: function() {
			animateScrollDown($dots);
		}});
	}});
}

////////////////////////////////////////////////////
//////////////// Contact Google Map ////////////////
////////////////////////////////////////////////////

function init_contact_google_map() {
	if (!$('#map-canvas').length) {
		return;
	}
	var map;
	var rvgMarker = new google.maps.LatLng(-22.768208, -47.3442987);

	var mapOptions = {
		zoom: 17,
		center: rvgMarker,
		scrollwheel: false,
		disableDefaultUI: true,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'usroadatlas']
		},
		styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
	};

	map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);

	var marker = new google.maps.Marker({
		position: rvgMarker,
		map: map,
		title: 'Donny Archanjo Atelier',
		icon: settings.mapIcon,
		url: 'https://www.google.com/maps/place/Atelier+Donny+Archanjo/@-22.768208,-47.3442987,17z/data=!3m1!4b1!4m5!3m4!1s0x94c8996e76c3a8fb:0x29ef18bc5fc94ad0!8m2!3d-22.768208!4d-47.34211'
	});
	google.maps.event.addListener(marker, 'click', function() {
		window.open(
			this.url,
			'_blank'
			);
	});
};