<?php
session_start();
include_once '../database/koneksi.php'; // Disesuaikan dengan path yang benar
include_once '../models/level.php'; // Disesuaikan dengan path yang benar

$unama = $_POST['username'];
$password = $_POST['password'];

$data = [
    $unama, $password
];

$object = new level();
$rs = $object->cekLogin($data);

if (!empty($rs)) {
    $_SESSION['MEMBER'] = $rs;

    header('location:../admin/index.php?url=dashboard');
} else {
    header('location:../');
}
