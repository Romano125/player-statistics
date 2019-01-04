<?php
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "SELECT reg_br_igr FROM users_votes";

	$res = $db->query($q);

	while( $r = $res->fetch_assoc() ) {
		$q = "UPDATE igrac SET votes=0 WHERE reg_br_igr='" . $r['reg_br_igr'] . "'";
		$db->query($q);
	}

	$q = "DELETE FROM users_votes";
	$db->query($q);

	header('Location: app.php');
?>