<?php
    session_start();
    if(!$_SESSION['admin']){
    header("Location: index.php");
    }
    require_once 'dbconnection.php';
    $index = $_GET['id'];
    //刪除
    $SQL = 'DELETE FROM announcement WHERE `index` = :id';
    $STH = $pdo->prepare($SQL);
    $STH->bindParam(':id',$index);
    $STH->execute();
?>
<script>
    alert("刪除完成!");
    location.href = 'announce.php';
</script>