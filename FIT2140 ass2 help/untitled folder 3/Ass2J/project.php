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
	
	<center><h3>Projects</h3></center>
	<table border="1">

		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>City</th>
			<th>Country</th>
		</tr>
		
		<?php while ($row = mysqli_fetch_array($result))
			{
		?>
		
		<tr>
			<td><?php echo $row["project_id"]; ?></td>
			<td><?php echo $row["project_name"]; ?></td>
			<td><?php echo $row["project_description"]; ?></td>
			<td><?php echo $row["project_city"]; ?></td>
			<td><?php echo $row["project_country"]; ?></td>
			<td>
				<a href="project_modify.php?categoryID=<?php echo $row["project_id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="project_modify.php?categoryID=<?php echo $row["project_id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>
</body>
