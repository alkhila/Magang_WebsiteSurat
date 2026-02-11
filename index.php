<?php
include_once 'controllers/controller.php';

if (!isset($_GET['type'])) {
  ?>
  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <title>Pilih Sistem Pengendali</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
      body {
        background-image: url('assets/bangunan_dinpus.webp');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .choice-card {
        background: white;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        text-align: center;
      }

      .btn-choice {
        padding: 30px;
        font-weight: 800;
        border-radius: 12px;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 150px;
        background: #000;
        border: 1px solid #000;
        color: #fff;
      }

      .btn-choice:hover {
        background: #fff;
        color: #000;
        border: 1px solid #000;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }

      .instruction-text {
        color: #333;
        font-size: 1.2rem;
        margin-bottom: 30px;
        font-weight: 500;
      }
    </style>
  </head>

  <body>
    <div class="choice-card">
      <h2 class="mb-3">SISTEM PENGENDALI SURAT</h2>
      <p class="instruction-text">Silakan pilih jenis pengendalian surat</p> <br>
      <div class="d-grid gap-3 d-md-flex justify-content-center">
        <a href="index.php?type=biasa" class="btn btn-choice">Surat Keluar Biasa</a>
        <a href="index.php?type=spt" class="btn btn-choice">Surat Keluar SPT</a>
      </div>
    </div>
  </body>

  </html>
  <?php
  exit();
}

$controller = new PengendaliController();
$controller->handleRequest();

$page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
$controller->index($page);