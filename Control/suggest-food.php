<?php 
	require "../control/userinfo.php";
	$num=$_GET['n'];
	$time=$_GET['t'];
	$control=isset($_GET['c'])? $_GET['c']:0;
	$query="SELECT * FROM `master_dish` WHERE `disease` = $user_disease";
	$suggest_food_result = $database->query($query);
	$page = isset($_REQUEST['p'])? $_REQUEST['p']:0;
	$i=0;
	$dishname=array();
	$dishid=array();
	$text=array();
	while ($suggest_food = $suggest_food_result->fetch_assoc()){
		$dishname[$i] = $suggest_food['dishname'];
		$dishid[$i] = $suggest_food['dishid'];
		$i++;
	}
	$i--;
	$numpage=floor($i/9+1);
	for ($j = 0; $j < $numpage; $j++){
		$text[$j]="";
		for ($k = 0; $k < 9; $k++)
		if ($j*9+$k<=$i){
			$text[$j]=$text[$j]."<li class='list-group-item' style='background:rgba(0,0,0,.8);padding-bottom:2%'><a href='./dish_page.php?i=".$dishid[$j*9+$k].
				"' style='color:white'>".$dishname[$j*9+$k]."</a>
				<a href='../control/menuadd.php?n=$num&t=$time&i=".$dishid[$j*9+$k]."&c=$control' style='float:right;margin-top:-1%'><button class='btn btn-success'>Thêm</button></a></li>";
		}
	}
	if ($_SERVER['REQUEST_METHOD']=="GET")echo isset($text[$page])? $text[$page]:"<li class='list-group-item'>Không có thực phẩm gợi ý</li>";
?>