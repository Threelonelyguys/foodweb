<?php
	require_once "../model/connection.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$userid=$_SESSION['userid'];
	function check_table($numday){
		global $date,$day,$month,$year,$database,$dayname,$daystring;
		$date=date("D",strtotime("+$numday days"));
		$day=date("d",strtotime("+$numday days"));
		$month=date("m",strtotime("+$numday days"));
		$year=date("y",strtotime("+$numday days"));
		$dayname=$date.$day.$month.$year;
		$daystring=$month."/".$day."/".$year;
	}
	function show($time){
		global $timename,$dishid,$result,$database,$daystring,$userid;
		$query="SELECT * FROM `time` WHERE `time`=$time";
		$result=$database->query($query);
		$row=$result->fetch_assoc();
		$timename=$row['timename'];
		$query="SELECT * FROM `menu` WHERE `userid`=$userid && `time`=$time && `day`='$daystring'";
		$result=$database->query($query);
	}
	function show_create_menu($num,$time){
		global $database,$userid,$result,$control,$daystring;
		if ($control==1){
			check_table($num);
			$query="SELECT * FROM `menu` WHERE `userid`=$userid && `day`='$daystring' && `time`=$time";
			$result=$database->query($query);			
		} else {
			$query="SELECT * FROM `create_menu` WHERE `userid`=$userid && `num`=$num && `time`=$time";
			$result=$database->query($query);			
		}
	}
?>