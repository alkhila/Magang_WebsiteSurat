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
                // Ambil semua data untuk pengecekan keunikan
                $allData = $this->model->getAll();
                $isNoExists = false;
                $isKlasExists = false;

                foreach ($allData as $row) {
                    if ($row['no_urut'] == $no_urut) {
                        $isNoExists = true;
                        break;
                    }
                    if ($row['klas'] == $klas) {
                        $isKlasExists = true;
                        break;
                    }
                }

                if ($isNoExists) {
                    // Jika nomor urut sudah ada
                    header("Location: index.php?status=exists&type=nomor&val=" . $no_urut);
                    exit();
                } else if ($isKlasExists) {
                    // Jika kode klasifikasi sudah ada
                    header("Location: index.php?status=exists&type=klasifikasi&val=" . $klas);
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