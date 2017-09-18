<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#data tbody tr').addClass("list");
			$('#data tbody tr:even').addClass("listeven");
		});
	</script>
	<title>Products</title>
	<style>
		tr.list{
			color : black;
			font-family : Arial, Verdana, Geneva, Helvetica, sans-serif;
			font-size : 12px;
		}
		tr.listeven{
			color : black;
			font-family : Arial, Verdana, Geneva, Helvetica, sans-serif;
			font-size : 12px;
			background-color: #D8F2D0;
		}
	</style>
</head>
<body>
	<?php 
		$conn = mysqli_connect("130.194.7.82","s24249548","newpass","s24249548");
		$query="SELECT * FROM Product";
		$result = mysqli_query($conn, $query); ?>
		
	<table border="0" align="center" id="data">
	<tr><th>Product Name</th><th>Product Price</th></tr>
	<?php while ($row = mysqli_fetch_array($result))
		{
	?>

	<tr>
<td><?php echo $row["product_name"]; ?></td>
<td>$<?php echo $row["product_sale_price"]; ?></td>
	</tr>

	<?php
		}
	?>

	</table>
	
</body>

</html>
