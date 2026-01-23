<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengendali - SPT</title>
  <style>
    body {
      background-color: #e0e0e0;
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 20px;
    }

    .document-container {
      background-color: white;
      width: 210mm;
      margin: 0 auto;
      padding: 10mm;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      min-height: 297mm;
    }

    .page-info {
      text-align: right;
      font-size: 12px;
      font-weight: bold;
    }

    .title {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      text-decoration: underline;
      margin-top: 5px;
    }

    .subtitle {
      text-align: center;
      margin-top: 2px;
      font-size: 14px;
      margin-bottom: 15px;
    }

    .category-labels {
      display: flex;
      justify-content: space-between;
      font-size: 11px;
      font-weight: bold;
      margin-bottom: 5px;
      padding: 0 5px;
    }

    .main-table {
      width: 100%;
      border-collapse: collapse;
      border: 2px solid black;
    }

    .main-table th,
    .main-table td {
      border: 1px solid black;
      font-size: 10px;
      padding: 4px 2px;
      height: 20px;
      text-align: center;
    }

    .header-row {
      background-color: #f2f2f2;
    }

    .col-no {
      width: 30px;
      background-color: #f9f9f9;
      font-weight: bold;
    }

    .col-klas {
      width: 85px;
    }

    .col-plus {
      width: 50px;
    }

    .col-aksi {
      width: 70px;
    }

    .divider {
      border-left: 2px solid black !important;
    }

    .btn-group {
      display: flex;
      gap: 3px;
      justify-content: center;
    }

    .btn-edit {
      text-decoration: none;
      color: #2196F3;
      border: 1px solid #2196F3;
      padding: 1px 4px;
      border-radius: 3px;
      font-size: 9px;
    }

    .btn-hapus {
      text-decoration: none;
      color: #F44336;
      border: 1px solid #F44336;
      padding: 1px 4px;
      border-radius: 3px;
      font-size: 9px;
    }
  </style>
</head>

<body>

  <div class="document-container">
    <div class="page-info">HALAMAN : 00</div>
    <div class="title">DAFTAR PENGENDALI</div>
    <div class="subtitle">SPT ♥</div>

    <div class="category-labels">
      <div style="width: 25%;">Terima tgl, +)</div>
      <div style="width: 25%; text-align: center;">Simpan, +)</div>
      <div style="width: 25%; text-align: center;">Kirim ke unit tgl, +)</div>
      <div style="width: 25%; text-align: right;">Ekspedisi tgl, +)</div>
    </div>

    <table class="main-table">
      <thead>
        <tr class="header-row">
          <?php for ($k = 0; $k < 3; $k++): ?>
            <th class="col-no <?= ($k > 0) ? 'divider' : '' ?>">No. Urut</th>
            <th class="col-klas">Klas</th>
            <th class="col-plus">+)</th>
            <th class="col-aksi">Aksi</th>
          <?php endfor; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        $data_input = [
          "01" => ["k" => "000.4.14.3", "p" => "perpus"],
          "34" => ["k" => "500.1.1", "p" => "arsip"],
        ];

        for ($i = 0; $i < 34; $i++) {
          echo "<tr>";

          $config = [
            ['start' => 0, 'max' => 33],
            ['start' => 34, 'max' => 66],
            ['start' => 67, 'max' => 99]
          ];

          foreach ($config as $index => $c) {
            $class_divider = ($index > 0) ? "divider" : "";
            $val = $c['start'] + $i;

            if ($val <= $c['max']) {
              $formatted_no = str_pad($val, 2, "0", STR_PAD_LEFT);
              echo "<td class='col-no $class_divider'>$formatted_no</td>";
              echo "<td>" . ($data_input[$formatted_no]['k'] ?? '') . "</td>";
              echo "<td>" . ($data_input[$formatted_no]['p'] ?? '') . "</td>";
              echo "<td class='col-aksi'>";
              if (isset($data_input[$formatted_no])) {
                echo "<div class='btn-group'>";
                echo "<a href='#' class='btn-edit'>Edit</a>";
                echo "<a href='#' class='btn-hapus'>Hapus</a>";
                echo "</div>";
              }
              echo "</td>";
            } else {
              echo "<td class='col-no $class_divider'></td>";
              echo "<td></td><td></td><td></td>";
            }
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>