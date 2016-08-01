<?php
	require_once "../model/connection.php";
	
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		session_start();
		$username = $_POST["username"];
		$password = $_POST["password"];
	
		$query = "SELECT * FROM `user` WHERE `username` = '$username'";
		$result = $database->query($query);
		if ($row = $result->fetch_assoc()) {
			if ($row['password'] == $password)
			{
				$_SESSION['userid']=$row['userid'];
				$_SESSION['numrepeat']=$row['numrepeat'];
				header("Location: ../view/index.php");
			} else {
				$_SESSION['pass_error']="Nhập sai mật khẩu";
				header("LOCATION: ../view/sig_in.php");
			}
		} else {
			$_SESSION['user_error']="Nhập sai tên tài khoản";
			header("LOCATION: ../view/sig_in.php");
		}
	}
?>