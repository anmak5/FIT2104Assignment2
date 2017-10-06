<?php 
    ob_start();
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Client List</title>
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

            </ul>
        </nav>
        <script language="javascript">
            function confirm_delete() {
                window.location = 'clientModify.php?client_id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmDelete';
            }
        </script>

        <center>
            <h3>Clients</h3></center>
        <?php 
    include("connection.php");
    $conn = new mysqli($host, $userName, $pass, $dbName) or die("Could not log on to database");

    $query = "SELECT * FROM client WHERE client_id=".$_GET["client_id"];
    $result = $conn->query($query);
    $row = $result -> fetch_assoc();

    $strAction = $_GET["Action"];

    switch($strAction){
        
        case "Update":
            ?>
        <form method="post"  class="container" action="clientModify.php?client_id=<?php echo $_GET["client_id"]; ?>&Action=ConfirmUpdate">
        <center>Client Details Update<br></center><p><br>
        <table align="center" class="table" cellpadding="3">
            <tr>
                <td><b>ID</b></td>
                <td><?php echo $row["client_id"]; ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" size="30" value="<?php echo $row["client_fname"]; ?>"</td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="gname" size="30" value="<?php echo $row["client_gname"]; ?>"</td>
            </tr>
            <tr>
                <td>Street Address</td>
                <td><input type="text" name="clientstreet" size="30" value="<?php echo $row["client_street"]; ?>"</td>
            </tr>
            <tr>
                <td>Suburb</td>
                <td><input type="text" name="suburb" size="30" value="<?php echo $row["client_suburb"]; ?>"</td>
            </tr>
            <tr>
                <td>State</td>
                <td><input type="text" name="state" size="30" value="<?php echo $row["client_state"]; ?>"</td>
            </tr>
            <tr>
                <td>Post Code</td>
                <td><input type="text" name="code" size="30" value="<?php echo $row["client_pc"]; ?>"</td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" size="30" value="<?php echo $row["client_email"]; ?>"</td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type="text" name="mobile" size="30" value="<?php echo $row["client_mobile"]; ?>"</td>
            </tr>
            <tr>
                <td>Mailing List</td>
                <td><input type="text" name="mailinglist" size="30" value="<?php echo $row["client_mailinglist"]; ?>"</td>
            </tr>
        </table>
        <br>
        <table align="center">
            <tr>
                <td><input type="submit" value="Update"</td>
                    <td><input type="button" value="Back" onclick="window.location='client.php'"</td>
            </tr>
        </table>
        </form>
        <?php
                break;
        
        case "ConfirmUpdate":
        {
            $query = "UPDATE client SET client_fname='$_POST[fname]',client_gname='$_POST[gname]',client_suburb='$_POST[suburb]',client_state='$_POST[state]',client_pc='$_POST[code]',client_email='$_POST[email]',client_mobile='$_POST[mobile]',client_mailinglist='$_POST[mailinglist]' WHERE client_id=".$_GET["client_id"];
            $result = $conn -> query(($query));
            header("Location: client.php");
        }
            break;
            case "Delete":
        ?>
            <center>Are you sure you want to delete this client?</center>
            <table align="center" cellpadding="5" >
                <tr>
                    <td><b>Client ID</b></td>
                    <td><?php echo $row["client_id"]; ?></td>
                </tr>
                <tr>
                    <td><b>Client Name</b></td>
                    <td><?php echo $row["client_fname"]; ?></td>
                </tr>
        </table>
        <br>
        <table align="center" cellpadding="3">
            <tr>
                <td><input type="button" value="Confirm" onclick="confirm_delete();"></td>
                <td><input type="button" value="Cancel" onclick="window.location='client.php'"></td>
            </tr>
        </table>
<?php
            break;
        
        case "ConfirmDelete":
            $query="DELETE FROM client WHERE client_id=".$_GET["client_id"];
            if($conn -> query($query)){
                ?>
        <center>
            The following customer record has been successfully deleted <p>
            <?php
                echo "Client ID. $row[client_id] $row[client_fname] $row[client_gname]";
                echo"</center></p>";
            }
        else{
            echo "<center>Error deleting customer record</center>";
        }
        echo "<center><input type='button' value='Back' onclick='window.location=\"client.php\"'></center>";
        break;
            }
    
$conn -> close();
?>
            </body>
</html>
        

            