<script src="<?php echo base_url();?>assets/js/jquery-2.1.3.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.12.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/velocity.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/velocity.ui.js"></script>
	<script src="<?php echo base_url();?>assets/js/mdk.slidere209.js?v=1.0.0"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.ajaxchimpe209.js?v=1.0.0"></script>
	<script src="<?php echo base_url();?>assets/js/rvg241d.js?v=0.0.1"></script>
	<script type="text/javascript">
		var $paceBars;
		Pace.on('start', function () {
			var $paceBars = $('<div class="pace-bars-wrapper"></div>');
			$paceBars.append('<div class="pace-bar"></div>');
			$paceBars.append('<div class="pace-bar"></div>');
			$paceBars.append('<div class="pace-bar"></div>');
			$paceBars.append('<div class="pace-bar"></div>');
			$('.pace').append($paceBars);
		});
		Pace.on("hide", function () {
			$('.topSection').velocity('scroll', {
				duration: 0
			});
			$("#loading-screen").velocity('transition.fadeOut');
		});
	</script>

	<!-- Background de menu -->
	<script type="text/javascript">
		$('.menu nav a').hover(function () {
			var img = $(this).data('img');
			if ($(this).index() == 0) {
				$('.menu .leftSide').addClass('homepage')
			}
			$('.menu .leftSide').stop(true, true).css('backgroundImage', "url(<?php echo base_url();?>assets/images/menu/default-bg.jpg)");
			$('.menu .leftSide').css('backgroundImage', 'url(' + img + ')');
		}, function () {
			if ($(this).index() == 0) {
				$('.menu .leftSide').removeClass('homepage')
			}
			$('.menu .leftSide').css('backgroundImage', "url(<?php echo base_url();?>assets/images/menu/default-bg.jpg)");
		});

		$(document).on('click', '.menuButton', function () {
			$('.menu').velocity('transition.fadeIn');
		});
		$(document).on('click', '.menu .closeIcon', function () {
			$('.menu').velocity('transition.fadeOut');
		});
	</script>

	<script>
		var settings = {
			animationSpeed: {
				FASTEST: 250 / 2,
				FASTER: 500 / 2,
				FAST: 800 / 2,
				MIDDLE: 1000 / 2,
				SLOW: 1500 / 2,
				SLOWER: 2000 / 2,
				SLOWEST: 2500 / 2
			}
		};
	</script>