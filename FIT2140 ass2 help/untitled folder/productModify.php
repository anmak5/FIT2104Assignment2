<?php
ob_start()
    ?>
<html>
<head><title></title></head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<script language="javascript">
    function confirm_delete()
    {
        window.location='productModify.php?pname=<?php echo $_GET[pname];?>&Action=ConfirmDelete';
    }
</script>
<center><h3>Product Modification</h3></center>
<?php

$query="SELECT * FROM product WHERE productName=".$_GET["pname"];
$result = $conn-> query($query);
$row=$result->fetch_assoc();
$strAction=$_GET["Action"];
switch($strAction)
{
case "Update":
    ?>
<form method="post" action="productModify.php?
productName=<?php echo $_GET["pname"]; ?>&Action=ConfirmUpdate">
   Product details amendment<br /><p />
    <table align="center" cellpadding="3">
        <tr />
        <td><b>Product Name</b></td>
        <td> <input type="text" name="ppname" size="30"
                    value="<?php echo $row["productName"]; ?>">
        </td>

        </tr>
        <tr>
            <td><b>Product Price</b></td>
            <td>
                <input type="text" name="pprice" size="10"
                       value="<?php echo $row["productPrice"]; ?>">
            </td>
        </tr>
    </table>
    <br/>
    <table align="center">
        <tr>
            <td><input type="submit" value="Update Product"></td>
            <td><input type="button" value="Return to List" onclick="window.location='product.php'"</td>
        </tr>
    </table>
</form>
    <?php
        break;
    case "ConfirmUpdate":
        $query="UPDATE product set productName='$_POST[ppname]',
productPrice='$_POST[pprice]' WHERE productName =".$_GET["pname"];
        $result= $conn->query($query);
        header("Location: product.php");
        break;
case "Delete":

?>
<center>Confirm deletion of the following product record<br /></center><p />
<table align="center" cellpadding="3">
    <tr />
    <td><b>Product Name</b></td>
    <td><?php echo $row["productName"]; ?></td>
    </tr>
    <tr>
        <td><b>Product Price</b></td>
        <td><?php echo $row["productPrice"]; ?></td>
    </tr>
</table>
<br/>
<table align="center">
    <tr>
        <td><input type="button" value="Confirm" OnClick="confirm_delete();">
        <td><input type="button" value="Cancel" OnClick="window.location='product.php'"></td>
    </tr>
</table>
<?php
    break;
case "ConfirmDelete":
    $query="DELETE FROM product WHERE productName=".$_GET[pname];
    if($conn->query($query))
    {
    ?>
        The following product record has been successfully deleted<br />
        <?php echo "Product Name ".$row["productName"] ." Product Price ".$row["productPrice"];
    }
    else
    {
        echo "Error deleting customer record<p />";
    }
    echo "<input type='button' value='Return to List'
OnClick='window.location=\"product.php\"'>";
    break;

}
$result->free_result();
$conn->close();
?>
</body>
</html>
