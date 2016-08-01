<?php
	$mealid=(isset($_GET['i']))? $_GET['i']:1;
	$query="SELECT * FROM `master_menu_meal` WHERE `mealid`=$mealid";
	$result=$database->query($query);
	$query="SELECT * FROM `master_menu_day` WHERE `mealid`=$mealid";
	$result1=$database->query($query);
	$row1=$result1->fetch_assoc();
	echo "<h4>Thực đơn $mealid</h4>";
	$num=0;
	while ($row=$result->fetch_array()){
		$num++;
		$dishid=$row['dishid'];
		$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
		$result1=$database->query($query);
		$row1=$result1->fetch_array();
		echo "<p class='food_page'>". $num ." <a href='./dish_page.php?i=".$row1['dishid']."'>$row1[dishname]</a></p><br>";
	}
?>