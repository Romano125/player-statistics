<?php
	session_start();
	
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "INSERT INTO users_igrac (ID, reg_br_igr) VALUES (" . $_SESSION['id'] . ", '" . $_GET['id'] . "')";

	$db->query($q);

	$q = "SELECT ime, prezime FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";

	$res = $db->query($q);

	//$time = time();
	$name;
	$last;
	$showDate = date("Y-m-d h:i:s");
	while( $r = $res->fetch_assoc() ) {
		$name = $r['ime'];
		$last = $r['prezime'];
	}

	echo $showDate;

	$not = $showDate . "<br>You are now following player " . $name . " " . $last;

	$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav, recieved) VALUES (" . $_SESSION['id'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0, '" . $showDate . "')";
	$db->query($q);

	header('Location: player.php?id=' . $_GET['id']);
?>