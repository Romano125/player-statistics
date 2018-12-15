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
    </head>
    <body style="background-color: #e6ffff">
        <?php 
            if( $_SESSION['gen'] == 'M' ) echo "<div class='container-fluid' style='background-color: #33ccff; height:100px; align-items:center'>
                    <table>
                        <tr> <td width='25%'><a href='#' class='btn btn-success' id='menu-toggle'>Klikni</a></td>
                            <td style='text-align: center; padding: 20px'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'><p>Dobrodosao " . $_SESSION['user'] . "!  <button type='button' class='btn btn-primary btn-sm'><a href='logout.php' style='text-decoration: none;color: black'>LogOut</a></button></p></td> 
                        </tr>
                    </table>
                </div>"; 
            else echo "<div class='container-fluid' style='background-color: #33ccff; height:100px; align-items:center'>
                    <table>
                        <tr> <td width='25%'><a href='#' class='btn btn-success' id='menu-toggle'>Klikni</a></td>
                            <td style='text-align: center; padding: 20px'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'><p>Dobrodosla " . $_SESSION['user'] . "!  <button type='button' class='btn btn-primary btn-sm'><a href='logout.php' style='text-decoration: none;color: black'>LogOut</a></button></p></td> 
                        </tr>
                    </table>
                </div>"; 
        ?>


        <div id="wrapper">

            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li>
                        <div id="wrapper">
                            <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="125px" width="180px">
                        </div>
                    </li>
                    <li><a href="#" id="fwd">Forward</a></li>
                    <li><a href="#" id="mid">Middle</a></li>
                    <li><a href="#" id="def">Defense</a></li>
                    <li><a href="#" id="gk">Goalkeeper</a></li>
                    <li><a href="#" id="set">Settings</a></li>
                </ul> 
            </div>

            <div id="page-content-wrapper" style="background-color: white;">
                <!-- Klik na forward u sidebaru -->
                <div class="container-fluid" id="forward">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Forward players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='FWD'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'>
                                    </div>
                                    <div class='col-md-3'>
                                        Name: " . $r['ime'] . "<br>
                                        Last name: " . $r['prezime'] . "<br>
                                        Goals: " . $r['br_gol'] . "<br>
                                        Asists: " . $r['br_asist'] . "<br>
                                        Club: " . $r['klub_ime'] . "<br>
                                    </div>
                                </div><br><hr>";
                            }

                            mysqli_free_result($res);
                          ?>
                        </div>

                        <div class="col-md-4">
                          <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Klik na middle u sidebaru -->
                <div class="container-fluid" id="middle">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Middle players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='MID'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'>
                                    </div>
                                    <div class='col-md-3'>
                                        Name: " . $r['ime'] . "<br>
                                        Last name: " . $r['prezime'] . "<br>
                                        Goals: " . $r['br_gol'] . "<br>
                                        Asists: " . $r['br_asist'] . "<br>
                                        Club: " . $r['klub_ime'] . "<br>
                                    </div>
                                </div><br><hr>";
                            }

                            mysqli_free_result($res);
                          ?>
                        </div>

                        <div class="col-md-4">
                          <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>  

                <!-- Klik na defense u sidebaru -->
                <div class="container-fluid" id="defense">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Defense players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='DEF'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'>
                                    </div>
                                    <div class='col-md-3'>
                                        Name: " . $r['ime'] . "<br>
                                        Last name: " . $r['prezime'] . "<br>
                                        Goals: " . $r['br_gol'] . "<br>
                                        Asists: " . $r['br_asist'] . "<br>
                                        Club: " . $r['klub_ime'] . "<br>
                                    </div>
                                </div><br><hr>";
                            }

                            mysqli_free_result($res);
                          ?>
                        </div>

                        <div class="col-md-4">
                          <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>   

                <!-- Klik na goalkeepers u sidebaru -->
                <div class="container-fluid" id="goalkeepers">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Goalkeepers</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='GK'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'>
                                    </div>
                                    <div class='col-md-3'>
                                        Name: " . $r['ime'] . "<br>
                                        Last name: " . $r['prezime'] . "<br>
                                        Goals: " . $r['br_gol'] . "<br>
                                        Asists: " . $r['br_asist'] . "<br>
                                        Club: " . $r['klub_ime'] . "<br>
                                    </div>
                                </div><br><hr>";
                            }

                            mysqli_free_result($res);
                          ?>
                        </div>

                        <div class="col-md-4">
                          <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>           

                <!-- On load izgled stranice -->
                <div class="container-fluid active" id="home">
                    <div class="row">

                      <div class="col-sm-8">
                            <div class="container" align="center">
                                <h3>Goal of the week</h3>
                                <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="125px" width="180px">
                            </div>
                            <hr width="100%">
                            <div class="container" align="center">
                                <h3>Team of the week</h3>
                                <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="125px" width="180px">
                            </div>
                      </div>

                      <div class="col-sm-4" style="border-style: groove;">
                            <div class="container">
                                <h3>Top 5 scores</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 saves</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Top 5 assists</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Asistencije: 55<br>
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

            document.getElementById('fwd').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.remove('active');
                document.getElementById('forward').classList.add('active');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('mid').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('def').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('gk').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('set').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });
        </script>
    </body>
</html>