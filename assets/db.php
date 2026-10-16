<?php
$hostname = "localhost";
$database = "blewIt";
$username = "BlewIt";
$password = "9WuE9Wy8L8_F@CcW";

try {
    $blewIt = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $blewIt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>