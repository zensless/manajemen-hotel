<?php
include_once '../../../database/koneksi.php';
include_once '../models/pembayaran.php';

// Tangkap request
$idReservasi = htmlspecialchars($_POST['idReservasi']);
$tanggal_bayar = htmlspecialchars($_POST['tanggal_bayar']);
$total_bayar = htmlspecialchars($_POST['total_bayar']);
$metode_bayar = htmlspecialchars($_POST['metode_bayar']);

$data = [
    $tanggal_bayar,
    $total_bayar,
    $metode_bayar,
    $idReservasi
];

$model = new pembayaran();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'save':
        $model->simpan($data);
        break;
    default:
        header('location:../../index.php?url=Pages/pembayaran/dtPembayaran');
        break;
}
header('location:../../index.php?url=Pages/pembayaran/dtPembayaran');
