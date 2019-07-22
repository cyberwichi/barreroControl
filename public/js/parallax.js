$(window).on('scroll', parallax);

function parallax() {

	var s = $(window).scrollTop();
	$('h1').text('posicion ' + s);

	function parallaxBg(el, t) {
		$(el).css({
			'background-attachment': 'fixed',
			'background-position': 'center ' + -(s * t) + 'px'

		})

	}

	function parallaxFront(el, t) {
		$(el).css({
			'position': 'relative',
			'top': -(s * t) + 'px'


		})

	}
	parallaxBg('body', .2);
	parallaxBg('footer', -.1);
	parallaxFront('h1', 1.5);
	parallaxFront('.page', .1);
}
