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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #e6ffff">
        <?php 
            echo "<div class='container-fluid' style='background-color: #33ccff; height:100px; align-items:center; top:0; position:sticky; position: -webkit-sticky; z-index:1'>
                    <table>
                        <tr> <td width='25%'>
                                <a href='#' class='btn btn-dark' id='menu-toggle'><div class='menu-icon'></div>
                                <div class='menu-icon'></div>
                                <div class='menu-icon'></div></a>
                                <button type='button' class='btn btn-dark home-btn'>Home</button>
                            </td>
                            <td style='text-align: center; padding: 20px'><h2>Welcome to the site about football players</h2></td> 
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

                            //to-do background image upload

                            echo '<div id="wrapper" class="images" style="background-image: url(https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png);">
                                <div class="row">
                                    <div class="col-md-3">';

                                            $q = "SELECT user_photo FROM users WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                $pic = $r['user_photo'];
                                            }

                                            echo "<a href='#' id='post'><img src=" . $pic . " alt='Avatar' class='avatar'></a>";
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
                    <li><a href="app.php?fwd" id="fwd">Forward</a></li>
                    <li><a href="app.php?mid" id="mid">Middle</a></li>
                    <li><a href="app.php?def" id="def">Defense</a></li>
                    <li><a href="app.php?gk" id="gk">Goalkeeper</a></li>
                    <li><a href="app.php?fav" id="fav">Favourites</a></li>
                    <li><a href="app.php?pos" id="pos">Settings</a></li>
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">
                <!-- Prikaz detalja o igracu -->
                <div class="container-fluid switch" id="player">
                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <div class="container">

                                <div class="row">
                                    <div class="col-md-3">
                                        
                                        <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="75px" width="75px">
                                    </div>
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-outline-warning" style="float: right;">Favourites</button>
                                        <?php

                                            $id = $_GET['id'];

                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                            $q = "SELECT ime, prezime, br_gol, br_asist, klub_ime, br_dres, br_zkarton, br_ckarton, ime_poz FROM igrac NATURAL JOIN klub NATURAL JOIN pozicija WHERE reg_br_igr='" . $id . "'";
                                            
                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                echo "Name: " . $r['ime'] . "<br>";
                                                echo "Last name: " . $r['prezime'] . "<br>";
                                                echo "Club: " . $r['klub_ime'] . "<br>";
                                                echo "Jersy number: " . $r['br_dres'] . "<br>";
                                                echo "Field position: " . $r['ime_poz'] . "<br>";
                                                echo "Total goals: " . $r['br_gol'] . "<br>";
                                                echo "Total assists: " . $r['br_asist'] . "<br>";
                                                echo "Total yellow cards: " . $r['br_zkarton'] . "<br>";
                                                echo "Total red cards: " . $r['br_ckarton'] . "<br>";
                                                echo "Market value: " . 5550055 . "$<br>";
                                                break;
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
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Golovi: 12<br>
                                </div>
                            </div>
                            <hr width="100%">
                            <div class="container">
                                <h3>Nesto</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Klik na forward u sidebaru -->
                <div class="container-fluid switch" id="forward">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Forward players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='FWD'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                        <button type='button' class='btn btn-outline-dark'><a href='app.php?id=" . $r['reg_br_igr'] . "'>More info</a></button>
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

                        <div class="col-md-4" id="right-sidebar">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button onclick= "btn1()" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Results:
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            a
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button onclick= "btn2()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Filter By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aaa
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <button onclick = "btn3()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Sort By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Klik na middle u sidebaru -->
                <div class="container-fluid switch" id="middle">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Middle players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='MID'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                        <button type='button' class='btn btn-outline-dark'><a href='app.php?id=" . $r['reg_br_igr'] . "'>More info</a></button>
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

                        <div class="col-md-4" id="right-sidebar">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button onclick= "btn1()" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Results:
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            a
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button onclick= "btn2()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Filter By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aaa
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <button onclick = "btn3()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Sort By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>  
        
                <!-- Klik na defense u sidebaru -->
                <div class="container-fluid switch" id="defense">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Defense players</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='DEF'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                        <button type='button' class='btn btn-outline-dark'><a href='app.php?id=" . $r['reg_br_igr'] . "'>More info</a></button>
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

                        <div class="col-md-4" id="right-sidebar">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button onclick= "btn1()" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Results:
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            a
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button onclick= "btn2()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Filter By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aaa
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <button onclick = "btn3()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Sort By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>   

                <!-- Klik na goalkeepers u sidebaru -->
                <div class="container-fluid switch" id="goalkeepers">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                          <h2 style="text-align: center;">Goalkeepers</h2><br>
                          <?php
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac NATURAL JOIN klub WHERE pozicija_id='GK'";

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                        <button type='button' class='btn btn-outline-dark'><a href='app.php?id=" . $r['reg_br_igr'] . "'>More info</a></button>
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

                        <div class="col-md-4" id="right-sidebar">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button onclick= "btn1()" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Results:
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            a
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button onclick= "btn2()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Filter By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aaa
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <button onclick = "btn3()" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Sort By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            aa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <!-- Klik na settings u sidebaru -->  
                <div class="container-fluid switch" id="settings">
                     <div class="row align-items-center">

                        <div class="col-md-8">

                            <div class="container">

                                <div class="row">
                                    <div class="col-md-3">
                                        <?php
                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                            $q = "SELECT user_photo FROM users WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                $pic = $r['user_photo'];
                                            }

                                            echo "<form action='photo_upload.php?id=" . $_SESSION['id'] . "' method='POST'  enctype='multipart/form-data'>
                                                    <img src=" . $pic . " style='text-align: center;' height='75px' width='75px'>
                                                    <input type='file' name='profile'>
                                                    <button type='submit' class='btn btn-success'>Upload</button>
                                                </form>";

                                            if( isset($_SESSION['to_big']) ) {
                                                if( $_SESSION['to_big'] == 1 ) {
                                                    echo "<p>Sorry your picture is to big</p>";
                                                }
                                            }
                                        ?>
                                    </div>
                                    <div class="col-md-8 user_info">
                                        <?php
                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                            $q = "SELECT name, last_name, gender, age, password, e_mail FROM users WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                echo "<form action='update_user.php' method='POST'>
                                                        Name: <input class='form-control user' type='text' value='" . $r['name'] . "' name='n' readonly>
                                                        Last name: <input class='form-control user' type='text' value='" . $r['last_name'] . "' name='l' readonly>
                                                        Gender: <input class='form-control user' type='text' value='" . $r['gender'] . "' name='g' readonly>
                                                        Age: <input class='form-control user' type='text' value='" . $r['age'] . "' name='a' readonly>
                                                        Password: <input class='form-control user' type='text' value='" . $r['password'] . "' name='p' readonly>
                                                        E-mail: <input class='form-control user' type='text' value='" . $r['e_mail'] . "' name='e' readonly>
                                                        <button type='button' class='btn btn-outline-dark' id='mod-btn'>Modify</button>
                                                        <button type='submit' class='btn btn-outline-dark' id='sav-btn'>Save</button>
                                                    </form>";
                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Klik na favourites u sidebaru -->  
                <div class="container-fluid switch" id="favour">
                    <p>aaa</p>
                </div>       

                <!-- On load izgled stranice -->
                <div class="container-fluid" id="home">
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
        
        <?php

            if( isset($_GET['id']) ) {
                $id = $_GET['id'];

                if( isset($id) ) {
                    if( $id != '0' ) {
                        echo "<script>
                                document.getElementById('home').classList.add('switch');
                                document.getElementById('forward').classList.add('switch');
                                document.getElementById('defense').classList.add('switch');
                                document.getElementById('goalkeepers').classList.add('switch');
                                document.getElementById('middle').classList.add('switch');
                                document.getElementById('player').classList.remove('switch');
                                document.getElementById('settings').classList.add('switch');
                                document.getElementById('favour').classList.add('switch');
                            </script>";
                    }
                }
            }
        ?>



        <script type="text/javascript">
            document.querySelector('.home-btn').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.remove('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.add('switch');
                document.getElementById('favour').classList.add('switch');
            });

            document.getElementById('menu-toggle').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('fwd').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.remove('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.add('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('mid').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.remove('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.add('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('def').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.remove('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.add('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('gk').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.remove('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('pos').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.remove('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('post').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.remove('switch');
                document.getElementById('favour').classList.add('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('fav').addEventListener( 'click', e => {
                e.preventDefault();
                document.getElementById('home').classList.add('switch');
                document.getElementById('forward').classList.add('switch');
                document.getElementById('defense').classList.add('switch');
                document.getElementById('goalkeepers').classList.add('switch');
                document.getElementById('middle').classList.add('switch');
                document.getElementById('player').classList.add('switch');
                document.getElementById('settings').classList.add('switch');
                document.getElementById('favour').classList.remove('switch');
                document.getElementById('wrapper').classList.toggle('menuDisplayed');
            });

            document.getElementById('mod-btn').addEventListener( 'click', e => {
                e.preventDefault();
                var el = document.getElementsByClassName('user');

                for( let i = 0; i < el.length; i++ ) {
                    el[i].readOnly = false;
                }
            });

            document.getElementById('sav-btn').addEventListener( 'click', e => {
                //e.preventDefault();
                var el = document.getElementsByClassName('user');

                for( let i = 0; i < el.length; i++ ) {
                    el[i].readOnly = true;
                }
            });
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>