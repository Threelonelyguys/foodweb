<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/foodinfo.php";
	$query="SELECT * FROM `foods`";
	$result=$database->query($query);
?> 
<html>
<body>
	<div class="main-body">
		<h1>Thành phần dinh dưỡng một số thực phẩm trong 100 g</h1>
		<table class="table table-bordered">
			<tr>
				<th>STT</th>
				<th class='col-sm-2'>Tên thực phẩm</th>
				<th class='col-sm-2'>Nhóm</th>
				<th>Nước(g)</th>
				<th>Năng lượng(KCal)</th>
				<th>Đạm(g)</th>
				<th>Chất Béo(g)</th>
				<th>Chất Bột(g)</th>
				<th>Chất xơ(g)</th>
			</tr>
			<?php
				$num=0;
				while ($row=$result->fetch_assoc()){
					++$num;
					info($row);
					echo "<tr>";
					echo "<td>$num</td>";
					echo "<td><a href='./food_page.php?i=".$row['foodid']."'>$row[foodvname]</a></td>";
					echo "<td>$groupname</td>";
					for ($i=1;$i<=7;$i++){
						if ($row1=$result1->fetch_assoc()) $value=$row1['nutrientvalue']; else $value=0;
						if ($i==3) continue;
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>
