<?php 
echo '<table border="1">';
$totalRowCount = 4;
$totalColCount = 2;

$curRow = 1;
$curCol = 1;
while($curRow <= $totalRowCount){
	echo '<tr>';
	while($curCol <= $totalColCount){
		echo '<td>Row'.$curRow.' Col'.$curCol.'</td>';
		$curCol = $curCol + 1;
	}
	$curCol = 1;
	echo '</tr>';
	$curRow = $curRow + 1;
}

echo '</table>';
?>