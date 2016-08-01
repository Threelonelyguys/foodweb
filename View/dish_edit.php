<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/dishpage.php";
?> 

<html>
<head>
	<style>
		.form-group{
			background:0;
		}
	</style>
</head>
<body>
	<div class="main-body">
	<?php
		echo "<a href='./dish_page.php?i=$dishid'><button class='btn btn-success'>Trang món ăn</button></a></td>";
		echo "<a href='./dish_show.php'><button class='btn btn-success' style='float:right'>Danh sách món ăn</button></a></td>";
	?>
	<form action="../control/dishedit.php?i=<?php echo $dishid; ?>" class="form-horizontal" method="post" role="form">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label text-success">Tên món ăn</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Tên món" name="name" id="name" class="form-control" value='<?php echo $dishname;?>'><br>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="col-sm-2 control-label text-success">Cách chế biến</label>
		<div class="col-sm-4">
			<input type="text" placeholder="Cách chế biến" name="type" id="type" class="form-control" value='<?php echo $dishtype;?>'><br>
		</div>
	</div>
	<div class="form-group">
		<label for="detail" class="col-sm-2 control-label text-success">Hướng dẫn</label>
		<div class="col-sm-4">
			<textarea placeholder="Cách chế biến" name="detail" id="detail" class="form-control" rows="10"><?php echo $dishdetail;?></textarea><br>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10" style="margin-bottom:2%">
		  <button type="submit" class="btn btn-default">Cập nhật</button>
		</div>
	</div>
	</form>
	<h5 class='text-success'>Nguyên liệu</h5>
	<ol>
	<?php
		while ($row=$result->fetch_array()){
			$foodid=$row['foodid'];
			$query="SELECT * FROM `foods` WHERE `foodid`=$foodid";
			$result1=$database->query($query);
			$row1=$result1->fetch_array();
			echo "<li style='padding-bottom:2%'> <a href='./food_page.php?i=".$row1['foodid']."' class='ingredient'>$row1[foodvname]</a>";
			if ($row['weigh']!=0) echo ": $row[weigh] $row[unit]";
			echo "<div style='float:right'>";
			echo "<a href='./edit_food.php?i=$dishid&f=$foodid'><button class='btn btn-success'>Chỉnh sửa</button></a>";
			echo "<a href='../control/deletefood.php?i=$dishid&f=$foodid'><button class='btn btn-success'>Xóa</button></a><br>";
			echo "</div></li>";
		}
		echo "<a href='./dish_add.php?i=$dishid'><button class='btn btn-success'>Thêm</button></a>";
	?>
	</ol>
	</div>
</body>
</html>