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
        $mainDataRaw = $this->model->getByPage($page);
        $sisipanData = $this->model->getSisipanByPage($page);
        $data = [];
        foreach ($mainDataRaw as $row) {
            $data[$row['no_urut']] = ['k' => $row['klas'], 'p' => $row['plus'], 't' => $row['created_at']];
        }
        $currentPage = $page;
        include 'views/daftar_view.php';
    }

    public function handleRequest()
    {
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aksi = $_POST['aksi'];
            $no_input = $_POST['no_urut'];
            $klas = $_POST['klas'];
            $plus = $_POST['plus'];
            $is_sisipan = isset($_POST['is_sisipan']) && $_POST['is_sisipan'] == '1';

            if ($aksi == 'tambah') {
                // Ambil semua data dari kedua tabel untuk validasi keunikan
                $allMain = $this->model->getByPage(-1);
                $allSisipan = $this->model->getSisipanByPage(-1);

                $isNoExists = false;
                $isKlasExists = false;

                if ($is_sisipan) {
                    // Cek duplikasi nomor hanya di tabel sisipan
                    foreach ($allSisipan as $s) {
                        if ($s['no_urut'] == $no_input)
                            $isNoExists = true;
                    }
                } else {
                    // Cek duplikasi nomor di tabel utama
                    $db_id = (int) $no_input;
                    foreach ($allMain as $m) {
                        if ($m['no_urut'] == $db_id)
                            $isNoExists = true;
                    }
                }

                // Cek duplikasi klasifikasi di KEDUA tabel (Utama & Sisipan)
                foreach ($allMain as $m) {
                    if ($m['klas'] == $klas)
                        $isKlasExists = true;
                }
                foreach ($allSisipan as $s) {
                    if ($s['klas'] == $klas)
                        $isKlasExists = true;
                }

                // Kirim status error berdasarkan jumlah kesalahan
                if ($isNoExists && $isKlasExists) {
                    header("Location: index.php?page=$page&status=exists&type=both&val_no=$no_input&val_klas=$klas");
                    exit();
                } else if ($isNoExists) {
                    header("Location: index.php?page=$page&status=exists&type=nomor&val=$no_input");
                    exit();
                } else if ($isKlasExists) {
                    header("Location: index.php?page=$page&status=exists&type=klasifikasi&val=$klas");
                    exit();
                }

                // Jika validasi lolos
                if ($is_sisipan) {
                    $this->model->createSisipan($no_input, $klas, $plus);
                } else {
                    $this->model->create((int) $no_input, $klas, $plus);
                }
            } else {
                // Logika Update
                if ($is_sisipan) {
                    $this->model->updateSisipan($no_input, $klas, $plus);
                } else {
                    $this->model->update((int) $no_input, $klas, $plus);
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