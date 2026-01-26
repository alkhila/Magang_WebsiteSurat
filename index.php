<?php
// Gunakan c kecil sesuai nama file controller.php
include_once 'controllers/controller.php';

$controller = new PengendaliController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['hapus'])) {
  $controller->handleRequest();
} else {
  $controller->index();
}