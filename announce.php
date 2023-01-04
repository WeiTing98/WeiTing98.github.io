<?php
    session_start();
    if(!$_SESSION['admin']){
        header("Location: index.php");
        }
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
        <meta name="description" content />
        <meta name="author" content />
        <title>CCU 高鐵接駁車票預約系統-登入</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/pineapple.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- jQuery -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" type="text/css"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
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
                            <li class="nav-item"><a class="nav-link" href="logout.php">登出</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="ticket.php">訂票</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- show all announce -->
            <div class="py-5 bg-light" id="announce">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-10">
                            <div class="text-center">
                                <span class='fw-bold display-6 mb-5 '>公佈欄</span>
                                <div class="fs-4 mb-4 ">
                                <br>
                                <a href="A_edit.php?id=-1" class="fs-2">新增公告</a>
                                <br>
                                <hr size='5px' width="100%">

                                </table>
                                 <?php
                                if(count( $item)==0){
                                    echo '<div class="fs-1 text-center">無公告資料</br>';
                                }
                                foreach($item as $i){
                                    echo '<span class="fs-2 ">';echo $i['title'];echo' </span>';
                                    echo '<a href="A_edit.php?id='.$i['index'].'">編輯</a> <a href="javascript: del('.$i['index'].')">刪除</a>';
                                    echo '<div class="d-flex align-items-center justify-content-center fs-5">';
                                    echo '<p>'.$i['content'].'</p>'.'</br>'.'</div>';
                                    if(!is_null($i['lastedit'])){
                                        echo '<span class="fw-normal fs-6 float-end">最後編輯：'.$i['lastedit'].' at '.$i['date'].'</span></br>';
                                    }
                                    echo '<span class="fw-normal fs-6 float-end">發布：'.$i['author'].'</span>';
                                    echo '<hr size="5px" width="100%">';
                                    
                                }
                                ?>
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
        <!-- jQuery -->
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" ></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        function del(s){
            if(confirm("確定要刪除此筆公告?")==true){
                location.href = "A_delete.php?id="+s;
            }
        }
    </script>
    </body>
</html>
