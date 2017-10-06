<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);


    ?>
<html>
    <title>Add Project</title>
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
           <li><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
                 <li class="active"><a href="project.php">Projects</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>
      
    </ul>
</nav>
        <center><h3>New Project</h3></center>
        <?php
            if(empty($_POST["projectdesc"])){
                ?>
        <center>Add</center>
        <form method="post" class="container" action="addproject.php">
            <table align="center" class="table">
                <tr><td>Description</td>
                    <td><input type="text" name="projectdesc" size="30"></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><input type="text" name="country" size="30"></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" size="30"></td>
                </tr>
            </table>
            <table align="center">
                <tr>
                    <td><input type="submit" value="Add Project"></td>
                    <td><input type="button" value="Return to List" onclick="window.location.href='project.php'"></td>
                </tr>
            </table>
        </form>
<?php }
else{
    $query="INSERT INTO project (project_id, project_desc, project_country, project_city) VALUES (NULL, '$_POST[projectdesc]', '$_POST[country]', '$_POST[city]')";
if($conn -> query($query)){    ?>
        <script language="JavaScript">
			alert("Project record was successfully added to the database.");
			window.location="projects.php";
		</script>
<?php
} else{
    ?>
        <script language="javascript">
            alert("Error adding record. Contact System Adminstrator");
            window.location="addproject.php";
        </script>
<?php
        } $conn -> close();
}
?>
    </body>
</html>
