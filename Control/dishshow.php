<?php
	require_once "../model/connection.php";
	
	$query = "SELECT * FROM `master_dish`";
	$result = $database->query($query);
	
?>