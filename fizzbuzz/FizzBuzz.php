<?php
function GetNumber($n) {
	$fizzbuzz =  "FIZZBUZZ";
	$fizz = "FIZZ";
	$buzz = "BUZZ";
	
	if(($n %3 == 0) && ($n % 5 == 0)) {
		return $fizzbuzz;
	}elseif($n % 3 == 0){
		return $fizz;
	}elseif($n % 5 == 0) {
		return $buzz;
	}
	
	return $n;
}

echo GetNumber(15);