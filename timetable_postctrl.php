<?php
    session_start();
    if(!$_SESSION['admin']) header("location:index.php");
    $bus = 0;
    $seat = 0;
    $busdate = '';
    $bustimr = '';
    $dst = '';
    if(isset($_POST['departureTime'])){
        
    }
    if(isset($_POST['timetogo'])){

    }
    if(isset($_POST['seat'])){

    }
    if(isset($_POST['dst'])){

    }
    // date('Y-m-d H:i:s', strtotime("$date $time"));

    require_once 'dbconnection.php';
    $sql = 'INSERT INTO timetable(`bus number`,`remain`,`date`) VALUE (:busNum,:seatnum,:busdate)';
    $sth = $pdo->prepare($sql);
    $sth->bindParam(":busNum",$bus);
    $sth->bindParam(":seatnum",$seat);
    $sth->bindParam(":busdate",$busdate);
?>

busnum departureTime    timetogo   seat=60   dst=嘉義高鐵站

not yet finished