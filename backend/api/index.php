<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

// Admins
if (strpos($request, '/admins') !== false) {
    require_once '../controllers/AdminController.php';
    $controller = new AdminController();

    if ($method === 'GET') {
        if (isset($_GET['id'])) $controller->show($_GET['id']);
        else $controller->index();
    } elseif ($method === 'POST') {
        $controller->store($input);
    } elseif ($method === 'PUT') {
        $controller->update($input['admin_id'], $input);
    } elseif ($method === 'DELETE') {
        $controller->delete($_GET['id']);
    }
}

// Guests
elseif (strpos($request, '/guests') !== false) {
    require_once '../controllers/GuestController.php';
    $controller = new GuestController();

    if ($method === 'GET') {
        if (isset($_GET['id'])) $controller->show($_GET['id']);
        else $controller->index();
    } elseif ($method === 'POST') {
        $controller->store($input);
    } elseif ($method === 'PUT') {
        $controller->update($input['guest_id'], $input);
    } elseif ($method === 'DELETE') {
        $controller->delete($_GET['id']);
    }
}

// Invalid endpoint
else {
    echo json_encode(['message' => 'Endpoint not found']);
}
