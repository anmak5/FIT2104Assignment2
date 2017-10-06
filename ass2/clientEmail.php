<?php 

include("connection.php");
$conn = new mysqli($host, $userName, $pass, $dbName);


    ?>
<html>
    <title>Add Product</title>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation" style="padding-left:130px;">
       <ul class="nav navbar-nav">
      <li ><a href="main.php">Home</a></li>
        <li ><a href="products.php" id="results">Products</a></li>
      <li class="active"><a href="client.php">Clients</a></li>
           <li><a href="product_multiple.php">Multiple Edit</a></li>
           <li><a href="productcategory.php">ProductCategory</a></li>
           <li><a href="images.php">Images</a></li>
           <li ><a href="documentation.php">Documentation</a></li>
                 <li><a href="project.php">Projects</a></li>
                <li><a href="category.php">Category</a></li>
                <li><a href="sign_in.php">Sign In</a></li>
                <li><a href="sign_out.php">Sign Out</a></li>
      
    </ul>
</nav>
        <center><H3>PHP Email</H3></center> 
<?php 
if (!isset($_POST["to"])) 
{ 
?> 
<form method="post" action="clientEmail.php"> 
<table border="0" width="100%"> 
<tr> 
<td>To</td> 
<td><input type="text" name="to" size="45" value="<?php echo $_GET["client_email"]; ?>"</td> 
</tr> 
<tr> 
<td>Subject</td> 
<td><input type="text" name="subject" size="45"></td> 
</tr> 
<tr> 
<td>Message</td> 
<td valign="top" align="left"> 
<textarea cols="68" name="message" rows="9"></textarea> 
</td> 
</tr> 
<tr> 
<td colspan="2"><br /><br /><input type="submit" value="Send Email"> 
<input type="reset" value="Reset"> 
</td> 
</tr> 
</table> 
</form> 
<?php 
} 
else 
{ 
$from = "From: Janet Fraser <anmak5@student.monash.edu.au>"; 
$to = $_POST["to"]; 
$msg = $_POST["message"]; 
$subject = $_POST["subject"]; 
if(mail($to, $subject, $msg, $from)) 
{ 
echo "Mail Sent"; 
} 
else 
{ 
echo "Error Sending Mail"; 
} 
} 
?> 
    </body>
</html>
