<?php
    session_start();

    $now = time();
    $then = $_SESSION['time'];
    $diff = $now - $then;

    if( $diff > 600000 ) {
        session_destroy();
        header('Location: http://localhost:8080/projekt/expired.html');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Player statistics</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="app.css">
        <!-- <link rel="stylesheet" type="text/css" href="player.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
        <script src = ./app.js> </script>
        
    </head>
    <body style="background-color: #e6ffff">
        <!-- <div class="bg-modal">
            <div class="modal-content col-md-4 pre-scrollable">
                <h3>Voters</h3>
                <hr width="100%">
                <div class="close">+</div>
                <?php 
                    if( isset($_GET['id']) ) $id = $_GET['id'];

                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                    $q = "SELECT user_photo, name, last_name, voteDate  FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "' AND active = 1";

                    $res = $db->query($q);

                    if( $res->num_rows == 0 ) {
                        echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                    }else{
                        while( $r = $res->fetch_assoc() ) {
                            echo "
                                <a href='settings.php' id='post'><img src=" . $r['user_photo'] . " id='av' alt='Avatar' class='avatar'></a> 
                                Name: " . $r['name'] . "<br>
                                Last name: " . $r['last_name'] . "<br>
                                Voted on: ".$r['voteDate']."<hr width='100%'>
                                ";
                        }
                    }

                ?>
            </div>
        </div>-->
        <?php 
           $s = '';
           $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');
           if( isset($_SESSION['priv']) ) {
               if( isset($_SESSION['priv']) ) {
                if( $_SESSION['priv'] == 1 ) $s = $_SESSION['user'] . '(admin) &nbsp';
                else {
                    $s = $_SESSION['user'];
                }
            }
           }

            $q = "SELECT * FROM followers_pending WHERE want_follow=" . $_SESSION['id'];

            $res = $db->query($q);

            $foll = $res->num_rows;

            //$q = "SELECT notification FROM users_notifications WHERE seen=1 AND ID=" . $_SESSION['id'];

            $q = "UPDATE users_notifications SET was_fav=1 WHERE reg_br_igr IN ( SELECT reg_br_igr FROM users_igrac WHERE ID=" . $_SESSION['id'] . " ) AND ID=" . $_SESSION['id'];

            $db->query($q);

            $q = "UPDATE users_notifications SET seen=0 WHERE was_fav=0 AND ID=" . $_SESSION['id'];

            $db->query($q);

            $q = "SELECT notification FROM users_notifications WHERE seen=1 AND ID=" . $_SESSION['id'];

            $res = $db->query($q);

            if ($res) {
                $not = $res->num_rows;
            } 
            else $not = 0;

            echo "<div class='container-fluid top-menu'>
                    <table>
                        <tr> <td width='25%'>
                                <a href='#' class='btn btn-dark' id='menu-toggle'><div class='menu-icon'></div>
                                <div class='menu-icon'></div>
                                <div class='menu-icon'></div></a>";
            
            $sum = $foll + $not;                
            if( $foll == 0 && $not == 0 ) {
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span>0</span></a></button>";
            }else {
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span style='color: red'>" . $sum . "</span></a></button>";
            }

                                echo "<button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
                            </td>
                            <td style='text-align: center; padding: 20px; font-family: Papyrus, fantasy; font-size: 49px; font-style: normal; font-variant: small-caps; font-weight: 700; line-height: 40.6px;'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'><button type='button' class='btn btn-dark btn-sm'><a href='logout.php' style='text-decoration: none;color: white'>LogOut " . $s . "</a></button>
                            </td> 
                        </tr>
                    </table>
                </div>"; 
        ?>


        <div id="wrapper">

            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li>
                        <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');
                            
                            $q = "SELECT back_photo FROM users WHERE ID=" . $_SESSION['id'];

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                $pic = $r['back_photo'];
                            }

                            echo '<div id="wrapper" class="images" style="background-image: url(' . $pic . ');">
                                <div class="row">
                                    <div class="col-md-3">';

                                            $q = "SELECT user_photo FROM users WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                $pic = $r['user_photo'];
                                            }

                                            echo "<a href='users_info.php?id=" . $_SESSION['id'] . "' id='post'><img src=" . $pic . " alt='Avatar' class='avatar'></a>";
                                    echo '</div>
                                    <div class="col-md-8">';

                                                $q = "SELECT name, last_name, e_mail FROM users WHERE ID=" . $_SESSION['id'];

                                                $res = $db->query($q);

                                                while( $r = $res->fetch_assoc() ) {
                                                    echo "<p><span class='sidebar-name'>" . $r['name'] . " " . $r['last_name'] . "</span></p>";
                                                    echo "<small class='sidebar-name'>" . $r['e_mail'] . "</small>";
                                                }

                                   echo '</div>
                                </div>
                            </div>';
                        ?>
                    </li>
                    <li><a href="forwards.php" id="fwd">Forwards</a></li>
                    <li><a href="midfielders.php" id="mid">Midfielders</a></li>
                    <li><a href="defenders.php" id="def">Defenders</a></li>
                    <li><a href="goalkeepers.php" id="gk">Goalkeepers</a></li>
                    <li><a href="favourites.php" id="fav">Favourites</a></li>
                    <li><a href="settings.php" id="pos">Settings</a></li>
                    <li><a href='users.php' id='pos'>Users</a></li>
                    <!--<?php
                        if( isset($_SESSION['priv']) ) {
                            if( $_SESSION['priv'] == 1 ) echo "<li><a href='users.php' id='pos'>Users</a></li>";
                        }
                    ?>-->
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">
                
                <div class="container-fluid switch" id="player">
                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <div class="container">
                                <div id="navigation">
                                    <!-- Back button-->
                                    <?php
                                        if( isset($_GET['id']) ) $id = $_GET['id'];

                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                        $q = "SELECT pozicija_id FROM igrac WHERE reg_br_igr='" . $id . "'";

                                        $res = $db->query($q);

                                        while( $r = $res->fetch_assoc() ) {
                                            if( !strcmp($r['pozicija_id'], "GK") ) {
                                                echo "<form action='goalkeepers.php'>
                                                        <button type='submit' class='btn btn-dark btn-sm'><-</button>
                                                    </form>";
                                            }else if( !strcmp($r['pozicija_id'], "FWD") ) {
                                                echo "<form action='forwards.php'>
                                                        <button type='submit' class='btn btn-dark btn-sm'><-</button>
                                                    </form>";
                                            }else if( !strcmp($r['pozicija_id'], "DEF") ) {
                                                echo "<form action='defenders.php'>
                                                        <button type='submit' class='btn btn-dark btn-sm'><-</button>
                                                    </form>";
                                            }else if( !strcmp($r['pozicija_id'], "MID") ) {
                                                echo "<form action='midfielders.php'>
                                                        <button type='submit' class='btn btn-dark btn-sm'><-</button>
                                                    </form>";
                                            }
                                            break;
                                        }

                                        echo "<nav>
                                              <div class='nav nav-tabs' id='nav-tab' role='tablist'>
                                                <a class='nav-item nav-link active' id='nav-stats-tab' data-toggle='tab' href='#nav-stats' role='tab' aria-controls='nav-stats' aria-selected='true'>Stats</a>";

                                        $q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "' AND klub_id IN (SELECT klub_id FROM igrac WHERE reg_br_igr='" . $id . "')";

                                        $res = $db->query($q);

                                        $c = 1;
                                        while( $r = $res->fetch_assoc() ) {
                                            echo "<a class='nav-item nav-link' id='nav-" . $c . "-tab' data-toggle='tab' href='#nav-" . $c . "' role='tab' aria-controls='nav-" . $c . "' aria-selected='false'>" . $r['ime_natj'] . "</a>";
                                            $c++;
                                        }

                                        if( isset($_SESSION['priv']) ) {
                                            if( $_SESSION['priv'] == 1 ) {
                                                echo "<a class='nav-item nav-link' id='nav-edit-tab' data-toggle='tab' href='#nav-edit' role='tab' aria-controls='nav-edit' aria-selected='false'>Edit</a>";
                                                echo "<a class='nav-item nav-link' id='nav-club_change-tab' data-toggle='tab' href='#nav-club_change' role='tab' aria-controls='nav-club_change' aria-selected='false'>Change club</a>";
                                            }
                                        }

                                        echo "</div>
                                            </nav>";

                                    ?>

                                </div>

                                <div class="row stats">
                                    <div class="col-md-3">
                                    <?php
                                          $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');   
                                          $q = "SELECT pImage FROM igrac NATURAL JOIN klub NATURAL JOIN pozicija WHERE reg_br_igr='" . $id . "'";
                                          $res = $db->query($q);
                                          $row = $res->fetch_assoc();
                                          echo"<img src='". $row['pImage'] ."' height='181px' width='138px'><br>"
                                        
                                    ?>   


                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class='tab-content' id='nav-tabContent'>
                                            <div class='tab-pane fade show active' id='nav-stats' role='tabpanel' aria-labelledby='nav-stats-tab'>
                                                <?php
                                                    
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];

                                                    $q = "SELECT DISTINCT reg_br_igr FROM igrac JOIN users_igrac using(reg_br_igr) JOIN klub using(klub_id) WHERE ID=" . $_SESSION['id'];

                                                    $res = $db->query($q);
                                                
                                                    

                                                    if( $res->num_rows == 0 ) {
                                                        echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                    }else{
                                                        $f = 0;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            if( $r['reg_br_igr'] == $id ) $f = 1;
                                                        }
                                                        if( $f == 1 ) {
                                                            echo "<form action='del_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning paint' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }else{
                                                            echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }
                                                    }


                                                    $q = "SELECT ime, prezime, br_gol, br_asist, br_obrane, klub_ime, br_dres, br_zkarton, br_ckarton, ime_poz, pozicija_id, price, votes, br_utakmica FROM igrac NATURAL JOIN klub NATURAL JOIN pozicija WHERE reg_br_igr='" . $id . "'";
                                                    
                                                    $res = $db->query($q);

                                                    $f = 0;
                                                    if( isset($_SESSION['priv']) ) {
                                                        if( $_SESSION['priv'] == 1 ) $f = 1;
                                                    }
                                                    while( $r = $res->fetch_assoc() ) {
                                                        echo "Name: " . $r['ime'] . "<br>";
                                                        echo "Last name: " . $r['prezime'] . "<br>";
                                                        echo "Club: " . $r['klub_ime'] . "<br>";
                                                        echo "Jersy number: " . $r['br_dres'] . "<br>";
                                                        echo "Field position: " . $r['ime_poz'] . "<br>";
                                                        echo "Total goals: " . $r['br_gol'] . "<br>";
                                                        echo "Total assists: " . $r['br_asist'] . "<br>";
                                                        if( !strcmp($r['pozicija_id'], "GK") ) echo "Total saves: " . $r['br_obrane'] . "<br>";
                                                        echo "Total yellow cards: " . $r['br_zkarton'] . "<br>";
                                                        echo "Total red cards: " . $r['br_ckarton'] . "<br>";
                                                        echo "Market value: " . $r['price'] . "€<br>";
                                                        echo "Total votes this week: " . $r['votes'] . "<br>";
                                                        echo "Total games played: " . $r['br_utakmica'] . "<br>";
                                                        break;
                                                    }

                                                    $f = 0;
                                                    if( isset($_SESSION[$id]) ) {
                                                    	if( $_SESSION[$id] == 1 ) $f = 1;
                                                    }

                                                    if( isset($_GET['voted']) || $f ) {
                                                    	$_SESSION[$id] = 1;
                                                        echo "<button class='badge badge-info' data-toggle='modal' data-target='#exampleModalCenter5'>Vote</button>";
                                                        //echo "<a href='add_vote.php?id=" . $id . "' class='badge badge-info'>Vote</a>  ";
                                                        echo "<!-- Button trigger modal -->
                                                                    <button class='badge badge-info' data-toggle='modal' data-target='#exampleModalCenter'>Show voters</button>

                                                            <!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content' pre-scrollable>
                                                                          <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLongTitle'>Voters</h5>
                                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                              <span aria-hidden='true'>&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class='modal-body'>";
                                                            $q = "SELECT ID, user_photo, name, last_name, voteDate  FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "' AND active = 1";

                                                            $res = $db->query($q);

                                                            if( $res->num_rows == 0 ) {
                                                                echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                                            }else{
                                                                while( $r = $res->fetch_assoc() ) {
                                                                    echo "
                                                                        <a href='users_info.php?id=" . $r['ID'] . "' id='post'><img src=" . $r['user_photo'] . " id='av' alt='Avatar' class='avatar'></a> 
                                                                        Name: " . $r['name'] . "<br>
                                                                        Last name: " . $r['last_name'] . "<br>
                                                                        Voted on: ".$r['voteDate']."<hr width='100%'>
                                                                        ";
                                                                }
                                                            }
                                                            
                                                            echo "</div>
                                                                </div>
                                                            </div>
                                                         </div>";

                                                         echo "<!-- Modal -->
                                                                    <div class='modal fade' id='exampleModalCenter5' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                        <div class='modal-content' pre-scrollable>
                                                                          <div class='modal-header'>
                                                                            <h5 class='modal-title' id='exampleModalLongTitle'>Notifier</h5>
                                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                              <span aria-hidden='true'>&times;</span>
                                                                            </button>
                                                                          </div>
                                                                          <div class='modal-body'>
                                                                        <h6><span style='color:red'>Your vote has already been submited... :)</span></h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </div>";
                                                    }else{
                                                        echo "<a href='add_vote.php?id=" . $id . "' class='badge badge-info'>Vote</a>  ";

                                                        echo "<!-- Button trigger modal -->
                                                                    <button class='badge badge-info' data-toggle='modal' data-target='#exampleModalCenter'>Show voters</button>

                                                            <!-- Modal -->
                                                            <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' pre-scrollable>
                                                              <div class='modal-dialog modal-dialog-centered' role='document'>
                                                                <div class='modal-content'>
                                                                  <div class='modal-header'>
                                                                    <h5 class='modal-title' id='exampleModalLongTitle'>Voters</h5>
                                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                      <span aria-hidden='true'>&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class='modal-body'>";
                                                            $q = "SELECT ID, user_photo, name, last_name, voteDate  FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "' AND active = 1";

                                                            $res = $db->query($q);

                                                            if( $res->num_rows == 0 ) {
                                                                echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                                            }else{
                                                                while( $r = $res->fetch_assoc() ) {
                                                                    echo "
                                                                        <a href='users_info.php?id=" . $r['ID'] . "' id='post'><img src=" . $r['user_photo'] . " id='av' alt='Avatar' class='avatar'></a> 
                                                                        Name: " . $r['name'] . "<br>
                                                                        Last name: " . $r['last_name'] . "<br>
                                                                        Voted on: ".$r['voteDate']."<hr width='100%'>
                                                                        ";
                                                                }
                                                            }
                                                            
                                                            echo "</div>
                                                                </div>
                                                            </div>
                                                         </div>";
                                                    }

                                                    mysqli_free_result($res);
                                                ?>
                                            </div>
                                            <div class='tab-pane fade show' id='nav-1' role='tabpanel' aria-labelledby='nav-1-tab'>
                                                <?php
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];

                                                    $q = "SELECT DISTINCT reg_br_igr FROM igrac JOIN users_igrac using(reg_br_igr) JOIN klub using(klub_id) WHERE ID=" . $_SESSION['id'];

                                                    $res = $db->query($q);
                                                
                                                    

                                                    if( $res->num_rows == 0 ) {
                                                        echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                    }else{
                                                        $f = 0;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            if( $r['reg_br_igr'] == $id ) $f = 1;
                                                        }
                                                        if( $f == 1 ) {
                                                            echo "<form action='del_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning paint' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }else{
                                                            echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }
                                                    }

                                                    $q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $natj;
                                                    while( $r = $res->fetch_assoc() ) {
                                                        $natj = $r['ime_natj'];
                                                        break;
                                                    }

                                                    $q = "SELECT pozicija_id FROM igrac WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $f = 0;
                                                    while( $r = $res->fetch_assoc() ) {
                                                        if( !strcmp($r['pozicija_id'], "GK") ) $f = 1;
                                                    }

                                                    $q = "SELECT br_gol, br_asist, br_obrane, br_zkarton, br_ckarton, br_utakmica FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "' AND ime_natj='" . $natj . "'";
                                                    
                                                    $res = $db->query($q);

                                                    while( $r = $res->fetch_assoc() ) {
                                                        echo "Total goals: " . $r['br_gol'] . "<br>";
                                                        echo "Total assists: " . $r['br_asist'] . "<br>";
                                                        if( $f == 1 ) echo "Total saves: " . $r['br_obrane'] . "<br>";
                                                        echo "Total yellow cards: " . $r['br_zkarton'] . "<br>";
                                                        echo "Total red cards: " . $r['br_ckarton'] . "<br>";
                                                        echo "Games played: " . $r['br_utakmica'] . "<br>";
                                                        break;
                                                    }

                                                    mysqli_free_result($res);
                                                ?>
                                            </div>
                                            <div class='tab-pane fade show' id='nav-2' role='tabpanel' aria-labelledby='nav-2-tab'>
                                                <?php
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];

                                                    $q = "SELECT DISTINCT reg_br_igr FROM igrac JOIN users_igrac using(reg_br_igr) JOIN klub using(klub_id) WHERE ID=" . $_SESSION['id'];

                                                    $res = $db->query($q);
                                                
                                                    

                                                    if( $res->num_rows == 0 ) {
                                                        echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                    }else{
                                                        $f = 0;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            if( $r['reg_br_igr'] == $id ) $f = 1;
                                                        }
                                                        if( $f == 1 ) {
                                                            echo "<form action='del_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning paint' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }else{
                                                            echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }
                                                    }

                                                    $q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $natj;
                                                    $c = 1;                         
                                                    while( $r = $res->fetch_assoc() ) {
                                                        $natj = $r['ime_natj'];
                                                        if( $c == 2 ) break;
                                                    }

                                                    $q = "SELECT pozicija_id FROM igrac WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $f = 0;
                                                    while( $r = $res->fetch_assoc() ) {
                                                        if( !strcmp($r['pozicija_id'], "GK") ) $f = 1;
                                                    }

                                                    $q = "SELECT br_gol, br_asist, br_obrane, br_zkarton, br_ckarton, br_utakmica FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "' AND ime_natj='" . $natj . "'";
                                                    
                                                    $res = $db->query($q);

                                                    while( $r = $res->fetch_assoc() ) {
                                                        echo "Total goals: " . $r['br_gol'] . "<br>";
                                                        echo "Total assists: " . $r['br_asist'] . "<br>";
                                                        if( $f == 1 ) echo "Total saves: " . $r['br_obrane'] . "<br>";
                                                        echo "Total yellow cards: " . $r['br_zkarton'] . "<br>";
                                                        echo "Total red cards: " . $r['br_ckarton'] . "<br>";
                                                        echo "Games played: " . $r['br_utakmica'] . "<br>";
                                                        break;
                                                    }

                                                    mysqli_free_result($res);
                                                ?>
                                            </div>
                                            <div class='tab-pane fade show' id='nav-2' role='tabpanel' aria-labelledby='nav-2-tab'>
                                                <?php
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];

                                                    $q = "SELECT DISTINCT reg_br_igr FROM igrac JOIN users_igrac using(reg_br_igr) JOIN klub using(klub_id) WHERE ID=" . $_SESSION['id'];

                                                    $res = $db->query($q);
                                                
                                                    

                                                    if( $res->num_rows == 0 ) {
                                                        echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                    }else{
                                                        $f = 0;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            if( $r['reg_br_igr'] == $id ) $f = 1;
                                                        }
                                                        if( $f == 1 ) {
                                                            echo "<form action='del_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning paint' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }else{
                                                            echo "<form action='add_fav.php?id=" . $id . "' method='POST'>
                                                            <button type='submit' class='btn btn-outline-warning' id='fav-btn' style='float: right;'>Favourites</button>
                                                            </form>";
                                                        }
                                                    }

                                                    $q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $natj;
                                                    $c = 1;                         
                                                    while( $r = $res->fetch_assoc() ) {
                                                        $natj = $r['ime_natj'];
                                                        if( $c == 3 ) break;
                                                    }

                                                    $q = "SELECT pozicija_id FROM igrac WHERE reg_br_igr='" . $id . "'";

                                                    $res = $db->query($q);

                                                    $f = 0;
                                                    while( $r = $res->fetch_assoc() ) {
                                                        if( !strcmp($r['pozicija_id'], "GK") ) $f = 1;
                                                    }

                                                    $q = "SELECT br_gol, br_asist, br_obrane, br_zkarton, br_ckarton, br_utakmica FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "' AND ime_natj='" . $natj . "'";
                                                    
                                                    $res = $db->query($q);

                                                    while( $r = $res->fetch_assoc() ) {
                                                        echo "Total goals: " . $r['br_gol'] . "<br>";
                                                        echo "Total assists: " . $r['br_asist'] . "<br>";
                                                        if( $f == 1 ) echo "Total saves: " . $r['br_obrane'] . "<br>";
                                                        echo "Total yellow cards: " . $r['br_zkarton'] . "<br>";
                                                        echo "Total red cards: " . $r['br_ckarton'] . "<br>";
                                                        echo "Games played: " . $r['br_utakmica'] . "<br>";
                                                        break;
                                                    }

                                                    mysqli_free_result($res);
                                                ?>
                                            </div>
                                            <div class='tab-pane fade show' id='nav-edit' role='tabpanel' aria-labelledby='nav-edit-tab'>
                                                    <?php
                                                        if( isset($_GET['id']) ) $id = $_GET['id'];

                                                        echo "<form action='update_player.php?id=" . $id . "' method='POST'>";

                                                        $q = "SELECT pozicija_id FROM igrac WHERE reg_br_igr='" . $id . "'";

                                                        $res = $db->query($q);

                                                        $f = 0;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            if( !strcmp($r['pozicija_id'], "GK") ) $f = 1;
                                                        }

                                                        $q = "SELECT DISTINCT ime_natj FROM igrac_natjecanje WHERE reg_br_igr='" . $id . "'";

                                                        $res = $db->query($q);

                                                        $natj;
                                                        while( $r = $res->fetch_assoc() ) {
                                                            $natj = str_replace(' ', '_', $r['ime_natj']);
                                                            echo "<b>" . $r['ime_natj'] . ":</b><br>";
                                                            echo "Match: <input type='text' name='h" . $natj . "' placeholder='home'> vs <input type='text' name='aw" . $natj . "' placeholder='away'><br>
                                                                Goals: <input type='number' name='g" . $natj . "' min='0' value='0'><br>
                                                                Assists: <input type='number' name='a" . $natj . "' min='0' value='0'><br>";
                                                            if( $f == 1 ) echo "Saves: <input type='number' name='s" . $natj . "' min='0' value='0'><br>";
                                                            echo "Yellow cards: <input type='number' name='y" . $natj . "' min='0' max='2' value='0'><br>
                                                                Red cards: <input type='number' name='r" . $natj . "' min='0' max='1' value='0'><br>
                                                                Played: <input type='number' name='p" . $natj . "' min='0' max='1' value='0'><br>
                                                                ";
                                                        }
                                                    ?>
                                                    <button type='submit' class='btn btn-dark home-btn'>Save</button>
                                                </form>
                                            </div>
                                            <div class='tab-pane fade show' id='nav-club_change' role='tabpanel' aria-labelledby='nav-club_change-tab'>
                                                    <?php
                                                        if( isset($_GET['id']) ) $id = $_GET['id'];

                                                        echo "<form action='update_player.php?id=" . $id . "' method='POST'>";

                                                        $q = "SELECT klub_id, br_dres, price FROM igrac WHERE reg_br_igr='" . $id . "'";

                                                        $res = $db->query($q);

                                                        while( $r = $res->fetch_assoc() ) {
                                                            echo "<b>Enter new club:</b><br>
                                                                New club: <input type='text' name='club' value='" . $r['klub_id'] . "'><br>
                                                                <b>Enter new Jersy number:</b><br>
                                                                New jersy number: <input type='number' name='jersy' min='0' value='" . $r['br_dres'] . "'><br>
                                                                <b>Enter new market value:</b><br>
                                                                New market value: <input type='text' name='price' min='0' value='" . $r['price'] . "'><br>";
                                                        }
                                                    ?>
                                                    <button type='submit' class='btn btn-dark home-btn'>Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">
                          <div class="container">
                                <h3>Graf</h3>
                                <?php
                                    if (isset($_GET['id'])) $id = $_GET['id'];
                                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                    $q = "SELECT br_gol FROM igrac WHERE reg_br_igr='" . $id . "'";
                                    $res = $db->query($q);
                                    $goals = $res->fetch_assoc()['br_gol'];
                                    $q2 = "SELECT SUM(br_gol) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $goalsSum = $res2->fetch_assoc()['suma'];

                                    $q = "SELECT br_asist FROM igrac WHERE reg_br_igr='" . $id . "'";
                                    $res = $db->query($q);
                                    $assists = $res->fetch_assoc()['br_asist'];
                                    $q2 = "SELECT SUM(br_asist) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $assistsSum = $res2->fetch_assoc()['suma'];

                                    $q = "SELECT br_obrane FROM igrac WHERE reg_br_igr='" . $id . "'";
                                    $res = $db->query($q);
                                    $saves = $res->fetch_assoc()['br_obrane'];
                                    $q2 = "SELECT SUM(br_obrane) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $savesSum = $res2->fetch_assoc()['suma'];

                                    $q3 = "SELECT prezime FROM igrac WHERE reg_br_igr = '" . $id . "'";
                                    $res3 = $db->query($q3);
                                    $surname = $res3->fetch_assoc()['prezime'];
                                    echo '
                                    <div class="btn-group">
                                        <button onclick = "graph()" type="button" class="btn btn-primary">Goals</button>
                                        <button type="button" class="btn btn-primary">Assists</button>
                                        <button type="button" class="btn btn-primary">Saves</button>
                                    </div>'; 
                                ?>
                                <div class="container" id = "graf">
                                
                                </div>
                                                              
                                <script type='text/javascript'>
                                    // Load google charts
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);
                                    var noGol = <?php Print($goals); ?>;
                                    var sumGol = <?php Print($goalsSum); ?>;
                                    var surname = '<?php Print($surname); ?>';
                                    //console.log(brGol);
                                    // Draw the chart and set the chart values
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Player', 'Goals'],
                                            [surname, noGol],
                                            ['All goals', sumGol]
                                            ]);
                                            
                                            // Optional; add a title and set the width and height of the chart
                                            var options = {'width':300, 'height':300};
                                            
                                            // Display the chart inside the <div> element with id='piechart'
                                            var chart = new google.visualization.PieChart(document.getElementById('graf'));
                                            chart.draw(data, options);
                                    }
                                </script>
                            </div>
                            

                    </div>
                </div>

            </div>
        </div>
        
        <?php

            if( isset($_GET['id']) ) {
                $id = $_GET['id'];

                if( isset($id) ) {
                    if( $id != '0' ) {
                        echo "<script>
                                document.getElementById('player').classList.remove('switch');
                            </script>";
                    }
                }
            }
        ?>


        <script type="text/javascript" src='player.js'></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>