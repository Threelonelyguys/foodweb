<?php	
	require_once "../model/connection.php";
	
	$query="SELECT * FROM `custom_dish_detail` WHERE `dishid`=$dishid && `foodid`=$foodid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$weigh=$row['weigh'];
	$unit=$row['unit'];
	$query="SELECT * FROM `foods` WHERE `foodid`=$foodid";
	$find_in_foods=$database->query($query);
?>