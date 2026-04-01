<?php
class Pengendali
{
    private $conn;
    private $table_name;
    private $table_sisipan;

    public function __construct($db, $tipe = 'biasa')
    {
        $this->conn = $db;
        if ($tipe === 'spt') {
            $this->table_name = "pengendali_spt";
            $this->table_sisipan = "pengendali_sisipan_spt";
        } else {
            $this->table_name = "pengendali";
            $this->table_sisipan = "pengendali_sisipan";
        }
    }

    // AUTH FUNCTIONS
    public function login($username, $password)
    {
        // Cek di tabel pengguna terlebih dahulu
        $query = "SELECT id, username FROM pengguna WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $user['is_admin'] = false;
            return $user;
        }

        $query = "SELECT id, username FROM admin WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username, $password]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($admin) {
            $admin['is_admin'] = true;
            return $admin;
        }

        return false;
    }

    public function getUserByUsername($username)
    {
        $query = "SELECT id, username FROM pengguna WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $user['is_admin'] = false;
            return $user;
        }

        $query = "SELECT id, username FROM admin WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($username, $password, $nama)
    {
        $query = "INSERT INTO pengguna (username, password, nama_lengkap) VALUES (?, ?, ?)";
        return $this->conn->prepare($query)->execute([$username, $password, $nama]);
    }

    // DATA FUNCTIONS
    public function create($id, $klas, $plus, $pembuat_id, $tgl = null)
    {
        $query = "INSERT INTO " . $this->table_name . " (no_urut, klas, plus, pembuat_id, tanggal_manual) VALUES (?, ?, ?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus, $pembuat_id, $tgl]);
    }

    public function createSisipan($id, $klas, $plus, $tgl, $pembuat_id)
    {
        $query = "INSERT INTO " . $this->table_sisipan . " (no_urut, klas, plus, tanggal_manual, pembuat_id) VALUES (?, ?, ?, ?, ?)";
        return $this->conn->prepare($query)->execute([$id, $klas, $plus, $tgl, $pembuat_id]);
    }

    public function getByPage($page)
    {
        $start = ($page * 100) + 1;
        $end = $start + 99;
        $query = "SELECT * FROM " . $this->table_name . " WHERE no_urut BETWEEN ? AND ? ORDER BY no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$start, $end]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSisipanByPage($page)
    {
        $start = ($page * 100) + 1;
        $end = $start + 99;
        $query = "SELECT * FROM " . $this->table_sisipan . " WHERE CAST(no_urut AS UNSIGNED) BETWEEN ? AND ? ORDER BY CAST(no_urut AS UNSIGNED) ASC, no_urut ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$start, $end]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSisipanById($id)
    {
        $query = "SELECT * FROM " . $this->table_sisipan . " WHERE no_urut = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $klas, $plus, $tgl = null)
    {
        $query = "UPDATE " . $this->table_name . " SET klas = ?, plus = ?, tanggal_manual = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $tgl, $id]);
    }

    public function updateSisipan($id, $klas, $plus, $tgl)
    {
        $query = "UPDATE " . $this->table_sisipan . " SET klas = ?, plus = ?, tanggal_manual = ? WHERE no_urut = ?";
        return $this->conn->prepare($query)->execute([$klas, $plus, $tgl, $id]);
    }

    public function delete($id)
    {
        return $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE no_urut = ?")->execute([$id]);
    }

    public function deleteSisipan($id)
    {
        return $this->conn->prepare("DELETE FROM " . $this->table_sisipan . " WHERE no_urut = ?")->execute([$id]);
    }

    public function getLastFilledPage()
    {
        $query = "SELECT MAX(no_urut) as terakhir FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (!$row['terakhir'] || $row['terakhir'] == 0) ? 0 : floor(($row['terakhir'] - 1) / 100);
    }

    public function getNextAvailableNo($page)
    {
        $query = "SELECT MAX(no_urut) as terakhir FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (!$row['terakhir']) ? 1 : $row['terakhir'] + 1;
    }
}