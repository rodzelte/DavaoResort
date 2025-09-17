<?php
require_once '../models/Guest.php';
require_once '../config/Database.php';

class GuestController
{
    private $guest;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->guest = new Guest($db);
    }

    public function index()
    {
        $stmt = $this->guest->getAll();
        echo json_encode($stmt);
    }

    public function show($id)
    {
        $stmt = $this->guest->getById($id);
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public function store($data)
    {
        if ($this->guest->create($data)) {
            echo json_encode(['message' => 'Guest created successfully']);
        } else {
            echo json_encode(['message' => 'Failed to create guest']);
        }
    }

    public function update($id, $data)
    {
        if ($this->guest->update($id, $data)) {
            echo json_encode(['message' => 'Guest updated successfully']);
        } else {
            echo json_encode(['message' => 'Failed to update guest']);
        }
    }

    public function delete($id)
    {
        if ($this->guest->delete($id)) {
            echo json_encode(['message' => 'Guest deleted successfully']);
        } else {
            echo json_encode(['message' => 'Failed to delete guest']);
        }
    }
}
