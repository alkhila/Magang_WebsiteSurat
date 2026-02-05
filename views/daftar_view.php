<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengendali Surat Keluar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --success-color: #10b981;
      --danger-color: #ef4444;
      /* Warna Baru untuk Tombol */
      --btn-tambah-bg: #0d6efd; /* Biru Bootstrap */
      --btn-tambah-hover: #0a58ca; /* Biru Lebih Gelap */
      --btn-sisipan-bg: #ffc107; /* Kuning Bootstrap */
      --btn-sisipan-hover: #e0a800; /* Kuning Lebih Gelap */
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

    .col-divider {
      border-left: 3px solid #000 !important;
    }

    /* Update Tombol Tambah Data - Warna Biru */
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
      background-color: var(--btn-tambah-hover);
      color: #fff;
      box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }

    /* Update Tombol Sisipan - Warna Kuning */
    .btn-sisipan-custom {
      background-color: var(--btn-sisipan-bg);
      border: 1px solid var(--btn-sisipan-hover);
      color: #000;
      padding: 8px 20px;
      font-weight: 700;
      font-size: 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .btn-sisipan-custom:hover {
      background-color: var(--btn-sisipan-hover) !important;
      border-color: var(--btn-sisipan-hover);
      color: #000 !important;
      box-shadow: 0 4px 12px rgba(255, 193, 7, 0.2);
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
      .d-print-none { display: none !important; }
      body { padding: 0; }
      .main-card { box-shadow: none; border: none; padding: 0; max-width: 100%; }
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
          <a href="index.php?page=<?php echo $currentPage - 1; ?>" class="btn-nav" title="Kembali ke lembar sebelumnya">← SEBELUMNYA</a>
        <?php endif; ?>
      </div>
      <div class="nav-center">
        <span class="fw-bold">LEMBAR <?php echo $currentPage; ?></span>
      </div>
      <div class="nav-side right">
        <a href="index.php?page=<?php echo $currentPage + 1; ?>" class="btn-nav" title="Buka lembar berikutnya">SELANJUTNYA →</a>
      </div>
    </div>

    <div class="d-flex justify-content-end mb-4 d-print-none">
      <button class="btn btn-sisipan-custom me-2 fw-bold" onclick="bukaModalSisipan()" title="Tambah data nomor selipan">+ SISIPAN</button>
      <button class="btn-modern-add" onclick="bukaModalTambah()" title="Tambah data baru ke baris kosong">+ TAMBAH DATA</button>
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
            $ranges = [['o' => 0, 'm' => 33], ['o' => 34, 'm' => 66], ['o' => 67, 'm' => 99]];
            foreach ($ranges as $idx => $r) {
              $divider = ($idx > 0) ? 'col-divider' : '';
              $current_no = $startNumber + $r['o'] + $i;

              if (($r['o'] + $i) <= 99) {
                $k = $data[$current_no]['k'] ?? '';
                $p = $data[$current_no]['p'] ?? '';
                
                $tRaw = $data[$current_no]['t'] ?? '';
                $t = ($tRaw && $tRaw != '0000-00-00 00:00:00') ? date('d-m-y', strtotime($tRaw)) : '';

                echo "<td class='no-column $divider'>$current_no</td><td>$k</td><td style='width: 80px; white-space: nowrap;'>$t</td><td style='width: 120px; text-align: center !important;'>$p</td><td class='d-print-none'>";
                if (isset($data[$current_no])) {
                  echo "<button class='btn-action-edit' onclick='bukaModalEdit(\"$current_no\", \"$current_no\", \"$k\", \"$p\", \"\", false)' title='Ubah data ini'>EDIT</button>";
                  echo "<button class='btn-action-delete' onclick='konfirmasiHapus(\"$current_no\", \"$current_no\", false)' title='Hapus data ini'>HAPUS</button>";
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

    <?php if (!empty($sisipanData)): ?>
    <div class="mt-5">
      <h5 class="fw-bold mb-3" style="font-size: 14px; text-transform: uppercase;">Nomor Sisipan (Lembar <?php echo $currentPage; ?>)</h5>
      <div class="table-responsive" style="border-color: #ef4444;">
        <table class="main-table text-center">
          <thead>
            <tr style="background-color: #fef2f2;">
              <th width="100">No. Sisipan</th><th>Klasifikasi</th><th>Tanggal</th><th>Ket (+)</th><th width="140" class="d-print-none">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sisipanData as $s): ?>
            <tr>
              <td class="fw-bold" style="color: #ef4444;"><?php echo $s['no_urut']; ?></td>
              <td><?php echo $s['klas']; ?></td>
              <td><?php echo date('d-m-y', strtotime($s['tanggal_manual'])); ?></td>
              <td><?php echo $s['plus']; ?></td>
              <td class="d-print-none">
                <button class="btn-action-edit" onclick="bukaModalEdit('<?php echo $s['no_urut']; ?>', '<?php echo $s['no_urut']; ?>', '<?php echo $s['klas']; ?>', '<?php echo $s['plus']; ?>', '<?php echo $s['tanggal_manual']; ?>', true)" title="Ubah data sisipan">EDIT</button>
                <button class="btn-action-delete" onclick="konfirmasiHapus('<?php echo $s['no_urut']; ?>', '<?php echo $s['no_urut']; ?>', true)" title="Hapus data sisipan">HAPUS</button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endif; ?>
  </div>

  <div class="modal fade" id="modalData" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
        <div class="modal-header bg-dark text-white">
          <h6 class="modal-title fw-bold" id="modalTitle">TAMBAH DATA</h6>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <form id="formInput" action="index.php?page=<?php echo $currentPage; ?>" method="POST" novalidate>
          <input type="hidden" name="aksi" id="form_mode" value="tambah">
          <input type="hidden" name="is_sisipan" id="is_sisipan" value="0">
          <input type="hidden" name="no_urut" id="input_no">

          <div class="modal-body p-4">
            <div class="mb-3" id="container_no_sisipan" style="display:none;">
              <label class="form-label small fw-bold text-uppercase">Nomor Sisipan</label>
              <input type="text" id="display_no_sisipan" class="form-control" placeholder="Contoh: 1.a atau 1.1" oninput="syncNoSisipan(this.value)" oninvalid="this.setCustomValidity('Mohon isi nomor sisipan')" oninput="this.setCustomValidity('')">
            </div>

            <div class="mb-3" id="container_tgl">
              <label class="form-label small fw-bold text-uppercase">Tanggal Surat</label>
              <input type="date" name="tanggal_manual" id="input_tgl" class="form-control" oninvalid="this.setCustomValidity('Mohon pilih tanggal')" oninput="this.setCustomValidity('')">
            </div>

            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Klasifikasi</label>
              <input type="text" name="klas" id="input_klas" class="form-control" placeholder="Contoh: 111.111.111.111" required oninvalid="this.setCustomValidity('Mohon isi bidang klasifikasi')" oninput="this.setCustomValidity('')">
            </div>
            <div class="mb-3">
              <label class="form-label small fw-bold text-uppercase">Keterangan</label>
              <select name="plus" id="input_plus" class="form-select" required oninvalid="this.setCustomValidity('Mohon pilih salah satu keterangan')" oninput="this.setCustomValidity('')">
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

    function syncNoSisipan(val) {
        document.getElementById('input_no').value = val;
    }

    function bukaModalTambah() {
      document.getElementById('modalTitle').innerText = "TAMBAH DATA (LEMBAR <?php echo $currentPage; ?>)";
      document.getElementById('form_mode').value = "tambah";
      document.getElementById('is_sisipan').value = "0";
      
      document.getElementById('container_no_sisipan').style.display = "none";
      document.getElementById('container_tgl').style.display = "none";
      
      document.getElementById('input_no').value = "";
      document.getElementById('input_tgl').required = false;
      formInput.reset();
      modalCtrl.show();
    }

    function bukaModalSisipan() {
      document.getElementById('modalTitle').innerText = "TAMBAH SISIPAN (LEMBAR <?php echo $currentPage; ?>)";
      document.getElementById('form_mode').value = "tambah";
      document.getElementById('is_sisipan').value = "1";
      
      document.getElementById('container_no_sisipan').style.display = "block";
      document.getElementById('container_tgl').style.display = "block";
      
      document.getElementById('display_no_sisipan').value = "";
      document.getElementById('input_no').value = "";
      document.getElementById('input_tgl').required = true;
      formInput.reset();
      modalCtrl.show();
    }

    function bukaModalEdit(id, f_no, klas, plus, tgl, sisipan = false) {
      document.getElementById('modalTitle').innerText = "EDIT DATA NOMOR " + f_no;
      document.getElementById('form_mode').value = "edit";
      document.getElementById('is_sisipan').value = sisipan ? "1" : "0";
      document.getElementById('container_no_sisipan').style.display = "none";
      document.getElementById('input_no').value = id;
      document.getElementById('container_tgl').style.display = sisipan ? "block" : "none";
      document.getElementById('input_klas').value = klas;
      document.getElementById('input_plus').value = plus;
      
      if(sisipan) {
        document.getElementById('input_tgl').value = tgl;
        document.getElementById('input_tgl').required = true;
      } else {
        document.getElementById('input_tgl').required = false;
      }
      modalCtrl.show();
    }

    function konfirmasiHapus(db_id, f_no, sisipan = false) {
      const url = `index.php?hapus=${db_id}&page=<?php echo $currentPage; ?>${sisipan ? '&sisipan=1' : ''}`;
      Swal.fire({
        title: 'Hapus Data?',
        text: "Data nomor " + f_no + " akan dihapus selamanya.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#000',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, Hapus!'
      }).then((result) => { if (result.isConfirmed) window.location.href = url; });
    }

    <?php if (isset($_GET['status'])): ?>
      const status = '<?php echo $_GET['status']; ?>';
      
      if (status === 'exists') {
        Swal.fire({
          title: 'Gagal Menyimpan Data!',
          text: 'Maaf, Nomor Sisipan "<?php echo $_GET['val'] ?? ""; ?>" sudah terdaftar di sistem. Mohon gunakan nomor urut yang berbeda.',
          icon: 'error',
          confirmButtonColor: '#000',
          confirmButtonText: 'Saya Mengerti'
        }).then(() => {
          window.history.replaceState({}, document.title, window.location.pathname + "?page=<?php echo $currentPage; ?>");
        });
      } else {
        let titleText = "Berhasil!";
        let detailText = "";
        let iconType = "success";

        if (status === 'success') detailText = "Data berhasil ditambahkan ke lembar kerja.";
        else if (status === 'updated') detailText = "Perubahan data telah berhasil disimpan.";
        else if (status === 'deleted') detailText = "Data telah berhasil dihapus dari sistem.";
        else if (status === 'full') {
          titleText = "Gagal!";
          detailText = "Lembar ini sudah penuh (maksimal 100 baris)";
          iconType = "error";
        }

        Swal.fire({
          title: titleText,
          text: detailText,
          icon: iconType,
          timer: 1500,
          showConfirmButton: false
        }).then(() => {
          window.history.replaceState({}, document.title, window.location.pathname + "?page=<?php echo $currentPage; ?>");
        });
      }
    <?php endif; ?>
  </script>
</body>

</html>