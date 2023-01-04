<?php
    session_start();
    if(!$_SESSION['admin']) header("location:index.php");

    $bus = 0;
    $seat = 0;
    $busdate = '';

    



    require_once 'dbconnection.php';
    $sql = 'INSERT INTO timetable(`bus number`,`remain`,`date`) VALUE (:busNum,:seatnum,:busdate)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(":busNum",$bus);
    $sth->bindParam(":seatnum",$seat);
    $sth->bindParam(":busdate",$busdate);
?>