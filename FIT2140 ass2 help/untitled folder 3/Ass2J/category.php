<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php include("config/connection.php");
	//use the variable names in the include file
	$conn = new mysqli($Host, $UName, $PWord, $DB);
	$query="SELECT * FROM category";
	$result = $conn->query($query); 
	?>
	
	<center><h3>Categories</h3></center>
	<table border="1">

		<tr>
			<th>ID</th>
			<th>Category Name</th>
		</tr>
		
		<?php while ($row = mysqli_fetch_array($result))
			{
		?>
		
		<tr>
			<td><?php echo $row["category_id"]; ?></td>
			<td><?php echo $row["category_name"]; ?></td>
			<td>
				<a href="category_modify.php?categoryID=<?php echo $row["category_id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="category_modify.php?categoryID=<?php echo $row["category_id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>
</body>
