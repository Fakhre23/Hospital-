<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db name ";

try {
    $conn = new PDO("mysql:host=$servername;dbname=hospital" , $username , $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*     echo "Connected successfully";
 */
} catch (PDOException $th) {
    echo "Connection failed: " . $th->getMessage();
}

$conn = null;



?>



