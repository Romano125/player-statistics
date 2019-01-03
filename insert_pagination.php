<?php
    $conn = new mysqli('127.0.0.1', 'root','','player_stats');
    if ($conn->connect_error) {
        die("Uspostavljanje konekcije nije uspjelo: ". $conn->connect_error);
    }

    if (isset($_POST["optradio"])){
        $query = "UPDATE service_table SET val = ? WHERE idService = 1";
        $sql_query = $conn->prepare($query);
        $sql_query->bind_param("i", $_POST["optradio"]);
        $sql_query->execute();
    }

?>