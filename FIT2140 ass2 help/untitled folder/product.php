
<?php

/**
 * Created by PhpStorm.
 * User: yfan101
 * Date: 22/08/2017
 * Time: 3:59 PM
 */
$conn = mysqli_connect("130.194.7.82","s25520741","8969418",
    "s25520741");
$query="SELECT * FROM product";
$result = mysqli_query($conn, $query);

echo "<table border='1'>
<tr>
<th>Product Name</th>
<th>Product Price</th>
<th colspan=\"2\">Option</th>

</tr>";

while ($row= mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>";
echo $row["productName"];
echo "</td>";
echo "<td>";
echo $row["productPrice"];
echo "</td>";
echo "<td>
<a href=\productModify.php?pname=$row[productName]; &Action=Update\">Update</a>
</td>";
echo "<td>
<a href=\productModify.php?pname=$row[productName]; &Action=Delete\">Delete</a>
</td>";

echo"</tr>";
}
echo"</table>";


?>
