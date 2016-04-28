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


<!DOCTYPE html>
<html>
<head>
  <title>Laptops</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/allProducts.css" type="text/css">
  <meta name="author" content="Misook Sohn">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>

<body class="body">
<hearder id=header>
  <h1>BEST Electronics</h1>
</hearder>
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
  </nav></ul>   

  <div class ="pagebanner">
    <!-- <h1 class="title-banner">Cellphones</h1> -->
    <img src="img/cellphone_banner.jpg" alt="cellphone_banner" >
  </div>
  <div class="section"> 

  <header>
    <h2>Laptops</h2>

  </header>

<?php

$stmt = $conn->query("SELECT * FROM products where category = 'laptop'");
?>

<?php
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

?>
  <div class ="table">
    <div class="row">
  
        <img src="<?php echo $row['image']; ?>"/  alt="laptop1">

        <div class="desc">
            <h4 class="title-heading">
            <a href="hpblack.html"> <?php echo $row['product_name'] ?> </a>
            </h4>
          <div class="title-content"> 
            <h2><?php echo "$" . $row['price'] ?></h2>
            <p><?php echo $row['sub_feature'] ?></p>
          </div>
        </div>
    </div>
   

  
</div> 
<?php } ?>
 

  <div class="footer">
     <p > 2016 E-BestMart.com, all rights reserved.</p>
  </footer>
</body>
</html>
