<?php

session_start();
global $level;
global $member;

include_once 'database/koneksi.php';

$url = !isset($_GET['hal']) ? 'login' : $_GET['hal'];
$viewDir = 'views/';

// Mengecek apakah migration.php sudah dijalankan
if (!defined('MIGRATION_INCLUDED')) {
    include_once 'database/migration.php';
    define('MIGRATION_INCLUDED', true);
}

if ($url == 'login') {
    include_once $viewDir . 'login.php';
} else if (!empty($url)) {
    include_once $viewDir . $url . '.php';
} else {
    include_once $viewDir . 'login.php';
}
