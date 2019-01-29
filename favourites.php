<?php
    session_start();

    $now = time();
    $then = $_SESSION['time'];
    $diff = $now - $then;

    if( $diff > 600000 ) {
        session_destroy();
        header('Location: http://localhost:8080/projekt/expired.html');
    }

    $db = new mysqli('localhost', 'root', '', 'player_stats');
    $upd = "UPDATE service_table SET val = 0 WHERE idService = 3 OR idService = 4 OR idService = 5";
    $upd_querry = $db->prepare($upd);
    $upd_querry->execute();

    $upd = "UPDATE service_table SET val = 10 WHERE idService = 1";
    $upd_querry = $db->prepare($upd);
    $upd_querry->execute();
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
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span class='badge badge-light'>0</span></a></button>";
            }else {
                echo "&nbsp<button type='button' class='btn btn-dark home-btn'><a href='notifications.php' style='text-decoration: none;color: white'>Notifications <span class='badge badge-light' style='color: red'>" . $sum . "</span></a></button>";
            }

                                echo "  <button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
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

                                        echo "<a href='users_info.php?id=" . $_SESSION['id'] . "' id='post'><img src=" . $pic . " alt='Avatar' class='avatar useravatar'></a>";
                                echo '</div>
                                <div class="col-md-8 sidebar-text">';

                                            $q = "SELECT name, last_name, e_mail FROM users WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                echo "<span class='sidebar-name'>" . $r['name'] . " " . $r['last_name'] . "</span><br>";
                                                echo "<small class='sidebar-name'>" . $r['e_mail'] . "</small>";
                                            }

                                echo '</div>
                            </div>
                        </div>';
                    ?>
                    </li>
                    <li ><a href="forwards.php" >Forwards</a></li>
                    <li ><a href="midfielders.php" >Midfielders</a></li>
                    <li><a href="defenders.php">Defenders</a></li>
                    <li><a href="goalkeepers.php" >Goalkeepers</a></li>
                    <li class="favost"><a href="favourites.php">Favourites</a></li>
                    <li><a href="settings.php" >Settings</a></li>
                    <li><a href='users.php' >Users</a></li>
                    <!--<?php
                        if( isset($_SESSION['priv']) ) {
                            if( $_SESSION['priv'] == 1 ) echo "<li><a href='users.php' id='pos'>Users</a></li>";
                        }
                    ?>-->
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">

                <div class="row align-items-center">

                    <div class="col-md-8">
                      <h2 style="text-align: center;">Favourites</h2><br>
                       
                      <div  id = "pagination_data"> <!--class = "table-responsive"-->

                      </div>

                        <script>
                            var id_usr = "<?php echo $usr; ?>";
                            id_usr = parseInt(id_usr);
                            $(document).ready(function(){
                                load_data(1);
                                function load_data(page){
                                    $.ajax({
                                        url:"pagination_fav.php",
                                        method: "POST",
                                        data:{page:page,
                                                id_usr: id_usr},
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
                       
                        <?php
                            /*
                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                            $q = "SELECT DISTINCT reg_br_igr, ime, prezime, br_gol, br_asist, klub_ime FROM igrac JOIN users_igrac using(reg_br_igr) JOIN klub using(klub_id) WHERE ID=" . $_SESSION['id'];

                            $res = $db->query($q);

                            while( $r = $res->fetch_assoc() ) {
                                echo "<div class='row'>
                                    <div class='col-md-3'>
                                        <img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' height='55px' width='55px'><br>
                                        <button type='button' class='btn btn-outline-dark'><a href='player.php?id=" . $r['reg_br_igr'] . "'>More info</a></button>
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
                            */
                        ?>
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
                                                var id_usr = "<?php echo $usr; ?>";
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
                                                                url:"pagination_fav.php",
                                                                method: "POST",
                                                                data:{page:page,
                                                                      id_usr:id_usr},
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
                                                    <input type="radio" class="form-check-input" id="radio1s" name="optradio2" value="1" checked>Goals
                                                </label>
                                            </div>
                                            
                                            <div class="form-check-inline">
                                                <label class="form-check-label" for="radio2">
                                                    <input type="radio" class="form-check-input" id="radio2s" name="optradio2" value="2">Assists
                                                </label>
                                            </div>
                                                
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio3s" name="optradio2" value="3">Saves
                                            </label>
                                            </div>

                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" id="radio4s" name="optradio2" value="4">Votes
                                            </label>
                                            <script>
                                                var pos = 'MID';
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
            document.querySelector('.favost').classList.add('active');
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>