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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css" type="text/css" />
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
                        <li class="nav-item"><a class="nav-link" href="ticket.php">訂票</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </main>
    <?php
        session_start();
        $id = "";
        $password = "";
        $name = "";
        $email = "";
        $phone = "";
        if (isset($_POST["username"]))
            $id = $_POST["username"];
        if (isset($_POST["password"]))
            $password = $_POST["password"];
        if (isset($_POST["email"]))
            $email = $_POST["email"];
        if (isset($_POST["name"]))
            $name = $_POST["name"];
        if (isset($_POST["phone"]))
            $phone = $_POST["phone"];
        if ($id != "" && $password != ""&& $email != ""&& $name != ""&& $phone != "") {
            $link = mysqli_connect("localhost", "root", "", "finalprojectdata")
                or die("fail connect db");
            $sql_insert = "INSERT INTO `user account` (`studentID`, `name`, `phone`, `email`, `password`) VALUES ('$id', '$name', '$phone', '$email', '$password')";
            $result = mysqli_query($link, $sql_insert);
            if (mysqli_affected_rows($link) > 0) {
                // 如果有一筆以上代表有更新
                // mysqli_insert_id可以抓到第一筆的id
                $new_id = mysqli_insert_id($link);
                echo "<h1>註冊成功</h1>";
                //header('Location:login.php');
            } elseif (mysqli_affected_rows($link) == 0) {
                echo "無資料新增";
            } else {
                echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
            }
            mysqli_close($link);
        }
        ?>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2022</div>
                </div>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>

</html>