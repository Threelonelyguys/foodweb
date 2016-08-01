<?php 
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/foodshow.php";
?>
<html>
<body>
	<div class="main-body">
		<?php echo "<h2>$vname_group <br><span class='ename'>($ename_group)<span></h2><br>"; ?>
		<ul class="pager">
		<li><a href='../view/food_show.php?g=<?php echo ($group-1);?>&p=1&n=10' class="btn btn-default btn-lg <?php if($group==1) echo 'disabled';?>" role="button" style="color:black"> << </a></li>
		<li><a href='../view/food_show.php?g=<?php echo ($group);?>&p=<?php echo $page-1;?>&n=10' class="btn btn-default btn-lg <?php if($page==1) echo 'disabled';?>" role="button" style="color:black"> < </a></li>
		<li><a href='../view/food_show.php?g=<?php echo ($group);?>&p=<?php echo $page+1;?>&n=10' class="btn btn-default btn-lg <?php if($page==$num_page) echo 'disabled';?>" role="button" style="color:black"> > </a></li>
		<li><a href='../view/food_show.php?g=<?php echo ($group+1);?>&p=1&n=10' class="btn btn-default btn-lg <?php if($group==14) echo 'disabled';?>" role="button" style="color:black"> >> </a></li>
		</ul>
		<ul class="list-group">
		<?php 
			while ($row = $result->fetch_assoc()){
			echo "<li class='list-group-item'> <a href='./food_page.php?i=".$row['foodid']."'>$row[foodvname]</a>";
			if (isset($_SESSION['userid'])){
				$query="SELECT * FROM `user` WHERE `userid`=$_SESSION[userid]";
				$result1=$database->query($query);
				$row1=$result1->fetch_assoc();
				if ($row1['role']==1){
					echo "<a href='./food_edit.php?i=".$row['foodid']."' style='float:right'><button class='btn btn-success'>Cập nhật</button></a>";
				}
			}
			echo "</li>";
		}?>
		</ul>
	</div>
</body>
</html>