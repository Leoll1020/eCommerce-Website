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


	?>

<?php

$stmt = $conn->query("SELECT * FROM products where product_id = $pid");


echo '<table border="1">'."\n";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo("<tr><td>");
    echo($row['product_id']);
    echo("</td><td>");
    echo($row['price']);
    echo("</td><td>");
    echo($row['product_name']);
    echo("</td><td>");
    echo($row['description']);
    echo("</td><td>");
    echo($row['features']);
    echo("</td><td>");
   echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
    echo("</td><td>");
     echo("</td></tr>");


}
echo "</table>\n";?>
?>


<!DOCTYPE html>
<html lang = "en">
	<head>
		<title> hpblack</title>
		<meta charset = "utf-8">
		<meta name = "Description", content = "Product Details">
		<meta name = "keywords", content = "IMAGE, PRICE, INFO">
		<meta name = "author", content = "Jessica Zeng Chen Lu">
		<link rel="stylesheet" href="css/product_detail.css">		
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
			<table id = "product_detail">
				<tr><h1 id = "title">HP Black Licorice 15.6" 15-F387WM Laptop PC</h1></tr>
				<tr><h3 id = "price">Price: $320</h3></tr>
				<tr><h3 id = "ship">Free Shipping</h3></tr>
				<tr><a href = "form.html"><img id ="buy" src = "img/buy.jpg" alt = "buy now" style = "width:200px;height:80px;"></a></tr>
				<tr><p id = "details">Get the perfect combination of style and productivity, while keeping your wallet in mind — now that's something to get excited about.
				</p></tr>
				<tr><h4 id = "feature_title">Product Features</h4>
				<div id ="feature">
					<p >style ="background-color:#C8CBCC">AMD A8-7410 processor</p>
					<p>2.20GHz (with Max Turbo Speed of 2.5GHz)</p>
					<p style ="background-color:#C8CBCC">4GB DDR3 SDRAM system memory</p>
					<p>500GB SATA hard drive</p>
					<p style ="background-color:#C8CBCC">SuperMulti DVD burner</p>
					<p>10/100Base-T Fast Ethernet, 802.11b/g/n Wireless LAN</p>
					<p style ="background-color:#C8CBCC">Rechargeable lithium-ion battery</p>
					<p>15.6" HD WLED-backlit touchscreen/p>
					<p>style ="background-color:#C8CBCC">BGenuine Microsoft Windows 10 Home</p>
					<p>Media Formats: popular media formats</p>
					<p style ="background-color:#C8CBCC">3-cell lithium-ion polymer battery</p>
				</div>
				</tr>
			</table>
			</div>
		<div id = "picture">
			<div id = "item1"><img  src= "img/hpblack1.jpg" alt = "hpblack" ></div>
			<div id = "item2"><img  src = "img/hpblack2.jpg" alt = "hpblack"></div>
			<div id = "item3"><img  src = "img/hpblack3.jpg" alt = "hpblack"></div>	
		</div>
	</div>

	



</body>
<div class = "footer">
	<h5> 2016 E-BestMart.com, all rights reserved.</h5>
<div>
</html>