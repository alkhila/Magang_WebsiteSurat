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
            $data[$row['no_urut']] = ['k' => $row['klas'], 'p' => $row['plus'], 't' => $row['created_at']];
        }
        $currentPage = $page;
        include 'views/daftar_view.php';
    }

    public function handleRequest() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            $no_input = $_POST['no_urut'];
            $is_sisipan = isset($_POST['is_sisipan']) && $_POST['is_sisipan'] == '1';

            if ($aksi == 'tambah') {
                if ($is_sisipan) {
                    $this->model->createSisipan($no_input, $_POST['klas'], $_POST['plus']);
                } else {
                    $this->model->create((int)$no_input, $_POST['klas'], $_POST['plus']);
                }
            } else {
                if ($is_sisipan) {
                    $this->model->updateSisipan($no_input, $_POST['klas'], $_POST['plus']);
                } else {
                    $this->model->update((int)$no_input, $_POST['klas'], $_POST['plus']);
                }
            }
            header("Location: index.php?page=$page&status=success");
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