<?php
	session_start();

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "DELETE FROM users_followers WHERE ID=" . $_SESSION['id'] . " AND follows=" . $_GET['id'];

	$db->query($q);

	header('Location: users_info.php?id=' . $_GET['id']);

?>