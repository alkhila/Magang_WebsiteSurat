<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Export PDF - Daftar Pengendali Surat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print {
        display: none !important;
      }

      body {
        padding: 0;
      }
    }

    table {
      border: 2px solid #000 !important;
    }

    th,
    td {
      border: 1px solid #000 !important;
      font-size: 12px;
    }
  </style>
</head>

<body onload="window.print()">
  <div class="container-fluid py-4">
    <div class="text-center mb-4">
      <h3>DAFTAR PENGENDALI SURAT KELUAR</h3>
      <hr>
    </div>
    <table class="table table-bordered text-center">
      <thead>
        <tr class="table-light">
          <th width="50">No</th>
          <th>Klasifikasi</th>
          <th>Tanggal Dibuat</th>
          <th>Keterangan (+)</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($allData as $row): ?>
          <tr>
            <td class="fw-bold">
              <?= $row['no_urut'] ?>
            </td>
            <td>
              <?= $row['klas'] ?>
            </td>
            <td>
              <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?>
            </td>
              <td>
                <?= $row['plus'] ?>
              </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="text-end no-print">
      <button onclick="window.history.back()" class="btn btn-secondary">Kembali</button>
    </div>
  </div>
</body>

</html>