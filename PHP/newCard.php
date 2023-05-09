<?php require_once 'dbConnection.php';
    $user = $_GET['user'];
    //update valuta database
    //pesca carta dal database
    date_default_timezone_set('Europe/Rome');
    $d = localTime(null, true);
    $h = $d['tm_hour'];
    echo"nuova carta di $user \n sono le ".$h;
?>