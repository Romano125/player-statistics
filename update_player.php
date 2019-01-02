<?php

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	if( isset($_POST['goal+']) ) {
		$q = "UPDATE igrac SET br_gol=br_gol+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['goal-']) ) {
		$q = "UPDATE igrac SET br_gol=br_gol-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['ass+']) ) {
		$q = "UPDATE igrac SET br_asist += 1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['ass-']) ) {
		$q = "UPDATE igrac SET br_asist=br_asist-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['yell+']) ) {
		$q = "UPDATE igrac SET br_zkarton=br_zkarton+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['yell-']) ) {
		$q = "UPDATE igrac SET br_zkarton=br_zkarton-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['red+']) ) {
		$q = "UPDATE igrac SET br_ckarton=br_ckarton+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}else if( isset($_POST['red-']) ) {
		$q = "UPDATE igrac SET br_ckarton=br_ckarton-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		$db->query($q);
	}


	header('Location: player.php?id=' . $_GET['id']);
?>