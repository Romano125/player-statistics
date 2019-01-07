<?php
	echo "mrzim faks";
	$name = $_POST['name'];
	$last = $_POST['last'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$pass = $_POST['passwd'];
	$mail = $_POST['mail'];
	$f = $_POST['agree'];

	if( empty($name) | empty($last) | empty($pass) | empty($mail)) {
		header('Location: http://localhost:8080/projekt/main.php');	
	}else{
		$db = new mysqli('localhost', 'root', '', 'player_stats');

		$q = "SELECT e_mail FROM users";

		$res = $db->query($q);

		$f = 0;
		while( $r = $res->fetch_assoc() ) {
			if( !strcmp($r['e_mail'], $mail) ) $f = 1;
		}

		$tmpPic = 'http://www.evolvefish.com/thumbnail.asp?file=assets/images/vinyl%20decals/EF-VDC-00035(black).jpg&maxx=300&maxy=0';
		$tmpPrivilage = 0;
		if( $f == 0 ) {
			$query = "INSERT INTO users (name, last_name, gender, age, password, e_mail , user_photo, back_photo, privilage) 
					  VALUES ('$name', '$last', '$gender', $age, '$pass', '$mail', '$tmpPic', '$tmpPic' , $tmpPrivilage)";

			$db->query($query);

			header('Location: http://localhost:8080/projekt/sucreg.html');
		}else{
			//uneseni mail se koristi
			header('Location: http://localhost:8080/projekt/failreg.html');	
		}
	}

?>