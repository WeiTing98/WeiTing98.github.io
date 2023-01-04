<?php
    session_start();
    if(empty($_SESSION) || !$_SESSION['admin']){
        header("Location:index.php");
    }
    $id = 0;
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    }
    require_once 'dbconnection.php';
    $sqlanc = 'DELETE FROM `timetable` WHERE `bus number` = :id ';
    $data = $pdo->prepare($sqlanc);
    $data->bindParam(':id',$id);
    $data->execute();
    
    // search ticket query all.
    $sqlanc2 = 'DELETE FROM `ticket record` WHERE `bus number` = :id ';
    $data2 = $pdo->prepare($sqlanc2);
    $data2->bindParam(':id',$id);
    $data2->execute();
    
?>
<script>
    alert("刪除完成!");
    location.href = 'timetable_edit.php';
</script>