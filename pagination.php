<?php
    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $record_per_page = 10;
    
    $q = "SELECT val from service_table where idService = 1";
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $record_per_page = $res['val'];

    $page = '';
    $output = '';

    if(isset($_POST["page"])){
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;

    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id=?
          LIMIT $start_from, $record_per_page";

    $sql_query = $db->prepare($q);
    $sql_query->bind_param('s', $_POST['pos']);
    $sql_query->execute();
    $res = $sql_query->get_result();

        while($row = $res->fetch_assoc()) {
            $output .= "
            <div class='row'>
                                <div class='col-md-3'>
                                    <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                    <button type='button' class='btn btn-outline-dark'><a href='player.php?id=" . $row['reg_br_igr'] . "'>More info</a></button>
                                </div>
                                <div class='col-md-3'>
                                    Name: " . $row['ime'] . "<br>
                                    Last name: " . $row['prezime'] . "<br>
                                    Goals: " . $row['br_gol'] . "<br>
                                    Asists: " . $row['br_asist'] . "<br>
                                    Club: " . $row['klub_ime'] . "<br>
                                </div>
                            </div><br><hr>";
        }
        $output .= "<br/><div align 'center'>";
        $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id=?";
        $sql_query = $db->prepare($q);
        $sql_query->bind_param('s', $_POST['pos']);
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

