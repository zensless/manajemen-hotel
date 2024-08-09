<?php

use Carbon\Carbon;

$model = new reservasi();

// Periksa apakah ada data filter
if (isset($_GET['temp_file'])) {
    $tempFile = sys_get_temp_dir() . '/' . $_GET['temp_file'];
    if (file_exists($tempFile)) {
        $data_reservasi = unserialize(file_get_contents($tempFile));
        unlink($tempFile); // Hapus file sementara setelah digunakan
    } else {
        // Jika file tidak ada, gunakan bulan saat ini
        $bulanSekarang = Carbon::now()->format('m');
        $data_reservasi = $model->getReservasi($bulanSekarang);
    }
} else {
    // Jika tidak ada filter, gunakan bulan saat ini
    $bulanSekarang = Carbon::now()->format('m');
    $data_reservasi = $model->getReservasi($bulanSekarang);
}

if ($sesi['role'] == 'admin' || $sesi['role'] == 'manajer') {
?>

    <!-- ======================== datatable ========================= -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!-- ======================== Font Awesome ========================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="flex flex-col items-start justify-start gap-[7px]">
        <h1 class="mt-4 h-[47px] relative text-inherit font-bold font-inherit inline-block z-[1] mq1050:text-[30px] mq450:text-[23px]">
            Table Laporan
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
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Laporan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h3>

    </div>
    <div class="w-[1066px] max-w-full flex flex-col items-start gap-4  font-inter mr-4">
        <div class="w-full rounded-xl mr-10 bg-white p-6 mq750:p-4">

            <div class="flex mb-4">
                <form id="laporanForm" action="app/controllers/laporanController.php" method="POST" class="flex items-center justify-between w-full">
                    <div class="flex items-center">
                        <label for="bulan" class="sr-only">Pilih Bulan</label>
                        <select id="bulan" name="date" class="block py-2.5 px-0 w-48 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option value="">Pilih Bulan</option>
                            <option value="JA">Januari</option>
                            <option value="FE">Februari</option>
                            <option value="MA">Maret</option>
                            <option value="AP">April</option>
                            <option value="ME">Mei</option>
                            <option value="JN">Juni</option>
                            <option value="JL">Juli</option>
                            <option value="AG">Agustus</option>
                            <option value="SE">September</option>
                            <option value="OK">Oktober</option>
                            <option value="NO">November</option>
                            <option value="DE">Desember</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button type="submit" value="ambil" name="proses" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Filter
                        </button>

                        <button type="submit" name="proses" value="export" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            PDF
                            <i class="fa-solid fa-file-pdf ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div id="errorMessage" class="text-red-500 text-sm mb-4 hidden"></div>

            <table id="tableData" class="display w-full text-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Checkin</th>
                        <th>Tanggal Checkout</th>
                        <th>Jumlah Kamar</th>
                        <th>Tipe Tamu</th>
                        <th>Nama Penunjung</th>
                        <th>Tipe Kamar</th>
                        <th>Travel</th>
                        <th>Harga Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    <?php foreach ($data_reservasi as $row) : ?>
                        <?php
                        if (!is_null($row['komisi_travel'])) {
                            $harga_noppn = (($row['harga_kamar'] * $row['jumlah_kamar']) * $row['komisi_travel']) / 100 + $row['harga_kamar'];
                            $harga_total = ($harga_noppn * 11) / 100 + $harga_noppn;
                        } else {
                            $harga_noppn = $row['harga_kamar'] * $row['jumlah_kamar'];
                            $harga_total = ($harga_noppn * 11) / 100 + $harga_noppn;
                        }
                        $status = is_null($row['total_pembayaran']) ? "Pending" : "Lunas";
                        ?>
                        <tr>
                            <td><?php echo $id++ ?></td>
                            <td><?php echo $row['tanggal_checkin'] ?></td>
                            <td><?php echo $row['tanggal_checkout'] ?></td>
                            <td><?php echo $row['jumlah_kamar'] ?></td>
                            <td><?php echo $row['tipe_tamu'] ?></td>
                            <td><?php echo $row['nama_tamu'] ?></td>
                            <td><?php echo $row['tipe_kamar'] ?></td>
                            <td><?php echo is_null($row['nama_travel']) ? '-' : $row['nama_travel'] ?></td>
                            <td><?php echo number_format($harga_total, 0, ',', '.') ?></td>
                            <td><?php echo $status ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableData').DataTable({
                dom: '<"flex justify-between items-center mb-4"<"text-sm"l><"text-sm"f>>rt<"flex justify-between items-center mt-4"<"text-sm"i><"text-sm"p>>',
                language: {
                    lengthMenu: "Show _MENU_ entries",
                }
            });
        });
    </script>

    <script>
        document.getElementById('laporanForm').addEventListener('submit', function(e) {
            var bulan = document.getElementById('bulan');
            var errorMessage = document.getElementById('errorMessage');

            if (bulan.value === '') {
                e.preventDefault(); // Mencegah form dikirim
                errorMessage.textContent = 'Silakan pilih bulan terlebih dahulu!';
                errorMessage.classList.remove('hidden');
                bulan.focus();
            } else {
                errorMessage.classList.add('hidden');
            }
        });
    </script>

<?php
} else {
    echo '<script> alert("Anda Tidak boleh Masuk!!!"); history.back(); </script>';
}
?>