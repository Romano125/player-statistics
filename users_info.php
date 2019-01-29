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
        <!--<link rel="stylesheet" type="text/css" href="users_info.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src = ./app.js> </script>
        
    </head>
    <body style="background-color: #e6ffff">
       <!-- <div class="bg-modal1">
            <div class="modal-content col-md-4 pre-scrollable">
                <h3>Followers</h3>
                <hr width="100%">
                <div class="close">+</div>
                <?php 
                    if( isset($_GET['id']) ) $id = $_GET['id'];

                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                    $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT ID FROM users_followers WHERE follows=" . $_GET['id'] . ")";

                    $res = $db->query($q);

                    if( $res->num_rows == 0 ) {
                        echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                    }else {
                        while( $r = $res->fetch_assoc() ) {
                                echo "<div class=col-md-6>
                                        <a href='users_info.php?id=" . $r['ID'] . "'><img src='" . $r['user_photo'] . "' height='55px' width='55px'></a>
                                    </div>";
                                echo "<div class='col-md-6' style = 'text-decoration-color: aqua '>
                                        Name: " . $r['name'] . "</br>
                                        Last name:" . $r['last_name'] ."</br>
                                        E-mail: " . $r['e_mail'] . "
                                    </div>";
                            echo "<hr width='100%'>";
                        }
                    }

                ?>
            </div>
        </div>

        <div class="bg-modal2">
            <div class="modal-content col-md-4 pre-scrollable">
                <h3>Follows</h3>
                <hr width="100%">
                <div class="close">+</div>
                <?php 
                    if( isset($_GET['id']) ) $id = $_GET['id'];

                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                    $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID=" . $_GET['id'] . ")";

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
        </div>-->
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

            $q = "SELECT weekNo, startDate FROM weeks";
            $res = ($db->query($q))->fetch_assoc();

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
                            <br><br><span class='badge badge-dark'style='padding-top: 10px; padding-bottom: 10px; padding-left: 6px; padding-right: 6px;
                            '> Week ".$res['weekNo']." started on ".$res['startDate']."</span>
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
                    <li class="fwd"><a href="forwards.php" class="f">Forwards</a></li>
                    <li class="mid"><a href="midfielders.php" class="m">Midfielders</a></li>
                    <li class="def"><a href="defenders.php" class="d">Defenders</a></li>
                    <li class="gk"><a href="goalkeepers.php" class="g">Goalkeepers</a></li>
                    <li class="fav"><a href="favourites.php" class="f">Favourites</a></li>
                    <li class="pos"><a href="settings.php" class="s">Settings</a></li>
                    <li class='use'><a href='users.php' class="u">Users</a></li>
                    <!--<?php
                        if( isset($_SESSION['priv']) ) {
                            if( $_SESSION['priv'] == 1 ) echo "<li><a href='users.php' id='pos'>Users</a></li>";
                        }
                    ?>-->
                </ul> 
            </div>
                                                
            <div id="page-content-wrapper" style="background-color: white;">
                
                <div class="container-fluid">

                    <div class="row">

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
                                                echo "<img id='profile' src='" . $r['user_photo'] ."' style='text-align: center;' height='75px' width='75px'>";
                                                break;
                                            }

                                            $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID=" . $_GET['id'] . ")";

                                            $res = $db->query($q);

                                            $foll1 = $res->num_rows;

                                            $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT ID FROM users_followers WHERE follows=" . $_GET['id'] . ")";

                                            $res = $db->query($q);

                                            $foll2 = $res->num_rows;

                                            echo "<div class='row' style='text-align: center; color: grey'>
                                                    <table>
                                                        <tr>
                                                            <td>FOLLOWERS</t> <td>FOLLOWS</td>
                                                        </tr>
                                                        <tr>
                                                            <td style='cursor: pointer' data-toggle='modal' data-target='#exampleModalCenter1'>" . $foll2 . "</t> <td style='cursor: pointer' data-toggle='modal' data-target='#exampleModalCenter'>" . $foll1 . "</td>
                                                        </tr>
                                                    </table>
		                                        </div>";

                                            echo "<!-- Modal -->
                                                    <div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' pre-scrollable>
                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                        <div class='modal-content'>
                                                          <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLongTitle'>Follows</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                              <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class='modal-body'>";
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];                                        
                                                    $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT follows FROM users_followers WHERE ID=" . $_GET['id'] . ")";

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
                                                    
                                                    echo "</div>
                                                        </div>
                                                    </div>
                                                 </div>";

                                                 echo "<!-- Modal -->
                                                    <div class='modal fade' id='exampleModalCenter1' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true' pre-scrollable>
                                                      <div class='modal-dialog modal-dialog-centered' role='document'>
                                                        <div class='modal-content'>
                                                          <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLongTitle'>Followers</h5>
                                                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                              <span aria-hidden='true'>&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class='modal-body'>";
                                                    if( isset($_GET['id']) ) $id = $_GET['id'];                                      
                                                $q = "SELECT ID, name, last_name, e_mail, user_photo FROM users WHERE ID IN ( SELECT ID FROM users_followers WHERE follows=" . $_GET['id'] . ")";

                                                $res = $db->query($q);

                                                if( $res->num_rows == 0 ) {
                                                    echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                                }else {
                                                    while( $r = $res->fetch_assoc() ) {
                                                            echo "<div class=col-md-6>
                                                                    <a href='users_info.php?id=" . $r['ID'] . "'><img src='" . $r['user_photo'] . "' height='55px' width='55px'></a>
                                                                </div>";
                                                            echo "<div class='col-md-6' style = 'text-decoration-color: aqua '>
                                                                    Name: " . $r['name'] . "</br>
                                                                    Last name:" . $r['last_name'] ."</br>
                                                                    E-mail: " . $r['e_mail'] . "
                                                                </div>";
                                                        echo "<hr width='100%'>";
                                                    }
                                                }
                                                    
                                                echo "</div>
                                                    </div>
                                                </div>
                                             </div>";



                                            $q = "SELECT follows FROM users_followers WHERE ID=" . $_SESSION['id'];

                                            $res = $db->query($q);

		                                    if( isset($_SESSION['id']) ) {
					                            if( $_GET['id'] != $_SESSION['id'] ) {
                                                    $f = 0;
                                                    while( $r = $res->fetch_assoc() ) {
                                                        if( $_GET['id'] == $r['follows'] ) $f = 1;
                                                    }
                                                    if( $f == 1 ) {
                                                        echo "<a href='remove_foll.php?id=" . $_GET['id'] . "' class='badge badge-info'>Unfollow</a>&nbsp";
                                                    }else {
                                                        echo "<a href='to_pending.php?id=" . $_GET['id'] . "' class='badge badge-info'>Follow</a>&nbsp";
                                                    }
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
						                            if( $_SESSION['priv'] == 1 && $_GET['id'] != $_SESSION['id'] ) {
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
                                <div  id = "pagination_data"> <!--class = "table-responsive"-->

                                </div>

                                <script>
                                $(document).ready(function(){
                                    load_data(1);
                                    function load_data(page){
                                        $.ajax({
                                            url:"pagination_user_info.php",
                                            method: "POST",
                                            data:{page:page,
                                                  id : <?php echo $id?>  },
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

                                    
                                    <?php /*
                                    	if( isset($_GET['id']) ) $id = $_GET['id'];

                                         $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                         $q = "SELECT reg_br_igr, ime, prezime, votes,pImage  FROM igrac JOIN users_votes using(reg_br_igr) WHERE ID=" . $id .  " AND active =  1 ORDER BY votes";

                                         $res = $db->query($q);

                                         if( $res->num_rows == 0 ) {
                                         	echo "<h3 style='text-align: center;color: grey'>No results</h3>";
                                         }else {
                                         	while($row = $res->fetch_assoc()){
	                                         	echo "<div class='row'>";
		                                            echo "<div class=col-md-6>
		                                            		<a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."'  style='text-align: center;' height='119px' width='91px'></a>
		                                            	</div>";
		                                            echo "<div class='col-md-6' style = 'text-decoration-color: aqua '>
		                                            		Name: " . $row['ime'] . "</br>
		                                            		Last name:" . $row['prezime'] ."</br>
		                                            		Votes: " . $row['votes'] . "
		                                            	</div>";
	                                            echo "</div>";
	                                            echo "<hr width='100%'>";
	                                         } 
                                         }  */                                                                         
                                    ?>
                                </div> 
                            </div>
                            <div class = "container">
                                <h3>Activity graph</h3>
                                <hr width="100%">
                                <?php
                                     if( isset($_GET['id']) ) {
                                        $id = $_GET['id'];
                                        $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                       
                                        $q = "SELECT COUNT(*) as ct, extract(month from voteDate) as mon
                                        from users_votes
                                        where ID = '". $id. "'
                                        GROUP BY extract(month from voteDate)
                                        LIMIT 6";
                    
                                        $res = $db->query($q);
                                        $count = 1;
                                        while( $r = $res->fetch_assoc() ) {
                                            $quantity[$count] = $r['ct'];
                                            $month[$count] = $months[$r['mon'] - 1];
                                            $count = $count + 1;
                                        }
                                        for($i = $count; $i <= 6; $i++) {
                                            $quantity[$i] = 0;
                                            $month[$i] = '';
                                        }
                                        



                                    }
                                ?>
                                <div class="container" id = "curve_chart" style="width: 100%; height: 500px; padding: 0px; margin 0px 0px;"> <!--; margin: 0px; padding: 0px; align_content: center; ">-->
                                    
                                    <script type="text/javascript">
                                            google.charts.load('current', {'packages':['corechart']});
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Month', 'Votes'],
                                                ['<?php Print($month[1]);?>',  <?php Print($quantity[1]); ?>],
                                                ['<?php Print($month[2]);?>',  <?php Print($quantity[2]); ?>],
                                                ['<?php Print($month[3]);?>',  <?php Print($quantity[3]); ?>],
                                                ['<?php Print($month[4]);?>',  <?php Print($quantity[4]); ?>],
                                                ['<?php Print($month[5]);?>',  <?php Print($quantity[5]); ?>],
                                                ['<?php Print($month[6]);?>',  <?php Print($quantity[6]); ?>],                                          
                                            ]);

                                            var options = {
                                                curveType: 'function',
                                                legend: { position: 'bottom' },
                                                vAxis : {
                                                    viewWindow:{
                                                        min:0
                                                    }
                                                }
                                            };
                                        
                                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                                        
                                            chart.draw(data, options);
                                            }
                                            </script>
                                    


                                    
                                </div>
                            </div>    
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <script type="text/javascript" src='users_info.js'></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>