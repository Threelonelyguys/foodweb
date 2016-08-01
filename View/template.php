<html>
	<head>
		<style>
			.main_page{
				font-size: 40px;
				color: white;
			}
			a{text-decoration:none;}
			.user_header{
				display:inline-block;
				position: relative;
				font-size: 20px;
				background:red;
				color:white;
				padding: 2px 2px 2px 2px;
			}
			#sigin{
				position: absolute;
				right: 15px;
				color: white;	
			}
			#search{
				position: absolute;
				right: 230px;
				
			}
			#header{
				background:green;
			}
			#head{
				position: relative;
				bottom: 33px;
			}
		</style>
	</head>
	<body>
		<div id="header">
		<a href="./main_page.php" class="main_page">Thực đơn hôm nay</a>
		<div id="head">
		<form action="./search.php" method="post" id="search">
			<input type="text" name="search">
			<input type="submit" value="Tìm kiếm">
		</form>
		<div id="sigin"><?php require "./user_header.php";?><br></div>
		</div>
		</div>
		<a href="./food_show.php">Thực phẩm</a>
		<a href="./dish_show.php">Món ăn</a>
	</body>
</html>