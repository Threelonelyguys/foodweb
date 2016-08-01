<?php
	require_once "../model/connection.php";
	
	$dishid=$_GET['i'];
	
	$query="DELETE FROM `master_dish` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `master_dish_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `master_menu_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$query="DELETE FROM `menu` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	
	header("LOCATION: ../view/dish_show.php");
?>