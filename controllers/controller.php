<?php
include_once 'config/database.php';
include_once 'models/pengendali.php';

class PengendaliController
{
    private $model;
    private $tipe;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->tipe = isset($_GET['type']) ? $_GET['type'] : 'biasa';
        $database = new Database();
        $this->model = new Pengendali($database->getConnection(), $this->tipe);
    }

    public function handleRequest()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
        $tipe = $this->tipe;

        if (isset($_GET['logout'])) {
            $_SESSION = array();
            session_destroy();
            header("Location: index.php?page=$page&type=$tipe");
            exit();
        }

        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $admin = $this->model->login($username, $password);

            if ($admin) {
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_user'] = $admin['username'];
                header("Location: index.php?page=$page&type=$tipe&status=login_success");
            } else {
                header("Location: index.php?page=$page&type=$tipe&status=login_failed");
            }
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi'])) {
            $aksi = $_POST['aksi'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];
            $is_sisipan = isset($_POST['is_sisipan']) && $_POST['is_sisipan'] == '1';
            $tgl = isset($_POST['tanggal_manual']) ? $_POST['tanggal_manual'] : null;

            if ($aksi == 'tambah') {
                if ($is_sisipan) {
                    $no_urut = $_POST['no_urut'];
                    if ($this->model->getSisipanById($no_urut)) {
                        header("Location: index.php?page=$page&type=$tipe&status=exists&val=$no_urut");
                        exit();
                    }
                    $this->model->createSisipan($no_urut, $klas, $plus, $tgl);
                } else {
                    $no_urut = $this->model->getNextAvailableNo($page);
                    $this->model->create($no_urut, $klas, $plus, null);
                }
                header("Location: index.php?page=$page&type=$tipe&status=success");
            } else if ($aksi == 'edit') {
                $no_urut = $_POST['no_urut'];
                if ($is_sisipan) {
                    $this->model->updateSisipan($no_urut, $klas, $plus, $tgl);
                } else {
                    $this->model->update($no_urut, $klas, $plus, null);
                }
                header("Location: index.php?page=$page&type=$tipe&status=updated");
            }
            exit();
        }

        if (isset($_GET['hapus'])) {
            if (isset($_GET['sisipan'])) {
                $this->model->deleteSisipan($_GET['hapus']);
            } else {
                $this->model->delete($_GET['hapus']);
            }
            header("Location: index.php?page=$page&type=$tipe&status=deleted");
            exit();
        }
    }

    public function index($page = 0)
    {
        $mainDataRaw = $this->model->getByPage($page);
        $sisipanData = $this->model->getSisipanByPage($page);
        $data = [];
        foreach ($mainDataRaw as $row) {
            $data[$row['no_urut']] = [
                'k' => $row['klas'],
                'p' => $row['plus'],
                't' => $row['created_at']
            ];
        }
        $currentPage = $page;
        $currentType = $this->tipe;
        include 'views/daftar_view.php';
    }
}