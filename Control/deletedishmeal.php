<?php
	require_once "../model/connection.php";
	
	$mealid=$_GET['i'];
	$dishid=$_GET['d'];
	
	$query="DELETE FROM `master_menu_meal` WHERE `mealid`=$mealid &&`dishid`=$dishid";
	$result=$database->query($query);
	header("LOCATION: ../view/meal_edit.php?i=$dishid");
?>