<?php
	session_start();

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "SELECT want_follow FROM followers_pending WHERE ID=" . $_SESSION['id'];

	$res = $db->query($q);

	$f = 0;
	while( $r = $res->fetch_assoc() ) {
		if( $r['want_follow'] == $_GET['id']  ) $f = 1;
	}

	$q = "SELECT follows FROM users_followers WHERE ID=" . $_SESSION['id'];

	$res = $db->query($q);

	$f = 0;
	while( $r = $res->fetch_assoc() ) {
		if( $r['follows'] == $_GET['id']  ) $f = 1;
	}

	if( $f == 0 ) {
		$q = "INSERT INTO followers_pending (ID, want_follow) VALUES (" . $_SESSION['id'] . ", " . $_GET['id'] . ")";

		$db->query($q);
	}

	header('Location: users_info.php?id=' . $_GET['id']);

?>