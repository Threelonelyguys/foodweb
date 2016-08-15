<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/search.php";
	$dishid=$_GET['i'];
?>

<html>
<body>
	<div class="main-body">
	<form action="./custom_list_dish_add.php?i=<?php echo $dishid;?>" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" placeholder="Tên thực phẩm" name="search" class="form-control" <?php if (isset($_POST['search'])) echo "value='$_POST[search]'";?>><br>
			</div>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-search"></span> Tìm kiếm
		</button>
		</div>
	 </form>
	 <ul class="list-group">
		<?php 
			if (isset($_POST['search'])){
				while ($row = $find_in_foods->fetch_assoc()){
					echo "<li class='list-group-item'><a href='./custom_food_page.php?i=".$row['foodid']."'>$row[foodvname]</a>";
					echo "<form action='../control/customdishadd.php?i=$dishid&f=".$row['foodid']."' method='post' class='form-inline' style='float:right;color:black'>";
					echo "<div class='form-group'>
							<input type='text' placeholder='khối lượng' name='weigh'>
						  </div>";
					echo "<div class='form-group'>
							<input type='text' placeholder='đơn vị' name='unit'>
						  </div>";
					echo "<button type='submit' class='btn btn-default'>Cập nhật</button>";
					echo "</form>";
					echo "</li>";
				}
			}
		?>
	</ul>
	</div>
</body>
</html>