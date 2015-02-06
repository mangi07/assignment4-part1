

<!DOCTYPE html>

<html>
  <head></head>
  <body>
    <?php
	
	//debug
	//$regEx = "/^[-+]?[1-9]{1}\d{0,}$/";
	//echo preg_match($regEx, "-90");
	
	//get form variables
	  $min_r = $_GET["min-multiplicand"];
	  $max_r = $_GET["max-multiplicand"];
	  $min_l = $_GET["min-multiplier"];
	  $max_l = $_GET["max-multiplier"];
 
	if (checkNull() && checkInt() && checkRange())
	  makeMultTable();
	
	//check variables are not null
	// returns: true if all variables are not null, else false
	function checkNull () {
	  global $min_r, $max_r, $min_l, $max_l;
	  $noneNull = true;
	  if ($min_r == null) {
	    echo "Missing parameter [min-mulitplicand].<br>";
		$noneNull = false;
	  }
      if ($max_r == null) {
	    echo "Missing parameter [max-multiplicand].<br>";
		$noneNull = false;
	  }
	  if ($min_l == null) {
	    echo "Missing parameter [min-multiplier].<br>";
		$noneNull = false;
	  }
	  if ($max_l == null) {
	    echo "Missing parameter [max-multiplier].<br>";
		$noneNull = false;
	  }
	  return $noneNull;
	}
	
	//check variables are all integers
	//  converts valid string integers to integers
	//  returns: true if all checked strings are string 
	//    integers (and they will all be converted to integers),
	//    else returns false
	function checkInt () {
	  global $min_r, $max_r, $min_l, $max_l;
	  $allInts = true;
	  //string that represents an integer:
	  $regEx = "/^[-+]?[1-9]{1}\d{0,}$/";
	  //use preg_match($regEx, $min_r);
	  
	  /*Could also use
	  $validatedValue = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	  from http://stackoverflow.com/questions/4100022/php-validate-integer
	  */
	  
	  //replace is_numeric with regEx testing
	  if (preg_match($regEx, $min_r) || $min_r == "0") {
	    $min_r = intval($min_r);
	  } else {
	    echo "[min-multiplican] must be an integer.<br>";
		$allInts = false;
	  }
	  if (preg_match($regEx, $max_r) || $max_r == "0") {
	    $max_r = intval($max_r);
	  } else {
	    echo "[max-multiplican] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (preg_match($regEx, $min_l) || $min_l == "0") {
	    $min_l = intval($min_l);
	  } else {
	    echo "[min-multiplier] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (preg_match($regEx, $max_l) || $max_l == "0") {
	    $max_l = intval($max_l);
	  } else {
	    echo "[min-multiplier] must be an integer.<br>";
		$allInts = false;
	  }
	  
      return $allInts;
	}
		
	//check range of variables
	function checkRange () {
	  global $min_r, $max_r, $min_l, $max_l;
	  if ($min_r > $max_r) {
	    echo "Minimum multiplicand larger than maximum.<br>";
		return false;
	  }
	  else if ($min_l > $max_l) {
	    echo "Minimum multiplier larger than maximum.<br>";
		return false;
	  }
	  return true;
	}
	
	function makeMultTable() {
		echo "<script>alert('All checks passed!');</script>";
		$r_length = $max_r - $min_r + 2; //multiplicans
		$l_length = $max_l - $min_l + 2; //multipliers
		//setup table
		echo "<table>";
		echo "<caption>Multiplication Table</caption>";
		echo "<thead><tr>";
		//create top row
		for ($i = 0; $i <= $l_length; $i++) {
		  echo "<th>" . ($i + $min_l);
		}
		echo "</thead>";
		echo "<tbody>";
		//create left column and rows
		for ($j = 0; $j <= $r_length; $j++) {
			echo "<tr><th scope=row>" . ($min_r + $j);
			for ($k = 0; $k <= $l_length; $k++) {
			  echo "<td>" . (($k + $min_l) * ($j + $min_r));
			}
		}
		echo "</tbody>";
		echo "</table";
	}
	
	
	?>
  </body>
</html>