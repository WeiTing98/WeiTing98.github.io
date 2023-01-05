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
    <!-- time picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <!-- drow table css  -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" type="text/css"/> -->
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
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                
                                <h1 class="fw-bolder mb-3">發布時刻表</h1>
                                <form id="timetable" action="timetable_postctrl.php" method="post">
                                    <div class="input-group input-group-lg mb-4">
                                        <span class="input-group-text">班次號碼</span>
                                        <input class="form-control readonly"  type="text" placeholder="輸入班次號碼"  id="busnum" name="timetogo" style="text-align: center;" autocomplete="off" required/>
                                        </div> 
                                    <div class="input-group input-group-lg mb-4">
                                        <!-- date range picker -->
                                        <span class="input-group-text">發車日期時間</span>
                                        <input class="form-control readonly" type="text" placeholder="選擇發車日期"  id="departureTime" name="departure" style="text-align: center" autocomplete="off" required/>
                                    </div>    
                                    <div class="input-group input-group-lg mb-4">
                                        <span class="input-group-text">發車時間</span>
                                        <input class="form-control readonly"  type="text" placeholder="輸入座位數"  id="timetogo" name="timetogo" style="text-align: center;" autocomplete="off" required/>
                                        </div> 
                                    <div class="input-group input-group-lg mb-4">
                                        <span class="input-group-text">人數</span>
                                        <input class="form-control readonly"  type="text" placeholder="輸入座位數"  id="seat" name="seat" style="text-align: center;" autocomplete="off" required/>
                                        </div> 
                                    <div class="input-group input-group-lg mb-4">
                                        <span class="input-group-text">目的地</span>
                                        <select form="timetable" name="dst" id="dst" class="form-select" aria-label="Default select example">
                                            <option value="嘉義高鐵站">嘉義高鐵站</option>
                                            <option value="民雄高鐵站">雲林高鐵站</option>
                                        </select></td></tr> 
                                        </div>
                                    
                                    <button class="btn btn-primary btn-lg" id = 'submitBtn' type="submit">發布</button>
                                </form>
                               
                            </div>
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
    <!-- timepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <!-- draw table JS -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
    <script>
        $("#departureTime").datepicker({
            dateFormat : "yy/m/d",
            minDate:0,
        })
        $('#timetogo').timepicker({
            timeFormat: 'H:mm',
            // interval: 60,
            minTime: '0',
            maxTime: '23:59',
            defaultTime: '12',
            startTime: '0:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
</body>
</html>