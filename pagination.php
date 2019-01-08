<?php
    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

    $record_per_page = 10;
    $filterByName = "";
    $filterByLeague = "";
    $filterByClub = "";

    $q = "SELECT val from service_table where idService = 1";
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $record_per_page = $res['val'];

    $q = "SELECT val from service_table where idService = 2";  //sortby
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $sort_db = $res['val'];

    $q = "SELECT val, txt from service_table where idService = 3"; //name
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $nameBool = $res['val'];
    if ($nameBool > 0) {
        $filterByName = $res['txt'];
    }


    $q = "SELECT val, txt from service_table where idService = 4"; //league
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $leagueBool = $res['val'];
    if ($leagueBool > 0) {
        $filterByLeague = $res['txt'];
    }

    $q = "SELECT val, txt from service_table where idService = 5"; //club
    $sql_query = $db->prepare($q);
    $sql_query->execute();
    $result = $sql_query->get_result();
    $res = $result->fetch_array();

    $clubBool = $res['val'];
    if ($clubBool > 0) {
        $filterByClub = $res['txt'];
    }
    //echo $filterByClub;
   //echo $filterByLeague;
   //echo $filterByName;

    
    $sort_by = "prezime";
    $ascdesc = "ASC";
    switch($sort_db){
        case(1):
             $sort_by = "br_gol";
             $ascdesc = "DESC";
        break;
    
        case(2):
             $sort_by = "br_asist";
             $ascdesc = "DESC";
        break;

        case(3):
             $sort_by = "br_obrane";
             $ascdesc = "DESC";
        break;

        case(4):
             $sort_by = "votes";
             $ascdesc = "DESC";
        break;



    }
    $page = '';
    $output = '';

    if(isset($_POST["page"])){
        $page = $_POST["page"];
    } else {
        $page = 1;
    }

    $start_from = ($page - 1) * $record_per_page;

    if ($filterByName) {
        if ($filterByLeague) {
            if ($filterByClub) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                 WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub' AND ime_natj = '$filterByLeague'
                 ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            } 
            else {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            }
        } 

        else if ($filterByClub) {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                 WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub'
                 ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        } 

        else {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
            WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%')
            ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        }
    } 
    else if ($filterByClub) {
        if ($filterByName) {
            if ($filterByLeague) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            } 
            else {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub'
                ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            } 
        }
        else if ($filterByLeague) {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
            WHERE pozicija_id=? AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
            ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        }
        
        else {
             $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
             WHERE pozicija_id=? AND klub_ime = '$filterByClub'
             ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        }
    } 
    else if ($filterByLeague) {
        if ($filterByName) {
            if ($filterByClub) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub' AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            }
            else {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
            }
        }
        else if ($filterByClub) {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
            WHERE pozicija_id=? AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
            ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        }
        else {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
            WHERE pozicija_id=? AND ime_natj = '$filterByLeague'
            ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
        }
    } 
    else {
        $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
          WHERE pozicija_id=?
          ORDER BY $sort_by $ascdesc LIMIT $start_from, $record_per_page";
    }
    
    if ($db->prepare($q)) {
        //echo $q;
        $sql_query = $db->prepare($q);
        $sql_query->bind_param('s', $_POST['pos']);
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
        if ($filterByName) {
            if ($filterByLeague) {
                if ($filterByClub) {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                     WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub' AND ime_natj = '$filterByLeague'
                     ORDER BY $sort_by $ascdesc";
                } 
                else {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                    WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND ime_natj = '$filterByLeague'
                    ORDER BY $sort_by $ascdesc";
                }
            } 
    
            else if ($filterByClub) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                     WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub'
                     ORDER BY $sort_by $ascdesc";
            } 
    
            else {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%')
                ORDER BY $sort_by $ascdesc";
            }
        } 
        else if ($filterByClub) {
            if ($filterByName) {
                if ($filterByLeague) {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                    WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
                    ORDER BY $sort_by $ascdesc";
                } 
                else {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                    WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub'
                    ORDER BY $sort_by $ascdesc";
                } 
            }
            else if ($filterByLeague) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc";
            }
            
            else {
                 $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                 WHERE pozicija_id=? AND klub_ime = '$filterByClub'
                 ORDER BY $sort_by $ascdesc";
            }
        } 
        else if ($filterByLeague) {
            if ($filterByName) {
                if ($filterByClub) {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                    WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND klub_ime = '$filterByClub' AND ime_natj = '$filterByLeague'
                    ORDER BY $sort_by $ascdesc";
                }
                else {
                    $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                    WHERE pozicija_id=? AND (ime LIKE '%$filterByName%' OR prezime LIKE '%$filterByName%') AND ime_natj = '$filterByLeague'
                    ORDER BY $sort_by $ascdesc";
                }
            }
            else if ($filterByClub) {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND klub_ime = '$filterByClub%' AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc";
            }
            else {
                $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
                WHERE pozicija_id=? AND ime_natj = '$filterByLeague'
                ORDER BY $sort_by $ascdesc";
            }
        } 
        else {
            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub NATURAL JOIN natjecanja_kluba NATURAL JOIN natjecanje 
              WHERE pozicija_id=?
              ORDER BY $sort_by $ascdesc";
        }
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

