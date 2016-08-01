<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
?>

<html>
<body>
	<div class="main-body">
	<h2>Tài khoản: <?php echo $row['username'];?></h2>
	<h3>Họ và tên: <?php echo $row['name'];?></h3>
	<h3>Địa chỉ: <?php echo $row['address'];?></h3>
	<h3>Email: <?php echo $row['email'];?></h3>	
	</div>
</body>
</html>