<?php require "./template/template1.php";?>
<body>
	<!--Navi bar-->
	<?php
	 require "./template/navigation.php";
	?>
	<!--Jumbotron-->
	<div class="container-fluid">
		<div class="jumbotron" style="padding:0">
			<div id="carousel-example-generic" class="carousel slide col-sm-8" data-ride="carousel" style="background:white;padding:0">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
				  <img src="./image/16.jpg" alt="1" style='height:480px'>
				  <div class="carousel-caption">
					<h3>First photo</h3>
					<p>Something about the food</p>
				  </div>
				</div>
				<div class="item">
				  <img src="./image/10.jpg" alt="2" style='height:480px'>
				  <div class="carousel-caption">
					<h3>Second photo</h3>
					<p>Something about the food</p>
				  </div>
				</div>
				<div class="item">
				  <img src="./image/15.jpg" alt="3" style='height:480px'>
				  <div class="carousel-caption">
					<h3>Third photo</h3>
					<p>Something about the food</p>
				  </div>
				</div>
			  </div>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="news col-sm-4" style='background:rgba(0,0,0,.5)'>
				<ul class="nav nav-tabs">
				  <li class="active" style='background:rgba(0,0,0,.8)'><a data-toggle="tab" href="#dishes" style='background:black;color:white'>Món ăn</a></li>
				  <li style='background:rgba(0,0,0,.8)'><a data-toggle="tab" href="#foods" style='background:black;color:white'>Thực phẩm</a></li>
				</ul>
				<div class="tab-content">
				  <div id="dishes" class="tab-pane fade in active">
					<ul class="list-group">
					<?php
						require "../control/dishshow.php";
						$num=0;
						while ($row = $result->fetch_assoc()){
							$num++;
							echo "<li class='list-group-item' style='background:rgba(0,0,0,.8);padding-bottom:2%'>";
							echo "<a href='./dish_page.php?i=".$row['dishid']."' style='color:white'>$row[dishname]</a>";
							echo "</li>";
							if ($num==9) break;	
						}
					?>
					<li class='list-group-item' style='background:rgba(0,0,0,.8);padding-bottom:2%;float:right'>
					<a href='./dish_show.php' style='color:white'>Xem thêm</a>
					</li>
					</ul>
				  </div>
				  <div id="foods" class="tab-pane fade">
					<ul class="list-group">
					<?php
						require "../control/foodshow.php";
						$num=0;
						while ($row = $result_out->fetch_assoc()){
							$num++;
							echo "<li class='list-group-item' style='background:rgba(0,0,0,.8);padding-bottom:2%'>";
							echo "<a href='./food_page.php?i=".$row['foodid']."' style='color:white'>$row[foodvname]</a>";
							echo "</li>";
							if ($num==9) break;	
						}
					?>
					<li class='list-group-item' style='background:rgba(0,0,0,.8);padding-bottom:2%;float:right'>
					<a href='./food_show.php' style='color:white'>Xem thêm</a>
					</li>
					</ul>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>