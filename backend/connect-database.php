<?php
/*Connect to database*/

$serverName = "localhost";
$user = "root";
//$password = "root";
$dbName = "LEAN_FINAL";

try {
    $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $user);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Could not connect to database";
}

?>
