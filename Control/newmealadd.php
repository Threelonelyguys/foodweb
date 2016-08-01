<?php
	require_once "../model/connection.php";
	$query = "INSERT INTO `master_menu_day`(`role`) VALUES (0)";
	$result=$database->query($query);	
	$query = "SELECT Max(`mealid`) as LastID FROM `master_menu_day`";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	header("LOCATION: ../view/meal_edit.php?i=$row[LastID]");
?>