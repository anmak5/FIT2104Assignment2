<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php include("config/connection.php");
	//use the variable names in the include file
	$conn = new mysqli($Host, $UName, $PWord, $DB);
	$query="SELECT * FROM admin";
	$result = $conn->query($query); 
	?>
	
	<center><h3>Administrators</h3></center>
	<table border="1">

		<tr>
			<th>ID</th>
			<th>Username</th>
		</tr>
		
		<?php while ($row = mysqli_fetch_array($result))
			{
		?>
		
		<tr>
			<td><?php echo $row["admin_id"]; ?></td>
			<td><?php echo $row["uname"]; ?></td>
			<td>
				<a href="admin_modify.php?adminID=<?php echo $row["admin_id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="admin_modify.php?adminID=<?php echo $row["admin_id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>
</body>
