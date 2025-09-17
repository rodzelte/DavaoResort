<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../config/Database.php';

// Get DB connection
$database = new Database();
$db = $database->getConnection();

// Read JSON from fetch()
$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';

// Validate
if (!$email || !$password) {
    echo json_encode(['success' => false, 'message' => 'Missing fields']);
    exit();
}

// Query user
$stmt = $db->prepare("SELECT guest_id, full_name, email, password FROM guests WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        'guest_id' => $user['guest_id'],
        'full_name' => $user['full_name'],
        'email' => $user['email']
    ];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
