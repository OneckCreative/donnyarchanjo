<script>
		// JS SMOOTH SCROLL
		$(document).on('click', '.js-smooth-scroll', function () {
			var href = $(this).attr('href');
			var $destination = $(href);

			if (href == '.midSection') {
				$destination.velocity('scroll', {
					duration: settings.animationSpeed.SLOWER,
					easing: [.67, .01, 0, 1],
					complete: function () {
						$.Velocity.RunSequence(sequenceSection1IN);
					}
				});
			} else {
				$destination.velocity('scroll', {
					duration: settings.animationSpeed.SLOWER,
					easing: [.67, .01, 0, 1],
				});
			}
			return false;
		});
	</script>
</body>
</html>