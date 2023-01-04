<?php
    session_start();
    require_once 'dbconnection.php';
    $from = 0;
    $to = 0;
    $availableSeat = false;
    if(!is_null($_GET['FromDate'])&&!is_null($_GET['ToDate'])){
        $from = $_GET['FromDate'];
        $to = $_GET['ToDate'];
    }
    if(count($_GET)==3){
        $availableSeat = true;
    }   
    $fd = date("Y-m-d",strtotime($from));
    $td = date("Y-m-d",strtotime($to));
    $sqlanc = sprintf('SELECT * FROM `timetable` WHERE `date` BETWEEN \'%s\' AND \'%s\' ORDER BY `date`',$fd,$td);
    $data = $pdo->prepare($sqlanc);
    $data->execute();
    $item = $data->fetchAll();
?>
<!DOCTYPE html>
<html lang="zh-TW">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CCU 高鐵接駁車票預約系統</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pineapple.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
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
                        <?php 
                            if (empty($_SESSION)){
                                echo '<li class="nav-item"><a class="nav-link" href="login.php">登入</a></li>';
                            }
                            else{
                                
                                if($_SESSION['admin']){
                                    echo '<li class="nav-item"><a class="nav-link" href="admin.php">你好, 管理員'.$_SESSION['name'].'</a></li>';
                                }else{
                                    echo '<li class="nav-item"><a class="nav-link" href="userhome.php">你好, '.$_SESSION['name'].'</a></li>';
                                }
                                echo '<li class="nav-item"><a class="nav-link" href="logout.php">登出</a></li>';
                            }
                        ?>
                        <!-- <li class="nav-item"><a class="nav-link" href="login.php">登入</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="ticket.php">訂票</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Pricing section-->
            <section class="bg-light py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">預訂座位</h1>
                        <p class="lead fw-normal text-muted mb-0">以下為您所查詢的日期區間：<?php echo $from." 至 ".$to?></p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <!-- Pricing card free-->
                        <!-- <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5"> -->
                                    <?php
                                        if(count($item)==0){
                                            echo '<div class="fs-1 text-center">查無資料</br><a class="fs-5" href=searching.php>回上頁</a></div>';
                                        }
                                        $c = 0;
                                        foreach($item as $i){
                                            if ($availableSeat){
                                                if($i['remain']==0){
                                                    continue;
                                                }
                                            }
                                            $c+=1;
                                            $date = date("Y/m/d D H:i",strtotime( $i['date']));
                                            $state = "可預訂";
                                            $s = "預定";
                                            $able = "";
                                            if($i['remain']==0){
                                                $state = "不可預訂";
                                                $s = "不可預定";
                                                $able = 'pointer-events: none;opacity:0.5';
                                            }
                                            if($i['dst']=="嘉義高鐵站"){
                                                $color = 'rgb(22, 176, 9)';
                                            }
                                            else $color = '	#436EEE';
                                            echo "<div class='col-lg-6 col-xl-4'>
                                                <div class='card mb-5 mb-xl-0'>
                                                <div class='card-body p-5'>";
                                            echo "<div class='small text-uppercase fw-bold text-muted'>班次".$i['bus number']."</div>
                                            <div class='mb-3'>
                                                <span class='display-6 fw-bold'>".$date."</span>
                                                <br>
                                                <span class='display-8 fw-bold' style='color:".$color.";'>Dst. ".$i['dst']."</span>
                                                <br>
                                                <span class='text-muted'>".$state.",剩餘".$i['remain']."個座位</span>
                                            </div>";
                                            echo '<div class="d-grid"><a class="btn btn-outline-primary dis" href = "javascript: booking('.$i['bus number'].')" id = "'.$i['bus number'],'" style="'.$able. '" >'.$s.'</a></div>';
                                            echo '</div></div></div>';
                                        }
                                        if($c == 0){
                                            echo '<div class="fs-1 text-center">查無資料</br><a class="fs-5" href=searching.php>回上頁</a></div>';
                                        }
                                    ?>
                        <!-- Pricing card enterprise-->
                        <!-- <div class="col-lg-6 col-xl-4">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="small text-uppercase fw-bold text-muted">班次3</div>
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold">2022/12/16</span>
                                        <span class="text-muted">可預訂</span>
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="#!">預定</a></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>
            function booking(bus){
                if(confirm("確定要預訂本車次嗎?"))
                    location.href="book.php?id="+bus;
            }
        </script>
    </body>
</html>
