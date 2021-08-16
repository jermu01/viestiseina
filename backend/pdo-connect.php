<?php
$servername = "it.esedu.fi";
$db_username = "jere.karjalainen";
$db_password = "JeKa565H";
$dbname = "messagedb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}