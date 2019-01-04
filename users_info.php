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
                                <button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Notifications</a></button>
                                <button type='button' class='btn btn-dark home-btn'><a href='app.php' style='text-decoration: none;color: white'>Home</a></button>
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
                
                <div class="container-fluid">
                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <div class="container">

                                <!-- Back button-->
                                <form action='users.php'>
                                    <button type='submit' class='btn btn-dark btn-sm'><-</button>
                                </form>

                                <div class="row">
                                    <div class="col-md-3">

                                    	<?php

                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                            $q = "SELECT user_photo FROM users WHERE ID=" . $_GET['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                                echo "<img src='" . $r['user_photo'] ."' style='text-align: center;' height='75px' width='75px'>";
                                                break;
                                            }

                                            echo "<div class='row'>
		                                        	FOLLOWERS FOLLOWS
		                                        </div>";

		                                    if( isset($_SESSION['id']) ) {
					                            if( $_GET['id'] != $_SESSION['id'] ) {
					                            	echo "<a href='add_follower.php?id=" . $_GET['id'] . "' class='badge badge-info'>Follow</a>&nbsp";
					                            }
					                        } 

                                            mysqli_free_result($res);
                                        ?>

                                    </div>
                                    <div class="col-md-8">
                                        <?php

                                            $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                                            $q = "SELECT name, last_name, age, e_mail, gender FROM users WHERE ID=" . $_GET['id'];

                                            $res = $db->query($q);

                                            while( $r = $res->fetch_assoc() ) {
                                             	echo "Name: " . $r['name'] . "<br>";
                                                echo "Last name: " . $r['last_name'] . "<br>";
                                                echo "Age: " . $r['age'] . "<br>";
                                                echo "E-mail: " . $r['e_mail'] . "<br>";
                                                echo "Gender: " . $r['gender'] . "<br>";
                                                if( isset($_SESSION['priv']) ) {
						                            if( $_SESSION['priv'] == 1 ) {
						                            	echo "<a href='grant_priv.php?id=" . $_GET['id'] . "' class='badge badge-info'>Grant privilage</a>&nbsp";
						                            	echo "<a href='remove_priv.php?id=" . $_GET['id'] . "' class='badge badge-info'>Remove privilage</a>";
						                            }
						                        } 
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
                                <h3>Voted for</h3>
                                <hr width="100%">
                                <div class="container">
                                    
                                    <?php 
                                    	if( isset($_GET['id']) ) $id = $_GET['id'];

                                         $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                         $q = "SELECT reg_br_igr, ime, prezime, votes FROM igrac JOIN users_votes using(reg_br_igr) WHERE ID=" . $id . " ORDER BY votes";

                                         $res = $db->query($q);

                                         if( $res->num_rows == 0 ) {
                                         	echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                         }else {
                                         	while($row = $res->fetch_assoc()){
	                                         	echo "<div class='row'>";
		                                            echo "<div class=col-md-6>
		                                            		<a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png' style='text-align: center;' height='55px' width='55px'></a>
		                                            	</div>";
		                                            echo "<div class='col-md-6' style = 'text-decoration-color: aqua '>
		                                            		Name: " . $row['ime'] . "</br>
		                                            		Last name:" . $row['prezime'] ."</br>
		                                            		Votes: " . $row['votes'] . "
		                                            	</div>";
	                                            echo "</div>";
	                                            echo "<hr width='100%'>";
	                                         } 
                                         }                                                                           
                                    ?>
                                </div> 
                            </div>
             
                            <div class="container">
                                <h3>Follows</h3>
                                <div class="container">
                                    <img src="https://img.uefa.com/imgml/2016/ucl/social/og-statistics.png" style="text-align: center;" height="55px" width="55px">
                                    Ime igraca<br>
                                    Obrane: 15<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" src='player.js'></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>