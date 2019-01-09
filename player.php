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
        <link rel="stylesheet" type="text/css" href="player.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src = ./app.js> </script>
        
    </head>
    <body style="background-color: #e6ffff">
        <div class="bg-modal">
            <div class="modal-content col-md-4">
                <h3>Voters</h3>
                <hr width="100%">
                <div class="close">+</div>
                <?php 
                    if( isset($_GET['id']) ) $id = $_GET['id'];

                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                    $q = "SELECT user_photo, name, last_name FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "'";

                    $res = $db->query($q);

                    if( $res->num_rows == 0 ) {
                        echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                    }else{
                        while( $r = $res->fetch_assoc() ) {
                            echo "<div class='row'>
                                <a href='settings.php' id='post'><img src=" . $r['user_photo'] . " id='av' alt='Avatar' class='avatar'></a> 
                                Name: " . $r['name'] . "<br>
                                Last name: " . $r['last_name'] . "<hr width='100%'>
                                </div>";
                        }
                    }

                ?>
            </div>
        </div>
        <?php 
            $s = '';
            if( isset($_SESSION['priv']) ) {
                if( $_SESSION['priv'] == 1 ) $s = 'Prijavljeni ste kao admin';
            }

            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

            $q = "SELECT * FROM followers_pending WHERE want_follow=" . $_SESSION['id'];

            $res = $db->query($q);

            echo "<div class='container-fluid top-menu'>
                    <table>
                        <tr> <td width='25%'>
                                <a href='#' class='btn btn-dark' id='menu-toggle'><div class='menu-icon'></div>
                                <div class='menu-icon'></div>
                                <div class='menu-icon'></div></a>";
                                
            if( $res->num_rows == 0 ) {
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span>0</span></a></button>";
            }else {
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span style='color: red'>" . $res->num_rows . "</span></a></button>";
            }

                                echo "<button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
                            </td>
                            <td style='text-align: center; padding: 20px; font-family: Papyrus, fantasy; font-size: 49px; font-style: normal; font-variant: small-caps; font-weight: 700; line-height: 40.6px;'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'>" . $s . "<button type='button' class='btn btn-dark btn-sm'><a href='logout.php' style='text-decoration: none;color: white'>LogOut</a></button>
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
                    <?php
                        if( isset($_SESSION['priv']) ) {
                            if( $_SESSION['priv'] == 1 ) echo "<li><a href='users.php' id='pos'>Users</a></li>";
                        }
                    ?>
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">
                
                <div class="container-fluid switch" id="player">
                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <div class="container">

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

                                ?>

                                <div class="row">
                                    <div class="col-md-3">
                                        
                                        <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="75px" width="75px">
                                    </div>
                                    <div class="col-md-8">
                                        <?php

                                            if( isset($_GET['id']) ) $id = $_GET['id'];

                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

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


                                            $q = "SELECT ime, prezime, br_gol, br_asist, br_obrane, klub_ime, br_dres, br_zkarton, br_ckarton, ime_poz, pozicija_id FROM igrac NATURAL JOIN klub NATURAL JOIN pozicija WHERE reg_br_igr='" . $id . "'";
                                            
                                            $res = $db->query($q);

                                            $f = 0;
                                            if( isset($_SESSION['priv']) ) {
                                                if( $_SESSION['priv'] == 1 ) $f = 1;
                                            }
                                            while( $r = $res->fetch_assoc() ) {
                                                if( $f == 1 ) {
                                                    echo "Name: " . $r['ime'] . "<br>";
                                                    echo "Last name: " . $r['prezime'] . "<br>";
                                                    echo "Club: " . $r['klub_ime'] . "<br>";
                                                    echo "Jersy number: " . $r['br_dres'] . "<br>";
                                                    echo "Field position: " . $r['ime_poz'] . "<br>";
                                                    echo "<form action='update_player.php?id=" . $id . "' method='POST'>
                                                            Total goals: " . $r['br_gol'] . "
                                                            <button name='goal+'>+</button>
                                                            <button name='goal-'>-</button>
                                                            </form>";
                                                    echo "<form action='update_player.php?id=" . $id . "' method='POST'>
                                                            Total assists: " . $r['br_asist'] . "
                                                            <button name='ass+'>+</button>
                                                            <button name='ass-'>-</button>
                                                            </form>";
                                                    if( !strcmp($r['pozicija_id'], "GK") ) {
                                                        echo "<form action='update_player.php?id=" . $id . "' method='POST'>
                                                            Total saves: " . $r['br_obrane'] . "
                                                            <button name='sav+'>+</button>
                                                            <button name='sav-'>-</button>
                                                            </form>";
                                                    }
                                                    echo "<form action='update_player.php?id=" . $id . "' method='POST'>
                                                            Total yellow cards: " . $r['br_zkarton'] . "
                                                            <button name='yell+'>+</button>
                                                            <button name='yell-'>-</button>
                                                            </form>";
                                                    echo "<form action='update_player.php?id=" . $id . "' method='POST'>
                                                            Total red cards: " . $r['br_ckarton'] . "
                                                            <button name='red+'>+</button>
                                                            <button name='red-'>-</button>
                                                            </form>";
                                                    echo "Market value: " . 5550055 . "$<br>";
                                                }else{
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
                                                    echo "Market value: " . 5550055 . "$<br>";
                                                }
                                                break;
                                            }

                                            if( isset($_GET['voted']) ) {
                                                echo "<a href='add_vote.php?id=" . $id . "' class='badge badge-info'>Vote</a>  ";
                                                echo "<button id='btn_show' class='badge badge-info'>Show voters</button>
                                                    <span style='color:red'>Vas glas je vec zaprimljen</span>";
                                            }else{
                                                echo "<a href='add_vote.php?id=" . $id . "' class='badge badge-info'>Vote</a>  ";
                                                echo "<button id='btn_show' class='badge badge-info'>Show voters</button>";
                                            }

                                            mysqli_free_result($res);
                                        ?>
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
                                    $r = $res->fetch_assoc()['br_gol'];
                                    $q2 = "SELECT SUM(br_gol) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $r2 = $res2->fetch_assoc()['suma'];

                                    $q = "SELECT br_gol FROM igrac WHERE reg_br_igr='" . $id . "'";
                                    $res = $db->query($q);
                                    $r = $res->fetch_assoc()['br_gol'];
                                    $q2 = "SELECT SUM(br_gol) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $r2 = $res2->fetch_assoc()['suma'];

                                    $q = "SELECT br_gol FROM igrac WHERE reg_br_igr='" . $id . "'";
                                    $res = $db->query($q);
                                    $r = $res->fetch_assoc()['br_gol'];
                                    $q2 = "SELECT SUM(br_gol) as suma FROM igrac";
                                    $res2 = $db->query($q2);
                                    $r2 = $res2->fetch_assoc()['suma'];

                                    $q3 = "SELECT prezime FROM igrac WHERE reg_br_igr = '" . $id . "'";
                                    $res3 = $db->query($q3);
                                    $r3 = $res3->fetch_assoc()['prezime'];
                                    echo '
                                    <div class="btn-group">
                                        <button onclick = "graph($)" type="button" class="btn btn-primary">Apple</button>
                                        <button type="button" class="btn btn-primary">Samsung</button>
                                        <button type="button" class="btn btn-primary">Sony</button>
                                    </div>'; 
                                ?>
                                <div class="container" id = "graf">
                                
                                </div>
                                

                                <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
                                <script type='text/javascript'>
                                    // Load google charts
                                    google.charts.load('current', {'packages':['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);
                                    var noGol = <?php Print($r); ?>;
                                    var sumGol = <?php Print($r2); ?>;
                                    var surname = '<?php Print($r3); ?>';
                                    //console.log(brGol);
                                    // Draw the chart and set the chart values
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Player', 'Goals'],
                                            [surname, noGol],
                                            ['All goals', sumGol]
                                            ]);
                                            
                                            // Optional; add a title and set the width and height of the chart
                                            var options = {'width':550, 'height':400};
                                            
                                            // Display the chart inside the <div> element with id='piechart'
                                            var chart = new google.visualization.PieChart(document.getElementById('graf'));
                                            chart.draw(data, options);
                                    }
                                </script>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Voters</h3>
                                <hr width="100%">
                                <div class="container">
                                    
                                    <?php 
                                        if( isset($_GET['id']) ) $id = $_GET['id'];

                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users JOIN users_votes using(ID) WHERE reg_br_igr='" . $id . "'";

                                        $res = $db->query($q);

                                        if( $res->num_rows == 0 ) {
                                            echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                        }else {
                                            while( $r = $res->fetch_assoc() ) {
                                                echo "<div class='row'>";
                                                    echo "<div class=col-md-6>
                                                            <a href='users_info.php?id=" . $r['ID'] . "'><img src='" . $r['user_photo'] . "' height='55px' width='55px'></a>
                                                        </div>";
                                                    echo "<div class='col-md-6' style = 'text-decoration-color: aqua '>
                                                            Name: " . $r['name'] . "</br>
                                                            Last name:" . $r['last_name'] ."</br>
                                                            E-mail: " . $r['e_mail'] . "
                                                        </div>";
                                                echo "</div>";
                                                echo "<hr width='100%'>";
                                            }
                                        }                                                                           
                                    ?>
                            </div>
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