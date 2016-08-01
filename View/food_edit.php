<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/foodedit.php";
?>
<html>
<body>
	<div class="main-body">
	<?php
		echo "<h1>$foodvname</h1>";
	?>
	<form action="foodupdate.php" method="post" class="form-hozirontal" role="form">
		<div class="form-group">
		<label for="groupname" class="col-sm-2">Nhóm thực phẩm: </label>
		<input type="text" name="groupname" id="groupname" class="form-control">
		</div>
		<div class="form-group">
			<?php
				while ($row=$result->fetch_assoc()){
					echo "<label for='groupname' class='col-sm-2'>$row[nutrientvname]: </label>
							<input type='text' name='$row[nutrientid]' id='$row[nutrientid]' class='form-control'><br>";
				}
			?>
		</div>
		<div class="form-group">
			<a href="#"><button class="btn btn-success">Cập nhật</button></a>
		</div>
	</form>
	</div>
</body>
</html>