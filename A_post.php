<?php
    session_start();
    if(!$_SESSION['admin']){
        header("Location: index.php");
    }
    require_once 'dbconnection.php';
    $title = $_POST['title'];
    $message = $_POST['message'];
    $author = $_SESSION['name']; //登入帳號的名子
    // echo $title.'<br>';
    // echo $message;
    //新增
    $SQL = 'INSERT INTO announcement(`title`, `date`,`content`,`img`,`author`) 
    VALUES ( :title ,NOW() ,:message, NULL, :author)';
    $STH = $pdo->prepare($SQL);
    $STH->bindParam(':title',$title);
    $STH->bindParam(':message',$message);
    $STH->bindParam(':author',$author);
    $STH->execute();
?>
<script>
    alert("新增完成!");
    location.href = 'announce.php';
</script>