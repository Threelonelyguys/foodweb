<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	$dishid=$_GET['i'];
	$foodid=$_GET['f'];
	require "../control/editfood.php";
?>

<html>
<body>
	<div class='main-body'>
		<?php 		
			$row = $find_in_foods->fetch_assoc();
			echo "<a href='./food_page.php?i=".$row['foodid']."' class='col-sm-offset-1 col-sm-4 ingredient'>$row[foodvname]</a>";
		?>
		<form class="form-inline" action='../control/editfoodvalue.php?i=<?php echo $dishid;?>&f=<?php echo $row['foodid'];?>' method='post' class='col-sm-7'>
		  <div class="form-group">
			<input type="text" class="form-control" placeholder="Khối lượng" value=<?php echo $weigh; ?> name='weigh'>
		  </div>
		  <div class="form-group">
			<input type="text" class="form-control" placeholder="Đơn vị" value=<?php echo $unit;?> name='unit'>
		  </div>
		  <button type="submit" class="btn btn-default">Cập nhật</button>
		</form>
	</div>
</body>
</html>