<?php
	require_once "../model/connection.php";
	
	$query = "SELECT * FROM `custom_dish`";
	$result = $database->query($query);
	
?>