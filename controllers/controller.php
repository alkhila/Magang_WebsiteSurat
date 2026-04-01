<?php
include_once 'config/database.php';
include_once 'models/pengendali.php';

class PengendaliController
{
    private $model;
    private $tipe;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE)
            session_start();
        $this->tipe = isset($_GET['type']) ? $_GET['type'] : 'biasa';
        $database = new Database();
        $this->model = new Pengendali($database->getConnection(), $this->tipe);
    }

    public function handleRequest()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
        $tipe = $this->tipe;

        // 1. LOGOUT
        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit();
        }

        // 2. LOGIN
        if (isset($_POST['login_action'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->model->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php?status=login_success");
            } else {
                $existingUser = $this->model->getUserByUsername($username);
                if (!$existingUser) {
                    header("Location: index.php?status=login_failed&reason=username_not_found");
                } else {
                    header("Location: index.php?status=login_failed&reason=wrong_password");
                }
            }
            exit();
        }

        // 3. REGISTER
        if (isset($_POST['register_action'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $repassword = trim($_POST['repassword']);
            $nama = trim($_POST['nama_lengkap']);

            if ($password !== $repassword) {
                header("Location: index.php?status=reg_failed&reason=password_mismatch");
                exit();
            }

            $existingUser = $this->model->getUserByUsername($username);
            if ($existingUser) {
                header("Location: index.php?status=reg_failed&reason=username_taken");
                exit();
            }

            $this->model->register($username, $password, $nama);
            $user = $this->model->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php?status=login_success");
            } else {
                header("Location: index.php?status=reg_success");
            }
            exit();
        }

        // 4. AKSI DATA (TAMBAH/EDIT)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi'])) {
            $aksi = $_POST['aksi'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];
            $is_sisipan = isset($_POST['is_sisipan']) && $_POST['is_sisipan'] == '1';
            $tgl = isset($_POST['tanggal_manual']) ? $_POST['tanggal_manual'] : null;
            $user_id = $_SESSION['user_id'];

            if ($aksi == 'tambah') {
                if ($is_sisipan) {
                    $no_urut = $_POST['no_urut'];
                    if ($this->model->getSisipanById($no_urut)) {
                        header("Location: index.php?page=$page&type=$tipe&status=exists");
                        exit();
                    }
                    $this->model->createSisipan($no_urut, $klas, $plus, $tgl, $user_id);
                } else {
                    $no_urut = $this->model->getNextAvailableNo($page);
                    $this->model->create($no_urut, $klas, $plus, $user_id, null);
                }
                header("Location: index.php?page=$page&type=$tipe&status=success");
            } else if ($aksi == 'edit') {
                $no_urut = $_POST['no_urut'];
                if ($is_sisipan)
                    $this->model->updateSisipan($no_urut, $klas, $plus, $tgl);
                else
                    $this->model->update($no_urut, $klas, $plus, null);
                header("Location: index.php?page=$page&type=$tipe&status=updated");
            }
            exit();
        }

        // 5. HAPUS
        if (isset($_GET['hapus'])) {
            if (isset($_GET['sisipan']))
                $this->model->deleteSisipan($_GET['hapus']);
            else
                $this->model->delete($_GET['hapus']);
            header("Location: index.php?page=$page&type=$tipe&status=deleted");
            exit();
        }
    }

    public function index($page = null)
    {
        if ($page === null)
            $page = $this->model->getLastFilledPage();
        $mainDataRaw = $this->model->getByPage($page);
        $sisipanData = $this->model->getSisipanByPage($page);
        $data = [];
        foreach ($mainDataRaw as $row) {
            $data[$row['no_urut']] = [
                'k' => $row['klas'],
                'p' => $row['plus'],
                't' => $row['created_at'],
                'uid' => $row['pembuat_id']
            ];
        }
        $currentPage = $page;
        $currentType = $this->tipe;
        include 'views/daftar_view.php';
    }
}