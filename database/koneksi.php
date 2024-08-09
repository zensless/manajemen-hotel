<?php

$servername = 'localhost';
$dbname = 'db_hotel';
$username = 'root';
$password = '';

try {

    // Koneksi tanpa menyebutkan nama database untuk memeriksa atau membuat database
    $dbh = new PDO("mysql:host=$servername", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cek apakah database sudah ada
    $stmt = $dbh->query("SHOW DATABASES LIKE '$dbname'");
    $databaseExists = $stmt->rowCount() > 0;

    // Jika database tidak ada, buat database
    if (!$databaseExists) {
        $dbh->exec("CREATE DATABASE $dbname");
    }

    // Koneksi ke database yang telah dibuat atau sudah ada
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die('Koneksi Gagal ' . $e->getMessage());

}