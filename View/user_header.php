<?php
	session_start();
	if (isset($_SESSION['userid'])){
		require "../model/connection.php";
		$userid=$_SESSION['userid'];
		$query="SELECT * FROM `user` WHERE `userid`=$userid";
		$result=$database->query($query);
		$row=$result->fetch_assoc();
		echo "<a href='./user_page.php' class='user_header'>".$row['username']."</a>  ";
		echo "<a href='../user/logout.php' class='user_header'>Đăng xuất</a>";
	} else{
		echo "<a href='./sig_in.php' class='user_header'>Đăng nhập</a> hoặc <a href='./register.php' class='user_header'>Đăng ký</a>";
	}
?>