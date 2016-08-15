<?php
	require_once "../model/connection.php";
	
	$dishid=$_GET['i'];
	$query="SELECT * FROM `custom_dish` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$foodname=$row['foodname'];
	$createfood=$row['createfood'];
	$query="SELECT * FROM `custom_dish_detail` WHERE `dishid`=$dishid";
	$result=$database->query($query);
	
?>