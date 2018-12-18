<?php
	session_start();

	$n = $_POST['n'];
	$l = $_POST['l'];
	$a = $_POST['a'];
	$g = $_POST['g'];
	$e = $_POST['e'];
	$p = $_POST['p'];

	$db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

	$q = "UPDATE users SET name='" . $n . "', last_name='" . $l . "', age='" . $a . "', gender='" . $g . "', e_mail='" . $e . "', password='" . $p . "' WHERE ID=" . $_SESSION['id'];

	$db->query($q);

	header('Location: app.php');
?>