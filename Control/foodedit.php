<?php	
	require_once "../model/connection.php";
	$foodid= isset($_GET['i'])? $_GET['i']:1001;
	$query="SELECT * FROM `foods` WHERE `foodid`=$foodid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$foodvname=$row['foodvname'];
	$query="SELECT * FROM `nutrients`";
	$result=$database->query($query);
	
?>