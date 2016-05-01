<?php
$servername = "sylvester-mccoy-v3";
$username = "inf124grp33";
$password = "pux=C2ur";
try {
    $conn = new PDO("mysql:host=$servername;dbname=inf124grp33", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<?php

$pid = $_GET['productid'];
echo $pid;
define('ABSPATH', dirname(__FILE__));
$path = ABSPATH . '/ProductDetail.php?productid=';
//echo $_SERVER['REQUEST_URI'];
$path2 = $_SERVER['REQUEST_URI'] . '?productid=';
echo $path2;
 

?>



<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> hpblack</title>
		<meta charset = "utf-8">
		<meta name = "Description", content = "Product Details">
		<meta name = "keywords", content = "IMAGE, PRICE, INFO">
		<meta name = "author", content = "Jessica Zeng Chen Lu">
	
		<link rel="stylesheet" href="css/product_detail.css" type="text/css">	
	</head>
<body class = "body">
	<hearder id=header>
	<h1>BEST Electronics</h1>

  <nav><ul>
    <li><a href="Homepage.html">Home</a></li>
    <li><a href="About.html">About</a></li>
    <li class="dropdown">
    <a href="#" class="dropbtn">Products</a>
    <div class="dropdown-content">
      <a href="cellphone.html">Cellphones</a>
      <a href="laptop.html">Laptops</a>
      <a href="tablet.html">Tablets</a>
    </div>
    </li>
    <li><a href="Contact.html">Contact</a></li>
  </ul>
  </nav  
 </hearder>
  <div class ="pagebanner">
  	<!-- <h1 class="title-banner">Cellphones</h1> -->
  	<img src="img/ebanner.jpg" alt="cellphone_banner" >
  </div>
 
	<div id="row2">
		<ul>
			<li><a href="Homepage.html">Home</a></li>
			<li> > </li>
    		<li><a href="laptop.html">Category</a></li>
    		<li> > </li>
    		<li class="active">Now</li>
		</ul>
	</div>

<div id = "row3">
    <div id = "info">

<?php

$stmt = $conn->query("SELECT * FROM products where product_id = $pid");


?>

<?php
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

			<table id = "product_detail">
				<tr><h1 id = "title"> <?php echo $row['product_name'] ?> </h1></tr>
				<tr><h3 id = "price"><?php echo "Price $" . $row['price'] ?></h3></tr>
				<tr><h3 id = "ship">Free Shipping</h3></tr>
				<tr><a href = "form.php?productid=<?php echo $row['product_id']?> "/><img id ="buy" src = "img/buy.jpg" alt = "buy now" style = "width:200px;height:80px;"></a></tr>
				<tr><p id = "details"><?php echo $row['description'] ?></p>
				</tr>
				<tr><h4 id = "feature_title">Product Features</h4>
					<div id ="feature">
					<?php
						$feature = explode(",",$row['features']);
                                                $a=true;
						while  (list(,$value) = each($feature)){
					?>
                                            <?php 
                                            if ($a === true){
                                                
                                            ?>
                                                <p style ="background-color:#C8CBCC"><?php echo $value ?></p>
                                            <?php $a = false;
                                            ?>
                                             <?php
                                                } else  { ?>
                                                        <p><?php echo $value ?></p>
                                        <?php
                                                 $a = true;
                                            ?>
                                               
                                                <?php } ?>
					
				<?php } ?>	
				</div>
				</tr>
			</table>
		</div>		
		<div id = "picture">
			<div id = "item1"><img  src= <?php echo $row['image'] ?> alt = "accer" ></div>
			<div id = "item2"><img  src = <?php echo $row['image'] ?>alt = "accer"></div>
			<div id = "item3"><img  src = <?php echo $row['image'] ?> alt = "accer"></div>	
		</div>
	</div>

<?php } ?>

	



</body>
<div class = "footer">
	<h5> 2016 E-BestMart.com, all rights reserved.</h5>
<div>
</html>
