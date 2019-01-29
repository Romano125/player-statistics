<?php
	session_start();
	$showDate = date("Ymd");

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "SELECT reg_br_igr FROM users_votes";

	$res = $db->query($q);

	while( $r = $res->fetch_assoc() ) {
		$q = "UPDATE igrac SET votes=0 WHERE reg_br_igr='" . $r['reg_br_igr'] . "'";
		$db->query($q);

		$_SESSION[$r['reg_br_igr']] = 0;
	}

	$q = "UPDATE users_votes SET active = 0 WHERE active = 1";
	$db->query($q);

	$q = "UPDATE service_table SET val = val + 1 WHERE idService = 7";
	$db->query($q);
	
	$q = "INSERT INTO weeks(weekNo, startDate) VALUES ((SELECT val FROM service_table where idService = 7), ".$showDate.")";
	$db->query($q);
	header('Location: app.php');
?>