<?php

use Fpdf\Fpdf;

class PDF extends FPDF
{
    protected $namaBulan;

    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4', $namaBulan = '')
    {
        parent::__construct($orientation, $unit, $size);
        $this->namaBulan = $namaBulan;
    }

    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Reservasi Bulan ' . $this->namaBulan, 0, 1, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10, 10, '#', 1, 0, 'C');
        $this->Cell(30, 10, 'Tanggal Checkin', 1, 0, 'C');
        $this->Cell(35, 10, 'Tanggal Checkout', 1, 0, 'C');
        $this->Cell(25, 10, 'Jumlah Kamar', 1, 0, 'C');
        $this->Cell(25, 10, 'Tipe Tamu', 1, 0, 'C');
        $this->Cell(35, 10, 'Nama Pengunjung', 1, 0, 'C');
        $this->Cell(25, 10, 'Tipe Kamar', 1, 0, 'C');
        $this->Cell(25, 10, 'Travel', 1, 0, 'C');
        $this->Cell(30, 10, 'Harga Total', 1, 0, 'C');
        $this->Cell(25, 10, 'Status', 1, 0, 'C');
        $this->Ln();
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function FancyTable($data)
    {
        $this->SetFont('Arial', '', 9);
        $id = 1;
        foreach ($data as $row) {
            if (!is_null($row['komisi_travel'])) {
                $harga_noppn = (($row['harga_kamar'] * $row['jumlah_kamar']) * $row['komisi']) / 100 + $row['harga_kamar'];
                $harga_total = ($harga_noppn * 11) / 100 + $harga_noppn;
            } else {
                $harga_noppn = $row['harga_kamar'] * $row['jumlah_kamar'];
                $harga_total = ($harga_noppn * 11) / 100 + $harga_noppn;
            }
            $status = is_null($row['total_pembayaran']) ? "Pending" : "Lunas";

            $this->Cell(10, 10, $id++, 1);
            $this->Cell(30, 10, $row['tanggal_checkin'], 1);
            $this->Cell(35, 10, $row['tanggal_checkout'], 1);
            $this->Cell(25, 10, $row['jumlah_kamar'], 1);
            $this->Cell(25, 10, $row['tipe_tamu'], 1);
            $this->Cell(35, 10, $row['nama_tamu'], 1);
            $this->Cell(25, 10, $row['tipe_kamar'], 1);
            $this->Cell(25, 10, is_null($row['nama_travel']) ? '-' : $row['nama_travel'], 1);
            $this->Cell(30, 10, number_format($harga_total, 0, ',', '.'), 1);
            $this->Cell(25, 10, $status, 1);
            $this->Ln();
        }
    }
}
