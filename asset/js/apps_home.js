const text = ['Prestasi-mu', ' Potensi-mu'];
let count = 0;
let index = 0;
let currentText = '';
let letter = '';

(function type() {

	if (count === text.length) {
		count = 0;
	}
	currentText = text[count];
	letter = currentText.slice(0, ++index);

	document.querySelector('.type').textContent = letter;
	if (letter.length === currentText.length) {
		count++;
		index = 0;
	}
	setTimeout(type, 500);

}());

function smoothScroll(target, duration) {
	var target = document.querySelector(target);
	var targetPosition = target.getBoundingClientRect().top;
	var startPosition = window.pageYOffset;
	var distance = targetPosition - startPosition;
	var startTime = null;

	function animation(currentTime) {
		if (startTime === null) startTime = currentTime;
		var timeElapsed = currentTime - startTime;
		var run = ease(timeElapsed, startPosition, distance, duration);
		window.scrollTo(0, run);
		if (timeElapsed < duration) requestAnimationFrame(animation);
	}

	function ease(t, b, c, d) {
		t /= d / 2;
		if (t < 1) return c / 2 * t * t + b;
		t--;
		return -c / 2 * (t * (t - 2) - 1) + b
	}

	requestAnimationFrame(animation);

}

var section1 = document.querySelector('.features');
var section2 = document.querySelector('.about');

section1.addEventListener('click', function () {
	smoothScroll('#features', 1500);
});

section2.addEventListener('click', function () {
	smoothScroll('#team', 1500);
});
