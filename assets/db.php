<?php

$hostname = "localhost";
$database = "blewIt";
$username = "BlewIt";
$password = "X3m1X_IBauav1QoO";

try {
    $blewIt = new PDO(
        "mysql:host=$hostname;dbname=$database;charset=utf8mb4",
        $username,
        $password
    );

    $blewIt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $blewIt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>