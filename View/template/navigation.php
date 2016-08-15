<?php
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	require_once "../model/connection.php";
	require_once "../config/config.php";
	require_once "../control/userinfo.php";
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<html>
<style>
	#search{
		position:absolute;
		left:45%;
		top:20%;
	}
</style>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header"> 
			<a class="navbar-brand" href="./index.php" style="color:white">3 thằng tự kỷ</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="menu">
		<ul class="nav navbar-nav">
			<li>
				<a id="dLabel" type="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Thông tin dinh dưỡng
				</a>
				<ul class="dropdown-menu" aria-labelledby="dLabel">
					<li><a href="./food_nutrient.php">Thông tin thực phẩm</a></li>
					<li><a href="./dish_show.php">Thông tin món ăn</a></li>
				</ul>
			</li>
			<li>
				<a id="dLabel" type="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Thực đơn của bạn
				</a>
				<ul class="dropdown-menu" aria-labelledby="dLabel">
					<li><a href="./menu_show.php">Thực đơn hôm nay</a></li>
					<li><a href="./menu_show_week.php">Thực đơn tuần này</a></li>
					<?php if (isset($_SESSION['userid']))
						echo "<li><a href='./custom_dish_show.php'>Món ăn của bạn</a></li>";?>
				 </ul>
			</li>
			<li><a href="./menu_create.php">Tạo thực đơn</a></li>
			<li><a href="./document.php">Tham khảo</a></li>
			<li><a href="./contact.php">Liên lạc</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<form action="./search.php" method="post" class="form-inline" role="form" style="margin-top:3%">
					<div class="form-group">
					<div class="input-group">
						<input type="text" placeholder="Tìm kiếm" name="search" class="form-control" <?php if (isset($_POST['search'])) echo "value='$_POST[search]'";?>>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					</div>
					</div>
				</form>
			</li>
			<?php 
				if (!isset($_SESSION['userid'])){
					echo "<li><a href='./sig_in.php' style='color:white'><span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a></li>";
					echo "<li><a href='./register.php' style='color:white'><span class='glyphicon glyphicon-log-in'></span> Đăng ký</a></li>";
				} else{
					echo "<li><a href='./user_page.php' style='color:white'><span class='glyphicon glyphicon-log-in'></span> ". $username."</a></li>";
					echo "<li><a href='../user/logout.php' style='color:white'><span class='glyphicon glyphicon-log-in'></span> Đăng xuất</a></li>";
				}
			?>
		</ul>
		</div>
	</div>
	</nav>
</body>
</html>