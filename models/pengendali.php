<?php
class Pengendali {
    private $conn;
    private $table_name = "pengendali";
    private $table_sisipan = "pengendali_sisipan";

    public function __construct($db) { $this->conn = $db; }

    // --- FUNGSI BARU UNTUK CEK DUPLIKASI SISIPAN ---
    public function getSisipanById($id) {
        $query = "SELECT * FROM " . $this->table_sisipan . " WHERE no_urut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- FUNGSI CREATE DENGAN 4 PARAMETER ---
    public function create($id, $klas, $plus, $tgl = null) {
        $query = "INSERT INTO " . $this->table_name . " (no_urut, klas, plus, tanggal_manual) VALUES (?, ?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus, $tgl]);
    }

    public function createSisipan($id, $klas, $plus, $tgl) {
        $query = "INSERT INTO " . $this->table_sisipan . " (no_urut, klas, plus, tanggal_manual) VALUES (?, ?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus, $tgl]);
    }

    // --- FUNGSI UPDATE DENGAN 4 PARAMETER ---
    public function update($id, $klas, $plus, $tgl = null) {
        $query = "UPDATE " . $this->table_name . " SET klas = ?, plus = ?, tanggal_manual = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $tgl, $id]);
    }

    public function updateSisipan($id, $klas, $plus, $tgl) {
        $query = "UPDATE " . $this->table_sisipan . " SET klas = ?, plus = ?, tanggal_manual = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $tgl, $id]);
    }

    // --- SISANYA TETAP SAMA ---
    public function getNextAvailableNo($page) {
        $start = ($page * 100) + 1;
        $end = $start + 99;
        $query = "SELECT MAX(no_urut) as terakhir FROM " . $this->table_name . " WHERE no_urut BETWEEN ? AND ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$start, $end]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row['terakhir']) return $start;
        return ($row['terakhir'] >= $end) ? false : $row['terakhir'] + 1;
    }

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

    public function delete($id) {
        return $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE no_urut = ?")->execute([$id]);
    }

    public function deleteSisipan($id) {
        return $this->conn->prepare("DELETE FROM " . $this->table_sisipan . " WHERE no_urut = ?")->execute([$id]);
    }
}