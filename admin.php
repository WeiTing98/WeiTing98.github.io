<?php
    session_start();
    if(!$_SESSION['admin']){
    header("Location: index.php");
    }
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
                        <?php echo '<li class="nav-item"><a class="nav-link" href="admin.php">你好, 管理員'.$_SESSION['name'].'</a></li>';?>
                        <li class="nav-item"><a class="nav-link" href="logout.php">登出</a></li>
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
                        <h1 class="fw-bolder">選擇控制項</h1>    
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <!-- 區塊1 -->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">phpMyAdmin</span>
                                        
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="../../phpmyadmin">Go</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- 區塊2 -->
                        <!-- <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">修改使用者資料</span>
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="user.php">Go</a>btn-primary 為實心色--><!--</div>
                                </div>
                            </div>
                        </div> -->
                        <!-- 區塊3 -->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">                                    
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">公告系統</span>
                                    </div>                                   
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="announce.php">Go</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- 區塊4 -->
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">編輯/查看時刻表</span>
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="timetable.php">Go</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">查看班次資料</span>
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="ticket_view.php">Go</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="card mb-5 mb-xl-0">
                                <div class="card-body p-5">
                                    <div class="mb-3">
                                        <span class="display-7 fw-normal">一般使用者頁面</span>
                                    </div>
                                    <div class="d-grid"><a class="btn btn-outline-primary" href="userhome.php">Go</a></div>
                                </div>
                            </div>
                        </div>
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
</html>
