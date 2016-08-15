<?php
	require_once "../model/connection.php";
	session_start();
	
	$dishid=$_GET['i'];
	$foodname=(isset($_POST['foodname']))? $_POST['foodname']:"";
	if (isset($_POST['createfood'])) $createfood=$_POST['createfood'];
	if ($createfood!="") $query="UPDATE `custom_dish` SET `foodname`='$foodname',`createfood`='$createfood' WHERE `dishid`=$dishid";
		else $query="UPDATE `custom_dish` SET `foodname`='$foodname' WHERE `dishid`=$dishid";;
	$result=$database->query($query);
	header("LOCATION: ../view/custom_dish_page.php?i=$dishid");
?>