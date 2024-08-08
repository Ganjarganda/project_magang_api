<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['username' => $username, 'password' => $password])) {
        echo json_encode(['status' => 1, 'message' => 'User registered successfully']);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Failed to register user']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}
