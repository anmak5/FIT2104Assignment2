<?php
/**
 * Created by PhpStorm.
 * User: yfan101
 * Date: 25/07/2017
 * Time: 2:44 PM
 */
$numbers=array(4,5,8,9,15,6);
for($i=0;$i<count($numbers);$i++){
echo $numbers[$i];
    echo"<br>";
}
echo"<br>";
sort($numbers);
for($i=0;$i<count($numbers);$i++){
echo $numbers[$i];
echo"<br>";}
echo"<br>";

rsort($numbers);
for($i=0;$i<count($numbers);$i++){
echo $numbers[$i];
echo"<br>";}
echo"<br>";
echo max($numbers);
echo"<br>";
echo min($numbers);
echo"<br>";
echo array_sum($numbers)/count($numbers);

?>
    