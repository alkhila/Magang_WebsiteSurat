<?php
include_once 'config/Database.php';
include_once 'models/Pengendali.php';

class PengendaliController {
    private $model;

    public function __construct() {
        $database = new Database();
        $this->model = new Pengendali($database->getConnection());
    }

    public function index($page = 0) {
        $mainDataRaw = $this->model->getByPage($page);
        $sisipanData = $this->model->getSisipanByPage($page);
        $data = [];
        foreach ($mainDataRaw as $row) {
            $data[$row['no_urut']] = [
                'k' => $row['klas'], 
                'p' => $row['plus'], 
                't' => $row['created_at'] // Mengambil timestamp otomatis
            ];
        }
        $currentPage = $page;
        include 'views/daftar_view.php';
    }

    public function handleRequest() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];
            $is_sisipan = isset($_POST['is_sisipan']) && $_POST['is_sisipan'] == '1';
            $tgl = isset($_POST['tanggal_manual']) ? $_POST['tanggal_manual'] : null;

            if ($aksi == 'tambah') {
                if ($is_sisipan) {
                    $no_urut = $_POST['no_urut'];
                    // ERROR HANDLING: Cek duplikasi nomor sisipan
                    if ($this->model->getSisipanById($no_urut)) {
                        header("Location: index.php?page=$page&status=exists&val=$no_urut");
                        exit();
                    }
                    $this->model->createSisipan($no_urut, $klas, $plus, $tgl);
                } else {
                    $no_urut = $this->model->getNextAvailableNo($page);
                    if (!$no_urut) {
                        header("Location: index.php?page=$page&status=full");
                        exit();
                    }
                    // Mengirim 4 argumen (null untuk tgl agar timestamp otomatis jalan)
                    $this->model->create($no_urut, $klas, $plus, null);
                }
                header("Location: index.php?page=$page&status=success");
            } else {
                // EDIT MODE (Nomor urut tidak bisa diganti)
                $no_urut = $_POST['no_urut'];
                if ($is_sisipan) {
                    $this->model->updateSisipan($no_urut, $klas, $plus, $tgl);
                } else {
                    $this->model->update($no_urut, $klas, $plus, null);
                }
                header("Location: index.php?page=$page&status=updated");
            }
            exit();
        }

        if (isset($_GET['hapus'])) {
            if (isset($_GET['sisipan'])) {
                $this->model->deleteSisipan($_GET['hapus']);
            } else {
                $this->model->delete($_GET['hapus']);
            }
            header("Location: index.php?page=$page&status=deleted");
            exit();
        }
    }
}