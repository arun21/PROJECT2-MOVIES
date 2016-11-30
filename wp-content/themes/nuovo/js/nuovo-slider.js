jQuery(document).ready(function() {
	jQuery('.slideshow').cycle({
		fx: 'scrollHorz',
		pause: 1,
		prev: '.slideshow-previous',
		next: '.slideshow-next',
		timeout: 6000,
		fit: 1
	});
});
