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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/products.css">
  <meta name="author" content="Yeiji Song">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>
    



<body class="body">
    

<header id=header>
	<h1>BEST Electronics</h1>
</header>
  <nav><ul>
    <li><a href="/homepage.php">Home</a></li>
    
    <li><a href="About.html">About</a></li>
    <li class="dropdown">
    <a href="#" class="dropbtn">Products</a>
    <div class="dropdown-content">
      <a href="/ProductList.php?product=cellphone">Phones</a>
      <a href="/ProductList.php?product=laptop">Laptops</a>
      <a href="/ProductList.php?product=tablet">Tablets</a>
    </div>
    </li>
    <li><a href="Contact.html">Contact</a></li>
    
     
  </nav></ul>   

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img/banner1.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img/ebanner.jpg" style="width:100%">
 
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img/laptop-banner.jpg" style="width:100%">
  
</div>
    

<a class="prev" onclick="plusSlides(-1)"><</a>
<a class="next" onclick="plusSlides(1)">></a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length} ;
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>



      <div class="section"> 
<div id="body">
		<div class="content">
			
				
                    <a href="cellphone.html"><img src="img/phones.jpg"></a>
                       
                    <a href ="laptop.html"><img src="img/laptops.jpg"></a>

                    <a href ="tablet.html"><img src="img/tablets_tag.jpg"></a>

</div></div></div>

<?php
$stmt = $conn->query("SELECT * FROM products");
?>

<?php
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
?>

        <div class="img">

  		

    			<img src="<?php echo $row['image']; ?>"/> 

  		
            </div>

<?php } ?>

	


 

  <div class="footer">
    <p>BEST Electronics</p>
  </footer>

</body>
</html>