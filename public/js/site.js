window.sr = ScrollReveal({
	reset: true,
	origin: 'bottom',
	duration: 500,
});
sr.reveal('h2');
sr.reveal('.card');

var scroll = new SmoothScroll('nav a[href*="#"]', {
	speed: 800,
	offset: 150
});

lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true
})

