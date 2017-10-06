<?php 

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
           <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
       <ul class="nav navbar-nav">
      <li ><a href="main.php">Home</a></li>
        <li class="active"><a href="products.php">Products</a></li>
      <li><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li><a href="documentation.php">Documentation</a></li>
      
    </ul>
</nav>
    <center><h3>Products</h3></center>
<center><button type="button" class="button" onclick="window.location.href='addproduct.php'">Add Product</button></center><br><br>
        
    <form method="get" class="container" action="products.php">
        <table border="1" cellpadding="1" class="table">
            <thead>
                <th>ProductID</th>
                <th>Name</th>
                <th>Cost Price</th>
                <th>Sale Price</th>
                <th>Country of Origin</th>
                <th>Edit Options</th>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["product_id"]; ?></td>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td><?php echo $row["product_purchase_price"]; ?></td>
                    <td>$<?php echo $row["product_sale_price"]; ?></td>
			         <td><?php echo $row["product_country_of_origin"]; ?></td>
                    <td><button type="button" onclick="update(<?php echo $row["product_id"] ?>)">Update</button> <button type="button" onclick="delete(<?php echo $row["product_id"] ?>)">Delete</button></td>
                    
                    
                </tr>
            <?php
            }
    }
?>
            </tbody>
        </table>
        </form>
        <br><br><br>
    </body>
</html>