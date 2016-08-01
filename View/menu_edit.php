<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	$userid=$_SESSION['userid']; 
	$num=$_GET['n'];
	$time=$_GET['t'];
	$control=isset($_GET['c'])? $_GET['c']:0;
	require "../control/menushow.php";
	check_table($num);
	//require "../control/menushowone.php";
	show_create_menu($num,$time);
?>
<html>
<body>
	<div class="main-body">
		<h1><?php if ($control==1) echo $day_in_week[$date]." ngày ".$day." tháng ".$month." năm ".$year; else
			 echo "Thực đơn ngày $num"?></h1>
		<ol>
		<?php
			while ($row=$result->fetch_assoc()){
				$dishid=$row['dishid'];
				if ($control==1) $id=$row['menuid'];
				$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
				$result1=$database->query($query);
				if ($row1=$result1->fetch_assoc()){	
					$dishname=$row1['dishname'];
					echo "<li style='margin-bottom:2%'><a href='./food_page.php?i=".$dishid."'>$dishname</a>";	
					echo "<a href='../control/delete.php?";
					if ($control==1) echo "&i=$id&";
					echo "n=$num&t=$time&d=$dishid&c=$control' style='float:right'><button class='btn btn-success'>Xóa</button></a></li>";
				}
			}
			echo "<a href='./menu_add.php?n=$num&t=$time&c=$control'><span class='glyphicon glyphicon-plus-sign'></span> Thêm món ăn</a></td>";
		?>
		</ol>
	<a href=<?php if ($control==1) echo "./menu_edit_day.php?n=$num"; else echo "./menu_create.php"?>><button class='btn btn-default'>Quay lại</button></a>
	</div>
</body>
</html>