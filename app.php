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
    </head>
    <body style="background-color: #e6ffff">
        <?php 
            if( $_SESSION['gen'] == 'M' ) echo "<div class='container-fluid' style='background-color: #33ccff; height:100px; text-align: right'>
                    <table>
                        <tr> <td width='85%' style='text-align: center; padding: 20px'><h1>Welcome to the site about football players</h1></td> 
                            <td style='text-align: right; padding: 20px'><p>Dobrodosao " . $_SESSION['user'] . "!  <button type='button' class='btn btn-primary btn-sm'><a href='logout.php' style='text-decoration: none;color: black'>LogOut</a></button></p></td> 
                        </tr>
                    </table>
                </div>";
            else echo "<div class='container-fluid' style='background-color: #33ccff; height:100px;'>
                    <table>
                        <tr> <td width='85%' style='text-align: center; padding: 20px'><h1>Welcome to the site about football players</h1></td> 
                            <td style='text-align: right; padding: 20px'><p>Dobrodosla " . $_SESSION['user'] . "!  <button type='button' class='btn btn-primary btn-sm'><a href='logout.php' style='text-decoration: none;color: black'>LogOut</a></button></p></td> 
                        </tr>
                    </table>
                </div>"; 
        ?>
        <div class="container" style="background-color: white;">
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

        <script type="text/javascript" src="./app.js"></script>
    </body>
</html>