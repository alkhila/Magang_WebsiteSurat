<?php
// 1. Ambil Controller
include_once 'controllers/Controller.php';

// 2. Nyalakan sistem
$controller = new PengendaliController();

// 3. Cek apakah user lagi mau Hapus/Simpan (POST/GET) atau cuma mau lihat (tampil)
if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['hapus'])) {
    $controller->handleRequest();
} else {
    $controller->index();
}