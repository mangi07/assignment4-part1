<?php
	session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
	<meta name="description" content="CS 290 Assignment 4">
	<meta name="author" content="Benjamin R. Olson">
	<title>CS 290 Assignment 4 Part 1: content1.php</title>
  </head>
  <body>
  
    <h1>content1.php</h1>

    
	<?php
	/* Code borrowed and modified from php-sessions.mp4 */

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
	if(isset($_GET['action']) && $_GET['action'] == 'end'){
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

	if(session_status() == PHP_SESSION_ACTIVE) {
	  //check if login attempted
	  if (isset($_POST['username'])) {
		if(!isset($_SESSION['username'])) {
			if(empty($_POST['username'])){
				echo "A username must be entered.<br>" . 
				"Click '<a href=login.php>here</a>' to return to the login screen.";
			} else {
				$_SESSION['username'] = $_POST['username'];
			}
		}
	  } else if (!isset($_SESSION['username'])) {
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
	  //if session username is set, continue loading page content
	  if (isset($_SESSION['username'])) {	  
		  if(!isset($_SESSION['visits'])){
			$_SESSION['visits'] = 0;
		  }
		  echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times before.\n
		  Click <a href='?action=end'>here</a> to logout.\n";	
		  echo "Click <a href='content2.php'>here</a> to see more content.\n";
		  $_SESSION['visits']++;
	  }
	}
	
	?>

  </body>
</html>
