<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php include("config/connection.php");
	//use the variable names in the include file
	$conn = new mysqli($Host, $UName, $PWord, $DB);
	$query="SELECT * FROM product";
	$result = $conn->query($query); 
	?>
	
	<center><h3>Products</h3></center>
	<table border="1">

		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Purchase Price</th>
			<th>Sale Price</th>
			<th>Country of Origin</th>
		</tr>
		
		<?php while ($row = mysqli_fetch_array($result))
			{
		?>
		
		<tr>
			<td><?php echo $row["product_id"]; ?></td>
			<td><?php echo $row["product_name"]; ?></td>
			<td>$<?php echo $row["product_purchase_price"]; ?></td>
			<td>$<?php echo $row["product_sale_price"]; ?></td>
			<td><?php echo $row["product_country_of_origin"]; ?></td>
			<td>
				<a href="product_modify.php?productID=<?php echo $row["product_id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="product_modify.php?productID=<?php echo $row["product_id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>
</body>
