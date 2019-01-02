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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src = ./app.js> </script>
        
    </head>
    <body style="background-color: #e6ffff">
        <?php 
            $s = '';
            if( isset($_SESSION['priv']) ) {
                if( $_SESSION['priv'] == 1 ) $s = 'Prijavljeni ste kao admin';
            }
            echo "<div class='container-fluid top-menu'>
                    <table>
                        <tr> <td width='25%'>
                                <a href='#' class='btn btn-dark' id='menu-toggle'><div class='menu-icon'></div>
                                <div class='menu-icon'></div>
                                <div class='menu-icon'></div></a>
                                <a href='app.php' style='text-decoration: none;color: white'><button type='button' class='btn btn-dark home-btn'>Home</button></a>
                            </td>
                            <td style='text-align: center; padding: 20px; font-family: Papyrus, fantasy; font-size: 49px; font-style: normal; font-variant: small-caps; font-weight: 700; line-height: 40.6px;'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'>" . $s . "   <button type='button' class='btn btn-dark btn-sm'><a href='logout.php' style='text-decoration: none;color: white'>LogOut</a></button>
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

                                            echo "<a href='settings.php' id='post'><img src=" . $pic . " alt='Avatar' class='avatar'></a>";
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
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">

                <!-- On load izgled stranice -->
                <div class="container-fluid" id="home">
                    <div class="row">

                        <div class="col-sm-8">
                            <div class="container" align="center">
                                <h3>Goal of the week</h3>
                                <?php
                                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                    $q = "SELECT link FROM goal_of_the_week";

                                    $res = $db->query($q);

                                    while( $r = $res->fetch_assoc() ) $link = $r['link'];

                                    echo "<iframe  id='frame' width = 70% height='400' src=" . $link . " frameborder='1' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
                                    //za autoplay na videu dodat tocno poslje linka   "?autoplay=1"
                                ?>
                            </div>
                            <?php
                                if( isset($_SESSION['priv']) ) {
                                    if( $_SESSION['priv'] == 1 ) {
                                        echo "<div id='goal'>
                                                <button type='button' class='btn btn-dark' id='goalBtn' style='margin-left: 350px'>Change link</button>
                                                </div>";
                                    }
                                }
                            ?>
                            <hr width="100%">
                            <div class="container" align="center">
                                <h3>Team of the week</h3>
                                <?php
                                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                    $q = "SELECT reg_br_igr, ime, prezime, pozicija_id FROM igrac ORDER BY br_gol desc LIMIT 3 ";

                                    $res = $db->query($q);

                                    echo "<table height=1% width=1% style='color: white; background-image: url(" . 'https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX24229534.jpg' . ");'>";
                                    $f = 0;
                                    while( $r = $res->fetch_assoc() ) {
                                        if( $f == 0 ) {
                                            echo "<tr>
                                                    <td colspan=4 align='center'>
                                                        <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                        " . $r['ime'] . "</br>
                                                        " . $r['prezime'] . "</br>
                                                        " . $r['pozicija_id'] . "</br>
                                                    </td>
                                                </tr>";
                                            $f = 1;
                                        }else if( $f == 1 ) {
                                            echo "<tr>
                                                    <td colspan=2 align='right'>
                                                        <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                        " . $r['ime'] . "</br>
                                                        " . $r['prezime'] . "</br>
                                                        " . $r['pozicija_id'] . "</br>
                                                    </td>";
                                            $f = 2;
                                        }else {
                                            echo "<td colspan=3>
                                                        <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                        " . $r['ime'] . "</br>
                                                        " . $r['prezime'] . "</br>
                                                        " . $r['pozicija_id'] . "</br>                                               
                                                    </td>
                                                </tr>";
                                        }
                                    }

                                    $q = "SELECT reg_br_igr, ime, prezime, pozicija_id FROM igrac WHERE pozicija_id = 'MID' ORDER BY br_asist desc LIMIT 3 ";

                                    $res = $db->query($q);

                                    $f = 0;
                                    echo "<tr align='center'>";
                                    while( $r = $res->fetch_assoc() ) {
                                        if( $f == 0 ) {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                            $f = 1;
                                        }else if( $f == 1 ) {
                                            echo "<td colspan=2>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                            $f = 2;
                                        }else {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                        }
                                    }
                                    echo "</tr>";

                                    $q = "SELECT reg_br_igr, ime, prezime, pozicija_id FROM igrac WHERE pozicija_id = 'DEF' ORDER BY br_zkarton desc LIMIT 4 ";

                                    $res = $db->query($q);

                                    $f = 0;
                                    echo "<tr>";
                                    while( $r = $res->fetch_assoc() ) {
                                        if( $f == 0 ) {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                            $f = 1;
                                        }else if( $f == 1 ) {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                            $f = 2;
                                        }else if( $f == 2 ) {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                            $f = 3;
                                        }else {
                                            echo "<td>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                        }
                                    }
                                    echo "</tr>";

                                    $q = "SELECT reg_br_igr, ime, prezime, pozicija_id FROM igrac WHERE pozicija_id = 'GK' ORDER BY br_obrane desc LIMIT 1 ";

                                    $res = $db->query($q);

                                    echo "<tr>";
                                    while( $r = $res->fetch_assoc() ) {
                                        echo "<td colspan=4 align='center'>
                                                    <a href='player.php?id=" . $r['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' alt='Avatar' class='avatar'></a>
                                                    " . $r['ime'] . "</br>
                                                    " . $r['prezime'] . "</br>
                                                    " . $r['pozicija_id'] . "</br>
                                                </td>";
                                    }
                                    echo "</tr>";
                                    echo "</table>";
                                ?>
                            </div>
                        </div>

                        <!-- Desni meni -->
                        <div class="col-sm-4 right-menu-onload" style="border-style: groove;">
                            <div class="container">
                                <h3>Current top 5 votes</h3>
                                <div class="container">
                                    
                                    <?php 
                                         $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                         $q = "SELECT reg_br_igr, ime, prezime, votes FROM igrac ORDER BY votes desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                         //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                         $res = $db->query($q);
                                         echo "<table class = 'table' border = 1> 
                                                <tr><th></th><th> Igrač</th> <th>Votes</th>";
                                         while($row = $res->fetch_assoc()){
                                             echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'></a></td>";
                                             echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['votes'] . "</td>";
                                         }
                                         echo "</table>";                                                                            
                                    ?>
                                </div>                               
                            </div>
                            <hr width = "100%">
                            <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    
                                    <?php 
                                         $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                         $q = "SELECT reg_br_igr, ime, prezime, br_gol FROM igrac ORDER BY br_gol desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                         //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                         $res = $db->query($q);
                                         echo "<table class = 'table' border = 1> 
                                                <tr><th></th><th> Igrač</th> <th>Golovi</th>";
                                         while($row = $res->fetch_assoc()){
                                             echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'></a></td>";
                                             echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_gol'] . "</td>";
                                         }
                                         echo "</table>";                                                                            
                                    ?>
                                </div>                               
                            </div>
                            <hr width = "100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, br_obrane FROM igrac WHERE pozicija_id = 'GK' ORDER BY br_obrane desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        $res = $db->query($q);
                                        echo "<table class = 'table' border = 1> 
                                               <tr><th></th><th> Igrač</th> <th>Obrane</th>";
                                        while($row = $res->fetch_assoc()){
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'></a> </td>";
                                            echo "<td>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_obrane'] . "</td>";
                                        }
                                        echo "</table>";                                                                    
                                ?>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 assists</h3>
                                <div class="container">
                                    <?php 
                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                            $q = "SELECT reg_br_igr, ime, prezime, br_asist FROM igrac ORDER BY br_asist desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                            $res = $db->query($q);
                                            echo "<table class = 'table' border = 1> 
                                                   <tr><th></th><th> Igrač</th> <th>Asistencije</th>";
                                            while($row = $res->fetch_assoc()){
                                                echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'></a> </td>";
                                                echo "<td>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_asist'] . "</td>";
                                            }
                                            echo "</table>";                                                                     
                                    ?>
                                </div>
                            </div>
                      </div>
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>