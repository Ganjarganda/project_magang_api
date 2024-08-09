<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['nama' => $nama, 'email' => $email, 'password' => $password])) {
        echo json_encode(['status' => 1, 'message' => 'User registered successfully']);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Failed to register user']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}
