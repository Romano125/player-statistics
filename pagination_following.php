<?php
   session_start();
   $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');
    $record_per_page = 3;

    $output = '';

    $page = '';

    if(isset($_POST['page'])){
        $page = $_POST['page'];

    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;

    $id = $_POST['id_usr'];
    //$q = "SELECT ID, user_photo, name, last_name, voteDate  FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "' AND active = 1 LIMIT $start_from, $record_per_page";
   // $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID= $id) LIMIT $start_from, $record_per_page";
     // $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID=" . $_GET['id'] . ")";
     $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT ID FROM users_followers WHERE follows= $id ) LIMIT $start_from, $record_per_page";


    $res = $db->query($q);
   
    if( $res->num_rows == 0 ) {
        $output .= "<h3 style='text-align: center;color: grey'>No results</h3>";
    }else{
        while( $r = $res->fetch_assoc() ) {
            $output .= "<div class='row'>";
                $output .=  "<div class=col-md-6>
                        <a href='users_info.php?id=" . $r['ID'] . "' id='post'><img src='" . $r['user_photo'] . "' height='55px' width='55px'></a>
                    </div>";
                $output .=  "<div class='col-md-6' style = 'text-decoration-color: aqua '>
                    <b>Name:</b> " . $r['name'] . "</br>
                    <b>Last name:</b> " . $r['last_name'] ."</br>
                    <b>Voted on:</b> ".$r['e_mail']."
                </div>";
            $output .=  "</div>";
            $output .=  "<hr width='100%'>";
        }
    

        //$q = "SELECT ID, user_photo, name, last_name, voteDate  FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "' AND active = 1";
        //$q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID= $id) ";
        $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT ID FROM users_followers WHERE follows= $id )";// LIMIT $start_from, $record_per_page";


        $res = $db->query($q);
        $tot = $res ->num_rows;
        $totPages = ceil($tot / $record_per_page);
        //echo $totPages;
        for($i = 1; $i <= $totPages; $i++) {
            $output .= "<span class = 'pagination_link3' style = 'cursor:pointer; padding:6px; border:1px solid #ccc' id = '".$i."'>".$i."</span>";

        }

    }
    echo $output;
?>