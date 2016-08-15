<?php
session_start();
require_once "../model/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$userid=$_SESSION['userid'];
	echo $userid;
	$foodname=$_POST['foodname'];
	$createfood=$_POST['createfood'];
	if($foodname==""){
		$_SESSION['foodname_error']="Tên món ăn không được để trống";
	} else 
			unset($_SESSION['foodname_error']);
	if($createfood==""){
		$_SESSION['create_error']="Cách chế biến không được để trống";
	} else 
			unset($_SESSION['createfood_error']);
	if($foodname!="" && $createfood!=""){
		$query="INSERT INTO `custom_dish` (`userid`,`foodname`,`createfood` ) VALUES ($userid,'$foodname','$createfood')";
		$result=$database->query($query);
		header("Location: ../view/custom_dish_show.php");
	}
	else header("location: ../view/user_create.php");
}
?>