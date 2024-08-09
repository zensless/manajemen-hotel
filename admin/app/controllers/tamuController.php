<?php
include_once '../../../database/koneksi.php';
include_once '../models/tamu.php';

//tangkap reuest
$nama = htmlspecialchars($_POST['nama']);
$id = htmlspecialchars($_POST['id']);
$telp = htmlspecialchars($_POST['telp']);
$email = htmlspecialchars($_POST['email']);

$data = [
    $nama,
    $id,
    $telp,
    $email
];

$model = new tamu();
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
        header('location:../../index.php?url=Pages/tamu/dtTamu');
        break;
}
header('location:../../index.php?url=Pages/tamu/dtTamu');