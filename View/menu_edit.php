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
	require_once "../control/userinfo.php";
?>
<html>
<style>
</style>
<body>
	<div class="main-body">
		<a href=<?php if ($control==1) echo "./menu_edit_day.php?n=$num"; else echo "./menu_create.php"?>><button class='btn btn-default'>Quay lại</button></a>
		<h1><?php if ($control==1) echo $time_in_day[$time]." ".$day_in_week[$date]." ngày ".$day." tháng ".$month." năm ".$year; else
			 echo "Thực đơn ".$time_in_day[$time]." "."ngày $num"?></h1>
		<ol>
		<table class="table table-background">
		<tr>
		<td class="col-sm-4"><?php
			$energy=0;
			while ($row=$result->fetch_assoc()){
				$dishid=$row['dishid'];
				if ($dishid==0) $dishid=$row['custom_dish_id'];
				if ($control==1) $id=$row['menuid'];
				$query="SELECT * FROM `master_dish` WHERE `dishid`=$dishid";
				if ($row['dishid']==0) {
					$query="SELECT * FROM `custom_dish` WHERE `dishid`=$dishid";
				}
				$result1=$database->query($query);
				if ($row1=$result1->fetch_assoc()){	
					if ($row['dishid']==0) $dishname = $row1['foodname']; else $dishname=$row1['dishname'];
					if ($row['dishid']==0) $energy+=$row1['customenergy']; else $energy+=$row1['energy'];
					if ($row['dishid']==0) echo "<li style='margin-bottom:5%'><a href='./custom_dish_page.php?i=".$dishid."'>$dishname</a>";
					else echo "<li style='margin-bottom:5%'><a href='./dish_page.php?i=".$dishid."'>$dishname</a>";	
					echo "<a href='../control/delete.php?";
					if ($control==1) echo "&i=$id&";
					echo "n=$num&t=$time&d=$dishid&c=$control";
					if ($row['dishid']==0) echo "&cd=1";
					echo "' style='float:right'><button class='btn btn-success' class='col-sm-1'>Xóa</button></a></li>";
				}
			}
		?>
		<p class="text-success">Tổng số năng lượng: <span style="color:white;"><?php echo $energy;?> KCal</span></p>
		</td>
		<td class="col-sm-2">
		</td>
		<td class="col-sm-6">
		<ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#suggest">Món ăn gợi ý</a></li>
		  <li><a data-toggle="tab" href="#yours">Món ăn của bạn</a></li>
		</ul>

		<div class="tab-content">
		  <div id="suggest" class="tab-pane fade in active">
			<ul class="list-group">
			<div id="suggest-dish-group">
				<?php require "../control/suggest-food.php";?>
			</div>
			<li class="list-group-item" style='background:rgba(0,0,0,.8);padding-bottom:2%'>
				<button id="suggprevious" class='btn btn-success'>Trước</button>
				<button id="suggnext" class='btn btn-success' style="float:right">Tiếp</button>
			</li>
			</ul>
		  </div>
		  <div id="yours" class="tab-pane fade">
			<ul class="list-group">
			<?php
		if(isset($_SESSION['userid'])){

			$query="SELECT * FROM `custom_dish` WHERE `userid`=$_SESSION[userid]";
			$result=$database->query($query);

			while ($row = $result->fetch_assoc()){
					echo "<li class='list-group-item'>";
					echo "<a href='./custom_dish_page.php?i=".$row['dishid']."' style='color:white'>$row[foodname]</a>";
					echo "<a href='../control/menuadd.php?n=$num&t=$time&i=$row[dishid]&c=$control&cd=1' style='float:right;margin-top:-1%'><button class='btn btn-success'>Thêm</button></a>";
					echo "</li>";
			}
		}
		echo "<a href='./user_create.php' style='color:white'><button class='btn btn-success'> Tạo món mới</button></a>";
	?>
			</ul>
		  </div>
		</div>
		</td>
		</tr>
		</ol>
		</table>
	</div>
</body>
	<script>
		var p=0;
		var numpage=10;
		var n=<?php echo $num;?>;
		var t=<?php echo $time;?>;
		var c=<?php echo $control;?>;
		$("#suggprevious").click(function(){
			if (p>0) p--;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("suggest-dish-group").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "../control/suggest-food.php?p="+p+"&n="+n+"&t="+t+"&c="+c, true);
			xmlhttp.send();
			});
		$("#suggnext").click(function(){
			if (p<numpage-1) p++;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("suggest-dish-group").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "../control/suggest-food.php?p="+p+"&n="+n+"&t="+t+"&c="+c, true);
			xmlhttp.send();
		});
	</script>
</html>