<?php
ob_start()
    ?>
<html>
<head><title>Project Modify</title>
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
                      <li class="active"><a href="project.php">Projects</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>

            </ul>
        </nav>
    
<script language="javascript">
    function confirm_delete()
    {
        window.location='projectModify.php?project_id=<?php echo $_GET["project_id"];?>&Action=ConfirmDelete';
    }
</script>
<center><h3>Projects</h3></center>
<?php

include("connection.php");
    $conn = new mysqli($host, $userName, $pass, $dbName) or die("Could not log on to database");

    $query = "SELECT * FROM project WHERE project_id=".$_GET["project_id"];
    $result = $conn->query($query);
    $row = $result -> fetch_assoc();

    $strAction = $_GET["Action"];

    switch($strAction){
        
        case "Update":
            ?>
        <form method="post"  class="container" action="projectModify.php?project_id=<?php echo $_GET["project_id"]; ?>&Action=ConfirmUpdate">
        <center>Project Details Update<br></center><p><br>
        <table align="center" class="table" cellpadding="3">
            <tr>
                <td><b>ID</b></td>
                <td><?php echo $row["project_id"]; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="desc" size="30" value="<?php echo $row["project_desc"]; ?>"</td>
            </tr>
            <tr>
                <td>Purchase Price</td>
                <td><input type="text" name="country" size="30" value="<?php echo $row["project_country"]; ?>"</td>
            </tr>
            <tr>
                <td>Sale Price</td>
                <td><input type="text" name="city" size="30" value="<?php echo $row["project_city"]; ?>"</td>
            </tr>
        </table>
        <br>
        <table align="center">
            <tr>
                <td><input type="submit" value="Update"</td>
                    <td><input type="button" value="Cancel" onclick="window.location='project.php'"</td>
            </tr>
        </table>
        </form>
        <?php
                break;
        
        case "ConfirmUpdate":
        {
            $query = "UPDATE project SET project_desc='$_POST[desc]',project_country='$_POST[country]',project_city='$_POST[city]' WHERE project_id=".$_GET["project_id"];
            $result = $conn -> query(($query));
            header("Location: project.php");
        }
            break;
            case "Delete":
        ?>
            <center>Are you sure you want to delete this project?</center>
            <table align="center" cellpadding="5" >
                <tr>
                    <td><b>Project ID</b></td>
                    <td><?php echo $row["project_id"]; ?></td>
                </tr>
                <tr>
                    <td><b>Product Name</b></td>
                    <td><?php echo $row["project_desc"]; ?></td>
                </tr>
        </table>
        <br>
        <table align="center" cellpadding="3">
            <tr>
                <td><input type="button" value="Confirm" onclick="confirm_delete();"></td>
                <td><input type="button" value="Cancel" onclick="window.location='project.php'"></td>
            </tr>
        </table>
<?php
            break;
        
        case "ConfirmDelete":
            $query="DELETE FROM project WHERE project_id=".$_GET["project_id"];
            if($conn -> query($query)){
                ?>
        <center>
            The following product record has been successfully deleted <p>
            <?php
                echo "Project ID. $row[project_id]";
                echo"</center></p>";
            }
        else{
            echo "<center>Error deleting product record</center>";
        }
        echo "<center><input type='button' value='Back' onclick='window.location=\"project.php\"'></center>";
        break;
            }
    
$conn -> close();
?>
            </body>
</html>
