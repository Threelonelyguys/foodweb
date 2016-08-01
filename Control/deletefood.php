<?php
	require_once "../model/connection.php";
	
	$dishid=$_GET['i'];
	$foodid=$_GET['f'];
	
	$query="DELETE FROM `master_dish_detail` WHERE `dishid`=$dishid &&`foodid`=$foodid";
	$result=$database->query($query);
	header("LOCATION: ../view/dish_edit.php?i=$dishid");
?>