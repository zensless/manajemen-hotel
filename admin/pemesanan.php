<?php

error_reporting(0);

$model_pemesanan =  new reservasi();
$model_kamar =  new kamar();
$model_travel =  new travel();

$data_pemesanan = $model_pemesanan->dataReservasi();
$data_kamar = $model_kamar->dataKamar();
$data_travel = $model_travel->dataTravel();

?>
<div class="flex flex-col items-start justify-start gap-[7px]">
    <h1 class="mt-4 h-[47px] relative text-inherit font-bold font-inherit inline-block z-[1] mq1050:text-[30px] mq450:text-[23px]">
        Form Input Pemesanan
    </h1>
    <h3 class="m-0 relative text-xl font-normal font-inherit text-gray-100 z-[1] mq450:text-[16px]">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Form Pemesanan</span>
                    </div>
                </li>
            </ol>
        </nav>
    </h3>

</div>
<div class="w-[1066px] max-w-full flex flex-col items-start gap-4  font-inter mr-4">
    <div class="w-full rounded-xl mr-10 bg-white p-6 mq750:p-4">

        <form action="app/controllers/reservasiController.php" method="POST">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="checkin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal check-in</label>
                    <div class="relative">
                        <input datepicker id="checkin" name="in" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start" />
                        <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="checkout" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal check-out</label>
                    <div class="relative">
                        <input datepicker id="checkout" name="out" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end" />
                        <div class="absolute inset-y-0 left-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="jmltamu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Penunjung</label>
                    <input type="number" id="jmltamu" name="jmltamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123" required />
                </div>
                <div>
                    <label for="tpetamu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Penunjung</label>
                    <select id="tpetamu" name="tpetamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="toggleTravelOnline()">
                        <option selected>Pilih Tipe Penunjung</option>
                        <option value="Perseorangan">Perseorangan</option>
                        <option value="Rombongan">Rombongan</option>
                        <option value="Travel_Online">Travel_Online</option>
                    </select>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="namatamu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Penunjung</label>
                    <input type="text" id="namatamu" name="namatamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" required />
                </div>
                <div>
                    <label for="notamu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Identitas</label>
                    <input type="number" id="notamu" name="notamu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="3456789" required />
                    </select>
                </div>
            </div>
            <div class="mb-6">
                <label for="nokmr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Kamar</label>
                <select id="nokmr" name="nokmr" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Tipe kamar</option>
                    <?php foreach ($data_kamar as $kamar) : ?>
                        <option value="<?= $kamar['id'] ?>"><?= $kamar['tipe'] ?> - <?= $kamar['hari'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-6" id="travelOnlineDiv" style="display: none;">
                <label for="travel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Travel Online</label>
                <select id="travel" name="travel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Travel</option>
                    <?php foreach ($data_travel as $travel) : ?>
                        <option value="<?= $travel['id'] ?>"><?= $travel['nama_travel'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" value="save" name="proses" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</div>

<script>
    function toggleTravelOnline() {
        var tpetamu = document.getElementById("tpetamu");
        var travelOnlineDiv = document.getElementById("travelOnlineDiv");
        if (tpetamu.value === "Travel_Online") {
            travelOnlineDiv.style.display = "block";
        } else {
            travelOnlineDiv.style.display = "none";
        }
    }
</script>