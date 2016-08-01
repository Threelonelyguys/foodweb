<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/search.php";
	$mealid=$_GET['i'];
?>

<html>
<head>
	<link rel="stylesheet" href="./template/web.css">
</head>
<body>
	<div id="posit">
	<form action="./list_dish_add.php?i=<?php echo $mealid;?>" method="post">
		<input type="text" name="search" size="50">
		<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-search"></span> Thêm món ăn
		</button>
	 </form>
	<div id="food">
		<?php 
			if ($_POST['search']){
				$num=0;
				while ($row = $find_in_dishes->fetch_assoc()){
				$num++;
				echo "<div class='food_info'>";
				echo "<p class='food_page'>". $num  ." <a href='./dish_page.php?i=".$row['dishid']."'>$row[dishname]</a></p>";
				if (isset($_SESSION['userid'])){
					echo "<a href='../control/mealadd.php?i=$mealid&d=".$row['dishid']."' class='edit'>Thêm</a>";
				}
				echo "</div>";
				}
			}
		?>
	</div>
	</div>
</body>
</html>