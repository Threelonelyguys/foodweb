<?php
	require_once "../model/connection.php";
	require_once "./menushow.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$userid=$_SESSION['userid'];
	$num=$_GET['n'];
	$dishid=$_GET['d'];
	$time=$_GET['t'];
	$menuid=$_GET['i'];
	$control=isset($_GET['c'])? $_GET['c']:0;
	if ($control==1){
		check_table($num);
		$query="DELETE FROM `menu` WHERE `menuid`=$menuid && `userid`=$userid && `day`='$daystring' && `time`=$time && `dishid`=$dishid";
		$database->query($query);
		header("LOCATION: ../view/menu_edit_day.php?n=$num&t=$time&c=$control");
	} else{			
		$query="DELETE FROM `create_menu` WHERE `userid`=$userid && `num`=$num && `time`=$time && `dishid`=$dishid";
		$result=$database->query($query);
		echo $num.$dishid.$time;
		header("LOCATION: ../view/menu_edit.php?n=$num&t=$time&c=$control");
	}
?> 