<?php
    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $key = "";
    $q = "SELECT * FROM service_table WHERE idService = 6";
    if($db->prepare($q)) {
        $sql_query = $db->prepare($q);
        $sql_query->execute();
        $result = $sql_query->get_result();
        $res = $result->fetch_array();
        $key = $res['txt'];
    } 

    $record_per_page = 10;
    
    $page = '';
    $output = '';

    if(isset($_POST["page"])){
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;


    $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE name LIKE '%$key%' OR last_name LIKE '%$key%'";
    //echo $key;
  

    if ($db->prepare($q)) {
        //echo $q;
        $sql_query = $db->prepare($q);
        $sql_query->execute();
        $res = $sql_query->get_result();
    }
    else {
        echo "No results";
        return;
    }

        while($row = $res->fetch_assoc()) {
            $output .= "
            <div class='row'>
                <div class='col-md-3'>
                    <img src='" . $row['user_photo'] . "' height='55px' width='55px'><br>
                    <button type='button' class='btn btn-dark btn-sm'><a href='users_info.php?id=" . $row['ID'] . "' style='text-decoration: none;color: white'>User info</a></button>
                </div>
                <div class='col-md-3'>
                    Name: " . $row['name'] . "<br>
                    Last name: " . $row['last_name'] . "<br>
                    E-mail: " . $row['e_mail'] . "<br>
                </div>
            </div><br><hr>";
        }
        $output .= "<br/><div align 'center'>";
        $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE name LIKE '%$key%' OR last_name LIKE '%$key%'";
        $sql_query = $db->prepare($q);
        $sql_query->execute();
        $page_result = $sql_query->get_result();
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil ($total_records/$record_per_page);
        for($i = 1; $i <= $total_pages; $i++) {
            $output .= "<span class = 'pagination_link' style = 'cursor:pointer; padding:6px; border:1px solid #ccc' id = '".$i."'>".$i."</span>";

        }
        echo $output;
          /*mozda za prikz igraca
          <div class='card' style='width: 18rem;'>
                                      <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' class='card-img-top' alt='...'>
                                      <div class='card-body'>
                                        <h5 class='card-title'>Card title</h5>
                                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' class='btn btn-primary'>Go somewhere</a>
                                      </div>
                                    </div>*/          
?>

