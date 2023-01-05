<?php
	session_start();
	if(empty($_SESSION))header("location=index.php");

	require_once '../../dbconnection.php';
	$serial = 0;
	if(isset($_GET)){
		$serial = $_GET['serial'];
	}
	$sql = 'SELECT * FROM `ticket record` WHERE `serial`=:serial';
	$sth = $pdo->prepare($sql);
	$sth ->bindParam(":serial", $serial);
	$sth->execute();

	$ticket = $sth->fetchAll();
?>
<!DOCTYPE html>
<html lang="zh-TW" >
<head>
  <meta charset="UTF-8">
  <title>高鐵接駁車票</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

	<div class="ticket basic">
	</div>

	<div class="ticket airline">
		<div class="top" style="<?php if($ticket[0]['dst']=="嘉義高鐵站") echo 'background:rgb(22, 176, 9)';?>;">
			<h1>boarding pass</h1>
			<div class="big">
				<p class="from">CCU</p>
				<p class="to"><i class="fas fa-arrow-right"></i> HSR</p>
			</div>
			<div class="top--side">
				<i class="fas fa-bus"></i>
				<?php 
					$location = "雲林";
					if ($ticket[0]['dst']=="嘉義高鐵站"){
						$location = "嘉義";
					}
					echo "<p>".$location."</p>";
				?>
				
				<p>高鐵站</p>
			</div>
		</div>
		<div class="bottom">
			<div class="column">
				<div class="row row-1">
					<p><span>車次</span><?php echo $ticket[0]['bus number']?></p>
					<p class="row--right"><span>乘車處</span>活中旁公車亭</p>
				</div>
				<div class="row row-2">
					<?php
						$boarding = "13:20";
					?>
					<p><span>上車時間</span><?php echo date("H:i",strtotime($ticket[0]['bus time']."-10 min")); ?></p>
					<p class="row--center"><span>發車</span><?php echo $ticket[0]['bus date']."<br>".date("H:i",strtotime($ticket[0]['bus time'])); ?></p>
					<p class="row--right"><span>預計抵達</span><?php echo date("H:i",strtotime($ticket[0]['bus time']."+1 hour"))?> PM</p>
				</div>
				<div class="row row-3">
					<p><span>乘客姓名</span><?php echo $ticket[0]['name']?></p>
					<!-- <p class="row--center"><span>Seat</span>11E</p> -->
					<p class="row--right"><span>繳費狀態</span><?php if($ticket[0]['state']==1) echo '已繳費';else echo '未繳費';?></p>
				</div>
			</div>
			<div class="bar--code"></div>
		</div>
	</div>

	<div class="info">
		<a href="../../myBooking.php">回我的票卷</a> 

</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
