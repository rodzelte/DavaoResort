<?php
class Admin
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("CALL ManageAdmins('READ', NULL, NULL, NULL, NULL, NULL)");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("CALL ManageAdmins('READ', ?, NULL, NULL, NULL, NULL)");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("CALL ManageAdmins('CREATE', NULL, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['full_name'],
            $data['email']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("CALL ManageAdmins('UPDATE', ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $id,
            $data['username'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['full_name'],
            $data['email']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("CALL ManageAdmins('DELETE', ?, NULL, NULL, NULL, NULL)");
        return $stmt->execute([$id]);
    }
}
