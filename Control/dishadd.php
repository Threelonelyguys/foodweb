<?php
	require_once "../model/connection.php";
	session_start();
	
	$dishid=$_GET['i'];
	$foodid=$_GET['f'];
	$weigh=(isset($_POST['weigh']))? $_POST['weigh']:0;
	$unit=isset($_POST['unit'])? $_POST['unit']:"";
	if ($weigh!=0){
		$query="INSERT INTO `master_dish_detail`(`dishid`, `foodid`, `weigh`, `unit`) VALUES ($dishid,$foodid,$weigh,'$unit')";
		$result=$database->query($query);
	} else{
		$query="INSERT INTO `master_dish_detail`(`dishid`, `foodid`) VALUES ($dishid,$foodid)";
		$result=$database->query($query);
	}
	header("LOCATION: ../view/dish_edit.php?i=$dishid");
?>