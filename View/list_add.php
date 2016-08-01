<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/search.php";
	$userid=$_SESSION['userid']; 
	$num=$_GET['n'];
	$time=$_GET['t'];
	$control=isset($_GET['c'])? $_GET['c']:0;
?>

<html>
<body>
	<div class="main-body">
	 <form action="./list_add.php?n=<?php echo $num;?>&t=<?php echo $time;?>&c=<?php echo $control;?>" method="post" class="form-horizontal" role="form">
		<div class="form-group">
			<div class="col-sm-4">
				<input type="text" placeholder="Tên thực phẩm" name="search" class="form-control" <?php if (isset($_POST['search'])) echo "value='$_POST[search]'";?>><br>
			</div>
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-search"></span> Thêm món ăn
		</button>
		</div>
	 </form>
	<ul class="list-group">
		<?php 
			if ($_POST['search']){
				while ($row = $find_in_dishes->fetch_assoc()){
					echo "<li class='list-group-item'><a href='./dish_page.php?i=".$row['dishid']."'>$row[dishname]</a>";
					if (isset($_SESSION['userid'])){
						echo "<a href='../control/menuadd.php?n=$num&t=$time&i=$row[dishid]&c=$control' style='float:right'><button class='btn btn-default'>Thêm</button></a>";
					}
					echo "</li>";
				}
			}
		?>
	</ul>
	</div>
</body>
</html>