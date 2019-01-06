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

                <div class="row align-items-center">

                    <div class="col-md-8">
                      <h2 style="text-align: center;">Users</h2><br>
                      
                      <div  id = "pagination_data"> <!--class = "table-responsive"-->

                      </div>

                      <?php
                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                        $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users";

                        $res = $db->query($q);

                        while( $r = $res->fetch_assoc() ) {
                            echo "<div class='row'>
                                <div class='col-md-3'>
                                    <img src='" . $r['user_photo'] . "' height='55px' width='55px'><br>
                                    <button type='button' class='btn btn-dark btn-sm'><a href='users_info.php?id=" . $r['ID'] . "' style='text-decoration: none;color: white'>User info</a></button>
                                </div>
                                <div class='col-md-3'>
                                    Name: " . $r['name'] . "<br>
                                    Last name: " . $r['last_name'] . "<br>
                                    E-mail: " . $r['e_mail'] . "<br>
                                </div>
                            </div><br><hr>";
                        }
                      ?>

                      <!--<script>
                            var pos = 'GK';
                            $(document).ready(function(){
                                load_data(1);
                                function load_data(page){
                                    $.ajax({
                                        url:"pagination.php",
                                        method: "POST",
                                        data:{page:page,
                                              pos:pos},
                                        success:function(data){
                                            $('#pagination_data').html(data);
                                        }
                                    })
                                }
                                $(document).on('click', '.pagination_link',function(){
                                    var page = $(this).attr("id");
                                    load_data(page);
                                })
                            });
                      </script>-->

                    </div>
                    
                    <div class="col-md-4" id="right-sidebar">
                        <!-- Desni meni -->
                        <p></p> <p></p>
                        <p>Search user:</p>
                        <input type="text" name="txtuser" id="txtuser">
                        <!--
                        <script>
                            var pos = 'FWD';
                            $(document).ready(function(){
                                $('input[name = "txtuser"]').keyup(function(){
                                    var no_in = $(this).val();
                                    console.log(no_in);
                                    $.ajax({
                                        url:"insert_pagination.php",
                                        method:"POST",
                                        data:{name:3, text:no_in},
                                        success:function(data){
                                                // alert("uspjesno");
                                        }

                                    })
                                    load_data(1);
                                    function load_data(page){
                                        $.ajax({
                                            url:"pagination.php",
                                            method: "POST",
                                            data:{page:page,
                                                    pos:pos},
                                            success:function(data){
                                                $('#pagination_data').html(data);
                                                }
                                            })
                                    }
                                });
                            });
                        </script> -->
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