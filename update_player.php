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
		//treba doraditi bazu za ovo da radi...
		/*if( isset($_POST['club']) ) {
			$q = "SELECT klub_ime, ime, prezime FROM igrac JOIN klub using(klub_id) WHERE reg_br_igr='" . $_GET['id'] . "'";

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

			$q = "UPDATE igrac_natjecanje SET klub_id='" . $_POST['club'] . "' WHERE reg_br_igr='" . $_GET['id'] . "'";

			$db->query($q);

			$q = "UPDATE igrac SET klub_id='" . $_POST['club'] . "' WHERE reg_br_igr='" . $_GET['id'] . "'";

			$db->query($q);

			$not = $showDate . "<br>Player " . $name . " " . $last . " moved from " . $club . " to " . $_POST['club'];

			$q = "SELECT ID FROM users";

			$res = $db->query($q);

			while( $r = $res->fetch_assoc() ) {
				$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
				$db->query($q);
			}
		}
		if( isset($_POST['jersy']) ) {
			$q = "SELECT br_dres, ime, prezime FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";

			$res = $db->query($q);

			$name;
			$last;
			$jersy;
			$showDate = date("Y-m-d");
			while( $r = $res->fetch_assoc() ) {
				$name = $r['ime'];
				$last = $r['prezime'];
				$jersy = $r['br_dres'];
			}

			$q = "UPDATE igrac SET br_dres=" . $_POST['jersy'] . " WHERE reg_br_igr='" . $_GET['id'] . "'";

			$db->query($q);

			$not = $showDate . "<br>Player " . $name . " " . $last . " changed jersy number, now on his back will be " . $_POST['jersy'];

			$q = "SELECT ID FROM users";

			$res = $db->query($q);

			while( $r = $res->fetch_assoc() ) {
				$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
				$db->query($q);
			}
		}
		if( isset($_POST['price']) ) {
			$q = "SELECT price, ime, prezime FROM igrac WHERE reg_br_igr='" . $_GET['id'] . "'";

			$res = $db->query($q);

			$name;
			$last;
			$price;
			$showDate = date("Y-m-d");
			while( $r = $res->fetch_assoc() ) {
				$name = $r['ime'];
				$last = $r['prezime'];
				$price = $r['price'];
			}

			$f = 0;
			if( $_POST['price'] != $price ) {
				$q = "UPDATE igrac SET price=" . $_POST['price'] . " WHERE reg_br_igr='" . $_GET['id'] . "'";

				$db->query($q);

				$f = $_POST['price'] > $price ? 1 : -1;
			}

			$dif = 0;
			if( $f == 1 ) {
				$dif = $_POST['price'] - $price;
				$not = $showDate . "<br>The price of a player " . $name . " " . $last . " <span style='color: green'>increased</span> by " . $dif . " and now it's value is " . $_POST['price'];
			}
			if( $f == -1 ) {
				$dif = $price - $_POST['price'];
				$not = $showDate . "<br>The price of a player " . $name . " " . $last . " <span style='color: red'>decreased</span> by " . $dif . " and now it's value is " . $_POST['price'];
			}
			if( $f != 0 ) {
				$q = "SELECT ID FROM users";

				$res = $db->query($q);

				while( $r = $res->fetch_assoc() ) {
					$q = "INSERT INTO users_notifications (ID, reg_br_igr, notification, seen, was_fav) VALUES (" . $r['ID'] . ", '" . $_GET['id'] . "', '" . $not . "', 1, 0)";
					$db->query($q);
				}
			}
		}*/
	}

	header('Location: player.php?id=' . $_GET['id']);
?>