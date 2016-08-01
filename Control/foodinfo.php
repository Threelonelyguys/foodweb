<?php
	require_once "../model/connection.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	function info($row){
		global $database,$foodvname,$groupname,$result1;
		$foodid=$row['foodid'];
		$groupid=$row['foodgroup'];
		$foodvname=$row['foodvname'];
		$query="SELECT * FROM `food_groups` WHERE `groupid`=$groupid";
		$result1=$database->query($query);
		$row1=$result1->fetch_assoc();
		$groupname=$row1['groupvname'];
		$query="SELECT * FROM `food_nutrients` WHERE `foodid`=$foodid";
		$result1=$database->query($query);
	}
?>