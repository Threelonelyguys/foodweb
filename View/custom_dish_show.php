<?php 
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/customdishshow.php";
?>
<html>
<body>
	<div class="main-body">
	<h1>Món ăn của bạn</h1><br>
	<ul class="list-group">
	<?php
		if(isset($_SESSION['userid'])){

			$query="SELECT * FROM `custom_dish` WHERE `userid`=$_SESSION[userid]";
			$result=$database->query($query);

			while ($row = $result->fetch_assoc()){
					echo "<li class='list-group-item'>";
					echo " <a href='./custom_dish_page.php?i=".$row['dishid']."' style='color:white'>$row[foodname]</a>";
				
					
					echo "<div style='float:right'>";
					echo "<a href='./custom_dish_edit.php?i=".$row['dishid']."'><button class='btn btn-success'>Cập nhật</button></a> ";
					echo "<a href='../control/customdeletedish.php?i=".$row['dishid']."'><button class='btn btn-success'>Xóa</button></a>";
					echo "</div>";	
				//}
				echo "</li>";
			}
		}
		echo "<a href='./user_create.php' style='color:white'><button class='btn btn-success'> Tạo món mới</button></a>";
	?>
	</ul>
	</div>
</body>
</html>