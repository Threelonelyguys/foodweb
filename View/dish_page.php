<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/dishpage.php";
?> 

<html>
<body>
	<div class="main-body">
	<?php echo "<h1>$dishname</h1><br>";
		if (isset($_SESSION['userid']))
		echo "<p><span  class='text-success'>Cách chế biến:</span> $dishtype </p>";
		echo "<p class='text-success'>Thành phần</p><br>";
		echo "<ol>";
		$energy=0;
		while ($row=$result->fetch_array()){
			$foodid=$row['foodid'];
			$query="SELECT * FROM `foods` WHERE `foodid`=$foodid";
			$result1=$database->query($query);
			$row1=$result1->fetch_array();
			echo "<li> <a href='./food_page.php?i=".$row1['foodid']."' class='ingredient'>$row1[foodvname]</a>";
			if ($row['weigh']!=0) echo ": $row[weigh] $row[unit]";
			echo "</li>";
			if ($row['unit']=='g'){
				$query="SELECT * FROM `food_nutrients` WHERE `foodid`=$row1[foodid] && `nutrientid`=2";
				$energy_food=$database->query($query);
				$row2=$energy_food->fetch_assoc();
				$energy+=$row2['nutrientvalue']*$row['weigh']/100;
			}
		}
		echo "</ol>";
		echo "<p class='text-success'> Hướng dẫn:</p><br><pre>$dishdetail</pre><br>";
		echo "<p><span class='text-success'>Tổng số năng lương: </span>$energy KCal</p>";
		$query="UPDATE `master_dish` SET `energy`=$energy WHERE `dishid`=$dishid";
		$result=$database->query($query);
		if ($_SESSION['userid']==1) echo "<a href='./dish_edit.php?i=$dishid'><button class='btn btn-success'>Cập nhật</button></a>";
	?>
	</div>
</body>
</html>