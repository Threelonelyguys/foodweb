<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require_once "../control/search.php";
?>

<html>
<body>
	<div class="main-body">
	<ul class="list-group">
		<?php 
			if ($_POST['search']){
				$num=0;
				while ($row = $find_in_foods->fetch_assoc()){
					$num++;
					echo "<li class='list-group-item'><a href='./food_page.php?i=".$row['foodid']."'>$row[foodvname]</a>";
					if (isset($_SESSION['userid'])){
						$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
						$result1=$database->query($query);
						$row1=$result1->fetch_assoc();
						if ($row1['role']==1){
							echo "<a href='./food_edit.php?i=".$row['foodid']."' style='float:right'><button class='btn btn-success'>Cập nhật</button></a>";
						}
					}
					echo "</li>";
				}
			}
		?>
	<ul>
	</div>
</body>
</html>