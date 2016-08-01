<?php
	require_once "../model/connection.php";
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		$dishname=$_POST['dishname'];
		$dishtype=$_POST['type'];
		$dishdetail=$_POST['detail'];
		$query = "INSERT INTO `master_dish`(`dishname`,`type`,`description`) VALUES ('$dishname','$dishtype','$dishdetail')";
		$result=$database->query($query);
		$query = "SELECT Max(`dishid`) as LastID FROM `master_dish`";
		$result=$database->query($query);
		$row=$result->fetch_assoc();
		header("LOCATION: ../view/dish_edit.php?i=$row[LastID]");
	}
?>