<?php
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "SELECT reg_br_igr FROM users_votes";

	$res = $db->query($q);

	while( $r = $res->fetch_assoc() ) {
		$q = "UPDATE igrac SET votes=0 WHERE reg_br_igr='" . $r['reg_br_igr'] . "'";
		$db->query($q);
	}

	$q = "UPDATE users_votes SET active = 0 WHERE active = 1";
	$db->query($q);

	$q = "UPDATE service_table SET val = val + 1 WHERE idService = 7";
	$db->query($q);

	header('Location: app.php');
?>