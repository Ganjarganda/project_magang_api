<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = json_decode(file_get_contents('php://input'), true);

    $email = $input['email'];
    $password = $input['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user == true) {
        echo json_encode(['status' => 1, 'message' => 'Login successful', 'data' => $user]);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Email tidak ada']);
    }
} else {
    echo json_encode(['status' => 0, 'message' => 'Invalid request method']);
}
