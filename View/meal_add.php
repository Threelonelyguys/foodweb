<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	$mealid=$_GET['i'];
?>

<html>
<head>
	<link rel="stylesheet" href="./template/web.css">
</head>
<body>
	<div  id="posit">
	<form action="./list_meal_add.php?i=<?php echo $mealid;?>" method="post">
		<input type="text" name="search" size="50">
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-search"></span> Thêm món ăn
		</button>
	 </form>
	 </div>
</body>
</html>