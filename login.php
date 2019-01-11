<?php
	$pass = $_POST['passwd'];
	$mail = $_POST['mail'];

	if(empty($pass) | empty($mail)) {
		header('Location: http://localhost:8080/projekt/login.html');
	}else{
		$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

		$query = "SELECT * FROM users";

		$res = $db->query($query);

		$f = 0;
		while( $r = $res->fetch_assoc() ) {
			if( !strcmp($pass, $r['password']) && !strcmp($mail, $r['e_mail']) ) {
				$f = 1;
				$name = $r['name'];
				$id = $r['ID'];
				$priv = $r['privilage'];
				$last = $r['last_name'];
				$mail = $r['e_mail'];
			}
		}

		if( $f == 1 ) {
			$time = time();
			session_start();
			$_SESSION['id'] = $id;
			$_SESSION['user'] = $name;
			$_SESSION['last'] = $last;
			$_SESSION['time'] = $time;
			$_SESSION['priv'] = $priv;
			$_SESSION['mail'] = $mail;
			header('Location: http://localhost:8080/projekt/app.php');
		}else {
			header('Location: http://localhost:8080/projekt/logfal.html');
		}
	}
?>