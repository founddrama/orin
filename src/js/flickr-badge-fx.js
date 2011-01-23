/**
 * @requires {jQuery}
 */
orin.flickr = {
	onHover: function(){
		var i, w = $('#flickr_www_wrapper');

		$('.flickr_badge_image').hover(function(){
			i = $(this).children('a').children('img');
			var t = $(this).find('img').attr('title');

			i.css({
				border: '4px solid #ff1c92',
				margin: '-4px',
				zIndex: '200'
			});

			w.fadeOut('slow', function(){
				w.empty().append(t).fadeIn('slow');
			});
		}, function(){
			i.css({
				border: 'none',
				margin: '0',
				zIndex: '100'
			});
			w.fadeOut('fast', function(){
				w.empty().append('flick<span style="color:#ff1c92;">r</span>').fadeIn('fast');
			});
		});
	}
};

