<!DOCTYPE html>
<html>
	<head>
		<title>Player statistics</title>
		<link rel="stylesheet" type="text/css" href="./main.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta charset="utf-8" http-equiv="conten-type" content="text/html;charset=windows-1250">

		<script type="text/javascript">
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
		</script>

	</head>
	<body>
		<div class="header">
			<table>
				<tr>
					<td width="100%"><h2>Player statistics</h2></td>
					<td><button class="headBtnLog" onclick="showLogIn()">Log In</button></td>
					<td><button class="headBtnSig" onclick="showSignUp()">Sign Up</button></td>
				</tr>
			</table>
		</div>

		<div class="container">
			<div class="shimg">
				<h3>Track your favourite players</h3>
				<div class="slides fade">
					<p class="numtxt">1 / 2</p>
					<img class="imgs" src="http://media1.santabanta.com/full1/Football/Football%20Abstract/football-abstract-13a.jpg">
				</div>
				<a class="prev" onclick="slide(-1)">&#10094;</a>
				<a class="next" onclick="slide(1)">&#10095;</a>
			</div>

			<div class="form">
				<h3 class ="formAct">Sign up</h3>

				<form action="signup.php" method="POST" name="signUp" class="signUp needs-validation" novalidate>
					<div class="row">
						<table>
							<tr> <td>Name: </td> <td><input onfocus="reset()" class="text form-control" type="text" name="name" placeholder="Enter your name" required><div class="invalid-feedback">
					      Please enter your name.
						</div></td> </tr>
						</table>
					</div>
					<div class="col-xs-3">
						Last Name: <input class="text form-control" type="text" name="last" placeholder="Enter your last name" required>
					    <div class="invalid-feedback">
					      Please enter your last name.
						</div>
					</div>
					<div class="col-xs-3">
						Choose gender: <select name="gender" class="form-control" required>
							<option value="">Choose gender</option>
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
					    <div class="invalid-feedback">
					      Please select gender.
						</div>
					</div>
					<div class="col-xs-3">
						<?php
							$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

							$q = "SELECT age FROM ages";

							$res = $db->query($q);

							echo "Choose age: <select name='age' class='form-control' required>
													<option value=''>Choose age</option>";
							while( $r = $res->fetch_assoc() ) {
								echo "<option value='" . $r['age'] . "'>". $r['age'] . "</option>";
							}
							echo "</select>";

							mysqli_close($db);
						?>
					    <div class="invalid-feedback">
					      Please select age.
						</div>
					</div>
					<div class="col-xs-3">
	      				Password: <input class="ps text form-control" type="password" name="passwd" placeholder="Enter password" required>
					    <div class="invalid-feedback">
					      Please enter password.
						</div>
					</div>
					<div class="col-xs-3">
	      				Repeate password: <input onchange="checkInput()" class="rps text form-control" type="password" name="rPasswd" placeholder="Repeat password" required>
					    <div class="invalid-feedback">
					      Please repeate password.
						</div>
					</div>
					<div class="col-xs-3">
	      				E-mail: <input class="em text form-control" type="text" name="mail" placeholder="Enter your E-mail" required>
					    <div class="invalid-feedback">
					      Please enter e-mail.
						</div>
					</div>
					<div class="col-xs-3">
	      				Repeate e-mail: <input onchange="checkInput()" class="rem text form-control" type="text" name="rMail" placeholder="Repeate E-mail" required>
					    <div class="invalid-feedback">
					      Please repeate e-mail.
						</div>
					</div>
					<div class="form-check">
	      				<input class="form-check-input" type="checkbox" name="agree" value="" id="invalidCheck" required>Agree to terms and conditions
					    <div class="invalid-feedback">
					      You must agree before submitting.
						</div>
					</div>
					<p class="error"> Uneseni mail vec postoji </p>
					<button class="signUpBtn">Sign up</button>
				</form>

				<form action="login.php" method="POST" name="logIn" class="logIn needs-validation" novalidate>
					<div class="col-xs-3">
						E-mail: <input type="text" class="form-control" name="mail" id="validationCustomUsername" placeholder="Please enter your e-mail" required>
				        <div class="invalid-feedback">
				          Please provide a valid e-mail.
				        </div>
			    	</div>
			    	<div class="col-xs-3">
						Password: <input class="form-control" type="password" name="passwd" id="validationCustom05" placeholder="Enter your password" required>
						<div class="invalid-feedback">
				          Please provide a valid password.
				        </div>
				    </div>
					<button class="logInBtn btn btn-primary" type="submit">Log in</button>
				</form>

			</div>
		</div>

		<script type="text/javascript" src="./main.js"></script>
	</body>
</html>