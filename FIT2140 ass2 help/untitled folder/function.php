<?php
/**
 * Created by PhpStorm.
 * User: yfan101
 * Date: 22/08/2017
 * Time: 3:07 PM
 */
function table($a,$b){
    echo "<table>";
    for ($i=0;$i<$a;$i++){
    echo"<table border='1'><tr>";
        for($j=0;$j<$b;$j++){
            echo"<td>";
            echo "row $i column $j";
            echo "</td>";
        }
        echo"</tr>";
    }
    echo "</table>";
}

echo table(3,4);


?>