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

<div style="width: 800px; margin: 50px auto 0 auto;">
  <form name="order_form"  method="POST">
    
    

    <p>Zipcode:</p><input type="text" id="zipcode" name="zipcode" value ="" required>
    <p>Total Price:</p><input type="text" id="total_price" onKeyUp="doMath();" name="total_price" required>
    
    

   
    
  </form>
</div>




<script>
    
function doMath(){
    
    
    var zip_code = parseInt(document.getElementById('zipcode').value);
    var tax_rate = <?php
$zipCode = zip_code;

$stmt = $conn->prepare("SELECT tax_rate FROM ex WHERE zip_code =zip_code");
$stmt->execute();
$rows = $stmt->fetchAll();
foreach ($rows as $row){
    
    echo $row['tax_rate'];
}
?>;
    
    document.getElementById('total_price').value = tax_rate;
    
    
    
}
    
</script>

</body>
</html>
