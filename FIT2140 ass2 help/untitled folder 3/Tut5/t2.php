<?php 
	
	$numbers = array("90", "22", "75", "92", "56", "68");
	echo 'Array:';
	
	//display contents of array
	foreach($numbers as $number) {
		echo $number.'  ';
	}
	echo '<br>Ascending:';
	
	//display contents of array ascending
	sort($numbers);
	foreach($numbers as $number) {
		echo $number.'  ';
	}
	echo '<br>Descending:';
	
	//display contents of array descending
	rsort($numbers);
	foreach($numbers as $number) {
		echo $number.'  ';
	}
	echo '<br>Min:'.min($numbers);
	echo '<br>Max:'.max($numbers);
	echo '<br>Avg:'.(array_sum($numbers)/count($numbers));
	//
 ?>