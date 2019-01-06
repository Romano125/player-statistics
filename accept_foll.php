<?php
	session_start();

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "INSERT INTO users_followers (ID, follows) VALUES (" . $_GET['id'] . ", " . $_SESSION['id'] .")";

	$db->query($q);

	$q = "DELETE FROM followers_pending WHERE ID=" . $_GET['id'] . " AND want_follow=" . $_SESSION['id'];

	$db->query($q);

	header('Location: notifications.php');

?>