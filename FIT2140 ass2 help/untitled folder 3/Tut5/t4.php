<?php 

	$conn = mysqli_connect("130.194.7.82","s24249548","newpass","s24249548");
	$query="SELECT * FROM Products";
	$result = mysqli_query($conn, $query); ?>
	
<table border="1">
<tr><th>Product Name</th><th>Product Price</th></tr>
<?php while ($row = mysqli_fetch_array($result))
	{
?>

<tr>
<td><?php echo $row["Name"]; ?></td>
<td>$<?php echo $row["Price"]; ?></td>
</tr>

<?php
	}
?>

</table>