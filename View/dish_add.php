<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	$dishid=$_GET['i'];
?>

<html>
<style>
	.form-group{
		background:0;
	}
</style>
<body>
	<div class="main-body">
	<form action="./list_dish_add.php?i=<?php echo $dishid;?>" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" placeholder="Tên thực phẩm" name="search"class="form-control" <?php if (isset($_POST['search'])) echo "value='$_POST[search]'";?>><br>
			</div>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-search"></span> Tìm kiếm
		</button>
		</div>
	 </form>
	 </div>
</body>
</html>