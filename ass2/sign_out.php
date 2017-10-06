<?php
/**
 * Created by PhpStorm.
 * User: maz
 * Date: 6/10/2017
 * Time: 12:55 PM
 */
    session_start();
    session_destroy();
    ?>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>Sign In</title>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
    <ul class="nav navbar-nav">
        <li ><a href="main.php">Home</a></li>
        <li><a href="products.php" id="results">Products</a></li>
        <li><a href="client.php">Clients</a></li>
        <li><a href="product_multiple.php">Multiple Edit</a></li>
        <li><a href="productcategory.php">ProductCategory</a></li>
        <li><a href="images.php">Images</a></li>
        <li><a href="sign_in.php">Sign In</a></li>
        <li><a href="documentation.php">Documentation</a></li>
        <li class="active"><a href="sign_out.php">Sign Out</a></li>

    </ul>
</nav>
<?php
echo "You have been logged out";
?>
