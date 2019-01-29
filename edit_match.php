<?php
    
    $output = '';
   
    $natj = $_POST['liga'];
    $f = $_POST['gk'];
    $output .="Match: <input type='text' name='h" . $natj . "' placeholder='home'> vs <input type='text' name='aw" . $natj . "' placeholder='away'><br>
    Goals: <input type='number' name='g" . $natj . "' min='0' value='0'><br>
    Assists: <input type='number' name='a" . $natj . "' min='0' value='0'><br>";
    if( $f == 1 ) $output .= "Saves: <input type='number' name='s" . $natj . "' min='0' value='0'><br>";
    $output .= "Yellow cards: <input type='number' name='y" . $natj . "' min='0' max='2' value='0'><br>
    Red cards: <input type='number' name='r" . $natj . "' min='0' max='1' value='0'><br>
    Played: <input type='number' name='p" . $natj . "' min='0' max='1' value='0'><br>
    ";

    echo $output;