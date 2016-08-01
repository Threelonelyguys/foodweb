<?php
	require_once "../model/connection.php";
	
	$group = isset($_GET['g'])? $_GET['g']:1;
	$page = isset($_GET['p'])? $_GET['p']:1;
	$num_per_page = isset($_GET['n'])? $_GET['n']:10;
	$num_start = $group*1000+($page-1)*$num_per_page+1;
	$num_end = $group*1000+$page*$num_per_page;
	$query = "SELECT * FROM `food_groups` WHERE `groupid`='$group'";
	$result = $database->query($query);
	$row =  $result->fetch_assoc();
	$num_page = CEIL($row['num_food']/$num_per_page);
	$vname_group = $row['groupvname'];
	$ename_group = $row['groupename'];
	$query = "SELECT * FROM `foods` WHERE `foodgroup`=$group && `foodid`>=$num_start && `foodid`<=$num_end";
	$result = $database->query($query);
	$query = "SELECT * FROM `foods`";
	$result_out = $database->query($query);
?>