<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<center><h3>Customer Details</h3></center>
<form method="post" action="insert.php">
    <center>Welcome to our Web Site<p />
        Please enter your details for our database</center>
    <table border = "1" align="center">
        <tr>
            <th>first name</th><th>surname</th>
            <th>address</th><th>contact</th>
        </tr>
        <tr>
            <td><input type="text" size="20" name="fname"></td>
            <td><input type="text" size="20" name="sname"></td>
            <td><input type="text" size="40" name="address"></td>
            <td><input type="text" size="10" name="contact"></td>
        </tr>
    </table>
    <p />
    <center>
        <input type="submit" value="Add Details">
        <input type="reset" value="Clear Details">
    </center>
</form>
</body>
</html>

<?php

    $conn = mysqli_connect("130.194.7.82","s25520741","8969418", "s25520741")
    or die("Couldn't log on to database");
    $query="INSERT INTO customer (firstname,surname,address,contact)VALUES('$_POST[fname]', '$_POST[sname]','$_POST[address]',
'$_POST[contact]')";


    if($conn->query($query))
{
?>
<script language="JavaScript">
    alert("Customer record successfully added to database");
</script>
<?php }
else
{
?>
<script language="JavaScript">
    alert("Error adding record. Contact System Administrator");
</script>
<?php
$result->free_result();
$conn->close();
}
?>

