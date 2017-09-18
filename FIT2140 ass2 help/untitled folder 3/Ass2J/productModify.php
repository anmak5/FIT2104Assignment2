<html>
<body>
<?php
include("connection.php");
$conn = oci_connect($UName,$PWord,$DB) or die ("Could not connect to database.");

$query="SELECT * FROM product WHERE id = ".$id;
$stmt = oci_parse($conn,$query);
oci_execute($stmt);
$row = oci_fetch_array($stmt);
include("functions.php");
if (login("CustModify.php"))
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
oci_close($conn);
?>
</body>
</html>