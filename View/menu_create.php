<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	if (!isset($_SESSION['userid'])) header("LOCATION: ./sig_in.php");
	$numrepeat=isset($_SESSION['numrepeat'])? $_SESSION['numrepeat']:7;
	$continue=isset($_GET['c'])? $_GET['c']:0;
	require "../control/menushow.php";
	require "../control/mealrepeat.php";
?>
<html>
<body>
	<div class="main-body">
	<form class="form-horizontal" action="../control/menucreate.php" method="post" role="form">
	<div class="form-group">
		<label for="day" class="col-sm-2 control-label text-success">Cập nhật theo </label>
		<div class="col-sm-2">
			<input type="text" size="1" name="numrepeat" id="day" value=<?php echo $numrepeat;?> class="text-center" style="color:black"> ngày (1->14 ngày)
		</div>
		<button type="submit" class="btn btn-success">Go</button>
	</div>
	</form>
	<?php
		if ($numrepeat>7) {
			echo "<div style='padding-bottom:1%'>";
			echo "<a href='./menu_create.php'><button class='btn btn-success'>Trở lại</button></a>";
			echo "<a href='./menu_create.php?c=1' style='float:right'><button class='btn btn-success' style='float:right'>Tiếp</button></a>";
			echo "</div>";
		}
	?>
	<table class="table table-bordered text-center">
		<tr>
			<td class="col-sm-1 text-success"><h4>Thứ</h4></td>
		<?php
			if ($continue==1){
				$first=8;
				$second=$numrepeat;
			} else {
				$first=1;
				$second=min(7,$numrepeat);
			}
			for ($i=$first;$i<=$second;$i++){
				echo "<td class='text-success col-sm-1'><h4> Ngày $i</h4></td>";
			}
		?>
		</tr>
		<?php
			for ($time=1; $time<=5; $time++){
				echo "<tr><td class='text-danger'><h4>";
				echo $time_in_day[$time];
				echo "</h4></td>";
				for ($num=$first;$num<=$second;$num++){
					echo "<td>";
					echo "<ol>";
					$query="SELECT * FROM `create_menu` WHERE `userid`=$userid && `time`=$time && `num`=$num";
					$result=$database->query($query);
					while ($row=$result->fetch_assoc()){
						$dishid=$row['dishid'];
						if ($dishid==0) $dishid=$row['custom_dish_id'];
						$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
						if ($row['dishid']==0) $query="SELECT * FROM `custom_dish` WHERE `dishid`=$dishid";
						$result1=$database->query($query);
						if ($row1=$result1->fetch_assoc()){
							if ($row['dishid']==0) $dishname=$row1['foodname']; 
								else $dishname=$row1['dishname'];
							if ($row['dishid']==0) echo "<li class='text-left'><a href='./custom_dish_page.php?i=".$dishid."'  class='ingredient'>$dishname</a></li><br>"; else
							echo "<li class='text-left'><a href='./dish_page.php?i=".$dishid."'  class='ingredient'>$dishname</a></li><br>";	
						}
					}
					echo "</ol>";
					echo "<a href='./menu_edit.php?n=$num&t=$time'><span class='glyphicon glyphicon-plus-sign'></span></a><br>";
					echo "</td>";
				}
				echo "</tr>";
			}
		?>
	</table>
	<a href="../control/menuupdate.php"><button class="btn btn-success">Cập nhật</button></a>
	</div>
	
</body>
</html>