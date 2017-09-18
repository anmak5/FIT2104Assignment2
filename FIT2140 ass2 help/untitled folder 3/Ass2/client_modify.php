<?php
ob_start();
?>
<html>
<head>
</head>
<body>
<h1 align="center">Client Modification</h1>
<?php
include("config/connection.php");
$conn = new mysqli($Host, $UName, $PWord, $DB) or die("Couldn't log onto database");
$query = "SELECT * FROM client WHERE client_id =" . $_GET['client_id'];
$result = $conn->query($query);
$row = $result->fetch_assoc();

$strAction = $_GET["Action"];
switch ($strAction) {
    case "Update":
        ?>
        <form method="post" action="client_modify.php?id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmUpdate">
            <h2 align="center">Client Details Update<br/></h2>
            <table align="center" cellpadding="3">
                <tr>
                    <td><b>Client ID</b></td>
                    <td><?php echo $row["client_id"]; ?></td>
                </tr>
                <tr>
                    <td><b>First name</b></td>
                    <td><input type="text" name="client_fname" size="30" value="<?php echo $row["client_fname"]; ?>"></td>
                </tr>
                <tr>
                    <td><b>Last Name</b></td>
                    <td><input type="text" name="client_lname" size="30" value="<?php echo $row["client_lname"]; ?>"></td>
                </tr>
                <tr>
                    <td><b>Mobile</b></td>
                    <td><input type="text" name="client_mobile" size="20" value="<?php echo $row["client_mobile"]; ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Update Client"></td>
                    <td><input type="button" value="Return to List" onclick="window.location='client.php'"></td>
                </tr>
            </table>
        </form>
        <?php
        break;

    case "ConfirmUpdate":
        $query = "UPDATE client SET client_fname='" . $_POST['client_fname'] . "', client_lname='" . $_POST['client_lname'] . "', client_mobile='" . $_POST['client_mobile'] . "' WHERE client_id=" . $_GET['client_id'];
        if ($conn->query($query) === true) {
            echo "<p align='center'>Updated Successfully</p>";
        } else {
            echo "<p align='center'>Error Updating - " . $conn->error . "</p>";
        }
        echo "<p align='center'><input type='button' value='Return to List' onclick='window.location=\"client.php\"'></p>";
        break;

    case "Delete":
        ?>
        <form method="post" action="client_modify.php?client_id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmDelete">
            <h2 align="center">Confirm deletion of the following client record</h2>
            <table align="center" cellpadding="3">
                <tr>
                    <td><b>Client ID</b></td>
                    <td><?php echo $row["client_id"]; ?></td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td><?php echo $row["client_fname"] . " " . $row["client_lname"]; ?></td>
                </tr>
            </table>
            <br/>
            <table align="center">
                <tr>
                    <td><input type="submit" value="Confirm"></td>
                    <td><input type="button" value="Cancel" onclick="window.location='client.php'"></td>
                </tr>
            </table>
        </form>
        <?php
        break;

    case "ConfirmDelete": {
        $query = "DELETE FROM client WHERE client_id=" . $_GET['client_id'];
        if ($conn->query($query) === true) {
            ?>
            <p align='center'>The following client record has been successfully deleted:</p>
            <?php
            echo "<p align='center'>Client ID: " . $row['client_id'] . " - " . $row['client_fname'] . " " . $row['client_lname'] . "</p>";
        } else {
            echo "<p align='center'>Error deleting record - " . $conn->error . "</p>";
        }
        ?> <p align='center'><input type="button" value="Return to List" onclick="window.location.href='client.php'"></p> <?php
    }
}
$result->free_result();
$conn->close();
?>
</body>
</html>
