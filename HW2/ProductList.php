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
define('ABSPATH', dirname(__FILE__));

$path = ABSPATH . '/ProductDetail.php?productid=';

//echo $_SERVER['REQUEST_URI'];
$pathToProduct = $_SERVER['REQUEST_URI'] . '?product=';

$pathToDetail = $_SERVER['REQUEST_URI'] . '?productid=';

echo $path2;

// $base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
// $protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
// $port      = $_SERVER['SERVER_PORT'];
// $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
// $domain    = $_SERVER['SERVER_NAME'];
// $full_url  = "${protocol}://${domain}${disp_port}${base_url}$";
// $path = $full_url . "/project2/ProductDetail.php";


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
      <a href="/project2/ProductList.php?product=cellphone">Cellphones</a>
      <a href="/project2/ProductList.php?product=laptop">Laptops</a>
      <a href="/project2/ProductList.php?product=tablet">Tablets</a>
    </div>
    </li>
    <li><a href="Contact.html">Contact</a></li>
  </nav></ul>   

  <div class ="pagebanner">
    <!-- <h1 class="title-banner">Cellphones</h1> -->
    <img src="img/cellphone_banner.jpg" alt="cellphone_banner" >
  </div>
  <div class="section"> 

<?php

$cate = $_GET['product'];

?>
      
<?php

$stmt = $conn->query("SELECT * FROM products where category = '$cate'");
?>
     
  <header>
    <h2><?php echo $cate ?></h2>

  </header>

<?php
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {

?>
  <div class ="table">
    <div class="row">
  
        <a href="/project2/ProductDetail.php?productid=<?php echo $row['product_id'] ?>" >
            <img src="<?php echo $row['image']; ?>" alt="laptop1">
        </a>

        <div class="desc">
            <h4 class="title-heading">
            <a href="/project2/ProductDetail.php?productid=<?php echo $row['product_id'] ?>" > <?php echo $row['product_name'] ?> </a>
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
