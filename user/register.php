<?php
session_start();
require_once "../model/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$age = $_POST['age'];
	$disease = $_POST['disease'];
	if ($username == "") {
		$_SESSION['user_error'] = "Tên tài khoản không được để trống";
	}
	else unset($_SESSION['user_error']);
	if ($password == "") {
		$_SESSION['pass_error'] = "Mật khẩu không được để trống";
	}
	else unset($_SESSION['pass_error']);
	if ($username != "" && $password != "") {
		$username = trim($username);
		$query = "SELECT `username` FROM user WHERE `username`='$username'";
		$result = $database->query($query);
		if ($row = $result->fetch_assoc()) {
			$user_name = "tên tài khoản đã tồn tại";
		}
		else
		if ($password != $repassword) {
			$_SESSION['repass_error'] = "nhập lại password không trùng nhau";
			header("Location: ../view/register.php");
		}
		else {
			$query = "INSERT INTO `user` (`name`, `username`, `password`, `age`, `disease`, `numrepeat`) VALUES ('$name', '$username','$password', $age, $disease, 7)";
			$result = $database->query($query);
			unset($_SESSION['repass_error']);
			header("Location: ../view/index.php");
		}
	}
	else header("Location: ../view/register.php");
}

?>