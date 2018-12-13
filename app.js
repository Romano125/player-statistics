set = () => {
	window.setInterval('write()', 250);

};
var i = -1;

spn = () => {
	let r = Math.floor(Math.random() * 255); 
	let g = Math.floor(Math.random() * 255); 
	let b = Math.floor(Math.random() * 255); 

	return '<span style=\'color: rgb(' + r + ', ' + g + ', ' + b + ')\' >'; 
};

write = () => {
	let input = document.getElementById('inp').value;
	i++;
	if( i == input.length ){
		i = 0;
		document.getElementById('txt').innerHTML += '<br>';
	}
	document.getElementById('txt').innerHTML += spn() + input.charAt(i) + '</span>'; 
};


document.getElementById('btn').addEventListener('click', set);