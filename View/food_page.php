<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/foodpage.php";
?> 

<html>
<body>
	<div class="main-body">
	<?php echo "<h2>$foodvname <br><span class='group'>($groupvname)<span></h2><br>";?>
	<table class="table table-bordered table-condensed table-responsive">
	<tr>
		<td class='text-success'>Thành phần dinh dưỡng</td>
		<td class='text-success'>Giá trị dinh dưỡng</td>
		<td class='text-success'>Thành phần dinh dưỡng</td>
		<td class='text-success'>Giá trị dinh dưỡng</td>
		<td class='text-success'>Thành phần dinh dưỡng</td>
		<td class='text-success'>Giá trị dinh dưỡng</td>
	</tr>
	<?php 
			$num=0;
			while ($row=$result->fetch_assoc()){
			$nutrientvalue=$row['nutrientvalue'];
			if ($nutrientvalue!=NULL){
				$num++;
				if ($num%3==1) echo "<tr>";
				$query="SELECT * FROM `nutrients` WHERE `nutrientid`=$row[nutrientid]";
				$result1=$database->query($query);
				$row1=$result1->fetch_assoc();
				$nutrientvname=$row1['nutrientvname'];
			
				$unitid=$row1['unit'];
				$query="SELECT * FROM `units` WHERE `unitid`=$unitid";
				$result1=$database->query($query);
				$row1=$result1->fetch_assoc();
				$unit=$row1['unitname'];
				
				echo "<td>$nutrientvname</td>  <td>$nutrientvalue  $unit</td>";
				if ($num%3==0) echo "</tr>";
			}
			
		}
	?>
	</table>
	</div>
</body>
</html>