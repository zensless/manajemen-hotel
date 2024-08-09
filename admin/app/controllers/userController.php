<?php
include_once '../../../database/koneksi.php';
include_once '../models/user.php';

//tangkap reuest
$first_name = htmlspecialchars($_POST['first_name']);
$last_name = htmlspecialchars($_POST['last_name']);
$username = htmlspecialchars($_POST['username']);
$role = htmlspecialchars($_POST['role']);
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['pass']);

$data = [
    $first_name,
    $last_name,
    $username,
    $pass,
    $email,
    $role
];

$model = new user();
$tombol = $_REQUEST['proses'];

switch ($tombol) {
    case 'save':
        $model->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data); 
        break;
    case 'hapus':
        unset($data);
        $data[] = $_POST['idx'];
        $model->hapus($data);
        break;
    default;
        header('location:../../index.php?url=Pages/user/dtUser');
        break;
}
header('location:../../index.php?url=Pages/user/dtUser');