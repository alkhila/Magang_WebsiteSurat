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
      --btn-tambah-bg: #0d6efd;
      --btn-sisipan-bg: #ffc107;
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

    .btn-nav {
      background: #fff;
      border: 1px solid #000;
      color: #000;
      padding: 5px 15px;
      font-weight: 700;
      font-size: 12px;
      text-decoration: none;
      border-radius: 4px;
      transition: all 0.3s ease;
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
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      border-bottom: 2px solid #000;
      border-right: 1px solid #000;
    }

    .main-table td {
      padding: 8px 4px;
      font-size: 11px;
      border-bottom: 1px solid #000;
      border-right: 1px solid #000;
      vertical-align: middle;
    }

    .no-column {
      background-color: #f8fafc;
      font-weight: 700;
      width: 35px;
      text-align: center;
    }

    .col-divider {
      border-left: 3px solid #000 !important;
    }

    /* TOMBOL TAMBAH & HOVER */
    .btn-modern-add {
      background-color: var(--btn-tambah-bg);
      color: #fff;
      border: none;
      padding: 8px 20px;
      font-weight: 700;
      font-size: 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .btn-modern-add:hover {
      background-color: #5a7d9a;
      /* Biru keabu-abuan */
      color: #fff;
    }

    /* TOMBOL SISIPAN & HOVER */
    .btn-sisipan-custom {
      background-color: var(--btn-sisipan-bg);
      border: 1px solid #e0a800;
      color: #000;
      padding: 8px 20px;
      font-weight: 700;
      font-size: 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .btn-sisipan-custom:hover {
      background-color: #d6b55d;
      /* Kuning keabu-abuan */
      border-color: #bfa14b;
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

    /* CSS PRINT PORTRAIT A4 */
    @media print {
      @page {
        size: A4 portrait;
        margin: 8mm;
      }

      body {
        padding: 0 !important;
        margin: 0 !important;
        background-color: #fff !important;
        zoom: 72%;
      }

      .main-card {
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        box-shadow: none !important;
        max-width: 100% !important;
      }

      .d-print-none,
      .top-admin-bar,
      .pagination-nav,
      .action-buttons-container,
      .btn-action-edit,
      .btn-action-delete {
        display: none !important;
      }

      .table-responsive {
        border: none !important;
        overflow: visible !important;
      }

      .main-table {
        border: 2px solid #000 !important;
        width: 100% !important;
      }

      .main-table th,
      .main-table td {
        border: 1px solid #000 !important;
        padding: 3px 2px !important;
        font-size: 10px !important;
      }

      .header-brand h2 {
        font-size: 18px !important;
      }
    }
  </style>
</head>

<body>

  <div class="container-fluid d-print-none top-admin-bar mb-3" style="max-width: 1450px;">
    <div class="d-flex justify-content-end align-items-center">
      <?php if (isset($_SESSION['admin_id'])): ?>
        <span class="small fw-bold me-3 text-uppercase">Admin: <?php echo $_SESSION['admin_user']; ?></span>
        <button onclick="window.print()" class="btn btn-danger btn-sm fw-bold me-2" style="font-size: 11px;">EXPORT
          PDF</button>
        <button onclick="konfirmasiLogout()" class="btn btn-outline-dark btn-sm fw-bold"
          style="font-size: 11px;">LOGOUT</button>
      <?php else: ?>
        <button class="btn btn-outline-primary btn-sm fw-bold" style="font-size: 11px;" data-bs-toggle="modal"
          data-bs-target="#modalLogin">LOGIN ADMIN</button>
      <?php endif; ?>
    </div>
  </div>

  <div class="main-card">
    <div class="page-info text-uppercase">HALAMAN : <?php echo str_pad($currentPage, 2, "0", STR_PAD_LEFT); ?></div>
    <div class="header-brand">
      <h2>Daftar Pengendali Surat Keluar</h2>
      <p>SPT ♥</p>
    </div>

    <div class="pagination-nav d-print-none">
      <div style="width:150px; text-align:right;">
        <?php if ($currentPage > 0): ?><a href="index.php?page=<?php echo $currentPage - 1; ?>" class="btn-nav">←
            SEBELUMNYA</a><?php endif; ?>
      </div>
      <div style="min-width:150px; text-align:center;"><span class="fw-bold">LEMBAR <?php echo $currentPage; ?></span>
      </div>
      <div style="width:150px;"><a href="index.php?page=<?php echo $currentPage + 1; ?>" class="btn-nav">SELANJUTNYA
          →</a></div>
    </div>

    <div class="d-flex justify-content-end mb-4 d-print-none action-buttons-container">
      <button class="btn btn-sisipan-custom me-2 fw-bold" onclick="bukaModalSisipan()">+ SISIPAN</button>
      <button class="btn-modern-add fw-bold" onclick="bukaModalTambah()">+ TAMBAH DATA</button>
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
          $startNumber = ($currentPage * 100) + 1;
          for ($i = 0; $i < 34; $i++) {
            echo "<tr>";
            $ranges = [['o' => 0], ['o' => 34], ['o' => 67]];
            foreach ($ranges as $idx => $r) {
              $divider = ($idx > 0) ? 'col-divider' : '';
              $curr_no = $startNumber + $r['o'] + $i;
              if (($r['o'] + $i) <= 99) {
                $k = $data[$curr_no]['k'] ?? '';
                $p = $data[$curr_no]['p'] ?? '';
                $tRaw = $data[$curr_no]['t'] ?? '';
                $t = ($tRaw && $tRaw != '0000-00-00 00:00:00') ? date('d-m-y', strtotime($tRaw)) : '';
                echo "<td class='no-column $divider'>$curr_no</td><td>$k</td><td>$t</td><td>$p</td><td class='d-print-none'>";
                if (isset($data[$curr_no])) {
                  echo "<button class='btn-action-edit' onclick='bukaModalEdit(\"$curr_no\", \"$curr_no\", \"$k\", \"$p\", \"\", false)'>EDIT</button>";
                  echo "<button class='btn-action-delete' onclick='konfirmasiHapus(\"$curr_no\", \"$curr_no\", false)'>HAPUS</button>";
                }
                echo "</td>";
              } else {
                echo "<td class='no-column $divider'></td><td></td><td></td><td></td><td class='d-print-none'></td>";
              }
            }
            echo "</tr>";
          } ?>
        </tbody>
      </table>
    </div>

    <?php if (!empty($sisipanData)): ?>
      <div class="mt-5">
        <h5 class="fw-bold mb-3 small text-uppercase">Nomor Sisipan (Lembar <?php echo $currentPage; ?>)</h5>
        <div class="table-responsive">
          <table class="main-table text-center">
            <thead>
              <tr style="background-color: #fef2f2;">
                <th width="100">No. Sisipan</th>
                <th>Klasifikasi</th>
                <th>Tanggal</th>
                <th>Ket (+)</th>
                <th width="140" class="d-print-none">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($sisipanData as $s): ?>
                <tr>
                  <td class="fw-bold"><?php echo $s['no_urut']; ?></td>
                  <td><?php echo $s['klas']; ?></td>
                  <td><?php echo date('d-m-y', strtotime($s['tanggal_manual'])); ?></td>
                  <td><?php echo $s['plus']; ?></td>
                  <td class="d-print-none">
                    <button class="btn-action-edit"
                      onclick="bukaModalEdit('<?php echo $s['no_urut']; ?>', '<?php echo $s['no_urut']; ?>', '<?php echo $s['klas']; ?>', '<?php echo $s['plus']; ?>', '<?php echo $s['tanggal_manual']; ?>', true)">EDIT</button>
                    <button class="btn-action-delete"
                      onclick="konfirmasiHapus('<?php echo $s['no_urut']; ?>', '<?php echo $s['no_urut']; ?>', true)">HAPUS</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="modal fade" id="modalLogin" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content border-0 shadow" style="border-radius: 12px;">
        <div class="modal-header bg-primary text-white">
          <h6 class="modal-title fw-bold">LOGIN ADMIN</h6><button type="button" class="btn-close btn-close-white"
            data-bs-dismiss="modal"></button>
        </div>
        <form action="index.php?page=<?php echo $currentPage; ?>" method="POST">
          <input type="hidden" name="login" value="1">
          <div class="modal-body p-3">
            <div class="mb-2"><label class="small fw-bold">USERNAME</label><input type="text" name="username"
                class="form-control form-control-sm" required></div>
            <div class="mb-2"><label class="small fw-bold">PASSWORD</label><input type="password" name="password"
                class="form-control form-control-sm" required></div>
          </div>
          <div class="modal-footer border-0"><button type="submit"
              class="btn btn-primary w-100 fw-bold small">MASUK</button></div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalData" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow" style="border-radius: 12px;">
        <div class="modal-header bg-dark text-white">
          <h6 class="modal-title fw-bold" id="modalTitle">TAMBAH DATA</h6><button type="button"
            class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="formInput" action="index.php?page=<?php echo $currentPage; ?>" method="POST">
          <input type="hidden" name="aksi" id="form_mode" value="tambah">
          <input type="hidden" name="is_sisipan" id="is_sisipan" value="0">
          <input type="hidden" name="no_urut" id="input_no">
          <div class="modal-body p-4">
            <div class="mb-3" id="container_no_sisipan" style="display:none;"><label
                class="form-label small fw-bold text-uppercase">Nomor Sisipan</label><input type="text"
                id="display_no_sisipan" class="form-control" oninput="syncNoSisipan(this.value)"></div>
            <div class="mb-3" id="container_tgl" style="display:none;"><label
                class="form-label small fw-bold text-uppercase">Tanggal Surat</label><input type="date"
                name="tanggal_manual" id="input_tgl" class="form-control"></div>
            <div class="mb-3"><label class="form-label small fw-bold text-uppercase">Klasifikasi</label><input
                type="text" name="klas" id="input_klas" class="form-control" required></div>
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
          <div class="modal-footer border-0"><button type="button" class="btn btn-light small fw-bold"
              data-bs-dismiss="modal">BATAL</button><button type="submit"
              class="btn btn-dark small fw-bold px-4">SIMPAN</button></div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const modalCtrl = new bootstrap.Modal(document.getElementById('modalData'));
    const formInput = document.getElementById('formInput');

    function syncNoSisipan(val) { document.getElementById('input_no').value = val; }
    function bukaModalTambah() { document.getElementById('modalTitle').innerText = "TAMBAH DATA"; document.getElementById('form_mode').value = "tambah"; document.getElementById('is_sisipan').value = "0"; document.getElementById('container_no_sisipan').style.display = "none"; document.getElementById('container_tgl').style.display = "none"; document.getElementById('input_no').value = ""; formInput.reset(); modalCtrl.show(); }
    function bukaModalSisipan() { document.getElementById('modalTitle').innerText = "TAMBAH SISIPAN"; document.getElementById('form_mode').value = "tambah"; document.getElementById('is_sisipan').value = "1"; document.getElementById('container_no_sisipan').style.display = "block"; document.getElementById('container_tgl').style.display = "block"; formInput.reset(); modalCtrl.show(); }
    function bukaModalEdit(id, f_no, klas, plus, tgl, sisipan = false) { document.getElementById('modalTitle').innerText = "EDIT DATA NOMOR " + f_no; document.getElementById('form_mode').value = "edit"; document.getElementById('is_sisipan').value = sisipan ? "1" : "0"; document.getElementById('input_no').value = id; document.getElementById('container_no_sisipan').style.display = "none"; document.getElementById('container_tgl').style.display = sisipan ? "block" : "none"; document.getElementById('input_klas').value = klas; document.getElementById('input_plus').value = plus; if (sisipan) document.getElementById('input_tgl').value = tgl; modalCtrl.show(); }

    function konfirmasiHapus(db_id, f_no, sisipan = false) { Swal.fire({ title: 'Hapus Data?', text: "Data nomor " + f_no + " akan dihapus.", icon: 'warning', showCancelButton: true, confirmButtonColor: '#000', confirmButtonText: 'Ya, Hapus!' }).then((result) => { if (result.isConfirmed) window.location.href = `index.php?hapus=${db_id}&page=<?php echo $currentPage; ?>${sisipan ? '&sisipan=1' : ''}`; }); }

    function konfirmasiLogout() {
      Swal.fire({
        title: 'Logout?',
        text: "Anda akan keluar dari mode Admin.",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#000',
        confirmButtonText: 'Ya, Keluar!'
      }).then((result) => { if (result.isConfirmed) { window.location.href = "index.php?page=<?php echo $currentPage; ?>&logout=1"; } });
    }

    <?php if (isset($_GET['status'])): ?>
      const status = '<?php echo $_GET['status']; ?>';
      const val = '<?php echo isset($_GET['val']) ? $_GET['val'] : ""; ?>';
      if (status === 'exists') Swal.fire({ title: 'Nomor Duplikat!', text: 'Nomor sisipan ' + val + ' sudah ada. Silakan gunakan nomor lain.', icon: 'error', confirmButtonColor: '#000' });
      if (status === 'login_success') Swal.fire('Berhasil!', 'Selamat datang Admin.', 'success');
      if (status === 'login_failed') Swal.fire('Gagal!', 'Username atau Password salah.', 'error');
      if (status === 'success') Swal.fire('Berhasil!', 'Data disimpan.', 'success');
      if (status === 'updated') Swal.fire('Berhasil!', 'Data diperbarui.', 'success');
      if (status === 'deleted') Swal.fire('Dihapus!', 'Data dihapus.', 'success');
    <?php endif; ?>
  </script>
</body>

</html>