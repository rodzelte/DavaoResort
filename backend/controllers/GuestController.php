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

    // GET /guests
    public function index()
    {
        $stmt = $this->guest->getAll();
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // GET /guests?id=123
    public function show($id)
    {
        $row = $this->guest->getById($id);
        echo json_encode($row);
    }

    // POST /guests
    public function store($data)
    {
        // hash password before passing
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if ($this->guest->create($data)) {
            echo json_encode(['success' => true, 'message' => 'Guest created successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to create guest']);
        }
    }

    // PUT /guests
    public function update($id, $data)
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if ($this->guest->update($id, $data)) {
            echo json_encode(['success' => true, 'message' => 'Guest updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update guest']);
        }
    }

    // DELETE /guests?id=123
    public function delete($id)
    {
        if ($this->guest->delete($id)) {
            echo json_encode(['success' => true, 'message' => 'Guest deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete guest']);
        }
    }

    // POST /guests/login
    public function login($data)
    {
        if (!isset($data['email']) || !isset($data['password'])) {
            echo json_encode(['success' => false, 'message' => 'Email and password required']);
            return;
        }

        $user = $this->guest->login($data['email'], $data['password']);
        if ($user) {
            echo json_encode(['success' => true, 'user' => $user]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
}
