<?php
    session_start();
    if(empty($_SESSION) || !$_SESSION['admin']){
        header("Location:index.php");
    }
    $busNum = 0;
    $seatnum = 0;
    $datechange = '';
    if(isset($_POST['busNum'])){
        $busNum = intval($_POST['busNum']);
    }
    if(isset($_POST['SeatNum'])){
        $seatnum = intval($_POST['SeatNum']);
    }
    if(isset($_POST['DateChange'])){
        $datechange = strval($_POST['DateChange']);
    }

    require_once 'dbconnection.php';
    if($datechange=='') $sql = 'UPDATE timetable SET `remain`=:seatnum  WHERE `bus number` = :busnum ';
    else $sql = 'UPDATE timetable SET `remain`=:seatnum, `date`=:datechange  WHERE `bus number` = :busnum ' ;
    $sth = $pdo->prepare($sql);
    if($datechange!='') $sth->bindParam(":datechange",$datechange);
    $sth->bindParam(':seatnum',$seatnum);
    $sth->bindParam(":busnum",$busNum);
    $sth->execute();

    // echo 'bus'.$busNum;
    // echo '<br>';
    // echo 'seat'.$seatnum;
    // echo '<br>';
    // echo $datechange;
    // echo '<br>';
?>
<script>
    alert("變更完成!");
    location.href="timetable_edit.php";
</script>

<!-- busNum=2   DateChange=2023%2F01%2F14   SeatNum=52 -->