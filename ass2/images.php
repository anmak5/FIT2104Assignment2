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
        <li><a href="products.php" id="results">Products</a></li>
      <li><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li class="active"><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
      
    </ul>
</nav>

    </body>
</html>
