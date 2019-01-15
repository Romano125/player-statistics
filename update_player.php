<?php

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $_GET['id'] . "'";

    $res = $db->query($q);

    $natj;
    while( $r = $res->fetch_assoc() ) {
    	$natj = str_replace(' ', '_', $r['ime_natj']);
    	if( isset($_POST['g' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
    		if( $_POST['g' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_gol=br_gol+" . $_POST['g' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_gol=br_gol+" . $_POST['g' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " scored " . $_POST['g' . $natj] . " goals for " . $club . "";

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}
    		}
		}
		if( isset($_POST['a' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
			if( $_POST['a' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_asist=br_asist+" . $_POST['a' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_asist=br_asist+" . $_POST['a' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " assisted " . $_POST['a' . $natj] . " times for " . $club . "";

				echo $not;

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}	
    		}
		}
		if( isset($_POST['s' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
			if( $_POST['s' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_obrane=br_obrane+" . $_POST['s' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_obrane=br_obrane+" . $_POST['s' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " saved the net " . $_POST['s' . $natj] . " times for " . $club . "";

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}	
    		}
		}
		if( isset($_POST['y' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
			if( $_POST['y' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_zkarton=br_zkarton+" . $_POST['y' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_zkarton=br_zkarton+" . $_POST['y' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " got " . $_POST['y' . $natj] . " yellow cards";

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}	
    		}
		}
		if( isset($_POST['r' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
			if( $_POST['r' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_ckarton=br_ckarton+" . $_POST['r' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_ckarton=br_ckarton+" . $_POST['r' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " got " . $_POST['r' . $natj] . " red cards";

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}	
    		}
		}
		if( isset($_POST['p' . $natj]) && isset($_POST['h' . $natj]) && isset($_POST['aw' . $natj]) ) {
			if( $_POST['p' . $natj] != 0 ) {
    			$q = "UPDATE igrac_natjecanje SET br_utakmica=br_utakmica+" . $_POST['p' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "' AND ime_natj='" . $r['ime_natj'] . "'";
				$db->query($q);

				$q = "UPDATE igrac SET br_utakmica=br_utakmica+" . $_POST['p' . $natj] . " WHERE reg_br_igr='" . $_GET['id'] . "'";
				$db->query($q);

				$q = "SELECT ime, prezime, klub_ime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

				$res = $db->query($q);

				$name;
				$last;
				$club;
				$showDate = date("Y-m-d");
				while( $r = $res->fetch_assoc() ) {
					$name = $r['ime'];
					$last = $r['prezime'];
					$club = $r['klub_ime'];
				}

				$not = $showDate . "<br>In the game between " . $_POST['h' . $natj] . " and " . $_POST['aw' . $natj] . " player " . $name . " " . $last . " played the game";

				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}	
    		}
		}
	}

	header('Location: player.php?id=' . $_GET['id']);
?>