<?php
include_once 'config/database.php'; // Pakai d kecil sesuai nama file
include_once 'models/pengendali.php';

class PengendaliController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Pengendali($db);
    }

    public function index()
    {
        $dataRaw = $this->model->getAll();
        $data = [];
        foreach ($dataRaw as $row) {
            $key = str_pad($row['no_urut'], 2, "0", STR_PAD_LEFT);
            $data[$key] = ['k' => $row['klas'], 'p' => $row['plus']];
        }
        include 'views/daftar_view.php';
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            if ($aksi == 'tambah') {
                $this->model->create($_POST['no_urut'], $_POST['klas'], $_POST['plus']);
            } elseif ($aksi == 'edit') {
                $this->model->update($_POST['no_urut'], $_POST['klas'], $_POST['plus']);
            }
            // Redirect dengan status sukses
            header("Location: index.php?status=success");
            exit();
        }

        if (isset($_GET['hapus'])) {
            $this->model->delete($_GET['hapus']);
            // Redirect dengan status terhapus
            header("Location: index.php?status=deleted");
            exit();
        }
    }
}