<?php
class Admin
{
    private $conn;
    private $table_name = "admins";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE admin_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table_name . " (username, password_hash, full_name, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$data['username'], password_hash($data['password'], PASSWORD_DEFAULT), $data['full_name'], $data['email']]);
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table_name . " SET username = ?, password_hash = ?, full_name = ?, email = ? WHERE admin_id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$data['username'], password_hash($data['password'], PASSWORD_DEFAULT), $data['full_name'], $data['email'], $id]);
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE admin_id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
