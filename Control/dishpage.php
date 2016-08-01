<?php
	require_once "../model/connection.php";
	
	$dishid=$_GET['i'];
	$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$dishname=$row['dishname'];
	$dishtype=$row['type'];
	$dishdetail=$row['description'];
	$dishimage=$row['image'];
	$query="SELECT * FROM `master_dish_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	
?>