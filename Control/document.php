<?php
	require_once "../model/connection.php";
	
	$query="SELECT * FROM `documents`";
	$result=$database->query($query);
?>