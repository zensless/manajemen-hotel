<?php
$model = new pembayaran();
$reservasi_id = isset($_GET['idedit']) ? $_GET['idedit'] : null;
$data = $reservasi_id ? $model->getPembayaran($reservasi_id) : null;
$total_pembayaran = $model->getTotalPembayaran($data['harga'], $data['jumlah_kamar'], $data['komisi']);
?>

<div class="flex flex-col items-start justify-start gap-[7px]">
    <h1 class="mt-4 h-[47px] relative text-inherit font-bold font-inherit inline-block z-[1] mq1050:text-[30px] mq450:text-[23px]">
        Form Input Data Pembayaran
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
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="index.php?url=pages/pembayaran/dtPembayaran" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Data Pembayaran</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Form Data Pembayaran</span>
                    </div>
                </li>
            </ol>
        </nav>
    </h3>
</div>

<div class="w-[1066px] max-w-full flex flex-col items-start gap-4 font-inter mr-4">
    <div class="w-full rounded-xl mr-10 bg-white p-6 mq750:p-4">
        <form action="app/controllers/pembayaranController.php" method="POST">
            <input type="hidden" id="idReservasi" name="idReservasi" value="<?= $data ? $data['reservasi_id'] : '' ?>" required />

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="total_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Bayar</label>
                    <input type="number" id="total_bayar" name="total_bayar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?= $total_pembayaran ?>" placeholder="Total Bayar" readonly required />
                </div>
                <div>
                    <label for="tanggal_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Bayar</label>
                    <input type="date" id="tanggal_bayar" name="tanggal_bayar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly required />

                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            const today = new Date();
                            const formattedToday = today.toISOString().split('T')[0];
                            document.getElementById('tanggal_bayar').value = formattedToday;
                        });
                    </script>
                </div>
            </div>
            <div class="mb-6">
                <label for="metode_bayar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Bayar</label>
                <select id="metode_bayar" name="metode_bayar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Pilih Metode Bayar</option>
                    <option value="tunai">Tunai</option>
                    <option value="qris">QRIS </option>
                    <option value="travel">Travel Online</option>
                </select>
            </div>
            <button type="submit" value="save" name="proses" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
</div>