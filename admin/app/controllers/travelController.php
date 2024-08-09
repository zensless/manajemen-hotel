<?php
include_once '../../../database/koneksi.php';
include_once '../models/travel.php';

//tangkap reuest
$nama = htmlspecialchars($_POST['nama']);
$komisi = htmlspecialchars($_POST['komisi']);

$data = [
    $nama,
    $komisi
];

$model = new travel();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'save':
        $model->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data); 
        break;
    case 'hapus':
        unset($data);
        $data[] = $_POST['idx'];
        $model->hapus($data);
        break;
    default;
        header('location:../../index.php?url=Pages/travel/dtTravel');
        break;
}
header('location:../../index.php?url=Pages/travel/dtTravel');