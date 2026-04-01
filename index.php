<?php
include_once 'controllers/controller.php';

$controller = new PengendaliController();
$controller->handleRequest();

if (!isset($_SESSION['user_id'])) {
  ?>
  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengendali Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap"
      rel="stylesheet">
    <style>
      html,
      body {
        height: 100%;
        min-height: 100%;
        margin: 0;
        padding: 0;
      }

      body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('assets/bangunan_dinpus.webp');
        background-size: cover;
        background-position: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow-y: auto;
      }

      .swal2-title-bold,
      .swal2-content,
      .swal2-html-container,
      .swal-normal-body {
        font-weight: normal !important;
      }

      .auth-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        width: 100%;
        max-width: 400px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      }

      .nav-pills .nav-link {
        color: #666;
        font-weight: 600;
      }

      .nav-pills .nav-link.active {
        background-color: #000;
      }

      .btn-auth {
        background: #000;
        color: #fff;
        font-weight: 700;
        border: none;
      }

      .swal2-html-container {
        font-weight: normal !important;
      }

      .btn-auth:hover {
        background: #333;
        color: #fff;
      }

      .input-group {
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        overflow: hidden;
      }

      .input-group .form-control,
      .input-group .btn-password-visibility {
        border: none;
        box-shadow: none;
      }

      .input-group .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }

      .btn-password-visibility {
        background: #ffffff;
        color: #495057;
        border-radius: 0;
        padding: 0 0.45rem;
      }

      .input-group:focus-within {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
      }

      .btn-password-visibility:hover {
        background-color: #f8f9fa;
      }

      .btn-password-visibility:focus {
        outline: none;
        box-shadow: none;
      }

      .sistem-surat-title {
        font-weight: 700;
        text-transform: uppercase;
      }
    </style>
  </head>

  <body>
    <div class="auth-card">
      <h2 class="text-center sistem-surat-title mb-4">SISTEM SURAT</h2>

      <ul class="nav nav-pills nav-justified mb-4" id="pills-tab" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="pill"
            data-bs-target="#tab-login">LOGIN</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-register">DAFTAR</button>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-login">
          <form action="index.php" method="POST">
            <input type="hidden" name="login_action" value="1">
            <div class="mb-3"><label class="form-label small fw-bold">USERNAME</label><input type="text" name="username"
                class="form-control" required></div>
            <div class="mb-4">
              <label class="form-label small fw-bold">PASSWORD</label>
              <div class="input-group">
                <input type="password" id="loginPassword" name="password" class="form-control" required>
                <button type="button" class="btn-password-visibility" onclick="togglePassword('loginPassword', this)">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
            <button type="submit" class="btn btn-auth w-100 py-2">MASUK</button>
          </form>
        </div>

        <div class="tab-pane fade" id="tab-register">
          <form action="index.php" method="POST" id="registerForm">
            <input type="hidden" name="register_action" value="1">
            <div class="mb-3"><label class="form-label small fw-bold">NAMA LENGKAP</label><input type="text"
                name="nama_lengkap" class="form-control" required></div>
            <div class="mb-3"><label class="form-label small fw-bold">USERNAME</label><input type="text" name="username"
                class="form-control" required></div>
            <div class="mb-3">
              <label class="form-label small fw-bold">PASSWORD</label>
              <div class="input-group">
                <input type="password" id="registerPassword" name="password" class="form-control" required>
                <button type="button" class="btn-password-visibility" onclick="togglePassword('registerPassword', this)">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
            <div class="mb-4">
              <label class="form-label small fw-bold">RE-PASSWORD</label>
              <div class="input-group">
                <input type="password" id="registerRePassword" name="repassword" class="form-control" required>
                <button type="button" class="btn-password-visibility"
                  onclick="togglePassword('registerRePassword', this)">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
            <button type="submit" class="btn btn-auth w-100 py-2" style="background:#000">DAFTAR AKUN</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        if (input.type === 'password') {
          input.type = 'text';
          if (icon) icon.classList.replace('bi-eye-slash', 'bi-eye');
        } else {
          input.type = 'password';
          if (icon) icon.classList.replace('bi-eye', 'bi-eye-slash');
        }
      }

      document.getElementById('registerForm').addEventListener('submit', function (e) {
        const pass = document.getElementById('registerPassword').value;
        const repass = document.getElementById('registerRePassword').value;
        if (pass !== repass) {
          e.preventDefault();
          Swal.fire('Gagal', 'Password dan re-password tidak cocok.', 'error');
        }
      });

      <?php if (isset($_GET['status'])): ?>
        const status = '<?php echo $_GET['status']; ?>';
        const reason = '<?php echo isset($_GET['reason']) ? $_GET['reason'] : ''; ?>';

        if (status === 'login_success') {
          Swal.fire('Sukses', 'Login berhasil. Selamat datang!', 'success');
        } else if (status === 'login_failed') {
          let message = 'Login gagal.';
          if (reason === 'username_not_found') message = 'Login gagal: Username tidak ditemukan.';
          else if (reason === 'wrong_password') message = 'Login gagal: Password salah.';
          Swal.fire('Gagal', message, 'error');
        } else if (status === 'reg_success') {
          Swal.fire('Sukses', 'Registrasi berhasil. Sedang masuk otomatis...', 'success');
        } else if (status === 'reg_failed') {
          let message = 'Registrasi gagal.';
          if (reason === 'username_taken') message = 'Registrasi gagal: Username sudah digunakan.';
          else if (reason === 'password_mismatch') message = 'Registrasi gagal: Password tidak cocok.';
          Swal.fire('Gagal', message, 'error');
        }

        setTimeout(() => {
          window.scrollTo(0, 0);
          const url = window.location.protocol + '//' + window.location.host + window.location.pathname;
          window.history.replaceState(null, document.title, url);
        }, 1800);
      <?php endif; ?>
    </script>
  </body>

  </html>
  <?php
  exit();
}

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
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
      }

      .choice-card {
        background: white;
        padding: 50px;
        border-radius: 20px;
        text-align: center;
      }

      .btn-choice {
        padding: 20px 40px;
        font-weight: 800;
        border-radius: 12px;
        background: #000;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
      }

      .btn-choice:hover {
        background: #fff;
        color: #000;
        border: 1px solid #000;
        transform: translateY(-5px);
      }

      .fixed-logout-choice {
        position: fixed;
        top: 14px;
        right: 16px;
        z-index: 9999;
      }

      .fixed-logout-choice .btn {
        font-size: 0.875rem;
        font-weight: 700;
      }
    </style>
  </head>

  <body>
    <?php if (isset($_SESSION['user_id'])): ?>
      <div class="fixed-logout-choice">
        <button type="button" class="btn btn-danger btn-sm fw-bold" style="border-radius:4px;"
          onclick="konfirmasiLogoutChoice();">LOGOUT</button>
      </div>
    <?php endif; ?>
    <div class="choice-card">
      <h2>SISTEM PENGENDALI SURAT</h2> <br>
      <div class="small fw-bold text-uppercase">Selamat Datang, <?php echo $_SESSION['username']; ?>
      </div>
      <p class="mb-4">Pilih jenis pengendalian surat untuk melanjutkan</p>
      <div class="d-flex gap-3 justify-content-center">
        <a href="index.php?type=biasa" class="btn-choice">SURAT KELUAR BIASA</a>
        <a href="index.php?type=spt" class="btn-choice">SURAT KELUAR SPT</a>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      function konfirmasiLogoutChoice() {
        const username = '<?php echo isset($_SESSION['username']) ? addslashes($_SESSION['username']) : 'user'; ?>';
        Swal.fire({
          title: 'Konfirmasi Logout',
          text: `Anda akan keluar dari ${username}.`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#aaa',
          confirmButtonText: 'Ya, keluar',
          cancelButtonText: 'Batal',
          scrollbarPadding: false,
          heightAuto: false,
          background: '#fff',
          customClass: {
            popup: 'swal2-border',
            title: 'swal2-title-bold',
            htmlContainer: 'swal-normal-body'
          }
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php?logout=1';
          }
        });
      }
    </script>
  </body>

  </html>
  <?php
  exit();
}

$page = isset($_GET['page']) ? (int) $_GET['page'] : null;
$controller->index($page);