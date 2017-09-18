<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php include("element/header.php"); ?>

	<?php include("config/connection.php");
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
			<td><?php echo $row["client_id"]; ?></td>
			<td><?php echo $row["client_fname"]; ?></td>
			<td><?php echo $row["client_lname"]; ?></td>
			<td><?php echo $row["client_street"]; ?></td>
			<td><?php echo $row["client_suburb"]; ?></td>
			<td><?php echo $row["client_state"]; ?></td>
			<td><?php echo $row["client_pc"]; ?></td>
			<td><?php echo $row["client_email"]; ?></td>
			<td><?php echo $row["client_mobile"]; ?></td>
			<td><?php echo $row["client_mailinglist"]; ?></td>
			<td>
				<a href="client_modify.php?client_id=<?php echo $row["client_id"]; ?>&Action=ConfirmUpdate">Update</a>
			</td>
			<td>
				<a href="client_modify.php?client_id=<?php echo $row["client_id"]; ?>&Action=Delete">Delete</a>
			</td>

		</tr>

		<?php
			}
		?>

	</table>


    <a href="client_add.php">Add</a>
</body>
