<?php

class travel
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataTravel()
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM travel_online";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchALL();

        return $rs;
    }

    public function getTravel($id)
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM travel_online where id = ?";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();

        return $rs;
    }

    public function simpan($data)
    {
        $kodeAuto = $this->kodeAuto();
        $sql = "INSERT INTO travel_online (id, nama_travel, komisi)
        VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge([$kodeAuto], $data));
    }

    public function ubah($data)
    {
        $sql = "UPDATE travel_online SET nama_travel=?, komisi=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($data)
    {
        $sql = "DELETE FROM travel_online WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function kodeAuto()
    {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) as max_id FROM travel_online";
        $rs = $this->koneksi->query($sql)->fetch();

        $kode = ($rs['max_id'] ?? 0) + 1;
        return "TRV" . sprintf("%03d", $kode);
    }
}
