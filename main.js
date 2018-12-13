(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
		
showLogIn = () => {
	document.querySelector('.logIn').style.display = 'block';
	document.querySelector('.signUp').style.display = 'none';
	document.querySelector('.formAct').style.display = 'block';
	document.querySelector('.formAct').textContent = 'Log In';
};

showSignUp = () => {
	document.querySelector('.logIn').style.display = 'none';
	document.querySelector('.signUp').style.display = 'block';
	document.querySelector('.formAct').style.display = 'block';
	document.querySelector('.formAct').textContent = 'Sign up';
};

var index = 0;

slideShow = () => {
	let links = ['https://3.bp.blogspot.com/-6mz5yiq6vd8/WibA8bEMKoI/AAAAAAAANl4/qNsKDmtF0NUem04eDqgxAuWOKRVesBLbACLcBGAs/s1600/Ronaldo%2Bvs%2BMessi%2B4.jpg', 
	'http://media1.santabanta.com/full1/Football/Football%20Abstract/football-abstract-13a.jpg', 
	'https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png', 
	'https://i1.wp.com/www.eplindex.com/wp-content/uploads/2012/06/Mellberg-prof.jpg'];
	let slides = document.querySelector('.slides');
	let imgs = document.querySelector('.imgs');

	slides.style.display = 'none';

	index++;
	//index += 2;
	if( index < 0 ) index = 1;
	if( index > links.length ) index = 1;
	imgs.src = links[--index];
	document.querySelector('.numtxt').textContent = ( index + 1 ) + ' / ' + links.length;
	slides.style.display = 'block';

	setTimeout(slideShow, 2500);
};

slideShow();

slide = val => {
	index += val;
	slideShow();
};

checkInput = () => {
	let fields = document.querySelectorAll('.text');
			
	let fieldsArr = Array.from(fields);

	console.log(fieldsArr);
	let mail = document.querySelector('.em');
	let rmail = document.querySelector('.rem');
	let passwd = document.querySelector('.ps');
	let rpasswd = document.querySelector('.rps');
	let err = document.querySelector('.error');
	if( ( mail.value != rmail.value && mail.value != '' ) || ( passwd.value != rpasswd.value && passwd.value != '' ) ) {
		err.style.display = 'block';
		mail.style.borderColor = 'red';
		rmail.style.borderColor = 'red';
		passwd.style.borderColor = 'red';
		rpasswd.style.borderColor = 'red';
		fieldsArr.forEach(cur => {
			cur.value = "";
		});
	}
};

reset = () => {
	let fields = querySelectorAll('.text');
	let err = document.querySelector('.error');
	let arr = Array.from(fields);

	if( err.style.display == 'block' ){
		err.style.display == 'none';
		arr.forEach( cur => {
			cur.borderColor = 'lightblue';
		});
	}
};