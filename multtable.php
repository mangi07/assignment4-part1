

<!DOCTYPE html>

<html>
  <head></head>
  <body>
    <?php
	
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
	function checkInt () {
	  global $min_r, $max_r, $min_l, $max_l;
	  $allInts = true;
	  if (!is_int($min_r)) {
	    echo "[min-multiplican] must be an integer.<br>";
		$allInts = false;
	  }
	  if (!is_int($max_r)) {
	    echo "[max-multiplican] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (!is_int($min_l)) {
	    echo "[max-multiplier] must be an integer.<br>";
	    $allInts = false;
	  }
	  if (!is_int($max_l)) {
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
	}
	
	
	?>
  </body>
</html>