<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengendali - SPT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
      position: relative;
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
      margin-bottom: 25px;
    }

    .header-area {
      display: flex;
      justify-content: space-between;
      font-size: 11px;
      font-weight: bold;
      margin-bottom: 5px;
      padding: 0 5px;
      align-items: flex-end;
    }

    .btn-tambah-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .btn-tambah {
      padding: 2px 10px;
      font-size: 11px;
      margin-bottom: 4px;
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
      height: 24px;
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

    .divider {
      border-left: 2px solid black !important;
    }

    .btn-group-aksi {
      display: flex;
      gap: 3px;
      justify-content: center;
    }

    .btn-edit-small {
      cursor: pointer;
      text-decoration: none;
      color: #2196F3;
      border: 1px solid #2196F3;
      padding: 0px 4px;
      border-radius: 3px;
      font-size: 9px;
      background: transparent;
    }

    .btn-hapus-small {
      text-decoration: none;
      color: #F44336;
      border: 1px solid #F44336;
      padding: 0px 4px;
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

    <div class="header-area">
      <div style="width: 25%;">Terima tgl, +)</div>
      <div style="width: 25%; text-align: center;">Simpan, +)</div>
      <div style="width: 25%; text-align: center;">Kirim ke unit tgl, +)</div>
      <div style="width: 25%; text-align: right;" class="btn-tambah-container">
        <button type="button" class="btn btn-primary btn-tambah" onclick="bukaModalTambah()">
          + Tambah Data
        </button>
        <div>Ekspedisi tgl, +)</div>
      </div>
    </div>

    <table class="main-table">
      <thead>
        <tr class="header-row">
          <?php for ($k = 0; $k < 3; $k++): ?>
            <th class="col-no <?= ($k > 0) ? 'divider' : '' ?>">No. Urut</th>
            <th style="width:85px;">Klas</th>
            <th style="width:50px;">+)</th>
            <th style="width:70px;">Aksi</th>
          <?php endfor; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        // Data dummy
        $data_input = [
          "01" => ["k" => "000.4.14.3", "p" => "perpus"],
          "02" => ["k" => "000.A.14.3", "p" => "perpus"],
        ];

        for ($i = 0; $i < 34; $i++) {
          echo "<tr>";
          $config = [['start' => 0, 'max' => 33], ['start' => 34, 'max' => 66], ['start' => 67, 'max' => 99]];

          foreach ($config as $index => $c) {
            $class_divider = ($index > 0) ? "divider" : "";
            $val = $c['start'] + $i;
            if ($val <= $c['max']) {
              $formatted_no = str_pad($val, 2, "0", STR_PAD_LEFT);
              $klas = $data_input[$formatted_no]['k'] ?? '';
              $plus = $data_input[$formatted_no]['p'] ?? '';

              echo "<td class='col-no $class_divider'>$formatted_no</td>";
              echo "<td>$klas</td>";
              echo "<td>$plus</td>";
              echo "<td>";
              if (isset($data_input[$formatted_no])) {
                echo "<div class='btn-group-aksi'>";
                echo "<button class='btn-edit-small' onclick='bukaModalEdit(\"$formatted_no\", \"$klas\", \"$plus\")'>Edit</button>";
                echo "<a href='#' class='btn-hapus-small'>Hapus</a>";
                echo "</div>";
              }
              echo "</td>";
            } else {
              echo "<td class='col-no $class_divider'></td><td></td><td></td><td></td>";
            }
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="modalData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="proses.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="aksi" id="form_aksi" value="tambah">
            <div class="mb-3">
              <label class="form-label">Nomor Urut</label>
              <input type="number" name="no_urut" id="input_no" class="form-control" min="0" max="99" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Klasifikasi (Klas)</label>
              <input type="text" name="klas" id="input_klas" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan (+)</label>
              <input type="text" name="plus" id="input_plus" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="btnSubmit">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const modalElement = new bootstrap.Modal(document.getElementById('modalData'));

    function bukaModalTambah() {
      document.getElementById('modalTitle').innerText = "Tambah Data Baru";
      document.getElementById('form_aksi').value = "tambah";
      document.getElementById('input_no').value = "";
      document.getElementById('input_klas').value = "";
      document.getElementById('input_plus').value = "";
      document.getElementById('input_no').readOnly = false;
      modalElement.show();
    }

    function bukaModalEdit(no, klas, plus) {
      document.getElementById('modalTitle').innerText = "Edit Data Nomor: " + no;
      document.getElementById('form_aksi').value = "edit";
      document.getElementById('input_no').value = no;
      document.getElementById('input_klas').value = klas;
      document.getElementById('input_plus').value = plus;
      document.getElementById('input_no').readOnly = true; // Nomor urut tidak boleh diubah saat edit
      modalElement.show();
    }
  </script>
</body>

</html>