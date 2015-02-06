

<!DOCTYPE html>

<html>
  <head></head>
  <body>
    <?php
	
	//get form variables
	  $min_r = /*(int)*/$_GET["min-multiplicand"];
	  $max_r = /*(int)*/$_GET["max-multiplicand"];
	  $min_l = /*(int)*/$_GET["min-multiplier"];
	  $max_l = /*(int)*/$_GET["max-multiplier"];
	  
      //casting issues: How to cast to int and have failure/null instead of 0...
	  var_dump($max_l);
	  
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
	//  returns: true if all checked strings are string integers (and they will all be converted to integers), else returns false
	function checkInt () {
	  global $min_r, $max_r, $min_l, $max_l;
	  $allInts = true;
	  //$regEx = /optional-?followed by[0-9]{1,}/;
	  $regEx = "/^[-+]?\d+$/";
	  //use preg_match($regEx, $min_r);??
	  
	  //$validatedValue = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	  //from http://stackoverflow.com/questions/4100022/php-validate-integer
	  
	  
	  //****checkout return values on http://php.net/manual/en/function.filter-input.php
	  // and possibly rewrite entire error checking into one function with parameters passed in
	  
	  //replace is_numeric with regEx testing
	  if (is_numeric($min_r)) {
	    //if (preg_match($regEx, $min_r)) {}
	    echo "[min-multiplican] must be an integer.<br>";
		$allInts = false;
	  }
	  if (!is_numeric($max_r)) {
	    echo "[max-multiplican] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (!is_numeric($min_l)) {
	    echo "[max-multiplier] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (!is_numeric($max_l)) {
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
		//for...
		echo "<script>alert('All checks passed!');</script>";
	}
	
	
	?>
  </body>
</html>