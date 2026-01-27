<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengendali Surat Keluar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --success-color: #10b981;
      --danger-color: #ef4444;
    }

    body {
      background-color: #f8fafc;
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #000000;
      padding: 40px 15px;
    }

    .main-card {
      background: #ffffff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
      padding: 40px;
      max-width: 1280px;
      margin: 0 auto;
      position: relative;
      border: 1px solid #cbd5e1;
    }

    .page-info {
      position: absolute;
      top: 25px;
      right: 40px;
      font-weight: 700;
      font-size: 13px;
    }

    .header-brand {
      text-align: center;
      margin-bottom: 30px;
    }

    .header-brand h2 {
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 5px;
      display: inline-block;
      border-bottom: 4px solid #000;
    }

    .header-brand p {
      font-weight: 600;
      font-size: 18px;
      margin: 0;
    }

    .pagination-nav {
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-side {
      width: 150px;
      display: flex;
    }

    .nav-side.left {
      justify-content: flex-end;
    }

    .nav-side.right {
      justify-content: flex-start;
    }

    .nav-center {
      min-width: 150px;
      text-align: center;
      font-size: 18px;
    }

    .btn-nav {
      background: #fff;
      border: 1px solid #000;
      color: #000;
      padding: 5px 15px;
      font-weight: 700;
      font-size: 12px;
      text-decoration: none;
      border-radius: 4px;
      transition: 0.2s;
    }

    .btn-nav:hover {
      background: #000;
      color: #fff;
    }

    .table-responsive {
      border: 2px solid #000;
      border-radius: 4px;
      overflow: hidden;
    }

    .main-table {
      width: 100%;
      border-collapse: collapse;
    }

    .main-table th {
      background-color: #f1f5f9;
      padding: 12px 8px;
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      border-bottom: 2px solid #000;
      border-right: 1px solid #000;
    }

    .main-table td {
      padding: 10px 6px;
      font-size: 12px;
      border-bottom: 1px solid #000;
      border-right: 1px solid #000;
      vertical-align: middle;
      font-weight: 500;
      color: #000;
    }

    .col-divider {
      border-left: 3px solid #000 !important;
    }

    .no-column {
      background-color: #f8fafc;
      font-weight: 700;
      width: 45px;
    }

    .btn-modern-add {
      background-color: #000;
      color: #fff;
      border: none;
      padding: 8px 20px;
      font-weight: 700;
      font-size: 12px;
      border-radius: 6px;
    }

    .btn-action-edit {
      background-color: var(--success-color);
      color: #fff;
      border: none;
      padding: 3px 10px;
      border-radius: 4px;
      font-size: 10px;
      font-weight: 700;
    }

    .btn-action-delete {
      background-color: var(--danger-color);
      color: #fff;
      border: none;
      padding: 3px 10px;
      border-radius: 4px;
      font-size: 10px;
      font-weight: 700;
      margin-left: 4px;
    }

    @media print {
      .d-print-none {
        display: none !important;
      }

      body {
        padding: 0;
        background: white;
      }

      .main-card {
        box-shadow: none;
        border: none;
        padding: 0;
        max-width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="main-card">
    <div class="page-info">HALAMAN : <?php echo str_pad($currentPage, 2, "0", STR_PAD_LEFT); ?></div>

    <div class="header-brand">
      <h2>Daftar Pengendali Surat Keluar</h2>
      <p>SPT ♥</p>
    </div>

    <div class="pagination-nav d-print-none">
      <div class="nav-side left">
        <?php if ($currentPage > 0): ?>
          <a href="index.php?page=<?php echo $currentPage - 1; ?>" class="btn-nav">← SEBELUMNYA</a>
        <?php endif; ?>
      </div>
      <div class="nav-center">
        <span class="fw-bold">LEMBAR <?php echo $currentPage; ?></span>
      </div>
      <div class="nav-side right">
        <a href="index.php?page=<?php echo $currentPage + 1; ?>" class="btn-nav">SELANJUTNYA →</a>
      </div>
    </div>

    <div class="d-flex justify-content-end mb-4 d-print-none">
      <button class="btn-modern-add" onclick="bukaModalTambah()">+ TAMBAH DATA</button>
    </div>

    <div class="table-responsive">
      <table class="main-table text-center">
        <thead>
          <tr>
            <?php for ($k = 0; $k < 3; $k++): ?>
              <th class="<?php echo ($k > 0) ? 'col-divider' : ''; ?>">No</th>
              <th>Klasifikasi</th>
              <th width="150">Ket (+)</th>
              <th width="140" class="d-print-none">Aksi</th>
            <?php endfor; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $baseID = $currentPage * 100;
          for ($i = 0; $i < 34; $i++) {
            echo "<tr>";
            $ranges = [['s' => 0, 'm' => 33], ['s' => 34, 'm' => 66], ['s' => 67, 'm' => 99]];
            foreach ($ranges as $idx => $r) {
              $divider = ($idx > 0) ? 'col-divider' : '';
              $display_no = $r['s'] + $i;
              $db_id = $baseID + $display_no;

              if ($display_no <= $r['m']) {
                $f_no = str_pad($display_no, 2, "0", STR_PAD_LEFT);
                $k = $data[$db_id]['k'] ?? '';
                $p = $data[$db_id]['p'] ?? '';

                echo "<td class='no-column $divider'>$f_no</td>";
                echo "<td>$k</td>";
                echo "<td>$p</td>";
                echo "<td class='d-print-none'>";
                if (isset($data[$db_id])) {
                  echo "<button class='btn-action-edit' onclick='bukaModalEdit(\"$db_id\", \"$f_no\", \"$k\", \"$p\")'>EDIT</button>";
                  echo "<button class='btn-action-delete' onclick='konfirmasiHapus(\"$db_id\", \"$f_no\")'>HAPUS</button>";
                }
                echo "</td>";
              } else {
                echo "<td class='no-column $divider'></td><td></td><td></td><td class='d-print-none'></td>";
              }
            }
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal fade" id="modalData" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
        <div class="modal-header bg-dark text-white" style="border-radius: 12px 12px 0 0;">
          <h6 class="modal-title fw-bold" id="modalTitle">TAMBAH DATA</h6>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="formInput" action="index.php?page=<?php echo $currentPage; ?>" method="POST">
          <input type="hidden" name="aksi" id="form_mode" value="tambah">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Nomor Baris (00-99)</label>
              <input type="number" name="no_urut" id="input_no" class="form-control" placeholder="00-99" min="0"
                max="99" required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Klasifikasi</label>
              <input type="text" name="klas" id="input_klas" class="form-control"
                placeholder="Masukkan kode klasifikasi..." required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Keterangan Bidang/Sub Bagian</label>
              <select name="plus" id="input_plus" class="form-select" required>
                <option value="" disabled selected>Pilih Bidang/Sub Bagian...</option>
                <option value="Bidang Perpustakaan">Bidang Perpustakaan</option>
                <option value="Bidang Arsip">Bidang Arsip</option>
                <option value="Bidang PSP">Bidang PSP</option>
                <option value="Sub Bagian KPE">Sub Bagian KPE</option>
                <option value="Sub Bagian Umum dan Kepegawaian">Sub Bagian Umum dan Kepegawaian</option>
              </select>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="button" class="btn btn-light small fw-bold" data-bs-dismiss="modal">BATAL</button>
            <button type="submit" class="btn btn-dark small fw-bold px-4">SIMPAN</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const modalCtrl = new bootstrap.Modal(document.getElementById('modalData'));
    const formInput = document.getElementById('formInput');

    function bukaModalTambah() {
      document.getElementById('modalTitle').innerText = "TAMBAH DATA (LEMBAR <?php echo $currentPage; ?>)";
      document.getElementById('form_mode').value = "tambah";
      document.getElementById('input_no').readOnly = false;
      formInput.reset();
      modalCtrl.show();
    }

    function bukaModalEdit(db_id, f_no, klas, plus) {
      document.getElementById('modalTitle').innerText = "EDIT DATA #" + f_no;
      document.getElementById('form_mode').value = "edit";
      document.getElementById('input_no').value = db_id;
      document.getElementById('input_no').readOnly = true;
      document.getElementById('input_klas').value = klas;

      // Cari option yang text-nya sama dengan data database
      const select = document.getElementById('input_plus');
      for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].value === plus) {
          select.selectedIndex = i;
          break;
        }
      }
      modalCtrl.show();
    }

    function konfirmasiHapus(db_id, f_no) {
      Swal.fire({
        title: 'Hapus Data?',
        text: "Data nomor " + f_no + " akan dihapus permanen.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#000000',
        cancelButtonColor: '#ef4444',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "index.php?hapus=" + db_id + "&page=<?php echo $currentPage; ?>";
        }
      });
    }

    <?php if (isset($_GET['status'])): ?>
      const status = '<?php echo $_GET['status']; ?>';
      let config = { confirmButtonColor: '#000000', timer: 2000, showConfirmButton: false };

      if (status === 'success') {
        config.title = 'Berhasil!';
        config.text = 'Data berhasil disimpan.';
        config.icon = 'success';
      } else if (status === 'deleted') {
        config.title = 'Terhapus!';
        config.text = 'Data berhasil dihapus.';
        config.icon = 'success';
      }

      Swal.fire(config).then(() => {
        window.history.replaceState({}, document.title, window.location.pathname + "?page=<?php echo $currentPage; ?>");
      });
    <?php endif; ?>
  </script>
</body>

</html>