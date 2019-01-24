<?php 
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "UPDATE users SET privilage=1 WHERE ID=" . $_GET['id'];

	$db->query($q);

	header('Location: users_info.php?g=1&id=' . $_GET['id']);
?>