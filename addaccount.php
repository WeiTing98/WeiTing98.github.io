<?php
    session_start();
    $id = "";
    $password = "";
    $name = "";
    $email = "";
    $phone = "";
    if (isset($_POST["username"]))
        $id = $_POST["username"];
    if (isset($_POST["password"]))
        $password = $_POST["password"];
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    if (isset($_POST["name"]))
        $name = $_POST["name"];
    if (isset($_POST["phone"]))
        $phone = $_POST["phone"];
    if ($id != "" && $password != ""&& $email != ""&& $name != ""&& $phone != "") {
        $link = mysqli_connect("localhost", "root", "", "finalprojectdata")
            or die("fail connect db");
        $sql_insert = "INSERT INTO `user account` (`account`, `name`, `phone`, `email`, `password`) VALUES ('$id', '$name', '$phone', '$email', '$password')";
        $result = mysqli_query($link, $sql_insert);
        
            // echo '<script>alert("帳號已被人使用");location.href = "register.php"<script>';
        
        if (mysqli_affected_rows($link) > 0) {
            // 如果有一筆以上代表有更新
            // mysqli_insert_id可以抓到第一筆的id
            $new_id = mysqli_insert_id($link);
            echo "<script>alert('註冊成功');location.href = 'index.php'</script>";
            //header('Location:login.php');
        } elseif (mysqli_affected_rows($link) == 0) {
            echo "無資料新增";
        } else {
            echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
        }
        mysqli_close($link);
    }
    ?>
