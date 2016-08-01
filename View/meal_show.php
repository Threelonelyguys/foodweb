<?php 
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/mealshow.php";
?>
<html>
	<head>
	<link rel="stylesheet" href="./template/web.css">
	</head>
	<body>
		<div id="posit">
		<div id="food">
		<?php
			$num=0;
			while ($row = $result->fetch_assoc()){
				$num++;
				echo "<div class='food_info'>";
				echo "<p class='food_page'>". $num ." <a href='./meal_page.php?i=".$row['mealid']."'>Thực đơn $row[mealid]</a></p>";			
			
				if (isset($_SESSION['userid'])){
					$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
					$result1=$database->query($query);
					$row1=$result1->fetch_assoc();
					if ($row1['role']==1){
						echo "<a href='../control/deletemeal.php?i=".$row['mealid']."' class='edit'>Xóa</a>";
						echo "<p class='edit'>/</p>";
						echo "<a href='./meal_edit.php?i=".$row['mealid']."' class='edit'>Cập nhật</a>";
					}
				}
				echo "</div>";
			}
			if (isset($_SESSION['userid'])){
				$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
				$result1=$database->query($query);
				$row1=$result1->fetch_assoc();
				if ($row1['role']==1){
					echo "<a href='../control/newmealadd.php' class='edit'>+Thêm</a>";
				}
			}
		?>
		</div>
		</div>
	</body>
</html>