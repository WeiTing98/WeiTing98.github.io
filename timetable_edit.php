<?php
    session_start();
    if(!$_SESSION['admin']){
        header("Location: index.php");
        }
    require_once 'dbconnection.php';
    $sqlanc = 'SELECT * FROM `timetable` ORDER BY `bus number` DESC';
    $data = $pdo->prepare($sqlanc);
    $data->execute();
    $item = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CCU 高鐵接駁車票預約系統</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/pineapple.png">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet">
    <!-- drow table css  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" type="text/css"/>
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
                        <?php echo '<li class="nav-item"><a class="nav-link" href="admin.php">你好, 管理員'.$_SESSION['name'].'</a></li>';?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <div class="fs-3 text-center">時刻表</div>
                    <table id="ShowTimetable" class="display ">
                
                        <thead>
                            <tr>
                                <th>班次</th>
                                <th>日期/時間</th>
                                <th>剩餘座位</th>
                                <th>目的地</th>
                                <th>控制</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($item as $i){
                                    if($i['dst']=="嘉義高鐵站"){
                                        $color = 'rgb(22, 176, 9)';
                                    }
                                    else $color = '	#436EEE';
                                    echo "<tr>";
                                    echo "<td>".$i['bus number']."</td><td>".$i['date']."</td><td>".$i['remain']."</td>";
                                    echo "<td style='color:".$color.";'>".$i['dst']."</td>";
                                    echo "<td><a id = '".$i['bus number']."' href='timetable_update.php?id=".$i['bus number']."'>編輯</a>/<a href='javascript: del(".$i['bus number'].")'>刪除</a></td>";
                                    echo "</tr>";
                                }
                
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        </header>
        
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright © Your Website 2022</div></div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">·</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">·</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" ></script>
    <!-- draw table JS -->
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#ShowTimetable').DataTable();
        } );
        function del(s){
            if(confirm("確定要刪除此筆車次資料?")==true){
                location.href = "timetable_del.php?id="+s;
            }
        }
    </script>
</body>
</html>