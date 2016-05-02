?php
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
    $pid = $_GET['productid'];
    echo $pid;
?>
<?php
if (isset($_POST['prd']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['homeadd']) && isset($_POST['qnt'])
      && isset($_POST['ste'])) {
    $sql = "INSERT INTO order_info (product_name, customer_name, email, home_address, quantity, state) VALUES ('" . $_POST['prd'] ."','" . $_POST['firstname'] ."','" . $_POST['email'] ."','" . $_POST['homeadd'] ."','" . $_POST['qnt'] ."','" . $_POST['ste'] ."')";
    echo("<pre>\n".$sql."\n</pre>\n");
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        ':product_name' => $_POST['prd'],
        ':customer_name' => $_POST['firstname'],
        ':email' => $_POST['email'],
        ':home_address' => $_POST['homeadd'],
        ':quantity' => $_POST['qnt'],
        ':state' => $_POST['ste']));
}
?>

<?php

$zipCode = $_POST['zipcode'];
$sql2= "SELECT tax_rate FROM tax WHERE zip_code = " . $_POST['zipcode'];
$sql3 = "SELECT tax_rate FROM tax WHERE zip_code ='".$zipCode."'";
$sql4= "SELECT tax_rate FROM tax WHERE zip_code =99501";
$sql5 = "SELECT tax_rate FROM tax WHERE zip_code = $zipCode";
$stmt = $conn->prepare("SELECT tax_rate FROM tax WHERE zip_code = 99501");
$stmt->execute();
$rows = $stmt->fetchAll();
foreach ($rows as $row){
    echo $row['zip_code'];
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>

<style>
.body{
        width:80%;
        overflow: auto;
        margin: auto;
        background-color:rgb(220,220,220);
    }
.footer{
   padding:5px;
   background-color: #333;
  bottom: 0;
  color:white;
  clear:both;
  text-align:center;
  position: relative; 
  width:870px;
  margin: 20px auto 0 auto;
}
#header{
    
 
    font-family: "Open Sans", Arial, sans-serif;
    text-align: left;
    padding:20px;
}
nav ul {
    list-style-type: none;
   
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}
nav li {
    float: left;
}
  
/* Change the link color to #111 (black) on hover */
/*nav li a:hover {
    background-color: #111;
}*/
nav li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
nav li a:hover, .dropdown:hover .dropbtn {
    background-color: gray;
}
nav li.dropdown {
    display: inline-block;
    
}
nav .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 360px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}
nav .dropdown-content a.dd{
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}
nav .dropdown-content a:hover {background-color: #f1f1f1;  }
nav .dropdown:hover .dropdown-content {
    display: block;
    overflow:visible;
    z-index:100;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=submit]:hover {
    background-color: #45a049;
}
div {
    width:50%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}
#top_text{
    text-align: center;
    font-family: Arial, Helvetica; 
}
#second_text{
    text-align: center;
    font-family: Arial, Helvetica; 
}
p{
    font-family: Arial, Helvetica; 
}
select{
    width:12%;
}
#ccn3{
    width:12%;
}
#cc {
    background-color: #f2f2f2;
    width: 735px;
    padding: 25px;
    border: 5px solid rgb(220,220,220);
}
</style>

</head>
<body style="background-color:rgb(220,220,220)">


<h1 id="top_text">Thank you for choosing our business!</h1>
<h3 id="second_text">Please fill out the order information and a confirmation email will be sent to you soon.</h3>
<?php
 $stmt= $conn->query("SELECT * FROM products where product_id = $pid")

?>
<?php 
  $result = $conn->query("SELECT name FROM customer");
  while ($crow = $result->fetch(PDO::FETCH_ASSOC)){
      $name = $crow['name'];
      echo $name."\n";
      $namearray[] = $name;        
  }
 ?>
<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<div style="width: 800px; margin: 50px auto 0 auto;">
  <form name="order_form"  method="POST">
      <p>Product name:</p> <h3><?php echo $row['product_name']?></h3>
      <p> Price: </p> <h3><?php echo '$'.$row['price']?></h3>
    <p>Your full name:< /p><input type="text" id="fname" name="firstname" required>
    <p>Your email address:</p><input type="text" id="email" name="email" required>
    <p>Your home address:</p><input type="text" id="homeadd" name="homeadd" required>
    <p>Quantity of the product:</p>
    <select id="qnt" name="qnt">
        <option value="qnt">1</option>
        <option value="qnt">2</option>
        <option value="qnt">3</option>
        <option value="qnt">4</option>
        <option value="qnt">5</option>
        <option value="qnt">6</option>
        <option value="qnt">7</option>
        <option value="qnt">8</option>
        <option value="qnt">9</option>
        <option value="qnt">10</option>
    </select>
    <p>State:</p>
    <select id="ste" name="ste">
        <option value="ste">CA</option>
        <option value="ste">other</option>
    </select>
    <p></p>
    
    <li id="cc">
    <h2>Credit card information:</h2>
    <p>Card number:</p><input type="text" id="ccn" name="ccn" required>
    <p>Name on the card:</p><input type="text" id="nc" name="nc" required>
    <p>Expiration date (dd/mm/Year; For example:08/03/2018):</p><input type="text" id="ed" name="ed" required>
    <p>Three-digit security number:</p><input type="text" id="ccn3" name="ccn3" required>
    </li>
    
<?php } ?>
    <br/><br/><input type="submit" value="Submit" onclick="check();"/>
    
  </form>
</div>

    
       <p class="footer" > 2016 E-BestMart.com, all rights reserved.</p>


<script>
    function submitform(){
        window.open("mailto:clu10@uci.edu?subject=Your%20order%20confirmation&body=Your%20order%20will%20be%20shipped%20in%20two%20business%20days.");
}
    function check(){
    var reg = "/(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d/";
    if(document.getElementById('fname').value==""){
        alert("You have to input a name.");
    }
    else if (document.getElementById('email').value=="" || document.getElementById('email').value.search('@')==-1){
        alert("You have to input a valid email.")}
    else if (document.getElementById('homeadd').value==""){
        alert("You have to input a valid home address.")}
    else if (document.getElementById('ccn').value=="" || document.getElementById('ccn').value.length!=16){
        alert("You have to input a valid credit card number.")}
    else if (document.getElementById('nc').value==""){
        alert("You have to input a valid name on the card.")}
    else if (document.getElementById('ed').value=="" || (document.getElementById('ed').value.match(reg))==false){
        alert("You have to input a valid expiration date.")}
    
    else if ((document.getElementById('ccn3').value=="") || (document.getElementById('ccn3').value.length!=3)){
        alert("You have to input a valid three-digit security number.")}
    else{
        submitform();
    }
}
    
</script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
     
    var availableTags = "<?php ($namearray)?>";
    $( "#fname" ).autocomplete({
      source: availableTags
    });
  });
  </script>


</body>
</html>
