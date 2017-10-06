<?php
ob_start()
    ?>
<html>
<head><title>Category Modify</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>
    
<body>
     <nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
            <ul class="nav navbar-nav">
                <li><a href="main.php">Home</a></li>
                <li ><a href="products.php" id="results">Products</a></li>
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
    
<script language="javascript">
    function confirm_delete()
    {
        window.location='categoryModify.php?category_id=<?php echo $_GET["category_id"];?>&Action=ConfirmDelete';
    }
</script>
<center><h3>Projects</h3></center>
<?php

include("connection.php");
    $conn = new mysqli($host, $userName, $pass, $dbName) or die("Could not log on to database");

    $query = "SELECT * FROM category WHERE category_id=".$_GET["category_id"];
    $result = $conn->query($query);
    $row = $result -> fetch_assoc();

    $strAction = $_GET["Action"];

    switch($strAction){
        
        case "Update":
            ?>
        <form method="post"  class="container" action="categoryModify.php?category_id=<?php echo $_GET["category_id"]; ?>&Action=ConfirmUpdate">
        <center>Category Update<br></center><p><br>
        <table align="center" class="table" cellpadding="3">
            <tr>
                <td><b>ID</b></td>
                <td><?php echo $row["category_id"]; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" size="30" value="<?php echo $row["category"]; ?>"</td>
            </tr>
        </table>
        <br>
        <table align="center">
            <tr>
                <td><input type="submit" value="Update"</td>
                    <td><input type="button" value="Cancel" onclick="window.location='category.php'"</td>
            </tr>
        </table>
        </form>
        <?php
                break;
        
        case "ConfirmUpdate":
        {
            $query = "UPDATE category SET category_name='$_POST[name]' WHERE category_id=".$_GET["category_id"];
            $result = $conn -> query(($query));
            header("Location: category.php");
        }
            break;
            case "Delete":
        ?>
            <center>Are you sure you want to delete this category?</center>
            <table align="center" cellpadding="5" >
                <tr>
                    <td><b>ID</b></td>
                    <td><?php echo $row["category_id"]; ?></td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td><?php echo $row["category_name"]; ?></td>
                </tr>
        </table>
        <br>
        <table align="center" cellpadding="3">
            <tr>
                <td><input type="button" value="Confirm" onclick="confirm_delete();"></td>
                <td><input type="button" value="Cancel" onclick="window.location='category.php'"></td>
            </tr>
        </table>
<?php
            break;
        
        case "ConfirmDelete":
            $query="DELETE FROM category WHERE category_id=".$_GET["category_id"];
            if($conn -> query($query)){
                ?>
        <center>
            The following category has been successfully deleted <p>
            <?php
                echo "Project ID. $row[category_id]";
                echo"</center></p>";
            }
        else{
            echo "<center>Error deleting category</center>";
        }
        echo "<center><input type='button' value='Back' onclick='window.location=\"category.php\"'></center>";
        break;
            }
    
$conn -> close();
?>
            </body>
</html>
