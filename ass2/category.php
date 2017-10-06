<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM category";
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
        <li ><a href="products.php">Products</a></li>
      <li><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li><a href="documentation.php">Documentation</a></li>
                 <li><a href="project.php">Projects</a></li>
                <li class="active"><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>
      
    </ul>
</nav>
    <center><h3>Products</h3></center>
<center><button type="button" class="button" onclick="window.location.href='addcategory.php'">Add Category</button></center><br><br>
        
        <table border="1" cellpadding="1" class="table">
            <thead>
                <th>CategoryID</th>
                <th>Name</th>
                <th>Edit Options</th>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $row["category_id"]; ?></td>
                    <td><?php echo $row["category_name"]; ?></td>
                    <td><a href="categoryModify.php?category_id=<?php echo $row["category_id"]; ?>&Action=Update">Update</a> <a href="categoryModify.php?category_id=<?php echo $row["category_id"]; ?>&Action=Delete">Delete</a></td>
                    
                    
                </tr>
            <?php
            }
    }
?>
            </tbody>
        </table>
        <br><br><br>
    </body>
    <a href="displaycode.php?filename=category.php"><img src="images/buttons/category.png"></a>
</html>