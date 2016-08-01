<?php
	require_once "../model/connection.php";
	session_start();
	
	$dishid=$_GET['i'];
	$foodid=$_GET['f'];
	$weigh=(isset($_POST['weigh']))? $_POST['weigh']:0;
	$unit=isset($_POST['unit'])? $_POST['unit']:" ";
	$query="UPDATE `master_dish_detail` SET `weigh`=$weigh,`unit`='$unit' WHERE `dishid`=$dishid && `foodid`=$foodid";
	$result=$database->query($query);
	header("LOCATION: ../view/dish_edit.php?i=$dishid");
?>