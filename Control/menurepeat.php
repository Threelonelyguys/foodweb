<?php
	require "../control/menushow.php";
	require "../control/mealrepeat.php";
	$numdif=isset($_POST['n'])? $_POST['n']:0;
	repeat($numrepeat,$numdif);
	header("LOCATION: ../view/menu_show_week.php");
?>