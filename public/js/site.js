if (window.matchMedia("(min-width: 700px)").matches) {
    window.sr = ScrollReveal({
        reset: false,
        origin: 'bottom',
        duration: 500,
    });
    sr.reveal('.block-title');
    sr.reveal('.card');
}


let scroll = new SmoothScroll('nav a[href*="#"], footer a[href*="#"], a.button', {
	speed: 800,
	offset: 150
});

lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true
});

