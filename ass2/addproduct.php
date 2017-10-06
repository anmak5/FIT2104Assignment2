<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM product";
$result = $conn->query($query);



if($result){
    $result->data_seek(0);
}
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
        <li class="active"><a href="products.php" id="results">Products</a></li>
      <li><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
      
    </ul>
</nav>
        <form method="post" class="container" action="addproduct.php">
            <table class="table">
                <tr><td>Product Name</td>
                    <td><input type="text" name="productname"></td>
                </tr>
                <tr>
                    <td>Cost Price</td>
                    <td><input type="text" name="costprice"></td>
                </tr>
                <tr>
                    <td>Sale Price</td>
                    <td><input type="text" name="saleprice"></td>
                </tr>
                <tr>
                    <td>Country of Origin</td>
                    <td><input type="text" name="country"></td>
                </tr>
            </table>
            <table align="center">
                <tr>
                    <td><input type="submit" value="Add Product"></td>
                    <td><input type="button" value="Return to List" onclick="window.location.href='products.php'"></td>
                </tr>
            </table>
        </form>

    </body>
</html>
