<?php

class kamar
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataKamar()
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM kamar";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchALL();

        return $rs;
    }

    public function getKamar($id)
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM kamar where id = ?";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();

        return $rs;
    }

    public function simpan($data)
    {
        $kodeAuto = $this->kodeAuto();
        $sql = "INSERT INTO kamar (id, tipe, hari, harga)
            VALUES (?, ?, ?, ?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge([$kodeAuto], $data));
    }

    public function ubah($data)
    {
        $sql = "UPDATE kamar SET tipe=?, hari=?, harga=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($data)
    {
        $sql = "DELETE FROM kamar WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function kodeAuto()
    {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) as max_id FROM kamar";
        $rs = $this->koneksi->query($sql)->fetch();

        $kode = ($rs['max_id'] ?? 0) + 1;
        return "KMR" . sprintf("%03d", $kode);
    }
}
