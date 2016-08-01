<?php
	require_once "../model/connection.php";
	session_start();
	
	$dishid=$_GET['i'];
	$dishname=(isset($_POST['name']))? $_POST['name']:"";
	$dishtype=isset($_POST['type'])? $_POST['type']:"";
	if (isset($_POST['detail'])) $dishdetail=$_POST['detail'];
	if ($dishdetail!="") $query="UPDATE `master_dish` SET `dishname`='$dishname',`type`='$dishtype',`description`='$dishdetail' WHERE `dishid`=$dishid";
		else $query="UPDATE `master_dish` SET `dishname`='$dishname',`type`='$dishtype' WHERE `dishid`=$dishid";;
	$result=$database->query($query);
	header("LOCATION: ../view/dish_page.php?i=$dishid");
?>