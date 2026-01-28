<?php
include_once 'config/Database.php';
include_once 'models/Pengendali.php';

class PengendaliController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $this->model = new Pengendali($database->getConnection());
    }

    public function index($page = 0)
    {
        $dataRaw = $this->model->getByPage($page);
        $data = [];
        foreach ($dataRaw as $row) {
            $data[$row['no_urut']] = [
                'k' => $row['klas'],
                'p' => $row['plus'],
                't' => $row['created_at']
            ];
        }
        $currentPage = $page;
        include 'views/daftar_view.php';
    }

    public function handleRequest()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            $no_input = (int) $_POST['no_urut'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];

            if ($aksi == 'tambah') {
                $db_id = ($page * 100) + $no_input;
                $allData = $this->model->getAll();
                $isNoExists = false;
                $isKlasExists = false;

                foreach ($allData as $row) {
                    if ($row['no_urut'] == $db_id) {
                        $isNoExists = true;
                    }
                    if ($row['klas'] == $klas) {
                        $isKlasExists = true;
                    }
                }

                if ($isNoExists && $isKlasExists) {
                    header("Location: index.php?page=$page&status=exists&type=both&val_no=$no_input&val_klas=$klas");
                    exit();
                } else if ($isNoExists) {
                    header("Location: index.php?page=$page&status=exists&type=nomor&val=$no_input");
                    exit();
                } else if ($isKlasExists) {
                    header("Location: index.php?page=$page&status=exists&type=klasifikasi&val=$klas");
                    exit();
                } else {
                    $this->model->create($db_id, $klas, $plus);
                }
            } else {
                $this->model->update($no_input, $klas, $plus);
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