<?php
	require_once "../model/connection.php";
	
	$mealid=(isset($_GET['i']))? $_GET['i']:1;
	$query="SELECT * FROM `master_menu_meal` WHERE `mealid`=$mealid";
	$result=$database->query($query);
	$query="SELECT * FROM `master_menu_day` WHERE `mealid`=$mealid";
	$result1=$database->query($query);
	$row1=$result1->fetch_assoc();
?>