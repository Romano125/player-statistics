<?php
    echo $_FILES['profile']['name'];

    $base = "C:/xampp/htdocs/projekt/users_photos/";

    if( !file_exists($base) ) mkdir($base, 0755);

    if( !file_exists($base.$_FILES['profile']['name']) ) {
        $r = move_uploaded_file($_FILES['profile']['tmp_name'], $base.$_FILES['profile']['name']);
        if( $r ) echo "<script>alert('a')</script>";

        $filename = $base.$_FILES['profile']['name'];
        $image = imagecreatefrompng($filename);
        imagepng($image, null, 100);

        $q = "INSERT INTO users (user_photo) VALUES (" . $image . ") WHERE ID=" . $_SESSION['id'];

        $db->query($q);

        header('Location: app.php?id=0');
    }
?>