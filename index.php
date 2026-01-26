<?php
include_once 'controllers/Controller.php';
$controller = new PengendaliController();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['hapus'])) {
    $controller->handleRequest();
} else {
    $controller->index($page);
}