<?php 

echo "Today is ",date('d/m/y'); 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM product";
$result = $conn->query($query);
;


if($result){
    $result->data_seek(0);
    ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" language="javascript" src="extension.js"></script>
    </head>
    <body>
    <form method="get" action="week7.1.php">
        <table border="1" cellpadding="1">
            <thead>
                <th>ProductID</th>
                <th>Name</th>
                <th>Price</th>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["product_id"]; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_sale_price"]; ?></td>
                    <td><button type="button" onclick="update(<?php echo $row["product_id"] ?>)">Update</button></td>
                    <td><button type="button" onclick="delete(<?php echo $row["product_id"] ?>)">Delete</button></td>
                    
                </tr>
            <?php
            }
    }
?>
            </tbody>
        </table>
        </form>
        <br><br><br>
        <table border="1" cellpadding="5">
            <tr>
                <th>Category</th>
            </tr>
            <tr>
                <td>Decoration</td>
            <td><input type="checkbox" name="check[]" value="yes" checked="false"></td>
                
            </tr>
        </table>
    </body>
</html>