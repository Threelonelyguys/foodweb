<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
?>
<html>
<style>
	.form-group{
		background:rgba(0,0,0,.6)
	}
</style>
<body>
	<?php 
		echo "<a href='./custom_dish_show.php'> 
			<div class='col-sm-4'>
			<button class='btn btn-success' class='form-control' > Quay lại </button>
			</div>
		</a>";
	?>
	<form action="../control/usercreate.php" class="form-horizontal" method="post" role="form">
	<div class="form-body">
		<div class="form-group">
			<div class="col-sm-offset-4">
				<h2>Món ăn của bạn</h2><br>
			</div>
		</div>
		<div class="form-group">
			<label for="foodname" class="col-sm-offset-2 col-sm-2 control-label">Tên món ăn</label>
			<div class="col-sm-4">
				<input type="text" placeholder="Tên món ăn" name="foodname" id="foodname" class="form-control"><br><?php if (isset($_SESSION['foodname_error'])) echo "<span class='text-danger'>*". $_SESSION['foodname_error']."</span>";?><br>
			</div>
		</div>
		<div class="form-group">
			<label for="createfood" class="col-sm-offset-2 col-sm-2 control-label">Cách chế biến</label>
			<div class="col-sm-4">
			<textarea placeholder="Cách chế biến" name="createfood" id="createfood" class="form-control" rows="10"></textarea><br><?php if (isset($_SESSION['create_error'])) echo "<span class='text-danger'>*". $_SESSION['create_error']."</span>";?><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10" style="margin-bottom:2%">
			  <button type="submit" class="btn btn-default">Submit</button>
			</div>
		 </div>
	</div>
	</form>
	</div>	
</body>
<?php
	unset($_SESSION['foodname_error']);
	unset($_SESSION['create_error']);
?>