<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/mealpage.php";
?> 

<html>
<head>
	<link rel="stylesheet" href="./template/web.css">
</head>
<body>
	<div id='posit'>
	<?php echo "<p class='name'>Thực đơn $mealid</p><br>";
			$mealid=$row1['mealid'];
			$timeid=$row1['time'];
			$seasonid=$row1['season'];
			$diseaseid=$row1['disease'];
			$query="SELECT * FROM `time` WHERE `time`=$timeid";
			$result1=$database->query($query);
			while ($row1=$result1->fetch_assoc()){
				$timename=$row1['timename'];
				echo "<p>$timename"." "."</p>";
			}
			echo "<br>";
			$query="SELECT * FROM `season` WHERE `season`=$seasonid";
			$result1=$database->query($query);
			while ($row1=$result1->fetch_assoc()){
				$seasonname=$row1['seasonname'];
				echo "<p>$seasonname"." "."</p>";
			}
			echo "<br>";
			$query="SELECT * FROM `disease` WHERE `disease`=$diseaseid";
			$result1=$database->query($query);
			while ($row1=$result1->fetch_assoc()){
				$diseasename=$row1['diseasename'];
				echo "<p>$diseasename"." "."</p>";
			}
			echo "<br>";

		$num=0;$energy=0;
		while ($row=$result->fetch_array()){
			$num++;
			$dishid=$row['dishid'];
			$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
			$result1=$database->query($query);
			$row1=$result1->fetch_array();
			$energy+=$row1['energy'];
			echo "<p class='food_page'>". $num ." <a href='./dish_page.php?i=".$row1['dishid']."'>$row1[dishname]</a></p><br>";
		}
		echo "<p>Tổng số năng lượng: $energy KCal";
		$query="UPDATE `master_menu_day` SET `energy`=$energy WHERE `mealid`=$mealid";
		$result=$database->query($query);
	?>
	</div>
</body>
</html>