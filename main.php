<!DOCTYPE html>
<html>
	<head>
		<title>Player statistics</title>
		<link rel="stylesheet" type="text/css" href="./main.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta charset="utf-8" http-equiv="conten-type" content="text/html;charset=windows-1250">
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
			<form action="signup.php" method="POST" name="signUp" class="signUp">
				<div>
					<p>Name: <input onfocus="reset()" id="invalidCheck" class="text form-check-input" type="text" name="name" placeholder="Enter your name" required></p>
				    <div class="invalid-feedback">
				      Please enter your name.
					</div>
				</div>
				<div>
					<p>Last Name: <input class="text" type="text" name="last" placeholder="Enter your last name" required></p>
				    <div class="invalid-feedback">
				      Please enter your last name.
					</div>
				</div>
				<div>
					<p>Choose gender: <select name="gender" required>
						<option value="">Choose gender</option>
						<option value="M">M</option>
						<option value="F">F</option>
					</select></p>
				    <div class="invalid-feedback">
				      Please select gender.
					</div>
				</div>
				<div>
					Choose age: <select name="age" required>
						<option value="">Choose age</option>
						<option value="18">18</option>
						<option value="20">20</option>
					</select>
				    <div class="invalid-feedback">
				      Please select age.
					</div>
				</div>
				<div class="form-check">
      				<p>Password: <input class="ps text" type="password" name="passwd" placeholder="Enter password" required></p>
				    <div class="invalid-feedback">
				      Please enter password.
					</div>
				</div>
				<div class="form-check">
      				<p>Repeate password: <input onchange="checkInput()" class="rps text" type="password" name="rPasswd" placeholder="Repeat password" required></p>
				    <div class="invalid-feedback">
				      Please repeate password.
					</div>
				</div>
				<div class="form-check">
      				<p>E-mail: <input class="em text" type="text" name="mail" placeholder="Enter your E-mail" required></p>
				    <div class="invalid-feedback">
				      Please enter e-mail.
					</div>
				</div>
				<div class="form-check">
      				<p>Repeate e-mail: <input onchange="checkInput()" class="rem text" type="text" name="rMail" placeholder="Repeate E-mail" required></p>
				    <div class="invalid-feedback">
				      Please repeate e-mail.
					</div>
				</div>
				<div class="form-check">
      				<p><input class="form-check-input" type="checkbox" name="agree" value="" id="invalidCheck" required>Agree to terms and conditions</p>
				    <div class="invalid-feedback">
				      You must agree before submitting.
					</div>
				</div>
				<p class="error">Please check your password or e-mail!</p>
				<button class="signUpBtn">Sign up</button>
			</form>
			<form action="login.php" method="POST" name="logIn" class="logIn">
				<p>E-mail: <input type="text" class="text" name="mail" id="validationCustomUsername" placeholder="Please enter your e-mail" required></p>
		        <div class="invalid-feedback">
		          Please provide a valid e-mail.
		        </div>
				<p>Password: <input class="text" type="password" name="passwd" id="validationCustom05" placeholder="Enter your password" required></p>
				<div class="invalid-feedback">
		          Please provide a valid password.
		        </div>
				<button class="logInBtn btn btn-primary" type="submit">Log in</button>
			</form>
		</div>

		
		

		<script type="text/javascript" src="./main.js"></script>
	</body>
</html>