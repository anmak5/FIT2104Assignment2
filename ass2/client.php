<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM product";
$result = $conn->query($query);



if($result){
    $result->data_seek(0);
}
    ?>
<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
       <ul class="nav navbar-nav">
      <li ><a href="main.php">Home</a></li>
        <li><a href="products.php" id="results">Products</a></li>
      <li class="active"><a href="client.php">Clients</a></li>
           <li ><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
      
    </ul>
</nav>
        <html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

<center><h3>New Client</h3></center>

<?php
if (empty($_POST["fname"]))
{
    ?>
    <form method="post" action="client_add.php">
        <center>Add<br/></center>

        <table align ="center" cellpadding="3">

            <tr>
                <td><b>First Name</b></td>
                <td><input type="text" name="fname" size="30"></td>
            </tr>

            <tr>
                <td><b>Last Name</b></td>
                <td><input type="text" name="lname" size="30"></td>
            </tr>

            <tr>
                <td><b>Street Address</b></td>
                <td><input type="text" name="street" size="30"></td>
            </tr>

            <tr>
                <td><b>Suburb</b></td>
                <td><input type="text" name="suburb" size="30"></td>
            </tr>

            <tr>
                <td><b>State</b></td>
                <td><input type="text" name="state" size="30"></td>
            </tr>

            <tr>
                <td><b>Postcode</b></td>
                <td><input type="text" name="pc" size="30"></td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td><input type="text" name="email" size="30"></td>
            </tr>

            <tr>
                <td><b>Mobile</b></td>
                <td><input type="text" name="mobile" size="30"></td>
            </tr>

            <tr>
                <td><b>Customer Mailing list</b></td>
                <!--td><input type="text" name="cust_mailinglist" size="30"></td -->
                <td><input type="radio" name="mailinglist" value="y" checked> Yes </td><br>
                <td><input type="radio" name="mailinglist" value="n"> No</td>
            </tr>

        </table> <br/>
        <table align="center">
            <tr>
                <td><input type = "submit" value = "Add Client"></td>
                <td><input type = "button" value = "Return to List" onclick="window.location.href='client.php';"/></td>
            </tr>
        </table>
    </form>
<?php }
else {
	include("config/connection.php");
	$conn = new mysqli($Host, $UName, $PWord, $DB) or die("Couldn't log on to database");
	$query="INSERT INTO client (client_fname, client_sname, client_street, client_suburb, client_state, client_pc, client_email, client_mobile) VALUES ('$_POST[fname]', '$_POST[lname]', '$_POST[street]', '$_POST[suburb]', '$_POST[state]', '$_POST[pc]', '$_POST[email]', '$_POST[mobile]')";
	if($conn->query($query)){ ?>
		<script language="JavaScript">
			alert("Client record was successfully added to the database.");
			window.location="client.php";
		</script>
<?php	
	} else {
?>
		<script language="JavaScript">
			alert("Error adding record. Contact System Administrator.");
			window.location="client_add.php";
		</script>
<?php	
	}	$conn->close();

   //header( 'Location: client.php') ; 
   //exit();

} 
	?>

    </body>
</html>
