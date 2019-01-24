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
        <link rel="stylesheet" type="text/css" href="new_app.css">    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src = ./app.js> </script>
    </head>

    <body style="background: rgba(102, 204, 255, 0.4)">
        <?php 
            $s = '';
            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');
            if( isset($_SESSION['priv']) ) {
                if( $_SESSION['priv'] == 1 ) $s = 'Logged in as admin &nbsp';
                else {
                    $q = "SELECT * FROM users WHERE ID =" . $_SESSION['id'];
                    $res = $db->query($q);
                    $s = $res->fetch_assoc()['name'] . "&nbsp&nbsp";
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
                <li><a href='users.php' id='pos'>Users</a></li>
                <!--<?php
                    if( isset($_SESSION['priv']) ) {
                        if( $_SESSION['priv'] == 1 ) echo "<li><a href='users.php' id='pos'>Users</a></li>";
                    }
                ?>-->
            </ul> 
        </div>
        
                       
    <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">

            <!-- Jumbotron Header -->
            <div class="my-4">
            <h4 >GOAL OF THE WEEK</h4>
                <?php
                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                    $q = "SELECT link FROM goal_of_the_week";

                    $res = $db->query($q);

                    while( $r = $res->fetch_assoc() ) $link = $r['link'];

                    echo "<iframe  id='frame' width = 100% height='400' src=" . $link . " frameborder='1' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
                    //za autoplay na videu dodat tocno poslje linka   "?autoplay=1"
                ?>

                <?php
                    if( isset($_SESSION['priv']) ) {
                        if( $_SESSION['priv'] == 1 ) {
                            echo "<div id='goal'>
                                    <button type='button' class='btn btn-dark' id='goalBtn' style='margin-left: 350px'>Change link</button>
                                    </div>";
                        }
                    }
                ?>
            </div>

            <!-- Page Features -->
                <div class="row text-center">

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <img class="card-img-top" height="150" src="http://www.hballtransfers.com/app/webroot/_resized/uploads/top-5-goals-ehfcl1-90ce877810c4a0347bc420163b514483.png" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, br_gol, pImage FROM igrac ORDER BY br_gol desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                        $res = $db->query($q);
                                        echo "<table class = 'tablica' background= './pitchgrass.jpg' border = 1> 
                                            <tr><th></th><th> PLAYER</th> <th>GOALS</th>";
                                        while($row = $res->fetch_assoc()){
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                                            echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_gol'] . "</td>";
                                        }
                                        echo "</table>";                                                                            
                                    ?>
                                </p>
                            </div>

                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                        <img class="card-img-top" height="150" src="https://i.ytimg.com/vi/v1pk7rU9isM/maxresdefault.jpg" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php 
                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                            $q = "SELECT reg_br_igr, ime, prezime, br_asist, pImage FROM igrac ORDER BY br_asist desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                            $res = $db->query($q);
                                            echo "<table class = 'tablica' background= './pitchgrass.jpg' border = 1> 
                                                    <tr><th></th><th>PLAYER</th> <th width='10'>ASSISTS</th>";
                                            while($row = $res->fetch_assoc()){
                                                echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                                                echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td width='10'>" . $row['br_asist'] . "</td>";
                                            }
                                            echo "</table>";                                                                     
                                    ?>
                                </p>  
                            </div>

                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                        <img class="card-img-top" height="150" src="https://www.nbcsports.com/sites/nbcsports.com/files/2013/12/15/131215_2703475_Top_5_Saves_of_the_Weekend_1280x720_92234307763.jpg" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, br_obrane, pImage FROM igrac WHERE pozicija_id = 'GK' ORDER BY br_obrane desc LIMIT 5"; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        $res = $db->query($q);
                                        echo "<table class = 'tablica' background= './pitchgrass.jpg' border = 1> 
                                                <tr><th></th><th>PLAYER</th> <th>SAVES</th>";
                                        while($row = $res->fetch_assoc()){
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a> </td>";
                                            echo "<td>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_obrane'] . "</td>";
                                        }
                                        echo "</table>";                                                                    
                                    ?>
                                </p>
                            </div>

                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                        <img class="card-img-top" height="150" src="https://static1.squarespace.com/static/54d10203e4b0d299700879e5/t/5a4bbed8f9619a1bee4b47df/1514913509253/vote+%281%29.jpg" alt="">
                            <div class="card-body">
                                <p class="card-text">
                                    <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, votes, pImage FROM igrac ORDER BY votes desc LIMIT 5"; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                        $res = $db->query($q);
                                        echo "<table class = 'tablica' background= './pitchgrass.jpg' border = 1> 
                                            <tr><th></th><th> PLAYER</th> <th>VOTES</th>";
                                        while($row = $res->fetch_assoc()){
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                                            echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['votes'] . "</td>";
                                        }
                                        echo "</table>";                                                                            
                                    ?>
                                </p>
                            </div>

                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container" align="center">
                    <h3>Team of the week</h3>
                    
                    <?php
                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                        $q = "SELECT reg_br_igr, ime, prezime, pozicija_id, pImage, votes FROM igrac WHERE pozicija_id = 'FWD' ORDER BY votes desc LIMIT 3 ";

                        $res = $db->query($q);

                        echo "<div id='team'>
                            <table style='color: white;'>";
                        $f = 0;
                        while( $r = $res->fetch_assoc() ) {
                            if( $f == 0 ) {
                                echo "<tr>
                                        <td colspan=4 align='center'>
                                            <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                        </td>
                                    </tr>";
                                $f = 1;
                            }else if( $f == 1 ) {
                                echo "<tr>
                                        <td colspan=2 align='right'>
                                            <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                        </td>";
                                $f = 2;
                            }else {
                                echo "<td colspan=3>
                                            <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>                                              
                                        </td>
                                    </tr>";
                            }
                        }

                        $q = "SELECT reg_br_igr, ime, prezime, pozicija_id, pImage, votes FROM igrac WHERE pozicija_id = 'MID' ORDER BY votes desc LIMIT 3 ";

                        $res = $db->query($q);

                        $f = 0;
                        echo "<tr align='center'>";
                        while( $r = $res->fetch_assoc() ) {
                            if( $f == 0 ) {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                                $f = 1;
                            }else if( $f == 1 ) {
                                echo "<td colspan=2>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                                $f = 2;
                            }else {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                            }
                        }
                        echo "</tr>";

                        $q = "SELECT reg_br_igr, ime, prezime, pozicija_id, pImage, votes FROM igrac WHERE pozicija_id = 'DEF' ORDER BY votes desc LIMIT 4 ";

                        $res = $db->query($q);

                        $f = 0;
                        echo "<tr>";
                        while( $r = $res->fetch_assoc() ) {
                            if( $f == 0 ) {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                                $f = 1;
                            }else if( $f == 1 ) {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                                $f = 2;
                            }else if( $f == 2 ) {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                                $f = 3;
                            }else {
                                echo "<td>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                            }
                        }
                        echo "</tr>";

                        $q = "SELECT reg_br_igr, ime, prezime, pozicija_id , pImage,votes FROM igrac WHERE pozicija_id = 'GK' ORDER BY votes desc LIMIT 1 ";

                        $res = $db->query($q);

                        echo "<tr>";
                        while( $r = $res->fetch_assoc() ) {
                            echo "<td colspan=4 align='center'>
                                        <div class='col-md-8'>
                                            <a href='player.php?id=" . $r['reg_br_igr'] . "' data-toggle = 'tooltip' title = '".$r['votes'] ." votes'><img src='".$r['pImage']."' alt='Avatar' id='av' class='avatar'></a>
                                            <p>" . $r['ime'] . " " . $r['prezime'] . "<br>" . $r['pozicija_id'] . "</p>
                                            </div>
                                    </td>";
                        }
                        echo "</tr>";
                        echo "</table>";
                        if( isset($_SESSION['priv']) ) {
                            if( $_SESSION['priv'] == 1 ) {
                                echo "<form action='restart_votes.php'>
                                    <button type='submit' class='btn btn-dark btn-sm'>Start new week</button>
                                </form>";
                            }
                        }
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>

        <script type="text/javascript">
            document.getElementById('menu-toggle').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('goalBtn').addEventListener('click', e => {
                e.preventDefault();
                document.getElementById('goal').innerHTML = `
                    <form action='goal.php' method='POST'>
                        <input type='text' name='link' size=50 placeholder='Enter new link for goal of the week' style='margin-left: 250px'>
                        <button type='submit' class='btn btn-dark'>Change</button>
                    </form>`;
            });
        </script>
        <script src="./mainApp/vendor/jquery/jquery.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.js"></script>
        <script src="./mainApp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>    
    </body>
</html>