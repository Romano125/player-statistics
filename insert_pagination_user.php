<?php
    $conn = new mysqli('127.0.0.1', 'root','','player_stats');
    if ($conn->connect_error) {
        die("Uspostavljanje konekcije nije uspjelo: ". $conn->connect_error);
    }

        
        $txt = $_POST["text"];
       
        if($txt == '') {
              $query = "UPDATE service_table SET val = 0, txt = '' WHERE idService = 6";
         } else {
              $querytxt = "UPDATE service_table SET txt = '$txt' WHERE idService = 6";
              $sql_query_txt = $conn->prepare($querytxt);
              $sql_query_txt->execute();
              $query = "UPDATE service_table SET val = 1 WHERE idService = 6";
        }

        $sql_query = $conn->prepare($query);

        $sql_query->execute();
    
?>