<?php
    session_start();
    if(empty($_SESSION) || !$_SESSION['admin']){
        header("Location:index.php");
    }
    $id = 0;
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    }
    require_once 'dbconnection.php';
    $sqlanc = 'SELECT * FROM `timetable` WHERE `bus number`=:id ORDER BY `bus number` DESC';
    $data = $pdo->prepare($sqlanc);
    $data->bindParam(':id',$id);
    $data->execute();
    $item = $data->fetchAll();
    
    // search ticket query all.
    $sqlanc2 = 'SELECT * FROM `ticket record` WHERE `bus number`=:id ';
    $data2 = $pdo->prepare($sqlanc2);
    $data2->bindParam(':id',$id);
    $data2->execute();
    $item_for_ticket = $data2->fetchAll();
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
                        <!-- <div class="col-lg-8 col-xxl-6"> -->
                            <div class="text-center my-5">
                                
                                <h1 class="fw-bolder mb-3">編輯第<?php echo $id?>車次</h1>
                                <form id="bus" action="timetable_update1.php" method="post"> 
                                    
                                    <div class="mb-4"><!-- id = bus number -->
                                        <input type="hidden" name="busNum" id="<?php echo $id?>" value="<?php echo $id?>"/>
                                        
                                        <br>
                                        <table id="EditTable" class="display table table-light">
                                            <thead>
                                                <tr>
                                                    <th>班次</th>
                                                    <th>更改日期</th>
                                                    <th>更改剩餘座位</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <?php 
                                                    foreach($item as $i){
                                                        echo "<tr class='table-light'>";
                                                        echo "<td class='table-light'>".$i['bus number']."</td>";
                                                        echo '<td class="table-light"><input class="form-control" type="text" placeholder="更改日期,目前日期為'.$i['date'].'"  id="DateChange" name="DateChange" style="text-align: center"  autocomplete="off"/></td>';
                                                        echo "<td class='table-light'>";
                                                        echo '<select form="bus" name="SeatNum" id="SeatNum" class="form-select" aria-label="Default select example">';
                                                        for($j=60;$j>=0;$j--){echo '<option value="'.$j.'">'.$j.'</option>';}
                                                        echo "</select></td></tr>";   
                                                    }
                                    
                                                ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary btn-lg" id = 'submitBtn' type="submit">確認</button><br>
                                    </form> 
                                        </table>
                                        <h2>以下是本班次乘客資料</h2>
                                        <!-- 乘客資料之刪除、退費狀態以ajax送出程序 -->
                                        <table id="EditTable_All" class="display table table-light">
                                            <thead>
                                                <tr>
                                                    <th>帳號</th>
                                                    <th>姓名</th>
                                                    <th>付款狀態</th>
                                                    <th>退款</th>
                                                    <th>刪除</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($item_for_ticket as $i){
                                                        echo "<tr class='table-light'>";
                                                        echo "<td class='table-light'>".$i['account']."</td>";
                                                        echo '<td class="table-light">'.$i['name'].'</td>';
                                                        if($i['state']==1){
                                                            echo "<td class='table-light'>已付款</td>";
                                                        }
                                                        else if ($i['state']==0){
                                                            echo "<td class='table-light'>未付款</td>";
                                                        }
                                                        
                                                        if($i['applyrefund']==1){
                                                            if($i['refunded']==1)
                                                                echo "<td class='table-light' >已退款</td>";
                                                            else
                                                                echo "<td class='table-light' >申請退款中</td>";
                                                        }
                                                        else echo "<td class='table-light' >無</td>";
                                                        echo "<td class='table-light' ><a href='javascript: delticket(".$i['bus number'].",".$i['account'].")'>刪除</a></td>";
                                                        echo "</tr>";   
                                                    }
                                                    
                                                ?>
                                            </tbody>

                                        </table>
                                          
                            </div>
                        </div>
                    <!-- </div> -->
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
    <script>
        $("#DateChange").datepicker({
            dateFormat : 'yy/mm/dd',
            minDate:0,
            // maxDate:"+1m",    
        });
        function delticket(bus ,account){
            confirm("確定要刪除此乘客?");
            location.href = "tr_d.php?id="+bus+"name="+account;
        };
    </script>
</body>
</html>