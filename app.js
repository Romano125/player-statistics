document.getElementById('menu-toggle').addEventListener( 'click', e => {
    e.preventDefault();
    document.getElementById('wrapper').classList.toggle('menuDisplayed');
});