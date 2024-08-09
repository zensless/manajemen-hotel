<?php

function getTitle()
{
    if (isset($GLOBALS['pageTitle'])) {
        return $GLOBALS['pageTitle'];
    } else {
        return "Dashboard"; // Ganti dengan judul default yang diinginkan
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title><?php echo getTitle(); ?></title>

    <link rel="icon" type="image/x-icon" href="../assets/image/logo.svg">

    <!-- ======================================== Font Awesome ========================= -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- ======================================== Tailwind CSS ========================= -->
    <link rel="stylesheet" href="../assets/css/global.css" />
    <link rel="stylesheet" href="../assets/css/styles.css" />

    <!-- ======================================== Fonts ========================= -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />

    <!-- ======================================== Flowbite CSS ========================= -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="w-full relative bg-white overflow-hidden flex flex-col items-start justify-start pt-[31px] pb-0 pr-0 pl-[23px] box-border gap-[15px] leading-[normal] tracking-[normal] mq750:gap-[17px]">
        <header class="w-[1459px] flex flex-row items-start justify-start py-0 px-[22px] box-border max-w-full text-left text-xs text-black font-poppins">
            <div class="flex-1 flex flex-row items-end justify-between  gap-[20px]">
                <img class="h-[49px] w-[62.8px] relative" loading="lazy" alt="" src="../assets/image/logo.svg" />

                <div class="w-[225px] flex flex-col items-end justify-end pt-[3px] px-0 pb-0 box-border">
                    <div class="self-stretch flex flex-row items-start justify-between gap-[20px]">
                        <div class="flex flex-col items-start justify-start py-[16px] pb-0">
                            <img class="w-[24px] h-[24px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/bell.svg" />
                        </div>
                        <div class="w-[147px] flex flex-row items-start justify-start gap-[8px]">
                            <div class="flex-1 flex flex-col items-start justify-start pt-[16.5px] px-0 pb-0">
                                <a class="[text-decoration:none] relative text-[inherit] whitespace-nowrap"><?php echo $sesi['username']; ?></a>
                            </div>
                            <img class="h-[51px] w-[51px] relative rounded-[50%] object-cover" alt="" src="../assets/image/profile-user.svg" />
                        </div>
                    </div>
                </div>
        </header>
        <main class="self-stretch flex flex-row items-start justify-start gap-[12px] max-w-full text-left text-xs text-black font-poppins">
            <div class="w-[123px] flex flex-col items-start justify-start pt-[82px] px-0 pb-0 box-border mq750:pt-[53px] mq750:box-border mq1050:hidden">
                <div class="self-stretch flex flex-col items-start justify-start pt-[550px] px-[3px] pb-0 box-border gap-[180px] mq750:pt-[232px] mq750:box-border mq1050:pt-[357px] mq1050:box-border">
                    <div class="mt-[-597px] flex flex-col items-start justify-start py-[30px] px-0  shrink-0 [debug_commit:69da668]">
                        <a href="index.php" class="flex flex-row items-start text-firebrick no-underline">
                            <div class="flex flex-row items-start justify-start gap-[12px]">
                                <img class="h-[33px] w-[33px] relative" loading="lazy" alt="" src="../assets/image/dashboard.svg" />
                                <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                    <span class="[text-decoration:none] relative font-bold text-[inherit]">Dashboard</span>
                                </div>
                            </div>
                        </a>

                        <a href="index.php?url=pemesanan" class="flex flex-row items-start justify-start py-0 pr-[19px] pl-0 text-black no-underline mt-[25px]">
                            <div class="flex flex-row items-start justify-start gap-[12px]">
                                <img class="h-[33px] w-[33px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/file.svg" />
                                <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                    <span class="relative">Pemesanan</span>
                                </div>
                            </div>
                        </a>

                        <div class="flex flex-row items-start justify-start py-0 pr-5 pl-0 text-black no-underline mt-[25px]">
                            <button type="button" class="flex flex-row items-start justify-start gap-[12px]" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <img class="h-[33px] w-[33px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/database.svg" />
                                <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                    <span class="relative">Data</span>
                                </div>
                                <svg class="w-3 h-3 align-center" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                        </div>
                        <ul id="dropdown-example" class="hidden z-10 py-2 space-y-2 mb-0">
                            <li>
                                <a href="index.php?url=pages/pembayaran/dtPembayaran" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Pembayaran</a>
                            </li>
                            <li>
                                <a href="index.php?url=pages/kamar/dtKamar" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Room</a>
                            </li>
                            <li>
                                <a href="index.php?url=pages/tamu/dtTamu" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Penunjung</a>
                            </li>
                            <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'manajer') { ?>
                                <li>
                                    <a href="index.php?url=pages/travel/dtTravel" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Travel</a>
                                </li>
                                <li>
                                    <a href="index.php?url=pages/user/dtUser" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">User</a>
                                </li>
                            <?php } ?>
                        </ul>

                        <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'manajer') { ?>
                            <a href="index.php?url=laporan" class="flex flex-row items-start justify-start py-0 pr-[19px] pl-0 text-black no-underline mt-[25px]">
                                <div class="flex flex-row items-start justify-start gap-[12px]">
                                    <img class="h-[33px] w-[33px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/file.svg" />
                                    <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                        <span class="relative">Laporan</span>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>

                    <div class="flex mt-[-130px] absolute flex-row items-start justify-start py-0 px-0.5">
                        <div class="flex flex-col items-start justify-start gap-[24px] shrink-0 [debug_commit:69da668]">
                            <a href="" class="flex flex-row items-start justify-start py-0 pr-0.5 pl-0 gap-[16px] text-black no-underline">
                                <img class="h-[33px] w-[33px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/settings.svg" />

                                <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                    <div class="relative">Setting</div>
                                </div>
                            </a>
                            <a href="../logout.php" class="flex flex-row items-start justify-start gap-[16px] text-black no-underline">
                                <img class="h-[33px] w-[33px] relative overflow-hidden shrink-0" loading="lazy" alt="" src="../assets/image/log-out.svg" />

                                <div class="flex flex-col items-start justify-start pt-[7.5px] px-0 pb-0">
                                    <div class="relative">Log out</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>