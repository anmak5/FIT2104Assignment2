<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);


    ?>
<html>
    <title>Add Category</title>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
       <ul class="nav navbar-nav">
      <li ><a href="main.php">Home</a></li>
        <li ><a href="products.php" id="results">Products</a></li>
      <li><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
                 <li><a href="project.php">Projects</a></li>
                <li class="active"><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>
      
    </ul>
</nav>
        <center><h3>New Category</h3></center>
        <?php
            if(empty($_POST["name"])){
                ?>
        <center>Add</center>
        <form method="post" class="container" action="addcategory.php">
            <table align="center" class="table">
                <tr><td>Category Name</td>
                    <td><input type="text" name="name" size="30"></td>
                </tr>
            </table>
            <table align="center">
                <tr>
                    <td><input type="submit" value="Add Category"></td>
                    <td><input type="button" value="Return to List" onclick="window.location.href='category.php'"></td>
                </tr>
            </table>
        </form>
<?php }
else{
    $query="INSERT INTO category (category_id, category_name) VALUES (NULL, '$_POST[name]')";
        if($conn -> query($query)){    ?>
        <script language="JavaScript">
			alert("Product record was successfully added to the database.");
			window.location="category.php";
		</script>
<?php
} else{
    ?>
        <script language="javascript">
            alert("Error adding record. Contact System Adminstrator");
            window.location="addcategory.php";
        </script>
<?php
        } $conn -> close();
}
?>
    </body>
</html>
