<?php
	require_once "../model/connection.php";
	if ($_SERVER['REQUEST_METHOD']=="POST"){
		if ($_POST['search']!=""){
			$word=$_POST['search'];
			$query="SELECT * FROM `foods` WHERE `foodvname` LIKE N'% $word %' OR `foodvname` LIKE N'$word %' OR `foodvname` LIKE N'% $word' OR `foodvname` LIKE '$word'";
			$find_in_foods=$database->query($query);
			$query="SELECT * FROM `custom_foods` WHERE `foodvname` LIKE N'% $word %' OR `foodvname` LIKE N'$word %' OR `foodvname` LIKE N'% $word' OR `foodvname` LIKE '$word'";
			$find_in_cfoods=$database->query($query);
			$query="SELECT * FROM `master_dish` WHERE `dishname` LIKE N'% $word %' OR `dishname` LIKE N'$word %' OR `dishname` LIKE N'% $word' OR `dishname` LIKE '$word'";
			$find_in_dishes=$database->query($query);
		}
	}
?>