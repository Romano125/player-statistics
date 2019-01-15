<?php
	session_start();
	
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "DELETE FROM users_igrac WHERE ID=" . $_SESSION['id'] . " AND reg_br_igr='" . $_GET['id'] . "'";

	$db->query($q);

	$q = "UPDATE users_notifications SET seen=0 WHERE ID=" . $_SESSION['id'] . " AND reg_br_igr='" . $_GET['id'] . "'";

	header('Location: player.php?id=' . $_GET['id']);
?>