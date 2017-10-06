<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);


    ?>
<html>
    <title>Add Product</title>
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
                 <li><a href="project.php">Projects</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>
      
    </ul>
</nav>
        <center><h3>New Product</h3></center>
        <?php
            if(empty($_POST["productname"])){
                ?>
        <center>Add</center>
        <form method="post" class="container" action="addproduct.php">
            <table align="center" class="table">
                <tr><td>Product Name</td>
                    <td><input type="text" name="productname" size="30"></td>
                </tr>
                <tr>
                    <td>Cost Price</td>
                    <td><input type="text" name="costprice" size="30"></td>
                </tr>
                <tr>
                    <td>Sale Price</td>
                    <td><input type="text" name="saleprice" size="30"></td>
                </tr>
                <tr>
                    <td>Country of Origin</td>
                    <td><input type="text" name="country" size="30"></td>
                </tr>
            </table>
            <table align="center">
                <tr>
                    <td><input type="submit" value="Add Product"></td>
                    <td><input type="button" value="Return to List" onclick="window.location.href='products.php'"></td>
                </tr>
            </table>
        </form>
<?php }
else{
    $query="INSERT INTO product (product_id, product_name, product_purchase_price, product_sale_price, product_country_of_origin) VALUES (NULL, '$_POST[productname]', '$_POST[costprice]', '$_POST[saleprice]', '$_POST[country]')";
if($conn -> query($query)){    ?>
        <script language="JavaScript">
			alert("Product record was successfully added to the database.");
			window.location="products.php";
		</script>
<?php
} else{
    ?>
        <script language="javascript">
            alert("Error adding record. Contact System Adminstrator");
            window.location="addproduct.php";
        </script>
<?php
        } $conn -> close();
}
?>
    </body>
</html>
