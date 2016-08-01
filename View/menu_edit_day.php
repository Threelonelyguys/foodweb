<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/menushow.php";
	$numday=isset($_GET['n'])? $_GET['n']:0;
	check_table($numday);
?>
<html>
<body>
	<div class="main-body">
		<h1><?php echo $day_in_week[$date]." ngày ".$day." tháng ".$month." năm ".$year?></h1>
		<table class="table table-bordered text-center">
			<tr class="text-success">
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
				for ($i=1;$i<=5;$i++){
					show($i);
					echo "<td><ol>";
					while ($row=$result->fetch_assoc()){
						$dishid=$row['dishid'];
						$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
						$result1=$database->query($query);
						$row1=$result1->fetch_assoc();
						$dishname=$row1['dishname'];
						echo "<li class='text-left'><a href='./dish_page.php?i=$dishid' class='ingredient'>$dishname</a></li>";
					}
					echo "</ol>";
					echo "<a href='./menu_edit.php?n=$numday&t=$i&c=1'><span class='glyphicon glyphicon-plus-sign'></span></a>";
					echo "</td>";
				}
			?>
			</tr>
		</table>
	</div>
</body>
</html>
