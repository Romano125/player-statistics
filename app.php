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
            echo "<div class='container-fluid top-menu'>
                    <table>
                        <tr> <td width='25%'>
                                <a href='#' class='btn btn-dark' id='menu-toggle'><div class='menu-icon'></div>
                                <div class='menu-icon'></div>
                                <div class='menu-icon'></div></a>
                                <button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
                            </td>
                            <td style='text-align: center; padding: 20px; font-family: Papyrus, fantasy; font-size: 49px; font-style: normal; font-variant: small-caps; font-weight: 700; line-height: 40.6px;'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'><button type='button' class='btn btn-dark btn-sm'><a href='logout.php' style='text-decoration: none;color: white'>LogOut</a></button>
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
                                <iframe  width = 70% height="400" src="https://www.youtube.com/embed/SjTnbN3_r38" frameborder="1" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    <!-- za autoplay na videu dodat tocno poslje linka   "?autoplay=1" -->
                                </div>
                            <hr width="100%">
                            <div class="container" align="center">
                                <h3>Team of the week</h3>
                                <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="125px" width="180px">
                            </div>
                        </div>

                        <!-- Desni meni -->
                        <div class="col-sm-4 right-menu-onload" style="border-style: groove;">
                            <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    
                                    <?php 
                                         $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                         $q = "SELECT ime, prezime, br_gol FROM igrac ORDER BY br_gol desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                         $res = $db->query($q);
                                         echo "<table class = 'table' border = 1> 
                                                <tr><th></th><th> Igrač</th> <th>Golovi</th>";
                                         while($row = $res->fetch_assoc()){
                                             echo "<tr><td><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'> </td>";
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
                                        $q = "SELECT ime, prezime, br_obrane FROM igrac WHERE pozicija_id = 'GK' ORDER BY br_obrane desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        $res = $db->query($q);
                                        echo "<table class = 'table' border = 1> 
                                               <tr><th></th><th> Igrač</th> <th>Obrane</th>";
                                        while($row = $res->fetch_assoc()){
                                            echo "<tr><td><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'> </td>";
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
                                            $q = "SELECT ime, prezime, br_asist FROM igrac ORDER BY br_asist desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                            $res = $db->query($q);
                                            echo "<table class = 'table' border = 1> 
                                                   <tr><th></th><th> Igrač</th> <th>Asistencije</th>";
                                            while($row = $res->fetch_assoc()){
                                                echo "<tr><td><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'> </td>";
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
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>