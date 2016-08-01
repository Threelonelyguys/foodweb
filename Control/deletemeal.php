<?php
	require_once "../model/connection.php";
	
	$mealid=$_GET['i'];
	
	$query="DELETE FROM `master_menu_day` WHERE `mealid`=$mealid";
	$result=$database->query($query);
	$query="DELETE FROM `master_menu_meal` WHERE `mealid`=$mealid";
	$result=$database->query($query);
	header("LOCATION: ../view/meal_show.php");
?>