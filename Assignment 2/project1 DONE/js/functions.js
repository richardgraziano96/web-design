/* add in your functions here */
function outputCountryBox(name, continent, cities, photos) {
	document.write('<div class="item">');
	document.write('<h2>' + name + "</h2>");
	document.write('<p>' + continent + "</p>");
	document.write('<div class="inner-box">');

	document.write('<h3>Cities</h3>');
	document.write('<ul>');

	for (let city of cities) {
		document.write('<li>' + city + "</li>");
	}

	document.write('</ul>');
	document.write('</div>');

	document.write('<div class="inner-box">');
	document.write('<h3>Popular Photos</h3>');

	for (let photo of photos) {
		document.write('<img src="' + photo + '" class="photo">');
	}

	document.write('</div>');

	document.write("<button>Visit</button>");
	document.write("</div>");
}