<?php
	require_once "../model/connection.php";
	require "../control/menushow.php";
	require "../control/mealrepeat.php";
	$userid=$_SESSION['userid'];
	$numrepeat=isset($_SESSION['numrepeat'])? $_SESSION['numrepeat']:7;
	$numrepeat=isset($_POST['numrepeat'])? $_POST['numrepeat']:$numrepeat;
	$_SESSION['numrepeat']=$numrepeat;
	$query="DELETE FROM `create_menu` WHERE `userid`=$userid";
	$database->query($query);
	header("LOCATION: ../view/menu_create.php");
?>