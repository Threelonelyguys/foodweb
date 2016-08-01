<?php
	require_once "../model/connection.php";
	session_start();
	
	$mealid=$_GET['i'];
	$dishid=$_GET['d'];
	$query="INSERT INTO `master_menu_meal`(`mealid`, `dishid`) VALUES ($mealid,$dishid)";
	$result=$database->query($query);
	header("LOCATION: ../view/meal_edit.php?i=$mealid");
?>