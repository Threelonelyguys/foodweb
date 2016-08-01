<?php
	require_once "../model/connection.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	require "./menushow.php";
	require "./mealrepeat.php";
	$query="SELECT * FROM `create_menu` WHERE `userid`=$userid";
	$result=$database->query($query);
	while ($row=$result->fetch_assoc()){
		$dishid=$row['dishid'];
		$time=$row['time'];
		$num=$row['num'];
	}
	header("LOCATION ../view/menu_show_week.php");
?>