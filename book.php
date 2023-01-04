<?php
session_start();
if (empty($_SESSION)) {
    echo '<script>alert("請先登入!");location.href = "login.php";</script>';
}
else{
require_once 'dbconnection.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
}
$sql = "SELECT * FROM timetable WHERE `bus number` = :id";
$sth = $pdo->prepare($sql);
$sth->bindParam(':id', $id);
$sth->execute();
$item = $sth->fetch();
//var_dump($item);
$remain = $item['remain'] - 1;
$busdata = $item["date"];
//var_dump($remain);
$SQL = 'UPDATE `timetable` SET `remain` = :remain WHERE `bus number` = :id ';
$STH = $pdo->prepare($SQL);
$STH->bindParam(':id', $id);
$STH->bindParam(':remain', $remain);
$STH->execute();
$price =100;
$state = 'Not Paid';
$applyrefund = 0;
$refunded = 0;
# 設定時區
date_default_timezone_set('Asia/Taipei');
$SQL = 'INSERT INTO `ticket record` (`account`, `price`, `bus date`, `timestamp`, `state`, `applyrefund`, `refunded`) 
VALUES ( :account, :price , :busdata , NOW() , :state , :applyrefund, :refunded )';
$STH = $pdo->prepare($SQL);
$STH->bindParam(':account',$_SESSION["id"]);
$STH->bindParam(':price',$price);
$STH->bindParam(':busdata',$busdata);
$STH->bindParam(':state',$state);
$STH->bindParam(':applyrefund',$applyrefund);
$STH->bindParam(':refunded',$refunded);
$STH->execute();
# 取得日期與時間（新時區）
//$timestamp = date('Y-m-d H:i:s');
// $sql = "INSERT INTO `articles`
// (`title`, `info`, `date`, `content`, `cate_id`)
// VALUES(?, ?, ?, ?, ?)";
// $sth = $db->prepare($sql);
// $values = [
//     $_POST['title'],
//     $_POST['info'],
//     $_POST['date'],
//     $_POST['content'],
//     $_POST['cate_id'],
// ];
// $sth->execute($values);
echo "<script>alert('訂票成功');location.href = 'myBooking.php'</script>";

}
?>
    