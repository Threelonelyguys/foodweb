<?php
	require_once "../model/connection.php";
	$userid=$_SESSION['userid'];
	$query="SELECT * FROM `user` WHERE `userid`=$userid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	
?>