<?php
	require "./template/template1.php";
	require "./template/navigation.php";
	require "./template/sidenav.php";
	require "../control/document.php";
?>

<html>
<body>
	<div class="main-body col-sm-12">
	<h2 class="text-info">Tài liệu sử dụng:</h2>
	<?php
		while ($row=$result->fetch_assoc()){
			echo "<h4 class='text-success'>$row[documentid]. $row[documentname]<br></h4>";
			echo "<div class='blockquote-reverse'>$row[author]<br></div>";
		}
	?>
	</div>
</body>
</html>