<?php
    require_once 'dbconnection.php';
    $title = $_POST['title'];
    $message = $_POST['message'];
    $author = "管理員Y"; //登入帳號的名子
    $index = $_POST['index'];
    // echo $title.'<br>';
    // echo $message;
    //新增
    $SQL = 'UPDATE announcement SET `title` = :title, `date` = NOW(),`content` = :message,`img` = NULL,`author` = :author WHERE `index` = :index ';
    
    $STH = $pdo->prepare($SQL);
    $STH->bindParam(':title',$title);
    $STH->bindParam(':message',$message);
    $STH->bindParam(':author',$author);
    $STH->bindParam(':index',$index);
    $STH->execute();
?>
<script>
    alert("修改完成!");
    location.href = 'announce.php';
</script>