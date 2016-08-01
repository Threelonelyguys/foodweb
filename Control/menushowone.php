<?php
	require_once "../model/connection.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$userid=$_SESSION['userid'];
	$query="SELECT * FROM `menu` WHERE `userid`=$userid && `time`=$time && `day`='$dayname'";
	$result=$database->query($query);	
?>