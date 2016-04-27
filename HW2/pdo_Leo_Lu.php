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
