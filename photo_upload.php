<?php
    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $_SESSION['to_big'] = 0;

    $r = move_uploaded_file($_FILES['profile']['tmp_name'], $base.$_FILES['profile']['name']);

    if ( $_FILES['profile']['size'] > 500000 ) {
        $_SESSION['to_big'] = 1;
        header('Location: settings.php');
    }

    $filename = $base.$_FILES['profile']['name'];
    $image = imagecreatefromjpeg($filename);
    $image = file_get_contents($filename);

    $q = "UPDATE users SET user_photo='data:image/jpg;base64,".base64_encode($image)."' WHERE ID=" . $_GET['id'];

    $db->query($q);

    /*$base = "C:/xampp/htdocs/projekt/users_photos/";

    $imageFileType = strtolower(pathinfo($base,PATHINFO_EXTENSION));
    $_SESSION['to_big'] = 0;

    if( !file_exists($base) ) mkdir($base, 0755);

    if( !file_exists($base.$_FILES['profile']['name']) ) {
        $r = move_uploaded_file($_FILES['profile']['tmp_name'], $base.$_FILES['profile']['name']);

        if ( $_FILES['profile']['size'] > 500000 ) {
            $_SESSION['to_big'] = 1;
            header('Location: app.php?id=0');
        }

        $image = '';
        if( $imageFileType == "jpeg" ) {
            $filename = $base.$_FILES['profile']['name'];
            $image = imagecreatefromjpeg($filename);
            $image = file_get_contents($filename);
        }else if ( $imageFileType == "png" ) {
            $filename = $base.$_FILES['profile']['name'];
            $image = imagecreatefrompng($filename);
            $image = file_get_contents($filename);
        }else if ( $imageFileType == "gif" ) {
            $filename = $base.$_FILES['profile']['name'];
            $image = imagecreatefromgif($filename);
            $image = file_get_contents($filename);
        }else {
            $filename = $base.$_FILES['profile']['name'];
            $image = file_get_contents($filename);
        }

        $q = "UPDATE users SET user_photo='data:image/jpg;base64,".base64_encode($image)."' WHERE ID=" . $_GET['id'];

        $db->query($q);
    }*/

    header('Location: settings.php');
?>