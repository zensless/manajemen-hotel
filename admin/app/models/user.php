<?php

class user
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataUser()
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM user";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchALL();

        return $rs;
    }

    public function getUser($id)
    {
        // mengambil dan melihat table jenis_produk
        $sql = "SELECT * FROM user where id = ?";

        // menggunakan mekanisme prepere statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();

        return $rs;
    }

    public function simpan($data)
    {
        $kodeAuto = $this->kodeAuto();
        $sql = "INSERT INTO user (id, firstname, lastname, username, password, email, role)
        VALUES (?,?,?,?,SHA1(MD5(SHA1(?))),?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge([$kodeAuto], $data));
    }

    public function ubah($data)
    {
        $sql = "UPDATE user SET firstname=?, lastname=?, username=?, password=SHA1(MD5(SHA1(?))), email=?, role=?
        WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($data)
    {
        $sql = "DELETE FROM user WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function kodeAuto()
    {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) as max_id FROM user";
        $rs = $this->koneksi->query($sql)->fetch();

        $kode = ($rs['max_id'] ?? 0) + 1;
        return "U" . sprintf("%05d", $kode);
    }
}
