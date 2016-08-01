<?php
	session_start();
	session_unset('userid');
	header("Location: ../view/index.php");
?>