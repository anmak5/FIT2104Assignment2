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
		</script>
<?php	
	} else {
?>
		<script language="JavaScript">
			alert("Error adding record. Contact System Administrator.");
		</script>
<?php	
	}	$conn->close();

   header( 'Location: client.php' ) ;

} 
	?>
</body>























