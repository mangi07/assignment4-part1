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

header('Content-Type: application/json');

echo $json_string;


?>
