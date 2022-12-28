<?php
    require_once 'dbconnection.php';
    $sqlanc = 'SELECT * FROM `announcement` ORDER BY `index` DESC';
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
        <!-- jQuery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" type="text/css"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
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
                        <li class="nav-item"><a class="nav-link" href="login.php">登入</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="ticket.php">訂票</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">CCU高鐵接駁車票預約系統</h1>
                                <p class="lead fw-normal text-white-50 mb-4">本網頁可以查詢班表、訂位狀態以及訂位</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <!-- <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#announce">公佈欄</a> -->
                                    <!-- <a class="btn btn-outline-light btn-lg px-4" href="#!">公告</a> -->
                                </div>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div> -->
                    <!-- </div> -->
                </div>
            </header>
            <!-- Testimonial section-->
            <div class="py-5 bg-light" id="announce">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <span class='fw-bold display-6 mb-5'>公佈欄</span>
                                <div class="fs-4 mb-4 ">
                                <br>
                                <hr size='5px' width="100%">
                                <?php
                                $index = 0;
                                foreach($item as $i){
                                    if($index==5)break;
                                    echo '<span class="fs-2 ">';echo $i['title'];echo'</span>';
                                    echo '<div class="d-flex align-items-center justify-content-center fs-5">';
                                    echo '<p>'.$i['content'].'</p>'.'</br>'.'</div>';
                                    // echo '<div class="fw-normal justify-content-sm-end">';
                                    if(!is_null($i['img'] )){
                                        echo '<figure class="mb-4"><img class="img-fluid rounded" src="' .$i['img']. '" /></figure>';
                                    }
                                    echo '<span class="fw-normal fs-6 float-end">發布：'.$i['author'].'</span>';
                                    echo '<hr size="5px" width="100%">';
                                    $index++;
                                }
                                ?>
                                <!-- <figure class="mb-4"><img class="img-fluid rounded" src="" alt="..." /></figure> -->
                                <!-- <span><a class ="fs-5" id='more' >Show More</a></span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" ></script>
</html>