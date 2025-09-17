<?php
require_once '../models/Admin.php';
require_once '../config/Database.php';

class AdminController
{
    private $admin;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->admin = new Admin($db);
    }

    public function index()
    {
        $stmt = $this->admin->getAll();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    public function show($id)
    {
        $stmt = $this->admin->getById($id);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function store($data)
    {
        if ($this->admin->create($data)) {
            echo json_encode(['message' => 'Admin created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create admin']);
        }
    }

    public function update($id, $data)
    {
        if ($this->admin->update($id, $data)) {
            echo json_encode(['message' => 'Admin updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update admin']);
        }
    }

    public function delete($id)
    {
        if ($this->admin->delete($id)) {
            echo json_encode(['message' => 'Admin deleted successfully']);
        } else {
            echo json_encode(['message' => 'Failed to delete admin']);
        }
    }
}
