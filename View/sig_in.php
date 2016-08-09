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
	<form action="../user/sigin.php" class="form-horizontal" method="post" role="form">
	<div class="form-body">
		<div class="form-group">
			<div class="col-sm-offset-4">
				<h2>Đăng nhập</h2><br>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-offset-2 col-sm-2 control-label">Tên tài khoản</label>
			<div class="col-sm-4">
				<input type="text" placeholder="Tên tài khoản" name="username" id="username" class="form-control"><br><?php if (isset($_SESSION['user_error'])) echo "<span class='error'>*". $_SESSION['user_error']."</span>";?><br>
			</div>
		</div>
		<div class="form-group">
			<label for="pwd" class="col-sm-offset-2 col-sm-2 control-label">Mật khẩu</label>
			<div class="col-sm-4">
				<input type="password" placeholder="Mật khẩu" name="password" id="pwd" class="form-control"><br><?php if (isset($_SESSION['pass_error']) ) echo "<span class='error'>*". $_SESSION['pass_error']."</span>"; ?><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10" style="margin-bottom:2%">
			  <button type="submit" class="btn btn-default">Đăng nhập</button>
			</div>
		</div>
	</div>
	</form>
</body>
<?php
	unset($_SESSION['repass_error']);
	unset($_SESSION['user_error']);
	unset($_SESSION['pass_error']);
?>