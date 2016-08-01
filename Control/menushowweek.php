<?php
	require_once "../model/connection.php";
	check_table(0);
	$numday_in_week=array("Mon"=>0,"Tue"=>-1,"Wed"=>-2,"Thu"=>-3,"Fri"=>-4,"Sat"=>-5,"Sun"=>-6);
	$numday=$numday_in_week[$date]+$num*7;
?>