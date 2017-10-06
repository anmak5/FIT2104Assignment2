<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);
$query = "SELECT * FROM productimage";
$result = $conn->query($query);
$directory = "./images/";

$gallery = glob($directory."*.jpg");
$details = $conn->query($query);

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
            <li><a href="sign_in.php">Sign In</a></li>
            <li><a href="sign_out.php">Sign Out</a></li>
        </ul>
        </nav>

        <center><h3>Images View</h3></center>
        <table border="1" cellpadding=""1">
        <thead>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        </thead>
        <tbody>
        <?php
            foreach($gallery as $image) {
                $query2 = "SELECT * FROM productimage WHERE image_name = '$image'";
                $result2 = $conn->query($query2)
                ?>
                <tr>
                    <td><?php echo "<img src=" . $image . ">"; ?></td>
                    <td><?php

                            if (mysqli_num_rows($result2) > 0) {
                                echo $result2["image_name"];
                            }

                        ?>
                    </td>
                    <td><input type="checkbox"</td>
                <!--<td></td>-->
                </tr>
                <?php
            }
        ?>
        </tbody>
        </table>
    </body>
</html>