<?php
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	require_once "../model/connection.php";
	$userid = isset($_SESSION['userid'])? $_SESSION['userid']:0;
	$query = "SELECT * FROM `user` WHERE `userid`=$userid";
	$inforesult = $database->query($query);
	if ($inforow = $inforesult->fetch_assoc()){
		$username = isset($inforow['name'])? $inforow['name']:$inforow['username'];
		$user_disease = $inforow['disease'];
		$user_age = $inforow['age'];
	} else {
		$user_disease = 0;
		$user_age = 20;
	}

?>