<?php
$host = 'localhost';
$db = 'project_magang';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'connect true';
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}

?>