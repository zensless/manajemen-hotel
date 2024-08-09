<?php

class tamu
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataTamu()
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM tamu";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchALL();

        return $rs;
    }

    public function getTamu($id)
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM tamu where id = ?";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();

        return $rs;
    }

    public function simpan($data)
    {
        $kodeAuto = $this->kodeAuto();
        $sql = "INSERT INTO tamu (id, nama, no_ktp, no_telp, email)
        VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge([$kodeAuto], $data));
    }

    public function ubah($data)
    {
        $sql = "UPDATE tamu SET nama=?, no_ktp=?, no_telp=?, email=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($data)
    {
        $sql = "DELETE FROM tamu WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function kodeAuto()
    {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) as max_id FROM tamu";
        $rs = $this->koneksi->query($sql)->fetch();

        $kode = ($rs['max_id'] ?? 0) + 1;
        return "P" . sprintf("%05d", $kode);
    }
}
