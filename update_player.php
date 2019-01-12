<?php

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$br = 0;
	$br = $br + $_POST['gLiga_Prvaka'];
	echo $br;

	$q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $_GET['id'] . "'";

    $res = $db->query($q);

    $natj;
    while( $r = $res->fetch_assoc() ) {
    	$natj = str_replace(' ', '_', $r['ime_natj']);
    	if( isset($_POST['g' . $natj]) ) {
    		echo $_POST['g' . $natj];
			$q = "UPDATE igrac_natjecanje SET br_gol=br_gol+" . $_POST['g' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_gol=br_gol+" . $_POST['g' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
		if( isset($_POST['a' . $natj]) ) {
			$q = "UPDATE igrac_natjecanje SET br_asist=br_asist+" . $_POST['a' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_asist=br_asist+" . $_POST['a' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
		if( isset($_POST['s' . $natj]) ) {
			$q = "UPDATE igrac_natjecanje SET br_obrane=br_obrane+" . $_POST['s' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_obrane=br_obrane+" . $_POST['s' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
		if( isset($_POST['y' . $natj]) ) {
			$q = "UPDATE igrac_natjecanje SET br_zkarton=br_zkarton+" . $_POST['y' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_zkarton=br_zkarton+" . $_POST['y' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
		if( isset($_POST['r' . $natj]) ) {
			$q = "UPDATE igrac_natjecanje SET br_ckarton=br_ckarton+" . $_POST['r' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_ckarton=br_ckarton+" . $_POST['r' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
		if( isset($_POST['p' . $natj]) ) {
			$q = "UPDATE igrac_natjecanje SET br_utakmica=br_utakmica+" . $_POST['p' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
			$db->query($q);

			$q = "UPDATE igrac SET br_utakmica=br_utakmica+" . $_POST['p' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
			$db->query($q);
		}
	}

	header('Location: player.php?id=' . $_GET['id']);
?>