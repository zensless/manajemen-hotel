<?php

session_start();

include_once '../database/koneksi.php';
require '../vendor/autoload.php';

// models
include_once 'app/models/user.php';
include_once 'app/models/kamar.php';
include_once 'app/models/tamu.php';
include_once 'app/models/travel.php';
include_once 'app/models/reservasi.php';
include_once 'app/models/pembayaran.php';

$sesi = $_SESSION['MEMBER'];
if (isset($sesi)) {

    $url = !isset($_GET['url']) ? 'dashboard' : strtolower($_GET['url']);

    // Menentukan judul halaman dinamis
    // Array asosiatif untuk judul halaman dinamis
    $pageTitles = [
        'dashboard' => 'Dashboard - Your Site Name',
        'laporan' => 'Laporan - Your Site Name',
        'pages/kamar/dtkamar' => 'Data Room - Your Site Name',
        'pages/tamu/dttamu' => 'Data Penunjung - Your Site Name',
        'pages/travel/dttravel' => 'Data Travel Online - Your Site Name',
        'pages/user/dtuser' => 'Data User - Your Site Name',
        'pages/pembayaran/dtpembayaran' => 'Data Payment - Your Site Name'
    ];

    // Menentukan judul halaman berdasarkan URL
    $pageTitle = isset($pageTitles[$url]) ? $pageTitles[$url] : 'HomePage - Your Site Name';

    include_once 'template/header.php';

?>

    <section class="flex-1 rounded-tl-xl rounded-tr-xl rounded-b-xl bg-whitesmoke flex flex-col items-start justify-start pt-[29px] px-[79px] pb-[80px] box-border gap-[14px] max-w-[calc(100%_-_135px)] m-4 text-left text-[38px] text-black font-poppins lg:pl-[39px] lg:pr-[39px] lg:box-border mq750:gap-[17px] mq1050:max-w-full">
        <div class="w-[1282px] h-[780px] relative rounded-tl-xl rounded-tr-none rounded-b-none bg-whitesmoke hidden max-w-full">
        </div>

        <?php

        if ($url == 'dashboard') {
            include_once 'dashboard.php';
        } else if (!empty($url)) {
            include_once $url . '.php';
        } else {
            include_once 'dashboard.php';
        }

        ?>

    </section>



<?php
    include_once 'template/footer.php';
} else {
    echo '<script> alert("Anda Tidak bisa Masuk!!!"); window.location = "/" </script>';
}
