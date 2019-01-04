document.getElementById('menu-toggle').addEventListener( 'click', e => {
    e.preventDefault();
    document.getElementById('wrapper').classList.toggle('menuDisplayed');
});

document.getElementById('btn_show').addEventListener( 'click', () => {
	document.querySelector('.bg-modal').style.display = 'flex';
});

document.querySelector('.bg-modal').addEventListener( 'click', () => {
	document.querySelector('.bg-modal').style.display = 'none';
});

document.addEventListener('.close').addEventListener( 'click', () => {
	document.querySelector('.bg-modal').style.display = 'none';
});