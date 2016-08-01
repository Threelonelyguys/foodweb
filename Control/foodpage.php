<?php
	require_once "../model/connection.php";
	
	$foodid=(isset($_GET['i']))? $_GET['i']:1001;
	$query="SELECT * FROM `foods` WHERE `foodid`=$foodid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$foodvname=$row['foodvname'];
	
	$groupid=$row['foodgroup'];
	$query="SELECT * FROM `food_groups` WHERE `groupid`=$groupid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$groupvname=$row['groupvname'];
	
	$query="SELECT * FROM `food_nutrients` WHERE `foodid`=$foodid";
	$result=$database->query($query);
?>