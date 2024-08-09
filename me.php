<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input = json_decode(file_get_contents('php://input'), true);

    $id = $input['id'];

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user == true) {
        echo json_encode(['status' => 1, 'message' => 'Me successful', 'data' => $user]);
    } else {
        echo json_encode(['status' => 0, 'message' => 'Me un-successful']);
    }
} else {
    echo json_encode(['status' => 0, 'message' => 'Invalid request method']);
}
