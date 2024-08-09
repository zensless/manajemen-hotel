<?php

class pembayaran
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPembayaran()
    {
        // Mengambil dan melihat table pembayaran
        $sql = "SELECT r.id AS reservasi_id, t.nama AS nama_penunjung, k.harga, r.jumlah_kamar, tr.nama_travel, tr.komisi, p.total_bayar
                FROM reservasi r
                JOIN tamu t ON r.idTamu = t.id
                JOIN kamar k ON r.idKamar = k.id
                LEFT JOIN travel_online tr ON r.idTravelOnline = tr.id
                LEFT JOIN pembayaran p ON p.idReservasi = r.id";

        // Menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchALL();

        return $rs;
    }

    public function getPembayaran($id)
    {
        // Mengambil dan melihat table pembayaran
        $sql = "SELECT r.id AS reservasi_id, t.nama AS nama_penunjung, k.harga, r.jumlah_kamar, tr.nama_travel, tr.komisi, p.total_bayar
                FROM reservasi r
                JOIN tamu t ON r.idTamu = t.id
                JOIN kamar k ON r.idKamar = k.id
                LEFT JOIN travel_online tr ON r.idTravelOnline = tr.id
                LEFT JOIN pembayaran p ON p.idReservasi = r.id
                WHERE r.id = ?";

        // Menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();

        return $rs;
    }

    public function simpan($data)
    {
        $kodeAuto = $this->kodeAuto();
        $sql = "INSERT INTO pembayaran (id, tanggal_bayar, total_bayar, metode_bayar, idReservasi)
                VALUES (?, ?, ?, ?, ?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge([$kodeAuto], $data));
    }

    public function update($id, $data)
    {
        $sql = "UPDATE pembayaran SET tanggal_bayar = ?, total_bayar = ?, metode_bayar = ?, idReservasi = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute(array_merge($data, [$id]));
    }

    public function hapus($data)
    {
        $sql = "DELETE FROM pembayaran WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function kodeAuto()
    {
        $sql = "SELECT MAX(CAST(SUBSTRING(id, 3) AS UNSIGNED)) as max_id FROM pembayaran";
        $rs = $this->koneksi->query($sql)->fetch();

        $kode = ($rs['max_id'] ?? 0) + 1;
        return "PM" . sprintf("%03d", $kode);
    }

    public function getTotalPembayaran($harga, $jumlah_kamar, $komisi = null)
    {
        if (!is_null($komisi)) {
            $harga_noppn = (($harga * $jumlah_kamar) * $komisi) / 100 + $harga;
        } else {
            $harga_noppn = $harga * $jumlah_kamar;
        }
        $harga_total = ($harga_noppn * 11) / 100 + $harga_noppn;
        return $harga_total;
    }
}
