<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/menushow.php";
	if (!isset($_SESSION['userid'])) header("LOCATION: ./sig_in.php");
	$numday= isset($_GET['n'])? $_GET['n']:0;
	check_table($numday);
	$userid=$_SESSION['userid'];
?>
<html>
<body>
	<div class="main-body">
	<h1><?php echo $day_in_week[$date]." ngày ".$day." tháng ".$month." năm ".$year?></h1>
	<ul class="pager">
		<li><a href="./menu_show.php?n=<?php echo $numday-1;?>" class='btn btn-default btn-lg' role="button"> < </a></li>
		<li><a href="./menu_show.php?n=<?php echo $numday+1;?>" class='btn btn-default btn-lg' role="button"> > </a></li>
	</ul>
	<table class="table table-bordered">
	<tr class="text-center text-success">
	<?php
		for ($i=1;$i<=5;$i++){
			echo "<td class='col-sm-2'><h4>";
			show($i);
			echo $timename;
			echo "</td></h4>";
		}
	?>
	</tr>
	<tr>
	<?php
		$energy=0;
		for ($i=1;$i<=5;$i++){
			show($i);
			echo "<td><ol>";
			while ($row=$result->fetch_assoc()){
				$dishid=$row['dishid'];
				if ($dishid==0) $dishid=$row['custom_dish_id'];
				$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
				if ($row['dishid']==0) $query="SELECT * FROM `custom_dish` WHERE `dishid`=$dishid";
				$result1=$database->query($query);
				if ($row1=$result1->fetch_assoc()){
					if ($row['dishid']==0) $energy+=$row1['customenergy']; else $energy+=$row1['energy'];
					if ($row['dishid']==0) $dishname=$row1['foodname']; 
						else $dishname=$row1['dishname'];
					if ($row['dishid']==0) echo "<li class='text-left'><a href='./custom_dish_page.php?i=".$dishid."'  class='ingredient'>$dishname</a></li><br>"; else
					echo "<li class='text-left'><a href='./dish_page.php?i=".$dishid."'  class='ingredient'>$dishname</a></li><br>";	
				}
			}
			echo "</ol></td>";
		}
	?>
	</tr>
	</table>
	<p class="text-success">Tổng số năng lượng: <span style="color:white"><?php echo $energy;?> KCal</span></p>
	<a href="./menu_edit_day.php?n=<?php echo $numday;?>" style="float:right"><button class="btn btn-success">Chỉnh sửa</button></a>
	</div>
</body>
</html>