<?php
	$link = $_POST['link'];

	$s = '';
	for( $i = 17; $i < 28; $i++ ) {
		$s .= $link[$i];
	}

	echo $s;

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $q = "UPDATE goal_of_the_week SET link='https://www.youtube.com/embed/" . $s . "'";

    $db->query($q);

    header('Location: app.php');
?>
