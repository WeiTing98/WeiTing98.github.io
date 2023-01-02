<?php
session_start();
if (empty($_SESSION)) {
    echo '<script>alert("請先登入!");location.href = "searching.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content />
    <meta name="author" content />
    <title>CCU 高鐵接駁車票預約系統-登入</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/pineapple.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">CCU 高鐵接駁車票預約系統</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">首頁</a></li>
                        <li class="nav-item"><a class="nav-link" href="searching.php">查詢</a></li>
                        <?php echo '<li class="nav-item"><a class="nav-link" href="userhome.php">你好,' . $_SESSION['name'] . '</a></li>'; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </main>
    <?php
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
    echo "<script>alert('訂票成功');location.href = 'index.php'</script>";


    ?>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <!-- <script src="js/scripts.js"></script> -->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
</body>

</html>