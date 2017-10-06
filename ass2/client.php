<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);

$query = "SELECT * FROM client";
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
                <li><a href="main.php">Home</a></li>
                <li><a href="products.php" id="results">Products</a></li>
                <li class="active"><a href="client.php">Clients</a></li>
                <li><a href="product_multiple.php">Multiple Edit</a></li>
                <li><a href="productcategory.php">ProductCategory</a></li>
                <li><a href="images.php">Images</a></li>
                <li><a href="documentation.php">Documentation</a></li>
                      <li><a href="project.php">Projects</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>

            </ul>
        </nav>
        <html>

        <head>
            <meta charset="UTF-8">
            <title></title>
        </head>

        <body>

            <center>
                <h3>Clients</h3></center>
            <center>
                <button type="button" class="button" onclick="window.location.href='addclient.php'">Add Client</button>
            </center>
            <br>
            <br>
                <table border="1" class="table">

                    <tr>
                        <thead>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Street Address</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Post Code</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Mailing List</th>
                            <th>Edit Options</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result))
			{
		?>

                            <tr>
                                <td>
                                    <?php echo $row["client_id"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_fname"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_gname"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_street"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_suburb"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_state"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_pc"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_email"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_mobile"]; ?>
                                </td>
                                <td>
                                    <?php echo $row["client_mailinglist"]; ?>
                                </td>
                                <td>
                                    <a href="clientModify.php?client_id=<?php echo $row["client_id"]; ?>&Action=Update">Update</a> <a  href="clientModify.php?client_id=<?php echo $row["client_id"];?>&Action=Delete">Delete</a></td>
                                <td><?php if($row["client_mailinglist"] == "YES"){ ?>
                                    <a href="clientEmail.php?client_email=<?php echo $row["client_email"];?>">Email</a>
       <?php }?>
                                </td>

                            </tr>

                            <?php
			}
		?>
                    </tbody>
                </table>

        </body>
<a href="displaycode.php?filename=client.php"><img src="images/buttons/client.png"></a>

        </html>