<?php
class Guest
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("CALL ManageGuests('GET_ALL', NULL, NULL, NULL, NULL, NULL, NULL)");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("CALL ManageGuests('READ', ?, NULL, NULL, NULL, NULL, NULL)");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare(
            "CALL ManageGuests('CREATE', NULL, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['contact_number'],
            $data['address']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare(
            "CALL ManageGuests('UPDATE', ?, ?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $id,
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['contact_number'],
            $data['address']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("CALL ManageGuests('DELETE', ?, NULL, NULL, NULL, NULL, NULL)");
        return $stmt->execute([$id]);
    }
}
