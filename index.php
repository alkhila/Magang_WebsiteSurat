<?php
include_once 'controllers/controller.php';

// Jika tidak ada parameter type, tampilkan halaman pemilihan
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
        background: #f8fafc;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }

      .choice-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        text-align: center;
      }

      /* Style Tombol: Awalnya Hitam (Kebalikan button selanjutnya) */
      .btn-choice {
        padding: 30px;
        font-weight: 800;
        border-radius: 12px;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-width: 250px;
        background: #000;
        border: 1px solid #000;
        color: #fff;
      }

      /* Hover: Menjadi Putih (Kebalikan button selanjutnya) */
      .btn-choice:hover {
        background: #fff;
        color: #000;
        border: 1px solid #000;
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>

  <body>
    <div class="choice-card">
      <h2 class="mb-5">SISTEM PENGENDALI SURAT</h2>
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