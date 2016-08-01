<?php
	require_once "../model/connection.php";
	
	$query = "SELECT * FROM `master_menu_day`";
	$result = $database->query($query);
	
?>