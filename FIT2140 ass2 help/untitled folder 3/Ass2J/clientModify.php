
<?php
ob_start();
session_start();

if (isset($_GET["id"]) && isset($_GET["Action"]))
{
    $_SESSION["id"] = $_GET["id"];
    $_SESSION["Action"] = $_GET["Action"];
}
$custid = $_SESSION["id"];
$Action = $_SESSION["Action"];
?>

<html>
<body>
<?php
include("connection.php");
$conn = new mysqli($Host, $UName, $PWord, $DB) or die ("Could not connect to database.");

$query="SELECT * FROM CUSTOMER WHERE CUST_ID = ".$custid;
$stmt = $conn->query($query);
//oci_execute($stmt);
$row = $stmt->fetch_array();
include("functions.php");
if (login("client.php"))
{
    switch ($Action)
    {
        case "Update":
            Update($row);
            break;
        case "ConfirmUpdate":
            ConfirmUpdate();
            break;
        case "Delete":
            Del();
            break;
        case "ConfirmDelete":
            ConfirmDel();
            break;
        case "View":
            View();
            break;
    }
}
//oci_close($conn);
?>
</body>
</html>

<!-- FUNCTIONS -->

<?php
function Update()
{
    global $conn;
    global $custid;
    global $row;

    ?>
    <form method = "post" action = "CustModify.php?custid=<?php echo $custid;?>&Action=ConfirmUpdate">
        <center>Testing<br/></center>

        <table align ="center" cellpadding="3">

            <tr>
                <td><b>ID</b></td>
                <td><?php echo $row["id"];?></td>
            </tr>

            <tr>
                <td><b>First Name</b></td>
                <td><input type="text" name="fname" size="30" value="<?php echo $row["fname"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Last Name</b></td>
                <td><input type="text" name="lname" size="30" value="<?php echo $row["lname"]; ?>"></td>
            </tr>


            <tr>
                <td><b>Street Address</b></td>
                <td><input type="text" name="street" size="30" value="<?php echo $row["street"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Suburb</b></td>
                <td><input type="text" name="suburb" size="30" value="<?php echo $row["suburb"]; ?>"></td>
            </tr>

            <tr>
                <td><b>State</b></td>
                <td><input type="text" name="state" size="30" value="<?php echo $row["state"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Postcode</b></td>
                <td><input type="text" name="pc" size="30" value="<?php echo $row["pc"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td><input type="text" name="email" size="30" value="<?php echo $row["email"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Mobile</b></td>
                <td><input type="text" name="mobile" size="30" value="<?php echo $row["mobile"]; ?>"></td>
            </tr>

            <tr>
                <td><b>Mailing List</b></td>
                <td><input type="text" name="mailinglist" size="30" value="<?php echo $row["mailinglist"]; ?>"></td>
            </tr>

        </table> <br/>

        <table align="center">
            <tr>
                <td><input type = "submit" value = "Update Customer"></td>
                <td><input type = "button" value = "Return to List" onclick="window.location.href='client.php';"/></td>
            </tr>
        </table>
    </form>

    <?php
}
function ConfirmUpdate()
{
    global $conn;
    global $custid;

    $query="UPDATE client set 
        fname = '$_POST[fname]',
		lname = '$_POST[lname]',
		street = '$_POST[street]',
		suburb = '$_POST[suburb]',
		state = '$_POST[state]',
		pc = '$_POST[pc]',
		email = '$_POST[email]',
		mobile = '$_POST[mobile]',
		mailinglist = '$_POST[mailinglist]',
		WHERE id = ".$custid;

    $stmt = $conn->query($query);

    $row = $stmt->fetch_array();

//    oci_execute($stmt);
//    oci_free_statement($stmt);
    header("Location: client.php");
    exit;
}
function Del()
{
    global $conn;
    global $custid;

    ?>
    <center>
    <script language="javascript">
        var text =  "Are you sure you want to delete <?php echo $custid;?>?"
        if(window.confirm(text))
        {
            window.location='clientModify.php?custid=<?php echo $custid; ?>&Action=ConfirmDelete';
        }else
        {
            window.location='client.php';
        }
    </script>
    </center><?php
}
function ConfirmDel()
{
    global $conn;
    global $custid;

    $query="DELETE FROM Customer WHERE cust_id = ".$custid;

    $stmt = $conn->query($query);

    $row = $stmt->fetch_array();
    header("Location: customers.php");
    exit;
}
?>
<?php
function View()
{
    global $conn;
    global $propid;
    global $row;
    ?>
    <center>View Client<br/></center>

    <table align ="center" cellpadding="3">

        <tr>
            <td><b>ID</b></td>
            <td><?php echo $row["id"];?></td>
        </tr>

        <tr>
            <td><b>First name</b></td>
            <td><?php echo $row["fname"]; ?></td>
        </tr>

        <tr>
            <td><b>Last name</b></td>
            <td><?php echo $row["lname"]; ?></td>
        </tr>

        <tr>
            <td><b>Home phone</b></td>
            <td><?php echo $row["street"]; ?></td>
        </tr>

        <tr>
            <td><b>Mobile phone</b></td>
            <td><?php echo $row["suburb"]; ?></td>
        </tr>

        <tr>
            <td><b>Email</b></td>
            <td><?php echo $row["state"]; ?></td>
        </tr>

        <tr>
            <td><b>Mailing list</b></td>
            <td><?php echo $row["pc"]; ?></td>
        </tr>

        <tr>
            <td><b>Country</b></td>
            <td><?php echo $row["email"]; ?></td>
        </tr>

        <tr>
            <td><b>State</b></td>
            <td><?php echo $row["mobile"]; ?></td>
        </tr>

        <tr>
            <td><b>City</b></td>
            <td><?php echo $row["mailinglist"]; ?></td>
        </tr>

    </table> <br/>

    <table align="center">
        <tr>
            <td><input type = "button" value = "Return to List" onclick="window.location.href='client.php';"/></td>
        </tr>
    </table>
    <?php
}
?>


	
