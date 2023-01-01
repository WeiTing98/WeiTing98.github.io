<?php
    session_start();
    session_name();
    require_once 'dbconnection.php';
    //$SQL = 'UPDATE `user account` SET  WHERE `index` = :index ';
    
    // $STH = $pdo->prepare($SQL);
    // $STH->bindParam(':title',$title);
    // $STH->bindParam(':message',$message);
    // $STH->bindParam(':author',$author);
    // $STH->bindParam(':index',$index);
    // $STH->execute();
    if (isset($_POST["oldpassword"]))
        $oldpassword = $_POST["oldpassword"];
    if (isset($_POST["newpassword"]))
        $newpassword = $_POST["newpassword"];
    if (isset($_POST["checkpassword"]))
        $checkpassword = $_POST["checkpassword"];
    if (isset($_POST["email"]))
        $email = $_POST["email"];
    if (isset($_POST["name"]))
        $name = $_POST["name"];
    if (isset($_POST["phone"]))
        $phone = $_POST["phone"];
    echo $_SESSION["password"]. ' '. $newpassword .' ' . $oldpassword .' ' . $checkpassword;

    if ($checkpassword == $newpassword && $oldpassword == $_SESSION["password"]) {
        $SQL = 'UPDATE `user account` SET `password` = :password , `email` = :email,`name` = :name ,`phone` = :phone WHERE `account` = :account ';
    
        $STH = $pdo->prepare($SQL);
        $STH->bindParam(':account', $_SESSION["id"]);
        $STH->bindParam(':password',$newpassword);
        $STH->bindParam(':email',$email);
        $STH->bindParam(':name',$name);
        $STH->bindParam(':phone',$phone);
        $STH->execute();
        $_SESSION["password"]=$newpassword;
        $_SESSION["email"]=$email;
        $_SESSION["name"]=$name;
        $_SESSION["phone"]=$phone;
        echo "<script>alert('修改成功');location.href = 'index.php'</script>";

    }
    else {
        //echo "<script>alert('資料錯誤');location.href = 'user.php'</script>";
        echo "<br/> error";
    }
?>




