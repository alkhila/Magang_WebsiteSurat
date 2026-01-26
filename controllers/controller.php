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
        $dataRaw = $this->model->getByPage($page);
        $data = [];
        foreach ($dataRaw as $row) {
            $data[$row['no_urut']] = ['k' => $row['klas'], 'p' => $row['plus']];
        }
        $currentPage = $page;
        include 'views/daftar_view.php';
    }

    public function handleRequest() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            $no_input = (int)$_POST['no_urut'];
            if ($aksi == 'tambah') {
                $db_id = ($page * 100) + $no_input;
                $this->model->create($db_id, $_POST['klas'], $_POST['plus']);
            } else {
                $this->model->update($_POST['no_urut'], $_POST['klas'], $_POST['plus']);
            }
            header("Location: index.php?page=$page&status=success");
            exit();
        }
        if (isset($_GET['hapus'])) {
            $this->model->delete($_GET['hapus']);
            header("Location: index.php?page=$page&status=deleted");
            exit();
        }
    }
}