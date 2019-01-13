<?php
	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $q = "UPDATE users_notifications SET seen=0 WHERE ID=" . $_GET['id'] . " AND notification='" . $_GET['not'] . "'";

    $db->query($q);

    header('Location: notifications.php');
?>