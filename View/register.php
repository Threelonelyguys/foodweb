<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
?>
<html>
<style>
</style>
<body>
	<form action="../user/register.php" class="form-horizontal" method="post" role="form">
	<div class="main-body">
		<div class="form-group">
			<div class="col-sm-offset-4">
				<h2>Đăng ký</h2><br>
			</div>
		</div>
		<div class="form-group">
			<label for="name" class="col-sm-offset-2 col-sm-2 control-label">Họ tên</label>
			<div class="col-sm-4">
				<input type="text" placeholder="Họ tên" name="name" id="name" class="form-control"><br><br>
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="col-sm-offset-2 col-sm-2 control-label">Tên tài khoản</label>
			<div class="col-sm-4">
				<input type="text" placeholder="Tên tài khoản" name="username" id="username" class="form-control"><br><?php if (isset($_SESSION['user_error'])) echo "<span class='text-danger'>*". $_SESSION['user_error']."</span>";?><br>
			</div>
		</div>
		<div class="form-group">
			<label for="pwd" class="col-sm-offset-2 col-sm-2 control-label">Mật khẩu</label>
			<div class="col-sm-4">
				<input type="password" placeholder="Mật khẩu" name="password" id="pwd" class="form-control"><br><?php if (isset($_SESSION['pass_error']) ) echo "<span class='text-danger'>*". $_SESSION['pass_error']."</span>"; ?><br>
			</div>
		</div>
		<div class="form-group">
			<label for="rpwd" class="col-sm-offset-2 col-sm-2 control-label">Nhập lại mật khẩu</label>
			<div class="col-sm-4">
				<input type="password" placeholder="Nhập lại mật khẩu" name="repassword" id="rpwd" class="form-control"><br><?php if (isset($_SESSION['repass_error'])) echo "<span class='text-danger'>*". $_SESSION['repass_error']."</span>"; ?><br>
			</div>
		</div>
		<div class="form-group">
			<label for="age" class="col-sm-offset-2 col-sm-2 control-label">Tuổi</label>
			<div class="col-sm-1">
			<input type="number" min="1" max="100" name="age" class="form-control text-center" value="20">
			</div>
			<label for="disease" class="col-sm-1 control-label">Bệnh</label>
			<div class="col-sm-2">
				<select class="form-control" name="disease">
					<option value=0>Không mắc bệnh</option>
					<?php
						$query="SELECT * FROM `disease`";
						$result=$database->query($query);
						while ($row=$result->fetch_assoc()){
							$disease = $row['disease'];
							$diseasename = $row['diseasename'];
							echo "<option value=".$disease.">".$diseasename."</option>";
						}
					?>
				</select><br><br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10" style="margin-bottom:2%">
			  <button type="submit" class="btn btn-success">Đăng ký</button>
			</div>
		 </div>
	</div>
	</form>
	</div>	
</body>
<?php
	unset($_SESSION['repass_error']);
	unset($_SESSION['user_error']);
	unset($_SESSION['pass_error']);
?>