<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	if (!isset($_SESSION['userid'])) header("LOCATION: ./sig_in.php");
	$num=isset($_GET['n'])? $_GET['n']:0;
	require "../control/menushow.php";
	require "../control/menushowweek.php";
	$query="SELECT * FROM `user` WHERE `userid`=$userid";
	$result=$database->query($query);
	$row=$result->fetch_assoc();
	$date1=$row['create-at'];
	$date2=date('m/d/y');
	$numdif=floor((strtotime($date2)-strtotime($date1))/(24*60*60));
?>
<html>
<body>
	<div class="main-body">
	<?php
		if ($numdif!=00){
			echo "<div style='margin-bottom:5%;background:red;'>";
			echo "<h4 class='text-warning col-sm-offset-1 col-sm-8'>Bạn đã sử dụng thực đơn hơn 100 ngày bạn có muốn tiếp tục hay sử dụng thực đơn mới?</h4>";
			echo "<a href='./menu_create.php'><button class='btn btn-success col-sm-1'>Tạo mới</button></a>";
			echo "<a href='../control/menurepeat.php?n=$numdif'><button class='btn btn-default col-sm-1'>Tiếp tục</button></a>";
			echo "</div>";
		}
	?>
	<a href="./menu_show_week.php?n=<?php echo $num-1;?>"><button class="btn btn-success col-sm-1" style="float:left">Tuần trước</button></a>
	<h2 class="text-center col-sm-10">Tuần từ <?php check_table($numday);echo "ngày $day tháng $month năm $year";?> đến <?php check_table($numday+6);echo "ngày $day tháng $month năm $year";?></h2>
	<a href="./menu_show_week.php?n=<?php echo $num+1;?>"><button class="btn btn-success col-sm-1" style="float:right">Tuần sau</button></a>
	<table class="table table-bordered">
		<thead>
			<td class="col-sm-1 text-center text-success"><h4>Thứ</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 2</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 3</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 4</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 5</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 6</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Thứ 7</h4></td>
			<td class="col-sm-1 text-center text-success"><h4>Chủ nhật</h4></td>
		</thead>
		<?php
			for ($time=1; $time<=5; $time++){
				echo "<tr><td class='text-center text-danger'><h4>";
				echo $time_in_day[$time];
				echo "</td><h4>";
				for ($i=$numday; $i<=$numday+6; $i++){
					check_table($i);
					echo "<td>";
					echo "<ol style='padding-left:10%'>";
					$query="SELECT * FROM `menu` WHERE `userid`=$userid && `time`=$time && `day`='$daystring'";
					$result=$database->query($query);
					while ($row=$result->fetch_assoc()){
						$dishid=$row['dishid'];
						$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
						$result1=$database->query($query);
						if ($row1=$result1->fetch_assoc()){
							$dishname=$row1['dishname'];
							echo "<li><a href='./dish_page.php?i=".$dishid."'class='ingredient'>$dishname</a></li><br>";	
						}
					}
					echo "</ol>";
					echo "</td>";
				}
				echo "</tr>";
			}
		?>
	</table>
	</div>
</body>
</html>