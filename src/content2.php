<?php
	session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
	<meta name="description" content="CS 290 Assignment 4">
	<meta name="author" content="Benjamin R. Olson">
	<title>CS 290 Assignment 4 Part 1: content2.php</title>
  </head>
  <body>
  
    <h1>content2.php</h1>
	
    <?php

	if (!isset($_SESSION['username'])) {
		$_SESSION = array();
		session_destroy();
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath
			. "/login.php";
		echo "<script type='text/javascript'>
			window.location = '$redirect';
			</script>";
		die();
	}
	
	echo "Link to content1.php <a href='content1.php'>here</a>.";
	
	?>
  </body>
</html>