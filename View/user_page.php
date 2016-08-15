<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/userinfo.php";
?>

<html>
<body>
	<div class="main-body">
	<h2>Tài khoản: <?php echo $inforow['username'];?></h2>
	<h3>Họ và tên: <?php echo $inforow['name'];?></h3>
	<h3>Địa chỉ: <?php echo $inforow['address'];?></h3>
	<h3>Email: <?php echo $inforow['email'];?></h3>	
	</div>
</body>
</html>