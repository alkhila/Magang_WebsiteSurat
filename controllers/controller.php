<?php
include_once 'config/database.php';
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
            $no_urut = $_POST['no_urut'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];

            if ($aksi == 'tambah') {
                // Ambil semua data untuk pengecekan nomor urut
                $allData = $this->model->getAll();
                $isDuplicate = false;
                foreach ($allData as $row) {
                    if ($row['no_urut'] == $no_urut) {
                        $isDuplicate = true;
                        break;
                    }
                }

                if ($isDuplicate) {
                    // Jika nomor urut sudah ada, redirect dengan status exists
                    header("Location: index.php?status=exists&no=" . $no_urut);
                    exit();
                } else {
                    $this->model->create($no_urut, $klas, $plus);
                }
            } elseif ($aksi == 'edit') {
                $this->model->update($no_urut, $klas, $plus);
            }
            header("Location: index.php?status=success");
            exit();
        }

        if (isset($_GET['hapus'])) {
            $this->model->delete($_GET['hapus']);
            header("Location: index.php?status=deleted");
            exit();
        }
    }
}