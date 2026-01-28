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
      color: #000;
      padding: 40px 15px;
    }

    .main-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
      padding: 40px;
      max-width: 1450px;
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
      border-bottom: 4px solid #000;
      display: inline-block;
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
    }

    .btn-nav:hover {
      background: #000;
      color: #fff;
    }

    .table-responsive {
      border: 2px solid #000;
      border-radius: 4px;
      overflow-x: auto;
    }

    .main-table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed;
    }

    .main-table th {
      background-color: #f1f5f9;
      padding: 12px 5px;
      font-size: 12px;
      font-weight: 800;
      text-transform: uppercase;
      border-bottom: 2px solid #000;
      border-right: 1px solid #000;
    }

    .main-table td {
      padding: 8px 4px;
      font-size: 12px;
      border-bottom: 1px solid #000;
      border-right: 1px solid #000;
      vertical-align: middle;
      color: #000;
      word-wrap: break-word;
    }

    .no-column {
      background-color: #f8fafc;
      font-weight: 700;
      width: 35px;
      text-align: center;
    }

    .tgl-column {
      width: 80px;
      white-space: nowrap;
    }

    .ket-column {
      width: 120px;
      white-space: normal;
      text-align: center !important;
      line-height: 1.3;
    }

    .col-divider {
      border-left: 3px solid #000 !important;
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
      padding: 2px 6px;
      border-radius: 4px;
      font-size: 9px;
      font-weight: 700;
    }

    .btn-action-delete {
      background-color: var(--danger-color);
      color: #fff;
      border: none;
      padding: 2px 6px;
      border-radius: 4px;
      font-size: 9px;
      font-weight: 700;
      margin-left: 2px;
    }

    @media print {
      .d-print-none {
        display: none !important;
      }

      body {
        padding: 0;
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
              <th class="<?php echo ($k > 0) ? 'col-divider' : ''; ?>" width="35">No</th>
              <th width="75">Klasifikasi</th>
              <th width="80">Tanggal</th>
              <th width="120">Ket (+)</th>
              <th width="85" class="d-print-none">Aksi</th>
            <?php endfor; ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $baseOffset = ($currentPage * 100);
          for ($i = 0; $i < 34; $i++) {
            echo "<tr>";
            $ranges = [['s' => 1, 'm' => 34], ['s' => 35, 'm' => 67], ['s' => 68, 'm' => 100]];
            foreach ($ranges as $idx => $r) {
              $divider = ($idx > 0) ? 'col-divider' : '';
              $display_no = $r['s'] + $i;
              $db_id = $baseOffset + $display_no;

              if ($display_no <= $r['m']) {
                $f_no = ($db_id < 100) ? str_pad($db_id, 2, "0", STR_PAD_LEFT) : $db_id;
                $k = $data[$db_id]['k'] ?? '';
                $p = $data[$db_id]['p'] ?? '';
                $t = isset($data[$db_id]['t']) ? date('d-m-Y', strtotime($data[$db_id]['t'])) : '';

                echo "<td class='no-column $divider'>$f_no</td><td>$k</td><td class='tgl-column'>$t</td><td class='ket-column'>$p</td><td class='d-print-none'>";
                if (isset($data[$db_id])) {
                  echo "<button class='btn-action-edit' onclick='bukaModalEdit(\"$db_id\", \"$f_no\", \"$k\", \"$p\")'>EDIT</button>";
                  echo "<button class='btn-action-delete' onclick='konfirmasiHapus(\"$db_id\", \"$f_no\")'>HAPUS</button>";
                }
                echo "</td>";
              } else {
                echo "<td class='no-column $divider'></td><td></td><td></td><td></td><td class='d-print-none'></td>";
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
        <div class="modal-header bg-dark text-white">
          <h6 class="modal-title fw-bold" id="modalTitle">TAMBAH DATA</h6>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="formInput" action="index.php?page=<?php echo $currentPage; ?>" method="POST">
          <input type="hidden" name="aksi" id="form_mode" value="tambah">
          <div class="modal-body p-4">
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">
                Nomor Baris (<?php echo ($currentPage * 100) + 1; ?>-<?php echo ($currentPage * 100) + 100; ?>)
              </label>
              <input type="number" name="no_urut" id="input_no" class="form-control"
                min="<?php echo ($currentPage * 100) + 1; ?>" max="<?php echo ($currentPage * 100) + 100; ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Klasifikasi</label>
              <input type="text" name="klas" id="input_klas" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Keterangan</label>
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
      document.getElementById('input_plus').value = plus;
      modalCtrl.show();
    }

    function konfirmasiHapus(db_id, f_no) {
      Swal.fire({
        title: 'Hapus Data?',
        text: "Data nomor " + f_no + " akan dihapus.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#000',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "index.php?hapus=" + db_id + "&page=<?php echo $currentPage; ?>";
        }
      });
    }

    <?php if (isset($_GET['status'])): ?>
      const status = '<?php echo $_GET['status']; ?>';
      const type = '<?php echo $_GET['type'] ?? ""; ?>';
      if (status === 'exists') {
        let pesan = "";
        if (type === 'both') {
          pesan = `Ada 2 kesalahan: Nomor urut <?php echo $_GET['val_no'] ?? ""; ?> sudah terisi dan kode klasifikasi <?php echo $_GET['val_klas'] ?? ""; ?> sudah ada.`;
        } else if (type === 'nomor') {
          pesan = `Nomor urut <?php echo $_GET['val'] ?? ""; ?> sudah terisi di lembar ini.`;
        } else {
          pesan = `Kode klasifikasi <?php echo $_GET['val'] ?? ""; ?> sudah ada.`;
        }
        Swal.fire({
          title: 'Gagal Simpan!',
          text: pesan,
          icon: 'error',
          confirmButtonColor: '#000'
        }).then(() => {
          window.history.replaceState({}, document.title, window.location.pathname + "?page=<?php echo $currentPage; ?>");
        });
      } else {
        Swal.fire({
          title: 'Berhasil!',
          icon: 'success',
          timer: 2000,
          showConfirmButton: false
        }).then(() => {
          window.history.replaceState({}, document.title, window.location.pathname + "?page=<?php echo $currentPage; ?>");
        });
      }
    <?php endif; ?>
  </script>
</body>

</html>