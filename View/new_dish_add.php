<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/newdishadd.php";
?> 

<html>
<body>
	<div class="main-body">
	<form action="../control/newdishadd.php" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="dishname" class="col-sm-2 control-label text-success">Tên món:</label>
			<div class="col-sm-4">
				<input type="text" name="dishname" class="form-control" id="dishname"><br>
			</div>
		</div>
		<div class="form-group">
			<label for="type" class="col-sm-2 control-label text-success">Cách chế biến:</label>
			<div class="col-sm-4">
				<input type="text" name="type" class="form-control" id="detail"><br>
			</div>
		</div>
		<div class="form-group">
			<label for="detail" class="col-sm-2 control-label text-success" rols="10">Hướng dẫn</label>
			<div class="col-sm-4">
				<textarea name="detail" id="detail" class="form-control"></textarea><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10" style="margin-bottom:2%">
			  <button type="submit" class="btn btn-success">Cập nhật</button>
			</div>
		</div>
	  </form>
	</div>
</body>
</html>