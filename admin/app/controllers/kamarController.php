<?php
include_once '../../../database/koneksi.php';
include_once '../models/kamar.php';

//tangkap reuest
$tipe = htmlspecialchars($_POST['tipe']);
$hari = htmlspecialchars($_POST['hari']);
$harga = htmlspecialchars($_POST['harga']);

$data = [
    $tipe,
    $hari,
    $harga
];

$model = new kamar();
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
        header('location:../../index.php?url=Pages/kamar/dtKamar');
        break;
}
header('location:../../index.php?url=Pages/kamar/dtKamar');