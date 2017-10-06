<?php
/**
 * Created by PhpStorm.
 * User: maz
 * Date: 6/10/2017
 * Time: 11:23 AM
 */
include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM admin";
$result = $conn->query($query);



if($result){
    $result->data_seek(0);
}
?>
<html>

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
                <li class="active"><a href="sign_in.php">Sign In</a></li>
                <li><a href="documentation.php">Documentation</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>

            </ul>
        </nav>

        <h3>Sign In</h3>
        <form method="post" class="container" action="sign_in.php">
            <table align="center" cellpadding="3" class="table">
                <tr>
                    <td><b>Username</b></td>
                    <td><input type="text" name="username" size="30"></td>
                </tr>

                <tr>
                    <td><b>Password</b></td>
                    <td><input type="password" name="passwd" size="30"></td>
                </tr>

                <tr>
                    <td><input type="submit" value="Sign In" onclick="window.location.href='main.php'"</td>
                </tr>
            </table>
        </form>
    </body>

</html>

<?php
    $usName = $_POST['username'];
    $passWord = $_POST['passwd'];
    $sql ="SELECT * FROM admin WHERE uname ='$usName' AND password = '$passWord'";
    $result = $conn->query($sql);

    $validOutput = mysqli_num_rows($result);

    if($validOutput==1){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $usName;
    }