<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/newmealadd.php";
?> 

<html>
<head>
	<link rel="stylesheet" href="./template/web.css">
</head>
<body>
	<div id='posit'>
	<form action="../control/newmealadd.php" method="post" id="search">
		<input type="text" placeholder="Thời gian" name="dishname" size="50">
		<button type="submit" class="btn btn-success">
			Thêm thực đơn
		</button>
	  </form>
	</div>
</body>
</html>