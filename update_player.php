<?php

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	if( isset($_POST['goal+']) ) {
		$q = "UPDATE igrac SET br_gol=br_gol+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['goal-']) ) {
		$tmp = "SELECT br_gol FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";
		$sql_query = $db->prepare($tmp);
		$sql_query->execute();
		$res = $sql_query->get_result()->fetch_assoc();
		echo $res['br_gol'];
		if ($res['br_gol'] < 1) goto flag;
		$q = "UPDATE igrac SET br_gol=br_gol-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['ass+']) ) {
		$q = "UPDATE igrac SET br_asist = br_asist + 1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['ass-']) ) {
		$tmp = "SELECT br_asist FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";
		$sql_query = $db->prepare($tmp);
		$sql_query->execute();
		$res = $sql_query->get_result()->fetch_assoc();
		echo $res['br_asist'];
		if ($res['br_asist'] < 1) goto flag;
		$q = "UPDATE igrac SET br_asist=br_asist-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['yell+']) ) {
		$q = "UPDATE igrac SET br_zkarton=br_zkarton+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['yell-']) ) {
		$tmp = "SELECT br_zkarton FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";
		$sql_query = $db->prepare($tmp);
		$sql_query->execute();
		$res = $sql_query->get_result()->fetch_assoc();
		echo $res['br_zkarton'];
		if ($res['br_zkarton'] < 1) goto flag;
		$q = "UPDATE igrac SET br_zkarton=br_zkarton-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['red+']) ) {
		$q = "UPDATE igrac SET br_ckarton=br_ckarton+1 WHERE reg_br_igr='" . $_GET['id'] . "'";

	}else if( isset($_POST['red-']) ) {
		$tmp = "SELECT br_ckarton FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";
		$sql_query = $db->prepare($tmp);
		$sql_query->execute();
		$res = $sql_query->get_result()->fetch_assoc();
		echo $res['br_ckarton'];
		if ($res['br_ckarton'] < 1) goto flag;
		$q = "UPDATE igrac SET br_ckarton=br_ckarton-1 WHERE reg_br_igr='" . $_GET['id'] . "'";

		
	}

	$db->query($q);
flag:
	header('Location: player.php?id=' . $_GET['id']);
?>