<?php 

echo "Today is ",date('d/m/y'); 

$host = "130.194.7.82";
$userName = "s25570862";
$pass = "whatever001";
$dbName = "s25570862";

$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM product";
$result = $conn->query($query);


if($result){
    $result->data_seek(0);
    ?>
<html>
    <head>
        <script type="text/javascript" language="javascript" src="extension.js"></script>
    </head>
    <body>
        <table border="1" cellpadding="1">
            <thead>
                <th>ProductID</th>
                <th>Name</th>
                <th>Price</th>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["ProdcutID"]; ?></td>
                    <td><?php echo $row["Description"]; ?></td>
                    <td><?php echo $row["Price"]; ?></td>
                    <td><button type="button" onclick="update(<?php echo $row["ProdcutID"] ?>)">Update</button></td>
                    <td></td>

                </tr>
            <?php
            }
    }
?>
            </tbody>
        </table>
    </body>
</html>
    
