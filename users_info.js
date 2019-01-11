document.getElementById('menu-toggle').addEventListener( 'click', e => {
    e.preventDefault();
    document.getElementById('wrapper').classList.toggle('menuDisplayed');
});

document.getElementById('foll2').addEventListener( 'click', () => {
	document.querySelector('.bg-modal1').style.display = 'flex';
});

document.getElementById('foll1').addEventListener( 'click', () => {
	document.querySelector('.bg-modal2').style.display = 'flex';
});

document.querySelector('.bg-modal1').addEventListener( 'click', () => {
	document.querySelector('.bg-modal1').style.display = 'none';
});

document.querySelector('.bg-modal2').addEventListener( 'click', () => {
	document.querySelector('.bg-modal2').style.display = 'none';
});

document.querySelector('.close').addEventListener( 'click', () => {
	document.querySelector('.bg-modal1').style.display = 'none';
	document.querySelector('.bg-modal2').style.display = 'none';
});