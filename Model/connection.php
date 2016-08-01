<?php
	require "../config/database.php";
	
	$database = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME) or die ("Can't connect to database");
	$database->query("SET CHARACTER SET utf8");
?>