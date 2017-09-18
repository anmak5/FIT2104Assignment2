<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php include("connection.php");
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
		
		<?php while($row = $result->fetch_assoc())
			{
		?>
		
		<tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td>$<?php echo $row["purchase_price"]; ?></td>
			<td>$<?php echo $row["sale_price"]; ?></td>
			<td><?php echo $row["country_of_origin"]; ?></td>
			<td>
				<a href="productModify.php?productID=<?php echo $row["id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="productModify.php?productID=<?php echo $row["id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>
</body>
