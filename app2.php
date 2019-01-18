<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Player statistics</title>

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="./startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="./startbootstrap-one-page-wonder-gh-pages/css/one-page-wonder.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Player statistics</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="signup.html">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="" style = "margin-top: 150px;">
      <div class="masthead-content">
        <div class="container">
            <h2 style = "text-align:center">Best goals of the week</h2>
            <?php
                $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');

                $q = "SELECT link FROM goal_of_the_week";

                $res = $db->query($q);

                while( $r = $res->fetch_assoc() ) $link = $r['link'];

                echo "<iframe  id='frame' width = 100% height='400' src=" . $link . " frameborder='1' allow='autoplay; encrypted-media' allowfullscreen></iframe>";
                //za autoplay na videu dodat tocno poslje linka   "?autoplay=1"
            ?>
        </div>
      </div>
</div>

    <section>
        <div class="container" style="margin-top: 80px">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
            
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, br_gol, pImage FROM igrac ORDER BY br_gol desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                        $res = $db->query($q);
                                        $flag = 0;
                                        while($row = $res->fetch_assoc()){
                                            if (!$flag) {
                                                echo '
                                                <div class="item active">
                                                    <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                                    <div class="carousel-caption">
                                                      <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                                      <p>'.$row["br_gol"].' Goals</p>
                                                    </div>
                                                </div>';
                                                $flag = 1;
                                            } 
                                            else {
                                                echo '
                                                <div class="item">
                                                    <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                                    <div class="carousel-caption">
                                                      <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                                      <p>'.$row["br_gol"].' Goals</p>
                                                    </div>
                                                </div>';
                                            }
                                            /*
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                                            echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_gol'] . "</td>";
                                            */
                                        }
                                                                                                                    
                                ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Top 5 in goals</h2>
                        <p>Who scored the most? Who has the besto goalkeaper? At the end of the day, number don't lie</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
      <div class="container" style="margin-top:80px">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
                  <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                            <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel1" data-slide-to="1"></li>
                            <li data-target="#myCarousel1" data-slide-to="2"></li>
                            <li data-target="#myCarousel1" data-slide-to="3"></li>
                            <li data-target="#myCarousel1" data-slide-to="4"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php 
                                        $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                                        $q = "SELECT reg_br_igr, ime, prezime, br_asist, pImage FROM igrac ORDER BY br_asist desc LIMIT 5 "; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                                        //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                                        $res = $db->query($q);
                                        $flag = 0;
                                        while($row = $res->fetch_assoc()){
                                            if (!$flag) {
                                                echo '
                                                <div class="item active">
                                                    <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                                    <div class="carousel-caption">
                                                      <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                                      <p>'.$row["br_asist"].' Assists</p>
                                                    </div>
                                                </div>';
                                                $flag = 1;
                                            } 
                                            else {
                                                echo '
                                                <div class="item">
                                                    <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                                    <div class="carousel-caption">
                                                      <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                                      <p>'.$row["br_asist"].' Assists</p>
                                                    </div>
                                                </div>';
                                            }
                                            /*
                                            echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                                            echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_gol'] . "</td>";
                                            */
                                        }
                                                                                                                    
                                ?>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                            </a>
                        </div>
                </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Top 5 in assists</h2>
              <p>All your favorite players and their statistic at one place!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container" style="margin-top:80px">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel2" data-slide-to="1"></li>
                <li data-target="#myCarousel2" data-slide-to="2"></li>
                <li data-target="#myCarousel2" data-slide-to="3"></li>
                <li data-target="#myCarousel2" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <?php 
                    $db = new mysqli('127.0.0.1', 'root', '', 'player_stats');                                        
                    $q = "SELECT reg_br_igr, ime, prezime, br_obrane, pImage FROM igrac WHERE pozicija_id = 'GK' ORDER BY br_obrane desc LIMIT 5"; //. $_SESSION['id'];//romano ja ne znam zasto si ti ovo stavljao..ali ne radi s tim
                    //rep. => to je za usera spremam mu id u sesiju jer npr. svaki user ima razlicite igrace u favoritima pa da ih mogu hvatat
                    $res = $db->query($q);
                    $flag = 0;
                    while($row = $res->fetch_assoc()){
                        if (!$flag) {
                            echo '
                            <div class="item active">
                                <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                <div class="carousel-caption">
                                  <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                  <p>'.$row["br_obrane"].' Saves</p>
                                </div>
                            </div>';
                            $flag = 1;
                        } 
                        else {
                            echo '
                            <div class="item">
                                <img src="'.$row["pImage"].'" style="width:100%; height: 303.24px">
                                <div class="carousel-caption">
                                  <h3>'.$row["ime"].' '.$row["prezime"].'</h3>
                                  <p>'.$row["br_obrane"].' Saves</p>
                                </div>
                            </div>';
                        }
                        /*
                        echo "<tr><td><a href='player.php?id=" . $row['reg_br_igr'] . "'><img src='".$row['pImage']."' style='text-align: center;' height='55px' width='55px'></a></td>";
                        echo "<td style = 'text-decoration-color: aqua '>" . $row['ime'] . " " . $row['prezime'] ."</td><td>" . $row['br_gol'] . "</td>";
                        */
                    }                                                                                                  
                  ?>
              </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">Top 5 in saves</h2>
              <p>Vote for players and help them enter team of the week</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
      
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="./startbootstrap-one-page-wonder-gh-pages/vendor/jquery/jquery.min.js"></script>
    <script src="./startbootstrap-one-page-wonder-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
