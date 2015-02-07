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
	
	/*
		$username = $_POST["username"];
		$visits = 0;
		
		if ($username == "" || $username == null) {
			echo "A username must be entered.<br>" . 
			"Click <a href=login.php>here</a> to return to the login screen.";
		} else {//edit [n] part when you know sessions
			echo "Hello $username you have visited this page [n] times before.  Click here to logout."
		}//second here destroys the session and returns user to login.php
	*/


	/* Code borrowed and modified from php-sessions.mp4 */

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	//header('Content-Type: text/plain');

	session_start();
	if(isset($_GET['action']) && $_GET['action'] == 'end'){
		$_SESSION = array();
		session_destroy();
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
		header("Location: {$redirect}/login.php", true);
		die();
	}

	//buggy: doesn't check $_SESSION username correctly
	//  upon revisits while logged in
	if(session_status() == PHP_SESSION_ACTIVE) {
		if(isset($_SESSION['username'])){
			$_SESSION['username'] = $_POST['username'];
		
			if(!isset($_SESSION['visits'])){
				$_SESSION['visits'] = 0;
			}
			
			echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times before.\n
			Click <a href='?action=end'>here</a> to logout.\n";
			
			echo "Click <a href='content2.php'>here</a> to see more content.\n";
			
			$_SESSION['visits']++;
		
		} else {
			echo "A username must be entered.<br>" . 
			"Click '<a href=login.php>here</a>' to return to the login screen.";
		}
		
		/*
		if(!isset($_SESSION['visits'])){
			$_SESSION['visits'] = 0;
		}
		
		echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times before.\n
		Click here to logout.\n";
		
		$_SESSION['visits']++;
		*/
	}
	
	?>
  </body>
</html>