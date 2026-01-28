<?php
class Pengendali {
    private $conn;
    private $table_name = "pengendali";
    private $table_sisipan = "pengendali_sisipan";

    public function __construct($db) { $this->conn = $db; }

    public function getByPage($page) {
        $start = ($page * 100) + 1;
        $end = $start + 99;
        $query = "SELECT * FROM " . $this->table_name . " WHERE no_urut BETWEEN ? AND ? ORDER BY no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$start, $end]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSisipanByPage($page) {
        $start = ($page * 100) + 1;
        $end = $start + 99;
        $query = "SELECT * FROM " . $this->table_sisipan . " 
                  WHERE CAST(no_urut AS UNSIGNED) BETWEEN ? AND ? 
                  ORDER BY CAST(no_urut AS UNSIGNED) ASC, no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$start, $end]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($id, $klas, $plus) {
        $query = "INSERT INTO " . $this->table_name . " (no_urut, klas, plus) VALUES (?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus]);
    }

    public function createSisipan($id, $klas, $plus) {
        $query = "INSERT INTO " . $this->table_sisipan . " (no_urut, klas, plus) VALUES (?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus]);
    }

    public function update($id, $klas, $plus) {
        $query = "UPDATE " . $this->table_name . " SET klas = ?, plus = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $id]);
    }

    public function updateSisipan($id, $klas, $plus) {
        $query = "UPDATE " . $this->table_sisipan . " SET klas = ?, plus = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$id]);
    }

    public function deleteSisipan($id) {
        $query = "DELETE FROM " . $this->table_sisipan . " WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$id]);
    }
}