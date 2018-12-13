<?php
	$pass = $_POST['passwd'];
	$mail = $_POST['mail'];

	if( empty($pass) | empty($mail) ) {
		
	}else{
		$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

		$query = "SELECT * FROM users";

		$res = $db->query($query);

		$f = 0;
		while( $r = $res->fetch_assoc() ) {
			if( !strcmp($pass, $r['password']) && !strcmp($mail, $r['e_mail']) ) {
				$f = 1;
				$name = $r['name'];
				$gen = $r['gender'];
			}
		}

		if( $f == 1 ) {
			$time = time();
			session_start();
			$_SESSION['user'] = $name;
			$_SESSION['time'] = $time;
			$_SESSION['gen'] = $gen;
			header('Location: http://localhost:8080/projekt/app.php');
		}else {
			header('Location: http://localhost:8080/projekt/logfal.html');
		}
	}
?>