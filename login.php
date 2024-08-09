<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user == true) {
        echo json_encode(['status' => 1, 'message' => 'Login successful', 'data' => $user]);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Invalid email or password']);
    }
} else {
    echo json_encode(['status' => 0, 'message' => 'Invalid request method']);
}
