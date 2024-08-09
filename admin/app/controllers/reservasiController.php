<?php
include_once '../../../database/koneksi.php';
include_once '../models/reservasi.php';

//tangkap request
$in = htmlspecialchars($_POST['in']);
$out = htmlspecialchars($_POST['out']);
$jmltamu = htmlspecialchars($_POST['jmltamu']);
$tpetamu = htmlspecialchars($_POST['tpetamu']);
$namatamu = strtolower(htmlspecialchars($_POST['namatamu']));
$notamu = htmlspecialchars($_POST['notamu']);
$nokmr = htmlspecialchars($_POST['nokmr']);
$travel = htmlspecialchars($_POST['travel']);

$data = [
    'in' => $in,
    'out' => $out,
    'jmltamu' => $jmltamu,
    'tpetamu' => $tpetamu,
    'namatamu' => $namatamu,
    'notamu' => $notamu,
    'nokmr' => $nokmr,
    'travel' => $travel
];

$model = new reservasi();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'save':
        $model->simpan($data);
        break;
    case 'ubah':
        $data['idx'] = $_POST['idx'];
        $model->ubah($data); 
        break;
    case 'hapus':
        $data = ['idx' => $_POST['idx']];
        $model->hapus($data);
        break;
    default:
        header('location:../../index.php?url=pemesanan');
        break;
}
header('location:../../index.php?url=pemesanan');