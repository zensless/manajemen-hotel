<?php

class level
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function cekLogin($data)
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = SHA1(MD5(SHA1(?))) ";

        $stmt = $this->koneksi->prepare($sql);
        $stmt->execute($data);
        $results = $stmt->fetch();

        return $results;
    }
}
