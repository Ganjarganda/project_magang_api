<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = json_decode(file_get_contents('php://input'), true);

    $nama = $input['nama'];
    $email = $input['email'];
    $password = $input['password'];

    $sql = "INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)";
    $stmt = $pdo->prepare($sql);

    try {
        if ($stmt->execute(['nama' => $nama, 'email' => $email, 'password' => $password])) {
            echo json_encode(['status' => 1, 'message' => 'User registered successfully']);
        }
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) { // 1062 is the error code for a unique constraint violation in MySQL
            echo json_encode(['status' => 0, 'message' => 'Email already exists']);
        } else {
            echo json_encode(['status' => 0, 'message' => 'Failed to register user']);
        }
    }
} else {
    echo json_encode(['status' => 0, 'message' => 'Invalid request method']);
}
