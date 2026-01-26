j<?php
class Pengendali {
    private $conn;
    private $table_name = "pengendali";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($no, $klas, $plus) {
        $query = "INSERT INTO " . $this->table_name . " (no_urut, klas, plus) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$no, $klas, $plus]);
    }

    public function update($no, $klas, $plus) {
        $query = "UPDATE " . $this->table_name . " SET klas = ?, plus = ? WHERE no_urut = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$klas, $plus, $no]);
    }

    public function delete($no) {
        $query = "DELETE FROM " . $this->table_name . " WHERE no_urut = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$no]);
    }
}