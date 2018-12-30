<?php
	$link = $_POST['link'];

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $q = "UPDATE goal_of_the_week SET link='" . $link . "'";

    $db->query($q);

    header('Location: app.php');
?>
