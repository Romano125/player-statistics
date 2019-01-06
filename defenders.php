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
                                <button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications</a></button>
                                <button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
                            </td>
                            <td style='text-align: center; padding: 20px; font-family: Papyrus, fantasy; font-size: 49px; font-style: normal; font-variant: small-caps; font-weight: 700; line-height: 40.6px;'><h2>Welcome to the site about football players</h2></td> 
                            <td width='25%' style='text-align: right; padding: 20px'>" . $s . "  <button type='button' class='btn btn-dark btn-sm'><a href='logout.php' style='text-decoration: none;color: white'>LogOut</a></button>
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
                      <h2 style="text-align: center;">Defense players</h2><br>
                      
                      <div  id = "pagination_data"> <!--class = "table-responsive"-->

                      </div>

                      <script>
                            var pos = 'DEF';
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
                      </script>

                    </div>

                    <!-- Desni meni -->
                    <div class="col-md-4" id="right-sidebar">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Results:
                                        </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body"> <!-- Prikaz radio buttona -->
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="radio" class="form-check-input" id="radio1" name="optradio" value="10" checked>10
                                                </label>
                                            </div>
                                            
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" id="radio2" name="optradio" value="15">15
                                                </label>
                                            </div>
                                                
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio3" name="optradio" value="20">20
                                            </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio4" name="optradio" value="10000">All
                                            </label>

                                            <script>
                                                var pos = 'DEF';
                                                $(document).ready(function(){
                                                    $('input[name = "optradio"]').click(function(){
                                                        var no_in = $(this).val();
                                                        $.ajax({
                                                            url:"insert_pagination.php",
                                                            method:"POST",
                                                            data:{optradio:no_in},
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
                                            </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Filter By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body"> <!-- Filer -->
                                            Name: <input type="text" class="form-control" id="usr" name="name">
                                            <!-- Lige i klubovi-->
                                            <?php
                                                $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                                $q = "SELECT ime_natj FROM natjecanje";

                                                $res = $db->query($q);

                                                echo "Select league: <select onchange='findLeague()' name='league' class='form-control' id = 'liga' required>
                                                                     <option value=''>Choose league</option>";
                                                while( $r = $res->fetch_assoc() ) {
                                                    echo "<option value='" . $r['ime_natj'] . "'>". $r['ime_natj'] . "</option>";
                                                }
                                                echo "</select>";
                                                
                                                $q2 = "SELECT klub_ime FROM klub";

                                                $res2 = $db->query($q2);

                                                echo "Select club: <select onchange='findLeague(this.value)' name='league' class='form-control' required>
                                                                     <option value=''>Choose league</option>";
                                                while( $r2 = $res2->fetch_assoc() ) {
                                                    echo "<option value='" . $r2['klub_ime'] . "'>". $r2['klub_ime'] . "</option>";
                                                }
                                                echo "</select>";
                                                mysqli_close($db);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Sort By:
                                        </button>
                                        </h5>
                                    </div>
                                    
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                        <div class="form-check-inline">
                                                <label class="form-check-label" for="radio1">
                                                    <input type="radio" class="form-check-input" id="radio1s" name="optradio" value="1" checked>Goals
                                                </label>
                                            </div>
                                            
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" id="radio2s" name="optradio" value="2">Assists
                                                </label>
                                            </div>
                                                
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio3s" name="optradio" value="3">Saves
                                            </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio4s" name="optradio" value="4">Age
                                            </label>
                                            <script>
                                                var pos = 'DEF';
                                                $(document).ready(function(){
                                                    $('input[name = "optradio2"]').click(function(){
                                                        var no_in = $(this).val();
                                                        $.ajax({
                                                            url:"insert_sortby.php",
                                                            method:"POST",
                                                            data:{optradio:no_in},
                                                            success:function(data){
                                                                   // alert("uspjesno");
                                                            }

                                                        })/*
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
                                                        }*/
                                                    });
                                                });
                                            </script>
                                            </div>
                                        </div>
                                    </div>
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