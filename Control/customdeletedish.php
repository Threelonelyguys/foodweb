<?php
	require_once "../model/connection.php";
	
	$dishid=$_GET['i'];
	
	$query="DELETE FROM `custom_dish` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `custom_dish_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `custom_menu_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `menu` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	
	header("LOCATION: ../view/custom_dish_show.php");
?>