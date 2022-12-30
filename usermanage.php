<?php
session_start();
$id = "";
$password = "";
if (isset($_POST["name"]))
    $id = $_POST["name"];
if (isset($_POST["password"]))
    $password = $_POST["password"];
if ($id != "" && $password != "") {
    $link = mysqli_connect("localhost", "root", "", "finalprojectdata")
        or die("fail connect");
    mysqli_query($link, 'SET NAMES utf8');
    $sql = "SELECT * FROM `user account` WHERE password = '{$password}' AND account = '{$id}'";
    // echo $id;
    // echo $password;
    $result = mysqli_query($link, $sql);
    $total_records = mysqli_num_rows($result);
    $user = mysqli_fetch_row($result);
    if ($total_records > 0) {
        $_SESSION['id'] = $user[0];
        $_SESSION['name'] = $user[1];
        $_SESSION["login_session"] = true;
        $_SESSION['phone'] = $user[2];
        $_SESSION['email'] = $user[3];
        $_SESSION['password'] = $user[4];
        if($user[5] == 1){
            $_SESSION['admin'] = true;
        }
        else{
            $_SESSION['admin'] = false;
        }
        header("Location: index.php");
    } else {
        echo "<center><font color='red'>";
        echo "<script>alert('使用者名稱或密碼錯誤!');location.href='login.php';</script>";
        echo "</font>";
        $_SESSION["login_session"] = false;
        
    }
    // echo $_SESSION['name'];
    // echo $_SESSION['id'];
    mysqli_close($link);
}
?>
