<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php include("connection.php");
	//use the variable names in the include file
	$conn = new mysqli($Host, $UName, $PWord, $DB);
	$query="SELECT * FROM client";
	$result = $conn->query($query); 
	?>
	
	<center><h3>Clients</h3></center>
	<table border="1">

		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Street Address</th>
			<th>Suburb</th>
			<th>State</th>
			<th>Post Code</th>
			<th>Email</th>
			<th>Mobile</th>
			<th>Mailing List</th>
		</tr>
		
		<?php while ($row = mysqli_fetch_array($result))
			{
		?>
		
		<tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["fname"]; ?></td>
			<td><?php echo $row["lname"]; ?></td>
			<td><?php echo $row["street"]; ?></td>
			<td><?php echo $row["suburb"]; ?></td>
			<td><?php echo $row["state"]; ?></td>
			<td><?php echo $row["pc"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["mobile"]; ?></td>
			<td><?php echo $row["mailinglist"]; ?></td>
			<td>
				<a href="client_modify.php?clientID=<?php echo $row["id"]; ?>&Action=Update">Update</a>
			</td>
			<td>
				<a href="client_modify.php?clientID=<?php echo $row["id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>


    <a href="client_add.php">Add</a>
</body>
