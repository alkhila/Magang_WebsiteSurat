<?php
include_once 'controllers/controller.php';

$controller = new PengendaliController();

// PROSES LOGIKA (Login/Logout/CRUD) DULU
$controller->handleRequest();

// BARU TAMPILKAN HALAMAN
$page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
$controller->index($page);