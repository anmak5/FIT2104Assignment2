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
    <form method="post" action="addClient.php">
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
<?php
}
else
{
include("connection.php");
$conn = oci_connect($UName,$PWord,$DB) or die("Couldn't logon.");
$query="INSERT INTO CUSTOMER VALUES (cust_seq.nextval, '$_POST[cust_fname]', '$_POST[cust_lname]', '$_POST[cust_homephone]', '$_POST[cust_mobilephone]',
		'$_POST[cust_email]', '$_POST[cust_mailinglist]', '$_POST[cust_country]', '$_POST[cust_state]', '$_POST[cust_city]',
		'$_POST[cust_postcode]', '$_POST[cust_street]')" ;

$stmt = oci_parse($conn,$query);
//oci_execute($stmt);
if(@oci_execute($stmt))
{
?>
    <script language="JavaScript">
        alert("Customer record successfully added to database");
    </script>
<?php


$query = "SELECT * FROM Customer";
$stmt = oci_parse($conn,$query);
oci_execute($stmt);
?>
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Home phone/th>
            <th>Mobile phone</th>
            <th>Email</th>
            <th>Mailing list</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Postcode</th>
            <th>Street</th>
        </tr>
        <?php
        while ($row = oci_fetch_array ($stmt))
        {
            ?>
            <tr>
                <td><?php echo $row["CUST_ID"];  ?></td>
                <td><?php echo $row["CUST_FNAME"];  ?></td>
                <td><?php echo $row["CUST_LNAME"];  ?></td>
                <td><?php echo $row["CUST_HOMEPHONE"];  ?></td>
                <td><?php echo $row["CUST_MOBILEPHONE"];  ?></td>
                <td><?php echo $row["CUST_EMAIL"];  ?></td>
                <td><?php echo $row["CUST_MAILINGLIST"];  ?></td>
                <td><?php echo $row["CUST_COUNTRY"];  ?></td>
                <td><?php echo $row["CUST_STATE"];  ?></td>
                <td><?php echo $row["CUST_CITY"];  ?></td>
                <td><?php echo $row["CUST_POSTCODE"];  ?></td>
                <td><?php echo $row["CUST_STREET"];  ?></td>

            </tr>
            <?php
        }
        ?>
    </table>
    <p><a href="customers.php">Back</a></p>
<?php

}

else
{
?>

    <script language="JavaScript">
        alert("Error adding record. Contact System Administrator");
    </script>
    <?php
}
    oci_free_statement($stmt);
    oci_close($conn);
    //header("Location: customers.php");
} ?>























