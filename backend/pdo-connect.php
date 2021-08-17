<?php
$servername = "localhost";
$db_username = "jere.karjalainen";
$db_password = "J3r3nk4nt4!";
$dbname = "jere.karjalainen";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}