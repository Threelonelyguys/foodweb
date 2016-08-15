<?php
	require_once "../model/connection.php";
	if (session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$userid=$_SESSION['userid'];
	$numrepeat=isset($_SESSION['numrepeat'])? $_SESSION['numrepeat']:7;
	function repeat_once($numrepeat,$dishid,$time){
		global $date,$day,$month,$year,$database,$daystring,$userid;
		for ($i=0;$i<=8;$i++){
			check_table($i*$numrepeat);
			$query="SELECT * FROM `menu` WHERE `userid`=$userid && `day`='$daystring' && `time`=$i && `dishid`=$dishid";
			$result=$database->query($query);
			if ($result->num_rows <=0 ){
				$query="INSERT INTO `menu` (`userid`,`day`,`time`,`dishid`) VALUES ($userid,'$daystring',$i,$dishid)";
				$database->query($query);
			}
		}
	}
	function repeat_all($numrepeat){
		global $date,$day,$month,$year,$database,$daystring,$userid,$mealid,$result,$custom_dish_id;
		for ($i=0;$i<=20;$i++){
			check_table($i);
			$query="SELECT * FROM `menu` WHERE `userid`=$userid && `day`='$daystring'";
			$result=$database->query($query);
			if ($result->num_rows>0){
				while ($row=$result->fetch_assoc()){
					$menuid=isset($menuid)? min($menuid,$row['menuid']):$row['menuid'];
				}
			}
		}
		if (isset($menuid)){
			$query="DELETE FROM `menu` WHERE `userid`=$userid && `menuid`>=$menuid";
			$database->query($query);
		}
		check_table(0);
		$query="UPDATE `user` SET `numrepeat`=$numrepeat, `create-at`='$daystring' WHERE `userid`=$userid";
		$database->query($query);
		$query="SELECT * FROM `create_menu` WHERE `userid`=$userid";
		$result=$database->query($query);
		while ($row=$result->fetch_assoc()){
			$num=$row['num'];
			$dishid=$row['dishid'];
			$time=$row['time'];
			$daystring=$row['create_at'];
			$custom_dish_id=$row['custom_dish_id'];
			$i=0;
			do{
				check_table($num-1+$i*$numrepeat);
				$query="INSERT INTO `menu` (`userid`,`day`,`time`,`dishid`,`custom_dish_id`) VALUES ($userid,'$daystring',$time,$dishid,$custom_dish_id)";
				$database->query($query);
				$i++;
			} while ($num-1+$i*$numrepeat<=120);
		}
		$query="DELETE FROM `create_menu`";
		$database->query($query);
	}
	function repeat($numrepeat, $numdif){
		global $date,$day,$month,$year,$database,$daystring,$userid,$mealid;
		$numdaymore=$numdif%$numrepeat;
		$i=0;
		do{
			for ($num=1;$num<=$numrepeat;$num++){
				check_table(-$numdif+$numdaymore+$num-1);
				$query="SELECT * FROM `menu` WHERE `userid`=$userid && `day`='$daystring'";
				$result=$database->query($query);
				while ($row=$result->fetch_assoc()){
					$dishid=$row['dishid'];
					$time=$row['time'];
					check_table($num-1+$i*$numrepeat);
					$query="SELECT * FROM `menu` WHERE `userid`=$userid && `day`='$daystring' && `time`=$time && `dishid`=$dishid";
					$result1=$database->query($query);
					if ($result1->num_rows <=0 ){
						$query="INSERT INTO `menu` (`userid`,`day`,`time`,`dishid`) VALUES ($userid,'$daystring',$time,$dishid)";
						$database->query($query);
					}
				}
			}
			$i++;
		} while ($num-1+$i*$numrepeat<=120);
	}
?>