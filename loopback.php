<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
	<meta name="description" content="CS 290 Assignment 4">
	<meta name="author" content="Benjamin R. Olson">
	<title>CS 290 Assignment 4 Part 1: loopback.php</title>
  </head>
  <body>
  
    <h1>loopback.php</h1>
	
	<p>Submit with method GET</p>
	<form action="#" method="GET">
	  age: <input type="number" name="age"/><br />
	  phone: <input type="text" name="phone"/><br />
	  addy: <input type="text" name="addy"/><br />
	  flavor: <input type="text" name="flavor"/><br />
	  <input type="submit" name="submit">
	</form>
	
	<p>Submit with method POST</p>
	<form action="#" method="POST">
	  make: <input type="text" name="make"/><br />
	  model: <input type="text" name="model"/><br />
	  quantity: <input type="number" name="quantity"/><br />
	  <input type="submit" name="submit">
	</form>
	
    <?php

	$parameters = "";
	$json_string = "";
	
	/* The following code taken and modified from:
	http://php.net/manual/en/reserved.variables.request.php
	on February 6, 2015 */	
	switch($_SERVER['REQUEST_METHOD'])
	{
		case 'GET':
			$json_string .= "{\"Type\":\"GET\",\"parameters\":";
			$parameters .= json_encode($_GET);
			if ($parameters == "[]") $json_string .= "null";
			else $json_string .= $parameters;
			$json_string .= "}";
			break;
		case 'POST':
			$json_string .= "{\"Type\":\"POST\",\"parameters\":";
			$parameters .= json_encode($_POST);
			if ($parameters == "[]") $json_string .= "null";
			else $json_string .= $parameters;
			$json_string .= "}";
			break;
		default:
			echo "Error: Unknown.";
	}
	//var_dump($_GET);
	
	echo $json_string;
	
	
	//make a JSON object: the following may not be necessary...
/*
	foreach($_GET as $key=>$val) 
  { 
   if($key != $parameter) 
   { 
    if(!$firstRun) 
    { 
     $output .= "&"; 
    } 
    else 
    { 
     $firstRun = false; 
    } 
    $output .= $key."=".urlencode($val); 
   } 
  }

	//this page should return the JSON object just created
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

echo json_encode($arr);
*/
	
	
	?>
  </body>
</html>