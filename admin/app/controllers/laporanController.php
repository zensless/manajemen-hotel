<?php
require '../../../vendor/autoload.php';

use Carbon\Carbon;

include_once '../../../database/koneksi.php';
include_once '../../exportLaporan.php';
include_once '../models/reservasi.php';

// Pemetaan singkatan bulan ke angka
$pemetaanBulan = [
    'JA' => '01', 'FE' => '02', 'MA' => '03', 'AP' => '04',
    'ME' => '05', 'JN' => '06', 'JL' => '07', 'AG' => '08',
    'SE' => '09', 'OK' => '10', 'NO' => '11', 'DE' => '12'
];

function getNamaBulan($bulan)
{
    $namaBulan = [
        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
        '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
        '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
    ];
    return $namaBulan[$bulan] ?? '';
}

// Ambil nomor bulan
$singkatanBulan = htmlspecialchars($_POST['date']);
$bulan = $pemetaanBulan[$singkatanBulan] ?? null;

$model = new reservasi();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'ambil':
        if ($bulan) {
            $data_reservasi = $model->getReservasi($bulan);
            // Simpan hasil ke file sementara
            $tempFile = tempnam(sys_get_temp_dir(), 'data_reservasi_');
            file_put_contents($tempFile, serialize($data_reservasi));
            header('location:../../index.php?url=laporan&temp_file=' . basename($tempFile));
            exit;
        }
        break;

    case 'export':
        if ($bulan) {
            $data_reservasi = $model->getReservasi($bulan);
            $namaBulan = getNamaBulan($bulan);
            // Panggil fungsi untuk mengekspor PDF
            $pdf = new PDF('L', 'mm', 'A4', $namaBulan); // Landscape, mm, A4
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->FancyTable($data_reservasi);

            // Generate nama file dengan timestamp
            $timestamp = Carbon::now()->format('Ymd_His');
            $filename = 'LaporanReservasi_' . $namaBulan . '_' . $timestamp . '.pdf';

            $pdf->Output('D', $filename);
        }
        break;

    default:
        header('location:../../index.php?url=laporan');
        exit;
}
