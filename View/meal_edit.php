<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/mealpage.php";
?> 

<html>
<head>
	<link rel="stylesheet" href="./template/web.css">
<style>
	tr,td{
		padding: 3px;
		border: 1px solid black;
	}
</style>
</head>
<body>
	<div id='posit'>
	<?php echo "<p class='name'>Thực đơn $mealid</p><br>";
		$num=0;
		while ($row=$result->fetch_array()){
			$num++;
			$dishid=$row['dishid'];
			$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
			$result1=$database->query($query);
			$row1=$result1->fetch_array();
			echo "<div class='food_info'>";
			echo "<p class='food_page'>". $num ." <a href='./dish_page.php?i=".$row1['dishid']."'>$row1[dishname]</a></p>";
			echo "<a href='../control/deletedishmeal.php?i=$mealid&d=$dishid' class='edit'>Xóa</a><br>";
			echo "</div>";
		}
		echo "<a href='./meal_add.php?i=$mealid'>+Thêm</a></td>";
	?>
	</div>
</body>
</html>