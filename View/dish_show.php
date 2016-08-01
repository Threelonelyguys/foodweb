<?php 
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/dishshow.php";
?>
<html>
<body>
	<div class="main-body">
	<h1>Danh sách món ăn</h1><br>
	<ul class="list-group">
	<?php
		while ($row = $result->fetch_assoc()){
		echo "<li class='list-group-item'>";
		echo " <a href='./dish_page.php?i=".$row['dishid']."' style='color:white'>$row[dishname]</a>";
		if (isset($_SESSION['userid'])){
			$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
			$result1=$database->query($query);
			$row1=$result1->fetch_assoc();
			if ($row1['role']==1){
				echo "<div style='float:right'>";
				echo "<a href='./dish_edit.php?i=".$row['dishid']."'><button class='btn btn-success'>Cập nhật</button></a> ";
				echo "<a href='../control/deletedish.php?i=".$row['dishid']."'><button class='btn btn-success'>Xóa</button></a>";
				echo "</div>";
			}
		}
		echo "</li>";
		}
		if (isset($_SESSION['userid'])){
			$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
			$result1=$database->query($query);
			$row1=$result1->fetch_assoc();
			if ($row1['role']==1){
				echo "<br><a href='./new_dish_add.php' style='float:right'><button class='btn btn-success'>Thêm</button></a>";
			}
		}
	?>
	</ul>
	</div>
</body>
</html>