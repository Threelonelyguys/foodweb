<?php
	require_once "../model/connection.php";
	require "./menushow.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$userid=$_SESSION['userid'];
	$num=$_GET['n'];
	$time=$_GET['t'];
	$dishid=$_GET['i'];
	$control=isset($_GET['c'])? $_GET['c']:0;
	$custom=isset($_GET['cd'])? $_GET['cd']:0;
	echo $custom;
	if ($control==1){
		check_table($num);
		$query="INSERT INTO `menu` (`userid`,`day` ,`time`,`dishid`) VALUES ($userid, '$daystring', $time, $dishid)";
		if ($custom==1) $query="INSERT INTO `menu` (`userid`,`day` ,`time`,`custom_dish_id`) VALUES ($userid, '$daystring', $time, $dishid)";
		$result=$database->query($query);
		header("LOCATION: ../view/menu_edit.php?n=$num&t=$time&c=$control");
	} else{
		check_table(0);
		$query="INSERT INTO `create_menu` (`userid`, `num`, `time`, `dishid`, `create_at`) VALUES ($userid, $num, $time, $dishid,'$daystring')";
		if ($custom==1) $query="INSERT INTO `create_menu` (`userid`,`num` ,`time`,`custom_dish_id`, `create_at`) VALUES ($userid, $num, $time, $dishid, '$daystring')";
		$result=$database->query($query);
		echo $query;		
		header("LOCATION: ../view/menu_edit.php?n=$num&t=$time&c=$control");
	}
?>