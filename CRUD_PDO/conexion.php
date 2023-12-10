<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbproductos";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>